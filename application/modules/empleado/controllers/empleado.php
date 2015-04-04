<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empleado extends MX_Controller {

	//CONSTRUCTOR DE LA CLASE
	public function __construct()
	{
		parent::__construct();
		$this->load->model('empleado_model');
	}

	public function nuevoEmpleado()
	{
		if(modules::run('usuario/haySesion'))
		{
			$datos['titulo'] = 'Backend - Nuevo Usuarios';
			$datos['usuario'] = modules::run('obtenerUsuario',(array('id' => $this->session->userdata('usuario_id'))));
			//die_pre($datos);
			$datos['contenido_principal'] = $this->load->view('nuevo-empleado', $datos, true);
			$this->load->view('back/template', $datos);
		}
		else
		{
			redirect('backend');
		}
	}

	public function empleadoNuevo()
	{
		$this->form_validation->set_rules('name', 'Nombre', 'required|trim');
		$this->form_validation->set_rules('cedula', 'Cedula', 'required|trim|is_unique[empleado.cedula]|numeric');

		$this->form_validation->set_message('required', '%s es requerido.');
		$this->form_validation->set_message('is_unique', 'La cedula ya existe.');

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
			$empleado = array(
				'name' => $this->input->post('name'),
				'cedula' => $this->input->post('cedula'),
				'slug' => createSlug($this->input->post('name'))
			);
			$data = $this->upload->data();
			if($image)
				$empleado['image'] = $data['file_name'];

			$this->empleado_model->insertarEmpleado($empleado);

			redirect('backend');
		}
		else
		{
			$datos['image'] = $this->upload->display_errors('<div class="card-panel red black-2 white-text center-align"><i class="mdi-alert-error"></i>', '</div>');
			$datos['titulo'] = 'Backend - Nuevo Usuarios';
			$datos['usuario'] = modules::run('usuario/obtenerUsuario',(array('id' => $this->session->userdata('usuario_id'))));
			$datos['contenido_principal'] = $this->load->view('nuevo-empleado', $datos, true);
			$this->load->view('back/template', $datos);
		}
	}

	public function obtenerEmpleados()
	{
		$query = $this->empleado_model->obtenerEmpleados();
		$query = objectSQL_to_array($query);
		return $query;
	}

	public function verEmpleados()
	{
		if(modules::run('usuario/haySesion'))
		{
			$datos['titulo'] = 'Backend - Empleados';
			$datos['usuario'] = modules::run('obtenerUsuario',(array('id' => $this->session->userdata('usuario_id'))));
			$datos['empleados'] = $this->obtenerEmpleados();
			$datos['contenido_principal'] = $this->load->view('mostrar-empleados', $datos, true);
			$this->load->view('back/template', $datos);
		}
		else
		{
			redirect('backend');	
		}
	}

}

