$(document).ready(function () {
    // google map

    $(".partCheck").click(function () {
        if ($(this).prop("checked")) {
            $("#exitdatediv").show();
            $("#exitdatediv1").show();
        } else {
            $("#exitdatediv").hide();
            $("#exitdatediv1").hide();
        }
    });

    $("input[type=text]").keyup(function () {
        $(this).val($(this).val().toUpperCase());
    });

    $("#location-search").picker({
        search: true,
    });

    $("#location-search-edit").picker({
        search: true,
    });



    $('#projectmember').select2({
        placeholder: "PLEASE CHOOSE",
        dropdownParent: $("#assignProjectMemberModal2"),
    });

    $('#projectlocation').select2({
        placeholder: "PLEASE CHOOSE",
        dropdownParent: $("#assignProjectMemberModal2"),
    });

    // $("#projectlocation").picker({
    //     search: true,
    // });

    // $("#projectmember").picker
    // ({ search: true
    // });

    $(".select1").select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
        dropdownParent: $("#addProjectMemberModal"),
        // multiple: true,
    });

    $(".selectacc").select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
        dropdownParent: $("#tab1"),
        // multiple: true,
    });

    $(".selectmng").select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
        dropdownParent: $("#tab1"),
        // multiple: true,
    });
    // selectcust
    $(".selectcust").select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
        dropdownParent: $("#tab1"),
        // multiple: true,
    });

    $("#joined_date").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy/mm/dd",
    });

    $("#datepicker_exitdate").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy/mm/dd",
    });

    $("#datepicker-joineddate").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy/mm/dd",
    });

    $("#projectStart").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy/mm/dd",
    });

    $("#employeeJoin").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy/mm/dd",
    });

    $("#data-table-prevproject").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        initComplete: function (settings, json) {
            $("#data-table-prevproject").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });

    $("#projectLocationTable").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        initComplete: function (settings, json) {
            $("#projectLocationTable").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });

    $("#projectMemberTable").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        initComplete: function (settings, json) {
            $("#projectMemberTable").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });

    $("#projectMemberPrevTable").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        initComplete: function (settings, json) {
            $("#projectMemberPrevTable").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });

    $("#data-table-default2").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        // scrollX: true,
        initComplete: function (settings, json) {
            $("#data-table-default2").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });

    var hash = location.hash.replace(/^#/, ""); // ^ means starting, meaning only match the first hash
    if (hash) {
        $('.nav-tabs a[href="#' + hash + '"]').tab("show");
    }
    $(".nav-tabs a").on("shown.bs.tab", function (e) {
        window.location.hash = e.target.hash;
    });
    /////////////////////// START PROJECT /////////////////////
    $.validator.addMethod(
        "twoDecimalPlaces",
        function (value, element) {
            return this.optional(element) || /^-?\d+(\.\d{1,2})?$/.test(value);
        },
        "Please Insert Value Up To 2 Decimal Places."
    );

    $("#updateProjectInfoButton").click(function (e) {
        $("#editProjectInfoForm").validate({
            rules: {
                customer_id: "required",
                project_code: "required",
                project_name: "required",
                contract_value: {
                    required: true,
                    twoDecimalPlaces: true,
                },
                financial_year: "required",
                LOA_date: "required",
                contract_start_date: "required",
                contract_end_date: "required",
                acc_manager: "required",
                project_manager: "required",
                status: "required",
            },

            messages: {
                customer_id: "Please Choose Customer Name",
                project_code: "Please Insert Project Code",
                project_name: "Please Insert Project Name",
                contract_value: {
                    required: "Please insert Contract Value",
                },
                financial_year: "Please Choose Financial Year",
                LOA_date: "Please Choose LOA Date",
                contract_start_date: "Please Choose Contract Start Date",
                contract_end_date: "Please Choose Contract End Date",
                acc_manager: "Please Choose Account Manager",
                project_manager: "Please Choose Project Manager",
                status: "Please Choose Status",
            },
            errorPlacement: function (error, element) {
                if (element.attr("name") === "acc_manager") {
                    error.insertAfter("#acc_managerdiv");
                } else if (element.attr("name") === "project_manager") {
                    error.insertAfter("#project_managerdiv");
                } else if (element.attr("name") === "customer_id") {
                    error.insertAfter("#customerDiv");
                } else {
                    error.insertAfter(element);
                }
            },

            submitHandler: function (form) {
                $("input:visible, textarea:visible, select:visible").each(
                    function () {
                        $(this).prop("disabled", false);
                    }
                );
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("editProjectInfoForm")
                    );
                    // var data = $('#tree').jstree("get_selected");
                    var id = $("#idP").val();

                    $.ajax({
                        type: "POST",
                        url: "/updateProject/" + id,
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

    /////////////////////// END PROJECT /////////////////////

    /////////////////////// START PROJECT LOCATION /////////////////////
    $("#saveProjectLocation").click(function (e) {
        $("#addProjectLocationForm").validate({
            rules: {
                location_name: "required",
                address: "required",
                postcode: {
                    required: true,
                    digits: true,
                    rangelength: [5, 5],
                },
                city: "required",
                state: "required",
                location_google: "required",
            },

            messages: {
                location_name: "Please Insert Location Name",
                address: "Please Insert Address 1",
                postcode: {
                    required: "Please Insert Postcode",
                    digits: "Please Insert Valid Postcode",
                    rangelength: "Please Insert Valid Postcode",
                },
                city: "Please Insert City",
                state: "Please Choose State",
                location_google: "Please Choose Location",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("addProjectLocationForm")
                    );
                    // var data = $('#tree').jstree("get_selected");
                    // var id = $('#idPC').val();

                    $.ajax({
                        type: "POST",
                        url: "/createProjectLocation",
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

    const nextBtn = document.querySelectorAll(".btnNext");
    const prevBtn = document.querySelectorAll(".btnPrevious");

    nextBtn.forEach(function (item, index) {
        item.addEventListener("click", function () {
            let id = index + 1;
            let tabElement = document.querySelectorAll("#myTab li a")[id];
            var lastTab = new bootstrap.Tab(tabElement);
            lastTab.show();
        });
    });

    prevBtn.forEach(function (item, index) {
        item.addEventListener("click", function () {
            let id = index;
            let tabElement = document.querySelectorAll("#myTab li a")[id];
            var lastTab = new bootstrap.Tab(tabElement);
            lastTab.show();
        });
    });

    $(document).on("click", "#addProjectLocationButton", function () {
        $("#addProjectLocationModal").modal("show");
    });

    $(document).on("click", "#editProjectLocationButton", function () {
        var id = $(this).data("id");
        var locationData = getProjectLocations(id);

        locationData.then(function (data) {
            // console.log(data);
            $("#location_name").val(data.location_name);
            $("#address").val(data.address);
            $("#address1").val(data.address2);
            $("#postcode").val(data.postcode);
            $("#idPL").val(data.id);
            $("#city").val(data.city);
            $("#state").val(data.state);
            $("#location_google_2").val(data.location_google);
            $("#latitude_2").val(data.latitude);
            $("#longitude_2").val(data.longitude);
        });
        $("#editProjectLocationModal").modal("show");
    });

    $("#updateProjectLocation").click(function (e) {
        $("#editProjectLocationForm").validate({
            rules: {
                location_name: "required",
                address: "required",
                postcode: {
                    required: true,
                    digits: true,
                    rangelength: [5, 5],
                },
                city: "required",
                state: "required",
                location_google: "required",
            },

            messages: {
                location_name: "Please Insert Location Name",
                address: "Please Insert Address 1",
                postcode: {
                    required: "Please Insert Postcode",
                    digits: "Please Insert Valid Postcode",
                    rangelength: "Please Insert Valid Postcode",
                },
                city: "Please Insert City",
                state: "Please Choose State",
                location_google: "Please Choose Location",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("editProjectLocationForm")
                    );
                    // var data = $('#tree').jstree("get_selected");
                    var id = $("#idPL").val();

                    $.ajax({
                        type: "POST",
                        url: "/updateProjectLocation/" + id,
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

    $(document).on("click", "#deleteProjectLocationButton", function () {
        id = $(this).data("id");
        requirejs(["sweetAlert2"], function (swal) {
            swal({
                title: "Are you sure to delete Project Location?",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
            }).then(function () {
                $.ajax({
                    type: "POST",
                    url: "/deleteProjectLocation/" + id,
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

    function getProjectLocations(id) {
        return $.ajax({
            url: "/getProjectLocationById/" + id,
        });
    }
    /////////////////////// END PROJECT LOCATION /////////////////////

    /////////////////////// START PROJECT MEMBER /////////////////////
    $("#saveProjectMember").click(function (e) {
        $("#addProjectMemberForm").validate({
            rules: {
                joined_date: "required",
                employee_id: "required",
                // designation: "required",
                // department:"required",
                // branch: "required",
                // unit:"required",
                // location_name: "required",
            },

            messages: {
                joined_date: "Please Choose Joined Date",
                employee_id: "Please Choose Project Member Name",
                // department:"Please Choose department",
                // branch: "Please Choose Branch",
                // designation: "Please Choose designation",
                // unit:"Please Choose Unit",
                // location_name:"Please Select Location",
            },
            errorPlacement: function (error, element) {
                if (element.attr("name") === "employee_id") {
                    error.insertAfter("#employeeIdDiv");
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("addProjectMemberForm")
                    );
                    // var data = $('#tree').jstree("get_selected");
                    // var id = $('#idPC').val();

                    $.ajax({
                        type: "POST",
                        url: "/createProjectMember",
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

    $(document).on("change", "#employee_id", function () {
        var employee_id = $(this).val();
        var employee = getEmployeeById(employee_id);

        employee.then(function (data) {
            // $("#unit").prop("selectedIndex", data.unit);
            // $("#designation").prop("selectedIndex", data.designation);
            // $("#department").prop("selectedIndex", data.department);
            // $("#branchs").prop("selectedIndex", data.branch);
            $("#employeeJoin").val(data.joinedDate);
            $("#unit").val(data.unit);
            $("#designation").val(data.designation);
            $("#department").val(data.department);
            $("#branchs").val(data.branch);

            var a = data.joinedDate;
            var b = globalContractStartDate;
            var latestDate; // Change the variable name to "latestDate"

            if (b > a) {
                // Change the comparison from "<" to ">"
                latestDate = b; // Change the variable assignment to "latestDate"
                $("#datepicker-joineddate").val(latestDate);
            } else {
                latestDate = a;
                $("#datepicker-joineddate").val(latestDate);
            }
            $("#datepicker-joineddate").datepicker("setStartDate", latestDate); // Change the function argument to "latestDate"
            $("#datepicker-joineddate").val("");
        });
    });
    function getEmployeeById(id) {
        return $.ajax({
            url: "/getEmployeeById/" + id,
        });
    }

    var globalContractStartDate;
    $(document).on("click", "#addProjectMemberButton", function () {
        var id = $(this).data("id");
        var vehicleData = getProjectDate(id);
        vehicleData.then(function (data) {
            // $("#joined_date").val(data.joined_date);
            // $("#employee_idE").val(data.employee_id);
            // $("#unitE").val(data.unit);
            // $("#designationE").val(data.designation);
            // $("#departmentE").val(data.department);
            // $("#branchE").val(data.branch);
            // $("#exit_project").prop("checked", data.exit_project);
            // $("#exit_project_date").val(data.exit_project_date);
            $("#projectStart").val(data.contract_start_date);
            // $("#idPM").val(data.id);
            globalContractStartDate = data.contract_start_date;
        });
        $("#addProjectMemberModal").data("id", id).modal("show");
    });

    $(document).on("click", "#editProjectMemberButton", function () {
        var id = $(this).data("id");
        var vehicleData = getProjectMemberE(id);
        // console.log(vehicleData)
        vehicleData.then(function (data) {
            // console.log(id);
            $("#employee_idE").val(data.employee_id);
            $("#joined_date").val(data.joined_date);
            $("#joined_date").datepicker("setStartDate", data.joined_date);
            $("#unitE").val(data.unit);
            $("#designationE").val(data.designation);
            $("#departmentE").val(data.department);
            $("#branchE").val(data.branch);
            $("#exit_project").prop("checked", data.exit_project);
            $("#exit_project_date").val(data.exit_project_date);
            $("#idPM").val(data.id);
            // console.log(data);
        });
        $("#editProjectMemberModal").modal("show");
    });

    function getProjectMemberE(id) {
        return $.ajax({
            url: "/getProjectandMemberById/" + id,
        });
    }

    function getProjectDate(id) {
        return $.ajax({
            url: "/getProjectbyIdDate/" + id,
        });
    }

    $("#updateProjectMember").click(function (e) {
        $("#editProjectMemberForm").validate({
            rules: {
                joined_date: "required",
                employee_id: "required",
                branch: "required",
                location_name: "required",
                exit_project_date: "required",
            },

            messages: {
                joined_date: "Please Choose Date",
                employee_id: "Please Choose Name",
                branch: "Please Choose Branch",
                location_name: "Please Select Location",
                exit_project_date: "Please Choose Date",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("editProjectMemberForm")
                    );
                    // var data = $('#tree').jstree("get_selected");
                    var id = $("#idPM").val();

                    $.ajax({
                        type: "POST",
                        url: "/updateProjectMember/" + id,
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

    $(document).on("click", "#assignProjectMemberButton", function () {
        $("#assignProjectMemberModal").modal("show");
    });

    $("#assignProjectMember").click(function (e) {
        $("#assignProjectMemberForm").validate({
            rules: {
                "employee_id[]": "required",
                "location[]": "required",
            },

            messages: {
                "employee_id[]": "Please Select Project name",
                "location[]": "Please Select Location",
            },

            errorPlacement: function(error, element) {
                if (element.attr("name") === "employee_id[]") {
                    error.insertAfter("#projectmember-err");
                } else if (element.attr("name") === "location[]") {
                    error.insertAfter("#projectlocation-err");
                } else {
                    error.insertAfter(element);
                }
            },

            submitHandler: function (form) {

                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("assignProjectMemberForm")
                    );
                    // var data = $('#tree').jstree("get_selected");
                    // var id = $('#idPM').val();

                    $.ajax({
                        type: "POST",
                        url: "/assignProjectMember",
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

    $(document).on("click", "#viewAssignMemberPrevLoc", function () {
        var id = $(this).data("id");
        var vehicleData = getProjectMember(id);

        vehicleData.then(function (data) {
            console.log(data);
            $("#memberName").val(data.mem);
            $("#employee_idE").prop("selectedIndex", data.employee_id);
            $("#unitE").val(data.unit);
            $("#designationE").val(data.designation);
            $("#departmentE").val(data.department);
            $("#branchE").val(data.branch);
            $("#exit_project").prop("checked", data.exit_project);
            $("#exit_project_date").val(data.exit_project_date);
            $("#idPM").val(data.id);
        });
        $("#viewAssignMemberPrevLocModal").modal("show");
    });

    function getProjectMember(id) {
        return $.ajax({
            url: "/getProjectMemberById/" + id,
        });
    }

    $(document).on("click", "#editPreviousProjectMemberButton", function () {
        var id = $(this).data("id");
        var vehicleData = getProjectMember(id);

        vehicleData.then(function (data) {
            console.log(data);
            $("#joined_date").val(data.joined_date);
            $("#employee_idE").prop("selectedIndex", data.employee_id);
            $("#unitE").val(data.unit);
            $("#designationE").val(data.designation);
            $("#departmentE").val(data.department);
            $("#branchE").val(data.branch);
            $("#exit_project").prop("checked", data.exit_project);
            $("#exit_project_date").val(data.exit_project_date);
            $("#idPM").val(data.id);
        });
        $("#editProjectMemberModal").modal("show");
    });

    /////////////////////// END PROJECT MEMBER /////////////////////

    $(document).on("click", "#viewButton", function () {
        var id = $(this).data("id");
        var vehicleData = getData(id);
        $("input").prop("disabled", true);
        $("select").prop("disabled", true);

        vehicleData.then(function (data) {
            $("input").val("");
            vdata = data.data;
            $("#vehicleType1").prop("selectedIndex", vdata.vehicle_type);
            $("#plateNo1").val(vdata.plate_no);
        });
        $("#viewModal").modal("show");
    });

    $(document).on("click", "#deleteButton", function () {
        id = $(this).data("id");
        requirejs(["sweetAlert2"], function (swal) {
            swal({
                title: "Are you sure to delete Customer?",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
            }).then(function () {
                $.ajax({
                    type: "DELETE",
                    url: "/deleteCustomer/" + id,
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
        });
    });

    $("#saveButton").click(function (e) {
        $("#addForm").validate({
            rules: {
                customer_id: "required",
                project_code: "required",
                project_name: "required",
                contract_value: "required",
                financial_year: "required",
                LOA_date: "required",
                contract_start_date: "required",
                contract_end_date: "required",
                acc_manager: "required",
                bank_guarantee_amount: "required",
            },

            messages: {
                customer_id: "Please Select Name",
                project_code: "Please Inser Code",
                project_name: "Please Insert Project Name",
                contract_value: "Please Insert Value",
                financial_year: "Please Select Year",
                LOA_date: "Please Select Specific Date",
                contract_start_date: "Please Select Specific Date",
                contract_end_date: "Please Select Specific Date",
                acc_manager: "Please Choose Account Manager",
                bank_guarantee_amount: "Pleaser Enter Amount",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(document.getElementById("addForm"));
                    // var data = $('#tree').jstree("get_selected");

                    $.ajax({
                        type: "POST",
                        url: "/createProject",
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

    $.validator.addMethod(
        "noSpecialChars",
        function (value, element) {
            return (
                this.optional(element) ||
                /^[^A-Za-z!@#$%^&*()\-_+={}[\]\\|<>"'\/~`,.;: ]*$/.test(value)
            );
        },
        "Special Characters, Spaces, and Alphabet Characters Are Not Allowed."
    );

    $.validator.addMethod(
        "email",
        function (value, element) {
            // Email validation regex pattern
            return (
                this.optional(element) ||
                /^[^\s@]+@[^\s@]+\.(?:com|net|org|edu|gov|mil|biz|info|name|museum|coop|aero|[a-z]{2})$/.test(
                    value
                )
            );
        },
        "Please Insert Valid Email Address"
    );

    $("#updateButton").click(function (e) {
        $("#editForm").validate({
            rules: {
                customer_name: "required",
                address: "required",
                phoneNo: {
                    required: true,
                    digits: true,
                    rangelength: [10, 11],
                },
                email: {
                    required: true,
                    email: true, // Use the email validation method
                },
            },

            messages: {
                customer_name: "Please Insert Name",
                address: "Please Insert Address 1",
                phoneNo: {
                    required: "Please Insert Phone Number",
                    digits: "Please Insert Correct Phone Number Without ' - ' or Space",
                    rangelength: "Please Insert Valid Phone Number",
                },
                email: {
                    required: "Please Insert Email Address",
                    email: "Please Insert Valid Email Address",
                },
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("editForm")
                    );
                    // console.log(data);
                    var id = $("#idC").val();

                    $.ajax({
                        type: "POST",
                        url: "/updateCustomer/" + id,
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

    $(".statusCheck").on("change", function () {
        var checkedValue = $(".statusCheck:checked").val();
        var id = $(this).data("id");

        if (checkedValue) {
            var status = 1;
        } else {
            var status = 2;
        }
        requirejs(["sweetAlert2"], function (swal) {
            $.ajax({
                type: "POST",
                url: "/updateStatus/" + id + "/" + status,

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
        // updating checked attribute of change event occurred element, this.checked returns current state
        // $(".wrapper").val($(".container").html());
        // updating the value of textarea
    });

    $("#datepicker-loa").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy/mm/dd",
    });

    // Initialize the datepicker for contract_start_date
    $("#datepicker-start")
        .datepicker({
            todayHighlight: true,
            autoclose: true,
            format: "yyyy/mm/dd",
        })
        .on("changeDate", function (e) {
            var startDate = e.date;

            // Update the end datepicker's date to the selected start date
            $("#datepicker-end").datepicker("update", startDate);

            // Set the minimum date for the end datepicker to the selected start date
            $("#datepicker-end").datepicker("setStartDate", startDate);

            // Enable or disable the end datepicker based on whether a start date is selected
            if (startDate !== null) {
                $("#datepicker-end").prop("readonly", false);
            } else {
                $("#datepicker-end").prop("readonly", true);
            }
        });

    // Initialize the datepicker for contract_end_date
    $("#datepicker-end").datepicker({
        format: "yyyy/mm/dd",
        autoclose: true,
        todayHighlight: true,
    });

    // Disable the end datepicker initially
    $("#datepicker-end").prop("readonly", true);

    // Initialize the datepicker for warranty_start_date
    $(document).ready(function () {
        // Initialize the start datepicker
        $("#datepicker-warstart")
            .datepicker({
                todayHighlight: true,
                autoclose: true,
                format: "yyyy/mm/dd",
            })
            .on("changeDate", function (e) {
                var startDate = e.date;

                // Set the end datepicker's date to the selected start date
                $("#datepicker-warend").datepicker("update", startDate);

                // Set the minimum date for the end datepicker to the selected start date
                $("#datepicker-warend").datepicker("setStartDate", startDate);

                // Enable or disable the end datepicker based on whether a start date is selected
                if (startDate !== null) {
                    $("#datepicker-warend").prop("readonly", false);
                } else {
                    $("#datepicker-warend").prop("readonly", true);
                }
            });

        // Initialize the end datepicker
        $("#datepicker-warend").datepicker({
            format: "yyyy/mm/dd",
            autoclose: true,
            todayHighlight: true,
        });

        // Disable the end datepicker initially
        $("#datepicker-warend").prop("readonly", true);
    });

    $("#datepicker-bankexpiry").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy/mm/dd",
        onClose: function (dateText, inst) {
            if (dateText === "") {
                $(this).val(null); // Set the input value to null
            }
        },
    });

    $(document).on("change", "#acc_manager2", function () {
        var selectedValue = $(this).val();
        if (selectedValue !== "") {
            $("#project_manager2_show")
                .find("option")
                .remove()
                .end()
                .append(
                    '<option label="PLEASE CHOOSE" selected="selected"></option>'
                )
                .val("");

            $("#project_manager2_show").next().find(".select2-selection").css({
                "pointer-events": "auto",
                "background-color": "white",
            });

            $.ajax({
                url: "/getUserWithSelectedUser/" + selectedValue,
                success: function (data) {
                    for (let i = 0; i < data.length; i++) {
                        const user = data[i];
                        console.log(user["id"]);
                        var opt = document.createElement("option");
                        opt.value = user["id"];
                        opt.text = user["employeeName"];
                        $("#project_manager2_show").append(opt);
                    }

                    // Enable the select2 plugin after adding options

                    // Set the background color here
                },
            });

            $("#project_manager2_show").show();
            $("#project_manager2").hide();
        } else {
            $("#project_manager2_show").hide();
            $("#project_manager2").show();

            // Revert the styles when the change event occurs
            $("#project_manager2_show").next().find(".select2-selection").css({
                "pointer-events": "none",
                "background-color": "#e9ecef",
            });
        }
    });

    // config for disabled input, textarea, and select that visible
    var pmap = $("#pmap").val();
    var pmc = $("#pmc").val();
    var ac = $("#ac").val();
    var pm = $("#pm").val();

    if (pmap == "pmap") {
        $("input:visible, textarea:visible, select2:visible").each(function () {
            $(this).prop("disabled", false);
        });
        $("#project_manager2_show").prop("disabled", true);
    }

    if (pmc == "pmc") {
        $("input:visible, textarea:visible, select2:visible").each(function () {
            $(this).prop("disabled", true);
        });
        $("#project_manager2_show").prop("disabled", false);
    }

    if (ac == "ac") {
        $("input:visible, textarea:visible, select2:visible").each(function () {
            $(this).prop("disabled", true);
        });
        $("#project_manager2_show").prop("disabled", false);
    }

    if (pm == "pm") {
        $("input:visible, textarea:visible, select2:visible").each(function () {
            $(this).prop("disabled", true);
        });
        $("#updateProjectInfoButton").prop("disabled", true);
    }
});
