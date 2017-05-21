require 'watir'


username = Array["2000-00001", "1900-12345", "2012-12345", "abcd-efghj", ""]
password = Array["password", "password123", "pass", ""]
browser = Watir::Browser.new :chrome
testNo=1

for x in 0..4
  for y in 0..3
    print "Test ", testNo
    #test case for browser
    browser.goto 'http://[::1]/HRDO_SAFS/admin'
    if browser.title.include? "SIGN IN"
      url=1
      puts "\nURL valid!"
    else
      puts "\nURL invalid!"
    end

    # test case for username
    browser.text_field(:id => 'txt_username').set username[x]
    test_username = browser.text_field(:id => 'txt_username').value
    test_year = test_username[0..3]
    if  test_username == "2000-00001"
      un=1
      puts "Username valid!"
    else
      if test_username == ""
        puts "Username invalid: Empty field"
      elsif test_username =~ /[A-Za-z]/
        puts "Username invalid: Non-numeric input"
      elsif test_year.to_i < 1908 or test_year.to_i > 2017
        puts "Username invalid: Year must be between 1908 and 2017"
      else
        puts "Username invalid: Wrong username"
      end
    end

    #test case for password
    browser.text_field(:id => 'txt_password').set password[y]
    test_password = browser.text_field(:id => 'txt_password').value
    if test_password == "password"
      pw=1
      puts "Password valid!"
    else
      if test_password == ""
        puts "Password invalid: Empty field"
      elsif test_password.length < 8
        puts "Password invalid: Less than 8 characters"
      else
        puts "Password invalid: Wrong password"
      end
    end

    browser.button(type: 'submit').click

    #test case for the log in
    if browser.text.include? "Transactions"
      print 'You are now in ', browser.title
      puts ""
      if (url==1) && (un==1) && (pw==1)
        puts "TEST PASSED"
      else
        puts "TEST FAILED"
      end
    else
      print 'You are still in ', browser.title
      puts ""
      if !((url==1) && (un==1) && (pw==1))
        puts "TEST PASSED"
      else
        puts "TEST FAILED"
      end
    end
    testNo=testNo+1

    url=0
    un=0
    pw=0

    puts "",""

    if browser.text.include? "Log out"
    	browser.a(:text => "Log out").click
    end
  end
end

browser.quit