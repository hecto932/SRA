<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend extends MX_Controller {

	//CONSTRUCTOR DE LA CLASE
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if(modules::run('usuario/haySesion'))
		{
			$datos['titulo'] = "Backend - Home";
			$datos['usuario'] = modules::run('usuario/obtenerUsuario', array('id' => $this->session->userdata('usuario_id')));
			$datos['contenido_principal'] = $this->load->view('back_home', $datos, true);
			$this->load->view('back/template', $datos);
		}
		else
		{
			$datos['titulo'] = 'Backend - Iniciar Sesión';
			$this->load->view('login', $datos);
		}
	}
}

