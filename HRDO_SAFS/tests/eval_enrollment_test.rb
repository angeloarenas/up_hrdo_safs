#Enrollment Test

require 'watir'

type_leave = Array[1, 2]
employee_type = Array[10, 11]
teaching_units = Array[0, -1, 10, 8]
study_units = Array[0, -1, 12, 8]
browser = Watir::Browser.new :chrome
testNo = 1


for y in 0..3
	for z in 0..3
		print "Test ", testNo, "\n"
	    browser.goto 'http://[::1]/HRDO_SAFS/evaluation'
		browser.a(:id => 'enrtab').click
		units = 0
		approved = 0

		#type leave
		if y == 0 or y == 2
			browser.label(:text =>'Abroad', :id => 'abroad4').click
		else
			browser.label(:text =>'Local', :id => 'local4').click
		end

		#employee type
		browser.div(:id => 'et5').click
		if (y+z)%3 == 0
			browser.send_keys 'Faculty'
			browser.send_keys :enter
			browser.label(:text,'Full-Time?').click
		elsif (y+z)%5 == 0
			browser.send_keys 'Administrative Staff'
			browser.send_keys :enter
		elsif (y+z)%7 == 0
			browser.send_keys 'Administrative Staff'
			browser.send_keys :enter
			browser.label(:text,'Full-Time?').click
		elsif (y+z)%11 == 0
			browser.send_keys 'REPS'
			browser.send_keys :enter
		elsif (y+z)%2 == 0
			browser.send_keys 'Faculty'
			browser.send_keys :enter
		else
			browser.send_keys 'REPS'
			browser.send_keys :enter
			browser.label(:text,'Full-Time?').click
		end
		print "Valid Employee Type\n"

		#units
		browser.text_field(:name => 'teachunits').set teaching_units[y]
		browser.text_field(:name => 'studyunits').set study_units[z]

		#overall checking units
		if !(teaching_units[y] + study_units[z] <= 18)
			units = 1
			print "Invalid Teach and Study Units: Must not exceed 18 units for both\n"
		elsif teaching_units[y] < 0 or study_units[z] < 0
			units = 1
			print "Invalid Teach and Study Units: Input must be positive\n"
		else
			print "Valid Teach and Study Units\n"
		end

		browser.button(:name => 'Sub_EP').click

		#approved ba lumabas?
		if !(browser.text.include?("You are qualified!"))
			approved = 1
		elsif browser.text.include?("You are not qualified")
			approved = 1
		end

		# checking
		if approved == 1 and units == 1
			print "TEST PASSED\n\n"
		elsif approved == 0 and units == 0
			print "TEST PASSED\n\n"
		else
			print "TEST FAILED\n\n"
		end

		testNo = testNo+1
	end
end
