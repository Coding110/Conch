package com.conch.emfs;

import java.io.BufferedOutputStream;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.FileReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;
import java.util.Date;
import java.util.Properties;

import javax.activation.DataContentHandler;
import javax.activation.DataHandler;
import javax.activation.FileDataSource;
import javax.mail.Flags;
import javax.mail.Folder;
import javax.mail.Message;
import javax.mail.MessagingException;
import javax.mail.Multipart;
import javax.mail.Session;
import javax.mail.internet.MimeBodyPart;
import javax.mail.internet.MimeMessage;
import javax.mail.internet.MimeMultipart;
//import sun.jdbc.odbc.ee.DataSource;
import javax.activation.DataSource;

import com.sun.mail.iap.ProtocolException;
import com.sun.mail.imap.AppendUID;
import com.sun.mail.imap.IMAPFolder;
import com.sun.mail.imap.IMAPFolder.ProtocolCommand;
import com.sun.mail.imap.IMAPStore;


import com.sun.mail.imap.protocol.IMAPProtocol;
import com.sun.mail.util.MailLogger;




//import com.sun.image
import java.awt.*;

/*
 *		email中文件夹命名：bkt_dir_{i}, bkt_index_{i}, i为大于等于0的整数 
 * 
 * 		读文件：EMFS(...)
 * 		写文件：EMFS(...) -> CreateFile -> SetAttribute -> WritePart(byte[], int) -> SaveFile
 * 	 创建文件夹：EMFS(...) -> CreateFolder
 * 
 */
public class EMFS {

	String username;
	String password;
	String imapserver;
	int imapport;
	
	boolean isSSL;
	
	Properties prop;
	Session session;
	IMAPStore store;
	IMAPFolder folder;
	//MailLogger logger;
	
	Message currmsg;
	MimeMessage[] sendmsg;
	DataCallBack callback;
	
	Multipart mpForWritepart;
	
	HeartBeatThread hbThread;
	
	public EMFS(String username, String password, String imapserver,int imapport) throws Exception{
		if(username == null || password == null || imapserver == null || imapport <= 9){
			throw new Exception("Null parameter");
		}
		this.username = username;
		this.password = password;
		this.imapserver = imapserver;
		this.imapport = imapport;
		
		isSSL = false;
		//logger = null;
		//logger = new MailLogger(null, imapserver, isSSL, null);
		
		IampConnect();
		init();		
		
	}
	
	private int IampConnect() throws Exception{
		
		prop = System.getProperties();
        prop.put("mail.store.protocol", "imap");
        prop.put("mail.imap.host", this.imapserver);
        
        session = Session.getInstance(prop);    
        store = (IMAPStore) session.getStore("imap"); // ʹ��imap�Ự���ƣ����ӷ�����  
        store.connect(this.username, this.password);        
        
        return 0;
	}
	
	
	
	/*
	 * 	EMFS初始化
	 * 	1.检查'dir1'文件夹;
	 */
	private int init(){
		//CreateFolder("dir1");
		return 0;
	}
	
//	public boolean CreateMailDir(String maildir) throws Exception{
//		
//		folder = (IMAPFolder) store.getFolder(maildir);
//		
////		String dir = "INBOX";
////		folder = (IMAPFolder) store.getFolder(dir);
////		System.out.println(dir + "type = " + folder.getType());
//		
//		return folder.create(3);
//	}
	
	public int SetDataCallBack(DataCallBack callback)
	{
		this.callback = callback;
		return 0;
	}
	
	public int OpenFile(String maildir, long mailuid) throws Exception{
		folder = (IMAPFolder) store.getFolder(maildir);   
        folder.open(Folder.READ_WRITE);
        
        hbThread = new HeartBeatThread(folder);
		hbThread.start();
        
        currmsg = folder.getMessageByUID(mailuid);
        if(currmsg == null){        
        	return 1;
        }                
		return 0;
	}
	
	/*
	 * 	创建邮箱文件夹，命令规则：dir[i]，其中i从2开始，'dir1'为默认文件夹
	 * 	@floder: 邮箱文件夹
	 */
	public boolean CreateFolder(String folder0) throws Exception{
		
		folder = (IMAPFolder) store.getFolder(folder0);		
		return folder.create(3);
	}
	
	public int CloseFile() throws Exception{
		return 0;
	}
	
	/*
	 * 	创建邮件
	 * 	@mailfolder, 创建邮件所存放的文件夹
	 * 	@filename, 邮件主题，同属同一个文件的多封邮件在filename后加自动加1的数字，如xxx-1,xxx-2...
	 */
	public int CreateFile(String mailfolder, String filename) throws Exception{

		folder = (IMAPFolder) store.getFolder(mailfolder); 
		if(folder.exists() == false){
			folder.create(3);
		}
        folder.open(Folder.READ_WRITE);
        
        sendmsg = new MimeMessage[1];
 
        sendmsg[0] = new MimeMessage(session);
        sendmsg[0].setFrom(username);
        sendmsg[0].setRecipients(javax.mail.Message.RecipientType.TO, username);
        sendmsg[0].setSentDate(new Date());
        sendmsg[0].setFlag(Flags.Flag.SEEN, true); 
        sendmsg[0].setSubject(filename);
        
		return 0;
	}
	
//	public int SetFilename(String mailname, String filename) throws Exception{
//		sendmsg[0].setSubject(mailname);
//		sendmsg[0].setHeader("filename", filename);
//		return 0;
//	}
	
//	public int SetFile(String header, String value) throws Exception{
//		sendmsg[0].setHeader(header, value);
//		return 0;
//	}
	
	public int SetAttribute(String key, String value) throws Exception{
		sendmsg[0].setHeader(key, value);
		return 0;
	}
	
	public long SaveFile() throws Exception{
		long uid = 0;
		uid = folder.getUIDNext(); 
		System.out.println("UID Next: " + uid);
		AppendUID[] uids = folder.appendUIDMessages(sendmsg);
		System.out.println("Append end.");
		if(uid<=0){			
			if(uids.length > 0){
				uid = uids[0].uid;
				System.out.println("Append UID: " + uids[0].uid);
			}
			else System.out.println("Append UID: null");
		}
		mpForWritepart = null;
		return uid;	
	}
	
	public int Read()throws Exception{

		DataHandler dh = currmsg.getDataHandler();
		InputStream is = dh.getInputStream();
		byte buf[] = new byte[4096];
		//System.out.println("Available size: " + is.available());
		System.out.println("Total size: " + currmsg.getSize());
		int n = 0;
		String str;
		while(true){	
			
			n = is.read(buf);
			callback.ReadCallBack(buf, n);
			
			if(n <= 0) break;
			//System.out.println("read size: " + n + ", buffer len: " + buf.length);
			//buf[n] = 0;
			str = new String(buf);
			System.out.println(str);

			
		}
		return 0;
	}
	
	public int WritePart()throws Exception, IOException{
	
		char buf[] = new char[4096];
		int n = 0;
		String str;
		Multipart mp = new MimeMultipart();
		MimeBodyPart mbp;
		
		while(true){
			
			n = callback.WriteCallBack(buf, n);
			str = new String(buf);
			mbp = new MimeBodyPart();
			mbp.setText(str,"gbk");
			mbp.setContent(mp);
			//sendmsg[0].setText(str);
			
			mp.addBodyPart(mbp);
			

			if(n <= 0) break;
			System.out.println("read size: " + n + ", buffer len: " + buf.length);
			System.out.println(str);			
		}
		
		sendmsg[0].setContent(mp);
		return 0;
	}

	/*
	 * 	buf: 写入的数据。数据量大时，多次调用，通过complete参数来决定是否写入完成。
	 * 	complete: 0, 表示没完成； 1, 表示完成。
	 */
	public int WritePart(byte[] buf, int bsize, int complete)throws Exception, IOException{		
		if(mpForWritepart == null) mpForWritepart = new MimeMultipart();
		
		String str = new String(buf, 0, bsize);
		MimeBodyPart mbp = new MimeBodyPart();
		mbp.setText(str);
		//mbp.setContent(mpForWritepart);
		mpForWritepart.addBodyPart(mbp);
		
		if(complete == 1) sendmsg[0].setContent(mpForWritepart);
		return 0;
	}
	
	/*
	 * 	buf: 写入的数据。数据量大时，多次调用，通过complete参数来决定是否写入完成。
	 * 	bsize: buffer size.
	 */
	public int Write(byte[] buf, int bsize)throws Exception, IOException{
		String str = new String(buf, 0, bsize);
		sendmsg[0].setText(str);
		return 0;
	}
	
	public int WriteAttachment(String file)throws Exception, IOException{
		Multipart mp = new MimeMultipart();
		MimeBodyPart mbp = new MimeBodyPart();
		mbp.attachFile(file);
		mp.addBodyPart(mbp);
		sendmsg[0].setContent(mp);
		return 0;
	}
	
	public int WriteByFile(String file)throws Exception, IOException{
		DataSource ds = new FileDataSource(file);
		DataHandler dh = new DataHandler(ds);
		sendmsg[0].setDataHandler(dh);
		
		return 0;
	}
	
	public int GetFileSize() throws Exception{
		return currmsg.getSize();
	}

	public static void main(String argv[]){
		DoApply doapp = new DoApply();
		doapp.run();		
	}
}

class HeartBeatThread extends Thread{
	private IMAPFolder folder;
	private int gap;
	
	public HeartBeatThread(IMAPFolder folder){
		this.folder = folder;
		gap = 20;
	}
	
	public HeartBeatThread(IMAPFolder folder, int gap){
		this.folder = folder;
		this.gap = gap;
	}
	
	public void run(){
		try{
			while(true){
				doNOOP();
				sleep(gap);
			}
		}catch(MessagingException me){
			me.printStackTrace();
		} catch (InterruptedException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
	}
	
	private void doNOOP() throws MessagingException
	{
		IMAPFolder f = (IMAPFolder)folder;
		if(f != null) f.doCommand(new IMAPFolder.ProtocolCommand() {
			public Object doCommand(IMAPProtocol p)
					throws ProtocolException {
				p.simpleCommand("NOOP", null);
				return null;
			}
		 });
	}
}

class DoApply implements DataCallBack{
	
	FileReader file;
	String filename;
	

	@Override
	public int ReadCallBack(byte[] buf, int buflen) {
		// TODO Auto-generated method stub
		//static int total = 0;
		if(buflen<=0) return 0;
		String str = new String(buf);
		System.out.println("Read size: " + buflen);
		//System.out.println(str);
		return 0;
	}

	@Override
	public int WriteCallBack(byte[] buf, int buflen) {
		if(file==null){
			try{
			file = new FileReader(filename);
			}catch(FileNotFoundException e){
				System.out.println("Read file: " + e.getMessage());
				return -1;
			}
		}
		try{
			char chbuf[] = new char[4096];
			buflen = file.read(chbuf);
			//buf = (byte[])chbuf; System.arraycopy
			ArrayCopy(chbuf, 0, buf, 0, buflen);
			System.out.println("Read size for mail: " + buflen);
		}catch(IOException ie){
			System.out.println("Read file : " + ie.getMessage());
			return -1;
		}catch(NullPointerException ae){
			System.out.println("Read file : " + ae.getMessage());
		}catch(Exception e){
			System.out.println("Read file : " + e.getMessage());
			return -1;
		}
		return buflen;
	}
	
	public int WriteCallBack(char buf[], int buflen){
		if(file==null){
			try{
			file = new FileReader(filename);
			}catch(FileNotFoundException e){
				System.out.println("Read file: " + e.getMessage());
				return -1;
			}
		}
		try{
			char chbuf[] = new char[4096];
			buflen = file.read(buf);
			//buf = (byte[])chbuf; System.arraycopy
			//ArrayCopy(chbuf, 0, buf, 0, buflen);
			System.out.println("Read size for mail: " + buflen);
		}catch(IOException ie){
			System.out.println("Read file : " + ie.getMessage());
			return -1;
		}catch(NullPointerException ae){
			System.out.println("Read file : " + ae.getMessage());
		}catch(Exception e){
			System.out.println("Read file : " + e.getMessage());
			return -1;
		}
		return buflen;
	}
	
	public void SetReadFile(String filename){
		this.filename = filename;
	}
	
	public int ArrayCopy(char[] src, int srcoffset, byte[] dst, int dstoffset, int length)
	{
		for(int i = 0; i < length; i++){
			dst[i] = (byte)src[i];
		}
		return 0;
	}
	
	public void ReadMail(){
		String username = "";
		String password = "";
		String imapserver = "imap.qq.com";
		
	
		int imapport = 143;
		try {
			System.out.println("------start read mail -----");
			EMFS fs = new EMFS(username, password, imapserver, imapport);
			int ret = fs.OpenFile("INBOX", 422);
			System.out.println("OpenFile: " + ret);
			fs.SetDataCallBack(this);
			
			
			fs.Read();

			System.out.println("------end read mail -----");
		}catch(IOException ie){
			System.out.println("------exception: " + ie.getMessage());
		}catch(Exception e){
			System.out.println("------exception: " + e.getMessage());
		}
	}
	
	public void WriteMail(){
		String username = "1485084328@qq.com";
		String password = "px9537hua";
		String imapserver = "imap.qq.com";
		int imapport = 143;
		
		try {
			System.out.println("------start write mail-----");
			EMFS fs = new EMFS(username, password, imapserver, imapport);

			fs.SetDataCallBack(this);		
			
			//String file = "E:\\code\\workspace\\EMFS\\bin\\main.txt";
			//String file = "E:\\code\\workspace\\EMFS\\bin\\becktu_logo.png";			
			//String file = "E:\\code\\workspace\\EMFS\\bin\\Git.exe";
			//String file = "E:\\code\\workspace\\EMFS\\bin\\cbox.exe";
			
			//this.SetReadFile(file);
			
			
			
			System.out.println("create mail dir = " + fs.CreateFolder("ccc"));
			
//			fs.CreateFile("INBOX");
//			fs.SetFile("MD5", "1234567890ABCDEF");
//			//fs.SetFile("Content-Type", "GBK");
//			fs.SetFilename("bodypart", "�ļ���");
//			fs.WritePart();
//			fs.SaveFile();
			
			System.out.println("------end write mail-----");
		}catch(IOException ie){
			System.out.println("------exception: " + ie.getMessage());
		}catch(ProtocolException pe){
			System.out.println("------exception: " + pe.getMessage());
		}catch(Exception e){
			System.out.println("------exception: " + e.getMessage());
		}
	}
	
	public void run() {
		//ReadMail();
		WriteMail();
		
	}
	
}
