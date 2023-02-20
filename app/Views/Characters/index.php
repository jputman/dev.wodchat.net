<?=$this->extend("templates/main_template")?>
<?=$this->section("main_section");?>
<br />
<div class="container-lg">
<div class="card">
  <h5 class="card-header">Character Control Panel</h5>
    <div class="card-body">
      <div class='align-right'>
        <a href="/Characters/New" type="button" class="btn btn-outline-dark me-2" role="button">New Character</a>
      </div>
    </div>
</div>
</div>
<?=$this->endSection()?>