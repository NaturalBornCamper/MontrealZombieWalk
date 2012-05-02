<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Press extends MY_Controller {
	
	public function index()
	{
		$skin = $this->getSkin();
		$currentSection = 'press';
		
		// load language file
		$this->lang->load('global');
		$this->lang->load('press');
		
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

		$this->load->view('header', $data);
		$this->load->view($currentSection, $data);
		$this->load->view('footer', $data);
	}
}