<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data = [
            'title' => 'Profil Sekolah',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'profil' => $this->db->query("SELECT * FROM tb_profil ts JOIN tb_program_pendidikan tp ON ts.id_program = tp.id_program")->result_array(),
            'program'   => $this->db->query("SELECT * FROM tb_program_pendidikan WHERE id_program BETWEEN 1 AND 2")->result_array()
        ];
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('admin/profil/index', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function detail_profil($id)
    {
        $data = [
            'title' => 'Detail Program Pendidikan',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'profil' => $this->db->query("SELECT * FROM tb_profil ts JOIN tb_program_pendidikan tp ON ts.id_program = tp.id_program WHERE id = '$id'")->row_array()
        ];
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('admin/profil/detail_profil', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function tambah_profil()
    {
        $this->form_validation->set_rules('sejarah', 'Sejarah Singkat', 'required');
        $this->form_validation->set_rules('visi', 'Visi', 'required');
        $this->form_validation->set_rules('misi', 'Misi', 'required');
        $this->form_validation->set_rules('profil_pengasuh', 'Profil Pengasuh', 'required');

        if ($this->form_validation->run() == false) {
            $data = [
                'title'     => 'Tambah Profil',
                'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
                'program'   => $this->db->query("SELECT * FROM tb_program_pendidikan WHERE id_program BETWEEN 1 AND 2")->result_array()
            ];
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('admin/profil/tambah_profil', $data);
            $this->load->view('templates/admin_footer', $data);
        } else {

            $struktur_organisasi = $_FILES['struktur_organisasi'];
            if ($struktur_organisasi = '') {
            } else {
                $config['upload_path']        = './assets/admin/img/profil/';
                $config['allowed_types']    = 'jpg|png|gif|jpeg|JPEG';
                $config['max_size']            = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('struktur_organisasi')) {
                    $struktur_organisasi = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Upload gagal, periksa kembali struktur_organisasi yang anda upload!</div>');
                    redirect('admin/profil/');
                }
            }

            $foto_pengasuh = $_FILES['foto_pengasuh'];
            if ($foto_pengasuh = '') {
            } else {
                $config['upload_path']        = './assets/admin/img/profil/';
                $config['allowed_types']    = 'jpg|png|gif|jpeg|JPEG';
                $config['max_size']            = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto_pengasuh')) {
                    $foto_pengasuh = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Upload gagal, periksa kembali struktur_organisasi yang anda upload!</div>');
                    redirect('admin/profil/');
                }
            }
            $data = [
                'id_program'                => $this->input->post('id_program', true),
                'sejarah'                   => $this->input->post('sejarah', true),
                'profil_pengasuh'           => $this->input->post('profil_pengasuh', true),
                'foto_pengasuh'             => $foto_pengasuh,
                'visi'                      => $this->input->post('visi', true),
                'misi'                      => $this->input->post('misi', true),
                'struktur_organisasi'       => $struktur_organisasi
            ];

            $this->db->insert('tb_profil', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan profil baru</div>');
            redirect('admin/profil/');
        }
    }

    public function edit_profil($id)
    {

        $this->form_validation->set_rules('sejarah', 'Sejarah Singkat', 'required');
        $this->form_validation->set_rules('visi', 'Visi', 'required');
        $this->form_validation->set_rules('misi', 'Misi', 'required');
        $this->form_validation->set_rules('profil_pengasuh', 'Profil Pengasuh', 'required');

        if ($this->form_validation->run() == false) {
            $data = [
                'title'     => 'Edit Profil',
                'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
                'profil'    => $this->db->query("SELECT * FROM tb_profil WHERE id = '$id'")->row_array(),
                'program'   => $this->db->query("SELECT * FROM tb_program_pendidikan WHERE id_program BETWEEN 1 AND 2")->result_array()
            ];
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('admin/profil/edit_profil', $data);
            $this->load->view('templates/admin_footer', $data);
        } else {

            $id_program         = $this->input->post('id_program');
            $sejarah            = $this->input->post('sejarah');
            $profil_pengasuh    = $this->input->post('profil_pengasuh');
            $visi               = $this->input->post('visi');
            $misi               = $this->input->post('misi');

            $struktur_organisasi = $_FILES['struktur_organisasi'];
            if ($struktur_organisasi = '') {
            } else {
                $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/admin/img/profil/';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('struktur_organisasi')) {
                    $old_struktur_organisasi = $data['profil']['struktur_organisasi'];
                    if ($old_struktur_organisasi != 'default.jpg') {
                        unlink(FCPATH . 'assets/admin/img/profil/' . $old_struktur_organisasi);
                    }

                    $new_struktur_organisasi = $this->upload->data('file_name');
                    $this->db->set('struktur_organisasi', $new_struktur_organisasi);
                } else {
                    echo $this->upload->display_errors('struktur_organisasi');
                }
            }

            $foto_pengasuh = $_FILES['foto_pengasuh'];
            if ($foto_pengasuh = '') {
            } else {
                $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/admin/img/profil/';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto_pengasuh')) {
                    $old_struktur_organisasi = $data['profil']['foto_pengasuh'];
                    if ($old_struktur_organisasi != 'default.jpg') {
                        unlink(FCPATH . 'assets/admin/img/profil/' . $old_struktur_organisasi);
                    }

                    $new_struktur_organisasi = $this->upload->data('file_name');
                    $this->db->set('foto_pengasuh', $new_struktur_organisasi);
                } else {
                    echo $this->upload->display_errors('foto_pengasuh');
                }
            }

            $this->db->set('id_program', $id_program);
            $this->db->set('sejarah', $sejarah);
            $this->db->set('profil_pengasuh', $profil_pengasuh);
            $this->db->set('visi', $visi);
            $this->db->set('misi', $misi);
            $this->db->where('id', $id);
            $this->db->update('tb_profil');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengedit program pendidikan</div>');
            redirect('admin/profil/');
        }
    }

    public function hapus_profil($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_profil');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus program pendidikan</div>');
        redirect('admin/profil');
    }
}
