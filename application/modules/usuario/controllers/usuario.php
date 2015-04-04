<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends MX_Controller {

	//CONSTRUCTOR DE LA CLASE
	public function __construct()
	{
		parent::__construct();
		$this->load->model('usuario_model');
	}

	//VERIFICA SI HAY UNA SESION
	public function haySesion()
	{
		return $this->session->userdata('usuario_id');
	}

	function obtenerUsuario($datos)
	{
		$query = $this->usuario_model->obtenerUsuario($datos);
		$query = SQL_to_array($query);
		return $query;
	}

	function verificarDatos()
	{
		$datos = array(
			"email" => $this->input->post('email'),
			"password" => sha1($this->input->post('password'))
		);

		return $this->usuario_model->verificarDatos($datos);
	}

	public function login()
	{
		//die_pre($_POST);
		//DEFINIMOS LAS REGLAS
		$this->form_validation->set_rules('email', 'Usuario', 'required|valid_email');
		$this->form_validation->set_rules('password','Contraseña', 'required|callback_verificarDatos');

		//DEIFINIMOS LOS MENSAJES
		$this->form_validation->set_message('required', '%s es requerido.');
		$this->form_validation->set_message('verificarDatos', 'Usuario/Contraseña es incorrecto.');
		$this->form_validation->set_message('valid_email', 'Correo electrónico invalido.');
	
		//DEFINIMOS EL DELIMITADOR DE LOS MENSAJES
		$this->form_validation->set_error_delimiters('<div class="card-panel red black-2 white-text center-align"><i class="mdi-alert-error"></i>','</div>');

		if($this->form_validation->run($this))
		{
			//OBTENGO LOS DATOS DE USUARIO POR EMAIL
			$usuario = $this->obtenerUsuario(array("email" => $this->input->post('email')));

			//CONFIGURO LOS DATOS A ENVIAR A LA COOKIE
			$datosCookie = array(
				"usuario_id" => $usuario['id']
			);

			//INTRODUCIMOS ESA DATA A LA COOKIE
			$this->session->set_userdata($datosCookie);

			redirect('backend');

		}
		else
		{
			echo modules::run('backend');
		}

	}

	public function logOut()
	{
		$this->session->unset_userdata('usuario_id');
		redirect('backend');
	}

	public function nuevoUsuario()
	{
		//SI TIENE LOS PERMISOS MUESTRO LA VISTA
		if(modules::run('usuario/haySesion'))
		{
			$datos['titulo'] = 'Backend - Nuevo Usuarios';
			$datos['usuario'] = $this->obtenerUsuario(array('id' => $this->session->userdata('usuario_id')));
			//die_pre($datos);
			$this->load->view('nuevo-usuario', $datos);
		}
		else
		{
			redirect('frontend');
		}
	}

	public function ajax_noExisteEmail()
	{
		$email = $this->input->post('email');
		echo json_encode(
			array(
				'email' => $this->usuario_model->noExisteEmail($email)
			)
		);
	}

	public function noExisteEmail()
	{
		return $this->usuario_model->noExisteEmail($this->input->post('email'));
	}

	public function usuarioNuevo()
	{

		$this->form_validation->set_rules('name', 'Nombre', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_noExisteEmail');
		$this->form_validation->set_rules('pass', 'Contraseña', 'required');
		$this->form_validation->set_rules('repass','Repita contraseña', 'required|matches[pass]');

		$this->form_validation->set_message('required', '%s es requerido.');
		$this->form_validation->set_message('noExisteEmail', '%s existe.');
		$this->form_validation->set_message('matches', 'Las contraseñas no coinciden.');

		$this->form_validation->set_error_delimiters('<div class="card-panel red black-2 white-text center-align"><i class="mdi-alert-error"></i>','</div>');

		//UPLOAD IMAGE
		$config['upload_path'] = 'assets/back/upload/avatar/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';

		$this->load->library('upload', $config);
		$image = $this->upload->do_upload('pic');
		if($this->form_validation->run($this))
		{
			$usuario = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'password' => sha1($this->input->post(password)),
				'slug' => createSlug($this->input->post('name'))
			);
			$data = $this->upload->data();
			if($image)
				$usuario['image'] = $data['file_name'];

			$this->usuario_model->insertarUsuario($usuario);

			redirect('backend');
		}
		else
		{
			$datos['image'] = $this->upload->display_errors('<div class="card-panel red black-2 white-text center-align"><i class="mdi-alert-error"></i>', '</div>');
			$datos['titulo'] = 'Backend - Nuevo Usuarios';
			$datos['usuario'] = $this->obtenerUsuario(array('id' => $this->session->userdata('usuario_id')));
			//die_pre($datos);
			$this->load->view('nuevo-usuario', $datos);
		}
	}

	public function obtenerUsuarios()
	{
		$query = $this->usuario_model->obtenerUsuarios();
		$query = objectSQL_to_array($query);
		return $query;
	}

	public function verUsuarios()
	{
		if($this->haySesion())
		{
			$datos['titulo'] = 'Backend - Nuevo Usuarios';
			$datos['usuario'] = $this->obtenerUsuario(array('id' => $this->session->userdata('usuario_id')));
			$datos['usuarios'] = $this->obtenerUsuarios();
			$datos['contenido_principal'] = $this->load->view('mostrar-usuarios', $datos, true);
			$this->load->view('back/template', $datos);
		}
		else
		{
			redirect('backend');	
		}
	}

	function existeUsuario($slug)
	{
		return $this->usuario_model->existeUsuario($slug);
	}

	public function actualizarUsuario($slug)
	{
		if(modules::run('usuario/haySesion') && $this->existeUsuario($slug))
		{
			$datos['titulo'] = 'Backend - Actualizar usuario';
			$datos['usuario'] = $this->obtenerUsuario(array('slug' => $slug));
			$datos['contenido_principal'] = $this->load->view('actualizar-usuario', $datos, true);
			$this->load->view('back/template', $datos);
		}
		else
		{
			echo "No existe";
		}
	}

	function existeEmail()
	{
		return !$this->noExisteEmail($this->input->post('email'));
	}

	public function usuarioActualizado()
	{
		$this->form_validation->set_rules('name', 'Nombre', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_existeEmail');

		if(!empty($this->input->post('pass')) || !empty($this->input->post('repass')))
		{
			$this->form_validation->set_rules('pass', 'Contraseña', 'required');
			$this->form_validation->set_rules('repass','Repita contraseña', 'required|matches[pass]');
			$this->form_validation->set_message('matches', 'Las contraseñas no coinciden.');
		}

		$this->form_validation->set_message('required', '%s es requerido.');
		$this->form_validation->set_message('is_unique', '%s existe.');
		

		$this->form_validation->set_error_delimiters('<div class="card-panel red black-2 white-text center-align"><i class="mdi-alert-error"></i>','</div>');

		//UPLOAD IMAGE
		$config['upload_path'] = 'assets/back/upload/avatar/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';

		$this->load->library('upload', $config);

		if($this->form_validation->run($this))
		{
			$usuario_id = $this->input->post('usuario_id');
			$usuario = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'slug' => createSlug($this->input->post('name'))
			);
			if(!empty($this->input->post('pass')) || !empty($this->input->post('repass')))
			{
				$usuario['password'] = sha1($this->input->post('pass'));
			}

			if($this->upload->do_upload('pic'))
			{
				$data = $this->upload->data();
				$usuario['image'] = $data['file_name'];
			}

			$this->usuario_model->actualizarUsuario($usuario_id, $usuario);

			redirect('usuario/verUsuarios');
		}
		else
		{
			$datos['image'] = $this->upload->display_errors('<div class="card-panel red black-2 white-text center-align"><i class="mdi-alert-error"></i>', '</div>');
			$datos['titulo'] = 'Backend - Actualizar usuario';
			$datos['usuario'] = $this->obtenerUsuario(array('id' => $this->input->post('usuario_id')));
			$datos['contenido_principal'] = $this->load->view('actualizar-usuario', $datos, true);
			$this->load->view('back/template', $datos);
		}
	}

	public function eliminarUsuario($slug)
	{
		if($this->haySesion() && $this->existeUsuario($slug))
		{
			$datos['titulo'] = 'Backend - Eliminar usuario';
			$datos['usuario'] = $this->obtenerUsuario(array('slug' => $slug));
			$datos['contenido_principal'] = $this->load->view('eliminar-usuario', $datos, true);
			$this->load->view('back/template', $datos);
		}
		else
		{
			redirect('backend/verUsuarios');
		}
	}

	public function usuarioEliminado($slug)
	{
		if($this->haySesion() && $this->existeUsuario($slug))
		{
			$this->usuario_model->usuarioEliminado($slug);
			redirect('usuario/verUsuarios');
		}
		else
		{
			redirect('backend');
		}
	}
}

