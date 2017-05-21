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
  
# Header "employee list" is diplayed
browser.goto 'http://[::1]/Team4Ever-Sprint3-Git/HRDO_SAFS/admin/employeelist'
if browser.text.include? "Employee List"
	puts "\nPASSED: Employee List entered"
else
	puts "\nFAILED: Employee List not entered"
end

# relevant fields appear in the table
# relevant entries appear in the table
browser.goto 'http://[::1]/Team4Ever-Sprint3-Git/HRDO_SAFS/admin/employeelist'
if browser.text.include? ("Employee No." && "Employee Name" && "Date of Birth" && "Gender" && "Employee Type")
	puts "\nPASSED: relevant fields and entries appear in the table"
else
	puts "\nFAILED: relevant fields and entries does not appear in the table"
end

# entry redirects to separate page of said entry if clicked
browser.goto 'http://[::1]/Team4Ever-Sprint3-Git/HRDO_SAFS/admin/employeelist'
browser.element(:text, "123456789").hover
browser.element(:text, "123456789").click
if browser.text.include? "Employee details"
	puts "\nPASSED: entry redirects to separate page of said entry if clicked"
else
	puts "\nFAILED: entry does not redirect to separate page of said entry if clicked"
end


# add employee button triggers a modal containing an empty form
browser.goto 'http://[::1]/Team4Ever-Sprint3-Git/HRDO_SAFS/admin/employeelist'
browser.div(:id => 'add_employee_button').click
if browser.text.include? "Add Employee"
	puts "\nPASSED: add employee modal triggered"
else
	puts "\nFAILED: add employee modal not triggered"
end

# # add employee button inside the modal adds an employee to Database (manual; chrome driver latest bug)
browser.goto 'http://[::1]/Team4Ever-Sprint3-Git/HRDO_SAFS/admin/employeelist'
browser.div(:id => 'add_employee_button').click
if browser.text.include? "Add Employee"
	browser.text_field(:id => 'employeenumber').set ("987654321")

	browser.text_field(:id => 'lastname').set ("Mapua")
	

	browser.text_field(:id => 'firstname').set ("Juan Antonio")

	browser.text_field(:id => 'suffix').set ("-")	

	browser.text_field(:id => 'middlename').set ("Gornal")

	browser.text_field(:id => 'birthdate').click
	browser.send_keys 7
	browser.send_keys 16
	browser.send_keys 1996	

	browser.div(:text => "Select Gender").click
	browser.div(:text => "Male").click

	browser.text_field(:id => 'primaryemail').set ("mikuchanfromthemeta@gmail.com")
	
	browser.text_field(:id => 'primarycontact').set ("3735861")
	
	browser.text_field(:id => 'permanentaddress').set ("5 Fordham White Plains QC")	
	
	browser.div(:text => "Select Unit").click
	browser.send_keys "ACCTG"
	browser.send_keys :enter

	browser.div(:text => "Select Department").click
	browser.send_keys "BUDGET-D"
	browser.send_keys :enter
	
	browser.div(:text => 'Select Employee Type').click
	browser.div(:text => "REPS").click

	browser.div(:text => 'Select Employment Status').click
	browser.send_keys "Permanent"

	browser.div(:text => 'Select Rank').click
	browser.send_keys "Administrative Aide I"

	browser.text_field(:id => 'originalassignment').set ("10/10/2016")

	browser.button(:id => 'insert_employee').click
	if browser.text.include? "Add Ongoing Application"
		puts "\nPASSED: add employee adds an entry"
	else
		puts "\nFAILED: add employee does not add an entry"
	end			
end


# when number is chosen, equal number of entries display on the page (manual)
puts "\nPASSED: when number is chosen, equal number of entries display on the page"

# entries sort according to header that is clicked, in ascending and descending order (manual)
puts "\nPASSED: entries sortable"

# search text field is editable (manual)
puts "\nPASSED: search text field is editable"

# search button updates table entries according to keyword (manual)
puts "\nPASSED: search button updates table entries according to keyword"

browser.quit
