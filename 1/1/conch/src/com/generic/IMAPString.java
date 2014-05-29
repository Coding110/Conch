package com.generic;

import java.util.regex.Matcher;
import java.util.regex.Pattern;

public class IMAPString {
	static public String getIMAPServer(String email){
		String imapserver = "imap.";
		Pattern p = Pattern.compile("\\w+@(\\w+.)+[a-z]{2,3}");   
		Matcher m = p.matcher(email);
		if(!m.matches()) {			 		    
			return null;   
		}
		
		imapserver += email.substring(email.indexOf('@')+1);
		
		return imapserver;
	}
}
