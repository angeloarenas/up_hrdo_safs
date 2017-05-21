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
  <title>Transactions - HRDO Sabbatical Manager</title>
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/logo_black_icon.ico'); ?>"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.js"></script>
  <!-- fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <!-- CSS file location -->
  <link href="<?php echo base_url('assets/css/admin_header_footer_sidebar.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css/admin_transactions.css'); ?>" rel="stylesheet" type="text/css">
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
  <a href="<?php echo base_url(); ?>admin/ongoingapps" class="side item">
    <i class="red alarm outline icon"></i>
    Ongoing Applications
  </a>
  <a href="<?php echo base_url(); ?>admin/employeelist" class="side item">
    <i class="red list layout icon"></i>
    Employee List
  </a>
  <a href="<?php echo base_url(); ?>admin/transactionslist" class="side item active">
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
  <h1 class="ui header"><i class="database icon"></i>Transactions List</h1>
  <hr>
  <table id="example" class="ui compact selectable celled table nowrap" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th><center>Transaction No.</center></th>
        <th><center>Application Date</center></th>
        <th><center>Leave Type</center></th>
        <th><center>Leave Details</center></th>
        <th><center>Leave Status</center></th>
        <th><center>Start Date</center></th>
        <th><center>End Date</center></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($transactions_list as $trans):?>
      <?php
        $applicationdate = date("m/d/Y", strtotime($trans['applicationdate']));
        $startdate = date("m/d/Y", strtotime($trans['startdate']));
        $enddate = date("m/d/Y", strtotime($trans['enddate']));
      ?>
      <?php echo '
      <tr onclick="window.location='."'".base_url()."admin/transactionslist/".$trans['transactionnumber']."'".'">
        <td><center>'.$trans['transactionnumber'].'</center></td>
        <td><center>'.$applicationdate.'</center></td>
        <td><center>'.$trans['leavetype'].'</center></td>
        <td><center>'.$trans['leavedetails'].'</center></td>
        <td><center>'.$trans['leavestatus'].'</center></td>
        <td><center>'.$startdate.'</center></td>
        <td><center>'.$enddate.'</center></td>
      </tr>
      ';?>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<!-- footer -->
<?php include('admin_footer.php'); ?>
</body>

<script type="text/javascript">

  $(document).ready(function() {
      $('#example').DataTable();
  } );

</script>

</html>
