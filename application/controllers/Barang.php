
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('Barang_model');
		// $this->output->enable_profiler(TRUE);
	}

	public function tampil()
	{
		$data['list_barang'] = $this->Barang_model->tampil_barang();
		$this->load->view('barang_tampil', $data);
	}
	public function tambah(){
		//memanggil view
		$this->load->view('barang_tambah');
	}
	public function act_tambah() {
		//mendapatkan post
		$namabrg = $this->input->post('nmbrg');
		$stok = $this->input->post('stok');

		// memanggil model tambah
		$this->Barang_model->tambah_barang($namabrg, $stok);

		//arahkan ke tampil
		redirect ('barang/tampil');
	}
		// menambah stok barang
	function tambah_stok($id_barang=0){

		$data['id_barang'] = $id_barang;
		
		$this->load->view('barang_tambah_stok', $data);
	}

	public function act_tambah_stok($id_barang=0) {
		//mendapatkan post
		$stok = $this->input->post('stok');

		// memanggil model tambah
		$this->Barang_model->tambah_barang_stok($id_barang, $stok);

		//arahkan ke tampil
		redirect ('barang/tampil');
	}

	function ambil()	{
		$data['list_barang'] = $this->Barang_model->tampil_barang();

		$this->load->model('Dept_model');
		$data['list_dept'] = $this->Dept_model->tampil_dept();

		//memanggil view
		$this->load->view('barang_ambil' , $data);
	}
	public function act_ambil() {
		//mendapatkan post
		$id_dept = $this->input->post('dept');
		$id_barang = $this->input->post('barang');
		$jumlah = $this->input->post('jumlah');

		// memanggil model tambah
		$this->Barang_model->ambil_barang($id_dept, $id_barang, $jumlah);

		//arahkan ke tampil
		redirect ('barang/tampil');
	}

	public function riwayat_stok($id_barang=0)	{

		//memanggil model tampil riwayat()
		$data['list_riwayat'] = $this->Barang_model->tampil_riwayat($id_barang);

		$this->load->view('barang_riwayat_stok', $data);
		
	}

	public function pengambilan()	{

		//memanggil model tampil riwayat()
		$data['list_pengambilan'] = $this->Barang_model->pengambilan();

		$this->load->view('barang_pengambilan', $data);
		
	}
}
