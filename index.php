<?php
session_start();
require 'connection.php';

if(empty($_SESSION['email'])){
    
    echo "<script>window.location.href='http://localhost/Make%20It%20Work/signIn.php';</script>";
    exit();
}
    else if(isset($_SESSION['email']) || !empty($_SESSION['email'])){
      
        if($connection){
            $query = "SELECT * FROM users WHERE user_Email='{$_SESSION['email']}'";

            $result = mysqli_query($connection, $query);

            if (mysqli_num_rows($result) > 0) {
                
                while($row = mysqli_fetch_assoc($result)) {
                    $user_ID = $row["user_Id"];
                    $user_Name = $row["user_Name"];
                    $user_Location = $row["user_Location"];
                    $user_Interests = $row["user_Interests"];
                    $user_Professionality = $row["user_Professionality"];
                    $user_Experience = $row["user_Experience"];   
                    $user_Image = $row["user_Image"];
                    
                    // set user id as session variable
                    $_SESSION['user_id'] = $user_ID;
                    $_SESSION['user_Name'] = $user_Name;
                    $_SESSION['user_Location'] = $user_Location;
                    $_SESSION['user_Interests'] = $user_Interests;
                    $_SESSION['user_Professionality'] = $user_Professionality;
                    $_SESSION['user_Experience'] = $user_Experience;
                    $_SESSION['user_Image'] = $user_Image;
                }
            } 
            else{
                echo mysqli_connect_error();
            }
        }
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

    <?php
    require 'header.php';
    ?>


    <div class="container-fluid">
        <div class="row">
            <!-- left side of the page User Profile SECTION  -->
            <?php 
                require 'index-leftSide.php';
            ?>
            <!-- centre of the page  CREATE AND GLOBAL  POSTS SECTION-->
            <div class="col-lg-6 my-4">

                <!-- creating posts  -->
                <?php
                    require 'create-post.php';
                ?>             

                <br><br>
                <!-- global posts  -->
                
                <?php
                    require 'global-post.php';
                ?>

            </div>

            <!-- right side of the page CHAT SECTION  -->
            <div class="col-lg-3 my-4 border-left">
                <?php
                    require 'chat-list.php';
                ?>
            </div>
        </div>
    </div>
    
    <?php
    require 'footer.php';
    ?>

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
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {

        // Post handler 

            $('.post-submit').on('click', () => {
                // post text 
                const postText = $('.post-text').val()
                // post image 
                var image = $('.post-image').val().split('.').pop().toLowerCase();

                const error = []

                if (postText.trim() == '')
                    error.push("Input Field is Empty")

                // if text is less  than 100 characters 
                if (postText.trim().length < 100) {
                    error.push('Post text is less than 100 characters<br>')
                }

                // if text is more than 450 characters 
                if (postText.trim().length > 450) {
                    error.push('Post text is more than 450 characters<br>')
                }

                // applying checks on image 
                if (image != '') {
                    const fileAllowed = ['jpg', 'jpeg', 'png']
                    if ($.inArray(image, fileAllowed) == -1) {
                        // display image error 
                        error.push("file not allowed")
                    }
                }

                if ($('[name=post-category]').val() == 'Choose Category')
                    error.push("Choose Category")
                

                // if we have error in the error Array and there is not previous error displayed on the screen 
                if((error.length != 0 || error.length != null) && ($('.error').is(':empty'))){
                    $('.error').append(error).hide()
                    showAndHideError()
                }

                // if we dont have any error in the error Array and there is some previous error displayed on the screen 
                if((error.length == 0 || error.length == null) && (!$('.error').is(':empty'))){
                    // empty any error displayed on the span tag 
                    $('.error').empty()
                }
                
                // if error array has no error then we are successful to add the value into the database
                if(error.length ==0 ) {
                    console.log("Post is Successfull")

                    // getting user id 
                    var user_id = "<?php echo $user_ID; ?>";
                    console.log(user_id)
                    // getting image 
                    var image_post = ''
                    if( document.getElementById("image").files.length == 0 ){
                        image_post = ''
                    }
                    else{
                        image_post = document.getElementById("image").files[0].name  
                    }
                    // ajax call to save the post
                    
                    $.ajax({
                        type: "post",
                        url: "add-post.php",
                        data: {
                            user_id : user_id,
                            post_text : postText.trim(),
                            post_image : image_post,
                            post_category: $('[name=post-category]').val(),
                        },
                        success: function (data){
                            if(data != "data inserted"){
                                $('.error').html(data).hide()
                                showAndHideError()
                            }
                            if(data == "post added"){
                                location.reload();
                            }
                        }
                    })
                }

            })

            function showAndHideError(){
                $('.error').fadeIn()
                setTimeout(() => {
                    $('.error').fadeOut()
                }, 3000);
            }
        })
    </script>


</body>

</html>