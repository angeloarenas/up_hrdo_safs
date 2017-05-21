<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('unit_test');
    $this->load->library('session');
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->helper('html');
    $this->load->database();
    $this->load->model('Admin_login_model');
    $this->load->model('Admin_model');
  }

  public function directory()
  {
    $this->load->view('test_main.php');
  }

  public function admin_edit_applications_test()
  {
    if ($this->session->userdata('loginadmin') == TRUE)
    {
      //ADMIN TEST
      $this->unit->run($this->session->userdata('loginadmin'), 'is_bool', 'loginadmin - data type is boolean');
      $this->unit->run($this->session->userdata('loginadmin'), TRUE, 'loginadmin == TRUE');

      $adminnumber = $this->session->userdata('username');
      $admin = $this->Admin_model->get_admin($adminnumber);

      $this->unit->run($admin['firstname'], 'is_string', 'firstname - data type is string');
      $this->unit->run($admin['firstname'], 'Paola', 'firstname == Paola');

      $this->unit->run($admin['middleinitial'], 'is_string', 'middleinitial - data type is string');
      $this->unit->run($admin['middleinitial'], 'T', 'middleinitial == T');

      $this->unit->run($admin['lastname'], 'is_string', 'lastname - data type is string');
      $this->unit->run($admin['lastname'], 'Simon', 'lastname == Simon');

      $this->unit->run($admin['adminnumber'], 'is_string', 'adminnumber - data type is string');
      $this->unit->run($admin['adminnumber'], '2000-00001', 'adminnumber == 2000-00001');

      //CREATE TEST application
      $test_application_data = array(
         'transactionnumber'  => "9999999",
         'employeenumber'     => "123456789",
         'applicationdate'    => "2020-01-01",
         'leavetype'          => "Study Leave with Pay",
         'leavedetails'       => 'Full-Time',
         'leavestatus'        => 'Original',
         'developmenttype'    => 'Master of Science',
         'degreepursued'      => 'Computer Science',
         'institution'        => 'Harvard University',
         'location'           => 'South Carolina',
         'country'            => 'Albania',
         'sponsordonor'       => 'Willie Revillame',
         'localabroad'        => 'Abroad',
         'startdate'          => '2014-08-02',
         'enddate'            => '2018-06-02',
         'duration'           => '4year/s-2month/s-0day/s',
         'reportforduty'      => '2018-06-03',
         'rso'                => '8year/s-4month/s-0day/s',
         'rsostatus'          => 'Unserved'
      );
      $this->Admin_model->insert_application($test_application_data);
      $test_application = $this->Admin_model->get_transaction_individual('9999999');

      $this->unit->run($test_application['transactionnumber'], 'is_string', 'transactionnumber - data type is string');
      $this->unit->run($test_application['transactionnumber'], '9999999', 'transactionnumber == 9999999');

      $this->unit->run($test_application['employeenumber'], 'is_string', 'employeenumber - data type is string');
      $this->unit->run($test_application['employeenumber'], '123456789', 'employeenumber == 123456789');

      $this->unit->run($test_application['applicationdate'], 'is_string', 'applicationdate - data type is string');
      $this->unit->run($test_application['applicationdate'], '2020-01-01', 'applicationdate == 2020-01-01');

      $this->unit->run($test_application['leavetype'], 'is_string', 'leavetype - data type is string');
      $this->unit->run($test_application['leavetype'], 'Study Leave with Pay', 'leavetype == Study Leave with Pay');

      $this->unit->run($test_application['leavedetails'], 'is_string', 'leavedetails - data type is string');
      $this->unit->run($test_application['leavedetails'], 'Full-Time', 'leavedetails == Full-Time');

      $this->unit->run($test_application['leavestatus'], 'is_string', 'leavestatus - data type is string');
      $this->unit->run($test_application['leavestatus'], 'Original', 'leavestatus == Original');

      $this->unit->run($test_application['developmenttype'], 'is_string', 'developmenttype - data type is string');
      $this->unit->run($test_application['developmenttype'], 'Master of Science', 'developmenttype == Master of Science');

      $this->unit->run($test_application['degreepursued'], 'is_string', 'degreepursued - data type is string');
      $this->unit->run($test_application['degreepursued'], 'Computer Science', 'degreepursued == Computer Science');

      $this->unit->run($test_application['institution'], 'is_string', 'institution - data type is string');
      $this->unit->run($test_application['institution'], 'Harvard University', 'institution == Harvard University');

      $this->unit->run($test_application['location'], 'is_string', 'location - data type is string');
      $this->unit->run($test_application['location'], 'South Carolina', 'location == South Carolina');

      $this->unit->run($test_application['country'], 'is_string', 'country - data type is string');
      $this->unit->run($test_application['country'], 'Albania', 'country == Albania');

      $this->unit->run($test_application['sponsordonor'], 'is_string', 'sponsordonor - data type is string');
      $this->unit->run($test_application['sponsordonor'], 'Willie Revillame', 'sponsordonor == Willie Revillame');

      $this->unit->run($test_application['localabroad'], 'is_string', 'localabroad - data type is string');
      $this->unit->run($test_application['localabroad'], 'Abroad', 'localabroad == Abroad');

      $this->unit->run($test_application['startdate'], 'is_string', 'startdate - data type is string');
      $this->unit->run($test_application['startdate'], '2014-08-02', 'startdate == 2014-08-02');

      $this->unit->run($test_application['enddate'], 'is_string', 'enddate - data type is string');
      $this->unit->run($test_application['enddate'], '2018-06-02', 'enddate == 2018-06-02');

      $this->unit->run($test_application['duration'], 'is_string', 'duration - data type is string');
      $this->unit->run($test_application['duration'], '4year/s-2month/s-0day/s', 'duration == 4year/s-2month/s-0day/s');

      $this->unit->run($test_application['reportforduty'], 'is_string', 'reportforduty - data type is string');
      $this->unit->run($test_application['reportforduty'], '2018-06-03', 'reportforduty == 2018-06-03');

      $this->unit->run($test_application['rso'], 'is_string', 'rso - data type is string');
      $this->unit->run($test_application['rso'], '8year/s-4month/s-0day/s', 'rso == 8year/s-4month/s-0day/s');

      $this->unit->run($test_application['rsostatus'], 'is_string', 'rsostatus - data type is string');
      $this->unit->run($test_application['rsostatus'], 'Unserved', 'rsostatus == Unserved');

      //DELETE application
      $this->Admin_model->delete_application('9999999');


      $data = array('report' => $this->unit->report());
      $this->load->view('test_report.php', $data);
    }
    else
    {
      $this->unit->run($this->session->userdata('loginadmin'), 'is_null', 'loginadmin - data type is NULL');

      $data = array('report' => $this->unit->report());
      $this->load->view('test_report.php', $data);
    }
  }

  public function admin_add_application_test()
  {
    if ($this->session->userdata('loginadmin') == TRUE)
    {
      //ADMIN TEST
      $this->unit->run($this->session->userdata('loginadmin'), 'is_bool', 'loginadmin - data type is boolean');
      $this->unit->run($this->session->userdata('loginadmin'), TRUE, 'loginadmin == TRUE');

      $adminnumber = $this->session->userdata('username');
      $admin = $this->Admin_model->get_admin($adminnumber);

      $this->unit->run($admin['firstname'], 'is_string', 'firstname - data type is string');
      $this->unit->run($admin['firstname'], 'Paola', 'firstname == Paola');

      $this->unit->run($admin['middleinitial'], 'is_string', 'middleinitial - data type is string');
      $this->unit->run($admin['middleinitial'], 'T', 'middleinitial == T');

      $this->unit->run($admin['lastname'], 'is_string', 'lastname - data type is string');
      $this->unit->run($admin['lastname'], 'Simon', 'lastname == Simon');

      $this->unit->run($admin['adminnumber'], 'is_string', 'adminnumber - data type is string');
      $this->unit->run($admin['adminnumber'], '2000-00001', 'adminnumber == 2000-00001');

      //CREATE TEST application
      $test_application_data = array(
         'transactionnumber'  => "9999999",
         'employeenumber'     => "123456789",
         'applicationdate'    => "2020-01-01",
         'leavetype'          => "Study Leave with Pay",
         'leavedetails'       => 'Full-Time',
         'leavestatus'        => 'Original',
         'developmenttype'    => 'Master of Science',
         'degreepursued'      => 'Computer Science',
         'institution'        => 'Harvard University',
         'location'           => 'South Carolina',
         'country'            => 'Albania',
         'sponsordonor'       => 'Willie Revillame',
         'localabroad'        => 'Abroad',
         'startdate'          => '2014-08-02',
         'enddate'            => '2018-06-02',
         'duration'           => '4year/s-2month/s-0day/s',
         'reportforduty'      => '2018-06-03',
         'rso'                => '8year/s-4month/s-0day/s',
         'rsostatus'          => 'Unserved'
      );
      $this->Admin_model->insert_application($test_application_data);
      $test_application = $this->Admin_model->get_transaction_individual('9999999');

      $this->unit->run($test_application['transactionnumber'], 'is_string', 'transactionnumber - data type is string');
      $this->unit->run($test_application['transactionnumber'], '9999999', 'transactionnumber == 9999999');

      $this->unit->run($test_application['employeenumber'], 'is_string', 'employeenumber - data type is string');
      $this->unit->run($test_application['employeenumber'], '123456789', 'employeenumber == 123456789');

      $this->unit->run($test_application['applicationdate'], 'is_string', 'applicationdate - data type is string');
      $this->unit->run($test_application['applicationdate'], '2020-01-01', 'applicationdate == 2020-01-01');

      $this->unit->run($test_application['leavetype'], 'is_string', 'leavetype - data type is string');
      $this->unit->run($test_application['leavetype'], 'Study Leave with Pay', 'leavetype == Study Leave with Pay');

      $this->unit->run($test_application['leavedetails'], 'is_string', 'leavedetails - data type is string');
      $this->unit->run($test_application['leavedetails'], 'Full-Time', 'leavedetails == Full-Time');

      $this->unit->run($test_application['leavestatus'], 'is_string', 'leavestatus - data type is string');
      $this->unit->run($test_application['leavestatus'], 'Original', 'leavestatus == Original');

      $this->unit->run($test_application['developmenttype'], 'is_string', 'developmenttype - data type is string');
      $this->unit->run($test_application['developmenttype'], 'Master of Science', 'developmenttype == Master of Science');

      $this->unit->run($test_application['degreepursued'], 'is_string', 'degreepursued - data type is string');
      $this->unit->run($test_application['degreepursued'], 'Computer Science', 'degreepursued == Computer Science');

      $this->unit->run($test_application['institution'], 'is_string', 'institution - data type is string');
      $this->unit->run($test_application['institution'], 'Harvard University', 'institution == Harvard University');

      $this->unit->run($test_application['location'], 'is_string', 'location - data type is string');
      $this->unit->run($test_application['location'], 'South Carolina', 'location == South Carolina');

      $this->unit->run($test_application['country'], 'is_string', 'country - data type is string');
      $this->unit->run($test_application['country'], 'Albania', 'country == Albania');

      $this->unit->run($test_application['sponsordonor'], 'is_string', 'sponsordonor - data type is string');
      $this->unit->run($test_application['sponsordonor'], 'Willie Revillame', 'sponsordonor == Willie Revillame');

      $this->unit->run($test_application['localabroad'], 'is_string', 'localabroad - data type is string');
      $this->unit->run($test_application['localabroad'], 'Abroad', 'localabroad == Abroad');

      $this->unit->run($test_application['startdate'], 'is_string', 'startdate - data type is string');
      $this->unit->run($test_application['startdate'], '2014-08-02', 'startdate == 2014-08-02');

      $this->unit->run($test_application['enddate'], 'is_string', 'enddate - data type is string');
      $this->unit->run($test_application['enddate'], '2018-06-02', 'enddate == 2018-06-02');

      $this->unit->run($test_application['duration'], 'is_string', 'duration - data type is string');
      $this->unit->run($test_application['duration'], '4year/s-2month/s-0day/s', 'duration == 4year/s-2month/s-0day/s');

      $this->unit->run($test_application['reportforduty'], 'is_string', 'reportforduty - data type is string');
      $this->unit->run($test_application['reportforduty'], '2018-06-03', 'reportforduty == 2018-06-03');

      $this->unit->run($test_application['rso'], 'is_string', 'rso - data type is string');
      $this->unit->run($test_application['rso'], '8year/s-4month/s-0day/s', 'rso == 8year/s-4month/s-0day/s');

      $this->unit->run($test_application['rsostatus'], 'is_string', 'rsostatus - data type is string');
      $this->unit->run($test_application['rsostatus'], 'Unserved', 'rsostatus == Unserved');

      //EDIT application
      $test_edit_application_data = array(
         'transactionnumber'  => "9999999",
         'employeenumber'     => "123456789",
         'applicationdate'    => "2020-01-01",
         'leavetype'          => "Study Leave without Pay",
         'leavedetails'       => 'Half-Day',
         'leavestatus'        => 'Original',
         'developmenttype'    => 'Master of Science',
         'degreepursued'      => 'Industrial Engineering',
         'institution'        => 'Oxford University',
         'location'           => 'Texas',
         'country'            => 'Egypt',
         'sponsordonor'       => 'Barack Obama',
         'localabroad'        => 'Local',
         'startdate'          => '2014-08-02',
         'enddate'            => '2018-06-02',
         'duration'           => '25year/s-2month/s-0day/s',
         'reportforduty'      => '2018-06-03',
         'rso'                => '50year/s-4month/s-0day/s',
         'rsostatus'          => 'Served'
      );
      $this->Admin_model->update_application('9999999', $test_edit_application_data);
      $test_edit_application = $this->Admin_model->get_transaction_individual('9999999');

      $this->unit->run($test_edit_application['transactionnumber'], 'is_string', 'transactionnumber - data type is string');
      $this->unit->run($test_edit_application['transactionnumber'], '9999999', 'transactionnumber == 9999999');

      $this->unit->run($test_edit_application['employeenumber'], 'is_string', 'employeenumber - data type is string');
      $this->unit->run($test_edit_application['employeenumber'], '123456789', 'employeenumber == 123456789');

      $this->unit->run($test_edit_application['applicationdate'], 'is_string', 'applicationdate - data type is string');
      $this->unit->run($test_edit_application['applicationdate'], '2020-01-01', 'applicationdate == 2020-01-01');

      $this->unit->run($test_edit_application['leavetype'], 'is_string', 'leavetype - data type is string');
      $this->unit->run($test_edit_application['leavetype'], 'Study Leave without Pay', 'leavetype == Study Leave without Pay');

      $this->unit->run($test_edit_application['leavedetails'], 'is_string', 'leavedetails - data type is string');
      $this->unit->run($test_edit_application['leavedetails'], 'Half-Day', 'leavedetails == Half-Day');

      $this->unit->run($test_edit_application['leavestatus'], 'is_string', 'leavestatus - data type is string');
      $this->unit->run($test_edit_application['leavestatus'], 'Original', 'leavestatus == Original');

      $this->unit->run($test_edit_application['developmenttype'], 'is_string', 'developmenttype - data type is string');
      $this->unit->run($test_edit_application['developmenttype'], 'Master of Science', 'developmenttype == Master of Science');

      $this->unit->run($test_edit_application['degreepursued'], 'is_string', 'degreepursued - data type is string');
      $this->unit->run($test_edit_application['degreepursued'], 'Industrial Engineering', 'degreepursued == Industrial Engineering');

      $this->unit->run($test_edit_application['institution'], 'is_string', 'institution - data type is string');
      $this->unit->run($test_edit_application['institution'], 'Oxford University', 'institution == Oxford University');

      $this->unit->run($test_edit_application['location'], 'is_string', 'location - data type is string');
      $this->unit->run($test_edit_application['location'], 'Texas', 'location == Texas');

      $this->unit->run($test_edit_application['country'], 'is_string', 'country - data type is string');
      $this->unit->run($test_edit_application['country'], 'Egypt', 'country == Egypt');

      $this->unit->run($test_edit_application['sponsordonor'], 'is_string', 'sponsordonor - data type is string');
      $this->unit->run($test_edit_application['sponsordonor'], 'Barack Obama', 'sponsordonor == Barack Obama');

      $this->unit->run($test_edit_application['localabroad'], 'is_string', 'localabroad - data type is string');
      $this->unit->run($test_edit_application['localabroad'], 'Local', 'localabroad == Local');

      $this->unit->run($test_edit_application['startdate'], 'is_string', 'startdate - data type is string');
      $this->unit->run($test_edit_application['startdate'], '2014-08-02', 'startdate == 2014-08-02');

      $this->unit->run($test_edit_application['enddate'], 'is_string', 'enddate - data type is string');
      $this->unit->run($test_edit_application['enddate'], '2018-06-02', 'enddate == 2018-06-02');

      $this->unit->run($test_edit_application['duration'], 'is_string', 'duration - data type is string');
      $this->unit->run($test_edit_application['duration'], '25year/s-2month/s-0day/s', 'duration == 25year/s-2month/s-0day/s');

      $this->unit->run($test_edit_application['reportforduty'], 'is_string', 'reportforduty - data type is string');
      $this->unit->run($test_edit_application['reportforduty'], '2018-06-03', 'reportforduty == 2018-06-03');

      $this->unit->run($test_edit_application['rso'], 'is_string', 'rso - data type is string');
      $this->unit->run($test_edit_application['rso'], '50year/s-4month/s-0day/s', 'rso == 50year/s-4month/s-0day/s');

      $this->unit->run($test_edit_application['rsostatus'], 'is_string', 'rsostatus - data type is string');
      $this->unit->run($test_edit_application['rsostatus'], 'Served', 'rsostatus == Served');

      //DELETE application
      $this->Admin_model->delete_application('9999999');

      $data = array('report' => $this->unit->report());
      $this->load->view('test_report.php', $data);
    }
    else
    {
      $this->unit->run($this->session->userdata('loginadmin'), 'is_null', 'loginadmin - data type is NULL');

      $data = array('report' => $this->unit->report());
      $this->load->view('test_report.php', $data);
    }
  }

  public function admin_add_employee_test()
  {
    if ($this->session->userdata('loginadmin') == TRUE)
    {
      //ADMIN TEST
      $this->unit->run($this->session->userdata('loginadmin'), 'is_bool', 'loginadmin - data type is boolean');
      $this->unit->run($this->session->userdata('loginadmin'), TRUE, 'loginadmin == TRUE');

      $adminnumber = $this->session->userdata('username');
      $admin = $this->Admin_model->get_admin($adminnumber);

      $this->unit->run($admin['firstname'], 'is_string', 'firstname - data type is string');
      $this->unit->run($admin['firstname'], 'Paola', 'firstname == Paola');

      $this->unit->run($admin['middleinitial'], 'is_string', 'middleinitial - data type is string');
      $this->unit->run($admin['middleinitial'], 'T', 'middleinitial == T');

      $this->unit->run($admin['lastname'], 'is_string', 'lastname - data type is string');
      $this->unit->run($admin['lastname'], 'Simon', 'lastname == Simon');

      $this->unit->run($admin['adminnumber'], 'is_string', 'adminnumber - data type is string');
      $this->unit->run($admin['adminnumber'], '2000-00001', 'adminnumber == 2000-00001');

      //CREATE TEST EMPLOYEE
      $test_employee = array(
         'employeenumber'          => '999999999',
         'firstname'               => 'first',
         'middlename'              => 'middle',
         'lastname'                => 'last',
         'suffix'                  => 'suffix',
         'birthdate'               => '1996-10-01',
         'gender'                  => 'Male',
         'primaryemail'            => 'e1@email.com',
         'secondaryemail'          => 'e2@email.com',
         'primarycontact'          => '555555',
         'secondarycontact'        => '575575',
         'permanentaddress'        => 'Quezon City',
         'unit'                    => 'ACCTG',
         'department'              => 'AIT',
         'employeetype'            => 'FAC',
         'employmentstatus'        => 'Permanent',
         'rank'                    => 'Professor VI',
         'originalassignment'      => '2014-05-22'
      );
      $this->Admin_model->insert_employee($test_employee);

      $this->unit->run($test_employee['employeenumber'], 'is_string', 'employeenumber - data type is string');
      $this->unit->run($test_employee['employeenumber'], '999999999', 'employeenumber == 999999999');

      $this->unit->run($test_employee['firstname'], 'is_string', 'firstname - data type is string');
      $this->unit->run($test_employee['firstname'], 'first', 'firstname == first');

      $this->unit->run($test_employee['middlename'], 'is_string', 'middlename - data type is string');
      $this->unit->run($test_employee['middlename'], 'middle', 'middlename == middle');

      $this->unit->run($test_employee['lastname'], 'is_string', 'lastname - data type is string');
      $this->unit->run($test_employee['lastname'], 'last', 'lastname == last');

      $this->unit->run($test_employee['suffix'], 'is_string', 'suffix - data type is string');
      $this->unit->run($test_employee['suffix'], 'suffix', 'suffix == suffix');

      $this->unit->run($test_employee['birthdate'], 'is_string', 'birthdate - data type is string');
      $this->unit->run($test_employee['birthdate'], '1996-10-01', 'birthdate == 1996-10-01');

      $this->unit->run($test_employee['gender'], 'is_string', 'gender - data type is string');
      $this->unit->run($test_employee['gender'], 'Male', 'gender == Male');

      $this->unit->run($test_employee['primaryemail'], 'is_string', 'primaryemail - data type is string');
      $this->unit->run($test_employee['primaryemail'], 'e1@email.com', 'primaryemail == e1@email.com');

      $this->unit->run($test_employee['secondaryemail'], 'is_string', 'secondaryemail - data type is string');
      $this->unit->run($test_employee['secondaryemail'], 'e2@email.com', 'secondaryemail == e2@email.com');

      $this->unit->run($test_employee['primarycontact'], 'is_string', 'primarycontact - data type is string');
      $this->unit->run($test_employee['primarycontact'], '555555', 'primarycontact == 555555');

      $this->unit->run($test_employee['secondarycontact'], 'is_string', 'secondarycontact - data type is string');
      $this->unit->run($test_employee['secondarycontact'], '575575', 'secondarycontact == 575575');

      $this->unit->run($test_employee['permanentaddress'], 'is_string', 'permanentaddress - data type is string');
      $this->unit->run($test_employee['permanentaddress'], 'Quezon City', 'permanentaddress == Quezon City');

      $this->unit->run($test_employee['unit'], 'is_string', 'unit - data type is string');
      $this->unit->run($test_employee['unit'], 'ACCTG', 'unit == ACCTG');

      $this->unit->run($test_employee['department'], 'is_string', 'department - data type is string');
      $this->unit->run($test_employee['department'], 'AIT', 'department == AIT');

      $this->unit->run($test_employee['employeetype'], 'is_string', 'employeetype - data type is string');
      $this->unit->run($test_employee['employeetype'], 'FAC', 'employeetype == FAC');

      $this->unit->run($test_employee['employmentstatus'], 'is_string', 'employmentstatus - data type is string');
      $this->unit->run($test_employee['employmentstatus'], 'Permanent', 'employmentstatus == Permanent');

      $this->unit->run($test_employee['rank'], 'is_string', 'rank - data type is string');
      $this->unit->run($test_employee['rank'], 'Professor VI', 'rank == Professor VI');

      $this->unit->run($test_employee['originalassignment'], 'is_string', 'lastname - data type is string');
      $this->unit->run($test_employee['originalassignment'], '2014-05-22', 'originalassignment == 2014-05-22');

      $test_cs1 = array(
          "name"              => "name1" ,
          "address"           => "address1",
          "contactno"         => "contactno1",
          "email"             => "email1",
          "employeenumber"    => "999999999",
      );
      $this->Admin_model->insert_contactsurety($test_cs1);

      $test_cs2 = array(
          "name"              => "name2" ,
          "address"           => "address2",
          "contactno"         => "contactno2",
          "email"             => "email2",
          "employeenumber"    => "999999999",
      );
      $this->Admin_model->insert_contactsurety($test_cs2);

      $test_cs3 = array(
          "name"              => "name3" ,
          "address"           => "address3",
          "contactno"         => "contactno3",
          "email"             => "email3",
          "employeenumber"    => "999999999",
      );
      $this->Admin_model->insert_contactsurety($test_cs3);

      $test_cs4 = array(
          "name"              => "name4" ,
          "address"           => "address4",
          "contactno"         => "contactno4",
          "email"             => "email4",
          "employeenumber"    => "999999999",
      );
      $this->Admin_model->insert_contactsurety($test_cs4);

      $contacts = $this->Admin_model->get_contacts("999999999");

      $this->unit->run($contacts[0]['name'], 'is_string', 'name - data type is string');
      $this->unit->run($contacts[0]['name'], 'name1', 'name == name1');

      $this->unit->run($contacts[0]['address'], 'is_string', 'address - data type is string');
      $this->unit->run($contacts[0]['address'], 'address1', 'address == address1');

      $this->unit->run($contacts[0]['contactno'], 'is_string', 'contactno - data type is string');
      $this->unit->run($contacts[0]['contactno'], 'contactno1', 'contactno == contactno1');

      $this->unit->run($contacts[0]['email'], 'is_string', 'email - data type is string');
      $this->unit->run($contacts[0]['email'], 'email1', 'email == email1');

      $this->unit->run($contacts[0]['employeenumber'], 'is_string', 'employeenumber - data type is string');
      $this->unit->run($contacts[0]['employeenumber'], '999999999', 'employeenumber == 999999999');

      $this->unit->run($contacts[1]['name'], 'is_string', 'name - data type is string');
      $this->unit->run($contacts[1]['name'], 'name2', 'name == name2');

      $this->unit->run($contacts[1]['address'], 'is_string', 'address - data type is string');
      $this->unit->run($contacts[1]['address'], 'address2', 'address == address2');

      $this->unit->run($contacts[1]['contactno'], 'is_string', 'contactno - data type is string');
      $this->unit->run($contacts[1]['contactno'], 'contactno2', 'contactno == contactno2');

      $this->unit->run($contacts[1]['email'], 'is_string', 'email - data type is string');
      $this->unit->run($contacts[1]['email'], 'email2', 'email == email2');

      $this->unit->run($contacts[1]['employeenumber'], 'is_string', 'employeenumber - data type is string');
      $this->unit->run($contacts[1]['employeenumber'], '999999999', 'employeenumber == 999999999');

      $this->unit->run($contacts[2]['name'], 'is_string', 'name - data type is string');
      $this->unit->run($contacts[2]['name'], 'name3', 'name == name3');

      $this->unit->run($contacts[2]['address'], 'is_string', 'address - data type is string');
      $this->unit->run($contacts[2]['address'], 'address3', 'address == address3');

      $this->unit->run($contacts[2]['contactno'], 'is_string', 'contactno - data type is string');
      $this->unit->run($contacts[2]['contactno'], 'contactno3', 'contactno == contactno3');

      $this->unit->run($contacts[2]['email'], 'is_string', 'email - data type is string');
      $this->unit->run($contacts[2]['email'], 'email3', 'email == email3');

      $this->unit->run($contacts[2]['employeenumber'], 'is_string', 'employeenumber - data type is string');
      $this->unit->run($contacts[2]['employeenumber'], '999999999', 'employeenumber == 999999999');

      $this->unit->run($contacts[3]['name'], 'is_string', 'name - data type is string');
      $this->unit->run($contacts[3]['name'], 'name4', 'name == name4');

      $this->unit->run($contacts[3]['address'], 'is_string', 'address - data type is string');
      $this->unit->run($contacts[3]['address'], 'address4', 'address == address4');

      $this->unit->run($contacts[3]['contactno'], 'is_string', 'contactno - data type is string');
      $this->unit->run($contacts[3]['contactno'], 'contactno4', 'contactno == contactno4');

      $this->unit->run($contacts[3]['email'], 'is_string', 'email - data type is string');
      $this->unit->run($contacts[3]['email'], 'email4', 'email == email4');

      $this->unit->run($contacts[3]['employeenumber'], 'is_string', 'employeenumber - data type is string');
      $this->unit->run($contacts[3]['employeenumber'], '999999999', 'employeenumber == 999999999');

      //DELETE EMPLOYEE
      $this->Admin_model->delete_employee("999999999");

      $data = array('report' => $this->unit->report());
      $this->load->view('test_report.php', $data);
    }
    else
    {
      $this->unit->run($this->session->userdata('loginadmin'), 'is_null', 'loginadmin - data type is NULL');

      $data = array('report' => $this->unit->report());
      $this->load->view('test_report.php', $data);
    }
  }

  public function admin_edit_employee_test()
  {
    if ($this->session->userdata('loginadmin') == TRUE)
    {
      //ADMIN TEST
      $this->unit->run($this->session->userdata('loginadmin'), 'is_bool', 'loginadmin - data type is boolean');
      $this->unit->run($this->session->userdata('loginadmin'), TRUE, 'loginadmin == TRUE');

      $adminnumber = $this->session->userdata('username');
      $admin = $this->Admin_model->get_admin($adminnumber);

      $this->unit->run($admin['firstname'], 'is_string', 'firstname - data type is string');
      $this->unit->run($admin['firstname'], 'Paola', 'firstname == Paola');

      $this->unit->run($admin['middleinitial'], 'is_string', 'middleinitial - data type is string');
      $this->unit->run($admin['middleinitial'], 'T', 'middleinitial == T');

      $this->unit->run($admin['lastname'], 'is_string', 'lastname - data type is string');
      $this->unit->run($admin['lastname'], 'Simon', 'lastname == Simon');

      $this->unit->run($admin['adminnumber'], 'is_string', 'adminnumber - data type is string');
      $this->unit->run($admin['adminnumber'], '2000-00001', 'adminnumber == 2000-00001');

      //CREATE TEST EMPLOYEE
      $test_employee_data = array(
         'employeenumber'          => '999999999',
         'firstname'               => 'first',
         'middlename'              => 'middle',
         'lastname'                => 'last',
         'suffix'                  => 'suffix',
         'birthdate'               => '1996-10-01',
         'gender'                  => 'Male',
         'primaryemail'            => 'e1@email.com',
         'secondaryemail'          => 'e2@email.com',
         'primarycontact'          => '555555',
         'secondarycontact'        => '575575',
         'permanentaddress'        => 'Quezon City',
         'unit'                    => 'ACCTG',
         'department'              => 'AIT',
         'employeetype'            => 'FAC',
         'employmentstatus'        => 'Permanent',
         'rank'                    => 'Professor VI',
         'originalassignment'      => '2014-05-22'
      );
      $this->Admin_model->insert_employee($test_employee_data);
      $test_employee = $this->Admin_model->get_employee('999999999');

      $this->unit->run($test_employee['employeenumber'], 'is_string', 'employeenumber - data type is string');
      $this->unit->run($test_employee['employeenumber'], '999999999', 'employeenumber == 999999999');

      $this->unit->run($test_employee['firstname'], 'is_string', 'firstname - data type is string');
      $this->unit->run($test_employee['firstname'], 'first', 'firstname == first');

      $this->unit->run($test_employee['middlename'], 'is_string', 'middlename - data type is string');
      $this->unit->run($test_employee['middlename'], 'middle', 'middlename == middle');

      $this->unit->run($test_employee['lastname'], 'is_string', 'lastname - data type is string');
      $this->unit->run($test_employee['lastname'], 'last', 'lastname == last');

      $this->unit->run($test_employee['suffix'], 'is_string', 'suffix - data type is string');
      $this->unit->run($test_employee['suffix'], 'suffix', 'suffix == suffix');

      $this->unit->run($test_employee['birthdate'], 'is_string', 'birthdate - data type is string');
      $this->unit->run($test_employee['birthdate'], '1996-10-01', 'birthdate == 1996-10-01');

      $this->unit->run($test_employee['gender'], 'is_string', 'gender - data type is string');
      $this->unit->run($test_employee['gender'], 'Male', 'gender == Male');

      $this->unit->run($test_employee['primaryemail'], 'is_string', 'primaryemail - data type is string');
      $this->unit->run($test_employee['primaryemail'], 'e1@email.com', 'primaryemail == e1@email.com');

      $this->unit->run($test_employee['secondaryemail'], 'is_string', 'secondaryemail - data type is string');
      $this->unit->run($test_employee['secondaryemail'], 'e2@email.com', 'secondaryemail == e2@email.com');

      $this->unit->run($test_employee['primarycontact'], 'is_string', 'primarycontact - data type is string');
      $this->unit->run($test_employee['primarycontact'], '555555', 'primarycontact == 555555');

      $this->unit->run($test_employee['secondarycontact'], 'is_string', 'secondarycontact - data type is string');
      $this->unit->run($test_employee['secondarycontact'], '575575', 'secondarycontact == 575575');

      $this->unit->run($test_employee['permanentaddress'], 'is_string', 'permanentaddress - data type is string');
      $this->unit->run($test_employee['permanentaddress'], 'Quezon City', 'permanentaddress == Quezon City');

      $this->unit->run($test_employee['unit'], 'is_string', 'unit - data type is string');
      $this->unit->run($test_employee['unit'], 'ACCTG', 'unit == ACCTG');

      $this->unit->run($test_employee['department'], 'is_string', 'department - data type is string');
      $this->unit->run($test_employee['department'], 'AIT', 'department == AIT');

      $this->unit->run($test_employee['employeetype'], 'is_string', 'employeetype - data type is string');
      $this->unit->run($test_employee['employeetype'], 'FAC', 'employeetype == FAC');

      $this->unit->run($test_employee['employmentstatus'], 'is_string', 'employmentstatus - data type is string');
      $this->unit->run($test_employee['employmentstatus'], 'Permanent', 'employmentstatus == Permanent');

      $this->unit->run($test_employee['rank'], 'is_string', 'rank - data type is string');
      $this->unit->run($test_employee['rank'], 'Professor VI', 'rank == Professor VI');

      $this->unit->run($test_employee['originalassignment'], 'is_string', 'lastname - data type is string');
      $this->unit->run($test_employee['originalassignment'], '2014-05-22', 'originalassignment == 2014-05-22');

      $test_cs1 = array(
          "name"              => "name1" ,
          "address"           => "address1",
          "contactno"         => "contactno1",
          "email"             => "email1",
          "employeenumber"    => "999999999",
      );
      $this->Admin_model->insert_contactsurety($test_cs1);

      $test_cs2 = array(
          "name"              => "name2" ,
          "address"           => "address2",
          "contactno"         => "contactno2",
          "email"             => "email2",
          "employeenumber"    => "999999999",
      );
      $this->Admin_model->insert_contactsurety($test_cs2);

      $test_cs3 = array(
          "name"              => "name3" ,
          "address"           => "address3",
          "contactno"         => "contactno3",
          "email"             => "email3",
          "employeenumber"    => "999999999",
      );
      $this->Admin_model->insert_contactsurety($test_cs3);

      $test_cs4 = array(
          "name"              => "name4" ,
          "address"           => "address4",
          "contactno"         => "contactno4",
          "email"             => "email4",
          "employeenumber"    => "999999999",
      );
      $this->Admin_model->insert_contactsurety($test_cs4);

      $test_contacts = $this->Admin_model->get_contacts("999999999");

      $this->unit->run($test_contacts[0]['name'], 'is_string', 'name - data type is string');
      $this->unit->run($test_contacts[0]['name'], 'name1', 'name == name1');

      $this->unit->run($test_contacts[0]['address'], 'is_string', 'address - data type is string');
      $this->unit->run($test_contacts[0]['address'], 'address1', 'address == address1');

      $this->unit->run($test_contacts[0]['contactno'], 'is_string', 'contactno - data type is string');
      $this->unit->run($test_contacts[0]['contactno'], 'contactno1', 'contactno == contactno1');

      $this->unit->run($test_contacts[0]['email'], 'is_string', 'email - data type is string');
      $this->unit->run($test_contacts[0]['email'], 'email1', 'email == email1');

      $this->unit->run($test_contacts[0]['employeenumber'], 'is_string', 'employeenumber - data type is string');
      $this->unit->run($test_contacts[0]['employeenumber'], '999999999', 'employeenumber == 999999999');

      $this->unit->run($test_contacts[1]['name'], 'is_string', 'name - data type is string');
      $this->unit->run($test_contacts[1]['name'], 'name2', 'name == name2');

      $this->unit->run($test_contacts[1]['address'], 'is_string', 'address - data type is string');
      $this->unit->run($test_contacts[1]['address'], 'address2', 'address == address2');

      $this->unit->run($test_contacts[1]['contactno'], 'is_string', 'contactno - data type is string');
      $this->unit->run($test_contacts[1]['contactno'], 'contactno2', 'contactno == contactno2');

      $this->unit->run($test_contacts[1]['email'], 'is_string', 'email - data type is string');
      $this->unit->run($test_contacts[1]['email'], 'email2', 'email == email2');

      $this->unit->run($test_contacts[1]['employeenumber'], 'is_string', 'employeenumber - data type is string');
      $this->unit->run($test_contacts[1]['employeenumber'], '999999999', 'employeenumber == 999999999');

      $this->unit->run($test_contacts[2]['name'], 'is_string', 'name - data type is string');
      $this->unit->run($test_contacts[2]['name'], 'name3', 'name == name3');

      $this->unit->run($test_contacts[2]['address'], 'is_string', 'address - data type is string');
      $this->unit->run($test_contacts[2]['address'], 'address3', 'address == address3');

      $this->unit->run($test_contacts[2]['contactno'], 'is_string', 'contactno - data type is string');
      $this->unit->run($test_contacts[2]['contactno'], 'contactno3', 'contactno == contactno3');

      $this->unit->run($test_contacts[2]['email'], 'is_string', 'email - data type is string');
      $this->unit->run($test_contacts[2]['email'], 'email3', 'email == email3');

      $this->unit->run($test_contacts[2]['employeenumber'], 'is_string', 'employeenumber - data type is string');
      $this->unit->run($test_contacts[2]['employeenumber'], '999999999', 'employeenumber == 999999999');

      $this->unit->run($test_contacts[3]['name'], 'is_string', 'name - data type is string');
      $this->unit->run($test_contacts[3]['name'], 'name4', 'name == name4');

      $this->unit->run($test_contacts[3]['address'], 'is_string', 'address - data type is string');
      $this->unit->run($test_contacts[3]['address'], 'address4', 'address == address4');

      $this->unit->run($test_contacts[3]['contactno'], 'is_string', 'contactno - data type is string');
      $this->unit->run($test_contacts[3]['contactno'], 'contactno4', 'contactno == contactno4');

      $this->unit->run($test_contacts[3]['email'], 'is_string', 'email - data type is string');
      $this->unit->run($test_contacts[3]['email'], 'email4', 'email == email4');

      $this->unit->run($test_contacts[3]['employeenumber'], 'is_string', 'employeenumber - data type is string');
      $this->unit->run($test_contacts[3]['employeenumber'], '999999999', 'employeenumber == 999999999');

      //EDIT EMPLOYEE
      $test_edit_employee_data = array(
         'employeenumber'          => '999999999',
         'firstname'               => 'FARST',
         'middlename'              => 'MIDAL',
         'lastname'                => 'LOST',
         'suffix'                  => 'SAPIKS',
         'birthdate'               => '1996-10-01',
         'gender'                  => 'Female',
         'primaryemail'            => 'EWAN1@email.com',
         'secondaryemail'          => 'EWAN2@email.com',
         'primarycontact'          => '111111',
         'secondarycontact'        => '222222',
         'permanentaddress'        => 'Makati City',
         'unit'                    => 'AC',
         'department'              => 'ASP',
         'employeetype'            => 'ADM',
         'employmentstatus'        => 'Casual',
         'rank'                    => 'Accountant I',
         'originalassignment'      => '2014-05-22'
      );
      $this->Admin_model->update_employee("999999999","999999999",$test_edit_employee_data);
      $this->Admin_model->delete_contactsureties("999999999");
      $test_edit_employee = $this->Admin_model->get_employee('999999999');

      $this->unit->run($test_edit_employee['employeenumber'], 'is_string', 'employeenumber - data type is string');
      $this->unit->run($test_edit_employee['employeenumber'], '999999999', 'employeenumber == 999999999');

      $this->unit->run($test_edit_employee['firstname'], 'is_string', 'firstname - data type is string');
      $this->unit->run($test_edit_employee['firstname'], 'FARST', 'firstname == FARST');

      $this->unit->run($test_edit_employee['middlename'], 'is_string', 'middlename - data type is string');
      $this->unit->run($test_edit_employee['middlename'], 'MIDAL', 'middlename == MIDAL');

      $this->unit->run($test_edit_employee['lastname'], 'is_string', 'lastname - data type is string');
      $this->unit->run($test_edit_employee['lastname'], 'LOST', 'lastname == LOST');

      $this->unit->run($test_edit_employee['suffix'], 'is_string', 'suffix - data type is string');
      $this->unit->run($test_edit_employee['suffix'], 'SAPIKS', 'suffix == SAPIKS');

      $this->unit->run($test_edit_employee['birthdate'], 'is_string', 'birthdate - data type is string');
      $this->unit->run($test_edit_employee['birthdate'], '1996-10-01', 'birthdate == 1996-10-01');

      $this->unit->run($test_edit_employee['gender'], 'is_string', 'gender - data type is string');
      $this->unit->run($test_edit_employee['gender'], 'Female', 'gender == Female');

      $this->unit->run($test_edit_employee['primaryemail'], 'is_string', 'primaryemail - data type is string');
      $this->unit->run($test_edit_employee['primaryemail'], 'EWAN1@email.com', 'primaryemail == EWAN1@email.com');

      $this->unit->run($test_edit_employee['secondaryemail'], 'is_string', 'secondaryemail - data type is string');
      $this->unit->run($test_edit_employee['secondaryemail'], 'EWAN2@email.com', 'secondaryemail == EWAN2@email.com');

      $this->unit->run($test_edit_employee['primarycontact'], 'is_string', 'primarycontact - data type is string');
      $this->unit->run($test_edit_employee['primarycontact'], '111111', 'primarycontact == 111111');

      $this->unit->run($test_edit_employee['secondarycontact'], 'is_string', 'secondarycontact - data type is string');
      $this->unit->run($test_edit_employee['secondarycontact'], '222222', 'secondarycontact == 222222');

      $this->unit->run($test_edit_employee['permanentaddress'], 'is_string', 'permanentaddress - data type is string');
      $this->unit->run($test_edit_employee['permanentaddress'], 'Makati City', 'permanentaddress == Makati City');

      $this->unit->run($test_edit_employee['unit'], 'is_string', 'unit - data type is string');
      $this->unit->run($test_edit_employee['unit'], 'AC', 'unit == AC');

      $this->unit->run($test_edit_employee['department'], 'is_string', 'department - data type is string');
      $this->unit->run($test_edit_employee['department'], 'ASP', 'department == ASP');

      $this->unit->run($test_edit_employee['employeetype'], 'is_string', 'employeetype - data type is string');
      $this->unit->run($test_edit_employee['employeetype'], 'ADM', 'employeetype == ADM');

      $this->unit->run($test_edit_employee['employmentstatus'], 'is_string', 'employmentstatus - data type is string');
      $this->unit->run($test_edit_employee['employmentstatus'], 'Casual', 'employmentstatus == Casual');

      $this->unit->run($test_edit_employee['rank'], 'is_string', 'rank - data type is string');
      $this->unit->run($test_edit_employee['rank'], 'Accountant I', 'rank == Accountant I');

      $this->unit->run($test_edit_employee['originalassignment'], 'is_string', 'lastname - data type is string');
      $this->unit->run($test_edit_employee['originalassignment'], '2014-05-22', 'originalassignment == 2014-05-22');

      $test_edit_cs1 = array(
          "name"              => "name10" ,
          "address"           => "address10",
          "contactno"         => "contactno10",
          "email"             => "email10",
          "employeenumber"    => "999999999",
      );
      $this->Admin_model->insert_contactsurety($test_edit_cs1);

      $test_edit_cs2 = array(
          "name"              => "name20" ,
          "address"           => "address20",
          "contactno"         => "contactno20",
          "email"             => "email20",
          "employeenumber"    => "999999999",
      );
      $this->Admin_model->insert_contactsurety($test_edit_cs2);

      $test_edit_cs3 = array(
          "name"              => "name30" ,
          "address"           => "address30",
          "contactno"         => "contactno30",
          "email"             => "email30",
          "employeenumber"    => "999999999",
      );
      $this->Admin_model->insert_contactsurety($test_edit_cs3);

      $test_edit_cs4 = array(
          "name"              => "name40" ,
          "address"           => "address40",
          "contactno"         => "contactno40",
          "email"             => "email40",
          "employeenumber"    => "999999999",
      );
      $this->Admin_model->insert_contactsurety($test_edit_cs4);

      $contacts_edit = $this->Admin_model->get_contacts("999999999");

      $this->unit->run($contacts_edit[0]['name'], 'is_string', 'name - data type is string');
      $this->unit->run($contacts_edit[0]['name'], 'name10', 'name == name10');

      $this->unit->run($contacts_edit[0]['address'], 'is_string', 'address - data type is string');
      $this->unit->run($contacts_edit[0]['address'], 'address10', 'address == address10');

      $this->unit->run($contacts_edit[0]['contactno'], 'is_string', 'contactno - data type is string');
      $this->unit->run($contacts_edit[0]['contactno'], 'contactno10', 'contactno == contactno10');

      $this->unit->run($contacts_edit[0]['email'], 'is_string', 'email - data type is string');
      $this->unit->run($contacts_edit[0]['email'], 'email10', 'email == email10');

      $this->unit->run($contacts_edit[0]['employeenumber'], 'is_string', 'employeenumber - data type is string');
      $this->unit->run($contacts_edit[0]['employeenumber'], '999999999', 'employeenumber == 999999999');

      $this->unit->run($contacts_edit[1]['name'], 'is_string', 'name - data type is string');
      $this->unit->run($contacts_edit[1]['name'], 'name20', 'name == name20');

      $this->unit->run($contacts_edit[1]['address'], 'is_string', 'address - data type is string');
      $this->unit->run($contacts_edit[1]['address'], 'address20', 'address == address20');

      $this->unit->run($contacts_edit[1]['contactno'], 'is_string', 'contactno - data type is string');
      $this->unit->run($contacts_edit[1]['contactno'], 'contactno20', 'contactno == contactno20');

      $this->unit->run($contacts_edit[1]['email'], 'is_string', 'email - data type is string');
      $this->unit->run($contacts_edit[1]['email'], 'email20', 'email == email20');

      $this->unit->run($contacts_edit[1]['employeenumber'], 'is_string', 'employeenumber - data type is string');
      $this->unit->run($contacts_edit[1]['employeenumber'], '999999999', 'employeenumber == 999999999');

      $this->unit->run($contacts_edit[2]['name'], 'is_string', 'name - data type is string');
      $this->unit->run($contacts_edit[2]['name'], 'name30', 'name == name30');

      $this->unit->run($contacts_edit[2]['address'], 'is_string', 'address - data type is string');
      $this->unit->run($contacts_edit[2]['address'], 'address30', 'address == address30');

      $this->unit->run($contacts_edit[2]['contactno'], 'is_string', 'contactno - data type is string');
      $this->unit->run($contacts_edit[2]['contactno'], 'contactno30', 'contactno == contactno30');

      $this->unit->run($contacts_edit[2]['email'], 'is_string', 'email - data type is string');
      $this->unit->run($contacts_edit[2]['email'], 'email30', 'email == email30');

      $this->unit->run($contacts_edit[2]['employeenumber'], 'is_string', 'employeenumber - data type is string');
      $this->unit->run($contacts_edit[2]['employeenumber'], '999999999', 'employeenumber == 999999999');

      $this->unit->run($contacts_edit[3]['name'], 'is_string', 'name - data type is string');
      $this->unit->run($contacts_edit[3]['name'], 'name40', 'name == name40');

      $this->unit->run($contacts_edit[3]['address'], 'is_string', 'address - data type is string');
      $this->unit->run($contacts_edit[3]['address'], 'address40', 'address == address40');

      $this->unit->run($contacts_edit[3]['contactno'], 'is_string', 'contactno - data type is string');
      $this->unit->run($contacts_edit[3]['contactno'], 'contactno40', 'contactno == contactno40');

      $this->unit->run($contacts_edit[3]['email'], 'is_string', 'email - data type is string');
      $this->unit->run($contacts_edit[3]['email'], 'email40', 'email == email40');

      $this->unit->run($contacts_edit[3]['employeenumber'], 'is_string', 'employeenumber - data type is string');
      $this->unit->run($contacts_edit[3]['employeenumber'], '999999999', 'employeenumber == 999999999');

      //DELETE EMPLOYEE
      $this->Admin_model->delete_employee("999999999");

      $data = array('report' => $this->unit->report());
      $this->load->view('test_report.php', $data);
    }
    else
    {
      $this->unit->run($this->session->userdata('loginadmin'), 'is_null', 'loginadmin - data type is NULL');

      $data = array('report' => $this->unit->report());
      $this->load->view('test_report.php', $data);
    }
  }

  public function admin_transactions_test()
  {
    if ($this->session->userdata('loginadmin') == TRUE)
    {
      //ADMIN TEST
      $this->unit->run($this->session->userdata('loginadmin'), 'is_bool', 'loginadmin - data type is boolean');
      $this->unit->run($this->session->userdata('loginadmin'), TRUE, 'loginadmin == TRUE');

      $adminnumber = $this->session->userdata('username');
      $admin = $this->Admin_model->get_admin($adminnumber);

      $this->unit->run($admin['firstname'], 'is_string', 'firstname - data type is string');
      $this->unit->run($admin['firstname'], 'Paola', 'firstname == Paola');

      $this->unit->run($admin['middleinitial'], 'is_string', 'middleinitial - data type is string');
      $this->unit->run($admin['middleinitial'], 'T', 'middleinitial == T');

      $this->unit->run($admin['lastname'], 'is_string', 'lastname - data type is string');
      $this->unit->run($admin['lastname'], 'Simon', 'lastname == Simon');

      $this->unit->run($admin['adminnumber'], 'is_string', 'adminnumber - data type is string');
      $this->unit->run($admin['adminnumber'], '2000-00001', 'adminnumber == 2000-00001');

      $data = array('report' => $this->unit->report());
      $this->load->view('test_report.php', $data);
    }
    else
    {
      $this->unit->run($this->session->userdata('loginadmin'), 'is_null', 'loginadmin - data type is NULL');

      $data = array('report' => $this->unit->report());
      $this->load->view('test_report.php', $data);
    }
  }

  public function admin_edit_transactions_test()
  {
    if ($this->session->userdata('loginadmin') == TRUE)
    {
      //ADMIN TEST
      $this->unit->run($this->session->userdata('loginadmin'), 'is_bool', 'loginadmin - data type is boolean');
      $this->unit->run($this->session->userdata('loginadmin'), TRUE, 'loginadmin == TRUE');

      $adminnumber = $this->session->userdata('username');
      $admin = $this->Admin_model->get_admin($adminnumber);

      $this->unit->run($admin['firstname'], 'is_string', 'firstname - data type is string');
      $this->unit->run($admin['firstname'], 'Paola', 'firstname == Paola');

      $this->unit->run($admin['middleinitial'], 'is_string', 'middleinitial - data type is string');
      $this->unit->run($admin['middleinitial'], 'T', 'middleinitial == T');

      $this->unit->run($admin['lastname'], 'is_string', 'lastname - data type is string');
      $this->unit->run($admin['lastname'], 'Simon', 'lastname == Simon');

      $this->unit->run($admin['adminnumber'], 'is_string', 'adminnumber - data type is string');
      $this->unit->run($admin['adminnumber'], '2000-00001', 'adminnumber == 2000-00001');

      //CREATE TEST TRANSACTION
      $test_transaction_data = array(
         'transactionnumber'  => "9999999",
         'employeenumber'     => "123456789",
         'applicationdate'    => "2020-01-01",
         'leavetype'          => "Study Leave with Pay",
         'leavedetails'       => 'Full-Time',
         'leavestatus'        => 'Original',
         'developmenttype'    => 'Master of Science',
         'degreepursued'      => 'Computer Science',
         'institution'        => 'Harvard University',
         'location'           => 'South Carolina',
         'country'            => 'Albania',
         'sponsordonor'       => 'Willie Revillame',
         'localabroad'        => 'Abroad',
         'startdate'          => '2014-08-02',
         'enddate'            => '2018-06-02',
         'duration'           => '4year/s-2month/s-0day/s',
         'reportforduty'      => '2018-06-03',
         'rso'                => '8year/s-4month/s-0day/s',
         'rsostatus'          => 'Unserved'
      );
      $this->Admin_model->insert_application($test_transaction_data);
      $test_transaction = $this->Admin_model->get_transaction_individual('9999999');

      $this->unit->run($test_transaction['transactionnumber'], 'is_string', 'transactionnumber - data type is string');
      $this->unit->run($test_transaction['transactionnumber'], '9999999', 'transactionnumber == 9999999');

      $this->unit->run($test_transaction['employeenumber'], 'is_string', 'employeenumber - data type is string');
      $this->unit->run($test_transaction['employeenumber'], '123456789', 'employeenumber == 123456789');

      $this->unit->run($test_transaction['applicationdate'], 'is_string', 'applicationdate - data type is string');
      $this->unit->run($test_transaction['applicationdate'], '2020-01-01', 'applicationdate == 2020-01-01');

      $this->unit->run($test_transaction['leavetype'], 'is_string', 'leavetype - data type is string');
      $this->unit->run($test_transaction['leavetype'], 'Study Leave with Pay', 'leavetype == Study Leave with Pay');

      $this->unit->run($test_transaction['leavedetails'], 'is_string', 'leavedetails - data type is string');
      $this->unit->run($test_transaction['leavedetails'], 'Full-Time', 'leavedetails == Full-Time');

      $this->unit->run($test_transaction['leavestatus'], 'is_string', 'leavestatus - data type is string');
      $this->unit->run($test_transaction['leavestatus'], 'Original', 'leavestatus == Original');

      $this->unit->run($test_transaction['developmenttype'], 'is_string', 'developmenttype - data type is string');
      $this->unit->run($test_transaction['developmenttype'], 'Master of Science', 'developmenttype == Master of Science');

      $this->unit->run($test_transaction['degreepursued'], 'is_string', 'degreepursued - data type is string');
      $this->unit->run($test_transaction['degreepursued'], 'Computer Science', 'degreepursued == Computer Science');

      $this->unit->run($test_transaction['institution'], 'is_string', 'institution - data type is string');
      $this->unit->run($test_transaction['institution'], 'Harvard University', 'institution == Harvard University');

      $this->unit->run($test_transaction['location'], 'is_string', 'location - data type is string');
      $this->unit->run($test_transaction['location'], 'South Carolina', 'location == South Carolina');

      $this->unit->run($test_transaction['country'], 'is_string', 'country - data type is string');
      $this->unit->run($test_transaction['country'], 'Albania', 'country == Albania');

      $this->unit->run($test_transaction['sponsordonor'], 'is_string', 'sponsordonor - data type is string');
      $this->unit->run($test_transaction['sponsordonor'], 'Willie Revillame', 'sponsordonor == Willie Revillame');

      $this->unit->run($test_transaction['localabroad'], 'is_string', 'localabroad - data type is string');
      $this->unit->run($test_transaction['localabroad'], 'Abroad', 'localabroad == Abroad');

      $this->unit->run($test_transaction['startdate'], 'is_string', 'startdate - data type is string');
      $this->unit->run($test_transaction['startdate'], '2014-08-02', 'startdate == 2014-08-02');

      $this->unit->run($test_transaction['enddate'], 'is_string', 'enddate - data type is string');
      $this->unit->run($test_transaction['enddate'], '2018-06-02', 'enddate == 2018-06-02');

      $this->unit->run($test_transaction['duration'], 'is_string', 'duration - data type is string');
      $this->unit->run($test_transaction['duration'], '4year/s-2month/s-0day/s', 'duration == 4year/s-2month/s-0day/s');

      $this->unit->run($test_transaction['reportforduty'], 'is_string', 'reportforduty - data type is string');
      $this->unit->run($test_transaction['reportforduty'], '2018-06-03', 'reportforduty == 2018-06-03');

      $this->unit->run($test_transaction['rso'], 'is_string', 'rso - data type is string');
      $this->unit->run($test_transaction['rso'], '8year/s-4month/s-0day/s', 'rso == 8year/s-4month/s-0day/s');

      $this->unit->run($test_transaction['rsostatus'], 'is_string', 'rsostatus - data type is string');
      $this->unit->run($test_transaction['rsostatus'], 'Unserved', 'rsostatus == Unserved');

      //EDIT TRANSACTION
      $test_edit_transaction_data = array(
         'transactionnumber'  => "9999999",
         'employeenumber'     => "123456789",
         'applicationdate'    => "2020-01-01",
         'leavetype'          => "Study Leave without Pay",
         'leavedetails'       => 'Half-Day',
         'leavestatus'        => 'Original',
         'developmenttype'    => 'Master of Science',
         'degreepursued'      => 'Industrial Engineering',
         'institution'        => 'Oxford University',
         'location'           => 'Texas',
         'country'            => 'Egypt',
         'sponsordonor'       => 'Barack Obama',
         'localabroad'        => 'Local',
         'startdate'          => '2014-08-02',
         'enddate'            => '2018-06-02',
         'duration'           => '25year/s-2month/s-0day/s',
         'reportforduty'      => '2018-06-03',
         'rso'                => '50year/s-4month/s-0day/s',
         'rsostatus'          => 'Served'
      );
      $this->Admin_model->update_transaction('9999999', $test_edit_transaction_data);
      $test_edit_transaction = $this->Admin_model->get_transaction_individual('9999999');

      $this->unit->run($test_edit_transaction['transactionnumber'], 'is_string', 'transactionnumber - data type is string');
      $this->unit->run($test_edit_transaction['transactionnumber'], '9999999', 'transactionnumber == 9999999');

      $this->unit->run($test_edit_transaction['employeenumber'], 'is_string', 'employeenumber - data type is string');
      $this->unit->run($test_edit_transaction['employeenumber'], '123456789', 'employeenumber == 123456789');

      $this->unit->run($test_edit_transaction['applicationdate'], 'is_string', 'applicationdate - data type is string');
      $this->unit->run($test_edit_transaction['applicationdate'], '2020-01-01', 'applicationdate == 2020-01-01');

      $this->unit->run($test_edit_transaction['leavetype'], 'is_string', 'leavetype - data type is string');
      $this->unit->run($test_edit_transaction['leavetype'], 'Study Leave without Pay', 'leavetype == Study Leave without Pay');

      $this->unit->run($test_edit_transaction['leavedetails'], 'is_string', 'leavedetails - data type is string');
      $this->unit->run($test_edit_transaction['leavedetails'], 'Half-Day', 'leavedetails == Half-Day');

      $this->unit->run($test_edit_transaction['leavestatus'], 'is_string', 'leavestatus - data type is string');
      $this->unit->run($test_edit_transaction['leavestatus'], 'Original', 'leavestatus == Original');

      $this->unit->run($test_edit_transaction['developmenttype'], 'is_string', 'developmenttype - data type is string');
      $this->unit->run($test_edit_transaction['developmenttype'], 'Master of Science', 'developmenttype == Master of Science');

      $this->unit->run($test_edit_transaction['degreepursued'], 'is_string', 'degreepursued - data type is string');
      $this->unit->run($test_edit_transaction['degreepursued'], 'Industrial Engineering', 'degreepursued == Industrial Engineering');

      $this->unit->run($test_edit_transaction['institution'], 'is_string', 'institution - data type is string');
      $this->unit->run($test_edit_transaction['institution'], 'Oxford University', 'institution == Oxford University');

      $this->unit->run($test_edit_transaction['location'], 'is_string', 'location - data type is string');
      $this->unit->run($test_edit_transaction['location'], 'Texas', 'location == Texas');

      $this->unit->run($test_edit_transaction['country'], 'is_string', 'country - data type is string');
      $this->unit->run($test_edit_transaction['country'], 'Egypt', 'country == Egypt');

      $this->unit->run($test_edit_transaction['sponsordonor'], 'is_string', 'sponsordonor - data type is string');
      $this->unit->run($test_edit_transaction['sponsordonor'], 'Barack Obama', 'sponsordonor == Barack Obama');

      $this->unit->run($test_edit_transaction['localabroad'], 'is_string', 'localabroad - data type is string');
      $this->unit->run($test_edit_transaction['localabroad'], 'Local', 'localabroad == Local');

      $this->unit->run($test_edit_transaction['startdate'], 'is_string', 'startdate - data type is string');
      $this->unit->run($test_edit_transaction['startdate'], '2014-08-02', 'startdate == 2014-08-02');

      $this->unit->run($test_edit_transaction['enddate'], 'is_string', 'enddate - data type is string');
      $this->unit->run($test_edit_transaction['enddate'], '2018-06-02', 'enddate == 2018-06-02');

      $this->unit->run($test_edit_transaction['duration'], 'is_string', 'duration - data type is string');
      $this->unit->run($test_edit_transaction['duration'], '25year/s-2month/s-0day/s', 'duration == 25year/s-2month/s-0day/s');

      $this->unit->run($test_edit_transaction['reportforduty'], 'is_string', 'reportforduty - data type is string');
      $this->unit->run($test_edit_transaction['reportforduty'], '2018-06-03', 'reportforduty == 2018-06-03');

      $this->unit->run($test_edit_transaction['rso'], 'is_string', 'rso - data type is string');
      $this->unit->run($test_edit_transaction['rso'], '50year/s-4month/s-0day/s', 'rso == 50year/s-4month/s-0day/s');

      $this->unit->run($test_edit_transaction['rsostatus'], 'is_string', 'rsostatus - data type is string');
      $this->unit->run($test_edit_transaction['rsostatus'], 'Served', 'rsostatus == Served');

      //DELETE TRANSACTION
      $this->Admin_model->delete_transaction('9999999');

      $data = array('report' => $this->unit->report());
      $this->load->view('test_report.php', $data);

    }
    else
    {
      $this->unit->run($this->session->userdata('loginadmin'), 'is_null', 'loginadmin - data type is NULL');

      $data = array('report' => $this->unit->report());
      $this->load->view('test_report.php', $data);
    }
  }

  public function admin_change_password_test()
  {
    if ($this->session->userdata('loginadmin') == TRUE)
    {
      //ADMIN TEST
      $this->unit->run($this->session->userdata('loginadmin'), 'is_bool', 'loginadmin - data type is boolean');
      $this->unit->run($this->session->userdata('loginadmin'), TRUE, 'loginadmin == TRUE');

      $adminnumber = $this->session->userdata('username');
      $admin = $this->Admin_model->get_admin($adminnumber);

      $this->unit->run($admin['firstname'], 'is_string', 'firstname - data type is string');
      $this->unit->run($admin['firstname'], 'Paola', 'firstname == Paola');

      $this->unit->run($admin['middleinitial'], 'is_string', 'middleinitial - data type is string');
      $this->unit->run($admin['middleinitial'], 'T', 'middleinitial == T');

      $this->unit->run($admin['lastname'], 'is_string', 'lastname - data type is string');
      $this->unit->run($admin['lastname'], 'Simon', 'lastname == Simon');

      $this->unit->run($admin['adminnumber'], 'is_string', 'adminnumber - data type is string');
      $this->unit->run($admin['adminnumber'], '2000-00001', 'adminnumber == 2000-00001');

      //CREATE TEST ADMIN
      $this->Admin_login_model->add_admin("2000-99999", 'password', 'f', 'm', 'l');
      $test_admin = $this->Admin_model->get_admin("2000-99999");

      $this->unit->run($test_admin['firstname'], 'is_string', 'firstname - data type is string');
      $this->unit->run($test_admin['firstname'], 'f', 'firstname == f');

      $this->unit->run($test_admin['middleinitial'], 'is_string', 'middleinitial - data type is string');
      $this->unit->run($test_admin['middleinitial'], 'm', 'middleinitial == m');

      $this->unit->run($test_admin['lastname'], 'is_string', 'lastname - data type is string');
      $this->unit->run($test_admin['lastname'], 'l', 'lastname == l');

      $this->unit->run($test_admin['adminnumber'], 'is_string', 'adminnumber - data type is string');
      $this->unit->run($test_admin['adminnumber'], '2000-99999', 'adminnumber == 2000-99999');

      $this->unit->run($test_admin['password'], 'is_string', 'password - data type is string');
      $this->unit->run($test_admin['password'], hash("sha256","password"), 'password == hash("sha256","password")');

      //CHANGE PASSWORD
      $this->Admin_login_model->change_password('2000-99999', "password", "TEST_PASSWORD");
      $admin = $this->Admin_model->get_admin('2000-99999');
      $this->unit->run($admin['password'], 'is_string', 'password - data type is string');
      $this->unit->run($admin['password'], hash("sha256","TEST_PASSWORD"), 'password == hash("sha256","TEST_PASSWORD")');

      $this->Admin_login_model->change_password('2000-99999', "TEST_PASSWORD", "password");
      $admin = $this->Admin_model->get_admin('2000-99999');
      $this->unit->run($admin['password'], 'is_string', 'password - data type is string');
      $this->unit->run($admin['password'], hash("sha256","password"), 'password == hash("sha256","password")');

      //DELETE ADMIN
      $this->Admin_login_model->delete_admin('2000-99999');

      $data = array('report' => $this->unit->report());
      $this->load->view('test_report.php', $data);
    }
    else
    {
      $this->unit->run($this->session->userdata('loginadmin'), 'is_null', 'loginadmin - data type is NULL');

      $data = array('report' => $this->unit->report());
      $this->load->view('test_report.php', $data);
    }
  }

  public function employee_evaluation_test()
  {
    $eval_url = base_url('application/views/supplements/Evaluate.php');
    include($eval_url);
    $test_eval_sl = Eval_SL(1, array());
    $test_eval_dsf = Eval_DSF(1, array());
    $test_eval_sab = Eval_Sab(1, array());
    $test_eval_sd = Eval_SD(1, array());
    $test_eval_ep = Eval_EP(1, array());
    
    // TEST EVAL_SL
    $this->unit->run($test_eval_sl[0], 'is_string', 'w_pay - data type is string');
    $this->unit->run($test_eval_sl[0], 'SLWOP', 'w_pay == "SLWOP"');
    
    $this->unit->run($test_eval_sl[1], 'is_string', 'loc_ab - data type is string');
    $this->unit->run($test_eval_sl[1], 'local', 'loc_ab == local');
    
    $this->unit->run($test_eval_sl[2], 'is_int', 'rank - data type is integer');
    $this->unit->run($test_eval_sl[2], 0, 'rank == 0');
    
    $this->unit->run($test_eval_sl[3], 'is_int', 'service - data type is integer');
    $this->unit->run($test_eval_sl[3], 0, 'service == 0');
    
    $this->unit->run($test_eval_sl[4], 'is_string', 'subs - data type is string');
    $this->unit->run($test_eval_sl[4], 'Y', 'subs == Y');
    
    $this->unit->run($test_eval_sl[5], 'is_string', 'tenure - data type is string');
    $this->unit->run($test_eval_sl[5], 'N', 'tenure == N');
    
    $this->unit->run($test_eval_sl[6], 'is_int', 'age - data type is integer');
    $this->unit->run($test_eval_sl[6], 0, 'age == 0');
    
    // TEST EVAL_DSF
    $this->unit->run($test_eval_dsf[0], 'is_string', 'w_pay - data type is string');
    $this->unit->run($test_eval_dsf[0], 'SDWOP', 'w_pay == "SDWOP"');
    
    $this->unit->run($test_eval_dsf[1], 'is_string', 'loc_ab - data type is string');
    $this->unit->run($test_eval_dsf[1], 'local', 'loc_ab == local');
    
    $this->unit->run($test_eval_dsf[2], 'is_int', 'rank - data type is integer');
    $this->unit->run($test_eval_dsf[2], 0, 'rank == 0');
    
    $this->unit->run($test_eval_dsf[3], 'is_int', 'service - data type is integer');
    $this->unit->run($test_eval_dsf[3], 0, 'service == 0');
    
    $this->unit->run($test_eval_dsf[4], 'is_string', 'subs - data type is string');
    $this->unit->run($test_eval_dsf[4], 'Y', 'subs == Y');
    
    $this->unit->run($test_eval_dsf[5], 'is_string', 'tenure - data type is string');
    $this->unit->run($test_eval_dsf[5], 'N', 'tenure == N');
    
    $this->unit->run($test_eval_dsf[6], 'is_int', 'age - data type is integer');
    $this->unit->run($test_eval_dsf[6], 0, 'age == 0');
    
    // TEST EVAL_SAB
    $this->unit->run($test_eval_sab[0], 'is_int', 'service - data type is integer');
    $this->unit->run($test_eval_sab[0], 0, 'service == 0');
    
    $this->unit->run($test_eval_sab[1], 'is_int', 'eff - data type is integer');
    $this->unit->run($test_eval_sab[1], 0, 'eff == 0');
    
    $this->unit->run($test_eval_sab[2], 'is_int', 'age - data type is integer');
    $this->unit->run($test_eval_sab[2], 0, 'age == 0');
    
    // TEST EVAL_SD
    $this->unit->run($test_eval_sd[0], 'is_string', 'w_pay - data type is string');
    $this->unit->run($test_eval_sd[0], 'SLWOP', 'w_pay == "SLWOP"');
    
    $this->unit->run($test_eval_sd[1], 'is_string', 'loc_ab - data type is string');
    $this->unit->run($test_eval_sd[1], 'local', 'loc_ab == local');
    
    $this->unit->run($test_eval_sd[2], 'is_string', 'startDate - data type is string');
    $this->unit->run($test_eval_sd[2], '01/01/1980', 'startDate == 01/01/1980');
    
    $this->unit->run($test_eval_sd[3], 'is_string', 'endDate - data type is string');
    $this->unit->run($test_eval_sd[3], '12/12/2030', 'endDate == 12/12/2030');
    
    $this->unit->run($test_eval_sd[4], 'is_int', 'abs - data type is integer');
    $this->unit->run($test_eval_sd[4], 0, 'abs == 0');
    
    // TEST EVAL_EP
    $this->unit->run($test_eval_ep[0], 'is_string', 'loc_ab - data type is string');
    $this->unit->run($test_eval_ep[0], 'local', 'loc_ab == local');
    
    $this->unit->run($test_eval_ep[1], 'is_string', 'emptype - data type is string');
    $this->unit->run($test_eval_ep[1], 'faculty', 'emptype == faculty');
    
    $this->unit->run($test_eval_ep[2], 'is_int', 'units_t - data type is integer');
    $this->unit->run($test_eval_ep[2], 0, 'units_t == 0');
    
    $this->unit->run($test_eval_ep[3], 'is_int', 'units_s - data type is integer');
    $this->unit->run($test_eval_ep[3], 0, 'units_s == 0');

    $data = array('report' => $this->unit->report());
    $this->load->view('test_report.php', $data);
  }

  public function admin_rso_test()
  {
    if ($this->session->userdata('loginadmin') == TRUE)
    {
      //ADMIN TEST
      $this->unit->run($this->session->userdata('loginadmin'), 'is_bool', 'loginadmin - data type is boolean');
      $this->unit->run($this->session->userdata('loginadmin'), TRUE, 'loginadmin == TRUE');

      $adminnumber = $this->session->userdata('username');
      $admin = $this->Admin_model->get_admin($adminnumber);

      $this->unit->run($admin['firstname'], 'is_string', 'firstname - data type is string');
      $this->unit->run($admin['firstname'], 'Paola', 'firstname == Paola');

      $this->unit->run($admin['middleinitial'], 'is_string', 'middleinitial - data type is string');
      $this->unit->run($admin['middleinitial'], 'T', 'middleinitial == T');

      $this->unit->run($admin['lastname'], 'is_string', 'lastname - data type is string');
      $this->unit->run($admin['lastname'], 'Simon', 'lastname == Simon');

      $this->unit->run($admin['adminnumber'], 'is_string', 'adminnumber - data type is string');
      $this->unit->run($admin['adminnumber'], '2000-00001', 'adminnumber == 2000-00001');

      $data = array('report' => $this->unit->report());
      $this->load->view('test_report.php', $data);
    }
    else
    {
      $this->unit->run($this->session->userdata('loginadmin'), 'is_null', 'loginadmin - data type is NULL');

      $data = array('report' => $this->unit->report());
      $this->load->view('test_report.php', $data);
    }
  }
}?>
