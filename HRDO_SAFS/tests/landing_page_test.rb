require 'watir'

browser = Watir::Browser.new :chrome

# pressing logo and title header redirects to landing page 
browser.goto 'http://[::1]/HRDO_SAFS/landingpage'
browser.link(:text, "HRDO Scholarship and Fellowship Services").click
  if browser.title.include? "HRDO Scholarship and Fellowship Services"
    puts "\nPASSED: redirected to landing page"
  else
    puts "\nFAILED: not redirected to landing page"
  end

# Read button directs to application proces, study leave page
browser.goto 'http://[::1]/latest/Team4Ever-Sprint3-Git/HRDO_SAFS/landingpage'
browser.element(:id, "iconbutton1").hover
browser.element(:id, "iconbutton1").click
if browser.title.include? "Study Leave - HRDO Scholarship and Fellowship Services"
    puts "\nPASSED: directed to study leave page"
  else
    puts "\nFAILED: not directed to study leave page"
  end

# Self Evaluate button directs to self evaluate page
browser.goto 'http://[::1]/latest/Team4Ever-Sprint3-Git/HRDO_SAFS/landingpage'
browser.element(:id, "iconbutton2").hover
browser.element(:id, "iconbutton2").click
if browser.title.include? "Self Evaluation - HRDO Scholarship and Fellowship Services"
    puts "\nPASSED: directed to self evaluate page"
  else
    puts "\nFAILED: not directed to self evaluate page"
  end

# Calculate button directs to RSO Calculator page
browser.goto 'http://[::1]/latest/Team4Ever-Sprint3-Git/HRDO_SAFS/landingpage'
browser.element(:id, "iconbutton3").hover
browser.element(:id, "iconbutton3").click
if browser.title.include? "RSO Calculator - HRDO Scholarship and Fellowship Services"
    puts "\nPASSED: directed to rso calculator page"
  else
    puts "\nFAILED: not directed to rso calculator page"
  end

# self evaluation button directs to self evaluation page
browser.goto 'http://[::1]/latest/Team4Ever-Sprint3-Git/HRDO_SAFS/landingpage'
browser.link(:text, "Self Evaluation").click
  if browser.title.include? "Self Evaluation - HRDO Scholarship and Fellowship Services"
    puts "\nPASSED: directed to self evaluation page"
  else
    puts "\nFAILED: not directed to self evaluation page"
  end

# study leave button directs to application process, study leave page
browser.goto 'http://[::1]/latest/Team4Ever-Sprint3-Git/HRDO_SAFS/landingpage'
browser.element(:text, "Application Process").hover
browser.link(:text, "Study Leave").click
  if browser.title.include? "Study Leave - HRDO Scholarship and Fellowship Services"
    puts "\nPASSED: directed to study leave page"
  else
    puts "\nFAILED: not directed to study leave page"
  end

# doctoral studies fund button directs to application process, doctoral studies fund page
browser.goto 'http://[::1]/latest/Team4Ever-Sprint3-Git/HRDO_SAFS/landingpage'
browser.element(:text, "Application Process").hover
browser.link(:text, "Doctoral Studies Fund").click
  if browser.title.include? "Doctoral Studies Fund - HRDO Scholarship and Fellowship Services"
    puts "\nPASSED: directed to doctoral studies fund page"
  else
    puts "\nFAILED: not directed to doctoral studies fund page"
  end

# sabbatical button directs to application process, sabbatical page
browser.goto 'http://[::1]/latest/Team4Ever-Sprint3-Git/HRDO_SAFS/landingpage'
browser.element(:text, "Application Process").hover
browser.link(:text, "Sabbatical").click
  if browser.title.include? "Sabbatical - HRDO Scholarship and Fellowship Services"
    puts "\nPASSED: directed to sabbatical page"
  else
    puts "\nFAILED: not directed to sabbatical page"
  end

# special detail button directs to application process, special detail page
browser.goto 'http://[::1]/latest/Team4Ever-Sprint3-Git/HRDO_SAFS/landingpage'
browser.element(:text, "Application Process").hover
browser.link(:text, "Special Detail").click
  if browser.title.include? "Special Detail - HRDO Scholarship and Fellowship Services"
    puts "\nPASSED: directed to special detail page"
  else
    puts "\nFAILED: not directed to special detail page"
  end
  
# enrollment privileges button directs to application process, enrollment privileges page
browser.goto 'http://[::1]/latest/Team4Ever-Sprint3-Git/HRDO_SAFS/landingpage'
browser.element(:text, "Application Process").hover
browser.link(:text, "Enrollment Privileges").click
  if browser.title.include? "Enrollment Privileges - HRDO Scholarship and Fellowship Services"
    puts "\nPASSED: directed to enrollment privileges page"
  else
    puts "\nFAILED: not directed to enrollment privileges page"
  end

# RSO Calculator button directs to RSO Calculator page
browser.goto 'http://[::1]/latest/Team4Ever-Sprint3-Git/HRDO_SAFS/landingpage'
browser.link(:text, "RSO Calculator").click
  if browser.title.include? "RSO Calculator - HRDO Scholarship and Fellowship Services"
    puts "\nPASSED: directed to rso calculator page"
  else
    puts "\nFAILED: not directed to rso calculator page"
  end

# contact us button directs to Contact Us Page
browser.goto 'http://[::1]/latest/Team4Ever-Sprint3-Git/HRDO_SAFS/landingpage'
browser.link(:text, "Contact Us").click
  if browser.title.include? "Contact Us - HRDO Sabbatical Manager"
    puts "\nPASSED: directed to contact us page"
  else
    puts "\nFAILED: not directed to contact us page"
  end

# Footer address redirects to google map link
browser.goto 'http://[::1]/latest/Team4Ever-Sprint3-Git/HRDO_SAFS/landingpage'
browser.link(:text, "OsmeñaAvenue,Diliman,Quezon City,MetroManila").click
  if browser.title.include? "Google Maps"
    puts "\nPASSED: redirected to google maps page"
  else
    puts "\nFAILED: not redirected to google maps page"
  end

# footer email is displayed 1
browser.goto 'http://[::1]/latest/Team4Ever-Sprint3-Git/HRDO_SAFS/landingpage'
browser.link(:text, "uphrdotraining@gmail.com").click
  if browser.title.include? "UP HRDO - Training Needs Assessment"
    puts "\nPASSED: redirected to UP HRDO - Training Needs Assessment"
  else
    puts "\nFAILED: not redirected to UP HRDO - Training Needs Assessment"
  end

# footer email is displayed 2
browser.goto 'http://[::1]/latest/Team4Ever-Sprint3-Git/HRDO_SAFS/landingpage'
browser.link(:text, "hrdo.updiliman@up.edu.ph").click
  if browser.title.include? "Contact Us - HRDO Sabbatical Manager"
    puts "\nPASSED: redirected to contact us page"
  else
    puts "\nFAILED: not redirected to contact us page"
  end

# footer contact number is displayed
browser.goto 'http://[::1]/latest/Team4Ever-Sprint3-Git/HRDO_SAFS/landingpage'
browser.link(:text, "987-8500 loc 2576").click
  if browser.title.include? "HRDO Scholarship and Fellowship Services"
    puts "\nPASSED: contact no. displayed"
  else
    puts "\nFAILED: contact no. not displayed"
  end

# footer HRDO website displayed
browser.goto 'http://[::1]/latest/Team4Ever-Sprint3-Git/HRDO_SAFS/landingpage'
browser.link(:text, "hrdo.upd.edu.ph").click
  if browser.title.include? "HRDO: Human Resources Development Office"
    puts "\nPASSED: redirected to HRDO website"
  else
    puts "\nFAILED: not redirected to HRDO website"
  end

browser.quit
