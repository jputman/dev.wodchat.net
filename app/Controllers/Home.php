<?php
namespace App\Controllers;
class Home extends CustomBase
{
  public function index()
  {
    return view('Home/index',$this->data);
  }
}
