<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends MY_Controller {
	
	public function _remap($newsURL, $params = array())
	{
		// load language file
		$this->lang->load('global');
		
		$this->load->model('news_model');
		
		if ($newsURL != 'index')
		{
			$selectedNews = $this->news_model->getNewsByURL($newsURL);
			if ($selectedNews)
			{
				$data = array(
					'pageTitle' => $selectedNews->title.' - '.lang('company'),
					'pageDescription' => $selectedNews->title.' - '.lang('company'),
					'news' => $selectedNews
				);
				$this->_loadView('singleNews', $data);
			}
			else show_404();
		}
		else
		{
			$data = array(
				'news' => $this->news_model->getNews()
			);
			$this->_loadView('news', $data);
		}
	}
	
	private function _loadView($viewToLoad, $sectionData = array())
	{
		$skin = $this->getSkin();
		$currentSection = 'news';
		
		// load language file
		$this->lang->load($currentSection);
		
		$data = array
		(
			'skin' => $skin,
			'currentSection' => $currentSection,
			'css' => array(
				base_url().'inc/css/@reset.css',
				'main.css',
				'fonts.css',
				$currentSection.'.css',
				'skins/'.$skin.'.css'
			),
			'js' => array(
				base_url().'inc/js/@jquery-1.6.2.js',
				'jquery.tinyscrollbar.js',
				'main.js',
				$currentSection.'.js',
				'global.js'
			)
		);

		$data += $sectionData;
		$this->load->view('header', $data);
		$this->load->view($viewToLoad, $data);
		$this->load->view('footer', $data);
	}
}