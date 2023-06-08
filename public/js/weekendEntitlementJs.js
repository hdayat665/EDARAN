$("#saveButton").click(function (e) {
    $("#addForm").validate({
        // Specify validation rules
        rules: {
            addcountry: "required",
        },

        messages: {
            addcountry: "Please add Country",
        },
        submitHandler: function (form) {
            requirejs(["sweetAlert2"], function (swal) {
                var data = new FormData(document.getElementById("addForm"));
                console.log(document.getElementById("addForm"));
                // return false;

                // var data = $('#tree').jstree("get_selected");

                $.ajax({
                    type: "POST",
                    url: "/createWeekendEntitlement",
                    data: data,
                    dataType: "json",

                    processData: false,
                    contentType: false,
                }).then(function (data) {
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