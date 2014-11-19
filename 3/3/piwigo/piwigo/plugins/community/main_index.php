<?php

if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');

global $template, $conf, $user,$page ;

include_once(PHPWG_ROOT_PATH.'admin/include/functions.php');
define('MAIL_CONFIG_BASE_URL', make_index_url(array('section' => 'main_index')));

$template->set_filenames(array('main_index' => dirname(__FILE__).'/main_index.tpl'));

$forbidden = get_sql_condition_FandF(
		array(
				'forbidden_categories' => 'category_id',
				'visible_categories' => 'category_id',
				'visible_images' => 'id'
		),
		'AND'
);

$page['super_order_by'] = true;
$conf['order_by'] = ' ORDER BY hit DESC, id DESC';

$query = '
SELECT DISTINCT(id)
  FROM '.IMAGES_TABLE.'
    INNER JOIN '.IMAGE_CATEGORY_TABLE.' AS ic ON id = ic.image_id
  WHERE hit > 0
    '.$forbidden.'
    '.$conf['order_by'].'
  LIMIT '.$conf['top_number'].'
;';


//echo "<div>".var_dump($ret)."</div>";
$page = array_merge(
		$page,
		array(
				'title' => '<a href="'.duplicate_index_url(array('start'=>0)).'">'
				.$conf['top_number'].' '.l10n('Most visited').'</a>',
				'itemes' => array_from_query($query, 'id'),
		)
);

$pictures = array();

$selection = array_slice(
		$page['itemes'],
		$page['start'],
		$page['nb_image_page']
);
//$selection = trigger_event('loc_index_thumbnails_selection', $selection);

if (count($selection) > 0)
{
	$rank_of = array_flip($selection);

	$query = '
SELECT *
  FROM '.IMAGES_TABLE.'
  WHERE id IN ('.implode(',', $selection).') and level <>1
;';
	$result = pwg_query($query);
	while ($row = pwg_db_fetch_assoc($result))
	{
		$row['rank'] = $rank_of[ $row['id'] ];
		$pictures[] = $row;
	}

	usort($pictures, 'rank_compare');
	unset($rank_of);
}

if (count($pictures) > 0)
{
	// define category slideshow url
	$row = reset($pictures);
	$page['cat_slideshow_url'] =
	
	add_url_params(
			duplicate_picture_url(
					array(
							'image_id' => $row['id'],
							'image_file' => $row['file']
					),
					array('start')
			),
			array('slideshow' =>
					(isset($_GET['slideshow']) ? $_GET['slideshow']
							: '' ))
	);

	if ($conf['activate_comments'] and $user['show_nb_comments'])
	{
		$query = '
SELECT image_id, COUNT(*) AS nb_comments
  FROM '.COMMENTS_TABLE.'
  WHERE validated = \'true\'
    AND image_id IN ('.implode(',', $selection).')
  GROUP BY image_id
;';
		$nb_comments_of = simple_hash_from_query($query, 'image_id', 'nb_comments');
	}
}
//trigger_action('loc_begin_index_thumbnails', $pictures);

$tpl_thumbnails_var = array();
foreach ($pictures as $row)
{
	// link on picture.php page
	$url = duplicate_picture_url(
			array(
					'image_id' => $row['id'],
					'image_file' => $row['file']
			),
			array('start')
	);

	if (isset($nb_comments_of))
	{
		$row['NB_COMMENTS'] = $row['nb_comments'] = (int)@$nb_comments_of[$row['id']];
	}

	$name = render_element_name($row);
	$desc = render_element_description($row, 'main_page_element_description');

	$tpl_var = array_merge( $row, array(
			'TN_ALT' => htmlspecialchars(strip_tags($name)),
			'TN_TITLE' => get_thumbnail_title($row, $name, $desc),
			'URL' => $url,
			'DESCRIPTION' => $desc,
			'src_image' => new SrcImage($row),
	) );

	if ($conf['index_new_icon'])
	{
		$tpl_var['icon_ts'] = get_icon($row['date_available']);
	}

	if ($user['show_nb_hits'])
	{
		$tpl_var['NB_HITS'] = $row['hit'];
	}


	$tpl_var['NAME'] = $name;
	$tpl_thumbnails_var[] = $tpl_var;
}

$template->assign('most_visited', $tpl_thumbnails_var);
$template->assign_var_from_handle('PLUGIN_INDEX_CONTENT_BEGIN', 'main_index');


?>

