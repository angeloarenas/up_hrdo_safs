<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_login_model extends CI_Model
{
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }
     //get the username & password from tbl_usrs
     function get_admin($usr, $pwd)
     {
          $this->db->select('*');
          $this->db->from('admin_login');
          $this->db->where('adminnumber', $usr);
          $this->db->where('password', hash("sha256",$pwd));
          $query = $this->db->get();
          return $query->num_rows();
     }

     function add_admin($adminnumber, $password, $first, $middle, $last)
     {
         $data = array(
           'adminnumber' => $adminnumber,
           'password' => hash("sha256",$password),
           'firstname' => $first,
           'middleinitial' => $middle,
           'lastname' => $last
         );
         $this->db->insert('admin_login', $data);
     }

     function delete_admin($adminnumber)
     {
         $this->db->delete('admin_login', array('adminnumber' => $adminnumber));
     }

     function change_password($username, $password_curr, $password_new)
     {
          $data = array(
            'password' => hash("sha256",$password_new)
          );
          $this->db->where('adminnumber', $username);
          $this->db->where('password', hash("sha256",$password_curr));
          $this->db->update('admin_login', $data);
     }
}?>
