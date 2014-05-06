package com.conch.manager;

import java.util.List;

import com.conch.dao.UserDao;
import com.conch.entity.User;

public class UserManagerImpl implements UserManager {

	private UserDao userDao;
	
	public void setUserDao(UserDao userDao) {
		this.userDao = userDao;
	}

	@Override
	public User getUser(User user) {
		return userDao.getUser(user);
	}


	@Override
	public void addUser(User user) {
		userDao.addUser(user);
	}

//	@Override
//	public boolean delUser(String id) {
//		
//		return userDao.delUser(id);
//	}

	@Override
	public boolean updateUser(User user) {
		return userDao.updateUser(user);
	}

	@Override
	public boolean CheckUser(String username, String passwd) {
		return userDao.CheckUser(username, passwd);
	}

	@Override
	public boolean CheckEmail(String email) {
		return userDao.CheckEmail(email);
	}

	@Override
	public boolean CheckNick(String nick) {
		return userDao.CheckNick(nick);
	}

}
