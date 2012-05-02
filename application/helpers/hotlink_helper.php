<?php
function hotlink($str, $lang)
{
	global $hotlinksEN, $hotlinksFR;
	if ($lang == 'en') $hotlinks = $hotlinksEN;
	else $hotlinks = $hotlinksFR;
	
	foreach ($hotlinks as $hotlink)
	{
		$str = preg_replace('/('.$hotlink[0].')/i',
			'<a title="'.($hotlink[1]?$hotlink[1]:'$1').'" href="'.$hotlink[2].'" target="'.($hotlink[3]?'popup':'').'">$1</a>',
			$str
		);
	}
	return $str;
}