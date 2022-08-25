$(document).ready(function () {
    $('#username-error').hide();
    $('#password-error').hide();
    $('#password-confirm-error').hide();

    (function () {
        'use strict'
        const forms = document.querySelectorAll('.requires-validation')

        Array.from(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                    $('#username-error').hide();
                    $('#password-error').hide();
                    $('#password-confirm-error').hide();
                }, false)
            })
    })()
});