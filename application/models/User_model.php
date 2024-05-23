<?php
class User_model extends CI_Model {
    
 
    
    public function insert_user($data) {
        return $this->db->insert('users', $data);
    }

    public function get_users($id = 0) {
        $query = $this->db->get('users');
        if($id > 0){
            $this->db->where('id', $id);

        return $query->row_array();
        }else{
            return $query->result_array();

        }
    }

    public function update_user($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    public function delete_user($id) {
        $this->db->where('id', $id);
        return $this->db->delete('users');
    }

    public function get_user_by_email($email) {
        $this->db->where('email', $email);
        $this->db->or_where('name', $email);
        $query = $this->db->get('users');
        return $query->row_array();
    }
  
 

    public function verify_user($username, $password) {

        $this->db->where('password', $password);
        $this->db->where('email', $username);
        $this->db->or_where('name', $username);
        $query = $this->db->get('users');
        $user =  $query->row_array();

        if ($user) {
            return $user;
        }
        return false;
    }

  

    public function verify_reset_token($email, $token) {
        $user =  $this->db->where('email', $email);
        if ($user && $token == 1111) {
            return $user;
        }
        return false;
    }

    public function update_password($email, $password) {
        $this->db->where('email', $email);
        return $this->db->update('users', array('password' => $password));
    }
}

