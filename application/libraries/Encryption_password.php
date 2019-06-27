<?php
/*
	author: Geidtiphong Singseewo
	date: 18/10/2016
	guide:
		cost=>default value = 10(PHP site recommended)
		salt=>deprecated in PHP 7.0.0
		PASSWORD_DEFAULT=>stronger algorithm and change new over time. please expand column beyond 60 characters(255 charactor would be good choice)
		PASSWORD_BCRYPT=>this will  produce a standrad crypt() compatible. the result will be always 60 characters string.
		strcmp=>binary safe string comparison.

		$options=[
	               	'cost'=>11,
	                'salt'=>mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
	            ];
		$bcrypt_password=password_hash($re_password, PASSWORD_BCRYPT, $options);


*/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Encryption_password {

	function encryption($qstr)
	{
		$bcrypt_password=0;
	    $confrim_pass=strcmp(trim($qstr['new_password']), trim($qstr['re_password']));
	    if ($confrim_pass == 0) {
	    	if ($qstr['current_password'] !='0') {
	    		if (password_verify($qstr['hash_password'], $qstr['current_password'])) {
	    			$bcrypt_password=password_hash($qstr['re_password'], PASSWORD_DEFAULT);	
	    		}
	    	}else {
	    		$bcrypt_password=password_hash($qstr['re_password'], PASSWORD_DEFAULT);	
	    	}
	    }
		return $bcrypt_password;
	}


}//end class
