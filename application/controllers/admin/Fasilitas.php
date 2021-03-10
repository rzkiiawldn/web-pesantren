<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fasilitas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data = [
            'title' => 'Fasilitas Sekolah',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'fasilitas' => $this->db->query("SELECT * FROM tb_fasilitas ts JOIN tb_program_pendidikan tp ON ts.id_program = tp.id_program ORDER BY id_fasilitas DESC")->result_array(),
            'program'   => $this->db->query("SELECT * FROM tb_program_pendidikan WHERE id_program BETWEEN 1 AND 2")->result_array()
        ];
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('admin/fasilitas/index', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function detail_fasilitas($id_fasilitas)
    {
        $data = [
            'title' => 'Detail Program Pendidikan',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'fasilitas' => $this->db->query("SELECT * FROM tb_fasilitas ts JOIN tb_program_pendidikan tp ON ts.id_program = tp.id_program WHERE id_fasilitas = '$id_fasilitas'")->row_array()
        ];
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('admin/fasilitas/detail_fasilitas', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function tambah_fasilitas()
    {

        $foto = $_FILES['foto'];
        if ($foto = '') {
        } else {
            $config['upload_path']        = './assets/admin/img/fasilitas/';
            $config['allowed_types']    = 'jpg|png|gif|jpeg|JPEG';
            $config['max_size']            = '2048';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Upload gagal, periksa kembali foto yang anda upload!</div>');
                redirect('admin/fasilitas/');
            }
        }
        $data = [
            'id_program'        => $this->input->post('id_program', true),
            'nama_fasilitas'    => $this->input->post('nama_fasilitas', true),
            'foto'              => $foto,
            'keterangan'        => $this->input->post('keterangan', true)
        ];

        $this->db->insert('tb_fasilitas', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan fasilitas baru</div>');
        redirect('admin/fasilitas/');
    }

    public function edit_fasilitas($id_fasilitas)
    {

        $id_program         = $this->input->post('id_program');
        $nama_fasilitas     = $this->input->post('nama_fasilitas');
        $keterangan         = $this->input->post('keterangan');

        $foto = $_FILES['foto'];
        if ($foto = '') {
        } else {
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/admin/img/fasilitas/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $old_foto = $data['fasilitas']['foto'];
                if ($old_foto != 'default.jpg') {
                    unlink(FCPATH . 'assets/admin/img/fasilitas/' . $old_foto);
                }

                $new_foto = $this->upload->data('file_name');
                $this->db->set('foto', $new_foto);
            } else {
                echo $this->upload->display_errors('foto');
            }
        }

        $this->db->set('id_program', $id_program);
        $this->db->set('nama_fasilitas', $nama_fasilitas);
        $this->db->set('keterangan', $keterangan);
        $this->db->where('id_fasilitas', $id_fasilitas);
        $this->db->update('tb_fasilitas');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengedit fasilitas</div>');
        redirect('admin/fasilitas/');
    }

    public function hapus_fasilitas($id_fasilitas)
    {
        $this->db->where('id_fasilitas', $id_fasilitas);
        $this->db->delete('tb_fasilitas');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus fasilitas</div>');
        redirect('admin/fasilitas');
    }
}
