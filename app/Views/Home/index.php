<?=$this->extend("templates/main_template")?>
<?=$this->section("main_section");?>
<pre style='color:white;'>
  <?php
  //var_dump(auth()->user());
  if(auth()->user() != null){
    var_dump(auth()->user()->hasPermission('site.access'));
  }
  ?>
</pre>
<?=$this->endSection()?>