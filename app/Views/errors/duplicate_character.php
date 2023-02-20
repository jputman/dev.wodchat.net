<?=$this->extend("templates/main_template")?>
<?=$this->section("main_section");?>
<br />
<div class="container-lg">
<div class="card">
  <h5 class="card-header">Error - Duplicate Character Name</h5>
    <div class="card-body">
      <?=$ErrorMessage?>
    </div>
</div>
</div>
<?=$this->endSection()?>