<?php 
$showError = "false";
$showAlert = false;
if($_SERVER['REQUEST_METHOD'] == "POST") {
        
      $conn = mysqli_connect("localhost", "root", "", "test");

        $user_name = $_POST['signupName'];
        $user_email = $_POST['signupEmail'];
        $user_password = $_POST['signupPassword'];
        $user_cpassword = $_POST['signupcPassword'];
      // Check whether this email exists
      $existSql = "SELECT * FROM `sighup` WHERE user_email='$user_email'";
      $result = mysqli_query($conn, $existSql);
      $numRows = mysqli_num_rows($result);
      if($numRows > 0) {
          $showError = "Email already exists";
      }
      
        else {
            if ($user_password == $user_cpassword) {
                $hash = password_hash($user_password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `sighup` (`user_name`, `user_email`, `user_password`, `user_cpassword`) VALUES ('$user_name', '$user_email', '$hash', '$user_cpassword');";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $showAlert = true;
                    header("Location: /trial/index.php?signupsuccess=true");
                    exit();
                }
            }
            else {
                $showError = "Password do not match";
            }
        }
         header("Location: /trial/index.php?signupsuccess=false&error=$showError");
      };
     
?>