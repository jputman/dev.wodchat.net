<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    public $data;
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        $this->helpers = array_merge($this->helpers, ['setting']);

        // Do Not Edit This Line
        parent::initController($request, $response, $logger);
        $this->site_config();
        $this->build_menu();
        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }
    protected function build_menu(){
        $menuModel = model('App\Models\Menu', false);
        $parentItems = $menuModel->where("parent_id",null)->findAll();
        $menuItems = array();
        foreach($parentItems as $parent){
          if($parent["permissions"] == null){
            $subItems = $menuModel->where("parent_id",$parent["menu_id"])->findAll();
            $parent["children"] = $subItems;
            array_push($menuItems,$parent); 
          }
        }
        $this->data["site_menu"] = view("/General/main_menu", ['menuItems' => $menuItems]);
      }
      protected function site_config(){
        $SiteConfigModel = model('App\Models\SiteConfig', false);
        $configItems = $SiteConfigModel->findAll();
        foreach($configItems as $item){
          $_SESSION[$item["item"]] = $item["value"];
        }
        session_write_close();
      }    
}
