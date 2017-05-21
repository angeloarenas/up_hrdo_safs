require 'watir'

browser = Watir::Browser.new :chrome
browser.goto 'http://[::1]/HRDO_SAFS/admin'
puts "\nTESTING CHANGE PASSWORD"

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
	puts "\nLog in Success!"
else
	puts "\nLog in failed."
end

puts "\n\nGOING TO CHANGE PASSWORD PAGE"
browser.link(:text, "Change Password").click

current_pass = Array["","incorrectpassword","password"]
new_pass = Array["","less8","password2"]
retype_pass = Array["","nonmatching","password2"]

for x in 0..2
	#input data
	browser.text_field(:id, "password_curr").set(current_pass[x])
	browser.text_field(:id, "password_new").set(new_pass[x])
	browser.text_field(:id, "password_retype").set(retype_pass[x])
	if x == 0
		print "\n\nTest 1: Blank Input"

		if current_pass[x] == ""
			print "\nCurrent Password is blank."
		end
		if new_pass[x] == ""
			print "\nNew Password is blank."
		end
		if retype_pass[x] == ""
			print "\nRetype Password is blank."
		end

		if !(browser.text.include? "New password successfully changed!") and (browser.text.include? "Minimum of 8 characters, at least 1 alphabet, 1 number.")
			puts "\nTEST PASSED"
		else
			puts "\nTEST FAILED"
		end
	elsif x == 1
		print "\n\nTest 2: Incorrect Input"

		if current_pass[x] == "incorrectpassword"
			print "\nCurrent Password is incorrrect."
		end
		if new_pass[x].length < 8 
			print "\nNew Password length is less than eight."
		end
		if retype_pass[x] != new_pass[x]
			print "\nRe-type Password does not match New Password."
		end

		if !(browser.text.include? "New password successfully changed!") and (browser.text.include? "Minimum of 8 characters, at least 1 alphabet, 1 number.") and (browser.text.include? "Passwords do not match.")
			puts "\nTEST PASSED"
		else
			puts "\nTEST FAILED"
		end
	elsif x == 2
		print "\n\nTest 3: Correct Password"

		if current_pass[x] == "password"
			print "\nCurrent Password is correct."
		end
		if new_pass[x].length >= 8 
			print "\nNew Password length is greater than or equal to 8."
		end
		if retype_pass[x] == new_pass[x]
			print "\nRe-type Password matches New Password."
		end

		#submit
		browser.button(:id, "btn_save").click
		if (browser.text.include? "New Password Successfully Changed!")
			puts "\nTEST PASSED"
		else
			puts "\nTEST FAILED"
		end
	end
end


browser.quit