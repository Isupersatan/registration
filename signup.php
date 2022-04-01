<?php 
$showAlert=false;
$login=false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
include 'partials/_dbconnect.php';
$name = $_POST["name"];
$email = $_POST["email"];
$contact = $_POST["contact"];
$birth_date = $_POST["birth_date"];
$password = $_POST["password"];
$query = mysqli_query($conn,"SELECT * FROM `user182` WHERE email ='$email' OR contact = '$contact'");
if($num= mysqli_num_rows($query)>0){

   $showAlert = true;
}

else{
  $hash = password_hash($password, PASSWORD_DEFAULT);
 $sql ="INSERT INTO `user182` ( `name`, `email`, `contact`, `birth date`, `password`, `date`)
  VALUES ('$name', '$email', '$contact', '$birth_date', '$hash', current_timestamp())";
    if($result = mysqli_query($conn , $sql)){
      $login=true;

    }
  

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

    <title>signup</title>
  </head>
  <body>
    <?php require 'partials/_nav.php' ?>

  <?php
  if($showAlert){   
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
   <strong>Sorry!</strong> already have account on this email or contact number.
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
   </button>
   </div>';
  }
  ?>
   <?php
   if($login){
     echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
     <strong>Registered Successfully</strong> Now you can login.
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
     </button>
     </div>
  ';




   }
  ?>
    <div class="container">
      <h1 class="text-center">Registration Form</h1>
      <form class="row g-2" action="/registration/signup.php" method="post">
            
      <div class="col-md-5 mb-4">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
  </div>

  <div class="col-md-5">
    <label for="contact" class="form-label">contact</label>
    <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter your phone no." required>
  </div>

  <div class=" mb-3">
    <label for=">Birth_date" class="form-label">Birth date</label>
    <input type="date" class="form_control" id=">Birth_date" name="birth_date"  required>
  </div>

  <div class="col-md-6">
    <label for="email1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email1" name="email" aria-describedby="emailHelp" required>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>

  <div class="col-md-6">
    <label for="Password" class="form-label">Password</label>
    <input type="password" class="form-control " id="Password-field" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}" title="Your password must be 8-20 characters long, contain uppercase letters and numbers." aria-describedby="passwordHelpBlock" required>
    <div id="passwordHelpBlock" class="form-text">
     Your password must be 8-20 characters long, contain uppercase letters and numbers.
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
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