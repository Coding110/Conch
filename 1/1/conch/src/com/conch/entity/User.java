package com.conch.entity;
import java.sql.Date;
import java.util.Calendar;
import java.util.Set;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.OneToMany;
import javax.persistence.Table;

import org.hibernate.annotations.GenericGenerator;

@Entity
@Table(name="UserInfo")
public class User {

	private String uid;
	private String regname;
	private String regemail;
	private String passwd;
	private String realname;
	private char sex;
	private Date regtime;
	private Date birthday;
	private String city;
	private Set<PhotoMail> photoMailSet;
	

	@Id
	@GeneratedValue(generator="system-uuid")
	@GenericGenerator(name = "system-uuid",strategy="uuid")
	@Column(length=32)
	public String getId() {
		return uid;
	}
	public void setId(String uid) {
		this.uid = uid;
	}
	
	@Column(length = 64, nullable = false)
	public String getRegname() {
		return regname;
	}
	public void setRegname(String regname) {
		this.regname = regname;
	}
	
	@Column(length=64,nullable = false)
	public String getRegemail() {
		return regemail;
	}
	public void setRegemail(String regemail) {
		this.regemail = regemail;
	}
	
	public String getPasswd() {
		return passwd;
	}
	public void setPasswd(String passwd) {
		this.passwd = passwd;
	}
	
	public String getRealname() {
		return realname;
	}
	public void setRealname(String realname) {
		this.realname = realname;
	}
	
	public char getSex() {
		return sex;
	}
	public void setSex(char sex) {
		this.sex = sex;
	}
	
	public Date getBirthday() {
		return birthday;
	}
	public void setBirthday(Date birthday) {
		this.birthday = birthday;
	}
	
	public Date getRegtime() {
		return regtime;
	}
	public void setRegtime(Date regtime) {
		this.regtime = regtime;
	}
	
	public String getCity() {
		return city;
	}
	public void setCity(String city) {
		this.city = city;
	}
	
/*	//一个用户可以配置多个存储邮箱
	@OneToMany(fetch = FetchType.LAZY, mappedBy = "PhotoMail")
	@JoinColumn(name="userId",updatable=false)
	public Set<PhotoMail> getPhotoMailSet() {
		return photoMailSet;
    }
	
	public void setPhotoMailSet(Set<PhotoMail> photoMailSet) {
		this.photoMailSet = photoMailSet ;
    }*/
}
