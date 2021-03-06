<?php
// +-----------------------------------------------------------------------+
// | Piwigo - a PHP based photo gallery                                    |
// +-----------------------------------------------------------------------+
// | Copyright(C) 2008-2014 Piwigo Team                  http://piwigo.org |
// | Copyright(C) 2003-2008 PhpWebGallery Team    http://phpwebgallery.net |
// | Copyright(C) 2002-2003 Pierrick LE GALL   http://le-gall.net/pierrick |
// +-----------------------------------------------------------------------+
// | This program is free software; you can redistribute it and/or modify  |
// | it under the terms of the GNU General Public License as published by  |
// | the Free Software Foundation                                          |
// |                                                                       |
// | This program is distributed in the hope that it will be useful, but   |
// | WITHOUT ANY WARRANTY; without even the implied warranty of            |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU      |
// | General Public License for more details.                              |
// |                                                                       |
// | You should have received a copy of the GNU General Public License     |
// | along with this program; if not, write to the Free Software           |
// | Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307, |
// | USA.                                                                  |
// +-----------------------------------------------------------------------+

/**
 * API method
 * Returns images per category
 * @param mixed[] $params
 *    @option int[] cat_id (optional)
 *    @option bool recursive
 *    @option int per_page
 *    @option int page
 *    @option string order (optional)
 */
function ws_categories_getImages($params, &$service)
{
  global $user, $conf;

  $images = array();

  //------------------------------------------------- get the related categories
  $where_clauses = array();
  foreach ($params['cat_id'] as $cat_id)
  {
    if ($params['recursive'])
    {
      $where_clauses[] = 'uppercats '.DB_REGEX_OPERATOR.' \'(^|,)'.$cat_id.'(,|$)\'';
    }
    else
    {
      $where_clauses[] = 'id='.$cat_id;
    }
  }
  if (!empty($where_clauses))
  {
    $where_clauses = array('('. implode("\n    OR ", $where_clauses) . ')');
  }
  $where_clauses[] = get_sql_condition_FandF(
    array('forbidden_categories' => 'id'),
    null, true
    );

  $query = '
SELECT id, name, permalink, image_order
  FROM '. CATEGORIES_TABLE .'
  WHERE '. implode("\n    AND ", $where_clauses) .'
;';
  $result = pwg_query($query);

  $cats = array();
  while ($row = pwg_db_fetch_assoc($result))
  {
    $row['id'] = (int)$row['id'];
    $cats[ $row['id'] ] = $row;
  }

  //-------------------------------------------------------- get the images
  if (!empty($cats))
  {
    $where_clauses = ws_std_image_sql_filter($params, 'i.');
    $where_clauses[] = 'category_id IN ('. implode(',', array_keys($cats)) .')';
    $where_clauses[] = get_sql_condition_FandF(
      array('visible_images' => 'i.id'),
      null, true
      );

    $order_by = ws_std_image_sql_order($params, 'i.');
    if ( empty($order_by)
          and count($params['cat_id'])==1
          and isset($cats[ $params['cat_id'][0] ]['image_order'])
        )
    {
      $order_by = $cats[ $params['cat_id'][0] ]['image_order'];
    }
    $order_by = empty($order_by) ? $conf['order_by'] : 'ORDER BY '.$order_by;

    $query = '
SELECT i.*, GROUP_CONCAT(category_id) AS cat_ids
  FROM '. IMAGES_TABLE .' i
    INNER JOIN '. IMAGE_CATEGORY_TABLE .' ON i.id=image_id
  WHERE '. implode("\n    AND ", $where_clauses) .'
  GROUP BY i.id
  '. $order_by .'
  LIMIT '. $params['per_page'] .'
  OFFSET '. ($params['per_page']*$params['page']) .'
;';
    $result = pwg_query($query);

    while ($row = pwg_db_fetch_assoc($result))
    {
      $image = array();
      foreach (array('id', 'width', 'height', 'hit') as $k)
      {
        if (isset($row[$k]))
        {
          $image[$k] = (int)$row[$k];
        }
      }
      foreach (array('file', 'name', 'comment', 'date_creation', 'date_available') as $k)
      {
        $image[$k] = $row[$k];
      }
      $image = array_merge($image, ws_std_get_urls($row));

      $image_cats = array();
      foreach (explode(',', $row['cat_ids']) as $cat_id)
      {
        $url = make_index_url(
          array(
            'category' => $cats[$cat_id],
            )
          );
        $page_url = make_picture_url(
          array(
            'category' => $cats[$cat_id],
            'image_id' => $row['id'],
            'image_file' => $row['file'],
            )
          );
        $image_cats[] = array(
          'id' => (int)$cat_id,
          'url' => $url,
          'page_url' => $page_url,
          );
      }

      $image['categories'] = new PwgNamedArray(
        $image_cats,
        'category',
        array('id', 'url', 'page_url')
        );
      $images[] = $image;
    }
  }

  return array(
    'paging' => new PwgNamedStruct(
      array(
        'page' => $params['page'],
        'per_page' => $params['per_page'],
        'count' => count($images)
        )
      ),
    'images' => new PwgNamedArray(
      $images, 'image',
      ws_std_get_image_xml_attributes()
      )
    );
}

/**
 * API method
 * Returns a list of categories
 * @param mixed[] $params
 *    @option int cat_id (optional)
 *    @option bool recursive
 *    @option bool public
 *    @option bool tree_output
 *    @option bool fullname
 */
function ws_categories_getList($params, &$service)
{
  global $user, $conf;

  $where = array('1=1');
  $join_type = 'INNER';
  $join_user = $user['id'];

  if (!$params['recursive'])
  {
    if ($params['cat_id']>0)
    {
      $where[] = '(
        id_uppercat = '. (int)($params['cat_id']) .'
        OR id='.(int)($params['cat_id']).'
      )';
    }
    else
    {
      $where[] = 'id_uppercat IS NULL';
    }
  }
  else if ($params['cat_id']>0)
  {
    $where[] = 'uppercats '. DB_REGEX_OPERATOR .' \'(^|,)'.
      (int)($params['cat_id']) .'(,|$)\'';
  }

  if ($params['public'])
  {
    $where[] = 'status = "public"';
    $where[] = 'visible = "true"';

    $join_user = $conf['guest_id'];
  }
  else if (is_admin())
  {
    // in this very specific case, we don't want to hide empty
    // categories. Function calculate_permissions will only return
    // categories that are either locked or private and not permitted
    //
    // calculate_permissions does not consider empty categories as forbidden
    $forbidden_categories = calculate_permissions($user['id'], $user['status']);
    $where[]= 'id NOT IN ('.$forbidden_categories.')';
    $join_type = 'LEFT';
  }

  $query = '
SELECT
    id, name, comment, permalink,
    uppercats, global_rank, id_uppercat,
    nb_images, count_images AS total_nb_images,
    representative_picture_id, user_representative_picture_id, count_images, count_categories,
    date_last, max_date_last, count_categories AS nb_categories
  FROM '. CATEGORIES_TABLE .'
    '.$join_type.' JOIN '. USER_CACHE_CATEGORIES_TABLE .'
    ON id=cat_id AND user_id='.$join_user.'
  WHERE '. implode("\n    AND ", $where) .'
;';
  $result = pwg_query($query);

  // management of the album thumbnail -- starts here
  $image_ids = array();
  $categories = array();
  $user_representative_updates_for = array();
  // management of the album thumbnail -- stops here

  $cats = array();
  while ($row = pwg_db_fetch_assoc($result))
  {
    $row['url'] = make_index_url(
      array(
        'category' => $row
        )
      );
    foreach (array('id','nb_images','total_nb_images','nb_categories') as $key)
    {
      $row[$key] = (int)$row[$key];
    }

    if ($params['fullname'])
    {
      $row['name'] = strip_tags(get_cat_display_name_cache($row['uppercats'], null));
    }
    else
    {
      $row['name'] = strip_tags(
        trigger_event(
          'render_category_name',
          $row['name'],
          'ws_categories_getList'
          )
        );
    }

    $row['comment'] = strip_tags(
      trigger_event(
        'render_category_description',
        $row['comment'],
        'ws_categories_getList'
        )
      );

    // management of the album thumbnail -- starts here
    //
    // on branch 2.3, the algorithm is duplicated from
    // include/category_cats, but we should use a common code for Piwigo 2.4
    //
    // warning : if the API method is called with $params['public'], the
    // album thumbnail may be not accurate. The thumbnail can be viewed by
    // the connected user, but maybe not by the guest. Changing the
    // filtering method would be too complicated for now. We will simply
    // avoid to persist the user_representative_picture_id in the database
    // if $params['public']
    if (!empty($row['user_representative_picture_id']))
    {
      $image_id = $row['user_representative_picture_id'];
    }
    else if (!empty($row['representative_picture_id']))
    { // if a representative picture is set, it has priority
      $image_id = $row['representative_picture_id'];
    }
    else if ($conf['allow_random_representative'])
    {
      // searching a random representant among elements in sub-categories
      $image_id = get_random_image_in_category($row);
    }
    else
    { // searching a random representant among representant of sub-categories
      if ($row['count_categories']>0 and $row['count_images']>0)
      {
        $query = '
SELECT representative_picture_id
  FROM '. CATEGORIES_TABLE .'
    INNER JOIN '. USER_CACHE_CATEGORIES_TABLE .'
    ON id=cat_id AND user_id='.$user['id'].'
  WHERE uppercats LIKE \''.$row['uppercats'].',%\'
    AND representative_picture_id IS NOT NULL
        '.get_sql_condition_FandF(
          array('visible_categories' => 'id'),
          "\n  AND"
          ).'
  ORDER BY '. DB_RANDOM_FUNCTION .'()
  LIMIT 1
;';
        $subresult = pwg_query($query);

        if (pwg_db_num_rows($subresult) > 0)
        {
          list($image_id) = pwg_db_fetch_row($subresult);
        }
      }
    }

    if (isset($image_id))
    {
      if ($conf['representative_cache_on_subcats'] and $row['user_representative_picture_id'] != $image_id)
      {
        $user_representative_updates_for[ $row['id'] ] = $image_id;
      }

      $row['representative_picture_id'] = $image_id;
      $image_ids[] = $image_id;
      $categories[] = $row;
    }
    unset($image_id);
    // management of the album thumbnail -- stops here

    $cats[] = $row;
  }
  usort($cats, 'global_rank_compare');

  // management of the album thumbnail -- starts here
  if (count($categories) > 0)
  {
    $thumbnail_src_of = array();
    $new_image_ids = array();

    $query = '
SELECT id, path, representative_ext, level
  FROM '. IMAGES_TABLE .'
  WHERE id IN ('. implode(',', $image_ids) .')
;';
    $result = pwg_query($query);

    while ($row = pwg_db_fetch_assoc($result))
    {
      if ($row['level'] <= $user['level'])
      {
        $thumbnail_src_of[$row['id']] = DerivativeImage::thumb_url($row);
      }
      else
      {
        // problem: we must not display the thumbnail of a photo which has a
        // higher privacy level than user privacy level
        //
        // * what is the represented category?
        // * find a random photo matching user permissions
        // * register it at user_representative_picture_id
        // * set it as the representative_picture_id for the category
        foreach ($categories as &$category)
        {
          if ($row['id'] == $category['representative_picture_id'])
          {
            // searching a random representant among elements in sub-categories
            $image_id = get_random_image_in_category($category);

            if (isset($image_id) and !in_array($image_id, $image_ids))
            {
              $new_image_ids[] = $image_id;
            }
            if ($conf['representative_cache_on_level'])
            {
              $user_representative_updates_for[ $category['id'] ] = $image_id;
            }

            $category['representative_picture_id'] = $image_id;
          }
        }
        unset($category);
      }
    }

    if (count($new_image_ids) > 0)
    {
      $query = '
SELECT id, path, representative_ext
  FROM '. IMAGES_TABLE .'
  WHERE id IN ('. implode(',', $new_image_ids) .')
;';
      $result = pwg_query($query);

      while ($row = pwg_db_fetch_assoc($result))
      {
        $thumbnail_src_of[ $row['id'] ] = DerivativeImage::thumb_url($row);
      }
    }
  }

  // compared to code in include/category_cats, we only persist the new
  // user_representative if we have used $user['id'] and not the guest id,
  // or else the real guest may see thumbnail that he should not
  if (!$params['public'] and count($user_representative_updates_for))
  {
    $updates = array();

    foreach ($user_representative_updates_for as $cat_id => $image_id)
    {
      $updates[] = array(
        'user_id' => $user['id'],
        'cat_id' => $cat_id,
        'user_representative_picture_id' => $image_id,
        );
    }

    mass_updates(
      USER_CACHE_CATEGORIES_TABLE,
      array(
        'primary' => array('user_id', 'cat_id'),
        'update'  => array('user_representative_picture_id')
        ),
      $updates
      );
  }

  foreach ($cats as &$cat)
  {
    foreach ($categories as $category)
    {
      if ($category['id'] == $cat['id'] and isset($category['representative_picture_id']))
      {
        $cat['tn_url'] = $thumbnail_src_of[$category['representative_picture_id']];
      }
    }
    // we don't want them in the output
    unset($cat['user_representative_picture_id'], $cat['count_images'], $cat['count_categories']);
  }
  unset($cat);
  // management of the album thumbnail -- stops here

  if ($params['tree_output'])
  {
    return categories_flatlist_to_tree($cats);
  }

  return array(
    'categories' => new PwgNamedArray(
      $cats,
      'category',
      ws_std_get_category_xml_attributes()
      )
    );
}

/**
 * API method
 * Returns the list of categories as you can see them in administration
 * @param mixed[] $params
 *
 * Only admin can run this method and permissions are not taken into
 * account.
 */
function ws_categories_getAdminList($params, &$service)
{
  $query = '
SELECT category_id, COUNT(*) AS counter
  FROM '. IMAGE_CATEGORY_TABLE .'
  GROUP BY category_id
;';
  $nb_images_of = simple_hash_from_query($query, 'category_id', 'counter');

  $query = '
SELECT id, name, comment, uppercats, global_rank
  FROM '. CATEGORIES_TABLE .'
;';
  $result = pwg_query($query);

  $cats = array();
  while ($row = pwg_db_fetch_assoc($result))
  {
    $id = $row['id'];
    $row['nb_images'] = isset($nb_images_of[$id]) ? $nb_images_of[$id] : 0;

    $row['name'] = strip_tags(
      trigger_event(
        'render_category_name',
        $row['name'],
        'ws_categories_getAdminList'
        )
      );
    $row['comment'] = strip_tags(
      trigger_event(
        'render_category_description',
        $row['comment'],
        'ws_categories_getAdminList'
        )
      );

    $cats[] = $row;
  }

  usort($cats, 'global_rank_compare');
  return array(
    'categories' => new PwgNamedArray(
      $cats,
      'category',
      array('id', 'nb_images', 'name', 'uppercats', 'global_rank')
      )
    );
}

/**
 * API method
 * Adds a category
 * @param mixed[] $params
 *    @option string name
 *    @option int parent (optional)
 *    @option string comment (optional)
 *    @option bool visible
 *    @option string status (optional)
 *    @option bool commentable
 */
function ws_categories_add($params, &$service)
{
  include_once(PHPWG_ROOT_PATH.'admin/include/functions.php');

  $options = array();
  if (!empty($params['status']) and in_array($params['status'], array('private','public')))
  {
    $options['status'] = $params['status'];
  }

  if (!empty($params['comment']))
  {
    $options['comment'] = $params['comment'];
  }

  $creation_output = create_virtual_category(
    $params['name'],
    $params['parent'],
    $options
    );

  if (isset($creation_output['error']))
  {
    return new PwgError(500, $creation_output['error']);
  }

  invalidate_user_cache();

  return $creation_output;
}

/**
 * API method
 * Sets details of a category
 * @param mixed[] $params
 *    @option int cat_id
 *    @option string name (optional)
 *    @option string comment (optional)
 */
function ws_categories_setInfo($params, &$service)
{
  $update = array(
    'id' => $params['category_id'],
    );

  $info_columns = array('name', 'comment',);

  $perform_update = false;
  foreach ($info_columns as $key)
  {
    if (isset($params[$key]))
    {
      $perform_update = true;
      $update[$key] = $params[$key];
    }
  }

  if ($perform_update)
  {
    single_update(
      CATEGORIES_TABLE,
      $update,
      array('id' => $update['id'])
      );
  }
}

/**
 * API method
 * Sets representative image of a category
 * @param mixed[] $params
 *    @option int category_id
 *    @option int image_id
 */
function ws_categories_setRepresentative($params, &$service)
{
  // does the category really exist?
  $query = '
SELECT COUNT(*)
  FROM '. CATEGORIES_TABLE .'
  WHERE id = '. $params['category_id'] .'
;';
  list($count) = pwg_db_fetch_row(pwg_query($query));
  if ($count == 0)
  {
    return new PwgError(404, 'category_id not found');
  }

  // does the image really exist?
  $query = '
SELECT COUNT(*)
  FROM '. IMAGES_TABLE .'
  WHERE id = '. $params['image_id'] .'
;';
  list($count) = pwg_db_fetch_row(pwg_query($query));
  if ($count == 0)
  {
    return new PwgError(404, 'image_id not found');
  }

  // apply change
  $query = '
UPDATE '. CATEGORIES_TABLE .'
  SET representative_picture_id = '. $params['image_id'] .'
  WHERE id = '. $params['category_id'] .'
;';
  pwg_query($query);

  $query = '
UPDATE '. USER_CACHE_CATEGORIES_TABLE .'
  SET user_representative_picture_id = NULL
  WHERE cat_id = '. $params['category_id'] .'
;';
  pwg_query($query);
}

/**
 * API method
 * Deletes a category
 * @param mixed[] $params
 *    @option string|int[] category_id
 *    @option string photo_deletion_mode
 *    @option string pwg_token
 */
function ws_categories_delete($params, &$service)
{
  if (get_pwg_token() != $params['pwg_token'])
  {
    return new PwgError(403, 'Invalid security token');
  }

  $modes = array('no_delete', 'delete_orphans', 'force_delete');
  if (!in_array($params['photo_deletion_mode'], $modes))
  {
    return new PwgError(500,
      '[ws_categories_delete]'
      .' invalid parameter photo_deletion_mode "'.$params['photo_deletion_mode'].'"'
      .', possible values are {'.implode(', ', $modes).'}.'
      );
  }

  if (!is_array($params['category_id']))
  {
    $params['category_id'] = preg_split(
      '/[\s,;\|]/',
      $params['category_id'],
      -1,
      PREG_SPLIT_NO_EMPTY
      );
  }
  $params['category_id'] = array_map('intval', $params['category_id']);

  $category_ids = array();
  foreach ($params['category_id'] as $category_id)
  {
    if ($category_id > 0)
    {
      $category_ids[] = $category_id;
    }
  }

  if (count($category_ids) == 0)
  {
    return;
  }

  $query = '
SELECT id
  FROM '. CATEGORIES_TABLE .'
  WHERE id IN ('. implode(',', $category_ids) .')
;';
  $category_ids = array_from_query($query, 'id');

  if (count($category_ids) == 0)
  {
    return;
  }

  include_once(PHPWG_ROOT_PATH.'admin/include/functions.php');
  delete_categories($category_ids, $params['photo_deletion_mode']);
  update_global_rank();
}

/**
 * API method
 * Moves a category
 * @param mixed[] $params
 *    @option string|int[] category_id
 *    @option int parent
 *    @option string pwg_token
 */
function ws_categories_move($params, &$service)
{
  global $page;

  if (get_pwg_token() != $params['pwg_token'])
  {
    return new PwgError(403, 'Invalid security token');
  }

  if (!is_array($params['category_id']))
  {
    $params['category_id'] = preg_split(
      '/[\s,;\|]/',
      $params['category_id'],
      -1,
      PREG_SPLIT_NO_EMPTY
      );
  }
  $params['category_id'] = array_map('intval', $params['category_id']);

  $category_ids = array();
  foreach ($params['category_id'] as $category_id)
  {
    if ($category_id > 0)
    {
      $category_ids[] = $category_id;
    }
  }

  if (count($category_ids) == 0)
  {
    return new PwgError(403, 'Invalid category_id input parameter, no category to move');
  }

  // we can't move physical categories
  $categories_in_db = array();

  $query = '
SELECT id, name, dir
  FROM '. CATEGORIES_TABLE .'
  WHERE id IN ('. implode(',', $category_ids) .')
;';
  $result = pwg_query($query);
  while ($row = pwg_db_fetch_assoc($result))
  {
    $categories_in_db[ $row['id'] ] = $row;

    // we break on error at first physical category detected
    if (!empty($row['dir']))
    {
      $row['name'] = strip_tags(
        trigger_event(
          'render_category_name',
          $row['name'],
          'ws_categories_move'
          )
        );

      return new PwgError(403,
        sprintf(
          'Category %s (%u) is not a virtual category, you cannot move it',
          $row['name'],
          $row['id']
          )
        );
    }
  }

  if (count($categories_in_db) != count($category_ids))
  {
    $unknown_category_ids = array_diff($category_ids, array_keys($categories_in_db));

    return new PwgError(403,
      sprintf(
        'Category %u does not exist',
        $unknown_category_ids[0]
        )
      );
  }

  // does this parent exists? This check should be made in the
  // move_categories function, not here
  // 0 as parent means "move categories at gallery root"
  if (0 != $params['parent'])
  {
    $subcat_ids = get_subcat_ids(array($params['parent']));
    if (count($subcat_ids) == 0)
    {
      return new PwgError(403, 'Unknown parent category id');
    }
  }

  $page['infos'] = array();
  $page['errors'] = array();

  include_once(PHPWG_ROOT_PATH.'admin/include/functions.php');
  move_categories($category_ids, $params['parent']);
  invalidate_user_cache();

  if (count($page['errors']) != 0)
  {
    return new PwgError(403, implode('; ', $page['errors']));
  }
}

?>