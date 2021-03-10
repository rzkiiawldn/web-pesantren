<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

    public function sejarah()
    {
        $data = [
            'title'         => 'Sejarah Singkat',
            'informasi'     => $this->db->query("SELECT * FROM tb_informasi_website WHERE id_program = 1")->row_array(),
            'profil'        => $this->db->query("SELECT * FROM tb_profil WHERE id_program = 1")->result_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('ponpes/profil/sejarah', $data);
        $this->load->view('templates/footer', $data);
    }

    public function visi_misi()
    {
        $data = [
            'title'         => 'Visi dan Misi',
            'informasi'     => $this->db->query("SELECT * FROM tb_informasi_website WHERE id_program = 1")->row_array(),
            'profil'        => $this->db->query("SELECT * FROM tb_profil WHERE id_program = 1")->result_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('ponpes/profil/visi_misi', $data);
        $this->load->view('templates/footer', $data);
    }
    public function profil_pengasuh()
    {
        $data = [
            'title'         => 'Profil Pengasuh',
            'informasi'     => $this->db->query("SELECT * FROM tb_informasi_website WHERE id_program = 1")->row_array(),
            'profil'        => $this->db->query("SELECT * FROM tb_profil WHERE id_program = 1")->result_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('ponpes/profil/profil_pengasuh', $data);
        $this->load->view('templates/footer', $data);
    }
    public function struktur()
    {
        $data = [
            'title'         => 'Struktur Organisasi',
            'informasi'     => $this->db->query("SELECT * FROM tb_informasi_website WHERE id_program = 1")->row_array(),
            'profil'        => $this->db->query("SELECT * FROM tb_profil WHERE id_program = 1")->result_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('ponpes/profil/struktur', $data);
        $this->load->view('templates/footer', $data);
    }
}
