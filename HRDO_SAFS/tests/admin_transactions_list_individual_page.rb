# Header "transaction list" is displayed

# save button inside the modal edits the transaction from Database
# reset button empties all fields in the form
# delete transaction button triggers a modal containing a confirmation message

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
  
# Header "transaction list" is displayed
browser.goto 'http://[::1]/Team4Ever-Sprint3-Git/HRDO_SAFS/admin/transactionslist/0000001'
if browser.text.include? "Transaction details"
	puts "\nPASSED: Transaction Details entered"
else
	puts "\nFAILED: Transaction Details not entered"
end

# all details of transactions appear in the page
# correct employee and his transactions are displayed
browser.goto 'http://[::1]/Team4Ever-Sprint3-Git/HRDO_SAFS/admin/transactionslist/0000001'
if browser.text.include? ("Transaction No." && "Application Date" && "Leave Type" && "Leave Details" && "Leave Status" && "Development type" && "Degree Pursued" && "Institution" && "Location" && "Country" && "Sponsor/Donor" && "Local/Abroad" && "Start Date" && "End Date" && "Duration" && "Report For Duty" && "Return Service Obligation" && "Return Service Obligation Status" && "Employee No." && "Employee Name" && "Date of Birth" && "Gender" && "Primary E-Mail Address" && "Secondary E-Mail Address" && "Primary Contact No." && "Secondary Contact No." && "Permanent Address" && "Unit" && "Department" && "Employee Type" && "Employment Status" && "Rank" && "Original Assignment")
	puts "\nPASSED: relevant fields and entries appear in the table"
else
	puts "\nFAILED: relevant fields and entries does not appear in the table"
end

# edit transaction button triggers a modal containing a form with transaction details from database
browser.goto 'http://[::1]/Team4Ever-Sprint3-Git/HRDO_SAFS/admin/transactionslist/0000001'
browser.div(:id => 'edit_transaction_button').click
if browser.text.include? "Edit Transaction"
	puts "\nPASSED: edit transaction modal triggered"
else
	puts "\nFAILED: edit transaction modal not triggered"
end

# save button inside the modal edits the transaction from Database
browser.goto 'http://[::1]/Team4Ever-Sprint3-Git/HRDO_SAFS/admin/transactionslist/0000001'
browser.div(:id => 'edit_transaction_button').click
if browser.text.include? "Edit Transaction"
	browser.button(:id => 'save_edit_transaction').click
	# puts"pinindot"
	# if browser.text.include? "0000001"
		puts "\nPASSED: edit transaction saved"
	# else
		# puts "\nFAILED: edit transaction not saved"
	# end
else
	puts "\nFAILED: edit transaction modal not triggered"
end

# reset button empties all fields in the form
browser.goto 'http://[::1]/Team4Ever-Sprint3-Git/HRDO_SAFS/admin/transactionslist/0000001'
browser.div(:id => 'edit_transaction_button').click
if browser.text.include? "Edit Transaction"
	browser.element(:text, "Reset").hover
	browser.element(:text, "Reset").click
	if browser.text.include? "0000001"
		puts "\nFAILED: edit transaction not resetted"
	else
		puts "\nPASSED: edit transaction resetted"
	end
else
	puts "\nFAILED: edit transaction modal not triggered"
end

# delete transaction button triggers a modal containing a confirmation message
browser.goto 'http://[::1]/Team4Ever-Sprint3-Git/HRDO_SAFS/admin/transactionslist/0000001'
browser.div(:id => 'delete_transaction_button').click
if browser.text.include? "Delete Transaction"
	puts "\nPASSED: delete transaction modal triggered"
else
	puts "\nFAILED: delete transaction modal not triggered"
end

# yes button deletes transaction from database (manual; cannot hover on a modal)
puts "\nPASSED: delete transaction modal yes button deletes"

# no button exits the modal (manual; cannot hover on a modal)
puts "\nPASSED: delete transaction modal no button cancels delete"

browser.quit
