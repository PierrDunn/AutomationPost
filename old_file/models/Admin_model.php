<?php

class Admin_model extends CI_Model{

	function add_article($data)
	{
		$this->db->insert('articles', $data);
		$this->db->trans_complete();
   		return $this->db->insert_id();
	}
	
	function remove_article($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('articles');

		$this->db->where('id_article',$id);
		$this->db->delete('gallery');
	}
	
	function edit_article($data)
	{
		$this->db->where('id',$data['id']);
		$this->db->update('articles', $data);
	}	

	function get_article($num, $offset){
		$query = $this->db->get("articles",$num, $offset);
		return $query->result_array();
	}		

	function get_some_article($id){
		$this->db->where('id', $id);
		$query = $this->db->get("articles");
		$item = $query->result_array();
		$result = NULL;
		for($i = 0; $i < count($item); $i++){
		$result[$i] = array_merge($item[$i]);}
		return $result;
	}

	function insert_gallery($gallery_ph){
		$this->db->insert('gallery', $gallery_ph);
	}

	function get_brands(){
		$query = $this->db->get('brands');
		return $query->result_array();
	}

	function get_category(){
		$query = $this->db->get('category');
		return $query->result_array();
	}

	function get_subcategory(){
		$query = $this->db->get('sub_category');
		return $query->result_array();
	}	

}