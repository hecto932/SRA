<?php

class Usuario_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function verificarDatos($datos)
	{
		$query = $this->db->get_where('usuario', $datos);
		return $query->num_rows() != 0;
	}

	function obtenerUsuario($datos)
	{
		$query = $this->db->get_where('usuario', $datos);
		return $query->row();
	}

	function noExisteEmail($email)
	{
		$query = $this->db->get_where('usuario', array('email' => $email));
		return $query->num_rows() == 0;
	}

	function insertarUsuario($usuario)
	{
		$this->db->insert('usuario', $usuario);
	}

	function obtenerUsuarios()
	{
		$query = $this->db->get('usuario');
		return $query->result();
	}
}

?>