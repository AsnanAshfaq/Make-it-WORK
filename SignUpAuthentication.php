<?php

require 'connection.php';

if($connection){

    
    $name = $_POST['name'];
    $location = $_POST['location'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $interestsArray = $_POST['interests'];
    $professionality = $_POST['professionality'];
    $experience = $_POST['experience'];
    $image = $_POST['image'];
    
    // converting interest array into string 
    $_interests = '';
    foreach($interestsArray as $value){
        $_interests .= $value.",";
    }
    
    // check if name is already taken or not 
    $query = "SELECT * FROM users WHERE user_Name = '{$name}'";
    $result = mysqli_query($connection,$query);


    if (mysqli_num_rows($result) > 0) {
        
        echo "name is taken";
    } 
    else{

         // check if email is already taken or not 
        $q = "SELECT * FROM users WHERE user_Email = '{$email}'";
        $res = mysqli_query($connection,$q);

        if (mysqli_num_rows($res) > 0) {
        
            echo "email is taken";
        } 
        else{

            // path to store the image 
            // everything is fine so create user in the database 
            $insertData  = "INSERT INTO users (user_Id, user_Name, user_Location, user_Email, user_Password, user_Interests, user_Professionality, user_Experience, user_Image)
                    VALUES (NULL, '{$name}', '{$location}','{$email}','{$password}','{$_interests}','{$professionality}','{$experience}','{$image}')";

            $result = mysqli_query($connection,$insertData);
            if($result){
                
                // start and sdet session variables 
                session_start();
                $_SESSION['email'] = $email;
                
                }
            // }
            else{
                echo "error";
                
            }
        }
    }   
}