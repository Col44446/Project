<?php
define('ENVIRONMENT', 'development');
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);
chdir(FCPATH);
require FCPATH . '../app/Config/Paths.php';
$paths = new Config\Paths();
define('APPPATH', realpath($paths->appDirectory) . DIRECTORY_SEPARATOR);
define('ROOTPATH', realpath(FCPATH . '../') . DIRECTORY_SEPARATOR);
define('SYSTEMPATH', realpath($paths->systemDirectory) . DIRECTORY_SEPARATOR);
define('WRITEPATH', realpath($paths->writableDirectory) . DIRECTORY_SEPARATOR);
require ROOTPATH . 'vendor/autoload.php';
require SYSTEMPATH . 'bootstrap.php';
$app = Config\Services::codeigniter();
$app->initialize();
$app->setContext(is_cli() ? 'php-cli' : 'web');
$app->run();
