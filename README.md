This is the git repository for the HRDO safs report module.

# Environment setup

## Mysql

* Create database named "hrdodb" on mysql server.
* Create user named `hrdo_user` with password `hrdo_password`
* Grant all privileges to `hrdo_user` on database `hrdb`

## Django

* Make sure you are on a virtual environment running python 2
* Run `pip install -r requirements.txt`