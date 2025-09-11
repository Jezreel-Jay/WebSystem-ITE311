#!/usr/bin/env php
<?php
// Only allow CLI
if (php_sapi_name() !== 'cli') {
    exit("This script can only be run from CLI.\n");
}

// Load CodeIgniter core
define('ENVIRONMENT', 'development');
$system_path = 'system';
$application_folder = 'application';

// Resolve paths
$system_path = str_replace('\\', '/', $system_path);
if (realpath($system_path) !== FALSE) {
    $system_path = realpath($system_path).'/';
}
$application_folder = rtrim($application_folder, '/');

// Bootstrap CodeIgniter
define('BASEPATH', str_replace("\\", "/", $system_path));
define('APPPATH', $application_folder.'/');
define('VIEWPATH', APPPATH.'views/');

// Load framework
require_once BASEPATH.'core/CodeIgniter.php';

// Load migration library
$CI =& get_instance();
$CI->load->library('migration');

// Parse command
$command = $argv[1] ?? null;
$param   = $argv[2] ?? null;

switch ($command) {
    case 'migrate':
        if ($param === null) {
            $result = $CI->migration->latest();
        } else {
            $result = $CI->migration->version((int)$param);
        }

        if ($result === FALSE) {
            echo "Migration failed: ".$CI->migration->error_string()."\n";
        }
        break;

    default:
        echo "Unknown command: {$command}\n";
        echo "Usage:\n";
        echo "  php spark.php migrate          Run latest migration\n";
        echo "  php spark.php migrate 5        Migrate to version 5\n";
        break;
}

