<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin= true;
}
else{
  $loggedin= false;
}

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/registration">Registration</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/registration/welcome.php">Home</a>
        </li>';

      if(!$loggedin){
        echo '<li class="nav-item">
          <a class="nav-link" href="/registration/login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/registration/signup.php">Sign up</a>
        </li>';
      }
      if($loggedin){
        echo '<li class="nav-item">
          <a class="nav-link" href="/registration/logout.php">Logout</a>
        </li>';
      }
        
     echo ' </ul>
     
    </div>
  </div>
</nav>';
    
?>