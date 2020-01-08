<?php

require_once 'source/db_connect.php';

if(isset($_POST['contact'])) {

      $fullname = $_POST['fullname'];
      $email = $_POST['email'];
      $phonenumber = $_POST['phonenumber'];
      $company = $_POST['company'];
      $country = $_POST['country'];
      $budget = $_POST['budget'];
      $interest = $_POST['interest'];
      $requirements = $_POST['requirements'];
      
    try {
      $SQLInsert = "INSERT INTO contacts (fullname, email, phonenumber, company,
                    country, budget, interest, requirements, sent_at)
                   VALUES (:fullname, :email, :phonenumber, :company,
                    :country, :budget, :interest, :requirements, now())";

      $statement = $conn->prepare($SQLInsert);
      $statement->execute(array(
        ':fullname' => $fullname, 
        ':email' => $email, 
        ':phonenumber' => $phonenumber,
        ':company' => $company,
        ':country' => $country,
        ':budget' => $budget,
        ':interest' => $interest, 
        ':requirements' => $requirements
      ));

      if($statement->rowCount() == 1) {
          echo "<script> alert('Contact sent');window.location='index.html' </script>";
      }
    }
    catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }

}

?>