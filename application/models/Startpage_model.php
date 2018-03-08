<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Startpage_model extends CI_Model {
	
	function likes_articles() //получение залайканых статей из базы и последующий вывод на главную страницу
	{
		$this->db->order_by('likes','DESC'); //ASC
		$query= $this->db->get('articles', 3);
		return $query->result_array();
	}
	
	function last_articles() //получение последних статей из базы и последующий вывод на главную страницу
	{
		$this->db->order_by('date','DESC'); //ASC DESC
		$query= $this->db->get('articles');
		return $query->result_array();
	}
	
	function popular_articles() //получение просматриваемых статей из базы и последующий вывод на главную страницу
	{
		$this->db->order_by('views','DESC'); //ASC
		$query= $this->db->get('articles');
		return $query->result_array();
	}
	
	function discussing_articles() //получение комментируемых статей из базы и последующий вывод на главную страницу
	{
		$this->db->order_by('comments','DESC'); //ASC
		$query= $this->db->get('articles');
		return $query->result_array();
	}
	
	public function username_exists($email) {
        $this->db->where('email', $log['email']);
        $query = $this->db->get('users');
        if($query->num_rows > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function user_login($login)
    {
        $this->db->where('email', $login);
        $query = $this->db->get('users');
        return $query->row_array();
    }

    public function update_user($date) {
        $this->db->where('id', $date['id']);
        $this->db->update('users', $date);
    }

    public function add_like($data){
        $this->db->insert('likes', $data);
    }

    public function get_like_article($data){
        $this->db->where('id_article',$data);
        $value = 0;
        $query= $this->db->get('likes');
		if ($query->num_rows() > 0)
		{
		   foreach ($query->result() as $row)
		   {
		      $value += $row->value;
		   }
		}
        $this->db->where('id',$data);
        $this->db->set('likes',$value);
        $this->db->update('articles');
        return $value;
    }

    public function get_like_user($data){
        $this->db->where('id_article',$data['id_article']);
        $this->db->where('id_user',$data['id_user']);
        $query = $this->db->get('likes');
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }

}
