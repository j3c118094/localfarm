<?php namespace App\Models;

use CodeIgniter\Model;

class Admin_Model extends Model {
    protected $table      = 'admin';
    protected $primaryKey = 'username';

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['username', 'nama', 'password'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}