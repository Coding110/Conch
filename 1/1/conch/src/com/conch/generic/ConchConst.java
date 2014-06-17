package com.conch.generic;

public class ConchConst {
	
	// Cookie
	public static final String COOKIE_UN = "username";
	
	// Email custom MIME header
	public static final String FILENAME = "FNAME"; // 真实文件名，即用户看到的文件名。
	public static final String LINK = "LINK"; // 若文件由多封邮件组成，表示上一存储的邮件ID，否则设为－1。
	public static final String FILESIZE = "FSIZE"; // 文件总大小，若文件由多封邮件组成，为多封邮件大小的总和。
}
