<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Likeview_model extends CI_Model {

		public function add($id_state){
			/*
			$sql = 'SELECT views FROM articles WHERE id = $id_state'
			$watches = $this->db->query($sql)
			$watches = $watches + 1;
			$sql ='INSERT $watches INTO articles ('views') WHERE id = $id_state'
			*/
			/*$this->db->where('id',$id_state);
			$this->db->select('views');
			$views = $this->db->get('articles');*/
			/*echo $views;
			$views['views'] = $views['views'] + 1;
			$this->db->update('articles',$views);*/
			
			$view = $this->db->query("SELECT views FROM articles WHERE id ='".$id_state."'");
			/*$views = $view->result_array();
			$views = $views + 1;*/
			$this->db->query("UPDATE articles SET views='".$views."' WHERE articles.id = '".$id_state."'");
			//UPDATE `a36187_apost`.`articles` SET `views` = '5' WHERE `articles`.`id` = 4;
			/*UPDATE `a36187_apost`.`articles` SET `logo` = 'sample1.jpg' WHERE `articles`.`id` = 4;*/
			/*$query  =  $this->db->get();
			$result = $query->result_array();


			$result['views'] = $result['views'] + 1;
			$this->db->where('id', $id);
			$this->db->update('articles', $result);*/
			
		}
}
