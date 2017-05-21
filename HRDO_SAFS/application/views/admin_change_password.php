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
  <title>Change Password - HRDO Sabbatical Manager</title>
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/logo_black_icon.ico'); ?>"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.js"></script>
  <!-- fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <!-- CSS file location -->
  <link href="<?php echo base_url('assets/css/admin_header_footer_sidebar.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css/admin_change_password.css'); ?>" rel="stylesheet" type="text/css">
  <!-- javascript file location -->
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
      </h3>
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
  <a href="<?php echo base_url(); ?>admin/transactionslist" class="side item">
    <i class="red database icon"></i>
    Transactions List
  </a>
  <a href="<?php echo base_url(); ?>admin/changepassword" class="side item active">
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


  <h1 class="ui header"><i class="lock icon"></i>Change Password</h1>
  <hr>
  <div class="ui fluid card">
    <div class="content">
      <?php
      $attributes = array("class" => "ui form", "id" => "changepass");
      echo form_open("admin_change_pass/index", $attributes);?>
        <div class="inline field required">
          <label>Current Password</label>
          <input id="password_curr" name="password_curr" type="password" placeholder="enter current password" value="<?php echo set_value('password_curr'); ?>">
        </div>
        <div class="inline field required">
          <label>New Password</label>
          <input id="password_new" name="password_new" type="password" placeholder="enter new password" value="<?php echo set_value('password_new'); ?>">
        </div>
        <div class="inline field required">
          <label>Re-type Password</label>
          <input id="password_retype" name="password_retype" type="password" placeholder="re-type new password" value="<?php echo set_value('password_retype'); ?>">
        </div>
        <?php echo $this->session->flashdata('msg'); ?>

    </div>
    <!-- <div class="ui divider"></div> -->
    <div class="extra content">
      <button id="btn_save" name="btn_save" class="ui right floated green submit button" value="Save" type="submit" form="changepass">Save</button>
      <div id="resettt" class="ui right floated blue basic reset button">Reset</div>
    </div>
    <?php echo form_close(); ?>
  </div>


</div>
<!-- footer -->
<?php include('admin_footer.php'); ?>

</body>

<script type="text/javascript">
  $('.reset.button').on('click', function() {
    $('.ui.form')[0].reset(); //form
  });

  // for the form validation
  $('.ui.form').form({
    inline: true,
    on: 'change',
    fields: {
      password_curr: {
        identifier: 'password_curr'
      },
      password_new: {
        identifier: 'password_new',
        rules: [{
          type: 'regExp[/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9$@$!%*#?&]+){8,}$/]',
          prompt: 'Minimum of 8 characters, at least 1 alphabet, 1 number.'
      }]},
      password_retype: {
        identifier: 'password_retype',
        rules: [{
          type: 'match[password_new]',
          prompt: 'Passwords do not match.'
      }]}
    }
   });
</script>
</html>
