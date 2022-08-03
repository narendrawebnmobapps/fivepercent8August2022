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
/**********************************
Front End Urls Start
****************************************/
$route['default_controller'] = 'welcome/welcome';
$route['portforlio'] = 'welcome/welcome/portfolio';
$route['brokers'] = 'welcome/welcome/brokers';
$route['trading-diary'] = 'welcome/welcome/trading_diary';
$route['money-management'] = 'welcome/welcome/money_management';
$route['learning'] = 'welcome/welcome/learning';
$route['faq'] = 'welcome/welcome/faq';
$route['result-attribution'] = 'welcome/welcome/result_attribution';
$route['contact-us'] = 'welcome/welcome/contact_us';
$route['about'] = 'welcome/welcome/about';
$route['services'] = 'welcome/welcome/services';
$route['case-studies'] = 'welcome/welcome/case_studies';
$route['blog'] = 'welcome/welcome/blog';
$route['signup'] = 'welcome/authentication/signup';
$route['signin'] = 'welcome/authentication/signin';
$route['forget-passord'] = 'welcome/authentication/forget_password';
$route['reset-password/(:any)/(:any)'] = 'welcome/authentication/reset_password/$1/$2';
$route['register-as-advisor'] = 'welcome/authentication/registerAsAdvisor';
/**********************************
Front End Urls End
****************************************/

/**********************************
Users  Urls Start
****************************************/
$route['user/signup'] = 'users/authentication/signup';
$route['user/signin'] = 'users/authentication/user_login';
$route['user/subscription-plan/(:any)/(:any)'] = 'users/authentication/subsription_plan/$1/$2';
$route['user/personelinfo/(:any)/(:any)'] = 'users/authentication/personelinfo/$1/$2';
$route['user/financial-situation/(:any)'] = 'users/authentication/financialsituation/$1';
$route['user/investment-objective/(:any)'] = 'users/authentication/investmentobjective/$1';
$route['user/knowledge-experience/(:any)'] = 'users/authentication/knowledgeExperience/$1';
$route['user/understanding-financial-commitment/(:any)'] = 'users/authentication/understandingFinancialcommitment/$1';
$route['user/dashboard'] = 'users/dashboard/index';
$route['user/risk-profile'] = 'users/profile/risk_profile';
$route['user/balance-sheet'] = 'users/profile/balance_sheet';
$route['user/client-profile'] = 'users/dashboard/client_profile';
$route['user/stock-portfolio'] = 'users/portfolio/stock_portfolio';
$route['user/investments-funds'] = 'users/portfolio/investment_funds';
$route['user/option-portfolio'] = 'users/portfolio/option_portfolio';
$route['user/fixed-portfolio'] = 'users/portfolio/fixed_portfolio';
$route['user/brokers'] = 'users/dashboard/brokers';
$route['user/trading-diary'] = 'users/tradingdiary/index';
$route['user/money-management'] = 'users/moneymanagement/index';
$route['user/result-attribution'] = 'users/moneymanagement/result_attribution';
$route['user/advisor'] = 'users/dashboard/advisor';
$route['user/advisor/(:any)'] = 'users/dashboard/advisor_details/$1';
$route['user/warning-alert-idea'] = 'users/dashboard/warning_alert_idea';


/**********************************
Users  Urls End
****************************************/
$route['advisor/client/(:any)'] = 'users/advisor/client_profile/$1';
$route['advisor/client_details/(:any)'] = 'users/advisor/client_details/$1';
/********************
ADVISOR URL START
***************************/

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
