<?php 
$showalert=false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
include 'partials/_dbconnect.php';
$email = $_POST["email"];
$password = $_POST["password"];

$sql = "select * from user182 where email='$email' AND password='$password'";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
if($num == 1){
   session_start();
   $_SESSION['loggedin'] = true;
   $_SESSION['email'] = $email;
   $_SESSION['name'] = $name;
   header("location: welcome.php");
}
else{
    $showalert=true;
    }
  
 }

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>login</title>
  </head>
  <body>
    <?php require 'partials/_nav.php' ?>

    <?php
  if($showalert){   
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
   <strong>sorry!</strong> Do not have account on this email OR <strong>wrong password </strong>
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
   </button>
   </div>';
  }
  ?>

   
    <div class="container">
      <h1 class="text-center">Login to your account</h1>
      <form  action="/registration/login.php" method="post">
            
      
  <div class="form-group">
    <label for="email1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email1" name="email" aria-describedby="emailHelp" required>
    <div id="emailHelp" class="form-text">Enter your registered email</div>
  </div>

  <div class="form-group" >
    <label for="Password" class="form-label">Password</label>
    <input type="password" class="form-control " id="Password-field" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}" title="Your password must be 8-20 characters long, contain uppercase letters and numbers." aria-describedby="passwordHelpBlock" required>
    <div id="passwordHelpBlock" class="form-text">
    Enter your password.
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary ">Login</button>
</form>


    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
  </body>
</html>