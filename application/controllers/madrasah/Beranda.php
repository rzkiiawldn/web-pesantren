<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

	public function index()
	{
		$data = [
			'title' 		=> 'Madrasah Aliyah',
			'informasi' 	=> $this->db->query("SELECT * FROM tb_informasi_website ti JOIN tb_program_pendidikan tp ON ti.id_program = tp.id_program WHERE ti.id_program = 2")->row_array(),
			'slider' 		=> $this->db->query("SELECT * FROM tb_slider WHERE id_program = 2 ORDER BY id_slider DESC")->result_array(),
			'program' 		=> $this->db->query("SELECT * FROM tb_program_pendidikan LIMIT 1,100")->result_array(),
			'galeri' 		=> $this->db->query("SELECT * FROM tb_galeri WHERE id_program = 2 ORDER BY id_foto DESC LIMIT 4")->result_array(),
			'berita' 		=> $this->db->query("SELECT * FROM tb_berita WHERE id_program = 2 AND tampilkan_berita = 1 ORDER BY id_berita DESC LIMIT 4")->result_array(),
			'sambutan' 		=> $this->db->query("SELECT * FROM tb_sambutan WHERE id_program = 2")->result_array()
		];
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar_madrasah', $data);
		$this->load->view('madrasah/beranda', $data);
		$this->load->view('templates/footer', $data);
	}
}
