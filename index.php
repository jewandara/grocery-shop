<?php

require_once(dirname(__FILE__).'/core/config.php');
if(isUserLoggedIn()) { 
	require_once($_FOLDER.'web/content/private.header.php');
	require_once($_FOLDER.'web/content/private.navigation.php'); 
	switch ($_URL[$_PATH_ARRY_COUNT]) {
		case '': require_once($_FOLDER.'web/user/dashboard.php'); break;
		case 'index': require_once($_FOLDER.'web/user/dashboard.php'); break;
		case 'dashboard': require_once($_FOLDER.'web/user/dashboard.php'); break;
		case 'account': require_once($_FOLDER.'web/user/dashboard.php'); break;
		case 'home': require_once($_FOLDER.'web/user/dashboard.php'); break;
		case 'order': require_once($_FOLDER.'web/user/orders.php'); break;
		case 'orders': require_once($_FOLDER.'web/user/orders.php'); break;
		case 'item': require_once($_FOLDER.'web/user/items.php'); break;
		case 'items': require_once($_FOLDER.'web/user/items.php'); break;
		case 'customer': require_once($_FOLDER.'web/user/customers.php'); break;
		case 'customers': require_once($_FOLDER.'web/user/customers.php'); break;
		case 'setting': require_once($_FOLDER.'web/user/settings.php'); break;
		case 'settings': require_once($_FOLDER.'web/user/settings.php'); break;
		case 'user': require_once($_FOLDER.'web/manager/users.php'); break;
		case 'users': require_once($_FOLDER.'web/manager/users.php'); break;
		case 'report': require_once($_FOLDER.'web/manager/reports.php'); break;
		case 'reports': require_once($_FOLDER.'web/manager/reports.php'); break;
		case 'permission': require_once($_FOLDER.'web/admin/permissions.php'); break;
		case 'permissions': require_once($_FOLDER.'web/admin/permissions.php'); break;
		case 'page': require_once($_FOLDER.'web/admin/pages.php'); break;
		case 'pages': require_once($_FOLDER.'web/admin/pages.php'); break;
		case 'configuration': require_once($_FOLDER.'web/admin/configurations.php'); break;
		case 'configurations': require_once($_FOLDER.'web/admin/configurations.php'); break;
		case 'logout': break;
		default: require_once($_FOLDER.'web/404.php'); break;
	}
	require_once($_FOLDER.'web/content/private.footer.php');
}
else {
	require_once($_FOLDER.'web/content/public.header.php'); 
	require_once($_FOLDER.'web/content/public.navigation.php'); 
	switch ($_URL[$_PATH_ARRY_COUNT]) {
		case '': require_once($_FOLDER.'web/login.php'); break;
		case 'login': require_once($_FOLDER.'web/login.php'); break;
		//case 'register': require_once($_FOLDER.'web/register.php'); break;
		case 'forgot_password': require_once($_FOLDER.'web/forgot_password.php'); break;
		case 'reset_password': require_once($_FOLDER.'web/reset_password.php'); break;
		case 'resend_activation': require_once($_FOLDER.'web/resend_activation.php'); break;
		case 'activate_account': require_once($_FOLDER.'web/activate_account.php'); break;
		default: require_once($_FOLDER.'web/404.php'); break;
	}
	require_once($_FOLDER.'web/content/public.footer.php');
}


?>