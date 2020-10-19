<?php
require 'connec.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" >
    <title>Index</title>
  </head>
  <body>
    <?php

    $query = 'SELECT * FROM friend';
    $statement=$pdo->prepare($query);

    $statement->execute();

    $friends = $statement->fetchAll(PDO::FETCH_BOTH);

    foreach($friends as $friend) {
      echo   $friend['firstname'] . ' ' . $friend['lastname']. '. ';
  }
    ?>

  </body>
</html>