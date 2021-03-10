<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ekstrakurikuler extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data = [
            'title'         => 'Ekstrakurikuler Sekolah',
            'user'          => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'eskul'         => $this->db->query("SELECT * FROM tb_eskul ts JOIN tb_program_pendidikan tp ON ts.id_program = tp.id_program ORDER BY id_eskul DESC")->result_array(),
            'program'       => $this->db->query("SELECT * FROM tb_program_pendidikan WHERE id_program BETWEEN 1 AND 2")->result_array()
        ];
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('admin/ekstrakurikuler/index', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function detail_ekstrakurikuler($id_eskul)
    {
        $data = [
            'title' => 'Detail Ekstrakurikuler',
            'user'  => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'eskul' => $this->db->query("SELECT * FROM tb_eskul ts JOIN tb_program_pendidikan tp ON ts.id_program = tp.id_program WHERE id_eskul = '$id_eskul'")->row_array()
        ];
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('admin/ekstrakurikuler/detail_ekstrakurikuler', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function tambah_eskul()
    {

        $foto = $_FILES['foto'];
        if ($foto = '') {
        } else {
            $config['upload_path']        = './assets/admin/img/eskul/';
            $config['allowed_types']    = 'jpg|png|gif|jpeg|JPEG';
            $config['max_size']            = '2048';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Upload gagal, periksa kembali foto yang anda upload!</div>');
                redirect('admin/ekstrakurikuler/');
            }
        }
        $data = [
            'id_program'  => $this->input->post('id_program', true),
            'nama_eskul'  => $this->input->post('nama_eskul', true),
            'foto'       => $foto,
            'keterangan'  => $this->input->post('keterangan', true)
        ];

        $this->db->insert('tb_eskul', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan eskul baru</div>');
        redirect('admin/ekstrakurikuler/');
    }

    public function edit_eskul($id_eskul)
    {

        $id_program     = $this->input->post('id_program');
        $nama_eskul     = $this->input->post('nama_eskul');
        $keterangan     = $this->input->post('keterangan');

        $foto = $_FILES['foto'];
        if ($foto = '') {
        } else {
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/admin/img/eskul/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $old_foto = $data['eskul']['foto'];
                if ($old_foto != 'default.jpg') {
                    unlink(FCPATH . 'assets/admin/img/eskul/' . $old_foto);
                }

                $new_foto = $this->upload->data('file_name');
                $this->db->set('foto', $new_foto);
            } else {
                echo $this->upload->display_errors('foto');
            }
        }

        $this->db->set('id_program', $id_program);
        $this->db->set('nama_eskul', $nama_eskul);
        $this->db->set('keterangan', $keterangan);
        $this->db->where('id_eskul', $id_eskul);
        $this->db->update('tb_eskul');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengedit eskul</div>');
        redirect('admin/ekstrakurikuler/');
    }

    public function hapus_eskul($id_eskul)
    {
        $this->db->where('id_eskul', $id_eskul);
        $this->db->delete('tb_eskul');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus eskul</div>');
        redirect('admin/ekstrakurikuler');
    }
}
