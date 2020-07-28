$(document).ready(function () {

    $('.signin-btn').on('click', () => {

        var errors = ''
        // get all the fields from the form 
        const name = $('.name').val()
        const location = $('.location').val()
        const email = $('.email').val()
        const password = $('.password').val()
        const confirmPassword = $('.confirm-password').val()
        const experience = $('.experience').val()
        var image = $('.post-image').val().split('.').pop().toLowerCase();


        if (name.trim().length == 0)
            errors = 'Please Enter Your Name'
        else if (location.trim().length == 0)
            errors = 'Please Enter Your Location'

        else if (email.trim().length == 0)
            errors = 'Please Enter Your Email Address'

        else if (password.trim().length == 0)
            errors = 'Please Enter Your Password'

        else if (confirmPassword.trim().length == 0)
            errors = 'Please Confirm your Pasword'

        else if (confirmPassword != password)
            errors = "Password does not match"

        if ($(".checkBox").is(":checked"))
            console.log("check box selected")
        else
            errors = "Please Select Any of the Interests"

        if ($('[name=experience-dropdown]').val() == 'Select Your Professionality')
            errors = 'Please Select Your Professionality'
        else if (experience < 1 || experience > 30)
            errors = "Invalid Experience"

        // check on image from the user 
        
        if (image != '') {
            const fileAllowed = ['jpg', 'jpeg', 'png']
            if ($.inArray(image, fileAllowed) == -1) {
                // display image error 
                errors = "Image must be jpg, jpeg or png"
            }
        }

        if (errors != '' && $('.error').is(':empty'))
            $('.error').html(errors)
        else{
            $('.error').empty()
            // create the user account here 
        }
            
    })
})