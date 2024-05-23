<?php
class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
    }

    public function register()
    {
        $this->load->view('register');
    }

    public function register_user()
    {
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
        );
        $this->User_model->insert_user($data);
        redirect('task2/auth/login');
    }

    public function login()
    {
        $this->load->view('login');
    }

    public function login_user()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $user = $this->User_model->verify_user($username, $password);
        print_r($this->db->last_query());
        if ($user) {
            $this->session->set_userdata('user_id', $user['id']);
            redirect('UserController');
        } else {
            $this->session->set_flashdata('error', 'Invalid username or password');
            redirect('task2/auth/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user_id');
        redirect('task2/auth/login');
    }

    public function forgot_password()
    {
        $this->load->view('forgot_password');
    }

    public function reset_password()
    {
        $email = $this->input->post('email');

        $user = $this->User_model->get_user_by_email($email);
        if ($user) {
            $this->load->view('enter_token',['email' => $email]);
        } else {
            $this->session->set_flashdata('error', 'This email does not exits');
            redirect('task2/auth/forgot_password');
        }
    }

   

    public function verify_token()
    {
        $email = $this->input->post('email');
        $token = $this->input->post('token');
        $reset_data = $this->User_model->verify_reset_token($email, $token);
        if ($reset_data) {
            $this->load->view('reset_password', ['email' => $email]);
        } else {
            $this->session->set_flashdata('error', 'Invalid token');
            redirect('task2/auth/enter_token');
        }
    }

    public function update_password()
    {
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $this->User_model->update_password($email, $password);
        redirect('task2/auth/login');
    }
}
