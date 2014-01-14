<?php
/* globals */
define('VERSION', 'v1.3'); // poi export version

/**
 * Setup gettext translations
 */
function i18n() {
	// Set language
	$locale = \Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE']);
	if(!is_dir(__DIR__ . '/../locale/' . $locale)){
		$locale = 'en_US';
	}

	\Locale::setDefault($locale);
	putenv('LC_ALL=' . $locale);
	setlocale(LC_ALL, $locale);
	bindtextdomain('default', __DIR__ . '/../locale');
}
