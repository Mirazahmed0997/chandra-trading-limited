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




// --------------------Admin dashboard-------------------------

$route['admin_dashboard'] = 'Admin/index';
$route['members_list'] = 'Admin/members_list';
$route['view_profile'] = 'Admin/view_profile';
$route['view_member/(:num)'] = 'Admin/view_member/$1';
$route['delete_member/(:num)'] = 'Admin/delete_member/$1';
$route['members_account_details_admin'] = 'Admin/members_account';


// $route['calculator'] = 'Admin/calculator';





// --------------for user home page view ----------------------

$route['view_all_news'] = 'View_content_controller/view_news';
$route['company_details'] = 'View_content_controller/details_description';
$route['news_details/(:num)'] = 'View_content_controller/news_details/$1';
$route['notice_details/(:num)'] = 'View_content_controller/notice_details/$1';
$route['management_details/(:num)'] = 'View_content_controller/management_details/$1';
$route['all_managment'] = 'View_content_controller/all_managment';
$route['all_products'] = 'Site/admin_registration_form';
$route['our_mission'] = 'Site/our_mission';
$route['our_managment'] = 'Site/our_managment';
$route['contact_us'] = 'Site/contact_us';
$route['our_vission'] = 'Site/our_vission';
$route['our_concern'] = 'Site/our_concern';
$route['showcase'] = 'Site/showcase';
$route['properties'] = 'Site/properties';



$route['checkout'] = 'Site/checkout';






// -----------------------News managment------------------------

// -----------------------news for Admin view---------------
$route['news_list'] = 'News_notice_management/news_list';
$route['update_news_status/(:num)'] = 'News_notice_management/news_active_status/$1';
$route['delete_news/(:num)'] = 'News_notice_management/delete_news/$1';

// -----------------------notice for Admin view---------------

$route['notice_list'] = 'News_notice_management/notice_list';
$route['update_notice_status/(:num)'] = 'News_notice_management/notice_active_status/$1';
$route['delete_notice/(:num)'] = 'News_notice_management/delete_notice/$1';


// ---------------------Slider managment----------------------


$route['slider_list'] = 'Home_Page_managment_controller/slider_list';
$route['update_slider_status/(:num)'] = 'Home_Page_managment_controller/slider_active_status/$1';
$route['delete_slider/(:num)'] = 'Home_Page_managment_controller/delete_slider/$1';

// -----------------------------managment list-----------------------

$route['managment_list'] = 'Home_Page_managment_controller/managment_list'; 
 $route['delete_info/(:num)'] = 'Home_Page_managment_controller/delete_info/$1';



// --------------------------banner list----------------------------
$route['banner_list'] = 'Home_Page_managment_controller/banner_list';
// $route['update_banner/(:num)'] = 'home_Page_managment_controller/banner_list/$1';
$route['delete_banner/(:num)'] = 'Home_Page_managment_controller/delete_banner/$1';



// -----------------achievements_list------------------
$route['achievements_list'] = 'Home_Page_managment_controller/achievements_list';
$route['delete_achievement/(:num)'] = 'Home_Page_managment_controller/delete_achievement/$1';
$route['achievement_active_status/(:num)'] = 'Home_Page_managment_controller/achievement_active_status/$1';


// ------------------------gallary list----------------------------

$route['image_gallery_list'] = 'Gallary_controller/image_gallery_list';
$route['all_images'] = 'Gallary_controller/all_images';
$route['image_active_status/(:num)'] = 'Gallary_controller/image_active_status/$1';
$route['delete_image/(:num)'] = 'Gallary_controller/delete_image/$1';


// --------------------------------------------------
$route['ica_member'] = 'View_content_controller/ica/$1';




// -------------------------Cart---------------------------------
$route['add_to_cart/(:num)'] = 'Cart_controller/add/$1';
$route['update_cart_quantity/(:num)'] = 'Cart_controller/update_cart_quantity/$1';
$route['remove_cart_item/(:num)'] = 'Cart_controller/remove_cart_item/$1';
$route['clear_cart'] = 'Cart_controller/clear_cart';
$route['my_carts'] = 'Cart_controller/my_carts';


// ------------------- order  ------------------
$route['place_order'] = 'Order_controller/place_order';

$route['payment_success/(:num)'] = 'Payment_controller/success/$1';
$route['payment_failed/(:num)'] = 'Payment_controller/fail/$1';
$route['payment_cancelled/(:num)'] = 'Payment_controller/cancel/$1';


// -----------------------------Admin projects list------------------------
$route['projects_list'] = 'Home_Page_managment_controller/projects_list';
$route['delete_project/(:num)'] = 'Home_Page_managment_controller/delete_project/$1';
$route['projects_active_status/(:num)'] = 'Home_Page_managment_controller/projects_active_status/$1';
$route['project_details/(:num)'] = 'View_content_controller/project_details/$1';


$route['admin_orders_table'] = 'Admin/admin_orders_table';
$route['admin_order_details/(:num)'] = 'Admin/order_details/$1';
$route['order_status/(:num)'] = 'Admin/order_status/$1';








// --------------------Member Registration----------------------


$route['member_registration'] = 'Site/member_application';
$route['member_register'] = 'Site/member_application_save';
$route['member_login'] = 'Member_login/index';
$route['members_login'] = 'Member_login/login_process';
$route['member_logout'] = 'Member_login/logout';

$route['member_logout'] = 'Member_login/logout';





// --------------------Member dashboard----------------------

$route['applicant_dashboard'] = 'Applicant/members_count';
$route['members'] = 'Applicant/members_list';
$route['single_member/(:num)'] = 'Applicant/view_member/$1';
$route['edit_member/(:num)'] = 'Applicant/edit_member/$1';
// $route['delete_member/(:num)'] = 'Applicant/delete_member/$1';
$route['members_account_details'] = 'Applicant/members_account';
$route['update_member/(:num)'] = 'Site/update_member/$1';


$route['my_orders'] = 'Applicant/my_orders';
$route['order_details/(:num)'] = 'Applicant/order_details/$1';


// ---------------------products managment details-------------------

$route['create_category_form'] = 'Products_controller/create_category_form';
$route['create_category'] = 'Products_controller/create_category';
$route['category_list'] = 'Products_controller/category_list';
$route['product_create_form'] = 'Products_controller/create_product_form';
$route['create_product'] = 'Products_controller/create_product';
$route['product_list'] = 'Products_controller/product_list';
$route['product_edit_form/(:num)'] = 'Products_controller/edit_product/$1';
$route['update_product/(:num)'] = 'Products_controller/update_product/$1';
$route['delete_product/(:num)'] = 'Products_controller/delete_product/$1';
$route['product_active_status/(:num)'] = 'Products_controller/product_active_status/$1';
$route['update_product_images/(:num)'] = 'Products_controller/update_product_images/$1';




// -----------------------permissions------------------

$route['permisssions'] = 'Permisions_controller/permissions_list';
$route['daily_installment_list'] = 'Permisions_controller/daily_installment_list';
// $route['installment_amount_table'] = 'Permisions_controller/permissions_list';
$route['permisssions_form'] = 'Permisions_controller/permisssions_form';
$route['edit_permission/(:num)'] = 'Permisions_controller/edit_permission/$1';
$route['permission_details/(:num)'] = 'Permisions_controller/permission_details/$1';
$route['delete_permission/(:num)'] = 'Permisions_controller/delete_permission/$1';


// ------------------------Due List------------------------

$route['due_list'] = 'Permisions_controller/due_list';
// $route['due_list_details'] = 'Permisions_controller/due_list_details';


