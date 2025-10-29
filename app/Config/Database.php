<?php
namespace Config;
use CodeIgniter\Database\Config;
class Database extends Config {
    public $defaultGroup = 'default';
    public $default = [
        'hostname' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'sewadar_db',
        'DBDriver' => 'MySQLi',
        'port' => 3306,
    ];
}
