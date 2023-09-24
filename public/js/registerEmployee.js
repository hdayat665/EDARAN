$(document).ready(function () {

    $("#reportsearch").select2({
        placeholder: "<span style='color: black;'>PLEASE CHOOSE</span>",
        escapeMarkup: function(markup) {
        return markup
        },
        allowClear: true,
    });

    $("#designationsearch").select2({
        placeholder: "<span style='color: black;'>PLEASE CHOOSE</span>",
        escapeMarkup: function(markup) {
        return markup
        },
        allowClear: true,
    });

    $("input[type=text]").keyup(function () {
        $(this).val($(this).val().toUpperCase());
    });
    $("option[type=text]").keyup(function () {
        $(this).val($(this).val().toUpperCase());
    });

    $("#idnumber").change(function () {
        if ($(this).val().length == 12) {
            var idn = $(this).val();

            var lastIc = idn.substring(10, 12);

            if (lastIc % 2 == 0) {
                $("#gender").val(2);
            } else {
                $("#gender").val(1);
            }
        }
    });

    $("#datepicker-autoClose").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy/mm/dd",

    });

    $("#datepicker-birth").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy/mm/dd",

    });

    $("#datepicker-joindate").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy/mm/dd",

    });
    $("#datepicker-expiryDate").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy-mm-dd"
    });
    $("#firstName,#lastName").change(function () {
        var fn = $("#firstName").val();
        var ln = $("#lastName").val();
        $("#fullName").val(fn + " " + ln);
    });

    $("#idnumber").change(function () {
        if ($(this).val().length == 12) {
            var idn = $(this).val();
            var year = idn.substring(0, 2);
            var month = idn.substring(2, 4);
            var day = idn.substring(4, 6);

            var cutoff = new Date().getFullYear() - 2000;

            $("#datepicker-birth").val(
                (year > cutoff ? "19" : "20") + year + "-" + month + "-" + day
            );
        }
    });

    $("#idnumber").change(function () {
        if ($(this).val().length == 12) {
            var idn = $(this).val();

            var lastIc = idn.substring(10, 12);

            if (lastIc % 2 == 0) {
                $("#gender").val(2);
            } else {
                $("#gender").val(1);
            }
        }
    });

    $("#nonNetizen").change(function () {
        if (this.checked) {
            $("#gender").prop("readonly", false);
            $("#gender").prop("required", true);
            $("#gender").removeAttr("style");
            $("#gender").css({
                backgroundColor: "none",
            });
            $("#gender").val("");

        } else {
            $("#gender").prop("readonly", true);
            $("#gender").prop("required", false);
            $("#gender").attr("style", "pointer-events: none");
            $("#gender").css({
                backgroundColor: "#e9ecef",
            });
        }
    });

    var editparent2 = "#countryadd, #postcodeadd, #cityadd, #stateadd";
            $(editparent2).select2({
                placeholder: "PLEASE CHOOSE",
                allowClear: true,
            });

    $("#same-address").change(function () {
        if (this.checked) {

            var editparent2 = "#countryadd, #postcodeadd, #cityadd, #stateadd";
            $(editparent2).select2('destroy');

            $("#address1add").val($("#address1").val()).prop("readonly", true);
            $("#address2add").val($("#address2").val()).prop("readonly", true);
            $("#postcodeadd").val($("#postcode").val()).prop("readonly", true).css({
                "pointer-events": "none",
                "touch-action": "none",
                "background-color": "#e9ecef",
            });
            $("#cityadd").val($("#city").val()).prop("readonly", true).css({
                "pointer-events": "none",
                "touch-action": "none",
                "background-color": "#e9ecef",
            });
            $("#stateadd").val($("#state").val()).css({
                "pointer-events": "none",
                "touch-action": "none",
                "background-color": "#e9ecef",
            });
            $("#countryadd").val($("#country").val()).css({
                "pointer-events": "none",
                "touch-action": "none",
                "background-color": "#e9ecef",
            });

            var id = "{{ $user->id }}";

        } else {

            var editparent2 = "#countryadd, #postcodeadd, #cityadd, #stateadd";
            $(editparent2).select2({
                placeholder: "PLEASE CHOOSE",
                allowClear: true,
            });
            $("#address1add").val("").prop("readonly", false);
            $("#address2add").val("").prop("readonly", false);
            $("#postcodeadd").prop("readonly", false).css({
                "pointer-events": "auto",
                "touch-action": "auto",
                "background-color": "transparent",
            });
            $('#postcodeadd').val(null).trigger('change');
            $("#cityadd").prop("readonly", false).css({
                "pointer-events": "auto",
                "touch-action": "auto",
                "background-color": "transparent",
            });
            $('#cityadd').val(null).trigger('change');
            $("#stateadd").css({
                "pointer-events": "auto",
                "touch-action": "auto",
                "background-color": "transparent",
            });
            $('#stateadd').val(null).trigger('change');
            $("#countryadd").css({
                "pointer-events": "auto",
                "touch-action": "auto",
                "background-color": "transparent",
            });
            $('#countryadd').val(null).trigger('change');

        }
    });

    $(".partCheck").click(function () {
        if ($(this).prop("checked")) {
            $("#idnumber").prop("disabled", true);
            $("#idnumber").prop("required", false);
            $("#idnumber").val("");
        } else {
            $("#idnumber").prop("disabled", false);
            $("#idnumber").prop("required", true);
        }
    });

    $("#passport").change(function () {
        if (($("#passport").val() !== "") ) {
            $("#datepicker-expiryDate").prop("readonly", false);
            $("#datepicker-expiryDate").prop("required", true);
            $("#datepicker-expiryDate").css("pointer-events", "auto");

            $("#issuingCountry2").prop("readonly", false);
            $("#issuingCountry2").prop("required", true);
            $("#issuingCountry2").css({
                "pointer-events": "auto",
                "background-color": "transparent",
            });

        } else {
            $("#datepicker-expiryDate").prop("readonly", true);
            $("#datepicker-expiryDate").prop("required", false);
            $("#datepicker-expiryDate").css("pointer-events", "none");
            $("#datepicker-expiryDate").val("");

            $("#issuingCountry2").val("");
            $("#issuingCountry2").prop("readonly", true);
            $("#issuingCountry2").prop("required", false);
            $("#issuingCountry2").css({
                "pointer-events": "none",
                "background-color": "#e9ecef",
            });
        }
    });

    $.validator.addMethod(
        "noSpecialChars",
        function (value, element) {
            return this.optional(element) || /^[A-Za-z0-9]*$/.test(value);
        },
        "Special Characters Are Not Allowed"
    );
    $(function () {
        $("#empId, #uId").on("input", function () {
            var sanitized = $(this)
                .val()
                .replace(/[^A-Za-z0-9]/g, "");
            $(this).val(sanitized);
        });
    });

    $.validator.addMethod(
        "noSpecialChars",
        function (value, element) {
            return this.optional(element) || /^[A-Za-z\s\-\.\',]+$/.test(value);
        },
        "Numeric Characters Are Not Allowed"
    );
    $(function () {
        $("#firstName, #lastName").on("input", function () {
            var sanitized = $(this)
                .val()
                .replace(/[^A-Za-z\s\-\.\',]/g, "");
            $(this).val(sanitized);
        });
    });

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

    $("#profileForm").click(function (e) {
        $("#profileForm").validate({
            // Specify validation rules
            rules: {
                employee_id: {
                    required: true,
                },
                username: "required",
                firstName: {
                    required: true,
                },
                lastName: {
                    required: true,
                },
                idNo: {
                    required: true,
                    digits: true,
                    rangelength: [12, 12],
                },
                DOB: "required",
                gender: "required",
                maritialStatus: "required",
                religion: "required",
                personalEmail: {
                    required: false,
                    email: true, // Use the email validation method
                },
                phoneNo: {
                    required: true,
                    digits: true,
                    rangelength: [10, 11],
                },
            },

            messages: {
                employee_id: {
                    required: "Please Insert Employee ID",
                },
                username: "Please Insert Username",
                firstName: {
                    required: "Please Insert First Name",
                },
                lastName: {
                    required: "Please Insert Last Name",
                },
                idNo: {
                    required: "Please Insert Identification Number",
                    digits: "Please Insert correct Identification Number without '-' or space",
                    rangelength: "Please Insert Valid Identification Number",
                },
                passport: "Please Insert Passport Number",
                expiryDate: "Please Insert Expiry Date",
                issuingCountry: "Please Choose Issuing Country",
                DOB: "Please Insert Date Of Birth",
                gender: "Please Choose Gender",
                maritialStatus: "Please Choose Marital Status",
                religion: "Please Choose Religion",
                personalEmail: {
                    email: "Please Insert Valid Personal Email",
                },
                phoneNo: {
                    required: "Please Insert Phone Number",
                    digits: "Please Insert Correct Phone Number Without ' - ' or Space",
                    rangelength: "Please Insert Valid Phone Number",
                },
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("profileForm")
                    );
                    var emplId = $("#empId").val();
                    var employeeName = $("#fullName").val();
                    var employeeEmail = $("#personalEmail").val();
                    $.ajax({
                        type: "POST",
                        url: "/addProfile",
                        data: data,
                        dataType: "json",

                        processData: false,
                        contentType: false,
                    }).then(function (data) {
                        console.log(data);
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
                                // window.location.href = "/dashboardTenant";
                                $("#user_id").val(data.data.user_id);
                                $("#employeeId").val(emplId);
                                $("#employeeName").val(employeeName);
                                $("#employeeEmail").val(employeeEmail);
                                $("#user_id1").val(data.data.user_id);

                                $("#nav-prof").removeClass("active");
                                $("#nav-addr").addClass("active");
                                $("#nav-det").removeClass("active");

                                $("#default-tab-1").removeClass("active show");
                                $("#default-tab-2").addClass("active show");
                                $("#default-tab-3").removeClass("active show");
                            }
                        });
                    });
                });
            },
        });
    });
    $("#prev_btn_addr_det").click(function () {
        $("#nav-prof").addClass("active");
        $("#nav-addr").removeClass("active");
        $("#nav-det").removeClass("active");

        $("#default-tab-1").addClass("active show");
        $("#default-tab-2").removeClass("active show");
        $("#default-tab-3").removeClass("active show");
    });

    $("#submitAddress").click(function (e) {
        $("#addressForm").validate({
            // Specify validation rules
            rules: {
                address1: "required",
                city: "required",
                state: "required",
                country: "required",
                postcode: {
                    required: true,

                },
                address1c: "required",
                cityc: "required",
                statec: "required",
                countryc: "required",
                postcodec: {
                    required: true,

                },
            },

            messages: {
                address1: "Please Insert Address 1",
                city: "Please Insert City",
                state: "Please Choose State",
                country: "Please Choose Country",
                postcode: {
                    required: "Please Insert Postcode",

                },
                address1c: "Please Insert Address 1",
                cityc: "Please Insert City",
                statec: "Please Choose State",
                countryc: "Please Choose Country",
                postcodec: {
                    required: "Please Insert Postcode",

                },
            },

            errorPlacement: function(error, element) {
                if (element.attr("name") === "country") {
                    error.insertAfter("#country-err");
                } else if (element.attr("name") === "state") {
                    error.insertAfter("#state-err");
                } else if (element.attr("name") === "city") {
                    error.insertAfter("#city-err");
                } else if (element.attr("name") === "postcode") {
                    error.insertAfter("#postcode-err");
                } else if (element.attr("name") === "countryadd") {
                    error.insertAfter("#countryadd-err");
                } else if (element.attr("name") === "stateadd") {
                    error.insertAfter("#stateadd-err");
                } else if (element.attr("name") === "cityadd") {
                    error.insertAfter("#cityadd-err");
                } else if (element.attr("name") === "postcodeadd") {
                    error.insertAfter("#postcodeadd-err");
                } else {
                    error.insertAfter(element);
                }
            },

            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("addressForm")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/addAddress",
                        data: data,
                        dataType: "json",

                        processData: false,
                        contentType: false,
                    }).then(function (data) {
                        console.log(data);
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
                                // window.location.href = "/dashboardTenant";
                                // $('#user_id').val(data.data.user_id);
                                // $('#user_id1').val(data.data.user_id);

                                // Navigation after submit
                                $("#nav-prof").removeClass("active");
                                $("#nav-addr").removeClass("active");
                                $("#nav-det").addClass("active");

                                $("#default-tab-1").removeClass("active show");
                                $("#default-tab-2").removeClass("active show");
                                $("#default-tab-3").addClass("active show");
                            }
                        });
                    });
                });
            },
        });
    });

    $("#prev_emp_det").click(function () {
        $("#nav-prof").removeClass("active");
        $("#nav-addr").addClass("active");
        $("#nav-det").removeClass("active");

        $("#default-tab-1").removeClass("active show");
        $("#default-tab-2").addClass("active show");
        $("#default-tab-3").removeClass("active show");
    });

    $("#submitEmployment").click(function (e) {
        $("#employmentForm").validate({
            // Specify validation rules
            rules: {
                company: "required",
                departmentId: "required",
                branchId: "required",
                jobGrade: "required",
                designation: "required",
                employmentType: "required",
                // supervisor: "required",
                workingEmail: {
                    required: true,
                    email: true,
                },
                joinedDate: "required",
            },

            messages: {
                company: "Please Insert Company",
                departmentId: "Please Insert Department",
                branchId: "Please Insert Branch",
                jobGrade: "Please Insert Job Grade",
                designation: "Please Insert Designation",
                employmentType: "Please Insert Employment Type",
                // supervisor: "Please Insert Your Supervisor",
                workingEmail: {
                    required: "Please Insert Working Email",
                    email: "Please Insert Valid Email",
                },
                joinedDate: "Please Choose Joined Date",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("employmentForm")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/addEmployment",
                        data: data,
                        dataType: "json",

                        processData: false,
                        contentType: false,
                    }).then(function (data) {
                        console.log(data);
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
                                window.location.href = "/employeeInfoView";
                                // $('#user_id').val(data.data.user_id);
                                // $('#user_id1').val(data.data.user_id);
                            }
                        });
                    });
                });
            },
        });
    });
});
