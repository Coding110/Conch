package com.conch.dao;

import com.conch.entity.Photo;
import com.conch.entity.PhotoFolder;

public interface PhotoDao {
	
	// DAO for 'Photo'
	public void setPhoto(Photo photo);
	public Photo getPhoto(Photo photo);
	public void addPhoto(Photo photo);
	public void updatePhoto(Photo photo);
	public void setShareable(String pid, int shareable);
	
	// DAO for 'PhotoFolder'
	public void setPhotofoler(PhotoFolder photoFolder);
	public PhotoFolder getPhotofoler(PhotoFolder photoFolder);
	public void addPhotofoler(PhotoFolder photoFolder);
	public void updatePhotofoler(PhotoFolder photoFolder);
	public int getMaxPhotoFolder(String photomail);
}
