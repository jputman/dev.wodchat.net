<?php
  $key = array_search($field["id"], array_column($stats, 'field_id'));
  $value = null;
  if($key){
    $value = $stats[$key]["field_value"];
  }
?>
<td>
  <?=$field["displayValue"];?>
</td>
<td>
  <input type="text" class="form-control" placeholder="<?=$field["displayValue"];?>" aria-label="<?=$field["displayValue"];?>" aria-describedby="basic-addon1" value="<?=$value;?>">
</td>