<?php

require 'connection.php';
session_start();

if($connection){

    if(isset($_POST['name'])){
        $name = $_POST['name'];
        
        // add name to the database 
        $query = "UPDATE users SET user_Name='{$name}' WHERE user_Id='{$_SESSION['user_id']}'";
        $result = mysqli_query($connection,$query);

        if($result){
            // return 
            echo "successfull";
        }
        else{
            echo "error";
        }
    }
    else if (isset($_POST['user_location'])){
        $location = $_POST['user_location'];
        // add location to the database 
        $query = "UPDATE users SET user_Location='{$location}' WHERE user_Id='{$_SESSION['user_id']}'";
        $result = mysqli_query($connection,$query);

        if($result){
            // return 
            echo "successfull";
        }
        else{
            echo "error";
        }
    }

    else if (isset($_POST['categoryType'])){
        $categoryType = $_POST['categoryType'];
        // add location to the database 
        $query = "UPDATE users SET user_Professionality='{$categoryType}' WHERE user_Id='{$_SESSION['user_id']}'";
        $result = mysqli_query($connection,$query);

        if($result){
            // return 
            echo "successfull";
        }
        else{
            echo "error";
        }
    }

    else if (isset($_POST['interests'])){
        $interestsArray = $_POST['interests'];

        // converting interest array into string 
        $_interests = '';
        foreach($interestsArray as $value){
            $_interests .= $value.",";
        }
        // add location to the database 
        $query = "UPDATE users SET user_Interests='{$_interests}' WHERE user_Id='{$_SESSION['user_id']}'";
        $result = mysqli_query($connection,$query);

        if($result){
            // return 
            echo "successfull";
        }
        else{
            echo "error";
        }
    }

    else if (isset($_POST['experience'])){
        $experience = $_POST['experience'];

        
        // add location to the database 
        $query = "UPDATE users SET user_Experience='{$experience}' WHERE user_Id='{$_SESSION['user_id']}'";
        $result = mysqli_query($connection,$query);

        if($result){
            // return 
            echo "successfull";
        }
        else{
            echo "error";
        }
    }

    

}
else{
    echo mysqli_error($connection);
}

?>