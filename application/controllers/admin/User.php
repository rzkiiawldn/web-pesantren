<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data = [
            'title' => 'Data User',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'tb_user' => $this->db->query("SELECT * FROM tb_user ORDER BY id_user DESC")->result_array()
        ];
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('admin/user/index', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function tambah_user()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tb_user.username]', [
            'is_unique' => 'Username ini sudah digunakan!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]');

        if ($this->form_validation->run() == false) {
            $this->index();
        } else {

            $data = [
                'nama'        => $this->input->post('nama', true),
                'username'    => $this->input->post('username', true),
                'password'    => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            ];

            $this->db->insert('tb_user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan user baru</div>');
            redirect('admin/user/');
        }
    }

    public function edit_user($id_user)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'is_unique' => 'Username ini sudah digunakan!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]');

        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $nama             = $this->input->post('nama');
            $username         = $this->input->post('username');
            $password         = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

            $this->db->set('nama', $nama);
            $this->db->set('username', $username);
            $this->db->set('password', $password);
            $this->db->where('id_user', $id_user);
            $this->db->update('tb_user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengedit program pendidikan</div>');
            redirect('admin/user/');
        }
    }

    public function hapus($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('tb_user');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus user</div>');
        redirect('admin/user');
    }
}
