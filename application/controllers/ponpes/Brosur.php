<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Brosur extends CI_Controller
{

    public function index()
    {
        $data = [
            'title'         => 'Brosur',
            'informasi'     => $this->db->query("SELECT * FROM tb_informasi_website WHERE id_program = 1")->row_array(),
            'brosur'        => $this->db->query("SELECT * FROM tb_brosur WHERE id_program = 1")->result_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('ponpes/brosur', $data);
        $this->load->view('templates/footer', $data);
    }
}
