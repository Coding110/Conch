package com.generic;

import java.io.IOException;
import java.io.InputStream;
import java.util.Arrays;

/*
 * 	最好能把读写做成异步的
 */
public class PhotoInputStream extends InputStream {
	
	private byte[] imgBuf;
	private int imgSize;
	private int imgBufSize;
	private int readPos;
	
	PhotoInputStream(int imgsize){
		this.imgBuf = new byte[imgsize];
		this.imgSize = imgsize;
		this.imgBufSize = 0;
		this.readPos = 0;
	}
	
	public int write(byte[] buf){
		if(this.imgBufSize + buf.length > this.imgSize){
			return -1; // 超出了预设大小
		}
		System.arraycopy(buf, 0, this.imgBuf, this.imgBufSize, buf.length);
		this.imgBufSize += buf.length;		
		return 0;
	}
	
	@Override
	public int read() throws IOException {
		 if(readPos < imgBuf.length)
            return imgBuf[readPos++];
        else
            return -1;
	}
	
	@Override
	public int read(byte[] b) throws IOException { 

		if(readPos < imgSize){
			if(b.length < imgSize - readPos){
				System.arraycopy(this.imgBuf, this.readPos, b, 0, b.length);
				readPos += b.length;
				return b.length;
			}else{
				int len = imgSize - readPos;
				System.arraycopy(this.imgBuf, this.readPos, b, 0, len);
				readPos += len;
				return len;
			}			
		}else{
			return -1;
		}
	}
	
	@Override
	public int available() throws IOException {  // 大文件应按块处理
		return imgBuf.length-readPos;
	}
	
	@Override
	public void reset() throws IOException {
		 readPos = 0;
	}
	
	public static void main(String[] args) throws Exception{
		PhotoInputStream iis = new PhotoInputStream(100);

		byte[] buf = new byte[10];
		for(int i=0; i<10; i++){
			buf[i] = (byte) (i+1);
		}
		
		for(int i=0; i<10; i++){
			iis.write(buf);
		}
		
		System.out.println("available: " + iis.available());
		
		byte[] b = new byte[12];
		int len = 0;
		while((len = iis.read(b)) >= 0){			
			System.out.print("read len: " + len + ", " + iis.available() + " - ");			
			System.out.println(Arrays.toString(b));
			Arrays.fill(b, (byte)0);
		}
		
		iis.reset();
		byte c;
		while((c = (byte) iis.read()) >=0){
			System.out.print(c + " ");
		}
		
		iis.close();
	}

}
