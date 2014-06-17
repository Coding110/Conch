package com.conch.dao;

import org.hibernate.SessionFactory;

import com.conch.entity.Photo;
import com.conch.entity.PhotoFolder;

public class PhotoDaoImpl implements PhotoDao {

	private SessionFactory sessionFactory;

	public void setSessionFactory(SessionFactory sessionFactory) {
		this.sessionFactory = sessionFactory;
	}
	
	
	/* DAO for 'Photo' */
	
	@Override
	public void addPhoto(Photo photo) {
		// TODO Auto-generated method stub
		sessionFactory.getCurrentSession().save(photo);
		
	}

	@Override
	public void updatePhoto(Photo photo) {
		// TODO Auto-generated method stub
		sessionFactory.getCurrentSession().update(photo);
	}

	@Override
	public void setShareable(String pid, int shareable) {
		// TODO Auto-generated method stub
		
	}

	@Override
	public void setPhoto(Photo photo) {
		// TODO Auto-generated method stub
		
	}

	@Override
	public Photo getPhoto(Photo photo) {
		// TODO Auto-generated method stub
		return null;
	}
	
	
	/* DAO for 'PhotoFolder' */

	@Override
	public void setPhotofoler(PhotoFolder photo) {
		// TODO Auto-generated method stub
		
	}

	@Override
	public PhotoFolder getPhotofoler(PhotoFolder photo) {
		// TODO Auto-generated method stub
		return null;
	}

	@Override
	public void addPhotofoler(PhotoFolder photo) {
		// TODO Auto-generated method stub
		
	}

	@Override
	public void updatePhotofoler(PhotoFolder photo) {
		// TODO Auto-generated method stub
		
	}

}
