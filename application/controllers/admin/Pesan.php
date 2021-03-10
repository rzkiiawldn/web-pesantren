<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data = [
            'title' => 'Pesan Masuk',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'kontak' => $this->db->query("SELECT * FROM tb_kontak")->result_array()
        ];
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('admin/pesan', $data);
        $this->load->view('templates/admin_footer', $data);
    }
}
