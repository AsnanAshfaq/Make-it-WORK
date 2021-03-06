
<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['user_id']);

?>
<!DOCTYPE html>
<html>

<head>
    <title>Sign In</title>
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
    class="img-responsive">

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
                style=" border-radius: 15px; opacity: 90%; top: 0px; left: 8px; font-size: 15px;">
                <h3 class="text-center pt-3" style="color: blanchedalmond; user-select: none;">Sign In</h3><br>

                <!-- <form action="signIn.php" method="POST"> -->
                    <div class="form-group position-relative">
                        <span class="fas fa-envelope position-absolute"
                            style="top: 12px; left: 10px; font-size: 15px;"></span>
                        <input class="form-control email" style=" text-indent: 30px;" name="email"
                            placeholder="Email Address">
                    </div>

                    <div class="form-group position-relative">
                        <span class="fas fa-key position-absolute"
                            style="top: 12px; left: 10px; font-size: 15px;"></span>
                        <input type="password" class="form-control password" name="Password" style=" text-indent: 30px;"
                            placeholder="Password">
                    </div>

                    <h5 class="text-danger error"></h5>

                    <button type="submit" class="btn btn-secondary btn-round btn-block mb-2 signin-btn">
                        <h5>Sign In</h5>
                    </button>
                <!-- </form> -->

                <div style="color: blanchedalmond; user-select: none;"> Don't have an account?
                    <a href="SignUp.php" class="text-bold signup-a cus-blue-color">
                        <b>Sign Up Now</b>
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

    $('.signin-btn').on('click', () => {

        const errors = []
        // get the email id and password 
        const email = $('.email').val()
        const password = $('.password').val()

        // email validation 
        const email_format = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;


        // if email and password are empty
        if (email.trim().length == 0) errors.push('Please Enter Email<br>')
        if (password.trim().length == 0) errors.push('Please Enter Password')
        if(!email_format.test(String(email).toLowerCase())) {
            errors.push('Invalid Email')
        }
        if (errors.length != 0 && $('.error').is(':empty')) {
            $('.error').html(errors)
        }

        else
            $('.error').empty()

            // let the user sign in here -------
            $.ajax({
                type: "POST",
                url: 'SignInAuthentication.php',
                data: {
                    email: email,
                    password: password
                },
                success: function(data){
                    
                    if(data == 'invalid'){
                        errors.push('Incorrect Email or Password')
                        $('.error').html(errors)
                        
                    }
                    else{
                        window.location.replace("http://localhost/Make%20It%20Work/");
                    }
                }
            })

    })
    })

    </script>

</body>

</html>