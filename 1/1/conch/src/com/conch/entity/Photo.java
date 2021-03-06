package com.conch.entity;

import java.io.Serializable;
import java.sql.Date;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.persistence.Table;

import org.hibernate.annotations.GenericGenerator;

@Entity
@Table(name="PhotoInfo")
public class Photo implements Serializable{
	/**
	 * 
	 */
	private static final long serialVersionUID = 3574179310901618570L;
	private String pid;
	private String photomail;
	private String mailuids; // 多个邮件ID时，有冒号隔开，原照片
	private String mailuidofpreview; // 照片的预览图片，200*200以内
	private String mailuidofnet; // 用于网络查看图片，800*600以内
	private String mailfolder;
	private Date uploadtime;
	private String location;
	private int shareable; // 0－不共享，1－共享
	private String shareurl;
	
	@Id
	@GeneratedValue(generator="system-uuid")
	@GenericGenerator(name = "system-uuid",strategy="uuid")
	@Column(length=32)
	public String getPid() {
		return pid;
	}
	public void setPid(String pid) {
		this.pid = pid;
	}
	
	// 邮箱地址
	//@Column(nullable = false)
	public String getPhotomail() {
		return photomail;
	}
	public void setPhotomail(String photomail) {
		this.photomail = photomail;
	}
	
	// 邮件ID，多个时由冒号隔开
	//@Column(nullable = false)
	public String getMailuids() {
		return mailuids;
	}
	public void setMailuids(String mailuid) {
		if(this.mailuids == null){
			this.mailuids = mailuid;
		}else{
			this.mailuids += ":" + mailuid;
		}
	}
	
	// 邮件ID，预览图片
	//@Column(nullable = false)
	public String getMailuidofpreview() {
		return mailuidofpreview;
	}
	public void setMailuidofpreview(String mailuidofpreview) {
		this.mailuidofpreview = mailuidofpreview;
	}
	
	// 邮件ID，网络查看图片
	//@Column(nullable = false)
	public String getMailuidofnet() {
		return mailuidofnet;
	}
	public void setMailuidofnet(String mailuidofnet) {
		this.mailuidofnet = mailuidofnet;
	}
	
	// 邮件所在文件夹
	public String getMailfolder() {
		return mailfolder;
	}
	public void setMailfolder(String mailfolder) {
		this.mailfolder = mailfolder;
	}
	
	// 上传时间
	public Date getUploadtime() {
		return uploadtime;
	}
	public void setUploadtime(Date uploadtime) {
		this.uploadtime = uploadtime;
	}
	
	// 定位地点
	public String getLocation() {
		return location;
	}
	public void setLocation(String location) {
		this.location = location;
	}
	
	// 是否分享的标记
	public int getShareable() {
		return shareable;
	}
	public void setShareable(int shareable) {
		this.shareable = shareable;
	}
	
	// 分享的URL
	public String getShareurl() {
		return shareurl;
	}
	public void setShareurl(String shareurl) {
		this.shareurl = shareurl;
	}
}
