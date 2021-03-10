<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ekstrakurikuler extends CI_Controller
{

    public function index()
    {
        $data = [
            'title'         => 'Ekstrakurikuler',
            'informasi'     => $this->db->query("SELECT * FROM tb_informasi_website WHERE id_program = 2")->row_array(),
            'eskul'         => $this->db->query("SELECT * FROM tb_eskul WHERE id_program = 2 ORDER BY id_eskul DESC")->result_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_madrasah', $data);
        $this->load->view('madrasah/ekstrakurikuler', $data);
        $this->load->view('templates/footer', $data);
    }

    public function detail($id_eskul)
    {
        $data = [
            'title'         => 'Detail Extrakurikuler',
            'informasi'     => $this->db->query("SELECT * FROM tb_informasi_website WHERE id_program = 2")->row_array(),
            'eskul'        => $this->db->query("SELECT * FROM tb_eskul WHERE id_eskul = '$id_eskul'")->row_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_madrasah', $data);
        $this->load->view('madrasah/detail_ekstrakurikuler', $data);
        $this->load->view('templates/footer', $data);
    }
}
