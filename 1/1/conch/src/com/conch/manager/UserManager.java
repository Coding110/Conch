package com.conch.manager;

import com.conch.entity.User;

public interface UserManager {

	public User getUser(String uid);	
	public String getUserId(String username);
	
	public User CheckUser(String username, String passwd); 
	
	public boolean CheckEmail(String email);
	
	public boolean CheckNick(String nick);
	
	public void addUser(User user);
	
//	public boolean delUser(String id);
	
	public boolean updateUser(User user);
}
