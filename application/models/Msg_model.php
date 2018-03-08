<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msg_model extends CI_Model {

	public function insert_msg($n, $e, $t)
	{
		$data = array(
		   'name' => $n,
		   'email' => $e,
		   'text' => $t
		);
		
		$this->db->insert('msg', $data); 
	}
	
} 