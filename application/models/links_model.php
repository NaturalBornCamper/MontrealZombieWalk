<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Links_model extends CI_Model {

	var $linksTable = 'links';

    function __construct()
    {
        parent::__construct();
    }
    
	function getLinks($allLinks = false)
	{
		if (!$allLinks)
			$this->db->where("publish = 1");
			
		$this->db->select(array(
			'type',
			'description_'.$this->lang->lang().' as description',
			'link_'.$this->lang->lang().' as link',
			'date'
		));
		
		$this->db->order_by('date', 'desc');
		
		$query = $this->db->get($this->linksTable);
				
		return $query->result();
	}
	
	function getLinksByType($type, $allLinks = false)
	{
		if (!$allLinks)
			$this->db->where("publish = 1");
			
		$where = "type = '".$type."'";
		$this->db->where($where);
	
		$this->db->select(array(
			'type',
			'description_'.$this->lang->lang().' as description',
			'link_'.$this->lang->lang().' as link',
			'date'
		));
		
		$this->db->order_by('date', 'desc');
		
		$query = $this->db->get($this->linksTable);
				
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