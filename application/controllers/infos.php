<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Infos extends MY_Controller {
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
		$this->_loadView(array('about', 'guidelines'));
	}
	
	public function about()
	{
		$this->_loadView(array(__FUNCTION__));
	}
	
	public function guidelines()
	{
		$this->_loadView(array(__FUNCTION__));
	}
	
	private function _loadView($subviewsToLoad)
	{
		$skin = $this->getSkin();
		$currentSection = 'infos';
		
		// load language file
		$this->lang->load('global');
		$this->lang->load($currentSection);
		
		$data = array
		(
			'skin' => $skin,
			'currentSection' => $currentSection,
			'subviewsToLoad' => $subviewsToLoad,
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
		$this->load->view('infos', $data);
		$this->load->view('footer', $data);
	}
}