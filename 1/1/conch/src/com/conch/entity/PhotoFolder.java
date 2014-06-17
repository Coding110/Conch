package com.conch.entity;

import java.io.Serializable;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.Table;

@Entity
@Table(name="PhotoFolder")
public class PhotoFolder  implements Serializable{

	/**
	 * 
	 */
	private static final long serialVersionUID = 7202798160941772883L;
	
	private Integer did;
	private String photomail; // 文件夹所在的邮箱
	private String mailfolder;  // 在邮箱中的文件夹名
	private String photofolder; // 在网站中的相册名
	

	@Id 
	@GeneratedValue(strategy=GenerationType.AUTO/*, generator="SEQ_STORE"*/)
	public Integer getDid() {
		return did;
	}
	
	public void setDid(Integer did) {
		this.did = did;
	}	
	
	// 邮箱地址
	@Column(nullable = false)
	public String getPhotomail() {
		return photomail;
	}
	public void setPhotomail(String photomail) {
		this.photomail = photomail;
	}
	
	// 网站中的相册名
	@Column(nullable = false)
	public String getPhotofolder() {
		return photofolder;
	}
	public void setPhotofolder(String photofolder) {
		this.photofolder = photofolder;
	}
	
	// 邮箱中的文件夹名
	@Column(nullable = false)
	public String getMailfolder() {
		return mailfolder;
	}
	public void setMailfolder(String mailfolder) {
		this.mailfolder = mailfolder;
	}
}
