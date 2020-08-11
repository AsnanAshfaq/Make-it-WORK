<?php

require 'connection.php';
session_start();
if($connection){

    $post_text = $_POST['post_text'];
    $post_image = $_POST['post_image']; 
    $post_category = $_POST["post_category"];

    // post date 
    $post_date = date("M d,Y");

    
    $query = "INSERT INTO posts (post_Id, user_Id, post_text, post_category, post_image, post_date)
                        VALUES (NULL, '{$_SESSION['user_id']}', '{$post_text}','{$post_category}','{$post_image}', '{$post_date}')";

    $result = mysqli_query($connection,$query);

    if(!$result){
        echo "data not inserted", mysqli_error($connection);
    }
    else{
        echo "post added";
    }
}


?>