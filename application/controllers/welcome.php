<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller {

	public function index()
	{
		$skin = $this->switchSkin();
		$currentSection = 'welcome';
			
		// load language file
		$this->lang->load('global');	
		$this->lang->load($currentSection);
		$this->load->helper('browser');
		
		
		$this->session->set_userdata('fadein', true);
		$data = array
		(
			'skin' => $skin,
			'css' => array(
				base_url().'inc/css/@reset.css',
				'main.css',
				'fonts.css',
				$currentSection.'.css',
				'skins/'.$skin.'.css'
			),
			'js' => array(
				base_url().'inc/js/@jquery-1.6.2.js',
				$currentSection.'.js',
				'global.js'
			)
		);
		$this->load->view('welcome', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */