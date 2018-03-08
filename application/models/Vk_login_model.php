<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vk_login_model extends CI_Model {

	public function insert_user($userInfo)
	{
		$this->db->where('uid', $userInfo['uid']);
		$u = $this->db->get('vk_messager')->result_array();
		if($u == Array())
		{
			$this->db->insert('vk_messager', $userInfo);
			return 1;
		}
		else
		{
			return 0;
		}
		
	}
	
} 