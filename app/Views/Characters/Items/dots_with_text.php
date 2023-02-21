<?php
  $key = array_search($field["id"], array_column($stats, 'field_id'));
  $value = null;
  if(!$field["defaultValue"]){
    $field["defaultValue"] = 0;
  }
  $dots = $field["defaultValue"];
?>
<td>
  <?=$field["displayValue"];?>
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