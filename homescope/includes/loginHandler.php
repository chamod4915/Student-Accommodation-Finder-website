<?php
session_start();

    include('config/dbconn.php');
    if(isset($_POST['signin']))
    {
      $email=$_POST['email'];

      $sql ="SELECT email,password,id FROM users WHERE email=:email";
      $query= $dbh -> prepare($sql);
      $query-> bindParam(':email', $email, PDO::PARAM_STR);
      $query-> execute();
      $results=$query->fetchAll(PDO::FETCH_OBJ);

      if($query->rowCount() > 0)
      {
        foreach ($results as $result) {

          //verify bcrypt hash password
          if(password_verify($_POST['password'], $result->password)){
          session_start();
          $_SESSION['uid']=$result->id;
          header("Location: ../index.php");
          } else{
            header("Location: ../sign-in.php");
          }
        }
      }
      else{
        $_SESSION['error']="Failed to sign in. Please check the login credentials and try again";
        header("Location: ../sign-in.php");
      }

    }
    else{
        header("Location: ../sign-in.php");
    }

?>