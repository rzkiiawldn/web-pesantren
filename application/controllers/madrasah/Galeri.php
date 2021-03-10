<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{

    public function index()
    {
        $data = [
            'title'         => 'Galeri',
            'informasi'     => $this->db->query("SELECT * FROM tb_informasi_website WHERE id_program = 2")->row_array(),
            'galeri'        => $this->db->query("SELECT * FROM tb_galeri WHERE id_program = 2 ORDER BY id_foto DESC")->result_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_madrasah', $data);
        $this->load->view('madrasah/galeri', $data);
        $this->load->view('templates/footer', $data);
    }
}
