<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_change_pass extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('session');
    $this->load->helper('security');
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->helper('html');
    $this->load->database();
    $this->load->library('form_validation');
    //load the login model
    $this->load->model('Admin_login_model');
    $this->load->model('Admin_model');
  }

  public function change_password_page()
  {
    if ($this->session->userdata('loginadmin') == TRUE)
    {
    $adminnumber = $this->session->userdata('username');
    $admin_data = $this->Admin_model->get_admin($adminnumber);
    $data = array('admin' => $admin_data);
    $this->load->view('admin_change_password.php', $data);
    }
    else
    {
    redirect('admin_login/index');
    }
  }
   public function index()
  {
    if ($this->session->userdata('loginadmin') == TRUE)
    {
      $adminnumber = $this->session->userdata('username');
      $admin_data = $this->Admin_model->get_admin($adminnumber);
      $data = array('admin' => $admin_data);

      $password_curr = $this->security->xss_clean($this->input->post("password_curr"));
      $password_new = $this->security->xss_clean($this->input->post("password_new"));
      $password_retype = $this->security->xss_clean($this->input->post("password_retype"));

      $this->form_validation->set_rules("password_curr", "Current", "trim|required");
      $this->form_validation->set_rules("password_new", "New", "trim|required");
      $this->form_validation->set_rules("password_retype", "Retype", "trim|required");

      if ($this->form_validation->run() == FALSE)
      {
        $this->load->view('admin_change_password.php', $data);
      }
      else
      {
        if ($this->input->post('btn_save') == "Save")
        {
          $username = $this->session->userdata('username');
          if ($admin_data['password'] == hash("sha256",$password_curr))
          {
            if($password_new == $password_retype)
            {
              $this->Admin_login_model->change_password($username, $password_curr, $password_new);
              $this->session->set_flashdata('msg', '<div class="ui icon positive message "><i class="check icon"></i><div class="content"><div class="header">New Password Successfully Changed!</div></div></div>');
              redirect('admin_change_pass/index');
            }
            else
            {
              $this->session->set_flashdata('msg', '<div class="ui icon negative message"><i class="warning icon"></i><div class="content"><div class="header">Passwords do not match!</div></div></div>');
              redirect('admin_change_pass/index');
            }
          }
          else
          {
            $this->session->set_flashdata('msg', '<div class="ui icon negative message"><i class="warning icon"></i><div class="content"><div class="header">Password is incorrect!</div></div></div>');
            redirect('admin_change_pass/index');
          }
        }
        else
        {
          redirect('admin_change_pass/index');
        }
      }
    }
    else
    {
      redirect('admin_login/index');
    }
  }
}?>
