$(document).ready(function () {
    $('#register').submit(function (e) {
        e.preventDefault();
        let form = $(this);

        if (form.valid() === false) return false;

        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serialize(),
            success: function (data) {
                let result = parseInt(data);

                if (result === 0) {
                    $('#success-message').html('');
                    $('#error-message').html('Registration failed.');
                } else if (result === -1) {
                    $('#success-message').html('');
                    $('#error-message').html('The same login exists.');
                } else {
                    $('#success-message').html('Registration is successful, please login. Redirecting in 3 sec.');
                    $('#error-message').html('');

                    window.setTimeout(function(){
                        window.location.href = "/login";
                    }, 3000);
                }
            },
            error: function () {
                $('#success-message').html('');
                $('#error-message').html('Registration failed.');
            }
        });
    });
});