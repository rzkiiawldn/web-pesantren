<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data = [
            'title' => 'Admin Asshiddiqiyah 10',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array()
        ];
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('admin/beranda', $data);
        $this->load->view('templates/admin_footer', $data);
    }
}
