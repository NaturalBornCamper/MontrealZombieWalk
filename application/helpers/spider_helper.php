<?php

function isSpider()  
{
	// Add as many spiders you want in this array  
	$spiders    = array(  
		'Googlebot',
		'Yammybot',
		'Openbot',
		'Yahoo',
		'Slurp',
		'msnbot',  
		'ia_archiver',
		'Lycos',
		'Scooter',
		'AltaVista',
		'Teoma',
		'Gigabot',  
		'Googlebot-Mobile'  
	);  
	
	// Loop through each spider and check if it appears in  
	// the User Agent  
	foreach ($spiders as $spider)
		if (eregi($spider, $_SERVER['HTTP_USER_AGENT']))  
			return TRUE;
			
	return FALSE;  
}  
