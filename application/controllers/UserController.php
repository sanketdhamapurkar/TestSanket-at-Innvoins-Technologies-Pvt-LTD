<?php
class UserController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }
    
    public function index() {
        $data['users'] = $this->User_model->get_users();
       
        $this->load->view('user_list', $data);
    }

    public function add_user() {
        $this->load->view('add_edit_user');
    }

    public function insert_user() {
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email')
        );
        $this->User_model->insert_user($data);
        redirect('UserController');
    }

    public function edit_user($id) {
        $data['user'] = $this->User_model->get_users($id);
        $this->load->view('add_edit_user', $data);
    }

    public function update_user() {
        $id = $this->input->post('id');
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email')
        );
        $this->User_model->update_user($id, $data);
        redirect('UserController');
    }

    public function delete_user($id) {
        $this->User_model->delete_user($id);
        redirect('UserController');
    }
}
