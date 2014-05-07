package com.conch.emfs;



public class BodyDataCallBack implements DataCallBack {
	
	@Override
	public int ReadCallBack(byte buf[], int buflen)
	{
		return 0;
	}
	
	@Override
	public int WriteCallBack(byte buf[], int buflen)
	{
		return 0;
	}

	@Override
	public int WriteCallBack(char[] buf, int buflen) {
		// TODO Auto-generated method stub
		return 0;
	}
	
}
