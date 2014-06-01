package com.conch.dao;

import com.conch.entity.Photo;

public interface PhotoDao {
	public void setPhoto(Photo photo);
	public Photo getPhoto(Photo photo);
	public void addPhoto(Photo photo);
	public void updatePhoto(Photo photo);
	public void setShareable(String pid, int shareable);	
}
