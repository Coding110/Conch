package com.conch.manager;

import com.conch.entity.User;

public interface UserManager {

	public User getUser(String uid);	
	public String getUserId(String username);
	
	public User CheckUser(String username, String passwd); 
	
	public boolean CheckEmail(String email);
	
	public boolean CheckNick(String nick);
	
	public void addUser(User user);
	
	public boolean updateUser(User user);
	
	public boolean updatePwd(String pwd,String uid);
}
