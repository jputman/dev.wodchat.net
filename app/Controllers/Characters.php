<?php
namespace App\Controllers;
class Characters extends BaseController
{
  public function index()
  {
    // Display character control panel.
    return view('Characters/index',$this->data);
  }
  public function New(){
    // Get list of available systems.
    $systems = (model('App\Models\Systems', false))->findAll();
    $this->data["systems"] = $systems;
    // View the form to get the base character name and system for the new character.
    return view('Characters/new',$this->data);
  }
  public function Create(){
    // Init the request string
    $request = \Config\Services::request();
    // Init the model for the characters database table
    $characters = (model('App\Models\Characters', false));
    // Data to be used to create basic character sheet
    $data = [
      "player_id"      => auth()->id(),
      "system_id"      => $request->getPost("system",FILTER_SANITIZE_FULL_SPECIAL_CHARS),
      "character_name" => $request->getPost("character_name",FILTER_SANITIZE_FULL_SPECIAL_CHARS)
    ];
    // Try to create a character in the database, and provide error message if already exists.
    // If valid, forward to the view which also allows edit by any when pending, or based on 
    // permission after it is no longer pending.
    try {
      $characters->insert($data);
      return redirect()->to('/Characters/View/' . $characters->getInsertID());
    }
    catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
      $this->data["ErrorMessage"] = "The character name " . $data["character_name"] . " already exists.";
      if (str_contains($e->getMessage(), 'Duplicate entry')) {
        return view('errors/duplicate_character',$this->data);
      }
    }
  }
  public function View($id){
    // Load the character based on ID passed.
    $character = (model('App\Models\Characters', false))->where("id",$id)->find()[0];
    // Check to make sure that the user either owns the character or if not, that the user
    // has the appropriate permissions to view all characters. 
    if(auth()->id() != $character["player_id"] && !auth()->user()->can('character.view-all')){
      $this->data["ErrorMessage"] = "You do not have access to this character.";
      return view('errors/access_denied',$this->data);
    }
    // Load the character stats from the database.
    $stats = (model('App\Models\CharacterStats', false))->where("id",$character["id"])->findAll();
    // Get the list of dropdowns in the database.
    $dropdowns = (model('App\Models\Dropdowns', false))->findAll();
    // Get the values of each dropdown and populate it into an array to be used in the display.
    $dropdownValues = array();
    foreach($dropdowns as $dropdown){
      $values = (model('App\Models\DropdownValues', false))->where("dropdown_id",$dropdown["id"])->findAll();
      $dropdownValues[$dropdown["id"]] = $values;
    }
    // Get the type of items that might be used on he sheet
    $sheetItems = (model('App\Models\SheetItems', false))->findAll();
    // Get he lines of the sheet so that we can display the sheet.
    $sheet = (model('App\Models\Sheets', false))->where("system_id",$character["system_id"])
                                                ->orWhere("system_id",null)
                                                ->orderBy('line', 'asc')
                                                ->orderBy('sort', 'asc')
                                                ->findAll();
    // Load the appropriate data in the object that we pass to the views.
    $this->data["sheetItems"] = $sheetItems;
    $this->data["sheet"] = $sheet;
    $this->data["character"] = $character;
    $this->data["stats"] = $stats;
    $this->data["dropdowns"] = $dropdownValues;
    // Display the sheet.
    return view('Characters/sheet',$this->data);
  }
}


//$request->getVar('some_data', FILTER_SANITIZE_FULL_SPECIAL_CHARS);