<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Program_pendidikan extends CI_Controller
{

    public function index($id_program)
    {
        $data = [
            'title'     => 'Program Pendidikan Asshiddiqiyah 10',
            'informasi' => $this->M_informasi_web->getInformasiById($id_program)->row_array(),
            'galeri'    => $this->db->query("SELECT * FROM tb_galeri WHERE id_program = $id_program LIMIT 4")->result_array(),
            'slider'    => $this->M_informasi_web->getAllSlider()->result_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('ponpes/program_pendidikan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function galeri($id_program)
    {
        $data = [
            'title'     => 'Galeri',
            'informasi' => $this->M_informasi_web->getInformasiById($id_program)->row_array(),
            'galeri'    => $this->M_informasi_web->getGaleriById($id_program)->result_array(),
            'slider'    => $this->M_informasi_web->getAllSlider()->result_array()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('ponpes/galeri_pendidikan', $data);
        $this->load->view('templates/footer', $data);
    }
}
