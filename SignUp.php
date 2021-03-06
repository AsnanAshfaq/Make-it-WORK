<!DOCTYPE html>
<html>

<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css"
        integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
</head>

<body style="background-image:url('./images/code.jpg');background-repeat: no-repeat; background-size: cover;"
    class="img-fluid">

    <!-- website logo  -->
    <div class="row m-0">
        <div class="col d-flex justify-content-center">
            <a href="index.html">
                <img src="logo.png" alt="logo">
            </a>
        </div>
    </div>

    <div class="container text-center">

        <div class="row  m-0 d-flex justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm col-xs  mt-2 mx-0 bg-dark"
                style=" border-radius: 15px; opacity: 80%; top: 0px; left: 8px; font-size: 15px;">
                <h3 class="text-center pt-3" style="color: blanchedalmond; user-select: none;">Sign Up</h3><br>

                <form action="" method="POST" enctype="multipart/form-data" >
                    <div class="form-group position-relative">
                        <span class="fas fa-user position-absolute"
                            style="top: 12px; left: 10px; font-size: 15px;"></span>
                        <input class="form-control name" name="name" maxlength="25" style=" text-indent: 30px;" placeholder="Name">
                    </div>

                    <div class="form-group position-relative">
                        <span class="fas fa-map-marker position-absolute"
                            style="top: 12px; left: 10px; font-size: 15px;"></span>
                        <input class="form-control location" name="location" style=" text-indent: 30px;" placeholder="Location" type="text"
                            maxlength="25">
                    </div>

                    <div class="form-group position-relative">
                        <span class="fas fa-envelope position-absolute"
                            style="top: 12px; left: 10px; font-size: 15px;"></span>
                        <input class="form-control email" name="email" style=" text-indent: 30px;" placeholder="Email Address">
                    </div>

                    <div class="form-group position-relative">
                        <span class="fas fa-key position-absolute"
                            style="top: 12px; left: 10px; font-size: 15px;"></span>
                        <input type="password" name="password" class="form-control password" maxlength="15" style=" text-indent: 30px;" placeholder="Password">
                    </div>
                    <div class="form-group position-relative">
                        <span class="fas fa-key position-absolute"
                            style="top: 12px; left: 10px; font-size: 15px;"></span>
                        <input type="password" class="form-control confirm-password" maxlength="15" style=" text-indent: 30px;"
                            placeholder="Confirm Password">
                    </div>


                    <div class="form-group position-relative">
                        <h4 class="text-light" style="user-select: none;">Your Interests</h4>

                        <input class="form-check-input checkBox" type="checkbox" name="Graphic Designing" value="" id="Graphic Designing">
                        <label class="form-check-label text-light" for="Graphic Designing">
                            Graphic Designing
                        </label>
                        <br>
                        <input class="form-check-input checkBox" type="checkbox" name="Web Designing" value="" id="Web Designing">
                        <label class="form-check-label text-light" for="Web Designing">
                            Web Designing
                        </label><br>

                        <input class="form-check-input checkBox" type="checkbox" name="Web Development" value="" id="Web Development">
                        <label class="form-check-label text-light" for="Web Development">
                            Web Development
                        </label><br>

                        <input class="form-check-input checkBox" type="checkbox" name="Mobile App Development" value="" id="Mobile Development">
                        <label class="form-check-label text-light" for="Mobile Development">
                            Mobile App Development
                        </label><br>

                        <input class="form-check-input checkBox" type="checkbox" name="Data Scientist" value="" id="Data Scientist">
                        <label class="form-check-label text-light" for="Data Scientist">
                            Data Scientist
                        </label><br>

                        <input class="form-check-input checkBox" type="checkbox" name="Game Development" value="" id="Game Development">
                        <label class="form-check-label text-light" for="Game Development">
                        Game Development
                        </label><br>
                    </div>

                    <div class="form-group position-relative">
                        <select class="form-control" name="experience-dropdown">
                            <option>Select Your Professionality</option>
                            <option>Graphic Designing</option>
                            <option>Web Designing</option>
                            <option>Web Development</option>
                            <option>Mobile App Development</option>
                            <option>Game Development</option>
                            <option>Data Scientist</option>
                        </select>
                    </div>

                    <div class="form-group positive-relative">
                        <input type="number" name="experience" class="form-control experience" min="1" max="30"
                            placeholder="Year's of experience you have in your field" aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>
                    <div class="form-group position-relative">
                        <div class="row">
                            <div class="col-7 d-flex justify-content-end ">
                                <button class="btn btn-light shadow-none" type="button" aria-expanded="false">
                                    Upload Image
                                </button>
                            </div>
                            <div class="col-5 my-2">
                                <input type="file" name="image" id="image" class="form-control-file post-image text-light">

                            </div>
                        </div>
                    </div>
                    </form>
                
                    <h5 class="text-danger error text-align-left" style="user-select: none;"></h5>

                    <button type="submit" class="btn btn-secondary btn-round btn-block mb-2 signin-btn">
                        <h5>Sign Up</h5>
                    </button>
                    
              
                <div style="color: blanchedalmond;"> Already have account?
                    <a href="signIn.php" class="text-bold signup-a cus-blue-color">
                        <b>Sign In</b>
                    </a>
                </div>
                <br>
            </div>
        </div>
    </div>

    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {

        var errors = ''
        $('.signin-btn').on('click', () => {

        // get all the fields from the form 
        const name = $('.name').val()
        const location = $('.location').val()
        const email = $('.email').val()
         // email validation 
         const email_format = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        const password = $('.password').val()
        const confirmPassword = $('.confirm-password').val()

        var interests = []
        const professionality = $('[name=experience-dropdown]').val();
        const experience = $('.experience').val()

        var image = $('.post-image').val().split('.').pop().toLowerCase();


        if (name.trim().length == 0)
            errors = 'Please Enter Your Name'
        else if (location.trim().length == 0)
            errors = 'Please Enter Your Location'

        else if (email.trim().length == 0)
            errors = 'Please Enter Your Email Address'
        else if(!email_format.test(String(email).toLowerCase())) {
            errors = "Invalid Email"
        }
        else if (password.trim().length == 0)
            errors = 'Please Enter Your Password'
        else if (password.trim().length < 8)
            errors = 'Password must be 8 characters long'
        else if (password.trim().length > 16 )
            errors = 'Password must be less than 15 characters'

        else if (confirmPassword.trim().length == 0)
            errors = 'Please Confirm your Pasword'

        else if (confirmPassword != password)
            errors = "Password does not match"

        else if (!$(".checkBox").is(":checked"))
            errors = "Please Select Any of the Interests"
        
        else if ($('[name=experience-dropdown]').val() == 'Select Your Professionality')
            errors = 'Please Select Your Professionality'
        else if (experience < 1 || experience > 30)
            errors = "Invalid Experience"

        // check on image from the user 
        
        else if (image != '') {
            const fileAllowed = ['jpg', 'jpeg', 'png']
            if ($.inArray(image, fileAllowed) == -1) {
                // display image error 
                errors = "Image must be jpg, jpeg or png"
            }
        }
        else{
            errors = "Please Upload Image";
        }

        
        if (errors != '' && $('.error').is(':empty'))
            $('.error').html(errors)
        else{
            $('.error').empty()
            // create the user account here 

            // get all the interest values 
            
            $('input[type=checkbox]').each(function() {
            if ($(this).is(":checked")) {
                interests.push($(this).attr('name'))
            }
            });


            $.ajax({
                type: "POST",
                url: 'SignUpAuthentication.php',
                data: {
                    name: name,
                    location: location,
                    email: email,
                    password: password,
                    interests: interests,
                    professionality: professionality,
                    experience: experience,
                    image: document.getElementById("image").files[0].name

                },
                success: function (data){
                    
                    if(data == "error" ){
                        $('.error').html(data)
                        
                    }
                    else{
                        window. location. replace('http://localhost/Make%20It%20Work')
                    }
                        
                    
                }
            })
        }

        })
    })
    </script>
  
</body>

</html>