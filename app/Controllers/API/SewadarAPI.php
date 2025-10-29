<?php

namespace App\Controllers\API;

use App\Models\SewadarModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class SewadarAPI extends ResourceController
{
    use ResponseTrait;

    protected $modelName = 'App\Models\SewadarModel';
    protected $format    = 'json';

    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
        
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            exit(0);
        }
    }

    public function index()
    {
        try {
            $model = new SewadarModel();
            return $this->respond($model->getAllSewadars(), 200);
        } catch (\Exception $e) {
            return $this->failServerError('Failed to fetch sewadars: ' . $e->getMessage());
        }
    }

    public function show($id = null)
    {
        try {
            $model = new SewadarModel();
            $sewadar = $model->getSewadar($id);
            
            if (!$sewadar) {
                return $this->failNotFound('Sewadar not found');
            }
            
            return $this->respond($sewadar, 200);
        } catch (\Exception $e) {
            return $this->failServerError('Failed to fetch sewadar: ' . $e->getMessage());
        }
    }

    public function create()
    {
        try {
            $model = new SewadarModel();
            $data = ['name' => $this->request->getVar('name')];
            
            if (!$model->validate($data)) {
                return $this->fail($model->errors(), 400);
            }
            
            $id = $model->createSewadar($data);
            
            if ($id) {
                return $this->respondCreated(['message' => 'Sewadar added successfully', 'id' => $id]);
            }
            
            return $this->failServerError('Failed to create sewadar');
        } catch (\Exception $e) {
            return $this->failServerError('Failed to create sewadar: ' . $e->getMessage());
        }
    }

    public function update($id = null)
    {
        try {
            $model = new SewadarModel();
            
            if (!$model->getSewadar($id)) {
                return $this->failNotFound('Sewadar not found');
            }
            
            $data = ['name' => $this->request->getVar('name')];
            
            if (!$model->validate($data)) {
                return $this->fail($model->errors(), 400);
            }
            
            if ($model->updateSewadar($id, $data)) {
                return $this->respond(['message' => 'Sewadar updated successfully']);
            }
            
            return $this->failServerError('Failed to update sewadar');
        } catch (\Exception $e) {
            return $this->failServerError('Failed to update sewadar: ' . $e->getMessage());
        }
    }

    public function delete($id = null)
    {
        try {
            $model = new SewadarModel();
            
            if (!$model->getSewadar($id)) {
                return $this->failNotFound('Sewadar not found');
            }
            
            if ($model->deleteSewadar($id)) {
                return $this->respondDeleted(['message' => 'Sewadar deleted successfully']);
            }
            
            return $this->failServerError('Failed to delete sewadar');
        } catch (\Exception $e) {
            return $this->failServerError('Failed to delete sewadar: ' . $e->getMessage());
        }
    }
}
