
<?php
require 'connection.php';

if($connection){

    if(isset($_POST['postID'])){
        $post_id = $_POST['postID'];

        if(isset($_POST['inputText'])){
            $post_text = $_POST['inputText'];
        
            $query = "UPDATE posts SET post_text='{$post_text}' WHERE post_Id='{$post_id}'"; 
            
            $result = mysqli_query($connection,$query);

            if($result){
                echo "data inserted";
            }
            else{
                echo "error";
            }
        }
        else if (isset($_POST['category'])){
            $category_type = $_POST['category'];
            
            $query = "UPDATE posts SET post_category='{$category_type}' WHERE post_Id='{$post_id}'"; 
            
            $result = mysqli_query($connection,$query);

            if($result){
                echo "data inserted";
            }
            else{
                echo "error";
            }
        }
        else if(isset($_POST['imageName'])){
            $imageName = $_POST['imageName'];
            
            $query = "UPDATE posts SET post_image='{$imageName}' WHERE post_Id='{$post_id}'"; 
            
            $result = mysqli_query($connection,$query);

            if($result){
                echo "data inserted";
            }
            else{
                echo "error";
            }
        }
    }

}

else{
    echo mysqli_error($connection);
}

?>
