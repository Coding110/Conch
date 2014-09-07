<?php

/*
 *	EMFS: Email file system (IMAP)
 *	读文件: Open -> OpenFile -> [ GetAttribute ->] Read -> CloseFile -> Close
 *	写文件：Open -> CreateFile -> SetAttribute -> Write -> CloseFile -> Close
 *	修改文件：不支持
 * 	新建文件夹：Open -> CreateFolder -> Close *	
 * 	
 * 	附：注意检查与服务器连接的有效性
 * 
 */

class EMFS{
	var $mailServer;
	var $mailLink;
	var $mailUser;
	var $mailPasswd;
	var $imapPort;
	var $ssl;
	
	var $mailBox;
	
	var $mimeHeaders;
	var $parts;
	var $msgno;
	
	/*
	 * 	构造函数
	 */
	function __construct($server, $user, $password, $port = 143, $ssl = false)	
	{
		//echo "Open __construct.<br>\n";
		//echo "server: $server, user: $user, passwd: $password, port: $port, ssl: $ssl\n";
		
		$this->mailServer = $server;
		$this->mailUser = $user;
		$this->mailPasswd = $password;
		$this->imapPort = $port;
		$this->ssl = $ssl;
		
	}	
	
	/*
	 * 	析造函数
	*/
	function __destruct()
	{
		//echo "destruct.\n";
		if(isset($this->mailBox)){
			imap_close($this->mailBox);
		}
	}
	
	/*
	 * 	打开指定的邮箱（文件夹）
	 */
	function Open($folder)
	{
		if($this->ssl == false){
			$this->mailLink = "{{$this->mailServer}:{$this->imapPort}}INBOX}";
		}else{
			$this->mailLink = "{{$this->mailServer}:{$this->imapPort}/imap/ssl}INBOX}";
		}
		
		$this->mailBox = imap_open($this->mailLink, $this->mailUser, $this->mailPasswd);
		$lasterr = imap_last_error();
		
		if(empty($lasterr) == false){
			return false;				
		}
		return true;
	}
	
	/*
	 * 	Return TRUE or FALSE
	 */
	function CreateFolder($folder)
	{
		return imap_createmailbox($this->mailBox, $folder);
	}
	
	/*
	 *	Set MIME header
	 * 	$key: MIME头
	 * 	$value: MIME体
	 * 	附：$key有 "remail", "return_path", "date", "from", "reply_to", "in_reply_to", "subject", "to", "cc", "bcc", "message_id" and "custom_headers" 
	 */
	function SetAttribute($key, $value)
	{
		$this->mimeHeaders[$key] = $value;
	}
	
	function GetAttribute($key)
	{
		return $this->mimeHeaders[$key];
	}
	
	function CreateFile()
	{
		// 注意清空这两个
		$this->mimeHeaders = array();
		$this->parts = array();
	}
	
	function OpenFile($mailuid)
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
	function SaveFile()
	{
		imap_append($this->mailBox, $this->mailLink, imap_mail_compose($this->mimeHeaders, $this->parts));
		if(empty(imap_last_error()) == false){
			return -1;
		}
		$check = imap_check($this->mailBox);
		$uid = imap_uid($this->mailBox, $check->Nmsgs);
		return $uid;
	}
	
	function Read()
	{
		$data = imap_fetchbody($this->mailBox, $this->msgno, 1);
		return $data;
	}
	
	function Write($data)
	{
		$part["type"] = TYPEAPPLICATION;
		$part["encoding"] = ENCBINARY;
		$part["subtype"] = "octet-stream";
		$part["contents.data"] = $data;
		$this->parts[] = $part;		
	}
	
	function CloseFile()
	{
		// 	Noting to do
	}
	
	function Close()
	{
		if(isset($this->mailBox)){
			imap_close($this->mailBox);
		}
	}
	
	function IsConnected(){
		return imap_ping($mailBox);
	}
}


/*
 *  EMFS Test
 */
/*
$EMFS_TEST = 1;
if(isset($EMFS_TEST)){

	$emfs = new EMFS("a", "b", "c");
	//$emfs->Open("a", "b", "c");
	
}else{
	//echo "Nothing to do.\n";
}
*/


/*
 * 	EMFS后台处理线程
 */
/*
class EMFSTask{
	
	// 任务列表，及其锁
	
	// 每个用户的IMAP会话
	
	// 线程池
	
	function AddTask();
}

class EMFSTaskAllocThread extends Thread{
	
}

class EMFSTaskThread extends Thread{	
	
	public function __construct(){
		
	}
	
	public function run(){

	}
}
*/


/*
 * 		多线程及线程池实例
 * 
 * 
 */

class WorkerClass extends Worker{

	protected static $worker_id_next = -1;
	protected $worker_id;
	protected $config;

	public function __construct(){
		$this->worker_id = ++static::$worker_id_next;    // static members are not avalable in thread but are in 'main thread'
	}

	public function run(){
		global $worker_id;
		$worker_id = $this->worker_id;
		echo "working context {$worker_id} is created!\n";
	}

}

class Task extends Stackable{    // Stackable still exists, it's just somehow dissappeared from docs (probably by mistake). See older version's docs for more details.
	
	var $user;  // reference of 'global $user'
	var $conf;  // reference of 'global $conf'
	
	var $emfs;

	public function __construct($emfs){
		$this->emfs = $emfs;
	}

	public function run(){
		global $worker_id;
		echo "task is running in {$worker_id}\n";
		usleep(mt_rand(1,100)*10000);
	}
	
	function GetEMFS(){
		
	}

}

class PoolClass extends Pool{
	public function worker_list(){
		if ($this->workers !== null)
			return array_keys($this->workers);
		return null;
	}
}

class EMFSTaskThread extends Thread{

	var $user;  // reference of 'global $user'
	var $conf;  // reference of 'global $conf'	
	var $emfs;
	var $task = array(); // save source file path, every file is a task
	
	var $mutex;// mutex for '$task'
	
	// 用户邮箱IMAP信息
	var $imap_server = "imap.qq.com";
	var $imap_user = "1485084328@qq.com";
	var $imap_passwd = "px9537hua";
	var $imap_port = "143";
	var $imap_ssl = false;
	
	public function __construct($user, $conf, $source_filepath)
	{
		$this->user = $user;
		$this->conf = $conf;
		array_push($this->task, $source_filepath);
		$mutex = Mutex::create();
		
		CheckEMFS();
	}
	
	public function __destruct()
	{		
		$mutex->destroy();
	}

	public function run()
	{
		$file = $this->GetTask();
		if(isset($file)){
			
		}else{
			
		}
	}
	
	public function SetTask($source_filepath)
	{
		$mutex->lock();
		array_push($this->task, $source_filepath);
		$mutex->unlock();
	}
	
	public function GetTask()
	{
		$mutex->lock();
		return array_pop($this->stack);
		$mutex->unlock();
	}
	
	public function CheckEMFS()
	{
		// Need code here
		
		if(isset($_SESSION['becktu'])){
			$this->emfs = $_SESSION['becktu']['emfs'];
		}
		
		if(!isset($emfs)){
			// 用户邮箱IMAP信息
			$imap_server = "imap.qq.com";
			$imap_user = "1485084328@qq.com";
			$imap_passwd = "px9537hua";
			$imap_port = "143";
			$imap_ssl = false;
			
			$query = 'SELECT * from '.EMFS_MAILS_TABLE.' WHERE uid = '.$user['id'].';';
			pwg_query($query);
			
			$emfs = new EMFS($imap_server, $imap_user, $imap_passwd, $imap_port, $imap_ssl);
		}
	}
}

function EMFS_upload_file($source_filepath)
{
	global $user, $conf;
	
	if(isset($_SESSION['becktu'])){
		$task_thread = $_SESSION['becktu']['thread'];
	}
	
	if(isset($task_thread)){
		$task_thread->SetTask($source_filepath);
	}else{
		$task_thread = new EMFSTaskThread($user, $conf, $emfs, $source_filepath);			
		$_SESSION['becktu']['thread'] = $task_thread;
		$task_thread->start();
	}
}

/*

function EMFS_upload_file_1(){	
	global $user, $conf;
	global $emfs_task_pool;
	
	$pool_size = 5; // 最优线程池大小需测试来确定，暂时设5
	
	// 用户邮箱IMAP信息
	$imap_server = "imap.qq.com";
	$imap_user = "1485084328@qq.com";
	$imap_passwd = "px9537hua";
	$imap_port = "143";
	$imap_ssl = false;
	
	// 每个用户一个线程，否则IMAP连接会混乱
	
	if(!isset($emfs_task_pool)){
		$emfs_task_pool = new PoolClass($pool_size, 'WorkerClass');
		error_log("initiailize threads pool instance.");
	}else{
		if(isset($_SESSION['emfs'])){
			$emfs = $_SESSION['emfs'];
		}else{
			$emfs = new EMFS($imap_server, $imap_user, $imap_passwd, $imap_port, $imap_ssl);
		}
		$emfs_task_pool->sumit(new Task());
	}
	
}

*/

?>