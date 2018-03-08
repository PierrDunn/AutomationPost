<?php


class Adminpanel extends CI_Controller{
   	public function __construct()
   	{
   		parent::__construct();
   		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
   	}

   	public function index()
	{

		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('adminpanel/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');}
		else
		{
			$data['profile'] = $this->ion_auth->user()->row();
			$this->_render_page('adminpanel_view', $data);
		}
	}

	public function add_article()
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('adminpanel/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}
		else
		{
			$this->load->model('admin_model');
			$data['profile'] = $this->ion_auth->user()->row();
			$data['category'] = $this->admin_model->get_category();
			$data['subcategory'] = $this->admin_model->get_subcategory();		
			$data['brands'] = $this->admin_model->get_brands();

			$this->load->view('adminpanel_add_article', $data);
		}
	}	

	public function add_article_reciever(){
		
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('adminpanel/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}
		else
		{	
			$config['upload_path'] = './gallery/uploads';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '2000';
			$config['overwrite'] = TRUE;
			$this->load->library('upload', $config);

			if ( !$this->upload->do_upload('userfile') )
			{
				$data['err'] =  $this->upload->display_errors();
				$this->load->view('adminpanel_error', $data);

			}
			else
			{	
				$this->upload->do_upload('userfile'); //превью
				$userfile = $this->upload->data();
				$userfile = strstr($userfile['full_path'], "gal");

				$temp = $_FILES;
				$count = count($_FILES['photo']['name']);
				for($i = 0; $i < $count; $i++){
						$_FILES['photo'] = array(
						'name' => $temp['photo']['name'][$i],
						'type' => $temp['photo']['type'][$i],
						'tmp_name' => $temp['photo']['tmp_name'][$i],
						'error' => $temp['photo']['error'][$i],
						'size' => $temp['photo']['size'][$i]);
						$this->upload->do_upload('photo');
						$tmp_data = $this->upload->data();
						$photo[$i] = $tmp_data['full_path'];
				}

//				$count = count($_FILES['photo_thumb']['name']);
//				for($i = 0; $i < $count; $i++){
//						$_FILES['photo_thumb'] = array(
//						'name' => $temp['photo_thumb']['name'][$i],
//						'type' => $temp['photo_thumb']['type'][$i],
//						'tmp_name' => $temp['photo_thumb']['tmp_name'][$i],
//						'error' => $temp['photo_thumb']['error'][$i],
//						'size' => $temp['photo_thumb']['size'][$i]);
//						$this->upload->do_upload('photo_thumb');
//						$tmp_data = $this->upload->data();
//						$photo_thumb[$i] = $tmp_data['full_path'];
//				}

				$data['title'] = $this->input->post('title');
				$data['description'] = $this->input->post('description');
				$data['text'] = $this->input->post('text');
				$data['date'] = $this->input->post('date');
				$data['logo'] = $userfile;
				$data['author'] = $this->input->post('author');
				$data['category'] = $this->input->post('category');
				$data['sub_category'] = $this->input->post('subcategory');
				$data['brand'] = $this->input->post('brands');

				$this->load->model('admin_model');
				$id = $this->admin_model->add_article($data);

				$data['profile'] = $this->ion_auth->user()->row();
								for($i = 0; $i < count($photo); $i++){
						$gallery[$i] =  array(
						'id_article' => $id,
						'href' => "/".strstr($photo[$i],"gallery"));
						//'src' => "/".strstr($photo_thumb[$i], "gallery");
						$this->admin_model->insert_gallery($gallery[$i]);
				}

				$this->load->view('adminpanel_info', $data);
			}
		}
	}

	public function edit_article(){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('adminpanel/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}
		else
		{
			$this->load->model('admin_model');
			$data['profile'] = $this->ion_auth->user()->row();
			
			$this->load->library('pagination');
			$config['base_url'] = 'http://apost.kaiser-soft.ru/adminpanel/edit_article';
			$config['total_rows'] = $this->db->count_all('articles');
			$config['per_page'] = '20'; 
			$config['full_tag_open'] = '';
			$config['full_tag_close'] = '';
			$this->pagination->initialize($config); 
			$data['article'] = $this->admin_model->get_article($config['per_page'], $this->uri->segment(3));
			
			$this->load->view('adminpanel_edit_article', $data);
		}
	}

	public function edit_article_detail($id){
		if (!$this->ion_auth->logged_in())
		{
	      // redirect them to the login page
	      redirect('adminpanel/login', 'refresh');
	    }
	    elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
	    {
	      // redirect them to the home page because they must be an administrator to view this
	      return show_error('You must be an administrator to view this page.');
	    }
		else
		{
			$this->load->model('admin_model');
			$data['profile'] = $this->ion_auth->user()->row();
			$data['article'] = $this->admin_model->get_some_article($id);
			$this->load->view('adminpanel_edit_detail_article', $data);
	    }
  }

  public function edit_article_reciever(){
    if (!$this->ion_auth->logged_in())
    {
      // redirect them to the login page
      redirect('adminpanel/login', 'refresh');
    }
    elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
  {
      // redirect them to the home page because they must be an administrator to view this
    return show_error('You must be an administrator to view this page.');
    }
    else
    {
      $this->load->model('admin_model');
		$data['id'] = $this->input->post('id');
		$data['title'] = $this->input->post('title');
		$data['description'] = $this->input->post('description');
		$data['text'] = $this->input->post('text');
		$data['date'] = $this->input->post('date');
		$this->admin_model->edit_article($data);
		$data['profile'] = $this->ion_auth->user()->row();
		$this->load->view('adminpanel_info', $data);
    }
  }

public function remove_article(){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('adminpanel/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}
		else
		{
      $data['profile'] = $this->ion_auth->user()->row();
			$this->load->view('adminpanel_remove_article', $data);
		}
	}


	public function remove_article_reciever($id){
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('adminpanel/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}
		else
		{
			$this->load->model('admin_model');
			$this->admin_model->remove_article($id);
			$data['profile'] = $this->ion_auth->user()->row();
			$this->load->view('adminpanel_info', $data);
		}
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
				redirect('/adminpanel', 'location');
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

	public function create_user()
    {
        $this->data['title'] = $this->lang->line('create_user_heading');

         if (!$this->ion_auth->logged_in() )//|| !$this->ion_auth->is_admin()
        {
            redirect('adminpanel', 'refresh');
        } 

        $tables = $this->config->item('tables','ion_auth');
        $identity_column = $this->config->item('identity','ion_auth');
        $this->data['identity_column'] = $identity_column;

        // validate form input
        $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required');
        $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required');
        if($identity_column!=='email')
        {
            $this->form_validation->set_rules('identity',$this->lang->line('create_user_validation_identity_label'),'required|is_unique['.$tables['users'].'.'.$identity_column.']');
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email');
        }
        else
        {
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
        }
        $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim');
        $this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'trim');
        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

        if ($this->form_validation->run() == true)
        {
            $email    = strtolower($this->input->post('email'));
            $identity = ($identity_column==='email') ? $email : $this->input->post('identity');
            $password = $this->input->post('password');

            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name'  => $this->input->post('last_name'),
                'company'    => $this->input->post('company'),
                'phone'      => $this->input->post('phone'),
            );
        }
        if ($this->form_validation->run() == true && $this->ion_auth->register($identity, $password, $email, $additional_data))
        {
            // check to see if we are creating the user
            // redirect them back to the admin page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            redirect("adminpanel", 'refresh');
        }
        else
        {
            // display the create user form
            // set the flash data error message if there is one
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['first_name'] = array(
                'name'  => 'first_name',
                'id'    => 'first_name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('first_name'),
            );
            $this->data['last_name'] = array(
                'name'  => 'last_name',
                'id'    => 'last_name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('last_name'),
            );
            $this->data['identity'] = array(
                'name'  => 'identity',
                'id'    => 'identity',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('identity'),
            );
            $this->data['email'] = array(
                'name'  => 'email',
                'id'    => 'email',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('email'),
            );
            $this->data['company'] = array(
                'name'  => 'company',
                'id'    => 'company',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('company'),
            );
            $this->data['phone'] = array(
                'name'  => 'phone',
                'id'    => 'phone',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('phone'),
            );
            $this->data['password'] = array(
                'name'  => 'password',
                'id'    => 'password',
                'type'  => 'password',
                'value' => $this->form_validation->set_value('password'),
            );
            $this->data['password_confirm'] = array(
                'name'  => 'password_confirm',
                'id'    => 'password_confirm',
                'type'  => 'password',
                'value' => $this->form_validation->set_value('password_confirm'),
            );

            $this->_render_page('auth/create_user', $this->data);
        }
    }

	public function _render_page($view, $data=null, $returnhtml=false)//I think this makes more sense
	{
		$this->viewdata = (empty($data)) ? $this->data: $data;
		$view_html = $this->load->view($view, $this->viewdata, $returnhtml);
		if ($returnhtml) return $view_html;//This will return html on 3rd argument being true
	}	
   }