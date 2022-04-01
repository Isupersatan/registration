 <?php
 $server = "localhost";
 $name = "root";
 $password = "";
 $database = "user182";

 $conn = mysqli_connect($server, $name, $password, $database);
 if(!$conn){
    die("error" . mysqli_connect_error());
    
}
 
 ?>