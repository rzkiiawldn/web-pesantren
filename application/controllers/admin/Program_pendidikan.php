<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Program_pendidikan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data = [
            'title' => 'Program Pendidikan',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'program' => $this->db->query("SELECT * FROM tb_program_pendidikan")->result_array()
        ];
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('admin/program_pendidikan/index', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function detail_program_pendidikan($id_program)
    {
        $data = [
            'title' => 'Detail Program Pendidikan',
            'user' => $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array(),
            'program' => $this->db->query("SELECT * FROM tb_program_pendidikan ts JOIN tb_program_pendidikan tp ON ts.id_program = tp.id_program WHERE ts.id_program = '$id_program'")->row_array()
        ];
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('admin/program_pendidikan/detail_program_pendidikan', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function tambah_program_pendidikan()
    {

        $logo = $_FILES['logo'];
        if ($logo = '') {
        } else {
            $config['upload_path']        = './assets/admin/img/program_pendidikan/';
            $config['allowed_types']    = 'jpg|png|gif|jpeg|JPEG';
            $config['max_size']            = '2048';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('logo')) {
                $logo = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Upload gagal, periksa kembali logo yang anda upload!</div>');
                redirect('admin/program_pendidikan/');
            }
        }
        $data = [
            'kode'              => $this->input->post('kode', true),
            'nama_pendidikan'    => $this->input->post('nama_pendidikan', true),
            'logo'              => $logo,
            'keterangan_pendidikan'        => $this->input->post('keterangan_pendidikan', true)
        ];

        $this->db->insert('tb_program_pendidikan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menambahkan program pendidikan baru</div>');
        redirect('admin/program_pendidikan/');
    }

    public function edit_program_pendidikan($id_program)
    {

        $kode               = $this->input->post('kode');
        $nama_pendidikan    = $this->input->post('nama_pendidikan');
        $keterangan_pendidikan         = $this->input->post('keterangan_pendidikan');

        $logo = $_FILES['logo'];
        if ($logo = '') {
        } else {
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/admin/img/program_pendidikan/';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('logo')) {
                $old_foto = $data['program_pendidikan']['logo'];
                if ($old_foto != 'default.jpg') {
                    unlink(FCPATH . 'assets/admin/img/program_pendidikan/' . $old_foto);
                }

                $new_foto = $this->upload->data('file_name');
                $this->db->set('logo', $new_foto);
            } else {
                echo $this->upload->display_errors('logo');
            }
        }

        $this->db->set('kode', $kode);
        $this->db->set('nama_pendidikan', $nama_pendidikan);
        $this->db->set('keterangan_pendidikan', $keterangan_pendidikan);
        $this->db->where('id_program', $id_program);
        $this->db->update('tb_program_pendidikan');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil mengedit program pendidikan</div>');
        redirect('admin/program_pendidikan/');
    }

    public function hapus_program_pendidikan($id_program)
    {
        $this->db->where('id_program', $id_program);
        $this->db->delete('tb_program_pendidikan');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! kamu berhasil menghapus program pendidikan</div>');
        redirect('admin/program_pendidikan');
    }
}
