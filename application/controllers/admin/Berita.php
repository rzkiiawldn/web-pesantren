<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function view()
    {
        $data = [
            'title'             => 'Berita Sekolah',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'berita'            => $this->db->query("SELECT * FROM tb_berita tb JOIN tb_kategori_berita tk ON tb.id_kategori = tk.id_kategori ORDER BY id_berita DESC")->result_array(),
            'kategori_berita'   => $this->db->query("SELECT * FROM tb_kategori_berita")->result_array(),
            'program'           => $this->db->query("SELECT * FROM tb_program_pendidikan WHERE id_program BETWEEN 1 AND 2")->result_array()
        ];
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('admin/berita/index', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function detail_berita($id_berita)
    {
        $data = [
            'title' => 'Detail Berita',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'berita' => $this->db->query("SELECT * FROM tb_berita tb JOIN tb_kategori_berita tk ON tb.id_kategori = tk.id_kategori WHERE tb.id_berita = '$id_berita'  ")->row_array()
        ];
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('admin/berita/detail_berita', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function tambah_berita()
    {

        $foto_berita = $_FILES['foto_berita'];
        if ($foto_berita = '') {
        } else {
            $config['upload_path']        = './assets/admin/img/berita/';
            $config['allowed_types']    = 'jpg|png|gif|jpeg|JPEG';
            $config['max_size']            = '2048';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_berita')) {
                $foto_berita = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Upload gagal, periksa kembali foto berita yang anda upload!</div>');
                redirect('admin/berita/view');
            }
        }
        $data = [
            'id_kategori'       => $this->input->post('id_kategori', true),
            'id_program'        => $this->input->post('id_program', true),
            'judul_berita'      => $this->input->post('judul_berita', true),
            'isi_berita'        => $this->input->post('isi_berita', true),
            'foto_berita'       => $foto_berita,
            'tanggal_input'     => date('Y-m-d H:i:s'),
            'pengirim_berita'   => $this->input->post('pengirim_berita', true),
            'tampilkan_berita'  => $this->input->post('tampilkan_berita', true),
            'views'              => 0,
        ];

        $this->db->insert('tb_berita', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan berita baru</div>');
        redirect('admin/berita/view');
    }

    public function edit_berita($id_berita)
    {

        $id_kategori        = $this->input->post('id_kategori');
        $id_program         = $this->input->post('id_program');
        $judul_berita       = $this->input->post('judul_berita');
        $isi_berita         = $this->input->post('isi_berita');
        $pengirim_berita    = $this->input->post('pengirim_berita');
        $tampilkan_berita   = $this->input->post('tampilkan_berita');

        $foto_berita = $_FILES['foto_berita'];
        if ($foto_berita = '') {
        } else {
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/admin/img/berita/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_berita')) {
                $old_foto_berita = $data['berita']['foto_berita'];
                if ($old_foto_berita != 'default.jpg') {
                    unlink(FCPATH . 'assets/admin/img/berita/' . $old_foto_berita);
                }

                $new_foto_berita = $this->upload->data('file_name');
                $this->db->set('foto_berita', $new_foto_berita);
            } else {
                echo $this->upload->display_errors('foto_berita');
            }
        }

        $this->db->set('id_kategori', $id_kategori);
        $this->db->set('id_program', $id_program);
        $this->db->set('judul_berita', $judul_berita);
        $this->db->set('isi_berita', $isi_berita);
        $this->db->set('pengirim_berita', $pengirim_berita);
        $this->db->set('tampilkan_berita', $tampilkan_berita);
        $this->db->where('id_berita', $id_berita);
        $this->db->update('tb_berita');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengedit berita</div>');
        redirect('admin/berita/view');
    }

    public function hapus_berita($id_berita)
    {
        $this->db->where('id_berita', $id_berita);
        $this->db->delete('tb_berita');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus berita</div>');
        redirect('admin/berita/view');
    }

    public function kategori_berita()
    {
        $data = [
            'title' => 'Kategori Berita',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'kategori_berita' => $this->db->query("SELECT * FROM tb_kategori_berita ORDER BY id_kategori DESC")->result_array()
        ];
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('admin/berita/kategori_berita', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function tambah_kategori_berita()
    {

        $data = [
            'kategori'  => $this->input->post('kategori', true)
        ];

        $this->db->insert('tb_kategori_berita', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan kategori berita baru</div>');
        redirect('admin/berita/kategori_berita');
    }

    public function edit_kategori_berita($id_kategori)
    {

        $kategori     = $this->input->post('kategori');

        $this->db->set('kategori', $kategori);
        $this->db->where('id_kategori', $id_kategori);
        $this->db->update('tb_kategori_berita');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengedit kategori berita</div>');
        redirect('admin/berita/kategori_berita');
    }

    public function hapus_kategori_berita($id_kategori)
    {
        $this->db->where('id_kategori', $id_kategori);
        $this->db->delete('tb_kategori_berita');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus kategori berita</div>');
        redirect('admin/berita/kategori_berita');
    }
}
