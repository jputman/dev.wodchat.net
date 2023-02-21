<?php
  $field_name = str_replace(" ","_",strtolower($field["displayValue"]));
?>
<td>
  <?=$field["displayValue"];?>
</td>
<td>
  <?=$character[$field_name];?>
</td>