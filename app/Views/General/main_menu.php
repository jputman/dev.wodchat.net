<?php foreach ($menuItems as $item): ?>
  <div class="btn-group">
    <?php
    if($item["children"] == null){?><button class="btn btn-dark btn-size" type="button"><a class="" href="<?=$item["uri"];?>"><?php }
    else{?><button class="btn btn-dark dropdown-toggle btn-size" type="button" data-bs-toggle="dropdown" aria-expanded="false"><?php }    
    ?><?=$item["name"];?><?php if($item["children"] == null){?></a><?php }?></button>  
    <?php
    if($item["children"] != null){
      ?>
      <ul class="dropdown-menu dropdown-menu-dark">
        <?php foreach ($item["children"] as $child): ?>
          <li><a class="dropdown-item" href="<?=$child["uri"];?>"><?=$child["name"];?></a></li>
        <?php endforeach ?>
      </ul>
      <?php
    }
    ?>
  </div>
<?php endforeach ?>