<?php

	//config file 
	
		require_once('config/config.php');
		
	//Autoload
		
		function __autoload ($className){
		
			require_once('lib/'.$className.'.php');
		
		}