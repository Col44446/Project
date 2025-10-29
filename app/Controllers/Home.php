<?php
namespace App\Controllers;

class Home extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $query = $this->db->query("SELECT id, name FROM sewadars ORDER BY id DESC");
        $data['sewadaars'] = $query->getResultArray();
        return view('home', $data);
    }

    public function add()
    {
        $name = $this->request->getPost('name');
        if ($name) {
            $this->db->query("INSERT INTO sewadars (name) VALUES (?)", [$name]);
        }
        return redirect()->to('/');
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM sewadars WHERE id = ?", [$id]);
        return redirect()->to('/');
    }
}
