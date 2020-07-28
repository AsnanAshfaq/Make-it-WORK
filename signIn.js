$(document).ready(function () {

    $('.signin-btn').on('click', () => {

        const errors = []
        // get the email id and password 
        const email = $('.email').val()
        const password = $('.password').val()

        // if email and password are empty
        if (email.trim().length == 0) errors.push('Please Enter Email<br>')
        if (password.trim().length == 0) errors.push('Please Enter Password')

        if (errors.length != 0 && $('.error').is(':empty')) {
            $('.error').html(errors)
        } else
            $('.error').empty()

            // let the user sign in here -------

    })
})