require 'watir'
browser = Watir::Browser.new :chrome

# test cases
employee_no = ["000000000", 0, "a!.", ""]
last_name = ["Doquenia", ""]
first_name = ["Mary Ysabel", ""]
suffix = ["-", ""]
middle_name = ["Manuel", ""]
date_birth = ["07/27/1996", ""]
email_add = ["ysabeldoquenia@gmail.com", ""]
number = ["09088890979", ""]
permanent_address = ["SFDM Quezon City", ""]
orig_assessment = ["02/25/2013", ""]

# log in
browser.goto 'http://[::1]/HRDO_SAFS/admin'
browser.text_field(:id => 'txt_username').set '2000-00001'
browser.text_field(:id => 'txt_password').set 'password'
browser.send_keys :enter

# test
testNo = 1


for x in 0..3
	# test number
	print "Test ", testNo, "\n"
	testNo = testNo+1
	# click 'add on going application' button
	browser.goto 'http://[::1]/HRDO_SAFS/admin/employeelist'
	browser.div(:id => 'add_employee_button').click

	# flag
	employee_no_flag = 0
	last_name_flag = 0
	first_name_flag = 0
	suffix_flag = 0
	middle_name_flag = 0
	date_birth_flag = 0
	email_add_flag = 0
	number_flag = 0
	permanent_address_flag = 0
	orig_assessment_flag = 0


	# for employee number
	browser.text_field(:id => 'employeenumber').set employee_no[x]
	
	if x != 0 # means invalid input
		employee_no_flag = 1
		approved = 1
	end


	# last name
	if x == 0 or x == 2
		browser.text_field(:id => 'lastname').set last_name[0]
	elsif x == 1 or x == 3
		browser.text_field(:id => 'lastname').set last_name[1]
		last_name_flag = 1
	end
	

	# first name
	if x == 0 or x == 2
		browser.text_field(:id => 'firstname').set first_name[0]
	elsif x == 1 or x == 3
		browser.text_field(:id => 'firstname').set first_name[1]
		first_name_flag = 1
	end


	# suffix
	if x == 0 or x == 2
		browser.text_field(:id => 'suffix').set suffix[0]
	elsif x == 1 or x == 3
		browser.text_field(:id => 'suffix').set suffix[1]
		suffix_flag = 1
	end
	

	# middle name
	if x == 0 or x == 2
		browser.text_field(:id => 'middlename').set middle_name[0]
	elsif x == 1 or x == 3
		browser.text_field(:id => 'middlename').set middle_name[1]
		middle_name_flag = 1
	end
	

	# date of birth
	if x == 0 or x == 2
		browser.text_field(:id => 'birthdate').click
		browser.send_keys 7
		browser.send_keys 27
		browser.send_keys 1996
	elsif x == 1 or x == 3
		date_birth_flag = 1
	end
	

	# gender
	browser.div(:text => "Select Gender").click
	if x == 0 or x == 3
		browser.div(:text => "Female").click
	elsif x == 1 or x == 2
		browser.div(:text => "Male").click
	end
	

	# email addr
	if x == 0 or x == 2
		browser.text_field(:id => 'primaryemail').set email_add[0]
	elsif x == 1 or x == 3
		browser.text_field(:id => 'primaryemail').set email_add[1]
		email_add_flag = 1
	end
	

	# contact addr
	if x == 0 or x == 2
		browser.text_field(:id => 'primarycontact').set number[0]
	elsif x == 1 or x == 3
		browser.text_field(:id => 'primarycontact').set number[1]
		number_flag = 1
	end

	# address
	if x == 0 or x == 2
		browser.text_field(:id => 'permanentaddress').set permanent_address[0]
	elsif x == 1 or x == 3
		browser.text_field(:id => 'permanentaddress').set permanent_address[1]
		permanent_address_flag = 1
	end
	
	
	# unit
	browser.div(:text => "Select Unit").click
	if x == 0
		browser.send_keys "ADMISSIONS"
	elsif x == 1
		browser.send_keys "ACCTG"
	elsif x == 2
		browser.send_keys "CAL"
	elsif x == 3
		browser.send_keys "HOUSING"
	end
	browser.send_keys :enter


	# department
	browser.div(:text => "Select Department").click
	if x == 0
		browser.send_keys "BUDGET-D"
	elsif x == 1
		browser.send_keys "ALUMNI"
	elsif x == 2
		browser.send_keys "CAL-Filipino"
	elsif x == 3
		browser.send_keys "CHE-CTRA"
	end
	browser.send_keys :enter
	

	# employee type
	browser.div(:text => 'Select Employee Type').click
	if x == 0 or x == 3
		browser.div(:text => "REPS").click
	elsif x == 1
		browser.div(:text => "ADM").click
	elsif x == 2
		browser.div(:text => "FAC").click
	end
	
	
	# employment status
	browser.div(:text => 'Select Employment Status').click
		if x == 0 
		browser.send_keys "Permanent"
	elsif x == 1
		browser.send_keys "Substitute"
	elsif x == 2
		browser.send_keys "Extension"
	elsif x == 3
		browser.send_keys "Permanent"
	end


	#rank
	browser.div(:text => 'Select Rank').click
	if x == 0 
		browser.send_keys "Administrative Aide I"
	elsif x == 1
		browser.send_keys "Accounting Clerk II"
	elsif x == 2
		browser.send_keys "Electrician I"
	elsif x == 3
		browser.send_keys "Development Management Officer IV"
	end
	
	
	# orig assessment
	if x == 0 or x == 3
		browser.text_field(:id => 'originalassignment').set orig_assessment[0]
	elsif x == 1 or x == 2
		browser.text_field(:id => 'originalassignment').set orig_assessment[1]
		orig_assessment_flag = 1
	end
	

	# printing error messages
	if employee_no_flag == 1
		print "Invalid Employee No.: Must be exactly 9 characters\n"
	else
		print "Valid Employee No.\n"
	end
	if last_name_flag == 1
		print "Invalid Last Name: Must have a value\n"
	else
		print "Valid Last Name\n"
	end
	if first_name_flag == 1
		print "Invalid First Name: Must have a value\n"
	else
		print "Valid First Name\n"
	end
	if middle_name_flag == 1
		print "Invalid Middle Name: Must have a value\n"
	else 
		print "Valid Middle Name\n"
	end
	if date_birth_flag == 1
		print "Invalid Date of Birth: Must have a value\n"
	else 
		print "Valid Date of Birth\n"
	end
	if email_add_flag == 1
		print "Invalid Email Address: Must have a value\n"
	else
		print "Valid Email Address\n"
	end
	if number_flag == 1
		print "Invalid Contact No.: Must have a value\n"
	else
		print "Valid Contact No.\n"
	end
	if permanent_address_flag == 1
		print "Invalid Permanent Address: Must have a value\n"
	else 
		print "Valid Permanent Address\n"
	end
	if orig_assessment_flag == 1
		print "Invalid Original Assessment: Must have a value\n"
	else 
		print "Valid Original Assessment\n"
	end


	if approved == 0 and app_flag == 0 and employee_flag == 0 and app_date_flag == 0 and degree_flag == 0 and inst_flag == 0 and loc_flag == 0 and start_flag == 0 and end_flag == 0 and duration_flag == 0 and rep_flag == 0 and rso_flag == 0
		print "TEST PASSED\n\n"
	elsif approved == 1 and !(app_flag == 0 and employee_flag == 0 and app_date_flag == 0 and degree_flag == 0 and inst_flag == 0 and loc_flag == 0 and start_flag == 0 and end_flag == 0 and duration_flag == 0 and rep_flag == 0 and rso_flag == 0)
		print "TEST PASSED\n\n"
	else
		print "TEST FAILED\n\n"
	end

end