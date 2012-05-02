<?php
function getMenuItem($currentSection, $section, $content, $lang)
{
	$attributes = array('title' => $content);
	if ($section == $currentSection)
		$attributes['class'] = 'currentSection';
		
	return anchor(site_url($section), $content, $attributes);
}