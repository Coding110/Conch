<?php

function EMFS_Request()
{
	$url = "http://hua.becktu.com/plugins/community/include/EMFS/emfs.php?param=task";
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_HEADER, TRUE);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE); 
	$head = curl_exec($curl); 
	var_dump($head);
	if($head == false) echo curl_error($curl)."\n";
	$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE); 
	var_dump($httpCode);
	curl_close($curl); 
}

echo "EMFS HTTP request.\n";
EMFS_Request();

?>
