<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SitemapGenerator extends MY_Controller {
/*
always
hourly
daily
weekly
monthly
yearly
never
*/
    var $sitemapInfos;
    
    function __construct()
    {
		parent::__construct(); 
        $this->sitemapInfos = array();
    }
    
    function index()
    {
		$this->load->library('sitemaps');
		$this->load->model('news_model');
		$this->load->model('media_model');
        
		
		// INFOS
		$data = array(
			'loc' => base_url().'en/infos',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'monthly',
			'priority' => '1'
		);
		$this->sitemaps->add_item($data);
		$data = array(
			'loc' => base_url().'fr/infos',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'monthly',
			'priority' => '1'
		);
		$this->sitemaps->add_item($data);
		
		// INFOS->About
		$data = array(
			'loc' => base_url().'en/infos/about',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'yearly',
			'priority' => '0.75'
		);
		$this->sitemaps->add_item($data);
		$data = array(
			'loc' => base_url().'fr/infos/about',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'yearly',
			'priority' => '0.75'
		);
		$this->sitemaps->add_item($data);
		
		// INFOS->Guidelines
		$data = array(
			'loc' => base_url().'en/infos/guidelines',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'yearly',
			'priority' => '0.75'
		);
		$this->sitemaps->add_item($data);
		$data = array(
			'loc' => base_url().'fr/infos/guidelines',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'yearly',
			'priority' => '0.75'
		);
		$this->sitemaps->add_item($data);
		
		//////////////////////////////////////////////////////////////////////
		
		// NEWS
		$data = array(
			'loc' => base_url().'en/news',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'daily',
			'priority' => '1'
		);
		$this->sitemaps->add_item($data);
		$data = array(
			'loc' => base_url().'fr/news',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'daily',
			'priority' => '1'
		);
		$this->sitemaps->add_item($data);

		$newsList = $this->news_model->getNewsUrls();     
        foreach ($newsList as $news):
            $data = array(
                'loc' => base_url().'en/news/'.$news->url_en,
                'lastmod' => strftime('%Y-%m-%d', strtotime($news->date)),
                'changefreq' => 'daily',
                'priority' => '.75'
            );
			$this->sitemaps->add_item($data);
            
            $data = array(
				'loc' => base_url().'fr/news/'.$news->url_fr,
				'lastmod' => strftime('%Y-%m-%d', strtotime($news->date)),
				'changefreq' => 'daily',
                'priority' => '.75'
			);
            $this->sitemaps->add_item($data);
		endforeach;
   		
		//////////////////////////////////////////////////////////////////////
		
		// MEDIA
		$data = array(
			'loc' => base_url().'en/media',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'monthly',
			'priority' => '0.50'
		);
		$this->sitemaps->add_item($data);
		$data = array(
			'loc' => base_url().'fr/media',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'monthly',
			'priority' => '0.50'
		);
		$this->sitemaps->add_item($data);
		
		// MEDIA->Photos
		$data = array(
			'loc' => base_url().'en/media/photos',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'weekly',
			'priority' => '0.25'
		);
		$this->sitemaps->add_item($data);
		$data = array(
			'loc' => base_url().'fr/media/photos',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'weekly',
			'priority' => '0.25'
		);
		$this->sitemaps->add_item($data);
		
		// MEDIA->Videos
		$data = array(
			'loc' => base_url().'en/media/videos',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'yearly',
			'priority' => '0.25'
		);
		$this->sitemaps->add_item($data);
		$data = array(
			'loc' => base_url().'fr/media/videos',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'yearly',
			'priority' => '0.25'
		);
		$this->sitemaps->add_item($data);
		
		// MEDIA->Fanart
		$data = array(
			'loc' => base_url().'en/media/fanart',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'monthly',
			'priority' => '0.25'
		);
		$this->sitemaps->add_item($data);
		$data = array(
			'loc' => base_url().'fr/media/fanart',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'monthly',
			'priority' => '0.25'
		);
		$this->sitemaps->add_item($data);

		// Every single medias
		$mediaList = $this->media_model->getMediasUrls();     
        foreach ($mediaList as $currentMedia):
            $data = array(
                'loc' => base_url().'en/media/'.$currentMedia->type.'/'.$currentMedia->url_en,
                'lastmod' => strftime('%Y-%m-%d', strtotime($currentMedia->date)),
                'changefreq' => 'daily',
                'priority' => '.75'
            );
			$this->sitemaps->add_item($data);
            
            $data = array(
                'loc' => base_url().'fr/media/'.$currentMedia->type.'/'.$currentMedia->url_fr,
				'lastmod' => strftime('%Y-%m-%d', strtotime($currentMedia->date)),
				'changefreq' => 'daily',
                'priority' => '.75'
			);
            $this->sitemaps->add_item($data);
		endforeach;
		
		//////////////////////////////////////////////////////////////////////
		
		// HELP US
		$data = array(
			'loc' => base_url().'en/help',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'monthly',
			'priority' => '0.50'
		);
		$this->sitemaps->add_item($data);
		$data = array(
			'loc' => base_url().'fr/help',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'monthly',
			'priority' => '0.50'
		);
		$this->sitemaps->add_item($data);
		
		// HELP US->Donate
		$data = array(
			'loc' => base_url().'en/help/donate',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'yearly',
			'priority' => '0.25'
		);
		$this->sitemaps->add_item($data);
		$data = array(
			'loc' => base_url().'fr/help/donate',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'yearly',
			'priority' => '0.25'
		);
		$this->sitemaps->add_item($data);
		
		// HELP US->Merchandise
		$data = array(
			'loc' => base_url().'en/help/merchandise',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'monthly',
			'priority' => '0.40'
		);
		$this->sitemaps->add_item($data);
		$data = array(
			'loc' => base_url().'fr/help/merchandise',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'monthly',
			'priority' => '0.40'
		);
		$this->sitemaps->add_item($data);
		
		// HELP US->Helpers
		$data = array(
			'loc' => base_url().'en/help/helpers',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'monthly',
			'priority' => '0.25'
		);
		$this->sitemaps->add_item($data);
		$data = array(
			'loc' => base_url().'fr/help/helpers',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'monthly',
			'priority' => '0.25'
		);
		$this->sitemaps->add_item($data);
		
		//////////////////////////////////////////////////////////////////////
		
		// LINKS
		$data = array(
			'loc' => base_url().'en/links',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'monthly',
			'priority' => '0.25'
		);
		$this->sitemaps->add_item($data);
		$data = array(
			'loc' => base_url().'fr/links',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'monthly',
			'priority' => '0.25'
		);
		$this->sitemaps->add_item($data);
		
		// LINKS->makeup
		$data = array(
			'loc' => base_url().'en/links/makeup',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'yearly',
			'priority' => '0.15'
		);
		$this->sitemaps->add_item($data);
		$data = array(
			'loc' => base_url().'fr/links/makeup',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'yearly',
			'priority' => '0.15'
		);
		$this->sitemaps->add_item($data);
		
		// LINKS->costumes
		$data = array(
			'loc' => base_url().'en/links/costumes',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'yearly',
			'priority' => '0.15'
		);
		$this->sitemaps->add_item($data);
		$data = array(
			'loc' => base_url().'fr/links/costumes',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'yearly',
			'priority' => '0.15'
		);
		$this->sitemaps->add_item($data);
		
		// LINKS->useful links
		$data = array(
			'loc' => base_url().'en/links/useful-links',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'yearly',
			'priority' => '0.15'
		);
		$this->sitemaps->add_item($data);
		$data = array(
			'loc' => base_url().'fr/links/useful-links',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'yearly',
			'priority' => '0.15'
		);
		$this->sitemaps->add_item($data);
		
		// LINKS->partners
		$data = array(
			'loc' => base_url().'en/links/partners',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'monthly',
			'priority' => '0.15'
		);
		$this->sitemaps->add_item($data);
		$data = array(
			'loc' => base_url().'fr/links/partners',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'monthly',
			'priority' => '0.15'
		);
		$this->sitemaps->add_item($data);
		
		//////////////////////////////////////////////////////////////////////
		
		// CONTACT
		$data = array(
			'loc' => base_url().'en/contact/',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'yearly',
			'priority' => '0.50'
		);
		$this->sitemaps->add_item($data);
		$data = array(
			'loc' => base_url().'fr/contact/',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'yearly',
			'priority' => '0.50'
		);
		$this->sitemaps->add_item($data);
		
		// CONTACT->faqs
		$data = array(
			'loc' => base_url().'en/contact/faq',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'monthly',
			'priority' => '0.40'
		);
		$this->sitemaps->add_item($data);
		$data = array(
			'loc' => base_url().'fr/contact/faq',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'monthly',
			'priority' => '0.40'
		);
		$this->sitemaps->add_item($data);
		
		// CONTACT->forum
		$data = array(
			'loc' => base_url().'en/contact/forum',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'always',
			'priority' => '0.40'
		);
		$this->sitemaps->add_item($data);
		$data = array(
			'loc' => base_url().'fr/contact/forum',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'always',
			'priority' => '0.40'
		);
		$this->sitemaps->add_item($data);
		
		// CONTACT->contact us
		$data = array(
			'loc' => base_url().'en/contact/contact-us',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'yearly',
			'priority' => '0.35'
		);
		$this->sitemaps->add_item($data);
		$data = array(
			'loc' => base_url().'fr/contact/contact-us',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'yearly',
			'priority' => '0.35'
		);
		$this->sitemaps->add_item($data);
		
		//////////////////////////////////////////////////////////////////////
		
		// SITEMAP
		$data = array(
			'loc' => base_url().'en/sitemap',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'daily',
			'priority' => '0.40'
		);
		$this->sitemaps->add_item($data);
		$data = array(
			'loc' => base_url().'fr/sitemap',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'daily',
			'priority' => '0.40'
		);
		$this->sitemaps->add_item($data);
		
		//////////////////////////////////////////////////////////////////////
		
		// PRESS
		$data = array(
			'loc' => base_url().'en/press',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'daily',
			'priority' => '0.40'
		);
		$this->sitemaps->add_item($data);
		$data = array(
			'loc' => base_url().'fr/press',
			'lastmod' => strftime('%Y-%m-%d', time()),
			'changefreq' => 'daily',
			'priority' => '0.40'
		);
		$this->sitemaps->add_item($data);
		     

//---------------------------------------------------------------------------------------------------
        //    +    GENERATION

//---------------------------------------------------------------------------------------------------
        $sitemap = $this->sitemaps->build("./sitemap.xml");
        $reponses = $this->sitemaps->ping(base_url().$sitemap[1]);
		
		echo '<pre>'.htmlentities($sitemap[0]).'</pre>';
    }
}