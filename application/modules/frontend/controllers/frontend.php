<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontend extends MX_Controller {

	//CONSTRUCTOR DE LA CLASE
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('front_home');
	}
}

