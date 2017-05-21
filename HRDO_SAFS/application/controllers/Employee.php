<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee extends CI_Controller
{
	  public function __construct()
	  {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		//load the login model
	  }

	  public function index()
	  {
		$this->load->view('employee_landing_page.php');
	  }

	  public function landing_page()
	  {
		$this->load->view('employee_landing_page.php');
	  }

	  public function evaluation_form()
	  {
		$this->load->view('employee_evaluation_form.php');
	  }

	  public function study_leave()
	  {
		$this->load->view('employee_studyleave_qualifications.php');
	  }

	  public function doctoral_studies()
	  {
		$this->load->view('employee_dsf_qualifications.php');
	  }

	  public function sabbatical()
	  {
		$this->load->view('employee_sabbatical_qualifications.php');
	  }

	  public function special_detail()
	  {
		$this->load->view('employee_specialdetail_qualifications.php');
	  }

	  public function enrollment_privileges()
	  {
		$this->load->view('employee_enrollment_qualifications.php');
	  }
	
		public function eval_sl()
		{
			$flag = 0;
			$w_pay = "";
			if (isset($_POST['paidInp_0'])) {
				$w_pay = "SLWP";
				if ($_POST['rank'] <= 2)
					$flag = 0;
			}
			else
				$w_pay = "SLWOP";
			$loc_ab = $_POST['areaInp_0'];
			$rank = 0;
			if (isset($_POST['rank']))
				$rank = $_POST['rank'];
			$service = $_POST['servYear'];
			$subs = $_POST['subs'];
			$tenure = $_POST['tenured'];
			$age = date('Y', time()) - date('Y', strtotime($_POST['birthday']));
			$error = array();

			if (($rank > 2) && ($service >= 1) && ($subs == "N") && ($tenure == "Y") && ($age <= 40))
				$flag = 1;
			else
			{
				if ($rank <= 2)
					array_push($error, "Must be a Faculty/Associate Prof. below.");
				if ($service < 1)
					array_push($error, "Service must be at least 1 yr.");
				if ($subs == "Y")
					array_push($error, "Must not be a substitute teacher.");
				if ($tenure == "N")
					array_push($error, "Must be tenured.");
				if ($age > 40)
					array_push($error, "Age has exceeded 40.");
			}

			if ($flag == 1)
			{
				echo "<div class='ui message positive'>
										<div class='header'>You are qualified!</div>
									</div>";
					}
			else
			{
				echo "<div class='ui message negative'>
									<div class='header'>You are not qualified</div>
									<p>Here's why:</p><ul>";
									foreach ($error as $val)
									{
										echo "<li>$val</li>";
									}
				echo "</ul></div>";
			}
		}

		public function eval_dsf()
		{
			$flag = 0;
			$w_pay = "";
			if (isset($_POST['paidInp_0']))
				$w_pay = "SDWP";
			else
				$w_pay = "SDWOP";
			$loc_ab = $_POST['areaInp_0'];
			$rank = 0;
			if (isset($_POST['rank']))
				$rank = $_POST['rank'];
			$service = $_POST['servYear'];
			$subs = $_POST['subs'];
			$tenure = $_POST['tenured'];
			$age = date('Y', time()) - date('Y', strtotime($_POST['birthday']));
			$error = array();

			if (($rank > 2) && ($service >= 1) && ($subs == "N") && ($tenure == "Y") && ($age <= 40))
				$flag = 1;
			else
			{
				if ($rank <= 2)
					array_push($error, "Must be a Faculty/Associate Prof. below.");
				if ($service < 1)
					array_push($error, "Service must be at least 1 yr.");
				if ($subs == "Y")
					array_push($error, "Must not be a substitute teacher.");
				if ($tenure == "N")
					array_push($error, "Must be tenured.");
				if ($age > 40)
					array_push($error, "Age has exceeded 40.");
			}

			if ($flag == 1)
			{
				echo "<div class='ui message success'>
										<div class='header'>You are qualified!</div>
									</div>";
					}
			else
			{
				echo "<div class='ui message negative'>
									<div class='header'>You are not qualified</div>
									<p>Here's why:</p><ul>";
									foreach ($error as $val)
									{
										echo "<li>$val</li>";
									}
				echo "</ul></div>";
			}
		}

		public function eval_sab()
		{
			$flag = 0;
			$service = $_POST['servYear'];
			$eff = date('Y', strtotime($_POST['effectStart'])) - date('Y', time());
			$age = date('Y', time()) - date('Y', strtotime($_POST['birthday']));
			$error = array();

			if (($eff <= 1) && ($service >= 6) && ($age < 63))
				$flag = 1;
			else
			{
				if ($eff > 1)
					array_push($error, "Effectivity must be within 1 year.");
				if ($service < 6)
					array_push($error, "Service must be at least 6 yrs.");
				if ($age >= 63)
					array_push($error, "Age must be younger than 63 years old.");
			}

			if ($flag == 1)
			{
				echo "<div class='ui message success'>
										<div class='header'>You are qualified!</div>
									</div>";
					}
			else
			{
				echo "<div class='ui message negative'>
									<div class='header'>You are not qualified</div>
									<p>Here's why:</p><ul>";
									foreach ($error as $val)
									{
										echo "<li>$val</li>";
									}
				echo "</ul></div>";
			}
		}

		public function eval_sd()
		{
			$flag = 0;
			$w_pay = "";
			if (isset($_POST['paidInp_0'])) {
				$w_pay = "SLWP";
			}
			else
				$w_pay = "SLWOP";
			$loc_ab = $_POST['areaInp_0'];
			$startDate = $_POST['schedStart'];
			$endDate = $_POST['schedEnd'];
			$abs = $_POST['missed'];
			$error = array();

			if ($abs <= 20)
				$flag = 1;
			else
			{
				if ($abs > 20)
					array_push($error, "Exceeded maximum number of absences (20).");
			}

			if ($flag == 1)
			{
				echo "<div class='ui message success'>
										<div class='header'>You are qualified!</div>
									</div>";
					}
			else
			{
				echo "<div class='ui message negative'>
									<div class='header'>You are not qualified</div>
									<p>Here's why:</p><ul>";
									foreach ($error as $val)
									{
										echo "<li>$val</li>";
									}
				echo "</ul></div>";
			}
		}

		public function eval_ep()
		{
			$flag = 0;
			$loc_ab = $_POST['areaInp_0'];
			$emptype = $_POST['emptype'];
			$units_t = $_POST['teachunits'];
			$units_s = $_POST['studyunits'];
			$error = array();

			if ($units_t+$units_s <= 18)
				$flag = 1;
			else
			{
				if ($units_t+$units_s > 18)
					array_push($error, "Exceeded maximum number of units (18).");
			}

			if ($flag == 1)
			{
				echo "<div class='ui message success'>
										<div class='header'>You are qualified!</div>
									</div>";
					}
			else
			{
				echo "<div class='ui message negative'>
									<div class='header'>You are not qualified</div>
									<p>Here's why:</p><ul>";
									foreach ($error as $val)
									{
										echo "<li>$val</li>";
									}
				echo "</ul></div>";
			}
		}

	  public function rso_calculator()
	  {
		$this->load->view('employee_rso_calculator.php');
	  }
}
