#App Process Sabbatical Test

require 'watir'
browser = Watir::Browser.new :chrome
browser.goto 'http://[::1]/HRDO_SAFS/apply/sabbatical'

#Obligations and Conditions
print "Testing Obligations and Conditions:\n\n"  

browser.div(:text => 'Type').click
if browser.text.include?("Sabbatical, Full Salary")
	print "Type PASSED\n"
else
	print "Type FAILED\n"
end
browser.div(:text => 'Type').click

browser.div(:text => 'Effectivity').click
if browser.text.include?("A sabbatical may be granted for a period not exceeding one (1) year")
	print "Effectivity PASSED\n"
else
	print "Effectivity FAILED\n"
end
browser.div(:text => 'Effectivity').click

browser.div(:text => 'Appointment').click
if browser.text.include?("Full Time Appointment")
	print "Appointment PASSED\n"
else
	print "Appointment FAILED\n"
end
browser.div(:text => 'Appointment').click

browser.div(:text => 'Conditions').click
if browser.text.include?("The faculty member has served the University not less than six (6) consecutive years")
	print "Conditions PASSED\n\n"
else
	print "Conditions FAILED\n"
end
browser.div(:text => 'Conditions').click


#Application Process
print "Testing Sabbatical Application Process:\n\n"

print"Step 1\n"
browser.div(:text => 'Full Details').click
if browser.text.include?("Submit duly accomplished application ")
	print "Full Details PASSED\n"
else
	print "Full Details FAILED\n"
end
browser.div(:text => 'Full Details').click

browser.div(:text => 'Service Provider').click
if browser.text.include?("Scholarship Section")
	print "Service Provider PASSED\n"
else
	print "Service Provider FAILED\n"
end
browser.div(:text => 'Service Provider').click

browser.div(:text => 'Person in charge').click
if browser.text.include?("Frontline Staff of Scholarship Section")
	print "Person in charge PASSED\n"
else
	print "Person in charge FAILED\n"
end
browser.div(:text => 'Person in charge').click

browser.div(:text => 'Forms').click
if browser.text.include?("Application Form Sabbatical leave")
	print "Forms PASSED\n\n"
else
	print "Forms FAILED\n"
end
browser.div(:text => 'Forms').click


print"Step 2\n"
browser.div(:id => 'fulldetails2').click
if browser.text.include?("Verify the status of vacation or sick leave")
	print "Full Details PASSED\n"
else
	print "Full Details FAILED\n"
end
browser.div(:id => 'fulldetails2').click

browser.div(:id => 'service2').click
if browser.text.include?("Benefits Section")
	print "Service Provider PASSED\n"
else
	print "Service Provider FAILED\n"
end
browser.div(:id => 'service2').click

browser.div(:id => 'person2').click
if browser.text.include?("Analyst of Benefits Section")
	print "Person in charge PASSED\n\n"
else
	print "Person in charge FAILED\n"
end
browser.div(:id => 'person2').click


print"Step 3\n"
browser.div(:id => 'fulldetails3').click
if browser.text.include?("Secure receiving copy of the Sabbatical Application")
	print "Full Details PASSED\n"
else
	print "Full Details FAILED\n"
end
browser.div(:id => 'fulldetails3').click

browser.div(:id => 'service3').click
if browser.text.include?("Scholarship Section")
	print "Service Provider PASSED\n"
else
	print "Service Provider FAILED\n"
end
browser.div(:id => 'service3').click

browser.div(:id => 'person3').click
if browser.text.include?("Frontline Staff of Scholarship Section")
	print "Person in charge PASSED\n\n"
else
	print "Person in charge FAILED\n"
end
browser.div(:id => 'person3').click

