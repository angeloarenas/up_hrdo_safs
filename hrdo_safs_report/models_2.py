# This is an auto-generated Django model module.
# You'll have to do the following manually to clean this up:
#   * Rearrange models' order
#   * Make sure each model has one field with primary_key=True
#   * Make sure each ForeignKey has `on_delete` set to the desired behavior.
#   * Remove `managed = False` lines if you wish to allow Django to create, modify, and delete the table
# Feel free to rename the models, but don't rename db_table values or field names.
from __future__ import unicode_literals

from django.db import models


class AdminLogin(models.Model):
    id = models.BigAutoField(unique=True)
    adminnumber = models.CharField(primary_key=True, max_length=32)
    password = models.CharField(max_length=255)
    firstname = models.CharField(max_length=64)
    middleinitial = models.CharField(max_length=8)
    lastname = models.CharField(max_length=64)

    class Meta:
        managed = False
        db_table = 'admin_login'


class ContactSureties(models.Model):
    id = models.BigAutoField(primary_key=True)
    name = models.CharField(max_length=128)
    address = models.CharField(max_length=255)
    contactno = models.CharField(max_length=32)
    email = models.CharField(max_length=64)
    employeenumber = models.CharField(max_length=32)

    class Meta:
        managed = False
        db_table = 'contact_sureties'


class Employees(models.Model):
    id = models.BigAutoField(unique=True)
    employeenumber = models.CharField(primary_key=True, max_length=32)
    firstname = models.CharField(max_length=64)
    middlename = models.CharField(max_length=64)
    lastname = models.CharField(max_length=64)
    suffix = models.CharField(max_length=16)
    birthdate = models.DateField()
    gender = models.CharField(max_length=8)
    primaryemail = models.CharField(max_length=128)
    secondaryemail = models.CharField(max_length=128)
    primarycontact = models.CharField(max_length=32)
    secondarycontact = models.CharField(max_length=32)
    permanentaddress = models.CharField(max_length=255)
    unit = models.CharField(max_length=32)
    department = models.CharField(max_length=32)
    employeetype = models.CharField(max_length=32)
    employmentstatus = models.CharField(max_length=32)
    rank = models.CharField(max_length=128)
    originalassignment = models.DateField()

    class Meta:
        managed = False
        db_table = 'employees'


class Transactions(models.Model):
    id = models.BigAutoField(unique=True)
    transactionnumber = models.CharField(primary_key=True, max_length=32)
    employeenumber = models.ForeignKey(Employees, models.DO_NOTHING, db_column='employeenumber')
    applicationdate = models.DateField()
    leavetype = models.CharField(max_length=32)
    leavedetails = models.CharField(max_length=32)
    leavestatus = models.CharField(max_length=32)
    developmenttype = models.CharField(max_length=128)
    degreepursued = models.CharField(max_length=128)
    institution = models.CharField(max_length=128)
    location = models.CharField(max_length=128)
    country = models.CharField(max_length=128)
    sponsordonor = models.CharField(max_length=128)
    localabroad = models.CharField(max_length=16)
    startdate = models.DateField()
    enddate = models.DateField()
    duration = models.CharField(max_length=64)
    reportforduty = models.DateField()
    rso = models.CharField(max_length=64)
    rsostatus = models.CharField(max_length=32)

    class Meta:
        managed = False
        db_table = 'transactions'
