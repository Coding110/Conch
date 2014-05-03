package com.conch.manager;

import com.conch.entity.User;

public interface UserManager {

	public User getUser(User user);
	
	public boolean CheckUser(User user, int flag); // flag=0, login; flag=1, register.
	
	public boolean CheckEmail(String email);
	
	public void addUser(User user);
	
//	public boolean delUser(String id);
	
	public boolean updateUser(User user);
}
