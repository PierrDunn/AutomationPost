<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles_model extends CI_Model {
	//получение статьи по id и вывод на страницу статей
	function get_articles($id)
	{ 
		$this->db->where('id',$id);
		$query= $this->db->get('articles');
		return $query->result_array();
	}
	
	//функция возвращает все комментарии и ID
	function get_all_comments($id)
	{
		$this->db->where('article_id',$id);
		$query= $this->db->get('comments');
		$value = 0;
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
		   {
		      $value += 1;
		   }		
		}
        $this->db->where('id',$id);
        $this->db->set('comments',$value);
        $this->db->update('articles');
		return $query->result_array();
	}

	function get_user_comments($id)
	{
		//$this->db->where('id');
		$query= $this->db->get('users');

		return $query->result_array();	
	}	
	//функция добавляет в бд все данные комментария
	function insert_comment($data)
	{
		$this->db->insert('comments', $data);
	
	}

	function get_gallery($id)
	{
		$this->db->where('id_article',$id);
		$query= $this->db->get('gallery');
		return $query->result_array();
	}

	function inc_views($id)
	{
		$views = 0;
		$this->db->where('id',$id);
		$query= $this->db->get('articles');
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
		   {
		      $views = $row->views + 1;
		   }		
		}
		$this->db->where('id',$id);
		$this->db->set('views', $views);
		$this->db->update('articles');
	}

	
} 