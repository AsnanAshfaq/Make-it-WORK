<?php

require 'connection.php';

if($connection){
    session_start();

    if(empty($_SESSION['email'])){
    
        echo "<script>window.location.href='http://localhost/Make%20It%20Work/signIn.php';</script>";
        exit();
    }
    else if(isset($_SESSION['email']) || !empty($_SESSION['email'])){
        
        // get the data of the post 
        $postId = $_GET['post-id'];
        $query = "SELECT * FROM posts WHERE post_Id = '{$postId}'";

        $result = mysqli_query($connection, $query);

        if (mysqli_num_rows($result) > 0) {
                
            while($row = mysqli_fetch_assoc($result)) {
                $post_Id = $row["post_Id"];
                $post_text = $row["post_text"];
                $post_category = $row["post_category"];
                $post_date = $row["post_date"];
                $post_image = $row["post_image"];
            }
        } 
        else{
            echo mysqli_connect_error();
        }
        ?>

        
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Make it Work</title>

        <!-- bootstrap css cdn  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- font Awesome css cdn  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- font awesome 5 cdn  -->
    <script src="https://kit.fontawesome.com/a086ae4b2b.js" crossorigin="anonymous"></script>
    </head>

    <body>

        <?php require 'header.php'; ?>
        <div class="container-fluid">
            <div class="row">
                <!-- left side of the page User Profile SECTION  -->
                <?php 
                    require 'index-leftSide.php';
                ?>

                <!-- center of the page  -->
                <div class="col-lg-6 my-4">
                <h5 class="mt-3" style="user-select: none;">Edit Post</h5>

                    <div class="container-fluid bg-light ">
                        <div class="row">
                            <!-- user image of the post  -->
                            <div class="col-2 p-3">
                                <img src="<?=  $_SESSION['user_Image'];?>" class="img-fluid rounded border" alt="User Profile Picture">
                            </div>
                            <!-- user name and post date  -->
                            <div class="col-7 p-2">
                                <h5 class="m-0 p-1" style="user-select: none;"><?= $_SESSION['user_Name'];?></h5>
                                <h6 class="m-0 p-1" style="user-select: none;"><?= $post_date;?></h6>
                                <h6 class="m-0 p-1" style="user-select: none;">
                                    <b>
                                        <?= $post_category;?>
                                    </b>
                                    <a href="#" role="button" class="change-category-icon">
                                        <i class="fa fa-pen" style="color: black;" data-toggle="modal"
                                        data-target="#exampleModal">
                                        </i>
                                    </a>
                                </h6>
                            </div>
                
                        </div>

                         <!-- post text  -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 p-2">
                                <p style="user-select: none;">
                                    <?= $post_text;?>    
                                    <a href="#" role="button" class="change-text-icon">
                                        <i class="fa fa-pen" style="color: black;" data-toggle="modal"
                                        data-target="#exampleModal">
                                        </i>
                                    </a>
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
                            <div class="row">
                                <a href="#" class=" bg-light text-dark" data-toggle="collapse"
                                    data-target="#collapseExample" aria-expanded="false"
                                    aria-controls="collapseExample">
                                    <button class="btn btn-success mt-2">Edit Image</button>
                                </a>
                            </div>
                            <div class="row">
                                <div class="collapse" id="collapseExample">
                                    <div class="form-group">
                                        <input type="file"  class="form-control-file image mt-2" id="image">
                                        <button class="btn bg-primary upload-image mt-2">Upload Image</button>
                                        <span class="image-error text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    </div>
                </div>

                <!-- right side of the page CHAT SECTION  -->
                <div class="col-lg-3 my-4 border-left">
                    <?php
                        require 'chat-list.php';
                    ?>
                </div>
            </div>

        </div>
        <?php require 'footer.php';?>


        <!-- modal for editing  -->

    <!-- Modal for upadating changes -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <!-- input text -->

                    <textarea class="form-control text-dark textarea-input"  name="w3review" rows="4" placeholder="Write Changes...." cols="50"></textarea>
                    
                    <!-- skills  -->
                    <div class="form-group skills-list position-relative">
                        <select class="form-control bg-dark text-light" name="skills-list">
                            <option>Choose Category</option>
                            <option>Graphic Designing</option>
                            <option>Web Designing</option>
                            <option>Web Development</option>
                            <option>Mobile App Development</option>
                            <option>Game Development</option>
                            <option>Data Scientist</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary save-changes">Save changes</button>
                </div>
                <span class="modal-error text-danger ml-2 mb-2"></span>
            </div>
        </div>
    </div>
          <!-- bootstrap scripts  -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <!-- jquery cdn  -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous">
    </script>

        <script>
            $(document).ready(function(){

                // category changing 
                $(".change-category-icon").on("click", function(){
                    $("#exampleModalLabel").html("Change Category")
                    $(".skills-list").show()
                    $(".textarea-input").hide()

                    $(".save-changes").on("click",function(){
                        if ($('[name=skills-list]').val() == 'Choose Category'){
                            $(".modal-error").text("Please Choose any Category")
                        }
                        else{
                             // get post id  
                             var postID = "<?php echo $postId; ?>";
                            
                            $.ajax({
                                type: "post",
                                url: "post-edit-addData.php",
                                data: {
                                    postID: postID,
                                    category: $('[name=skills-list]').val()
                                },
                                success: function(data){
                                    if(data == "error"){
                                        console.log("error")
                                    }
                                    else{
                                        window.location.href='http://localhost/Make%20It%20Work/profile.php'
                                    }
                                }
                            })
                        }
                    })
                })

                // post text changing 
                $(".change-text-icon").on("click", function(){
                    $("#exampleModalLabel").html("Change Post Text")
                    $(".skills-list").hide()
                    $(".textarea-input").show()
                    $(".save-changes").on("click",function(){
                        // get the input 
                        const inputText = $.trim($(".textarea-input").val())
                        if(inputText == ""){
                            $(".modal-error").text("Enter text")
                        }
                        // if text is less  than 100 characters 
                        else if (inputText.trim().length < 100) {
                            $(".modal-error").text("Post text is less than 100 characters")
                        }

                        // if text is more than 450 characters 
                        else if (inputText.trim().length > 450) {
                            $(".modal-error").text("Post text is more than 450 characters")
                        }
                        else{
                            // get post id  
                            var postID = "<?php echo $postId; ?>";
                            
                            $.ajax({
                                type: "post",
                                url: "post-edit-addData.php",
                                data: {
                                    postID: postID,
                                    inputText: inputText
                                },
                                success: function(data){
                                    
                                    
                                    if(data == "error"){
                                        console.log("hurraha")
                                    }
                                    else{
                                        window.location.href='http://localhost/Make%20It%20Work/profile.php'
                                    }
                                }
                            })
                        }

                    })
                })


                $(".upload-image").on("click",function () { 
                    var image = $(".image").val().split('.').pop().toLowerCase();

                    if(image != ''){
                        const fileAllowed = ['jpg', 'jpeg', 'png']
                        if ($.inArray(image, fileAllowed) == -1) {
                            // display image error 
                            $(".image-error").text("No Image Selected")
                            setTimeout(() => {
                                $(".image-error").fadeOut()
                            }, 3000);
                        }
                        else{
                            // get post id  
                            var postID = "<?php echo $postId; ?>";
                            $.ajax({
                                type: "post",
                                url: "post-edit-addData.php",
                                data: {
                                    postID: postID,
                                    imageName: document.getElementById("image").files[0].name
                                },
                                success: function(data){
                                    if(data == "error"){
                                        console.log("hurraha")
                                    }
                                    else{
                                        window.location.href='http://localhost/Make%20It%20Work/profile.php'
                                    }
                                }
                            })
                        }
                    }
                    else{
                        $(".image-error").text("No Image Selected")
                        setTimeout(() => {
                            $(".image-error").fadeOut()
                        }, 3000);
                        
                    }
                 })

            })
        </script>
    </body>
    <html>

        
<?php
    }
}
else{
    echo mysqli_error($connection);
}
?>
