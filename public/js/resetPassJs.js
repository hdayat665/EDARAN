$(document).ready(function () {
    $("#resetPass").click(function (e) {
        $("#resetPassForm").validate({
            // Specify validation rules
            rules: {
                // The key name on the left side is the name attribute
                // of an input field. Validation rules are defined
                // on the right side
                // password: "required",
                confirm_password: "required",
                password: {
                    required: true,
                    minlength: 5,
                },
            },

            // Specify validation error messages
            messages: {
                password: {
                    required: "This field required.",
                    minlength: "Your password must be at least 5 characters long."
                },
                confirm_password: "This field required.",
            },

            errorPlacement: function(error, element) {
                if (element.attr("name") === "password") {
                    error.insertAfter("#password-err");
                } else if (element.attr("name") === "confirm_password") {
                    error.insertAfter("#confirm_password-err");
                } else {
                    error.insertAfter(element);
                }
            },

            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("resetPassForm")
                    );
                    $.ajax({
                        type: "POST",
                        url: "/ajaxResetPass",
                        data: data,
                        dataType: "json",

                        processData: false,
                        contentType: false,
                    }).then(function (data) {
                        // console.log(data);
                        swal({
                            title: data.title,
                            text: data.msg,
                            type: data.type,
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "OK",
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                        }).then(function () {
                            if (data.type == "error") {
                            } else {
                                window.location.href = "/loginTenant";
                            }
                        });
                    });
                });
            },
        });
    });
});

//show password
$(document).ready(function () {
    const isEdge = /Edg/.test(navigator.userAgent);
    if (isEdge) {
        // Hide the custom reveal button if the browser is Microsoft Edge
        var style = document.createElement('style');
        style.type = 'text/css';
        style.innerHTML = 'input[type="password"]::-ms-reveal { display: none; }';
        document.getElementsByTagName('head')[0].appendChild(style);
    } 

    // Function to toggle password visibility
    function togglePasswordVisibility(inputId, iconId) {
        const passwordInput = document.getElementById(inputId);
        const passwordIcon = document.getElementById(iconId);

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            passwordIcon.classList.remove("fa-eye-slash");
            passwordIcon.classList.add("fa-eye");
        } else {
            passwordInput.type = "password";
            passwordIcon.classList.remove("bi-eye");
            passwordIcon.classList.add("fa-eye-slash");
        }
    }

    // Toggle password visibility when the eye icon is clicked
    $("#show-password").click(function () {
        togglePasswordVisibility("password", "password-toggle");
    });

    $("#show-confirm-password").click(function () {
        togglePasswordVisibility("confirm_password", "confirm-password-toggle");
    });
    
});
