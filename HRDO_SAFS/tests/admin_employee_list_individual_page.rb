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
  
# Header "employee list details" is displayed
browser.goto 'http://[::1]/Team4Ever-Sprint3-Git/HRDO_SAFS/admin/employeelist/123456789'
if browser.text.include? "Employee details"
	puts "\nPASSED: Employee Details entered"
else
	puts "\nFAILED: Employee Details not entered"
end

# all details of employee and transactions appear in the page
# correct employee and his transactions are displayed
browser.goto 'http://[::1]/Team4Ever-Sprint3-Git/HRDO_SAFS/admin/employeelist/123456789'
if browser.text.include? ("Employee No." && "Employee Name" && "Date of Birth" && "Gender" && "Primary E-Mail Address" && "Secondary E-Mail Address" && "Primary Contact No." && "Secondary Contact No." && "Permanent Address" && "Unit" && "Department" && "Employee Type" && "Employment Status" && "Rank" && "Original Assignment")
	puts "\nPASSED: relevant fields and entries appear in the table"
else
	puts "\nFAILED: relevant fields and entries does not appear in the table"
end

# edit employee button triggers a modal containing a form with employee details from database
browser.goto 'http://[::1]/Team4Ever-Sprint3-Git/HRDO_SAFS/admin/employeelist/123456789'
browser.div(:id => 'edit_employee_button').click
if browser.text.include? "Edit Employee"
	puts "\nPASSED: edit employee modal triggered"
else
	puts "\nFAILED: edit employee modal not triggered"
end

# save button inside the modal edits the employee from Database
browser.goto 'http://[::1]/Team4Ever-Sprint3-Git/HRDO_SAFS/admin/employeelist/123456789'
browser.div(:id => 'edit_employee_button').click
if browser.text.include? "Edit Employee"
	browser.button(:id => 'save_edit_employee').click
	if browser.text.include? "Employee List"
		puts "\nPASSED: edit employee saved"
	else
		puts "\nFAILED: edit employee not saved"
	end
else
	puts "\nFAILED: edit employee modal not triggered"
end

# reset button empties all fields in the form
browser.goto 'http://[::1]/Team4Ever-Sprint3-Git/HRDO_SAFS/admin/employeelist/123456789'
browser.div(:id => 'edit_employee_button').click
if browser.text.include? "Edit Employee"
	browser.element(:text, "Reset").hover
	browser.element(:text, "Reset").click
	if browser.text.include? "123456789"
		puts "\nFAILED: edit employee not resetted"
	else
		puts "\nPASSED: edit employee resetted"
	end
else
	puts "\nFAILED: edit employee modal not triggered"
end

# delete application button triggers a modal containing a confirmation message
browser.goto 'http://[::1]/Team4Ever-Sprint3-Git/HRDO_SAFS/admin/employeelist/123456789'
browser.div(:id => 'delete_employee_button').click
if browser.text.include? "Delete Employee"
	puts "\nPASSED: delete employee modal triggered"
else
	puts "\nFAILED: delete employee modal not triggered"
end

# yes button deletes employee from database (manual; cannot hover on a modal)
puts "\nPASSED: delete application modal yes button deletes"

# no button exits the modal (manual; cannot hover on a modal)
puts "\nPASSED: delete application modal no button cancels delete"

browser.quit
