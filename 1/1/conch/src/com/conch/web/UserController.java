package com.conch.web;

import java.io.IOException;
import java.io.PrintWriter;

import javax.annotation.Resource;
import javax.persistence.AttributeOverrides;
import javax.servlet.http.Cookie;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;

import com.conch.entity.User;
import com.conch.manager.UserManager;

@Controller
@RequestMapping("/user")
public class UserController {

	@Resource(name="userManager")
	private UserManager userManager;
	
	@RequestMapping("/getUser")
	public String getUser(User user,HttpServletRequest request){
		request.setAttribute("user", userManager.getUser(user));	
		return "/editUser";
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
	public String addUser(User user,HttpServletRequest request){
		userManager.addUser(user);
		System.out.println("regname :" +user.getRegname() + " regemail :" +user.getRegemail() +"passwd :" + user.getPasswd());
		return "redirect:/index.html";
	}
	@RequestMapping("/loginCheck")
	public void loginCheck(String username,String passwd,HttpServletResponse response,HttpServletRequest request){
		String result = "{\"result\":true,\"mess\":\"\",\"to\":\"index.html\"}";	
		response.setContentType("application/json");
		if(!userManager.CheckUser(username, passwd)){
			result = "{\"result\":false,\"mess\":\"用回名或密码错误\",\"to\":\"\"}";
		}else{
			  Cookie cki = new Cookie("uid",username);
			  response.addCookie(cki);
		}
		try {
			PrintWriter out = response.getWriter();
			out.write(result);
		} catch (IOException e) {
			e.printStackTrace();
		}
		
	}
//	@RequestMapping("/delUser")
//	public void delUser(String id,HttpServletResponse response){
//		
//		String result = "{\"result\":\"error\"}";
//		
//		if(userManager.delUser(id)){
//			result = "{\"result\":\"success\"}";
//		}
//		
//		response.setContentType("application/json");
//		
//		try {
//			PrintWriter out = response.getWriter();
//			out.write(result);
//		} catch (IOException e) {
//			e.printStackTrace();
//		}
//	}
	
	@RequestMapping("/updateUser")
	public String updateUser(User user,HttpServletRequest request){
		
		if(userManager.updateUser(user)){
			user = userManager.getUser(user);
			request.setAttribute("user", user);
			return "redirect:/user/getAllUser";
		}else{
			return "/error";
		}
	}
}