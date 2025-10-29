<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class GroceryCrud extends BaseConfig
{
    public $licenseKey = '';
    public $assetsFolder = FCPATH . 'assets/grocery-crud';
    public $uploadPath = FCPATH . 'uploads';
    public $theme = 'flexigrid';
    public $language = 'english';
    public $textEditorType = 'ckeditor';
    public $environment = 'development';
}
