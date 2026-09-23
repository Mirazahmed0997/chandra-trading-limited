<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Site/index';
$route['home'] = 'Site/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;





// --------------------Admin Registration----------------------

$route['admin'] = 'Admin_login/index';
$route['admin_registration_form'] = 'Admin/admin_registration';
$route['admin_registration'] = 'Admin/admin_registration_saved';
$route['update_users_role/(:num)'] = 'Admin/update_users_role/$1';
$route['change_password'] = 'Admin/change_password';
$route['menu_access/(:num)'] = 'Admin/menu_access/$1';


$route['logout'] = 'Admin_login/logout';
$route['forget_password'] = 'Admin_login/reset_email_form';
$route['send_reset_link'] = 'Admin_login/send_reset_link';
$route['reset_password/(:any)'] = 'Admin_login/reset_password/$1';
$route['update_new_password'] = 'Admin_login/update_new_password';


// Properties managment
$route['add_properties'] = 'Admin_properties/add_properties';
$route['create_properties'] = 'Admin_properties/create_properties';
$route['properties_list'] = 'Admin_properties/properties_list';
$route['properties_details/(:num)'] = 'Admin_properties/properties_details/$1';
$route['update_properties_form/(:num)'] = 'Admin_properties/update_properties_form/$1';
$route['update_properties/(:num)'] = 'Admin_properties/update_properties/$1';
$route['delete_property/(:num)'] = 'Admin_properties/delete_property/$1';




// --------------------Admin dashboard-------------------------

$route['admin_dashboard'] = 'Admin/index';
$route['members_list'] = 'Admin/members_list';
$route['view_profile'] = 'Admin/view_profile';
$route['view_member/(:num)'] = 'Admin/view_member/$1';
$route['delete_member/(:num)'] = 'Admin/delete_member/$1';
$route['members_account_details_admin'] = 'Admin/members_account';

// leads
$route['landowners_query'] = 'Admin_landowner_controller/landowners_query';
$route['landowners_query_details/(:num)'] = 'Admin_landowner_controller/landowners_query_details/$1';
$route['update_land_query_status/(:num)'] = 'Admin_landowner_controller/update_land_query_status/$1';
$route['delete_land_query/(:num)'] = 'Admin_landowner_controller/delete_land_query/$1';


$route['contact_messages'] = 'Admin_landowner_controller/contact_messages';
$route['contact_messages_details/(:num)'] = 'Admin_landowner_controller/contact_messages_details/$1';
$route['delete_contact_message/(:num)'] = 'Admin_landowner_controller/delete_contact_message/$1';





// --------------------User Registration----------------------


$route['user_registration_form'] = 'User_controllers/user_registration_form';
$route['user_registration_save'] = 'User_controllers/user_registration_save';
$route['user_login_form'] = 'User_controllers/user_login_form';
$route['user_login_process'] = 'User_controllers/user_login_process';
$route['user_logout'] = 'User_controllers/user_logout';

$route['user_forget_password'] = 'User_controllers/user_reset_email_form';
$route['user_send_reset_link'] = 'User_controllers/user_send_reset_link';
$route['user_reset_password/(:any)'] = 'User_controllers/user_reset_password/$1';
$route['user_update_new_password'] = 'User_controllers/user_update_new_password';



// --------------------User Dashboard----------------------
$route['User_dashboard'] = 'User_dashboard/index';
$route['deposit_vouchar'] = 'User_dashboard/deposit_vouchar';
$route['cost_vouchar'] = 'User_dashboard/cost_vouchar';


// --------------User Leads create form----------------------
$route['landowners_query_create'] = 'Leads_controller/landowners_query_create';
$route['contact_messages_create'] = 'Leads_controller/contact_messages_create';
$route['properties'] = 'User_controllers/properties';






// --------------for user home page view ----------------------

$route['properties_details_view/(:num)'] = 'User_controllers/properties_details_view/$1';






$route['view_all_news'] = 'View_content_controller/view_news';
$route['our_mission'] = 'Site/our_mission';
$route['our_managment'] = 'Site/our_managment';
$route['contact_us'] = 'Site/contact_us';
$route['our_vission'] = 'Site/our_vission';
$route['our_concern'] = 'Site/our_concern';
$route['showcase'] = 'Site/showcase';
$route['properties'] = 'Site/properties';






$route['checkout'] = 'Site/checkout';
// -----------------------news for Admin view---------------
$route['news_list'] = 'News_notice_management/news_list';
$route['update_news_status/(:num)'] = 'News_notice_management/news_active_status/$1';
$route['delete_news/(:num)'] = 'News_notice_management/delete_news/$1';



// ------------------------gallary list----------------------------

$route['image_gallery_list'] = 'Gallary_controller/image_gallery_list';
$route['all_images'] = 'Gallary_controller/all_images';
$route['image_active_status/(:num)'] = 'Gallary_controller/image_active_status/$1';
$route['delete_image/(:num)'] = 'Gallary_controller/delete_image/$1';


