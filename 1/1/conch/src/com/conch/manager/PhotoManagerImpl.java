package com.conch.manager;

import com.conch.dao.PhotoDao;
import com.conch.entity.Photo;

public class PhotoManagerImpl implements PhotoManager{

	private PhotoDao photoDao;

	public void setPhotoDao(PhotoDao photoDao) {
		this.photoDao = photoDao;
	}
	
	@Override
	public void addPhoto(Photo photo) {
		// TODO Auto-generated method stub
		photoDao.addPhoto(photo);
	}

	@Override
	public void setShareable(String pid, int shareable) {
		// TODO Auto-generated method stub
		photoDao.setShareable(pid, shareable);
	}

	@Override
	public void updateMaildir(String pid, String maildir) {
		// TODO Auto-generated method stub
		
	}

	@Override
	public void updateMailid(String pid, String mailid) {
		// TODO Auto-generated method stub
		
	}

	@Override
	public void setShareurl(String pid, int shareurl) {
		// TODO Auto-generated method stub
		
	}
}

