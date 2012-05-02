<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Links extends MY_Controller {
	
	public function _remap($method, $params = array())
	{
		$data = array(
		);
		
		$subViews = array('makeup', 'costumes', 'useful-links', 'partners');
	
/*	
		$method = str_replace('-', '_', $method);
		if (method_exists($this, $method))
		{
			return call_user_func_array(array($this, $method), $params);
		}
		$this->index();
*/

		// Load view
		if ( $method != 'index' && in_array($method, $subViews) )
			$this->_loadView(array($method), $data);
		else
			$this->_loadView($subViews, $data);
//		show_404();
	}
/*
	public function index()
	{
		$this->_loadView(array('makeup', 'costumes', 'useful_links', 'partners'));
	}
	
	public function makeup()
	{
		$this->_loadView(array(__FUNCTION__));
	}
	
	public function costumes()
	{
		$this->_loadView(array(__FUNCTION__));
	}

	public function useful_links()
	{
		$this->_loadView(array(__FUNCTION__));
	}
	
	public function partners()
	{
		$this->_loadView(array(__FUNCTION__));
	}
*/
	
	private function _loadView($subviewsToLoad, $sectionData)
	{
		$skin = $this->getSkin();
		$currentSection = 'links';
		
		// load language file
		$this->lang->load('global');
		$this->lang->load($currentSection);
		
		// Model
		$this->load->model($currentSection.'_model');
		if (count($subviewsToLoad) == 1) $links = $this->links_model->getLinksByType($subviewsToLoad[0]);
		else $links = $this->links_model->getLinks();
		
		$data = array
		(
			'skin' => $skin,
			'currentSection' => $currentSection,
			'subviewsToLoad' => $subviewsToLoad,
			'links' => $links,
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