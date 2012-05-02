<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller {
	public function _remap($method, $params = array())
	{
		if ($_POST)
		{
			if ($this->input->post('bob') == 'FrancisYeCon')
			{
				echo '<span style="color:green; font-size:2em;">AJOUTÉ</span>';
				$this->_addNews();
			}
			else
				echo '<span style="color:red; font-size:2em;">MAUVAIS MOT DE PASSE</span>';
		}
		
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
		$this->_loadView('admin');
	}
	
	public function news()
	{
		$this->load->model('news_model');
		$this->load->helper('form');
		
		$data = array(
			'news' => $this->news_model->getAllLangNews()
		);
		$this->_loadView(__FUNCTION__, $data);
	}

	private function _loadView($viewToLoad, $sectionData = array())
	{
		$data = array
		(
			'css' => array(
				base_url().'inc/css/@reset.css',
				'admin/'.$viewToLoad.'.css',
				'admin/admin.css'
			),
			'js' => array(
				base_url().'inc/js/@jquery-1.6.2.js'
			)
		);
		

		$this->load->view('admin/'.$viewToLoad, $data + $sectionData);
	}
	
	private function _addNews()
	{
		$this->load->model('news_model');
		
		$this->news_model->insertNews();
	}
}