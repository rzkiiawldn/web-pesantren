<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{

    public function index()
    {
        $data = [
            'title'         => 'Berita',
            'informasi'     => $this->db->query("SELECT * FROM tb_informasi_website WHERE id_program = 1")->row_array(),
            'berita'        => $this->db->query("SELECT * FROM tb_berita tb JOIN tb_kategori_berita tk ON tb.id_kategori = tk.id_kategori AND tampilkan_berita = 1 ORDER BY id_berita DESC")->result_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('ponpes/berita', $data);
        $this->load->view('templates/footer', $data);
    }

    public function lihat_berita($id_berita)
    {
        $data = [
            'title'         => 'Detail Berita',
            'informasi'     => $this->db->query("SELECT * FROM tb_informasi_website WHERE id_program = 1")->row_array(),
            'berita'        => $this->db->query("SELECT * FROM tb_berita tb JOIN tb_kategori_berita tk ON tb.id_kategori = tk.id_kategori WHERE id_berita = '$id_berita' AND tampilkan_berita = 1")->row_array(),
            'berita_berita' => $this->db->query("SELECT * FROM tb_berita tb JOIN tb_kategori_berita tk ON tb.id_kategori = tk.id_kategori WHERE id_program = 1 AND tampilkan_berita = 1 ORDER BY id_berita DESC LIMIT 5")->result_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('ponpes/detail_berita', $data);
        $this->load->view('templates/footer', $data);

        $id_berita = $id_berita;

        $this->db->query("UPDATE tb_berita SET views = views+1 WHERE id_berita = $id_berita ");
    }
}
