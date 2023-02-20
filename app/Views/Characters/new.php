<?=$this->extend("templates/main_template")?>
<?=$this->section("main_section");?>
<br />
<div class="container-lg">
  <div class="card">
    <h5 class="card-header">Create New Character Sheet</h5>
    <div class="card-body">
      <form class="needs-validation" novalidate method="POST" action="/Characters/Create">
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">Character Name</span>
          <input type="text" name="character_name" id="character_name" class="form-control" placeholder="Character Name" aria-label="character_name" aria-describedby="basic-addon1" required>
          <div class="invalid-feedback">
            Character Name Can Not Be Blank
          </div>
        </div>  
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">System</span>
          <select class="form-select" aria-label="Default select example" name="system" id="system" required>
            <option selected disabled value="">Select Character System</option>
            <?php foreach ($systems as $item): ?>
              <option value="<?=$item["id"];?>"><?=$item["name"];?></option>
            <?php endforeach ?>
          </select>
          <div class="invalid-feedback">
            Please make sure to select a valid system.
          </div>          
        </div>
        <button type="submit" class="btn btn-primary mb-3">Create Character</button>
      </form>
    </div>
  </div>
</div>
<?=$this->endSection()?>