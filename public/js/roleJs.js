$(document).ready(function () {
    $("#datepicker-joindate").datepicker({
        todayHighlight: true,
        autoclose: true,
    });

    $("#tableRoles").DataTable({
        responsive: true,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
    });

    $(document).on("click", "#addRoleButton", function () {
        $("input").prop("disabled", false);
        $("select").prop("disabled", false);
        $("#addRoleModal").modal("show");
    });

    $(document).on("click", "#editRoleButton", function () {
        var id = $(this).data("id");
        var roleData = getRole(id);
        $("input").prop("disabled", false);
        $("select").prop("disabled", false);

        roleData.done(function (data) {
            $("#roleName").val(data[0].rolename);
            $("#idR").val(data[0].roleeid);
            console.log(data);
            var tableBody = $("#tableBody"); // Assuming the table has an ID of "tableBody"
            tableBody.find("tbody").empty(); // Clear the table body before populating it

            if (data.length > 0) {
                // Loop through the data and append rows to the table
                $.each(data, function (i, item) {
                    var row =
                        "<tr>" +
                        "<td>" +
                        (i + 1) +
                        "</td>" +
                        "<td>" +
                        (item.fullname ? item.fullname : "") +
                        "</td>" +
                        "<td>" +
                        (item.username1 ? item.username1 : "") +
                        "</td>" +
                        "<td>" +
                        (item.added_time ? item.added_time : "") +
                        "</td>" +
                        "<td>" +
                        (item.username2 ? item.username2 : "") +
                        "</td>" +
                        "<td>" +
                        (item.modified_time ? item.modified_time : "") +
                        "</td>" +
                        "</tr>";
                    tableBody.append(row);
                });
            } else {
                // Display a message if there are no results
                tableBody.append(
                    '<tr class=""><td colspan="6">No results found</td></tr>'
                );
            }
        });
        $("#editRoleModal").modal("show");
    });

    function getRole(id) {
        return $.ajax({
            url: "/getRoleById/" + id,
        });
    }

    $(document).on("click", "#viewVehicleView", function () {
        var id = $(this).data("id");
        var vehicleData = getVehicle(id);
        $("input").prop("disabled", true);
        $("select").prop("disabled", true);

        vehicleData.done(function (data) {
            $("input").val("");
            vdata = data.data;
            $("#vehicleType1").prop("selectedIndex", vdata.vehicle_type);
            $("#plateNo1").val(vdata.plate_no);
        });
        $("#view-vehicle").modal("show");
    });

    $(document).on("click", "#deleteButton", function () {
        id = $(this).data("id");
        requirejs(["sweetAlert2"], function (swal) {
            swal({
                title: "Are you sure to delete Role?",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
            }).then(function () {
                $.ajax({
                    type: "POST",
                    url: "/deleteRole/" + id,
                    // dataType: "json",
                    data: { _method: "DELETE" },
                    // async: false,
                    // processData: false,
                    // contentType: false,
                }).done(function (data) {
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

    // function getRole(id) {
    //     return $.ajax({
    //         url: "/getRoleById/" + id,
    //     });
    // }

    $("#saveRoleButton").click(function (e) {
        requirejs(["sweetAlert2"], function (swal) {
            var data = new FormData(document.getElementById("addRoleForm"));
            // var data = $('#tree').jstree("get_selected");

            $.ajax({
                type: "POST",
                url: "/createRole",
                data: data,
                dataType: "json",
                async: false,
                processData: false,
                contentType: false,
            }).done(function (data) {
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

    $("#updateRole").click(function (e) {
        requirejs(["sweetAlert2"], function (swal) {
            var data = new FormData(document.getElementById("updateRoleForm"));
            var id = $("#idR").val();

            $.ajax({
                type: "POST",
                url: "/updateRole/" + id,
                data: data,
                dataType: "json",
                async: false,
                processData: false,
                contentType: false,
            }).done(function (data) {
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

    $("#kt_docs_jstree_checkable").jstree({
        plugins: ["wholerow", "checkbox", "types"],
        core: {
            themes: {
                responsive: false,
            },
            data: [
                {
                    text: "Pages",
                    children: [
                        {
                            text: "initially selected",
                            state: {
                                selected: true,
                            },
                        },
                        {
                            text: "Employee Spouses",
                            icon: "fa fa-folder text-default",
                            state: { opened: true },
                            children: [
                                { text: "New Employee Spouses" },
                                { text: "Edit Employee Spouses" },
                            ],
                        },
                        {
                            text: "Designation",
                            icon: "fa fa-folder text-default",
                            state: {
                                opened: true,
                            },
                            children: [
                                { text: "New Designation" },
                                { text: "Edit Designation" },
                                { text: "Delete Designation" },
                            ],
                        },
                        {
                            text: "Job Grade",
                            icon: "fa fa-folder text-default",
                            state: {
                                opened: true,
                            },
                            children: [
                                { text: "New Job Grade" },
                                { text: "Edit Job Grade" },
                                { text: "Delete Job Grade" },
                            ],
                        },
                        {
                            text: "Unit",
                            icon: "fa fa-folder text-default",
                            state: {
                                opened: true,
                            },
                            children: [
                                { text: "New Unit" },
                                { text: "Edit Unit" },
                                { text: "Delete Unit" },
                            ],
                        },
                        {
                            text: "Department",
                            icon: "fa fa-folder text-default",
                            state: {
                                opened: true,
                            },
                            children: [
                                { text: "New Department" },
                                { text: "Edit Department" },
                                { text: "Delete Department" },
                            ],
                        },
                        {
                            text: "Races",
                        },
                        {
                            text: "Religions",
                        },
                        {
                            text: "Branches",
                            icon: "fa fa-folder text-default",
                            state: {
                                opened: true,
                            },
                            children: [
                                { text: "New Branches" },
                                { text: "Edit Branches" },
                                { text: "Delete Branches" },
                            ],
                        },
                        {
                            text: "custom icon",
                            icon: "fa fa-warning text-waring",
                        },
                        {
                            text: "disabled node",
                            icon: "fa fa-check text-success",
                            state: {
                                disabled: true,
                            },
                        },
                    ],
                },
                "Others",
            ],
        },
        types: {
            default: {
                icon: "fa fa-folder text-warning",
            },
            file: {
                icon: "fa fa-file  text-warning",
            },
        },
    });

    $("#kt_docs_jstree_checkable2").jstree({
        plugins: ["wholerow", "checkbox", "types"],
        core: {
            themes: {
                responsive: false,
            },
            data: [
                {
                    text: "HRIS",
                    children: [
                        {
                            text: "Employee Info",
                            state: { selected: false },
                            children: [
                                { text: "Register Employee" },
                                { text: "Update Employee" },
                                { text: "Terminate Employee" },
                                { text: "Activate Employee" },
                            ],
                        },
                    ],
                },
                {
                    text: "TSR",
                    children: [
                        {
                            text: "My Timesheet",
                            children: [{ text: "Create Event" }],
                        },
                        {
                            text: "Timesheet Report",
                            children: [
                                { text: "Approve TSR" },
                                { text: "Decline TSR" },
                                { text: "View TSR" },
                            ],
                        },
                    ],
                },
                {
                    text: "Attendance",
                    children: [
                        {
                            text: "My Attendance",
                            children: [{ text: "View Action Log" }],
                        },
                        {
                            text: "Attendance Info",
                        },
                    ],
                },
                {
                    text: "Leave",
                    children: [
                        {
                            text: "Leave Approval",
                            state: { selected: false },
                            children: [
                                { text: "Approve Leave" },
                                { text: "Reject Leave" },
                                { text: "View Leave" },
                            ],
                        },
                    ],
                },
                {
                    text: "Project",
                    children: [
                        {
                            text: "Project Info",
                            state: { selected: false },
                            children: [
                                { text: "Register Project" },
                                { text: "View Project" },
                                { text: "Update Status" },
                                { text: "Update Project" },
                            ],
                        },
                        {
                            text: "Project Approval",
                            children: [
                                { text: "View Project Request" },
                                { text: "Approve Project Request" },
                                { text: "Reject Project Request" },
                            ],
                        },
                    ],
                },
                {
                    text: "Claim",
                    children: [
                        {
                            text: "Claim Approval",
                            state: { selected: false },
                            children: [
                                { text: "Approve Claim" },
                                { text: "Recommend Claim" },
                                { text: "Check Claim" },
                                { text: "Amend Claim" },
                                { text: "Cancel Claim" },
                            ],
                        },
                    ],
                },
                {
                    text: "Settings",
                    children: [
                        { text: "General Settings" },
                        { text: "Timesheet Settings" },
                        { text: "Leave Settings" },
                    ],
                },
                {
                    text: "Reporting",
                    children: [
                        { text: "TSR" },
                        { text: "Attendance" },
                        { text: "Leave" },
                        { text: "Project" },
                        { text: "Claim" },
                    ],
                },
            ],
        },
        types: {
            default: {
                icon: "fa fa-folder text-warning",
            },
            file: {
                icon: "fa fa-file  text-warning",
            },
        },
    });

    $("#kt_docs_jstree_checkable3").jstree({
        plugins: ["wholerow", "checkbox", "types"],
        core: {
            themes: {
                responsive: false,
            },
            data: [
                {
                    text: "HRIS",
                    children: [
                        {
                            text: "Employee Info",
                            state: { selected: false },
                            children: [
                                { text: "Register Employee" },
                                { text: "Update Employee" },
                                { text: "Terminate Employee" },
                                { text: "Activate Employee" },
                            ],
                        },
                    ],
                },
                {
                    text: "TSR",
                    children: [
                        {
                            text: "My Timesheet",
                            children: [{ text: "Create Event" }],
                        },
                        {
                            text: "Timesheet Report",
                            children: [
                                { text: "Approve TSR" },
                                { text: "Decline TSR" },
                                { text: "View TSR" },
                            ],
                        },
                    ],
                },
                {
                    text: "Attendance",
                    children: [
                        {
                            text: "My Attendance",
                            children: [{ text: "View Action Log" }],
                        },
                        {
                            text: "Attendance Info",
                        },
                    ],
                },
                {
                    text: "Leave",
                    children: [
                        {
                            text: "Leave Approval",
                            state: { selected: false },
                            children: [
                                { text: "Approve Leave" },
                                { text: "Reject Leave" },
                                { text: "View Leave" },
                            ],
                        },
                    ],
                },
                {
                    text: "Project",
                    children: [
                        {
                            text: "Project Info",
                            state: { selected: false },
                            children: [
                                { text: "Register Project" },
                                { text: "View Project" },
                                { text: "Update Status" },
                                { text: "Update Project" },
                            ],
                        },
                        {
                            text: "Project Approval",
                            children: [
                                { text: "View Project Request" },
                                { text: "Approve Project Request" },
                                { text: "Reject Project Request" },
                            ],
                        },
                    ],
                },
                {
                    text: "Claim",
                    children: [
                        {
                            text: "Claim Approval",
                            state: { selected: false },
                            children: [
                                { text: "Approve Claim" },
                                { text: "Recommend Claim" },
                                { text: "Check Claim" },
                                { text: "Amend Claim" },
                                { text: "Cancel Claim" },
                            ],
                        },
                    ],
                },
                {
                    text: "Settings",
                    children: [
                        { text: "General Settings" },
                        { text: "Timesheet Settings" },
                        { text: "Leave Settings" },
                    ],
                },
                {
                    text: "Reporting",
                    children: [
                        { text: "TSR" },
                        { text: "Attendance" },
                        { text: "Leave" },
                        { text: "Project" },
                        { text: "Claim" },
                    ],
                },
            ],
        },
        types: {
            default: {
                icon: "fa fa-folder text-warning",
            },
            file: {
                icon: "fa fa-file  text-warning",
            },
        },
    });

    $(".checkbox-dropdown").click(function () {
        $(this).toggleClass("is-active");
    });

    $(".checkbox-dropdown ul").click(function (e) {
        e.stopPropagation();
    });

    $("#ex-search").picker({ search: true });
    $("#multi").picker({ search: true });
});
