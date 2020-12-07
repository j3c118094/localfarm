<?php namespace App\Models;

use CodeIgniter\Model;

class Artikel_Model extends Model {
    protected $table      = 'resep';
    protected $primaryKey = 'id';

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id', 'judul', 'thumbnail', 'konten', 'author', 'created_at'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}