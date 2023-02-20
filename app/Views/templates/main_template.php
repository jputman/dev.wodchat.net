<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="/stylesheets/main.css" rel="stylesheet" />
    <title><?=session('SITE_TITLE');?></title>
  </head>
  <body>
    <header class="p-1 text-bg-dark">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            <img src="/images/SiteTitle.png" alt="<?=session('SITE_TITLE');?>" title="<?=session('SITE_TITLE');?>" height="50" />
          </a>
          <div class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 dropdown">
            <?=$site_menu;?>
          </div>
          <?php
            if(auth()->loggedIn()){
              echo view("General/logged_in.php");
            }
            else{
              echo view("General/not_logged_in.php");
            }
          ?>
        </div>
      </div>
    </header>
    <main class="flex-shrink-0">
      <?= $this->renderSection('main_section') ?>
    </main> 
    <script src="https://code.jquery.com/jquery-3.6.3.slim.js" integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="/scripts/main.js"></script>
  </body>
</html>