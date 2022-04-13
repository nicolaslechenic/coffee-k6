<?php ob_start(); ?>

<h1>Create waiter</h1>

<form action="/waiters/insert" method="POST" enctype='multipart/form-data'>
  <input type="text" name="name">
  <input type="file" name="toto">
  <input type="submit" value="Ajouter un serveur">
</form>

<?php 
  $yield = ob_get_clean(); 
  require_once('./app/views/templates/layout.php');
?>