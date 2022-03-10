<?php ob_start(); ?>
<h1>All waiters</h1>

<?php foreach($waiters as $waiter) { ?>
  <p><?= $waiter->getName(); ?></p>
<?php }; ?>

<?php 
  $yield = ob_clean(); 
  require './views/templates/layout.php';
?>