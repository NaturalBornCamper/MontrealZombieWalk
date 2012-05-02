<?php
function randomSkin()
{
	$skins = array(
		'fiveroses1',
		'fiveroses2',
		'fiveroses3',
		'lake',
		'machinery',
		'mud3',
		'street'
	);
	return $skins[array_rand($skins)];
}