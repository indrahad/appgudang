<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->id_admin=1;
	}

	function tampil_barang()	{
		$q = $this->db->get('barang');
		return $q->result();
	}


	function tambah_barang($nama, $satuan, $merk, $spesifikasi, $stok)	{
		$insert['nm_barang'] = $nama;
		$insert['satuan'] = $satuan;
		$insert['merk'] = $merk;
		$insert['spesifikasi'] = $spesifikasi;
		$insert['stok'] = $stok;
		$insert['stok_tidakdigunakan'] = $stok;
		$insert['stok_digunakan'] = 0;

		

		$this->db->insert('barang', $insert);
		$id_barang =  $this->db->insert_id();


		//simpan ke tabel riwayat
		$insert_riwayat['id_barang'] = $id_barang;
		$insert_riwayat['tipe'] = 'in';
		$insert_riwayat['jumlah'] = $stok;
		$insert_riwayat['tanggal'] = date('Y-m-d H:i:s');
		$insert_riwayat['id_admin'] = $this->id_admin;

		$this->db->insert('riwayat', $insert_riwayat);
	}

	function tambah_barang_stok($id_barang, $stok)	{

		// update tabel barang
		$this->db->where('id_barang', $id_barang);
		$this->db->set('stok', 'stok +' . $stok, FALSE);
		$this->db->set('stok_tidakdigunakan', 'stok_tidakdigunakan+' . $stok, FALSE);
		$this->db->update('barang');

		$insert_riwayat['id_barang'] = $id_barang;
		$insert_riwayat['tipe'] = 'in';
		$insert_riwayat['jumlah'] = $stok;
		$insert_riwayat['tanggal'] = date('Y-m-d H:i:s');
		$insert_riwayat['id_admin'] = $this->id_admin;

		$this->db->insert('riwayat', $insert_riwayat);
	}

	function ambil_barang ($id_dept, $id_barang, $jml)	{

		// simpan ke tabel ambilbrng
		$insert_ambil['id_dept'] = $id_dept;
		$insert_ambil['id_barang'] = $id_barang;
		$insert_ambil['jml'] = $jml;
		$insert_ambil['tanggal'] = date('Y-m-d H:i:s');
		$insert_ambil['id_admin'] = $this->id_admin;

		$this->db->insert('ambilbrng', $insert_ambil);

		// update tabel barang
		$this->db->where('id_barang', $id_barang);
		$this->db->set('stok_tidakdigunakan', 'stok_tidakdigunakan-' . $jml, FALSE);
		$this->db->set('stok_digunakan', 'stok_digunakan+' . $jml, FALSE);
		$this->db->update('barang');

		$insert_riwayat['id_barang'] = $id_barang;
		$insert_riwayat['tipe'] = 'out';
		$insert_riwayat['jumlah'] = $jml;
		$insert_riwayat['tanggal'] = date('Y-m-d H:i:s');
		$insert_riwayat['id_admin'] = $this->id_admin;

		$this->db->insert('riwayat', $insert_riwayat);
	}
	function tampil_riwayat	($id_barang)	{
		// $this->db->where('ambilbrng.id_barang', $id_barang);
		$this->db->join('barang', 'ambilbrng.id_barang=barang.id_barang');
		$this->db->join('dept', 'dept.id_dept=ambilbrng.id_dept');
		$this->db->group_by('ambilbrng.id_dept, ambilbrng.id_barang');
		$this->db->select('*, SUM(ambilbrng.jml) as jumlah');
		$q = $this->db->get('ambilbrng');
		return $q->result();
	}

	function pengambilan()	{
		$this->db->join('dept', 'dept.id_dept=ambilbrng.id_dept');
		$this->db->join('barang', 'barang.id_barang=ambilbrng.id_barang');
		$q = $this->db->get('ambilbrng');
		return $q->result();
	}


	//function cek stok barang
	function get_stok_tidakdigunakan($kode_barang){
		//Query Ambil Stok
		$this->db->where('id_barang', $kode_barang);
		$q = $this->db->get('barang');

		//kembalikan nilai $stok_tidakdigunakan
		return $q->row('stok_tidakdigunakan');

	}

	//function menampilkan stok yang tersedia
	function get_stok_ready ($kode){
		//Query Ambil data ke database
		$this->db->where('id_barang', $kode);
		$q = $this->db->get('barang');

		//Kembalikan nilai $
	}

}
	
