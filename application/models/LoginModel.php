<?php
class LoginModel extends CI_Model{
 
  public function validate($username, $password){
    $this->db->where('username', $username);
    $this->db->where('password', $password);
    $result = $this->db->get('tbl_user');
    return $result;
  }
 
}