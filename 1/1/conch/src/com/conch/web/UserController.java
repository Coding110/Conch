package com.conch.web;

import java.io.IOException;
import java.io.PrintWriter;
import java.io.UnsupportedEncodingException;
import java.net.URLDecoder;
import java.net.URLEncoder;

import javax.annotation.Resource;
import javax.persistence.AttributeOverrides;
import javax.servlet.http.Cookie;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;

import com.conch.entity.User;
import com.conch.generic.ConchCookie;
import com.conch.manager.UserManager;

@Controller
@RequestMapping("/user")
public class UserController {

	@Resource(name="userManager")
	private UserManager userManager;
	
	@RequestMapping("/getUser")
	public String getUser(String uid,HttpServletRequest request){
		User user = userManager.getUser(uid);
		HttpSession session = request.getSession(); 
		session.setAttribute("user", user);	
		return "redirect:/setting.html";
	}
	
	@RequestMapping("/checkEmail")
	public void CheckEmail(String email,HttpServletResponse response){
		String result = "{\"result\":true,\"mess\":\"\"}";
		if(userManager.CheckEmail(email))
		{
			result = "{\"result\":false,\"mess\":\"该邮箱已注册\"}";
		}
		response.setContentType("application/json");
		try {
			PrintWriter out = response.getWriter();
			out.write(result);
		} catch (IOException e) {
			e.printStackTrace();
		}
	}
	
	@RequestMapping("/checkNick")
	public void CheckNick(String nick,HttpServletResponse response){
		String result = "{\"result\":true,\"mess\":\"\"}";
		if(userManager.CheckNick(nick))
		{
			result = "{\"result\":false,\"mess\":\"该用户名已经被注册\"}";
		}
		response.setContentType("application/json");
		try {
			PrintWriter out = response.getWriter();
			out.write(result);
		} catch (IOException e) {
			e.printStackTrace();
		}
	}
	
	@RequestMapping("/checkVerifyCode")
	public void CheckVerifyCode(String inputCode,HttpServletRequest request,HttpServletResponse response){
		String result = "{\"result\":true,\"mess\":\"\"}";	
		String rand=(String)request.getSession().getAttribute("rand");;
		if(!inputCode.equals(rand))
		{
			result = "{\"result\":false,\"mess\":\"验证码输入错误\"}";
		}
		response.setContentType("application/json");
		try {
			PrintWriter out = response.getWriter();
			out.write(result);
		} catch (IOException e) {
			e.printStackTrace();
		}
	}
	
	@RequestMapping("/addUser")
	public String addUser(User user,HttpServletRequest request,HttpServletResponse response){
		userManager.addUser(user);
		ConchCookie cookie = new ConchCookie(response,request);
		cookie.setCookie("username", user.getRegname());
		return "redirect:/";
	}
	
	@RequestMapping("/loginCheck")
	public void loginCheck(String username,String passwd,HttpServletResponse response,HttpServletRequest request){
		String result = "{\"result\":true,\"mess\":\"\",\"to\":\"./\"}";	
		response.setContentType("application/json");
		String rememberme = request.getParameter("rememberme");
		boolean isSaved =false;
		if(rememberme=="true"){
			isSaved = true;
		}
        User user = userManager.CheckUser(username, passwd);        
		if(user== null){
			result = "{\"result\":false,\"mess\":\"用户名或密码错误\",\"to\":\"\"}";
		}else{
			ConchCookie cookie = new ConchCookie(response,request);
			cookie.setCookie("username", user.getRegname(), isSaved);
			cookie.setCookie("uid", user.getUid(), isSaved);
		}
		try {
			PrintWriter out = response.getWriter();
			out.write(result);
		} catch (IOException e) {
			e.printStackTrace();
		}
		
	}
	
	@RequestMapping("/updateUser")
	public String updateUser(User user,HttpServletRequest request){	
		userManager.updateUser(user);
		return "redirect:/";
	}
	
	@RequestMapping("/updatePwd")
	public String updatePwd(String uid,String passwd,HttpServletRequest request){	
         System.out.println(uid + passwd);
         userManager.updatePwd(passwd, uid);
		return "redirect:/";
	}
}