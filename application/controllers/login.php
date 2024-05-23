<?php
defined('BASEPATH') or exit('No direct script access allowed');

class login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
      
        $this->load->model('Login_model', 'login');
    }
    public function index()
    {
        if ($this->session->userdata('loggedIn') == 'TRUE') {
            redirect(ADMIN_DASHBOARD);
        };
        $this->load->view('login');
    // }
    // public function login()
    // {

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == true) {

            $data['username'] = $username = $this->input->post('username');
            $data['password'] = $password = $this->input->post('password');

            $user = $this->login->authenticate($username, $password);
            if (isset($user) && !empty($user)) {
                $name = $user['name'];

                $this->session->set_userdata('loggedIn', TRUE);
                $this->session->set_userdata('user_id', $user['id']);
                $this->session->set_flashdata('success', 'Welcome '.$name);
                redirect(ADMIN_DASHBOARD);
            } else {
                $this->session->set_flashdata('error', 'This is my message');
                $this->load->view('login', $data);
            }
        } else {
            $this->session->set_flashdata('error', '');
            $this->load->view('login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(LOGIN, 'refresh');
    }
}
