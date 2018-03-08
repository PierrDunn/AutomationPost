<?php

class Adm extends CI_Controller{
	
	public function __construct()
   	{
   		parent::__construct();
   		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
   	}
   	
	/* Загрузка основных страниц */
   	public function index()
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('adm/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');}
		else
		{
			$this->load->model('Adm_model');
			$data['articles'] = $this->Adm_model->get_articles_quantity();
			$data['users'] = $this->Adm_model->get_users_quantity();
			$data['profile'] = $this->ion_auth->user()->row();
			$this->load->view('adm/adm_info_view', $data);
		}
	}
	
	public function add_article()
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('adm/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');}
		else
		{
			$data['profile'] = $this->ion_auth->user()->row();
			$this->load->model('Adm_model');
			$data['article'] =  '';
			$data['category'] = $this->Adm_model->category();
			$data['subcategory'] = $this->Adm_model->subcategory();
			$data['brand'] = $this->Adm_model->brand();
			$this->load->view('adm/adm_addart_view', $data);
		}
	}
	
	public function change_article()
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('adm/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');}
		else
		{
			$data['profile'] = $this->ion_auth->user()->row();
			$this->load->model('Adm_model');
			$data['mod'] = $this->Adm_model->get_articles_mod();
			$data['premod'] = $this->Adm_model->get_articles_premod();
			$this->load->view('adm/adm_changeart_view', $data);
		}
	}
	
	public function create_user()
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('adm/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');}
		else
		{
			$data['profile'] = $this->ion_auth->user()->row();
			$this->load->view('adm/adm_createuser_view', $data);
		}
	}
	
	public function change_category_subcategory()
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('adm/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');}
		else
		{
			$data['profile'] = $this->ion_auth->user()->row();
			$this->load->model('Adm_model');
			$data['category'] = $this->Adm_model->category();
			$data['subcategory'] = $this->Adm_model->subcategory();
			$this->load->view('adm/adm_changecat_subcat_view', $data);
		}
	}
	
	/* Добавление категорий и подкатегорий */
	public function add_category()
	{
		$category = array(
			'name' => $this->input->post('name'),
			'ru_name' => $this->input->post('ru_name'),
		);
		$this->load->model('Adm_model');
		$this->Adm_model->insert_category($category);
	}
	
	public function add_subcategory()
	{
		$subcategory = array(
			'name_id' => $this->input->post('name_id'),
			'name' => $this->input->post('name'),
			'name_ru' => $this->input->post('name_ru'),
		);
		$this->load->model('Adm_model');
		$this->Adm_model->insert_subcategory($subcategory);
	}
	
	/* Изменение категорий и подкатегорий */
	public function update_category()
	{
		$category = array(
			'id' =>	$this->input->post('id'),
			'name' => $this->input->post('name'),
			'ru_name' => $this->input->post('ru_name'),
		);
		$this->load->model('Adm_model');
		$this->Adm_model->update_category($category);
	}
	
	public function update_subcategory()
	{
		$subcategory = array(
			'id' =>	$this->input->post('id'),
			'name' => $this->input->post('name'),
			'name_id' => $this->input->post('name_id'),
			'name_ru' => $this->input->post('name_ru'),
		);
		$this->load->model('Adm_model');
		$this->Adm_model->update_subcategory($subcategory);
	}
	
	/* Удаление категорий и подкатегорий */
	public function remove_category()
	{
		$id = $this->input->post('id');
		$this->load->model('Adm_model');
		$this->Adm_model->remove_category($id);
	}
	
	public function remove_subcategory()
	{
		$id = $this->input->post('id');
		$this->load->model('Adm_model');
		$this->Adm_model->remove_subcategory($id);
	}
	
	/* Модерация, добавление, изменение, удаление статьи */
	public function article_to_base()
	{
		$article = array(
			'title' =>	$this->input->post('title'),
			'author' => $this->input->post('author'),
			'brand' => $this->input->post('brand'),
			'category' => $this->input->post('category'),
			'sub_category' => $this->input->post('sub_category'),
			'description' => $this->input->post('description'),
			'text' => $this->input->post('text'),
			'logo' => $this->input->post('logo'),
			'width' => $this->input->post('width'),
			'height' => $this->input->post('height'),
			'moderation' => $this->input->post('moderation'),
		);
		$this->load->model('Adm_model');
		$this->Adm_model->add_to_base($article);
	}
	
	public function update_article_to_base()
	{
		$article = array(
			'id' => $this->input->post('id'),
			'title' =>	$this->input->post('title'),
			'author' => $this->input->post('author'),
			'brand' => $this->input->post('brand'),
			'category' => $this->input->post('category'),
			'sub_category' => $this->input->post('sub_category'),
			'description' => $this->input->post('description'),
			'text' => $this->input->post('text'),
			'logo' => $this->input->post('logo'),
			'width' => $this->input->post('width'),
			'height' => $this->input->post('height'),
			'moderation' => $this->input->post('moderation'),
		);
		$this->load->model('Adm_model');
		$this->Adm_model->update_to_base($article);
	}
	
	public function article_on_mod()
	{

		$id = $this->input->post('id');
		$this->load->model('Adm_model');
		$this->Adm_model->change_on_mod($id);
	}
	
	public function article_off_mod()
	{
		$id = $this->input->post('id');
		$this->load->model('Adm_model');
		$this->Adm_model->change_off_mod($id);
	}
	
	public function article_edit($id)
	{
		$data['profile'] = $this->ion_auth->user()->row();
		$this->load->model('Adm_model');
		$data['article'] =  $this->Adm_model->get_article($id);
		$data['category'] = $this->Adm_model->category();
		$data['subcategory'] = $this->Adm_model->subcategory();
		$data['brand'] = $this->Adm_model->brand();
		$this->load->view('adm/adm_addart_view', $data);
	}
	
	public function article_remove()
	{
		$id = $this->input->post('id');
		$this->load->model('Adm_model');
		$this->Adm_model->article_remove($id);
	}
	
	public function login()
	{
		$this->data['title'] = $this->lang->line('login_heading');

		//validate form input
		$this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
		$this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

		if ($this->form_validation->run() == true)
		{
			// check to see if the user is logging in
			// check for "remember me"
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('/adm', 'location');
			}
			else
			{
				// if the login was un-successful
				// redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth/login', 'location'); // use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{
			// the user is not logging in so display the login page
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['identity'] = array('name' => 'identity',
				'id'    => 'identity',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['password'] = array('name' => 'password',
				'id'   => 'password',
				'type' => 'password',
			);

			$this->_render_page('auth/login', $this->data);
		}
	}
	
	public function _render_page($view, $data=null, $returnhtml=false)//I think this makes more sense
	{
		$this->viewdata = (empty($data)) ? $this->data: $data;
		$view_html = $this->load->view($view, $this->viewdata, $returnhtml);
		if ($returnhtml) return $view_html;//This will return html on 3rd argument being true
	}

}