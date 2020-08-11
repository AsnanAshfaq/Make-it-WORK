<?php 

if($connection){
    $query = "SELECT * FROM posts ORDER BY post_Id DESC";

    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        
        while($row = mysqli_fetch_assoc($result)) {
            $post_ID = $row["post_Id"];
            $user_ID = $row["user_Id"];
            $post_text = $row["post_text"];
            $post_category = $row["post_category"];
            $post_image = $row["post_image"];
            $post_date = $row["post_date"];


            // get data of the user who has posted this post  
            $Query = "SELECT * FROM users WHERE  user_Id='{$user_ID}'";
            $Result = mysqli_query($connection, $Query);

             
            if (mysqli_num_rows($Result) > 0) {

                while($Row = mysqli_fetch_assoc($Result)) {
                    $user_Name = $Row["user_Name"];
                    $user_Image = $Row["user_Image"];
                }
            ?>

        <div class="container-fluid bg-light ">
            <div class="row">
                <!-- user image of the post  -->
                <div class="col-2 p-3">
                    <img src="uploads/<?= $user_Image;?>" class="img-fluid rounded border" alt="User Profile Picture">
                </div>
                <!-- user name and post date  -->
                <div class="col-7 p-2">
                    <h5 class="m-0 p-1" style="user-select: none;"><?= $user_Name;?></h5>
                    <h6 class="m-0 p-1" style="user-select: none;"><?= $post_date;?></h6>
                    <h6 class="m-0 p-1" style="user-select: none;"><b><?= $post_category;?></b></h6>
                </div>
                <!-- drop down icon  -->

                <!-- if the signed in user has posted this post, then donot show the drop down list  -->
                <?php
                    if($_SESSION['user_id'] != $user_ID){
                ?>
                <div class="col-3 dropdown d-flex justify-content-end">

                    <button role="button" type="button" class="btn h-25 w-25 shadow-none p-0"
                        data-toggle="dropdown">
                        <i class="fa fa-caret-down fa-2x" style="color:black"></i>
                    </button>
                    <!-- drop down list  -->
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item " href="#">Message <b><?= $user_Name;?></b></a>
                        <a class="dropdown-item" href="#">Report to Admin</a>
                    </div>
                </div>

                <?php
                }
                ?>
            </div>

            <!-- post text  -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 p-2">
                        <p style="user-select: none;">
                        <?= $post_text;?>    
                        </p>
                    </div>
                </div>
            </div>
            

            <?php 

            if(!empty($post_image)){ ?>
                <!-- post image  -->
                <div class="container-fluid p-0 ">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <img src="uploads/<?= $post_image;?>" class="img-thumbnail w-auto h-auto p-0 justify-content-center" alt="Post Image">
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            
        </div>

        <br>
            <?php
            }   
        }
    } 
    else{
        echo "error while loading post",mysqli_connect_error();
    }
}

?>



