package com.conch.dao;

import java.util.List;

import org.hibernate.Query;
import org.hibernate.Session;
import org.hibernate.SessionFactory;
import org.hibernate.Transaction;

import com.conch.entity.User;

public class UserDaoImpl implements UserDao {

	private SessionFactory sessionFactory;

	public void setSessionFactory(SessionFactory sessionFactory) {
		this.sessionFactory = sessionFactory;
	}
	
	@Override
	public User getUser(String uid) {
		String hql = "from User u where u.uid=?";
		Query query = sessionFactory.getCurrentSession().createQuery(hql);
		query.setString(0, uid);	
		return (User)query.uniqueResult();
	}


	@Override
	public void addUser(User user) {
		sessionFactory.getCurrentSession().save(user);
	}

	@Override
	public User CheckUser(String username, String passwd) {

		String hql = "from User u where u.regemail=? and u.passwd=?";
		Query query = sessionFactory.getCurrentSession().createQuery(hql);
		query.setString(0, username);
		query.setString(1, passwd);
		return (User)query.uniqueResult();
	   
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
		//sessionFactory.getCurrentSession().update(user);
		System.out.println(user.getProvince() + user.getCity());
		Session session = sessionFactory.getCurrentSession();  
		String hql = "update User t set t.regname = '"+user.getRegname() + "',t.province='" +user.getProvince() +"',t.city='" +user.getCity()+"',t.age='"+user.getAge() +"' where t.uid = '" +user.getUid()+"'";
		Query query = session.createQuery(hql);  
		query.executeUpdate();  	
		return true;
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
			return false;
		 }
		return true;
	}

	@Override
	public String getUserId(String username) {
		// TODO Auto-generated method stub
		String hql = " from User u where u.regname=?";
		Query query = sessionFactory.getCurrentSession().createQuery(hql);
		query.setString(0, username);
		if(query.list().isEmpty()){
			System.out.println(username + " is not exist.");
			return null;
		}else{
			return ((User)query.uniqueResult()).getUid();
		}
		
	}


}
