<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dept_model extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->id_admin=1;
	}
	//tambah tulisan di line 10

	function tampil_dept()	{
		$q = $this->db->get('dept');
		return $q->result();
	} 
	//tambah tulisan di line 10

	function tampil_dept()	{
		$q = $this->db->get('dept');
		return $q->result();
	} 

}
