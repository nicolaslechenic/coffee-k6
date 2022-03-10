<?php ob_start(); ?>
<p><?= $waiter->getName(); ?></p>

<?php 
  $yield = ob_clean(); 
  require './views/templates/layout.php';
?>