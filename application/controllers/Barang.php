
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
	//function dapat berjalan ketika sudha di panggil di koding dibawah ini
	function __construct(){
		parent::__construct();

		$this->load->model('Barang_model');
		$this->load->model('Satuan_model');
		// $this->output->enable_profiler(TRUE);
	}

	public function tampil()
	{
		//membuat array data dengan nama array list_barang
		//class ini akan menuju barang model dan menggunakan function tampil_barang
		$data['list_barang'] = $this->Barang_model->tampil_barang();
		//class ini memproses data ke view dengan variabel barang_tampil dengan data dari $data
		$this->load->view('barang_tampil', $data);
	}
	//membuat function
	public function tambah(){
		//memanggil view
		$data['list_satuan'] = $this->Satuan_model->tampil_satuan();
		$this->load->view('barang_tambah', $data);
	}
	public function act_tambah() {
		//mendapatkan post
		$namabrg = $this->input->post('nmbrg');
		$satuan = $this->input->post('satuan');
		$merk = $this->input->post('merk');
		$spesifikasi = $this->input->post('spesifikasi');
		$stok = $this->input->post('stok');

		// memanggil model tambah
		$this->Barang_model->tambah_barang($namabrg, $satuan, $merk, $spesifikasi, $stok);

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
		//membuat variabel $stok saat ini utk menampung value dari function model get_stok_tidakdigunakan
		$stok_saatini = $this->Barang_model->get_stok_tidakdigunakan($id_barang);

		//Cek untuk jumlah barang
		if ($jumlah >  $stok_saatini) {
			echo "Stok Barang Tidak Mencukupi";
			exit();
		} else {
			// memanggil model tambah
			$this->Barang_model->ambil_barang($id_dept, $id_barang, $jumlah);
		}
		//arahkan ke tampil

		redirect ('barang/tampil');
	}

	public function riwayat_stok($id_barang=0)	{

		//memanggil model tampil riwayat()
		$data['list_riwayat'] = $this->Barang_model->tampil_riwayat($id_barang);
		//load ke view
		$this->load->view('barang_riwayat_stok', $data);
		
	}

	public function pengambilan()	{

		//memanggil model tampil riwayat()
		$data['list_pengambilan'] = $this->Barang_model->pengambilan();

		$this->load->view('barang_pengambilan', $data);
		
	}
}
