<?php

include_once('task_fifo.php');
include_once('pwg_db_2.php');
//include_once(BKT_PWG_ROOT_PATH.'local/config/database.inc.php');
//include_once(BKT_PWG_ROOT_PATH.'include/dblayer/functions_'.$conf['dblayer'].'.inc.php');
//include_once('task_fifo.php');
include_once('emfs_log.php');

global $MAX_MAIL_FILE_SIZE;
$MAX_MAIL_FILE_SIZE = 4194304; // 4MB, 每封邮件存储文件的最大大小

/*
 *	EMFS: Email file system (IMAP)
 *	读文件: Open -> OpenFile -> [ GetAttribute ->] Read -> CloseFile -> Close
 *	写文件：Open -> CreateFile -> SetAttribute -> Write -> CloseFile -> Close
 *	修改文件：不支持
 * 	新建文件夹：Open -> CreateFolder -> Close *	
 * 	
 * 	附：注意检查与服务器连接的有效性
 *		 
 * 	Note: 在每个文件开始位置加入4个字节的随机数，起混淆作用。文件由多封邮件组成时，只给第一封邮件添加随机数。
 */

class EMFS extends Stackable{
	public $mailServer;
	public $mailLink;
	public $mailUser;
	public $mailPasswd;
	public $imapPort;
	public $ssl;
	
	public $mailBox;
	
	public $mimeHeaders;// = array();
	public $parts;// = array();
	public $msgno;// = 0;
	
	/*
	 * 	构造函数
	 */
	public function __construct($server, $user, $password, $port = 143, $ssl = false)	
	{
		//echo "Open __construct.<br>\n";
		//echo "server: $server, user: $user, passwd: $password, port: $port, ssl: $ssl\n";
		
		//@syslog(LOG_ERR, 'EMFS construct 1');
		$this->mailServer = $server;
		$this->mailUser = $user;
		$this->mailPasswd = $password;
		$this->imapPort = $port;
		$this->ssl = $ssl;
		//@syslog(LOG_ERR, 'EMFS construct 2');

		$head = array("from" => $user, "to" => $user); 
		$this->mimeHeaders = new TaskData();
		//$this->mimeHeaders[] = $head;
		$this->mimeHeaders["from"] = $user;
		$this->mimeHeaders["to"] = $user;

		$this->parts = new TaskData();
		$part["type"] = TYPEMULTIPART;
		$part["subtype"] = "mixed";
		$this->parts[] = $part;
	}	

	public function SetVar($key, $value)
	{
		$this->mailBox = $value;
	}
	
	/*
	 * 	析造函数
	*/
	public function __destruct()
	{
		//echo "destruct.\n";
		if(isset($this->mailBox)){
			imap_close($this->mailBox);
		}
	}
	
	/*
	 * 	打开指定的邮箱（文件夹）
	 */
	public function Open($folder = "INBOX")
	{
		if($this->ssl == false){
			$this->mailLink = "{{$this->mailServer}:{$this->imapPort}}".$folder;
		}else{
			$this->mailLink = "{{$this->mailServer}:{$this->imapPort}/imap/ssl}".$folder;
		}
		
		@syslog(LOG_INFO, "imap open, mail link: ".$this->mailLink.", user: ".$this->mailUser.", passwd: ".$this->mailPasswd);
		$this->mailBox = imap_open($this->mailLink, $this->mailUser, $this->mailPasswd);
		$lasterr = imap_last_error();
		
		//$_SESSION["mailBox"] = $this->mailBox;

		//ob_start();
		//var_dump($this->mailBox);
		//$tmp = ob_get_contents();
		//ob_end_clean();
		//@syslog(LOG_ERR, 'EMFS imap open: '.$tmp);

		if(empty($lasterr) == false){
			@syslog(LOG_INFO, "imap open failed, error: ".$lasterr);
			return false;				
		}
		return $this->mailBox;
	}

	public function TestMailBox($hd)
	{
		//ob_start();
		//var_dump($hd);
		//var_dump($this->mailBox);
		//$tmp = ob_get_contents();
		//ob_end_clean();
		//@syslog(LOG_ERR, 'EMFS mail box test: '.$tmp);
	}
	
	/*
	 * 	Return TRUE or FALSE
	 */
	public function CreateFolder($folder)
	{
		return imap_createmailbox($this->mailBox, $folder);
	}
	
	/*
	 *	Set MIME header
	 * 	$key: MIME头
	 * 	$value: MIME体
	 * 	附：$key有 "remail", "return_path", "date", "from", "reply_to", "in_reply_to", "subject", "to", "cc", "bcc", "message_id" and "custom_headers" 
	 */
	public function SetAttribute($key, $value)
	{
		$this->mimeHeaders[$key] = $value;

		//ob_start();
		//var_dump($this->mimeHeaders);
		//$tmp = ob_get_contents();
		//ob_end_clean();
		//@syslog(LOG_ERR, 'EMFS SetAttribute, key: '.$key.', value: '.$value.', headers: '.$tmp);
	}
	
	public function GetAttribute($key)
	{
		return $this->mimeHeaders[$key];
	}
	
	public function CreateFile()
	{
		// 注意清空这两个
		$this->mimeHeaders = array();
		$this->parts = array();
	}
	
	public function OpenFile($mailuid)
	{
		// 注意清空这两个
		$this->mimeHeaders = array();
		$this->parts = array();
		
		$this->msgno = imap_msgno($this->mailBox, $mailuid);
		$this->mimeHeaders = imap_fetchheader($this->mailBox, $msgno);
	}
	
	/*
	 * 	成功返回邮件UID
	 */
	public function SaveFile()
	{
		//@syslog(LOG_INFO, "Save file, link: ".$this->mailLink.", user: ".$this->mailUser.", passwd: ".$this->mailPasswd);
		//if(!isset($this->mailBox) or $this->mailbox == NULL) 
		//	$this->mailBox = imap_open($this->mailLink, $this->mailUser, $this->mailPasswd);
		//$this->mailBox = $_SESSION["mailBox"];
		//ob_start();
		//echo "Mail Box:\n";
		//var_dump($this->mailBox);
		//echo "MIME Headers:\n";
		//var_dump($this->mimeHeaders);
		//echo "Parts, count: ".count($this->parts)."\n";
		////var_dump($this->parts);
		//$tmp = ob_get_contents();
		//ob_end_clean();
		//@syslog(LOG_ERR, 'EMFS save file before \'append\': '.$tmp);

		// object should convert to array
		$headers = array();
		foreach($this->mimeHeaders as $key => $val)
		{
			$headers[$key] = $val;
		}
		$body = array();
		foreach($this->parts as $key => $val)
		{
			$body[$key] = $val;
		}

		ob_start();
		//$imap_cont = imap_mail_compose($this->mimeHeaders, $this->parts);
		$imap_cont = imap_mail_compose($headers, $body);
		$lasterr = imap_last_error();
		@syslog(LOG_INFO, "imap append, mail link: ".$this->mailLink.", content size: ".strlen($imap_cont).", error: ".$lasterr);
		imap_append($this->mailBox, $this->mailLink, $imap_cont);
		$lasterr = imap_last_error();
		if(empty($lasterr) == false){
			@syslog(LOG_INFO, "imap append failed, error: ".$lasterr);
			return false;
		}

		$tmp = ob_get_contents();
		ob_end_clean();
		@syslog(LOG_ERR, 'EMFS save file after \'append\': '.$tmp);

		$check = imap_check($this->mailBox);
		$uid = imap_uid($this->mailBox, $check->Nmsgs);
		return $uid;
	}
	
	public function Read()
	{
		$data = imap_fetchbody($this->mailBox, $this->msgno, 1);
		return $data;
	}
	
	public function Write($data)
	{
		ob_start();

		$part["type"] = TYPEAPPLICATION;
		$part["encoding"] = ENCBINARY;
		$part["subtype"] = "octet-stream";
		$part["contents.data"] = $data;
		$this->parts[] = $part;		

		$tmp = ob_get_contents();
		ob_end_clean();
		@syslog(LOG_ERR, 'EMFS Write: '.$tmp);
	}
	
	public function CloseFile()
	{
		// 	Noting to do
	}
	
	public function Close()
	{
		if(isset($this->mailBox)){
			imap_close($this->mailBox);
		}
	}
	
	function IsConnected(){
		return imap_ping($mailBox);
	}
}

class TaskData extends Stackable
{
	//public $data;
    //public function __construct($data){
	//	$this->data = $data;
	//}
    public function run(){}
}

class EMFSTaskThread extends Thread{

	//var $user;  // reference of 'global $user'
	//var $conf;  // reference of 'global $conf'	
	var $emfs;
	var $task; // save source file path, every file is a task. 不能使用array_push, array_pop之类的函数，原因未知
	
	var $mutex;// mutex for '$task'
	var $delete_flag;
	
	// 用户邮箱IMAP信息
	var $imap_server;
	var $imap_user;
	var $imap_passwd;
	var $imap_port;
	var $imap_ssl;

	//public $mysql_hd;
	
	// @param TaskData $task_data, 线程中使用数组必须这样使用
	public function __construct($task_data)
	{
		@syslog(LOG_INFO, "New EMFS task thread creating.");
		$this->task = $task_data;
		$this->mutex = Mutex::create();
		$this->delete_flag = 0;
		//$this->mysql_hd = $db_hd;
		//$this->CheckEMFS(); //
	}

	public function __destruct()
	{		
		Mutex::destroy($this->mutex);
	}

	public function run()
	{
		@syslog(LOG_INFO, "EMFS task thread running ...");
		$idle_time = 0;
		$usleep_time = 100000; // microsecond
		$max_usleep_time = 60000000; // 1 minute

		//ob_start();
		//$this->mysql_hd = db_open();
		db_open();
		//var_dump($this->mysql_hd);
		//echo "posix uid: ".posix_getuid()."\n";
		//echo "posix gid: ".posix_getgid()."\n";
		//echo "my uid: ".getmyuid()."\n";
		//$tmp = ob_get_contents();
		//ob_end_clean();
		//LogWrite(EMFS_LOG_DEBUG, "call db_open, tmp:".$tmp);

		while(true){
			$task_item = $this->GetTask();
			if(false != $task_item){
				//@syslog(LOG_INFO, "Do task, task: ".$task_item);
				@syslog(LOG_INFO, "Do task");
				$task_obj = unserialize($task_item); 
				$this->DoUpload($task_obj);
				$idle_time = 0;
			}else{
				usleep($usleep_time);
				$idle_time += $usleep_time;
				if($idle_time > $max_usleep_time){
					$this->delete_flag = 1;
					@syslog(LOG_INFO, "task thread delete flag set.");
					break;
				} 
			}
		}
		@syslog(LOG_INFO, "task thread \'run\' complete.");
		db_close();
	}
	
	/* $task_obj is same as $photoinfo of 'photo_upload' trigger event */
	public function DoUpload($task_obj)
	{
		global $MAX_MAIL_FILE_SIZE;
		$MAX_MAIL_FILE_SIZE = 4194304; // 4MB, 每封邮件存储文件的最大大小
		// upload file to imap
		@syslog(LOG_INFO, "EMFS task thread uploading ...");

		// check connection
		if($this->CheckEMFS($task_obj) == false){
			@syslog(LOG_INFO, "EMFS imap connect error.");
			return false;
		}

		//$mb = new TaskData('');
		//$this->emfs->SetVar("mailBox", $mb);

		// file name, file total size, file part size, file md5, file owner
		// last mail id
		$mbox = $this->emfs->Open($task_obj["mail_dir"]);
		if(false == $mbox)
		{
			@syslog(LOG_ERR, 'EMFS open failed. ');
			return false;
		}
		//$this->emfs->TestMailBox($mbox);
		//ob_start();
		//var_dump($this->emfs);
		//$tmp = ob_get_contents(); 
		//ob_end_clean();
		//@syslog(LOG_INFO, "emfs object after check: ".$tmp);

		@syslog(LOG_INFO, "mail dir: ".$task_obj["mail_dir"]);

		$fsize = filesize($task_obj["src_img_file"]);
		$readsize = 0;
		$ftype = end(explode('.', $task_obj["original_filename"]));
		$last_mailid = -1;
		$mailids = "";
		$random_flag = 0;
		$trunk_size = 1048576;
		$random_data = rand8();
		@syslog(LOG_INFO, 'to open source file: '.$task_obj["source_filepath"].", src file:".$task_obj["src_img_file"]);
		$fh = fopen($task_obj["src_img_file"], "r");
		if($fh == false){
			$file_info = array("mailids" => $mailids, "status" => 3);
			@syslog(LOG_ERR, 'Upload source file open failed. ');
			update_file_info($task_obj["image_id"], $file_info);
			return false;
		}

		@syslog(LOG_INFO, 'open source file OK.');

		if(isset($task_obj["th_img_file"])){
			$th_img_cont = file_get_contents($task_obj["th_img_file"]); // 缩略图存于原图和网络查看图的MIME头里
		}

		//ob_start();
		//echo "file size: ";
		//var_dump($fsize);
		//var_dump($readsize);
		//$tmp = ob_get_contents();
		//ob_end_clean();
		@syslog(LOG_ERR, 'imap upload, filesize: '.$fsize);

		while($readsize < $fsize)
		{
			$this->emfs->SetAttribute("EMFS", "1");
			$this->emfs->SetAttribute("FNAME", $task_obj["original_filename"]);
			$this->emfs->SetAttribute("FTYPE", $ftype);
			$this->emfs->SetAttribute("FSIZE", $fsize);
			$this->emfs->SetAttribute("LAST-MAILID", $last_mailid);
			$this->emfs->SetAttribute("FOWNER", $task_obj["owner"]);
			$this->emfs->SetAttribute("FMD5", $task_obj["original_md5sum"]);
			if(isset($th_img_cont)) $this->emfs->SetAttribute("THUMBNAIL", imap_binary($th_img_cont));


			$sending_data_size = 0;
			if($fsize - $readsize > $MAX_MAIL_FILE_SIZE)
			{
				$sending_data_size = $MAX_MAIL_FILE_SIZE;
			}else{
				$sending_data_size = $fsize - $readsize;
			}

			@syslog(LOG_ERR, 'filesize: '.$fsize.', readsize: '.$readsize.', sending data size: '.$sending_data_size.', trunk size: '.$trunk_size.', Max mail file size: '.$MAX_MAIL_FILE_SIZE);

			$this->emfs->SetAttribute("PSIZE", $sending_data_size);
			$trunk_read_size = 0;
			while($trunk_read_size < $sending_data_size)
			{
				@syslog(LOG_ERR, 'trunk read size: '.$trunk_read_size.', trunk size: '.$trunk_size);
				$data = fread($fh, $trunk_size);
				if($data == false){
					fclose($fh);
					$file_info = array("mailids" => $mailids, "status" => 3);
					update_file_info($task_obj["image_id"], $file_info);
					return false;
				}
				$trunk_read_size += strlen($data);
				if($random_flag == 0){
					$data = $random_data.$data;
				}
				$this->emfs->Write($data);
			}
			$last_mailid = $this->emfs->SaveFile();
			$mailids = $mailids.$last_mailid.":";
			$readsize += $sending_data_size;
		}
		// update database table
		$file_info = array("mailids" => $mailids, "status" => 1);
		update_file_info($task_obj["image_id"], $file_info);
		fclose($fh);

		/* Upload network view image file if exist. need code here */

		return true;
	}

	public function SetTask($task_msg)
	{
		Mutex::lock($this->mutex);
		@syslog(LOG_INFO, "1 task size: ".count($this->task).", new task: ".$task_msg);
		$this->task[] = $task_msg;
		@syslog(LOG_INFO, "2 task size: ".count($this->task));
		Mutex::unlock($this->mutex);
	}
	
	//
	public function GetTask()
	{
		Mutex::lock($this->mutex);
		//@syslog(LOG_INFO, "3 task size: ".count($this->task));

		if(isset($this->task) and count($this->task) > 0){
			foreach($this->task as $i => $val)
			{
				$task_item = $val;
				unset($this->task[$i]);
			}
			if(isset($i)) unset($i);
			if(isset($val)) unset($val);
		}else{
			$task_item = false;
		}

		if($task_item != false) @syslog(LOG_INFO, "5 task size: ".count($this->task).", task item: ".$task_item);
		Mutex::unlock($this->mutex);
		return $task_item;
	}
	
	public function CheckEMFS($task_obj)
	{
		if(!isset($task_obj) or $task_obj == NULL){
			@syslog(LOG_ERR, "\$task_obj can't be NULL [EMFS::checkEMFS].");
			return false;
		}
		//@syslog(LOG_DEBUG, "checkEMFS");
		@syslog(LOG_INFO, "checkEMFS ...");
		//var_dump($this->emfs);

		if(!isset($this->emfs) or $this->emfs == NULL){
			@syslog(LOG_INFO, "checkEMFS - emfs is NULL");
			
			// get email
			list($this->imap_user, $this->imap_passwd, $this->imap_server, $this->imap_port) = $mail_info = get_mail_info($task_obj["uid"]);

			// Note: SSL
			//list($mail, $passwd, $imapserver, $imapport) = pwg_db_fetch_row($result);
			//list($this->imap_user, $this->passwd, $this->imap_server, $this->imap_port) = pwg_db_fetch_row($mail_info);
			//@syslog(LOG_INFO, "mail info for emfs, server:".$this->imap_server.", port: ".$this->imap_port.", user: ".$this->imap_user.", passwd: ".$this->imap_passwd);
			// need code here, $passwd 有加密的话，需要解密
			$this->emfs = new EMFS($this->imap_server, $this->imap_user, $this->imap_passwd, $this->imap_port, $this->imap_ssl);
			//ob_start();
			//var_dump($this->emfs);
			//$tmp = ob_get_contents(); 
			//ob_end_clean();
			//@syslog(LOG_INFO, "emfs object while check: ".$tmp);

			//@syslog(LOG_INFO, "emfs: ".$emfs);

		}else if($this->emfs->IsConnected() == NULL or !$this->emfs->IsConnected()){
			//@syslog(LOG_INFO, "checkEMFS - check connection ");
			// check imap connection
			//$emfs = new EMFS($this->imap_server, $this->imap_user, $this->imap_passwd, $this->imap_port, $this->imap_ssl);
			//是否连接与EMFS::Open的处理有关，这里应该不需要
		}else{
			//@syslog(LOG_INFO, "checkEMFS nothing.");
			// send heart beat is not needed, imap_ping() have done this. 
		}
		//@syslog(LOG_INFO, "checkEMFS end");
		return true;
	}
}

class ThreadWorkspace
{
	public $task_thread_pool; // array("sfobj" => $photoinfo, "emfs_thd" => object); 
	// array("uid" => string, "imgid" => string, "sfpath" => string, "emfs_thd" => object); element structure sample of $task_thread_pool
	var $mutextw;
	var $mysql_hd;
	
	function __construct($thd_pool){
		$this->mutextw = Mutex::create();
		//$this->task_thread_pool = $thd_pool;
		$this->task_thread_pool = array();
		//$this->mysql_hd = db_open();

		//	ob_start();
		//	var_dump($this->mysql_hd);
		//	$tmp = ob_get_contents(); 
		//	ob_end_clean();
		//	@syslog(LOG_INFO, "mysql open: ".$tmp);
	}

	/*
	 *	Search if task thread is created of the user
	 *
	 *	@param string $user_id
	 *	@return (array index | false)
	 *
	 *	Note: delete invalid task thread
	 */
	function task_search($user_id)
	{
		//global $g_thd_pool;
		Mutex::lock($this->mutextw);
		$pool_size = count($this->task_thread_pool);
		@syslog(LOG_INFO, "task thread search, size: ".count($this->task_thread_pool));//.", global pool size: ".count($g_thd_pool));
		$flag = 0;
		$idx = -1;

		if(isset($this->task_thread_pool) and count($this->task_thread_pool) > 0){
			foreach($this->task_thread_pool as $i => $val)
			{
				//ob_start();
				//@syslog(LOG_INFO, "emfs_thd object destoryed? - ".$this->IsDestroyed($val["emfs_thd"]));
				//if(isset($val["emfs_thd"]) and $val["emfs_thd"] != NULL){
				//	//var_dump($val);
				//	echo "emfs_thd object is fine.\n";
				//}else{
				//	echo "emfs_thd object is destroyed.\n";
				//}
				//$tmp = ob_get_contents();
				//ob_end_clean();
				//@syslog(LOG_INFO, "task search, emfs thd: ".$tmp);
				if(!isset($val["emfs_thd"]) or $val["emfs_thd"] == NULL or $this->IsDestroyed($val["emfs_thd"]))
if(isset($val["uid"]) and strcmp($val["uid"], $user_id) == 0)
				{
					unset($this->task_thread_pool[$i]); // 清除长时间空闲的线程
				//}else if(!isset($val["emfs_thd"]) or $val["emfs_thd"] == NULL)// and $val["emfs_thd"]->delete_flag == 1)
				}else if(isset($val["uid"]) and strcmp($val["uid"], $user_id) == 0)
				{
					$flag = 1;
					$idx = $i;
					break;
				}
			}
			if(isset($i)) unset($i);
			if(isset($val)) unset($val);
		}

		Mutex::unlock($this->mutextw);
	
		//@syslog(LOG_INFO, "task search result: ".$idx);
		return $idx;
	}

	// 判断对象是否销毁
	function IsDestroyed($obj)
	{
		$flag = false;
		ob_start();
		try{
			var_dump($obj);
		}catch(RuntimeException $e){
			$flag = true;
			//echo "Exception: ".$e."\n";
		}
		//$tmp = ob_get_contents();
		ob_end_clean();
		//@syslog(LOG_INFO, "try catch runtime excetion: ".$tmp);
		return $flag;
	}

	function AddThreadToPool($task_thd)
	{
		Mutex::lock($this->mutextw);
		$this->task_thread_pool[] = $task_thd;
		@syslog(LOG_INFO, "2 add task thread: ".count($this->task_thread_pool));
		Mutex::unlock($this->mutextw);
	}
	
	function task_alloc($task_msg)
	{
		$task_obj = unserialize($task_msg);
		$uid_key = $this->task_search($task_obj["uid"]); 
		//syslog(LOG_INFO, "task search: $uid_key");
		if($uid_key == -1){
			$task_arr = new TaskData('');
			//$mysql_dh = new TaskData('');
			//$emfs_thd = new EMFSTaskThread($mysql_hd, $task_arr);
			$emfs_thd = new EMFSTaskThread($task_arr);
			$emfs_thd->start();

			//@syslog(LOG_INFO, 'image id = '.$task_obj["image_id"]);
			$item = array("uid" => $task_obj["uid"], "imgid" => $task_obj["image_id"], "emfs_thd" => $emfs_thd);
			$this->AddThreadToPool($item);
			$emfs_thd->SetTask($task_msg);
			@syslog(LOG_INFO, "New task thread, user id: ".$item["uid"].", image id: ".$item["imgid"]);;
		}else{
			$this->task_thread_pool[$uid_key]["emfs_thd"]->SetTask($task_msg);
			@syslog(LOG_INFO, "Task thread exists, user id: ".$task_obj["uid"].", image id: ".$task_obj["image_id"]);
		}
	}
	

}

function do_task()
{
	// upload thread
	$task_data = new TaskData('');
	$thdw = new ThreadWorkspace($task_data);
	//$ret = LogWrite(EMFS_LOG_INFO, "Task server start.");
	//@syslog(LOG_INFO, "thread begain");
	task_consume(array($thdw, "task_alloc"));
}

function rand8()
{
	$a = rand(10, 99);
	$b = $a;
	$a = rand(10, 99);
	$b += $a * 100;
	$a = rand(10, 99);
	$b += $a * 10000;
	$a = rand(10, 99);
	$b += $a * 1000000;
	return $b;
}

if(
	(isset($_GET["param"]) and $_GET["param"] == "task") 
	or 
	(count($argv) > 1 and $argv[1] == "task")
){
	//global $g_thd_pool;
	@syslog(LOG_INFO, "EMFS upload task server starting... [".posix_getpid()."]");
	//@syslog(LOG_INFO, "current dir in emfs: ".getcwd());
	posix_setuid(48);
	//file_put_contents("/tmp/emfs.pid", posix_getpid());
	file_put_contents("emfs.pid", posix_getpid());
	//echo "posix uid: ".posix_getuid()."\n";
	//echo "my uid: ".getmyuid()."\n";
	$ret = LogOpen();
	if($ret == false) @syslog(LOG_ERR, "EMFS log open failed.");
	//$ret = LogWrite(EMFS_LOG_ERROR, "Oh my god");
	do_task();
}	

?>
