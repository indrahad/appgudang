
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dept extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('Dept_model');
	}

	public function tampil()
	{

		//memanggil model tampil dept();
		$data['list_dept'] = $this->Dept_model->tampil_dept();
		//mamanggil view 
		$this->load->view('dept_tampil', $data);
	}
	

}
