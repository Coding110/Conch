package com.conch.dao;

import com.conch.entity.User;

public interface UserDao {

	public User getUser(User user);
	
	public boolean CheckUser(User user, int flag); // flag=0, login; flag=1, register.
	
	public boolean CheckEmail(String email);
	
	public boolean CheckNick(String nick);
//	public List<User> getAllUser();
	
	public void addUser(User user);
	
//	public boolean delUser(String id);
	
	public boolean updateUser(User user);
}
