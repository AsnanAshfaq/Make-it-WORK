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
                    $user_Name = $row["user_Name"];
                    $user_Location = $row["user_Location"];
                    $user_Interests = $row["user_Interests"];
                    $user_Professionality = $row["user_Professionality"];
                    $user_Experience = $row["user_Experience"];   
                    $user_Image = $row["user_Image"];
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
    <title>User Profile</title>

    <!-- bootstrap css cdn  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- font Awesome  4 css cdn  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- font awesome 5 cdn  -->
    <script src="https://kit.fontawesome.com/a086ae4b2b.js" crossorigin="anonymous"></script>
</head>

<body>

    <!-- header  -->
    <?php
    require 'header.php';
    ?>


    <div class="container-fluid">
        <div class="row">

            <!-- user profile  -->
            <div class="col-lg-3 my-4 border-right">
                <div class="container-fluid">
                    <div class="row my-3">
                        <!-- user image  -->
                        <div class="col-lg-8 col-sm-6 col-xs-3 col-md-4">
                            <img src="uploads/<?= $user_Image;?>"
                                class="img-fluid rounded border rounded-circle border-dark" alt="User Profile Picture">
                        </div>
                        <!-- edit user image  -->
                        <div class="col-lg-4 col-sm-2 col-xs-2 p-0 m-0 d-flex align-items-end">
                            <a href="#" class=" bg-light text-dark" data-toggle="collapse"
                                data-target="#collapseExample" aria-expanded="false"
                                aria-controls="collapseExample">
                                <i>
                                    Edit Picture
                                </i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="collapse" id="collapseExample">
                                <div class="form-group">
                                    <input type="file"  class="form-control-file" id="image">
                                    <button type="button" class="btn btn-dark text-light p-1 mt-2 change-image">Save changes</button><br>
                                    <span class="image-error text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row my-3">
                        <!-- user name  -->
                        <div class="col-lg-8 col-sm-6 col-xs-3 col-md-4">
                            <h3 class="text-center" style="user-select: none;">
                            <?= $user_Name;?>
                            </h3>
                        </div>
                        <!--edit  user name  -->
                        <div class="col-lg-4 col-sm-2 col-xs-2 p-3 m-0 d-flex align-items-end ">
                            <a href="#" role="button" class="change-name-icon">
                                <i class="fa fa-pen" style="color: black;" data-toggle="modal"
                                    data-target="#exampleModal"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <!-- skills  -->
                        <div class="col-4 float-right my-2">
                            <div class="row d-flex">
                                <div class="col-sm-6 col-xs-6 p-0">
                                    <h5 class="text-dark" style="user-select: none;">Location</h5>
                                </div>
                                <!-- edit skills  -->
                                <div class="col-sm-6 col-xs-6">
                                    <a href="#"  role="button" class="change-location-icon">
                                        <i class="fa fa-pen ml-4" style="color: black;" data-toggle="modal"
                                            data-target="#exampleModal"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-8 p-0 mx-2 w-100">
                            <p class="text-dark " style="user-select: none;">
                            <b><?= $user_Location;?></b>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <!-- skills  -->
                        <div class="col-4 float-right my-2">
                            <div class="row d-flex">
                                <div class="col-sm-6 col-xs-6 p-0">
                                    <h5 class="text-dark" style="user-select: none;">Skills</h5>
                                </div>
                                <!-- edit skills  -->
                                <div class="col-sm-6 col-xs-6">
                                    <a href="#"  role="button" class="change-professionality-icon">
                                        <i class="fa fa-pen" style="color: black;" data-toggle="modal"
                                            data-target="#exampleModal"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-8 p-0 mx-2 w-100">
                            <p class="text-dark " style="user-select: none;">
                            <b><?= $user_Professionality;?></b>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <!-- skills  -->
                        <div class="col-4 float-right my-2">
                            <div class="row d-flex">
                                <div class="col-sm-6 col-xs-6 p-0">
                                    <h5 class="text-dark" style="user-select: none;">Experience</h5>
                                </div>
                                <!-- edit skills  -->
                                <div class="col-sm-6 col-xs-6">
                                    <a href="#"  role="button" class="change-experience-icon">
                                        <i class="fa fa-pen ml-5" style="color: black;" data-toggle="modal"
                                            data-target="#exampleModal"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-8 p-0 mx-2 w-100">
                            <p class="text-dark " style="user-select: none;">
                            <b><?= $user_Experience;?> year</b>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <!-- experience  -->
                        <div class="col-6 float-right my-2">
                            <div class="row d-flex">
                                <div class="col-sm p-0">
                                    <h5 class="text-dark" style="user-select: none;">Interests</h5>
                                </div>
                                <!-- edit experience  -->
                                <div class="col-sm">
                                    <a href="#"  role="button" class="change-interests-icon">
                                        <i class="fa fa-pen" style="color: black;" data-toggle="modal"
                                            data-target="#exampleModal"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 p-0 mx-2 w-100">
                            <p class="text-dark " style="user-select: none;">
                            <b>
                                <?= $user_Interests;?>
                            </b>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- my posts sections  -->
            <div class="col-lg-6 my-2">
                <h5 class="mt-3" style="user-select: none;">My Posts</h5>

                <?php
                    require 'profile-my-posts.php';
                ?>
            </div>



            <!-- right side of the page CHAT SECTION  -->
            <div class="col-lg-3 my-4 border-left">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <h5 style="user-select: none;">Chat</h5>
                        </div>
                    </div>
                    <div class="row bg-light my-2">
                        <!-- user image  -->
                        <div class="col-3 d-flex justify-content-center p-2">
                            <a href="#" class="nav-link p-0 m-0 ">
                                <img src="./images/chat-image.jpg"
                                    class="img-fluid rounded border rounded-circle w-100 h-100 border-dark"
                                    alt="User Profile Picture">
                            </a>
                        </div>
                        <!-- user name  -->
                        <div class="col-9  d-flex justify-content-center p-0 m-0">
                            <a href="./chat.html" class="nav-link w-100 d-flex justify-content-center py-2 px-0 m-0">
                                <h6 class="w-100 ml-2 pt-3 text-dark">Brendon Parker</h6>
                            </a>
                        </div>
                    </div>
                    <div class="row bg-light my-2">
                        <!-- user image  -->
                        <div class="col-3 d-flex justify-content-center p-2">
                            <a href="#" class="nav-link p-0 m-0 ">
                                <img src="./images/federer.jpg"
                                    class="img-fluid rounded border rounded-circle w-100 h-100 border-dark"
                                    alt="User Profile Picture">
                            </a>
                        </div>
                        <!-- user name  -->
                        <div class="col-9  d-flex justify-content-center p-0 m-0">
                            <a href="#" class="nav-link w-100 d-flex justify-content-center py-2 px-0 m-0">
                                <h6 class="w-100 ml-2 pt-3 text-dark">Roger Federer</h6>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br>

    <?php
    require 'footer.php';
    ?>
    <!-- Footer -->

    <!-- Modal for deleting post  -->
    <div class="modal fade" id="delete-modal" role="dialog">
        <div class="modal-dialog">
        
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                
                <h4 class="modal-title">Deleting Post</h4>
                </div>
                <div class="modal-body">
                <p>Do you really want to delete this post?</p>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default modal-delete-confirmation" data-dismiss="modal">Yes</button>
                </div>
            </div>
        
        </div>
    </div>
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
                    <input type="text" maxlength="25" class="form-control modal-input" placeholder="">

                    <!-- input experience as number  -->
                    <input type="number" name="experience" class="form-control experience" min="1" max="30"
                            placeholder="Year's of experience you have in your field" aria-label="Username"
                            aria-describedby="basic-addon1">
                    
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

                    <!-- interests  -->
                    <div class="form-group interest-list text-dark ml-3 position-relative">
                        <input class="form-check-input checkBox" type="checkbox" name="Graphic Designing" value="" id="Graphic Designing">
                        <label class="form-check-label" for="Graphic Designing">
                            Graphic Designing
                        </label>
                        <br>
                        <input class="form-check-input checkBox" type="checkbox" name="Web Designing" value="" id="Web Designing">
                        <label class="form-check-label" for="Web Designing">
                            Web Designing
                        </label><br>

                        <input class="form-check-input checkBox" type="checkbox" name="Web Development" value="" id="Web Development">
                        <label class="form-check-label" for="Web Development">
                            Web Development
                        </label><br>

                        <input class="form-check-input checkBox" type="checkbox" name="Mobile App Development" value="" id="Mobile Development">
                        <label class="form-check-label" for="Mobile Development">
                            Mobile App Development
                        </label><br>

                        <input class="form-check-input checkBox" type="checkbox" name="Data Scientist" value="" id="Data Scientist">
                        <label class="form-check-label" for="Data Scientist">
                            Data Scientist
                        </label><br>

                        <input class="form-check-input checkBox" type="checkbox" name="Game Development" value="" id="Game Development">
                        <label class="form-check-label" for="Game Development">
                        Game Development
                        </label><br>
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
    <!-- bootstrap javascript  -->

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

    $(document).ready(function (){

        $('.change-image').on('click',function (){

            // image validation 
            var image = ''
                    if( document.getElementById("image").files.length != 0 ){
                        // get image name 
                        image =  $('#image').val().split('.').pop().toLowerCase();
                        
                        const fileAllowed = ['jpg', 'jpeg', 'png']
                        if ($.inArray(image, fileAllowed) == -1) {
                            // display image error 
                            $('.image-error').html("file not allowed")
                        }
                        else{
                            $("#exampleModal").modal('hide')
                            // update the image  and reload page 
                        }
             
                    }
          
        })

        $(".change-name-icon").on("click", function(){
            $("#exampleModalLabel").html("Change Your Name")
            $(".skills-list").hide()
            $(".experience").hide()
            $(".interest-list").hide()
            $(".modal-input").show()
            $(".modal-input").attr("placeholder","Enter your Name")

            $(".save-changes").on("click",function (){
                // get input length 
                var name = $(".modal-input").val()
                if(name == ""){
                    $(".modal-error").text("No Value Entered")
                }
                else{
                    // add the value to the database and reload the page 

                    $.ajax({
                        type: "POST",
                        url: "profile-update.php",
                        data:{
                            name: name
                        },
                        success: function(data){
                            if(data == "successfull"){
                                location.reload();
                            }
                            else if(data == "error"){
                                $(".modal-error").text("Error while making changes")
                            }
                        }
                    })
                }

            })
        })

        $(".change-location-icon").on("click", function(){
            $("#exampleModalLabel").html("Change Your Location")
            $(".skills-list").hide()
            $(".interest-list").hide()
            $(".experience").hide()
            $(".modal-input").show()
            $(".modal-input").attr("placeholder","Enter your Location")

            $(".save-changes").on("click",function (){
                // get input length 
                var user_location = $(".modal-input").val()
                if(user_location == ""){
                    $(".modal-error").text("No Value Entered")
                }
                else{
                    // add the value to the database and reload the page 
                    $.ajax({
                        type: "POST",
                        url: "profile-update.php",
                        data:{
                            user_location: user_location
                        },
                        success: function(data){
                            console.log(data)
                            if(data == "successfull"){
                                location.reload();
                            }
                            else if(data == "error"){
                                $(".modal-error").text("Error while making changes")
                            }
                        }
                    })
                }

            })
        })

        $(".change-professionality-icon").on("click", function(){
            $("#exampleModalLabel").html("Change Your Skills")
            $(".modal-input").hide()
            $(".interest-list").hide()
            $(".experience").hide()
            $(".skills-list").show()
            
            
            $(".save-changes").on("click",function (){
                if ($('[name=skills-list]').val() == 'Choose Category'){
                    $(".modal-error").text("No Category Selected")
                }
                else{
                    var categoryType = $('[name=skills-list]').val()
                    // add the value to the database and reload the page 
                    $.ajax({
                        type: "POST",
                        url: "profile-update.php",
                        data:{
                            categoryType: categoryType
                        },
                        success: function(data){
                            console.log(data)
                            if(data == "successfull"){
                                location.reload();
                            }
                            else if(data == "error"){
                                $(".modal-error").text("Error while making changes")
                            }
                        }
                    })
                }
            })
                
        })

        $(".change-interests-icon").on("click", function(){
            $("#exampleModalLabel").html("Change Your Interests")
            $(".skills-list").hide()
            $(".interest-list").show()
            $(".experience").hide()
            $(".modal-input").hide()

            $(".save-changes").on("click",function (){
                
                // get all the interest values 
                var interests = []
                $('input[type=checkbox]').each(function() {
                if ($(this).is(":checked")) {
                    interests.push($(this).attr('name'))
                }
                });

                if(interests.length === 0){
                    $(".modal-error").text("Please Select any interest")
                }
                else{
                    var categoryType = $('[name=skills-list]').val()
                    // add the value to the database and reload the page 
                    $.ajax({
                        type: "POST",
                        url: "profile-update.php",
                        data:{
                            interests: interests
                        },
                        success: function(data){
                            console.log(data)
                            if(data == "successfull"){
                                location.reload();
                            }
                            else if(data == "error"){
                                $(".modal-error").text("Error while making changes")
                            }
                        }
                    })
                }
            })
        })

        $(".change-experience-icon").on("click", function(){
            $("#exampleModalLabel").html("Change Your Interests")
            $(".skills-list").hide()
            $(".interest-list").hide()
            $(".modal-input").hide()
            $(".experience").show()

            $(".save-changes").on("click",function (){
                
                // get input length 
                var experience = $(".experience").val()
                if(experience <1 || experience > 30){
                    $(".modal-error").text("Invalid Experience")
                }
                else{
                    var categoryType = $('[name=skills-list]').val()
                    // add the value to the database and reload the page 
                    $.ajax({
                        type: "POST",
                        url: "profile-update.php",
                        data:{
                            experience: experience
                        },
                        success: function(data){
                            console.log(data)
                            if(data == "successfull"){
                                location.reload();
                            }
                            else if(data == "error"){
                                $(".modal-error").text("Error while making changes")
                            }
                        }
                    })
                }
            })
        })
      

  
    })
    
    function deletePost(post_id){
        console.log("delete clicked",post_id)
        $(".modal-delete-confirmation").on("click",function () { 
            $.ajax({
                type: "POST",
                url: "post-delete.php",
                data:{
                    post_id: post_id
                },
                success: function(data){
                    if(data == "deleted successfully"){
                        console.log("post deleted")
                        location.reload()
                    }
                    else{
                        console.log(data)
                        $("#delete-modal").hide()
                    }
                }
            })
         })
        
    }
    </script>
</body>

</html>