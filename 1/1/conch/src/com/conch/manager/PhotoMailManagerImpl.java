package com.conch.manager;

import com.conch.dao.PhotoMailDao;
import com.conch.entity.PhotoMail;
import com.conch.manager.PhotoMailManager;

public class PhotoMailManagerImpl implements PhotoMailManager {

	private PhotoMailDao photoMailDao;
	
	public void setPhotoMailDao(PhotoMailDao photoMailDao){
		this.photoMailDao = photoMailDao;
	}
	
	@Override
	public PhotoMail getPhotoMail() {
		// TODO Auto-generated method stub
		return null;
	}

	@Override
	public void setPhotoMail(PhotoMail photoMail) {
		// TODO Auto-generated method stub
		
	}

	@Override
	public void addPhotoMail(PhotoMail photoMail) {
		// TODO Auto-generated method stub
		this.photoMailDao.addPhotoMail(photoMail);
		
	}

}
