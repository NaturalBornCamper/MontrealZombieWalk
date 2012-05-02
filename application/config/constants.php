<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


if ( preg_match('/montrealzombiewalk\.com$/', $_SERVER['HTTP_HOST']) )
	define('DEV', false);
else
	define('DEV', true);

// Website skins
$SKINS = array(
	'fiveroses1',
	'fiveroses2',
	'fiveroses3',
	'lake',
	'machinery',
	'mud3',
	'street'
);


$compatibleBrowsers = array(
	'MSIE' => '9999999',
	'Firefox' => '03.6',//'3.5.9',
	'Chrome' => '07',//'13.0.782.220',
	'Safari' => '04',
	'Opera' => '10',//'11.51',
	'Netscape' => '09',
	'Unknown' => ''
);
	
	
// Hotlinks, text to replace with links
// array(Search Term, link title, href, target popup?)
$hotlinksEN = array(
	array('zombie makeup', 'Tips about zombie makeup', 'http://www.montrealzombiewalk.com/links/makeup', 0),
	array('zombie costume', 'Tips about zombie costumes', 'http://www.montrealzombiewalk.com/links/costumes', 0),
	'club soda' => array('club soda', '', 'http://g.co/maps/bmn9h', 1),
	'boudoir' => array('boudoir', '', 'http://g.co/maps/8zb8d', 1),
	'metro mont-royal' => array('metro mont-royal', '', 'http://g.co/maps/f3gtv', 1)
//	'spasm' => array('spasm', '', 'http://www.spasm.ca', 1)
);
$hotlinksFR = array(
	array('maquillage', 'Conseils pour le maquillage', 'http://www.montrealzombiewalk.com/links/makeup', 0),
	array('zombie costume', 'Conseils pour costume', 'http://www.montrealzombiewalk.com/links/costumes', 0),
	$hotlinksEN['club soda'],
	$hotlinksEN['boudoir'],
	$hotlinksEN['metro mont-royal']
//	$hotlinksEN['spasm']
);


/* End of file constants.php */
/* Location: ./application/config/constants.php */