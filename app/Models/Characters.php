<?php
namespace App\Models;
use CodeIgniter\Model;
class Characters extends Model{
  protected $table = "characters";
  protected $primarkyKey = "id";
  protected $useAutoIncrement = true;
  protected $returnType = "array";
  protected $useSoftDeletes = true;
  protected $allowedFields = ['player_id','system_id','character_name'];
    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];  
}