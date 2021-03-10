<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_prestasi extends CI_Controller
{

    public function index()
    {
        $data = [
            'title'         => 'Siswa Berprestasi',
            'informasi'     => $this->db->query("SELECT * FROM tb_informasi_website WHERE id_program = 1")->row_array(),
            'prestasi'     => $this->db->query("SELECT * FROM tb_prestasi WHERE id_program = 1 ORDER BY id_prestasi DESC")->result_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('ponpes/prestasi', $data);
        $this->load->view('templates/footer', $data);
    }

    public function detail($id_prestasi)
    {
        $data = [
            'title'         => 'Detail Prestasi',
            'informasi'     => $this->db->query("SELECT * FROM tb_informasi_website WHERE id_program = 1")->row_array(),
            'prestasi'      => $this->db->query("SELECT * FROM tb_prestasi WHERE id_prestasi = '$id_prestasi' ")->row_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('ponpes/detail_prestasi', $data);
        $this->load->view('templates/footer', $data);
    }
}
