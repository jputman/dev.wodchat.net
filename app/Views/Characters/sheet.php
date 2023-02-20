<?=$this->extend("templates/main_template")?>
<?=$this->section("main_section");?>
<?php
  $current_line = 1;
?>
<br />
<div class="container-lg">
  <div class="card">
    <div class="card-body">
      <form class="needs-validation" novalidate>
        <table>
          <tr>
            <?php foreach ($sheet as $item): ?>
              <?php
              if($item["line"] != $current_line){
                $current_line++;
                ?>
                </tr>
                <tr>
                <?php
              }
              $data = [
                "field" => $item,
              ];
              $key = array_search($item["item_id"], array_column($sheetItems, 'id'));
              echo view("/Characters/Items/" . $sheetItems[$key]["name"],$data);
              ?>
            <?php endforeach ?>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>
<?=$this->endSection()?>