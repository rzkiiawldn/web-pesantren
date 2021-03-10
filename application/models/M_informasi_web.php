<?php

class M_informasi_web extends CI_Model
{
    public function getAllInformasi()
    {
        return $this->db->get('tb_informasi_website');
    }

    public function getInformasiById($id_program)
    {
        $this->db->join('tb_program_pendidikan tp', 'ti.id_program = tp.id_program');
        return $this->db->get_where('tb_informasi_website ti', ['ti.id_program' => $id_program]);
    }

    public function getGaleriById($id_program)
    {
        $this->db->join('tb_program_pendidikan tp', 'ti.id_program = tp.id_program');
        return $this->db->get_where('tb_galeri ti', ['ti.id_program' => $id_program]);
    }

    public function getAllSlider()
    {
        return $this->db->get('tb_slider');
    }
}
