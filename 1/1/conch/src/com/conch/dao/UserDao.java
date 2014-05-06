package com.conch.dao;

import com.conch.entity.User;

public interface UserDao {

	public User getUser(User user);
	
	public boolean CheckUser(String username, String passwd); 
	
	public boolean CheckEmail(String email);
	
	public boolean CheckNick(String nick);
//	public List<User> getAllUser();
	
	public void addUser(User user);
	
//	public boolean delUser(String id);
	
	public boolean updateUser(User user);
}
