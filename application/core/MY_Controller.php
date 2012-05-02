<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class MY_Controller extends CI_Controller {
	function MY_Controller()
	{
		parent::__construct();
		$this->output->enable_profiler(DEV);
	}
	
	protected function getSkin()
	{
		global $SKINS;
		
		if ( !$this->session->userdata('skin') )
		{
			$skin = $SKINS[array_rand($SKINS)];
			
			// Si pas de fade à faire, on met la version light
//			if ( !$this->session->userdata('fadein') )
//				$skin .= '_light';
				
			$this->session->set_userdata('skin', $skin);
		}
		
		return $this->session->userdata('skin');
	}
	
	protected function getLightSkin()
	{
		global $SKINS;
		
		if (!$this->session->userdata('skin'))
			$this->session->set_userdata('skin', $SKINS[array_rand($SKINS)].'_light');
		
		return $this->session->userdata('skin');
	}
	
	protected function switchSkin()
	{
		global $SKINS;
		
		$this->session->set_userdata('skin', $SKINS[array_rand($SKINS)]);
//		$this->session->set_userdata('skin', $SKINS[0]);
		
		return $this->session->userdata('skin');
	}
	
	protected function switchToSkin($skin)
	{
		global $SKINS;
		
		$this->session->set_userdata('skin', $SKINS[$skin]);
		
		return $this->session->userdata('skin');
	}
	
	protected function switchToLightSkin($skin)
	{
		global $SKINS;
		
		$this->session->set_userdata('skin', $SKINS[$skin].'_light');
		
		return $this->session->userdata('skin');
	}
        
}