<?php

require_once 'source/db_connect.php';

if(isset($_POST['subscribe'])) {

      $email = $_POST['email'];
      
    try {
      $SQLInsert = "INSERT INTO newsletter (email, subscribed_at)
                   VALUES (:email, now())";

      $statement = $conn->prepare($SQLInsert);
      $statement->execute(array(
        ':email' => $email,
      ));

      if($statement->rowCount() == 1) {
          echo "<script> alert('Subscribed');window.location='about.html' </script>";
      }
    }
    catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }

}

?>