<?php
require 'connection.php';

if($connection){

    if(isset($_POST['post_id'])){
        $post_id = $_POST['post_id'];
        
        // add name to the database 
        $query = "DELETE FROM posts WHERE post_Id='{$post_id}'";
        $result = mysqli_query($connection,$query);

        if($result){
            // return 
            echo "deleted successfully";
        }
        else{
            echo "error";
        }
    }

}

else{
    echo mysqli_error($connection);
}