<?php

include_once(PHPWG_PLUGINS_PATH.'../admin/include/image.class.php');
include_once(PHPWG_PLUGINS_PATH.'../admin/include/functions_upload.inc.php');

//echo "<div>plugins path: ".PHPWG_PLUGINS_PATH."</div><br>";
//echo "<div>comunity path: ".COMMUNITY_PATH."</div><br>";
//echo "<div>FILE: ".dirname(__FILE__)."</div><br>";
//echo "<div>current path: ".getcwd()."</div><br>";
//echo "<div>".dirname(BKT_PWG_ROOT_PATH.'admin/include/image.class.php')."</div><br>";

global $max_th_width;
global $max_th_height;
global $max_nt_width;
global $max_nt_height;
global $temp_dir;
//$temp_dir = PHPWG_PLUGINS_PATH.'../temp';
$temp_dir = PHPWG_PLUGINS_PATH.'../imgbkt';
$max_th_width = 100;
$max_th_height= 100;
$max_nt_width = 900;
$max_nt_height = 600;
/*
 *	转移上传的临时文件，防止被删除
 *	
 *	@param string $imgfile
 *	@return string $source_image_file
 *	Note: 需要手动删除
 */
function source_image_tmpfile($imgfile, $file_ext)
{
	global $temp_dir;
	
	prepare_directory($temp_dir);
	$source_image_file = tempnam($temp_dir, "BKT");
	rename($source_image_file, $source_image_file.".".$file_ext);
	$source_image_file .= ".".$file_ext;
	rename($imgfile, $source_image_file);
	//@syslog(LOG_INFO, "1 imgfile: ".$imgfile.", source image file: ".$source_image_file);
	@chmod($source_image_file, 0666); // need another process to delete it
	//@syslog(LOG_INFO, "2 imgfile: ".$imgfile.", source image file: ".$source_image_file);
	return $source_image_file;
}

/*
 *	生成缩略图
 *	
 *	@param string $imgfile
 *	@return string $thumbnail_image_file
 *	Note: 存放于临时文件中
 */
function thumbnail_image_tmpfile($imgfile, $file_ext)
{
	global $temp_dir;
	prepare_directory($temp_dir);
	$th_image_file = tempnam($temp_dir, "BKT");
	rename($th_image_file, $th_image_file.".".$file_ext);
	$th_image_file .= ".".$file_ext;
	if(thumbnail_image_resize($imgfile, $th_image_file) == false){
		return false;
	}else return $th_image_file;
}

/*
 *	生成网络查看图
 *	
 *	@param string $imgfile
 *	@return string $network_image_file
 *	Note: 存放于临时文件中
 */
function network_image_tmpfile($imgfile, $file_ext)
{
	global $temp_dir;
	prepare_directory($temp_dir);
	$nt_image_file = tempnam($temp_dir, "BKT");
	rename($nt_image_file, $nt_image_file.".".$file_ext);
	$nt_image_file .= ".".$file_ext;
	if(network_image_resize($imgfile, $nt_image_file) == false){
		return false;
	}else{
		return $nt_image_file;
	}
}

function network_image_resize($src_img, $dst_img)
{
	global $max_nt_width, $max_nt_height;

	$image = new pwg_image($src_img);

	$dst_width = $src_width  = $image->get_width();
    $dst_height = $src_height = $image->get_height();
	$rate = (float)$src_width / (float)$src_height;

	if($dst_width > $dst_height){
		if($src_width - 100 > $max_nt_width){
			$dst_width = $max_nt_width;
			$dst_height = (int)($dst_width/$rate);
		} 
	}else{
		if($src_height - 50 > $max_nt_height){
			$dst_height = $max_nt_height;
			$dst_width = (int) $dst_height * $rate;
		} 	
	}

	if($dst_width == $src_width){
		return false;
	}

	$image->set_compression_quality( ImageStdParams::$quality );

	$image->resize($dst_width, $dst_height);

	$image->write($dst_img); 
	$image->destroy();
	@chmod($dst_img, 0666); // need another process to delete it
	return true;
}

function thumbnail_image_resize($src_img, $dst_img)
{
	global $max_th_width, $max_th_height;

	$image = new pwg_image($src_img);

	$dst_width = $src_width  = $image->get_width();
    $dst_height = $src_height = $image->get_height();
	$rate = (float)$src_width / (float)$src_height;

	if($dst_width > $dst_height){
		$dst_width = $max_th_width;
		$dst_height = (int)($dst_width/$rate);
	}else{
		$dst_height = $max_th_height;
		$dst_width = (int) $dst_height * $rate;
	}

	if($dst_width == $src_width){
		return false;
	}

	$image->set_compression_quality( ImageStdParams::$quality );

	$image->resize($dst_width, $dst_height);

	$image->write($dst_img); 
	$image->destroy();
	@chmod($dst_img, 0666); // need another process to delete it
	return true;
}

/*
 *	把网络查看图和缩略图重命名与原图相关的名称
 *	规则：网络查看图的名称为在原图名称后面加后缀'-nt' (非文件名后缀的后面)
 *		  缩略图的名称在原图名称后面加后缀'-th'
 */
function image_file_relate_rename($main_file, $sub_file, $suffix)
{
	list($filename, $filesuffix) = explode(".", $main_file);
	$new_file = $filename.$suffix.".".$filesuffix;
	rename($sub_file, $new_file);
	return $new_file;
}

?>

