<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('components/header', true);
		$this->load->view('components/menu', true);
		$this->load->view('pages/login');
		$this->load->view('components/footer', true);
	}

	public function verificarLogin(){

		//Recolectamos datos que nos envian desde el Login
		$usuario = $this->input->post('usuario');
		$pass = $this->input->post('pass');

		//Cargamos modelo
		$this->load->model('Login_m');

		//Ejecutamos funcion de modelo
		$usuario_valido = $this->Login_m->comparaUsuario($usuario, $pass);

		//Si es valido mandamos correcto sino error
		if($usuario_valido == true){
			echo 'correcto';
		}else{
			echo 'error';
		}

	}
}
