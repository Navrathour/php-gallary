<?php

function __autoload($class){
	$class=strtolower($class);
	$the_path="includes/{$class}.php";
	if(file_exists($the_path)){
		require_once($the_path);
	}else{
		die("this php {$class} is not found");
	}
}


function redirect($location){
	header("Location:{$location}");
}
?>