require 'watir'
browser = Watir::Browser.new :chrome

# test cases
application_no = ["0000000", 0, "a!.", ""]
employee_no = ["000000000", 0, "a!.", ""]
application_date = ["04/25/2017", ""]
degree_pursued = ["BS Computer Science", ""]
institution = ["UP Diliman", ""]
location = ["Quezon City", ""]
start_date = ["04/25/2017", ""]
end_date = ["04/25/2018", ""]
duration = ["1 year", ""]
report_for_duty = ["04/26/2018", ""]
rso = ["2year/s-0month/s-0day/s", ""]

# log in
browser.goto 'http://[::1]/HRDO_SAFS/admin'
browser.text_field(:id => 'txt_username').set '2000-00001'
browser.text_field(:id => 'txt_password').set 'password'
browser.send_keys :enter

# test
testNo = 1


for x in 0..3
	for y in 0..3
		# test number
		print "Test ", testNo, "\n"
		testNo = testNo+1
		# click 'add on going application' button
		browser.goto 'http://[::1]/HRDO_SAFS/admin/ongoingapps'
		browser.div(:id => 'add_ongoing_application_button').click

		# flag
		app_flag = 0
		employee_flag = 0
		app_date_flag = 0
		degree_flag = 0
		inst_flag = 0
		loc_flag = 0
		start_flag = 0
		end_flag = 0
		duration_flag = 0
		rep_flag = 0
		rso_flag = 0
		approved = 0


		# for application number
		browser.text_field(:id => 'transactionnumber').set application_no[x]
		
		if x != 0 or y !=0 # means invalid input
			app_flag = 1
			approved = 1
		end

		#for employee number
		browser.text_field(:id => 'employeenumber').set employee_no[x]
		
		if x != 0 # means invalid input
			employee_flag = 1
		end

		#application date
		if y == 0 or y == 2
			browser.text_field(:id => 'applicationdate').set application_date[0]
		elsif y == 1 or y == 3
			browser.text_field(:id => 'applicationdate').set application_date[1]
			app_date_flag = 1
		end
		

		# leave type
		browser.div(:text => 'Select Leave Type').click
		if x == 0 and (y == 1 or y == 3)
			browser.div(:text => 'Select Leave Type').click
		end

		if y == 0
			browser.div(:text => "Study Leave without Pay").click
		elsif y == 1
			browser.div(:text => "Special Detail with Pay").click
		elsif y == 2
			browser.div(:text => "Enrollment Privilege").click
		elsif y == 3
			browser.div(:text => "Non Teaching Staff Fellowship (NTSF)").click
		end
		

		# leave details
		browser.div(:text => 'Select Leave Details').click
		if y == 0 or y == 3
			browser.div(:text => "Half-Day").click
		elsif y == 1 or y == 2
			browser.div(:text => "Full-Time").click
		end
		

		# leave status
		browser.div(:text => 'Select Leave Status').click
		if y == 0 or y == 3
			browser.div(:text => "Original").click
		elsif y == 1 
			browser.div(:text => "Reinstatement").click
		elsif y == 2
			browser.div(:text => "Renewal").click
		end
		

		# development type
		browser.div(:text => 'Select Development Type').click
		if y == 0
			browser.div(:text => "Training Program").click
		elsif y == 1
			browser.div(:text => "Diploma").click
		elsif y == 2
			browser.div(:text => "Visiting Professor").click
		elsif y == 3
			browser.div(:text => "Master of Arts").click
		end
		

		# degree pursued
		if y == 0 or y == 3
			browser.text_field(:id => 'degreepursued').set degree_pursued[0]
		elsif y == 1 or y == 2
			browser.text_field(:id => 'degreepursued').set degree_pursued[1]
			degree_flag = 1
		end
		

		# institution
		if y == 0 or y == 3
			browser.text_field(:id => 'institution').set institution[0]
		elsif y == 1 or y == 2
			browser.text_field(:id => 'institution').set institution[1]
			inst_flag = 1
		end
		

		# location
		if y == 0 or y == 3
			browser.text_field(:id => 'location').set location[0]
		elsif y == 1 or y == 2
			browser.text_field(:id => 'location').set location[1]
			loc_flag = 1
		end
		
		
		# country
		browser.div(:text => 'Select Country').click
		if y == 0
			browser.send_keys "Philippines"
		elsif y == 1
			browser.send_keys "Egypt"
		elsif y == 2
			browser.send_keys "Japan"
		elsif y == 3
			browser.send_keys "Georgia"
		end
		browser.send_keys :enter
		

		# local/abroad
		browser.div(:text => 'Select').click
		if y == 0 or y == 3
			browser.div(:text => "Local").click
		elsif y == 1 or y == 2
			browser.div(:text => "Abroad").click
		end
		
		
		# start date
		if y == 0 or y == 3
			browser.text_field(:id => 'startdate').set start_date[0]
		elsif y == 1 or y == 2
			browser.text_field(:id => 'startdate').set start_date[1]
			start_flag = 1
		end
		
		
		# end date
		if y == 0 or y == 3
			browser.text_field(:id => 'enddate').set end_date[0]
		elsif y == 1 or y == 2
			browser.text_field(:id => 'enddate').set end_date[1]
			end_flag = 1
		end
		

		# duration
		if y == 0 or y == 3
			browser.text_field(:id => 'duration').set duration[0]
		elsif y == 1 or y == 2
			browser.text_field(:id => 'duration').set duration[1]
			duration_flag = 1
		end
		

		# report for duty
		if y == 0 or y == 3
			browser.text_field(:id => 'reportforduty').set report_for_duty[0]
		elsif y == 1 or y == 2
			browser.text_field(:id => 'reportforduty').set report_for_duty[1]
			rep_flag = 1
		end
		

		# rso
		if y == 0 or y == 3
			browser.text_field(:id => 'rso').set rso[0]
		elsif y == 1 or y == 2
			browser.text_field(:id => 'rso').set rso[1]
			rso_flag = 1
		end
		

		# rso status
		browser.div(:text => 'Select RSO Status').click
		if y == 0 or y == 3
			browser.div(:text => "Served").click
		elsif y == 1 or y == 2
			browser.div(:text => "Unserved").click
		end
		


		# printing error messages
		if app_flag == 1
			print "Invalid Application No.: Must be 7 digits long\n"
		else
			print "Valid Application No.\n"
		end
		if employee_flag == 1
			print "Invalid Employee No.: Must be  digits long\n"
		else
			print "Valid Employee No.\n"
		end
		if app_date_flag == 1
			print "Invalid Application Date: Must have a value\n"
		else
			print "Valid Application Date\n"
		end
		if degree_flag == 1
			print "Invalid Degree: Must have a value\n"
		else 
			print "Valid Degree\n"
		end
		if inst_flag == 1
			print "Invalid Institution: Must have a value\n"
		else 
			print "Valid Institution\n"
		end
		if loc_flag == 1
			print "Invalid Location: Must have a value\n"
		else
			print "Valid Location\n"
		end
		if start_flag == 1
			print "Invalid Start Date: Must have a value\n"
		else
			print "Valid Start Date\n"
		end
		if end_flag == 1
			print "Invalid End Date: Must have a value\n"
		else 
			print "Valid End Date\n"
		end
		if duration == 1
			print "Invalid Duration: Must have a value\n"
		else 
			print "Valid Duration\n"
		end
		if rep_flag == 1
			print "Invalid Report for Duty: Must have a value\n"
		else
			print "Valid Report for Duty\n"
		end
		if rso_flag == 1
			print "Invalid Return Service Obligation: Must have a value\n"
		else
			print "Valid for Return Service Obligation\n"
		end


		if approved == 0 and app_flag == 0 and employee_flag == 0 and app_date_flag == 0 and degree_flag == 0 and inst_flag == 0 and loc_flag == 0 and start_flag == 0 and end_flag == 0 and duration_flag == 0 and rep_flag == 0 and rso_flag == 0
			print "TEST PASSED\n\n"
		elsif approved == 1 and !(app_flag == 0 and employee_flag == 0 and app_date_flag == 0 and degree_flag == 0 and inst_flag == 0 and loc_flag == 0 and start_flag == 0 and end_flag == 0 and duration_flag == 0 and rep_flag == 0 and rso_flag == 0)
			print "TEST PASSED\n\n"
		else
			print "TEST FAILED\n\n"
		end
	end
end