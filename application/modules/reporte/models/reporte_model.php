<?php

class Empleado_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function insertarReporte($reporte)
	{
		$this->db->insert('reporte', $reporte);
	}

	function empleadoMarcado($empleado_id)
	{
		$query = $this->db->get_where('reporte', array('empleado_id' => $empleado_id, 'fecha' => date('Y-m-d')));
		return $query->num_rows() == 0;
	}

}

?>