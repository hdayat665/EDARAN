$(document).ready(function () {
    $("#recipient-name").keypress(function (event) {
        if (event.which === 13) {
            event.preventDefault(); // Prevent default form submission behavior
            submitForm(); // Call the function to handle form submission
        }
    });

    // Function to handle form submission
    function submitForm() {
        requirejs(["sweetAlert2"], function (swal) {
            var data = new FormData(document.getElementById("submitForm"));

            $.ajax({
                type: "POST",
                url: "/checkTenant",
                data: data,
                dataType: "json",
                processData: false,
                contentType: false,
            }).then(function (data) {
                console.log(data);
                swal({
                    title: data.title,
                    text: data.msg,
                    type: data.type,
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                }).then(function () {
                    if (data.type != "error") {
                        var tenantElement = document.getElementById("tenant");
                        if (tenantElement) {
                            tenantElement.innerHTML = data.data;
                        }
                        $("#tenantInput").val(data.data);

                        // Store the value in session storage
                        localStorage.setItem("dataValue", data.data);

                        window.location.href = "/loginTenant";
                    }
                });
            });
        });
    }

    // Listen for button click
    $("#tenantNameSubmit").click(function (event) {
        event.preventDefault(); // Prevent default form submission behavior
        submitForm(); // Call the function to handle form submission
    });


// Retrieve the value from session storage
var dataValue = localStorage.getItem("dataValue");


// Update the value of the <span> element
var tenantElement = document.getElementById("tenant");
if (tenantElement) {
tenantElement.innerText = dataValue || "not selected";
}

var tenantInput = document.getElementById("tenantInput");
if (tenantInput) {
tenantInput.value = dataValue || "";
}



$(document).ready(function () {
    // Check if there are remembered values in localStorage
    var rememberedEmailAddress = localStorage.getItem("rememberedEmailAddress");
    var rememberedPassword = localStorage.getItem("rememberedPassword");

    // Pre-fill the input fields with the remembered values (if any)
    if (rememberedEmailAddress) {
        $("#emailAddress").val(rememberedEmailAddress);
    }

    if (rememberedPassword) {
        $("#password").val(rememberedPassword);
    }

    $("#login").click(function (e) {
        $("#loginForm").validate({
            // Specify validation rules
            rules: {
                password: "required",
                username: {
                    required: true,
                },
            },

            // Specify validation error messages
            messages: {
                password: "Please Insert Password",
                username: "Please Insert Username",
            },

            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function (form) {
                // Check if the "Remember Me" checkbox is checked
                var rememberMeChecked = $("#rememberMe").is(":checked");

                // If "Remember Me" is checked, save the values to localStorage
                if (rememberMeChecked) {
                    var emailAddress = $("#emailAddress").val();
                    var password = $("#password").val();

                    // Save the values to localStorage
                    localStorage.setItem("rememberedEmailAddress", emailAddress);
                    localStorage.setItem("rememberedPassword", password);
                }

                // Make the AJAX POST request
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(document.getElementById("loginForm"));

                    $.ajax({
                        type: "POST",
                        url: "/login/tenant",
                        data: data,
                        dataType: "json",
                        processData: false,
                        contentType: false,
                    }).then(function (data) {
                        // Handling the response data from the server
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
                                // Handle error case if needed
                            } else {
                                // Redirect to the dashboardTenant page upon successful login
                                window.location.href = "/dashboardTenant";
                            }
                        });
                    });
                });
            },
        });
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
    //
    //             processData: false,
    //             contentType: false,
    //         }).then(function(data) {
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

    $("#loginHost").click(function (e) {
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
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("loginHostForm")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/login/host",
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
                                window.location.href = "/dashboardHost";
                            }
                        });
                    });
                });
            },
        });
    });

    $("#forgotPassEmail").click(function (e) {
        $("#forgotPassEmailForm").validate({
            rules: {
                tenant_name: {
                    required: true,
                },
                username: {
                    required: true,
                    email: true
                },
            },
            messages: {
                tenant_name: {
                    required: "Please Insert Domain Name",
                },
                username: {
                    required: "Please Insert Working Email",
                    email: "Please Insert Valid Working Email"
                },
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                var data = new FormData(document.getElementById("forgotPassEmailForm"));

                    $.ajax({
                        type: "POST",
                        url: "/forgotPassEmail",
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
                                location.reload();
                            }
                        });
                    });
                });
            }
        });
    });

    $("#forgotDomainEmail").click(function (e) {
        $("#forgotDomainForm").validate({
            // Specify validation rules
            rules: {
                username: {
                    required: true,
                    email: true
                },
            },
            messages: {
                username: {
                    required: "Please Insert Email Address",
                    email: "Email Address Does Not Exist"
                },
            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {

                    $("#forgotDomainEmail").prop("disabled", true);

                    var data = new FormData(document.getElementById("forgotDomainForm"));

                    $.ajax({
                        type: "POST",
                        url: "/forgotDomainEmail",
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
                                window.location.href = "/domainName";
                            }
                        });
                    });
                });
            },
        });
    });


    $("#activationButton").click(function (e) {
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
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("activationForm")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/activationEmail",
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
                                location.reload();
                            }
                        });
                    });
                });
            },
        });
    });

    $("#activationButton2").click(function (e) {
        $("#activationForm2").validate({
            // Specify validation rules
            rules: {
                // The key name on the left side is the name attribute
                // of an input field. Validation rules are defined
                // on the right side
                tenant_name: {
                    required: true,
                },
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
                tenant_name: {
                    required: "Please Insert Domain Name",
                },
                username: {
                    required: "Please Insert Working Email",
                    email: "Please Insert Valid Working Email"
                },
            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("activationForm2")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/activationEmail2",
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
                                location.reload();
                            }
                        });
                    });
                });
            },
        });
    });
});
