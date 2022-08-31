$(document).ready(function() {
    $('#register').click(function(e) {

        $("#form-register").validate({
            // Specify validation rules
            rules: {
                // The key name on the left side is the name attribute
                // of an input field. Validation rules are defined
                // on the right side
                password: "required",
                confirm_password: "required",
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
                password: {
                    required: "",
                    // minlength: "Your password must be at least 5 characters long"
                },
                username: "",
                confirm_password: "",
                tenant: "",
                tenancy: "",
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
                            confirmButtonText: 'OK'
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
                    confirmButtonText: 'OK'
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