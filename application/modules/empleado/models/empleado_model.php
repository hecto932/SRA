<?php

class Empleado_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function insertarEmpleado($empleado)
	{
		$this->db->insert('empleado', $empleado);
	}

	function obtenerEmpleados()
	{
		$query = $this->db->get('empleado');
		return $query->result();
	}

}

?>