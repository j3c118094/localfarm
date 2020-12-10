<?php namespace App\Models;

use CodeIgniter\Model;

class Response_Model extends Model {
    protected $table      = 'response';
    protected $primaryKey = 'responseid';

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['responseid', 'responses', 'submitted_at', 'visitor_ip'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}