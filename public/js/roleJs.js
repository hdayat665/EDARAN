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
        var userRoleData = getUserByRoleId(id);
        var permissionData = getPermissionByRoleId(id);
        var updateRoleForm = getRo(id);

        $("input").prop("disabled", false);
        $("select").prop("disabled", false);

        updateRoleForm.done(function (data1) {
            $("#roleName").val(data1.roleName);
            $("#idR").val(data1.id);
            // console.log(data1);
        });

        permissionData.done(function (data) {
            // console.log(data);
            var tableBody = $("#permissionTable"); // Assuming the table has an ID of "tableBody"
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
                        item.permission_code.replace(/_/g, " ").toUpperCase() +
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

        roleData.done(function (data) {
            // console.log(data);
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

        userRoleData.done(function (data) {
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
                        item.user_profile.fullName +
                        "</td>" +
                        "<td>" +
                        item.added_by.fullName +
                        "</td>" +
                        "<td>" +
                        item.added_time +
                        "</td>" +
                        "<td>" +
                        item.modifyd_by.fullName +
                        "</td>" +
                        "<td>" +
                        item.modified_time +
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

    function getUserByRoleId(id) {
        return $.ajax({
            url: "/getUserByRoleId/" + id,
        });
    }

    function getPermissionByRoleId(id) {
        return $.ajax({
            url: "/getPermissionByRoleId/" + id,
        });
    }

    function getRole(id) {
        return $.ajax({
            url: "/getRoleById/" + id,
        });
    }

    function getRo(id) {
        return $.ajax({
            url: "/getRoleBy/" + id,
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

    $(document).on("click", "#deleteRoleButton", function () {
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
            var selectedElms = $("#kt_docs_jstree_checkable3").jstree(
                "get_checked",
                true
            );
            moduleId = [];
            $.each(selectedElms, function () {
                moduleId.push(this.id);
            });
            console.log(moduleId);
            var data = new FormData(document.getElementById("updateRoleForm"));

            data.append("permissions", moduleId);

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
                            text: "My Profile",
                            children: [
                                { text: "Register Employee" },
                                { text: "Update Employee" },
                                { text: "Terminate Employee" },
                                { text: "Activate Employee" },
                            ],
                        },
                        {
                            text: "Employee Info",
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
                    id: "hris",
                    children: [
                        {
                            text: "HRIS Tab",
                            id: "hris_tab",
                        },
                        {
                            text: "My Profile",
                            id: "my_profile",
                        },
                        {
                            text: "Employee Info",
                            id: "employee_info",
                            // children: [
                            //     {
                            //         text: "Register Employee",
                            //         id: "hris_register_employee",
                            //     },
                            //     {
                            //         text: "Update Employee",
                            //         id: "hris_update_employee",
                            //     },
                            //     {
                            //         text: "Terminate Employee",
                            //         id: "hris_terminate_employee",
                            //     },
                            //     {
                            //         text: "Activate Employee",
                            //         id: "hris_activate_employee",
                            //     },
                            // ],
                        },
                    ],
                },
                {
                    text: "TSR",
                    id: "tsr",
                    children: [
                        {
                            text: "TSR Tab",
                            id: "tsr_tab",
                        },
                        {
                            text: "My Timesheet",
                            id: "my_timesheet",
                            // children: [
                            //     {
                            //         text: "Create Event",
                            //         id: "tsr_timesheet_create_event",
                            //     },
                            // ],
                        },
                        {
                            text: "Timesheet Approval",
                            id: "timesheet_approval",
                            // children: [
                            //     {
                            //         text: "Approve Timesheet",
                            //         id: "tsr_timesheet_approval",
                            //     },
                            //     {
                            //         text: "Reject Timesheet",
                            //         id: "tsr_timesheet_reject",
                            //     },
                            // ],
                        },
                        {
                            text: "Real Time Activities",
                            id: "real_time_activities",
                        }
                    ],
                },
                {
                    text: "Attendance",
                    id: "attendance",
                    children: [
                        {
                            text: "Attendance Tab",
                            id: "attendance_tab",
                        },
                        {
                            text: "My Attendance",
                            id: "my_attendance",
                            // children: [
                            //     {
                            //         text: "View Action Log",
                            //         id: "attendance_view_action_log",
                            //     },
                            // ],
                        },
                        {
                            text: "Attendance Info",
                            id: "attendance_info",
                        },
                    ],
                },
                {
                    text: "Leave",
                    id: "leave",
                    children: [
                        {
                            text: "Leave Tab",
                            id: "leave_tab",
                        },
                        {
                            text: "My Leave",
                            id: "my_leave",
                        },
                        {
                            text: "Leave Approval",
                            id: "leave_approval",
                            state: { selected: false },
                            children: [
                                {
                                    text: "Leave Approval Menu",
                                    id: "leave_menu",
                                },
                                {
                                    text: "Recommender",
                                    id: "leave_recommender",
                                    // children: [
                                    //     {
                                    //         text: "Department Approve",
                                    //         id: "leave_department_approve",
                                    //     },
                                    // ],
                                },
                                {
                                    text: "Approver",
                                    id: "leave_approver",
                                    // children: [
                                    //     {
                                    //         text: "HOD Approve",
                                    //         id: "leave_hod_approve",
                                    //     },
                                    // ],
                                },
                            ],
                        },
                    ],
                },
                {
                    text: "Project",
                    id: "project",
                    children: [
                        {
                            text: "Project Tab",
                            id: "project_tab",
                        },
                        {
                            text: "Customer",
                            id: "customer",
                            // state: { selected: false },
                            // children: [
                            //     { text: "Add Customer", id: "add_customer" },
                            //     { text: "Edit Customer", id: "edit_customer" },
                            //     {
                            //         text: "Delete Customer",
                            //         id: "delete_customer",
                            //     },
                            // ],
                        },
                        {
                            text: "Project Information",
                            id: "project_info",
                            // state: { selected: false },
                            // children: [
                            //     {
                            //         text: "Register Project",
                            //         id: "register_project",
                            //     },
                            //     { text: "View Project", id: "view_project" },
                            //     { text: "Update Status", id: "update_status" },
                            //     {
                            //         text: "Update Project",
                            //         id: "update_project",
                            //     },
                            // ],
                        },
                        // {
                        //     text: "Project Approval",
                        //     id: "project_approval",
                        //     children: [
                        //         {
                        //             text: "View Project Request",
                        //             id: "view_project_request",
                        //         },
                        //         {
                        //             text: "Approve Project Request",
                        //             id: "approve_project_request",
                        //         },
                        //         {
                        //             text: "Reject Project Request",
                        //             id: "reject_project_request",
                        //         },
                        //     ],
                        // },
                        {
                            text: "My Project",
                            id: "my_project",
                        },
                        {
                            text: "Project Request",
                            id: "project_request",
                        },
                    ],
                },
                {
                    text: "Claim",
                    id: "claim",
                    children: [
                        {
                            text: "Claim Tab",
                            id: "claim_tab",
                        },
                        {
                            text: "My Claim",
                            id: "my_claim",
                        },
                        {
                            text: "Claim Approval",
                            id: "claim_approval",
                            children: [
                                {
                                    text: "Claim Menu",
                                    id: "claim_menu",
                                },
                                {
                                    text: "Department",
                                    id: "department",
                                    children: [
                                        {
                                            text: "Department Menu",
                                            id: "eclaim_department_menu",
                                        },
                                        {
                                            text: "Recommender",
                                            id: "eclaim_department_recommender",
                                        },
                                        {
                                            text: "Approver",
                                            id: "eclaim_department_approver",
                                        },
                                    ],
                                },

                                {
                                    text: "Finance",
                                    id: "finance",
                                    children: [
                                        {
                                            text: "Finance Menu",
                                            id: "eclaim_finance_menu",
                                        },
                                        {
                                            text: "Recommender",
                                            id: "eclaim_finance_recommender",
                                        },
                                        {
                                            text: "Approver",
                                            id: "eclaim_finance_approver",
                                        },
                                        {
                                            text: "Checker",
                                            id: "eclaim_finance_checker",
                                        },
                                    ],
                                },

                                {
                                    text: "Admin",
                                    id: "admin",
                                    children: [
                                        {
                                            text: "Admin Menu",
                                            id: "eclaim_admin_menu",
                                        },
                                        {
                                            text: "Recommender",
                                            id: "eclaim_admin_recommender",
                                        },
                                        {
                                            text: "Approver",
                                            id: "eclaim_admin_approver",
                                        },
                                        {
                                            text: "Checker",
                                            id: "eclaim_admin_checker",
                                        },
                                    ],
                                },
                            ],
                        },
                        {
                            text: "Cash Advance",
                            id: "cash_advance_approval",
                            children: [
                                {
                                    text: "Cash Advance Menu",
                                    id: "cash_menu",
                                },
                                {
                                    text: "Department",
                                    id: "cash_department",
                                    children: [
                                        {
                                            text: "Department Menu",
                                            id: "cash_deparment_menu",
                                        },
                                        {
                                            text: "Approver",
                                            id: "cash_deparment_approver",
                                        }
                                    ],
                                },

                                {
                                    text: "Finance",
                                    children: [
                                        {
                                            text: "Finance Menu",
                                            id: "cash_finance_menu",
                                        },
                                        {
                                            text: "Recommender",
                                            id: "cash_finance_recommender",
                                        },
                                        {
                                            text: "Approver",
                                            id: "cash_finance_approver",
                                        },
                                        {
                                            text: "Checker",
                                            id: "cash_finance_checker",
                                        },
                                    ],
                                },
                            ],
                        },
                        {
                            text: "Appeal Claim",
                            id: "appeal_approval",
                        }
                    ],
                },
                
                {
                    text: "Reporting",
                    id: "reporting",
                    children: [
                        { 
                            text: "Reporting Tab", 
                            id: "report_tab" 
                        },
                        {
                            text: "Timesheet",
                            id: "timesheet",
                            children: [
                                { 
                                    text: "Timesheet Menu", 
                                    id: "timesheet_menu" },
                                {
                                    text: "Status Report",
                                    id: "status_report",
                                },
                                { 
                                    text: "Employee Report", 
                                    id: "employee_report" },
                                { 
                                    text: "Overtime Report", 
                                    id: "overtime_report" },
                            ],
                        },
                        {
                            text: "E-Attendance",
                            id: "eattendance",
                            children: [
                                { 
                                    text: "E-Attendance Menu", 
                                    id: "eattendance_menu" 
                                },
                                {
                                    text: "Daily Report",
                                    id: "daily_report",
                                },
                                { 
                                    text: "Status Report", 
                                    id: "status_report" 
                                },
                            ],
                        },
                        { text: "Leave", id: "report_leave" },
                        {
                            text: "Project",
                            
                            children: [
                                { 
                                    text: "Project Menu", 
                                    id: "project_report_menu" 
                                },
                                {
                                    text: "Project Listing",
                                    id: "project_listing",
                                },
                                { 
                                    text: "Project Report", 
                                    id: "project_report" 
                                },
                            ],
                        },
                        {
                            text: "Claim",
                            
                            children: [
                                { 
                                    text: "Claim Menu", 
                                    id: "claim_report_menu" 
                                },
                                {
                                    text: "Claim Report",
                                    id: "claim_report",
                                },
                                { 
                                    text: "Cash Report", 
                                    id: "cash_report" 
                                },
                            ],
                        },
                        { text: "Charge Out Rate", id: "report_cor" },
                    ],
                },
                {
                    text: "Settings",
                    id: "settings",
                    children: [
                        { text: "Settings Tab", id: "setting_tab" },
                        // { text: "General Settings", id: "setting_general" },
                        // {
                        //     text: "Attendance Settings",
                        //     id: "setting_attendance",
                        // },
                        // { text: "Timesheet Settings", id: "setting_timesheet" },
                        // { text: "Leave Settings", id: "setting_leave" },
                        // { text: "Claim Settings", id: "setting_claim" },
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
