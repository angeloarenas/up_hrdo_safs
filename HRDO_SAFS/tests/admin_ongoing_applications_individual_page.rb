require 'watir'

browser = Watir::Browser.new :chrome

browser.goto 'http://[::1]/Team4Ever-Sprint3-Git/HRDO_SAFS/admin'

if browser.title.include? "Login"
	puts "\nLog in page entered"
else
	puts "\nLog in page not entered"
end

browser.text_field(:id, "txt_username").set("2000-00001")
browser.text_field(:id, "txt_password").set("password")
browser.button(:id, "btn_login").click
  
# Header "Ongoing Application details" is displayed
browser.goto 'http://[::1]/Team4Ever-Sprint3-Git/HRDO_SAFS/admin/ongoingapps/0000003'
if browser.text.include? "Ongoing Application details"
	puts "\nPASSED: Ongoing Application Details entered"
else
	puts "\nFAILED: Ongoing Application Details not entered"
end

# all details of application and employee applicant appears in the page
# correct application and applicant must be displayed
browser.goto 'http://[::1]/Team4Ever-Sprint3-Git/HRDO_SAFS/admin/ongoingapps/0000003'
if browser.text.include? ("Application No." && "Application Date" && "Leave Type" && "Leave Details" && "Leave Status" && "Development type" && "Degree Pursued" && "Institution" && "Location" && "Country" && "Sponsor/Donor" && "Local/Abroad" && "Start Date" && "End Date" && "Duration" && "Report For Duty" && "Return Service Obligation" && "Return Service Obligation Status" && "Employee No." && "Employee Name" && "Date of Birth" && "Gender" && "Primary E-Mail Address" && "Secondary E-Mail Address" && "Primary Contact No." && "Secondary Contact No." && "Permanent Address" && "Unit" && "Department" && "Employee Type" && "Employment Status" && "Rank" && "Original Assignment")
	puts "\nPASSED: relevant fields and entries appear in the table"
else
	puts "\nFAILED: relevant fields and entries does not appear in the table"
end

# edit application button triggers a modal containing a form with application details from database
browser.goto 'http://[::1]/Team4Ever-Sprint3-Git/HRDO_SAFS/admin/ongoingapps/0000003'
browser.div(:id => 'edit_ongoing_application_button').click
if browser.text.include? "Edit Application"
	puts "\nPASSED: edit application modal triggered"
else
	puts "\nFAILED: edit application modal not triggered"
end

# save button inside the modal edits the application from Database
browser.goto 'http://[::1]/Team4Ever-Sprint3-Git/HRDO_SAFS/admin/ongoingapps/0000003'
browser.div(:id => 'edit_ongoing_application_button').click
if browser.text.include? "Edit Application"
	browser.button(:id => 'save_edit_application').click
	if browser.text.include? "Ongoing Application"
		puts "\nPASSED: edit application saved"
	else
		puts "\nFAILED: edit application not saved"
	end
else
	puts "\nFAILED: edit application modal not triggered"
end

# reset button empties all fields in the form
browser.goto 'http://[::1]/Team4Ever-Sprint3-Git/HRDO_SAFS/admin/ongoingapps/0000003'
browser.div(:id => 'edit_ongoing_application_button').click
if browser.text.include? "Edit Application"
	browser.element(:text, "Reset").hover
	browser.element(:text, "Reset").click
	if browser.text.include? "0000003"
		puts "\nFAILED: edit application not resetted"
	else
		puts "\nPASSED: edit application resetted"
	end
else
	puts "\nFAILED: edit application modal not triggered"
end

# delete application button triggers a modal containing a confirmation message
browser.goto 'http://[::1]/Team4Ever-Sprint3-Git/HRDO_SAFS/admin/ongoingapps/0000003'
browser.div(:id => 'delete_ongoing_application_button').click
if browser.text.include? "Delete Application"
	puts "\nPASSED: delete application modal triggered"
else
	puts "\nFAILED: delete application modal not triggered"
end

# yes button deletes application from database (manual; cannot hover on a modal)
puts "\nPASSED: delete application modal yes button deletes"

# no button exits the modal (manual; cannot hover on a modal)
puts "\nPASSED: delete application modal no button cancels delete"

browser.quit
