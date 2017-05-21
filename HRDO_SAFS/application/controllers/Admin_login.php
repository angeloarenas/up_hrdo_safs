<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_login extends CI_Controller
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
  }
   public function index()
  {
    if ($this->session->userdata('loginadmin') != TRUE)
    {
      //get the posted values
      $username = $this->security->xss_clean($this->input->post("txt_username"));
      $password = $this->security->xss_clean($this->input->post("txt_password"));

      //set validations
      $this->form_validation->set_rules("txt_username", "Username", "trim|required");
      $this->form_validation->set_rules("txt_password", "Password", "trim|required");

      if ($this->form_validation->run() == FALSE)
      {
        //validation fails
        $this->load->view('admin_login');
      }
      else
      {
        //validation succeeds
        if ($this->input->post('btn_login') == "Login")
        {
          //check if username and password is correct
          $usr_result = $this->Admin_login_model->get_admin($username, $password);
          if ($usr_result > 0) //active user record is present
          {
            //set the session variables
            $sessiondata = array(
            'username' => $username,
            'loginadmin' => TRUE);
            $this->session->set_userdata($sessiondata);
            redirect("admin","refresh");
          }
          else
          {
            $this->session->set_flashdata('msg', '<div class="ui segment"><center>Incorrect username or password!</center></div>');
            redirect('admin_login/index');
          }
        }
        else
        {
          redirect('admin_login/index');
        }
      }
    }
    else
    {
      redirect("admin","refresh");
    }
  }
}?>
