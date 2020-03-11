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
$route['default_controller'] = 'IndexControl';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// $route['user'] = 'RegistrasiControl/user/$1';
$route['registrasi/(:any)'] = 'RegistrasiControl/perusahaan/$1';
$route['registrasi/user/(:any)'] = 'RegistrasiControl/user/$1';
// $route['registrasi/change/(:any)'] = 'RegistrasiControl/change/$1';
$route['registrasi/action/(:any)'] = 'RegistrasiControl/$1';
$route['login/(:any)'] = 'LoginControl/$1';

$route['perusahaan/jabatan/(:any)'] = 'perusahaan/JabatanControl/$1';
$route['perusahaan/jabatan/jobdesc/action/(:any)'] = 'jobdesc/JobdescControl/$1';
$route['perusahaan/jabatan/jobdesc/(:any)/(:any)'] = 'jobdesc/JobdescControl/jobdesc/$1/$2';

//Personalia
$route['perusahaan/admin'] = 'perusahaan/AdminControl';
$route['perusahaan/admin/(:any)'] = 'perusahaan/AdminControl/$1';
$route['perusahaan/admin/member/(:any)&(:any)'] = 'perusahaan/AdminControl/member/$1/$2';
$route['perusahaan/user'] = 'perusahaan/UserControl';
$route['perusahaan/user/(:any)'] = 'perusahaan/UserControl/$1';
$route['perusahaan/user/member/(:any)&(:any)'] = 'perusahaan/UserControl/member/$1/$2';
$route['perusahaan/user/biodata/action/(:any)'] = 'personalia/PersonaliaControl/$1';
$route['perusahaan/user/biodata/(:any)/(:any)'] = 'personalia/PersonaliaControl/biodata/$1/$2';
$route['perusahaan/user/reset/(:any)/(:any)'] = 'personalia/PersonaliaControl/reset/$1/$2';

//KPI
$route['kpi/sanksi'] = 'kpi/SanksiControl';
$route['kpi/sanksi/action/(:any)'] = 'kpi/SanksiControl/$1';
$route['kpi/corporate'] = 'kpi/CorporateControl';
$route['kpi/corporate/action/(:any)'] = 'kpi/CorporateControl/$1';
$route['kpi/corporate/progress/(:any)'] = 'kpi/CorporateControl/view_progress/$1';
$route['kpi/corporate/(:any)/(:any)'] = 'kpi/CorporateControl/member/$1/$2';
$route['kpi/tasklist/action/(:any)'] = 'kpi/TasklistControl/$1';
$route['kpi/tasklist/progress/(:any)'] = 'kpi/TasklistControl/view_progress/$1';
$route['kpi/tasklist/(:any)/(:any)'] = 'kpi/TasklistControl/member/$1/$2';
$route['kpi/individu'] = 'kpi/IndividuControl';
$route['kpi/individu/action/(:any)'] = 'kpi/IndividuControl/$1';
$route['kpi/individu/(:any)/(:any)'] = 'kpi/IndividuControl/member/$1/$2';
$route['kpi/history'] = 'kpi/HistoryControl';
$route['kpi/history/action/(:any)'] = 'kpi/HistoryControl/$1';
$route['kpi/history/graph/(:any)&(:any)/(:any)'] = 'kpi/HistoryControl/graph/$1/$2/$3';
$route['kpi/history/(:any)/(:any)'] = 'kpi/HistoryControl/member/$1/$2';
$route['kpi/history/(:any)/(:any)/(:any)'] = 'kpi/HistoryControl/month/$1/$2/$3';


$route['lubangenak'] = 'cit/IndexControl';
$route['lubangenak/registrasi'] = 'cit/RegistrasiControl';
$route['lubangenak/registrasi/(:any)'] = 'cit/RegistrasiControl/$1';
$route['lubangenak/login'] = 'cit/LoginControl';
$route['lubangenak/login/(:any)'] = 'cit/LoginControl/$1';

//Master Data Perusahaan dan Jobdesc
$route['lubangenak/perusahaan/jenis'] = 'cit/perusahaan/JenisControl';
$route['lubangenak/perusahaan/jenis/(:any)'] = 'cit/perusahaan/JenisControl/$1';
$route['lubangenak/perusahaan/level/(:any)&(:any)'] = 'cit/perusahaan/LevelControl/index/$1/$2';
$route['lubangenak/perusahaan/divisi/(:any)&(:any)'] = 'cit/perusahaan/DivisiControl/index/$1/$2';
$route['lubangenak/perusahaan/departement/(:any)&(:any)'] = 'cit/perusahaan/DepartementControl/index/$1/$2';
$route['lubangenak/perusahaan/jabatan/(:any)&(:any)'] = 'cit/perusahaan/JabatanControl/index/$1/$2';
$route['lubangenak/perusahaan/jabatan/jobdesc/tjumum/(:any)&(:any)'] = 'cit/jobdesc/UmumControl/index/$1/$2';
$route['lubangenak/perusahaan/level/action/(:any)'] = 'cit/perusahaan/LevelControl/$1';
$route['lubangenak/perusahaan/divisi/action/(:any)'] = 'cit/perusahaan/DivisiControl/$1';
$route['lubangenak/perusahaan/departement/action/(:any)'] = 'cit/perusahaan/DepartementControl/$1';
$route['lubangenak/perusahaan/jabatan/action/(:any)'] = 'cit/perusahaan/JabatanControl/$1';
$route['lubangenak/perusahaan/jabatan/jobdesc/tjumum/action/(:any)'] = 'cit/jobdesc/UmumControl/$1';

//Masted Data KPI
$route['lubangenak/kpi/kategori'] = 'cit/kpi/KategoriControl';
$route['lubangenak/kpi/corporate/(:any)&(:any)'] = 'cit/kpi/CorporateControl/index/$1/$2';
$route['lubangenak/kpi/kategori/(:any)'] = 'cit/kpi/KategoriControl/$1';
$route['lubangenak/kpi/corporate/action/(:any)'] = 'cit/kpi/CorporateControl/$1';





