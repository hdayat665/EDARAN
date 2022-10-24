$(document).ready(function() {
    $('#register').click(function(e) {

        $.validator.addMethod("password",function(value,element){
            return this.optional(element) || /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/i.test(value);
        },"Passwords must contain minimum 8 characters, at least one uppercase letter, one lowercase letter, one number and one special character");

        $("#form-register").validate({
            // Specify validation rules
            rules: {
                // The key name on the left side is the name attribute
                // of an input field. Validation rules are defined
                // on the right side
                firstName: "required",
                lastName: "required",
                workingEmail: {
                    required: true,
                    email: true
                },
                phoneNo: {
                    required: true,
                    number: true,
                    
                    // minlength: "Your password must be at least 5 characters long"
                },
                password: {
                    required: true,
                    
                },
                confirm_password: {
                    required: true,
                    minlength: 8,
                    equalTo: "#password"
                    // minlength: "Your password must be at least 5 characters long"
                },
                tenant: "required",
                tenancy: "required",
                username: {
                    required: true,
                    // Specify that email should be validated
                    // by the built-in "email" rule
                    email: true
                },
                // password: {
                //     required: true,
                //     minlength: 5
                // }
            },

            // Specify validation error messages
            messages: {
                firstName: "Please Insert First Name",
                lastName: "Please Insert Last Name",
                workingEmail: {
                    required: "Please Insert Email Address",
                    email: "Please Provide Valid Email Address",
                    
                },
                phoneNo: {
                    required: "Please Insert Phone Number",
                    number: "Enter Valid Phone Number Without ' - ' And Space ",
                    
                    // minlength: "Your password must be at least 5 characters long"
                },
                password: {
                    required: "Please Insert Password"
                },
                username: {
                    required: "Please Insert Email Address",
                    // Specify that email should be validated
                    // by the built-in "email" rule
                    email: "Enter Correct Email Address"
                },
                confirm_password: {
                    required: "Please Insert Password",
                    minlength: "Your password must be at least 8 characters long",
                    equalTo: "Check Your password"
                },
                tenant: "Please Insert Domain Name",
                tenancy: "Please Insert Company Name",
            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function(form) {



                requirejs(['sweetAlert2'], function(swal) {

                    var data = new FormData(document.getElementById("form-register"));

                    $.ajax({
                        type: "POST",
                        url: "/saveRegisterTenant",
                        data: data,
                        dataType: "json",
                        async: false,
                        processData: false,
                        contentType: false,
                    }).done(function(data) {
                        console.log(data);
                        swal({
                            title: data.title,
                            text: data.msg,
                            type: data.type,
                           confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                        }).then(function() {
                            if (data.type == 'error') {

                            } else {
                                window.location.href = "/loginTenant";

                            }


                        });
                    });

                });
            }
        });
    });




    $('#login').click(function(e) {

        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("loginForm"));

            $.ajax({
                type: "POST",
                url: "/api/login/",
                data: data,
                dataType: "json",
                async: false,
                processData: false,
                contentType: false,
            }).done(function(data) {
                // console.log(data);
                swal({
                    title: data.title,
                    text: data.msg,
                    type: data.type,
                     confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                }).then(function() {
                    if (data.type == 'error') {

                    } else {
                        window.location.href = "/dashboardTenant";

                    }


                });
            });

        });
    });
})