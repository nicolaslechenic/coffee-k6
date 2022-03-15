<?php ob_start(); ?>

<p><?= $waiter->getName(); ?></p>

<?php 
  $yield = ob_get_clean(); 
  require_once('./app/views/templates/layout.php');
?>