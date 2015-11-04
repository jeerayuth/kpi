<?php

class MyClass  {

	public static function generateKey($length)
	{   
		$charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

		for($i=0; $i<$length; $i++) 
			$key .= $charset[(mt_rand(0,(strlen($charset)-1)))]; 

		return $key;
	}


}

?>