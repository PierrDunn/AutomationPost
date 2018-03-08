<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Startpage extends CI_Controller {

	const NO_PARENT_ID = 0;
    private static $level = -1;

	public function __construct()
   	{
   		parent::__construct();
   		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->library('session');
		$this->load->helper(array('url','language'));
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
   	}
	
	//Получение категорий для навбара
	private function get_categories()
	{
		$this->load->model('Category_model');
		return $this->Category_model->get_categories();
	}
	
	public function index()
	{
		$data['get_categories'] = $this->get_categories(); // получение категорий для навбара
		
		$this->load->model('Startpage_model');
		$data['articles'] = $this->Startpage_model->likes_articles();
		
		/*
		for($i=0; $i<3; $i++){
			$mass = explode(' ',$data['articles'][$i]['description']);
			$mass2 = explode(' ',$data['articles'][$i]['title']);
			$data['articles'][$i]['description'] = $mass[0].' '.$mass[1].' '.$mass[2].' '.$mass[3].' '.$mass[4].' '.$mass[5].' '.$mass[6].' '.$mass[7].' '.$mass[8].'...';
			//$data['articles'][$i]['title'] = $mass2[0].' '.$mass2[1].' '.$mass2[2].' '.$mass2[3].' '.$mass2[4].'...';
		};
		
		foreach($data['articles'] as $val){
			$title = explode(' ', $val['title']);
			print_r($title);
			if(count($title)>4){
				for($i=4; $i<count($title); $i++){
					unset($title[$i]);
				}
			}
		}
		*/
		if (!$this->ion_auth->logged_in())
		{
			$this->load->view('start_page', $data);
		}
		else
		{
			$data['profile'] = $this->ion_auth->user()->row();
			$this->load->view('start_page', $data);
		}	
		
	}
	
	//оправка статей ajax-запросом
	public function some_articles($some)
	{
		$this->load->model('Startpage_model');
		$data['articles'] = $this->Startpage_model->$some();
		$user1 = $data['articles'];

		if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'){
			if($_POST['flag'] == 1){
			$users_json = json_encode($user1);
			echo $users_json;
			}
		}
	}
	

	public function login()
	{
		$identity = $this->input->post('identity');
		$password = $this->input->post('password');

		$this->data['title'] = $this->lang->line('login_heading');
		$this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
		$this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');
		$returnText = false;
		if ($this->form_validation->run() == true)
			{
				$remember = (bool) $this->input->post('remember');
				if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
				{
					$this->session->set_flashdata('message', $this->ion_auth->messages());
					$returnText = true;
				}
				else
				{
					$this->session->set_flashdata('message', $this->ion_auth->errors());
				}
			}
			else
			{
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
			}
		echo $returnText;
	}

	public function logout()
	{
		$this->data['title'] = "Logout";

		// log the user out
		$logout = $this->ion_auth->logout();

		// redirect them to the login page
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('startpage', 'refresh');
	}

	public function create_user()
    {
        $this->data['title'] = $this->lang->line('create_user_heading');

		$avatar = "gallery/uploads/user.jpg";
		
		$password = $this->input->post('password');
		$password_confirm = $this->input->post('password_confirm');
		$email = $this->input->post('email');
		$first_name = $this->input->post('first_name');
        $returnText = false;

        $tables = $this->config->item('tables','ion_auth');
        $identity_column = $this->config->item('identity','ion_auth');
        $this->data['identity_column'] = $identity_column;

        // validate form input
        $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required');

        if($identity_column!=='email')
        {
            $this->form_validation->set_rules('identity',$this->lang->line('create_user_validation_identity_label'),'required|is_unique['.$tables['users'].'.'.$identity_column.']');
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email');
        }
        else
        {
            $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
        }

        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');

        $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

        if ($this->form_validation->run() == true)
        {
            $email    = strtolower($this->input->post('email'));
            $identity = ($identity_column==='email') ? $email : $this->input->post('identity');
            $password = $this->input->post('password');

            $additional_data = array(
                'first_name' => $this->input->post('first_name'),
                'avatar' => $avatar,
            );

        }
        if ($this->form_validation->run() == true && $this->ion_auth->register($identity, $password, $email, $additional_data))
        {
            // check to see if we are creating the user
            // redirect them back to the admin page
            $this->session->set_flashdata('message', $this->ion_auth->messages());
            $returnText = true;
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
            $this->data['avatar'] = array(
                'name'  => 'avatar',
                'id'    => 'avatar',
                'type'  => 'text',
                'value' => $avatar,
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
        }
        echo $returnText;
    }

	public function articles($id) //загрузка статьи по id
	{
		$date['get_categories'] = $this->get_categories(); // получение категорий для навбара
		
		$this->load->model('Articles_model');
		$this->load->model('Startpage_model');
		$this->session->set_flashdata('referrer', current_url());
		$this->Articles_model->inc_views($id);
		$date['value'] = $this->Startpage_model->get_like_article($id);
		$date['profile'] = $this->ion_auth->user()->row();
		$date['articles'] = $this->Articles_model->get_articles($id);

		$comm = $this->Articles_model->get_all_comments($id);

		$date['users'] = $this->Articles_model->get_user_comments($id);
		$date['comments'] = $this->getCommentsTree($this->Articles_model->get_all_comments($id)) ;

		$date['gallery'] = $this->Articles_model->get_gallery($id);
		$date['id'] = $id;
		$this->session->set_flashdata('referrer', current_url());
		$this->load->view('article_view',$date);

	}

    public static function getCommentsTree($comments) {
        $cats = array();
/* 		foreach ($comments as $comment) {
 			if($comment->parent_id == null){
 				$comment['level'] = 0;
 				$result[] = $comment;
 				$result = array_merge(self::buildTreelikeArray($comments, $comment->id));
 			}
 		};*/

        // проходим по ВСЕМ комментариям и формируем массив
        foreach ($comments as $comment) {
            // ключ массива - родитель текущего комментария
            $cats[(int) $comment['parent_id']][] = array(
                'comment_id' => $comment['id'],
                'message' => $comment['message'],               
                'created' => $comment['created'],
                'user_id' => $comment['user_id'],
            );
        }
        // теперь просто вызываем рекурсивную функцию
        return self::buildTreelikeArray($cats, self::NO_PARENT_ID);
        //return $comments;
    }
 
	public static function buildTreelikeArray($cats, $parent_id) {
        // каждый раз увеличиваем статическую переменную уровня
        self::$level++;
        $result = array();
 
        if (is_array($cats) && isset($cats[$parent_id])) {
            foreach ($cats[$parent_id] as $cat) {
                $cat['level'] = self::$level;
                $result[] = $cat;
                $result = array_merge($result, self::buildTreelikeArray($cats, $cat['comment_id']));
                self::$level--;
                // для создания иерархического массива
                //$result[] = self::buildTreelikeArray($cats, $cat['comment_id']);
            }
        } else {
            return array();
        }
        return $result;
    }

	public function add_comments(){
		
		$prof = $this->ion_auth->user()->row();
		$data['user_id'] = $this->input->post('id_user');
		$data['message'] = $this->input->post('message');
		$data['article_id'] = (int) $this->input->post('id');
		$data['parent_id'] = (int) $this->input->post('id_parent');
		$data['created'] = date('Y-m-d H:i:s');

		$this->load->model('articles_model');
		$this->articles_model->insert_comment($data);

		redirect('startpage/articles/'.$this->input->post('id'));
	}

	public function edit_users(){
		
		$data['get_categories'] = $this->get_categories(); // получение категорий для навбара
		
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('adminpanel/login', 'refresh');
		}
		else
		{	
			$data['profile'] = $this->ion_auth->user()->row();
			$this->load->view('profile_edit_view', $data);
		}
	}

	public function edit_users_reciever(){
		
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('adminpanel/login', 'refresh');
		}
		else
		{	
			$config['upload_path'] = './gallery/uploads';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '2000';
			$config['overwrite'] = TRUE;
			$this->load->library('upload', $config);

			$this->upload->do_upload('avatar'); //аватар
			$avatar = $this->upload->data();
			$avatar = strstr($avatar['full_path'], "gal");
			$this->load->model('startpage_model');

			$data['first_name'] = $this->input->post('first_name');
			$data['id'] = $this->input->post('id');
			if($avatar !="gallery/uploads/"){
				$data['avatar'] = $avatar;
			};
			

			
			$this->startpage_model->update_user($data);

			$data['profile'] = $this->ion_auth->user()->row();

			$this->load->view('profile_edit_view', $data);
		}
		}

	public function likes(){
		if (!$this->ion_auth->logged_in())
		{
			$returnText = 'false'; 
		}
		else
		{
			$date['id_user']=$this->input->post('id_user');
			$date['id_article']=$this->input->post('id_st');
			$date['value']=$this->input->post('value');
			$this->load->model('startpage_model');
			if ($this->startpage_model->get_like_user($date)){
				//лайк уже есть
				$returnText = 'false';
			}
			else{
				$this->startpage_model->add_like($date);
				$returnText = 'true';
			}
		}
	echo $returnText;
	}

	public function likes_check(){
		if (!$this->ion_auth->logged_in())
		{
			$returnText = 'false'; 
		}
		else
		{
			$date['id_user']=$this->input->post('id_user');
			$date['id_article']=$this->input->post('id_st');
			$this->load->model('startpage_model');
			if ($this->startpage_model->get_like_user($date)){
				//лайк уже есть
				$returnText = 'false';
			}
			else{
				$returnText = 'true';
			}
		}
	echo $returnText;
	}
		

/****************************** *Функци вывода категорий и подкатегорий *****************/
	public function c_view($a, $b=null)
    {
		$data['get_categories'] = $this->get_categories(); // получение категорий для навбара
		
		if($b == null){
			$this->load->model('Category_model');
			$data['categories'] = $this->Category_model->c_view_model($a);
			
			if (!$this->ion_auth->logged_in())
			{
				$this->load->view('categories_view', $data);
			}
			else
			{
				$data['profile'] = $this->ion_auth->user()->row();
				$this->load->view('categories_view', $data);
			}
		} 
		else
		{
			if (!$this->ion_auth->logged_in())
			{
				$this->load->model('Category_model');
				$data['subcategory'] = $this->Category_model->get_category_name($b);
				$data['articles'] = $this->Category_model->load_articles($a, $b);
				$this->load->view('sub_categories_view', $data);
			}
			else
			{
				$this->load->model('Category_model');
				$data['subcategory'] = $this->Category_model->get_category_name($b);
				$data['articles'] = $this->Category_model->load_articles($a, $b);
				$data['profile'] = $this->ion_auth->user()->row();
				$this->load->view('sub_categories_view', $data);
			}
		}
	}
	

/****************************** *Функци вывода брендов *****************/
	public function b_view($a, $b = null)
    {
		$data['get_categories'] = $this->get_categories(); // получение категорий для навбара
		
		if($b == null){
			$data['loc'] = $a;
			$this->load->model('Category_model');
			$data['brands'] = $this->Category_model->b_view_model($a);
			
			if (!$this->ion_auth->logged_in())
			{
				$this->load->view('brands_view', $data);
			}
			else
			{
				$data['profile'] = $this->ion_auth->user()->row();
				$this->load->view('brands_view', $data);
			}
		}
		else
		{
			if (!$this->ion_auth->logged_in())
			{
				$this->load->view('articles_brand_view', $data);
			}
			else
			{
				$data['profile'] = $this->ion_auth->user()->row();
				$this->load->view('articles_brand_view', $data);
			}
		}
		
	}
	
	/* Загрузка статей для брендов */
	public function brand_view($loc, $brand)
	{
		if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')
		{
			if($_POST['flag'] == 1)
			{
				$this->load->model('Category_model');
				$data['articles'] = $this->Category_model->load_articles_b($brand);
				$user1 = $data['articles'];
				$users_json = json_encode($user1);
				echo $users_json;
			}
		}	
	}
	
	/*********** Отправка сообщений на почту ***********/
	public function send_msg()
	{
		// несколько получателей
		$to = 'automationpost76@gmail.com'; // обратите внимание на запятую
		
		
		// тема письма
		$subject = $this->input->post('email');
		
		// текст письма
		$message = $this->input->post('text');
		 
		// Для отправки HTML-письма должен быть установлен заголовок Content-type
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
		// Дополнительные заголовки
		$headers =  $this->input->post('name');
		
		if(!empty($subject) && !empty($message) && !empty($headers)){
			preg_match("/^[a-zA-Z0-9_\-.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-.]+$/", $subject, $match);
			if(count($match) != 0){
				// Отправляем
				mail($to, $subject, $message, $headers);
				
				$this->load->model('Msg_model');
				$data['articles'] = $this->Msg_model->insert_msg($headers, $subject , $message); 
				
				echo 'Ваше сообщение успешно отправленно!';
			}
			else
			{
				echo 'Ваш email введён некорректно!';
			}
		}
		else
		{
			echo 'Проверьте введённые поля! Возмжно, что-то не заполненно или заполненно неправильно.';
		}
	}
	
}