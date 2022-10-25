$(document).ready(function() {

    $("#resetPass").click(function(e) {
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
                    minlength: 5
                }
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
                        document.getElementById("resetPassForm")
                    );
                    $.ajax({
                        type: "POST",
                        url: "/ajaxResetPass",
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
                        }).then(function() {
                            if (data.type == "error") {} else {
                                window.location.href = "/loginTenant";
                            }
                        });
                    });
                });
            },
        });
    });
});