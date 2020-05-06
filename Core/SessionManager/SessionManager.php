<?php

namespace Core\SessionManager;
/**
* 
*/
class SessionManager 
{
	
	public static function create($userdata){
		if (!is_null($userdata)) {
			@session_start();
			foreach ($userdata as $key => $value) {
				$_SESSION[$key]=$value;
			}
			return session_id();
		}
		else{
			echo "no data received";
		}

	}
}