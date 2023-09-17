$(document).ready(function () {

    $("#rejectAppealB").click(function (e) {
        $("#reasonReject").validate({
            rules: {
                reasonreject: "required",
                
                
            },

            messages: {
                reasonreject: "Please Insert Reason",
               
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("reasonReject")
                    );
                    var id = $("#randomN").val();
                        // console.log(id);
                        // return false;
                    $.ajax({
                        type: "POST",
                        url: "/rejectAppealEmail/" + id,
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
