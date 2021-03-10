<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sambutan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data = [
            'title'     => 'Sambutan-sambutan',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'sambutan'  => $this->db->query("SELECT * FROM tb_sambutan ts JOIN tb_program_pendidikan tp ON ts.id_program = tp.id_program")->result_array(),
            'program'   => $this->db->query("SELECT * FROM tb_program_pendidikan WHERE id_program BETWEEN 1 AND 2")->result_array()
        ];
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('admin/sambutan/index', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function detail_sambutan($id_sambutan)
    {
        $data = [
            'title' => 'Detail Program Pendidikan',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'sambutan' => $this->db->query("SELECT * FROM tb_sambutan ts JOIN tb_program_pendidikan tp ON ts.id_program = tp.id_program WHERE id_sambutan = '$id_sambutan'")->row_array()
        ];
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('admin/sambutan/detail_sambutan', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function tambah_sambutan()
    {

        $foto = $_FILES['foto'];
        if ($foto = '') {
        } else {
            $config['upload_path']        = './assets/admin/img/sambutan/';
            $config['allowed_types']    = 'jpg|png|gif|jpeg|JPEG';
            $config['max_size']            = '2048';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Upload gagal, periksa kembali foto yang anda upload!</div>');
                redirect('admin/sambutan/');
            }
        }
        $data = [
            'id_program'        => $this->input->post('id_program', true),
            'foto'              => $foto,
            'isi_sambutan'      => $this->input->post('isi_sambutan', true)
        ];

        $this->db->insert('tb_sambutan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan sambutan baru</div>');
        redirect('admin/sambutan/');
    }

    public function edit_sambutan($id_sambutan)
    {
        $id_program             = $this->input->post('id_program');
        $isi_sambutan           = $this->input->post('isi_sambutan');

        $foto = $_FILES['foto'];
        if ($foto = '') {
        } else {
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/admin/img/sambutan/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $old_foto = $data['sambutan']['foto'];
                if ($old_foto != 'default.jpg') {
                    unlink(FCPATH . 'assets/admin/img/sambutan/' . $old_foto);
                }

                $new_foto = $this->upload->data('file_name');
                $this->db->set('foto', $new_foto);
            } else {
                echo $this->upload->display_errors('foto');
            }
        }

        $this->db->set('id_program', $id_program);
        $this->db->set('isi_sambutan', $isi_sambutan);
        $this->db->where('id_sambutan', $id_sambutan);
        $this->db->update('tb_sambutan');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengedit program pendidikan</div>');
        redirect('admin/sambutan/');
    }

    public function hapus_sambutan($id_sambutan)
    {
        $this->db->where('id_sambutan', $id_sambutan);
        $this->db->delete('tb_sambutan');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus program pendidikan</div>');
        redirect('admin/sambutan');
    }
}
