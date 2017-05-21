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
  <title>Contact Us - HRDO Sabbatical Manager</title>
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/logo_black_icon.ico'); ?>"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.js"></script>
  <!-- fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <!-- CSS file location -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/employee_header_footer_body.css'); ?>" />

  <!-- CSS Code -->
  <style type="text/css">

    #details {
      margin-top: -60px;
      background-color: #333333 !important;
      color: #FFFFFF;
      font-weight: 900px;
    }

    #mapcol {
      padding: 0em !important;
    }

    #contactcol {
      padding: 5em !important;
    }

    #white_link:link, #white_link:visited {
      color: #FFFFFF;
    }

    #white_link:hover, #white_link:active {
      color: #D95C5C;
    }

    #whereto {
      font-weight: 100;
    }

    #title {
      font-weight: 100;
    }

    #subtitle {
      font-weight: 100;
      margin-top: -20px;
    }
    #contact {
      display: inline-block;
      text-align: left;
    }


  </style>
  </head>


  <!-- HTML Code -->
  <body>
    <!-- header -->
    <?php include('employee_header.php'); ?>

    <div class="pusher">
        <div class="ui center aligned container">
          <h1 id="header">Contact Us</h1>
          <h4 id="subheader">Here are a few ways to get in touch with us</h4>
        </div>

        <div class="ui stackable centered grid">

          <div class="five wide column">
            <h2 class="ui red header" id="header2">Send us a message</h2>
            <br><p style="text-align:justify;">
            The UP Diliman Human Resources Development and Benefits Division is here to provide you with more information and answer any questions you may have.
            </p>
            <p><a href='#details' id="smoothsc">Need our contact details? Click here.</a></p>
            <?php if (isset($_POST['btn_send'])) {?>
              <div class="ui icon message <?php echo (($error==="1") ? 'error' : 'success'); ?>">
                <i class="icon <?php echo (($error==="1") ? 'warning' : 'check'); ?>"></i>
                <div class="content">
                  <div class="header">
                    <?php echo $message ?>
                  </div>
                    <p><?php echo $submessage ?></p>
                </div>
              </div>
            <?php } ?>
          </div>


          <div class="nine wide column">

            <?php $attributes = array("class" => "ui form", "id" => "sendmail");
                  echo form_open("contact_us/index", $attributes);?>
              <h4 class="ui dividing header">Your Information</h4>
              <div class="fields">
                <div class="eleven wide required field">
                  <label>Full Name</label>
                  <input type="text" name="full_name" id="full_name" placeholder="First Name MI. Last Name" value="<?php echo set_value('full_name'); ?>">
                </div>
                <div class="five wide required field">
                  <label>Employee No.</label>
                  <input type="text" name="employee_num" id="employee_num" maxlength="9" placeholder="123456789" value="<?php echo set_value('employee_num'); ?>">
                </div>
              </div>
              <div class="two fields">
                <div class="field">
                  <label>Contact No.</label>
                  <input type="text" name="contact_no" id="contact_no" placeholder="09123456789" value="<?php echo set_value('contact_no'); ?>">
                </div>
                <div class="required field">
                  <label>E-mail Address</label>
                  <input type="text" name="email_ad" id="email_ad" placeholder="email@example.com" value="<?php echo set_value('email_ad'); ?>">
                </div>
              </div>
              <h4 class="ui dividing header">Your Message</h4>
              <div class="required field">
                <label>Subject</label>
                <input type="text" name="subject" id="subject" placeholder="Subject" value="<?php echo set_value('subject'); ?>">
              </div>
              <div class="required field" id="msg">
                <label>Message</label>
                <textarea type="text" name="message" id="message" placeholder="Message" value="<?php echo set_value('message'); ?>"></textarea>
              </div>
              <button class="ui right floated green submit button" id="btn_send" name="btn_send" value="Send" type="submit" form="sendmail">
                <i class="send icon"></i>
                Send Message
              </button>
            <?php echo form_close(); ?>
          </div>
        </div>

    </div>

      <div id="details" class="ui stackable middle aligned grid">
        <div id="mapcol" class="eight wide column">
            <img src="<?php echo base_url('assets/images/map.jpg'); ?>">
        </div>
        <div id="contactcol" class="eight wide center aligned column">
            <img id="" src="<?php echo base_url('assets/images/UP_logo.png'); ?>" class="logo" height="120">
            <h2 id="title">UP HRDO</h2>
            <h2 id="subtitle">Scholarship and Fellowship Services</h2>

            <br><h3 id="whereto" div class="ui red header">WHERE TO FIND US</h3>
            <div id="contact">
              <div><i class="red map outline icon"></i>
                <a id="white_link" class="item" href="https://www.google.com.ph/maps/place/Quezon+Hall/@14.6548946,121.0650716,15z/data=!4m5!3m4!1s0x0:0x78351c9414d84fd6!8m2!3d14.6548946!4d121.0650716">
                  Address:  Osmeña Avenue, Diliman, Quezon City</a>
              </div>
              <div><i class="red mail outline icon"></i>E-mail Address: hrdo.updiliman@up.edu.ph</div>
              <div><i class="red mail outline icon"></i>E-mail Address: uphrdotraining@gmail.com</div>
              <div><i class="red call icon"></i>Telephone No.: 987-8500 local 2576</div>
              <div><i class="red browser icon"></i>
                <a id="white_link" class="item" href="http://hrdo.upd.edu.ph/">Website: hrdo.upd.edu.ph</a>
              </div>
            </div>
            <br><br><br><br>
            <a class="ui large inverted red basic button" href="https://www.google.com.ph/maps/dir//Quezon+Hall,+Osme%C3%B1a+Avenue,+Diliman,+Quezon+City,+Metro+Manila/@14.6552228,121.0629352,15z/data=!4m15!1m6!3m5!1s0x0:0x78351c9414d84fd6!2sQuezon+Hall!8m2!3d14.6548946!4d121.0650716!4m7!1m0!1m5!1m1!1s0x3397b76f29fb72b5:0x78351c9414d84fd6!2m2!1d121.0650716!2d14.6548946">
              GET DIRECTIONS</a>
        </div>
      </div>

    <!-- footer -->
    <?php include('employee_footer.php'); ?>

<script type="text/javascript">
// form validation
$('.ui.form').form({
    on: 'change',
    fields: {
      full_name: {
        identifier: 'full_name',
        rules: [{
          type: 'empty',
          prompt: 'Please enter your name.'
      }]},
      employee_num:{
        identifier: 'employee_num',
        rules: [{
          type: 'integer',
          prompt: 'Please enter a valid employee number.'
      }]},
      email_ad:{
        identifier: 'email_ad',
        rules: [{
          type: 'email',
          prompt: 'Please enter a valid email.'
      }]},
      subject:{
        identifier: 'subject',
        rules: [{
          type: 'empty',
          prompt: 'Please enter e-mail subject.'
      }]},
      message:{
        identifier: 'message',
        rules: [{
          type: 'empty',
          prompt: 'Please enter your message.'
      }]}
    }
   });

// smooth scroll
var $root = $('html, body');
$('#smoothsc').click(function(){
   var href = $.attr(this, 'href');
    $root.animate({
        scrollTop: $(href).offset().top
    }, 500, function () {
        window.location.hash = href;
    });
    return false;
});
</script>

</html>
