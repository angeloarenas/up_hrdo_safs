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
  <title>Login - HRDO Sabbatical Manager</title>
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/logo_black_icon.ico'); ?>"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.css">


  <link href="<?php echo base_url('assets/css/admin_login.css'); ?>" rel="stylesheet" type="text/css">

</head>
<body>

<center><img src="<?php echo base_url('assets/images/logo_white.png'); ?>" class="logo" height="70" width="70" align="center"></center>

<div class="ui one column center aligned grid">
  <div class="column five wide form-holder">
    <h2 class="center aligned header form-head">Sign in</h2>
      <?php
      $attributes = array("class" => "ui form");
      echo form_open("admin_login/index", $attributes);?>
      <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" id="txt_username" name="txt_username" placeholder="Username" value="<?php echo set_value('txt_username'); ?>">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" id="txt_password" name="txt_password" placeholder="Password" value="<?php echo set_value('txt_password'); ?>">
          </div>
        </div>
      <div id="pindot" class="field">
        <input id="btn_login" name="btn_login" type="submit" value="Login" class="ui button large fluid red">
      </div>
      <?php echo form_close(); ?>
      <br>
      <div class="inline field">
         <button class="link" id="link">Forgot Password?</button>
      </div>
  </div>
</div>

<!-- CLARENCE ETO YUNG INCORRECT!!!! -->
<!--<div class="ui segment">
  <center>Incorrect email address or password!</center>
</div>-->
<?php echo $this->session->flashdata('msg'); ?>

<!-- THIS IS FOR THE EMPTY FIELDS NAMAN!! -->
<!--
<div class="ui segment">
  <center>Please fill out the empty fields.</center>
</div>
-->

<div class="ui small modal">
  <div class="ui icon header">
    <i class="help icon"></i>
    Forgot Password
  </div>
  <div class="content">
    <p><center><b>Contact UP HRDO and ask for your password. Here are their contact details:</b><br><br>
    <b>Email Address: </b>hrdo.updiliman@up.edu.ph<br>
    <b>Contact Number: </b>987-8500 loc 2576<br>
    <b>Website: </b>hrdo.upd.edu.ph<br>
    <b>Address: </b>Osmeña Avenue, Diliman, Quezon City, Metro Manila</p>
  </div>
  <br>
  <div class="actions">
    <div class="ui green ok button">
      <i class="checkmark icon"></i>
      All Done
    </div>
  </div>
</div>


</body>

<script>

$(document).ready(function() {
    $("#link").click(function(){
      $('.ui.modal').modal('show');
    });
});

$(document).ready(function() {
    $('.ui.checkbox')
    .checkbox();
});

</script>

</html>
