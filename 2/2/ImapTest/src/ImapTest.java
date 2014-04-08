import java.util.Date;
import java.util.Properties;

import javax.activation.DataHandler;
import javax.activation.DataSource;
import javax.activation.URLDataSource;
import javax.mail.BodyPart;
import javax.mail.FetchProfile;
import javax.mail.Flags;
import javax.mail.Folder;
import javax.mail.Message;
import javax.mail.MessageContext;
import javax.mail.Multipart;
import javax.mail.Part;
import javax.mail.Session;
import javax.mail.internet.MimeBodyPart;
import javax.mail.internet.MimeMessage;
import javax.mail.internet.MimeMultipart;
import javax.mail.internet.MimePart;
import javax.mail.Message.RecipientType;

import com.sun.mail.iap.ProtocolException;
import com.sun.mail.iap.Response;
import com.sun.mail.imap.AppendUID;
import com.sun.mail.imap.IMAPFolder;
import com.sun.mail.imap.IMAPFolder.ProtocolCommand;
import com.sun.mail.imap.protocol.IMAPProtocol;
import com.sun.mail.imap.protocol.UID;
import com.sun.mail.imap.IMAPStore;
import com.sun.mail.imap.IMAPMessage;
import com.sun.mail.imap.SortTerm;
import com.sun.mail.util.MailLogger;

/** 
 * 使用imap协议获取未读邮件数 
 *  
 * @author w 
 *  
 */
public class ImapTest{

    private static final Message Message = null;

	public static void main(String[] args) throws Exception {
		
/*        String user = "1485084328@qq.com";// 邮箱的用户名  
        String password = "px9537hua"; // 邮箱的密码  

        Properties prop = System.getProperties();
        prop.put("mail.store.protocol", "imap");
        prop.put("mail.imap.host", "imap.qq.com");*/
        
		String user = "hua_zhixing@163.com";// 邮箱的用户名  
        String password = "px9537hua"; // 邮箱的密码  

        Properties prop = System.getProperties();
        prop.put("mail.store.protocol", "imap");
        prop.put("mail.imap.host", "imap.163.com");
        
        //AppendMails(user, password, prop);
        //AppendMailsWithDataHandle(user, password, prop);
        //ReceiveMails(user, password, prop);
        ReceiveMailsByUID(user, password, prop);
        
        //MailCommand(user, password, prop);
        
        System.out.println("######################## END ########################");
    }
    
    public static void ReceiveMails(String user, String password, Properties prop) throws Exception{
        Session session = Session.getInstance(prop);
        
        int total = 0;
        IMAPStore store = (IMAPStore) session.getStore("imap"); // 使用imap会话机制，连接服务器  
        store.connect(user, password);
        IMAPFolder folder = (IMAPFolder) store.getFolder("INBOX"); // 收件箱  
        folder.open(Folder.READ_WRITE);
        // 获取总邮件数  
        total = folder.getMessageCount();
        int newmsg = folder.getNewMessageCount();
        System.out.println("-----------------共有邮件：" + total
                + " 封--------------");
        System.out.println("-----------------共有新邮件：" + newmsg
                + " 封--------------");
        // 得到收件箱文件夹信息，获取邮件列表  
        System.out.println("未读邮件数：" + folder.getUnreadMessageCount());
        Message[] messages = folder.getMessages();        
        
        int messageNumber = 0, n = 0;
        
        for (Message message : messages) {
        	
        	
        	String[] hdrs = message.getHeader("MD5");
        	if(hdrs == null){
        		//continue;
        	}else{
        		System.out.println("hdrs len: " + hdrs.length + ", " + hdrs[0]);
        	}
        		
            System.out.println("发送时间：" + message.getSentDate());
            System.out.println("主题：" + message.getSubject());
            //System.out.println("内容：" + message.getContent());
            Flags flags = message.getFlags();
            if (flags.contains(Flags.Flag.SEEN))
                System.out.println("这是一封已读邮件");
            else {
                System.out.println("未读邮件");
            }
            
            //System.in.read();
            messageNumber = message.getMessageNumber();            
            System.out.println("========================================================");
            System.out.println("msg num: " + messageNumber);
            System.out.println("hash code: " + message.hashCode());
            System.out.println("UID: " + folder.getUID(message));
            System.out.println("========================================================");
            //每封邮件都有一个MessageNumber，可以通过邮件的MessageNumber在收件箱里面取得该邮件  
            
            
            n++;
            //if(n > 2) break;
        }
        
        /*
        System.out.println("========================= UID ===============================");
        Message msg = folder.getMessageByUID(1);
        //folder.getSortedMessages(term)
        //folder.getme
        
        //Message msg = folder.getMessage(total);
        
        System.out.println("发送时间：" + msg.getSentDate());
        System.out.println("主题：" + msg.getSubject());
        System.out.println("内容：" + msg.getContent());
        System.out.println("Mail ID：" + folder.getUID(msg));
        System.out.println(msg.hashCode());
        System.out.println("========================= UID  END ===============================");
       */
        
        //Message message = folder.getMessage(messageNumber);
        //System.out.println(/*message.getContent()+*/message.getContentType());
        
        // 释放资源  
        if (folder != null)
            folder.close(true);
        if (store != null)
            store.close();
    }
    
    /**
     * @param user
     * @param password
     * @param prop
     * @throws Exception
     */
    public static void ReceiveMailsByUID(String user, String password, Properties prop) throws Exception{
        Session session = Session.getInstance(prop);
        
        int total = 0;
        IMAPStore store = (IMAPStore) session.getStore("imap"); // 使用imap会话机制，连接服务器  
        store.connect(user, password);
        IMAPFolder folder = (IMAPFolder) store.getFolder("INBOX"); // 收件箱  
        folder.open(Folder.READ_WRITE);
        // 获取总邮件数  
        total = folder.getMessageCount();
        int newmsg = folder.getNewMessageCount();
        System.out.println("-----------------共有邮件：" + total
                + " 封--------------");
       // System.out.println("-----------------共有新邮件：" + newmsg
               // + " 封--------------");
        // 得到收件箱文件夹信息，获取邮件列表  
        //System.out.println("未读邮件数：" + folder.getUnreadMessageCount());
        /*Message[] messages = folder.getMessages(); 
        Message msg = folder.getMessageByUID(383);
        if(msg != null){
        	 System.out.println("主题：" + msg.getSubject());
             System.out.println("UID: " + folder.getUID(msg));
        }else{
        	System.out.println("msg is null");
        }*/
        
        Message[] messages = folder.getMessagesByUID(1318231600, 1318231825);
        //System.out.println(folder.getUIDValidity());
        
        //ProtocolCommand pc = new ProtocolCommand()
        //folder.doCommand(pc)
        
/*        AppendUID[] uids = folder.copyUIDMessages(messages, folder);
        for(int i=0; i<uids.length;i++){
        	System.out.println(uids[i].uid);
        }*/
        
        
        int messageNumber = 0, n = 0;
        
        for (Message message : messages) {
        	        	
        	System.out.println("========================================================");
        	
        	String[] hdrs = message.getHeader("MD5");
        	if(hdrs == null){
        		//continue;
        		//break;
        	}else{
        		System.out.println("\nMD5: " + hdrs[0] + " [" + hdrs.length + "]");
        	}
            System.out.println("发送时间：" + message.getSentDate());
            System.out.println("主题：" + message.getSubject());
           
            //System.in.read();
            messageNumber = message.getMessageNumber();       
            System.out.println("msg num: " + messageNumber);
            System.out.println("UID: " + folder.getUID(message));
            //System.out.println("========================================================");
 
            
            //if(n++ > 5) break;
            
        }

        // 释放资源  
        if (folder != null)
            folder.close(true);
        if (store != null)
            store.close();
    }
    
    public static void MailCommand(String user, String password, Properties prop) throws Exception{    	
    try{
        MailLogger mg = new MailLogger("ptcl", "log", true, null);
    	IMAPProtocol pt = new IMAPProtocol("qq.com", "imap.qq.com", 143, prop, false, mg);
	    if(pt == null){
	    	System.out.println("Connected failed.");
	    	return;
        }
	    
	    
	    pt.login(user, password);
	    pt.select("INBOX");
	    //pt.command("UID", arg1)
	    int uid = 380;
	    //int uid = 1318231615;
	    
	    
	    
	    
        UID seqno = pt.fetchSequenceNumber(uid);
	    
	    Response[] r = pt.fetch(uid, "UID");
	    String res = pt.writeCommand("UID FETCH " + uid +" (UID)",null);
	    System.out.println("res: " + res);
	    if(r!=null){
	    	System.out.println("len: " + r.length);
	    	for(int i = 0; i < r.length; i++){
	    		System.out.println(r[i].readString());
	    	}
	    }	    
	    
	    System.out.println("seqno: " + pt.fetchSequenceNumber(uid).seqnum + ", uid: " + uid);
	        
        /*for (Message message : messages) {
        	
        	System.out.println("========================================================");
        	
        	String[] hdrs = message.getHeader("MD5");
        	if(hdrs == null){
        		//continue;
        		break;
        	}else{
        		System.out.println("\nMD5: " + hdrs[0] + " [" + hdrs.length + "]");
        	}
            //System.out.println("发送时间：" + message.getSentDate());
            System.out.println("主题：" + message.getSubject());
           
            //System.in.read();
            //messageNumber = message.getMessageNumber();       
            //System.out.println("msg num: " + messageNumber);
            System.out.println("UID: " + folder.getUID(message));
            //System.out.println("========================================================");
 
            
            //if(n++ > 5) break;
            
        }


        // 释放资源  
        if (folder != null)
            folder.close(true);
        if (store != null)
            store.close();*/
	    
	    pt.logout();
	    pt.close();
    }catch(ProtocolException pe){
    	System.out.println(pe.getMessage());
    }
    }
    
    public static void AppendMails(String user, String password, Properties prop) throws Exception{
    	Session session = Session.getInstance(prop);
        
        //int total = 0;
    	/**/
        IMAPStore store = (IMAPStore) session.getStore("imap"); // 使用imap会话机制，连接服务器  
        store.connect(user, password);
        IMAPFolder folder = (IMAPFolder) store.getFolder("INBOX"); // 收件箱  
        folder.open(Folder.READ_WRITE);
        
    	
        //MessageContext msg = new MessageContext(null);
        MimeMessage[] msg = new MimeMessage[1];//(session)[1];
        msg[0] = new MimeMessage(session);
        msg[0].setFrom("519916178@qq.com");
        msg[0].setRecipients(javax.mail.Message.RecipientType.TO, "1485084328@qq.com");
        msg[0].setSubject("Append cmd 2");
        msg[0].setSentDate(new Date());
        msg[0].setFlag(Flags.Flag.SEEN, true);

        //msg[0].setText("Hello world 1!");
        //msg[0].setText("Hello world 2!");
        //msg[0].setText("Hello world 3!");

        Multipart mp = new MimeMultipart();
        
        BodyPart bp = new MimeBodyPart();
        bp.setContent("Oh yeah 1", "text/html");
        bp.setContent("Oh yeah 2", "text/html");
        bp.setContent("Oh yeah 3", "text/html");
        
        mp.addBodyPart(bp);
        
        msg[0].setContent(mp);
        
        
        AppendUID[] uids = folder.appendUIDMessages(msg); 
        System.out.println(uids.toString());
        System.out.println(uids.hashCode());
        
    
    }
    
    public static void AppendMailsWithDataHandle(String user, String password, Properties prop) throws Exception{
    	Session session = Session.getInstance(prop);
        
        //int total = 0;
    	/**/
        IMAPStore store = (IMAPStore) session.getStore("imap"); // 使用imap会话机制，连接服务器  
        store.connect(user, password);
        IMAPFolder folder = (IMAPFolder) store.getFolder("INBOX"); // 收件箱  
        folder.open(Folder.READ_WRITE);
        
    	
        //MessageContext msg = new MessageContext(null);
        MimeMessage[] msg = new MimeMessage[1];//(session)[1];
        
        //DataSource ds = new URLDataSource("http");
        //DataHandler dh = new DataHandler(ds);
        
        msg[0] = new MimeMessage(session);
        msg[0].setFrom("Donghua");
        msg[0].setRecipients(javax.mail.Message.RecipientType.TO, "Conch");
        msg[0].setSubject("MD5");
        msg[0].setSentDate(new Date());
        msg[0].setHeader("MD5", "ABCDEF0123456789");
        msg[0].setFlag(Flags.Flag.SEEN, false);               
        msg[0].setText("Hello world 1!");
        msg[0].setText("Hello world 2!");
        msg[0].setText("Hello world 6!");
        //msg[0].setDataHandler(dh);        
        
        
        AppendUID[] uids = folder.appendUIDMessages(msg); 
        System.out.println(folder.getUIDNext());
        System.out.println(uids[0].uid);
        System.out.println(uids.hashCode());
        
    
    }

}
