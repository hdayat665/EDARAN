$(document).ready(function () {

     // maincompanioncheck

    //  $('#maincompanioncheck{{$companion->id}}').prop('checked', true);

    //  // Check if the checkbox is checked
    //  if ($('#maincompanioncheck{{$companion->id}}').is(':checked')) {
    //      // Change the type of the hidden input to "text"
    //      $('#idInput{{$companion->id}}').attr('type', 'text');
    //  }

    //  var companionId = "{{$companion->id}}";
    //  $('#maincompanioncheck' + companionId).prop('checked', true);

    //  // Check if the checkbox is checked
    //  if ($('#maincompanioncheck' + companionId).is(':checked')) {
    //      // Change the type of the hidden input to "text"
    //      $('#idInput' + companionId).attr('type', 'text');
    //  }

    $("#firstname,#lastname").change(function () {
        var a = $("#firstname").val();
        var b = $("#lastname").val();
        $("#fullName").val(a + " " + b);
    });

    $('#firstname,#lastname').keypress(function (e) {
        var txt = String.fromCharCode(e.which);
        if (txt.match(/[A-Za-z0-9&. ]/)) {
            return false;
        }
    });

    $("#tableSibling").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"],
        ],
        initComplete: function (settings, json) {
            $("#tableSibling").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });

    $("#parentModalAdd").click(function () {
        if ($(this).prop("checked")) {
            // $("#expiryDateParent").prop("disabled", true);
            // $("#expiryDateParent").prop("readonly", true);

            // $("#passportcountryparent").prop("disabled", true);
            // $("#passportcountryparent").prop("readonly", true);

            $("#okucard5").prop("disabled", true);
            $("#okucard5").prop("readonly", true);

            $("#okuattach5").prop("disabled", true);
            $("#okuattach5").prop("readonly", true);
        } else {
            // $("#expiryDateParent").prop("disabled", true);
            // $("#expiryDateParent").prop("readonly", true);

            // $("#passportcountryparent").prop("disabled", true);
            // $("#passportcountryparent").prop("readonly", true);

            $("#okucard5").prop("disabled", true);
            $("#okucard5").prop("readonly", true);

            $("#okuattach5").prop("disabled", true);
            $("#okuattach5").prop("readonly", true);
        }
    });

    //add children
    $("#childModalAdd").click(function () {
        if ($(this).prop("checked")) {
            $("#expiryDateChild").prop("disabled", true);
            $("#expiryDateChild").prop("readonly", true);

            $("#issuingCountry").prop("disabled", true);
            $("#issuingCountry").prop("readonly", true);

            $("#okucard3").prop("disabled", true);
            $("#okucard3").prop("readonly", true);

            $("#okuattach3").prop("disabled", true);
            $("#okuattach3").prop("readonly", true);

        } else {
            $("#expiryDateChild").prop("disabled", true);
            $("#expiryDateChild").prop("readonly", true);

            $("#issuingCountry").prop("disabled", true);
            $("#issuingCountry").prop("readonly", true);


            $("#okucard3").prop("disabled", true);
            $("#okucard3").prop("readonly", true);

            $("#okuattach3").prop("disabled", true);
            $("#okuattach3").prop("readonly", true);
        }
    });

    if ($(".partCheck").is(":checked")) {
        $("#idnumber").prop("disabled", true);
        $("#dob").prop("readonly", false);
        $("#dob").css("pointer-events", "auto");
        $("#idnumber").val("");
        $("#gendermyprofile").prop("readonly", false);
        $("#gendermyprofile").css({
            "pointer-events": "auto",
            background: "none"});
    } else {
        $("#idnumber").prop("disabled", false);
        $("#dob").prop("readonly", true);
        $("#dob").css("pointer-events", "none");
        $("#gendermyprofile").prop("readonly", true);
        $("#gendermyprofile").css({
            "pointer-events": "none",
            background: "#e9ecef"});
    }


    if ($(".partCheck5").is(":checked")) {
        $("#idNo1").prop("readonly", true);
        $("#idNo1").val("");
        $("#idNo1").prop("disabled", true);
        $("#DOB1").prop("readonly", false);
        $("#DOB1").css("pointer-events", "auto");
        $("#nonCitizen1").prop("checked", true);
    } else {
        $("#idNo1").prop("readonly", false);
        $("#idNo1").prop("disabled", false);
        $("#DOB1").prop("readonly", true);
        $("#DOB1").css("pointer-events", "none");
        $("#passports1").val("");
        $("#nonCitizen1").prop("checked", false);
    }

    if ($("#passportmyprofile").val() !== "") {
        // Enable expiration date and passport country fields
        $("#expirydatemyprofile").prop("disabled", false);
        $("#expirydatemyprofile").css("pointer-events", "auto");

        $("#passportcountrymyprofile").prop("disabled", false);
        $("#passportcountrymyprofile").css("pointer-events", "auto");
    } else {
        // Disable expiration date and passport country fields
        $("#expirydatemyprofile").prop("disabled", true);
        $("#expirydatemyprofile").css("pointer-events", "none");
        $("#expirydatemyprofile").val("");

        $("#passportcountrymyprofile").prop("disabled", true);
        $("#passportcountrymyprofile").css("pointer-events", "none");
        $("#passportcountrymyprofile").val("");
    }


    if ($("#passportUpdateCompanion").val() !== "") {
        // Enable expiration date and passport country fields
        $("#expiryDateUpdateCompanion").prop("disabled", false);
        $("#expiryDateUpdateCompanion").css("pointer-events", "auto");

        $("#issuingCountryUpdateCompanion").prop("disabled", false);
        $("#issuingCountryUpdateCompanion").css("pointer-events", "auto");
    } else {
        // Disable expiration date and passport country fields
        $("#expiryDateUpdateCompanion").prop("disabled", true);
        $("#expiryDateUpdateCompanion").css("pointer-events", "none");
        $("#expiryDateUpdateCompanion").val("");

        $("#issuingCountryUpdateCompanion").prop("disabled", true);
        $("#issuingCountryUpdateCompanion").css("pointer-events", "none");
        $("#issuingCountryUpdateCompanion").val("");
    }

    if ($(".okuCheck").is(":checked")) {
        $("#okucard").prop("disabled", false);
        $("#okuattach").prop("disabled", false);
        $("#okuattach").css("pointer-events", "auto");
    } else {
        $("#okucard").val("").prop("disabled", true);
        $("#okuattach").prop("disabled", true);
        $("#okuattach").css("pointer-events", "none");
    }

    if ($(".okuCheck2").is(":checked")) {
        $("#okucard2").prop("disabled", false);
        $("#okuattach2").prop("disabled", false);
        $("#okuattach2").css("pointer-events", "auto");
        $("#okuattach2").css("readonly", true);

    } else {
        $("#okucard2").val("").prop("disabled", true);
        $("#okuattach2").prop("disabled", true);
        $("#okuattach2").css("pointer-events", "none");
        $("#okuattach2").css("readonly", false);

    }


    $("#passportmyprofile").change(function () {
        if ($("#passportmyprofile").val() !== "") {
            // Enable expiration date and passport country fields
            $("#expirydatemyprofile").prop("disabled", false);
            $("#expirydatemyprofile").css("pointer-events", "auto");
            $("#passportcountrymyprofile").prop("disabled", false);
            $("#passportcountrymyprofile").css("pointer-events", "auto");
        } else {
            // Disable expiration date and passport country fields
            $("#expirydatemyprofile").prop("disabled", true);
            $("#expirydatemyprofile").css("pointer-events", "none");
            $("#expirydatemyprofile").val("");
            $("#passportcountrymyprofile").prop("disabled", true);
            $("#passportcountrymyprofile").css("pointer-events", "none");
            $("#passportcountrymyprofile").val("");
        }
    });

    $("#passportparentedit").change(function () {
        if ($("#passportparentedit").val() !== "") {
            $("#expiryDateParentEdit").prop("disabled", false);
            $("#expiryDateParentEdit").css("pointer-events", "auto");

            $("#issuingCountryParentEdit").prop("disabled", false);
            $("#issuingCountryParentEdit").css("pointer-events", "auto");
        } else {
            $("#expiryDateParentEdit").prop("disabled", true);
             $("#expiryDateParentEdit").css("pointer-events", "none");
             $("#expiryDateParentEdit").val("");

             $("#issuingCountryParentEdit").prop("disabled", true);
             $("#issuingCountryParentEdit").css("pointer-events", "none");
             $("#issuingCountryParentEdit").val("");
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

    $('input[name="okuStatus2"]').click(function () {
        if ($(this).is(":checked")) {
            $("#okucard5").prop("disabled", false);

            $("#okuattach5").prop("disabled", false);
        } else {
            $("#okucard5").val("").prop("disabled", true);

            $("#okuattach5").val("").prop("disabled", true);
        }
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
                $("#gendermyprofile").val(2);
            } else {
                $("#gendermyprofile").val(1);
            }
        }
    });

    //COMPANION INFORMATION
    $("#firstnameEditComp,#lastnameEditComp").change(function () {
        var a = $("#firstnameEditComp").val();
        var b = $("#lastnameEditComp").val();
        $("#fullnameEditComp").val(a + " " + b);
    });
    $("#idnumber2").change(function () {
        if ($(this).val().length == 12) {
            var idn = $(this).val();
            var year = idn.substring(0, 2);
            var month = idn.substring(2, 4);
            var day = idn.substring(4, 6);

            var cutoff = new Date().getFullYear() - 2000;

            $("#dobAddCompanion").val(
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
            $("#ageAddCompanion").val(currentAge);
        }
    });

    $("#passportmc").change(function () {
        if ($("#expirydatemc").prop("readonly")) {
            $("#expirydatemc").prop("readonly", false);
            $("#expirydatemc").css("pointer-events", "auto");
            $("#expirydatemc").prop("disabled", false);
            $("#issuingCountryAddCompanion").prop("disabled", false);
            $("#issuingCountryAddCompanion").css("pointer-events", "auto");
        } else {
            $("#expirydatemc").prop("readonly", true);
            $("#expirydatemc").css("pointer-events", "none");
            $("#expirydatemc").val("");
            $("#expirydatemc").prop("disabled", false);

            $("#issuingCountryAddCompanion").prop("disabled", false);
            $("#issuingCountryAddCompanion").css("pointer-events", "auto");
            $("#issuingCountryAddCompanion").val("");
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

    $('input[name="nonCitizen"]').click(function () {
        if ($(this).is(":checked")) {
            $("#idNoaddChild").val("").prop("disabled", true);
            $("#age4").val("").prop("readonly", false);
            $("#dob4").val("");
            $("#passportcountrychildren").prop("disabled", false);

        } else {
            $("#idNoaddChild").prop("disabled", false);
            $("#age4").val("").prop("readonly", true);
            $("#dob4").val("");

            $("#passportcountrychildren").prop("disabled", true);

        }
    });

    $("#idNoaddChild").change(function () {
        if ($(this).val().length == 12) {
            var idnChild = $(this).val();

            var lastIcChild = idnChild.substring(10, 12);

            if (lastIcChild % 2 == 0) {
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
            $("#expiryDateChild").prop("disabled", false);

            $("#passportcountrychildren").prop("disabled", false);
            $("#passportcountrychildren").css("pointer-events", "auto");
        } else {
            $("#expiryDateChild").prop("readonly", true);
            $("#expiryDateChild").css("pointer-events", "none");
            $("#expiryDateChild").val("");
            $("#expiryDateChild").prop("disabled", true);

            $("#passportcountrychildren").prop("disabled", true);
            $("#passportcountrychildren").css("pointer-events", "none");
            $("#passportcountrychildren").val("");
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
        if (($("#passports1").val() !== "") ) {
            $("#expiryDate1").prop("readonly", false);
            $("#expiryDate1").prop("disabled", false);
            $("#expiryDate1").css("pointer-events", "auto");

            $("#issuingCountry1").prop("readonly", false);
            $("#issuingCountry1").prop("disabled", false);
            $("#issuingCountry1").css("pointer-events", "auto");
        } else {
            $("#expiryDate1").prop("readonly", true);
            $("#expiryDate1").prop("disabled", true);
            $("#expiryDate1").css("pointer-events", "none");
            $("#expiryDate1").val("");

            $("#issuingCountry1").prop("readonly", true);
            $("#issuingCountry1").prop("disabled", true);
            $("#issuingCountry1").css("pointer-events", "none");
            $("#issuingCountry1").val("");
        }
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

    // Custom validation method to check for special characters
    $.validator.addMethod(
        "noSpecialChars",
        function (value, element) {
            return (
                this.optional(element) ||
                /^[A-Za-z\s!@#$%^&*(),.?":{}|<>+_=;\-[\]\\/'`~]*$/.test(value)
            );
        },
        "Numbers Are Not Allowed"
    );

    // Function to remove numbers from input fields
    function sanitizeInputField(fieldId) {
        $(fieldId).on("input", function () {
            var sanitized = $(this).val().replace(/[\d]/g, ""); // remove numbers
            $(this).val(sanitized);
        });
    }

    // Call sanitizeInputField for each input field that needs it
    sanitizeInputField("#firstname");
    sanitizeInputField("#lastname");
    sanitizeInputField("#emergency-firstname");
    sanitizeInputField("#emergency-lastname");
    sanitizeInputField("#emergency-firstname_2");
    sanitizeInputField("#emergency-lastname_2");
    sanitizeInputField("#firstnamemc");
    sanitizeInputField("#lastnamemc");
    sanitizeInputField("#firstNameChild");
    sanitizeInputField("#lastNameChild");
    sanitizeInputField("#firstNameParent");
    sanitizeInputField("#lastNameParent");
    sanitizeInputField("#firstName1");
    sanitizeInputField("#lastName1");
    sanitizeInputField("#firstNamesP1");
    sanitizeInputField("#lastNamesP1");

    $('input[name="nonNetizen"]').click(function () {
        if ($(this).is(":checked")) {
            $("#idnumber").val("").prop("disabled", true);
        } else {
            $("#idnumber").prop("disabled", false);
        }
    });

    // $('input[name="nonCitizen"]').click(function () {
    //     if ($(this).is(":checked")) {
    //         $("#expiryDate1").val("").prop("disabled", false);
    //         $("#issuingCountry1").val("").prop("disabled", false);
    //     } else {
    //         $("#expiryDate1").val("").prop("disabled", true);
    //         $("#issuingCountry1").val("").prop("disabled", true);
    //     }
    // });

    // $('input[name="okuStatus"]').click(function () {
    //     if ($(this).is(":checked")) {
    //         $("#okucard3").prop("disabled", false);
    //         $("#okuattach3").prop("disabled", false);

    //         $("#okucard4").prop("disabled", false);
    //         $("#okuattach4").prop("disabled", false);
    //     } else {
    //         $("#okucard3").val("").prop("disabled", true);
    //         $("#okuattach3").val("").prop("disabled", true);

    //         $("#okucard4").val("").prop("disabled", true);
    //         $("#okuattach4").val("").prop("disabled", true);
    //     }
    // });

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

    $("#saveProfile").click(function (e) {
        $("#formProfile").validate({
            // Specify validation rules
            rules: {
                personalEmail: {
                    email: true,
                },
                firstName: {
                    required: true,
                },
                lastName: {
                    required: true,
                },
                fullName: {
                    required: true,
                },
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
                phoneNo2: {
                    digits: true,
                    rangelength: [10, 11],
                },
                oldIDNo: {
                    //digits: true,
                    rangelength: [7, 7],
                },
                homeNo: {
                    digits: true,
                    rangelength: [9, 9],
                },
                extensionNo: {
                    digits: true,
                    rangelength: [4, 4],
                },
                okuCardNum: {
                    required: true,
                    digits: true,
                    rangelength: [10, 11],
                },
                okuFile: {
                    required: {
                        depends: function(element) {
                            return $(element).prop("disabled") === false;
                        }
                    }
                },
            },

            messages: {
                personalEmail: {
                    email: "Please Insert Valid Personal Email",
                },
                firstName: {
                    required: "Please Insert First Name",
                },
                lastName: {
                    required: "Please Insert Last Name",
                },
                fullName: {
                    required: "Please Insert Full Name",
                },
                gender: "Please Choose Gender",
                maritialStatus: "Please Choose Marital Status",
                religion: "Please Choose Religion",
                race: "Please Choose Race",
                idNo: {
                    required: "Please Insert New Identification Number",
                    digits: "Please Insert Correct Identification Number Without ' - ' or Space",
                    rangelength: "Please Insert Valid Identification Number",
                },
                oldIDNo: {
                    rangelength: "Please Insert Valid Old Identification Number",
                },
                phoneNo: {
                    required: "Please Insert Phone Number",
                    digits: "Please Insert Valid Phone Number",
                    rangelength: "Please Insert Valid Phone Number",
                },
                phoneNo2: {
                    digits: "Please Insert Valid Phone Number 2",
                    rangelength: "Please Insert Valid Phone Number 2",
                },
                homeNo: {
                    digits: "Please Insert Valid Home Number",
                    rangelength: "Please Insert Valid Home Number",
                },
                extensionNo: {
                    digits: "Please Insert Valid Extension Number",
                    rangelength: "Please Insert Valid Extension Number",
                },
                okuCardNum: {
                    required: "Please Insert OKU Card Number",
                    rangelength: "Please Insert Valid OKU Card Number",
                    digits: "Please Insert Valid OKU Card Number",
                },
                okuFile: {
                    required: "Please Upload OKU Attachment",
                },
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
                                document.getElementById("formProfile")
                            );

                            $.ajax({
                                type: "POST",
                                url: "/updateMyProfile",
                                data: data,
                                dataType: "json",

                                processData: false,
                                contentType: false,
                            }).then(function (data) {
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

    var hash = location.hash.replace(/^#/, ""); // ^ means starting, meaning only match the first hash
    if (hash) {
        $('.nav-tabs a[href="#' + hash + '"]').tab("show");
    }
    $(".nav-tabs a").on("shown.bs.tab", function (e) {
        window.location.hash = e.target.hash;
    });

    //ADD EDUCATION QUALIFICATIONS
    $("#saveEducation").click(function (e) {
        $("#addEducation").validate({
            // Specify validation rules
            rules: {
                fromDate: "required",
                toDate: "required",
                instituteName: "required",
                highestLevelAttained: "required",
                result: "required",
                file: "required",
            },

            messages: {
                fromDate: "Please insert From Date",
                toDate: "Please insert To Date",
                instituteName: "Please insert Institute Name",
                highestLevelAttained: "Please insert Highest Level Attained",
                result: "Please insert Result",
                file: "Please upload valid file",
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
                                url: "/addEducation",
                                data: data,
                                dataType: "json",

                                processData: false,
                                contentType: false,
                            }).then(function (data) {
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

    $("#editEducation").click(function (e) {
        $("#educationModalEdit").validate({
            rules: {
                fromDate: "required",
                toDate: "required",
                instituteName: "required",
                highestLevelAttained: "required",
                result: "required",
                file: "required",
            },

            messages: {
                fromDate: "Please insert From Date",
                toDate: "Please insert To Date",
                instituteName: "Please insert Institute Name",
                highestLevelAttained: "Please insert Highest Level Attained",
                result: "Please insert Result",
                file: "Please upload valid file",
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
                                document.getElementById("educationModalEdit")
                            );

                            $.ajax({
                                type: "POST",
                                url: "/updateEducation",
                                data: data,
                                dataType: "json",

                                processData: false,
                                contentType: false,
                            }).then(function (data) {
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

    educationId = $("#educationId").val();
    educationIds = educationId.split(",");
    for (let i = 0; i < educationIds.length; i++) {
        const type = educationIds[i];
        $("#educationModalEdit" + type).click(function (e) {
            id = $(this).data("id");
            var educationData = getEducation(id);

            educationData.then(function (data) {
                education = data.data;
                $("#idEdu").val(education.id);
                $("#educationFromDate1").val(education.fromDate);
                $("#educationToDate1").val(education.toDate);
                $("#educationinstituteName1").val(education.instituteName);
                $("#educationhighestLevelAttained1").val(
                    education.highestLevelAttained
                );
                $("#educationResult1").val(education.result);
                if (education.file) {
                    $("#fileDownloadOthers").html(
                        '<a href="/storage/' + education.file + '" target="_blank">here</a>'
                    );
                }
            });
            $("#editmodaledd").modal("show");
        });

        $("#deleteEducation" + type).click(function (e) {
            id = $(this).data("id");
            requirejs(["sweetAlert2"], function (swal) {
                swal({
                    title: "Are you sure to delete Education?",
                    type: "error",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes!",
                    showCancelButton: true,
                }).then(function () {
                    $.ajax({
                        type: "POST",
                        url: "/deleteEducation/" + id,
                        data: { _method: "DELETE" },
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

        function getEducation(id) {
            return $.ajax({
                url: "/getEducationById/" + id,
            });
        }
    }

    $("#saveOthers").click(function (e) {
        $("#addOthers").validate({
            rules: {
                otherDate: "required",
                otherPQDetails: "required",
                file: "required",
            },

            messages: {
                otherDate: "Please insert Date",
                otherPQDetails:
                    "Please insert Professional Qualification Details",
                file: "Please upload valid file",
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
                                document.getElementById("addOthers")
                            );

                            $.ajax({
                                type: "POST",
                                url: "/addOthers",
                                data: data,
                                dataType: "json",

                                processData: false,
                                contentType: false,
                            }).then(function (data) {
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

    $("#editOthers").click(function (e) {
        $("#othersModalEdit").validate({
            rules: {
                otherDate: "required",
                otherPQDetails: "required",
                file: "required",
            },

            messages: {
                otherDate: "Please insert Date",
                otherPQDetails:
                    "Please insert Professional Qualification Details",
                file: "Please upload valid file",
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
                                document.getElementById("othersModalEdit")
                            );

                            $.ajax({
                                type: "POST",
                                url: "/updateOthers",
                                data: data,
                                dataType: "json",

                                processData: false,
                                contentType: false,
                            }).then(function (data) {
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

    othersId = $("#othersId").val();
    othersIds = othersId.split(",");
    for (let i = 0; i < othersIds.length; i++) {
        const type = othersIds[i];
        $("#othersQualificationModalEdit" + type).click(function (e) {
            id = $(this).data("id");
            var othersData = getOthers(id);
            othersData.then(function (data) {
                othersQualification = data.data;
                $("#idOthers").val(othersQualification.id);
                $("#othersDate1").val(othersQualification.otherDate);
                $("#othersPQDetails1").val(othersQualification.otherPQDetails);
                if (othersQualification.file) {
                    $("#othersDoc1").html(
                        '<a href="/storage/' + othersQualification.file + '" target="_blank">here</a>'
                    );
                }
            });
            $("#editmodalothers").modal("show");
        });

        $("#deleteOthers" + type).click(function (e) {
            id = $(this).data("id");
            requirejs(["sweetAlert2"], function (swal) {
                swal({
                    title: "Are you sure to delete Other Qualification?",
                    type: "error",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes!",
                    showCancelButton: true,
                }).then(function () {
                    $.ajax({
                        type: "POST",
                        url: "/deleteOthers/" + id,
                        data: { _method: "DELETE" },
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

        function getOthers(id) {
            return $.ajax({
                url: "/getOthers/" + id,
            });
        }
    }

    $("#addAddressDetails").click(function (e) {
        $("#formAddressDetails").validate({
            // Specify validation rules
            rules: {
                address1: "required",
                country: "required",
                state: "required",
                city: "required",
                postcode: "required",
            },
            messages: {
                address1: "Please Insert Address 1",
                country: "Please Choose Country",
                state: "Please Choose State",
                city: "Please Choose City",
                postcode: "Please Choose Postcode",
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
                } else {
                    error.insertAfter(element);
                }
            },

            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(document.getElementById("formAddressDetails"));

                    $.ajax({
                        type: "POST",
                        url: "/createAddress",
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

    $("#saveAddressDetailsBtn").click(function (e) {
        $("#formEditAddressDetails").validate({
            rules: {
                address1: "required",
                country: "required",
                state: "required",
                city: "required",
                postcode: "required",
            },

            messages: {
                address1: "Please Insert Address 1",
                country: "Please Choose Country",
                state: "Please Choose State",
                city: "Please Choose City",
                postcode: "Please Choose Postcode",
            },

            errorPlacement: function(error, element) {
                if (element.attr("name") === "country") {
                    error.insertAfter("#country-err-2");
                } else if (element.attr("name") === "state") {
                    error.insertAfter("#state-err-2");
                } else if (element.attr("name") === "city") {
                    error.insertAfter("#city-err-2");
                } else if (element.attr("name") === "postcode") {
                    error.insertAfter("#postcode-err-2");
                } else {
                    error.insertAfter(element);
                }
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
                                document.getElementById("formEditAddressDetails")
                            );

                            $.ajax({
                                type: "POST",
                                url: "/updateAddressDetails",
                                data: data,
                                dataType: "json",

                                processData: false,
                                contentType: false,
                            }).then(function (data) {
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
            },
        });
    });

    $("#saveAddress").click(function (e) {
        $("#formAddress").validate({
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
                address1: "Please Insert Address 1",
                city: "Please Insert City",
                state: "Please Choose State",
                country: "required",
                postcode: {
                    required: "Please Insert Postcode",
                    digits: "Please Insert Valid Postcode",
                    rangelength: "Please Insert Valid Postcode",
                },
                address1c: "Please Insert Address 1",
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
        $("#formEmergency").validate({
            // Specify validation rules
            rules: {
                firstName: {
                    required: true,
                },
                lastName: {
                    required: true,
                },
                relationship: "required",
                contactNo: {
                    required: true,
                    digits: true,
                    rangelength: [10, 11],
                },
                relationship: "required",
                address1: "required",
                country: "required",
                postcode: {
                    required: true,
                },
                city: "required",
                state: "required",
            },

            messages: {
                firstName: {
                    required: "Please Insert First Name",
                },
                lastName: {
                    required: "Please Insert Last Name",
                },
                relationship: "Please Choose Relationship",
                contactNo: {
                    required: "Please Insert Phone Number",
                    digits: "Please Insert Valid Phone Number",
                },
                relationship: "Please Choose Relationship",
                address1: "Please Insert Address 1",
                country: "Please Choose Country",
                postcode: "Please Choose Postcode",
                city: "Please Choose City",
                state: "Please Choose State",
            },

            errorPlacement: function(error, element) {
                if (element.attr("name") === "country") {
                    error.insertAfter("#countryEC-err");
                } else if (element.attr("name") === "state") {
                    error.insertAfter("#stateEC-err");
                } else if (element.attr("name") === "city") {
                    error.insertAfter("#cityEC-err");
                } else if (element.attr("name") === "postcode") {
                    error.insertAfter("#postcodeEC-err");
                } else {
                    error.insertAfter(element);
                }
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

                                processData: false,
                                contentType: false,
                            }).then(function (data) {
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
            },
        });

        $("#formEmergency2").validate({
            // Specify validation rules
            rules: {
                firstName_2: {
                    required: true,
                },
                lastName_2: {
                    required: true,
                },
                relationship_2: "required",
                contactNo_2: {
                    required: true,
                    digits: true,
                    rangelength: [10, 11],
                },
                relationship_2: "required",
                address1_2: "required",
                country_2: "required",
                postcode_2: {
                    required: true,
                },
                city_2: "required",
                state_2: "required",
            },

            messages: {
                firstName_2: {
                    required: "Please Insert First Name",
                },
                lastName_2: {
                    required: "Please Insert Last Name",
                },
                relationship_2: "Please Choose Relationship",
                contactNo_2: {
                    required: "Please Insert Phone Number",
                    digits: "Please Insert Valid Phone Number",
                },
                relationship_2: "Please Choose Relationship",
                address1_2: "Please Insert Address 1",
                country_2: "Please Choose Country",
                postcode_2: "Please Choose Postcode",
                city_2: "Please Choose City",
                state_2: "Please Choose State",
            },

            errorPlacement: function(error, element) {
                if (element.attr("name") === "country_2") {
                    error.insertAfter("#countryEC2-err");
                } else if (element.attr("name") === "state_2") {
                    error.insertAfter("#stateEC2-err");
                } else if (element.attr("name") === "city_2") {
                    error.insertAfter("#cityEC2-err");
                } else if (element.attr("name") === "postcode_2") {
                    error.insertAfter("#postcodeEC2-err");
                } else {
                    error.insertAfter(element);
                }
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

                                processData: false,
                                contentType: false,
                            }).then(function (data) {
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
            },
        });
    });

    $("#addCompanion").click(function (e) {
        $("#addCompanionForm").validate({
            // Specify validation rules
            rules: {
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
                oldIDNo: {
                    //digits: true,
                    rangelength: [7, 7],
                },
                contactNo: {
                    digits: true,
                    rangelength: [10, 11],
                },
                homeNo: {
                    digits: true,
                    rangelength: [9, 9],
                },
                expiryDate: "required",
                issuingCountry: "required",
                address1: "required",
                country: "required",
                state: "required",
                city: "required",
                postcode: "required",
                salary: {
                    digits: true,
                },
                officeNo: {
                    digits: true,
                    rangelength: [9, 9],
                },
                okuNumber: {
                    required: true,
                    digits: true,
                    rangelength: [10, 11],
                },
                okuID: {
                    required: true,
                },
                designation: {
                    required: {
                        depends: function(element) {
                            return $(element).prop("readonly") === false;
                        }
                    }
                },
                address1E: {
                    required: {
                        depends: function(element) {
                            return $(element).prop("readonly") === false;
                        }
                    }
                },
                countryE: {
                    required: {
                        depends: function(element) {
                            return $(element).prop("readonly") === false;
                        }
                    }
                },
                stateE: {
                    required: {
                        depends: function(element) {
                            return $(element).prop("readonly") === false;
                        }
                    }
                },
                cityE: {
                    required: {
                        depends: function(element) {
                            return $(element).prop("readonly") === false;
                        }
                    }
                },
                postcodeE: {
                    required: {
                        depends: function(element) {
                            return $(element).prop("readonly") === false;
                        }
                    }
                },
            },

            messages: {
                firstName: {
                    required: "Please Insert First Name",
                },
                lastName: {
                    required: "Please Insert Last Name",
                },
                idNo: {
                    required: "Please Insert New Identification Number",
                    digits: "Please Insert Correct Identification Number Without ' - ' or Space",
                    rangelength: "Please insert Valid Identification Number",
                },
                oldIDNo: {
                    rangelength: "Please Insert Valid Old Identification Number",
                },
                contactNo: {
                    required: "Please Insert Contact Number",
                    digits: "Please Insert Correct Contact Number Without ' - ' or Space",
                    rangelength: "Please Insert Valid Phone Number ",
                },
                homeNo: {
                    digits: "Please Insert Correct Home Number Without ' - ' or Space",
                    rangelength: "Please Insert Valid Home Number",
                },
                expiryDate: "Please Insert Expiry Date",
                issuingCountry: "Please Choose Issuing Country",
                address1: "Please Insert Address 1",
                country: "Please Choose Country",
                state: "Please Choose State",
                city: "Please Choose City",
                postcode: "Please Choose Postcode",
                salary: {
                    digits: "Please Insert Valid Monthly Salary",
                },
                officeNo: {
                    digits: "Please Insert Correct Office Number Without ' - ' or Space",
                    rangelength: "Please Insert Valid Office Number",
                },
                designation: "Please Insert Designation",
                okuNumber: {
                    required: "Please Insert OKU Card Number",
                    rangelength: "Please Insert Valid OKU Card Number",
                    digits: "Please Insert Valid OKU Card Number",
                },
                okuID: {
                    required: "Please Upload OKU Attachment",
                },
                address1E : "Please Insert Address 1",
                countryE: "Please Choose Country",
                stateE: "Please Choose State",
                cityE: "Please Choose City",
                postcodeE: "Please Choose Postcode",
            },

            errorPlacement: function(error, element) {
                if (element.attr("name") === "country") {
                    error.insertAfter("#countryc-err");
                } else if (element.attr("name") === "state") {
                    error.insertAfter("#statec-err");
                } else if (element.attr("name") === "city") {
                    error.insertAfter("#cityc-err");
                } else if (element.attr("name") === "postcode") {
                    error.insertAfter("#postcodec-err");
                } else if (element.attr("name") === "countryE") {
                    error.insertAfter("#countryEmc-err");
                } else if (element.attr("name") === "stateE") {
                    error.insertAfter("#stateEmc-err");
                }else if (element.attr("name") === "cityE") {
                    error.insertAfter("#cityEmc-err");
                }else if (element.attr("name") === "postcodeE") {
                    error.insertAfter("#postcodeEmc-err");
                } else {
                    error.insertAfter(element);
                }
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
                                document.getElementById("addCompanionForm")
                            );

                            $.ajax({
                                type: "POST",
                                url: "/addCompanion",
                                data: data,
                                dataType: "json",

                                processData: false,
                                contentType: false,
                            }).then(function (data) {
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

    companion = ["1", "2", "3", "4"];
    for (let i = 0; i < companion.length; i++) {
        const no = companion[i];

        $("#updateCompanion" + no).click(function (e) {
            $("#updateCompanionForm" + no).validate({
                rules: {
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
                    oldIDNo: {
                        //digits: true,
                        rangelength: [7, 7],
                    },
                    contactNo: {
                        digits: true,
                        rangelength: [10, 11],
                    },
                    homeNo: {
                        digits: true,
                        rangelength: [9, 9],
                    },
                    address1: "required",
                    city: "required",
                    state: "required",
                    country: "required",
                    expiryDate: "required",
                    issuingCountry: "required",
                    postcode: {
                        required: true,
                    },
                    salary: {
                        digits: true,
                    },
                    officeNo: {
                        digits: true,
                        rangelength: [9, 9],
                    },
                    okuNumber: {
                        required: true,
                        digits: true,
                        rangelength: [10, 11],
                    },
                    okuID: {
                        required: {
                            depends: function(element) {
                                return $(element).prop("readonly") === false;
                            }
                        }
                    },
                    designation: {
                        required: {
                            depends: function(element) {
                                return $(element).prop("readonly") === false;
                            }
                        }
                    },
                    address1E: {
                        required: {
                            depends: function(element) {
                                return $(element).prop("readonly") === false;
                            }
                        }
                    },
                    countryE: {
                        required: {
                            depends: function(element) {
                                return $(element).prop("readonly") === false;
                            }
                        }
                    },
                    stateE: {
                        required: {
                            depends: function(element) {
                                return $(element).prop("readonly") === false;
                            }
                        }
                    },
                    cityE: {
                        required: {
                            depends: function(element) {
                                return $(element).prop("readonly") === false;
                            }
                        }
                    },
                    postcodeE: {
                        required: {
                            depends: function(element) {
                                return $(element).prop("readonly") === false;
                            }
                        }
                    },
                },

                messages: {
                    firstName: {
                        required: "Please Insert First Name",
                    },
                    lastName: {
                        required: "Please Insert Last Name",
                    },
                    idNo: {
                        required: "Please Insert New Identification Number",
                        digits: "Please Insert Correct Identification Number Without ' - ' or Space",
                        rangelength:
                            "Please insert Valid Identification Number",
                    },
                    oldIDNo: {
                        rangelength:
                            "Please Insert Valid Old Identification Number",
                    },
                    contactNo: {
                        required: "Please Insert Contact Number",
                        digits: "Please Insert Correct Contact Number Without ' - ' or Space",
                        rangelength: "Please Insert Valid Phone Number ",
                    },
                    homeNo: {
                        digits: "Please Insert Correct Home Number Without ' - ' or Space",
                        rangelength: "Please Insert Valid Home Number",
                    },
                    address1: "Please Insert Address 1",
                    city: "Please Insert City",
                    state: "Please Choose State",
                    country: "Please Choose Country",
                    expiryDate: "Please Insert Expiry Date",
                    issuingCountry: "Please Choose Issuing Country",
                    postcode: {
                        required: "Please Insert Postcode",

                    },
                    salary: {
                        digits: "Please Insert Valid Monthly Salary",
                    },
                    officeNo: {
                        digits: "Please Insert Correct Office Number Without ' - ' or Space",
                        rangelength: "Please Insert Valid Office Number",
                    },
                    designation: "Please Insert Designation",
                    okuNumber: {
                        required: "Please Insert OKU Card Number",
                        rangelength: "Please Insert Valid OKU Card Number",
                        digits: "Please Insert Valid OKU Card Number",
                    },
                    okuID: {
                        required: "Please Upload OKU Attachment",
                    },
                    address1E : "Please Insert Address 1",
                    countryE: "Please Choose Country",
                    stateE: "Please Choose State",
                    cityE: "Please Choose City",
                    postcodeE: "Please Choose Postcode",
                },

                errorPlacement: function(error, element) {
                    if (element.attr("name") === "country") {
                        error.insertAfter("#countryUC-err");
                    } else if (element.attr("name") === "state") {
                        error.insertAfter("#stateUC-err");
                    } else if (element.attr("name") === "city") {
                        error.insertAfter("#cityUC-err");
                    } else if (element.attr("name") === "postcode") {
                        error.insertAfter("#postcodeUC-err");
                    } else if (element.attr("name") === "countryE") {
                        error.insertAfter("#countryCEdit-err");
                    } else if (element.attr("name") === "stateE") {
                        error.insertAfter("#stateCEdit-err");
                    }else if (element.attr("name") === "cityE") {
                        error.insertAfter("#cityCEdit-err");
                    }else if (element.attr("name") === "postcodeE") {
                        error.insertAfter("#postcodeCEdit-err");
                    } else {
                        error.insertAfter(element);
                    }
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
                                    document.getElementById(
                                        "updateCompanionForm" + no
                                    )
                                );

                                $.ajax({
                                    type: "POST",
                                    url: "/updateCompanion",
                                    data: data,
                                    dataType: "json",

                                    processData: false,
                                    contentType: false,
                                }).then(function (data) {
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

    }

    $(document).on("click", "#deleteCompanion", function () {
        no = $(this).data("id");
        requirejs(["sweetAlert2"], function (swal) {
            swal({
                title: "Are you sure to delete Companion?",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
            }).then(function () {
                $.ajax({
                    type: "POST",
                    url: "/deleteCompanion/" + no,
                    data: { _method: "DELETE" },
                }).then(function (data) {
                    console.log(no);
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
                            location.reload();
                        }
                    });
                });
            });
        });
    });

    $("#tableChildren").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"],
        ],
        initComplete: function (settings, json) {
            $("#tableChildren").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });
    $(".child").hide();
    $(document).on("click", ".dropdown-toggle", function(e) {
        e.stopPropagation(); // mencegah event dari bubbling ke atas
        var dropdownMenu = $(this).closest(".btn-group").find(".child");
        $(".child").not(dropdownMenu).hide();
        dropdownMenu.toggle();
    });
    $(document).on("click", function(e) {
        if (!$(".btn-group").is(e.target) && $(".btn-group").has(e.target).length === 0) {
            $(".child").hide();
        }
    });

    $("#education").DataTable({
        responsive: false,
        autoWidth: true,
        lengthMenu: [
            [5, 10, 25, -1],
            [5, 10, 25, "All"],
        ],
        initComplete: function (settings, json) {
            $("#education").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });
    $(".edu").hide();
    $(document).on("click", ".dropdown-toggle", function(e) {
        e.stopPropagation(); // mencegah event dari bubbling ke atas
        var dropdownMenu = $(this).closest(".btn-group").find(".edu");
        $(".edu").not(dropdownMenu).hide();
        dropdownMenu.toggle();
    });
    $(document).on("click", function(e) {
        if (!$(".btn-group").is(e.target) && $(".btn-group").has(e.target).length === 0) {
            $(".edu").hide();
        }
    });

    $("#qualificationOthers").DataTable({
        responsive: false,
        autoWidth: true,
        lengthMenu: [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"],
        ],
        initComplete: function (settings, json) {
            $("#qualificationOthers").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });
    $(".oth").hide();
    $(document).on("click", ".dropdown-toggle", function(e) {
        e.stopPropagation(); // mencegah event dari bubbling ke atas
        var dropdownMenu = $(this).closest(".btn-group").find(".oth");
        $(".oth").not(dropdownMenu).hide();
        dropdownMenu.toggle();
    });
    $(document).on("click", function(e) {
        if (!$(".btn-group").is(e.target) && $(".btn-group").has(e.target).length === 0) {
            $(".oth").hide();
        }
    });

    $(document).ready(function() {
        $("#profileAddress").DataTable({
            responsive: false,
            lengthMenu: [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"],
            ],
            initComplete: function (settings, json) {
                $("#profileAddress").wrap(
                    "<div style='overflow:auto; width:100%;position:relative;'></div>"
                );
            },
        });

        var originalGetComputedStyle = window.getComputedStyle;
        window.getComputedStyle = function(el, pseudo) {
            try {
                return originalGetComputedStyle(el, pseudo);
            } catch (err) {
                console.warn('getComputedStyle override: prevented error.', err);
                return {
                    getPropertyValue: function() { return ""; } // metode palsu
                };
            }
        };

        $(".myadd").hide();

        $(document).on("click", ".dropdown-toggle", function(e) {
            e.stopPropagation(); // mencegah event dari bubbling ke atas
            var dropdownMenu = $(this).closest(".btn-group").find(".myadd");
            $(".myadd").not(dropdownMenu).hide();
            dropdownMenu.toggle();
        });
        $(document).on("click", function(e) {
            if (!$(".btn-group").is(e.target) && $(".btn-group").has(e.target).length === 0) {
                $(".myadd").hide();
            }
        });
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
    $("#firstNameParent,#lastNameParent").change(function () {
        var a = $("#firstNameParent").val();
        var b = $("#lastNameParent").val();
        $("#fullNameParent").val(a + " " + b);
    });

    $("#firstNamesP1,#lastNamesP1").change(function () {
        var a = $("#firstNamesP1").val();
        var b = $("#lastNamesP1").val();
        $("#fullNameP1").val(a + " " + b);
    });

    $(".partCheck").click(function () {
        if ($(this).prop("checked")) {
            $("#idnumber").prop("disabled", true);
            $("#dob").val("").prop("readonly", false);
            $("#dob").css("pointer-events", "auto");
            $("#idnumber").val("");
            $("#gendermyprofile").val("").prop("readonly", false);
            $("#gendermyprofile").css({
                "pointer-events": "auto",
                background: "none"});
        } else {
            $("#idnumber").prop("disabled", false);
            $("#dob").val("").prop("readonly", true);
            $("#dob").css("pointer-events", "none");
            $("#gendermyprofile").val("").prop("readonly", true);
            $("#gendermyprofile").css({
                "pointer-events": "none" ,
                background: "#e9ecef"});
            }
    });




    // ADD COMPANION INFORMATION
    $(".partCheck2").click(function () {
        if ($(this).prop("checked")) {
            $("#idnumber2").prop("readonly", true);
            $("#dobmc").prop("readonly", false);
            $("#dobmc").css("pointer-events", "auto");
            $("#idnumber2").val("");
            $("#expirydatemc").prop("disabled", true);
            $("#issuingCountryAddCompanion").prop("disabled", true);
        } else {
            $("#idnumber2").prop("readonly", false);
            $("#dobmc").prop("readonly", true);
            $("#dobmc").css("pointer-events", "none");
            $("#passportmc").val("");
            $("#expirydatemc").val("");
            $("#expirydatemc").prop("readonly", true);
            $("#expirydatemc").css("pointer-events", "none");
            $("#issuingCountryAddCompanion").prop("disabled", true);
        }
    });

    //ADD CHILDREN DETAILS
    $(".partCheck4").click(function () {
        if ($(this).prop("checked")) {
            $("#idNoaddChild").prop("readonly", true);
            $("#DOBChild").prop("disabled", false);
            $("#DOBChild").css("pointer-events", "auto");
            $("#idNoaddChild").val("");
        } else {
            $("#idNoaddChild").prop("readonly", false);
            $("#DOBChild").prop("disabled", true);
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
            $("#age1").prop("readonly", false);
            $("#DOB1").css("pointer-events", "auto");
            $("#age1").css("pointer-events", "auto");
            $("#idNo1").val("");
            nonCitizen1 = 1;
        } else {
            $("#idNo1").prop("readonly", false);
            $("#DOB1").prop("readonly", true);
            $("#age1").prop("readonly", true);
            $("#DOB1").css("pointer-events", "none");
            $("#age1").css("pointer-events", "none");
            $("#passports1").val("");
            $("#expiryDate1").val("");
            $("#expiryDate1").prop("readonly", true);
            $("#expiryDate1").css("pointer-events", "none");
            nonCitizen1 = 0;
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
    $("#dob4").datepicker({
        todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true,
    });
    $("#dobAddCompanion").datepicker({
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
    $("#expiryDateUpdateCompanion").datepicker({
        todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true,
    });
    $("#dobuc").datepicker({
        todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true,
    });
    $("#dom").datepicker({
        todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true,
    });
    $("#dateJoinedmcEdit").datepicker({
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
    $("#dob6").datepicker({
        todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true,
    });
    $("#DOBP1").datepicker({
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
    $("#expiryDateParent").datepicker({
        todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true,
    });
    $("#expiryDateParentEdit").datepicker({
        todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true,
    });
    $("#educationFromDate1").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy-mm-dd",
    });

    $("#educationToDate1").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy-mm-dd",
    });
    $("#datepicker-others").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy-mm-dd",
    });
    $("#othersDate1").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy-mm-dd",
    });
    // Initialize the datepicker for the from date
    $("#datepicker-fromdate").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy-mm-dd",
    });

    $("#DOBparent").datepicker({
        todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true,
    });

    $("#DOBsibling").datepicker({
        todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true,
    });

    // add children
    $("#addChildren").click(function (e) {
        $("#addChildrenForm").validate({
            // Specify validation rules
            rules: {
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
                oldIDNo: {
                    //digits: true,
                    rangelength: [7, 7],
                },

                okuNo: {
                    required: true,
                    digits: true,
                    rangelength: [10, 11],
                },

                okuFile: {
                    required: true,
                },
                expiryDate: {
                    required: true,
                },
                issuingCountry: {
                    required: true,
                },
            },

            messages: {
                firstName: {
                    required: "Please Insert First Name",
                },
                lastName: {
                    required: "Please Insert Last Name",
                },
                idNo: {
                    required: "Please Insert New Identification Number",
                    digits: "Please Insert Correct Identification Number Without ' - ' or Space",
                    rangelength: "Please Insert Valid Identification Number",
                },
                oldIDNo: {
                    rangelength: "Please Insert Valid Old Identification Number",
                },

                okuNo: {
                    required: "Please Insert OKU Card Number",
                    digits: "Please Insert Valid OKU Card Number",
                    rangelength: "Please Insert Valid OKU Card Number",
                },

                okuFile: {
                    required: "Please Upload OKU Attachment",
                },

                expiryDate: {
                    required: "Please Insert Expiry Date",
                },
                issuingCountry: {
                    required: "Please Choose Issuing Country",
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

                                processData: false,
                                contentType: false,
                            }).then(function (data) {
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

    // edit children
    $("#editChildren").click(function (e) {
        $("#editChildrenForm").validate({
            rules: {
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
                oldIDNo: {
                    rangelength: [7, 7],
                },

                okuNo: {
                    required: true,
                    digits: true,
                    rangelength: [10, 11],
                },

                okuFile: {
                    required: {
                        depends: function(element) {
                            return $(element).prop("readonly") === false;
                        }
                    }
                },
                expiryDate: {
                    required: true,
                },
                issuingCountry: {
                    required: true,
                },
                postcode: {
                    required: false,
                },
            },

            messages: {
                firstName: {
                    required: "Please Insert First Name",
                },
                lastName: {
                    required: "Please Insert Last Name",
                },
                idNo: {
                    required: "Please Insert New Identification Number",
                    digits: "Please Insert Correct Identification Number Without ' - ' or Space",
                    rangelength: "Please Insert Valid Identification Number",
                },
                oldIDNo: {
                    rangelength: "Please Insert Valid Old Identification Number",
                },

                okuNo: {
                    required: "Please Insert OKU Card Number",
                    digits: "Please Insert Valid OKU Card Number",
                    rangelength: "Please Insert Valid OKU Card Number",
                },

                okuFile: {
                    required: "Please Upload OKU Attachment",
                },

                expiryDate: {
                    required: "Please Insert Expiry Date",
                },
                issuingCountry: {
                    required: "Please Choose Issuing Country",
                },
                postcode: {
                    rangelength: "Please Insert a valid postcode",
                },
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
                                document.getElementById("editChildrenForm")
                            );

                            $.ajax({
                                type: "POST",
                                url: "/updateChildren",
                                data: data,
                                dataType: "json",

                                processData: false,
                                contentType: false,
                            }).then(function (data) {
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
            },
        });
    });

    childId = $("#childId").val();

    childIds = childId.split(",");

    for (let i = 0; i < childIds.length; i++) {
        const type = childIds[i];
        $(document).on("click","#childModalEdit" + type, function (e) {
            $("#issuingCountry1").val("").prop("disabled", true);
            $("#expiryDate1").val("").prop("disabled", true);

            id = $(this).data("id");
            var childrenData = getChildren(id);

            childrenData.then(function (data) {
                console.log(data.data);
                child = data.data;
                $("#idChildren").val(child.id);
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
                $("#oldIdNumber1").val(child.oldIDNo);
                if (child.birthID) {
                    $("#BirthCerttView").html(
                        '<a href="/storage/' + child.birthID + '" target="_blank">here</a>'
                    );
                }
                $("#instituition1").val(child.instituition);
                $("#issuingCountry1").val(child.issuingCountry);
                if (child.idFile) {
                    $("#idAttachmentView").html(
                        '<a href="/storage/' + child.idFile + '" target="_blank">here</a>'
                    );
                }
                $("#lastName1").val(child.lastName);
                $("#maritalStatus1").prop("selectedIndex", child.maritalStatus);
                $("#passports1").val(child.passport);
                $("#supportDoc1").val(child.supportDoc);
                $("#address1_1").val(child.address1);
                $("#address2_1").val(child.address2);
                $("#postcode1").val(child.postcode);
                $("#city1").val(child.city);
                $("#state1").val(child.state);
                $("#okucard4").val(child.okuNo);
                if (child.okuFile) {
                    $("#okuAttachmentView").html(
                        '<a href="/storage/' + child.okuFile + '" target="_blank">here</a>'
                    );
                }
                if (child.supportDoc) {
                    $("#supportDocAttachmentView").html(
                        '<a href="/storage/' + child.supportDoc + '" target="_blank">here</a>'
                    );
                }
                if (child.okuStatus == "on") {
                    $("#OKUchildren1").prop("checked", true);
                    $("#okucard4").prop("readonly", false);
                    $("#okucard4").prop("disabled", false);
                    $("#okucard4").val(child.okuNo);

                    $("#okuattach4").prop("readonly", true);

                    $("#okuattach4").css("pointer-events", "auto");
                } else {
                    $("#OKUchildren1").prop("checked", false);

                    $("#okucard4").prop("disabled", true);
                    $("#okucard4").prop("readonly", true);
                    $("#okucard4").val();

                    $("#okuattach4").prop("readonly", true);

                    $("#okuattach4").css("pointer-events", "none");
                }
                $("#country1").val(child.country).select2({
                    placeholder: 'PLEASE CHOOSE',
                    allowClear: true,
                    dropdownParent: $('#edit-formchildren'),
                });
                $("#postcode1").val(child.postcode).select2({
                    placeholder: 'PLEASE CHOOSE',
                    allowClear: true,
                    dropdownParent: $('#edit-formchildren'),
                });
            });
            $("#edit-children").modal("show");
        });

        $("#childModalView" + type).click(function (e) {
            id = $(this).data("id");
            var childrenData = getChildren(id);

            $("input").prop("disabled", true);
            $("select").prop("disabled", true);

            childrenData.then(function (data) {
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

        $(document).on("click","#deleteChildren" + type, function (e) {
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

    $("#addSibling").click(function (e) {
        $("#addSiblingForm").validate({
            // Specify validation rules
            rules: {
                firstName: {
                    required: true,
                },
                lastName: {
                    required: true,
                },
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
                firstName: {
                    required: "Please Insert First Name",
                },
                lastName: {
                    required: "Please Insert Last Name",
                },
                DOB: "Please Insert Date of Birth",
                gender: "Please Choose Gender",
                contactNo: {
                    digits: "Please Insert Correct Contact Number Without ' - ' or Space",
                    required: "Please Insert Contact Number",
                    rangelength: "Please Insert Valid Phone Number",
                },
                relationship: "Please Choose Relationship",
                address1: "Please Insert Address 1",
                postcode: {
                    required: "Please Insert Postcode",
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

                processData: false,
                contentType: false,
            }).then(function (data) {
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

            SiblingData.then(function (data) {
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
            SiblingData.then(function (data) {
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

        function getSibling(id) {
            return $.ajax({
                url: "/getSiblingById/" + id,
            });
        }
    }

    ///// PARENT INFORMATION /////
    $("#tableParent").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"],
        ],
        initComplete: function (settings, json) {
            $("#tableParent").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });
    $(".fam").hide();
    $(document).on("click", ".dropdown-toggle", function(e) {
        e.stopPropagation(); // mencegah event dari bubbling ke atas
        var dropdownMenu = $(this).closest(".btn-group").find(".fam");
        $(".fam").not(dropdownMenu).hide();
        dropdownMenu.toggle();
    });
    $(document).on("click", function(e) {
        if (!$(".btn-group").is(e.target) && $(".btn-group").has(e.target).length === 0) {
            $(".fam").hide();
        }
    });

    $("#parentModalAdd").click(function (e) {
        // $("input").prop("disabled", false);
        // $("select").prop("disabled", false);
        $("#add-parent").modal("show");

        $("#expiryDateParent").prop("disabled", true);
        $("#expiryDateParent").prop("readonly", true);

        $("#passportcountryparent").prop("disabled", true);
        $("#passportcountryparent").prop("readonly", true);

        $("#okucard5").prop("disabled", true);
        $("#okucard5").prop("readonly", true);

        $("#okuattach5").prop("disabled", true);
        $("#okuattach5").prop("readonly", true);
    });

    $("#idNoaddFamily").change(function () {
        if ($(this).val().length == 12) {
            var idn = $(this).val();

            var lastIc = idn.substring(10, 12);

            if (lastIc % 2 == 0) {
                $("#genderFamily").val(2);
            } else {
                $("#genderFamily").val(1);
            }
        }
    });

    $("#passportParent").change(function () {
        if ($("#passportParent").val() !== "") {
            $("#expiryDateParent").prop("disabled", false);
            $("#expiryDateParent").prop("readonly", false);
            $("#expiryDateParent").css("pointer-events", "auto");

            $("#passportcountryparent").prop("disabled", false);
            $("#passportcountryparent").css("pointer-events", "auto");
        } else {
            $("#expiryDateParent").prop("disabled", true);
            $("#expiryDateParent").prop("readonly", false);
            $("#expiryDateParent").css("pointer-events", "none");
            $("#expiryDateParent").val("");

            $("#passportcountryparent").prop("disabled", true);
            $("#passportcountryparent").css("pointer-events", "none");
            $("#passportcountryparent").val("");
        }
    });




    // Update children details
    $('input[name="nonCitizen"]').click(function () {
        if ($(this).is(":checked")) {
            $("#idNo1").val("").prop("disabled", true);
            $("#age1").val("").prop("readonly", false);
            $("#DOB1").val("");
        } else {
            $("#idNo1").prop("disabled", false);
            $("#age1").val("").prop("readonly", true);
            $("#DOB1").val("");
        }
    });


    $("#addParent").click(function (e) {
        $("#addParentForm").validate({
            // Specify validation rules
            rules: {
                firstName: {
                    required: true,
                },
                lastName: {
                    required: true,
                },
                DOB: "required",
                age: "required",
                relationship: "required",
                address1: "required",
                postcode: {
                    required: true,
                },
                city: "required",
                state: "required",
                country: "required",
                idNo: {
                    required: true,
                    digits: true,
                    rangelength: [12, 12],
                },
                oldIDNo: {
                    //digits: true,
                    rangelength: [7, 7],
                },
                contactNo: {
                    digits: true,
                    rangelength: [10, 11],
                },
                expiryDate: {
                    required: true,
                },
                okuFile: {
                    required: true,

                },
                issuingCountry: {
                   required: true,
                },

                okuCardNum: {
                    required: true,
                     digits: true,
                     rangelength: [10, 11],
                 },

                okuFile: {
                     required: true,
                },
            },

            messages: {
                firstName: {
                    required: "Please Insert First Name",
                },
                lastName: {
                    required: "Please Insert Last Name",
                },
                DOB: "Please Insert Date Of Birth",
                age: "Please Insert Age",
                relationship: "Please Choose Relationship",
                address1: "Please Insert Address 1",
                postcode: {
                    required: "Please Choose Postcode",
                },
                city: "Please Insert City",
                state: "Please Choose State",
                country: "Please Choose Country",
                idNo: {
                    required: "Please Insert New Identification Number",
                    digits: "Please Insert Correct Identification Number Without ' - ' or Space",
                    rangelength: "Please Insert Valid Identification Number",
                },
                oldIDNo: {
                    rangelength: "Please Insert Valid Old Identification Number",
                },
                contactNo: {
                    required: "Please Insert Contact Number",
                    digits: "Please Insert Valid Phone Number",

                    rangelength: "Please Insert Valid Phone Number",
                },
                expiryDate: {
                    required: "Please Insert Expiry Date",
                },
                issuingCountry: {
                    required: "Please Choose Issuing Country",
                },

                okuCardNum: {
                    required: "Please Insert OKU Card Number",
                    digits: "Please Insert Valid OKU Card Number",
                    rangelength: "Please Insert Valid OKU Card Number",
                },

                okuFile: {
                    required: "Please Upload OKU Attachment",
                },
            },

            errorPlacement: function(error, element) {
                if (element.attr("name") === "country") {
                    error.insertAfter("#countryparent-err");
                } else if (element.attr("name") === "state") {
                    error.insertAfter("#stateparent-err");
                } else if (element.attr("name") === "city") {
                    error.insertAfter("#cityparent-err");
                } else if (element.attr("name") === "postcode") {
                    error.insertAfter("#postcodeparent-err");
                } else {
                    error.insertAfter(element);
                }
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

                                processData: false,
                                contentType: false,
                            }).then(function (data) {
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
        $("#editParentForm").validate({
            // Specify validation rules
            rules: {
                firstName: {
                    required: true,
                },
                lastName: {
                    required: true,
                },
                DOB: "required",
                age: "required",
                relationship: "required",
                address1: "required",
                postcode: {
                    required: true,
                },
                city: "required",
                state: "required",
                country: "required",
                idNo: {
                    required: true,
                    digits: true,
                    rangelength: [12, 12],
                },
                oldIDNo: {
                    rangelength: [7, 7],
                },
                contactNo: {
                    digits: true,
                    rangelength: [10, 11],
                },
                expiryDate: {
                    required: true,
                },
                issuingCountry: {
                   required: true,
                },

                okuCardNum: {
                    required: true,
                     digits: true,
                     rangelength: [10, 11],
                 },

                 okuFile: {
                    required: {
                        depends: function(element) {
                            return $(element).prop("readonly") === false;
                        }
                    }
                },
            },

            messages: {
                firstName: {
                    required: "Please Insert First Name",
                },
                lastName: {
                    required: "Please Insert Last Name",
                },
                DOB: "Please Insert Date Of Birth",
                age: "Please Insert Age",
                relationship: "Please Choose Relationship",
                address1: "Please Insert Address 1",
                postcode: {
                    required: "Please Insert Postcode",
                },
                city: "Please Insert City",
                state: "Please Choose State",
                country: "Please Choose Country",
                idNo: {
                    required: "Please Insert New Identification Number",
                    digits: "Please Insert Correct Identification Number Without ' - ' or Space",
                    rangelength: "Please Insert Valid Identification Number",
                },
                oldIDNo: {
                    rangelength: "Please Insert Valid Old Identification Number",
                },
                contactNo: {
                    required: "Please Insert Contact Number",
                    digits: "Please Insert Valid Phone Number",

                    rangelength: [10, 11],
                },
                expiryDate: {
                    required: "Please Insert Expiry Date",
                },
                issuingCountry: {
                    required: "Please Choose Issuing Country",
                },
                okuCardNum: {
                    required: "Please Insert OKU Card Number",
                    digits: "Please Insert Valid OKU Card Number",
                    rangelength: "Please Insert Valid OKU Card Number",
                },

                okuFile: {
                    required: "Please Upload OKU Attachment",
                },
            },

            errorPlacement: function(error, element) {
                if (element.attr("name") === "country") {
                    error.insertAfter("#countryP1-err");
                } else if (element.attr("name") === "state") {
                    error.insertAfter("#stateP1-err");
                } else if (element.attr("name") === "city") {
                    error.insertAfter("#cityP1-err");
                } else if (element.attr("name") === "postcode") {
                    error.insertAfter("#postcodeP1-err");
                } else {
                    error.insertAfter(element);
                }
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
                                document.getElementById("editParentForm")
                            );

                            $.ajax({
                                type: "POST",
                                url: "/updateParent",
                                data: data,
                                dataType: "json",

                                processData: false,
                                contentType: false,
                            }).then(function (data) {
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

    parentId = $("#parentId").val();
    parentIds = parentId.split(",");
    for (let i = 0; i < parentIds.length; i++) {
        const type = parentIds[i];
        $(document).on("click","#parentModalEdit" + type, function (e) {
            // $("#expiryDateParentEdit").val("").prop("disabled", true);
            // $("#issuingCountryParentEdit").val("").prop("disabled", true);

            id = $(this).data("id");
            var ParentData = getParent(id);

            ParentData.then(function (data) {
                parent = data.data;
                console.log(parent);
                $("#DOBP1").val(parent.DOB);
                $("#idP").val(parent.id);
                $("#address2P1").val(parent.address2);
                $("#address1P1").val(parent.address1);
                $("#cityP1").val(parent.city);
                $("#contactNoP1").val(parent.contactNo);
                $("#passportparentedit").val(parent.passport);
                $("#expiryDateParentEdit").val(parent.expiryDate);
                $("#issuingCountryParentEdit").val(parent.issuingCountry);
                $("#genderP1").val(parent.gender);
                $("#firstNamesP1").val(parent.firstName);
                $("#postcodeP1").val(parent.postcode);
                $("#lastNamesP1").val(parent.lastName);
                $("#fullNameP1").val(parent.fullName);
                $("#countryP1").val(parent.country).select2({
                    placeholder: 'PLEASE CHOOSE',
                    allowClear: true,
                    dropdownParent: $('#editparentmodal'),
                });
                $("#postcodeP1").val(parent.postcode).select2({
                    placeholder: 'PLEASE CHOOSE',
                    allowClear: true,
                    dropdownParent: $('#editparentmodal'),
                });
                if (parent.okuFile) {
                    $("#okuAttachmentViewParent").html(
                        '<a href="/storage/' + parent.okuFile + '" target="_blank">here</a>'
                    );
                }
                $("#idnumber7").val(parent.idNo);
                if (parent.idFile) {
                    $("#idAttachmentViewParent").html(
                        '<a href="/storage/' + parent.idFile + '" target="_blank">here</a>'
                    );
                }
                $("#oldIDNoP1").val(parent.oldIDNo);
                $("#relationshipP1").val(parent.relationship);
                if (parent.non_citizen == "on") {
                    $("#non_citizen").prop("checked", true);
                    $("#idnumber7").prop("disabled", true);
                    $("#idnumber7").prop("readonly", true);

                    $("#age7").prop("readonly", false);
                    $("#age7").css("pointer-events", "auto");

                    $("#DOBP1").prop("readonly", false);
                    $("#DOBP1").css("pointer-events", "auto");
                } else {
                    $("#non_citizen").prop("checked", false);
                    $("#idnumber7").prop("disabled", false);
                    $("#idnumber7").prop("readonly", false);

                    $("#age7").prop("readonly", true);
                    $("#age7").css("pointer-events", "auto");

                    $("#DOBP1").prop("readonly", true);
                    $("#DOBP1").css("pointer-events", "auto");
                }
                if (parent.oku_status == "on") {
                $("#oku_status").prop("checked", true);
                $("#okucard6").prop("readonly", false);
                $("#okucard6").prop("disabled", false);
                $("#okucard6").val(parent.okuCardNum);

                $("#okuattach6").prop("readonly", true);
                $("#okuattach6").css("pointer-events", "auto");
                } else {
                $("#oku_status").prop("checked", false);

                $("#okucard6").prop("disabled", true);
                $("#okucard6").prop("readonly", true);
                $("#okucard6").val();

                $("#okuattach6").prop("readonly", true);
                $("#okuattach6").css("pointer-events", "none");
                }
            });
            $("#edit-parent").modal("show");
        });

        $("#parentModalView" + type).click(function (e) {
            id = $(this).data("id");
            var ParentData = getParent(id);
            dd(id);
            $("input").prop("disabled", true);
            $("select").prop("disabled", true);

            ParentData.then(function (data) {
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

        $(document).on("click","#deleteParent" + type, function (e) {
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

    //show password
    $(document).ready(function () {
        // Function to toggle password visibility
        function togglePasswordVisibility(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const passwordIcon = document.getElementById(iconId);

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                passwordIcon.classList.remove("fa-eye-slash");
                passwordIcon.classList.add("fa-eye");
            } else {
                passwordInput.type = "password";
                passwordIcon.classList.remove("bi-eye");
                passwordIcon.classList.add("fa-eye-slash");
            }
        }

        // Toggle password visibility when the eye icon is clicked
        $("#show-current-password").click(function () {
            togglePasswordVisibility("current_password", "current-password-toggle");
        });

        $("#show-password").click(function () {
            togglePasswordVisibility("password", "password-toggle");
        });

        $("#show-confirm-password").click(function () {
            togglePasswordVisibility("confirm_password", "confirm-password-toggle");
        });
    });

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
                        url: "/updatePass",
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

    var checkboxes = $('input[name="address_type[]"]');

    var permanentChecked = false;
    var correspondentChecked = false;
    var addressId = null;
    var addressType = "0";

    checkboxes.each(function () {
        if ($(this).is(":checked")) {
            if ($(this).val() === "permanent") {
                permanentChecked = true;
            } else if ($(this).val() === "correspondent") {
                correspondentChecked = true;
            }
            if (addressId == null) {
                addressId = $(this).data("address-id");
                addressType = $(this).data("address-type");
            }
        }
    });

    if (permanentChecked && correspondentChecked) {
        if (checkboxes.filter('[data-address-id="' + addressId + '"]:checked').length === 2) {
            addressType = "3";
        }
        checkboxes.not(":checked").prop("disabled", true);
    } else if (permanentChecked) {
        addressType = "1";
        checkboxes.filter('[value="permanent"]:not(:checked)').prop("disabled", true);
        checkboxes.filter('[value="correspondent"]').prop("disabled", false);
    } else if (correspondentChecked) {
        addressType = "2";
        checkboxes.filter('[value="correspondent"]:not(:checked)').prop("disabled", true);
        checkboxes.filter('[value="permanent"]').prop("disabled", false);
    } else {
        addressType = "0";
        checkboxes.prop("disabled", false);
    }

    $(document).on("change", 'input[name="address_type[]"]', function () {
        var permanentChecked = false;
        var correspondentChecked = false;
        var addressId = $(this).data("address-id");
        var addressType = $(this).is(":checked")
            ? $(this).data("address-type")
            : "0";

        var checkboxes = $('input[name="address_type[]"][data-address-id="' + addressId + '"]');

        checkboxes.each(function () {
            if ($(this).is(":checked")) {
                if ($(this).val() === "permanent") {
                    permanentChecked = true;
                    checkboxes.prop("disabled", true);
                } else if ($(this).val() === "correspondent") {
                    correspondentChecked = true;
                    checkboxes.prop("disabled", true);
                }
            }
        });

        if (permanentChecked == true && correspondentChecked == false) {
            addressType = "1";
        } else if (permanentChecked == false && correspondentChecked == true) {
            addressType = "2";
        } else if (permanentChecked == true && correspondentChecked == true) {
            addressType = "3";
        } else if (permanentChecked == false && correspondentChecked == false) {
            addressType = "0";
        }

            $.ajax({
                url: "/updateAddressDetails",
                type: "POST",
                data: {
                    id: addressId,
                    addressType: addressType,
                },
                success: function (data) {
                    Swal.fire({
                        icon: "success",
                        text: "Address Type is updated!",
                        title: "Success!",
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK",
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                    }).then(function () {
                        location.reload();
                    });


                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error(errorThrown);
                },
        	});
        });

        addressId = $("#addressId").val();

        addressIds = addressId.split(",");

        for (let i = 0; i < addressIds.length; i++) {
            const type = addressIds[i];

            $("#updateAddressDetails" + type).click(function (e) {
                id = $(this).data("id");
                var addressData = getAddressDetails(id);

                addressData.then(function (data) {
                    address = data.data;
                    $("#id1").val(address.id);
                    $("#address1Edit").val(address.address1);
                    $("#address2Edit").val(address.address2);
                    $("#postcode_idedit").val(address.postcode);
                    $("#city_idedit").val(address.city);
                    $("#state_idedit").val(address.state);
                    $("#country_idedit").val(address.country);

                    $("#postcode_idedit").val(address.postcode).select2({
                        placeholder: 'PLEASE CHOOSE',
                        allowClear: true,
                        dropdownParent: $('#modaleditaddress'),
                    });
                    $("#country_idedit").val(address.country).select2({
                        placeholder: 'PLEASE CHOOSE',
                        allowClear: true,
                        dropdownParent: $('#modaleditaddress'),
                    });
                });
                $("#modaleditaddress").modal("show");
            });

            $("#deleteAddressDetails" + type).click(function (e) {
                id = $(this).data("id");

                requirejs(["sweetAlert2"], function (swal) {
                    swal({
                        title: "Are you sure to delete Address?",
                        type: "error",
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Yes!",
                        showCancelButton: true,
                    }).then(function () {
                        $.ajax({
                            type: "POST",
                            url: "/deleteAddressDetails/" + id,
                            data: { _method: "DELETE" },
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
                                    location.reload();
                                }
                            });
                        });
                    });
                });
            });

            function getAddressDetails(id) {
                return $.ajax({
                    url: "/getAddressDetails/" + id,
                });
            }
        }
});

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$("#same-address").change(function () {
    if (this.checked) {
        $("#address-1c").val($("#address-1").val()).prop("readonly", true);
        $("#address-2c").val($("#address-2").val()).prop("readonly", true);
        $("#postcodec").val($("#postcode").val()).prop("readonly", true);
        $("#cityc").val($("#city").val()).prop("readonly", true);
        $("#statec").val($("#state").val()).css({ "pointer-events": "none", background: "#e9ecef" });
        $("#countryc").val($("#country").val()).css({ "pointer-events": "none", background: "#e9ecef" });

        // Fetch permanent address from userAddress table if available
        var id = "{{ $user->id }}";

        getAddressforCompanion(id)
            .then(function (data) {
                if (data) {
                    var permanentAddress1 = data.data.address1;
                    var permanentAddress2 = data.data.address2;
                    var permanentPostcode = data.data.postcode;
                    var permanentCity = data.data.city;
                    var permanentState = data.data.state_name;
                    var permanentCountry = data.data.country_name;

                    if (
                        permanentAddress1 ||
                        permanentAddress2 ||
                        permanentPostcode ||
                        permanentCity ||
                        permanentState ||
                        permanentCountry
                    ) {
                        $("#address-1c").val(permanentAddress1);
                        $("#address-2c").val(permanentAddress2);
                        $("#postcodec").val(permanentPostcode);
                        $("#cityc").val(permanentCity);
                        $("#statec").val(permanentState);
                        $("#countryc").val(permanentCountry);

                        $("#postcodec").append('<option value="' + permanentPostcode + '" selected>' + permanentPostcode + '</option>');
                        $("#cityc").append('<option value="' + permanentCity + '" selected>' + permanentCity + '</option>');
                        $("#statec").append('<option value="' + permanentState + '" selected>' + permanentState + '</option>');
                        $("#countryc").append('<option value="' + permanentCountry + '" selected>' + permanentCountry + '</option>');
                    }
                }
            })
            .fail(function (xhr, status, error) {
                console.log("Error fetching permanent address: " + error);
            });
    } else {
        $("#address-1c").prop("readonly", false).val("");
        $("#address-2c").prop("readonly", false).val("");
        $("#postcodec").prop("readonly", false).val("");
        $("#cityc").prop("readonly", false).val("");
        $("#statec").css({ "pointer-events": "auto", background: "none" }).val("");
        $("#countryc").css({ "pointer-events": "auto", background: "none" }).val("");

        $("#postcodec").append('<option value="' + permanentPostcode + '" selected>' + permanentPostcode + '</option>');
        $("#cityc").append('<option value="' + permanentCity + '" selected>' + permanentCity + '</option>');
        $("#statec").append('<option value="' + permanentState + '" selected>' + permanentState + '</option>');
        $("#countryc").append('<option value="' + permanentCountry + '" selected>' + permanentCountry + '</option>');
    }
});

$("#same-address2").change(function () {
    if (this.checked) {

        $("#address1parent").val($("#address-1").val()).prop("readonly", true);
        $("#address2parent").val($("#address-2").val()).prop("readonly", true);
        // $("#postcodeparent").val($("#postcode").val()).prop("readonly", true);
        // $("#cityparent").val($("#city").val()).prop("readonly", true);
        $("#postcodeparent").val($("#postcode").val()).css({ "pointer-events": "none", background: "#e9ecef" });
        $("#cityparent").val($("#city").val()).css({ "pointer-events": "none", background: "#e9ecef" });

        $("#stateparent").val($("#state").val()).css({ "pointer-events": "none", background: "#e9ecef" });
        $("#countryparent").val($("#country").val()).css({ "pointer-events": "none", background: "#e9ecef" });

        var id = "{{ $user->id }}";
        getAddressforCompanion(id)
            .then(function (data) {
                if (data) {
                        console.log(data);

                    var permanentAddress1 = data.data.address1;
                    var permanentAddress2 = data.data.address2;
                    var permanentPostcode = data.data.postcode;
                    var permanentCity = data.data.city;
                    var permanentState = data.data.state_name;
                    var permanentCountry = data.data.country_name;
                    console.log(data);

                    if (
                        permanentAddress1 ||
                        permanentAddress2 ||
                        permanentPostcode ||
                        permanentCity ||
                        permanentState ||
                        permanentCountry
                    ) {

                        $("#address1parent").val(permanentAddress1);
                        $("#address2parent").val(permanentAddress2);
                        $("#postcodeparent").val(permanentPostcode);
                        $("#cityparent").val(permanentCity);
                        $("#stateparent").val(permanentState);
                        $("#stateparenthidden").val(permanentState);
                        $("#countryparent").val(permanentCountry);
                        $("#countryparenthidden").val(permanentCountry);

                        $("#postcodeparent").append('<option value="' + permanentPostcode + '" selected>' + permanentPostcode + '</option>');
                        $("#cityparent").append('<option value="' + permanentCity + '" selected>' + permanentCity + '</option>');
                        $("#stateparent").append('<option value="' + permanentState + '" selected>' + permanentState + '</option>');
                        $("#countryparent").append('<option value="' + permanentCountry + '" selected>' + permanentCountry + '</option>');
                    }
                }
            })
            .fail(function (xhr, status, error) {
                console.log("Error fetching permanent address: " + error);
            });
    } else {
        $("#address1parent").val($("").val()).prop("readonly", false);
        $("#address2parent").val($("").val()).prop("readonly", false);
        // $("#postcodeparent").val($("").val()).prop("readonly", false);
        // $("#cityparent").val($("").val()).prop("readonly", false);
        $("#postcodeparent").css({ "pointer-events": "auto", background: "none" }).val("");
        $("#cityparent").css({ "pointer-events": "auto", background: "none" }).val("");

        $("#stateparent").css({ "pointer-events": "auto", background: "none" }).val("");
        // $("#stateparent").css({ "pointer-events": "auto", background: "" });

        $("#countryparent").css({ "pointer-events": "auto", background: "none" }).val("");
        // $("#countryparent").css({ "pointer-events": "auto", background: "" });
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
        $("#countryP").val($("").val()).prop("disabled", false);
    }
});
    $("#stateEmc").next(".select2-container--default").find(".select2-selection--single").css({
        "pointer-events": "none",
        "background-color": "#e9ecef"
    });
    $("#cityEmc").next(".select2-container--default").find(".select2-selection--single").css({
        "pointer-events": "none",
        "background-color": "#e9ecef"
    });
    $("#postcodeEmc").next(".select2-container--default").find(".select2-selection--single").css({
        "pointer-events": "none",
        "background-color": "#e9ecef"
    });


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

$("#same-addressUC").change(function () {
    if (this.checked) {
        $("#address1UC").val($("#address-1").val()).prop("readonly", true);
        $("#address2UC").val($("#address-2").val()).prop("readonly", true);
        $("#postcodeUC").val($("#postcode").val()).prop("readonly", true);
        $("#cityUC").val($("#city").val()).prop("readonly", true);
        // $("#stateUC").val($("#state").val()).prop("disabled", true);
        $("#stateUC").val($("#state").val()).css({ "pointer-events": "none", background: "#e9ecef" });

        $("#countryUC").val($("#country").val()).prop("disabled", true);
        $('#idInput{{$companion->id}}').attr('type', 'text');

        // Fetch permanent address from userAddress table if available
        var id = "{{ $user->id }}";

        getAddressforCompanion(id)
            .then(function (data) {
                if (data) {
                    var permanentAddress1 = data.data.address1;
                    var permanentAddress2 = data.data.address2;
                    var permanentPostcode = data.data.postcode;
                    var permanentCity = data.data.city;
                    var permanentState = data.data.state_name;
                    var permanentCountry = data.data.country_name;
                    console.log(data);

                    if (
                        permanentAddress1 ||
                        permanentAddress2 ||
                        permanentPostcode ||
                        permanentCity ||
                        permanentState ||
                        permanentCountry
                    ) {
                        $("#address1UC").val(permanentAddress1);
                        $("#address2UC").val(permanentAddress2);
                        $("#postcodeUC").val(permanentPostcode);
                        $("#cityUC").val(permanentCity);
                        $("#stateUC").val(permanentState);
                        $("#countryUC").val(permanentCountry);

                        $("#postcodeUC").append('<option value="' + permanentPostcode + '" selected>' + permanentPostcode + '</option>');
                        $("#cityUC").append('<option value="' + permanentCity + '" selected>' + permanentCity + '</option>');
                        $("#stateUC").append('<option value="' + permanentState + '" selected>' + permanentState + '</option>');
                        $("#countryUC").append('<option value="' + permanentCountry + '" selected>' + permanentCountry + '</option>');
                    }
                }
            })
            .fail(function (xhr, status, error) {
                console.log("Error fetching permanent address: " + error);
            });
        } else {
            $("#address1UC").prop("readonly", false).val("");
            $("#address2UC").prop("readonly", false).val("");
            $("#postcodeUC").prop("readonly", false).val("");
            $("#cityUC").prop("readonly", false).val("");
            // $("#stateUC").prop("disabled", false).val("");
            $("#countryUC").prop("disabled", false).val("");
            $("#stateUC").css({ "pointer-events": "auto", background: "none" }).val("");

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
        $("#countryEmc").next(".select2-container--default").find(".select2-selection--single").css({
            "pointer-events": "auto",
            "background-color": "#ffffff"
        });
        $("#countryEmc").val("").trigger('change').prop("readonly", false);
        $("#stateEmc").next(".select2-container--default").find(".select2-selection--single").css({
            "pointer-events": "auto",
            "background-color": "#ffffff"
        });
        $("#stateEmc").val("").trigger('change').prop("readonly", false);
        $("#cityEmc").next(".select2-container--default").find(".select2-selection--single").css({
            "pointer-events": "auto",
            "background-color": "#ffffff"
        });
        $("#cityEmc").val("").trigger('change').prop("readonly", false);
        $("#postcodeEmc").next(".select2-container--default").find(".select2-selection--single").css({
            "pointer-events": "auto",
            "background-color": "#ffffff"
        });
        $("#postcodeEmc").val("").trigger('change').prop("readonly", false);
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
        $("#countryEmc")
        .next(".select2-container--default")
        .find(".select2-selection--single")
        .css({
            "pointer-events": "none",
            "background-color": "#e9ecef"
        })
        .end()
        $("#countryEmc").val(null).trigger('change').prop("readonly", true);
        $("#stateEmc")
        .next(".select2-container--default")
        .find(".select2-selection--single")
        .css({
            "pointer-events": "none",
            "background-color": "#e9ecef"
        })
        .end()
        $("#stateEmc").val(null).trigger('change').prop("readonly", true);
        $("#cityEmc")
        .next(".select2-container--default")
        .find(".select2-selection--single")
        .css({
            "pointer-events": "none",
            "background-color": "#e9ecef"
        })
        .end()
        $("#cityEmc").val(null).trigger('change').prop("readonly", true);
        $("#postcodeEmc")
        .next(".select2-container--default")
        .find(".select2-selection--single")
        .css({
            "pointer-events": "none",
            "background-color": "#e9ecef"
        })
        .end()
        $("#postcodeEmc").val(null).trigger('change').prop("readonly", true);
        $("#payslipmc").prop("readonly", true);
    }
});

$(".partCheckEditCompanion").click(function () {
    if ($(this).prop("checked")) {
        $("#designationCEdit").prop("disabled", false);
        $("#companyNameCEdit").prop("readonly", false);
        $("#dateJoinedCEdit").prop("readonly", false);
        //$("#dateJoinedmc").prop("disabled", false);
        $("#income-tax-numberCEdit").prop("readonly", false);
        $("#payslipCEdit").prop("disabled", false);
        $("#extension-number").prop("readonly", false);
        $("#officeNoCEdit").prop("readonly", false);
        $("#address1CEdit").prop("readonly", false);
        $("#address2CEdit").prop("readonly", false);
        $("#countryCEdit").next(".select2-container--default").find(".select2-selection--single").css({
            "pointer-events": "auto",
            "background-color": "#ffffff"
        });
        $("#countryCEdit").val("").trigger('change').prop("readonly", false);;
        $("#stateCEdit").next(".select2-container--default").find(".select2-selection--single").css({
            "pointer-events": "auto",
            "background-color": "#ffffff"
        });
        $("#stateCEdit").val("").trigger('change').prop("readonly", false);;
        $("#cityCEdit").next(".select2-container--default").find(".select2-selection--single").css({
            "pointer-events": "auto",
            "background-color": "#ffffff"
        });
        $("#cityCEdit").val("").trigger('change').prop("readonly", false);;
        $("#postcodeCEdit").next(".select2-container--default").find(".select2-selection--single").css({
            "pointer-events": "auto",
            "background-color": "#ffffff"
        });
        $("#postcodeCEdit").val("").trigger('change').prop("readonly", false);
        $("#payslipCEdit").prop("readonly", false);
    } else {
        $("#designationCEdit").val("").prop("disabled", true);
        $("#companyNameCEdit").val("").prop("readonly", true);
        $("#dateJoinedCEdit").val("").prop("readonly", true);
        //$("#dateJoinedmc").prop("disabled", true);
        $("#payslipCEdit").val("").prop("disabled", true);
        $("#income-tax-numberCEdit").val("").prop("readonly", true);
        $("#extension-number").val("").prop("readonly", true);
        $("#officeNoCEdit").val("").prop("readonly", true);
        $("#address1CEdit").val("").prop("readonly", true);
        $("#address2CEdit").val("").prop("readonly", true);
        $("#countryCEdit")
        .next(".select2-container--default")
        .find(".select2-selection--single")
        .css({
            "pointer-events": "none",
            "background-color": "#e9ecef"
        })
        .end()
        $("#countryCEdit").val(null).trigger('change').prop("readonly", true);
        $("#stateCEdit")
        .next(".select2-container--default")
        .find(".select2-selection--single")
        .css({
            "pointer-events": "none",
            "background-color": "#e9ecef"
        })
        .end()
        $("#stateCEdit").val(null).trigger('change').prop("readonly", true);
        $("#cityCEdit")
        .next(".select2-container--default")
        .find(".select2-selection--single")
        .css({
            "pointer-events": "none",
            "background-color": "#e9ecef"
        })
        .end()
        $("#cityCEdit").val(null).trigger('change').prop("readonly", true);
        $("#postcodeCEdit")
        .next(".select2-container--default")
        .find(".select2-selection--single")
        .css({
            "pointer-events": "none",
            "background-color": "#e9ecef"
        })
        .end()
        $("#postcodeCEdit").val(null).trigger('change').prop("readonly", true);
        $("#payslipCEdit").val("").prop("readonly", true);
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

$("#same-addressEditParent").change(function () {
    if (this.checked) {
        $("#address1P1").val($("#address-1").val()).prop("readonly", true);
        $("#address2P1").val($("#address-2").val()).prop("readonly", true);
        $("#postcodeP1").val($("#postcode").val()).prop("readonly", true);
        $("#cityP1").val($("#city").val()).prop("readonly", true);
        $("#stateP1").val($("#state").val()).prop("readonly", true);
        $("#stateP1").css({
            "pointer-events": "none",
            background: "#e9ecef"
        });

        $("#countryP1").val($("#country").val()).prop("readonly", true);
        $("#countryP1").css({
            "pointer-events": "none",
            background: "#e9ecef",
        });

        // Fetch permanent address from userAddress table if available
        var id = "{{ $user->id }}";
        getAddressforCompanion(id)
            .then(function (data) {
                if (data) {
                    var permanentAddress1 = data.data.address1;
                    var permanentAddress2 = data.data.address2;
                    var permanentPostcode = data.data.postcode;
                    var permanentCity = data.data.city;
                    var permanentState = data.data.state_name;
                    var permanentCountry = data.data.country_name;

                    if (
                        permanentAddress1 ||
                        permanentAddress2 ||
                        permanentPostcode ||
                        permanentCity ||
                        permanentState ||
                        permanentCountry
                    ) {
                        $("#address1P1").val(permanentAddress1);
                        $("#address2P1").val(permanentAddress2);
                        $("#postcodeP1").val(permanentPostcode);
                        $("#cityP1").val(permanentCity);
                        $("#stateP1").val(permanentState);
                        $("stateeditparenthidden").val(permanentState);
                        $("#countryP1").val(permanentCountry);
                        $("countryeditparenthidden").val(permanentCountry);

                        $("#postcodeP1").append('<option value="' + permanentPostcode + '" selected>' + permanentPostcode + '</option>');
                        $("#cityP1").append('<option value="' + permanentCity + '" selected>' + permanentCity + '</option>');
                        $("#stateP1").append('<option value="' + permanentState + '" selected>' + permanentState + '</option>');
                        $("#countryP1").append('<option value="' + permanentCountry + '" selected>' + permanentCountry + '</option>');
                    }
                }
            })
            .fail(function (xhr, status, error) {
                console.log("Error fetching permanent address: " + error);
            });
    } else {
        $("#address1P1").prop("readonly", false);
        $("#address2P1").prop("readonly", false);
        $("#postcodeP1").prop("readonly", false);
        $("#cityP1").prop("readonly", false);
        $("#stateP1").prop("readonly", false);
        $("#stateP1").css({ "pointer-events": "auto", background: "" });
        $("#countryP1").prop("readonly", false);
        $("#countryP1").css({ "pointer-events": "auto", background: "" });
    }
});

function getAddressforCompanion(id) {
    return $.ajax({
        url: "/getAddressforCompanion/" + id,
    });
}

// Initialize the datepicker for the to date
$("#datepicker-todate")
    .datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy-mm-dd",
    })
    .on("changeDate", function (e) {
        // Get the from date
        var fromDate = $("#datepicker-fromdate").datepicker("getDate");

        // Get the to date
        var toDate = e.date;

        // Compare the dates
        if (toDate < fromDate) {
            alert("To date cannot be before from date!");
            $(this).datepicker("setDate", fromDate);
        }
    });

//   oku checkbox myprofile
$(".okuCheck").click(function () {
    if ($(this).prop("checked")) {
        $("#okucard").val("").prop("disabled", false);

        $("#okuattach").prop("disabled", false);
        $("#okuattach").css("pointer-events", "auto");
    } else {
        $("#okucard").val("").prop("disabled", true);

        $("#okuattach").prop("disabled", true);
        $("#okuattach").css("pointer-events", "none");
    }
});

//$(this).data('okuStatus', okuStatus);

//oku check companion
$(".okuCheck1").click(function () {
    if ($(this).prop("checked")) {
        $("#okucard1").prop("readonly", false);
        $("#okuattach1").css("pointer-events", "auto");
        $("#okucard1").prop("disabled", false);

        $("#okuattach1").prop("disabled", false);
        okuStatus = 1;
    } else {
        $("#okucard1").prop("readonly", true);
        $("#okuattach1").css("pointer-events", "none");

        $("#okucard1").val("").prop("disabled", true);

        $("#okuattach1").val("").prop("disabled", true);
        okuStatus = 0;
    }
});

//oku check update companion
$(".okuCheck2").click(function () {
    if ($(this).prop("checked")) {
        $("#okucard2").prop("readonly", false);
        $("#okucard2").prop("disabled", false);

        $("#okuattach2").css("pointer-events", "auto");
        $("#okuattach2").prop("disabled", false);
        $("#okuattach2").prop("readonly", false);

        okuStatus = 1;
    } else {
        $("#okucard2").prop("readonly", true);
        $("#okucard2").prop("disabled", true);

        $("#okuattach2").css("pointer-events", "none");
        $("#okuattach2").prop("disabled", true);
        $("#okuattach2").prop("readonly", true);

        okuStatus = 0;
    }
});

//oku check add children
$(".okuCheck3").click(function () {
    if ($(this).prop("checked")) {
        $("#okucard3").prop("readonly", false);

        $("#okuattach3").prop("readonly", false);
        $("#okuattach3").css("pointer-events", "auto");
        okuStatus = 1;
    } else {
        $("#okucard3").prop("readonly", true);

        $("#okuattach3").prop("readonly", true);
        $("#okuattach3").css("pointer-events", "none");
        okuStatus = 0;

    }
});

//oku check update children
$(".okuCheck4").click(function () {
    if ($(this).prop("checked")) {
        $("#okucard4").prop("readonly", false);
        $("#okucard4").prop("disabled", false);

        $("#okuattach4").prop("readonly", false);
        $("#okuattach4").css("pointer-events", "auto");
    } else {
        $("#okucard4").prop("readonly", true);
        $("#okucard4").prop("disabled", true);
        $("#okucard4").val("");

        $("#okuattach4").prop("readonly", true);
        $("#okuattach4").css("pointer-events", "none");
    }
});

//oku check add family
$(".okuCheck5").click(function () {
    if ($(this).prop("checked")) {
        $("#okucard5").prop("readonly", false);
        $("#okucard5").prop("disabled", false);

        $("#okuattach5").prop("disabled", false);
        $("#okuattach5").prop("readonly", false);

        $("#okuattach5").css("pointer-events", "auto");
        // okuStatus = 1;
    } else {
        $("#okucard5").prop("readonly", true);
        $("#okucard5").prop("disabled", true);

        $("#okuattach5").prop("disabled", true);
        $("#okuattach5").prop("readonly", true);
        $("#okuattach5").css("pointer-events", "none");
        // okuStatus = 0;
    }
});

//oku check edit family
$(".okuCheck6").click(function () {
    if ($(this).prop("checked")) {
        $("#okucard6").prop("readonly", false);
        $("#okucard6").prop("disabled", false);

        $("#okuattach6").prop("readonly", false);
        $("#okuattach6").css("pointer-events", "auto");
    } else {
        $("#okucard6").prop("readonly", true);
        $("#okucard6").prop("disabled", true);
        $("#okucard6").val("");

        $("#okuattach6").prop("readonly", true);
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

//CHILDREN ADD INFO
$("#idNoaddChild").change(function () {
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

$("#idNoaddChild").change(function () {
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
$("#idNoaddFamily").change(function () {
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

$("#idNoaddFamily").change(function () {
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


// ENABLE EXPIRY AND ISSUING COUNTRY
$("#passportUpdateCompanion").change(function () {
    if ($("#passportUpdateCompanion").val() !== "") {
        // Enable expiration date and passport country fields
        $("#expiryDateUpdateCompanion").prop("disabled", false);
        $("#expiryDateUpdateCompanion").css("pointer-events", "auto");

        $("#issuingCountryUpdateCompanion").prop("disabled", false);
        $("#issuingCountryUpdateCompanion").css("pointer-events", "auto");
    } else {
        // Disable expiration date and passport country fields
        $("#expiryDateUpdateCompanion").prop("disabled", true);
        $("#expiryDateUpdateCompanion").css("pointer-events", "none");
        $("#expiryDateUpdateCompanion").val("");

        $("#issuingCountryUpdateCompanion").prop("disabled", true);
        $("#issuingCountryUpdateCompanion").css("pointer-events", "none");
        $("#issuingCountryUpdateCompanion").val("");
    }
});

//ADD FAMILY DETAILS
$(".partCheck8").click(function () {
    if ($(this).prop("checked")) {
        $("#idNoaddFamily").prop("disabled", true);
        $("#idNoaddFamily").prop("readonly", true);
        $("#idNoaddFamily").val("");

        $("#dob6").val("").prop("readonly", false);
        $("#dob6").css("pointer-events", "auto");

        $("#age6").val("").prop("readonly", false);

        // $("#passportcountryparent").prop("disabled", false);
        // $("#passportcountryparent").prop("readonly", false);
    } else {
        $("#idNoaddFamily").prop("disabled", false);
        $("#idNoaddFamily").prop("readonly", false);

        $("#dob6").val("").prop("readonly", true);
        $("#dob6").css("pointer-events", "none");

        $("#age6").prop("readonly", true);
        // $("#passportParent").val("");
        // $("#passportcountryparent").prop("disabled", true);
        // $("#passportcountryparent").val("");
        // $("#passportcountryparent").prop("readonly", true);
        // $("#passportcountryparent").css("pointer-events", "none");
    }
});


    //UPDATE FAMILY DETAILS

    $(".partCheck9").click(function () {
        if ($(this).prop("checked")) {
            $("#idnumber7").prop("disabled", true);
            $("#idnumber7").prop("readonly", true);
            $("#idnumber7").val("");

            $("#DOBP1").val("").prop("readonly", false);
            $("#DOBP1").css("pointer-events", "auto");

            $("#age7").val("").prop("readonly", false);
            $("#age7").css("pointer-events", "auto");
        } else {
            $("#idnumber7").prop("disabled", false);
            $("#idnumber7").prop("readonly", false);

            $("#DOBP1").val("").prop("readonly", true);
            $("#DOBP1").css("pointer-events", "none");

            $("#age7").val("").prop("readonly", true);
            $("#age7").css("pointer-events", "none");
        }
    });
