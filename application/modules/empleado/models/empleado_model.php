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

	function noExisteCedula($cedula)
	{
		$query = $this->db->get_where('empleado', array('cedula' => $cedula));
		return $query->num_rows() == 0;
	}

	function obtenerEmpleado($datos)
	{
		$query = $this->db->get_where('empleado', $datos);
		return $query->row();
	}

	function existeEmpleado($slug)
	{
		$query = $this->db->get_where('empleado', array('slug' => $slug));
		return $query->num_rows() != 0;
	}

	function actualizarEmpleado($empleado_id, $empleado)
	{
		$this->db->where('id',$empleado_id);
		$this->db->update('empleado', $empleado);
	}

	function cedulaValida($datos)
	{
		$query1 = $this->db->get_where('empleado', $datos);
		$query2 = $this->db->get_where('empleado', array('cedula' => $datos['cedula']));
		return ($query1->num_rows() != 0 || $query2->num_rows() == 0);
	}

	function eliminarEmpleado($slug)
	{
		$this->db->delete('empleado', array('slug' => $slug));
	}

}

?>