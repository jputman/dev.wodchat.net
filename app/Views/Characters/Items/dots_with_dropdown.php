<?php
  $key = array_search($field["id"], array_column($stats, 'field_id'));
  $value = null;
  if(!$field["defaultValue"]){
    $field["defaultValue"] = 0;
  }
  $dots = $field["defaultValue"];
  $selected_value = null;
  $dropdown_id = $field["dropdown_id"];
?>
<td>
  <select class="form-select" aria-label="Default select example">
    <option selected disabled value="">Select <?=$field["displayValue"];?></option>
    <?php foreach ($dropdowns[$dropdown_id] as $obj): ?>
      <?php
      $selected = "";
      if($obj["id"] == $selected_value){
        $selected = " selected";
      }
      ?>
      <option value="<?=$obj["id"];?>"<?=$selected;?>><?=$obj["value"];?></option>      
    <?php endforeach ?>
  </select>
</td>
<td>
  <?php
  for($i = 1; $i <= $dots; $i++){
    ?>
    <img src="/images/dot.gif" height="20"/>
    <?php
  }
  for($i = ($dots + 1); $i <= $field["dots"]; $i++){
    ?>
    <img src="/images/blank.gif" height="20"/>
    <?php    
  }
  ?>
</td>