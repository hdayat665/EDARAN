$(document).ready(function () {
    $("#datepicker-joindate").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy/mm/dd",
    });

    $("#projectTable").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        initComplete: function (settings, json) {
            $("#projectTable").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });

    $('.selectacc2').select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
        dropdownParent: $('#addModal'),
        // multiple: true,
    });

    $("#data-table-default2").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        initComplete: function (settings, json) {
            $("#data-table-default2").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });

    $(document).on("click", "#addButton", function () {
        $("#addModal").modal("show");
    });

    $("input[type=text]").keyup(function () {
        $(this).val($(this).val().toUpperCase());
    });

    $("textarea[type=text]").keyup(function () {
        $(this).val($(this).val().toUpperCase());
    });

    $(document).on("click", "#editButton", function () {
        var id = $(this).data("id");
        var vehicleData = getData(id);

        vehicleData.then(function (data) {
            console.log(data);
            $("#customer_name").val(data.customer_name);
            $("#address").val(data.address);
            $("#phoneNo").val(data.phoneNo);
            $("#idC").val(data.id);
            $("#email").val(data.email);
        });
        $("#editModal").modal("show");
    });

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

    function getData(id) {
        return $.ajax({
            url: "/getCustomerById/" + id,
        });
    }

    function getProject(id) {
        return $.ajax({
            url: "/getProjectById/" + id,
        });
    }

    $.validator.addMethod(
        "twoDecimalPlaces",
        function (value, element) {
            return this.optional(element) || /^-?\d+(\.\d{1,2})?$/.test(value);
        },
        "Please Insert Value Up To 2 Decimal Places."
    );

    $("#saveButton").click(function (e) {
        $("#addForm").validate({
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
                acc_manager: "Please Insert Account Manager",
                status: "Please Insert Status",
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") === "acc_manager") {
                    error.insertAfter("#acc_managerdiv");
                } else {
                    error.insertAfter(element);
                }
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
                phoneNo: "required",
                email: "required",
            },

            messages: {
                customer_name: "Enter Name",
                address: "Enter Address",
                phoneNo: "Enter Phone Numer",
                email: "Enter A valid Email Address",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("editForm")
                    );
                    //console.log(data);
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

    $(document).on("click", "#approveButton", function () {
        id = $(this).data("id");
        requirejs(["sweetAlert2"], function (swal) {
            swal({
                title: "Are you sure!",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
            }).then(function () {
                $.ajax({
                    type: "POST",
                    url: "/approveProjectMember/" + id,
                    dataType: "json",

                    processData: false,
                    contentType: false,
                }).then(function (data) {
                    swal({
                        title: data.title,
                        text: "Successfully Approve Project Request",
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
        });
    });

    $(document).on("click", "#rejectViewButton", function () {
        var id = $(this).data("id");
        var projectData = getProject(id);

        projectData.then(function (data) {
            console.log(data);
            $("#idReject").val(data.id);
            $("#employeeIdR").val(data.employeeId);
            $("#employeeNameR").val(data.employeeName);
            $("#workingEmailR").val(data.workingEmail);
            $("#departmentR").val(data.departmentName);
            $("#customerNameR").val(data.customer_name);
            $("#projectCodeR").val(data.project_code);
            $("#projectNameR").val(data.project_name);
        });
        $("#rejectProjectApproval").modal("show");
    });

    $(document).ready(function () {
        $("#rejectForm").validate({
            rules: {
                reason: {
                    required: true,
                    maxlength: 255,
                },
            },
            messages: {
                reason: {
                    required: "Please Insert Reason",
                    maxlength: "Maximum 255 Characters Allowed",
                },
            },
            submitHandler: function (form) {
                id = $("#idReject").val();
                requirejs(["sweetAlert2"], function (swal) {
                    swal({
                        title: "Are you sure!",
                        type: "error",
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Yes!",
                        showCancelButton: true,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                    }).then(function () {
                        var data = new FormData(
                            document.getElementById("rejectForm")
                        );

                        $.ajax({
                            type: "POST",
                            url: "/rejectProjectMember/" + id,
                            dataType: "json",
                            data: data,

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
                });
            },
        });

        $(document).on("click", "#rejectButton", function () {
            $("#rejectForm").submit();
        });
    });

    $("#contract_start_date").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy/mm/dd",
    })
    .on("changeDate", function (e) {
        // Enable the end datepicker and remove the readonly attribute
        $("#contract_end_date").prop("readonly", false);

        // Set the end datepicker's date to the selected start date
        $("#contract_end_date").datepicker("update", e.date);

        // Set the minimum date for the end datepicker to the selected start date
        $("#contract_end_date").datepicker("setStartDate", e.date);
    });

$("#contract_end_date").datepicker({
    format: "yyyy/mm/dd", // Sets the date format to 'day/month/year'
    autoclose: true, // Closes the datepicker on selection
}).prop("readonly", true); // Set the end date input field as readonly initially


$(document).ready(function () {
    // Initialize the start datepicker
    $("#datepicker-warstart").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy/mm/dd",
    }).on("changeDate", function (e) {
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


    $("#datepicker-loa").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy/mm/dd",
    });

    $("#datepicker-bankexpiry").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy/mm/dd",
    });
});
