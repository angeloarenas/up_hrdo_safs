# Test Cases:
# Invalid start date, valid end date
# Valid of end date, invalid start date
# Both invalid
# Empty start date, valid end date
# Empty end date, valid start date
# Empty start date, invalid end date
# Empty end date, invalid start date
# Both Empty
# Both valid

# Valid: month no greater than 12
# 		year not less than 2017
#Invalid: end date earlier than start date

require 'watir'

start_date = Array["01/01/2017", "13/01/2017", "", "abcd"]
end_date = Array["05/01/2017", "01/40/2017", "", "abcd"]
browser = Watir::Browser.new :chrome
testNo = 1

for x in 0..3
	for y in 0..3
		print "Test ", testNo, "\n"
		browser.goto 'http://[::1]/HRDO_ver5/rsocalculator'

		# test case for username
	    browser.text_field(:id => 'staDate_0').set start_date[x]
	    test_start_date = browser.text_field(:id => 'staDate_0').value
	    test_start_month = test_start_date[0..1]
	    test_start_day = test_start_date[3..4]
	    test_start_year = test_start_date[6..9]
	    start_flag = 0
	    # test cases for invalid start date
	    if test_start_date != "" and !(test_start_date.include? '/')
	    	start_flag = 1
	    	print "Start Date Invalid: Must not be alphanumeric characters\n"
		elsif test_start_date == ""
	    	start_flag = 1
	    	print "Start Date Invalid: Empty field\n"
	    elsif test_start_day.to_i > 31 or test_start_month.to_i < 1
	    	start_flag = 1
	    	print "Start Date Invalid: Wrong Start Date Format. Day must be 1-31 only\n"
	    elsif test_start_month.to_i > 12 or test_start_month.to_i < 1
	    	start_flag = 1
	    	print "Start Date Invalid: Wrong Start Date Format. Month must be 1-12 only\n"
	    elsif test_start_year.to_i < 2017
	    	start_flag = 1
	    	print "Start Date Invalid: Wrong Start Date Format. Year must be 2017 and up\n"
	    else
	    	print "Start Date Valid, ", test_start_date, "\n"
	    end


	    # test case for username
	    browser.text_field(:id => 'endDate_0').set end_date[y]
	    test_end_date = browser.text_field(:id => 'endDate_0').value
	    test_end_month = test_end_date[0..1]
	    test_end_day = test_end_date[3..4]
	    test_end_year = test_end_date[6..9]
	    end_flag = 0
	    # test cases for invalid start date
	    if test_end_date != "" and !(test_end_date.include? '/')
    		end_flag = 1
    		print "End Date Invalid: Must not be alphanumeric characters\n"
	    elsif test_end_date == ""
	    	end_flag = 1
	    	print "End Date Invalid: Empty field\n"
	    elsif test_end_day.to_i > 31 or test_end_month.to_i < 1
	    	end_flag = 1
	    	print "End Date Invalid: Wrong End Date Format. Day must be 1-31 only\n"
	    elsif test_end_month.to_i > 12 or test_end_month.to_i < 1
	    	end_flag = 1
	    	print "End Date Invalid: Wrong End Date Format. Month must be 1-12 only\n"
	    elsif test_end_year.to_i < 2017
	    	end_flag = 1
	    	print "End Date Invalid: Wrong End Date Format. Year must be 2017 and up\n"
	    else
	    	print "End Date Valid, ", test_end_date, "\n"
	    end

	    browser.button(:id => 'comBut_0').click

	    #test case for outcome (valid date/invalid date)
	    valid = 0
	    if  browser.text_field(:id => 'repDate_0').value == "Invalid date" or browser.text_field(:id => 'tSpanCO_0').value == "NaNy NaNm NaNd (0 days)"
	    	valid = 1
	    end


	    #test of both
	    if valid == 0
		    if start_flag == 0 and end_flag == 0
		    	print "TEST PASSED", "\n\n"
		    else
		    	print "TEST FAILED", "\n\n"
		    end
		else
			if !(start_flag == 0 and end_flag == 0)
		    	print "TEST PASSED", "\n\n"
		    else
		    	print "TEST FAILED", "\n\n"
		    end
		end

		testNo += 1
	end
end