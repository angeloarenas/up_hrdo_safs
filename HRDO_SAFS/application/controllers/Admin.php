<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
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
    //load the login model
    $this->load->model('Admin_login_model');
    $this->load->model('Admin_model');
  }

  public function ongoing_applications()
  {
    if ($this->session->userdata('loginadmin') == TRUE)
    {
      // logged in
      $adminnumber = $this->session->userdata('username');
      $admin_data = $this->Admin_model->get_admin($adminnumber);
      $application_list = $this->Admin_model->get_applications();
      $data = array('admin' => $admin_data, 'application_list' => $application_list);
      $this->load->view('admin_applications.php', $data);
    }
    else
    {
      // not logged in
      redirect('admin_login/index');
    }
  }

  public function applications_list_individual($transactionnumber)
  {
    if ($this->session->userdata('loginadmin') == TRUE)
    {
      if($this->Admin_model->is_application($transactionnumber) == TRUE)
      {
        $adminnumber = $this->session->userdata('username');
        $admin_data = $this->Admin_model->get_admin($adminnumber);
        $transaction_data = $this->Admin_model->get_transaction_individual($transactionnumber);
        $employee_data = $this->Admin_model->get_employee($transaction_data['employeenumber']);
        $data = array('admin' => $admin_data, 'employee_data' => $employee_data, 'transaction_data' => $transaction_data);
        $this->load->view('admin_applications_individual.php', $data);
      }
      else
      {
        redirect('admin/transactionslist/'.$transactionnumber);
      }
    }
    else
    {
      redirect('admin_login/index');
    }
  }

  public function add_application()
  {
    $transactionnumber = $this->security->xss_clean($this->input->post("transactionnumber"));
    $employeenumber = $this->security->xss_clean($this->input->post("employeenumber"));
    $applicationdate = $this->security->xss_clean($this->input->post("applicationdate"));
    $leavetype = $this->security->xss_clean($this->input->post("leavetype"));
    $leavedetails = $this->security->xss_clean($this->input->post("leavedetails"));
    $leavestatus = $this->security->xss_clean($this->input->post("leavestatus"));
    $developmenttype = $this->security->xss_clean($this->input->post("developmenttype"));
    $degreepursued = $this->security->xss_clean($this->input->post("degreepursued"));
    $institution = $this->security->xss_clean($this->input->post("institution"));
    $location = $this->security->xss_clean($this->input->post("location"));
    $country = $this->security->xss_clean($this->input->post("country"));
    $sponsordonor = $this->security->xss_clean($this->input->post("sponsordonor"));
    $localabroad = $this->security->xss_clean($this->input->post("localabroad"));
    $startdate = $this->security->xss_clean($this->input->post("startdate"));
    $enddate = $this->security->xss_clean($this->input->post("enddate"));
    $duration = $this->security->xss_clean($this->input->post("duration"));
    $reportforduty = $this->security->xss_clean($this->input->post("reportforduty"));
    $rso = $this->security->xss_clean($this->input->post("rso"));
    $rsostatus = $this->security->xss_clean($this->input->post("rsostatus"));

    $applicationdate_1 = DateTime::createFromFormat('m/d/Y', $applicationdate);
    $applicationdate_2 = $applicationdate_1->format('Y-m-d');

    $startdate_1 = DateTime::createFromFormat('m/d/Y', $startdate);
    $startdate_2 = $startdate_1->format('Y-m-d');

    $enddate_1 = DateTime::createFromFormat('m/d/Y', $enddate);
    $enddate_2 = $enddate_1->format('Y-m-d');

    $reportforduty_1 = DateTime::createFromFormat('m/d/Y', $reportforduty);
    $reportforduty_2 = $reportforduty_1->format('Y-m-d');

    $data = array(
       'transactionnumber'  => $transactionnumber,
       'employeenumber'     => $employeenumber,
       'applicationdate'    => $applicationdate_2,
       'leavetype'          => $leavetype,
       'leavedetails'       => $leavedetails,
       'leavestatus'        => $leavestatus,
       'developmenttype'    => $developmenttype,
       'degreepursued'      => $degreepursued,
       'institution'        => $institution,
       'location'           => $location,
       'country'            => $country,
       'sponsordonor'       => $sponsordonor,
       'localabroad'        => $localabroad,
       'startdate'          => $startdate_2,
       'enddate'            => $enddate_2,
       'duration'           => $duration,
       'reportforduty'      => $reportforduty_2,
       'rso'                => $rso,
       'rsostatus'          => $rsostatus
    );
    $this->Admin_model->insert_application($data);
    //$this->load->view('testpage.php', $data);
  }

  public function update_application()
  {
    $originaltransactionnumber = $this->security->xss_clean($this->input->post("originaltransactionnumber"));
    $transactionnumber = $this->security->xss_clean($this->input->post("transactionnumber"));
    $employeenumber = $this->security->xss_clean($this->input->post("employeenumber"));
    $applicationdate = $this->security->xss_clean($this->input->post("applicationdate"));
    $leavetype = $this->security->xss_clean($this->input->post("leavetype"));
    $leavedetails = $this->security->xss_clean($this->input->post("leavedetails"));
    $leavestatus = $this->security->xss_clean($this->input->post("leavestatus"));
    $developmenttype = $this->security->xss_clean($this->input->post("developmenttype"));
    $degreepursued = $this->security->xss_clean($this->input->post("degreepursued"));
    $institution = $this->security->xss_clean($this->input->post("institution"));
    $location = $this->security->xss_clean($this->input->post("location"));
    $country = $this->security->xss_clean($this->input->post("country"));
    $sponsordonor = $this->security->xss_clean($this->input->post("sponsordonor"));
    $localabroad = $this->security->xss_clean($this->input->post("localabroad"));
    $startdate = $this->security->xss_clean($this->input->post("startdate"));
    $enddate = $this->security->xss_clean($this->input->post("enddate"));
    $duration = $this->security->xss_clean($this->input->post("duration"));
    $reportforduty = $this->security->xss_clean($this->input->post("reportforduty"));
    $rso = $this->security->xss_clean($this->input->post("rso"));
    $rsostatus = $this->security->xss_clean($this->input->post("rsostatus"));

    $applicationdate_1 = DateTime::createFromFormat('m/d/Y', $applicationdate);
    $applicationdate_2 = $applicationdate_1->format('Y-m-d');

    $startdate_1 = DateTime::createFromFormat('m/d/Y', $startdate);
    $startdate_2 = $startdate_1->format('Y-m-d');

    $enddate_1 = DateTime::createFromFormat('m/d/Y', $enddate);
    $enddate_2 = $enddate_1->format('Y-m-d');

    $reportforduty_1 = DateTime::createFromFormat('m/d/Y', $reportforduty);
    $reportforduty_2 = $reportforduty_1->format('Y-m-d');

    $data = array(
       'transactionnumber'  => $transactionnumber,
       'employeenumber'     => $employeenumber,
       'applicationdate'    => $applicationdate_2,
       'leavetype'          => $leavetype,
       'leavedetails'       => $leavedetails,
       'leavestatus'        => $leavestatus,
       'developmenttype'    => $developmenttype,
       'degreepursued'      => $degreepursued,
       'institution'        => $institution,
       'location'           => $location,
       'country'            => $country,
       'sponsordonor'       => $sponsordonor,
       'localabroad'        => $localabroad,
       'startdate'          => $startdate_2,
       'enddate'            => $enddate_2,
       'duration'           => $duration,
       'reportforduty'      => $reportforduty_2,
       'rso'                => $rso,
       'rsostatus'          => $rsostatus
    );
    $this->Admin_model->update_application($originaltransactionnumber, $data);
  }

  public function delete_application()
  {
    $transactionnumber=  $this->security->xss_clean($this->input->post("transactionnumber"));
    $this->Admin_model->delete_application($transactionnumber);
  }

  public function employee_list()
  {
    if ($this->session->userdata('loginadmin') == TRUE)
    {
      // logged in
      $adminnumber = $this->session->userdata('username');
      $admin_data = $this->Admin_model->get_admin($adminnumber);
      $employee_list = $this->Admin_model->get_employeelist();
      $data = array('admin' => $admin_data, 'employee_list' => $employee_list);
      $this->load->view('admin_employees.php', $data);
    }
    else
    {
      // not logged in
      redirect('admin_login/index');
    }
  }

  public function employee_list_individual($employeenumber)
  {
    if ($this->session->userdata('loginadmin') == TRUE)
    {
      // logged in
      $adminnumber = $this->session->userdata('username');
      $admin_data = $this->Admin_model->get_admin($adminnumber);
      $employee_data = $this->Admin_model->get_employee($employeenumber);
      $contacts_list = $this->Admin_model->get_contacts($employeenumber);
      $transactions_list = $this->Admin_model->get_employee_transactions($employeenumber);
      $data = array('admin' => $admin_data, 'employee_data' => $employee_data, 'contacts_list' => $contacts_list, "contacts_count" => count($contacts_list), 'transactions_list' => $transactions_list);
      $this->load->view('admin_employees_individual.php', $data);
    }
    else
    {
      // not logged in
      redirect('admin_login/index');
    }
  }

  public function add_employee()
  {
    $employeenumber = $this->security->xss_clean($this->input->post("employeenumber"));
    $lastname = $this->security->xss_clean($this->input->post("lastname"));
    $firstname = $this->security->xss_clean($this->input->post("firstname"));
    $suffix = $this->security->xss_clean($this->input->post("suffix"));
    $middlename = $this->security->xss_clean($this->input->post("middlename"));
    $birthdate = $this->security->xss_clean($this->input->post("birthdate"));
    $gender = $this->security->xss_clean($this->input->post("gender"));
    $primaryemail = $this->security->xss_clean($this->input->post("primaryemail"));
    $secondaryemail = $this->security->xss_clean($this->input->post("secondaryemail"));
    $primarycontact = $this->security->xss_clean($this->input->post("primarycontact"));
    $secondarycontact = $this->security->xss_clean($this->input->post("secondarycontact"));
    $permanentaddress = $this->security->xss_clean($this->input->post("permanentaddress"));
    $unit = $this->security->xss_clean($this->input->post("unit"));
    $department = $this->security->xss_clean($this->input->post("department"));
    $employeetype = $this->security->xss_clean($this->input->post("employeetype"));
    $employmentstatus = $this->security->xss_clean($this->input->post("employmentstatus"));
    $rank = $this->security->xss_clean($this->input->post("rank"));
    $originalassignment = $this->security->xss_clean($this->input->post("originalassignment"));

    $birthdate_1 = DateTime::createFromFormat('m/d/Y', $birthdate);
    $birthdate_2 = $birthdate_1->format('Y-m-d');

    $originalassignment_1 = DateTime::createFromFormat('m/d/Y', $originalassignment);
    $originalassignment_2 = $originalassignment_1->format('Y-m-d');

    $data = array(
       'employeenumber'          => $employeenumber,
       'firstname'               => $firstname,
       'middlename'              => $middlename,
       'lastname'                => $lastname,
       'suffix'                  => $suffix,
       'birthdate'               => $birthdate_2,
       'gender'                  => $gender,
       'primaryemail'            => $primaryemail,
       'secondaryemail'          => $secondaryemail,
       'primarycontact'          => $primarycontact,
       'secondarycontact'        => $secondarycontact,
       'permanentaddress'        => $permanentaddress,
       'unit'                    => $unit,
       'department'              => $department,
       'employeetype'            => $employeetype,
       'employmentstatus'        => $employmentstatus,
       'rank'                    => $rank,
       'originalassignment'      => $originalassignment_2
    );
    $this->Admin_model->insert_employee($data);

    $cs1_name = $this->security->xss_clean($this->input->post("cs1_name"));
    $cs1_address = $this->security->xss_clean($this->input->post("cs1_address"));
    $cs1_contact_no = $this->security->xss_clean($this->input->post("cs1_contact_no"));
    $cs1_email = $this->security->xss_clean($this->input->post("cs1_email"));
    $cs2_name = $this->security->xss_clean($this->input->post("cs2_name"));
    $cs2_address = $this->security->xss_clean($this->input->post("cs2_address"));
    $cs2_contact_no = $this->security->xss_clean($this->input->post("cs2_contact_no"));
    $cs2_email = $this->security->xss_clean($this->input->post("cs2_email"));
    $cs3_name = $this->security->xss_clean($this->input->post("cs3_name"));
    $cs3_address = $this->security->xss_clean($this->input->post("cs3_address"));
    $cs3_contact_no = $this->security->xss_clean($this->input->post("cs3_contact_no"));
    $cs3_email = $this->security->xss_clean($this->input->post("cs3_email"));
    $cs4_name = $this->security->xss_clean($this->input->post("cs4_name"));
    $cs4_address = $this->security->xss_clean($this->input->post("cs4_address"));
    $cs4_contact_no = $this->security->xss_clean($this->input->post("cs4_contact_no"));
    $cs4_email = $this->security->xss_clean($this->input->post("cs4_email"));

    if($cs1_name != "" and $cs1_address != "" and $cs1_contact_no != "" and $cs1_email != "" and $employeenumber != "")
    {
      $cs1 = array(
          "name"              => $cs1_name,
          "address"           => $cs1_address,
          "contactno"         => $cs1_contact_no,
          "email"             => $cs1_email,
          "employeenumber"    => $employeenumber,
      );
      $this->Admin_model->insert_contactsurety($cs1);
    }
    if($cs2_name != "" and $cs2_address != "" and $cs2_contact_no != "" and $cs2_email != "" and $employeenumber != "")
    {
      $cs2 = array(
          "name"              => $cs2_name,
          "address"           => $cs2_address,
          "contactno"         => $cs2_contact_no,
          "email"             => $cs2_email,
          "employeenumber"    => $employeenumber,
      );
      $this->Admin_model->insert_contactsurety($cs2);
    }
    if($cs3_name != "" and $cs3_address != "" and $cs3_contact_no != "" and $cs3_email != "" and $employeenumber != "")
    {
      $cs3 = array(
          "name"              => $cs3_name,
          "address"           => $cs3_address,
          "contactno"         => $cs3_contact_no,
          "email"             => $cs3_email,
          "employeenumber"    => $employeenumber,
      );
      $this->Admin_model->insert_contactsurety($cs3);
    }
    if($cs4_name != "" and $cs4_address != "" and $cs4_contact_no != "" and $cs4_email != "" and $employeenumber != "")
    {
      $cs4 = array(
          "name"              => $cs4_name,
          "address"           => $cs4_address,
          "contactno"        => $cs4_contact_no,
          "email"             => $cs4_email,
          "employeenumber"    => $employeenumber,
      );
      $this->Admin_model->insert_contactsurety($cs4);
    }
  }

  public function delete_employee()
  {
    $employeenumber = $this->security->xss_clean($this->input->post("employeenumber"));
    $this->Admin_model->delete_employee($employeenumber);
  }

  public function update_employee()
  {
    $originalemployeenumber = $this->security->xss_clean($this->input->post("originalemployeenumber"));
    $employeenumber = $this->security->xss_clean($this->input->post("employeenumber"));
    $lastname = $this->security->xss_clean($this->input->post("lastname"));
    $firstname = $this->security->xss_clean($this->input->post("firstname"));
    $suffix = $this->security->xss_clean($this->input->post("suffix"));
    $middlename = $this->security->xss_clean($this->input->post("middlename"));
    $birthdate = $this->security->xss_clean($this->input->post("birthdate"));
    $gender = $this->security->xss_clean($this->input->post("gender"));
    $primaryemail = $this->security->xss_clean($this->input->post("primaryemail"));
    $secondaryemail = $this->security->xss_clean($this->input->post("secondaryemail"));
    $primarycontact = $this->security->xss_clean($this->input->post("primarycontact"));
    $secondarycontact = $this->security->xss_clean($this->input->post("secondarycontact"));
    $permanentaddress = $this->security->xss_clean($this->input->post("permanentaddress"));
    $unit = $this->security->xss_clean($this->input->post("unit"));
    $department = $this->security->xss_clean($this->input->post("department"));
    $employeetype = $this->security->xss_clean($this->input->post("employeetype"));
    $employmentstatus = $this->security->xss_clean($this->input->post("employmentstatus"));
    $rank = $this->security->xss_clean($this->input->post("rank"));
    $originalassignment = $this->security->xss_clean($this->input->post("originalassignment"));

    $birthdate_1 = DateTime::createFromFormat('m/d/Y', $birthdate);
    $birthdate_2 = $birthdate_1->format('Y-m-d');

    $originalassignment_1 = DateTime::createFromFormat('m/d/Y', $originalassignment);
    $originalassignment_2 = $originalassignment_1->format('Y-m-d');

    $data = array(
       'employeenumber'          => $employeenumber,
       'firstname'               => $firstname,
       'middlename'              => $middlename,
       'lastname'                => $lastname,
       'suffix'                  => $suffix,
       'birthdate'               => $birthdate_2,
       'gender'                  => $gender,
       'primaryemail'            => $primaryemail,
       'secondaryemail'          => $secondaryemail,
       'primarycontact'          => $primarycontact,
       'secondarycontact'        => $secondarycontact,
       'permanentaddress'        => $permanentaddress,
       'unit'                    => $unit,
       'department'              => $department,
       'employeetype'            => $employeetype,
       'employmentstatus'        => $employmentstatus,
       'rank'                    => $rank,
       'originalassignment'      => $originalassignment_2
    );
    $this->Admin_model->update_employee($originalemployeenumber, $employeenumber, $data);
    $this->Admin_model->delete_contactsureties($originalemployeenumber);

    $cs1_name = $this->security->xss_clean($this->input->post("cs1_name"));
    $cs1_address = $this->security->xss_clean($this->input->post("cs1_address"));
    $cs1_contact_no = $this->security->xss_clean($this->input->post("cs1_contact_no"));
    $cs1_email = $this->security->xss_clean($this->input->post("cs1_email"));
    $cs2_name = $this->security->xss_clean($this->input->post("cs2_name"));
    $cs2_address = $this->security->xss_clean($this->input->post("cs2_address"));
    $cs2_contact_no = $this->security->xss_clean($this->input->post("cs2_contact_no"));
    $cs2_email = $this->security->xss_clean($this->input->post("cs2_email"));
    $cs3_name = $this->security->xss_clean($this->input->post("cs3_name"));
    $cs3_address = $this->security->xss_clean($this->input->post("cs3_address"));
    $cs3_contact_no = $this->security->xss_clean($this->input->post("cs3_contact_no"));
    $cs3_email = $this->security->xss_clean($this->input->post("cs3_email"));
    $cs4_name = $this->security->xss_clean($this->input->post("cs4_name"));
    $cs4_address = $this->security->xss_clean($this->input->post("cs4_address"));
    $cs4_contact_no = $this->security->xss_clean($this->input->post("cs4_contact_no"));
    $cs4_email = $this->security->xss_clean($this->input->post("cs4_email"));

    if($cs1_name != "" and $cs1_address != "" and $cs1_contact_no != "" and $cs1_email != "" and $employeenumber != "")
    {
      $cs1 = array(
          "name"              => $cs1_name,
          "address"           => $cs1_address,
          "contactno"         => $cs1_contact_no,
          "email"             => $cs1_email,
          "employeenumber"    => $employeenumber,
      );
      $this->Admin_model->insert_contactsurety($cs1);
    }
    if($cs2_name != "" and $cs2_address != "" and $cs2_contact_no != "" and $cs2_email != "" and $employeenumber != "")
    {
      $cs2 = array(
          "name"              => $cs2_name,
          "address"           => $cs2_address,
          "contactno"         => $cs2_contact_no,
          "email"             => $cs2_email,
          "employeenumber"    => $employeenumber,
      );
      $this->Admin_model->insert_contactsurety($cs2);
    }
    if($cs3_name != "" and $cs3_address != "" and $cs3_contact_no != "" and $cs3_email != "" and $employeenumber != "")
    {
      $cs3 = array(
          "name"              => $cs3_name,
          "address"           => $cs3_address,
          "contactno"         => $cs3_contact_no,
          "email"             => $cs3_email,
          "employeenumber"    => $employeenumber,
      );
      $this->Admin_model->insert_contactsurety($cs3);
    }
    if($cs4_name != "" and $cs4_address != "" and $cs4_contact_no != "" and $cs4_email != "" and $employeenumber != "")
    {
      $cs4 = array(
          "name"              => $cs4_name,
          "address"           => $cs4_address,
          "contactno"        => $cs4_contact_no,
          "email"             => $cs4_email,
          "employeenumber"    => $employeenumber,
      );
      $this->Admin_model->insert_contactsurety($cs4);
    }
  }

  public function transactions_list()
  {
    if ($this->session->userdata('loginadmin') == TRUE)
    {
      // logged in
      $adminnumber = $this->session->userdata('username');
      $admin_data = $this->Admin_model->get_admin($adminnumber);
      $transactions_list = $this->Admin_model->get_transactions();
      $data = array('admin' => $admin_data, 'transactions_list' => $transactions_list);
      $this->load->view('admin_transactions.php', $data);
    }
    else
    {
      // not logged in
      redirect('admin_login/index');
    }
  }

  public function transactions_list_individual($transactionnumber)
  {
    if ($this->session->userdata('loginadmin') == TRUE)
    {
      if($this->Admin_model->is_application($transactionnumber) == FALSE)
      {
        $adminnumber = $this->session->userdata('username');
        $admin_data = $this->Admin_model->get_admin($adminnumber);
        $transaction_data = $this->Admin_model->get_transaction_individual($transactionnumber);
        $employee_data = $this->Admin_model->get_employee($transaction_data['employeenumber']);
        $data = array('admin' => $admin_data, 'employee_data' => $employee_data, 'transaction_data' => $transaction_data);
        $this->load->view('admin_transactions_individual.php', $data);
      }
      else
      {
        redirect('admin/ongoingapps/'.$transactionnumber);
      }
    }
    else
    {
      redirect('admin_login/index');
    }
  }

  public function update_transaction()
  {
    $originaltransactionnumber = $this->security->xss_clean($this->input->post("originaltransactionnumber"));
    $transactionnumber = $this->security->xss_clean($this->input->post("transactionnumber"));
    $leavetype = $this->security->xss_clean($this->input->post("leavetype"));
    $leavedetails = $this->security->xss_clean($this->input->post("leavedetails"));
    $leavestatus = $this->security->xss_clean($this->input->post("leavestatus"));
    $developmenttype = $this->security->xss_clean($this->input->post("developmenttype"));
    $degreepursued = $this->security->xss_clean($this->input->post("degreepursued"));
    $institution = $this->security->xss_clean($this->input->post("institution"));
    $location = $this->security->xss_clean($this->input->post("location"));
    $country = $this->security->xss_clean($this->input->post("country"));
    $sponsordonor = $this->security->xss_clean($this->input->post("sponsordonor"));
    $localabroad = $this->security->xss_clean($this->input->post("localabroad"));
    $startdate = $this->security->xss_clean($this->input->post("startdate"));
    $enddate = $this->security->xss_clean($this->input->post("enddate"));
    $duration = $this->security->xss_clean($this->input->post("duration"));
    $reportforduty = $this->security->xss_clean($this->input->post("reportforduty"));
    $rso = $this->security->xss_clean($this->input->post("rso"));
    $rsostatus = $this->security->xss_clean($this->input->post("rsostatus"));

    $startdate_1 = DateTime::createFromFormat('m/d/Y', $startdate);
    $startdate_2 = $startdate_1->format('Y-m-d');

    $enddate_1 = DateTime::createFromFormat('m/d/Y', $enddate);
    $enddate_2 = $enddate_1->format('Y-m-d');

    $reportforduty_1 = DateTime::createFromFormat('m/d/Y', $reportforduty);
    $reportforduty_2 = $reportforduty_1->format('Y-m-d');

    $data = array(
       'transactionnumber'  => $transactionnumber,
       'leavetype'          => $leavetype,
       'leavedetails'       => $leavedetails,
       'leavestatus'        => $leavestatus,
       'developmenttype'    => $developmenttype,
       'degreepursued'      => $degreepursued,
       'institution'        => $institution,
       'location'           => $location,
       'country'            => $country,
       'sponsordonor'       => $sponsordonor,
       'localabroad'        => $localabroad,
       'startdate'          => $startdate_2,
       'enddate'            => $enddate_2,
       'duration'           => $duration,
       'reportforduty'      => $reportforduty_2,
       'rso'                => $rso,
       'rsostatus'          => $rsostatus
    );
    $this->Admin_model->update_transaction($originaltransactionnumber, $data);
  }

  public function delete_transaction()
  {
    $transactionnumber = $this->security->xss_clean($this->input->post("transactionnumber"));
    $this->Admin_model->delete_transaction($transactionnumber);
  }

  public function rso_calculator()
  {
    if ($this->session->userdata('loginadmin') == TRUE)
    {
      // logged in
      $adminnumber = $this->session->userdata('username');
      $admin_data = $this->Admin_model->get_admin($adminnumber);
      $data = array('admin' => $admin_data);
      $this->load->view('admin_rso_calculator.php', $data);
    }
    else
    {
      // not logged in
      redirect('admin_login/index');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('loginadmin');
    $this->session->unset_userdata('username');
    session_destroy();
    redirect('admin_login/index', 'refresh');
  }
}?>
