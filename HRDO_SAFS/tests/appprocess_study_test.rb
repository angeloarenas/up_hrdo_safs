#App Process Study Leave Test

require 'watir'
browser = Watir::Browser.new :chrome
browser.goto 'http://[::1]/HRDO_SAFS/apply/studyleave'

#Obligations and Conditions
print "Testing Obligations and Conditions:\n\n"

browser.div(:text => 'Type').click
if browser.text.include?("As a University policy, UP faculty members are encouraged")
	print "Type PASSED\n"
else
	print "Type FAILED\n"
end
browser.div(:text => 'Type').click

browser.div(:text => 'Effectivity').click
if browser.text.include?("Faculty members on study leave may enjoy a fellowship")
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

browser.div(:text => 'Privileges').click
if browser.text.include?("Full de-loading from regular faculty duties")
	print "Privileges PASSED\n"
else
	print "Privileges FAILED\n"
end
browser.div(:text => 'Privileges').click

browser.div(:text => 'Conditions').click
if browser.text.include?("Before the start of the full study leave with pay")
	print "Conditions PASSED\n"
else
	print "Conditions FAILED\n"
end
browser.div(:text => 'Conditions').click

browser.div(:text => 'Restrictions').click
if browser.text.include?("No member of the faculty shall enrol as a student")
	print "Restrictions PASSED\n\n"
else
	print "Restrictions FAILED\n"
end
browser.div(:text => 'Restrictions').click

#Application Process
print "Testing Study Leave Application Process:\n\n"

print"Step 1\n"
browser.div(:text => 'Full Details').click
if browser.text.include?("Submit letter of request with endorsement")
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
if browser.text.include?("Copy of acceptance/admission from school/university")
	print "Forms PASSED\n\n"
else
	print "Forms FAILED\n"
end
browser.div(:text => 'Forms').click


print"Step 2\n"
browser.div(:id => 'fulldetails2').click
if browser.text.include?("Verify the appointment status if effectivity")
	print "Full Details PASSED\n"
else
	print "Full Details FAILED\n"
end
browser.div(:id => 'fulldetails2').click

browser.div(:id => 'service2').click
if browser.text.include?("Appointment Section")
	print "Service Provider PASSED\n"
else
	print "Service Provider FAILED\n"
end
browser.div(:id => 'service2').click

browser.div(:id => 'person2').click
if browser.text.include?("Analyst of Appointment Section")
	print "Person in charge PASSED\n\n"
else
	print "Person in charge FAILED\n"
end
browser.div(:id => 'person2').click


print"Step 3\n"
browser.div(:id => 'fulldetails3').click
if browser.text.include?("Secure receiving copy of the Study Leave Application")
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
