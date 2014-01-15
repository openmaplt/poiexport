<?php
/* globals */
define('VERSION', 'v1.3'); // poi export version

/**
 * Setup gettext translations
 */
function i18n() {
	// Check if the language is set with the ?l=<2lettercode> GET parameter
	if(!empty($_GET['l'])){
		$_SESSION['locale'] = substr(trim(strip_tags($_GET['l'])), 0, 2);
	}
	
	if(empty($_SESSION['locale'])){
		// detect locale
		$locale = \Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE']);
		if(!is_dir(__DIR__ . '/../locale/' . $locale)){
			$locale = 'en_US';
		}
		$_SESSION['locale'] = $locale;
	}else{
		$locale = $_SESSION['locale'];
	}

	\Locale::setDefault($locale);
	setlocale(LC_ALL, 'C.UTF-8');
	// http://stackoverflow.com/questions/15541747/use-php-gettext-without-having-to-install-locales
	bindtextdomain('default', __DIR__ . '/../locale/' . $locale);
	bind_textdomain_codeset('default', 'UTF-8');
}
