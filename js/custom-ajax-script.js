jQuery(document).ready(function($) {
    // Apply input mask to phone number field
    $('input[name="phoneNumber"]').on('input', function(e) {
        // Remove all non-digit characters
        var input = $(this).val().replace(/\D/g, '');

        // Format the phone number
        var formatted = input;
        if (input.length > 3) {
            formatted = '(' + input.substr(0, 3) + ') ' + input.substr(3, 3);
        }
        if (input.length > 6) {
            formatted += '-' + input.substr(6, 4);
        }

        // Set the formatted value back to the input field
        $(this).val(formatted);
    });

function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}

	function handleSubmit(event) {
        event.preventDefault();
        const form = event.target;

        // Execute Turnstile challenge and get the token
        turnstile.execute(document.querySelector('.cf-turnstile'), {
            callback: function(token) {
                document.getElementById('turnstile_token').value = token;
                submitFormWithAjax(form);
            }
        });
    }
    

    // Function to submit form via AJAX
    function submitFormWithAjax(form) {
    
    // Capture the hutk value from the cookies
    const hutk = getCookie('hubspotutk');
    
    // Convert form data to URLSearchParams
    const data = new URLSearchParams();
    const formData = new FormData(form);
    
    formData.forEach((value, key) => {
        data.append(key, value);
    });

    data.append('action', 'submit_contact_form');
	if (hutk) {
        data.append('hutk', hutk);
    }
    fetch(ajax_object.ajax_url, {
        method: 'POST',
        body: data,
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-Requested-With': 'XMLHttpRequest'
        }
    }).then(response => response.json())
    .then(data => {
        if (data.success) {
            displayMessage('Form submission successful', 5000);
            form.reset();
        } else {
            console.log(JSON.stringify(data));
            const errorMessage = data.data && data.data.message ? data.data.message : 'Form submission failed';
            const errors = data.data && data.data.errors ? data.data.errors.join(', ') : '';
            displayMessage(`${errorMessage}: ${errors}`, 5000, true);
        }
    }).catch(error => {
        console.error('Error:', error);
        displayMessage('Error occurred: ' + error.message, 5000, true);
    });
}


    // Bind handleSubmit function to form submission events
    $('#homepage_hubspot1, #homepage_hubspot2, #homepage_hubspot3').on('submit', handleSubmit);

    // Function to display all validation errors
    function displayErrors(errors) {
        $('.error-message').remove();

        errors.forEach(function(error) {
            var errorElement = $('<div>').addClass('error-message').text(error).css('color', 'red');

            if (error.includes('First Name') || error.includes('alphanumeric')) {
                $('input[name="firstName"]').after(errorElement).addClass('error');
            } else if (error.includes('Last Name') || error.includes('alphanumeric')) {
                $('input[name="lastName"]').after(errorElement).addClass('error');
            } else if (error.includes('Company Name') || error.includes('alphanumeric')) {
                $('input[name="companyName"]').after(errorElement).addClass('error');
            } else if (error.includes('Phone Number') || error.includes('numeric')) {
                $('input[name="phoneNumber"]').after(errorElement).addClass('error');
            } else if (error.includes('Email')) {
                $('input[name="workemail"]').after(errorElement).addClass('error');
            } else if (error.includes('Tell us about your project.')) {
                $('textarea[name="message"]').after(errorElement).addClass('error');
            }
        });
    }

    // Function to display a message on the page
    function displayMessage(message, duration, isError = false) {
        var messageElement = $('<p>').text(message);

        if (isError) {
            messageElement.css({
                'color': 'white',
                'background-color': 'red',
                'padding': '10px',
                'border-radius': '5px'
            });
        }

        $('#successMessage').empty().append(messageElement);

        setTimeout(function() {
            $('#successMessage').empty();
        }, duration);
    }
});