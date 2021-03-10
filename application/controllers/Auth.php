<?php
class Auth extends CI_Controller
{

    public function login()
    {
        if ($this->session->userdata('username')) {
            redirect('user');
        }
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title']    = 'Halaman Login';
            $this->load->view('templates/admin_header', $data);
            $this->load->view('auth/login', $data);
            $this->load->view('templates/admin_footer');
        } else {
            // validasi success
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tb_user', ['username' => $username])->row_array();


        // jika usernya ada
        if ($user) {
            // cek password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'nama'            => $user['nama'],
                    'username'        => $user['username'],
                    'password'        => $user['password']
                ];
                $this->session->set_userdata($data);
                $this->session->set_flashdata('message', '<div id="alert" class="alert alert-success" role="alert">Selamat datang ' . $user['nama_siswa'] . ', semoga harimu menyenangkan</div>');
                redirect('admin/beranda/');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak ditemukan!</div>');
            redirect('auth/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logout</div>');
        redirect('welcome');
    }
}
