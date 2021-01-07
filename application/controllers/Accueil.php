<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require "base_controller.php";
class Accueil extends Base_controller {

	public function index()
	{
		$this->load->view('accueil');
	}		
}
