# Sabbatical Test
# age < 63
# service, 6 years
require 'watir'

employee_type = Array['Faculty', 'Administrative Staff', 'REPS']
rank = Array['Professor', 'Associate Professor', 'Assistant Professor', 'Instructor']
year = Array[0, -1, 6]
birthday = Array[1954, 1955]
browser = Watir::Browser.new :chrome
testNo = 1
type = 0

for x in 0..5
	print "Test ", testNo, "\n"
	browser.goto 'http://[::1]/HRDO_SAFS/evaluation'
	browser.a(:id => 'sabbtab').click
	testNo = testNo + 1
	approved = 0
	age = 0
	year = 0

	#employee type
	browser.div(:id => 'et3').click
	if x >= 0 and x <= 3
		browser.send_keys employee_type[0]
		browser.send_keys :enter
		browser.div(:id => 'fr3').click
		if x == 0
			browser.send_keys rank[0]
		elsif x == 1
			browser.send_keys rank[1]
		elsif x == 2
			browser.send_keys rank[2]
		elsif x == 3
			browser.send_keys rank[3]
		end
		browser.send_keys :enter
	elsif x == 4
		browser.send_keys employee_type[1]
		browser.send_keys :enter
	elsif x == 5
		browser.send_keys employee_type[2]
		browser.send_keys :enter
	end
	print "Valid Employee Type\n"

	#date
	browser.text_field(:id => 'effectStart').click
	browser.send_keys 1
	browser.send_keys :enter
	browser.send_keys 1
	browser.send_keys :enter
	print "Valid Start and End Date\n"

	#year
	if x == 0 or x == 3
		browser.text_field(:id => 'servYear3').set 0
		year = 1
	elsif x == 1 or x == 4
		browser.text_field(:id => 'servYear3').set -1
		year = 1
	elsif x == 2 or x == 5
		browser.text_field(:id => 'servYear3').set 6
	end

	#birthday
	browser.text_field(:id => 'birthday3').click
	if x <= 2 
		browser.send_keys 1954
		age = 1
	else
		browser.send_keys 1955
	end			
	browser.send_keys :enter

	#clicks button
	browser.button(:name => 'Sub_Sab').click

	#approved ba lumabas?
	if !(browser.text.include?("You are qualified!"))
		approved = 1
	elsif browser.text.include?("You are not qualified")
		approved = 1
	end

	#error messages
	if year == 1
		print "Invalid Years of Service: Must at least be 6 years\n"
	else 
		print "Valid Years of Service\n"
	end

	if age == 1
		print "Invalid Age: Age must be lower than 63 years old\n"
	else
		print "Valid Age\n"
	end

	if approved ==  0 and age == 0 and year == 0
		print "TEST PASSED\n\n"
	elsif approved == 1 and !(age == 0 and year == 0)
		print "TEST PASSED\n\n"
	else
		print "TEST FAILED\n\n"
	end
end