<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
//$route['default_controller'] = 'welcome';
$route['default_controller'] = 'employee/landing_page';
$route['landingpage'] = 'employee/landing_page';
$route['evaluation'] = 'employee/evaluation_form';
$route['apply/studyleave'] = 'employee/study_leave';
$route['apply/doctoralstudies'] = 'employee/doctoral_studies';
$route['apply/sabbatical'] = 'employee/sabbatical';
$route['apply/specialdetail'] = 'employee/special_detail';
$route['apply/enrollmentprivileges'] = 'employee/enrollment_privileges';
$route['rsocalculator'] = 'employee/rso_calculator';
$route['contactus'] = 'contact_us/contact_us_page';

$route['admin'] = 'admin/ongoing_applications';
$route['admin/ongoingapps'] = 'admin/ongoing_applications';
$route['admin/ongoingapps/(:any)'] = 'admin/applications_list_individual/$1';
$route['admin/employeelist'] = 'admin/employee_list';
$route['admin/employeelist/(:any)'] = 'admin/employee_list_individual/$1';
$route['admin/transactionslist'] = 'admin/transactions_list';
$route['admin/transactionslist/(:any)'] = 'admin/transactions_list_individual/$1';
$route['admin/changepassword'] = 'admin_change_pass/change_password_page';
$route['admin/rsocalculator'] = 'admin/rso_calculator';

$route['admin/test'] = 'test/directory';
$route['admin/test/ongoingapplications'] = 'test/admin_edit_applications_test';
$route['admin/test/application'] = 'test/admin_add_application_test';
$route['admin/test/employeelist'] = 'test/admin_add_employee_test';
$route['admin/test/employee'] = 'test/admin_edit_employee_test';
$route['admin/test/transactionslist'] = 'test/admin_transactions_test';
$route['admin/test/transaction'] = 'test/admin_edit_transactions_test';
$route['admin/test/changepassword'] = 'test/admin_change_password_test';
$route['admin/test/selfevaluation'] = 'test/employee_evaluation_test';
$route['admin/test/rsocalculator'] = 'test/admin_rso_test';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
