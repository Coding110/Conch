<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8" import="java.sql.*" import="java.io.PrintStream" 
	import="java.util.Calendar" import="java.text.SimpleDateFormat" %>


<%!
Connection conn;
Statement stmt;
PrintStream out = System.out;

public void jspInit(){
	super.jspInit();

	try{
		openDB();
		createTables();
	}catch(Exception e){
		System.out.print("error: " + e.getMessage() + "<br>");
	}

}

public void jspDestroy(){
	super.jspDestroy();

	try{
		closeDB();
	}catch(Exception e){
		System.out.print("error: " + e.getMessage() + "<br>");
	}

}
	
//int openDB(JspWriter out, HttpServletResponse response) throws Exception{
int openDB() throws Exception{
 	String host = "www.pxhua.cn";
 	String db  = "conch";
 	String user = "conch";
 	String passwd = "987";
 	String port = "3306"; 

 	//PrintStream out = System.out;

 	try{
 	
	 	String dburl = "jdbc:mysql://" + host + ":" + port + "/" + db + "?user=" + user + "&password=" + passwd + "&useUnicode=true&characterEncoding=UTF-8";
	 	//Class.forName("org.gjt.mm.mysql.Driver").newInstance();
	 	Class.forName("com.mysql.jdbc.Driver").newInstance(); 	
	 	conn = DriverManager.getConnection(dburl);
	 	stmt = conn.createStatement(ResultSet.TYPE_SCROLL_SENSITIVE, ResultSet.CONCUR_READ_ONLY);
	 	out.println("MySQL Connect success!");	 	 	
	 	
 	}catch (SQLException se){
 		out.println("error: " + se.getErrorCode() + " - " + se.getMessage() + "<br>");
 	}catch(IllegalAccessException iae){
 		out.println("error: " + iae.getMessage() + "<br>");
 	}catch(ClassNotFoundException cnfe){
 		out.println("error: " + cnfe.getMessage() + "<br>");
 	}catch(InstantiationException ite){
 		out.println("error: " + ite.getMessage() + "<br>");
 	}   		
	
 	return 0;
 }

int createTables() throws Exception{
	boolean tablebool;
 	int err = 0;
 	
 	String sql = new String();
 	String prefix = "select * from ";
 	String table = "UserInfo";
 	
 	//PrintStream out = System.out;
 	
 	// Create table 'UserInfo'
 	try{ 
 		sql = prefix + table;
 		tablebool = stmt.execute(sql); 
 		out.println("Table '" + table + "' exist? - " + tablebool);
 	}catch(SQLException se){
 		err = se.getErrorCode();
 		out.println("error: " + se.getErrorCode() + " - " + se.getMessage()); 		
 	}
 	
 	if(err == 1146){
 		try{
 			sql = "CREATE TABLE "+ table + "(" +
 						"uid INT NOT NULL," +
 						"regname VARCHAR(32) NOT NULL," +
 						"regemail VARCHAR(64) NOT NULL," +
   						"passwd TEXT NOT NULL," +
 						"regtime DATETIME," +
 						"realname TINYTEXT," +
 						"sex CHAR," +
 						"birthday DATE," +
 						"city TINYTEXT," +
 						"UNIQUE(regname)," +
 						"UNIQUE(regemail)," +
 						"PRIMARY KEY(uid)" +
 						")";
 			out.print(sql + "<br>");
 			tablebool = stmt.execute(sql); 
 		}catch(SQLException se){
 	 		out.println("Error: " + se.getErrorCode() + " - " + se.getMessage());
 	 	}
 	}
 	
	// Create table 'PhotoMail'
	table = "";
 	table = "PhotoMail";
	err = 0;
  	try{ 
  		sql = prefix + table;
  		//out.println("prefix: " + prefix + ", table: " + table);
  		//out.println("SQL: " + sql);
  		tablebool = stmt.execute(sql); 
  		out.println("Table '" + table + "' exist? - " + tablebool);
  	}catch(SQLException se){
  		err = se.getErrorCode();
  		out.println("error: " + se.getErrorCode() + " - " + se.getMessage()); 		
  	}
  	
  	if(err == 1146){
  		try{
  			sql = "CREATE TABLE "+ table + "(" +
  					"uid INT NOT NULL," +
   					"photomail VARCHAR(128) NOT NULL," +
   					"passwd TEXT NOT NULL," +
   					"imapserver VARCHAR(128) NOT NULL," +
   					"imapport INT NOT NULL," +
   					"UNIQUE(photomail)," +
   					"PRIMARY KEY (photomail)" +
   					")";
  			out.print(sql);
  			tablebool = stmt.execute(sql); 
  		}catch(SQLException se){
  	 		out.println("Error: " + se.getErrorCode() + " - " + se.getMessage());
  	 	}
  	}
  	
	// Create table 'PhotoInfo'
  	table = "PhotoInfo";
  	err = 0;
  	try{ 
  		sql = prefix + table;
  		tablebool = stmt.execute(sql); 
  		out.println("Table '" + table + "' exist? - " + tablebool);
  	}catch(SQLException se){
  		err = se.getErrorCode();
  		out.println("error: " + se.getErrorCode() + " - " + se.getMessage()); 		
  	}
  	
  	if(err == 1146){
  		try{
  			sql = "CREATE TABLE "+ table + "(" +
  						"no BIGINT NOT NULL," +
  						"pmd5 VARCHAR(36) NOT NULL," +
  						"uid INT," +		
						"photomail VARCHAR(128) NOT NULL," +
						"mailuid VARCHAR(24) NOT NULL," +
						"maildir VARCHAR(128) NOT NULL," +
						"uploadtime DATETIME NOT NULL," +
						"location VARCHAR(128)," + // upload location, for telephone
						"shareflag ENUM('0','1') NOT NULL," +
						"shareurl VARCHAR(512)," +
						"UNIQUE(no)," +
						"PRIMARY KEY(no)," +
						//"UNIQUE(shareurl)," +  // max key length is 767 bytes in MySQL
   					"INDEX(photomail)," +
						"FOREIGN KEY(photomail) REFERENCES PhotoMail(photomail)" + 						
						")";
  			out.print(sql);
  			tablebool = stmt.execute(sql); 
  		}catch(SQLException se){
  	 		out.println("Error: " + se.getErrorCode() + " - " + se.getMessage());
  	 	}
  	}
  	
	// Create table 'PhotoDirs'
  	table = "PhotoDirs";
  	err = 0;
  	try{ 
  		sql = prefix + table;
  		tablebool = stmt.execute(sql); 
  		out.println("Table '" + table + "' exist? - " + tablebool);
  	}catch(SQLException se){
  		err = se.getErrorCode();
  		out.println("error: " + se.getErrorCode() + " - " + se.getMessage()); 		
  	}
  	
  	if(err == 1146){
  		try{
  			sql = "CREATE TABLE "+ table + "(" +
  						"no BIGINT NOT NULL," +
  						"photomail VARCHAR(128) NOT NULL," +
   					"maildir TINYTEXT NOT NULL," +
						"webdir TINYTEXT NOT NULL," +
						"createtime DATETIME," +
   					"UNIQUE(no)," +
						"PRIMARY KEY(no)," +
						"FOREIGN KEY(photomail) REFERENCES PhotoMail(photomail)" +
						")";
  			out.print(sql);
  			tablebool = stmt.execute(sql); 
  		}catch(SQLException se){
  	 		out.println("Error: " + se.getErrorCode() + " - " + se.getMessage());
  	 	}
  	}
  	
	// Create table 'ADUnions'
  	table = "ADUnions";
  	err = 0;
  	try{ 
  		sql = prefix + table;
  		tablebool = stmt.execute(sql); 
  		out.println("Table '" + table + "' exist? - " + tablebool);
  	}catch(SQLException se){
  		err = se.getErrorCode();
  		out.println("error: " + se.getErrorCode() + " - " + se.getMessage()); 		
  	}
  	
  	if(err == 1146){
  		try{
  			sql = "CREATE TABLE "+ table + "(" +
  						"adid INT NOT NULL," +
  						"adunion VARCHAR(128) NOT NULL," +
  						"adweb TINYTEXT NOT NULL," +
  						"adinfo TINYTEXT," +
						"jointime DATETIME," +
   						"UNIQUE(adid)," +
   						"UNIQUE(adunion)," +
						"PRIMARY KEY(adid)" +
						")";
  			out.print(sql);
  			tablebool = stmt.execute(sql); 
  		}catch(SQLException se){
  	 		out.println("Error: " + se.getErrorCode() + " - " + se.getMessage());
  	 	}
  	}
  	
	// Create table 'AdminInfo'
  	table = "AdminInfo";
  	err = 0;
  	try{ 
  		sql = prefix + table;
  		tablebool = stmt.execute(sql); 
  		out.println("Table '" + table + "' exist? - " + tablebool);
  	}catch(SQLException se){
  		err = se.getErrorCode();
  		out.println("error: " + se.getErrorCode() + " - " + se.getMessage()); 		
  	}
  	
  	if(err == 1146){
  		try{
  			sql = "CREATE TABLE "+ table + "(" +
  						"aid INT NOT NULL," +
  						"aname VARCHAR(64) NOT NULL," +
  						"passwd TEXT NOT NULL," +
  						"privilege INT NOT NULL," +
						"addtime DATETIME," +
   						"UNIQUE(aid)," +
   						"UNIQUE(aname)," +
						"PRIMARY KEY(aid)" +
						")";
  			out.print(sql);
  			tablebool = stmt.execute(sql); 
  		}catch(SQLException se){
  	 		out.println("Error: " + se.getErrorCode() + " - " + se.getMessage());
  	 	}
  	}
  	
	// Create view 'PhotoShareInfo'
  	table = "PhotoShareInfo";
  	err = 0;
  	try{ 
  		sql = prefix + table;
  		tablebool = stmt.execute(sql); 
  		out.println("View '" + table + "' exist? - " + tablebool);
  	}catch(SQLException se){
  		err = se.getErrorCode();
  		out.println("error: " + se.getErrorCode() + " - " + se.getMessage()); 		
  	}
  	
  	if(err == 1146){
  		try{
  			sql = "CREATE VIEW "+ table + " AS " +   						
   				"SELECT no,pmd5,uid,photomail,mailuid,maildir,uploadtime,shareurl " +
  					"FROM PhotoInfo " + 
   				"WHERE shareflag = 1";
  			out.print(sql);
  			tablebool = stmt.execute(sql); 
  		}catch(SQLException se){
  	 		out.println("Error: " + se.getErrorCode() + " - " + se.getMessage());
  	 	}
  	}
  	
	return 0;
}
 	
int closeDB() throws Exception
{
	stmt.close();
	conn.close();
	return 0;
}

int CheckUser(String username, String passwd) throws Exception
{
	String table = "UserInfo";
	String sql = "SELECT uid,regname,passwd FROM " + table + 
					" WHERE regname='" + username + "' AND  passwd='" + passwd + "'";
	System.out.println("SQL: " + sql);
	try{
		ResultSet rs = stmt.executeQuery(sql);
		if(rs.next()){
			System.out.println("username and password is OK.");
		}else{
			System.out.println("username or password is incorrect.");
		}
	}catch(SQLException se){
  		out.println("[CheckUser] Error: " + se.getErrorCode() + " - " + se.getMessage());
		return -1;
	}

	return 0;
}

int AddUser(String user, String passwd, String regemail, String realname, char sex, Calendar birthday, String city)
throws Exception
{
	String table = "UserInfo";
	String sql = new String();
	int uid = 0;
	
	sql = "SELECT MAX(uid) FROM " + table;
	//System.out.println("SQL: " + sql);
	//ResultSet rs = new ResultSet();
	try{
		ResultSet rs = stmt.executeQuery(sql);
		rs.next();
		uid = rs.getInt(1) + 1;
		//System.out.println("MAX uid: " + uid + ", " + rs.getInt(1));
		
	}catch(SQLException se){
  		out.println("[AddUser] Error: " + se.getErrorCode() + " - " + se.getMessage());
		return -1;
	}

	Calendar timenow = Calendar.getInstance();
	SimpleDateFormat s = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss");
	String datetime = s.format(timenow.getTime());
	s = new SimpleDateFormat("yyyy-MM-dd");
	String birthdate = s.format(birthday.getTime());
	//out.println("Now time: " + datetime);
	//out.println("Birthday: " + birthdate);

	sql = "INSERT INTO " + table + " VALUES (" +
			uid + ",'" + user + "','" + regemail + "','" + passwd + "','" + 
			datetime + "','" + realname + "','" + sex + "','" + birthdate + "','" + city +
			"')";

	//System.out.println("SQL: " + sql);

	try{
		int ret = stmt.executeUpdate(sql);
		System.out.println("SQL update: " + ret);
	}catch(SQLException se){
        out.println("[AddUser] Error: " + se.getErrorCode() + " - " + se.getMessage());
	}

	return 0;
}

int ResetPassword(String username, String oldpasswd, String newpasswd)
throws Exception
{
	return 0;
}


// 这里代码比较简单，还需要考虑：
// 1.图片MD5、邮箱、邮箱ID不能同时相同。需要用存储过程来实现
// 2.photomail和maildir是否同时在PhotoDirs中 ，需要慎重，photomail可能会被删除用户删除，但记录最好不删除 
int AddPhotoInfo(String photomd5, int uid, String photomail, String mailuid, String maildir)
throws Exception
{
	String table = "PhotoInfo";
	String sql = new String();
	int no = 0;
	
	sql = "SELECT MAX(no) FROM " + table;
	System.out.println("SQL: " + sql);

	try{
		ResultSet rs = stmt.executeQuery(sql);
		rs.next();
		no = rs.getInt(1) + 1;
		System.out.println("MAX No: " + no + ", " + rs.getInt(1));
		
	}catch(SQLException se){
  		out.println("[AddPhoto] Error: " + se.getErrorCode() + " - " + se.getMessage());
		return -1;
	}
	
	Calendar timenow = Calendar.getInstance();
	SimpleDateFormat s = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss");
	String datetime = s.format(timenow.getTime());
	
	sql = "INSERT INTO " + table + " VALUES (" +
			no + ",'" + photomd5 + "'," + uid +  ",'" + photomail +"','" + mailuid + "','" +
			maildir + "','" + datetime + "','','0','')";
	
	out.println("SQL: " + sql);

	try{
		int ret = stmt.executeUpdate(sql);
		out.println("SQL update: " + ret);
	}catch(SQLException se){
        out.println("[AddPhotoInfo] Error: " + se.getErrorCode() + " - " + se.getMessage());
	}
		
	return 0;
}

int AddPhotoMail(int uid, String photomail, String password, String imapserver, int imapport)
throws Exception
{
	String table = "PhotoMail";
	String sql = new String();
	
	sql = "INSERT INTO " + table + " VALUES (" +
			uid + ",'" + photomail + "','" + password + "','" + 
			imapserver + "'," + imapport + ")";
	
	out.println("SQL: " + sql);
	
	try{
		int ret = stmt.executeUpdate(sql);
		out.println("SQL update: " + ret);
	}catch(SQLException se){
        out.println("[AddPhotoMail] Error: " + se.getErrorCode() + " - " + se.getMessage());
	}
		
	return 0;
}

int AddADUnion(String adunion, String adweb, String adinfo)
throws Exception
{
	String table = "ADUnions";
	String sql = new String();
	int adid = 0;
	
	sql = "SELECT MAX(adid) FROM " + table;
	System.out.println("SQL: " + sql);

	try{
		ResultSet rs = stmt.executeQuery(sql);
		rs.next();
		adid = rs.getInt(1) + 1;
		System.out.println("MAX No: " + adid + ", " + rs.getInt(1));
		
	}catch(SQLException se){
  		out.println("[AddPhoto] Error: " + se.getErrorCode() + " - " + se.getMessage());
		return -1;
	}
	
	Calendar timenow = Calendar.getInstance();
	SimpleDateFormat s = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss");
	String jointime = s.format(timenow.getTime());
	
	sql = "INSERT INTO " + table + " VALUES (" +
			adid + ",'" + adunion + "','" + adweb + "','" + 
			adinfo + "','" + jointime + "')";
	
	out.println("SQL: " + sql);

	try{
		int ret = stmt.executeUpdate(sql);
		out.println("SQL update: " + ret);
	}catch(SQLException se){
        out.println("[AddADUnion] Error: " + se.getErrorCode() + " - " + se.getMessage());
	}
	
	return 0;
}
%>
