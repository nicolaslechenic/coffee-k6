<?php ob_start(); ?>

<a href="/">Accueil /</a>
<a href="/waiters/all">Serveurs /</a>
<a href="/edibles/all">Cafés</a>

<?php 

  $yield = ob_get_clean(); 

  require_once('./app/views/templates/layout.php');
?>