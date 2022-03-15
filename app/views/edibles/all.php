<?php ob_start(); ?>

<h1>All edibles</h1>

<?php foreach($edibles as $edible) { ?>
  <p><?= $edible->getName(); ?></p>
<?php }; ?>

<?php 
  $yield = ob_get_clean(); 
  require_once('./app/views/templates/layout.php');
?>