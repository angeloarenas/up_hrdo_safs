<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model
{
     function __construct()
     {
          parent::__construct();
     }

     function get_applications()
     {
           $this->db->select('*');
           $this->db->from('transactions');
           $this->db->where('applicationdate >= CURDATE()');
           $query = $this->db->get();
           $application_list = $query->result_array();
           return $application_list;
     }

     function insert_application($data)
     {
          $this->db->insert('transactions', $data);
     }

     function update_application($originaltransactionnumber, $data)
     {
       $this->db->where('transactionnumber', $originaltransactionnumber);
       $this->db->update('transactions', $data);
     }

     function delete_application($transactionnumber)
     {
          $this->db->delete('transactions', array('transactionnumber' => $transactionnumber));
     }

     function is_application($transactionnumber)
     {
       $this->db->select('*');
       $this->db->from('transactions');
       $this->db->where('transactionnumber', $transactionnumber);
       $this->db->where('applicationdate >= CURDATE()');
       $query = $this->db->get();
       if ($query->num_rows() == 0)
       {
           return False;
       }
       else
       {
           return True;
       }
     }

     function get_admin($adminnumber)
     {
          $this->db->select('*');
          $this->db->from('admin_login');
          $this->db->where('adminnumber', $adminnumber);
          $query = $this->db->get();
          $t = $query->result_array();
          $admin_data = $t[0];
          return $admin_data;
     }

     function get_employeelist()
     {
         $this->db->select('*');
         $this->db->from('employees');
         $query = $this->db->get();
         $faculty_list = $query->result_array();
         return $faculty_list;
     }

     function get_employee($employeenumber)
     {
         $this->db->select('*');
         $this->db->from('employees');
         $this->db->where('employeenumber', $employeenumber);
         $query = $this->db->get();
         $e = $query->result_array();
         $faculty_data = $e[0];
         return $faculty_data;
     }

     function get_contacts($employeenumber)
     {
         $this->db->select('*');
         $this->db->from('contact_sureties');
         $this->db->where('employeenumber', $employeenumber);
         $query = $this->db->get();
         $contacts_list = $query->result_array();
         return $contacts_list;
     }

     function get_employee_transactions($employeenumber)
     {
         $this->db->select('*');
         $this->db->from('transactions');
         $this->db->where('employeenumber', $employeenumber);
         $this->db->where('applicationdate < CURDATE()');
         $query = $this->db->get();
         $transactions_list = $query->result_array();
         return $transactions_list;
     }

     function insert_employee($data)
     {
         $this->db->insert('employees', $data);
     }

     function insert_contactsurety($cs)
     {
         $this->db->insert('contact_sureties', $cs);
     }

     function delete_contactsureties($employeenumber)
     {
         $this->db->delete('contact_sureties', array('employeenumber' => $employeenumber));
     }

     function update_employee($originalemployeenumber, $employeenumber, $data)
     {
       if($originalemployeenumber != $employeenumber)
       {
         $this->db->query("SET FOREIGN_KEY_CHECKS = 0");
         $this->db->where('employeenumber', $originalemployeenumber);
         $this->db->update('employees', $data);
         $newnumber = array(
           'employeenumber' => $employeenumber
         );
         $this->db->where('employeenumber', $originalemployeenumber);
         $this->db->update('transactions', $newnumber);
         $this->db->query("SET FOREIGN_KEY_CHECKS = 1");
       }
       else
       {
         $this->db->where('employeenumber', $originalemployeenumber);
         $this->db->update('employees', $data);
       }
     }

     function delete_employee($employeenumber)
     {
         $this->db->query("SET FOREIGN_KEY_CHECKS = 0");
         $this->db->delete('employees', array('employeenumber' => $employeenumber));
         $this->db->delete('transactions', array('employeenumber' => $employeenumber));
         $this->db->delete('contact_sureties', array('employeenumber' => $employeenumber));
         $this->db->query("SET FOREIGN_KEY_CHECKS = 1");
     }

  	 function get_transactions()
      {
         $this->db->select('*');
         $this->db->from('transactions');
         $this->db->where('applicationdate < CURDATE()');
         $query = $this->db->get();
         $trans = $query->result_array();
         return $trans;
      }

     function get_transaction_individual($transactionnumber)
      {
         $this->db->select('*');
         $this->db->from('transactions');
         $this->db->where('transactionnumber', $transactionnumber);
         $query = $this->db->get();
         $t = $query->result_array();
         $trans = $t[0];
         return $trans;
      }

      function update_transaction($originaltransactionnumber, $data)
      {
        $this->db->where('transactionnumber', $originaltransactionnumber);
        $this->db->update('transactions', $data);
      }

      function delete_transaction($transactionnumber)
      {
        $this->db->delete('transactions', array('transactionnumber' => $transactionnumber));
      }

}?>
