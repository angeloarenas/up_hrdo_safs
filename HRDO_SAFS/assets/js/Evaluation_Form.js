$(function(){
	// tab
	$('.menu .item').tab();
	// checkbox
	$('.ui.checkbox').checkbox();
	// dropdown
	$('.ui.dropdown').dropdown();
	//reset all forms
	$('.resetlink').on('click', function() {
		for(var i=0; i<5; i++) {
			$('.ui.form')[i].reset();
		}
		$('.ui.form .ui.dropdown').dropdown('restore defaults');
	});
	//FOR THE SIDE DESCRIPTION
	$(".dsftxt").hide();
	$(".sabbtxt").hide();
	$(".sdtxt").hide();
	$(".enrtxt").hide();
	$("#sltab").click(function(){
		$(".dsftxt").hide();
		$(".sabbtxt").hide();
		$(".sdtxt").hide();
		$(".enrtxt").hide();
		$(".sltxt").fadeIn();
	});
	$("#dsftab").click(function(){
		$(".sltxt").hide();
		$(".sabbtxt").hide();
		$(".sdtxt").hide();
		$(".enrtxt").hide();
		$(".dsftxt").fadeIn();
	});
	$("#sabbtab").click(function(){
		$(".sltxt").hide();
		$(".dsftxt").hide();
		$(".sdtxt").hide();
		$(".enrtxt").hide();
		$(".sabbtxt").fadeIn();
	});
	$("#sdtab").click(function(){
		$(".sltxt").hide();
		$(".dsftxt").hide();
		$(".sabbtxt").hide();
		$(".enrtxt").hide();
		$(".sdtxt").fadeIn();
	});
	$("#enrtab").click(function(){
		$(".sltxt").hide();
		$(".dsftxt").hide();
		$(".sabbtxt").hide();
		$(".sdtxt").hide();
		$(".enrtxt").fadeIn();
	});

	// FORM VALIDATION
	$('.ui.form').form({
	inline: true,
	on: 'change',
    fields: {
      emptype1: {
        identifier: 'emptype1',
        rules: [{
          type: 'empty',
          prompt: 'Please enter your emptype.'
      }]},
      emptype2: {
        identifier: 'emptype2',
        rules: [{
          type: 'empty',
          prompt: 'Please enter your emptype.'
      }]},
      emptype3: {
        identifier: 'emptype3',
        rules: [{
          type: 'empty',
          prompt: 'Please enter your emptype.'
      }]},
      emptype4: {
        identifier: 'emptype4',
        rules: [{
          type: 'empty',
          prompt: 'Please enter your emptype.'
      }]},
      emptype5: {
        identifier: 'emptype5',
        rules: [{
          type: 'empty',
          prompt: 'Please enter your emptype.'
      }]},
      rank1:{
        identifier: 'rank1',
        rules: [{
          type: 'empty',
          prompt: 'Please enter your rank.'
      }]},
      rank2:{
        identifier: 'rank2',
        rules: [{
          type: 'empty',
          prompt: 'Please enter your rank.'
      }]},
      rank3:{
        identifier: 'rank3',
        rules: [{
          type: 'empty',
          prompt: 'Please enter your rank.'
      }]},
      rank3:{
        identifier: 'rank3',
        rules: [{
          type: 'empty',
          prompt: 'Please enter your rank.'
      }]},
      birthday:{
        identifier: 'birthday',
        rules: [{
          type: 'empty',
          prompt: 'Please enter your birthday.'
      }]},
      servYear:{
        identifier: 'servYear',
        rules: [{
          type: 'empty',
          prompt: 'Please enter the years of your service.'
      }]},
      missed:{
        identifier: 'missed',
        rules: [{
          type: 'empty',
          prompt: 'Please enter the number of your missed classes.'
      }]},
      teachunits:{
        identifier: 'teachunits',
        rules: [{
          type: 'empty',
          prompt: 'Please enter the number of your intended teaching units.'
      }]},
      studyunits:{
        identifier: 'studyunits',
        rules: [{
          type: 'empty',
          prompt: 'Please enter the number of your intended study units.'
      }]},
      schedStart:{
        identifier: 'schedStart',
        rules: [{
          type: 'empty',
          prompt: 'Please enter your intended start schedule of your leave.'
      }]},
      schedEnd:{
        identifier: 'schedEnd',
        rules: [{
          type: 'empty',
          prompt: 'Please enter your intended end schedule of your leave.'
      }]},
      effectStart:{
        identifier: 'effectStart',
        rules: [{
          type: 'empty',
          prompt: 'Please enter your intended start schedule of sabbatical.'
      }]},
      effectEnd:{
        identifier: 'effectEnd',
        rules: [{
          type: 'empty',
          prompt: 'Please enter your intended end schedule of sabbatical.'
      }]}
    }
   });

	// FOR THE employeetype-rank INPUT
	// SL employeetype-rank
	$('#empdrop1').change(function() {
		if (document.getElementById("emptype1").value=="F") {
			$('#rankdrop1').removeClass("disabled");
			$('#rank1').removeAttr('disabled');
		} else {
			$('#rankdrop1').addClass("disabled");
			$('#rank1').attr('disabled', '');
		};
	});
	//DSF employeetype-rank
	$('#empdrop2').change(function() {
		if (document.getElementById("emptype2").value=="F") {
			$('#rankdrop2').removeClass("disabled");
			$('#rank2').removeAttr('disabled');
		} else {
			$('#rankdrop2').addClass("disabled");
			$('#rank2').attr('disabled', '');
		};
	});
	//sabbatical employeetype-rank
	$('#empdrop3').change(function() {
		if (document.getElementById("emptype3").value=="F") {
			$('#rankdrop3').removeClass("disabled");
			$('#rank3').removeAttr('disabled');
		} else {
			$('#rankdrop3').addClass("disabled");
			$('#rank3').attr('disabled', '');
		};
	});
	//SD employeetype-rank
	$('#empdrop4').change(function() {
		if (document.getElementById("emptype4").value=="F") {
			$('#rankdrop4').removeClass("disabled");
			$('#rank4').removeAttr('disabled');
		} else {
			$('#rankdrop4').addClass("disabled");
			$('#rank4').attr('disabled', '');
		};
	});

	// FOR THE DATES INPUT
	var today = new Date();
	// SL birthday calendar
	$('#SLbirthdayCal').calendar({
	  type: 'date',
	  startMode: 'year',
	  maxDate: new Date(today.getFullYear(), today.getMonth(), today.getDate()),
	  formatter: {
	    date: function (date, settings) {
	      if (!date) return '';
	      var day = date.getDate();
	      var month = date.getMonth() + 1;
	      var year = date.getFullYear();
	      return month + '/' + day + '/' + year;
	    }
	  }
	});
	// SL birthday calendar
	$('#DSFbirthdayCal').calendar({
	  type: 'date',
	  startMode: 'year',
	  maxDate: new Date(today.getFullYear(), today.getMonth(), today.getDate()),
	  formatter: {
	    date: function (date, settings) {
	      if (!date) return '';
	      var day = date.getDate();
	      var month = date.getMonth() + 1;
	      var year = date.getFullYear();
	      return month + '/' + day + '/' + year;
	    }
	  }
	});
	// Sabbatical birthday calendar
	$('#SABbirthdayCal').calendar({
	  type: 'date',
	  startMode: 'year',
	  maxDate: new Date(today.getFullYear(), today.getMonth(), today.getDate()),
	  formatter: {
	    date: function (date, settings) {
	      if (!date) return '';
	      var day = date.getDate();
	      var month = date.getMonth() + 1;
	      var year = date.getFullYear();
	      return month + '/' + day + '/' + year;
	    }
	  }
	});
	//SAB effectivity date range
	$('#SABeffectStartCal').calendar({
	  type: 'date',
	  endCalendar: $('#SABeffectEndCal'),
	  minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate()),
	  formatter: {
	    date: function (date, settings) {
	      if (!date) return '';
	      var day = date.getDate();
	      var month = date.getMonth() + 1;
	      var year = date.getFullYear();
	      return month + '/' + day + '/' + year;
	    }
	  }
	});
	$('#SABeffectEndCal').calendar({
	  type: 'date',
	  startCalendar: $('#SABeffectStartCal'),
	  formatter: {
	    date: function (date, settings) {
	      if (!date) return '';
	      var day = date.getDate();
	      var month = date.getMonth() + 1;
	      var year = date.getFullYear();
	      return month + '/' + day + '/' + year;
	    }
	  }
	});
	//SD schedule date range
	$('#SDschedStartCal').calendar({
	  type: 'date',
	  endCalendar: $('#SDschedEndCal'),
	  minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate()),
	  formatter: {
	    date: function (date, settings) {
	      if (!date) return '';
	      var day = date.getDate();
	      var month = date.getMonth() + 1;
	      var year = date.getFullYear();
	      return month + '/' + day + '/' + year;
	    }
	  }
	});
	$('#SDschedEndCal').calendar({
	  type: 'date',
	  startCalendar: $('#SDschedStartCal'),
	  formatter: {
	    date: function (date, settings) {
	      if (!date) return '';
	      var day = date.getDate();
	      var month = date.getMonth() + 1;
	      var year = date.getFullYear();
	      return month + '/' + day + '/' + year;
	    }
	  }
	});

});