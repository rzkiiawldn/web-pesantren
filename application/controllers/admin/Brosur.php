<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Brosur extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data = [
            'title' => 'Brosur Sekolah',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'program' => $this->db->query("SELECT * FROM tb_program_pendidikan WHERE id_program BETWEEN 1 AND 2")->result_array(),
            'brosur' => $this->db->query("SELECT * FROM tb_brosur ts JOIN tb_program_pendidikan tp ON ts.id_program = tp.id_program ORDER BY id_brosur DESC")->result_array()
        ];
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('admin/brosur/index', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function tambah_brosur()
    {

        $foto_brosur = $_FILES['foto_brosur'];
        if ($foto_brosur = '') {
        } else {
            $config['upload_path']        = './assets/admin/img/brosur/';
            $config['allowed_types']    = 'jpg|png|gif|jpeg|JPEG';
            $config['max_size']            = '2048';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_brosur')) {
                $foto_brosur = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Upload gagal, periksa kembali foto_brosur yang anda upload!</div>');
                redirect('admin/brosur/');
            }
        }
        $data = [
            'id_program'        => $this->input->post('id_program', true),
            'foto_brosur'       => $foto_brosur
        ];

        $this->db->insert('tb_brosur', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan brosur baru</div>');
        redirect('admin/brosur/');
    }

    public function edit_brosur($id_brosur)
    {

        $id_program           = $this->input->post('id_program');

        $foto_brosur = $_FILES['foto_brosur'];
        if ($foto_brosur = '') {
        } else {
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/admin/img/brosur/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_brosur')) {
                $old_foto_brosur = $data['brosur']['foto_brosur'];
                if ($old_foto_brosur != 'default.jpg') {
                    unlink(FCPATH . 'assets/admin/img/brosur/' . $old_foto_brosur);
                }

                $new_foto_brosur = $this->upload->data('file_name');
                $this->db->set('foto_brosur', $new_foto_brosur);
            } else {
                echo $this->upload->display_errors('foto_brosur');
            }
        }

        $this->db->set('id_program', $id_program);
        $this->db->where('id_brosur', $id_brosur);
        $this->db->update('tb_brosur');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengedit brosur</div>');
        redirect('admin/brosur/');
    }

    public function hapus_brosur($id_brosur)
    {
        $this->db->where('id_brosur', $id_brosur);
        $this->db->delete('tb_brosur');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus brosur</div>');
        redirect('admin/brosur');
    }
}
