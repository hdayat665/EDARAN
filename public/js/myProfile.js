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

    if($(".partCheck").is(":checked")){
        $("#idnumber").prop("disabled", true);
        $("#dob").prop("readonly", false);
        $("#dob").css("pointer-events", "auto");
        $("#idnumber").val("");
        $("#gendermyprofile").prop("disabled", false);
    } else {
        $("#idnumber").prop("disabled", false);
        $("#dob").prop("readonly", true);
        $("#dob").css("pointer-events", "auto");
        $("#gendermyprofile").prop("disabled", true);
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

    if($(".okuCheck").is(":checked")){
        $("#okucard").prop("disabled", false);
        $("#okuattach").prop("disabled", false);      
        $("#okuattach").css("pointer-events", "auto");
    } else {
        $("#okucard").val('').prop("disabled", true);
        $("#okuattach").prop("disabled", true);
        $("#okuattach").css("pointer-events", "none");
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

    // var nonCitizenCheckbox = $('#nonNetizen');
    // var idInput = $('#idnumber');
    
    // if (nonCitizenCheckbox.prop('checked')) {
    //     idInput.prop('disabled', true);
    // }

    // nonCitizenCheckbox.change(function() {
    //     if (this.checked) {
    //     idInput.prop('disabled', true);
    //     } else {
    //     idInput.prop('disabled', false);
    //     }
    // });

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
            $("#issuingCountryAddCompanion").prop("disabled", false);
            $("#issuingCountryAddCompanion").css("pointer-events", "auto");
        } else {
            $("#expirydatemc").prop("readonly", true);
            $("#expirydatemc").css("pointer-events", "none");
            $("#expirydatemc").val("");
            $("#issuingCountryAddCompanion").prop("disabled", false);
            $("#issuingCountryAddCompanion").css("pointer-events", "auto");
            $("#issuingCountryAddCompanion").val("");
        }
    });

    // $('#fileupload').on('change', function() {
    //     var files = $(this).get(0).files;
    //     if (files.length > 0) {
    //         var filename = files[0].name;
    //         $('#filename').html(filename);
    //     } else {
    //         $('#filename').empty();
    //     }
    // });

    $('input[name="nonCitizen"]').click(function() {
        if ($(this).is(':checked')) {
            $('#idnumber2').val('').prop('disabled', true);
            $("#gendermyprofile").prop("disabled", false);
            $('#ageAddCompanion').val('').prop('readonly', false);
            $('#dobAddCompanion').val('').prop('readonly', false);


        } else {
            $('#idnumber2').prop('disabled', false);
            $('#gendermyprofile').prop('disabled', true);
            $('#ageAddCompanion').val('').prop('readonly', true);
            $('#dobAddCompanion').val('').prop('readonly', true);
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

    $('input[name="nonCitizen"]').click(function() {
        if ($(this).is(':checked')) {
            $('#idNoaddChild').val('').prop('disabled', true);
            $('#age4').val('').prop('readonly', false);
            $('#dob4').val('');
            $("#passportcountrychildren").prop('disabled', false);

            $("#expiryDateChild").prop('disabled', false);


        } else {
            $('#idNoaddChild').prop('disabled', false);
            $('#age4').val('').prop('readonly', true);
            $('#dob4').val('');
            
            $("#passportcountrychildren").prop('disabled', true);

            $("#expiryDateChild").prop('disabled', true);

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
            $("#passportcountrychildren").prop("disabled", false);
            $("#passportcountrychildren").css("pointer-events", "auto");
        } else {
            $("#expiryDateChild").prop("readonly", true);
            $("#expiryDateChild").css("pointer-events", "none");
            $("#expiryDateChild").val("");
            $("#passportcountrychildren").prop("disabled", true);
            $("#passportcountrychildren").css("pointer-events", "none")
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
        if ($("#expiryDate1").prop("readonly")) {
            $("#expiryDate1").prop("readonly", false);
            $("#expiryDate1").css("pointer-events", "auto");
        } else {
            $("#expiryDate1").prop("readonly", true);
            $("#expiryDate1").css("pointer-events", "none");
            $("#expiryDate1").val("");
        }
    });

    $.validator.addMethod("noSpecialChars", function(value, element) {
        return this.optional(element) || /^[^A-Za-z!@#$%^&*()\-_+={}[\]\\|<>"'\/~`,.;: ]*$/.test(value);
      }, "Special Characters, Spaces, and Alphabet Characters Are Not Allowed.");      
    
    // Custom validation method to check for special characters
    $.validator.addMethod("noSpecialChars", function(value, element) {
        return this.optional(element) || /^[A-Za-z\s!@#$%^&*(),.?":{}|<>+_=;\-[\]\\/'`~]*$/.test(value);
    }, "Numbers Are Not Allowed");
  
  // Function to remove numbers from input fields
  function sanitizeInputField(fieldId) {
    $(fieldId).on("input", function() {
      var sanitized = $(this).val().replace(/[\d]/g, ''); // remove numbers
      $(this).val(sanitized);
    });
  }
  
  // Call sanitizeInputField for each input field that needs it
  sanitizeInputField("#firstname");
  sanitizeInputField("#lastname");
  sanitizeInputField("#emergency-firstname");
  sanitizeInputField("#emergency-lastname");
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
  
    $('input[name="nonNetizen"]').click(function() {
        if ($(this).is(':checked')) {
            $('#idnumber').val('').prop('disabled', true);
        } else {
            $('#idnumber').prop('disabled', false);
        }
    });

    $('input[name="okuStatus"]').click(function() {
        if ($(this).is(':checked')) {
            
            $('#okucard3').prop('disabled', false);

            $('#okuattach3').prop('disabled', false);
        } else {
            $('#okucard3').val('').prop('disabled', true);

            $('#okuattach3').val('').prop('disabled', true);

            
        }
    });

    $.validator.addMethod("email", function(value, element) {
        // Email validation regex pattern
        return this.optional(element) || /^[^\s@]+@[^\s@]+\.(?:com|net|org|edu|gov|mil|biz|info|name|museum|coop|aero|[a-z]{2})$/.test(value);
      }, "Please Insert Valid Email Address");



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
                    digits: true,
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
                    digits: true,
                },
                // issuingCountry: "required",
                
            },

            messages: {
                personalEmail: {
                    email: "Please Insert Valid Email Address",
                },
                firstName: {
                    required: "Please Insert First Name",
                },
                lastName: {
                    required: "Please Insert Last Name",
                },
                fullName: {
                    required:"Please Insert Full Name",
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
                    digits: "Please Insert Correct Identification Number Without ' - ' or Space",
                    rangelength: "Please Insert Valid Identification Number",
                },
                phoneNo: {
                    required: "Please Insert Phone Number",
                    digits: "Please Insert Correct Phone Number Without ' - ' or Space",
                    rangelength: "Please Insert Valid Phone Number",
                },
                phoneNo2: {
                    digits: "Please Insert Correct Phone Number Without ' - ' or Space",
                    rangelength: "Please Insert Valid Phone Number",
                },
                homeNo: {
                    digits: "Please Insert Correct Home Number Without ' - ' or Space",
                    rangelength: "Please Insert Valid Home Number",
                },
                extensionNo: {
                    digits: "Please Insert Correct Extension Number Without ' - ' or Space",
                    rangelength: "Please Insert Valid Extension Number",
                },
                okuCardNum: {
                    digits: "Please Insert Correct OKU Card Number Number Without ' - ' or Space",
                    required: "Please Insert OKU Card Number",
                },
                //okuFile: "Please Input Valid File",
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

    var hash = location.hash.replace(/^#/, ""); // ^ means starting, meaning only match the first hash
    if (hash) {
        $('.nav-tabs a[href="#' + hash + '"]').tab("show");
    }
    $(".nav-tabs a").on("shown.bs.tab", function (e) {
        window.location.hash = e.target.hash;
    });

    //ADD EDUCATION QUALIFICATIONS
    $('#saveEducation').click(function(e) {
          $("#addEducation").validate({
            // Specify validation rules
            rules: {
                fromDate: "required",
                toDate: "required",
                instituteName: "required",
                highestLevelAttained: "required",
                result: "required",
                file:"required",
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

    $('#editEducation').click(function(e) {
    
        Swal.fire({
            allowOutsideClick: false,
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonColor: '#3085d6',
            title: 'Declaration.',
            icon: 'info',
            html: '<h5> <input type="checkbox" class="form-check-input" name="t11" id="t1"  />  I hereby certify the above information as provided by me is true and correct. I also undertake to keep the Company informed of any changes covering such information of my personal details as and when it occurs. If any information given above is subsequently found to be incorrect or incomplete or untrue, the Company may terminate my employment without notice or compensation.</h5><br>' +
                    '<h5> <input type="checkbox" class="form-check-input" name="t22" id="t2"  />  I hereby state that I may be liable to summary dismissal if any of the particulars has been misrepresented or omitted. I acknowledge that the Company has the right to recover any salaries and monetary benefits paid out to me during the course of my employment in the event of any misrepresentation or omission on my personal data.</h5><br>' +
                    '<h5> <input type="checkbox" class="form-check-input" name="t33" id="t3"  />  I hereby give consent for Company to process and keep my personal data for employment purposes.</h5>',
            confirmButtonText: 'Yes',
            
            preConfirm: () => {
                if (!$('#t1').prop('checked') || !$('#t2').prop('checked') || !$('#t3').prop('checked'))  {
                    Swal.showValidationMessage('<i class="fa fa-info-circle"></i> Please check all term to proceed')
                
            }
            else if ($('#t1').prop('checked') || $('#t2').prop('checked') || $('#t3').prop('checked')){
                var data = new FormData(document.getElementById("educationModalEdit"));

                $.ajax({
                    type: "POST",
                    url: "/updateEducation",
                    data: data,
                    dataType: "json",
                    async: false,
                    processData: false,
                    contentType: false,
                }).done(function(data) {
                    console.log(data);
                    Swal.fire({
                        title: data.title,
                        icon: 'success',
                        text: data.msg,
                        type: data.type,
                            confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                    }).then(function() {
                        if (data.type == 'error') {
    
                        } else {
                            location.reload();
                        }
                    });
                });
            }
            else {
                Swal.showValidationMessage(
                    '<i class="fa fa-info-circle"></i> Error'
                );
            }
        },
     }).then((result) => {});

    });

    educationId = $("#educationId").val();

    educationIds = educationId.split(',');
        
    for (let i = 0; i < educationIds.length; i++) {
        const type = educationIds[i];
        $('#educationModalEdit' + type).click(function(e) {
            id = $(this).data('id');
            var educationData = getEducation(id);
    
            educationData.done(function(data) {
                education = data.data;
                $("#idEdu").val(education.id);
                $('#educationFromDate1').val(education.fromDate);
                $('#educationToDate1').val(education.toDate);
                $('#educationinstituteName1').val(education.instituteName);
                $('#educationhighestLevelAttained1').val(education.highestLevelAttained);
                $('#educationResult1').val(education.result);
                if (data.file) {
                    $('#fileDownloadOthers').html('<a href="/storage/' + data.file + '">Download File</a>')
                }
            });
            $('#editmodaledd').modal('show');
        });
    
        $('#deleteEducation' + type).click(function(e) {
            id = $(this).data('id');
            requirejs(['sweetAlert2'], function(swal) {
                swal({
                    title: "Are you sure to delete Education?",
                    type: "error",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes!",
                    showCancelButton: true,
                }).then(function() {
                    $.ajax({
                        type: "POST",
                        url: "/deleteEducation/" + id,
                        data: { _method: "DELETE" },
                        
                    }).done(function(data) {
                        swal({
                            title: data.title,
                            text: data.msg,
                            type: data.type,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                        }).then(function() {
                            if (data.type == 'error') {
    
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

    $('#saveOthers').click(function(e) {
        $("#addOthers").validate({
          // Specify validation rules
          rules: {
              otherDate: "required",
              otherPQDetails: "required",
              file: "required"
          },

          messages: {
              otherDate: "Please insert Date",
              otherPQDetails: "Please insert Professional Qualification Details",
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

  $('#editOthers').click(function(e) {
  
      Swal.fire({
          allowOutsideClick: false,
          showCancelButton: true,
          cancelButtonColor: '#d33',
          confirmButtonColor: '#3085d6',
          title: 'Declaration.',
          icon: 'info',
          html: '<h5> <input type="checkbox" class="form-check-input" name="t11" id="t1"  />  I hereby certify the above information as provided by me is true and correct. I also undertake to keep the Company informed of any changes covering such information of my personal details as and when it occurs. If any information given above is subsequently found to be incorrect or incomplete or untrue, the Company may terminate my employment without notice or compensation.</h5><br>' +
                  '<h5> <input type="checkbox" class="form-check-input" name="t22" id="t2"  />  I hereby state that I may be liable to summary dismissal if any of the particulars has been misrepresented or omitted. I acknowledge that the Company has the right to recover any salaries and monetary benefits paid out to me during the course of my employment in the event of any misrepresentation or omission on my personal data.</h5><br>' +
                  '<h5> <input type="checkbox" class="form-check-input" name="t33" id="t3"  />  I hereby give consent for Company to process and keep my personal data for employment purposes.</h5>',
          confirmButtonText: 'Yes',
          
          preConfirm: () => {
              if (!$('#t1').prop('checked') || !$('#t2').prop('checked') || !$('#t3').prop('checked'))  {
                  Swal.showValidationMessage('<i class="fa fa-info-circle"></i> Please check all term to proceed')
              
          }
          else if ($('#t1').prop('checked') || $('#t2').prop('checked') || $('#t3').prop('checked')){
              var data = new FormData(document.getElementById("othersModalEdit"));

              $.ajax({
                  type: "POST",
                  url: "/updateOthers",
                  data: data,
                  dataType: "json",
                  async: false,
                  processData: false,
                  contentType: false,
              }).done(function(data) {
                  console.log(data);
                  Swal.fire({
                      title: data.title,
                      icon: 'success',
                      text: data.msg,
                      type: data.type,
                          confirmButtonColor: '#3085d6',
                      confirmButtonText: 'OK',
                      allowOutsideClick: false,
                      allowEscapeKey: false,
                  }).then(function() {
                      if (data.type == 'error') {
  
                      } else {
                          location.reload();
                      }
                  });
              });
          }
          else {
              Swal.showValidationMessage(
                  '<i class="fa fa-info-circle"></i> Error'
              );
          }
      },
   }).then((result) => {});

  });

  othersId = $("#othersId").val();

  othersIds = othersId.split(',');
      
  for (let i = 0; i < othersIds.length; i++) {
      const type = othersIds[i];
      $('#othersQualificationModalEdit' + type).click(function(e) {
  
          id = $(this).data('id');
          var othersData = getOthers(id);
  
          othersData.done(function(data) {
              othersQualification = data.data;
              $("#idOthers").val(othersQualification.id);
              $('#othersDate1').val(othersQualification.otherDate);
              $('#othersPQDetails1').val(othersQualification.otherPQDetails);
              $('#othersDoc1').val(othersQualification.supportOtherDoc);
          });
          $('#editmodalothers').modal('show');
      });
  
      $('#deleteOthers' + type).click(function(e) {
          id = $(this).data('id');
          requirejs(['sweetAlert2'], function(swal) {
              swal({
                  title: "Are you sure to delete Other Qualification?",
                  type: "error",
                  confirmButtonClass: "btn-danger",
                  confirmButtonText: "Yes!",
                  showCancelButton: true,
              }).then(function() {
                  $.ajax({
                      type: "POST",
                      url: "/deleteOthers/" + id,
                      data: { _method: "DELETE" },
                      
                  }).done(function(data) {
                      swal({
                          title: data.title,
                          text: data.msg,
                          type: data.type,
                          confirmButtonColor: '#3085d6',
                          confirmButtonText: 'OK',
                          allowOutsideClick: false,
                          allowEscapeKey: false,
                      }).then(function() {
                          if (data.type == 'error') {
  
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
              url: "/getOthers/" + id
          });
      }
  }





        
    $('#saveAddress').click(function(e) {

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
                        async: false,
                        processData: false,
                        contentType: false,
                    }).done(function (data) {
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

    $('#addAddressDetails').click(function(e) {
        $("#formAddressDetails").validate({
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
                addressType: "required",
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
                addressType: "Please Choose Address Type",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("formAddressDetails")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/addAddressDetails",
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

    $("#saveAddressDetailsBtn").click(function (e) {
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
                        async: false,
                        processData: false,
                        contentType: false,
                    }).done(function (data) {
                        console.log(data)
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
    });
    
    addressId = $("#addressId").val();

    addressIds = addressId.split(",");

    for (let i = 0; i < addressIds.length; i++){
        const type = addressIds[i];

        $("#updateAddressDetails" + type).click(function (e){
            id = $(this).data("id");
            var addressData = getAddressDetails(id);

            addressData.done(function (data){
                address = data.data;
                $("#id1").val(address.id);
                $("#address1Edit").val(address.address1);
                $("#address2Edit").val(address.address2);
                $("#postcodeEdit").val(address.postcode);
                $("#cityEdit").val(address.city);
                $("#stateEdit").val(address.state);
                $("#countryEdit").val(address.country);
                $("#addressTypeEdit").val(address.addressType);
            });
            $("#modaleditaddress").modal("show");
        });
        
        $("#deleteAddressDetails" + type).click(function (e){
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
                    }).done(function (data) {
                        console.log(data)
                        swal({
                            title: data.title,
                            text: data.msg,
                            type: data.type,
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "OK",
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                        }).then(function () {
                            if (data.type == "error"){
                            } else {
                                location.reload();
                            }
                        });
                    });
                });
            });
        });

        function getAddressDetails(id){
            return $.ajax({
                url: "/getAddressDetails/" + id,
            });
        }
    }    
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
                    required: "Please Insert First Name",},
                lastName: {
                    required: "Please Insert Last Name",},
                relationship: "Please Choose Relationship",
                contactNo: {
                    required: "Please Insert Contact Number",
                    digits: "Please Insert Valid Contact Number",
                },
                relationship: "Please Insert Relationship",
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
                postcode_2: {
                    required: true,
                    digits: true,
                    rangelength: [5, 5],
                },
                city_2: "required",
                state_2: "required",
            },

            messages: {
                firstName_2: {
                    required: "Please Insert First Name",
                },
                lastName_2:{
                    required: "Please Insert Last Name",
                },
                relationship_2: "Please Choose Relationship",
                contactNo_2: {
                    required: "Please Insert Contact Number",
                    digits: "Please Insert Valid Contact Number",
                },
                relationship_2: "Please Insert Relationship",
                address1_2: "Please Insert Address 1",
                postcode_2: {
                    required: "Please Insert Postcode",
                    digits: "Please Insert Valid Postcode",
                    rangelength: "Please Insert Valid Postcode",
                },
                city_2: "Please Insert City",
                state_2: "Please Choose State",
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
                    digits: true,
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
                age: "required",
                postcode: {
                    required: true,
                    digits: true,
                    rangelength: [5, 5],
                },
                salary: {
                    digits: true,
                },
                officeNo: {
                    digits: true,
                    rangelength: [9, 9],
                },
                designation: "required",
            },

            messages: {
                firstName: {
                    required:"Please Insert First Name",
                },
                lastName: {
                    required:"Please Insert Last Name",
                },
                idNo: {
                    required: "Please Insert New Identification Number",
                    digits: "Please Insert Correct Identification Number Without ' - ' or Space",
                    rangelength: "Please insert Valid Identification Number",
                },
                oldIDNo: {
                    digits: "Please Insert Correct Identification Number Without ' - ' or Space",
                    rangelength: "Please Insert Valid Identification Number",
                },
                contactNo: {
                    required: "Please Insert Contact Number",
                    digits: "Please Insert Correct Contact Number Without ' - ' or Space",
                    rangelength: "Please Insert Valid Contact Number ",
                },
                homeNo: {
                    digits: "Please Insert Correct Home Number Without ' - ' or Space",
                    rangelength: "Please Insert Valid Home Number",
                },
                address1: "Please Insert Address 1",
                city: "Please Insert City",
                state: "Please Choose State",
                age: "Please Insert Age",
                country: "Please Choose Country",
                postcode: {
                    required: "Please Insert Postcode",
                    digits: "Please Insert Valid Postcode",
                    rangelength: "Please Insert Valid Postcode",
                },
                salary: {
                    digits: "Please input valid monthly salary",
                },
                officeNo: {
                    digits: 'Please Insert Correct Contact Number Without ' - ' or Space',
                    rangelength: 'Please Insert Valid Office Number',
                },
                designation: "Please Insert Designation",
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

    companion = ["1", "2", "3", "4"];

    for (let i = 0; i < companion.length; i++) {
        const no = companion[i];
        $("#updateCompanion" + no).click(function (e) {
            e.preventDefault();
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
                    } else {
                        var data = new FormData(document.getElementById("updateCompanionForm" + no));
        
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
                                }
                            });
                        });
                    }
                },
            }).then((result) => {});
        });        
    }
    $(document).on("click", "#deleteCompanion", function () {
        no = $(this).data("id");
        requirejs(['sweetAlert2'], function(swal) {
            swal({
                title: "Are you sure to delete Companion?",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
            }).then(function() {
                $.ajax({
                    type: "POST",
                    url: "/deleteCompanion/" + no,
                    data: { _method: "DELETE" },
                    
                }).done(function(data) {
                    console.log(no);
                    console.log(data);
                    swal({
                        title: data.title,
                        text: data.msg,
                        type: data.type,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                    }).then(function() {
                        if (data.type == 'error') {

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
    });
    // $("#education").DataTable({
    //     responsive: false,
    //     lengthMenu: [
    //         [5, 10, 15, 20, -1],
    //         [5, 10, 15, 20, "All"],
    //     ],
        
    // }); 

    $("#education").DataTable({
        responsive: false,
        dom:
            "<'row'<'col-sm-4'B><'col-sm-4 text-center'l><'col-sm-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-4 col-auto'i><'col-sm-4 text-center'><'col-sm-4'p>>", // add col-auto class to the search column
        buttons: [
            { 
                extend: 'pdf', 
                className: 'btn-sm', 
                orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {columns:[2,3,4,5,6,7,8,9]}
            },
            { 
                extend: 'csv', 
                className: 'btn-sm' ,
                exportOptions: {columns:[2,3,4,5,6,7,8,9]}
            },
        ],
        autoWidth: true,
        lengthMenu: [ [5, 10, 25, -1], [5, 10, 25, "All"] ],
        // scrollX: true // enable horizontal scrolling if necessary
    });

    $("#qualificationOthers").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"],
        ],
    });
    $("#profileAddress").DataTable({
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
            $("#gendermyprofile").val("").prop("disabled", false);
        } else {
            $("#idnumber").prop("disabled", false);
            $("#dob").val("").prop("readonly", true);
            $("#dob").css("pointer-events", "none");
            $("#gendermyprofile").val("").prop("disabled", true);
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
        format: "yyyy/mm/dd",
        autoclose: true,
    });
    $("#expiryDate1").datepicker({
        todayHighlight: true,
        format: "yyyy/mm/dd",
        autoclose: true,
    });

    $("#childModalAdd").click(function (e) {
        $("#add-children").modal("show");
    });
    $("#dob").datepicker({
        todayHighlight: true,
        format: "yyyy/mm/dd",
        autoclose: true,
    });
    $("#dob4").datepicker({
        todayHighlight: true,
        format: "yyyy/mm/dd",
        autoclose: true,
    });
    $("#dobAddCompanion").datepicker({
        todayHighlight: true,
        format: "yyyy/mm/dd",
        autoclose: true,
    });
    $("#expirydatemyprofile").datepicker({
        //todayHighlight: true,
        format: "yyyy/mm/dd",
        autoclose: true,
    });
    $("#datepicker-joindate").datepicker({
        todayHighlight: true,
        format: "yyyy/mm/dd",
        autoclose: true,
    });
    $("#dobmc").datepicker({
        todayHighlight: true,
        format: "yyyy/mm/dd",
        autoclose: true,
    });
    $("#expirydatemc").datepicker({
        todayHighlight: true,
        format: "yyyy/mm/dd",
        autoclose: true,
    });
    $("#expirydate3").datepicker({
        todayHighlight: true,
        format: "yyyy/mm/dd",
        autoclose: true,
    });
    $("#dobuc").datepicker({
        todayHighlight: true,
        format: "yyyy/mm/dd",
        autoclose: true,
    });
    $("#dom").datepicker({
        todayHighlight: true,
        format: "yyyy/mm/dd",
        autoclose: true,
    });
    $("#dateJoinedmcEdit").datepicker({
        todayHighlight: true,
        format: "yyyy/mm/dd",
        autoclose: true,
    });
    $("#dommc").datepicker({
        todayHighlight: true,
        format: "yyyy/mm/dd",
        autoclose: true,
    });
    $("#DOBChild").datepicker({
        todayHighlight: true,
        format: "yyyy/mm/dd",
        autoclose: true,
    });
    $("#dob6").datepicker({
        todayHighlight: true,
        format: "yyyy/mm/dd",
        autoclose: true,
    });
    $("#DOBP1").datepicker({
        todayHighlight: true,
        format: "yyyy/mm/dd",
        autoclose: true,
    });
    $("#expiryDateChild").datepicker({
        todayHighlight: true,
        format: "yyyy/mm/dd",
        autoclose: true,
    });
    $("#dateJoinedmc").datepicker({
        todayHighlight: true,
        format: "yyyy/mm/dd",
        autoclose: true,
    });
    $("#expiryDateParent").datepicker({
        todayHighlight: true,
        format: "yyyy/mm/dd",
        autoclose: true,
    });

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
                    digits: true,
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
                postcode: {
                    required: false,
                    rangelength: [5,5],
                }

            },

            messages: {
                firstName:{
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
                    digits: "Please Insert Correct Identification Number Without ' - ' or Space",
                    rangelength: "Please Insert Valid Identification Number",
                },


                okuNo: {
                    required: "Please Insert OKU Card Number",
                    rangelength: "Please Inset OKU Card Number",

                },

                okuFile: {
                    required: "Please Insert OKU Attachment",

                },

                expiryDate: {
                    required: "Please Insert Expiry Date",

                },
                issuingCountry: {
                    required: "Please Insert Issuing Country", 
                },
                postcode: {
                    rangelength: "Please Inset a valid postcode",


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
                $("#address1_1").val(child.address1);
                $("#address2_1").val(child.address2);
                $("#postcode1").val(child.postcode);
                $("#city1").val(child.city);
                $("#state1").val(child.state);
                $("#country1").val(child.country);
                if (child.okuStatus == "on") {
                    $("#OKUchildren1").prop("checked", true);
                }
                $("#okucard4").val(child.okuNo);
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
        format: "yyyy/mm/dd",
        autoclose: true,
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
                    required:"Please Insert First Name",
                },
                lastName: {
                    required:"Please Insert Last Name",
                },
                DOB: "Please Insert Date of Birth",
                gender: "Please Choose Gender",
                contactNo: {
                    digits: "Please Insert Correct Contact Number Without ' - ' or Space",
                    required: "Please Insert Contact Number",
                    rangelength: "Please Insert Valid Contact Number",
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


    ///// PARENT INFORMATION /////
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
        if ($("#expiryDateParent").prop("readonly")) {
            $("#expiryDateParent").prop("readonly", false);
            $("#expiryDateParent").css("pointer-events", "auto");
            $("#passportcountryparent").prop("disabled", false);
            $("#passportcountryparent").css("pointer-events", "auto")
        } else {
            $("#expiryDateParent").prop("readonly", true);
            $("#expiryDateParent").css("pointer-events", "none");
            $("#expiryDateParent").val("");
            $("#passportcountryparent").prop("disabled", true);
            $("#passportcountryparent").css("pointer-events", "auto")
            $("#passportcountryparent").val("");
        }
    });

    $('input[name="nonCitizen"]').click(function() {
        if ($(this).is(':checked')) {
            $('#idNoaddFamily').val('').prop('disabled', true);
            $('#age6').val('').prop('readonly', false);
            $('#dob6').val('');

        } else {
            $('#idNoaddFamily').prop('disabled', false);
            $('#age6').val('').prop('readonly', true);
            $('#dob6').val('');
        }
    });

    $("#DOBparent").datepicker({
        todayHighlight: true,
        format: "yyyy/mm/dd",
        autoclose: true,
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
                    digits: true,
                    rangelength: [5, 5],
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
                    digits: true,
                    rangelength: [7, 7],
                },
                contactNo: {
                    required: true,
                    digits: true,
                    rangelength: [10, 11], 
                },
                expiryDate: {
                    required: true,
                    
                    
                },

                issuingCountry: {
                    required: true,

                }
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
                    digits: "Please Insert Valid Postcode",
                    rangelength: "Please Insert Valid Postcode",
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
                    digits: "Please Insert Correct Identification Number Without ' - ' or Space",
                    rangelength: "Please Insert Valid Identification Number",
                },
                contactNo: {
                    required: "Please Insert Contact Number",
                    digits: "Please Insert Valid Contact Number",
                    
                    rangelength: [10, 11], 
                },
                expiryDate: {
                    required: "Please Insert Expiry Date",
                },
                issuingCountry: {
                    required: "Please Insert Issuing Country",
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
                $("#fullNameP1").val(parent.fullName);
                $("#idNoP1").val(parent.idNo);
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

    $('input[name="address_type[]"]').on('change', function() {
        var checkboxes = $('input[name="address_type[]"]');
        var permanentChecked = false;
        var correspondentChecked = false;
        var addressId = $(this).data('address-id');
        var addressType = $(this).is(':checked') ? $(this).data('address-type') : '0';
    
        checkboxes.each(function() {
            if ($(this).is(':checked')) {
                if ($(this).val() === 'permanent') {
                    permanentChecked = true;
                } else if ($(this).val() === 'correspondent') {
                    correspondentChecked = true;
                }
            }
        });
    
        if (permanentChecked && correspondentChecked) {
            checkboxes.not(':checked').prop('disabled', true);
            // if both checkboxes are checked and have the same address ID, set addressType to 3
            if (checkboxes.filter('[data-address-id="' + addressId + '"]:checked').length === 2) {
                addressType = '3';
            }
        } else if (permanentChecked) {
            // if only permanent checkbox is checked, set addressType to 1
            addressType = '1';
            // disable all other permanent checkboxes
            checkboxes.filter('[value="permanent"]:not(:checked)').prop('disabled', true);
            // enable all correspondent checkboxes
            checkboxes.filter('[value="correspondent"]').prop('disabled', false);
        } else if (correspondentChecked) {
            // if only correspondent checkbox is checked, set addressType to 2
            addressType = '2';
            // disable all other correspondent checkboxes
            checkboxes.filter('[value="correspondent"]:not(:checked)').prop('disabled', true);
            // enable all permanent checkboxes
            checkboxes.filter('[value="permanent"]').prop('disabled', false);
        } else {
            checkboxes.prop('disabled', false);
        }
    
        // send an AJAX request to update the address type status
        $.ajax({
            url: '/updateAddressDetails',
            type: 'POST',
            data: {
                id: addressId,
                addressType: addressType,
            },
            success: function(data) {
                // Update the UI to reflect the new address type
                Swal.fire({
                    icon: 'success',
                    title: 'Address type updated successfully!',
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error(errorThrown);
            }
        });
    });          
});

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$("#same-address").change(function () {
    if (this.checked) {
        $("#address-1c").val($("#address-1").val()).prop("readonly", true);
        $("#address-2c").val($("#address-2").val()).prop("readonly", true);
        $("#postcodec").val($("#postcode").val()).prop("readonly", true);
        $("#cityc").val($("#city").val()).prop("readonly", true);
        $("#statec").val($("#state").val()).prop("disabled", true);
        $("#countryc").val($("#country").val()).prop("disabled", true);

        // Fetch permanent address from userAddress table if available
        var id = "{{ $user->id }}";
        
        getAddressforCompanion(id).done(function (data) {
            if (data) {
                var permanentAddress1 = data.data.address1;
                var permanentAddress2 = data.data.address2;
                var permanentPostcode = data.data.postcode;
                var permanentCity = data.data.city;
                var permanentState = data.data.state;
                var permanentCountry = data.data.country;
                console.log(data);

                if (permanentAddress1 && permanentAddress2 && permanentPostcode && permanentCity && permanentState && permanentCountry) {
                    $("#address-1c").val(permanentAddress1);
                    $("#address-2c").val(permanentAddress2);
                    $("#postcodec").val(permanentPostcode);
                    $("#cityc").val(permanentCity);
                    $("#statec").val(permanentState);
                    $("#countryc").val(permanentCountry);
                }
            }
        }).fail(function (xhr, status, error) {
            console.log("Error fetching permanent address: " + error);
        });
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

        // Fetch permanent address from userAddress table if available
        var id = "{{ $user->id }}";
        getAddressforCompanion(id).done(function (data) {
            if (data) {
                var permanentAddress1 = data.data.address1;
                var permanentAddress2 = data.data.address2;
                var permanentPostcode = data.data.postcode;
                var permanentCity = data.data.city;
                var permanentState = data.data.state;
                var permanentCountry = data.data.country;
                console.log(data);

                if (permanentAddress1 && permanentAddress2 && permanentPostcode && permanentCity && permanentState && permanentCountry) {
                    $("#address1parent").val(permanentAddress1);
                    $("#address2parent").val(permanentAddress2);
                    $("#postcodeparent").val(permanentPostcode);
                    $("#cityparent").val(permanentCity);
                    $("#stateparent").val(permanentState);
                    $('#stateparenthidden').val(permanentState);
                    $("#countryparent").val(permanentCountry);
                    $('#countryparenthidden').val(permanentCountry);
                }
            }
        }).fail(function (xhr, status, error) {
            console.log("Error fetching permanent address: " + error);
        });
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
        $("#designationmc").prop("disabled", false);
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
        $("#designationmc").prop("disabled", true);
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
        $("#cityCEdit").prop("readonly", false);
        $("#postcodeCEdit").prop("readonly", false);
        $("#stateCEdit").css({ "pointer-events": "auto", background: "#ffffff" });
        $("#countryCEdit").css({
            "pointer-events": "auto",
            background: "#ffffff",
        });
        $("#payslipCEdit").prop("readonly", false);
    } else {
        $("#designationCEdit").val('').prop("disabled", true);
        $("#companyNameCEdit").val('').prop("readonly", true);
        $("#dateJoinedCEdit").val('').prop("readonly", true);
        //$("#dateJoinedmc").prop("disabled", true);
        $("#payslipCEdit").val('').prop("disabled", true);
        $("#income-tax-numberCEdit").val('').prop("readonly", true);
        $("#extension-number").val('').prop("readonly", true);
        $("#officeNoCEdit").val('').prop("readonly", true);
        $("#address1CEdit").val('').prop("readonly", true);
        $("#address2CEdit").val('').prop("readonly", true);
        $("#cityCEdit").val('').prop("readonly", true);
        $("#postcodeCEdit").val('').prop("readonly", true);
        $("#stateCEdit").css({ "pointer-events": "none", background: "#e9ecef" });
        $("#countryCEdit").css({
            "pointer-events": "none",
            background: "#e9ecef",
        });
        $("#payslipCEdit").val('').prop("readonly", true);
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
        $("#stateP1").val($("#state").val()).prop("disabled", true);
        $("#countryP1").val($("#country").val()).prop("disabled", true);

        // Fetch permanent address from userAddress table if available
        var id = "{{ $user->id }}";
        getAddressforCompanion(id).done(function (data) {
            if (data) {
                var permanentAddress1 = data.data.address1;
                var permanentAddress2 = data.data.address2;
                var permanentPostcode = data.data.postcode;
                var permanentCity = data.data.city;
                var permanentState = data.data.state;
                var permanentCountry = data.data.country;
                console.log(data);

                if (permanentAddress1 && permanentAddress2 && permanentPostcode && permanentCity && permanentState && permanentCountry) {
                    $("#address1P1").val(permanentAddress1);
                    $("#address2P1").val(permanentAddress2);
                    $("#postcodeP1").val(permanentPostcode);
                    $("#cityP1").val(permanentCity);
                    $("#stateP1").val(permanentState);
                    $("stateeditparenthidden").val(permanentState);
                    $("#countryP1").val(permanentCountry);
                    $("countryeditparenthidden").val(permanentCountry);
                }
            }
        }).fail(function (xhr, status, error) {
            console.log("Error fetching permanent address: " + error);
        });
    } else {
        $("#address1P1").prop("readonly", false);
        $("#address2P1").prop("readonly", false);
        $("#postcodeP1").prop("readonly", false);
        $("#cityP1").prop("readonly", false);
        $("#stateP1").prop("disabled", false);
        $("#countryP1").prop("disabled", false);
    }
});

function getAddressforCompanion(id){
    return $.ajax({
        url: "/getAddressforCompanion/" + id,
    });
}

// $("#datepicker-fromdate").datepicker({
//     todayHighlight: true,
//     autoclose: true,
//     format: "yyyy/mm/dd",
// });

// $("#datepicker-todate").datepicker({
//     todayHighlight: true,
//     autoclose: true,
//     format: "yyyy/mm/dd",
// });

// Initialize the datepicker for the from date
$("#datepicker-fromdate").datepicker({
    todayHighlight: true,
    autoclose: true,
    format: "yyyy/mm/dd",
});

// Initialize the datepicker for the to date
$("#datepicker-todate").datepicker({
    todayHighlight: true,
    autoclose: true,
    format: "yyyy/mm/dd",
}).on("changeDate", function(e) {
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


$("#datepicker-fromdateu").datepicker({
    todayHighlight: true,
    autoclose: true,
    format: "yyyy/mm/dd",
});

$("#datepicker-todateu").datepicker({
    todayHighlight: true,
    autoclose: true,
    format: "yyyy/mm/dd",
});

$("#datepicker-others").datepicker({
    todayHighlight: true,
    autoclose: true,
    format: "yyyy/mm/dd",
});

$("#datepicker-othersu").datepicker({
    todayHighlight: true,
    autoclose: true,
    format: "yyyy/mm/dd",
});

//   oku checkbox myprofile
$(".okuCheck").click(function(){
    if ($(this).prop("checked")) {
        $("#okucard").val('').prop("disabled", false);
        
        $("#okuattach").prop("disabled", false);
        $("#okuattach").css("pointer-events", "auto");
        
    } else {
        
        $("#okucard").val('').prop("disabled", true);

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
        okuStatus = 1;
    } else {
        $("#okucard1").prop("readonly", true);
        $("#okuattach1").css("pointer-events", "none");
        okuStatus = 0;
    }
});

//oku check update companion
$(".okuCheck2").click(function () {
    if ($(this).prop("checked")) {
        $("#okucard2").prop("readonly", false);
        $("#okuattach2").css("pointer-events", "auto");
        okuStatus = 1;
    } else {
        $("#okucard2").prop("readonly", true);
        $("#okuattach2").css("pointer-events", "none");
        okuStatus = 0;
    }
});

//oku check add children
$(".okuCheck3").click(function () {
    if ($(this).prop("checked")) {
        $("#okucard3").prop("readonly", false);


        $("#okuattach3").prop("readonly", false);
        $("#okuattach3").css("pointer-events", "auto");
    } else {
        $("#okucard3").prop("readonly", true);

        $("#okuattach3").prop("readonly", true);
        $("#okuattach3").css("pointer-events", "none");
    }
});

//oku check update children
$(".okuCheck4").click(function () {
    if ($(this).prop("checked")) {
        $("#okucard4").prop("readonly", false);
        $("#okuattach4").css("pointer-events", "auto");
        okuStatus = 1;
    } else {
        $("#okucard4").prop("readonly", true);
        $("#okuattach4").css("pointer-events", "none");
        okuStatus = 0;
    }
});

//oku check add family
$(".okuCheck5").click(function () {
    if ($(this).prop("checked")) {
        $("#okucard5").prop("readonly", false);
        $("#okuattach5").css("pointer-events", "auto");
        okuStatus = 1;
    } else {
        $("#okucard5").prop("readonly", true);
        $("#okuattach5").css("pointer-events", "none");
        okuStatus = 0;
    }
});

//oku check edit family
$(".okuCheck6").click(function () {
    if ($(this).prop("checked")) {
        $("#okucard6").prop("readonly", false);
        $("#okuattach6").css("pointer-events", "auto");
        okuStatus = 1;
    } else {
        $("#okucard6").prop("readonly", true);
        $("#okuattach6").css("pointer-events", "none");
        okuStatus = 0;
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
        $("#idNoaddChild").prop("readonly", true);
        $("#dob4").prop("readonly", false);
        $("#dob4").css("pointer-events", "auto");
        $("#idNoaddChild").val("");
        $("#passportChild").prop("readonly", false);
        
        
    } else {
        $("#idNoaddChild").prop("readonly", false);
        $("#dob4").prop("readonly", true);
        $("#dob4").css("pointer-events", "none");
        $("#passportChild").val("");
        $("#passportChild").prop("readonly", true);
        $("#expiryDateChild").val("");
        $("#expiryDateChild").prop("readonly", true);
        $("#expiryDateChild").css("pointer-events", "none");
      
    }
});

//ADD FAMILY DETAILS
$(".partCheck8").click(function () {
    if ($(this).prop("checked")) {
        $("#idNoaddFamily").prop("readonly", true);
        $("#dob6").prop("readonly", false);
        $("#dob6").css("pointer-events", "auto");
        $("#idNoaddFamily").val("");


        $("#expiryDateParent").prop("disabled", false);
        $("#expiryDateParent").prop("readonly", false);

    } else {
        $("#idNoaddFamily").prop("readonly", false);
        $("#dob6").prop("readonly", true);
        $("#dob6").css("pointer-events", "none");
        
        $("#passportParent").val("");

        
        $("#expiryDateParent").prop("disabled", true);
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
        $("#dob7").css("pointer-events", "auto");

        $("#idnumber7").val("");

        $("#expiryDateParent").prop("disabled", false);
        $("#expiryDateParent").prop("readonly", false);
    } else {
        $("#idnumber7").prop("readonly", false);

        $("#dob7").prop("readonly", true);
        $("#dob7").css("pointer-events", "none");

        $("#passportparent").val("");

        $("#expiryDateParent").val("");
        $("#expiryDateParent").prop("readonly", true);
        $("#expiryDateParent").css("pointer-events", "none");
    }
});
