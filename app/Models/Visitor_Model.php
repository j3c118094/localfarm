<?php namespace App\Models;

use CodeIgniter\Model;

class Visitor_Model extends Model {
    protected $table      = 'visitor';
    protected $primaryKey = 'visitor_ip';

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['visitor_ip', 'kota', 'visited_at'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}