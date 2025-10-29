<?php

namespace App\Controllers;

use App\Models\SewadarModel;
use GroceryCrud\Core\GroceryCrud;

class SewadarController extends BaseController
{
    public function index()
    {
        return view('sewadar/index');
    }

    public function manage()
    {
        $crud = $this->_getGroceryCrudEnterprise();

        $crud->setTable('sewadars');
        $crud->setSubject('Sewadar', 'Sewadars');
        $crud->columns(['id', 'name', 'created_at']);
        $crud->fields(['name']);
        $crud->displayAs('created_at', 'Created At');
        $crud->requiredFields(['name']);
        $crud->setRule('name', 'required');
        $crud->setRule('name', 'minLength', 2);
        $crud->setRule('name', 'maxLength', 255);
        
        $output = $crud->render();

        if ($output->isJSONResponse) {
            return $this->response->setJSON($output->output);
        }

        return $this->_showOutput($output);
    }

    private function _getGroceryCrudEnterprise()
    {
        $db = \Config\Database::connect();
        $config = config('GroceryCrud');
        return new GroceryCrud($config, $db);
    }

    private function _showOutput($output)
    {
        return view('sewadar/manage', [
            'css_files' => $output->css_files,
            'js_files'  => $output->js_files,
            'output'    => $output->output
        ]);
    }
}
