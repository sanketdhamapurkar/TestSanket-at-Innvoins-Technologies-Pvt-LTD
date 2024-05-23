<?php
class Users_api extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
      
    }

    public function index() {
        $users = $this->User_model->get_users();
        echo json_encode($users);
    }

    public function view($id) {
        $user = $this->User_model->get_users($id);
        if (empty($user)) {
            show_404();
        }
        echo json_encode($user);
    }

    public function create() {
        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password'))
        );
        if ($this->User_model->insert_user($data)) {
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'failure'));
        }
    }

    public function update($id) {
        parse_str(file_get_contents("php://input"), $put_vars);
        $data = array(
            'username' => $put_vars['username'],
            'email' => $put_vars['email'],
            'password' => md5($put_vars['password'])
        );
        if ($this->User_model->update_user($id, $data)) {
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'failure'));
        }
    }

    public function delete($id) {
        parse_str(file_get_contents("php://input"), $delete_vars);
        if ($this->User_model->delete_user($id)) {
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'failure'));
        }
    }
}
