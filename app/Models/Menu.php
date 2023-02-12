<?php
namespace App\Models;
use CodeIgniter\Model;
class Menu extends Model{
  protected $table = "site_menu";
  protected $primarkyKey = "menu_id";
  protected $useAutoIncrement = true;
  protected $returnType = "array";
  protected $useSoftDeletes = true;
  protected $allowedFields = ['name', 'parent_id', 'uri', 'permissions', 'order_id'];
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