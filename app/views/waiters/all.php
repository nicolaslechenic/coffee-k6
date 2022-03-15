<?php ob_start(); ?>

<h1>All waiters</h1>

<?php 

foreach($waiters as $w) { ?>

  <p><?= $w->getName(); ?></p>
  <?php }; ?>

<?php 
  $yield = ob_get_clean(); 

  require_once('./app/views/templates/layout.php');
?>