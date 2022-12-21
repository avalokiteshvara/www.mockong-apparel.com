<?php
	function create_slug($string, $ext='.html'){
	    $replace = '-';    
	    $string = strtolower($string);

	    //remove query string
	    if(preg_match("#^http(s)?://[a-z0-9-_.]+\.[a-z]{2,4}#i",$string)){
	        $parsed_url = parse_url($string);
	        $string = $parsed_url['host'].' '.$parsed_url['path'];

	        //if want to add scheme eg. http, https than uncomment next line
	        //$string = $parsed_url['scheme'].' '.$string;
	    }

	    //replace / and . with white space
	    $string = preg_replace("/[\/\.]/", " ", $string);

	    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);

	    //remove multiple dashes or whitespaces
	    $string = preg_replace("/[\s-]+/", " ", $string);

	    //convert whitespaces and underscore to $replace
	    $string = preg_replace("/[\s_]/", $replace, $string);

	    //limit the slug size
	    $string = substr($string, 0, 100);

	    //slug is generated
	    return ($ext) ? $string.$ext : $string;
	}    
//usage
//$string = "how to become a php expert?";
//$slug = create_slug($string);

//it will return
//how-to-become-a-php-expert.html
?>