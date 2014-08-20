<?php

/*
 *	EMFS: Email file system (IMAP)
 *	读文件: Open -> OpenFile -> [ GetAttribute ->] Read -> CloseFile -> Close
 *	写文件：Open -> CreateFile -> SetAttribute -> Write -> CloseFile -> Close
 *	修改文件：不支持
 * 	新建文件夹：Open -> CreateFolder -> Close *	
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
}


/*
 *  EMFS Test
 */
$EMFS_TEST = 1;
if(isset($EMFS_TEST)){

	$emfs = new EMFS("a", "b", "c");
	//$emfs->Open("a", "b", "c");
	
}else{
	//echo "Nothing to do.\n";
}

?>