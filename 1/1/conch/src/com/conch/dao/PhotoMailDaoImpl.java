package com.conch.dao;

import org.hibernate.Query;
import org.hibernate.SessionFactory;

import com.conch.entity.PhotoMail;
import com.conch.entity.User;

public class PhotoMailDaoImpl implements PhotoMailDao {
	
	private SessionFactory sessionFactory;
	
	public void setSessionFactory(SessionFactory sessionFactory) {
		this.sessionFactory = sessionFactory;
	}
	
	@Override
	public void addPhotoMail(PhotoMail photoMail) {
		// TODO Auto-generated method stub
		sessionFactory.getCurrentSession().save(photoMail);		
	}

	@Override
	public PhotoMail getPhotoMail(PhotoMail photoMail) {
		// TODO Auto-generated method stub
		return photoMail;
	}	
	

}
