<?php

$srcdir = "";
$dstdir = "";

if($argc != 3){
	echo "Usage: ".$argv[0]." <srcdir> <dstdir>\n";
	exit();
}else{
	$srcdir = $argv[1];
	$dstdir = $argv[2];
}

//echo "src dir: ".$srcdir.", dst dir: ".$dstdir."\n";

$modified_files = array(
	"admin/include/uploadify/uploadify.css",
	"admin/include/uploadify/jquery.uploadify.v3.0.0.min.js",
	"admin/include/uploadify/uploadify.php",
	"admin/include/functions_upload.inc.php",
	"admin/include/photos_add_direct_process.inc.php",
	"include/ws_protocols/json_encoder.php",
	"include/category_cats.inc.php",
	"include/functions.inc.php",
	"include/functions_html.inc.php",
	"include/functions_user.inc.php",
	"include/menubar.inc.php",
	"include/section_init.inc.php",
	"include/template.class.php",
	"index.php",
	"picture.php",
	"ws.php",
	"identification.php",
	"themes/fonts/font-awesome/css/font-awesome.css",
	"themes/fonts/font-awesome/font/fontawesome-webfont.svg",
	"themes/fonts/font-awesome/font/fontawesome-webfontd41d.eot",
	"themes/fonts/font-awesome/font/fontawesome-webfontf77b.eot",
	"themes/fonts/font-awesome/font/fontawesome-webfontf77b.ttf",
	"themes/fonts/font-awesome/font/fontawesome-webfontf77b.woff",
	"themes/fonts/glyphicons-halflings-regular.eot",
	"themes/fonts/glyphicons-halflings-regular.svg",
	"themes/fonts/glyphicons-halflings-regular.ttf",
	"themes/fonts/glyphicons-halflings-regular.woff",
	"language/zh_CN/admin.lang.php",
	"language/zh_CN/common.lang.php"
);

//$src_files = array();
//$dst_files = array();

$i = 0;
$ok = 0;
$not = 0;
foreach($modified_files as $file)
{
	$i++;
	$src_file = $srcdir."/".$file;
	$dst_file = $dstdir."/".$file;
	if(copy($src_file, $dst_file) == TRUE){
		echo "File '".$src_file."' copy to '.".$dst_file."' success.\n";
		$ok++;
	}else{
		echo "File '".$src_file."' copy to '.".$dst_file."' failed.\n";
		$not++;
	}
}

echo "File copy, total: ".$i.", success: ".$ok.", failed: ".$not.".\n";


?>
