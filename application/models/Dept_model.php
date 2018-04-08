<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dept_model extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->id_admin=1;
	}

	function tampil_dept()	{
		$q = $this->db->get('dept');
		return $q->result();
	}

}
