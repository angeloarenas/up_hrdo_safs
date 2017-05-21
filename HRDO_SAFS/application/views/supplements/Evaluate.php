<?php
	function Eval_SL($test, $arr) {
		$flag = 0;
		$w_pay = "SLWOP";
		if (isset($_POST['paidInp_0'])) {
			$w_pay = "SLWP";
            if (isset($_POST['rank']))
            {
			    if ($_POST['rank'] <= 2)
				    $flag = 0;
            }
            else
                $flag = 0;
		}
		else
			$w_pay = "SLWOP";
		$loc_ab = "local";
    if (isset($_POST['areaInp_0']))
			$loc_ab = $_POST['areaInp_0'];
		$rank = 0;
		if (isset($_POST['rank']))
			$rank = $_POST['rank'];
		$service = 0;
		if (isset($_POST['servYear']))
			$service = $_POST['servYear'];
		$subs = "Y";
		if (isset($_POST['subs']))
			$subs = $_POST['subs'];
		$tenure = "N";
		if (isset($_POST['tenured']))
			$tenure = $_POST['tenured'];
		$age = 0;
    if (isset($_POST['birthday']))
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
        if ($test == 1)
        {
            array_push($arr, $w_pay);
            array_push($arr, $loc_ab);
            array_push($arr, $rank);
            array_push($arr, $service);
            array_push($arr, $subs);
            array_push($arr, $tenure);
            array_push($arr, $age);
            return $arr;
        }
	}

	function Eval_DSF($test, $arr) {
		$flag = 0;
		$w_pay = "";
		if (isset($_POST['paidInp_0']))
			$w_pay = "SDWP";
		else
			$w_pay = "SDWOP";
		$loc_ab = "local";
    if (isset($_POST['areaInp_0']))
			$loc_ab = $_POST['areaInp_0'];
		$rank = 0;
		if (isset($_POST['rank']))
			$rank = $_POST['rank'];
		$service = 0;
		if (isset($_POST['servYear']))
			$service = $_POST['servYear'];
		$subs = "Y";
		if (isset($_POST['subs']))
			$subs = $_POST['subs'];
		$tenure = "N";
		if (isset($_POST['tenured']))
			$tenure = $_POST['tenured'];
		$age = 0;
    if (isset($_POST['birthday']))
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
        if ($test == 1)
        {
            array_push($arr, $w_pay);
            array_push($arr, $loc_ab);
            array_push($arr, $rank);
            array_push($arr, $service);
            array_push($arr, $subs);
            array_push($arr, $tenure);
            array_push($arr, $age);
            return $arr;
        }
	}

  function Eval_Sab($test, $arr) {
		$flag = 0;
		$service = 0;
    if (isset($_POST['servYear']))
			$service = $_POST['servYear'];
    $eff = 0;
    if (isset($_POST['effectStart']))
			$eff = date('Y', strtotime($_POST['effectStart'])) - date('Y', time());
    $age = 0;
    if (isset($_POST['birthday']))
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
        if ($test == 1)
        {
            array_push($arr, $service);
            array_push($arr, $eff);
            array_push($arr, $age);
            return $arr;
        }
	}

  function Eval_SD($test, $arr) {
		$flag = 0;
		$w_pay = "";
		if (isset($_POST['paidInp_0'])) {
			$w_pay = "SLWP";
		}
		else
			$w_pay = "SLWOP";
		$loc_ab = "local";
    if (isset($_POST['areaInp_0']))
			$loc_ab = $_POST['areaInp_0'];
    $startDate = "01/01/1980";
    if (isset($_POST['schedStart']))
			$startDate = $_POST['schedStart'];
    $endDate = "12/12/2030";
    if (isset($_POST['schedEnd']))
			$endDate = $_POST['schedEnd'];
		$abs = 0;
    if (isset($_POST['missed']))
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
        if ($test == 1)
        {
            array_push($arr, $w_pay);
            array_push($arr, $loc_ab);
            array_push($arr, $startDate);
            array_push($arr, $endDate);
            array_push($arr, $abs);
            return $arr;
        }
	}

  function Eval_EP($test, $arr) {
		$flag = 0;
		$loc_ab = "local";
    if (isset($_POST['areaInp_0']))
			$loc_ab = $_POST['areaInp_0'];
    $emptype = "faculty";
    if (isset($_POST['emptype']))
			$emptype = $_POST['emptype'];
    $units_t = 0;
    if (isset($_POST['teachunits']))
			$units_t = $_POST['teachunits'];
    $units_s = 0;
   	if (isset($_POST['studyunits']))
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
        if ($test == 1)
        {
            array_push($arr, $loc_ab);
            array_push($arr, $emptype);
            array_push($arr, $units_t);
            array_push($arr, $units_s);
            return $arr;
        }
	}
?>