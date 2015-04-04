<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reporte extends MX_Controller {

	//CONSTRUCTOR DE LA CLASE
	public function __construct()
	{
		parent::__construct();
		$this->load->model('reporte_model');
	}

	function existeCedula()
	{
		return modules::run('empleado/existeCedula',$this->input->post('cedula'));
	}


	public function ajax_marcar()
	{
		$this->form_validation->set_rules('cedula', 'Cedula', 'required|callback_existeCedula');
		$this->form_validation->set_message('required','%s es requerido.');
		$this->form_validation->set_message('existeCedula','%s invalido.');

		if($this->form_validation->run($this))
		{
			$empleado = modules::run('empleado/obtenerEmpleado', array('cedula' => $this->input->post('cedula')));

			//SI NO HA ENTRADO
			if(!$this->reporte_model->empleadoMarcado($empleado['id']))
			{
				$reporte = array(
					'empleado_id' => $empleado['id'],
					'create_at' => date('Y-m-d'),
					'fecha' => date('Y-m-d'),
					'hora' => date('h:m:i'),
					'accion' => 1
				);
				$this->reporte_model->insertarReporte($reporte);

				echo json_encode(array(
					'mensaje' => "El empleado ".$empleado['name']."Entro"
 				));
			}
			elseif($this->reporte_model->empleadoMarcado($empleado['id']))
			{
				$reporte = array(
					'empleado_id' => $empleado['id'],
					'create_at' => date('Y-m-d'),
					'fecha' => date('Y-m-d'),
					'hora' => date('h:m:i'),
					'accion' => 2
				);
				$this->reporte_model->insertarReporte($reporte);
			}
			else
			{

			}

			
			echo json_encode($ajax_data);
		}
		else
		{
			$ajax_data = array(
				'error'	=> 	"Codigo invalido"
			);
			
			echo json_encode($ajax_data);
		}
	}
}