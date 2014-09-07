<?php
/**
 *	AES encrypt and decrypt based on mcrypt
 */

abstract class AES{
	/**
	 *	There include two length, 192 and 256
	 */
	const CIPHER = MCRYPT_RIJNDAEL_128;
	/**
	 *	Model
	 */
	const MODE = MCRYPT_MODE_ECB;

	/**
	 * Encrypt
	 * @param string $key	encrypt key
	 * @param string $str	needed encrypt string
	 * @return type
	 */
	static public function encode( $key, $str ){
		$iv = mcrypt_create_iv(mcrypt_get_iv_size(self::CIPHER,self::MODE),MCRYPT_RAND);
		return mcrypt_encrypt(self::CIPHER, $key, $str, self::MODE, $iv);
	}

	/**
	 * Decrypt
	 * @param type $key
	 * @param type $str
	 * @return type
	 */
	static public function decode( $key, $str ){
		$iv = mcrypt_create_iv(mcrypt_get_iv_size(self::CIPHER,self::MODE),MCRYPT_RAND);
		return mcrypt_decrypt(self::CIPHER, $key, $str, self::MODE, $iv);
	}
}

/*
 * 	Demo
 */

/*
$str = 'Hello World';
$key = 'aSGJLGYEWERWRREW4567i8o';

$str1=AES::encode($key, $str);
$str2=AES::decode($key, $str1);

var_dump($str);
var_dump($str1);
var_dump($str2);
var_dump(rtrim($str2));

 */
?>