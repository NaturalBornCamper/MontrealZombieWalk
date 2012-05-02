<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Media_model extends CI_Model {

	var $mediasTable = 'medias';

    function __construct()
    {
        parent::__construct();
    }
    
	function getMedias($allMedias = false)
	{
		if (!$allMedias)
			$this->db->where("publish = 1");
			
		$this->db->select(array(
			'title_'.$this->lang->lang().' as title',
			'description_'.$this->lang->lang().' as description',
			'type',
			'data',
			'url_'.$this->lang->lang().' as url',
			'related_'.$this->lang->lang().' as related',
			'date'
		));
		
		$this->db->order_by('date', 'desc');
		
		$query = $this->db->get($this->mediasTable);
				
		return $query->result();
	}
    
	function getMediasEnFr($allMedias = false)
	{
		if (!$allMedias)
			$this->db->where("publish = 1");
		
		$this->db->order_by('date', 'desc');
		
		$query = $this->db->get($this->mediasTable);
				
		return $query->result();
	}
    
	function getMediasUrls($allMedias = false)
	{
		if (!$allMedias)
			$this->db->where("publish = 1");
	
		$this->db->select(array(
			'type',
			'url_en',
			'url_fr',
			'date'
		));
		
		$this->db->order_by('date', 'desc');
		
		$query = $this->db->get($this->mediasTable);
				
		return $query->result();
	}
	
	function getMediasByType($type, $allMedias = false)
	{
		if (!$allMedias)
			$this->db->where("publish = 1");
			
		$where = "type = '".$type."'";
		$this->db->where($where);
	
		$this->db->select(array(
			'title_'.$this->lang->lang().' as title',
			'description_'.$this->lang->lang().' as description',
			'type',
			'data',
			'url_'.$this->lang->lang().' as url',
			'related_'.$this->lang->lang().' as related',
			'date'
		));
		
		$this->db->order_by('date', 'desc');
		
		$query = $this->db->get($this->mediasTable);
				
		return $query->result();
	}
	
	function getMediasByURL($url, $allMedias = false)
	{
		if (!$allMedias)
			$this->db->where("publish = 1");
			
		$where = "url_en = '".$url."' OR url_fr = '".$url."'";
		$this->db->where($where);
	
		$this->db->select(array(
			'title_'.$this->lang->lang().' as title',
			'description_'.$this->lang->lang().' as description',
			'type',
			'data',
			'url_'.$this->lang->lang().' as url',
			'related_'.$this->lang->lang().' as related',
			'date'
		));
		
		$query = $this->db->get($this->mediasTable);
				
		return $query->row();
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