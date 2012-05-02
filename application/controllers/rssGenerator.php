<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class RssGenerator extends MY_Controller {
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		//---------------------------------------------------------------------------------------------------
		//    +    GENERATION
		
		//---------------------------------------------------------------------------------------------------
		$this->load->helper('date');
		$this->load->model('news_model');
		$newsList = $this->news_model->getNewsEnFr();
		
		$now = date("D, d M Y H:i:s T");
		
		// entete du flux
		$output = "<?xml version=\"1.0\"  encoding=\"UTF-8\"?>";
		$output .="<rss version=\"2.0\" xmlns:atom=\"http://www.w3.org/2005/Atom\"><channel>";
		$output .="<atom:link href=\"".base_url()."rss.xml\" rel=\"self\" type=\"application/rss+xml\" />";
		$output .="<title>Montreal Zombie Walk RSS News</title>";
		$output .="<link>".base_url()."rss.xml</link>";
		$output .="<description>Montreal Zombie Walk News</description>";
		$output .="<pubDate>$now</pubDate>";
		$output .="<lastBuildDate>".$now."</lastBuildDate>";
		
		foreach ($newsList as $news)
		{
			$output .= "<item>";
			$output .= "<title>".$news->title_en."</title>";
			$output .="<description>".strip_tags($news->description_en)."</description>";
			$output .= "<link>".site_url("en/news/".$news->url_en)."</link>";
			$output .= "<guid>".site_url("rss/".$news->url_en)."</guid>";
			$output .= "<pubDate>".standard_date('DATE_RFC1123', strtotime($news->date))."</pubDate>";
			$output .="</item>";
			
			$output .= "<item>";
			$output .= "<title>".$news->title_fr."</title>";
			$output .="<description>".strip_tags($news->description_fr)."</description>";
			$output .= "<link>".site_url("fr/news/".$news->url_fr)."</link>";
			$output .= "<guid>".site_url("rss/".$news->url_fr)."</guid>";
			$output .= "<pubDate>".standard_date('DATE_RFC1123', strtotime($news->date))."</pubDate>";
			$output .="</item>";
		}
		
		$output .="</channel></rss>";
		
		$rssFile = "rss.xml";
		$fh = fopen($rssFile, 'w') or die("Can't open file ".$rssFile); 
		fwrite($fh, $output);
		fclose($fh);
		
		echo '<pre>'.htmlentities($output).'</pre>';
	}
}