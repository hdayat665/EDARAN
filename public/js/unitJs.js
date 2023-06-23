$(document).ready(function () {
    $("input[type=text]").keyup(function () {
        $(this).val($(this).val().toUpperCase());
    });

    $("#datepicker-joindate").datepicker({
        todayHighlight: true,
        autoclose: true,
    });

    $("#tableunit").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        initComplete: function (settings, json) {
            $("#tableunit").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });

    $(document).on("click", "#addButton", function () {
        $("#addModal").modal("show");
    });
    

    $(document).on("click", "#editButton", function () {
        var id = $(this).data("id");
        var vehicleData = getUnit(id);

        vehicleData.then(function (data) {
            $("#departmentId").val(data.departmentId);
            $("#unitName").val(data.unitName);
            $("#unitCode").val(data.unitCode);
            $("#idU").val(data.id);
        });
        $("#editModal").modal("show");
    });

    $(document).on("click", "#deleteButton", function () {
        id = $(this).data("id");
        requirejs(["sweetAlert2"], function (swal) {
            swal({
                title: "Are you sure to delete Unit?",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
            }).then(function () {
                $.ajax({
                    type: "POST",
                    url: "/deleteUnit/" + id,
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

    function getUnit(id) {
        return $.ajax({
            url: "/getUnitById/" + id,
        });
    }

    $("#saveButton").click(function (e) {
        $("#addForm").validate({
            // Specify validation rules
            rules: {
                departmentId: "required",
                unitName: "required",
                unitCode: "required",
            },

            messages: {
                departmentId: "Please Choose Department Name",
                unitName: "Please Insert Unit Name",
                unitCode: "Please Insert Unit Code",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(document.getElementById("addForm"));
                    // var data = $('#tree').jstree("get_selected");

                    $.ajax({
                        type: "POST",
                        url: "/createUnit",
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

    $("#updateButton").click(function (e) {
        $("#updateForm").validate({
            // Specify validation rules
            rules: {
                departmentId: "required",
                unitName: "required",
                unitCode: "required",
            },

            messages: {
                departmentId: "Please Choose Department Name",
                unitName: "Please Insert Unit Name",
                unitCode: "Please Insert Unit Code",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("updateForm")
                    );
                    var id = $("#idU").val();

                    $.ajax({
                        type: "POST",
                        url: "/updateUnit/" + id,
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
});
