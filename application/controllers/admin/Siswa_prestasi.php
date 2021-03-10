<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_prestasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data = [
            'title'             => 'Siswa berprestasi',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'prestasi'          => $this->db->query("SELECT * FROM tb_prestasi ts JOIN tb_program_pendidikan tp ON ts.id_program = tp.id_program ORDER BY id_prestasi DESC")->result_array(),
            'program'           => $this->db->query("SELECT * FROM tb_program_pendidikan WHERE id_program BETWEEN 1 AND 2")->result_array(),
            'jenis_prestasi'    => ['akademik', 'non akademik']
        ];
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('admin/siswa_prestasi/index', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function detail_prestasi($id_prestasi)
    {
        $data = [
            'title' => 'Detail Program Pendidikan',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'prestasi' => $this->db->query("SELECT * FROM tb_prestasi ts JOIN tb_program_pendidikan tp ON ts.id_program = tp.id_program WHERE id_prestasi = '$id_prestasi'")->row_array()
        ];
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('admin/siswa_prestasi/detail_prestasi', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function tambah_prestasi()
    {

        $foto = $_FILES['foto'];
        if ($foto = '') {
        } else {
            $config['upload_path']        = './assets/admin/img/siswa_prestasi/';
            $config['allowed_types']    = 'jpg|png|gif|jpeg|JPEG';
            $config['max_size']            = '2048';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Upload gagal, periksa kembali foto yang anda upload!</div>');
                redirect('admin/siswa_prestasi/');
            }
        }
        $data = [
            'id_program'        => $this->input->post('id_program', true),
            'judul_prestasi'    => $this->input->post('judul_prestasi', true),
            'jenis_prestasi'    => $this->input->post('jenis_prestasi', true),
            'nama_siswa'        => $this->input->post('nama_siswa', true),
            'foto'              => $foto,
            'keterangan'        => $this->input->post('keterangan', true)
        ];

        $this->db->insert('tb_prestasi', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan prestasi baru</div>');
        redirect('admin/siswa_prestasi/');
    }

    public function edit_prestasi($id_prestasi)
    {

        $id_program         = $this->input->post('id_program');
        $judul_prestasi     = $this->input->post('judul_prestasi');
        $jenis_prestasi     = $this->input->post('jenis_prestasi');
        $nama_siswa         = $this->input->post('nama_siswa');
        $keterangan         = $this->input->post('keterangan');

        $foto = $_FILES['foto'];
        if ($foto = '') {
        } else {
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/admin/img/siswa_prestasi/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $old_foto = $data['prestasi']['foto'];
                if ($old_foto != 'default.jpg') {
                    unlink(FCPATH . 'assets/admin/img/siswa_prestasi/' . $old_foto);
                }

                $new_foto = $this->upload->data('file_name');
                $this->db->set('foto', $new_foto);
            } else {
                echo $this->upload->display_errors('foto');
            }
        }

        $this->db->set('id_program', $id_program);
        $this->db->set('judul_prestasi', $judul_prestasi);
        $this->db->set('jenis_prestasi', $jenis_prestasi);
        $this->db->set('nama_siswa', $nama_siswa);
        $this->db->set('keterangan', $keterangan);
        $this->db->where('id_prestasi', $id_prestasi);
        $this->db->update('tb_prestasi');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengedit prestasi</div>');
        redirect('admin/siswa_prestasi/');
    }

    public function hapus_prestasi($id_prestasi)
    {
        $this->db->where('id_prestasi', $id_prestasi);
        $this->db->delete('tb_prestasi');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus prestasi</div>');
        redirect('admin/siswa_prestasi');
    }
}
