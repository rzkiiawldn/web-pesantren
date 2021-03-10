<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sarana_prasarana extends CI_Controller
{

    public function index()
    {
        $data = [
            'title'         => 'Sarana dan Prasarana',
            'informasi'     => $this->db->query("SELECT * FROM tb_informasi_website WHERE id_program = 2")->row_array(),
            'fasilitas'     => $this->db->query("SELECT * FROM tb_fasilitas WHERE id_program = 2 ORDER BY id_fasilitas DESC")->result_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_madrasah', $data);
        $this->load->view('madrasah/sarana_prasarana', $data);
        $this->load->view('templates/footer', $data);
    }

    public function detail($id_fasilitas)
    {
        $data = [
            'title'         => 'Detail Extrakurikuler',
            'informasi'     => $this->db->query("SELECT * FROM tb_informasi_website WHERE id_program = 2")->row_array(),
            'fasilitas'     => $this->db->query("SELECT * FROM tb_fasilitas WHERE id_fasilitas = '$id_fasilitas' ")->row_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_madrasah', $data);
        $this->load->view('madrasah/detail_fasilitas', $data);
        $this->load->view('templates/footer', $data);
    }
}
