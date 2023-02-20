<?php
  $dropdown_id = $field["dropdown_id"];
  $key = array_search($field["id"], array_column($stats, 'field_id'));
  $selected_value = $stats[$key]["field_value"];
  if(!$selected_value && $field["defaultValue"]){
    $selected_value = $field["defaultValue"];
  }
  elseif(!$selected_value){
    $selected_value = null;
  }
?>
<td>
  <?=$field["displayValue"];?>
</td>
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