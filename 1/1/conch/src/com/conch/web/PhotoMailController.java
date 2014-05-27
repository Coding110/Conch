package com.conch.web;

import java.io.IOException;
import java.io.PrintWriter;

import javax.annotation.Resource;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;

import com.conch.entity.PhotoMail;
import com.conch.entity.User;
import com.conch.manager.PhotoMailManager;
import com.conch.manager.UserManager;

@Controller
@RequestMapping("/photo")
public class PhotoMailController {
	@Resource(name="photoMailManager")
	private PhotoMailManager photoMailManager;
	
	@Resource(name="userManager")
	private UserManager userManager;
	
	@RequestMapping("/getPhotoMail")
	public String getPhotoMail(PhotoMail photoMail,HttpServletRequest request){
		request.setAttribute("user", photoMailManager.getPhotoMail());	
		//return "/getMail";
		return "redirect:/index.html";
	}
	
	@RequestMapping("/upload")
	public void uploadFile(PhotoMail photoMail,HttpServletRequest request){
		
	}
	
	@RequestMapping("/pmprofile")
	public void setPhotoMail(PhotoMail photoMail,HttpServletRequest request, HttpServletResponse response){		
		
		String result;	
		String username =(String)request.getParameter("username");

		photoMail.setUid(userManager.getUserId(username));

		System.out.println("set photo mail: " + photoMail.getPhotomail() + " - " + photoMail.getPasswd() + " - " + photoMail.getUid());
		
		result = "{\"result\":false,\"data\":\"" + username + "+" + photoMail.getPhotomail() + "+" + photoMail.getPasswd() + 
				"+" + /*photoMail.getUid() +*/ "\"}";
		response.setContentType("application/json");
		
		photoMailManager.addPhotoMail(photoMail);
		
		try {
			PrintWriter out = response.getWriter();
			out.write(result);
		} catch (IOException e) {
			e.printStackTrace();
		}
	}
}
