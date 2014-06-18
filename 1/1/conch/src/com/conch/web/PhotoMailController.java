package com.conch.web;

import java.io.IOException;
import java.io.InputStream;
import java.io.PrintWriter;
import java.util.Date;
import java.util.List;
import java.util.UUID;

import javax.annotation.Resource;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.apache.commons.fileupload.FileItem;
import org.apache.commons.fileupload.disk.DiskFileItemFactory;
import org.apache.commons.fileupload.servlet.ServletFileUpload;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;

import com.conch.emfs.EMFS;
import com.conch.entity.Photo;
import com.conch.entity.PhotoMail;
import com.conch.generic.ConchConst;
//import com.conch.entity.User;
//import com.conch.generic.ConchConst;
import com.conch.generic.ConchCookie;
import com.conch.generic.IMAPString;
import com.conch.manager.PhotoMailManager;
import com.conch.manager.PhotoManager;
import com.conch.manager.UserManager;

@Controller
@RequestMapping("/photo")
public class PhotoMailController {
	
	@Resource(name="photoManager")
	private PhotoManager photoManager;
	
	@Resource(name="photoMailManager")
	private PhotoMailManager photoMailManager;
	
	
	@Resource(name="userManager")
	private UserManager userManager;
	
	@RequestMapping("/getPhotoMail")
	public String getPhotoMail(PhotoMail photoMail,HttpServletRequest request){
		request.setAttribute("user", photoMailManager.getPhotoMail(photoMail));	
		//return "/getMail";
		return "redirect:/index.html";
	}
	@RequestMapping("/upload")
	//public void uploadFile(PhotoMail photoMail,HttpServletRequest request, HttpServletResponse response){
	public void uploadFile(HttpServletRequest request, HttpServletResponse response){
		//System.out.println("upload image.");
		String result = null, status = "true", msg = null;		
		
		msg = doUploadFile(request, response);
		if(msg != null){
			status = "false";
		}
		
		result = "{\"result\":" + status + ",\"data\":\"" + "" + msg + "}";
		response.setContentType("application/json");
		try {
			PrintWriter out = response.getWriter();
			out.write(result);
		} catch (IOException e) {
			e.printStackTrace();
		}
	}
	
	@RequestMapping("/pmprofile")
	public void setPhotoMail(PhotoMail photoMail,HttpServletRequest request, HttpServletResponse response){		
		
		String result;	
		String username =(String)request.getParameter("username");

		photoMail.setUid(userManager.getUserId(username));
		photoMail.setImapport(143);
		photoMail.setImapserver(IMAPString.getIMAPServer(photoMail.getPhotomail()));

		System.out.println("set photo mail: " + photoMail.getPhotomail() + 
				", passwd: " + photoMail.getPasswd() + 
				", UID: " + photoMail.getUid() +
				", server: " + photoMail.getImapserver() +
				", port: " + photoMail.getImapport());
		
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
	
	// @return: error message, 'null' means no error
	private String doUploadFile(HttpServletRequest request, HttpServletResponse response)
	{		
		//从Cookie中获取用户信息
		PhotoMail photoMail = (PhotoMail)request.getSession().getAttribute("photomail");
		if(photoMail == null){
			//获取一次即可，保存到session
			photoMail = new PhotoMail();
			ConchCookie cookie = new ConchCookie(response,request);
			photoMail.setUid(userManager.getUserId(cookie.getCookie("username")));
			photoMail = photoMailManager.getPhotoMail(photoMail);
			//String un = ConchConst.COOKIE_UN;
			request.getSession().setAttribute("photomail", photoMail);
		}
		
		
		System.out.println("set photo mail: " + photoMail.getPhotomail() + 
				", passwd: " + photoMail.getPasswd() + 
				", UID: " + photoMail.getUid() +
				", server: " + photoMail.getImapserver() +
				", port: " + photoMail.getImapport());
		
		EMFS emfs = (EMFS)request.getSession().getAttribute("emfs");
		
		if(emfs==null){
			try{				
				emfs = new EMFS(photoMail.getPhotomail(), photoMail.getPasswd(), photoMail.getImapserver(), photoMail.getImapport());
				request.getSession().setAttribute("emfs", emfs);
			}catch(Exception e){
				System.out.println(e.getMessage());
				return "IMAP参数设置错误";
			}
		}
		
		String mailfolder = request.getParameter("mdir");
		if(mailfolder == null){
			mailfolder = "dir1";
		}
		
		String fileType = "JPG,GIF,JPEG,PNG";
		String maxSize = "50";
		
		//System.out.println("++ doUploadFile ++");
		response.setContentType("text/html; charset=UTF-8");
		
		DiskFileItemFactory factory = new DiskFileItemFactory();
		//最大缓存
		factory.setSizeThreshold(5*1024);
		ServletFileUpload upload = new ServletFileUpload(factory);
		if(maxSize!=null && !"".equals(maxSize.trim())){
			//文件最大上限
			upload.setSizeMax(Integer.valueOf(maxSize)*1024*1024);
			System.out.println("set max buffer size");
		}
		
		try {
			//获取所有文件列表
			List<FileItem> items = upload.parseRequest(request);
			System.out.println("file count: "  +  items.size());
			for (FileItem item : items) {
				if(!item.isFormField()){
					//文件名
					String fileName = item.getName();
					
					// 图片信息
					Photo photo = new Photo();
					java.util.Date date = new java.util.Date();
					java.sql.Date sqldate = new java.sql.Date(date.getTime());
					photo.setPhotomail(photoMail.getPhotomail());
					photo.setMailfolder(mailfolder);
					photo.setUploadtime(sqldate);
					photo.setShareable(0);
					photoManager.addPhoto(photo);
					System.out.println("Photo id: "  +  photo.getPid());
					
					//检查文件后缀格式
					String fileEnd = fileName.substring(fileName.lastIndexOf(".")+1).toLowerCase();
					if(fileType!=null && !"".equals(fileType.trim())){
						boolean isRealType = false;
						String[] arrType = fileType.split(",");
						for (String str : arrType) {
							if(fileEnd.equals(str.toLowerCase())){
								isRealType = true;
								break;
							}
						}
						if(!isRealType){
							//提示错误信息:文件格式不正确
							return "文件格式不正确!";
						}
					}
				    
					String uuid = UUID.randomUUID().toString();
					System.out.println("UUID: " + uuid);
					
				    InputStream is = item.getInputStream();
				    long fid = -1;
				    int rsize;
				    //byte [] buf = new byte[4194304]; // 4MB, 每封邮件最大存4MB，超出这个大小由多封邮件存储
				    byte [] buf = new byte[2097152]; // 2MB, 每封邮件最大存2MB，超出这个大小由多封邮件存储
				    while(true){
				    	rsize = is.read(buf);
				    	if(rsize <= 0) break;
				    	
				    	System.out.println("buffer len: " + buf.length + ", read size: " + rsize);
				    	// 保存到EMFS
				    	//SaveToEMFS(buf, emfs, photo, item.getSize());
				    	emfs.CreateFile(mailfolder, photo.getPid());
						emfs.SetAttribute(ConchConst.FILENAME, fileName);
						emfs.SetAttribute(ConchConst.FILESIZE, String.valueOf(item.getSize()));
						if(fid != -1) emfs.SetAttribute(ConchConst.LINK, String.valueOf(fid)); // 若文件由多封邮件存储，设置上一存储的邮件ID						
						emfs.WritePart(buf, rsize, 1);
						fid = emfs.SaveFile();
						photo.setMailuids(String.valueOf(fid));
				    }
				    
				    photoManager.updatePhoto(photo);
				    
				}//end of if
			}//end of for
			
		}catch (Exception e) {
			e.printStackTrace();
			return "文件上传异常！";
		}
		return "文件上传成功！";
	}
	
	/*
	 * 	存储到EMFS
	 * 	@fsize, 文件总大小，非本次buffer的大小
	 */
	int SaveToEMFS(byte[] databuf, EMFS emfs, Photo photo, long fsize){
		System.out.println("databuf: " + databuf.length);
		
//		emfs.CreateFile(mailfolder, photo.getPid());
//		emfs.SetAttribute(ConchConst.FILENAME, value);
//		emfs.SetAttribute(ConchConst.FILESIZE, String.valueOf(fsize));
//		emfs.SetAttribute(ConchConst.LINK, value); // 若文件由多封邮件存储，设置上一存储的邮件ID
		
		//long fid = emfs.SaveFile();
		
		//photo.setMailuids(String.valueOf(fid));
		
		return 0;
	}
}
