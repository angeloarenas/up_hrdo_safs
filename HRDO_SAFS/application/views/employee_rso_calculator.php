<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <!-- Site Properties -->
  <title>RSO Calculator - HRDO Scholarship and Fellowship Services</title>
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/logo_black_icon.ico'); ?>"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.6/semantic.min.js"></script>

  <!-- CSS file location -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/RSO_calculator.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/employee_header_footer_body.css'); ?>" />
  <!-- javascript file location -->
  <script src="<?php echo base_url('assets/js/calculator/moment/moment-with-locales.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/calculator/calculator.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/calculator/cookieMunch.js'); ?>"></script>

</head>

<body>
<!--Header-->
<?php include('employee_header.php'); ?>
<!--Calculator-->
<div class="pusher">
  <div class="ui center aligned container">
    <h1 id="header">RSO Calculator</h1>
    <h4 id="subheader">Calculate your Return Service Obligation</h4>
  </div>

  <div class="ui main container">
      <div class="ui center aligned segment" style="padding-top:2em;">
        <form id="rsoform" class="ui form">

          <div class="ui stackable divided grid">
          <div class="eight wide column">


          <a onchange="tCompute()"><label class="switch">
            <input type="checkbox" id="areaInp_0" class="switch-input" checked>
            <span class="switch-label" data-on="Abroad" data-off="Local"></span>
            <span class="switch-handle"></span>
          </label></a>
           <a onchange="tCompute()"><label class="switch">
            <input type="checkbox" id="paidInp_0" class="switch-input" checked>
            <span class="switch-label" data-on="w/o Pay" data-off="w/ Pay"></span>
            <span class="switch-handle"></span>
          </label></a>
          <i class="info circle icon link" data-title="Study Leave Type" data-content="Toggle the buttons to select study leave type" data-offset="-12"></i>

          <br><br>

            <div class="field">
              <label><h1 class="ui red header">Start Date
                <div class="sub header">(mm/dd/yyyy)</div>
              </h1></label>
              <div class="ui input left icon" style="width: 15em;">
                <i class="calendar icon"></i>
                <input class="form-control"  id='staDate_0' placeholder="mm/dd/yyyy">
              </div>
              <i class="info circle icon link" data-title="Start Date" data-content="This is the start of the leave applied for. This is calculated from the start (00:00:00 AM) of the date." data-offset="-12"></i>
            </div>
            <div class="field">
              <label><h1 class="ui red header">End Date
                <div class="sub header">(mm/dd/yyyy)</div>
              </h1></label>
              <div class="ui input left icon" style="width: 15em;">
                <i class="calendar icon"></i>
                <input class="form-control"   id='endDate_0' placeholder="mm/dd/yyyy">
              </div>
              <i class="info circle icon link" data-title="End Date" data-content="This is the end of the leave applied for. This is calculated from the end (24:00:00 PM) of the date."  data-offset="-12"></i>
            </div>
          </div>

          <div class="eight wide column">
          <div class="inp">
            <div class="inline field">
              <label>Duration of SL</label>
              <input class="form-control" type=text id='tSpanSL_0' disabled>
              <i class="info circle icon link" data-title="Duration of Study Leave" data-content="This is the length of the leave period in terms of years, months, and days, with the total number of days enclosed in the parenthesis." data-offset="-12"></i>
            </div>
            <div class="inline field">
              <label>Report for Duty</label>
              <input class="form-control"   id='repDate_0' placeholder="mm/dd/yyyy">
              <i class="info circle icon link" data-title="Report for Duty Date" data-content="This is the start of the service obligation incurred due to the study leave. This falls on the start (00:00:00 AM) of the date." data-offset="-12"></i>
            </div>
            <div class="inline field">
              <label>Duration of CO</label>
              <input class="form-control" type=text id='tSpanCO_0' disabled>
              <i class="info circle icon link" data-title="Duration of Contractual Obligation" data-content="This is the corresponding service obligation length in terms of years, months, and days, with the total number of days enclosed in the parethesis." data-offset="-12"></i>
            </div>
            <div class="inline field">
              <label>End of CO</label>
              <input class="form-control" type=text id='endOfCO_0' disabled>
              <i class="info circle icon link" data-title="End of Contractual Obligation" data-content="This is the estimated end of contract obligation. This falls on the end (24:00:00 PM) of the date." data-offset="-12"></i>
            </div>
            <div class="inline field">
              <label>Separation Date</label>
              <input class="form-control"   id='basDate_0' placeholder="mm/dd/yyyy">
              <i class="info circle icon link" data-title="Separation Date" data-content="This is a date wherein the number of days remaining of the service obligation is to be checked. This falls on the start (00:00:00 AM) of the date." data-offset="-12"></i>
            </div>
            <div class="inline field">
              <label>Unserved CO</label>
              <input class="form-control" type=text id='tSpanNS_0' disabled>
              <i class="info circle icon link" data-title="Remaining Contractual Obligation on Reference Date" data-content="This is the remaining contractual obligation checked on the reference date." data-offset="-12"></i>
            </div>

          </div>
          </div>

          </div>

          <div class="ui divider" style="margin-top: 2em;"></div>

          <input type=button class="ui basic button" value='Reset' onclick="iValue(0)">
        <input type=button class="ui basic blue button" id='update' value='Autocompute: OFF' onclick="changeUpdate()">
        <input type=button class="ui red button" id='comBut_0' value='Compute' onclick="computeOne(0);">

        </form>
      </div>
  </div>

</div>

<!-- Footer -->
<?php include('employee_footer.php'); ?>
    </body>

    <script>/*Initialization Script*/
    for (var i=0; i < n; i++){
      iValue(i);    // Initialize Values
      iListen(i);   // Initialize Listeners
    }
    </script>
    <script>
    $(document)
      .ready(function() {
      var $toggle  = $('.ui.toggle.button');
      $toggle
        .state({
          text: {
            inactive : 'Local',
            active   : 'Abroad'
          }
        })
      ;
    })
    ;

    $('.info.circle.icon.link')
      .popup({
        on: 'click'
      })
    ;
    </script>
</html>
