<?php

include_once("common.php");

//global $conf;

function db_open()
{
	//global $conf;
	$conf['db_base'] = 'pwg81';
	$conf['db_user'] = 'root';
	$conf['db_password'] = '123456';
	$conf['db_host'] = '192.168.0.96';
	try
	{
		//@syslog(LOG_INFO, "db open, host: ".$conf["db_host"]);
		ob_start();
		$hd = db_connect($conf['db_host'], $conf['db_user'],
	                 $conf['db_password'], $conf['db_base']);
		//var_dump($hd);
		//echo "posix uid: ".posix_getuid()."\n";
		//echo "posix gid: ".posix_getgid()."\n";
		//echo "my uid: ".getmyuid()."\n";
		//$tmp = ob_get_contents();
		//ob_end_clean();
		//@syslog(LOG_INFO, "db open OK, tmp:".$tmp);
		return $hd;
	}
	catch (Exception $e)
	{
		@syslog(LOG_INFO, "db open error: ".l10n($e->getMessage()));
		return false;
	}
}

function db_connect($host, $user, $password, $database)
{
  global $mysqli;

  $port = null;
  $socket = null;

  if (strpos($host, '/') === 0)
  {
    $socket = $host;
    $host = null;
  }
  elseif (strpos($host, ':') !== false)
  {
    list($host, $port) = explode(':', $host);
  }

  $dbname = null;
  
  $mysqli = new mysqli($host, $user, $password, $dbname, $port, $socket);
  if (mysqli_connect_error())
  {
    throw new Exception("Can't connect to server");
  }
  if (!$mysqli->select_db($database))
  {
    throw new Exception('Connection to server succeed, but it was impossible to connect to database');
  }
  return $mysqli;
}

function db_query($query)
{
  global $mysqli;
  //ob_start();
  //var_dump($mysqli);
  //$tmp = ob_get_contents();
  //ob_end_clean();
  //@syslog(LOG_INFO, "db query: ".$tmp);

  $result = $mysqli->query($query);

  return $result;
}

function db_fetch_row($result)
{
  return $result->fetch_row();
}

function db_close()
{
	global $mysqli;
	return $mysqli->close();
}


/*
 *	Get email information by user id
 *
 *	@param string $user_id
 *	@return array [email, passwd, imapserver, imapport] 
 *
 */
function get_mail_info($user_id)
{
	//global $conf;
	$query = "select email,passwd,imapserver,imapport from ".EMFS_MAILS_TABLE." where uid = '".$user_id."';";
	//LogWrite(EMFS_LOG_INFO, "db query: ".$query);
	@syslog(LOG_INFO, "query: ".$query);
	$result = db_query($query);
	//LogWrite(EMFS_LOG_INFO, "db query finished. ");
	if($result == false) return false;
	//LogWrite(EMFS_LOG_INFO, "db query result 1.");
	$result = db_fetch_row($result);
	//LogWrite(EMFS_LOG_INFO, "db query result 2.");
	return $result;
}

/*
 *	Update file status in db
 *
 *	@param string $image_id
 *	@param array $img_info
 *	@return (true | false)
 *
 */
function update_file_info($image_id, $img_info)
{
	single_update_emfs(
		EMFS_FILES_TABLE,
		$img_info,
		array("fid" => $image_id)
	);	
}

/**
 * updates one line in a table
 *
 * @param string table_name
 * @param array set_fields
 * @param array where_fields
 * @param int flags - if MASS_UPDATES_SKIP_EMPTY - empty values do not overwrite existing ones
 * @return void
 */
function single_update_emfs($tablename, $set_fields, $where_fields, $flags=0)
{
  if (count($set_fields) == 0)
  {
    return;
  }

  $query = '
UPDATE '.$tablename.'
  SET ';
  $is_first = true;
  foreach ($set_fields as $key => $value)
  {
    $separator = $is_first ? '' : ",\n    ";

    if (isset($value) and $value !== '')
    {
      $query.= $separator.$key.' = \''.$value.'\'';
    }
    else
    {
      if ( $flags & MASS_UPDATES_SKIP_EMPTY )
        continue; // next field
      $query.= "$separator$key = NULL";
    }
    $is_first = false;
  }
  if (!$is_first)
  {// only if one field at least updated
    $query.= '
  WHERE ';
    $is_first = true;
    foreach ($where_fields as $key => $value)
    {
      if (!$is_first)
      {
        $query.= ' AND ';
      }
      if ( isset($value) )
      {
        $query.= $key.' = \''.$value.'\'';
      }
      else
      {
        $query.= $key.' IS NULL';
      }
      $is_first = false;
    }
    db_query($query);
  }
}

function db_2_test()
{
	$ret = db_open();
	var_dump($ret);
	$res = get_mail_info("3");
	var_dump($res);

	//@syslog(LOG_INFO, "current dir while test pwg_db: ".getcwd());
}

//db_2_test();
?>

