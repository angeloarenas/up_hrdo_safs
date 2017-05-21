# Contact Us Test

require 'watir'
browser = Watir::Browser.new :chrome

browser.goto 'http://[::1]/HRDO_SAFS/contactus'
print "Test 1\n"
browser.text_field(:id => 'full_name').set 'Pega, Aira'
browser.text_field(:id => 'employee_num').set '0000007'
browser.text_field(:id => 'contact_no').set '09172484776'
browser.text_field(:id => 'email_ad').set 'pega@yahoo.com'
browser.text_field(:id => 'subject').set 'Inquiry'
browser.div(:id => 'msg').click
browser.send_keys 'Follow up'
browser.button(:id => 'btn_send').click

print "Full Name Valid\n"
print "Employee Number Valid\n"
print "Contact Number Valid\n"
print "Email Add Valid\n"
print "Subject Valid\n"
print "Message Valid\n"

if browser.text.include?("Message successfully sent!")
	print "TEST PASSED\n\n"
else
	print "TEST FAILED\n\n"
end

browser.goto 'http://[::1]/HRDO_SAFS/contactus'
print "Test 2\n"
browser.text_field(:id => 'full_name').set 'Pega, Aira'
browser.text_field(:id => 'employee_num').set '0000007'
browser.text_field(:id => 'contact_no').set '09172484776'
browser.text_field(:id => 'email_ad').set 'pega@yahoo.com'
browser.div(:id => 'msg').click
browser.send_keys 'Follow up'
browser.button(:id => 'btn_send').click

print "Full Name Valid\n"
print "Employee Number Valid\n"
print "Contact Number Valid\n"
print "Email Add Valid\n"
print "Subject Invalid\n"
print "Message Valid\n"

if !(browser.text.include?("Message successfully sent!"))
	print "TEST PASSED\n\n"
else
	print "TEST FAILED\n\n"
end