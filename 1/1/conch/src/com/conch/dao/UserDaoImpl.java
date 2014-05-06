package com.conch.dao;

import java.util.List;

import org.hibernate.Query;
import org.hibernate.SessionFactory;

import com.conch.entity.User;

public class UserDaoImpl implements UserDao {

	private SessionFactory sessionFactory;

	public void setSessionFactory(SessionFactory sessionFactory) {
		this.sessionFactory = sessionFactory;
	}
	
	@Override
	public User getUser(User user) {
		
		String hql = "from User u where u.regname=? and u.passwd=?";
		Query query = sessionFactory.getCurrentSession().createQuery(hql);
		query.setString(0, user.getRegname());
		query.setString(1, user.getPasswd());
		
		return (User)query.uniqueResult();
	}


	@Override
	public void addUser(User user) {
		sessionFactory.getCurrentSession().save(user);
	}

	@Override
	public boolean CheckUser(String username, String passwd) {
		 List arr=null; 
		String hql = "from User u where u.regname=? and u.passwd=?";
		Query query = sessionFactory.getCurrentSession().createQuery(hql);
		query.setString(0, username);
		query.setString(1, passwd);
	    arr=query.list(); 
	    if(arr.isEmpty()){
			return false;
		 }
		return true;
	}

	@Override
	public boolean CheckEmail(String email) {
		  List arr=null; 
		String hql = " from User u where u.regemail=?";
		Query query = sessionFactory.getCurrentSession().createQuery(hql);
		query.setString(0, email);
		 arr=query.list(); 
		//System.out.println(query.executeUpdate());
		 if(arr.isEmpty()){
			System.out.println("false");
			 return false;
		 }
		return true;
	}

	@Override
	public boolean updateUser(User user) {
		// TODO Auto-generated method stub
		return false;
	}

	@Override
	public boolean CheckNick(String nick) {
		  List arr=null; 
			String hql = " from User u where u.regname=?";
			Query query = sessionFactory.getCurrentSession().createQuery(hql);
			query.setString(0, nick);
			 arr=query.list(); 
			//System.out.println(query.executeUpdate());
			 if(arr.isEmpty()){
				System.out.println("false");
				 return false;
			 }
			return true;
	}

//	@Override
//	public boolean delUser(String id) {
//		
//		String hql = "delete User u where u.id = ?";
//		Query query = sessionFactory.getCurrentSession().createQuery(hql);
//		query.setString(0, id);
//		
//		return (query.executeUpdate() > 0);
//	}

//	@Override
//	public boolean updateUser(User user) {
//		
//		String hql = "update U u set u.userName = ?,u.age=? where u.id = ?";
//		Query query = sessionFactory.getCurrentSession().createQuery(hql);
//		query.setString(0, user.getUserName());
//		query.setString(1, user.getAge());
//		query.setString(2, user.getId());
//		
//		return (query.executeUpdate() > 0);
//	}

}
