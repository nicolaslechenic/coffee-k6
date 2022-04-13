<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title; ?></title>

  <link rel="stylesheet" href="./app/assets/styles/reset.css">
  <link rel="stylesheet" href="./app/assets/styles/variables.css">
  <link rel="stylesheet" href="./app/assets/styles/style.css">
  <script src="./app/assets/javascripts/burger.js" defer></script>




  <!-- Installer npm install css-minify -g -->
</head>
<body>
  <nav class="hidden navbar navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        Mon super site
      </a>
      <a href="/waiters/all">Mes serveurs</a>
      <a href="/edibles/all">Mes cafés</a>
    </div>
  </nav>

  <div id="burger">
    <a id="btn-burger" href="/statics/menu">🍔</a>
  </div>

  <nav id="nav-links" class="hidden">
    <a href="/waiters/all">Mes serveurs</a>
    <a href="/edibles/all">Mes cafés</a>
  </nav>

  <?= $yield; ?>


</body>
</html>