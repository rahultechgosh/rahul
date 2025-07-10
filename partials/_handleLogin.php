<?php 
$showError = "false";
$showAlert = false;
if($_SERVER['REQUEST_METHOD'] == "POST") {
        $conn = mysqli_connect("localhost", "root", "", "test");

        $user_email = $_POST['loginEmail'];
        $user_password = $_POST['loginPassword'];
      // Check whether this email exists
      $existSql = "SELECT * FROM `sighup` WHERE user_email='$user_email'";
      $result = mysqli_query($conn, $existSql);
      $numRows = mysqli_num_rows($result);
      if($numRows == 1) {
          while ($row = mysqli_fetch_assoc($result)) {
            
              if (password_verify($user_password, $row['user_password'])) {
                  session_start();
                  $_SESSION['loggedin'] = true;
                    $_SESSION['user_email'] = $user_email;
                  $_SESSION['user_name'] = $row['user_name'];
                  
                  header("Location: /trial/index.php?logedin=true");
                  exit();
              }
              else {
                  $showError = "Invalid Credentials";
              }
          }
      }
      else {
          $showError = "plaease first sign up";
      }
       header("Location: /trial/index.php?logedin=false&error=$showError");
   };
?>