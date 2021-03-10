<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sarana_prasarana extends CI_Controller
{

    public function index()
    {
        $data = [
            'title'         => 'Sarana dan Prasarana',
            'informasi'     => $this->db->query("SELECT * FROM tb_informasi_website WHERE id_program = 1")->row_array(),
            'fasilitas'        => $this->db->query("SELECT * FROM tb_fasilitas WHERE id_program = 1")->result_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('ponpes/sarana_prasarana', $data);
        $this->load->view('templates/footer', $data);
    }

    public function detail($id_fasilitas)
    {
        $data = [
            'title'         => 'Detail Extrakurikuler',
            'informasi'     => $this->db->query("SELECT * FROM tb_informasi_website WHERE id_program = 1")->row_array(),
            'fasilitas'     => $this->db->query("SELECT * FROM tb_fasilitas WHERE id_fasilitas = '$id_fasilitas' ORDER BY id_fasilitas DESC")->row_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('ponpes/detail_fasilitas', $data);
        $this->load->view('templates/footer', $data);
    }
}
