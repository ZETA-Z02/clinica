<?php

class Login extends Controller
{
	function __construct()
	{
		parent::__construct();
	}
	function render()
	{
		$this->view->Render('login/index');
	}
	public function user(){
		$username = strtolower($_POST['username']);
		$password = strtolower($_POST['password']);
		$data = $this->model->user($username,$password);
		if($username == $data['usuario'] && $password == $data['password']){
			if($data['estado'] == 1){
				$_SESSION['katari'] = 'katari';
				$_SESSION['idpersonal'] = $data['idpersonal'];
				$_SESSION['nivel'] = $data['nivel'];
				header('location: '.constant('URL').'dashboard/render');	
			}else{
				$this->render();
			}
		}else{
			$this->render();
		}
	}
	public function logout(){
		session_destroy();
		unset($_SESSION['katari']);
		header('location: '.constant('URL').'login/render');
	}
}