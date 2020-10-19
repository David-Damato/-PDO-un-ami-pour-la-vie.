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
    $friendss = $statement->fetchAll(PDO::FETCH_BOTH);
    foreach($friendss as $friend) {
      echo   $friend['firstname'] . ' ' . $friend['lastname']. '. ';
    }
    ?>

    <form method="post">

        <div>
            <label for="firstname">Enter your beautiful firstname :</label>
            <input type="text" name="firstname" id="firstname" required>
        </div>

        <div>
            <label for="lastname">Enter your beautiful lastname :</label>
            <input type="text" name="lastname" id="lastname" required>
        </div>

        <div>
            <input type="submit" value="Send it !">
        </div>
    </form>

    <?php

    require_once 'connec.php';

    if ($_POST) {
    $query = 'INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)';

    $statement=$pdo->prepare($query);

    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);

    $statement->bindValue(':firstname', $firstname, \PDO::PARAM_STR);
    $statement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);
    $statement->execute();

    $friends = $statement->fetchAll(PDO::FETCH_BOTH);

      header("refresh:0.1;url=http://localhost:8000/index.php");
    }
    else{}

    
  ?>




  </body>
</html>