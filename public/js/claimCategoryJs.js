$(document).ready(function () {
    $("#claimCategoryTable").DataTable({});

    $("#saveButton").click(function (e) {
        $("#saveForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("saveForm")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/createClaimCategory",
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
                                // location.reload();
                                window.location.href =
                                    "/setting/eclaimCategoryView";
                            }
                        });
                    });
                });
            },
        });
    });

    $("#updateButton").click(function (e) {
        var id = $("#idClaim").val();
        $("#updateForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("updateForm")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/updateClaimCategory/" + id,
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
                                    "/setting/eclaimCategoryView";
                            }
                        });
                    });
                });
            },
        });
    });

    $(document).on("click", "#contentDeleteButton", function () {
        id = $(this).data("id");
        requirejs(["sweetAlert2"], function (swal) {
            swal({
                title: "Are you sure to delete Claim Category?",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
            }).then(function () {
                $.ajax({
                    type: "POST",
                    url: "/deleteClaimCategoryContent/" + id,
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

    $(document).on("click", "#deleteButton", function () {
        id = $(this).data("id");
        requirejs(["sweetAlert2"], function (swal) {
            swal({
                title: "Are you sure to delete Claim Category?",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
            }).then(function () {
                $.ajax({
                    type: "POST",
                    url: "/deleteClaimCategory/" + id,
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

    $("#savecontent").click(function () {
        var addtypelogactivityName =
            document.getElementById("addcontent").value;

        if (addtypelogactivityName == "") {
            document.getElementById("addcontent");
            return;
        } else {
            let table = document.getElementById("tablesavecontent");
            // Insert a row at the end of the table
            let newRow = table.insertRow(-1);
            var l = table.rows.length - 1;

            //Col 3 = Delete Button
            table.rows[l].insertCell(0);
            table.rows[l].cells[0].innerHTML =
                "<input hidden name='content[]' value='" +
                addtypelogactivityName +
                "' /><button type='button' class='btn btn-outline-danger' onclick='delRow(this);' id='btnDelete' size='1' height='1' ><i class='fa fa-trash'></i></button>";

            //Col 1 = addtypelogactivityName
            table.rows[l].insertCell(1);
            table.rows[l].cells[1].innerHTML = addtypelogactivityName;

            //Clear input
        }
    });

    $("#adddropdown").click(function () {
        if ($(this).is(":checked")) {
            $(".label").show();
        } else {
            $(".label").hide();
        }
    });

    $("#adddropdownu").click(function () {
        if ($(this).is(":checked")) {
            $(".labelu").show();
        } else {
            $(".labelu").hide();
        }
    });
    $(document).on("change", "#statusClaim", function () {
        var id = $(this).data("id");
        var status;

        if ($(this).is(":checked")) {
            status = 1;
        } else {
            status = 2;
        }
        requirejs(["sweetAlert2"], function (swal) {
            $.ajax({
                type: "POST",
                url: "/updateStatusClaimCategory/" + id + "/" + status,

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
    });

    // document.addEventListener('DOMContentLoaded', function () {
    //     const checkbox = document.getElementById('addprojectid');

    //     // Add event listener to detect changes
    //     checkbox.addEventListener('change', function () {
    //         if (this.checked) {
    //             this.value = '1'; // Checkbox is checked, set the value to 1
    //         } else {
    //             this.value = '0'; // Checkbox is not checked, set the value to 0
    //         }
    //     });
    // });

    // document.addEventListener('DOMContentLoaded', function () {
    //     const checkbox = document.getElementById('addattachid');

    //     // Add event listener to detect changes
    //     checkbox.addEventListener('change', function () {
    //         if (this.checked) {
    //             this.value = '1'; // Checkbox is checked, set the value to 1
    //         } else {
    //             this.value = '0'; // Checkbox is not checked, set the value to 0
    //         }
    //     });
    // });

    $("#addattachid").click(function () {
        if ($(this).is(":checked")) {
            $("#mandotoryview").show();
        } else {
            $("#mandotoryview").hide();
        }
    });

    $("#addattachidu").click(function () {
        if ($(this).is(":checked")) {
            $("#mandotoryview").show();
        } else {
            $("#mandotoryview").hide();
        }
    });
});


function delRow(btn) {
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
}
