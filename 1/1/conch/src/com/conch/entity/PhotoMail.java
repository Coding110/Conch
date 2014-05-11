package com.conch.entity;

import javax.persistence.Column;
import javax.persistence.Embeddable;
import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.Table;

import static javax.persistence.GenerationType.IDENTITY;

import org.hibernate.annotations.GenericGenerator;

@Entity
@Table(name="PhotoMail")
public class PhotoMail {
	private Integer pmid;	
	private String photomail;
	private String passwd;
	private String imapserver;
	private int imapport;	
	
	private User userinfo;
	
	@Id
	@GeneratedValue(strategy = IDENTITY)
	@Column(/*name = "pm_uid", */unique = true, nullable = false)
	public Integer getPmid() {
		return pmid;
	}
	public void setPmid(Integer pmid) {
		this.pmid = pmid;
	}	
	
	@Column(length=128,nullable = false)
	public String getPhotomail() {
		return photomail;
	}
	
	public void setPhotomail(String photomail) {
		this.photomail = photomail;
	}
	
	//采用RSA加密，长度待定
	@Column(length=128,nullable = false)
	public String getPasswd() {
		return passwd;
	}
	
	public void setPasswd(String passwd) {
		this.passwd = passwd;
	}
	
	@Column(length=64,nullable = false)
	public String getImapserver() {
		return imapserver;
	}
	
	public void setImapserver(String imapserver) {
		this.imapserver = imapserver;
	}
	
	@Column(nullable = false)
	public int getImapport() {
		return imapport;
	}
	
	public void setImapport(int imapport) {
		this.imapport = imapport;
	}
	
	@ManyToOne(targetEntity=com.conch.entity.PhotoMail.class, fetch = FetchType.LAZY)
	//@JoinColumn(name = "uid", nullable = false)
	public User getUserinfo() {
		return this.userinfo;
	}
	
	public void setUserinfo(User userinfo) {
		this.userinfo = userinfo;
	}
}
