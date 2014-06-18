package com.conch.manager;

import com.conch.entity.Photo;

public interface PhotoManager {	
	public void addPhoto(Photo photo);
	public void updatePhoto(Photo photo);
	public void updateMaildir(String pid, String maildir);
	public void updateMailid(String pid, String mailid);
	public void setShareable(String pid, int shareable);
	public void setShareurl(String pid, int shareurl);
	

}
