package com.conch.web;

import javax.annotation.Resource;
import javax.servlet.http.HttpServletRequest;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;

import com.conch.entity.PhotoMail;
import com.conch.manager.PhotoMailManager;

@Controller
@RequestMapping("/photo")
public class PhotoMailController {
	@Resource(name="PhotoMailManager")
	private PhotoMailManager photoMailManager;
	
	@RequestMapping("/getPhotoMail")
	public String getPhotoMail(PhotoMail photoMail,HttpServletRequest request){
		request.setAttribute("user", photoMailManager.getPhotoMail());	
		//return "/getMail";
		return "redirect:/index.html";
	}
}
