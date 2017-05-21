# DSF Test
# Tenured
# Not sub
# Assistant Prof or lower
# Years of Service (>= 1)
# 40 to 45 (local) 1972 - 1977
# 40 to 50 (foreign) 1967 - 1977

require 'watir'

employee_type = Array['Faculty', 'Administrative Staff', 'REPS']
rank = Array['Professor', 'Associate Professor', 'Assistant Professor', 'Instructor']
year = Array[-1, 2]
birthday = Array[1973, 1967, 1978]
browser = Watir::Browser.new :chrome
testNo = 1


for x in 0..1
	for y in 0..2
		print "Test ", testNo, "\n"
	    browser.goto 'http://[::1]/HRDO_SAFS/evaluation'
		browser.a(:id => 'dsftab').click
		testNo = testNo + 1
		tenured = 0
		substitute = 0
		type = 0
		year = 0
		birthday = 0
		local = 0
		abroad = 0
		approved = 0
		temp_bd = 0

		#local/abroad, substitute, tenured
		if y == 0
			browser.label(:text =>'Local', :id => 'local2').click
			browser.label(:text =>'No', :id => 'N3').click
			browser.label(:text =>'Yes', :id => 'Y4').click
			local = 1
		elsif y == 1
			browser.label(:text =>'Abroad', :id => 'abroad2').click
			browser.label(:text =>'Yes', :id => 'Y3').click
			browser.label(:text =>'No', :id => 'N4').click
			abroad = 1
			substitute = 1
			tenured = 1
		elsif y == 2
			browser.label(:text =>'Abroad', :id => 'abroad2').click
			browser.label(:text =>'No', :id => 'N3').click
			browser.label(:text =>'No', :id => 'N4').click
			tenured = 1
			abroad = 1
		end

		#employee type
		browser.div(:id => 'et2').click
		if y == 0 
			browser.send_keys employee_type[0]
			browser.send_keys :enter
			#rank
			browser.div(:id => 'fr2').click
			if x == 0
				browser.send_keys 'Professor'
				type = 1
			elsif x == 1
				browser.send_keys 'Assistant Professor'
			end
			browser.send_keys :enter
		elsif y == 1
			browser.send_keys employee_type[1]
			browser.send_keys :enter
			type = 1
		elsif y == 2
			browser.send_keys employee_type[2]
			browser.send_keys :enter
			type = 1
		end
			
		#year
		if x == 0
			browser.text_field(:id => 'servYear2').set -1
		else
			browser.text_field(:id => 'servYear2').set 2
		end

		if !(year[x] < 1)
			year = 1
		end

		#birthday
		browser.text_field(:id => 'birthday2').click
		if y == 0
			browser.send_keys 1973
			temp_bd = 1973
		elsif y == 1
			browser.send_keys 1967
			temp_bd = 1967
		elsif y == 2
			browser.send_keys 1978
			temp_bd = 1978
		end			
		browser.send_keys :enter
		

		if local == 1
			if !(temp_bd >= 1972 and temp_bd <= 1977)
				birthday = 1
			end
		elsif abroad == 1
			if !(temp_bd >= 1967 and temp_bd <= 1977)
				birthday = 1
			end
		end

		browser.button(:name => 'Sub_DSF').click

		#approved ba lumabas?
		if !(browser.text.include?("You are qualified!"))
			approved = 1
		elsif browser.text.include?("You are not qualified")
			approved = 1
		end

		if substitute == 1 
			print "Invalid: Must not be a substitute\n"
		else 
			print "Valid Substitute\n"
		end

		if tenured == 1 
			print "Invalid: Must be tenured\n"
		else 
			print "Valid Tenured\n"
		end

		if type == 1 
			print "Invalid: Faculty position must be Assistant Professor or lower\n"
		else 
			print "Valid Position\n"
		end

		if year == 1 
			print "Invalid: Year of service must be at least 1 year\n"
		else 
			print "Valid Year of Service\n"
		end

		if birthday == 1 and local == 1 
			print "Invalid: If local, must be 40-45 years old\n"
		elsif birthday == 1 and abroad == 1 
			print "Invalid: If abroad, must be 40-50 years old\n"
		elsif birthday == 0 
			print "Valid age\n"
		end
										

		if substitute == 0 and tenured == 0 and type == 0 and year == 0 and birthday == 0 and approved == 0
			print "TEST PASSED\n\n"
		elsif !(substitute == 0 and tenured == 0 and type == 0 and year == 0 and birthday == 0) and approved == 1
			print "TEST PASSED\n\n"
		elsif !(substitute == 0 and tenured == 0 and type == 0 and year == 0 and birthday == 0) and approved == 0
			print "TEST FAILED\n\n"
		else
			print "TEST FAILED\n\n"
		end
	end
end