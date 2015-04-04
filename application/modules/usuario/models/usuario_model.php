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
		$this->db->where('id !=',1);
		$this->db->where('id !=', $this->session->userdata('usuario_id'));
		$query = $this->db->get('usuario');
		return $query->result();
	}

	//VERIFICA SI EXISTE ESE USUARIO
	function existeUsuario($slug)
	{
		$query = $this->db->get_where('usuario', array('slug' => $slug));
		return $query->num_rows() != 0;
	}

	function actualizarUsuario($usuario_id, $usuario)
	{
		$this->db->where('id', $usuario_id);
		$this->db->update('usuario', $usuario); 
	}

	function usuarioEliminado($slug)
	{
		$this->db->delete('usuario', array('slug' => $slug));
	}
}

?>