<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Satuan_model extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->id_admin=1;
	}
	//tambah tulisan di line 10

	function tampil_satuan(){
		$q = $this->db->get('satuan');
		return $q->result();
	} 
	
}
