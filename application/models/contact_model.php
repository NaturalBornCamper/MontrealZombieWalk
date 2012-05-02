<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_model extends CI_Model {

	var $faqsTable = 'faq';

    function __construct()
    {
        parent::__construct();
    }
    
	function getFaqs($allFaqs = false)
	{
		if (!$allFaqs)
			$this->db->where("publish = 1");
			
		$this->db->select(array(
			'question_'.$this->lang->lang().' as question',
			'answer_'.$this->lang->lang().' as answer',
			'related_'.$this->lang->lang().' as related',
			'date'
		));
		
		$this->db->order_by('date', 'desc');
		
		$query = $this->db->get($this->faqsTable);
				
		return $query->result();
	}

/*	
	function getAllLangNews()
	{
		$this->db->order_by('date', 'desc');
		
		$query = $this->db->get($this->newsTable);
				
		return $query->result();
	}
	
	
	function insertNews()
	{
		$values = array(
			'title_en' => $this->input->post('title_en'),
			'title_fr' => $this->input->post('title_fr'),
			'publish' => 1,
			'description_en' => $this->input->post('description_en'),
			'description_fr' => $this->input->post('description_fr'),
			'related_en' => $this->input->post('related_en'),
			'url_en' => url_title($this->input->post('title_en')),
			'url_fr' => url_title($this->input->post('title_fr')),
			'related_fr' => $this->input->post('related_fr')
		);
		
        $this->db->insert($this->newsTable, $values);
	}
*/
}