$(document).ready(function () {

    // Post handler 

    $('.post-submit').on('click', () => {
        // post text 
        const postText = $('.post-text').val()
        // post image 
        var ext = $('.post-image').val().split('.').pop().toLowerCase();

        const error = []

        if (postText.trim() == '')
            error.push("Input Field is Empty")

        // if text is more than 450 characters 
        if (postText.trim().length > 450) {
            error.push('error in text input<br>')
        }

        // applying checks on image 
        if (ext != '') {
            const fileAllowed = ['jpg', 'jpeg', 'png']
            if ($.inArray(ext, fileAllowed) == -1) {
                // display image error 
                error.push("file not allowed")
            }
        }

        // if we have error in the error Array and there is not previous error displayed on the screen 
        if((error.length != 0 || error.length != null) && ($('.error').is(':empty'))){
            $('.error').append(error)
        }

        // if we dont have any error in the error Array and there is some previous error displayed on the screen 
        if((error.length == 0 || error.length == null) && (!$('.error').is(':empty'))){
            // empty any error displayed on the span tag 
            $('.error').empty()
        }
        
        // if error array has no error then we are successful to add the value into the database
        if(error.length ==0 ) {
            console.log("Post is Successfull")
        }

    })

})