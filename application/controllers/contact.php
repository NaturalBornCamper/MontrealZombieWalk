<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends MY_Controller {
	public function _remap($method, $params = array())
	{
		$method = str_replace('-', '_', $method);
		if (method_exists($this, $method))
		{
			return call_user_func_array(array($this, $method), $params);
		}
		$this->index();
//		show_404();
	}
	
	public function index()
	{
		$this->_loadView(array('faq', 'forum', 'contact_us'));
	}
	
	public function faq()
	{
		$this->_loadView(array(__FUNCTION__));
	}
	
	public function forum()
	{
		$this->_loadView(array(__FUNCTION__));
	}
	
	public function contact_us()
	{
		$this->_loadView(array(__FUNCTION__));
	}
	
	private function _loadView($subviewsToLoad)
	{
		$skin = $this->getSkin();
		$currentSection = 'contact';
		
		// load language file
		$this->lang->load('global');
		$this->lang->load($currentSection);
		
		// Model
		$this->load->model($currentSection.'_model');
		$faqs = NULL;
		if ( in_array('faq', $subviewsToLoad) ) $faqs = $this->contact_model->getFaqs();
		
		$data = array
		(
			'skin' => $skin,
			'currentSection' => $currentSection,
			'subviewsToLoad' => $subviewsToLoad,
			'faqs' => $faqs,
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

		$this->load->view('header', $data);
		$this->load->view('contact', $data);
		$this->load->view('footer', $data);
	}
}