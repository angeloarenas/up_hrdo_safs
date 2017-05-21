<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title>Employees - HRDO Sabbatical Manager</title>
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/logo_black_icon.ico'); ?>"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.js"></script>
  <!-- fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <!-- CSS file location -->
  <link href="<?php echo base_url('assets/css/admin_header_footer_sidebar.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css/admin_employees.css'); ?>" rel="stylesheet" type="text/css">
  <link href="https://cdn.datatables.net/1.10.13/css/dataTables.semanticui.min.css" rel="stylesheet">
  <!-- javascript file location -->
  <!--<script src="//code.jquery.com/jquery-1.12.4.js"></script>-->
  <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.13/js/dataTables.semanticui.min.js"></script>

<!--
   <link href= https://cdn.datatables.net/buttons/1.2.4/css/buttons.semanticui.min.css" rel="stylesheet" type="text/css">
   <link href= https://cdn.datatables.net/select/1.2.1/css/select.semanticui.min.css" rel="stylesheet" type="text/css">
   <link href= ../../extensions/Editor/css/editor.semanticui.min.css" rel="stylesheet" type="text/css">



    <script src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.semanticui.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.1/js/dataTables.select.min.js"></script>
    <script src="../../extensions/Editor/js/dataTables.editor.min.js"></script>
    <script src="../../extensions/Editor/js/editor.semanticui.min.js"></script>
 -->
</head>


<body>
<!-- header -->
<?php include('admin_header.php'); ?>

<!-- sidebar -->
<div class="main container">
<div class="ui vertical left visible sidebar menu">
  <div id="profile segment" class="ui basic segment">
    <div class="content">
     <h2 class="ui header">
        <?php echo $admin['firstname']." ". $admin['middleinitial'].". ". $admin['lastname']; ?>
        <div class="sub header">Administrator</div>
        <div class="sub header">Human Resource Development Office</div>
        <div class="sub header"><?php echo $admin['adminnumber'] ?></div>
      </h2>
    </div>
  </div>

  <div class="ui divider"></div>

  <!-- !!!change what menu item is active here!!! -->
  <a href="<?php echo base_url(); ?>admin/ongoingapps" class="side item">
    <i class="red alarm outline icon"></i>
    Ongoing Applications
  </a>
  <a href="<?php echo base_url(); ?>admin/employeelist" class="side item active">
    <i class="red list layout icon"></i>
    Employee List
  </a>
  <a href="<?php echo base_url(); ?>admin/transactionslist" class="side item">
    <i class="red database icon"></i>
    Transactions List
  </a>
  <a href="<?php echo base_url(); ?>admin/changepassword" class="side item">
    <i class="red lock icon"></i>
    Change Password
  </a>
  <a href="<?php echo base_url(); ?>admin/rsocalculator" class="side item" id="calc">
    <i class="red calculator icon"></i>
    RSO Calculator
  </a>
</div>

<!-- THE ACTUAL CONTENT OF THE PAGE HERE!!! -->
<div class="pusher">
  <h1 class="ui header"><i class="list layout icon"></i>Employee List</h1>
  <hr>
  <table id="example" class="ui compact selectable celled table nowrap" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th><center>Employee No.</center></th>
        <th><center>Employee Name</center></th>
        <th><center>Date of Birth</center></th>
        <th><center>Gender</center></th>
        <th><center>Employee Type</center></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($employee_list as $item):?>
      <?php $formatteddate = date("m/d/Y", strtotime($item['birthdate'])); ?>
      <?php echo '
      <tr onclick="window.location='."'".base_url()."admin/employeelist/".$item['employeenumber']."'".'">
        <td><center>'.$item['employeenumber'].'</center></td>
        <td><center>'.$item['lastname'].", ".$item['firstname']." ".$item['middlename']." ".$item['suffix'].'</center></td>
        <td><center>'.$formatteddate.'</center></td>
        <td><center>'.$item['gender'].'</center></td>
        <td><center>'.$item['employeetype'].'</center></td>
      </tr>
      ';?>
      <?php endforeach; ?>
    </tbody>
  </table>
  <br>



  <div class="ui four column doubling stackable grid container">
    <div class="column">
    </div>
    <div class="column">
    </div>
    <div class="column">
    </div>
    <div class="column">
      <div class="ui fluid positive button" id="add_employee_button">
        <i class="add user icon"></i>
        Add Employee
        <div id="add_employee_modal" class="ui long small modal">
          <div class="header">
            <i class="add user icon"></i>Add Employee
          </div>
          <div class="content">
            <div class = "ui form" id = "add_employee_form">
              <h4 class="ui dividing header">Employee Information</h4>
              <div class="fields">
                <div class="three wide required field">
                  <label>Employee No.</label>
                  <input id="employeenumber" type="text" name="employee_no" maxlength="9" placeholder="123456789">
                </div>
                <div class="four wide required field">
                  <label>Last Name</label>
                  <input id="lastname" type="text" name="employee_ln" placeholder="Last Name">
                </div>
                <div class="four wide required field">
                  <label>First Name</label>
                  <input id="firstname" type="text" name="employee_fn" placeholder="First Name">
                </div>
                <div class="two wide required field">
                  <label>Suffix</label>
                  <input id="suffix" type="text" name="employee_s" value="" placeholder="Suffix">
                </div>
                <div class="three wide required field">
                  <label>Middle Name</label>
                  <input id="middlename" type="text" name="employee_mn" placeholder="Middle Name">
                </div>
              </div>
              <div class="two required fields">
                <div class="field">
                  <label>Date of Birth</label>
                  <input id="birthdate" type="date" name="date_of_birth" maxlength="10" placeholder="mm/dd/yyyy">
                </div>
                <div class="required field">
                  <label>Gender</label>
                  <div class="ui selection dropdown">
                    <i class="dropdown icon"></i>
                    <input id="gender" type="hidden" name="gender">
                    <div class="default text">Select Gender</div>
                    <div class="menu">
                      <div class="item" data-value="Female">Female</div>
                      <div class="item" data-value="Male">Male</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="two fields">
                <div class="required field">
                  <label>Primary E-Mail Address</label>
                  <input id="primaryemail" type="text" name="primary_email" placeholder="e-mail@mailservice.com">
                </div>
                <div class="field">
                  <label>Secondary E-Mail Address</label>
                  <input id="secondaryemail" type="text" name="secondary_email" value="" placeholder="e-mail2@mailservice.com">
                </div>
              </div>
              <div class="two fields">
                <div class="required field">
                  <label>Primary Contact No.</label>
                  <input id="primarycontact" type="text" name="primary_contact_no" maxlength="11" placeholder="09123456789">
                </div>
                <div class="field">
                  <label>Secondary Contact No.</label>
                  <input id="secondarycontact" type="text" name="secondary_contact_no" value="" maxlength="11" placeholder="1234567">
                </div>
              </div>
              <div class="required field">
                <label>Permanent Address</label>
                <input id="permanentaddress" type="text" name="permanent_address" placeholder="Address">
              </div>
              <div class="two required fields">
                <div class="field">
                  <label>Unit</label>
                  <div class="ui search selection dropdown">
                    <i class="dropdown icon"></i>
                    <input id="unit" type="hidden" name="unit">
                    <div class="default text">Select Unit</div>
                    <div class="menu">
                      <div class="item" data-value="AC">AC</div>
                      <div class="item" data-value="ACCTG">ACCTG</div>
                      <div class="item" data-value="ADMISSIONS">ADMISSIONS</div>
                      <div class="item" data-value="AIT">AIT</div>
                      <div class="item" data-value="ALUMNI">ALUMNI</div>
                      <div class="item" data-value="ASP">ASP</div>
                      <div class="item" data-value="BALAY">BALAY</div>
                      <div class="item" data-value="BCO">BCO</div>
                      <div class="item" data-value="BLG">BLG</div>
                      <div class="item" data-value="BUDGET">BUDGET</div>
                      <div class="item" data-value="CA">CA</div>
                      <div class="item" data-value="CAL">CAL</div>
                      <div class="item" data-value="CASH">CASH</div>
                      <div class="item" data-value="CBA">CBA</div>
                      <div class="item" data-value="CED">CED</div>
                      <div class="item" data-value="CEN">CEN</div>
                      <div class="item" data-value="CFA">CFA</div>
                      <div class="item" data-value="CHE">CHE</div>
                      <div class="item" data-value="CHK">CHK</div>
                      <div class="item" data-value="CIDS">CIDS</div>
                      <div class="item" data-value="CIS">CIS</div>
                      <div class="item" data-value="CL">CL</div>
                      <div class="item" data-value="CM">CM</div>
                      <div class="item" data-value="CMC">CMC</div>
                      <div class="item" data-value="CMO">CMO</div>
                      <div class="item" data-value="CC">CC</div>
                      <div class="item" data-value="CPA">CPA</div>
                      <div class="item" data-value="CS">CS</div>
                      <div class="item" data-value="CSSP">CSSP</div>
                      <div class="item" data-value="CSWCD">CSWCD</div>
                      <div class="item" data-value="DGO">DGO</div>
                      <div class="item" data-value="DILC">DILC</div>
                      <div class="item" data-value="DMST">DMST</div>
                      <div class="item" data-value="DORM">DORM</div>
                      <div class="item" data-value="ETHNO">ETHNO</div>
                      <div class="item" data-value="HOUSING">HOUSING</div>
                      <div class="item" data-value="HRDO">HRDO</div>
                      <div class="item" data-value="IDP">IDP</div>
                      <div class="item" data-value="IEP">IEP</div>
                      <div class="item" data-value="IIS">IIS</div>
                      <div class="item" data-value="INFO">INFO</div>
                      <div class="item" data-value="IP">IP</div>
                      <div class="item" data-value="ISMED">ISMED</div>
                      <div class="item" data-value="ISSI">ISSI</div>
                      <div class="item" data-value="ISWCD">ISWCD</div>
                      <div class="item" data-value="LC">LC</div>
                      <div class="item" data-value="LEGAL-D">LEGAL-D</div>
                      <div class="item" data-value="LEGAL-S">LEGAL-S</div>
                      <div class="item" data-value="LIBRARY">LIBRARY</div>
                      <div class="item" data-value="NCPAG">NCPAG</div>
                      <div class="item" data-value="NCTS">NCTS</div>
                      <div class="item" data-value="NEC">NEC</div>
                      <div class="item" data-value="NISMED">NISMED</div>
                      <div class="item" data-value="NSRI">NSRI</div>
                      <div class="item" data-value="OASH">OASH</div>
                      <div class="item" data-value="OC">OC</div>
                      <div class="item" data-value="OCA">OCA</div>
                      <div class="item" data-value="OICA">OICA</div>
                      <div class="item" data-value="OIL">OIL</div>
                      <div class="item" data-value="OLS">OLS</div>
                      <div class="item" data-value="OP">OP</div>
                      <div class="item" data-value="OSR">OSR</div>
                      <div class="item" data-value="OSU">OSU</div>
                      <div class="item" data-value="OUR">OUR</div>
                      <div class="item" data-value="OVCA">OVCA</div>
                      <div class="item" data-value="OVCAA">OVCAA</div>
                      <div class="item" data-value="OVCCA">OVCCA</div>
                      <div class="item" data-value="OVCRD">OVCRD</div>
                      <div class="item" data-value="OVCSA">OVCSA</div>
                      <div class="item" data-value="OVPA">OVPA</div>
                      <div class="item" data-value="OVPAA">OVPAA</div>
                      <div class="item" data-value="OVPD">OVPD</div>
                      <div class="item" data-value="OVPFA">OVPFA</div>
                      <div class="item" data-value="OVPLA">OVPLA</div>
                      <div class="item" data-value="OVPPA">OVPPA</div>
                      <div class="item" data-value="OVPPF">OVPPF</div>
                      <div class="item" data-value="PABX">PABX</div>
                      <div class="item" data-value="PAHINUNGOD">PAHINUNGOD</div>
                      <div class="item" data-value="PGC">PGC</div>
                      <div class="item" data-value="POLICE">POLICE</div>
                      <div class="item" data-value="PRESS">PRESS</div>
                      <div class="item" data-value="SE">SE</div>
                      <div class="item" data-value="SEC DIV">SEC DIV</div>
                      <div class="item" data-value="SLIS">SLIS</div>
                      <div class="item" data-value="SOLAIR">SOLAIR</div>
                      <div class="item" data-value="SPMO-D">SPMO-D</div>
                      <div class="item" data-value="SPMO-S">SPMO-S</div>
                      <div class="item" data-value="SS">SS</div>
                      <div class="item" data-value="SURP">SURP</div>
                      <div class="item" data-value="SWF">SWF</div>
                      <div class="item" data-value="TMC">TMC</div>
                      <div class="item" data-value="TTC">TTC</div>
                      <div class="item" data-value="UCIDS">UCIDS</div>
                      <div class="item" data-value="UCWS">UCWS</div>
                      <div class="item" data-value="UFS">UFS</div>
                      <div class="item" data-value="UHS">UHS</div>
                      <div class="item" data-value="UP THEATER">UP THEATER</div>
                      <div class="item" data-value="UPDEPP">UPDEPP</div>
                      <div class="item" data-value="UPF">UPF</div>
                      <div class="item" data-value="UPIS">UPIS</div>
                      <div class="item" data-value="VARGAS">VARGAS</div>
                      <div class="item" data-value="VSB">VSB</div>
                    </div>
                  </div>
                </div>
                <div class="field">
                  <label>Department</label>
                  <div class="ui search selection dropdown">
                    <i class="dropdown icon"></i>
                    <input id="department" type="hidden" name="department">
                    <div class="default text">Select Department</div>
                    <div class="menu">
                      <div class="item" data-value="AC">AC</div>
                      <div class="item" data-value="ACCT">ACCT</div>
                      <div class="item" data-value="ADMISSIONS">ADMISSIONS</div>
                      <div class="item" data-value="AIT">AIT</div>
                      <div class="item" data-value="ALUMNI">ALUMNI</div>
                      <div class="item" data-value="ASP">ASP</div>
                      <div class="item" data-value="BALAY">BALAY</div>
                      <div class="item" data-value="BCO">BCO</div>
                      <div class="item" data-value="BLG">BLG</div>
                      <div class="item" data-value="BRS">BRS</div>
                      <div class="item" data-value="BUDGET-D">BUDGET-D</div>
                      <div class="item" data-value="BUDGET-S">BUDGET-S</div>
                      <div class="item" data-value="CA">CA</div>
                      <div class="item" data-value="CAL">CAL</div>
                      <div class="item" data-value="CAL-ART">CAL-ART</div>
                      <div class="item" data-value="CAL-DAS">CAL-DAS</div>
                      <div class="item" data-value="CAL-DEAN">CAL-DEAN</div>
                      <div class="item" data-value="CAL-DECL">CAL-DECL</div>
                      <div class="item" data-value="CAL-DEL">CAL-DEL</div>
                      <div class="item" data-value="CAL-DFPL">CAL-DFPL</div>
                      <div class="item" data-value="CAL-DSCTA">CAL-DSCTA</div>
                      <div class="item" data-value="CAL-English">CAL-English</div>
                      <div class="item" data-value="CAL-EURO">CAL-EURO</div>
                      <div class="item" data-value="CAL-FIL">CAL-FIL</div>
                      <div class="item" data-value="CAL-Filipino">CAL-Filipino</div>
                      <div class="item" data-value="CAL-ICW">CAL-ICW</div>
                      <div class="item" data-value="CAL-SPEECH">CAL-SPEECH</div>
                      <div class="item" data-value="CASH-D">CASH-D</div>
                      <div class="item" data-value="CASH-S">CASH-S</div>
                      <div class="item" data-value="CBA">CBA</div>
                      <div class="item" data-value="CED">CED</div>
                      <div class="item" data-value="CEN">CEN</div>
                      <div class="item" data-value="CEN-CHEM">CEN-CHEM</div>
                      <div class="item" data-value="CEN-COMPSCI">CEN-COMPSCI</div>
                      <div class="item" data-value="CEN-CS">CEN-CS</div>
                      <div class="item" data-value="CEN-DEAN">CEN-DEAN</div>
                      <div class="item" data-value="CEN-DIEOR">CEN-DIEOR</div>
                      <div class="item" data-value="CEN-EEEI">CEN-EEEI</div>
                      <div class="item" data-value="CEN-ELECT">CEN-ELECT</div>
                      <div class="item" data-value="CEN-ENGSCIE">CEN-ENGSCIE</div>
                      <div class="item" data-value="CEN-GEO">CEN-GEO</div>
                      <div class="item" data-value="CEN-GEODETIC">CEN-GEODETIC</div>
                      <div class="item" data-value="CEN-ICE">CEN-ICE</div>
                      <div class="item" data-value="CEN-IEOR">CEN-IEOR</div>
                      <div class="item" data-value="CEN-LIBRARY">CEN-LIBRARY</div>
                      <div class="item" data-value="CEN-ME">CEN-ME</div>
                      <div class="item" data-value="CEN-MINING">CEN-MINING</div>
                      <div class="item" data-value="CEN-MMM">CEN-MMM</div>
                      <div class="item" data-value="CEN-MMME">CEN-MMME</div>
                      <div class="item" data-value="CEN-TCAGP">CEN-TCAGP</div>
                      <div class="item" data-value="CFA">CFA</div>
                      <div class="item" data-value="CHE">CHE</div>
                      <div class="item" data-value="CHE-CTID">CHE-CTID</div>
                      <div class="item" data-value="CHE-CTRA">CHE-CTRA</div>
                      <div class="item" data-value="CHE-DFLCD">CHE-DFLCD</div>
                      <div class="item" data-value="CHE-DHRIM">CHE-DHRIM</div>
                      <div class="item" data-value="CHE-FLCD">CHE-FLCD</div>
                      <div class="item" data-value="CHE-FSN">CHE-FSN</div>
                      <div class="item" data-value="CHE-HRIM">CHE-HRIM</div>
                      <div class="item" data-value="CHK">CHK</div>
                      <div class="item" data-value="CIDS">CIDS</div>
                      <div class="item" data-value="CIS">CIS</div>
                      <div class="item" data-value="CL">CL</div>
                      <div class="item" data-value="CM">CM</div>
                      <div class="item" data-value="CMC">CMC</div>
                      <div class="item" data-value="CMC-FILM">CMC-FILM</div>
                      <div class="item" data-value="CMO">CMO</div>
                      <div class="item" data-value="COMPSCI">COMPSCI</div>
                      <div class="item" data-value="COMPUTER">COMPUTER</div>
                      <div class="item" data-value="CPA">CPA</div>
                      <div class="item" data-value="CS">CS</div>
                      <div class="item" data-value="CS-BIO">CS-BIO</div>
                      <div class="item" data-value="CS-CHEM">CS-CHEM</div>
                      <div class="item" data-value="CS-CSRC">CS-CSRC</div>
                      <div class="item" data-value="CS-DEAN">CS-DEAN</div>
                      <div class="item" data-value="CS-IB">CS-IB</div>
                      <div class="item" data-value="CS-IESM">CS-IESM</div>
                      <div class="item" data-value="CS-Library">CS-Library</div>
                      <div class="item" data-value="CS-MATH">CS-MATH</div>
                      <div class="item" data-value="CS-METEO">CS-METEO</div>
                      <div class="item" data-value="CS-MSEP">CS-MSEP</div>
                      <div class="item" data-value="CS-MSI">CS-MSI</div>
                      <div class="item" data-value="CS-NIGS">CS-NIGS</div>
                      <div class="item" data-value="CS-NIMBB">CS-NIMBB</div>
                      <div class="item" data-value="CS-NIP">CS-NIP</div>
                      <div class="item" data-value="CSSP">CSSP</div>
                      <div class="item" data-value="CSSP-Anthro">CSSP-Anthro</div>
                      <div class="item" data-value="CSSP-DANTHRO">CSSP-DANTHRO</div>
                      <div class="item" data-value="CSSP-DEAN">CSSP-DEAN</div>
                      <div class="item" data-value="CSSP-DGEOG">CSSP-DGEOG</div>
                      <div class="item" data-value="CSSP-Geography">CSSP-Geography</div>
                      <div class="item" data-value="CSSP-HISTORY">CSSP-HISTORY</div>
                      <div class="item" data-value="CSSP-LING">CSSP-LING</div>
                      <div class="item" data-value="CSSP-LINGG">CSSP-LINGG</div>
                      <div class="item" data-value="CSSP-OGP">CSSP-OGP</div>
                      <div class="item" data-value="CSSP-PAHINUNGOD">CSSP-PAHINUNGOD</div>
                      <div class="item" data-value="CSSP-PHILO">CSSP-PHILO</div>
                      <div class="item" data-value="CSSP-POLISCI">CSSP-POLISCI</div>
                      <div class="item" data-value="CSSP-POLSCI">CSSP-POLSCI</div>
                      <div class="item" data-value="CSSP-POPI">CSSP-POPI</div>
                      <div class="item" data-value="CSSP-PSYCH">CSSP-PSYCH</div>
                      <div class="item" data-value="CSSP-SOCIO">CSSP-SOCIO</div>
                      <div class="item" data-value="CSSP-TWSC">CSSP-TWSC</div>
                      <div class="item" data-value="CSSP-TWSP">CSSP-TWSP</div>
                      <div class="item" data-value="CS-SSP">CS-SSP</div>
                      <div class="item" data-value="CSWCD">CSWCD</div>
                      <div class="item" data-value="CSWCD-DCD">CSWCD-DCD</div>
                      <div class="item" data-value="CSWCD-DSW">CSWCD-DSW</div>
                      <div class="item" data-value="CSWCD-REDO">CSWCD-REDO</div>
                      <div class="item" data-value="DFLCD">DFLCD</div>
                      <div class="item" data-value="DHRIM">DHRIM</div>
                      <div class="item" data-value="DILC">DILC</div>
                      <div class="item" data-value="DMST">DMST</div>
                      <div class="item" data-value="DNSM">DNSM</div>
                      <div class="item" data-value="DORM">DORM</div>
                      <div class="item" data-value="DSW-CSWCD">DSW-CSWCD</div>
                      <div class="item" data-value="ENGLISH">ENGLISH</div>
                      <div class="item" data-value="ETHNO">ETHNO</div>
                      <div class="item" data-value="GENDER">GENDER</div>
                      <div class="item" data-value="HEALTH & PE">HEALTH & PE</div>
                      <div class="item" data-value="HOUSING">HOUSING</div>
                      <div class="item" data-value="HRDO">HRDO</div>
                      <div class="item" data-value="IDP">IDP</div>
                      <div class="item" data-value="IEP">IEP</div>
                      <div class="item" data-value="IIS">IIS</div>
                      <div class="item" data-value="INFO-D">INFO-D</div>
                      <div class="item" data-value="INFO-S">INFO-S</div>
                      <div class="item" data-value="IP">IP</div>
                      <div class="item" data-value="ISMED">ISMED</div>
                      <div class="item" data-value="ISSI">ISSI</div>
                      <div class="item" data-value="ISWCD">ISWCD</div>
                      <div class="item" data-value="K-2">K-2</div>
                      <div class="item" data-value="K-G2">K-G2</div>
                      <div class="item" data-value="LC">LC</div>
                      <div class="item" data-value="LC-IGLR">LC-IGLR</div>
                      <div class="item" data-value="LC-IHR">LC-IHR</div>
                      <div class="item" data-value="LC-IILS">LC-IILS</div>
                      <div class="item" data-value="LC-IJA">LC-IJA</div>
                      <div class="item" data-value="LC-LIBRARY">LC-LIBRARY</div>
                      <div class="item" data-value="LC-LRC">LC-LRC</div>
                      <div class="item" data-value="LC-OADR">LC-OADR</div>
                      <div class="item" data-value="LC-ONAR">LC-ONAR</div>
                      <div class="item" data-value="LEGAL-D">LEGAL-D</div>
                      <div class="item" data-value="LEGAL-S">LEGAL-S</div>
                      <div class="item" data-value="LIBARRY">LIBARRY</div>
                      <div class="item" data-value="LIBRARY">LIBRARY</div>
                      <div class="item" data-value="NCPAG">NCPAG</div>
                      <div class="item" data-value="NCPAG-CLCD">NCPAG-CLCD</div>
                      <div class="item" data-value="NCPAG-CLRG">NCPAG-CLRG</div>
                      <div class="item" data-value="NCPAG-CPAD">NCPAG-CPAD</div>
                      <div class="item" data-value="NCPAG-CPED">NCPAG-CPED</div>
                      <div class="item" data-value="NCPAG-MECS">NCPAG-MECS</div>
                      <div class="item" data-value="NCTS">NCTS</div>
                      <div class="item" data-value="NEC">NEC</div>
                      <div class="item" data-value="NEC-BRS">NEC-BRS</div>
                      <div class="item" data-value="NIMBB">NIMBB</div>
                      <div class="item" data-value="NISMED">NISMED</div>
                      <div class="item" data-value="NSRI">NSRI</div>
                      <div class="item" data-value="OAPS">OAPS</div>
                      <div class="item" data-value="OASH">OASH</div>
                      <div class="item" data-value="OC">OC</div>
                      <div class="item" data-value="OCA">OCA</div>
                      <div class="item" data-value="OCG">OCG</div>
                      <div class="item" data-value="OC-PAHINUNGOD">OC-PAHINUNGOD</div>
                      <div class="item" data-value="OICA">OICA</div>
                      <div class="item" data-value="OIL">OIL</div>
                      <div class="item" data-value="OLS">OLS</div>
                      <div class="item" data-value="OP">OP</div>
                      <div class="item" data-value="OP-Executive">OP-Executive</div>
                      <div class="item" data-value="OSA">OSA</div>
                      <div class="item" data-value="OSR">OSR</div>
                      <div class="item" data-value="OSSS">OSSS</div>
                      <div class="item" data-value="OSU">OSU</div>
                      <div class="item" data-value="OUR">OUR</div>
                      <div class="item" data-value="OUR-UCS">OUR-UCS</div>
                      <div class="item" data-value="OVCA">OVCA</div>
                      <div class="item" data-value="OVCAA">OVCAA</div>
                      <div class="item" data-value="OVCA-PABX">OVCA-PABX</div>
                      <div class="item" data-value="OVCA-UMT">OVCA-UMT</div>
                      <div class="item" data-value="OVCCA">OVCCA</div>
                      <div class="item" data-value="OVCRD">OVCRD</div>
                      <div class="item" data-value="OVCSA">OVCSA</div>
                      <div class="item" data-value="OVCSA-OCG">OVCSA-OCG</div>
                      <div class="item" data-value="OVCSA-OSA">OVCSA-OSA</div>
                      <div class="item" data-value="OVCSA-OSH">OVCSA-OSH</div>
                      <div class="item" data-value="OVCSA-SDT">OVCSA-SDT</div>
                      <div class="item" data-value="OVPA">OVPA</div>
                      <div class="item" data-value="OVPAA">OVPAA</div>
                      <div class="item" data-value="OVPD">OVPD</div>
                      <div class="item" data-value="OVPD-ODPI">OVPD-ODPI</div>
                      <div class="item" data-value="OVPD-RGS">OVPD-RGS</div>
                      <div class="item" data-value="OVPD-TTBDO">OVPD-TTBDO</div>
                      <div class="item" data-value="OVPFA">OVPFA</div>
                      <div class="item" data-value="OVPLA">OVPLA</div>
                      <div class="item" data-value="OVPPA">OVPPA</div>
                      <div class="item" data-value="OVPPF">OVPPF</div>
                      <div class="item" data-value="PABX">PABX</div>
                      <div class="item" data-value="PAHINUNGOD-D">PAHINUNGOD-D</div>
                      <div class="item" data-value="PAHINUNGOD-S">PAHINUNGOD-S</div>
                      <div class="item" data-value="PGC">PGC</div>
                      <div class="item" data-value="POLICE">POLICE</div>
                      <div class="item" data-value="PRAC ARTS">PRAC ARTS</div>
                      <div class="item" data-value="PRESS">PRESS</div>
                      <div class="item" data-value="PRINTERY">PRINTERY</div>
                      <div class="item" data-value="QLG">QLG</div>
                      <div class="item" data-value="SCIENCE">SCIENCE</div>
                      <div class="item" data-value="SE">SE</div>
                      <div class="item" data-value="SEC DIV">SEC DIV</div>
                      <div class="item" data-value="SLIS">SLIS</div>
                      <div class="item" data-value="SOLAIR">SOLAIR</div>
                      <div class="item" data-value="SPMO-D">SPMO-D</div>
                      <div class="item" data-value="SPMO-S">SPMO-S</div>
                      <div class="item" data-value="SS">SS</div>
                      <div class="item" data-value="SURP">SURP</div>
                      <div class="item" data-value="SWF">SWF</div>
                      <div class="item" data-value="TMC">TMC</div>
                      <div class="item" data-value="TOURISM">TOURISM</div>
                      <div class="item" data-value="TTC">TTC</div>
                      <div class="item" data-value="UCIDS">UCIDS</div>
                      <div class="item" data-value="UCWS">UCWS</div>
                      <div class="item" data-value="UFS">UFS</div>
                      <div class="item" data-value="UHS">UHS</div>
                      <div class="item" data-value="UP THEATER">UP THEATER</div>
                      <div class="item" data-value="UPDEPP">UPDEPP</div>
                      <div class="item" data-value="UPF">UPF</div>
                      <div class="item" data-value="UPIS">UPIS</div>
                      <div class="item" data-value="UPIS - CA-ENG/MUSIC">UPIS - CA-ENG/MUSIC</div>
                      <div class="item" data-value="UPIS - CA-FILIPINO">UPIS - CA-FILIPINO</div>
                      <div class="item" data-value="UPIS-PRAC ARTS">UPIS-PRAC ARTS</div>
                      <div class="item" data-value="VARGAS">VARGAS</div>
                      <div class="item" data-value="VSB">VSB</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="two required fields">
                <div class="field">
                  <label>Employee Type</label>
                  <div class="ui selection dropdown">
                    <i class="dropdown icon"></i>
                    <input id="employeetype" type="hidden" name="employee_type">
                    <div class="default text">Select Employee Type</div>
                    <div class="menu">
                      <div class="item" data-value="REPS">REPS</div>
                      <div class="item" data-value="ADM">ADM</div>
                      <div class="item" data-value="FAC">FAC</div>
                    </div>
                  </div>
                </div>
                <div class="field">
                  <label>Employment Status</label>
                  <div class="ui search selection dropdown">
                  <i class="dropdown icon"></i>
                  <input id="employmentstatus" type="hidden" name="employment_status">
                  <div class="default text">Select Employment Status</div>
                  <div class="menu">
                      <div class="item" data-value="Contractual">Contractual</div>
                      <div class="item" data-value="Permanent">Permanent</div>
                      <div class="item" data-value="Temporary">Temporary</div>
                      <div class="item" data-value="Substitute">Substitute</div>
                      <div class="item" data-value="Extension">Extension</div>
                      <div class="item" data-value="Casual">Casual</div>
                    </div>
                 </div>
                </div>
              </div>
              <div class="two required fields">
                <div class="field">
                  <label>Rank</label>
                  <div class="ui search selection dropdown">
                    <i class="dropdown icon"></i>
                    <input id="rank" type="hidden" name="rank">
                    <div class="default text">Select Rank</div>
                    <div class="menu">
                      <div class="item" data-value="Accountant I">Accountant I</div>
                      <div class="item" data-value="Accountant II">Accountant II</div>
                      <div class="item" data-value="Accountant III">Accountant III</div>
                      <div class="item" data-value="Accountant IV">Accountant IV</div>
                      <div class="item" data-value="Accounting Clerk I">Accounting Clerk I</div>
                      <div class="item" data-value="Accounting Clerk II">Accounting Clerk II</div>
                      <div class="item" data-value="Accounting Clerk III">Accounting Clerk III</div>
                      <div class="item" data-value="Adjunct Professor">Adjunct Professor</div>
                      <div class="item" data-value="Adjunct Researcher">Adjunct Researcher</div>
                      <div class="item" data-value="Administrative Aide I">Administrative Aide I</div>
                      <div class="item" data-value="Administrative Aide II">Administrative Aide II</div>
                      <div class="item" data-value="Administrative Aide III">Administrative Aide III</div>
                      <div class="item" data-value="Administrative Aide IV">Administrative Aide IV</div>
                      <div class="item" data-value="Administrative Aide V">Administrative Aide V</div>
                      <div class="item" data-value="Administrative Aide VI">Administrative Aide VI</div>
                      <div class="item" data-value="Administrative Assistant I">Administrative Assistant I</div>
                      <div class="item" data-value="Administrative Assistant II">Administrative Assistant II</div>
                      <div class="item" data-value="Administrative Assistant III">Administrative Assistant III</div>
                      <div class="item" data-value="Administrative Assistant IV">Administrative Assistant IV</div>
                      <div class="item" data-value="Administrative Assistant V">Administrative Assistant V</div>
                      <div class="item" data-value="Administrative Assistant VI">Administrative Assistant VI</div>
                      <div class="item" data-value="Administrative Assistant II">Administrative Assistant II</div>
                      <div class="item" data-value="Administrative Officer I">Administrative Officer I</div>
                      <div class="item" data-value="Administrative Officer II">Administrative Officer II</div>
                      <div class="item" data-value="Administrative Officer III">Administrative Officer III</div>
                      <div class="item" data-value="Administrative Officer IV">Administrative Officer IV</div>
                      <div class="item" data-value="Administrative Officer V">Administrative Officer V</div>
                      <div class="item" data-value="Administratrive Aide II">Administratrive Aide II</div>
                      <div class="item" data-value="Administratrive Aide II">Administratrive Aide II</div>
                      <div class="item" data-value="Administratrive Aide III">Administratrive Aide III</div>
                      <div class="item" data-value="Affiliate Faculty">Affiliate Faculty</div>
                      <div class="item" data-value="Agricultural Technician">Agricultural Technician</div>
                      <div class="item" data-value="Airconditioning Technician">Airconditioning Technician</div>
                      <div class="item" data-value="Architect I">Architect I</div>
                      <div class="item" data-value="Architect II">Architect II</div>
                      <div class="item" data-value="Architect III">Architect III</div>
                      <div class="item" data-value="Architect IV">Architect IV</div>
                      <div class="item" data-value="Architect V">Architect V</div>
                      <div class="item" data-value="Assistant Chef">Assistant Chef</div>
                      <div class="item" data-value="Assistant Professor I">Assistant Professor I</div>
                      <div class="item" data-value="Assistant Professor II">Assistant Professor II</div>
                      <div class="item" data-value="Assistant Professor III">Assistant Professor III</div>
                      <div class="item" data-value="Assistant Professor IV">Assistant Professor IV</div>
                      <div class="item" data-value="Assistant Professor V">Assistant Professor V</div>
                      <div class="item" data-value="Assistant Professor VI">Assistant Professor VI</div>
                      <div class="item" data-value="Assistant Professor VII">Assistant Professor VII</div>
                      <div class="item" data-value="Associate Professor I">Associate Professor I</div>
                      <div class="item" data-value="Associate Professor II">Associate Professor II</div>
                      <div class="item" data-value="Associate Professor III">Associate Professor III</div>
                      <div class="item" data-value="Associate Professor IV">Associate Professor IV</div>
                      <div class="item" data-value="Associate Professor V">Associate Professor V</div>
                      <div class="item" data-value="Associate Professor VI">Associate Professor VI</div>
                      <div class="item" data-value="Associate Professor VII">Associate Professor VII</div>
                      <div class="item" data-value="Assistant Supervisor For Student Teaching">Assistant Supervisor For Student Teaching</div>
                      <div class="item" data-value="Attorney I">Attorney I</div>
                      <div class="item" data-value="Attorney II">Attorney II</div>
                      <div class="item" data-value="Attorney III">Attorney III</div>
                      <div class="item" data-value="Attorney IV">Attorney IV</div>
                      <div class="item" data-value="Attorney V">Attorney V</div>
                      <div class="item" data-value="Attorney VI">Attorney VI</div>
                      <div class="item" data-value="Attorney Chief Legal Officer">Attorney Chief Legal Officer</div>
                      <div class="item" data-value="Audio Visual Equipment Operator">Audio Visual Equipment Operator</div>
                      <div class="item" data-value="Audio-Visual Aids Technician I">Audio-Visual Aids Technician I</div>
                      <div class="item" data-value="Audio-Visual Aids Technician II">Audio-Visual Aids Technician II</div>
                      <div class="item" data-value="Audio-Visual Aids Technician III">Audio-Visual Aids Technician III</div>
                      <div class="item" data-value="Audio-Visual Aids Technician IV">Audio-Visual Aids Technician IV</div>
                      <div class="item" data-value="Audio-Visual Equipment Operator I">Audio-Visual Equipment Operator I</div>
                      <div class="item" data-value="Audio-Visual Equipment Operator II">Audio-Visual Equipment Operator II</div>
                      <div class="item" data-value="Audio-Visual Equipment Operator III">Audio-Visual Equipment Operator III</div>
                      <div class="item" data-value="Audio-Visual Equipment Operator IV">Audio-Visual Equipment Operator IV</div>
                      <div class="item" data-value="Audio-Visual Equipment Operator V">Audio-Visual Equipment Operator V</div>
                      <div class="item" data-value="Baker">Baker</div>
                      <div class="item" data-value="Bindery Helper">Bindery Helper</div>
                      <div class="item" data-value="Board Secretary I">Board Secretary I</div>
                      <div class="item" data-value="Board Secretary II">Board Secretary II</div>
                      <div class="item" data-value="Board Secretary III">Board Secretary III</div>
                      <div class="item" data-value="Bookbinder I">Bookbinder I</div>
                      <div class="item" data-value="Bookbinder II">Bookbinder II</div>
                      <div class="item" data-value="Bookbinder III">Bookbinder III</div>
                      <div class="item" data-value="Bookbinder IV">Bookbinder IV</div>
                      <div class="item" data-value="Budget Director">Budget Director</div>
                      <div class="item" data-value="Budget Officer I">Budget Officer I</div>
                      <div class="item" data-value="Budget Officer II">Budget Officer II</div>
                      <div class="item" data-value="Budget Officer III">Budget Officer III</div>
                      <div class="item" data-value="Budget Officer IV">Budget Officer IV</div>
                      <div class="item" data-value="Budget Officer V">Budget Officer V</div>
                      <div class="item" data-value="Budgeting Assistant">Budgeting Assistant</div>
                      <div class="item" data-value="Buyer I">Buyer I</div>
                      <div class="item" data-value="Buyer II">Buyer II</div>
                      <div class="item" data-value="Buyer III">Buyer III</div>
                      <div class="item" data-value="Buyer IV">Buyer IV</div>
                      <div class="item" data-value="Buyer V">Buyer V</div>
                      <div class="item" data-value="Carpenter General Foreman">Carpenter General Foreman</div>
                      <div class="item" data-value="Carpenter I">Carpenter I</div>
                      <div class="item" data-value="Carpenter II">Carpenter II</div>
                      <div class="item" data-value="Cartographer I">Cartographer I</div>
                      <div class="item" data-value="Cartographer II">Cartographer II</div>
                      <div class="item" data-value="Cartographer III">Cartographer III</div>
                      <div class="item" data-value="Cartographer IV">Cartographer IV</div>
                      <div class="item" data-value="Cashier I">Cashier I</div>
                      <div class="item" data-value="Cashier II">Cashier II</div>
                      <div class="item" data-value="Cashier III">Cashier III</div>
                      <div class="item" data-value="Cashier IV">Cashier IV</div>
                      <div class="item" data-value="Chef">Chef</div>
                      <div class="item" data-value="Chief Administrative Officer">Chief Administrative Officer</div>
                      <div class="item" data-value="Chief Scholarship Affairs Officer">Chief Scholarship Affairs Officer</div>
                      <div class="item" data-value="Cinematographer I">Cinematographer I</div>
                      <div class="item" data-value="Cinematographer II">Cinematographer II</div>
                      <div class="item" data-value="Cinematographer III">Cinematographer III</div>
                      <div class="item" data-value="Cinematographer IV">Cinematographer IV</div>
                      <div class="item" data-value="Clerk I">Clerk I</div>
                      <div class="item" data-value="Clerk II">Clerk II</div>
                      <div class="item" data-value="Clerk III">Clerk III</div>
                      <div class="item" data-value="Clerk IV">Clerk IV</div>
                      <div class="item" data-value="Clerk-Typist">Clerk-Typist</div>
                      <div class="item" data-value="Coach I">Coach I</div>
                      <div class="item" data-value="Coach II">Coach II</div>
                      <div class="item" data-value="Coach III">Coach III</div>
                      <div class="item" data-value="Coach IV">Coach IV</div>
                      <div class="item" data-value="College Business Manager I">College Business Manager I</div>
                      <div class="item" data-value="College Business Manager II">College Business Manager II</div>
                      <div class="item" data-value="College Business Manager III">College Business Manager III</div>
                      <div class="item" data-value="College Business Manager IV">College Business Manager IV</div>
                      <div class="item" data-value="College Librarian I">College Librarian I</div>
                      <div class="item" data-value="College Librarian II">College Librarian II</div>
                      <div class="item" data-value="College Librarian III">College Librarian III</div>
                      <div class="item" data-value="College Librarian IV">College Librarian IV</div>
                      <div class="item" data-value="College Librarian V">College Librarian V</div>
                      <div class="item" data-value="Communications Equipt Operator I">Communications Equipt Operator I</div>
                      <div class="item" data-value="Communications Equipt Operator II">Communications Equipt Operator II</div>
                      <div class="item" data-value="Communications Equipt Operator III">Communications Equipt Operator III</div>
                      <div class="item" data-value="Communications Equipt Operator IV">Communications Equipt Operator IV</div>
                      <div class="item" data-value="Communications Equipt Operator V">Communications Equipt Operator V</div>
                      <div class="item" data-value="Computer Maintenance Technologist I">Computer Maintenance Technologist I</div>
                      <div class="item" data-value="Computer Operator I">Computer Operator I</div>
                      <div class="item" data-value="Computer Operator II">Computer Operator II</div>
                      <div class="item" data-value="Computer Operator III">Computer Operator III</div>
                      <div class="item" data-value="Computer Operator IV">Computer Operator IV</div>
                      <div class="item" data-value="Computer Programmer I">Computer Programmer I</div>
                      <div class="item" data-value="Computer Programmer II">Computer Programmer II</div>
                      <div class="item" data-value="Computer Programmer III">Computer Programmer III</div>
                      <div class="item" data-value="Construction Equipt Operator">Construction Equipt Operator</div>
                      <div class="item" data-value="Consultant In Pathology">Consultant In Pathology</div>
                      <div class="item" data-value="Consultant In Pulmonology">Consultant In Pulmonology</div>
                      <div class="item" data-value="Contruction And Maintenance General Foreman">Contruction And Maintenance General Foreman</div>
                      <div class="item" data-value="Cook Helper">Cook Helper</div>
                      <div class="item" data-value="Cook I">Cook I</div>
                      <div class="item" data-value="Cook II">Cook II</div>
                      <div class="item" data-value="Creative Arts Specialist II">Creative Arts Specialist II</div>
                      <div class="item" data-value="Creative Arts Specialist III">Creative Arts Specialist III</div>
                      <div class="item" data-value="Creative Arts Specialist IV">Creative Arts Specialist IV</div>
                      <div class="item" data-value="Custodial Worker">Custodial Worker</div>
                      <div class="item" data-value="Data Controller I">Data Controller I</div>
                      <div class="item" data-value="Data Controller II">Data Controller II</div>
                      <div class="item" data-value="Data Controller III">Data Controller III</div>
                      <div class="item" data-value="Data Controller IV">Data Controller IV</div>
                      <div class="item" data-value="Data Entry Machine Operator I">Data Entry Machine Operator I</div>
                      <div class="item" data-value="Data Entry Machine Operator II">Data Entry Machine Operator II</div>
                      <div class="item" data-value="Data Entry Machine Operator III">Data Entry Machine Operator III</div>
                      <div class="item" data-value="Data Entry Machine Operator IV">Data Entry Machine Operator IV</div>
                      <div class="item" data-value="Dental Aide">Dental Aide</div>
                      <div class="item" data-value="Dentist I">Dentist I</div>
                      <div class="item" data-value="Dentist II">Dentist II</div>
                      <div class="item" data-value="Dentist III">Dentist III</div>
                      <div class="item" data-value="Dentist IV">Dentist IV</div>
                      <div class="item" data-value="Development Management Officer I">Development Management Officer I</div>
                      <div class="item" data-value="Development Management Officer II">Development Management Officer II</div>
                      <div class="item" data-value="Development Management Officer III">Development Management Officer III</div>
                      <div class="item" data-value="Development Management Officer IV">Development Management Officer IV</div>
                      <div class="item" data-value="Director I">Director I</div>
                      <div class="item" data-value="Director II">Director II</div>
                      <div class="item" data-value="Director IIi">Director IIi</div>
                      <div class="item" data-value="Director IV">Director IV</div>
                      <div class="item" data-value="Domestic Helper">Domestic Helper</div>
                      <div class="item" data-value="Dormitory Manager I">Dormitory Manager I</div>
                      <div class="item" data-value="Dormitory Manager II">Dormitory Manager II</div>
                      <div class="item" data-value="Dormitory Manager III">Dormitory Manager III</div>
                      <div class="item" data-value="Dormitory Manager IV">Dormitory Manager IV</div>
                      <div class="item" data-value="Draftsman I">Draftsman I</div>
                      <div class="item" data-value="Draftsman II">Draftsman II</div>
                      <div class="item" data-value="Draftsman III">Draftsman III</div>
                      <div class="item" data-value="Driver I">Driver I</div>
                      <div class="item" data-value="Driver II">Driver II</div>
                      <div class="item" data-value="Education Res. Assistant I">Education Res. Assistant I</div>
                      <div class="item" data-value="Education Research Assistant I">Education Research Assistant I</div>
                      <div class="item" data-value="Education Research Assistant II">Education Research Assistant II</div>
                      <div class="item" data-value="Electrical Foreman">Electrical Foreman</div>
                      <div class="item" data-value="Electrical Inspector I">Electrical Inspector I</div>
                      <div class="item" data-value="Electrical Inspector II">Electrical Inspector II</div>
                      <div class="item" data-value="Electrician Foreman">Electrician Foreman</div>
                      <div class="item" data-value="Electrician General Foreman">Electrician General Foreman</div>
                      <div class="item" data-value="Electrician I">Electrician I</div>
                      <div class="item" data-value="Electrician II">Electrician II</div>
                      <div class="item" data-value="Electronics & Comm Equipt Tech I">Electronics & Comm Equipt Tech I</div>
                      <div class="item" data-value="Electronics & Comm Equipt Tech II">Electronics & Comm Equipt Tech II</div>
                      <div class="item" data-value="Electronics & Comm Equipt Tech III">Electronics & Comm Equipt Tech III</div>
                      <div class="item" data-value="Emergency Clerk-Typist">Emergency Clerk-Typist</div>
                      <div class="item" data-value="Emergency Food Service Supervisor">Emergency Food Service Supervisor</div>
                      <div class="item" data-value="Engineer I">Engineer I</div>
                      <div class="item" data-value="Engineer II">Engineer II</div>
                      <div class="item" data-value="Engineer III">Engineer III</div>
                      <div class="item" data-value="Engineer IV">Engineer IV</div>
                      <div class="item" data-value="Engineering Assistant">Engineering Assistant</div>
                      <div class="item" data-value="Executive Assistant II">Executive Assistant II</div>
                      <div class="item" data-value="Executive Assistant III">Executive Assistant III</div>
                      <div class="item" data-value="Executive Assistant IV">Executive Assistant IV</div>
                      <div class="item" data-value="Executive Assistant V">Executive Assistant V</div>
                      <div class="item" data-value="Financial Analyst I">Financial Analyst I</div>
                      <div class="item" data-value="Financial Analyst II">Financial Analyst II</div>
                      <div class="item" data-value="Financial Analyst III">Financial Analyst III</div>
                      <div class="item" data-value="Fiscal Examiner I">Fiscal Examiner I</div>
                      <div class="item" data-value="Fiscal Examiner II">Fiscal Examiner II</div>
                      <div class="item" data-value="Fiscal Examiner III">Fiscal Examiner III</div>
                      <div class="item" data-value="Food Service Manager">Food Service Manager</div>
                      <div class="item" data-value="Food Service Supervisor I">Food Service Supervisor I</div>
                      <div class="item" data-value="Food Service Supervisor II">Food Service Supervisor II</div>
                      <div class="item" data-value="Food Service Supervisor III">Food Service Supervisor III</div>
                      <div class="item" data-value="Food Technologist I">Food Technologist I</div>
                      <div class="item" data-value="Food Technologist II">Food Technologist II</div>
                      <div class="item" data-value="Food Technologist III">Food Technologist III</div>
                      <div class="item" data-value="Fumigator">Fumigator</div>
                      <div class="item" data-value="Garde Manger">Garde Manger</div>
                      <div class="item" data-value="Guidance Services Associate">Guidance Services Associate</div>
                      <div class="item" data-value="Guidance Services Specialist I">Guidance Services Specialist I</div>
                      <div class="item" data-value="Guidance Services Specialist II">Guidance Services Specialist II</div>
                      <div class="item" data-value="Guidance Services Specialist III">Guidance Services Specialist III</div>
                      <div class="item" data-value="Guidance Services Specialist IV">Guidance Services Specialist IV</div>
                      <div class="item" data-value="Guidance Services Specialist V">Guidance Services Specialist V</div>
                      <div class="item" data-value="Heavy Equipment Operator I">Heavy Equipment Operator I</div>
                      <div class="item" data-value="Heavy Equipment Operator II">Heavy Equipment Operator II</div>
                      <div class="item" data-value="Hospital Housekeeper">Hospital Housekeeper</div>
                      <div class="item" data-value="Household Attendant">Household Attendant</div>
                      <div class="item" data-value="Household Manager">Household Manager</div>
                      <div class="item" data-value="Houseparent">Houseparent</div>
                      <div class="item" data-value="Housing & Homesite Reg Officer I">Housing & Homesite Reg Officer I</div>
                      <div class="item" data-value="Housing & Homesite Reg Officer II">Housing & Homesite Reg Officer II</div>
                      <div class="item" data-value="Human Resource Management Officer I">Human Resource Management Officer I</div>
                      <div class="item" data-value="Human Resource Management Officer II">Human Resource Management Officer II</div>
                      <div class="item" data-value="Human Resource Management Officer III">Human Resource Management Officer III</div>
                      <div class="item" data-value="Human Resource Management Officer IV">Human Resource Management Officer IV</div>
                      <div class="item" data-value="Human Resource Management Officer V">Human Resource Management Officer V</div>
                      <div class="item" data-value="Illustrator I">Illustrator I</div>
                      <div class="item" data-value="Illustrator II">Illustrator II</div>
                      <div class="item" data-value="Illustrator III">Illustrator III</div>
                      <div class="item" data-value="Information Officer I">Information Officer I</div>
                      <div class="item" data-value="Information Officer II">Information Officer II</div>
                      <div class="item" data-value="Information Officer III">Information Officer III</div>
                      <div class="item" data-value="Information Systems Analyst I">Information Systems Analyst I</div>
                      <div class="item" data-value="Information Systems Analyst II">Information Systems Analyst II</div>
                      <div class="item" data-value="Information Systems Analyst III">Information Systems Analyst III</div>
                      <div class="item" data-value="Information Systems Researcher I">Information Systems Researcher I</div>
                      <div class="item" data-value="Information Systems Researcher II">Information Systems Researcher II</div>
                      <div class="item" data-value="Information Systems Researcher III">Information Systems Researcher III</div>
                      <div class="item" data-value="Information Technology Officer I">Information Technology Officer I</div>
                      <div class="item" data-value="Information Technology Officer II">Information Technology Officer II</div>
                      <div class="item" data-value="Information Technology Officer III">Information Technology Officer III</div>
                      <div class="item" data-value="Instructor I">Instructor I</div>
                      <div class="item" data-value="Instructor II">Instructor II</div>
                      <div class="item" data-value="Instructor III">Instructor III</div>
                      <div class="item" data-value="Instructor IV">Instructor IV</div>
                      <div class="item" data-value="Instructor V">Instructor V</div>
                      <div class="item" data-value="Instructor VI">Instructor VI</div>
                      <div class="item" data-value="Instructor VII">Instructor VII</div>
                      <div class="item" data-value="Inventory Clerk">Inventory Clerk</div>
                      <div class="item" data-value="Junior Scholarship Affairs Officer">Junior Scholarship Affairs Officer</div>
                      <div class="item" data-value="Labor Foreman">Labor Foreman</div>
                      <div class="item" data-value="Labor General Foreman">Labor General Foreman</div>
                      <div class="item" data-value="Laboratory Aide I">Laboratory Aide I</div>
                      <div class="item" data-value="Laboratory Aide II">Laboratory Aide II</div>
                      <div class="item" data-value="Laboratory Attendant">Laboratory Attendant</div>
                      <div class="item" data-value="Laboratory Technician I">Laboratory Technician I</div>
                      <div class="item" data-value="Laboratory Technician II">Laboratory Technician II</div>
                      <div class="item" data-value="Laboratory Technician III">Laboratory Technician III</div>
                      <div class="item" data-value="Laborer I">Laborer I</div>
                      <div class="item" data-value="Laborer II">Laborer II</div>
                      <div class="item" data-value="Landscaping Supervisor">Landscaping Supervisor</div>
                      <div class="item" data-value="Laundry Worker III">Laundry Worker III</div>
                      <div class="item" data-value="Law Education Specialist I">Law Education Specialist I</div>
                      <div class="item" data-value="Law Education Specialist II">Law Education Specialist II</div>
                      <div class="item" data-value="Law Education Specialist III">Law Education Specialist III</div>
                      <div class="item" data-value="Law Education Specialist IV">Law Education Specialist IV</div>
                      <div class="item" data-value="Law Education Specialist V">Law Education Specialist V</div>
                      <div class="item" data-value="Law Reform Associate I">Law Reform Associate I</div>
                      <div class="item" data-value="Law Reform Associate II">Law Reform Associate II</div>
                      <div class="item" data-value="Law Reform Specialist I">Law Reform Specialist I</div>
                      <div class="item" data-value="Law Reform Specialist II">Law Reform Specialist II</div>
                      <div class="item" data-value="Law Reform Specialist III">Law Reform Specialist III</div>
                      <div class="item" data-value="Law Reform Specialist IV">Law Reform Specialist IV</div>
                      <div class="item" data-value="Law Reform Specialist V">Law Reform Specialist V</div>
                      <div class="item" data-value="Lecturer I">Lecturer I</div>
                      <div class="item" data-value="Lecturer II">Lecturer II</div>
                      <div class="item" data-value="Legal Officer I">Legal Officer I</div>
                      <div class="item" data-value="Legal Officer II">Legal Officer II</div>
                      <div class="item" data-value="Legal Officer III">Legal Officer III</div>
                      <div class="item" data-value="Legal Officer IV">Legal Officer IV</div>
                      <div class="item" data-value="Legal Officer V">Legal Officer V</div>
                      <div class="item" data-value="Legal Researcher">Legal Researcher</div>
                      <div class="item" data-value="Librarian I">Librarian I</div>
                      <div class="item" data-value="Librarian II">Librarian II</div>
                      <div class="item" data-value="Lifeguard">Lifeguard</div>
                      <div class="item" data-value="Linen And Uniform Attendant">Linen And Uniform Attendant</div>
                      <div class="item" data-value="Machine Shop Foreman">Machine Shop Foreman</div>
                      <div class="item" data-value="Machinist I">Machinist I</div>
                      <div class="item" data-value="Machinist II">Machinist II</div>
                      <div class="item" data-value="Machinist III">Machinist III</div>
                      <div class="item" data-value="Management And Audit Analyst I">Management And Audit Analyst I</div>
                      <div class="item" data-value="Management And Audit Analyst II">Management And Audit Analyst II</div>
                      <div class="item" data-value="Management And Audit Analyst III">Management And Audit Analyst III</div>
                      <div class="item" data-value="Mason I">Mason I</div>
                      <div class="item" data-value="Mason II">Mason II</div>
                      <div class="item" data-value="Mechanic I">Mechanic I</div>
                      <div class="item" data-value="Mechanic II">Mechanic II</div>
                      <div class="item" data-value="Mechanic III">Mechanic III</div>
                      <div class="item" data-value="Mechanical Plant Operator I">Mechanical Plant Operator I</div>
                      <div class="item" data-value="Mechanical Plant Operator II">Mechanical Plant Operator II</div>
                      <div class="item" data-value="Mechanical Plant Operator III">Mechanical Plant Operator III</div>
                      <div class="item" data-value="Mechanical Plant Supervisor I">Mechanical Plant Supervisor I</div>
                      <div class="item" data-value="Mechanical Plant Supervisor II">Mechanical Plant Supervisor II</div>
                      <div class="item" data-value="Mechanical Shop Foreman">Mechanical Shop Foreman</div>
                      <div class="item" data-value="Mechanical Shop General Foreman">Mechanical Shop General Foreman</div>
                      <div class="item" data-value="Media Production Aide">Media Production Aide</div>
                      <div class="item" data-value="Media Production Assistant I">Media Production Assistant I</div>
                      <div class="item" data-value="Media Production Assistant II">Media Production Assistant II</div>
                      <div class="item" data-value="Media Production Assistant III">Media Production Assistant III</div>
                      <div class="item" data-value="Media Production Specialist I">Media Production Specialist I</div>
                      <div class="item" data-value="Media Production Specialist II">Media Production Specialist II</div>
                      <div class="item" data-value="Media Production Specialist III">Media Production Specialist III</div>
                      <div class="item" data-value="Medical Specialist I">Medical Specialist I</div>
                      <div class="item" data-value="Medical Specialist II">Medical Specialist II</div>
                      <div class="item" data-value="Medical Specialist III">Medical Specialist III</div>
                      <div class="item" data-value="Medical Technologist I">Medical Technologist I</div>
                      <div class="item" data-value="Medical Technologist II">Medical Technologist II</div>
                      <div class="item" data-value="Medical Technologist III">Medical Technologist III</div>
                      <div class="item" data-value="Metal Worker I">Metal Worker I</div>
                      <div class="item" data-value="Metal Worker II">Metal Worker II</div>
                      <div class="item" data-value="Meter Reader I">Meter Reader I</div>
                      <div class="item" data-value="Meter Reader II">Meter Reader II</div>
                      <div class="item" data-value="Meter Reader III">Meter Reader III</div>
                      <div class="item" data-value="Midwife I">Midwife I</div>
                      <div class="item" data-value="Midwife II">Midwife II</div>
                      <div class="item" data-value="Mimeograph Operator">Mimeograph Operator</div>
                      <div class="item" data-value="Movie Equipment Technician III">Movie Equipment Technician III</div>
                      <div class="item" data-value="Multilith Machine Operator">Multilith Machine Operator</div>
                      <div class="item" data-value="Museum Guide">Museum Guide</div>
                      <div class="item" data-value="Museum Researcher I">Museum Researcher I</div>
                      <div class="item" data-value="Museum Researcher II">Museum Researcher II</div>
                      <div class="item" data-value="News Editor II">News Editor II</div>
                      <div class="item" data-value="Nurse I">Nurse I</div>
                      <div class="item" data-value="Nurse II">Nurse II</div>
                      <div class="item" data-value="Nurse III">Nurse III</div>
                      <div class="item" data-value="Nurse IV">Nurse IV</div>
                      <div class="item" data-value="Nurse V">Nurse V</div>
                      <div class="item" data-value="Nurse VI">Nurse VI</div>
                      <div class="item" data-value="Nursing Attendant I">Nursing Attendant I</div>
                      <div class="item" data-value="Nursing Attendant II">Nursing Attendant II</div>
                      <div class="item" data-value="Nutritionist Dietitian II">Nutritionist Dietitian II</div>
                      <div class="item" data-value="Nutritionist-Dietitian II">Nutritionist-Dietitian II</div>
                      <div class="item" data-value="Nutritionist-Dietitian III">Nutritionist-Dietitian III</div>
                      <div class="item" data-value="Offset Press Operator">Offset Press Operator</div>
                      <div class="item" data-value="Painter Foreman">Painter Foreman</div>
                      <div class="item" data-value="Paper Cutting Machine Operator I">Paper Cutting Machine Operator I</div>
                      <div class="item" data-value="Paper Cutting Machine Operator II">Paper Cutting Machine Operator II</div>
                      <div class="item" data-value="Paper Cutting Machine Operator III">Paper Cutting Machine Operator III</div>
                      <div class="item" data-value="Personnel Examiner">Personnel Examiner</div>
                      <div class="item" data-value="Personnel Specialist II">Personnel Specialist II</div>
                      <div class="item" data-value="Pharmacist I">Pharmacist I</div>
                      <div class="item" data-value="Pharmacist II">Pharmacist II</div>
                      <div class="item" data-value="Pharmacist III">Pharmacist III</div>
                      <div class="item" data-value="Photoengraver I">Photoengraver I</div>
                      <div class="item" data-value="Photoengraver II">Photoengraver II</div>
                      <div class="item" data-value="Photographer I">Photographer I</div>
                      <div class="item" data-value="Photographer II">Photographer II</div>
                      <div class="item" data-value="Photographer III">Photographer III</div>
                      <div class="item" data-value="Photographer IV">Photographer IV</div>
                      <div class="item" data-value="Photo-Lithographic Technician I">Photo-Lithographic Technician I</div>
                      <div class="item" data-value="Planning Officer III">Planning Officer III</div>
                      <div class="item" data-value="Plant Propagator">Plant Propagator</div>
                      <div class="item" data-value="Plumber Foreman">Plumber Foreman</div>
                      <div class="item" data-value="Plumber II">Plumber II</div>
                      <div class="item" data-value="Precision Instrument Tech III">Precision Instrument Tech III</div>
                      <div class="item" data-value="Precision Instrument Technician">Precision Instrument Technician</div>
                      <div class="item" data-value="Precision Instrument Technician II">Precision Instrument Technician II</div>
                      <div class="item" data-value="Precision Instrument Technician III">Precision Instrument Technician III</div>
                      <div class="item" data-value="Press Roller Maker II">Press Roller Maker II</div>
                      <div class="item" data-value="Printing Machine Operator III">Printing Machine Operator III</div>
                      <div class="item" data-value="Printing Machine Operator IV">Printing Machine Operator IV</div>
                      <div class="item" data-value="Printing Press Supervisor">Printing Press Supervisor</div>
                      <div class="item" data-value="Printing Quality Control Officer I">Printing Quality Control Officer I</div>
                      <div class="item" data-value="Private Secretary III">Private Secretary III</div>
                      <div class="item" data-value="Production Planning And Control Officer I">Production Planning And Control Officer I</div>
                      <div class="item" data-value="Professor I">Professor I</div>
                      <div class="item" data-value="Professor II">Professor II</div>
                      <div class="item" data-value="Professor III">Professor III</div>
                      <div class="item" data-value="Professor IV">Professor IV</div>
                      <div class="item" data-value="Professor V">Professor V</div>
                      <div class="item" data-value="Professor VI">Professor VI</div>
                      <div class="item" data-value="Professor VII">Professor VII</div>
                      <div class="item" data-value="Professor VIII">Professor VIII</div>
                      <div class="item" data-value="Professor IX">Professor IX</div>
                      <div class="item" data-value="Professor X">Professor X</div>
                      <div class="item" data-value="Professor XI">Professor XI</div>
                      <div class="item" data-value="Professor XII">Professor XII</div>
                      <div class="item" data-value="Professor Emeritus">Professor Emeritus</div>
                      <div class="item" data-value="Professorial Lecturer">Professorial Lecturer</div>
                      <div class="item" data-value="Professorial Lecturer I">Professorial Lecturer I</div>
                      <div class="item" data-value="Professorial Lecturer II">Professorial Lecturer II</div>
                      <div class="item" data-value="Professorial Lecturer III">Professorial Lecturer III</div>
                      <div class="item" data-value="Professorial Lecturer IV">Professorial Lecturer IV</div>
                      <div class="item" data-value="Professorial Lecturer V">Professorial Lecturer V</div>
                      <div class="item" data-value="Project Development Officer I">Project Development Officer I</div>
                      <div class="item" data-value="Project Development Officer II">Project Development Officer II</div>
                      <div class="item" data-value="Project Development Officer III">Project Development Officer III</div>
                      <div class="item" data-value="Project Development Officer IV">Project Development Officer IV</div>
                      <div class="item" data-value="Project Leader">Project Leader</div>
                      <div class="item" data-value="Property Custodian">Property Custodian</div>
                      <div class="item" data-value="Public Relations Officer I">Public Relations Officer I</div>
                      <div class="item" data-value="Public Relations Officer II">Public Relations Officer II</div>
                      <div class="item" data-value="Publication Circulation Officer I">Publication Circulation Officer I</div>
                      <div class="item" data-value="Publication Circulation Officer II">Publication Circulation Officer II</div>
                      <div class="item" data-value="Publication Production Chief">Publication Production Chief</div>
                      <div class="item" data-value="Radiologic Technologist II">Radiologic Technologist II</div>
                      <div class="item" data-value="Radiologic Technologist III">Radiologic Technologist III</div>
                      <div class="item" data-value="Radiologic Technologist IV">Radiologic Technologist IV</div>
                      <div class="item" data-value="Records Officer I">Records Officer I</div>
                      <div class="item" data-value="Records Officer II">Records Officer II</div>
                      <div class="item" data-value="Records Officer III">Records Officer III</div>
                      <div class="item" data-value="Registrar ">Registrar </div>
                      <div class="item" data-value="Reproduction Machine Operator II">Reproduction Machine Operator II</div>
                      <div class="item" data-value="Reproduction Machine Operator III">Reproduction Machine Operator III</div>
                      <div class="item" data-value="Research Assistant Professor I">Research Assistant Professor I</div>
                      <div class="item" data-value="Research Assistant Professor II">Research Assistant Professor II</div>
                      <div class="item" data-value="Research Assistant Professor III">Research Assistant Professor III</div>
                      <div class="item" data-value="Research Associate Professor I">Research Associate Professor I</div>
                      <div class="item" data-value="Research Associate Professor II">Research Associate Professor II</div>
                      <div class="item" data-value="Research Associate Professor III">Research Associate Professor III</div>
                      <div class="item" data-value="Research Associate Professor IV">Research Associate Professor IV</div>
                      <div class="item" data-value="Research Associate Professor V">Research Associate Professor V</div>
                      <div class="item" data-value="Research Associate Professor VI">Research Associate Professor VI</div>
                      <div class="item" data-value="Research Associate Professor VII">Research Associate Professor VII</div>
                      <div class="item" data-value="Research Professor I">Research Professor I</div>
                      <div class="item" data-value="Research Professor II">Research Professor II</div>
                      <div class="item" data-value="Research Professor III">Research Professor III</div>
                      <div class="item" data-value="Research Professor IV">Research Professor IV</div>
                      <div class="item" data-value="Research Professor V">Research Professor V</div>
                      <div class="item" data-value="Research Professor VI">Research Professor VI</div>
                      <div class="item" data-value="Research Professor VII">Research Professor VII</div>
                      <div class="item" data-value="Research Professor VII">Research Professor VII</div>
                      <div class="item" data-value="Research Professor IX">Research Professor IX</div>
                      <div class="item" data-value="Research Professor X">Research Professor X</div>
                      <div class="item" data-value="Research Professor XI">Research Professor XI</div>
                      <div class="item" data-value="Research Professor XII">Research Professor XII</div>
                      <div class="item" data-value="Sales Representative I">Sales Representative I</div>
                      <div class="item" data-value="Sales Representative II">Sales Representative II</div>
                      <div class="item" data-value="Sales Representative III">Sales Representative III</div>
                      <div class="item" data-value="Sales Representative IV">Sales Representative IV</div>
                      <div class="item" data-value="Sanitation Inspector I">Sanitation Inspector I</div>
                      <div class="item" data-value="Sanitation Inspector II">Sanitation Inspector II</div>
                      <div class="item" data-value="Sanitation Inspector III">Sanitation Inspector III</div>
                      <div class="item" data-value="Scholarship Affairs Officer I">Scholarship Affairs Officer I</div>
                      <div class="item" data-value="Scholarship Affairs Officer II">Scholarship Affairs Officer II</div>
                      <div class="item" data-value="School Credits Evaluator I">School Credits Evaluator I</div>
                      <div class="item" data-value="Science Education Associate I">Science Education Associate I</div>
                      <div class="item" data-value="Science Education Associate II">Science Education Associate II</div>
                      <div class="item" data-value="Science Education Specialist I">Science Education Specialist I</div>
                      <div class="item" data-value="Science Education Specialist II">Science Education Specialist II</div>
                      <div class="item" data-value="Science Education Specialist III">Science Education Specialist III</div>
                      <div class="item" data-value="Science Education Specialist IV">Science Education Specialist IV</div>
                      <div class="item" data-value="Science Education Specialist V">Science Education Specialist V</div>
                      <div class="item" data-value="Science Research Assistant">Science Research Assistant</div>
                      <div class="item" data-value="Sciende Education Specialist I">Sciende Education Specialist I</div>
                      <div class="item" data-value="Sciende Education Specialist II">Sciende Education Specialist II</div>
                      <div class="item" data-value="Sciende Education Specialist III">Sciende Education Specialist III</div>
                      <div class="item" data-value="Sciende Education Specialist IV">Sciende Education Specialist IV</div>
                      <div class="item" data-value="Scientific Documentation Officer I">Scientific Documentation Officer I</div>
                      <div class="item" data-value="Scientific Documentation Officer II">Scientific Documentation Officer II</div>
                      <div class="item" data-value="Secretary Of The University And Bor">Secretary Of The University And Bor</div>
                      <div class="item" data-value="Secretary I">Secretary I</div>
                      <div class="item" data-value="Secretary II">Secretary II</div>
                      <div class="item" data-value="Security Guard">Security Guard</div>
                      <div class="item" data-value="Senior Administrative Assistant I">Senior Administrative Assistant I</div>
                      <div class="item" data-value="Senior Administrative Assistant II">Senior Administrative Assistant II</div>
                      <div class="item" data-value="Senior Administrative Assistant III">Senior Administrative Assistant III</div>
                      <div class="item" data-value="Senior Administrative Assistant IV">Senior Administrative Assistant IV</div>
                      <div class="item" data-value="Senior Administrative Assistant V">Senior Administrative Assistant V</div>
                      <div class="item" data-value="Senior Bookkeeper">Senior Bookkeeper</div>
                      <div class="item" data-value="Senior Clerk">Senior Clerk</div>
                      <div class="item" data-value="Senior Communications Development Officer I">Senior Communications Development Officer I</div>
                      <div class="item" data-value="Senior Communications Development Officer II">Senior Communications Development Officer II</div>
                      <div class="item" data-value="Senior Lecturer I">Senior Lecturer I</div>
                      <div class="item" data-value="Senior Lecturer II">Senior Lecturer II</div>
                      <div class="item" data-value="Senior Lecturer III">Senior Lecturer III</div>
                      <div class="item" data-value="Senior Personnel Specialist">Senior Personnel Specialist</div>
                      <div class="item" data-value="Senior Scholarship Affairs Officer">Senior Scholarship Affairs Officer</div>
                      <div class="item" data-value="Special Police Assistant Chief">Special Police Assistant Chief</div>
                      <div class="item" data-value="Special Police Captain">Special Police Captain</div>
                      <div class="item" data-value="Special Police Chief">Special Police Chief</div>
                      <div class="item" data-value="Special Police Corporal">Special Police Corporal</div>
                      <div class="item" data-value="Special Police Lieutenant">Special Police Lieutenant</div>
                      <div class="item" data-value="Special Police Major">Special Police Major</div>
                      <div class="item" data-value="Special Police Sergeant">Special Police Sergeant</div>
                      <div class="item" data-value="Special Police">Special Police</div>
                      <div class="item" data-value="Senior Scholarship Affairs Officer">Senior Scholarship Affairs Officer</div>
                      <div class="item" data-value="Senior Administrative Assistant I">Senior Administrative Assistant I</div>
                      <div class="item" data-value="Senior Administrative Assistant II">Senior Administrative Assistant II</div>
                      <div class="item" data-value="Senior Administrative Assistant III">Senior Administrative Assistant III</div>
                      <div class="item" data-value="Stenographer">Stenographer</div>
                      <div class="item" data-value="Stenographer III">Stenographer III</div>
                      <div class="item" data-value="Steward">Steward</div>
                      <div class="item" data-value="Storekeeper III">Storekeeper III</div>
                      <div class="item" data-value="Student Records Evaluator I">Student Records Evaluator I</div>
                      <div class="item" data-value="Student Records Evaluator II">Student Records Evaluator II</div>
                      <div class="item" data-value="Student Records Evaluator III">Student Records Evaluator III</div>
                      <div class="item" data-value="Student Records Evaluator IV">Student Records Evaluator IV</div>
                      <div class="item" data-value="Supervising Administrative Officer">Supervising Administrative Officer</div>
                      <div class="item" data-value="Supervising Ecosystems Mgt Specialist">Supervising Ecosystems Mgt Specialist</div>
                      <div class="item" data-value="Supervisor Of Student Teaching">Supervisor Of Student Teaching</div>
                      <div class="item" data-value="Supply Officer I">Supply Officer I</div>
                      <div class="item" data-value="Supply Officer II">Supply Officer II</div>
                      <div class="item" data-value="Supply Officer III">Supply Officer III</div>
                      <div class="item" data-value="Supply Officer IV">Supply Officer IV</div>
                      <div class="item" data-value="Supply Officer V">Supply Officer V</div>
                      <div class="item" data-value="Supvg Administrative Officer">Supvg Administrative Officer</div>
                      <div class="item" data-value="Teaching Associate">Teaching Associate</div>
                      <div class="item" data-value="Teaching Fellow">Teaching Fellow</div>
                      <div class="item" data-value="Typesetter I">Typesetter I</div>
                      <div class="item" data-value="Typesetter II">Typesetter II</div>
                      <div class="item" data-value="Typesetter III">Typesetter III</div>
                      <div class="item" data-value="Univeristy Research Associate I">Univeristy Research Associate I</div>
                      <div class="item" data-value="University Extension Associate I">University Extension Associate I</div>
                      <div class="item" data-value="University Extension Associate II">University Extension Associate II</div>
                      <div class="item" data-value="University Extension Specialist I">University Extension Specialist I</div>
                      <div class="item" data-value="University Extension Specialist II">University Extension Specialist II</div>
                      <div class="item" data-value="University Extension Specialist III">University Extension Specialist III</div>
                      <div class="item" data-value="University Extension Specialist IV">University Extension Specialist IV</div>
                      <div class="item" data-value="University Extension Specialist V">University Extension Specialist V</div>
                      <div class="item" data-value="University Legal Counsel">University Legal Counsel</div>
                      <div class="item" data-value="University Professor Emeritus">University Professor Emeritus</div>
                      <div class="item" data-value="University Research Assistant I">University Research Assistant I</div>
                      <div class="item" data-value="University Research Associate I">University Research Associate I</div>
                      <div class="item" data-value="University Research Associate II">University Research Associate II</div>
                      <div class="item" data-value="University Researcher I">University Researcher I</div>
                      <div class="item" data-value="University Researcher II">University Researcher II</div>
                      <div class="item" data-value="University Researcher III">University Researcher III</div>
                      <div class="item" data-value="University Researcher IV">University Researcher IV</div>
                      <div class="item" data-value="University Researcher V">University Researcher V</div>
                      <div class="item" data-value="UP President">UP President</div>
                      <div class="item" data-value="Utility Foreman">Utility Foreman</div>
                      <div class="item" data-value="Utility Man">Utility Man</div>
                      <div class="item" data-value="Utility Worker I">Utility Worker I</div>
                      <div class="item" data-value="Utility Worker II">Utility Worker II</div>
                      <div class="item" data-value="Visiting Assistant Professor">Visiting Assistant Professor</div>
                      <div class="item" data-value="Visiting Professor">Visiting Professor</div>
                      <div class="item" data-value="Visiting Research Fellow">Visiting Research Fellow</div>
                      <div class="item" data-value="Waiter II">Waiter II</div>
                      <div class="item" data-value="Welder II">Welder II</div>
                      <div class="item" data-value="Writer Specialist">Writer Specialist</div>
                    </div>
                  </div>
                </div>
                <div class="field">
                  <label>Original Assignment</label>
                  <input id="originalassignment" type="text" name="original_assignment" maxlength="10" placeholder="mm/dd/yyyy">
                </div>
              </div>
              <h4 class="ui dividing header">Contact Sureties</h4>
              <div class="four fields">
                <div class="field">
                  <label>Name</label>
                </div>
                <div class="field">
                  <label>Address</label>
                </div>
                <div class="field">
                  <label>Contact No.</label>
                </div>
                <div class="field">
                  <label>E-mail Address</label>
                </div>
              </div>
              <div class="four fields">
                <div class="field">
                  <input id="cs1_name" type="text" value="" name="cs1_name" placeholder="CS 1 LN, FN, S, MN">
                </div>
                <div class="field">
                  <input id ="cs1_address" type="text" value="" name="cs1_address" placeholder="CS 1 Address">
                </div>
                <div class="field">
                  <input id="cs1_contact_no" type="text" value="" name="cs1_contact_no" placeholder="CS 1 Contact No.">
                </div>
                <div class="field">
                  <input id="cs1_email"  type="text" value="" name="cs1_email" placeholder="CS 1 E-Mail Address">
                </div>
              </div>
              <div class="four fields">
                <div class="field">
                  <input id="cs2_name" type="text" value="" name="cs2_name" placeholder="CS 2 LN, FN, S, MN">
                </div>
                <div class="field">
                  <input id="cs2_address" type="text" value="" name="cs2_address" placeholder="CS 2 Address">
                </div>
                <div class="field">
                  <input id="cs2_contact_no" type="text" value="" name="cs2_contact_no" placeholder="CS 2 Contact No.">
                </div>
                <div class="field">
                  <input id="cs2_email" type="text" value="" name="cs2_email" placeholder="CS 2 E-Mail Address">
                </div>
              </div>
              <div class="four fields">
                <div class="field">
                  <input id="cs3_name" type="text" value="" name="cs3_name" placeholder="CS 3 LN, FN, S, MN">
                </div>
                <div class="field">
                  <input id="cs3_address" type="text" value="" name="cs3_address" placeholder="CS 3 Address">
                </div>
                <div class="field">
                  <input id="cs3_contact_no" type="text" value="" name="cs3_contact_no" placeholder="CS 3 Contact No.">
                </div>
                <div class="field">
                  <input id="cs3_email" type="text" value="" name="cs3_email" placeholder="CS 3 E-Mail Address">
                </div>
              </div>
              <div class="four fields">
                <div class="field">
                  <input id="cs4_name" type="text" value="" name="cs4_name" placeholder="CS 4 LN, FN, S, MN">
                </div>
                <div class="field">
                  <input id="cs4_address" type="text" value="" name="cs4_address" placeholder="CS 4 Address">
                </div>
                <div class="field">
                  <input id="cs4_contact_no" type="text" value="" name="cs4_contact_no" placeholder="CS 4 Contact No.">
                </div>
                <div class="field">
                  <input id="cs4_email" type="text" value="" name="cs4_email" placeholder="CS 4 E-Mail Address">
                </div>
              </div>
            </div>
          </div>
          <div class="actions">
            <div class="ui blue basic reset button">Reset</div>
            <div class="ui red cancel button">Cancel</div>
            <button class="ui green submit button" type="submit" id="insert_employee" form="add_employee_form">Add</button>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>


<!-- footer -->
<?php include('admin_footer.php'); ?>
</body>

<script type="text/javascript">

  $(document).ready(function() {
      $('#example').DataTable();
  } );


  $('#add_employee_modal').modal('attach events', '#add_employee_button', 'show').modal('setting', 'closable', false);

  $('.ui.dropdown')
    .dropdown()
  ;
    // cancel button for add details
  $('.cancel.button').on('click', function() {
    $('.ui.form')[0].reset(); //add details form
    $('.ui.form .ui.dropdown').dropdown('restore defaults');
  });

  // reset button for the forms
  $('.reset.button').on('click', function() {
    $('.ui.form')[0].reset(); //add details form
    $('.ui.form .ui.dropdown').dropdown('restore defaults');
  });

  $(function(){
          $( "#insert_employee" ).click(function(event)
          {
              event.preventDefault();//prevent auto submit data

              var employeenumber= $("#employeenumber").val();
              var lastname= $("#lastname").val();
              var firstname= $("#firstname").val();
              var suffix= $("#suffix").val();
              var middlename= $("#middlename").val();
              var birthdate= $("#birthdate").val();
              var gender= $("#gender").val();
              var primaryemail= $("#primaryemail").val();
              var secondaryemail= $("#secondaryemail").val();
              var primarycontact= $("#primarycontact").val();
              var secondarycontact= $("#secondarycontact").val();
              var permanentaddress= $("#permanentaddress").val();
              var unit= $("#unit").val();
              var department= $("#department").val();
              var employeetype= $("#employeetype").val();
              var employmentstatus= $("#employmentstatus").val();
              var rank= $("#rank").val();
              var originalassignment= $("#originalassignment").val();
              var cs1_name= $("#cs1_name").val();
              var cs1_address= $("#cs1_address").val();
              var cs1_contact_no= $("#cs1_contact_no").val();
              var cs1_email= $("#cs1_email").val();
              var cs2_name= $("#cs2_name").val();
              var cs2_address= $("#cs2_address").val();
              var cs2_contact_no= $("#cs2_contact_no").val();
              var cs2_email= $("#cs2_email").val();
              var cs3_name= $("#cs3_name").val();
              var cs3_address= $("#cs3_address").val();
              var cs3_contact_no= $("#cs3_contact_no").val();
              var cs3_email= $("#cs3_email").val();
              var cs4_name= $("#cs4_name").val();
              var cs4_address= $("#cs4_address").val();
              var cs4_contact_no= $("#cs4_contact_no").val();
              var cs4_email= $("#cs4_email").val();

              var emplchar = /^\d+$/.test(employeenumber);

              if(emplchar && employeenumber.length == 9 && lastname && firstname && middlename && birthdate && primaryemail && primarycontact && permanentaddress && originalassignment){
                $.ajax(
                    {
                        type:"post",
                        url: "<?php echo base_url(); ?>/Admin/add_employee",//URL changed
                        data:{
                          employeenumber:employeenumber,
                          lastname:lastname,
                          firstname:firstname,
                          suffix:suffix,
                          middlename:middlename,
                          birthdate:birthdate,
                          gender:gender,
                          primaryemail:primaryemail,
                          secondaryemail:secondaryemail,
                          primarycontact:primarycontact,
                          secondarycontact:secondarycontact,
                          permanentaddress:permanentaddress,
                          unit:unit,
                          department:department,
                          employeetype:employeetype,
                          employmentstatus:employmentstatus,
                          rank:rank,
                          originalassignment:originalassignment,
                          cs1_name:cs1_name,
                          cs1_address:cs1_address,
                          cs1_contact_no:cs1_contact_no,
                          cs1_email:cs1_email,
                          cs2_name:cs2_name,
                          cs2_address:cs2_address,
                          cs2_contact_no:cs2_contact_no,
                          cs2_email:cs2_email,
                          cs3_name:cs3_name,
                          cs3_address:cs3_address,
                          cs3_contact_no:cs3_contact_no,
                          cs3_email:cs3_email,
                          cs4_name:cs4_name,
                          cs4_address:cs4_address,
                          cs4_contact_no:cs4_contact_no,
                          cs4_email:cs4_email,
                          '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'
                        },
                        success:function(data)
                        {
                            //console.log(data);
                            location.reload();
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown)
                        {
                            alert("Input error.");
                        }
                    });

              }

          });
      });

  $('.ui.form').form({
      inline: true,
      on: "blur",
      fields: {
        employee_no: {
          rules: [
            {
              type   : 'empty'
            },
            {
              type   : 'exactLength[9]'
            },
            {
              type   : 'number'
            }
          ]},
        employee_ln: {
          rules: [
            {
              type   : 'empty'
            }
          ]},
        employee_fn: {
          rules: [
            {
              type   : 'empty'
            }
          ]},
        employee_mn: {
          rules: [
            {
              type   : 'empty'
            }
          ]},
        date_of_birth: {
          rules: [
            {
              type   : 'empty'
            }
          ]},
        gender: {
          rules: [
            {
              type   : 'empty'
            }
          ]},
        primary_email: {
          rules: [
            {
              type   : 'empty'
            }
          ]},
        primary_contact_no: {
          rules: [
            {
              type   : 'empty'
            },
            {
              type   : 'number'
            }
          ]},
        permanent_address: {
          rules: [
            {
              type   : 'empty'
            }
          ]},
        unit: {
          rules: [
            {
              type   : 'empty'
            }
          ]},
        department: {
          rules: [
            {
              type   : 'empty'
            }
          ]},
        employee_type: {
          rules: [
            {
              type   : 'empty'
            }
          ]},
        employment_status: {
          rules: [
            {
              type   : 'empty'
            }
          ]},
        rank: {
          rules: [
            {
              type   : 'empty'
            }
          ]},
        original_assignment: {
          rules: [
            {
              type   : 'empty'
            }
          ]}
      }
    })
  ;
</script>

</html>
