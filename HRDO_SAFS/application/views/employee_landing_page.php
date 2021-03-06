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
  <title>HRDO Scholarship and Fellowship Services</title>
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/logo_black_icon.ico'); ?>"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.js"></script>
  <!-- fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <!-- CSS file location -->
  <link href="<?php echo base_url('assets/css/employee_header_footer_body.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css/employee_landing_page.css'); ?>" rel="stylesheet" type="text/css">
  <!-- javascript file location -->
</head>

<body>
  <!-- <div class="ui landpage-image image" ></div> -->
<!-- header -->
<?php include('employee_header.php'); ?>


  <!-- <img class="ui fluid image" src="landing_background.jpg"> -->
<!-- THE ACTUAL CONTENT OF THE PAGE HERE!!! -->
<div class="pusher">
  <br><br>
  <div class="ui five column doubling stackable grid container">
    <div class="column">
    </div>
    <div class="column">
      <center>
      <div class="ui raised segment" id="segment">
        <br>
        <a href="<?php echo base_url(); ?>apply/studyleave">
        <div class="ui circular icon button" id="iconbutton1" name="readbutton">
          <i class="huge circular file text outline icon"></i>
        </div>
        </a>
        <h1>
          Read
        </h1>
        <p>
          Read about the application processes and requirements for the type of leave you would like to apply for.
        </p>
      </div>
      </center>
    </div>
    <div class="column">
      <center>
      <div class="ui raised segment" id="segment">
        <br>
        <a href="<?php echo base_url(); ?>evaluation">
        <div class="ui circular icon button" id="iconbutton2">
          <i class="huge circular help icon"></i>
        </div>
        </a>
        <h1>
          Self Evaluate
        </h1>
        <p>
          Evaluate yourself so you can confirm your eligibility to apply.
        </p>
      </div>
      </center>
    </div>
    <div class="column">
      <center>
      <div class="ui raised segment" id="segment">
        <br>
        <a href="<?php echo base_url(); ?>rsocalculator">
        <div class="ui circular icon button" id="iconbutton3">
          <i class="huge circular calculator icon"></i>
        </div>
        </a>
        <h1>
          Calcuate
        </h1>
        <p>
          Calculate your return service obligation for your return to campus.
        </p>
      </div>
      </center>
    </div>
    <div class="column">
    </div>
  </div>
</div>

<!-- footer -->

<div class="ui fluid red center aligned inverted vertical  fixed bottom sticky footer segment" id="futer">
  <!-- <img src="logo_white.png" class="ui centered mini image"> -->
  <div class="ui horizontal inverted small divided link list">
    <a class="item" href="https://www.google.com.ph/maps/place/Quezon+Hall/@14.6548946,121.0650716,15z/data=!4m5!3m4!1s0x0:0x78351c9414d84fd6!8m2!3d14.6548946!4d121.0650716">OsmeñaAvenue,Diliman,Quezon City,MetroManila</a>
    <a class="item" href="<?php echo base_url(); ?>contactus">hrdo.updiliman@up.edu.ph</a>
    <a class="item" href="https://uphrdotna.herokuapp.com">uphrdotraining@gmail.com</a>
    <a class="item">987-8500 loc 2576</a>
    <a class="item" href="http://hrdo.upd.edu.ph/">hrdo.upd.edu.ph</a>
    <p><br>Copyright © 2017<p>
  </div>
</div>


</body>

<script type="text/javascript">
</script>

</head>
</html>
