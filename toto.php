<?php
  if(isset($_POST)) {
    echo($_POST["email"]);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
  <form action="toto.php" method="POST">
    <input type="text" name="email" />

    <input type="submit" value="Envoyer"/>
  </form>
</body>
</html>