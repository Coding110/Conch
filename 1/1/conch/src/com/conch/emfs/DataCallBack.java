package com.conch.emfs;

public interface DataCallBack {
	public int ReadCallBack(byte buf[], int buflen);
	public int WriteCallBack(byte buf[], int buflen);
	public int WriteCallBack(char buf[], int buflen);
}
