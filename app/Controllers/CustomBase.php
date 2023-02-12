<?php
namespace App\Controllers;
class CustomBase extends BaseController
{
  public $data;
  
  public function __construct(){
    
    $this->site_config();
    $this->build_menu();
  }
  protected function build_menu(){
    $menuModel = model('App\Models\Menu', false);
    $parentItems = $menuModel->where("parent_id",null)->findAll();
    $menuItems = array();
    foreach($parentItems as $parent){
      $subItems = $menuModel->where("parent_id",$parent["menu_id"])->findAll();
      $parent["children"] = $subItems;
      array_push($menuItems,$parent);
    }
    $this->data["site_menu"] = view("/General/main_menu", ['menuItems' => $menuItems]);
  }
  protected function site_config(){
    $session = session();
    $SiteConfigModel = model('App\Models\SiteConfig', false);
    $configItems = $SiteConfigModel->findAll();
    foreach($configItems as $item){
      $session->set($item["item"], $item["value"]);
    }
    session_write_close();
  }
}