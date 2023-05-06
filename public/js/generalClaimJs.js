$(document).ready(function () {
    $("#cashAdvanceTable").DataTable({});

    $("#createGnc").click(function (e) {
        $("#createForm").validate({
            // Specify validation rules
            rules: {
                year: "required",
                month: "required",
                claim_category: "required",
                amount: "required",
                "file_upload[]": "required",
                claim_category_detail: "required",
            },

            messages: {
                year: "Please Select Year",
                month: "Please Select Month",
                claim_category: "Please Select Claim Category",
                amount: "Please Fill Out Amount",
                "file_upload[]": "Please Upload Attachment",
                claim_category_detail: "Please Insert Category Detail",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("createForm")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/createGeneralClaim",
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
                                window.location.href =
                                    "/editGeneralClaimView/" + data.id;
                            }
                        });
                    });
                });
            },
        });
    });

    $(document).ready(function () {
        $("#amount").on("input", function () {
            var value = $(this).val();
            var decimalCount = (value.split(".")[1] || []).length;
            if (decimalCount > 2) {
                $(this).val(parseFloat(value).toFixed(2));
            }
        });

        $("#amount").blur(function () {
            var value = $(this).val();
            var decimalCount = (value.split(".")[1] || []).length;
            if (decimalCount == 0) {
                $(this).val(value + ".00");
            }
        });
    });

    // $("#createGnc").click(function (e) {
    //     $("#createForm").validate({
    //         // Specify validation rules
    //         rules: {},

    //         messages: {},
    //         submitHandler: function (form) {
    //             requirejs(["sweetAlert2"], function (swal) {
    //                 var data = new FormData(
    //                     document.getElementById("createForm")
    //                 );

    //                 $.ajax({
    //                     type: "POST",
    //                     url: "/createGeneralClaim",
    //                     data: data,
    //                     dataType: "json",
    //
    //                     processData: false,
    //                     contentType: false,
    //                 }).then(function (data) {
    //                     swal({
    //                         title: data.title,
    //                         text: data.msg,
    //                         type: data.type,
    //                         confirmButtonColor: "#3085d6",
    //                         confirmButtonText: "OK",
    //                         allowOutsideClick: false,
    //                         allowEscapeKey: false,
    //                     }).then(function () {
    //                         if (data.type == "error") {
    //                         } else {
    //                             location.reload();
    //                         }
    //                     });
    //                 });
    //             });
    //         },
    //     });
    // });

    $("#saveButton").click(function (e) {
        $("#addForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(document.getElementById("addForm"));

                    $.ajax({
                        type: "POST",
                        url: "/createGeneralClaim",
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
                                window.location.href = "/myClaimView";
                                // location.reload();
                            }
                        });
                    });
                });
            },
        });
    });

    $("#submitButton").click(function (e) {
        $("#addForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(document.getElementById("addForm"));

                    $.ajax({
                        type: "POST",
                        url: "/submitGeneralClaim",
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
                                window.location.href = "/myClaimView";
                                // location.reload();
                            }
                        });
                    });
                });
            },
        });
    });

    $(document).on("click", "#deleteButton", function () {
        id = $(this).data("id");
        requirejs(["sweetAlert2"], function (swal) {
            swal({
                title: "Are you sure to delete Job Grade?",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
            }).then(function () {
                $.ajax({
                    type: "POST",
                    url: "/deleteJobGrade/" + id,
                    // dataType: "json",
                    data: { _method: "DELETE" },

                    // processData: false,
                    // contentType: false,
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
        });
    });

    $("#applyclaimtable").DataTable({
        searching: false,
        scrollX: true,
        // scrollY: 150,
        lengthChange: true,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        responsive: false,
        info: false,
    });

    $(document).on("change", "#claimcategory", function () {
        $("#labelcategory").show();
        id = $(this).val();
        const inputs = ["contentLabel"];

        for (let i = 0; i < inputs.length; i++) {
            $("#" + inputs[i] + "")
                .find("option")
                .remove()
                .end()
                .append(
                    '<option label="Please Choose" value="" selected="selected"> </option>'
                )
                .val("");

            function getClaimCategoryContent(id) {
                return $.ajax({
                    url: "/getClaimCategoryContent/" + id,
                });
            }
            $("#" + inputs[i] + "")
                .find("option")
                .end();
        }

        var user = getClaimCategoryContent(id);

        user.then(function (data) {
            $("#label").text(data[0].label);
            // console.log(data[0].label);
            for (let i = 0; i < data.length; i++) {
                const user = data[i];
                var opt = document.createElement("option");
                document.getElementById("contentLabel").innerHTML +=
                    '<option value="' +
                    user["id"] +
                    '">' +
                    user["content"] +
                    "</option>";
            }
        });
    });

    $("#applieddate")
        .datepicker({
            setDate: new Date(),
            todayHighlight: true,
            autoclose: true,
            format: "yyyy/mm/dd",
        })
        .datepicker("setDate", "now");
});
