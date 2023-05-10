<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' $pass = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:user_page.php');

      }

   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="./css/style.css">
   <title>HASH TECHIE OFFICIAL</title>
</head>
<body>
<section>
   <div class="form-box">
      <div class="form-value">


   <form action="" method="post">
      <h2>Login</h2>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>

         <div class="inputbox">
            <ion-icon name="mail-outline"></ion-icon>
            <input type="email" required>
            <label for="">Email</label>
         </div>

         <div class="inputbox">
            <ion-icon name="lock-closed-outline"></ion-icon>
            <input type="password" required >
            <label for="">Password</label>
         </div>

      <button> <input type="submit" name="submit" value="Log In" class="form-btn"></button>


         <div class="register">
      <p>don't have an account? <a href="register_form.php">register now</a></p>
         </div>
   </form>
      </div>
   </div>
</section>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>




