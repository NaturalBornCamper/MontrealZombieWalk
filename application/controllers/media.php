<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Media extends MY_Controller {
	
	public function _remap($method, $params = array())
	{
		$data = array(
			'mediaUrl' => isset($params[0])?$params[0]:false
		);
		
		$subViews = array('photos', 'videos', 'fanart');
/*
		// Load Extra data
		$method = str_replace('-', '_', $method);
		if (method_exists($this, $method))
			$data += return call_user_func_array(array($this, $method), $data);
*/		
		// Load view
		if ( $method != 'index' && in_array($method, $subViews) )
			$this->_loadView(array($method), $data);
		else
			$this->_loadView($subViews, $data);
/*
		$method = str_replace('-', '_', $method);
		if (method_exists($this, $method))
		{
			return call_user_func_array(array($this, $method), $data);
		}
		$this->index($data);
*/
//		show_404();
	}
/*	
	public function index($data)
	{
		var_dump($data);
		$this->_loadView(array('photos', 'videos', 'fanart'), $data);
	}
	
	public function photos($data)
	{
		$this->_loadView(array(__FUNCTION__), $data);
	}
	
	public function videos($data)
	{
		$this->_loadView( array(__FUNCTION__), $data);
	}
	
	public function fanart($url, $mediaID)
	{
		$this->_loadView( array(__FUNCTION__), $data);
	}
*/
	private function _loadView($subviewsToLoad, $sectionData)
	{
		$skin = $this->getSkin();
		$currentSection = 'media';
		
		// load language file
		$this->lang->load('global');
		$this->lang->load($currentSection);
		
		// Model
		$this->load->model($currentSection.'_model');
		if ($sectionData['mediaUrl']) $medias = $this->media_model->getMediasByURL($sectionData['mediaUrl']);
		elseif (count($subviewsToLoad) == 1) $medias = $this->media_model->getMediasByType($subviewsToLoad[0]);
		else $medias = $this->media_model->getMedias();
		if ($sectionData['mediaUrl'] && $medias)
		{
			$sectionData['pageTitle'] = $medias->title.' - '.lang('company');
			$sectionData['pageDescription'] = $medias->description.' - '.lang('company');
			$subviewsToLoad[0] = 'single'.ucfirst($medias->type);
		}
		
		
		$data = array
		(
			'skin' => $skin,
			'currentSection' => $currentSection,
			'subviewsToLoad' => $subviewsToLoad,
			'medias' => $medias,
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
		// Add all subsections CSS and JS
		// (Smartoptimizer will take car of loading the ones that actually exist)
		foreach ($subviewsToLoad as $subsection)
		{
			array_push($data['css'], $subsection.'.css');
			array_push($data['js'], $subsection.'.js');
		}
		
		$data += $sectionData;
		$this->load->view('header', $data);
		$this->load->view($currentSection, $data);
		$this->load->view('footer', $data);
	}
}