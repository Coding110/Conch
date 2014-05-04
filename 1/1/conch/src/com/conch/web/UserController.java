package com.conch.web;

import java.io.IOException;
import java.io.PrintWriter;

import javax.annotation.Resource;
import javax.persistence.AttributeOverrides;
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
		String result = "{\"result\":\"error\"}";
		if(userManager.CheckEmail(email))
		{
			result = "{\"result\":\"success\"}";
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