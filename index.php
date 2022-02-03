<?php
error_reporting(E_ALL); // Error/Exception engine, always use E_ALL

ini_set('ignore_repeated_errors', TRUE); // always use TRUE

ini_set('display_errors', FALSE); // Error/Exception display, use FALSE only in production environment or real server. Use TRUE in development environment

ini_set('log_errors', TRUE); // Error/Exception file logging engine.
ini_set('error_log', 'error_log.txt'); // Logging file path
/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */
 
$current_dir_path = getcwd();
$iterator =new DirectoryIterator(($current_dir_path));

foreach($iterator as $fileInfo) {
	if($fileInfo->isDot() || $fileInfo == 'js' || $fileInfo == 'css' || $fileInfo == '.idea' || $fileInfo == '.git') continue;
    if($fileInfo->isDir()) {
	    $dir_project = $fileInfo;
		break;
    }
}

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test a Laravel
// application without having installed a "real" web server software here.
if ($uri !== '/' && file_exists(__DIR__.'/'.$dir_project.'/public'.$uri)) {
    return false;
}

require_once __DIR__.'/'.$dir_project.'/public/index.php';
