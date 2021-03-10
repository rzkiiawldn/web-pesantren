<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lokasi extends CI_Controller
{

    public function index()
    {
        $data = [
            'title'         => 'Lokasi',
            'informasi'     => $this->db->query("SELECT * FROM tb_informasi_website WHERE id_program = 1")->row_array(),
            'berita'        => $this->db->query("SELECT * FROM tb_berita WHERE id_program = 1")->result_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('ponpes/lokasi', $data);
        $this->load->view('templates/footer', $data);
    }
}
