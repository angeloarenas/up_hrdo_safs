require 'watir'

browser = Watir::Browser.new :chrome
browser.goto 'http://[::1]/HRDO_SAFS/admin'

#login muna
if browser.title.include? "Login"
      url=1
      puts "\nLogging In!"
    else
      puts "\nLog in first!"
    end

browser.text_field(:id, "txt_username").set("2000-00001")
browser.text_field(:id, "txt_password").set("password")
browser.button(:id, "btn_login").click

if browser.text.include? "Ongoing Applications"
	puts "\nYou are now in Ongoing Applications"
else
	puts "\nLog in failed."
end

puts "\n\nTESTING SIDEBAR MENU REDIRECTION"
footer_items = ["Address",
	"E-mail Address1",
	"Email-Address2",
	"Number",
	"Website"]
footer_contents = ["Osmeña Avenue, Diliman, Quezon City, Metro Manila",
	"hrdo.updiliman@up.edu.ph",
	"uphrdotraining@gmail.com",
	" 987-8500 loc 2576",
	"hrdo.upd.edu.ph"]

for x in 0..4
	print "\nTest ", x, ": Display of ", footer_items[x]
	if browser.text.include? footer_contents[x]
		puts "\nTEST PASSED"
	else
		puts "\nTEST FAILED."
	end
end

puts "\n\nTESTING SIDEBAR MENU REDIRECTION"
sidebar_items = ["Employee List","Transactions List","Change Password","RSO Calculator","Ongoing Applications"]

for x in 0..4
	print "\nTest ", x, ": Going to", sidebar_items[x]
	browser.link(:text, sidebar_items[x]).click
	if browser.text.include? sidebar_items[x]
		puts "\nTEST PASSED"
	else
		puts "\nTEST FAILED."
	end
end

puts "\n\nTESTING TOP MENU TITLE REDIRECTION"
browser.link(:text, "HRDO Scholarship and Fellowship Services").click
if browser.text.include? "Ongoing Applications"
	puts "\nTEST PASSED"
else
	puts "\nTEST FAILED"
end

puts "\n\nTESTING LOG OUT BUTTON REDIRECTION"
browser.link(:text, "Log out").click
if browser.title.include? "Login"
	puts "\nTEST PASSED"
else
	puts "\nTEST FAILED"
end

browser.quit