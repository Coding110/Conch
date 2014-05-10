package com.conch.web;
import java.io.File;
import java.io.IOException;
import java.io.InputStream;
import java.io.PrintWriter;
import java.util.List;
import java.util.UUID;

import javax.annotation.Resource;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.apache.commons.fileupload.FileItem;
import org.apache.commons.fileupload.disk.DiskFileItemFactory;
import org.apache.commons.fileupload.servlet.ServletFileUpload;
import org.apache.commons.io.FileUtils;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;

import com.conch.entity.PhotoMail;
import com.conch.entity.PhotoMail;

import com.conch.entity.User;
import com.conch.manager.UserManager;

import com.conch.manager.*;



@Controller
@RequestMapping("/load")
public class UpdownloadController{
	
	/**
	 * 上传文件
	 * @param request
	 * @param response
	 * @return
	 * @throws ServletException
	 * @throws IOException
	 */
	@RequestMapping("/doFileUploadTest")
	public void doFileUploadTest(HttpServletRequest request,HttpServletResponse response)
			throws ServletException, IOException{
		//获取并解析文件类型和支持最大值
		/*String functionId = request.getParameter("functionId");
		String fileType = request.getParameter("fileType");
		String maxSize = request.getParameter("maxSize");*/
		
		//String functionId = request.getParameter("functionId");
		String fileType = "JPG,GIF,JPEG,PNG";
		String maxSize = "50";
		
		System.out.println("doFileUpload ++");
		response.setContentType("text/html; charset=UTF-8");
		
		//临时目录名
		String tempPath = "/upload/tmp/";
		//真实目录名
		String filePath = "/upload/";
		
		String realpath = request.getSession().getServletContext().getRealPath(tempPath);
		//System.out.println("java home: " + System.getenv("JAVA_HOME"));
		//request.getSession().setAttribute(arg0, arg1);
		System.out.println("realpath: " + realpath);
		
		//FileUtil.createFolder(tempPath);
		//FileUtil.createFolder(filePath);
		
		DiskFileItemFactory factory = new DiskFileItemFactory();
		//最大缓存
		factory.setSizeThreshold(5*1024);
		//设置临时文件目录
		//factory.setRepository(new File(tempPath));
		//factory.
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
							//super.printJsMsgBack(response, "文件格式不正确!");
							response.getWriter().write("文件格式不正确!");
							return ;
						}
					}
					
					//创建文件唯一名称
					String uuid = UUID.randomUUID().toString();
					//真实上传路径
					StringBuffer sbRealPath = new StringBuffer();
					sbRealPath.append(filePath).append(uuid).append(".").append(fileEnd);
					
					System.out.println("sbRealPath: " + request.getSession().getServletContext().getRealPath(sbRealPath.toString()));
					
					File tmpfile = new File(fileName);
					System.out.println("Temp file real path: " + request.getSession().getServletContext().getRealPath(fileName));
					System.out.println("File size: " + tmpfile.length());
					System.out.println("上传文件的大小:" + item.getSize());
				    System.out.println("上传文件的类型:" + item.getContentType());
				    // item.getName()返回上传文件在客户端的完整路径名称
				    System.out.println("上传文件的名称:" + item.getName());
				    
				    
				    InputStream is = item.getInputStream();
				    long rsize;
				    byte [] buf = new byte[4096];
				    while(true){
				    	rsize = is.read(buf);
				    	if(rsize <= 0) break;
				    	System.out.println("rsie: " + rsize);
				    }
				    
				      
					//写入文件
					File file = new File(sbRealPath.toString());
					file.mkdirs();
					file.createNewFile();
					item.write(file);
					
					
					//上传成功，向父窗体返回数据:真实文件名,虚拟文件名,文件大小
					StringBuffer sb = new StringBuffer();
					sb.append("window.returnValue='").append(fileName).append(",").append(uuid).append(".").append(fileEnd).append(",").append(file.length()).append("';");
					sb.append("window.close();");
					
					System.out.println("sb: " + sb);
					//super.printJsMsg(response, sb.toString());
					//log.info("上传文件成功,JS信息："+sb.toString());
					response.getWriter().write("上传文件成功!");
				}//end of if
			}//end of for
			
		}catch (Exception e) {
			//提示错误:比如文件大小
			//super.printJsMsgBack(response, "上传失败,文件大小不能超过"+maxSize+"M!");
			//log.error("上传文件异常!",e);
			response.getWriter().write("上传文件异常!");
			response.getWriter().write(e.getMessage());
			e.printStackTrace();
			return ;
		}
		
		return ;
	}

	@RequestMapping("/ffileupload")
	public void doFileUploadToFile(HttpServletRequest request,HttpServletResponse response)
			throws ServletException, IOException{
		//获取并解析文件类型和支持最大值
		String fileType = "JPG,GIF,JPEG,PNG";
		String maxSize = "50";
		
		System.out.println("doFileUploadToFile ++");
		response.setContentType("text/html; charset=UTF-8");
		
		//临时目录名
		String tempPath = "/upload/tmp/";
		//真实目录名
		String filePath = "/upload/";
		
		String realpath = request.getSession().getServletContext().getRealPath(tempPath);
		System.out.println("realpath: " + realpath);
		
		File mfile = null;
		mfile = new File(tempPath);		
		if(!mfile.exists()){
			if(!mfile.mkdirs()){
				System.out.println("Create " + tempPath + " failed");
			}
		}
		mfile = new File(filePath);
		if(!mfile.exists()){
			if(!mfile.mkdir()){
				System.out.println("Create " + filePath + " failed");
			}
		}	
		
		DiskFileItemFactory factory = new DiskFileItemFactory();
		//最大缓存
		factory.setSizeThreshold(5*1024);
		//设置临时文件目录
		factory.setRepository(new File(tempPath));
		//factory.
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
							//super.printJsMsgBack(response, "文件格式不正确!");
							response.getWriter().write("文件格式不正确!");
							return ;
						}
					}
					
					//创建文件唯一名称
					String uuid = UUID.randomUUID().toString();
					//真实上传路径
					StringBuffer sbRealPath = new StringBuffer();
					sbRealPath.append(filePath).append(uuid).append(".").append(fileEnd);

					File file = new File(sbRealPath.toString());
					file.mkdirs();
					file.createNewFile();
					item.write(file);
					
					response.getWriter().write("上传文件成功!");
					
				}//end of if
			}//end of for
			
		}catch (Exception e) {
			response.getWriter().write("上传文件异常!");
			response.getWriter().write(e.getMessage());
			e.printStackTrace();
			return ;
		}
		
		return ;
	}
	
	@RequestMapping("/mfileupload")
	public void doFileUploadToMail(HttpServletRequest request,HttpServletResponse response)
			throws ServletException, IOException{

		String fileType = "JPG,GIF,JPEG,PNG";
		String maxSize = "50";
		
		System.out.println("mfileupload ++");
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
							response.getWriter().write("文件格式不正确!");
							return ;
						}
					}
				    
					String uuid = UUID.randomUUID().toString();
					System.out.println("UUID: " + uuid);
					
				    InputStream is = item.getInputStream();
				    long rsize;
				    byte [] buf = new byte[4096];
				    while(true){
				    	rsize = is.read(buf);
				    	if(rsize <= 0) break;
				    	//System.out.println("rsie: " + rsize);
				    }

					response.getWriter().write("上传文件成功!");
					
				}//end of if
			}//end of for
			
		}catch (Exception e) {
			response.getWriter().write("上传文件异常!");
			response.getWriter().write(e.getMessage());
			e.printStackTrace();
			return ;
		}
		
		return ;
	}
}

