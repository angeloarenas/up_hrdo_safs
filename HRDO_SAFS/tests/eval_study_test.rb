# Study Leave Test
# age <= 40
# assist prof or lower (with pay)
# not substitute
# tenured
# service at least 1 year

require 'watir'

type_leave = Array[10, 20, 11, 21]
employee_type = Array['Faculty', 'Administrative Staff', 'REPS']
rank = Array['Professor', 'Associate Professor', 'Assistant Professor', 'Instructor']
year = Array[0, -1, 2]
birthday = Array[1967, 1978]
browser = Watir::Browser.new :chrome
testNo = 1

for x in 0..5
	print "Test ", testNo, "\n"
	browser.goto 'http://[::1]/HRDO_SAFS/evaluation'
	approved = 0
	tenured = 0
	substitute = 0
	type = 0
	year = 0
	age = 0
	wpay = 0

	#type of leave
	if x == 0 or x == 4
		browser.label(:text =>'Abroad', :id => 'abroad1').click
		browser.label(:text =>'No', :id => 'N1').click
		browser.label(:text =>'No', :id => 'N2').click
		tenured = 1
	elsif x == 1 or x == 5
		browser.label(:text =>'Local', :id => 'local1').click
		browser.label(:text =>'Yes', :id => 'Y1').click
		browser.label(:text =>'No', :id => 'N2').click
		tenured = 1
		substitute = 1
	elsif x == 2
		browser.label(:text =>'Abroad', :id => 'abroad1').click
		browser.label(:text => 'With Pay?', :id => 'wpay1').click
		browser.label(:text =>'No', :id => 'N1').click
		browser.label(:text =>'Yes', :id => 'Y2').click
		wpay = 1
	elsif x == 3
		browser.label(:text =>'Local', :id => 'local1').click
		browser.label(:text => 'With Pay?', :id => 'wpay1').click
		browser.label(:text =>'Yes', :id => 'Y1').click
		browser.label(:text =>'Yes', :id => 'Y2').click
		substitute = 1
		wpay = 1
	end

	#employee type
	browser.div(:id => 'et1').click
	if x >= 0 and x <= 3
		browser.send_keys employee_type[0]
		browser.send_keys :enter
		browser.div(:id => 'fr1').click
		if x == 0
			browser.send_keys rank[0]
			type = 1
		elsif x == 1
			browser.send_keys rank[1]
			type = 1
		elsif x == 2
			browser.send_keys rank[2]
		elsif x == 3
			browser.send_keys rank[3]
		end
		browser.send_keys :enter
	elsif x == 4
		browser.send_keys employee_type[1]
		browser.send_keys :enter
		type = 1
	elsif x == 5
		browser.send_keys employee_type[2]
		browser.send_keys :enter
		type = 1
	end

	#year
	if x == 0 or x == 3
		browser.text_field(:id => 'servYear1').set 0
		year = 1
	elsif x == 1 or x == 4
		browser.text_field(:id => 'servYear1').set -1
		year = 1
	elsif x == 2 or x == 5
		browser.text_field(:id => 'servYear1').set 2
	end
	
	#birthday
	browser.text_field(:id => 'birthday1').click
	if x <= 2 
		browser.send_keys 1978
	else
		browser.send_keys 1967
		age = 1
	end			
	browser.send_keys :enter

	#clicks button
	browser.button(:name => 'Sub_SL').click

	#approved ba lumabas?
	if !(browser.text.include?("You are qualified!"))
		approved = 1
	elsif browser.text.include?("You are not qualified")
		approved = 1
	end

	#error messages
	if substitute == 1 
		print "Invalid: Must not be a substitute\n"
	else 
		print "Valid Substitute\n"
	end

	if tenured == 1 
		print "Invalid: Must be tenured\n"
	else 
		print "Valid Tenured\n"
	end

	if wpay == 1 and type == 1
		print "Invalid Rank: Faculty rank must be Assistant Professor or lower of Study Leave with Pay\n"
	else
		print "Valid Employee Type/Faculty Rank\n"
	end

	if year == 1 
		print "Invalid: Year of service must be at least 1 year\n"
	else 
		print "Valid Year of Service\n"
	end

	if age == 1
		print "Invalid: Age must not exceed 40 years old\n"
	else
		print "Valid Age\n"
	end

	# checking
	if approved == 0 and tenured == 0 and substitute == 0 and year == 0 and age == 0 and wpay == 0
		print "TEST PASSED\n\n"
	elsif approved == 0 and tenured == 0 and substitute == 0 and year == 0 and age == 0 and wpay == 1 and type == 0
		print "TEST PASSED\n\n"
	elsif !(tenured == 0 and substitute == 0 and year == 0 and age == 0 and wpay == 1 and type == 0) and approved == 1
		print "TEST PASSED\n\n"
	else
		print "TEST FAILED\n\n"
	end

	testNo = testNo + 1		
end