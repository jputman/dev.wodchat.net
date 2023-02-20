<?php
  $field_name = str_replace(" ","_",strtolower($field["displayValue"]));
?>
<td>
  <?=$field["displayValue"];?>
</td>
<td>
  <input type="text" class="form-control" placeholder="<?=$field["displayValue"];?>" aria-label="<?=$field["displayValue"];?>" aria-describedby="basic-addon1" value="<?=$character[$field_name];?>">
</td>