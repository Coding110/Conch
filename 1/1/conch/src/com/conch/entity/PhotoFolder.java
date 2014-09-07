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
	 * 	相册在邮箱中的文件夹名命名：BKTDIR[i], 其中i为大于0的整数，i=1时，为默认相册，其它自动累加。
	 */
	private static final long serialVersionUID = 7202798160941772883L;
	
	private Integer did;
	private String photomail; // 文件夹所在的邮箱
	//private String mailfolder;  // 在邮箱中的文件夹名
	private int mailfolder;  // 在邮箱中的文件夹名，为了方便只存储‘BKTIDR[i]’后的i值，
	private String photofolder; // 在网站中的相册名
	private String cover; // 相册封面，对应Photo.pid
	private int shareable; // 0－不共享，1－共享	

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
	public int getMailfolder() {
		return mailfolder;
	}
	public void setMailfolder(int mailfolder) {
		this.mailfolder = mailfolder;
	}
	
	public String getCover() {
		return cover;
	}
	public void setCover(String cover) {
		this.cover = cover;
	}
	
	// 是否分享的标记
	public int getShareable() {
		return shareable;
	}
	public void setShareable(int shareable) {
		this.shareable = shareable;
	}
	
}
