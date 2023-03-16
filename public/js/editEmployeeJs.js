$(document).ready(function () {
    let croppie;

    $("#edit-profile-picture").on("change", function () {
        if (this.files && this.files[0]) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $("#croppie img").attr("src", e.target.result);
                croppie = new Croppie($("#croppie img")[0], {
                    boundary: { width: 400, height: 400 },
                    viewport: { width: 300, height: 300, type: "square" ,name: "profilePicture"},
                });
            };

            $("#showImage").show();
            $("#crop").on("click", function () {
                $("#showCroppedImage").show();
                
                croppie.result({ type: "base64", circle: false })
                    .then(function (dataImg) {
                        var data = [
                            { image: dataImg },
                            { name: "profilePicture.jpg" },
                        ];
                        // use ajax to send data to php
                        $("#result_image img").attr("src", dataImg);
                    });
                    $("#showImage").hide();
            });
            reader.readAsDataURL(this.files[0]);
        }
    });

    $("#firstname,#lastname").change(function () {
        var a = $("#firstname").val();
        var b = $("#lastname").val();
        $("#fullname").val(a + " " + b);
    });
    $("#gender").css({
        "pointer-events": "none",
        "touch-action": "none",
        background: "#e9ecef",
    });
    $("#childgender").css({
        "pointer-events": "none",
        "touch-action": "none",
        background: "#e9ecef",
    });
    $("#gender1").css({
        "pointer-events": "none",
        "touch-action": "none",
        background: "#e9ecef",
    });

    $("#firstnamemc,#lastnamemc").change(function () {
        var a = $("#firstnamemc").val();
        var b = $("#lastnamemc").val();
        $("#fullnamemc").val(a + " " + b);
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
    $("#firstNameChild,#lastNameChild").change(function () {
        var a = $("#firstNameChild").val();
        var b = $("#lastNameChild").val();
        $("#fullNameChild").val(a + " " + b);
    });
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
    //EDIT CHILD
    $("#idNo1").change(function () {
        if ($(this).val().length == 12) {
            var idn = $(this).val();
            var year = idn.substring(0, 2);
            var month = idn.substring(2, 4);
            var day = idn.substring(4, 6);

            var cutoff = new Date().getFullYear() - 2000; //2022-2000=22cutoff
            //98>22->19+98
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

    //EDIT CHILD
    $(".partCheck4").click(function () {
        if ($(this).prop("checked")) {
            $("#idNoaddChild").prop("readonly", true);
            $("#DOBChild").prop("readonly", false);
            $("#DOBChild").css("pointer-events", "auto");
            $("#idNoaddChild").val("");
            $("#ageChild").prop("readonly", false);
            $("#childgender").css({
                "pointer-events": "auto",
                "touch-action": "auto",
                background: "#ffffff",
            });
        } else {
            $("#idNoaddChild").prop("readonly", false);
            $("#DOBChild").prop("readonly", true);
            $("#DOBChild").css("pointer-events", "none");
            $("#passportChild").val("");
            $("#expiryDateChild").val("");
            $("#expiryDateChild").prop("readonly", true);
            $("#expiryDateChild").css("pointer-events", "none");
            $("#childgender").css({
                "pointer-events": "none",
                "touch-action": "none",
                background: "#e9ecef",
            });
            $("#ageChild").prop("readonly", true);
        }
    });
    $(".partCheck5").click(function () {
        if ($(this).prop("checked")) {
            $("#idNo1").prop("readonly", true);
            $("#DOB1").prop("readonly", false);
            $("#DOB1").css("pointer-events", "auto");
            $("#idNo1").val("");
            $("#age1").prop("readonly", false);
            $("#gender1").css({
                "pointer-events": "auto",
                "touch-action": "auto",
                background: "#ffffff",
            });
        } else {
            $("#idNo1").prop("readonly", false);
            $("#DOB1").prop("readonly", true);
            $("#DOB1").css("pointer-events", "none");
            $("#passports1").val("");
            $("#expiryDateChild").val("");
            $("#expiryDateChild").prop("readonly", true);
            $("#expiryDateChild").css("pointer-events", "none");
            $("#gender1").css({
                "pointer-events": "none",
                "touch-action": "none",
                background: "#e9ecef",
            });
            $("#age1").prop("readonly", true);
        }
    });
    $(".mcdetaildrop").css({ "pointer-events": "none", background: "#e9ecef" });
    $(".partChecks").click(function () {
        if ($(this).prop("checked")) {
            $(".mcdetail").prop("readonly", false);
            $(".mcdetaildrop").css({
                "pointer-events": "auto",
                background: "#ffffff",
            });
        } else {
            $(".mcdetail").prop("readonly", true);

            $(".mcdetaildrop").css({
                "pointer-events": "none",
                background: "#e9ecef",
            });
        }
    });
    $("#expiryDateChild").datepicker({
        todayHighlight: true,
        format: "yyyy/mm/dd",
        autoclose: true,
    });
    $("#DOBChild").datepicker({
        todayHighlight: true,
        format: "yyyy/mm/dd",
        autoclose: true,
    });
    $("#dobsibling").datepicker({
        todayHighlight: true,
        format: "yyyy/mm/dd",
        autoclose: true,
    });
    $("#DOBS").datepicker({
        todayHighlight: true,
        format: "yyyy/mm/dd",
        autoclose: true,
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
    $("#stateEmc").css({ "pointer-events": "none", background: "#e9ecef" });
    $("#countryEmc").css({ "pointer-events": "none", background: "#e9ecef" });

    $("#expirydatemc").datepicker({
        todayHighlight: true,
        format: "yyyy/mm/dd",
        autoclose: true,
    });
    $("#dommc").datepicker({
        todayHighlight: true,
        format: "yyyy/mm/dd",
        autoclose: true,
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
            $("#stateEmc").css({
                "pointer-events": "auto",
                background: "#ffffff",
            });
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
            $("#stateEmc").css({
                "pointer-events": "none",
                background: "#e9ecef",
            });
            $("#countryEmc").css({
                "pointer-events": "none",
                background: "#e9ecef",
            });
            $("#payslipmc").prop("readonly", true);
        }
    });
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

    $("#gender").css({
        "pointer-events": "none",
        "touch-action": "none",
        background: "#e9ecef",
    });

    $("#datepicker-fromdate").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy/mm/dd",
    });
    
    $("#datepicker-todate").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy/mm/dd",
    });

    $("#datepicker-others").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy/mm/dd",
    });

    var hash = location.hash.replace(/^#/, ""); // ^ means starting, meaning only match the first hash
    if (hash) {
        $('.nav-tabs a[href="#' + hash + '"]').tab("show");
    }
    $(".nav-tabs a").on("shown.bs.tab", function (e) {
        window.location.hash = e.target.hash;
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

    $("#effective-from").datepicker({
        todayHighlight: true,
        format: "yyyy/mm/dd",
        autoclose: true,
    });

    $("#datepicker-joindate").datepicker({
        todayHighlight: true,
        format: "yyyy/mm/dd",
        autoclose: true,
    });

    $("#dob").datepicker({
        todayHighlight: true,
        format: "yyyy/mm/dd",
        autoclose: true,
    });

    $("#expirydate").datepicker({
        todayHighlight: true,
        format: "yyyy/mm/dd",
        autoclose: true,
    });

    $("#DOBaddparent").datepicker({
        todayHighlight: true,
        format: "yyyy/mm/dd",
        autoclose: true,
    });

    $("#same-address2").change(function () {
        if (this.checked) {
            $("#address1parent")
                .val($("#address-1").val())
                .prop("readonly", true);
            $("#address2parent")
                .val($("#address-2").val())
                .prop("readonly", true);
            $("#postcodeparent")
                .val($("#postcode").val())
                .prop("readonly", true);
            $("#cityparent")
                .val($("#city").val())
                .css({
                    "pointer-events": "none",
                    "touch-action": "none",
                    background: "#e9ecef",
                });
            $("#stateparent")
                .val($("#state").val())
                .css({
                    "pointer-events": "none",
                    "touch-action": "none",
                    background: "#e9ecef",
                });
            $("#countryparent")
                .val($("#country").val())
                .css({
                    "pointer-events": "none",
                    "touch-action": "none",
                    background: "#e9ecef",
                });
        } else {
            $("#address1parent").val($("").val()).prop("readonly", false);
            $("#address2parent").val($("").val()).prop("readonly", false);
            $("#postcodeparent").val($("").val()).prop("readonly", false);
            $("#cityparent")
                .val($("").val())
                .css({
                    "pointer-events": "auto",
                    "touch-action": "auto",
                    background: "#ffffff",
                });
            $("#stateparent")
                .val($("").val())
                .css({
                    "pointer-events": "auto",
                    "touch-action": "auto",
                    background: "#ffffff",
                });
            $("#countryparent")
                .val($("my").val())
                .css({
                    "pointer-events": "auto",
                    "touch-action": "auto",
                    background: "#ffffff",
                });
        }
    });

    $("input[type=text]").keyup(function () {
        $(this).val($(this).val().toUpperCase());
    });

    $("#idNo").change(function () {
        if ($(this).val().length == 12) {
            var idn = $(this).val();
            var year = "19".concat(idn.substring(0, 2));
            var month = idn.substring(2, 4);
            var day = idn.substring(4, 6);
            $("#dob").val(year + "-" + month + "-" + day);
        }
    });

    $("#idNo").change(function () {
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
    $("#same-address").change(function () {
        if (this.checked) {
            $("#address-1c").val($("#address-1").val()).prop("readonly", true);
            $("#address-2c").val($("#address-2").val()).prop("readonly", true);
            $("#postcodec").val($("#postcode").val()).prop("readonly", true);
            $("#cityc").val($("#city").val()).prop("readonly", true);
            $("#statec").val($("#state").val()).prop("disabled", true);
            $("#countryc").val($("#country").val()).prop("disabled", true);
        } else {
            $("#address-1c").val($("").val()).prop("readonly", false);
            $("#address-2c").val($("").val()).prop("readonly", false);
            $("#postcodec").val($("").val()).prop("readonly", false);
            $("#cityc").val($("").val()).prop("readonly", false);
            $("#statec").val($("").val()).prop("disabled", false);
            $("#countryc").val($("1").val()).prop("disabled", false);
        }
    });

    $(".partCheck").click(function () {
        if ($(this).prop("checked")) {
            $("#idNo").prop("readonly", true);
            $("#passport").prop("readonly", false);
            $("#expirydate").prop("readonly", false);
            $("#expirydate").css("pointer-events", "auto");
            $("#dob").prop("readonly", false);
            $("#dob").css("pointer-events", "auto");
            $("#idNo").val("");
        } else {
            $("#idNo").prop("readonly", false);
            $("#passport").prop("readonly", true);
            $("#expirydate").prop("readonly", true);
            $("#expirydate").css("pointer-events", "none");
            $("#dob").prop("readonly", true);
            $("#dob").css("pointer-events", "none");
        }
    });

    $(".partCheck2").click(function () {
        if ($(this).prop("checked")) {
            $("#reportto").show();
            $("#reporttoo").prop("disabled", false);
            $(this).val("on");
        } else {
            $(this).val("das");
            $("#reportto").hide();

            $("#reporttoo").val($("").val());

            // $('#reportto').css('pointer-events', 'auto');
        }
    });

    $.validator.addMethod("noSpecialChars", function(value, element) {
        return this.optional(element) || /^[^A-Za-z!@#$%^&*()\-_+={}[\]\\|<>"'\/~`,.;: ]*$/.test(value);
      }, "Special Characters, Spaces, and Alphabet Characters Are Not Allowed.");      
      
    $.validator.addMethod("email", function(value, element) {
        // Email validation regex pattern
        return this.optional(element) || /^[^\s@]+@[^\s@]+\.(?:com|net|org|edu|gov|mil|biz|info|name|museum|coop|aero|[a-z]{2})$/.test(value);
      }, "Please Insert Valid Email Address");

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
  sanitizeInputField("#firstName1");
  sanitizeInputField("#lastName1");
  sanitizeInputField("#firstNameP");
  sanitizeInputField("#lastNameP");
  sanitizeInputField("#firstNames1");
  sanitizeInputField("#lastNameP1");
  

    $("#saveProfile").click(function (e) {
        $("#formProfile").validate({
            // Specify validation rules
            rules: {
                username: "required",
                personalEmail: {
                    required: true,
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
                religion: "required",
                race: "required",
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
                    rangelength: [9,9]
                },
                extensionNo: {
                    digits: true,
                },
            },

            messages: {
                username: "Please Insert Username",
                personalEmail: {
                    required: "Please Insert Personal Email",
                    email: "Please Insert Valid Email",
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
                phoneNo: {
                    required: "Please Insert Phone Number",
                    digits: "Please Insert Correct Phone Number Without ' - ' or Space",
                    rangelength: "Please Insert Valid Phone Number",
                },
                homeNo: {
                    digits: "Please Insert Correct Home Number Without ' - ' or Space",
                    rangelength: "Please Inset Valid Home Number"
                },
                extensionNo: {
                    digits: "Please Insert Correct Extension Number Without ' - ' or Space",
                },
            },
    submitHandler: function(form) {

        // requirejs(['sweetAlert2'], function(swal,swal1) {

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
                    var data = new FormData(document.getElementById("formProfile"));

                    $.ajax({
                        type: "POST",
                        url: "/updateEmployeeProfile",
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
                                // window.location.href = "/myProfile";
        
                            }
        
        
                        });
                    });
                }
                else {
                    Swal.showValidationMessage('<i class="fa fa-info-circle"></i> error')
                }
            },
                }).then((result) => {
            
                })

                // });
            }
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
                        url: "/updateEmployeeAddress",
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

    /////////////////////////////////////////////
    $('#saveEducation').click(function(e) {
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
                              url: "/addEmployeeEducation",
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
                    url: "/updateEmployeeEducation",
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
        
    for (let i = 1; i < educationIds.length; i++) {
        const type = educationIds[i];
        $('#educationModalEdit' + type).click(function(e) {
    
            id = $(this).data('id');
            var educationData = getEducation(id);
    
            educationData.done(function(data) {
                education = data.data;
                $('#educationFromDate1').val(education.FromDate);
                $('#educationToDate1').val(education.ToDate);
                $('#educationinstituteName1').val(education.instituteName);
                $('#educationhighestLevelAttained1').val(education.highestLevelAttained);
                $('#educationResult1').val(education.result);
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
                        url: "/deleteEmployeeEducation/" + id,
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
                url: "/getEducation/" + id
            });
        }
    }

    $('#saveOthers').click(function(e) {
        $("#addOthers").validate({
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
                                document.getElementById("addEmployeeOthers")
                            );

                            $.ajax({
                                type: "POST",
                                url: "/addEmployeeOthers",
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
                    url: "/updateEmployeeOthers",
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
        
    for (let i = 1; i < othersIds.length; i++) {
        const type = othersIds[i];
        $('#othersQualificationModalEdit' + type).click(function(e) {

            id = $(this).data('id');
            var othersData = getOthers(id);

            othersData.done(function(data) {
                othersQualification = data.data;
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
                        url: "/deleteEmployeeOthers/" + id,
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
                url: "/getEmployeeOthers/" + id
            });
        }
    }
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
                      url: "/addEmployeeAddressDetails",
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
                      url: "/updateEmployeeAddressDetails",
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
              url: "/getEmployeeAddressDetails/" + id,
          });
      }
  }

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

    /////////////////////////////////////////////

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
                    required: "Please Insert First Name",
                },
                lastName: {
                    required: "Please Insert Last Name",
                },
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
                                url: "/updateEmployeeEmergency",
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
                lastName_2: {
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
                                url: "/updateEmployeeEmergency",
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
                contactNo: {
                    digits: true,
                },
                age: {
                    required: true,
                    digits: true,
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
                contactNo: {
                    digits: "Please Insert Correct Contact Number Without ' - ' or Space",
                },
                age: {
                    required: "Please Insert Age",
                    digits: "Please Insert Correct Age",
                },
                address1: "Please Insert Address 1",
                city: "Please Insert City",
                state: "Please Choose State",
                country: "required",
                postcode: {
                    required: "Please Insert Postcode",
                    digits: "Please Insert Valid Postcode",
                    rangelength: "Please Insert Valid Postcode",
                },
            },
    submitHandler: function(form) {

        // requirejs(['sweetAlert2'], function(swal,swal1) {

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
                    var data = new FormData(document.getElementById("addCompanionForm"));

                    $.ajax({
                        type: "POST",
                        url: "/addEmployeeCompanion",
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
                                // window.location.href = "/myProfile";
        
                            }
        
        
                        });
                    });
                }
                else {
                    Swal.showValidationMessage('<i class="fa fa-info-circle"></i> error')
                }
            },
                }).then((result) => {
            
                })

                // });
            }
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
                        var data = new FormData(
                            document.getElementById("updateCompanionForm" + no)
                        );
    
                        $.ajax({
                            type: "POST",
                            url: "/updateEmployeeCompanion",
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
                                    // window.location.href = "/myProfile";
            
                                }
            
            
                            });
                        });
                    }
                    else {
                        Swal.showValidationMessage('<i class="fa fa-info-circle"></i> error')
                    }
                },
                    }).then((result) => {
                
                    })

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

    $("#childModalAdd").click(function (e) {
        $("#add-children").modal("show");
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
                maritalStatus: "required",
                DOBChild: "required",
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
                    rangelength: "Please Provide Valid Identification Number",
                },
                maritalStatus: "Please Choose Marital Status",
                DOBChild: "Please Enter Date Of Birth",
            },
    submitHandler: function(form) {

        // requirejs(['sweetAlert2'], function(swal,swal1) {

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
                    var data = new FormData(document.getElementById("addChildrenForm"));

                    $.ajax({
                        type: "POST",
                        url: "/addEmployeeChildren",
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
                                // window.location.href = "/myProfile";
        
                            }
        
        
                        });
                    });
                }
                else {
                    Swal.showValidationMessage('<i class="fa fa-info-circle"></i> error')
                }
            },
                }).then((result) => {
            
                })

                // });
            }
        });
    });

    $("#editChildren").click(function (e) {
        // requirejs(['sweetAlert2'], function(swal) {
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
                    var data = new FormData(document.getElementById("editChildrenForm"));

                    $.ajax({
                        type: "POST",
                        url: "/updateEmployeeChildren",
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
                                // window.location.href = "/myProfile";
        
                            }
        
        
                        });
                    });
                }
                else {
                    Swal.showValidationMessage('<i class="fa fa-info-circle"></i> error')
                }
            },
                }).then((result) => {
            
                })

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

            $('input').prop('disabled', true);
            $('select').prop('disabled', true);

            childrenData.done(function (data) {
                $("#viewChildren").hide();
                child = data.data;
                $("#DOB").val(child.DOB);
                $("#age").val(child.age);
                $("#created_at").val(child.created_at);
                $("#educationLevel").prop(
                    "selectedIndex",
                    child.educationLevel
                );
                $("#educationType").prop("selectedIndex", child.educationType);
                $("#expiryDate").val(child.expiryDate);
                $("#firstName").val(child.firstName);
                $("#fullName").val(child.fullName);
                $("#gender").prop("selectedIndex", child.gender);
                $("#id").val(child.id);
                $("#idNo").val(child.idNo);
                $("#instituition").val(child.instituition);
                $("#issuingCountry").val(child.issuingCountry);
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

    $("#tableSibling").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"],
        ],
    });

    $("#siblingModalAdd").click(function (e) {
        $("input").prop("disabled", false);
        $("select").prop("disabled", false);
        $("#add-sibling").modal("show");
    });

    $("#same-address4").change(function () {
        if (this.checked) {
            $("#address1sibling")
                .val($("#address-1").val())
                .prop("readonly", true);
            $("#address2sibling")
                .val($("#address-2").val())
                .prop("readonly", true);
            $("#postcodesibling")
                .val($("#postcode").val())
                .prop("readonly", true);
            $("#citysibling").val($("#city").val()).prop("readonly", true);
            $("#statesibling")
                .val($("#state").val())
                .css({
                    "pointer-events": "none",
                    "touch-action": "none",
                    background: "#e9ecef",
                });
            $("#countrysibling")
                .val($("#country").val())
                .css({
                    "pointer-events": "none",
                    "touch-action": "none",
                    background: "#e9ecef",
                });
        } else {
            $("#address1sibling").val($("").val()).prop("readonly", false);
            $("#address2sibling").val($("").val()).prop("readonly", false);
            $("#postcodesibling").val($("").val()).prop("readonly", false);
            $("#citysibling").val($("").val()).prop("readonly", false);
            $("#statesibling")
                .val($("").val())
                .css({
                    "pointer-events": "auto",
                    "touch-action": "auto",
                    background: "#ffffff",
                });
            $("#countrysibling")
                .val($("my").val())
                .css({
                    "pointer-events": "auto",
                    "touch-action": "auto",
                    background: "#ffffff",
                });
        }
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
                    required: "please Insert Valid Contact Number",
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
                        url: "/addEmployeeSibling",
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
                url: "/updateEmployeeSibling",
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
                    title: "Are you sure to delete Sibling?",
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
                gender: "required",
                contactNo: {
                    required: true,
                    digits: true,
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
                DOB: "Please Insert Date Of Birth",
                gender: "Please Choose Gender",
                contactNo: {
                    required: "Please Insert Contact Number",
                    digits: "Please Insert Valid Contact Number Without ' - ' And Space",
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
            submitHandler: function(form) {

        // requirejs(['sweetAlert2'], function(swal,swal1) {

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
                    var data = new FormData(document.getElementById("addParentForm"));

                    $.ajax({
                        type: "POST",
                        url: "/addEmployeeParent",
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
                                // window.location.href = "/myProfile";
        
                            }
        
        
                        });
                    });
                }
                else {
                    Swal.showValidationMessage('<i class="fa fa-info-circle"></i> error')
                }
            },
                }).then((result) => {
            
                })

                // });
            }

        });
    });

    $("#editParent").click(function (e) {
        // requirejs(['sweetAlert2'], function(swal) {
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
                    var data = new FormData(document.getElementById("editParentForm"));

                    $.ajax({
                        type: "POST",
                        url: "/updateEmployeeParent",
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
                                // window.location.href = "/myProfile";
        
                            }
        
        
                        });
                    });
                }
                else {
                    Swal.showValidationMessage('<i class="fa fa-info-circle"></i> error')
                }
            },
                }).then((result) => {
            
                })

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
                $("#genderP1").val(parent.gender);
                $("#firstNames1").val(parent.firstName);
                $("#postcodeP1").val(parent.postcode);
                $("#lastNameP1").val(parent.lastName);
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

    $(document).on("click", "#addVehicleView", function () {
        $("input").prop("disabled", false);
        $("select").prop("disabled", false);
        $("#add-vehicle").modal("show");
    });

    $(document).on("click", "#editVehicleView", function () {
        var id = $(this).data("id");
        var vehicleData = getVehicle(id);
        $("input").prop("disabled", false);
        $("select").prop("disabled", false);
        // $('#vehicleType').val('');

        vehicleData.done(function (data) {
            $("input").val("");

            vdata = data.data;
            $("#vehicleType").val(vdata.vehicle_type);
            $("#idV").val(vdata.id);
            // var select = document.getElementById('vehicleType');

            // const options = Array.from(select.options);
            // options.forEach((option, i) => {
            //     if (option.value === vdata.vehicle_type) select.selectedIndex = i;
            // });
            $("#plateNo").val(vdata.plate_no);
        });
        $("#edit-vehicle").modal("show");
    });

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

    $(document).on("click", "#deleteVehicle", function () {
        id = $(this).data("id");
        requirejs(["sweetAlert2"], function (swal) {
            swal({
                title: "Are you sure to delete Vehicle?",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
            }).then(function () {
                $.ajax({
                    type: "POST",
                    url: "/deleteVehicle/" + id,
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

    function getVehicle(id) {
        return $.ajax({
            url: "/getVehicleById/" + id,
        });
    }

    $("#saveVehicle").click(function (e) {
        requirejs(["sweetAlert2"], function (swal) {
            var data = new FormData(document.getElementById("addVehicleForm"));

            $.ajax({
                type: "POST",
                url: "/addEmployeeVehicle",
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

    $("#updateVehicle").click(function (e) {
        requirejs(["sweetAlert2"], function (swal) {
            var data = new FormData(
                document.getElementById("updateVehicleForm")
            );

            $.ajax({
                type: "POST",
                url: "/updateEmployeeVehicle",
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
    ///////
    
    $("#buttonhierarchy").click(function (e) {
        var id = $("#hierarchyid").val();
        
        $("#updatehierarchy").validate({
            
            // Specify validation rules
            rules: {
                eclaimrecommender: "required",
                eclaimapprover: "required",
                
                
            },

            messages: {
                eclaimrecommender: "Please Choose Recommender",
                eclaimapprover: "Please Choose Approver",
            },

            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("updatehierarchy")
                    );
                    var id = $("#hierarchyid").val();
                    //console.log(id);
                    // return false;

                    $.ajax({
                        type: "POST",
                        url: "/updateclaimhierarchy/" + id,
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
    
    $("#cahierarchybutton").click(function (e) {
        var id = $("#hierarchyid").val();
        //console.log(id);
        $("#updatecashhierarchy").validate({
            
            // Specify validation rules
            rules: {
                
                caapprover: "required",
                
                
            },

            messages: {
                
                caapprover: "Pleace Choose Approver",
            },

            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("updatecashhierarchy")
                    );
                    var id = $("#hierarchyid").val();
                    //console.log(id);
                    // return false;

                    $.ajax({
                        type: "POST",
                        url: "/updatecashhierarchy/" + id,
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

    $("#eleavehierarchy").click(function (e) {
        var id = $("#hierarchyid").val();
        //console.log(id);
        $("#updateeleavehierarchy").validate({
            
            // Specify validation rules
            rules: {
                
                eleaverecommender: "required",
                eleaveapprover: "required",
                
                
            },

            messages: {
                
                eleaverecommender: "Please Choose Recommender",
                eleaveapprover: "Please Choose Approver",
            },

            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("updateeleavehierarchy")
                    );
                    var id = $("#hierarchyid").val();
                    //console.log(id);
                    // return false;

                    $.ajax({
                        type: "POST",
                        url: "/updateeleavehierarchy/" + id,
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

    $("#updateEmp").click(function (e) {
        // id = $(this).data('id');

        var data = new FormData(document.getElementById("addEmpForm"));

        $("#addEmpForm").validate({
            // Specify validation rules
            rules: {
                company: "required",
                departmentId: "required",
                unitId: "required",
                branchId: "required",
                jobGrade: "required",
                designation: "required",
                employmentType: "required",
                // // supervisor: "required",

                joinedDate: "required",
            },

            messages: {
                company: "Please Insert Employee Company",
                departmentId: "Please Insert Employee Department",
                unitId: "Please Insert Employee Unit",
                branchId: "Please Insert Employee Branch",
                jobGrade: "Please Insert Employee Job Grade",
                designation: "Please Insert Employee Designation",
                employmentType: "Please Insert Employee Employment Type",
                // // supervisor: "Please Insert Your Supervisor",

                joinedDate: "Please Insert Employee Joined Date",
            },
            submitHandler: function (form) {
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
                            url: "/updateEmployee",
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
                                }
                            });
                        });
                    });
                });
            },
        });
    });

    //   oku checkbox myprofile
    $(".okuCheck").click(function(){
        if ($(this).prop("checked")) {
              
            $('#okucard').prop('readonly', false);
            $('#okuattach').css('pointer-events', 'auto');
        } else {
            $('#okucard').prop('readonly', true);
            $('#okuattach').css('pointer-events', 'none');
        }
      });

       //oku check companion
       $(".okuCheck1").click(function(){
        if ($(this).prop("checked")) {
              
            $('#okucard1').prop('readonly', false);
            $('#okuattach1').css('pointer-events', 'auto');
        } else {
            $('#okucard1').prop('readonly', true);
            $('#okuattach1').css('pointer-events', 'none');
        }
      });

      //oku check add children
      $(".okuCheck3").click(function(){
        if ($(this).prop("checked")) {
              
            $('#okucard3').prop('readonly', false);
            $('#okuattach3').css('pointer-events', 'auto');
        } else {
            $('#okucard3').prop('readonly', true);
            $('#okuattach3').css('pointer-events', 'none');
        }
      });

      //oku check update children
      $(".okuCheck4").click(function(){
        if ($(this).prop("checked")) {
              
            $('#okucard4').prop('readonly', false);
            $('#okuattach4').css('pointer-events', 'auto');
        } else {
            $('#okucard4').prop('readonly', true);
            $('#okuattach4').css('pointer-events', 'none');
        }
      });

      //add child
    $(".partCheck6").click(function () {
        if ($(this).prop("checked")) {
            $("#idno6").prop("readonly", true);
            $("#DOBaddparent").prop("readonly", false);
            $("#DOBaddparent").css("pointer-events", "auto");
            $("#idno6").val("");
            $("#age6").prop("readonly", false);
            $("#gender6").css({
                "pointer-events": "auto",
                "touch-action": "auto",
                background: "#ffffff",
            });
        } else {
            $("#idno6").prop("readonly", false);
            $("#DOBaddparent").prop("readonly", true);
            $("#DOBaddparent").css("pointer-events", "none");
            $("#passport6").val("");
            $("#expirydate6").val("");
            $("#expirydate6").prop("readonly", true);
            $("#expirydate6").css("pointer-events", "none");
            $("#gender6").css({
                "pointer-events": "none",
                "touch-action": "none",
                background: "#e9ecef",
            });
            $("#age6").prop("readonly", true);
        }
    });

    $("#idno6").change(function () {
        if ($(this).val().length == 12) {
            var idn = $(this).val();
            var year = "19".concat(idn.substring(0, 2));
            var month = idn.substring(2, 4);
            var day = idn.substring(4, 6);
            $("#DOBaddparent").val(year + "-" + month + "-" + day);
        }
    });

    $("#idno6").change(function () {
        if ($(this).val().length == 12) {
            var idn = $(this).val();

            var lastIc = idn.substring(10, 12);

            if (lastIc % 2 == 0) {
                $("#gender6").val(2);
            } else {
                $("#gender6").val(1);
            }
        }
    });

    $("#idno6").change(function () {
        if ($(this).val().length == 12) {
            var idn = $(this).val();
            var year = idn.substring(0, 2);

            var cutoff = new Date().getFullYear() - 2000; //2022-2000=22cutoff
           
            var ww = (year > cutoff ? "19" : "20") + year;
            var currentAge = new Date().getFullYear() - ww;
            $("#age6").val(currentAge);
        }
    });

    //update child
    $(".partCheck7").click(function () {
        if ($(this).prop("checked")) {
            $("#idno7").prop("readonly", true);
            $("#DOBP1").prop("readonly", false);
            $("#DOBP1").css("pointer-events", "auto");
            $("#idno7").val("");
            $("#age7").prop("readonly", false);
            $("#genderP1").css({
                "pointer-events": "auto",
                "touch-action": "auto",
                background: "#ffffff",
            });
        } else {
            $("#idno7").prop("readonly", false);
            $("#DOBP1").prop("readonly", true);
            $("#DOBP1").css("pointer-events", "none");
            $("#passport7").val("");
            $("#expirydate7").val("");
            $("#expirydate7").prop("readonly", true);
            $("#expirydate7").css("pointer-events", "none");
            $("#genderP1").css({
                "pointer-events": "none",
                "touch-action": "none",
                background: "#e9ecef",
            });
            $("#age7").prop("readonly", true);
        }
    });

    $("#idno7").change(function () {
        if ($(this).val().length == 12) {
            var idn = $(this).val();
            var year = "19".concat(idn.substring(0, 2));
            var month = idn.substring(2, 4);
            var day = idn.substring(4, 6);
            $("#DOBP1").val(year + "-" + month + "-" + day);
        }
    });

    $("#idno7").change(function () {
        if ($(this).val().length == 12) {
            var idn = $(this).val();

            var lastIc = idn.substring(10, 12);

            if (lastIc % 2 == 0) {
                $("#genderP1").val(2);
            } else {
                $("#genderP1").val(1);
            }
        }
    });

    $("#idno7").change(function () {
        if ($(this).val().length == 12) {
            var idn = $(this).val();
            var year = idn.substring(0, 2);

            var cutoff = new Date().getFullYear() - 2000; //2022-2000=22cutoff
           
            var ww = (year > cutoff ? "19" : "20") + year;
            var currentAge = new Date().getFullYear() - ww;
            $("#age7").val(currentAge);
        }
    });
});
function dataURLtoFile(dataurl, filename) {
    var arr = dataurl.split(','),
        mime = arr[0].match(/:(.*?);/)[1],
        bstr = atob(arr[1]), 
        n = bstr.length, 
        u8arr = new Uint8Array(n);
        
    while(n--){
        u8arr[n] = bstr.charCodeAt(n);
    }
    
    return new File([u8arr], filename, {type:mime});
}
//console.log(file);

$(document).on("click", "#uploadpicture", function() {
    var user_id = $("#user_id").val();
    var fileExtension = ".jpg";
    var filename = user_id + fileExtension;
    var fileUpload = dataURLtoFile($("#result_image img").attr('src'), filename);


    $("#profilepicform").validate({
        // Specify validation rules
        rules: {
            // Add validation rules for each form field
            profile_picture: {
                required: true,
                // Add any additional validation rules for the profile picture field
            },
        },

        messages: {
            // Add custom error messages for each form field
        },

        submitHandler: function(form) {
            requirejs(['sweetAlert2'], function(swal) {
                var data = new FormData(document.getElementById("profilepicform"));
                data.append('uploadFile', fileUpload)
                console.log($("#result_image img").attr('src'))
                var id = $('#user_id').val();
                console.log(id);
                $.ajax({
                    type: "POST",
                    url: "/updateProfile_Picture/" + id,
                    data: data,
                    dataType: "json",
                    async: true,
                    processData: false,
                    contentType: false,
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
                            // Handle error condition
                        } else {
                            location.reload();
                        }
                    });
                });
            });
        }
    });
});