<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Welcome extends CI_Controller {
 
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('m_data');
	}
 
	public function index()
    {
        // Memuat view
		$this->load->view('index');
    }
}