<?php
  $disabled = null;
  if($field["player_editable"] == 0){
    $disabled = " disabled";
  }
  $dropdown_id = $field["dropdown_id"];
  $key = array_search($field["id"], array_column($stats, 'field_id'));
  if($key !== false){
    $selected_value = $stats[$key]["field_value"];
  }
  elseif($key === false && $field["defaultValue"]){
    $selected_value = $field["defaultValue"];
  }
  else{
    $selected_value = null;
  }
?>
<td>
  <?=$field["displayValue"];?>
</td>
<td>
  <select class="form-select" aria-label="Default select example"<?=$disabled;?>>
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