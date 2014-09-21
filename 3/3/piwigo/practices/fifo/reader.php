<?php

include_once("common.php");

if(!file_exists($pipe)) {
   umask(0);
   posix_mkfifo($pipe,$mode);
}

$count = 1; 
$f = fopen($pipe,"r");
while(true){
	$ret = stream_get_line($f, 102, "\n");
	if($ret != false){
		echo $ret."\n";
	}else{
		usleep(100000);
	}
}


function fifo_readline($file, &$param)
{
	// $param["flag"]
	// $param["lines"]
	// $param["lines_count"]
	// $param["lineth"]
	
	if(!isset($param["flag"])) $param["flag"] = false;
	if(!isset($param["lines"])) $param["lines"] = array();
	if(!isset($param["lines_count"])) $param["lines_count"] = 0;
	if(!isset($param["lineth"])) $param["lineth"] = 0;

	echo "-----------------------\n";
	var_dump($param);

	$READ_BUF_SIZE = 128;
	$idx = $param["lineth"];
	$line_flag = 0;
	if($param["flag"] == true){
		$param["lineth"]++;
		if($param["lines_count"] > $param["lineth"]){
			$param["flag"] = true;
		}else{
			$param["flag"] = false;
		}

		// notice: the last line may not a full line.
		if(strstr($param["lines"][$idx], "\n") == false){
			$line_flag = 1;
		}
	}else{
		$line_flag = 1;
	}

	echo "line flag = ".$line_flag."\n";

	if($line_flag == 0){
		return $param["lines"][$idx];
	}else{
		$buf = fread($file, $READ_BUF_SIZE);
		if($buf == false){
			return false;
		}else{
			echo "===============\n";
			var_dump($buf);
		}

		if(isset($param["lines"]) and count($param["lines"]) > $idx){
			$buf = $param["lines"][$idx] + $buf;
		}
		$param["lines"] = explode("\n", $buf);
		$param["lines_count"] = count($param["lines"]);
		$param["lineth"] = 1;
		if($param["lines_count"] > $param["lineth"]){
			$param["flag"] = true;
		}else{
			$param["flag"] = false;
		}
		if($param["lines_count"] > 0){ 
			return $param["lines"][0]; 
		}else{
			return false;
		}
	}
}

?>
