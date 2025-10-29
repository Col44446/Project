<?php

namespace App\Models;

use CodeIgniter\Model;

class SewadarModel extends Model
{
    protected $table            = 'sewadars';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules = [
        'name' => 'required|min_length[2]|max_length[255]'
    ];
    
    protected $validationMessages = [
        'name' => [
            'required'   => 'Sewadar name is required',
            'min_length' => 'Sewadar name must be at least 2 characters',
            'max_length' => 'Sewadar name cannot exceed 255 characters'
        ]
    ];
    
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
    protected $allowCallbacks       = true;

    public function getAllSewadars()
    {
        return $this->orderBy('created_at', 'DESC')->findAll();
    }

    public function getSewadar($id)
    {
        return $this->find($id);
    }

    public function createSewadar($data)
    {
        return $this->insert($data);
    }

    public function updateSewadar($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteSewadar($id)
    {
        return $this->delete($id);
    }
}
