package com.generic;

//import java.util.Properties;

import java.io.IOException;
import java.util.Iterator;
import java.util.Map;

import org.im4java.core.ConvertCmd;
import org.im4java.core.IMOperation;
import org.im4java.core.Info;

public class ImageTool {


	/**
	 * ImageMagick的路径
	 */
	public static String imageMagickPath = "/ImageMagick-6.8.9/bin";
	//static {
		/**
		 * 
		 * 获取ImageMagick的路径
		 */
		//Properties prop = new PropertiesFile().getPropertiesFile();
		//linux下不要设置此值，不然会报错
		//imageMagickPath = prop.getProperty("imageMagickPath");
	//}

	/**
	 * 
	 * 根据坐标裁剪图片
	 * 
	 * @param srcPath   要裁剪图片的路径
	 * @param newPath   裁剪图片后的路径
	 * @param x         起始横坐标
	 * @param y         起始纵坐标
	 * @param x1        结束横坐标
	 * @param y1        结束纵坐标
	 */

	public static void cutImage(String srcPath, String newPath, int x, int y, int x1,	int y1) throws Exception {
		int width = x1 - x;
		int height = y1 - y;
		IMOperation op = new IMOperation();
		op.addImage(srcPath);
		/**
		 * width：  裁剪的宽度
		 * height： 裁剪的高度
		 * x：       裁剪的横坐标
		 * y：       裁剪的挫坐标
		 */
		op.crop(width, height, x, y);
		op.addImage(newPath);
		ConvertCmd convert = new ConvertCmd();

		// linux下不要设置此值，不然会报错
		convert.setSearchPath(imageMagickPath);

		convert.run(op);
	}

	/**
	 * 
	 * 根据尺寸缩放图片
	 * @param width             缩放后的图片宽度
	 * @param height            缩放后的图片高度
	 * @param srcPath           源图片路径
	 * @param newPath           缩放后图片的路径
	 */
	public static void cutImage(int width, int height, String srcPath,	String newPath) throws Exception {
		IMOperation op = new IMOperation();
		op.addImage(srcPath);
		op.resize(width, height);
		op.addImage(newPath);
		ConvertCmd convert = new ConvertCmd();
		// linux下不要设置此值，不然会报错
		convert.setSearchPath(imageMagickPath);
		convert.run(op);

	}

	/**
	 * 根据宽度缩放图片
	 * 
	 * @param width            缩放后的图片宽度
	 * @param srcPath          源图片路径
	 * @param newPath          缩放后图片的路径
	 */
	public static void cutImage(int width, String srcPath, String newPath)	throws Exception {
		IMOperation op = new IMOperation();
		op.addImage(srcPath);
		op.resize(width, null);
		op.addImage(newPath);
		ConvertCmd convert = new ConvertCmd();
		// linux下不要设置此值，不然会报错
		convert.setSearchPath(imageMagickPath);
		convert.run(op);
	}

	/**
	 * 给图片加水印
	 * @param srcPath            源图片路径
	 */
	public static void addImgText(String srcPath) throws Exception {
		IMOperation op = new IMOperation();
		op.font("宋体").gravity("southeast").pointsize(18).fill("#BCBFC8").draw("text 5,5 juziku.com");
		//op.gravity("southeast").pointsize(18).fill("#BCBFC8").draw("text 5,5 juziku.com");
		op.addImage();
		op.addImage();
		ConvertCmd convert = new ConvertCmd();
		System.out.println("1");
		// linux下不要设置此值，不然会报错
		convert.setSearchPath(imageMagickPath);
		
		System.out.println("2 = " + srcPath);
		convert.run(op, srcPath, srcPath);
	}

	public static void setSysEnv(String IMPath) throws IOException{
		
		/*String key, value = null;
		Map m = System.getenv();
        for ( Iterator it = m.keySet().iterator(); it.hasNext(); )
        {
               key = (String ) it.next();
               value = (String )  m.get(key);
               if(key.equals("PATH")){
            	   System.out.println(key +":" +value);
            	   break;
               }
        }
        value += ":" + IMBin;
        System.out.println("PATH - " +value);*/
        //System.setProperty("PATH", value);
        //System.setProperty("DYLD_LIBRARY_PATH", IMLib);
        //System.set
		
		//String cmdbin = "export PATH=$PATH:/Users/DH/programs/ImageMagick-6.8.9/bin";
		//String cmdlib = "export DYLD_LIBRARY_PATH=$MAGICK_HOME/lib/";
		
		/*String cmd = "source /Users/DH/.bash_profile";
		System.out.println(cmd);*/
		
		//String lib = IMPath + "/lib/libMagickCore-6.Q16.2.dylib";
		String lib = "libMagickCore-6.Q16.2.dylib";
		System.out.println(lib);
		
		//String cmd = "lame";
		
		try{
	        Runtime run = Runtime.getRuntime();
	        //run.e
	        //run.exec(cmd);
	        //run.loadLibrary(lib); 
	        //run.exec(cmdbin);
	        //run.exec(cmdlib);
		}catch (Exception e) {  
            e.printStackTrace();
		}
	}
	
	public static void main(String[] args) throws Exception {
		
		//setSysEnv("/Users/DH/programs/ImageMagick-6.8.9");
		System.out.println("---------");
		
		String key, value = null;
		Map m = System.getenv();
		//System.setenv("");
        for ( Iterator it = m.keySet().iterator(); it.hasNext(); )
        {
               key = (String ) it.next();
               value = (String )  m.get(key);
               //if(key.equals("PATH")){
            	   System.out.println(key +":" +value);
            	   //break;
               //}
        }
        
		cutImage("/Users/DH/Pictures/img/a.jpg", "/Users/DH/Pictures/img/anew.jpg", 98, 48, 370,320);
		// cutImage(200,300, "/home/1.jpg", "/home/2.jpg");
		//addImgText("/Users/DH/Pictures/img/a.jpg");
		//Info info;
		//info.
	}
}