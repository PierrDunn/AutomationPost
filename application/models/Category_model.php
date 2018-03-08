<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {
	
	/* Подгрузка страницы со статьями для определённой подкатегории*/
	public function load_articles($category, $sub_catigory)
	{
		$this->db->where('category', $category);
		$this->db->where('sub_category',$sub_catigory);
		$query = $this->db->get('articles');
		return $query->result_array();
	}
	
	/* Подгрузка страницы со статьями для определённого бренда*/
	public function load_articles_b($b)
	{
		$this->db->where('brand', $b);
		$query = $this->db->get('articles');
		return $query->result_array();
	}
	
	
	/* Функция получения числа статей для категорий */
	private function counts($d, $c){
		$this->db->where('category', $d);
		$this->db->where('sub_category', $c);
		$query = $this->db->get('articles');
		return count($query->result_array());
	}
	
	/* Функция получения числа статей для брендов */
	private function counts_b($a){
		
		$this->db->where('brand', $a);
		$query = $this->db->get('articles');
		return count($query->result_array());

	}
	
	/* Получаем подкатегории из названия категорий*/
	public function c_view_model($a)
	{	
		/* Получаем название категории на русском */
		$this->db->where('name', $a);
		$query['category'] = $this->db->get('category');
		
		foreach ($query['category']->result() as $row)
		{
			$id = $row->id;
		}
		$query['category'] = $query['category']->result_array();
		
		/* Получаем подкатегории */
		$this->db->where('name_id', $id);
		$query['sub_category'] = $this->db->get('sub_category');
		$query['sub_category'] = $query['sub_category']->result_array();
		
		
		/* Получаем число статей в подкатегории */
		for($i=0; $i<count($query['sub_category']); $i++){
			$query['sub_category'][$i]['counts'] = $this->counts($query['category'][0]['name'], $query['sub_category'][$i]['name']);
		}
		
		return $query;
	}
	
	/* Получаем бренды */
	public function b_view_model($a)
	{
		if($a == 'ru' or $a == 'eu')
		{
			$this->db->where('loc',$a);
		};
		$query = $this->db->get('brands')->result_array();

		for($i=0; $i<count($query); $i++){
			$query[$i]['counts'] = $this->counts_b($query[$i]['id_name']);
		};

		return $query;
	}
	
	//Получение категорий для навбара
	public function get_categories()
	{
		return $query = $this->db->get('category')->result_array();
	}
	
	//Получение названия подкатегории
	public function get_category_name($name)
	{
		$this->db->where('name', $name);
		$query = $this->db->get('sub_category');
		return $query->result_array();
	}
} 