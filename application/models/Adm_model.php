<?php

class Adm_model extends CI_Model{

	function add_to_base($article)
	{
		$this->db->insert('articles', $article);
	}
	
	function update_to_base($article)
	{
		$this->db->where('id',$article['id']);
		$this->db->update('articles', $article);
	}
	
	function brand()
	{
		$query = $this->db->get('brands');
		return $query->result_array();
	}

	function category()
	{
		$query = $this->db->get('category');
		return $query->result_array();
	}
	
	function insert_category($category)
	{
		$this->db->insert('category', $category);
	}
	
	function update_category($category)
	{
		$this->db->where('id',$category['id']);
		$this->db->update('category', $category);
	}
	
	function remove_category($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('category');
		$this->db->where('name_id',$id);
		$this->db->delete('sub_category');
	}

	function subcategory(){
		$query = $this->db->get('sub_category');
		return $query->result_array();
	}
	
	function insert_subcategory($subcategory)
	{
		$this->db->insert('sub_category', $subcategory);
	}
	
	function update_subcategory($subcategory)
	{
		$this->db->where('id',$subcategory['id']);
		$this->db->update('sub_category', $subcategory);
	}
	
	function remove_subcategory($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('sub_category');
	}
	
	function get_articles_mod()
	{
		$this->db->where('moderation', 1);
		$query = $this->db->get('articles');
		return $query->result_array();
	}
	
	function get_articles_premod()
	{
		$this->db->where('moderation', 0);
		$query = $this->db->get('articles');
		return $query->result_array();
	}
	
	function change_on_mod($id)
	{
		$this->db->where('id',$id);
		$this->db->update('articles', array('moderation' => 0));
	}
	
	function change_off_mod($id)
	{
		$this->db->where('id',$id);
		$this->db->update('articles', array('moderation' => 1));
	}
	
	function article_remove($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('articles');
	}
	
	function get_article($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('articles');
		return $query->result_array();
	}

	function get_users_quantity()
	{
		$query = $this->db->get('users');
		$value = 0;
			foreach ($query->result() as $row)
		{
		      $value += 1;
		}
		return $value; $value;
	}

	function get_articles_quantity()
	{
		$query = $this->db->get('articles');
		$value = 0;
			foreach ($query->result() as $row)
		{
		      $value += 1;
		}
		return $value;
	}
}