<?php ob_start(); ?>

<div id="slider">
<?php 
foreach($slides as $slide) { ?>

  <img src="<?= $slide->getFullPath(); ?>" />
<?php }; ?>

</div>

<div id="controllers" >
  <a href="/" id="prev">Previous</a>
  <a href="/" id="next">Next</a>
</div>

<script src="./app/assets/javascripts/slider.js"></script>

<?php 

  $yield = ob_get_clean(); 

  require_once('./app/views/templates/layout.php');
?>