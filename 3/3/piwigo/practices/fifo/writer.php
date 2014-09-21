<?php

include_once("common.php");

if(!file_exists($pipe)) {
   umask(0);
   posix_mkfifo($pipe,$mode);
}

$f = fopen($pipe,"w");

for($i=1; $i<=20000; $i++){
	if($i % 2 == 0 ){
		fwrite($f,"block fds there is a reader lds ".$i."\n");
	}else{
		fwrite($f,"hello, block until there is a reader ".$i."\n");
	}
	fflush($f);
}
fwrite($f,"hello, block until there is a fdsaafdsfdfds");
fclose($f);

?>

