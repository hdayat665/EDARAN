$(document).ready(function () {
    $(document).ready(function () {
        $("#tableeleave").dataTable({
            responsive: false,
            bLengthChange: false,
            bFilter: true,
            scrollX: true,
        });
    });

    $("#datepickerlapse").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy-mm-dd",
    });
    $("#LapsedDate").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy-mm-dd",
    });
    $("#Lapsed").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy-mm-dd",
    });

    $(document).on("click", "#addButton", function () {
        $("#addModal").modal("show");
    });

    $("#saveButton").click(function (e) {
        $("#addForm").validate({
            // Specify validation rules
            rules: {
                employerName: "required",
                lapsed: "required",
            },

            messages: {
                employerName: "Please select employer Name",
                lapsed: "Please Insert lapsed date",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(document.getElementById("addForm"));
                    console.log(document.getElementById("addForm"));
                    // return false;

                    // var data = $('#tree').jstree("get_selected");

                    $.ajax({
                        type: "POST",
                        url: "/createLeaveEntitlement",
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

    $(document).on("click", "#editButton", function () {
        var id = $(this).data("id");

        var vehicleData = geteleaveEntitlement(id);

        vehicleData.then(function (data) {
            $("#nameEmployer").val(data.fullname);
            $("#department").val(data.departmentName);
            $("#CurrentEntitlement").val(data.current_entitlement);
            $("#CurrentEntitlementBalance").val(
                data.current_entitlement_balance
            );
            $("#SickLeaveEntitlement").val(data.sick_leave_entitlement);
            $("#SickLeaveEntitlementBalance").val(
                data.sick_leave_entitlement_balance
            );
            $("#CarryForward").val(data.carry_forward);
            $("#CurrentForwardBalance").val(data.carry_forward_balance);
            $("#LapsedDate").val(data.lapsed_date);
            $("#Lapsed").val(data.lapse);
            $("#idleave").val(data.id);
        });
    });

    function geteleaveEntitlement(id) {
        return $.ajax({
            url: "/getcreateLeaveEntitlement/" + id,
        });
    }

    $("#updateButton").click(function (e) {
        $("#updateForm").validate({
            // Specify validation rules
            rules: {
                // companyCode: "required",
                // companyName: "required",
            },

            messages: {
                // companyCode: "Please Insert Company Code",
                // companyName: "Please Insert Company Name",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("updateForm")
                    );
                    var id = $("#idleave").val();
                    console.log(id);
                    // return false;

                    $.ajax({
                        type: "POST",
                        url: "/updateleaveEntitlement/" + id,
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

    $("#tableentitlement").DataTable({
        searching: true,
        lengthChange: true,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        responsive: false,
    });
});
