<?php
namespace App\Models;
use CodeIgniter\Model;
class Sheets extends Model{
  protected $table = "character_sheets";
  protected $primarkyKey = "id";
  protected $useAutoIncrement = true;
  protected $returnType = "array";
  protected $useSoftDeletes = true;
  protected $allowedFields = ['system_id','line','line_id','sort','name','displayValue','defaultVaule','dots','dropdown_id','player_hidden'];
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