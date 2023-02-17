$(document).ready(function () {
    $("#firstname,#lastname").change(function () {
        var a = $("#firstname").val();
        var b = $("#lastname").val();
        $("#fullName").val(a + " " + b);
    });

    $("#tableSibling").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"],
        ],
    });

    $("#gender").css({
        "pointer-events": "none",
        "touch-action": "none",
        background: "#e9ecef",
    });

    $("#passportmyprofile").change(function () {
        if ($("#expirydatemyprofile").prop("readonly")) {
            $("#expirydatemyprofile").prop("readonly", false);
            $("#expirydatemyprofile").css("pointer-events", "auto");
        } else {
            $("#expirydatemyprofile").prop("readonly", true);
            $("#expirydatemyprofile").css("pointer-events", "none");
            $("#expirydatemyprofile").val("");
        }
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

    $("#idnumber").change(function () {
        if ($(this).val().length == 12) {
            var idn = $(this).val();
            var year = idn.substring(0, 2);
            var month = idn.substring(2, 4);
            var day = idn.substring(4, 6);

            var cutoff = new Date().getFullYear() - 2000;

            $("#dob").val(
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

    //COMPANION INFORMATION
    $("#idnumber2").change(function () {
        if ($(this).val().length == 12) {
            var idn = $(this).val();
            var year = idn.substring(0, 2);
            var month = idn.substring(2, 4);
            var day = idn.substring(4, 6);

            var cutoff = new Date().getFullYear() - 2000;

            $("#dobmc").val(
                (year > cutoff ? "19" : "20") + year + "-" + month + "-" + day
            );
        }
    });

    $("#idnumber2").change(function () {
        if ($(this).val().length == 12) {
            var idn = $(this).val();
            var year = idn.substring(0, 2);

            var cutoff = new Date().getFullYear() - 2000;

            var ww = (year > cutoff ? "19" : "20") + year;
            var currentAge = new Date().getFullYear() - ww;
            $("#age").val(currentAge);
        }
    });

    $("#passportmc").change(function () {
        if ($("#expirydatemc").prop("readonly")) {
            $("#expirydatemc").prop("readonly", false);
            $("#expirydatemc").css("pointer-events", "auto");
        } else {
            $("#expirydatemc").prop("readonly", true);
            $("#expirydatemc").css("pointer-events", "none");
            $("#expirydatemc").val("");
        }
    });

    //ADD CHILDREN DETAILS
    $("#idNoaddChild").change(function () {
        if ($(this).val().length == 12) {
            var idn = $(this).val();
            var year = idn.substring(0, 2);
            var month = idn.substring(2, 4);
            var day = idn.substring(4, 6);

            var cutoff = new Date().getFullYear() - 2000; //2022-2000=22cutoff
            //98>22->19+98
            $("#DOBChild").val(
                (year > cutoff ? "19" : "20") + year + "-" + month + "-" + day
            );
        }
    });

    $("input[type=text]").keyup(function () {
        $(this).val($(this).val().toUpperCase());
    });

    $("#idNoaddChild").change(function () {
        if ($(this).val().length == 12) {
            var idn = $(this).val();

            var lastIc = idn.substring(10, 12);

            if (lastIc % 2 == 0) {
                $("#childgender").val(2);
            } else {
                $("#childgender").val(1);
            }
        }
    });

    $("#idNoaddChild").change(function () {
        if ($(this).val().length == 12) {
            var idn = $(this).val();
            var year = idn.substring(0, 2);

            var cutoff = new Date().getFullYear() - 2000; //2022-2000=22cutoff
            //98>22->19+98->>1998
            //$('#DOBChild').val((year > cutoff ? '19' : '20') + year + '-' + month + '-' + day);
            //2022-1998
            var ww = (year > cutoff ? "19" : "20") + year;
            var currentAge = new Date().getFullYear() - ww;
            $("#ageChild").val(currentAge);
        }
    });

    $("#passportChild").change(function () {
        if ($("#expiryDateChild").prop("readonly")) {
            $("#expiryDateChild").prop("readonly", false);
            $("#expiryDateChild").css("pointer-events", "auto");
        } else {
            $("#expiryDateChild").prop("readonly", true);
            $("#expiryDateChild").css("pointer-events", "none");
            $("#expiryDateChild").val("");
        }
    });

    //UPDATE CHILDREN DETAILS
    $("#idNo1").change(function () {
        if ($(this).val().length == 12) {
            var idn = $(this).val();
            var year = idn.substring(0, 2);
            var month = idn.substring(2, 4);
            var day = idn.substring(4, 6);

            var cutoff = new Date().getFullYear() - 2000;

            $("#DOB1").val(
                (year > cutoff ? "19" : "20") + year + "-" + month + "-" + day
            );
        }
    });

    $("#idNo1").change(function () {
        if ($(this).val().length == 12) {
            var idn = $(this).val();

            var lastIc = idn.substring(10, 12);

            if (lastIc % 2 == 0) {
                $("#gender1").val(2);
            } else {
                $("#gender1").val(1);
            }
        }
    });

    $("#idNo1").change(function () {
        if ($(this).val().length == 12) {
            var idn = $(this).val();
            var year = idn.substring(0, 2);

            var cutoff = new Date().getFullYear() - 2000; //2022-2000=22cutoff
            //98>22->19+98->>1998
            //$('#DOBChild').val((year > cutoff ? '19' : '20') + year + '-' + month + '-' + day);
            //2022-1998
            var ww = (year > cutoff ? "19" : "20") + year;
            var currentAge = new Date().getFullYear() - ww;
            $("#age1").val(currentAge);
        }
    });

    $("#passports1").change(function () {
        if ($("#expiryDate1").prop("readonly")) {
            $("#expiryDate1").prop("readonly", false);
            $("#expiryDate1").css("pointer-events", "auto");
        } else {
            $("#expiryDate1").prop("readonly", true);
            $("#expiryDate1").css("pointer-events", "none");
            $("#expiryDate1").val("");
        }
    });

    $("#saveProfile").click(function (e) {
        $("#formProfile").validate({
            // Specify validation rules
            rules: {
                personalEmail: {
                    required: true,
                    email: true,
                },

                firstName: "required",
                lastName: "required",
                fullName: "required",
                gender: "required",
                maritialStatus: "required",
                idNo: {
                    required: true,
                    digits: true,
                    rangelength: [12, 12],
                },
                phoneNo: {
                    required: true,
                    digits: true,
                    rangelength: [10, 11],
                },
                homeNo: {
                    digits: true,
                    rangelength: [9, 9],
                },
                extensionNo: {
                    digits: true,
                    rangelength: [4, 4],
                },
                // okuChecked: {
                //     required: true
                // },
            },

            messages: {
                personalEmail: {
                    required: "Please Insert Personal Email",
                    email: "Please Insert Valid Email Address",
                },
                firstName: "Please Insert First Name",
                lastName: "Please Insert Last Name",
                fullName: "Please Insert Full Name",
                gender: "Please Choose Gender",
                maritialStatus: "Please Choose Marital Status",
                religion: "Please Choose Religion",
                race: "Please Choose Race",
                //okuChecked: "Please Insert Valid OKU Card Number",
                idNo: {
                    required: "Please Insert New Identification Number",
                    digits: "Please Insert Correct Identification Number Without ' - ' or Space",
                    rangelength: "Please Insert Valid Identification Number",
                },
                phoneNo: {
                    required: "Please Insert Phone Number",
                    digits: "Please Insert Correct Phone Number Without ' - ' or Space",
                    rangelength: "Please Insert Valid Phone Number",
                },
                homeNo: {
                    digits: "Please Insert Correct Home Number Without ' - ' or Space",
                    rangelength: "Please Insert Valid Homee Number",
                },
                extensionNo: {
                    digits: "Please Insert Correct Extension Number Without ' - ' or Space",
                    rangelength: "Please Insert Valid Extension Number",
                },
            },
            submitHandler: function (form) {
                // requirejs(['sweetAlert2'], function(swal,swal1) {

                Swal.fire({
                    allowOutsideClick: false,
                    showCancelButton: true,
                    cancelButtonColor: "#d33",
                    confirmButtonColor: "#3085d6",
                    title: "Declaration.",
                    icon: "info",
                    html:
                        '<h5> <input type="checkbox" class="form-check-input" name="t11" id="t1"  />  I hereby certify the above information as provided by me is true and correct. I also undertake to keep the Company informed of any changes covering such information of my personal details as and when it occurs. If any information given above is subsequently found to be incorrect or incomplete or untrue, the Company may terminate my employment without notice or compensation.</h5><br>' +
                        '<h5> <input type="checkbox" class="form-check-input" name="t22" id="t2"  />  I hereby state that I may be liable to summary dismissal if any of the particulars has been misrepresented or omitted. I acknowledge that the Company has the right to recover any salaries and monetary benefits paid out to me during the course of my employment in the event of any misrepresentation or omission on my personal data.</h5><br>' +
                        '<h5> <input type="checkbox" class="form-check-input" name="t33" id="t3"  />  I hereby give consent for Company to process and keep my personal data for employment purposes.</h5>',
                    confirmButtonText: "Yes",

                    preConfirm: () => {
                        if (
                            !$("#t1").prop("checked") ||
                            !$("#t2").prop("checked") ||
                            !$("#t3").prop("checked")
                        ) {
                            Swal.showValidationMessage(
                                '<i class="fa fa-info-circle"></i> Please check all term to proceed'
                            );
                        } else if (
                            $("#t1").prop("checked") ||
                            $("#t2").prop("checked") ||
                            $("#t3").prop("checked")
                        ) {
                            var data = new FormData(
                                document.getElementById("formProfile")
                            );

                            //data.append('okuStatus', okuStatus);

                            $.ajax({
                                type: "POST",
                                url: "/updateMyProfile",
                                data: data,
                                dataType: "json",
                                async: false,
                                processData: false,
                                contentType: false,
                            }).done(function (data) {
                                console.log(data);
                                Swal.fire({
                                    title: data.title,
                                    icon: "success",
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
                                        // window.location.href = "/myProfile";
                                    }
                                });
                            });
                        } else {
                            Swal.showValidationMessage(
                                '<i class="fa fa-info-circle"></i> error'
                            );
                        }
                    },
                }).then((result) => {});

                // });
            },
        });
    });

    var hash = location.hash.replace(/^#/, ""); // ^ means starting, meaning only match the first hash
    if (hash) {
        $('.nav-tabs a[href="#' + hash + '"]').tab("show");
    }
    $(".nav-tabs a").on("shown.bs.tab", function (e) {
        window.location.hash = e.target.hash;
    });

    //ADD EDUCATION QUALIFICATIONS
    $("#saveEducation").click(function (e) {
        // $.validator.addMethod("greaterThan", function(value, element, param) {
        //     var from = $(param).val();
        //     if (value && from) {
        //       return new Date(value) >= new Date(from);
        //     }
        //     return true;
        //   }, "Please enter a valid date");

        $("#addEducation").validate({
            // Specify validation rules
            rules: {
                fromDate: "required",
                toDate: "required",
                instituteName: "required",
                highestLevelAttained: "required",
                result: "required",
            },

            messages: {
                fromDate: "Please insert From Date",
                toDate: "Please insert To Date",
                instituteName: "Please insert Institute Name",
                highestLevelAttained: "Please insert Highest Level Attained",
                result: "Please insert Result",
            },

            submitHandler: function (form) {
                Swal.fire({
                    allowOutsideClick: false,
                    showCancelButton: true,
                    cancelButtonColor: "#d33",
                    confirmButtonColor: "#3085d6",
                    title: "Declaration.",
                    icon: "info",
                    html:
                        '<h5> <input type="checkbox" class="form-check-input" name="t11" id="t1"  />  I hereby certify the above information as provided by me is true and correct. I also undertake to keep the Company informed of any changes covering such information of my personal details as and when it occurs. If any information given above is subsequently found to be incorrect or incomplete or untrue, the Company may terminate my employment without notice or compensation.</h5><br>' +
                        '<h5> <input type="checkbox" class="form-check-input" name="t22" id="t2"  />  I hereby state that I may be liable to summary dismissal if any of the particulars has been misrepresented or omitted. I acknowledge that the Company has the right to recover any salaries and monetary benefits paid out to me during the course of my employment in the event of any misrepresentation or omission on my personal data.</h5><br>' +
                        '<h5> <input type="checkbox" class="form-check-input" name="t33" id="t3"  />  I hereby give consent for Company to process and keep my personal data for employment purposes.</h5>',
                    confirmButtonText: "Yes",

                    preConfirm: () => {
                        if (
                            !$("#t1").prop("checked") ||
                            !$("#t2").prop("checked") ||
                            !$("#t3").prop("checked")
                        ) {
                            Swal.showValidationMessage(
                                '<i class="fa fa-info-circle"></i> Please check all term to proceed'
                            );
                        } else if (
                            $("#t1").prop("checked") ||
                            $("#t2").prop("checked") ||
                            $("#t3").prop("checked")
                        ) {
                            var data = new FormData(
                                document.getElementById("addEducation")
                            );

                            $.ajax({
                                type: "POST",
                                url: "/saveEducation",
                                data: data,
                                dataType: "json",
                                async: false,
                                processData: false,
                                contentType: false,
                            }).done(function (data) {
                                console.log(data);
                                Swal.fire({
                                    title: data.title,
                                    icon: "success",
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
                        } else {
                            Swal.showValidationMessage(
                                '<i class="fa fa-info-circle"></i> error'
                            );
                        }
                    },
                }).then((result) => {});
            },
        });
    });

    $("#saveAddress").click(function (e) {
        $("#formAddress").validate({
            // Specify validation rules
            rules: {
                address1: "required",
                city: "required",
                state: "required",
                country: "required",
                postcode: {
                    required: true,
                    digits: true,
                    rangelength: [5, 5],
                },
                address1c: "required",
                cityc: "required",
                statec: "required",
                countryc: "required",
                postcodec: {
                    required: true,
                    digits: true,
                    rangelength: [5, 5],
                },
            },

            messages: {
                address1: "Please Insert Address",
                city: "Please Insert City",
                state: "Please Choose State",
                country: "required",
                postcode: {
                    required: "Please Insert Postcode",
                    digits: "Please Insert Valid Postcode",
                    rangelength: "Please Insert Valid Postcode",
                },
                address1c: "Please Insert Address",
                cityc: "Please Insert City",
                statec: "Please Choose State",
                countryc: "required",
                postcodec: {
                    required: "Please Insert Postcode",
                    digits: "Please Insert Valid Postcode",
                    rangelength: "Please Insert Valid Postcode",
                },
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("formAddress")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/updateAddress",
                        data: data,
                        dataType: "json",
                        async: false,
                        processData: false,
                        contentType: false,
                    }).done(function (data) {
                        // console.log(data);
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
                                // window.location.href = "/dashboardTenant";
                            }
                        });
                    });
                });
            },
        });
    });

    $("#saveEmergency, #saveEmergency2").click(function (e) {
        $("#formEmergency, #formEmergency2").validate({
            // Specify validation rules
            rules: {
                firstName: "required",
                lastName: "required",
                relationship: "required",
                contactNo: {
                    required: true,
                    digits: true,
                    rangelength: [10, 11],
                },
                relationship: "required",
                address1: "required",
                postcode: {
                    required: true,
                    digits: true,
                    rangelength: [5, 5],
                },
                city: "required",
                state: "required",
            },

            messages: {
                firstName: "Please Insert First Name",
                lastName: "Please Insert Last Name",
                relationship: "Please Choose Relationship",
                contactNo: {
                    required: "Please Insert Contact Number",
                    digits: "Please Insert Correct Contact Number",
                },
                relationship: "Please Insert Relationship",
                address1: "Please Insert Address",
                postcode: {
                    required: "Please Insert Postcode",
                    digits: "Please Insert Valid Postcode",
                    rangelength: "Please Insert Valid Postcode",
                },
                city: "Please Insert City",
                state: "Please Choose State",
            },

            submitHandler: function (form) {
                // requirejs(['sweetAlert2'], function(swal) {

                Swal.fire({
                    allowOutsideClick: false,
                    showCancelButton: true,
                    cancelButtonColor: "#d33",
                    confirmButtonColor: "#3085d6",
                    title: "Declaration.",
                    icon: "info",
                    html:
                        '<h5> <input type="checkbox" class="form-check-input" name="t11" id="t1"  />  I hereby certify the above information as provided by me is true and correct. I also undertake to keep the Company informed of any changes covering such information of my personal details as and when it occurs. If any information given above is subsequently found to be incorrect or incomplete or untrue, the Company may terminate my employment without notice or compensation.</h5><br>' +
                        '<h5> <input type="checkbox" class="form-check-input" name="t22" id="t2"  />  I hereby state that I may be liable to summary dismissal if any of the particulars has been misrepresented or omitted. I acknowledge that the Company has the right to recover any salaries and monetary benefits paid out to me during the course of my employment in the event of any misrepresentation or omission on my personal data.</h5><br>' +
                        '<h5> <input type="checkbox" class="form-check-input" name="t33" id="t3"  />  I hereby give consent for Company to process and keep my personal data for employment purposes.</h5>',
                    confirmButtonText: "Yes",

                    preConfirm: () => {
                        if (
                            !$("#t1").prop("checked") ||
                            !$("#t2").prop("checked") ||
                            !$("#t3").prop("checked")
                        ) {
                            Swal.showValidationMessage(
                                '<i class="fa fa-info-circle"></i> Please check all term to proceed'
                            );
                        } else if (
                            $("#t1").prop("checked") ||
                            $("#t2").prop("checked") ||
                            $("#t3").prop("checked")
                        ) {
                            var data = new FormData(
                                document.getElementById("formEmergency")
                            );
                            var data2 = new FormData(
                                document.getElementById("formEmergency2")
                            );

                            // Append additional data to FormData object
                            for (var pair of data2.entries()) {
                                data.append(pair[0], pair[1]);
                            }

                            $.ajax({
                                type: "POST",
                                url: "/updateEmergency",
                                data: data,
                                dataType: "json",
                                async: false,
                                processData: false,
                                contentType: false,
                            }).done(function (data) {
                                console.log(data);
                                Swal.fire({
                                    title: data.title,
                                    icon: "success",
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
                                        // window.location.href = "/myProfile";
                                    }
                                });
                            });
                        } else {
                            Swal.showValidationMessage(
                                '<i class="fa fa-info-circle"></i> error'
                            );
                        }
                    },
                }).then((result) => {});

                // });
            },
        });
    });

    $("#addCompanion").click(function (e) {
        $("#addCompanionForm").validate({
            // Specify validation rules
            rules: {
                firstName: "required",
                lastName: "required",
                idNo: {
                    required: true,
                    digits: true,
                    rangelength: [12, 12],
                },
                contactNo: {
                    digits: true,
                    rangelength: [10, 11],
                },

                address1: "required",
                city: "required",
                state: "required",
                country: "required",
                postcode: {
                    required: true,
                    digits: true,
                    rangelength: [5, 5],
                },
            },

            messages: {
                firstName: "Please Insert First Name",
                lastName: "Please Insert Last Name",
                idNo: {
                    required: "Please Insert New Identification Number",
                    digits: "Please Insert Correct Identification Number Without ' - ' or Space",
                    rangelength: "Please insert Valid Identification Number",
                },
                contactNo: {
                    required: "Please Insert Contact Number",
                    digits: "Please Insert Correct Contact Number Without ' - ' or Space",
                    rangelength: "Please Insert Valid Contact Number ",
                },

                address1: "Please Insert Address",
                city: "Please Insert City",
                state: "Please Choose State",
                country: "required",
                postcode: {
                    required: "Please Insert Postcode",
                    digits: "Please Insert Valid Postcode",
                    rangelength: "Please Insert Valid Postcode",
                },
            },
            submitHandler: function (form) {
                // requirejs(['sweetAlert2'], function(swal,swal1) {

                Swal.fire({
                    allowOutsideClick: false,
                    showCancelButton: true,
                    cancelButtonColor: "#d33",
                    confirmButtonColor: "#3085d6",
                    title: "Declaration.",
                    icon: "info",
                    html:
                        '<h5> <input type="checkbox" class="form-check-input" name="t11" id="t1"  />  I hereby certify the above information as provided by me is true and correct. I also undertake to keep the Company informed of any changes covering such information of my personal details as and when it occurs. If any information given above is subsequently found to be incorrect or incomplete or untrue, the Company may terminate my employment without notice or compensation.</h5><br>' +
                        '<h5> <input type="checkbox" class="form-check-input" name="t22" id="t2"  />  I hereby state that I may be liable to summary dismissal if any of the particulars has been misrepresented or omitted. I acknowledge that the Company has the right to recover any salaries and monetary benefits paid out to me during the course of my employment in the event of any misrepresentation or omission on my personal data.</h5><br>' +
                        '<h5> <input type="checkbox" class="form-check-input" name="t33" id="t3"  />  I hereby give consent for Company to process and keep my personal data for employment purposes.</h5>',
                    confirmButtonText: "Yes",

                    preConfirm: () => {
                        if (
                            !$("#t1").prop("checked") ||
                            !$("#t2").prop("checked") ||
                            !$("#t3").prop("checked")
                        ) {
                            Swal.showValidationMessage(
                                '<i class="fa fa-info-circle"></i> Please check all term to proceed'
                            );
                        } else if (
                            $("#t1").prop("checked") ||
                            $("#t2").prop("checked") ||
                            $("#t3").prop("checked")
                        ) {
                            var data = new FormData(
                                document.getElementById("addCompanionForm")
                            );

                            $.ajax({
                                type: "POST",
                                url: "/addCompanion",
                                data: data,
                                dataType: "json",
                                async: false,
                                processData: false,
                                contentType: false,
                            }).done(function (data) {
                                console.log(data);
                                Swal.fire({
                                    title: data.title,
                                    icon: "success",
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
                                        // window.location.href = "/myProfile";
                                    }
                                });
                            });
                        } else {
                            Swal.showValidationMessage(
                                '<i class="fa fa-info-circle"></i> error'
                            );
                        }
                    },
                }).then((result) => {});

                // });
            },
        });
    });

    companion = ["1", "2", "3", "4"];
    for (let i = 0; i < companion.length; i++) {
        const no = companion[i];
        $("#updateCompanion" + no).click(function (e) {
            // requirejs(['sweetAlert2'], function(swal) {
            Swal.fire({
                allowOutsideClick: false,
                showCancelButton: true,
                cancelButtonColor: "#d33",
                confirmButtonColor: "#3085d6",
                title: "Declaration.",
                icon: "info",
                html:
                    '<h5> <input type="checkbox" class="form-check-input" name="t11" id="t1"  />  I hereby certify the above information as provided by me is true and correct. I also undertake to keep the Company informed of any changes covering such information of my personal details as and when it occurs. If any information given above is subsequently found to be incorrect or incomplete or untrue, the Company may terminate my employment without notice or compensation.</h5><br>' +
                    '<h5> <input type="checkbox" class="form-check-input" name="t22" id="t2"  />  I hereby state that I may be liable to summary dismissal if any of the particulars has been misrepresented or omitted. I acknowledge that the Company has the right to recover any salaries and monetary benefits paid out to me during the course of my employment in the event of any misrepresentation or omission on my personal data.</h5><br>' +
                    '<h5> <input type="checkbox" class="form-check-input" name="t33" id="t3"  />  I hereby give consent for Company to process and keep my personal data for employment purposes.</h5>',
                confirmButtonText: "Yes",

                preConfirm: () => {
                    if (
                        !$("#t1").prop("checked") ||
                        !$("#t2").prop("checked") ||
                        !$("#t3").prop("checked")
                    ) {
                        Swal.showValidationMessage(
                            '<i class="fa fa-info-circle"></i> Please check all term to proceed'
                        );
                    } else if (
                        $("#t1").prop("checked") ||
                        $("#t2").prop("checked") ||
                        $("#t3").prop("checked")
                    ) {
                        var data = new FormData(
                            document.getElementById("updateCompanionForm" + no)
                        );

                        $.ajax({
                            type: "POST",
                            url: "/updateCompanion",
                            data: data,
                            dataType: "json",
                            async: false,
                            processData: false,
                            contentType: false,
                        }).done(function (data) {
                            console.log(data);
                            Swal.fire({
                                title: data.title,
                                icon: "success",
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
                                    // window.location.href = "/myProfile";
                                }
                            });
                        });
                    } else {
                        Swal.showValidationMessage(
                            '<i class="fa fa-info-circle"></i> error'
                        );
                    }
                },
            }).then((result) => {});

            // });
        });
    }

    $("#tableChildren").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"],
        ],
    });
    $("#xName1,#lastName1").change(function () {
        var a = $("#firstName1").val();
        var b = $("#lastName1").val();
        $("#fullName1").val(a + " " + b);
    });
    $("#firstNameChild,#lastNameChild").change(function () {
        var a = $("#firstNameChild").val();
        var b = $("#lastNameChild").val();
        $("#fullNameChild").val(a + " " + b);
    });
    $("#firstnamemc,#lastnamemc").change(function () {
        var a = $("#firstnamemc").val();
        var b = $("#lastnamemc").val();
        $("#fullnamemc").val(a + " " + b);
    });

    $(".partCheck").click(function () {
        if ($(this).prop("checked")) {
            $("#idnumber").prop("readonly", true);
            $("#dob").prop("readonly", false);
            $("#dob").css("pointer-events", "auto");
            $("#idnumber").val("");
        } else {
            $("#idnumber").prop("readonly", false);
            $("#dob").prop("readonly", true);
            $("#dob").css("pointer-events", "none");
            $("#passportmyprofile").val("");
            $("#expirydatemyprofile").val("");
            $("#expirydatemyprofile").prop("readonly", true);
            $("#expirydatemyprofile").css("pointer-events", "none");
        }
    });
    //COMPANION INFORMATION
    $(".partCheck2").click(function () {
        if ($(this).prop("checked")) {
            $("#idnumber2").prop("readonly", true);
            $("#dobmc").prop("readonly", false);
            $("#dobmc").css("pointer-events", "auto");
            $("#idnumber2").val("");
        } else {
            $("#idnumber2").prop("readonly", false);
            $("#dobmc").prop("readonly", true);
            $("#dobmc").css("pointer-events", "none");
            $("#passportmc").val("");
            $("#expirydatemc").val("");
            $("#expirydatemc").prop("readonly", true);
            $("#expirydatemc").css("pointer-events", "none");
        }
    });

    //ADD CHILDREN DETAILS
    $(".partCheck4").click(function () {
        if ($(this).prop("checked")) {
            $("#idNoaddChild").prop("readonly", true);
            $("#DOBChild").prop("readonly", false);
            $("#DOBChild").css("pointer-events", "auto");
            $("#idNoaddChild").val("");
        } else {
            $("#idNoaddChild").prop("readonly", false);
            $("#DOBChild").prop("readonly", true);
            $("#DOBChild").css("pointer-events", "none");
            $("#passportChild").val("");
            $("#expiryDateChild").val("");
            $("#expiryDateChild").prop("readonly", true);
            $("#expiryDateChild").css("pointer-events", "none");
        }
    });

    //UPDATE CHILDREN DETAILS
    $(".partCheck5").click(function () {
        if ($(this).prop("checked")) {
            $("#idNo1").prop("readonly", true);

            $("#DOB1").prop("readonly", false);
            $("#DOB1").css("pointer-events", "auto");
            $("#idNo1").val("");
        } else {
            $("#idNo1").prop("readonly", false);
            $("#DOB1").prop("readonly", true);
            $("#DOB1").css("pointer-events", "none");
            $("#passports1").val("");
            $("#expiryDate1").val("");
            $("#expiryDate1").prop("readonly", true);
            $("#expiryDate1").css("pointer-events", "none");
        }
    });
    $("#DOB1").datepicker({
        todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true,
    });
    $("#expiryDate1").datepicker({
        todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true,
    });

    $("#childModalAdd").click(function (e) {
        $("#add-children").modal("show");
    });
    $("#dob").datepicker({
        todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true,
    });
    $("#expirydatemyprofile").datepicker({
        //todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true,
    });
    $("#datepicker-joindate").datepicker({
        todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true,
    });
    $("#dobmc").datepicker({
        todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true,
    });
    $("#expirydatemc").datepicker({
        todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true,
    });
    $("#dommc").datepicker({
        todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true,
    });
    $("#DOBChild").datepicker({
        todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true,
    });
    $("#expiryDateChild").datepicker({
        todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true,
    });
    $("#dateJoinedmc").datepicker({
        todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true,
    });

    $("#addChildren").click(function (e) {
        $("#addChildrenForm").validate({
            // Specify validation rules
            rules: {
                firstName: "required",
                lastName: "required",
                idNo: {
                    required: true,
                    digits: true,
                    rangelength: [12, 12],
                },
            },

            messages: {
                firstName: "Please Insert First Name",
                lastName: "Please Insert Last Name",
                idNo: {
                    required: "Please Insert New Identification Number",
                    digits: "Please Insert Correct Identification Number Without ' - ' or Space",
                    rangelength: "Please Insert Valid Identification Number",
                },
            },
            submitHandler: function (form) {
                // requirejs(['sweetAlert2'], function(swal,swal1) {

                Swal.fire({
                    allowOutsideClick: false,
                    showCancelButton: true,
                    cancelButtonColor: "#d33",
                    confirmButtonColor: "#3085d6",
                    title: "Declaration.",
                    icon: "info",
                    html:
                        '<h5> <input type="checkbox" class="form-check-input" name="t11" id="t1"  />  I hereby certify the above information as provided by me is true and correct. I also undertake to keep the Company informed of any changes covering such information of my personal details as and when it occurs. If any information given above is subsequently found to be incorrect or incomplete or untrue, the Company may terminate my employment without notice or compensation.</h5><br>' +
                        '<h5> <input type="checkbox" class="form-check-input" name="t22" id="t2"  />  I hereby state that I may be liable to summary dismissal if any of the particulars has been misrepresented or omitted. I acknowledge that the Company has the right to recover any salaries and monetary benefits paid out to me during the course of my employment in the event of any misrepresentation or omission on my personal data.</h5><br>' +
                        '<h5> <input type="checkbox" class="form-check-input" name="t33" id="t3"  />  I hereby give consent for Company to process and keep my personal data for employment purposes.</h5>',
                    confirmButtonText: "Yes",

                    preConfirm: () => {
                        if (
                            !$("#t1").prop("checked") ||
                            !$("#t2").prop("checked") ||
                            !$("#t3").prop("checked")
                        ) {
                            Swal.showValidationMessage(
                                '<i class="fa fa-info-circle"></i> Please check all term to proceed'
                            );
                        } else if (
                            $("#t1").prop("checked") ||
                            $("#t2").prop("checked") ||
                            $("#t3").prop("checked")
                        ) {
                            var data = new FormData(
                                document.getElementById("addChildrenForm")
                            );

                            $.ajax({
                                type: "POST",
                                url: "/addChildren",
                                data: data,
                                dataType: "json",
                                async: false,
                                processData: false,
                                contentType: false,
                            }).done(function (data) {
                                console.log(data);
                                Swal.fire({
                                    title: data.title,
                                    icon: "success",
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
                                        // window.location.href = "/myProfile";
                                    }
                                });
                            });
                        } else {
                            Swal.showValidationMessage(
                                '<i class="fa fa-info-circle"></i> error'
                            );
                        }
                    },
                }).then((result) => {});

                // });
            },
        });
    });

    $("#editChildren").click(function (e) {
        // requirejs(['sweetAlert2'], function(swal) {
        Swal.fire({
            allowOutsideClick: false,
            showCancelButton: true,
            cancelButtonColor: "#d33",
            confirmButtonColor: "#3085d6",
            title: "Declaration.",
            icon: "info",
            html:
                '<h5> <input type="checkbox" class="form-check-input" name="t11" id="t1"  />  I hereby certify the above information as provided by me is true and correct. I also undertake to keep the Company informed of any changes covering such information of my personal details as and when it occurs. If any information given above is subsequently found to be incorrect or incomplete or untrue, the Company may terminate my employment without notice or compensation.</h5><br>' +
                '<h5> <input type="checkbox" class="form-check-input" name="t22" id="t2"  />  I hereby state that I may be liable to summary dismissal if any of the particulars has been misrepresented or omitted. I acknowledge that the Company has the right to recover any salaries and monetary benefits paid out to me during the course of my employment in the event of any misrepresentation or omission on my personal data.</h5><br>' +
                '<h5> <input type="checkbox" class="form-check-input" name="t33" id="t3"  />  I hereby give consent for Company to process and keep my personal data for employment purposes.</h5>',
            confirmButtonText: "Yes",

            preConfirm: () => {
                if (
                    !$("#t1").prop("checked") ||
                    !$("#t2").prop("checked") ||
                    !$("#t3").prop("checked")
                ) {
                    Swal.showValidationMessage(
                        '<i class="fa fa-info-circle"></i> Please check all term to proceed'
                    );
                } else if (
                    $("#t1").prop("checked") ||
                    $("#t2").prop("checked") ||
                    $("#t3").prop("checked")
                ) {
                    var data = new FormData(
                        document.getElementById("editChildrenForm")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/updateChildren",
                        data: data,
                        dataType: "json",
                        async: false,
                        processData: false,
                        contentType: false,
                    }).done(function (data) {
                        console.log(data);
                        Swal.fire({
                            title: data.title,
                            icon: "success",
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
                                // window.location.href = "/myProfile";
                            }
                        });
                    });
                } else {
                    Swal.showValidationMessage(
                        '<i class="fa fa-info-circle"></i> error'
                    );
                }
            },
        }).then((result) => {});

        // });
    });

    childId = $("#childId").val();

    childIds = childId.split(",");

    for (let i = 0; i < childIds.length; i++) {
        const type = childIds[i];
        $("#childModalEdit" + type).click(function (e) {
            id = $(this).data("id");
            var childrenData = getChildren(id);

            childrenData.done(function (data) {
                child = data.data;
                $("#DOB1").val(child.DOB);
                $("#age1").val(child.age);
                $("#created_at1").val(child.created_at);
                $("#educationLevel1").prop(
                    "selectedIndex",
                    child.educationLevel
                );
                $("#educationType1").prop("selectedIndex", child.educationType);
                $("#expiryDate1").val(child.expiryDate);
                $("#firstName1").val(child.firstName);
                $("#fullName1").val(child.fullName);
                $("#gender1").prop("selectedIndex", child.gender);
                $("#id1").val(child.id);
                $("#idNo1").val(child.idNo);
                $("#instituition1").val(child.instituition);
                $("#issuingCountry1").val(child.issuingCountry);
                $("#supportDoc123").html(
                    '<a href="/storage/' +
                        child.supportDoc +
                        '" target="_blank">click here</a> to view support document'
                );
                // $("#issuingCountry1").prop("selectedIndex", child.issuingCountry);
                $("#lastName1").val(child.lastName);
                $("#maritalStatus1").prop("selectedIndex", child.maritalStatus);
                if (child.nonCitizen == "on") {
                    $("#nonCitizen1").prop("checked", true);
                }
                $("#passports1").val(child.passport);
                $("#supportDoc1").val(child.supportDoc);
            });
            $("#edit-children").modal("show");
        });

        $("#childModalView" + type).click(function (e) {
            id = $(this).data("id");
            var childrenData = getChildren(id);

            $("input").prop("disabled", true);
            $("select").prop("disabled", true);

            childrenData.done(function (data) {
                console.log(data);
                $("#viewChildren").hide();
                child = data.data;
                $("#DOB").val(child.DOB);
                $("#age123").val(child.age);
                $("#created_at").val(child.created_at);
                $("#educationLevel").prop(
                    "selectedIndex",
                    child.educationLevel
                );
                $("#educationType").prop("selectedIndex", child.educationType);
                $("#expiryDate").val(child.expiryDate);
                $("#firstName").val(child.firstName);
                $("#fullName").val(child.fullName);
                $("#genderview").prop("selectedIndex", child.gender);
                $("#id").val(child.id);
                $("#idNo").val(child.idNo);
                $("#instituition").val(child.instituition);
                $("#issuingCountry").val(child.issuingCountry);
                $("#supportDoc1234").html(
                    '<a href="/storage/' +
                        child.supportDoc +
                        '" target="_blank">click here</a> to view support document'
                );
                // $("#issuingCountry").prop("selectedIndex", child.issuingCountry);
                $("#lastName").val(child.lastName);
                $("#maritalStatus").prop("selectedIndex", child.maritalStatus);
                if (child.nonCitizen === "on") {
                    $("#nonCitizen").prop("checked", true);
                }
                $("#passports").val(child.passport);
                $("#supportDoc").val(child.supportDoc);
            });

            $("#view-children").modal("show");
        });

        $("#deleteChildren" + type).click(function (e) {
            id = $(this).data("id");
            requirejs(["sweetAlert2"], function (swal) {
                swal({
                    title: "Are you sure to delete Children?",
                    type: "error",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes!",
                    showCancelButton: true,
                }).then(function () {
                    $.ajax({
                        type: "POST",
                        url: "/deleteChildren/" + id,
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

        function getChildren(id) {
            return $.ajax({
                url: "/getChildren/" + id,
            });
        }
    }

    $("#siblingModalAdd").click(function (e) {
        $("input").prop("disabled", false);
        $("select").prop("disabled", false);
        $("#add-sibling").modal("show");
    });

    $("#DOBsibling").datepicker({
        todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true,
    });

    $("#addSibling").click(function (e) {
        $("#addSiblingForm").validate({
            // Specify validation rules
            rules: {
                firstName: "required",
                lastName: "required",
                DOB: "required",
                gender: "required",
                contactNo: {
                    digits: true,
                    required: true,
                    rangelength: [10, 11],
                },
                relationship: "required",
                address1: "required",
                postcode: {
                    required: true,
                    digits: true,
                    rangelength: [5, 5],
                },
                city: "required",
                state: "required",
            },

            messages: {
                firstName: "Please Insert First Name",
                lastName: "Please Insert Last Name",
                DOB: "Please Insert Date of Birth",
                gender: "Please Choose Gender",
                contactNo: {
                    digits: "Please Insert Correct Contact Number Without ' - ' or Space",
                    required: "Please Insert Contact Number",
                    rangelength: "Please Enter Valid Contact Number",
                },
                relationship: "Please Choose Relationship",
                address1: "Please Insert Address",
                postcode: {
                    required: "Please Insert Your Postcode",
                    digits: "Please Insert Valid Postcode",
                    rangelength: "Please Insert Valid Postcode",
                },
                city: "Please Insert City",
                state: "Please Choose State",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("addSiblingForm")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/addSibling",
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
                                // $('#tableSibling').DataTable()  .ajax.reload()
                            }
                        });
                    });
                });
            },
        });
    });

    $("#editSibling").click(function (e) {
        requirejs(["sweetAlert2"], function (swal) {
            var data = new FormData(document.getElementById("editSiblingForm"));

            $.ajax({
                type: "POST",
                url: "/updateSibling",
                data: data,
                dataType: "json",
                async: false,
                processData: false,
                contentType: false,
            }).done(function (data) {
                // console.log(data);
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

    siblingId = $("#siblingId").val();

    siblingIds = siblingId.split(",");

    for (let i = 0; i < siblingIds.length; i++) {
        const type = siblingIds[i];
        $("#siblingModalEdit" + type).click(function (e) {
            id = $(this).data("id");
            $("input").prop("disabled", false);
            $("select").prop("disabled", false);
            var SiblingData = getSibling(id);

            SiblingData.done(function (data) {
                sibling = data.data;
                $("#firstNameS").val(sibling.firstName);
                $("#idSA").val(sibling.id);
                $("#lastNameS").val(sibling.lastName);
                $("#DOBS").val(sibling.DOB);
                $("#genderS").val(sibling.gender);
                $("#contactNoS").val(sibling.contactNo);
                $("#relationshipS").val(sibling.relationship);
                $("#address2S").val(sibling.address2);
                $("#address1S").val(sibling.address1);
                $("#postcodeS").val(sibling.postcode);
                $("#cityS").val(sibling.city);
                // $("#cityS").prop("selectedIndex", sibling.city);
                $("#stateSA").val(sibling.state);
                $("#countrySA").val(sibling.country);
                // $("#stateSA").prop("selectedIndex", sibling.state);
                var select = document.getElementById("countrySA");

                const options = Array.from(select.options);
                options.forEach((option, i) => {
                    if (option.value === sibling.country)
                        select.selectedIndex = i;
                });
                // $('#countrySA').prop("selected", sibling.country);
            });
            $("#edit-sibling").modal("show");
        });

        $("#siblingModalView" + type).click(function (e) {
            id = $(this).data("id");
            var SiblingData = getSibling(id);
            $("input").prop("disabled", true);
            $("select").prop("disabled", true);
            SiblingData.done(function (data) {
                console.log(data.data);
                $("#viewSibling").hide();
                sibling = data.data;
                $("#firstNameS1").val(sibling.firstName);
                $("#lastNameS1").val(sibling.lastName);
                $("#DOBS1").val(sibling.DOB);
                $("#genderS1").val(sibling.gender);
                $("#relationshipS1").val(sibling.relationship);
                $("#contactNoS1").val(sibling.contactNo);
                $("#address2S1").val(sibling.address2);
                $("#address1S1").val(sibling.address1);
                $("#postcodeS1").val(sibling.postcode);
                $("#cityS1").val(sibling.city);
                // $("#cityS1").prop("selectedIndex", sibling.city);
                $("#stateS1").val(sibling.state);
                // $("#stateS1").prop("selectedIndex", sibling.state);
                $("#countryS1").val(sibling.country);
                // $('#countryS1').prop("selectedIndex", sibling.country);
                var select = document.getElementById("countryS1");

                const options = Array.from(select.options);
                options.forEach((option, i) => {
                    if (option.value === sibling.country)
                        select.selectedIndex = i;
                });
            });

            $("#view-sibling").modal("show");
        });

        $("#deleteSibling" + type).click(function (e) {
            id = $(this).data("id");
            requirejs(["sweetAlert2"], function (swal) {
                swal({
                    title: "Are you sureto delete Sibling?",
                    type: "error",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes!",
                    showCancelButton: true,
                }).then(function () {
                    $.ajax({
                        type: "POST",
                        url: "/deleteSibling/" + id,
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

        function getSibling(id) {
            return $.ajax({
                url: "/getSiblingById/" + id,
            });
        }
    }

    $("#tableParent").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"],
        ],
    });

    $("#parentModalAdd").click(function (e) {
        $("input").prop("disabled", false);
        $("select").prop("disabled", false);
        $("#add-parent").modal("show");
    });

    $("#DOBparent").datepicker({
        todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true,
    });

    $("#addParent").click(function (e) {
        $("#addParentForm").validate({
            // Specify validation rules
            rules: {
                firstName: "required",
                lastName: "required",
                DOB: "required",
                gender: "required",
                contactNo: {
                    required: true,
                    digits: true,
                    rangelength: [10, 11],
                },
                relationship: "required",
                address1: "required",
                postcode: {
                    required: true,
                    digits: true,
                    rangelength: [5, 5],
                },
                city: "required",
                state: "required",
            },

            messages: {
                firstName: "Please Insert First Name",
                lastName: "Please Insert Last Name",
                DOB: "Please Insert Date Of Birth",
                gender: "Please Choose Gender",
                contactNo: {
                    required: "Please Insert Contact Number",
                    digits: "Please Insert Valid Contact Number Without ' - ' And Space",
                    rangelength: "Please Insert Valid Contact Number",
                },
                relationship: "Please Choose Relationship",
                address1: "Please Insert Address",
                postcode: {
                    required: "Please Insert Postcode",
                    digits: "Please Insert Valid Postcode",
                    rangelength: "Please Insert Valid Postcode",
                },
                city: "Please Insert City",
                state: "Please Choose State",
            },

            submitHandler: function (form) {
                // requirejs(['sweetAlert2'], function(swal,swal1) {

                Swal.fire({
                    allowOutsideClick: false,
                    showCancelButton: true,
                    cancelButtonColor: "#d33",
                    confirmButtonColor: "#3085d6",
                    title: "Declaration.",
                    icon: "info",
                    html:
                        '<h5> <input type="checkbox" class="form-check-input" name="t11" id="t1"  />  I hereby certify the above information as provided by me is true and correct. I also undertake to keep the Company informed of any changes covering such information of my personal details as and when it occurs. If any information given above is subsequently found to be incorrect or incomplete or untrue, the Company may terminate my employment without notice or compensation.</h5><br>' +
                        '<h5> <input type="checkbox" class="form-check-input" name="t22" id="t2"  />  I hereby state that I may be liable to summary dismissal if any of the particulars has been misrepresented or omitted. I acknowledge that the Company has the right to recover any salaries and monetary benefits paid out to me during the course of my employment in the event of any misrepresentation or omission on my personal data.</h5><br>' +
                        '<h5> <input type="checkbox" class="form-check-input" name="t33" id="t3"  />  I hereby give consent for Company to process and keep my personal data for employment purposes.</h5>',
                    confirmButtonText: "Yes",

                    preConfirm: () => {
                        if (
                            !$("#t1").prop("checked") ||
                            !$("#t2").prop("checked") ||
                            !$("#t3").prop("checked")
                        ) {
                            Swal.showValidationMessage(
                                '<i class="fa fa-info-circle"></i> Please check all term to proceed'
                            );
                        } else if (
                            $("#t1").prop("checked") ||
                            $("#t2").prop("checked") ||
                            $("#t3").prop("checked")
                        ) {
                            var data = new FormData(
                                document.getElementById("addParentForm")
                            );

                            $.ajax({
                                type: "POST",
                                url: "/addParent",
                                data: data,
                                dataType: "json",
                                async: false,
                                processData: false,
                                contentType: false,
                            }).done(function (data) {
                                console.log(data);
                                Swal.fire({
                                    title: data.title,
                                    icon: "success",
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
                                        // window.location.href = "/myProfile";
                                    }
                                });
                            });
                        } else {
                            Swal.showValidationMessage(
                                '<i class="fa fa-info-circle"></i> error'
                            );
                        }
                    },
                }).then((result) => {});

                // });
            },
        });
    });

    $("#editParent").click(function (e) {
        // requirejs(['sweetAlert2'], function(swal) {
        Swal.fire({
            allowOutsideClick: false,
            showCancelButton: true,
            cancelButtonColor: "#d33",
            confirmButtonColor: "#3085d6",
            title: "Declaration.",
            icon: "info",
            html:
                '<h5> <input type="checkbox" class="form-check-input" name="t11" id="t1"  />  I hereby certify the above information as provided by me is true and correct. I also undertake to keep the Company informed of any changes covering such information of my personal details as and when it occurs. If any information given above is subsequently found to be incorrect or incomplete or untrue, the Company may terminate my employment without notice or compensation.</h5><br>' +
                '<h5> <input type="checkbox" class="form-check-input" name="t22" id="t2"  />  I hereby state that I may be liable to summary dismissal if any of the particulars has been misrepresented or omitted. I acknowledge that the Company has the right to recover any salaries and monetary benefits paid out to me during the course of my employment in the event of any misrepresentation or omission on my personal data.</h5><br>' +
                '<h5> <input type="checkbox" class="form-check-input" name="t33" id="t3"  />  I hereby give consent for Company to process and keep my personal data for employment purposes.</h5>',
            confirmButtonText: "Yes",

            preConfirm: () => {
                if (
                    !$("#t1").prop("checked") ||
                    !$("#t2").prop("checked") ||
                    !$("#t3").prop("checked")
                ) {
                    Swal.showValidationMessage(
                        '<i class="fa fa-info-circle"></i> Please check all term to proceed'
                    );
                } else if (
                    $("#t1").prop("checked") ||
                    $("#t2").prop("checked") ||
                    $("#t3").prop("checked")
                ) {
                    var data = new FormData(
                        document.getElementById("editParentForm")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/updateParent",
                        data: data,
                        dataType: "json",
                        async: false,
                        processData: false,
                        contentType: false,
                    }).done(function (data) {
                        console.log(data);
                        Swal.fire({
                            title: data.title,
                            icon: "success",
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
                                // window.location.href = "/myProfile";
                            }
                        });
                    });
                } else {
                    Swal.showValidationMessage(
                        '<i class="fa fa-info-circle"></i> error'
                    );
                }
            },
        }).then((result) => {});

        // });
    });

    parentId = $("#parentId").val();

    parentIds = parentId.split(",");

    for (let i = 0; i < parentIds.length; i++) {
        const type = parentIds[i];
        $("#parentModalEdit" + type).click(function (e) {
            $("input").prop("disabled", false);
            $("select").prop("disabled", false);
            id = $(this).data("id");
            var ParentData = getParent(id);

            ParentData.done(function (data) {
                console.log(data.data);
                parent = data.data;
                $("#DOBP1").val(parent.DOB);
                $("#idP").val(parent.id);
                $("#address2P1").val(parent.address2);
                $("#address1P1").val(parent.address1);
                $("#cityP1").val(parent.city);
                $("#stateP1").val(parent.state);
                $("#countryP1").val(parent.country);
                $("#contactNoP1").val(parent.contactNo);
                $("#passportparentedit").val(parent.passport);

                $("#genderP1").val(parent.gender);
                $("#firstNamesP1").val(parent.firstName);
                $("#postcodeP1").val(parent.postcode);
                $("#lastNamesP1").val(parent.lastName);
                $("#relationshipP1").val(parent.relationship);
                if (parent.nonCitizen == "on") {
                    $("#nonCitizenP1").prop("checked", true);
                }
            });
            $("#edit-parent").modal("show");
        });

        $("#parentModalView" + type).click(function (e) {
            id = $(this).data("id");
            var ParentData = getParent(id);

            $("input").prop("disabled", true);
            $("select").prop("disabled", true);

            ParentData.done(function (data) {
                $("#viewParent").hide();
                parent = data.data;
                $("#DOBP").val(parent.DOB);
                $("#address1P").val(parent.address1);
                $("#address2P").val(parent.address2);
                $("#cityP").val(parent.city);
                $("#stateP").val(parent.state);
                $("#contactNoP").val(parent.contactNo);
                $("#firstNameP").val(parent.firstName);
                $("#genderP").val(parent.gender);
                $("#countryP").val(parent.country);
                $("#passportview").val(parent.passport);
                $("#postcodeP").val(parent.postcode);
                $("#lastNameP").val(parent.lastName);
                $("#relationshipP").val(parent.relationship);
                if (parent.nonCitizen == "on") {
                    $("#nonCitizenP").prop("checked", true);
                }
            });

            $("#view-parent").modal("show");
        });

        $("#deleteParent" + type).click(function (e) {
            id = $(this).data("id");
            requirejs(["sweetAlert2"], function (swal) {
                swal({
                    title: "Are you sure to delete Parent?",
                    type: "error",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes!",
                    showCancelButton: true,
                }).then(function () {
                    $.ajax({
                        type: "POST",
                        url: "/deleteParent/" + id,
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

        function getParent(id) {
            return $.ajax({
                url: "/getParentById/" + id,
            });
        }
    }

    $.validator.addMethod(
        "mypassword",
        function (value, element) {
            return (
                this.optional(element) ||
                (value.match(/[A-Z]/) && value.match(/[0-9]/))
            );
        },
        "Password must contain at least one numeric and one uppercase character."
    );

    $.validator.addMethod(
        "pwcheckspechars",
        function (value) {
            return /[!@#$%^&*()_=\[\]{};':"\\|,.<>\/?+-]/.test(value);
        },
        "The password must contain at least one special character"
    );

    $("#changePassButton").click(function (e) {
        $("#changePassForm").validate({
            // Specify validation rules
            rules: {
                current_password: "required",
                password: {
                    required: true,
                    minlength: 8,
                    mypassword: true,
                    pwcheckspechars: true,
                },
            },

            messages: {
                current_password: "Please Insert Current Password",

                password: {
                    required:
                        "Please Insert New Password <br/>*The Password must at least have 8 characters <br/>*Password must contain at least one digit and one uppercase character<br/>*    Password must at least contain one special character",
                    minlength:
                        "*The password Password must at least have 8 characters <br/>*Password must contain at least one digit and one uppercase character<br/>*    Password must at least contain one special character",
                    mypassword:
                        "*The password Password must at least have 8 characters <br/>*Password must contain at least one digit and one uppercase character<br/>*    Password must at least contain one special character",
                    pwcheckspechars:
                        "*The password Password must at least have 8 characters <br/>*Password must contain at least one digit and one uppercase character<br/>*    Password must at least contain one special character",
                },
            },
            submitHandler: function (form) {
                var data = new FormData(
                    document.getElementById("changePassForm")
                );

                requirejs(["sweetAlert2"], function (swal) {
                    $.ajax({
                        type: "POST",
                        url: "/resetPassword",
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
            },
        });
    });
});

$("#same-address").change(function () {
    if (this.checked) {
        $("#address-1c").val($("#address-1").val()).prop("readonly", true);
        $("#address-2c").val($("#address-2").val()).prop("readonly", true);
        $("#postcodec").val($("#postcode").val()).prop("readonly", true);
        $("#cityc").val($("#city").val()).prop("readonly", true);
        $("#statec").val($("#state").val()).prop("disabled", true);
        $("#countryc").val($("#country").val()).prop("disabled", true);
    } else {
        $("#address-1c").prop("readonly", false);
        $("#address-2c").prop("readonly", false);
        $("#postcodec").prop("readonly", false);
        $("#cityc").prop("readonly", false);
        $("#statec").prop("disabled", false);
        $("#countryc").prop("disabled", false);
    }
});
$("#same-address2").change(function () {
    if (this.checked) {
        $("#address1parent").val($("#address-1").val()).prop("readonly", true);
        $("#address2parent").val($("#address-2").val()).prop("readonly", true);
        $("#postcodeparent").val($("#postcode").val()).prop("readonly", true);
        $("#cityparent").val($("#city").val()).prop("readonly", true);
        $("#stateparent").val($("#state").val()).prop("disabled", true);
        $("#countryparent").val($("#country").val()).prop("disabled", true);
    } else {
        $("#address1parent").val($("").val()).prop("readonly", false);
        $("#address2parent").val($("").val()).prop("readonly", false);
        $("#postcodeparent").val($("").val()).prop("readonly", false);
        $("#cityparent").val($("").val()).prop("readonly", false);
        $("#stateparent").val($("").val()).prop("disabled", false);
        $("#countryparent").val($("my").val()).prop("disabled", false);
    }
});

$("#same-address3").change(function () {
    if (this.checked) {
        $("#address1P1").val($("#address-1").val()).prop("readonly", true);
        $("#address2P1").val($("#address-2").val()).prop("readonly", true);
        $("#postcodeP1").val($("#postcode").val()).prop("readonly", true);
        $("#cityP1").val($("#city").val()).prop("readonly", true);
        $("#stateP1").val($("#state").val()).prop("disabled", true);
        $("#countryP").val($("#country").val()).prop("disabled", true);
    } else {
        $("#address1P1").val($("").val()).prop("readonly", false);
        $("#address2P1").val($("").val()).prop("readonly", false);
        $("#postcodeP1").val($("").val()).prop("readonly", false);
        $("#cityP1").val($("").val()).prop("readonly", false);
        $("#stateP1").val($("").val()).prop("disabled", false);
        $("#countryP").val($("my").val()).prop("disabled", false);
    }
});
$("#stateEmc").css({ "pointer-events": "none", background: "#e9ecef" });
$("#countryEmc").css({ "pointer-events": "none", background: "#e9ecef" });

$("#same-address4").change(function () {
    if (this.checked) {
        $("#address1sibling").val($("#address-1").val()).prop("readonly", true);
        $("#address2sibling").val($("#address-2").val()).prop("readonly", true);
        $("#postcodesibling").val($("#postcode").val()).prop("readonly", true);
        $("#citysibling").val($("#city").val()).prop("readonly", true);
        $("#statesibling").val($("#state").val()).prop("disabled", true);
        $("#countrysibling").val($("#country").val()).prop("disabled", true);
    } else {
        $("#address1sibling").val($("").val()).prop("readonly", false);
        $("#address2sibling").val($("").val()).prop("readonly", false);
        $("#postcodesibling").val($("").val()).prop("readonly", false);
        $("#citysibling").val($("").val()).prop("readonly", false);
        $("#statesibling").val($("").val()).prop("disabled", false);
        $("#countrysibling").val($("my").val()).prop("disabled", false);
    }
});

$(".partCheck3").click(function () {
    if ($(this).prop("checked")) {
        $("#designationmc").prop("readonly", false);
        $("#companyNamemc").prop("readonly", false);
        $("#dateJoinedmc").prop("readonly", false);
        $("#dateJoinedmc").prop("disabled", false);
        $("#income-tax-number").prop("readonly", false);
        $("#payslipmc").prop("disabled", false);
        $("#extension-number").prop("readonly", false);
        $("#officeNomc").prop("readonly", false);
        $("#address1mc").prop("readonly", false);
        $("#address2mc").prop("readonly", false);
        $("#cityEmc").prop("readonly", false);
        $("#postcodeEmc").prop("readonly", false);
        $("#stateEmc").css({ "pointer-events": "auto", background: "#ffffff" });
        $("#countryEmc").css({
            "pointer-events": "auto",
            background: "#ffffff",
        });
        $("#payslipmc").prop("readonly", false);
    } else {
        $("#designationmc").prop("readonly", true);
        $("#companyNamemc").prop("readonly", true);
        $("#dateJoinedmc").prop("readonly", true);
        $("#dateJoinedmc").prop("disabled", true);
        $("#payslipmc").prop("disabled", true);
        $("#income-tax-number").prop("readonly", true);
        $("#extension-number").prop("readonly", true);
        $("#officeNomc").prop("readonly", true);
        $("#address1mc").prop("readonly", true);
        $("#address2mc").prop("readonly", true);
        $("#cityEmc").prop("readonly", true);
        $("#postcodeEmc").prop("readonly", true);
        $("#stateEmc").css({ "pointer-events": "none", background: "#e9ecef" });
        $("#countryEmc").css({
            "pointer-events": "none",
            background: "#e9ecef",
        });
        $("#payslipmc").prop("readonly", true);
    }
});

$("#same-address5").change(function () {
    if (this.checked) {
        $("#address1S").val($("#address-1").val()).prop("readonly", true);
        $("#address2S").val($("#address-2").val()).prop("readonly", true);
        $("#postcodeS").val($("#postcode").val()).prop("readonly", true);
        $("#cityS").val($("#city").val()).prop("readonly", true);
        $("#stateS").val($("#state").val()).prop("disabled", true);
        $("#countrySA").val($("#country").val()).prop("disabled", true);
    } else {
        $("#address1S").prop("readonly", false);
        $("#address2S").prop("readonly", false);
        $("#postcodeS").prop("readonly", false);
        $("#cityS").prop("readonly", false);
        $("#stateS").prop("disabled", false);
        $("#countrySA").prop("disabled", false);
    }
});

// $("#same-address6").change(function() {
//     if(this.checked) {
//         $('#addresscom').val($('#address-1').val()).prop('readonly', true);
//         $('#address2com').val($('#address-2').val()).prop('readonly', true);
//         $('#postcodecom').val($('#postcode').val()).prop('readonly', true);
//         $('#citycom').val($('#city').val()).prop('readonly', true);
//         $('#statecom').val($('#state').val()).prop('disabled', true);
//         $('#countrycom').val($('#country').val()).prop('disabled', true);
//     }
//     else {
//         $('#addresscom').val($('').val()).prop('readonly', false);
//         $('#address2com').val($('').val()).prop('readonly', false);
//         $('#postcodecom').val($('').val()).prop('readonly', false);
//         $('#citycom').val($('').val()).prop('readonly', false);
//         $('#statecom').val($('').val()).prop('disabled', false);
//         $('#countrycom').val($('my').val()).prop('disabled', false);

//     }

// });

$("#datepicker-fromdate").datepicker({
    todayHighlight: true,
    autoclose: true,
    format: "dd/mm/yyyy",
});

$("#datepicker-todate").datepicker({
    todayHighlight: true,
    autoclose: true,
    format: "dd/mm/yyyy",
});

$("#datepicker-fromdateu").datepicker({
    todayHighlight: true,
    autoclose: true,
    format: "dd/mm/yyyy",
});

$("#datepicker-todateu").datepicker({
    todayHighlight: true,
    autoclose: true,
    format: "dd/mm/yyyy",
});

$("#datepicker-others").datepicker({
    todayHighlight: true,
    autoclose: true,
    format: "dd/mm/yyyy",
});

$("#datepicker-othersu").datepicker({
    todayHighlight: true,
    autoclose: true,
    format: "dd/mm/yyyy",
});

//   oku checkbox myprofile
$(".okuCheck").click(function () {
    var okuStatus = 0;
    if ($(this).prop("checked")) {
        $("#okucard").prop("readonly", false);
        $("#okuattach").css("pointer-events", "auto");
        okuStatus = 1;
    } else {
        $("#okucard").prop("readonly", true);
        $("#okuattach").css("pointer-events", "none");
    }

    // $.ajax({
    //     url: '{{ route("saveOkuData") }}',
    //     type: 'POST',
    //     data: {okuChecked: okuChecked},
    //     success: function(response) {
    //         // Handle the response from the server if needed
    //     },
    //     error: function(xhr, status, error) {
    //         // Handle errors if needed
    //     }
    // });
});

//oku check companion
$(".okuCheck1").click(function () {
    if ($(this).prop("checked")) {
        $("#okucard1").prop("readonly", false);
        $("#okuattach1").css("pointer-events", "auto");
    } else {
        $("#okucard1").prop("readonly", true);
        $("#okuattach1").css("pointer-events", "none");
    }
});

//oku check update companion
$(".okuCheck2").click(function () {
    if ($(this).prop("checked")) {
        $("#okucard2").prop("readonly", false);
        $("#okuattach2").css("pointer-events", "auto");
    } else {
        $("#okucard2").prop("readonly", true);
        $("#okuattach2").css("pointer-events", "none");
    }
});

//oku check add children
$(".okuCheck3").click(function () {
    if ($(this).prop("checked")) {
        $("#okucard3").prop("readonly", false);
        $("#okuattach3").css("pointer-events", "auto");
    } else {
        $("#okucard3").prop("readonly", true);
        $("#okuattach3").css("pointer-events", "none");
    }
});

//oku check update children
$(".okuCheck4").click(function () {
    if ($(this).prop("checked")) {
        $("#okucard4").prop("readonly", false);
        $("#okuattach4").css("pointer-events", "auto");
    } else {
        $("#okucard4").prop("readonly", true);
        $("#okuattach4").css("pointer-events", "none");
    }
});

//oku check add family
$(".okuCheck5").click(function () {
    if ($(this).prop("checked")) {
        $("#okucard5").prop("readonly", false);
        $("#okuattach5").css("pointer-events", "auto");
    } else {
        $("#okucard5").prop("readonly", true);
        $("#okuattach5").css("pointer-events", "none");
    }
});

//oku check edit family
$(".okuCheck6").click(function () {
    if ($(this).prop("checked")) {
        $("#okucard6").prop("readonly", false);
        $("#okuattach6").css("pointer-events", "auto");
    } else {
        $("#okucard6").prop("readonly", true);
        $("#okuattach6").css("pointer-events", "none");
    }
});

//COMPANION UPDATE INFORMATION
$("#idnumber3").change(function () {
    if ($(this).val().length == 12) {
        var idn = $(this).val();
        var year = idn.substring(0, 2);
        var month = idn.substring(2, 4);
        var day = idn.substring(4, 6);

        var cutoff = new Date().getFullYear() - 2000;

        $("#dobuc").val(
            (year > cutoff ? "19" : "20") + year + "-" + month + "-" + day
        );
    }
});

$("#idnumber3").change(function () {
    if ($(this).val().length == 12) {
        var idn = $(this).val();
        var year = idn.substring(0, 2);

        var cutoff = new Date().getFullYear() - 2000;

        var ww = (year > cutoff ? "19" : "20") + year;
        var currentAge = new Date().getFullYear() - ww;
        $("#age3").val(currentAge);
    }
});

//children add info
$("#idnumber4").change(function () {
    if ($(this).val().length == 12) {
        var idn = $(this).val();
        var year = idn.substring(0, 2);
        var month = idn.substring(2, 4);
        var day = idn.substring(4, 6);

        var cutoff = new Date().getFullYear() - 2000;

        $("#dob4").val(
            (year > cutoff ? "19" : "20") + year + "-" + month + "-" + day
        );
    }
});

$("#idnumber4").change(function () {
    if ($(this).val().length == 12) {
        var idn = $(this).val();
        var year = idn.substring(0, 2);

        var cutoff = new Date().getFullYear() - 2000;

        var ww = (year > cutoff ? "19" : "20") + year;
        var currentAge = new Date().getFullYear() - ww;
        $("#age4").val(currentAge);
    }
});

//children update info
$("#idnumber5").change(function () {
    if ($(this).val().length == 12) {
        var idn = $(this).val();
        var year = idn.substring(0, 2);
        var month = idn.substring(2, 4);
        var day = idn.substring(4, 6);

        var cutoff = new Date().getFullYear() - 2000;

        $("#dob5").val(
            (year > cutoff ? "19" : "20") + year + "-" + month + "-" + day
        );
    }
});

$("#idnumber5").change(function () {
    if ($(this).val().length == 12) {
        var idn = $(this).val();
        var year = idn.substring(0, 2);

        var cutoff = new Date().getFullYear() - 2000;

        var ww = (year > cutoff ? "19" : "20") + year;
        var currentAge = new Date().getFullYear() - ww;
        $("#age5").val(currentAge);
    }
});

//parent add info
$("#idnumber6").change(function () {
    if ($(this).val().length == 12) {
        var idn = $(this).val();
        var year = idn.substring(0, 2);
        var month = idn.substring(2, 4);
        var day = idn.substring(4, 6);

        var cutoff = new Date().getFullYear() - 2000;

        $("#dob6").val(
            (year > cutoff ? "19" : "20") + year + "-" + month + "-" + day
        );
    }
});

$("#idnumber6").change(function () {
    if ($(this).val().length == 12) {
        var idn = $(this).val();
        var year = idn.substring(0, 2);

        var cutoff = new Date().getFullYear() - 2000;

        var ww = (year > cutoff ? "19" : "20") + year;
        var currentAge = new Date().getFullYear() - ww;
        $("#age6").val(currentAge);
    }
});

//parent update info
$("#idnumber7").change(function () {
    if ($(this).val().length == 12) {
        var idn = $(this).val();
        var year = idn.substring(0, 2);
        var month = idn.substring(2, 4);
        var day = idn.substring(4, 6);

        var cutoff = new Date().getFullYear() - 2000;

        $("#DOBP1").val(
            (year > cutoff ? "19" : "20") + year + "-" + month + "-" + day
        );
    }
});

$("#idnumber7").change(function () {
    if ($(this).val().length == 12) {
        var idn = $(this).val();
        var year = idn.substring(0, 2);

        var cutoff = new Date().getFullYear() - 2000;

        var ww = (year > cutoff ? "19" : "20") + year;
        var currentAge = new Date().getFullYear() - ww;
        $("#age7").val(currentAge);
    }
});

//UPDATE COMPANION DETAILS
$(".partCheck6").click(function () {
    if ($(this).prop("checked")) {
        $("#idnumber3").prop("readonly", true);
        $("#dobuc").prop("readonly", false);
        $("#dobuc").css("pointer-events", "auto");
        $("#idnumber3").val("");
    } else {
        $("#idnumber3").prop("readonly", false);
        $("#dobuc").prop("readonly", true);
        $("#dobuc").css("pointer-events", "none");
        $("#passport3").val("");
        $("#expirydate3").val("");
        $("#expirydate3").prop("readonly", true);
        $("#expirydate3").css("pointer-events", "none");
    }
});

//ADD CHILDREN DETAILS
$(".partCheck7").click(function () {
    if ($(this).prop("checked")) {
        $("#idnumber4").prop("readonly", true);
        $("#dob4").prop("readonly", false);
        $("#dob4").css("pointer-events", "auto");
        $("#idnumber4").val("");
    } else {
        $("#idnumber4").prop("readonly", false);
        $("#dob4").prop("readonly", true);
        $("#dob4").css("pointer-events", "none");
        $("#passportChild").val("");
        $("#expiryDateChild").val("");
        $("#expiryDateChild").prop("readonly", true);
        $("#expiryDateChild").css("pointer-events", "none");
    }
});

//ADD FAMILY DETAILS
$(".partCheck8").click(function () {
    if ($(this).prop("checked")) {
        $("#idnumber6").prop("readonly", true);
        $("#dob6").prop("readonly", false);
        $("#dob6").css("pointer-events", "auto");
        $("#idnumber6").val("");
    } else {
        $("#idnumber6").prop("readonly", false);
        $("#dob6").prop("readonly", true);
        $("#dob6").css("pointer-events", "none");
        $("#passportparent").val("");
        $("#expiryDateParent").val("");
        $("#expiryDateParent").prop("readonly", true);
        $("#expiryDateParent").css("pointer-events", "none");
    }
});

//UPDATE FAMILY DETAILS
$(".partCheck9").click(function () {
    if ($(this).prop("checked")) {
        $("#idnumber7").prop("readonly", true);
        $("#dob7").prop("readonly", false);
        $("#dob6").css("pointer-events", "auto");
        $("#idnumber6").val("");
    } else {
        $("#idnumber6").prop("readonly", false);
        $("#dob6").prop("readonly", true);
        $("#dob6").css("pointer-events", "none");
        $("#passportparent").val("");
        $("#expiryDateParent").val("");
        $("#expiryDateParent").prop("readonly", true);
        $("#expiryDateParent").css("pointer-events", "none");
    }
});
