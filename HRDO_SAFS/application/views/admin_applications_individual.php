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
  <title>Application - HRDO Sabbatical Manager</title>
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/logo_black_icon.ico'); ?>"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.js"></script>
  <!-- fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <!-- CSS file location -->
  <link href="<?php echo base_url('assets/css/admin_header_footer_sidebar.css'); ?>" rel="stylesheet" type="text/css">
  <link href="https://cdn.datatables.net/1.10.13/css/dataTables.semanticui.min.css" rel="stylesheet">
  <!-- javascript file location -->
  <!--<script src="//code.jquery.com/jquery-1.12.4.js"></script>-->
  <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.13/js/dataTables.semanticui.min.js"></script>
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
  <a href="<?php echo base_url(); ?>admin/ongoingapps" class="side item active">
    <i class="red alarm outline icon"></i>
    Ongoing Applications
  </a>
  <a href="<?php echo base_url(); ?>admin/employeelist" class="side item">
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
  <h1 class="ui header"><i class="alarm outline icon"></i>Ongoing Applications</h1>
  <hr>
  <h2>Ongoing Application details</h2>
  <div class="ui two column doubling stackable grid container">
    <div class="column">
      <table class="ui two column very basic compact table">
        <tbody>
          <tr>
            <td id="left" class="active right aligned"><b>Application No.:</b></td>
            <td><?php echo $transaction_data['transactionnumber'] ?></td>
          </tr>
          <tr>
            <td id="left" class="active right aligned"><b>Application Date:</b></td>
            <?php $applicationdate = date("m/d/Y", strtotime($transaction_data['applicationdate']));?>
            <td><?php echo $applicationdate ?></td>
          </tr>
          <tr>
            <td id="left" class="active right aligned"><b>Leave Type:</b></td>
            <td><?php echo $transaction_data['leavetype'] ?></td>
          </tr>
          <tr>
            <td id="left" class="active right aligned"><b>Leave Details:</b></td>
            <td><?php echo $transaction_data['leavedetails'] ?></td>
          </tr>
          <tr>
            <td id="left" class="active right aligned"><b>Leave Status:</b></td>
            <td><?php echo $transaction_data['leavestatus'] ?></td>
          </tr>
          <tr>
            <td id="left" class="active right aligned"><b>Development Type:</b></td>
            <td><?php echo $transaction_data['developmenttype'] ?></td>
          </tr>
          <tr>
            <td id="left" class="active right aligned"><b>Degree Pursued:</b></td>
            <td><?php echo $transaction_data['degreepursued'] ?></td>
          </tr>
          <tr>
            <td id="left" class="active right aligned"><b>Institution:</b></td>
            <td><?php echo $transaction_data['institution'] ?></td>
          </tr>
          <tr>
            <td id="left" class="active right aligned"><b>Location:</b></td>
            <td><?php echo $transaction_data['location'] ?></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="column">
      <table class="ui two column very basic compact table">
        <tbody>
          <tr>
            <td id="left" class="active right aligned"><b>Country:</b></td>
            <td><?php echo $transaction_data['country'] ?></td>
          </tr>
          <tr>
            <td id="left" class="active right aligned"><b>Sponsor/Donor:</b></td>
            <td><?php echo $transaction_data['sponsordonor'] ?></td>
          </tr>
          <tr>
            <td id="left" class="active right aligned"><b>Local/Abroad:</b></td>
            <td><?php echo $transaction_data['localabroad'] ?></td>
          </tr>
          <tr>
            <td id="left" class="active right aligned"><b>Start Date:</b></td>
            <?php $startdate = date("m/d/Y", strtotime($transaction_data['startdate']));?>
            <td><?php echo $startdate ?></td>
          </tr>
          <tr>
            <td id="left" class="active right aligned"><b>End Date:</b></td>
            <?php $enddate = date("m/d/Y", strtotime($transaction_data['enddate']));?>
            <td><?php echo $enddate ?></td>
          </tr>
          <tr>
            <td id="left" class="active right aligned"><b>Duration:</b></td>
            <td><?php echo $transaction_data['duration'] ?></td>
          </tr>
          <tr>
            <td id="left" class="active right aligned"><b>Report For Duty:</b></td>
            <?php $reportforduty = date("m/d/Y", strtotime($transaction_data['reportforduty']));?>
            <td><?php echo $reportforduty ?></td>
          </tr>
          <tr>
            <td id="left" class="active right aligned"><b>Return Service Obligation:</b></td>
            <td><?php echo $transaction_data['rso'] ?></td>
          </tr>
          <tr>
            <td id="left" class="active right aligned"><b>Return Service Obligation Status:</b></td>
            <td><?php echo $transaction_data['rsostatus'] ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <h2>Employee details</h2>
  <div class="ui two column doubling stackable grid container">
    <div class="column">
      <table class="ui two column very basic compact table">
        <tbody>
          <tr>
            <td id="left" class="active right aligned"><b>Employee No.:</b></td>
            <td><?php echo $employee_data['employeenumber']; ?></td>
          </tr>
          <tr>
            <td id="left" class="active right aligned"><b>Employee Name:</b></td>
            <td><?php echo $employee_data['lastname'].", ". $employee_data['firstname']." ". $employee_data['middlename']." ".$employee_data['suffix']; ?></td>
          </tr>
          <tr>
            <td id="left" class="active right aligned"><b>Date of Birth:</b></td>
            <?php $bday = date("m/d/Y", strtotime($employee_data['birthdate'])); ?>
            <td><?php echo $bday; ?></td>
          </tr>
          <tr>
            <td id="left" class="active right aligned"><b>Gender:</b></td>
            <td><?php echo $employee_data['gender']; ?></td>
          </tr>
          <tr>
            <td id="left" class="active right aligned"><b>Primary E-mail Address:</b></td>
            <td><?php echo $employee_data['primaryemail']; ?></td>
          </tr>
          <tr>
            <td id="left" class="active right aligned"><b>Secondary E-mail Address:</b></td>
            <td><?php echo $employee_data['secondaryemail']; ?></td>
          </tr>
          <tr>
            <td id="left" class="active right aligned"><b>Primary Contact No.:</b></td>
            <td><?php echo $employee_data['primarycontact']; ?></td>
          </tr>
          <tr>
            <td id="left" class="active right aligned"><b>Secondary Contact No.:</b></td>
            <td><?php echo $employee_data['secondarycontact']; ?></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="column">
      <table class="ui two column very basic compact table">
        <tbody>
          <tr>
            <td id="left" class="active right aligned"><b>Permanent Address:</b></td>
            <td><?php echo $employee_data['permanentaddress']; ?></td>
          </tr>
          <tr>
            <td id="left" class="active right aligned"><b>Unit:</b></td>
            <td><?php echo $employee_data['unit']; ?></td>
          </tr>
          <tr>
            <td id="left" class="active right aligned"><b>Department:</b></td>
            <td><?php echo $employee_data['department']; ?></td>
          </tr>
          <tr>
            <td id="left" class="active right aligned"><b>Employee Type:</b></td>
            <td><?php echo $employee_data['employeetype']; ?></td>
          </tr>
          <tr>
            <td id="left" class="active right aligned"><b>Employment Status:</b></td>
            <td><?php echo $employee_data['employmentstatus']; ?></td>
          </tr>
          <tr>
            <td id="left" class="active right aligned"><b>Rank:</b></td>
            <td><?php echo $employee_data['rank']; ?></td>
          </tr>
          <tr>
            <td id="left" class="active right aligned"><b>Original Assignment:</b></td>
            <?php $oa = date("m/d/Y", strtotime($employee_data['originalassignment'])); ?>
            <td><?php echo $oa; ?></td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="ui four column doubling stackable grid container">
    <div class="column">
    </div>
    <div class="column">
    </div>
    <div class="column">
      <div class="ui fluid negative button" id="delete_ongoing_application_button">
        <i class="remove icon"></i>
        Delete Application
        <div id="delete_ongoing_application_modal" class="ui small modal">
          <div class="header">
            <i class="remove icon"></i>Delete Ongoing Application
          </div>
          <div class="content">
            <p>Are you sure you want to delete this ongoing application?</p>
          </div>
          <div class="actions">
            <div class="ui negative button">
              Cancel
            </div>
            <div id="delete_application" type="submit" class="ui positive button">
              Delete
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="column">
      <div class="ui fluid positive button" id="edit_ongoing_application_button">
        <i class="edit icon"></i>
        Edit Application
        <div id="edit_ongoing_application_modal" class="ui long small modal">
          <div class="header">
            <i class="edit icon"></i>Edit Ongoing Application
          </div>
          <div class="content">
            <form id="edit_ongoing_application_form" class="ui form">
              <h4 class="ui dividing header">Ongoing Application Information</h4>
              <div class="three required fields">
                <div class="field">
                  <label>Application No.</label>
                  <input id="transactionnumber" type="text" name="application_no" maxlength="7" placeholder="1234567" value="<?php echo $transaction_data['transactionnumber'] ?>">
                </div>
                <div class="field">
                  <label>Employee No.</label>
                  <input id="employeenumber" type="text" name="employee_no" maxlength="9" placeholder="123456789" value="<?php echo $employee_data['employeenumber']; ?>">
                </div>
                <div class="field">
                  <label>Application Date</label>
                  <?php $applicationdate = date("m/d/Y", strtotime($transaction_data['applicationdate']));?>
                  <input id="applicationdate" type="text" name="application_date" maxlength="10" placeholder="mm/dd/yyyy" value="<?php echo $applicationdate ?>">
                </div>
              </div>
              <div class="three required fields">
                <div class="field">
                  <label>Leave Type</label>
                  <div class="ui selection dropdown">
                    <input id="leavetype" type="hidden" name="leave_type" value="<?php echo $transaction_data['leavetype'] ?>">
                    <i class="dropdown icon"></i>
                    <!-- <div class="default text">Select Leave Type</div> -->
                    <div class="text" id="leavetype_text"><?php echo $transaction_data['leavetype'] ?></div>
                    <div class="menu">
                      <div class="item" data-value="Study Leave with Pay">Study Leave with Pay</div>
                      <div class="item" data-value="Study Leave without Pay">Study Leave without Pay</div>
                      <div class="item" data-value="Doctoral Studies Fund">Doctoral Studies Fund </div>
                      <div class="item" data-value="Sabbatical Leave">Sabbatical Leave </div>
                      <div class="item" data-value="Special Detail with Pay">Special Detail with Pay</div>
                      <div class="item" data-value="Special Detail without Pay">Special Detail without Pay</div>
                      <div class="item" data-value="Enrollment Privilege">Enrollment Privilege</div>
                      <div class="item" data-value="Local Faculty Fellowship (LFF)">Local Faculty Fellowship (LFF)</div>
                      <div class="item" data-value="Non Teaching Staff Fellowship (NTSF)">Non Teaching Staff Fellowship (NTSF)</div>
                      <div class="item" data-value="Study Leave with Pay with Non Teaching Staff Fellowship (SLWP-NTSF)">Study Leave with Pay with Non Teaching Staff Fellowship (SLWP-NTSF)</div>
                      <div class="item" data-value="Professorial Chair">Professorial Chair</div>
                    </div>
                  </div>
                </div>
                <div class="field">
                  <label>Leave Details</label>
                  <div class="ui selection dropdown">
                    <input id="leavedetails" type="hidden" name="leave_details" value="<?php echo $transaction_data['leavedetails'] ?>">
                    <i class="dropdown icon"></i>
                    <!-- <div class="default text">Select Leave Details</div> -->
                    <div class="text" id="leavedetails_text"><?php echo $transaction_data['leavedetails'] ?></div>
                    <div class="menu">
                      <div class="item" data-value="Half-Day">Half-Day</div>
                      <div class="item" data-value="Full-Time">Full-Time</div>
                    </div>
                  </div>
                </div>
                <div class="field">
                  <label>Leave Status</label>
                  <div class="ui selection dropdown">
                    <input id="leavestatus" type="hidden" name="leave_status" value="<?php echo $transaction_data['leavestatus'] ?>">
                    <i class="dropdown icon"></i>
                    <!-- <div class="default text">Select Leave Status</div> -->
                    <div class="text" id="leavestatus_text"><?php echo $transaction_data['leavestatus'] ?></div>
                    <div class="menu">
                      <div class="item" data-value="Original">Original</div>
                      <div class="item" data-value="Reinstatement">Reinstatement</div>
                      <div class="item" data-value="Renewal">Renewal</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="three required fields">
                <div class="field">
                  <label>Development Type</label>
                  <div class="ui selection dropdown">
                    <input id="developmenttype" type="hidden" name="development_type" value="<?php echo $transaction_data['developmenttype'] ?>">
                    <i class="dropdown icon"></i>
                    <!-- <div class="default text">Select Development Type</div> -->
                    <div class="text" id="devtype_text"><?php echo $transaction_data['developmenttype'] ?></div>
                    <div class="menu">
                      <div class="item" data-value="Vocational">Vocational</div>
                      <div class="item" data-value="Training Program">Training Program</div>
                      <div class="item" data-value="Diploma">Diploma</div>
                      <div class="item" data-value="Visiting Student">Visiting Student</div>
                      <div class="item" data-value="Undergraduate">Undergraduate</div>
                      <div class="item" data-value="Master of Arts">Master of Arts</div>
                      <div class="item" data-value="Master of Science">Master of Science</div>
                      <div class="item" data-value="Visiting Professor">Visiting Professor</div>
                      <div class="item" data-value="Doctor of Philosophy">Doctor of Philosophy</div>
                    </div>
                  </div>
                </div>
                <div class="field">
                  <label>Degree Pursued</label>
                  <input id="degreepursued" type="text" name="degree_pursued" placeholder="Degree Pursued" value="<?php echo $transaction_data['degreepursued'] ?>">
                </div>
                <div class="field">
                  <label>Institution</label>
                  <input id="institution" type="text" name="institution" placeholder="Institution" value="<?php echo $transaction_data['institution'] ?>">
                </div>
              </div>
              <div class="two required fields">
                <div class="field">
                  <label>Location</label>
                  <input id="location" type="text" name="location" placeholder="Location" value="<?php echo $transaction_data['location'] ?>">
                </div>
                <div class="field">
                  <label>Country</label>
                  <div class="ui search selection dropdown" id="country_text">
                    <input id="country" type="hidden" name="country" value="<?php echo $transaction_data['country'] ?>">
                    <i class="dropdown icon"></i>
                    <!-- <div class="default text">Select Country</div> -->
                    <div class="text">
                      <div class="item" data-value="<?php echo $transaction_data['country'] ?>"></i><?php echo $transaction_data['country'] ?></div>
                    </div>
                    <div class="menu">
                      <div class="item" data-value="Andorra"><i class="ad flag"></i>Andorra</div>
                      <div class="item" data-value="United Arab Emirates"><i class="ae flag"></i>United Arab Emirates</div>
                      <div class="item" data-value="Afghanistan"><i class="af flag"></i>Afghanistan</div>
                      <div class="item" data-value="Antigua"><i class="ag flag"></i>Antigua</div>
                      <div class="item" data-value="Anguilla"><i class="ai flag"></i>Anguilla</div>
                      <div class="item" data-value="Albania"><i class="al flag"></i>Albania</div>
                      <div class="item" data-value="Armenia"><i class="am flag"></i>Armenia</div>
                      <div class="item" data-value="Netherlands Antilles"><i class="an flag"></i>Netherlands Antilles</div>
                      <div class="item" data-value="Angola"><i class="ao flag"></i>Angola</div>
                      <div class="item" data-value="Argentina"><i class="ar flag"></i>Argentina</div>
                      <div class="item" data-value="American Samoa"><i class="as flag"></i>American Samoa</div>
                      <div class="item" data-value="Austria"><i class="at flag"></i>Austria</div>
                      <div class="item" data-value="Australia"><i class="au flag"></i>Australia</div>
                      <div class="item" data-value="Aruba"><i class="aw flag"></i>Aruba</div>
                      <div class="item" data-value="Aland Islands"><i class="ax flag"></i>Aland Islands</div>
                      <div class="item" data-value="Azerbaijan"><i class="az flag"></i>Azerbaijan</div>
                      <div class="item" data-value="Bosnia"><i class="ba flag"></i>Bosnia</div>
                      <div class="item" data-value="Barbados"><i class="bb flag"></i>Barbados</div>
                      <div class="item" data-value="Bangladesh"><i class="bd flag"></i>Bangladesh</div>
                      <div class="item" data-value="Belgium"><i class="be flag"></i>Belgium</div>
                      <div class="item" data-value="Burkina Faso"><i class="bf flag"></i>Burkina Faso</div>
                      <div class="item" data-value="Bulgaria"><i class="bg flag"></i>Bulgaria</div>
                      <div class="item" data-value="Bahrain"><i class="bh flag"></i>Bahrain</div>
                      <div class="item" data-value="Burundi"><i class="bi flag"></i>Burundi</div>
                      <div class="item" data-value="Benin"><i class="bj flag"></i>Benin</div>
                      <div class="item" data-value="Bermuda"><i class="bm flag"></i>Bermuda</div>
                      <div class="item" data-value="Brunei"><i class="bn flag"></i>Brunei</div>
                      <div class="item" data-value="Bolivia"><i class="bo flag"></i>Bolivia</div>
                      <div class="item" data-value="Brazil"><i class="br flag"></i>Brazil</div>
                      <div class="item" data-value="Bahamas"><i class="bs flag"></i>Bahamas</div>
                      <div class="item" data-value="Bhutan"><i class="bt flag"></i>Bhutan</div>
                      <div class="item" data-value="Bouvet Island"><i class="bv flag"></i>Bouvet Island</div>
                      <div class="item" data-value="Botswana"><i class="bw flag"></i>Botswana</div>
                      <div class="item" data-value="Belarus"><i class="by flag"></i>Belarus</div>
                      <div class="item" data-value="Belize"><i class="bz flag"></i>Belize</div>
                      <div class="item" data-value="Canada"><i class="ca flag"></i>Canada</div>
                      <div class="item" data-value="Cocos Islands"><i class="cc flag"></i>Cocos Islands</div>
                      <div class="item" data-value="Congo"><i class="cd flag"></i>Congo</div>
                      <div class="item" data-value="Central African Republic"><i class="cf flag"></i>Central African Republic</div>
                      <div class="item" data-value="Congo Brazzaville"><i class="cg flag"></i>Congo Brazzaville</div>
                      <div class="item" data-value="Switzerland"><i class="ch flag"></i>Switzerland</div>
                      <div class="item" data-value="Cote Divoire"><i class="ci flag"></i>Cote Divoire</div>
                      <div class="item" data-value="Cook Islands"><i class="ck flag"></i>Cook Islands</div>
                      <div class="item" data-value="Chile"><i class="cl flag"></i>Chile</div>
                      <div class="item" data-value="Cameroon"><i class="cm flag"></i>Cameroon</div>
                      <div class="item" data-value="China"><i class="cn flag"></i>China</div>
                      <div class="item" data-value="Colombia"><i class="co flag"></i>Colombia</div>
                      <div class="item" data-value="Costa Rica"><i class="cr flag"></i>Costa Rica</div>
                      <div class="item" data-value="Serbia"><i class="cs flag"></i>Serbia</div>
                      <div class="item" data-value="Cuba"><i class="cu flag"></i>Cuba</div>
                      <div class="item" data-value="Cape Verde"><i class="cv flag"></i>Cape Verde</div>
                      <div class="item" data-value="Christmas Island"><i class="cx flag"></i>Christmas Island</div>
                      <div class="item" data-value="Cyprus"><i class="cy flag"></i>Cyprus</div>
                      <div class="item" data-value="Czech Republic"><i class="cz flag"></i>Czech Republic</div>
                      <div class="item" data-value="Germany"><i class="de flag"></i>Germany</div>
                      <div class="item" data-value="Djibouti"><i class="dj flag"></i>Djibouti</div>
                      <div class="item" data-value="Denmark"><i class="dk flag"></i>Denmark</div>
                      <div class="item" data-value="Dominica"><i class="dm flag"></i>Dominica</div>
                      <div class="item" data-value="Dominican Republic"><i class="do flag"></i>Dominican Republic</div>
                      <div class="item" data-value="Algeria"><i class="dz flag"></i>Algeria</div>
                      <div class="item" data-value="Ecuador"><i class="ec flag"></i>Ecuador</div>
                      <div class="item" data-value="Estonia"><i class="ee flag"></i>Estonia</div>
                      <div class="item" data-value="Egypt"><i class="eg flag"></i>Egypt</div>
                      <div class="item" data-value="Western"><i class="eh flag"></i>Western Sahara</div>
                      <div class="item" data-value="Eritrea"><i class="er flag"></i>Eritrea</div>
                      <div class="item" data-value="Spain"><i class="es flag"></i>Spain</div>
                      <div class="item" data-value="Ethiopia"><i class="et flag"></i>Ethiopia</div>
                      <div class="item" data-value="European Union"><i class="eu flag"></i>European Union</div>
                      <div class="item" data-value="Finland"><i class="fi flag"></i>Finland</div>
                      <div class="item" data-value="Fiji"><i class="fj flag"></i>Fiji</div>
                      <div class="item" data-value="Falkland Islands"><i class="fk flag"></i>Falkland Islands</div>
                      <div class="item" data-value="Micronesia"><i class="fm flag"></i>Micronesia</div>
                      <div class="item" data-value="Faroe Islands"><i class="fo flag"></i>Faroe Islands</div>
                      <div class="item" data-value="France"><i class="fr flag"></i>France</div>
                      <div class="item" data-value="Gabon"><i class="ga flag"></i>Gabon</div>
                      <div class="item" data-value="England"><i class="gb flag"></i>England</div>
                      <div class="item" data-value="Grenada"><i class="gd flag"></i>Grenada</div>
                      <div class="item" data-value="Georgia"><i class="ge flag"></i>Georgia</div>
                      <div class="item" data-value="French Guiana"><i class="gf flag"></i>French Guiana</div>
                      <div class="item" data-value="Ghana"><i class="gh flag"></i>Ghana</div>
                      <div class="item" data-value="Gibraltar"><i class="gi flag"></i>Gibraltar</div>
                      <div class="item" data-value="Greenland"><i class="gl flag"></i>Greenland</div>
                      <div class="item" data-value="Gambia"><i class="gm flag"></i>Gambia</div>
                      <div class="item" data-value="Guinea"><i class="gn flag"></i>Guinea</div>
                      <div class="item" data-value="Guadeloupe"><i class="gp flag"></i>Guadeloupe</div>
                      <div class="item" data-value="Equatorial Guinea"><i class="gq flag"></i>Equatorial Guinea</div>
                      <div class="item" data-value="Greece"><i class="gr flag"></i>Greece</div>
                      <div class="item" data-value="Sandwich Islands"><i class="gs flag"></i>Sandwich Islands</div>
                      <div class="item" data-value="Guatemala"><i class="gt flag"></i>Guatemala</div>
                      <div class="item" data-value="Guam"><i class="gu flag"></i>Guam</div>
                      <div class="item" data-value="Guinea-Bissau"><i class="gw flag"></i>Guinea-Bissau</div>
                      <div class="item" data-value="Guyana"><i class="gy flag"></i>Guyana</div>
                      <div class="item" data-value="Hong Kong"><i class="hk flag"></i>Hong Kong</div>
                      <div class="item" data-value="Heard Island"><i class="hm flag"></i>Heard Island</div>
                      <div class="item" data-value="Honduras"><i class="hn flag"></i>Honduras</div>
                      <div class="item" data-value="Croatia"><i class="hr flag"></i>Croatia</div>
                      <div class="item" data-value="Haiti"><i class="ht flag"></i>Haiti</div>
                      <div class="item" data-value="Hungary"><i class="hu flag"></i>Hungary</div>
                      <div class="item" data-value="Indonesia"><i class="id flag"></i>Indonesia</div>
                      <div class="item" data-value="Ireland"><i class="ie flag"></i>Ireland</div>
                      <div class="item" data-value="Israel"><i class="il flag"></i>Israel</div>
                      <div class="item" data-value="India"><i class="in flag"></i>India</div>
                      <div class="item" data-value="Indian Ocean Territory"><i class="io flag"></i>Indian Ocean Territory</div>
                      <div class="item" data-value="Iraq"><i class="iq flag"></i>Iraq</div>
                      <div class="item" data-value="Iran"><i class="ir flag"></i>Iran</div>
                      <div class="item" data-value="Iceland"><i class="is flag"></i>Iceland</div>
                      <div class="item" data-value="Italy"><i class="it flag"></i>Italy</div>
                      <div class="item" data-value="Jamaica"><i class="jm flag"></i>Jamaica</div>
                      <div class="item" data-value="Jordan"><i class="jo flag"></i>Jordan</div>
                      <div class="item" data-value="Japan"><i class="jp flag"></i>Japan</div>
                      <div class="item" data-value="Kenya"><i class="ke flag"></i>Kenya</div>
                      <div class="item" data-value="Kyrgyzstan"><i class="kg flag"></i>Kyrgyzstan</div>
                      <div class="item" data-value="Cambodia"><i class="kh flag"></i>Cambodia</div>
                      <div class="item" data-value="Kiribati"><i class="ki flag"></i>Kiribati</div>
                      <div class="item" data-value="Comoros"><i class="km flag"></i>Comoros</div>
                      <div class="item" data-value="Saint Kitts and Nevis"><i class="kn flag"></i>Saint Kitts and Nevis</div>
                      <div class="item" data-value="North Korea"><i class="kp flag"></i>North Korea</div>
                      <div class="item" data-value="South Korea"><i class="kr flag"></i>South Korea</div>
                      <div class="item" data-value="Kuwait"><i class="kw flag"></i>Kuwait</div>
                      <div class="item" data-value="Cayman Islands"><i class="ky flag"></i>Cayman Islands</div>
                      <div class="item" data-value="Kazakhstan"><i class="kz flag"></i>Kazakhstan</div>
                      <div class="item" data-value="Laos"><i class="la flag"></i>Laos</div>
                      <div class="item" data-value="Lebanon"><i class="lb flag"></i>Lebanon</div>
                      <div class="item" data-value="Saint Lucia"><i class="lc flag"></i>Saint Lucia</div>
                      <div class="item" data-value="Liechtenstein"><i class="li flag"></i>Liechtenstein</div>
                      <div class="item" data-value="Sri Lanka"><i class="lk flag"></i>Sri Lanka</div>
                      <div class="item" data-value="Liberia"><i class="lr flag"></i>Liberia</div>
                      <div class="item" data-value="Lesotho"><i class="ls flag"></i>Lesotho</div>
                      <div class="item" data-value="Lithuania"><i class="lt flag"></i>Lithuania</div>
                      <div class="item" data-value="Luxembourg"><i class="lu flag"></i>Luxembourg</div>
                      <div class="item" data-value="Latvia"><i class="lv flag"></i>Latvia</div>
                      <div class="item" data-value="Libya"><i class="ly flag"></i>Libya</div>
                      <div class="item" data-value="Morocco"><i class="ma flag"></i>Morocco</div>
                      <div class="item" data-value="Monaco"><i class="mc flag"></i>Monaco</div>
                      <div class="item" data-value="Moldova"><i class="md flag"></i>Moldova</div>
                      <div class="item" data-value="Montenegro"><i class="me flag"></i>Montenegro</div>
                      <div class="item" data-value="Madagascar"><i class="mg flag"></i>Madagascar</div>
                      <div class="item" data-value="Marshall Islands"><i class="mh flag"></i>Marshall Islands</div>
                      <div class="item" data-value="MacEdonia"><i class="mk flag"></i>MacEdonia</div>
                      <div class="item" data-value="Mali"><i class="ml flag"></i>Mali</div>
                      <div class="item" data-value="Burma"><i class="ar flag"></i>Burma</div>
                      <div class="item" data-value="Mongolia"><i class="mn flag"></i>Mongolia</div>
                      <div class="item" data-value="MacAu"><i class="mo flag"></i>MacAu</div>
                      <div class="item" data-value="Northern Mariana Islands"><i class="mp flag"></i>Northern Mariana Islands</div>
                      <div class="item" data-value="Martinique"><i class="mq flag"></i>Martinique</div>
                      <div class="item" data-value="Mauritania"><i class="mr flag"></i>Mauritania</div>
                      <div class="item" data-value="Montserrat"><i class="ms flag"></i>Montserrat</div>
                      <div class="item" data-value="Malta"><i class="mt flag"></i>Malta</div>
                      <div class="item" data-value="Mauritius"><i class="mu flag"></i>Mauritius</div>
                      <div class="item" data-value="Maldives"><i class="mv flag"></i>Maldives</div>
                      <div class="item" data-value="Malawi"><i class="mw flag"></i>Malawi</div>
                      <div class="item" data-value="Mexico"><i class="mx flag"></i>Mexico</div>
                      <div class="item" data-value="Malaysia"><i class="my flag"></i>Malaysia</div>
                      <div class="item" data-value="Mozambique"><i class="mz flag"></i>Mozambique</div>
                      <div class="item" data-value="Namibia"><i class="na flag"></i>Namibia</div>
                      <div class="item" data-value="New Caledonia"><i class="nc flag"></i>New Caledonia</div>
                      <div class="item" data-value="Niger"><i class="ne flag"></i>Niger</div>
                      <div class="item" data-value="Norfolk Island"><i class="nf flag"></i>Norfolk Island</div>
                      <div class="item" data-value="Nigeria"><i class="ng flag"></i>Nigeria</div>
                      <div class="item" data-value="Nicaragua"><i class="ni flag"></i>Nicaragua</div>
                      <div class="item" data-value="Netherlands"><i class="nl flag"></i>Netherlands</div>
                      <div class="item" data-value="Norway"><i class="no flag"></i>Norway</div>
                      <div class="item" data-value="Nepal"><i class="np flag"></i>Nepal</div>
                      <div class="item" data-value="Nauru"><i class="nr flag"></i>Nauru</div>
                      <div class="item" data-value="Niue"><i class="nu flag"></i>Niue</div>
                      <div class="item" data-value="New Zealand"><i class="nz flag"></i>New Zealand</div>
                      <div class="item" data-value="Oman"><i class="om flag"></i>Oman</div>
                      <div class="item" data-value="Panama"><i class="pa flag"></i>Panama</div>
                      <div class="item" data-value="Peru"><i class="pe flag"></i>Peru</div>
                      <div class="item" data-value="French Polynesia"><i class="pf flag"></i>French Polynesia</div>
                      <div class="item" data-value="New Guinea"<i class="pg flag"></i>New Guinea</div>
                      <div class="item" data-value="Philippines"><i class="ph flag"></i>Philippines</div>
                      <div class="item" data-value="Pakistan"><i class="pk flag"></i>Pakistan</div>
                      <div class="item" data-value="Poland"><i class="pl flag"></i>Poland</div>
                      <div class="item" data-value="Saint Pierre"><i class="pm flag"></i>Saint Pierre</div>
                      <div class="item" data-value="Pitcairn Islands"><i class="pn flag"></i>Pitcairn Islands</div>
                      <div class="item" data-value="Puerto Rico"><i class="pr flag"></i>Puerto Rico</div>
                      <div class="item" data-value="Palestine"><i class="ps flag"></i>Palestine</div>
                      <div class="item" data-value="Portugal"><i class="pt flag"></i>Portugal</div>
                      <div class="item" data-value="Palau"><i class="pw flag"></i>Palau</div>
                      <div class="item" data-value="Paraguay"><i class="py flag"></i>Paraguay</div>
                      <div class="item" data-value="Qatar"><i class="qa flag"></i>Qatar</div>
                      <div class="item" data-value="Reunion"><i class="re flag"></i>Reunion</div>
                      <div class="item" data-value="Romania"><i class="ro flag"></i>Romania</div>
                      <div class="item" data-value="Serbia"><i class="rs flag"></i>Serbia</div>
                      <div class="item" data-value="Russia"><i class="ru flag"></i>Russia</div>
                      <div class="item" data-value="Rwanda"><i class="rw flag"></i>Rwanda</div>
                      <div class="item" data-value="Saudi Arabia"><i class="sa flag"></i>Saudi Arabia</div>
                      <div class="item" data-value="Solomon Islands"><i class="sb flag"></i>Solomon Islands</div>
                      <div class="item" data-value="Seychelles"><i class="sc flag"></i>Seychelles</div>
                      <div class="item" data-value="Sudan"><i class="sd flag"></i>Sudan</div>
                      <div class="item" data-value="Sweden"><i class="se flag"></i>Sweden</div>
                      <div class="item" data-value="Singapore"><i class="sg flag"></i>Singapore</div>
                      <div class="item" data-value="sSaint Helenah"><i class="sh flag"></i>Saint Helena</div>
                      <div class="item" data-value="Slovenia"><i class="si flag"></i>Slovenia</div>
                      <div class="item" data-value="Svalbard, I Flag Jan Mayen"><i class="sj flag"></i>Svalbard, I Flag Jan Mayen</div>
                      <div class="item" data-value="Slovakia"><i class="sk flag"></i>Slovakia</div>
                      <div class="item" data-value="Sierra Leone"><i class="sl flag"></i>Sierra Leone</div>
                      <div class="item" data-value="San Marino"><i class="sm flag"></i>San Marino</div>
                      <div class="item" data-value="Senegal"><i class="sn flag"></i>Senegal</div>
                      <div class="item" data-value="Somalia"><i class="so flag"></i>Somalia</div>
                      <div class="item" data-value="Suriname"><i class="sr flag"></i>Suriname</div>
                      <div class="item" data-value="Sao Tome"><i class="st flag"></i>Sao Tome</div>
                      <div class="item" data-value="El Salvador"><i class="sv flag"></i>El Salvador</div>
                      <div class="item" data-value="Syria"><i class="sy flag"></i>Syria</div>
                      <div class="item" data-value="Swaziland"><i class="sz flag"></i>Swaziland</div>
                      <div class="item" data-value="Caicos Islands"><i class="tc flag"></i>Caicos Islands</div>
                      <div class="item" data-value="Chad"><i class="td flag"></i>Chad</div>
                      <div class="item" data-value="French Territories"><i class="tf flag"></i>French Territories</div>
                      <div class="item" data-value="Togo"><i class="tg flag"></i>Togo</div>
                      <div class="item" data-value="Thailand"><i class="th flag"></i>Thailand</div>
                      <div class="item" data-value="Tajikistan"><i class="tj flag"></i>Tajikistan</div>
                      <div class="item" data-value="Tokelau"><i class="tk flag"></i>Tokelau</div>
                      <div class="item" data-value="Timorleste"><i class="tl flag"></i>Timorleste</div>
                      <div class="item" data-value="Turkmenistan"><i class="tm flag"></i>Turkmenistan</div>
                      <div class="item" data-value="Tunisia"><i class="tn flag"></i>Tunisia</div>
                      <div class="item" data-value="Tonga"><i class="to flag"></i>Tonga</div>
                      <div class="item" data-value="Turkey"><i class="tr flag"></i>Turkey</div>
                      <div class="item" data-value="Trinidad"><i class="tt flag"></i>Trinidad</div>
                      <div class="item" data-value="Tuvalu"><i class="tv flag"></i>Tuvalu</div>
                      <div class="item" data-value="Taiwan"><i class="tw flag"></i>Taiwan</div>
                      <div class="item" data-value="Tanzania"><i class="tz flag"></i>Tanzania</div>
                      <div class="item" data-value="Ukraine"><i class="ua flag"></i>Ukraine</div>
                      <div class="item" data-value="Uganda"><i class="ug flag"></i>Uganda</div>
                      <div class="item" data-value="Us Minor Islands"><i class="um flag"></i>Us Minor Islands</div>
                      <div class="item" data-value="United States<"><i class="us flag"></i>United States</div>
                      <div class="item" data-value="Uruguay"><i class="uy flag"></i>Uruguay</div>
                      <div class="item" data-value="Uzbekistan"><i class="uz flag"></i>Uzbekistan</div>
                      <div class="item" data-value="Vatican City"><i class="va flag"></i>Vatican City</div>
                      <div class="item" data-value="Saint Vincent"><i class="vc flag"></i>Saint Vincent</div>
                      <div class="item" data-value="Venezuela"><i class="ve flag"></i>Venezuela</div>
                      <div class="item" data-value="British Virgin Islands"><i class="vg flag"></i>British Virgin Islands</div>
                      <div class="item" data-value="Us Virgin Islands"><i class="vi flag"></i>Us Virgin Islands</div>
                      <div class="item" data-value="Vietnam"><i class="vn flag"></i>Vietnam</div>
                      <div class="item" data-value="Vanuatu"><i class="vu flag"></i>Vanuatu</div>
                      <div class="item" data-value="Wallis and Futuna"><i class="wf flag"></i>Wallis and Futuna</div>
                      <div class="item" data-value="Samoa"><i class="ws flag"></i>Samoa</div>
                      <div class="item" data-value="Yemen"><i class="ye flag"></i>Yemen</div>
                      <div class="item" data-value="Mayotte"><i class="yt flag"></i>Mayotte</div>
                      <div class="item" data-value="South Africa"><i class="za flag"></i>South Africa</div>
                      <div class="item" data-value="Zambia"><i class="zm flag"></i>Zambia</div>
                      <div class="item" data-value="Zimbabwe"><i class="zw flag"></i>Zimbabwe</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="two fields">
                <div class="field">
                  <label>Sponsor/Donor</label>
                  <input id="sponsordonor" type="text" name="sponsorORdonor" value="<?php echo $transaction_data['sponsordonor'] ?>">
                  <!--<div class="ui selection dropdown">
                    <input id="sponsordonor" type="hidden" PHP ECHO VALUE name="sponsorORdonor" >
                    <i class="dropdown icon"></i>
                    <div class="text">PHP ECHO HERE</div>
                    <div class="menu">
                        <div class="item" data-value="Sponsor">Sponsor</div>
                        <div class="item" data-value="Donor">Donor</div>
                    </div>
                  </div> -->
                </div>
                <div class="required field">
                  <label>Local/Abroad</label>
                  <div class="ui selection dropdown">
                    <input id="localabroad" type="hidden" name="localORabroad" value="<?php echo $transaction_data['localabroad'] ?>">
                    <i class="dropdown icon"></i>
                    <!-- <div class="default text">Select</div> -->
                    <div class="text" id="localabroad_text"><?php echo $transaction_data['localabroad'] ?></div>
                    <div class="menu">
                        <div class="item" data-value="Local">Local</div>
                        <div class="item" data-value="Abroad">Abroad</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="two required fields">
                <div class="field">
                  <label>Start Date</label>
                  <?php
                    $startdate = DateTime::createFromFormat('Y-m-d', $transaction_data['startdate']);
                    $startdate_1 = $startdate->format('m/d/Y');
                  ?>
                  <input id="startdate" type="text" name="start_date" maxlength="10" placeholder="mm/dd/yyyy" value="<?php echo $startdate_1; ?>">
                </div>
                <div class="field">
                  <label>End Date</label>
                  <?php
                    $enddate = DateTime::createFromFormat('Y-m-d', $transaction_data['enddate']);
                    $enddate_1 = $enddate->format('m/d/Y');
                  ?>
                  <input id="enddate" type="text" name="end_date" maxlength="10" placeholder="mm/dd/yyyy" value="<?php echo $enddate_1; ?>">
                </div>
              </div>
              <div class="two required fields">
                <div class="field">
                  <label>Duration</label>
                  <input id="duration" type="text" name="duration" placeholder="0y 0m 0d" value="<?php echo $transaction_data['duration'] ?>">
                </div>
                <div class="field">
                  <label>Report For Duty</label>
                  <?php
                    $reportforduty = DateTime::createFromFormat('Y-m-d', $transaction_data['reportforduty']);
                    $reportforduty_1 = $reportforduty->format('m/d/Y');
                  ?>
                  <input id="reportforduty" type="text" name="report_for_duty" maxlength="10" placeholder="mm/dd/yyyy" value="<?php echo $reportforduty_1; ?>">
                </div>
              </div>
              <div class="two required fields">
                <div class="field">
                  <label>Return Service Obligation</label>
                  <input id="rso" type="text" name="return_service_obligation" placeholder="0y 0m 0d" value="<?php echo $transaction_data['duration'] ?>">
                </div>
                <div class="field">
                  <label>Return Service Obligation Status</label>
                  <div class="ui selection dropdown">
                    <input id="rsostatus" type="hidden" name="return_service_obligation_status" value="<?php echo $transaction_data['rsostatus'] ?>">
                    <i class="dropdown icon"></i>
                    <!-- <div class="default text">Select RSO Status</div> -->
                    <div class="text" id="rso_text"><?php echo $transaction_data['rsostatus'] ?></div>
                    <div class="menu">
                        <div class="item" data-value="Served">Served</div>
                        <div class="item" data-value="Unserved">Unserved</div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="actions">
            <div class="ui blue basic reset button">Reset
            </div>
            <div class="ui red cancel button">Cancel
            </div>
            <button id="save_edit_application" class="ui green submit button" type="submit" form="edit_ongoing_application_form">Save</button>
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
// for triggering modals when button clicked
  $('#edit_ongoing_application_modal').modal('attach events', '#edit_ongoing_application_button', 'show').modal('setting', 'closable', false);

  $('#delete_ongoing_application_modal').modal('attach events', '#delete_ongoing_application_button', 'show').modal('setting', 'closable', false);

  $('.ui.dropdown')
    .dropdown()
  ;

    // cancel button for edit details
  $('.cancel.button').on('click', function() {
    $('.ui.form')[0].reset(); //edit details form
    $('.ui.form .ui.dropdown').dropdown('restore defaults');
  });

  // reset button for the forms
  $('.reset.button').on('click', function() {
    $('.ui.form')[0].reset(); //edit details form
    $('.ui.form .ui.dropdown').dropdown('restore defaults');
  });

  $(function(){
          $( "#save_edit_application" ).click(function(event)
          {
              event.preventDefault();//prevent auto submit data
              var originaltransactionnumber= String("<?php echo $transaction_data['transactionnumber']; ?>");
              var transactionnumber= $("#transactionnumber").val();
              var employeenumber= $("#employeenumber").val();
              var applicationdate= $("#applicationdate").val();
              var leavetype= $("#leavetype").val();
              var leavedetails= $("#leavedetails").val();
              var leavestatus= $("#leavestatus").val();
              var developmenttype= $("#developmenttype").val();
              var degreepursued= $("#degreepursued").val();
              var institution= $("#institution").val();
              var location= $("#location").val();
              var country= $("#country").val();
              var sponsordonor= $("#sponsordonor").val();
              var localabroad= $("#localabroad").val();
              var startdate= $("#startdate").val();
              var enddate= $("#enddate").val();
              var duration= $("#duration").val();
              var reportforduty= $("#reportforduty").val();
              var rso= $("#rso").val();
              var rsostatus= $("#rsostatus").val();

              var q = new Date();
              var m = q.getMonth()+1;
              var d = q.getDate();
              var y = q.getFullYear();
              var date = new Date(y,m,d);
              mydate=new Date(applicationdate);

              var transchar = /^\d+$/.test(transactionnumber);
              var emplchar = /^\d+$/.test(employeenumber);

              //console.log(date);
              //console.log(mydate);
              if(transactionnumber.length == 7 && transchar && emplchar && employeenumber.length == 9 && emplchar && applicationdate && degreepursued && institution && location && startdate && enddate && duration && reportforduty && rso){
                $.ajax(
                    {
                        type:"post",
                        url: "<?php echo base_url(); ?>/Admin/update_application",//URL changed
                        data:{
                          originaltransactionnumber:originaltransactionnumber,
                          transactionnumber:transactionnumber,
                          employeenumber:employeenumber,
                          applicationdate:applicationdate,
                          leavetype:leavetype,
                          leavedetails:leavedetails,
                          leavestatus:leavestatus,
                          developmenttype:developmenttype,
                          degreepursued:degreepursued,
                          institution:institution,
                          location:location,
                          country:country,
                          sponsordonor:sponsordonor,
                          localabroad:localabroad,
                          startdate:startdate,
                          enddate:enddate,
                          duration:duration,
                          reportforduty:reportforduty,
                          rso:rso,
                          rsostatus:rsostatus,
                          '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'
                        },
                        success:function(data)
                        {
                            //console.log(data);
                            if(date>=mydate)
                            {
                                  window.location.href = '<?php echo base_url() ?>admin/ongoingapps/' + transactionnumber;
                            }
                            else
                            {
                                  window.location.href = '<?php echo base_url() ?>admin/transactionslist/' + transactionnumber;
                            }
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown)
                        {
                            alert("Input error.");
                        }
                    });
              }
          });
      });

  $(function(){
          $( "#delete_application" ).click(function(event)
          {
              event.preventDefault();//prevent auto submit data

              var transactionnumber= String("<?php echo $transaction_data['transactionnumber']; ?>");
              $.ajax(
                  {
                      type:"post",
                      url: "<?php echo base_url(); ?>/Admin/delete_application",//URL changed
                      data:{
                        transactionnumber:transactionnumber,
                        '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'
                      },
                      success:function(data)
                      {
                          //console.log(data);
                          window.location.href = '<?php echo base_url() ?>admin/ongoingapps';
                      }
                  });
          });
      });

  $('.ui.form').form({
      inline: true,
      on: "blur",
      fields: {
        application_no: {
          rules: [
            {
              type   : 'empty'
            },
            {
              type   : 'exactLength[7]'
            },
            {
              type   : 'number'
            }
          ]},
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
        application_date: {
          rules: [
            {
              type   : 'empty'
            }
          ]},
        leave_type: {
          rules: [
            {
              type   : 'empty'
            }
          ]},
        leave_details: {
          rules: [
            {
              type   : 'empty'
            }
          ]},
        leave_status: {
          rules: [
            {
              type   : 'empty'
            }
          ]},
        development_type: {
          rules: [
            {
              type   : 'empty'
            }
          ]},
        degree_pursued: {
          rules: [
            {
              type   : 'empty'
            }
          ]},
        institution: {
          rules: [
            {
              type   : 'empty'
            }
          ]},
        location: {
          rules: [
            {
              type   : 'empty'
            }
          ]},
        country: {
          rules: [
            {
              type   : 'empty'
            }
          ]},
        localORabroad: {
          rules: [
            {
              type   : 'empty'
            }
          ]},
        start_date: {
          rules: [
            {
              type   : 'empty'
            }
          ]},
        end_date: {
          rules: [
            {
              type   : 'empty'
            }
          ]},
        duration: {
          rules: [
            {
              type   : 'empty'
            }
          ]},
        report_for_duty: {
          rules: [
            {
              type   : 'empty'
            }
          ]},
        return_service_obligation: {
          rules: [
            {
              type   : 'empty'
            }
          ]},
        return_service_obligation_status: {
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
