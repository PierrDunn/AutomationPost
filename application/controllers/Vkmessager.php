<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Vkmessager extends CI_Controller {


/*********** Отправка сообщения для VK-Messager ***********/	
	private function send_msg($id)
	{
		$url = 'https://api.vk.com/method/messages.send';
		$params = array(
			'user_id' => $id,    // Кому отправляем
			'message' => 'Опа чё! Накатим бота ёпта бля!',   // Что отправляем
			'access_token' => '57549eca445603fd0127454d5d141e8666bcc1c0992a57c25109de1dcebef60fbe8291eeb8adf30f8ce59',
			'v' => '5.37',
		);

		// В $result вернется id отправленного сообщения
		$result = file_get_contents($url, false, stream_context_create(array(
			'http' => array(
				'method'  => 'POST',
				'header'  => 'Content-type: application/x-www-form-urlencoded',
				'content' => http_build_query($params)
			)
		)));
		
		echo $result;
	}
	
/*********** Публикация поста в группе ***********/	
	public function send_post($f, $l, $p)
	{
		$url = 'https://api.vk.com/method/wall.post';
		$params = array(
			'owner_id' => -142712117,
			'from_group' => 1,
			'message' => 'Очередной ублюдок('.$f.' '.$l.') подписался на бота в ВК. '.$p,
			'access_token' => '57549eca445603fd0127454d5d141e8666bcc1c0992a57c25109de1dcebef60fbe8291eeb8adf30f8ce59',
			'v' => '5.37',
		);

		// В $result вернется id отправленного сообщения
		$result = file_get_contents($url, false, stream_context_create(array(
			'http' => array(
				'method'  => 'POST',
				'header'  => 'Content-type: application/x-www-form-urlencoded',
				'content' => http_build_query($params)
			)
		)));
		echo $result;
		print_r($params);
	}

	
/*********** Авторизация для VK-Messager ***********/
	public function vk_login()
	{

		$client_id = '5922287'; // ID приложения
		$client_secret = 'H8O3G4U5ASg7uyTPKOVc'; // Защищённый ключ
		$redirect_uri = 'http://automationpost.ru/vkmessager/vk_login'; // Адрес сайта
		
		if (isset($_GET['code'])) {
			$result = false;
			$params = array(
				'client_id' => $client_id,
				'client_secret' => $client_secret,
				'code' => $_GET['code'],
				'redirect_uri' => $redirect_uri 
			);
			
			$token = json_decode($this->get_curl('https://oauth.vk.com/access_token' . '?' . urldecode(http_build_query($params))), true);
			
			if (isset($token['access_token'])) {
				$params = array(
					'uids'         => $token['user_id'],
					'fields'       => 'uid,first_name,last_name,screen_name,sex,bdate,photo_big',
					'access_token' => $token['access_token']
				);

				$userInfo = json_decode(file_get_contents('https://api.vk.com/method/users.get' . '?' . urldecode(http_build_query($params))), true);
				if (isset($userInfo['response'][0]['uid'])) {
					$userInfo = $userInfo['response'][0];
					$result = true;
				}
			}
			else
			{
				echo 'Ошибка регистраци! Попробуйте еще раз.';
			}
			
			if ($result) {
				
				$userInfo['user_ip'] = $_SERVER['REMOTE_ADDR'];

				$this->load->model('Vk_login_model');
				$have_user = $this->Vk_login_model->insert_user($userInfo);
				if($have_user)
				{
					$this->send_msg($userInfo['uid']);
					$this->send_post($userInfo['first_name'], $userInfo['last_name'], $userInfo['photo_big']);
				}
				
				redirect('', 'refresh');
				
			}
			
		}

	}

/*********** Функция для получения массива данных (замена ) ***********/	
	private function get_curl($url)
	{
		if(function_exists('curl_init'))
		{
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,$url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			$output = curl_exec($ch);
			echo curl_error($ch);
			curl_close($ch);
			return $output;
		}
		else
		{
			return file_get_contents($url);
		}
	}
	
/*********** Проверка на наличия юзера в базе ***********/	
	public function have_user()
	{
		if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')
		{
			if($_POST['flag'] == 1)
			{
				echo 1;
			}
		}	
	}

}