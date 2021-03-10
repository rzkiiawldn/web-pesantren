<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
		$data = [
			'title' 		=> 'Asshiddiqiyah 10',
			'informasi' 	=> $this->db->query("SELECT * FROM tb_informasi_website WHERE id_program = 1")->row_array(),
			'slider' 		=> $this->db->query("SELECT * FROM tb_slider WHERE id_program = 1 ORDER BY id_slider DESC")->result_array(),
			'program' 		=> $this->db->query("SELECT * FROM tb_program_pendidikan LIMIT 1,100")->result_array(),
			'galeri' 		=> $this->db->query("SELECT * FROM tb_galeri ORDER BY id_foto DESC LIMIT 4")->result_array(),
			'berita' 		=> $this->db->query("SELECT * FROM tb_berita WHERE id_program = 1 AND tampilkan_berita = 1 ORDER BY id_berita DESC LIMIT 4")->result_array(),
			'sambutan' 		=> $this->db->query("SELECT * FROM tb_sambutan WHERE id_program = 1")->result_array()
		];
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('ponpes/beranda', $data);
		$this->load->view('templates/footer', $data);
	}
}
