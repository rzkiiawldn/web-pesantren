<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi_web extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data = [
            'title'         => 'Informasi Web',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'informasi'     => $this->db->query("SELECT * FROM tb_informasi_website ts JOIN tb_program_pendidikan tp ON ts.id_program = tp.id_program")->result_array(),
            'program'       => $this->db->query("SELECT * FROM tb_program_pendidikan ")->result_array()
        ];
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('admin/informasi_web/informasi', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function detail_informasi($id)
    {
        $data = [
            'title' => 'Detail Program Pendidikan',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'informasi' => $this->db->query("SELECT * FROM tb_informasi_website ts JOIN tb_program_pendidikan tp ON ts.id_program = tp.id_program WHERE id = '$id'")->row_array()
        ];
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('admin/informasi_web/detail_informasi', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function tambah_informasi()
    {

        $logo_website = $_FILES['logo_website'];
        if ($logo_website = '') {
        } else {
            $config['upload_path']        = './assets/admin/img/informasi_web/';
            $config['allowed_types']    = 'jpg|png|gif|jpeg|JPEG';
            $config['max_size']            = '2048';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('logo_website')) {
                $logo_website = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Upload gagal, periksa kembali logo website yang anda upload!</div>');
                redirect('admin/informasi_web/');
            }
        }

        $background = $_FILES['background'];
        if ($background = '') {
        } else {
            $config['upload_path']        = './assets/admin/img/informasi_web/';
            $config['allowed_types']    = 'jpg|png|gif|jpeg|JPEG';
            $config['max_size']            = '2048';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('background')) {
                $background = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Upload gagal, periksa kembali logo website yang anda upload!</div>');
                redirect('admin/informasi_web/');
            }
        }
        $data = [
            'id_program'        => $this->input->post('id_program', true),
            'nama_website'      => $this->input->post('nama_website', true),
            'logo_website'      => $logo_website,
            'moto'              => $this->input->post('moto', true),
            'email'             => $this->input->post('email', true),
            'nomor_telepon'     => $this->input->post('nomor_telepon', true),
            'nomor_whatsapp'    => $this->input->post('nomor_whatsapp', true),
            'alamat'            => $this->input->post('alamat', true),
            'background'        => $background
        ];

        $this->db->insert('tb_informasi_website', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan Informasi baru</div>');
        redirect('admin/informasi_web/');
    }

    public function edit_informasi($id)
    {
        $data = [
            'informasi'    => $this->db->query("SELECT * FROM tb_informasi_website")->result_array()
        ];
        $id_program         = $this->input->post('id_program');
        $nama_website       = $this->input->post('nama_website');
        $moto               = $this->input->post('moto');
        $email              = $this->input->post('email');
        $alamat             = $this->input->post('alamat');
        $nomor_telepon      = $this->input->post('nomor_telepon');
        $nomor_whatsapp     = $this->input->post('nomor_whatsapp');

        $logo_website = $_FILES['logo_website'];
        if ($logo_website = '') {
        } else {
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/admin/img/informasi_web/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('logo_website')) {
                $old_logo_website = $data['tb_informasi_website']['logo_website'];
                if ($old_logo_website != 'default.jpg') {
                    unlink(FCPATH . 'assets/admin/img/informasi_web/' . $old_logo_website);
                }

                $new_logo_website = $this->upload->data('file_name');
                $this->db->set('logo_website', $new_logo_website);
            } else {
                echo $this->upload->display_errors('logo_website');
            }
        }
        $background = $_FILES['background'];
        if ($background = '') {
        } else {
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/admin/img/informasi_web/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('background')) {
                $old_background = $data['tb_informasi_website']['background'];
                if ($old_background != 'default.jpg') {
                    unlink(FCPATH . 'assets/admin/img/informasi_web/' . $old_background);
                }

                $new_background = $this->upload->data('file_name');
                $this->db->set('background', $new_background);
            } else {
                echo $this->upload->display_errors('background');
            }
        }

        $this->db->set('id_program', $id_program);
        $this->db->set('nama_website', $nama_website);
        $this->db->set('moto', $moto);
        $this->db->set('email', $email);
        $this->db->set('alamat', $alamat);
        $this->db->set('nomor_telepon', $nomor_telepon);
        $this->db->set('nomor_whatsapp', $nomor_whatsapp);
        $this->db->where('id', $id);
        $this->db->update('tb_informasi_website');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengedit informasi website anda</div>');
        redirect('admin/informasi_web/');
    }

    public function slider()
    {
        $data = [
            'title'     => 'Slider Sekolah',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'slider'    => $this->db->query("SELECT * FROM tb_slider ts JOIN tb_program_pendidikan tp ON ts.id_program = tp.id_program ORDER BY id_slider DESC")->result_array(),
            'program'   => $this->db->query("SELECT * FROM tb_program_pendidikan WHERE id_program BETWEEN 1 AND 2")->result_array()
        ];

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('admin/informasi_web/slider', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function tambah_slider()
    {
        $id_program     = $this->input->post('id_program');
        $foto = $_FILES['foto'];
        if ($foto = '') {
        } else {
            $config['upload_path']        = './assets/admin/img/slider/';
            $config['allowed_types']    = 'jpg|png|gif|jpeg|JPEG';
            $config['max_size']            = '2048';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Upload gagal, periksa kembali foto yang anda upload!</div>');
                redirect('admin/informasi_web/slider');
            }
        }
        $data = [
            'id_program' => $id_program,
            'foto'       => $foto
        ];

        $this->db->insert('tb_slider', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan slider baru</div>');
        redirect('admin/informasi_web/slider');
    }

    public function edit_slider($id_slider)
    {
        $id_program   = $this->input->post('id_program');

        $foto = $_FILES['foto'];
        if ($foto = '') {
        } else {
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/admin/img/slider/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $old_foto = $data['slider']['foto'];
                if ($old_foto != 'default.jpg') {
                    unlink(FCPATH . 'assets/admin/img/slider/' . $old_foto);
                }

                $new_foto = $this->upload->data('file_name');
                $this->db->set('foto', $new_foto);
            } else {
                echo $this->upload->display_errors('foto');
            }
        }

        $this->db->set('id_program', $id_program);
        $this->db->where('id_slider', $id_slider);
        $this->db->update('tb_slider');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengedit slider</div>');
        redirect('admin/informasi_web/slider');
    }

    public function hapus_slider($id_slider)
    {
        $this->db->where('id_slider', $id_slider);
        $this->db->delete('tb_slider');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus slider</div>');
        redirect('admin/informasi_web/slider');
    }
}
