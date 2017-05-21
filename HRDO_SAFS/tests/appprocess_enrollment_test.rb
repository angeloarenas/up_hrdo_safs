#App Process Enrollment Test


require 'watir'
browser = Watir::Browser.new :chrome
browser.goto 'http://[::1]/HRDO_SAFS/apply/enrollmentprivileges'

#Obligations and Conditions
print "Testing Obligations and Conditions:\n\n"  

browser.div(:text => 'Type').click
if browser.text.include?("Enrollment Privilege")
	print "Type PASSED\n"
else
	print "Type FAILED\n"
end
browser.div(:text => 'Type').click

browser.div(:text => 'Effectivity').click
if browser.text.include?("Per Semester (renewal subject to approval and conditions)")
	print "Effectivity PASSED\n"
else
	print "Effectivity FAILED\n"
end
browser.div(:text => 'Effectivity').click

browser.div(:text => 'Description').click
if browser.text.include?("No member of the faculty shall enrol as a student in the University")
	print "Description PASSED\n"
else
	print "Description FAILED\n"
end
browser.div(:text => 'Description').click

browser.div(:text => 'Conditions').click
if browser.text.include?("All full-time University personnel may enrol in university courses")
	print "Conditions PASSED\n"
else
	print "Conditions FAILED\n"
end
browser.div(:text => 'Conditions').click

browser.div(:text => 'Restrictions').click
if browser.text.include?("No member of the faculty shall enrol as a student in the University System")
	print "Restrictions PASSED\n\n"
else
	print "Restrictions FAILED\n"
end
browser.div(:text => 'Restrictions').click


#Application Process
print "Testing Enrollment Privileges Application Process:\n\n"

print"Step 1\n"
browser.div(:text => 'Full Details').click
if browser.text.include?("Applicant fills out application form with department chair’s")
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
	print "Person in charge PASSED\n\n"
else
	print "Person in charge FAILED\n"
end
browser.div(:text => 'Person in charge').click


print"Step 2\n"
browser.div(:id => 'fulldetails2').click
if browser.text.include?("Submit application for processing")
	print "Full Details PASSED\n"
else
	print "Full Details FAILED\n"
end
browser.div(:id => 'fulldetails2').click

browser.div(:id => 'service2').click
if browser.text.include?("Scholarship Section")
	print "Service Provider PASSED\n"
else
	print "Service Provider FAILED\n"
end
browser.div(:id => 'service2').click

browser.div(:id => 'person2').click
if browser.text.include?("Frontline Staff of Scholarship Section")
	print "Person in charge PASSED\n"
else
	print "Person in charge FAILED\n"
end
browser.div(:id => 'person2').click

browser.div(:text => 'Forms').click
if browser.text.include?("Duly accomplished application form")
	print "Forms PASSED\n\n"
else
	print "Forms FAILED\n"
end
browser.div(:text => 'Forms').click


print"Step 3\n"
browser.div(:id => 'fulldetails3').click
if browser.text.include?("Secure receiving copy of the Enrollment Privilege application")
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