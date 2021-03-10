<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data = [
            'title' => 'Galeri Sekolah',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'galeri' => $this->db->query("SELECT * FROM tb_galeri ts JOIN tb_program_pendidikan tp ON ts.id_program = tp.id_program ORDER BY id_foto DESC")->result_array(),
            'program'   => $this->db->query("SELECT * FROM tb_program_pendidikan")->result_array()
        ];
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('admin/galeri/index', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function detail_galeri($id_foto)
    {
        $data = [
            'title' => 'Detail Program Pendidikan',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'galeri' => $this->db->query("SELECT * FROM tb_galeri ts JOIN tb_program_pendidikan tp ON ts.id_program = tp.id_program WHERE id_foto = '$id_foto'")->row_array()
        ];
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('admin/galeri/detail_galeri', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function tambah_galeri()
    {

        $foto = $_FILES['foto'];
        if ($foto = '') {
        } else {
            $config['upload_path']        = './assets/admin/img/galeri/';
            $config['allowed_types']    = 'jpg|png|gif|jpeg|JPEG';
            $config['max_size']            = '2048';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Upload gagal, periksa kembali foto yang anda upload!</div>');
                redirect('admin/galeri/');
            }
        }
        $data = [
            'id_program'  => $this->input->post('id_program', true),
            'foto'       => $foto,
            'keterangan'  => $this->input->post('keterangan', true)
        ];

        $this->db->insert('tb_galeri', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan galeri baru</div>');
        redirect('admin/galeri/');
    }

    public function edit_galeri($id_foto)
    {

        $id_program     = $this->input->post('id_program');
        $keterangan     = $this->input->post('keterangan');

        $foto = $_FILES['foto'];
        if ($foto = '') {
        } else {
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/admin/img/galeri/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $old_foto = $data['galeri']['foto'];
                if ($old_foto != 'default.jpg') {
                    unlink(FCPATH . 'assets/admin/img/galeri/' . $old_foto);
                }

                $new_foto = $this->upload->data('file_name');
                $this->db->set('foto', $new_foto);
            } else {
                echo $this->upload->display_errors('foto');
            }
        }

        $this->db->set('id_program', $id_program);
        $this->db->set('keterangan', $keterangan);
        $this->db->where('id_foto', $id_foto);
        $this->db->update('tb_galeri');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengedit galeri</div>');
        redirect('admin/galeri/');
    }

    public function hapus_galeri($id_foto)
    {
        $this->db->where('id_foto', $id_foto);
        $this->db->delete('tb_galeri');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus galeri</div>');
        redirect('admin/galeri');
    }
}
