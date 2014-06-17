package com.conch.generic;

import java.io.UnsupportedEncodingException;
import java.net.URLEncoder;

import javax.servlet.http.Cookie;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

public class ConchCookie {
	private HttpServletResponse response;
	private HttpServletRequest request;
	
	public ConchCookie(HttpServletResponse response,HttpServletRequest request){
		this.request=request;
		this.response=response;
	}
	
	//设置cookie
	public void setCookie(String cookieName,String cookieValue,boolean isSaved) {
		String sCookieValue="";
		try {
			sCookieValue=	URLEncoder.encode(cookieValue, "UTF-8");
	} catch (UnsupportedEncodingException e) {
		e.printStackTrace();
	}
	   Cookie cookie = new Cookie(cookieName,sCookieValue);
	   cookie.setPath("/");
	   if(isSaved){
		   cookie.setMaxAge(600000);
	   }else{
		   cookie.setMaxAge(3600);
	   }
	   response.addCookie(cookie);
	}
	
	public void setCookie(String cookieName,String cookieValue){
		   Cookie cookie = new Cookie(cookieName,cookieValue);
		   cookie.setPath("/");
		   response.addCookie(cookie);
		}
	
	//取得cookie
	public String getCookie(String cookieName){
		Cookie[] cookies = request.getCookies();
		String rec =null;
		
		if(cookies!=null)
        for(Cookie c :cookies ){
            if(c.getName().equals(cookieName)){
            	rec = c.getValue();
            	System.out.println(rec);
            	break;
            }
            	
        }		 
		return rec;
	}
	
	//删除cookie
	public void delCookie(String cookieName){
		   Cookie cookie = new Cookie(cookieName,null);
		   cookie.setMaxAge(-1);
	}
}
