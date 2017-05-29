# HRDO SAFS

HRDO safs is a project by Computer Science students from the Department of Computer Science University of the Philippines Diliman. It aims to provide an information system for the efficient management of employee leaves.

# Directories

## `HRDO_SAFS`

`HRDO_SAFS` is the directory that contains the main project. It was made by Junior Computer Science Students as their requirement for the subject CS 192.

To run this project:
1. Install XAMPP
2. Setup the project
3. Start Apache
4. Start MySQL

If proxy is enabled in the network, bypass proxy by: (Windows)
1. Click the “Google Chrome” menu button in the top navigation menu to display menu options.
3. Click the “Settings” option to open the Google Chrome Settings menu.
4. Click “Show Advanced Settings.”
5. Click the “Change Proxy Settings” in the Network section in the Advanced Settings screen. The Change Proxy Settings dialog box for your operating system opens.
6. Click the “Connections” tab, and then click the “LAN Settings” button. The LAN Settings dialog box opens.
7. Click Advanced, and type the IP Address of the host in the Exceptions area.

## `hrdo_safs_report`

`hrdo_safs_report` is a directory that contains an additional feature to complement the `HRDO_SAFS` project. It provides the top 10 analytics commonly used by HRDO in generating their reports. It also provides an interface which the employees can use to efficiently manage people who are on their leave.

To setup this project:
1. Make sure you are running python 2 and have pip installed
2. Run `pip install -r requirements.txt`

To run this project:
1. Run `HRDO_SAFS` first (see above)
2. Start project in development server `./manage.py runserver 0.0.0.0:8000`
3. Access by using URL `localhost:8000`
