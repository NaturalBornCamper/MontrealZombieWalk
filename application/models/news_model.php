<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';
	
	var $newsTable = 'news';

    function __construct()
    {
        parent::__construct();
    }
    
	function getNews($allNews = false)
	{
		if (!$allNews)
			$this->db->where("publish = 1");
			
		$this->db->select(array(
			'ishtml',
			'title_'.$this->lang->lang().' as title',
			'description_'.$this->lang->lang().' as description',
			'url_'.$this->lang->lang().' as url',
			'related_'.$this->lang->lang().' as related',
			'date'
		));
		
		$this->db->order_by('date', 'desc');
		
		$query = $this->db->get($this->newsTable);
				
		return $query->result();
	}
    
	function getNewsEnFr($allNews = false)
	{
		if (!$allNews)
			$this->db->where("publish = 1");
		
		$this->db->order_by('date', 'desc');
		
		$query = $this->db->get($this->newsTable);
				
		return $query->result();
	}
    
	function getNewsUrls($allNews = false)
	{
		if (!$allNews)
			$this->db->where("publish = 1");
	
		$this->db->select(array(
			'url_en',
			'url_fr',
			'date'
		));
		
		$this->db->order_by('date', 'desc');
		
		$query = $this->db->get($this->newsTable);
				
		return $query->result();
	}
    
	function getNewsByURL($url, $allNews = false)
	{
		if (!$allNews)
			$this->db->where("publish = 1");
			
		$where = "url_en = '".$url."' OR url_fr = '".$url."'";
		$this->db->where($where);
	
		$this->db->select(array(
			'ishtml',
			'title_'.$this->lang->lang().' as title',
			'description_'.$this->lang->lang().' as description',
			'url_'.$this->lang->lang().' as url',
			'related_'.$this->lang->lang().' as related',
			'date'
		));
		
		$query = $this->db->get($this->newsTable);
				
		return $query->row();
	}
	
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
	
/*	
    function get_last_ten_entries()
    {
        $query = $this->db->get('entries', 10);
        return $query->result();
    }

    function insert_entry()
    {
        $this->title   = $_POST['title']; // please read the below note
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->insert('entries', $this);
    }

    function update_entry()
    {
        $this->title   = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }
*/
}