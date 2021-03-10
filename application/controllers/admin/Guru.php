<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data = [
            'title' => 'Dewan guru',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'guru' => $this->db->query("SELECT * FROM tb_guru ORDER BY id_guru DESC")->result_array()
        ];
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('admin/guru/index', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function detail_guru($id_guru)
    {
        $data = [
            'title' => 'Detail Program Pendidikan',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'guru' => $this->db->query("SELECT * FROM tb_guru WHERE id_guru = '$id_guru'")->row_array()
        ];
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('admin/guru/detail_guru', $data);
        $this->load->view('templates/admin_footer', $data);
    }
}
