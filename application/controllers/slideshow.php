<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slideshow extends MY_Controller {
	
	public function _remap($params = array())
	{
		return call_user_func_array(array($this, '_photos'), $params);
	}
	
	private function _photos($photosUrl)
	{
		$this->load->model('media_model');
		$this->load->helper('image');
		$this->lang->load('global');
		
		$data = array(
			'photos' => $this->media_model->getMediasByURL($photosUrl)
		);
		$this->load->view('slideshow', $data);
	}
	
}