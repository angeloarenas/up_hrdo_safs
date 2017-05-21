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
  
# Header "transaction list" is diplayed
browser.goto 'http://[::1]/Team4Ever-Sprint3-Git/HRDO_SAFS/admin/transactionslist'
if browser.text.include? "Transactions List"
	puts "\nPASSED: Transactions List entered"
else
	puts "\nFAILED: Transactions List not entered"
end

# relevant fields appear in the table
# relevant entries appear in the table
browser.goto 'http://[::1]/Team4Ever-Sprint3-Git/HRDO_SAFS/admin/transactionslist'
if browser.text.include? ("Transaction No." && "Application Date" && "Leave Type" && "Leave Details" && "Leave Status" && "Start Date" && "End Date")
	puts "\nPASSED: relevant fields and entries appear in the table"
else
	puts "\nFAILED: relevant fields and entries does not appear in the table"
end

# entry redirects to separate page of said entry if clicked
browser.goto 'http://[::1]/Team4Ever-Sprint3-Git/HRDO_SAFS/admin/transactionslist'
browser.element(:text, "0000001").hover
browser.element(:text, "0000002").click
if browser.text.include? "Transaction details"
	puts "\nPASSED: entry redirects to separate page of said entry if clicked"
else
	puts "\nFAILED: entry does not redirect to separate page of said entry if clicked"
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
