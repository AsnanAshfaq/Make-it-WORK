<?php 


require 'connection.php';

if($connection){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $query = "SELECT * FROM users WHERE user_Email='{$email}' and user_Password='{$password}'";

    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        
        // set session variables 
        session_start();
        $_SESSION['email'] = $email;
        
        header("http://localhost/Make%20It%20Work");
        exit();
      } 

    else{
        echo "invalid";
    }

}


?>