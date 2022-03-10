<?php ob_start(); ?>
<h1>All edibles</h1>

<?php foreach($edibles as $edible) { ?>
  <p><?= $edible->getName(); ?></p>
<?php }; ?>

<?php 
  $yield = ob_clean(); 
  require './views/templates/layout.php';
?>