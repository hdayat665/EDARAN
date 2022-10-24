$(document).ready(function() {
    $("#tenantNameSubmit").click(function(e) {
        requirejs(["sweetAlert2"], function(swal) {
            var data = new FormData(document.getElementById("submitForm"));

            $.ajax({
                type: "POST",
                url: "/checkTenant",
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
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                }).then(function() {
                    if (data.type == "error") {} else {
                        $("#exampleModal").modal("hide");
                        document.getElementById("tenant").textContent =
                            data.data;
                        $("#tenantInput").val(data.data);
                    }
                });
            });
        });
    });

    $("#login").click(function(e) {
        $("#loginForm").validate({
            // Specify validation rules
            rules: {
                // The key name on the left side is the name attribute
                // of an input field. Validation rules are defined
                // on the right side
                password: "required",
                username: {
                    required: true,
                    // Specify that email should be validated
                    // by the built-in "email" rule
                    // email: true
                },
                
            },

            // Specify validation error messages
            messages: {
                password: "Please Insert Password",
                username: "Please Insert Username",
            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function(form) {
                requirejs(["sweetAlert2"], function(swal) {
                    var data = new FormData(
                        document.getElementById("loginForm")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/login/tenant",
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
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "OK",
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            
                        }).then(function() {
                            if (data.type == "error") {} else {
                                window.location.href = "/dashboardTenant";
                            }
                        });
                    });
                });
            },
        });
    });

    // $('#login').click(function(e) {
    //     this.form.checkValidity(); // for demonstration purposes only, will always b "true" here, in this case, since HTML5 validation will block this "click" event if form invalid (i.e. if "required" field "foo" is empty)
    //     // $("#valid").html(valid);

    //     requirejs(['sweetAlert2'], function(swal) {

    //         var data = new FormData(document.getElementById("loginForm"));

    //         $.ajax({
    //             type: "POST",
    //             url: "/login/tenant",
    //             data: data,
    //             dataType: "json",
    //             async: false,
    //             processData: false,
    //             contentType: false,
    //         }).done(function(data) {
    //             // console.log(data);
    //             swal({
    //                 title: data.title,
    //                 text: data.msg,
    //                 type: data.type,
    //                 confirmButtonColor: '#3085d6',
    //                 confirmButtonText: 'OK'
    //             }).then(function() {
    //                 if (data.type == 'error') {

    //                 } else {
    //                     window.location.href = "/dashboardTenant";

    //                 }

    //             });
    //         });

    //     });
    // });

    $("#loginHost").click(function(e) {
        $("#loginHostForm").validate({
            // Specify validation rules
            rules: {
                // The key name on the left side is the name attribute
                // of an input field. Validation rules are defined
                // on the right side
                password: "required",
                username: {
                    required: true,
                    // Specify that email should be validated
                    // by the built-in "email" rule
                    // email: true
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
            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function(form) {
                requirejs(["sweetAlert2"], function(swal) {
                    var data = new FormData(
                        document.getElementById("loginHostForm")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/login/host",
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
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "OK",
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                        }).then(function() {
                            if (data.type == "error") {} else {
                                window.location.href = "/dashboardHost";
                            }
                        });
                    });
                });
            },
        });
    });

    $('#forgotPassEmail').click(function(e) {
        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("forgotPassEmailForm"));
            // var data = $('#tree').jstree("get_selected");

            $.ajax({
                type: "POST",
                url: "/forgotPassEmail",
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
                        location.reload();
                    }


                });
            });

        });
    });

    $("#activationButton").click(function(e) {
        $("#activationForm").validate({
            // Specify validation rules
            rules: {
                // The key name on the left side is the name attribute
                // of an input field. Validation rules are defined
                // on the right side
                username: {
                    required: true,
                    // Specify that email should be validated
                    // by the built-in "email" rule
                    // email: true
                },
                // password: {
                //     required: true,
                //     minlength: 5
                // }
            },

            // Specify validation error messages
            messages: {
                username: "",
            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function(form) {
                requirejs(["sweetAlert2"], function(swal) {
                    var data = new FormData(
                        document.getElementById("activationForm")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/activationEmail",
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
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "OK",
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                        }).then(function() {
                            if (data.type == "error") {} else {
                                window.location.href = "/";
                            }
                        });
                    });
                });
            },
        });
    });
});