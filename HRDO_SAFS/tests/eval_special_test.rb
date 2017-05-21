#Special Detail Test

require 'watir'

type_leave = Array[10, 20, 11, 21]
employee_type = Array['Faculty', 'Administrative Staff', 'REPS']
rank = Array['Professor', 'Associate Professor', 'Assistant Professor', 'Instructor']
missed_class = Array[0,6,21]
browser = Watir::Browser.new :chrome
testNo = 1

for x in 0..5
	print "Test ", testNo, "\n"
	browser.goto 'http://[::1]/HRDO_SAFS/evaluation'
	browser.a(:id => 'sdtab').click
	missed = 0
	approved = 0

	#type of leave
	if x == 0 or x == 4
		browser.label(:text =>'Abroad', :id => 'abroad3').click
	elsif x == 1 or x == 5
		browser.label(:text =>'Local', :id => 'local3').click
	elsif x == 2
		browser.label(:text =>'Abroad', :id => 'abroad3').click
		browser.label(:text => 'With Pay?', :id => 'wpay2').click
	elsif x == 3
		browser.label(:text =>'Local', :id => 'local3').click
		browser.label(:text => 'With Pay?', :id => 'wpay2').click
	end

	#employee type
	browser.div(:id => 'et4').click
	if x >= 0 and x <= 3
		browser.send_keys employee_type[0]
		browser.send_keys :enter
		browser.div(:id => 'fr4').click
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
	print "Valid Position\n"

	#missed class
	if x == 0 or x == 3
		browser.text_field(:id => 'missed').set missed_class[0]
	elsif x == 1 or x == 4
		browser.text_field(:id => 'missed').set missed_class[1]
	elsif x == 2 or x == 5
		browser.text_field(:id => 'missed').set missed_class[2]
		missed = 1
	end

	#date
	browser.text_field(:id => 'schedStart').click
	browser.send_keys 12
	browser.send_keys :enter
	browser.send_keys 14
	browser.send_keys :enter
	print "Valid Start and End Date\n"

	browser.button(:name => 'Sub_SD').click

	#approved ba lumabas?
	if !(browser.text.include?("You are qualified!"))
		approved = 1
	elsif browser.text.include?("You are not qualified")
		approved = 1
	end

	if missed == 1
		print "Invalid: Missed classes must not exceed 6\n"
	else
		print "Valid Number of Missed Classes\n"
	end

	# checking
	if approved == 1 and missed == 1
		print "TEST PASSED\n\n"
	elsif approved == 0 and missed == 0
		print "TEST PASSED\n\n"
	else
		print "TEST FAILED\n\n"
	end

	testNo = testNo + 1		
end