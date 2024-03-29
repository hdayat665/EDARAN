$(document).ready(function () {
let croppie;
let croppedImageShown = false;

$("#eleaverecommender").select2();
$("#eleaveapprover").select2();

$("#eclaimrecommender").select2();
$("#eclaimapprover").select2();

$("#caapprover").select2();

$("#tsapprover").select2();
$("#tsapprover2").select2();

$('#role').select2();
$('#companyForEmployment').select2();
$('#departmentShow').select2({
    placeholder: "<span style='color: black;'>PLEASE CHOOSE</span>",
    escapeMarkup: function(markup) {
    return markup
    },
});
$('#unitShow').select2({
    placeholder: "<span style='color: black;'>PLEASE CHOOSE</span>",
    escapeMarkup: function(markup) {
    return markup
    },
});
$('#branchShow').select2({
    placeholder: "<span style='color: black;'>PLEASE CHOOSE</span>",
    escapeMarkup: function(markup) {
    return markup
    },
});
$('#jobGrade').select2();
$('#designation').select2();
$('#employmentType').select2();
$('#reporttoo').select2();
$('#event-id').select2();

$("#data-table-default").dataTable({
    responsive: true,
    bLengthChange: false,
    bFilter: true,
    initComplete: function (settings, json) {
        $("#data-table-default").wrap(
            "<div style='overflow:auto; width:100%;position:relative;'></div>"
        );
    },
});
$(".vehi").hide();
$(document).on("click", ".dropdown-toggle", function(e) {
    e.stopPropagation(); // mencegah event dari bubbling ke atas
    var dropdownMenu = $(this).closest(".btn-group").find(".vehi");
    $(".vehi").not(dropdownMenu).hide();
    dropdownMenu.toggle();
});
$(document).on("click", function(e) {
    if (!$(".btn-group").is(e.target) && $(".btn-group").has(e.target).length === 0) {
        $(".vehi").hide();
    }
});

function initializeCroppie(src) {
    if (croppie) {
        croppie.destroy();
    }

    $("#croppie img").attr("src", src);

    croppie = new Croppie($("#croppie img")[0], {
        boundary: { width: 410, height: 410 },
        viewport: {
            width: 350,
            height: 350,
            type: "square",
        },
        name: "profilePicture",
    });
}

$("#edit-profile-picture").on("change", function () {
    if (this.files && this.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            initializeCroppie(e.target.result);
            $("#showImage").show();
            $("#showCroppedImage").hide();
            croppedImageShown = false;
        };
        reader.readAsDataURL(this.files[0]);
    }
});

$("#crop").on("click", function () {
    if (croppie) {
        croppie.result({ type: "base64", circle: false }).then(function (dataImg) {
            $("#result_image img").attr("src", dataImg);
            $("#showCroppedImage").show();
            $("#showImage").hide();
            croppedImageShown = true;

            $('#uploadpicture').show();
            $('#uploadcancel').show();

            $("#edit-profile-picture").val("");
        });
    } else {
        console.error("Croppie instance not found.");
    }
});

$("#edit-profile-picture").on("click", function () {
    if (croppedImageShown) {
        $("#showCroppedImage").hide();
        croppedImageShown = false;
    }
});


    $("#idNo").change(function () {
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

    $("#idNo").change(function () {
        if ($(this).val().length == 12) {
            var idn = $(this).val();
            var year = idn.substring(0, 2);

            var cutoff = new Date().getFullYear() - 2000;

            var ww = (year > cutoff ? "19" : "20") + year;
            var currentAge = new Date().getFullYear() - ww;
            $("#age2").val(currentAge);
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

    $("#firstname,#lastname").change(function () {
        var a = $("#firstname").val();
        var b = $("#lastname").val();
        $("#fullname").val(a + " " + b);
    });

    $('#firstname,#lastname').keypress(function (e) {
        var txt = String.fromCharCode(e.which);
        if (txt.match(/[A-Za-z0-9&. ]/)) {
            return false;
        }
    });

    $("#childgender").css({
        "pointer-events": "none",
        "touch-action": "none",
        background: "#e9ecef",
    });

    $("#firstnamemc,#lastnamemc").change(function () {
        var a = $("#firstnamemc").val();
        var b = $("#lastnamemc").val();
        $("#fullnamemc").val(a + " " + b);
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


    $("#idNo1").change(function () {
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

    //New Children
    $(".partCheck4").click(function () {
        if ($(this).prop("checked")) {
            $("#idNoaddChild").prop("readonly", true);
            $("#idNoaddChild").val("");

            $("#DOBChild").prop("readonly", false);
            $("#DOBChild").css("pointer-events", "auto");

            $("#ageChild").prop("readonly", false);

            $("#passportChild").prop("readonly", false);

            $("#childgender").css({
                "pointer-events": "auto",
                "touch-action": "auto",
                background: "#ffffff",
            });

            $("#issuingCountryChild").prop("readonly", false);
            $("#issuingCountryChild").css("pointer-events", "auto");
        } else {
            $("#idNoaddChild").prop("readonly", false);

            $("#DOBChild").prop("readonly", true);
            $("#DOBChild").css("pointer-events", "none");

            $("#passportChild").val("");
            $("#passportChild").prop("readonly", false);

            $("#expiryDateChild").val("");
            $("#expiryDateChild").prop("readonly", true);
            $("#expiryDateChild").css("pointer-events", "none");

            $("#childgender").css({
                "pointer-events": "none",
                "touch-action": "none",
                background: "#e9ecef",
            });
            $("#ageChild").prop("readonly", true);

            $("#issuingCountryChild").prop("readonly", true);
            $("#issuingCountryChild").css("pointer-events", "none");
        }
    });

    // Update Children Details
    if ($("#passport").val() !== "") {
        // Enable expiration date and passport country fields
        $("#expirydate").prop("disabled", false);
        $("#expirydate").css("pointer-events", "auto");
        $("#issuingCountry").prop("disabled", false);
        $("#issuingCountry").css("pointer-events", "auto");
    } else {
        // Disable expiration date and passport country fields
        $("#expirydate").prop("disabled", true);
        $("#expirydate").css("pointer-events", "none");
        $("#expirydate").val("");
        $("#issuingCountry").prop("disabled", true);
        $("#issuingCountry").css("pointer-events", "none");
        $("#issuingCountry").val("");
    }


    $("#passport").change(function () {
        if ($("#passport").val() !== "") {
            // Enable expiration date and passport country fields
            $("#expirydate").prop("disabled", false);
            $("#expirydate").css("pointer-events", "auto");
            $("#issuingCountry").prop("disabled", false);
            $("#issuingCountry").css("pointer-events", "auto");
        } else {
            // Disable expiration date and passport country fields
            $("#expirydate").prop("disabled", true);
            $("#expirydate").css("pointer-events", "none");
            $("#expirydate").val("");
            $("#issuingCountry").prop("disabled", true);
            $("#issuingCountry").css("pointer-events", "none");
            $("#issuingCountry").val("");
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

    $("#passportparentedit").change(function () {
        if ($("#passportparentedit").val() !== "") {
            $("#expirydate7").prop("disabled", false);
            $("#expirydate7").css("pointer-events", "auto");

            $("#issuingCountry7").prop("disabled", false);
            $("#issuingCountry7").css("pointer-events", "auto");
        } else {
            $("#expirydate7").prop("disabled", true);
             $("#expirydate7").css("pointer-events", "none");
             $("#expirydate7").val("");

             $("#issuingCountry7").prop("disabled", true);
             $("#issuingCountry7").css("pointer-events", "none");
             $("#issuingCountry7").val("");
        }
    });

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
        $("#expiryDate1").val("");
        $("#expiryDate1").prop("readonly", true);
        $("#expiryDate1").css("pointer-events", "none");
        $("#nonCitizen1").prop("checked", false);
    }

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

    $(".mcdetaildrop").css({ "pointer-events": "none", background: "#e9ecef" });
    $(".partChecks").click(function () {
        if ($(this).prop("checked")) {
            $(".mcdetail").prop("readonly", false);
            $(".mcdetaildesignation").prop("disabled", false);
            $(".mcdetaildrop").css({
                "pointer-events": "auto",
                background: "#ffffff",
            });
        } else {
            $(".mcdetail").prop("readonly", true);
            $(".mcdetaildesignation").prop("disabled", true);

            $(".mcdetaildrop").css({
                "pointer-events": "none",
                background: "#e9ecef",
            });
        }
    });


    $(".partChecks").click(function () {
        if ($(this).prop("checked")) {
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

    $("#expiryDateChild").datepicker({
        todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true,
    });
    $("#DOBChild").datepicker({
        todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true,
    });
    $("#dobsibling").datepicker({
        todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true,
    });
    $("#DOBS").datepicker({
        todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true,
    });
    $("#expirydate6").datepicker({
        todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true,
    });

    $("#passportChild").change(function () {
        if ($("#expiryDateChild").prop("readonly")) {
            $("#expiryDateChild").prop("readonly", false);
            $("#expiryDateChild").prop("disabled", false);
            $("#expiryDateChild").css("pointer-events", "auto");

            $("#issuingCountryChild").prop("readonly", false);
            $("#issuingCountryChild").prop("disabled", false);
            $("#issuingCountryChild").css("pointer-events", "auto");

        } else {
            $("#expiryDateChild").prop("readonly", true);
            $("#expiryDateChild").prop("disabled", true);
            $("#expiryDateChild").css("pointer-events", "none");
            $("#expiryDateChild").val("");

            $("#issuingCountryChild").prop("readonly", true);
            $("#issuingCountryChild").prop("disabled", true);
            $("#issuingCountryChild").css("pointer-events", "none");
            $("#issuingCountryChild").val("");
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
            $("#age2").val(currentAge);
        }
    });

    /////edit employee
    $("#idnumber").change(function () {
        if ($(this).val().length == 12) {
            var idn = $(this).val();
            var year = "19".concat(idn.substring(0, 2));
            var month = idn.substring(2, 4);
            var day = idn.substring(4, 6);
            $("#dob").val(year + "-" + month + "-" + day);
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

    ////update companion
    $("#idnumber2s").change(function () {
        if ($(this).val().length == 12) {
            var idn = $(this).val();
            var year = idn.substring(0, 2);
            var month = idn.substring(2, 4);
            var day = idn.substring(4, 6);

            var cutoff = new Date().getFullYear() - 2000;

            $("#dobs").val(
                (year > cutoff ? "19" : "20") + year + "-" + month + "-" + day
            );
        }
    });

    $("#idnumber2s").change(function () {
        if ($(this).val().length == 12) {
            var idn = $(this).val();
            var year = idn.substring(0, 2);

            var cutoff = new Date().getFullYear() - 2000;

            var ww = (year > cutoff ? "19" : "20") + year;
            var currentAge = new Date().getFullYear() - ww;
            $("#age2s").val(currentAge);
        }
    });


    $("#stateEmc").css({ "pointer-events": "none", background: "#e9ecef" });
    $("#countryEmc").css({ "pointer-events": "none", background: "#e9ecef" });

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

    $("#expirydatemcs").datepicker({
        todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true,
    });
    $("#dommcs").datepicker({
        todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true,
    });

    $(".partCheck3").click(function () {
        if ($(this).prop("checked")) {
            $("#designationmc").prop("readonly", false);
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
            $("#idnumber2").val("");

            $("#dob").prop("readonly", false);
            $("#dob").css("pointer-events", "auto");

            $("#passportmc").prop("readonly", false);
            $("#passportmc").css("pointer-events", "auto");

            $("#age2").prop("readonly", true);
            $("#age2").val("");

            $("#expirydatemc").prop("disabled", true);
            $("#issuingCountry2").prop("disabled", true);
        } else {
            $("#idnumber2").prop("readonly", false);

            $("#dob").prop("readonly", true);
            $("#dob").css("pointer-events", "none");

            $("#passportmc").val("");
            $("#passportmc").prop("readonly", false);
            $("#passportmc").css("pointer-events", "auto");

            $("#expirydatemc").val("");
            $("#expirydatemc").prop("readonly", true);
            $("#expirydatemc").css("pointer-events", "none");
            $("#expirydatemc").prop("disabled", true);
            $("#issuingCountry2").prop("disabled", true);

            $("#age2").prop("readonly", false);
        }
    });

    $("#passportmc").change(function () {
        if ($("#expirydatemc").prop("readonly")) {
            $("#expirydatemc").prop("readonly", false);
            $("#expirydatemc").css("pointer-events", "auto");
            $("#expirydatemc").prop("disabled", false);

            $("#issuingCountry2").prop("disabled", false);
            $("#issuingCountry2").css("pointer-events", "auto");
        } else {
            $("#expirydatemc").prop("readonly", true);
            $("#expirydatemc").css("pointer-events", "none");
            $("#expirydatemc").val("");
            $("#expirydatemc").prop("disabled", false);

            $("#issuingCountry2").prop("disabled", false);
            $("#issuingCountry2").css("pointer-events", "auto");
            $("#issuingCountry2").val("");
        }
    });

    $(".partCheck2s").click(function () {
        if ($(this).prop("checked")) {
            $("#idnumber2s").prop("readonly", true);
            $("#idnumber2s").val("");

            $("#dobs").prop("readonly", false);
            $("#dobs").css("pointer-events", "auto");

            $("#expirydatemcs").prop("readonly", false);
            $("#expirydatemcs").css("pointer-events", "auto");


            $("#issuingCountry2s").prop("readonly", false);
            $("#issuingCountry2s").css("pointer-events", "auto");

            $("#age2s").prop("readonly", true);
            $("#age2s").val("");
        } else {
            $("#idnumber2s").prop("readonly", false);

            $("#dobs").prop("readonly", true);
            $("#dobs").css("pointer-events", "none");

            $("#passportmcs").val("");

            $("#expirydatemcs").prop("readonly", true);
            $("#expirydatemcs").css("pointer-events", "none");
            $("#expirydatemcs").val("");


            $("#issuingCountry2s").val("");
            $("#issuingCountry2s").prop("readonly", true);
            $("#issuingCountry2s").css("pointer-events", "none");

            $("#age2s").prop("readonly", false);
        }
    });

    $("#passportmcs").change(function () {
        if ($("#expirydatemcs").prop("readonly")) {
            $("#expirydatemcs").prop("readonly", false);
            $("#expirydatemcs").css("pointer-events", "auto");
            $("#expirydatemcs").prop("disabled", false);

            $("#issuingCountry2").prop("disabled", false);
            $("#issuingCountry2").css("pointer-events", "auto");
        } else {
            $("#expirydatemcs").prop("readonly", true);
            $("#expirydatemcs").css("pointer-events", "none");
            $("#expirydatemcs").val("");
            $("#expirydatemcs").prop("disabled", false);

            $("#issuingCountry2s").prop("disabled", false);
            $("#issuingCountry2s").css("pointer-events", "auto");
            $("#issuingCountry2s").val("");
        }
    });

    $("#datepicker-fromdate").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy-mm-dd",
    });

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


    $("#datepicker-others").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy-mm-dd",
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
        format: "yyyy-mm-dd",
        autoclose: true,
    });

    $("#datepicker-joindate").datepicker({
        todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true,
    });

    $("#dob").datepicker({
        todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true,
    });

    $("#expirydate").datepicker({
        todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true,
    });

    $("#DOBaddparent").datepicker({
        todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true,
    });

    $("#DOBP1").datepicker({
        todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true,
    });

    //new add family address
    $("#same-address2").change(function () {
        if (this.checked) {
            $("#address1parent")
                .val($("#address-1").val())
                .prop("readonly", true);
            $("#address2parent")
                .val($("#address-2").val())
                .prop("readonly", true);
            $("#postcodeparent")
                .val($("#postcode_id").val())
                .prop("readonly", true);
            $("#cityparent").val($("#city_id").val()).prop("readonly", true).css({
                "pointer-events": "none",
                "touch-action": "none",
                background: "#e9ecef",
            });
            $("#stateparent")
                .val($("#state_id").val())
                .prop("readonly", true)
                .css({
                    "pointer-events": "none",
                    "touch-action": "none",
                    background: "#e9ecef",
                });
            $("#countryparent")
                .val($("#country_id").val())
                .prop("readonly", true)
                .css({
                    "pointer-events": "none",
                    "touch-action": "none",
                    background: "#e9ecef",
                });

            // Fetch permanent address from userAddress table if available
            var id = document.getElementById("user_id").value;
            // console.log(id);
            // return false;
            var getEmployeeAddressforParentx = getEmployeeAddressforParent(id);
            //console.log(id);

            getEmployeeAddressforParentx
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
                            $("#address1parent").val(permanentAddress1);
                            $("#address2parent").val(permanentAddress2);
                            $("#postcodeparent").val(permanentPostcode);
                            $("#cityparent").val(permanentCity);
                            $("#stateparent").val(permanentState);
                            $("#countryparent").val(permanentCountry);

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
            $("#address1parent")
                .val($("#address-1").val())
                .prop("readonly", true);
            $("#address2parent")
                .val($("#address-2").val())
                .prop("readonly", true);
            $("#postcodeparent")
                .val($("#postcode_id").val())
                .prop("readonly", true);
            $("#cityparent").val($("#city_id").val()).css({
                "pointer-events": "none",
                "touch-action": "none",
                background: "#e9ecef",
            });
            $("#stateparent").val($("#state_id").val()).css({
                "pointer-events": "none",
                "touch-action": "none",
                background: "#e9ecef",
            });
            $("#countryparent").val($("#country_id").val()).css({
                "pointer-events": "none",
                "touch-action": "none",
                background: "#e9ecef",
            });
        } else {
            $("#address1parent").prop("readonly", false);
            $("#address2parent").prop("readonly", false);
            $("#postcodeparent").prop("readonly", false);
            $("#cityparent").prop("readonly", false).css({
                "pointer-events": "auto",
                "touch-action": "auto",
                background: "none",
            });
            $("#stateparent").prop("readonly", false).css({
                "pointer-events": "auto",
                "touch-action": "auto",
                background: "none",
            });
            $("#countryparent").prop("readonly", false).css({
                "pointer-events": "auto",
                "touch-action": "auto",
                background: "none",
            });
            // $("#address1parent").val($("").val()).prop("readonly", false);
            // $("#address2parent").val($("").val()).prop("readonly", false);
            // $("#postcodeparent").val($("").val()).prop("readonly", false);
            // $("#cityparent").val($("").val()).prop("readonly", false);
            // $("#statec").val($("").val()).prop("disabled", false);
            // $("#countryc").val($("1").val()).prop("disabled", false);
            $("#address1parent").val($("").val()).prop("readonly", false);
            $("#address2parent").val($("").val()).prop("readonly", false);
            $("#postcodeparent").val($("").val()).prop("readonly", false);
            $("#cityparent").val($("").val()).css({
                "pointer-events": "auto",
                "touch-action": "auto",
                background: "#ffffff",
            });
            $("#stateparent").val($("").val()).css({
                "pointer-events": "auto",
                "touch-action": "auto",
                background: "#ffffff",
            });
            $("#countryparent").val($("").val()).css({
                "pointer-events": "auto",
                "touch-action": "auto",
                background: "#ffffff",
            });
        }
    });

    $("#same-addressEditParent").change(function () {
        if (this.checked) {
            $("#address1P1")
                .val($("#address-1").val())
                .prop("readonly", true);
            $("#address2P1")
                .val($("#address-2").val())
                .prop("readonly", true);
            $("#postcodeP1")
                .val($("#postcode_id").val())
                .prop("readonly", true);
            $("#cityP1").val($("#city_id").val()).prop("readonly", true).css({
                "pointer-events": "none",
                "touch-action": "none",
                background: "#e9ecef",
            });
            $("#stateP1")
                .val($("#state_id").val())
                .prop("readonly", true)
                .css({
                    "pointer-events": "none",
                    "touch-action": "none",
                    background: "#e9ecef",
                });
            $("#countryP1")
                .val($("#country_id").val())
                .prop("readonly", true)
                .css({
                    "pointer-events": "none",
                    "touch-action": "none",
                    background: "#e9ecef",
                });

            // Fetch permanent address from userAddress table if available
            var id = document.getElementById("user_id").value;
            // console.log(id);
            // return false;
            var getEmployeeAddressforParentx = getEmployeeAddressforParent(id);
            //console.log(id);

            getEmployeeAddressforParentx
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
                            $("#countryP1").val(permanentCountry);

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
            $("#address1P1")
                .val($("#address-1").val())
                .prop("readonly", true);
            $("#address2P1")
                .val($("#address-2").val())
                .prop("readonly", true);
            $("#postcodeP1")
                .val($("#postcode_id").val())
                .prop("readonly", true);
            $("#cityP1").val($("#city_id").val()).css({
                "pointer-events": "none",
                "touch-action": "none",
                background: "#e9ecef",
            });
            $("#stateP1").val($("#state_id").val()).css({
                "pointer-events": "none",
                "touch-action": "none",
                background: "#e9ecef",
            });
            $("#countryP1").val($("#country_id").val()).css({
                "pointer-events": "none",
                "touch-action": "none",
                background: "#e9ecef",
            });
        } else {
            $("#address1P1").prop("readonly", false);
            $("#address2P1").prop("readonly", false);
            $("#postcodeP1").prop("readonly", false);
            $("#cityP1").prop("readonly", false).css({
                "pointer-events": "auto",
                "touch-action": "auto",
                background: "none",
            });
            $("#stateP1").prop("readonly", false).css({
                "pointer-events": "auto",
                "touch-action": "auto",
                background: "none",
            });
            $("#countryP1").prop("readonly", false).css({
                "pointer-events": "auto",
                "touch-action": "auto",
                background: "none",
            });
            // $("#address1parent").val($("").val()).prop("readonly", false);
            // $("#address2parent").val($("").val()).prop("readonly", false);
            // $("#postcodeparent").val($("").val()).prop("readonly", false);
            // $("#cityparent").val($("").val()).prop("readonly", false);
            // $("#statec").val($("").val()).prop("disabled", false);
            // $("#countryc").val($("1").val()).prop("disabled", false);
            $("#address1P1").val($("").val()).prop("readonly", false);
            $("#address2P1").val($("").val()).prop("readonly", false);
            $("#postcodeP1").val($("").val()).prop("readonly", false);
            $("#cityP1").val($("").val()).css({
                "pointer-events": "auto",
                "touch-action": "auto",
                background: "#ffffff",
            });
            $("#stateP1").val($("").val()).css({
                "pointer-events": "auto",
                "touch-action": "auto",
                background: "#ffffff",
            });
            $("#countryP1").val($("").val()).css({
                "pointer-events": "auto",
                "touch-action": "auto",
                background: "#ffffff",
            });
        }
    });

    function getEmployeeAddressforParent(id) {
        return $.ajax({
            url: "/getEmployeeAddressforParent/" + id,
        });
    }

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
    $("#same-address6").change(function () {
        if (this.checked) {
            $("#address-1c").val($("#address-1").val()).prop("readonly", true);
            $("#address-2c").val($("#address-2").val()).prop("readonly", true);
            $("#postcodec").val($("#postcode_id").val()).prop("readonly", true);
            $("#cityc").val($("#city_id").val()).prop("readonly", true);

            $("#statec").val($("#state_id").val()).css({ "pointer-events": "none", background: "#e9ecef" });

            $("#countryc").val($("#country_id").val()).prop("readonly", true).css({
                "pointer-events": "none",
                "touch-action": "none",
                background: "#e9ecef",
            });
            var id = document.getElementById("user_id").value;

            // Fetch permanent address from userAddress table if available

            // console.log(id);
            // return false;
            var getEmployeeAddressforCompanionx =
                getEmployeeAddressforCompanion(id);
            console.log(id);

            getEmployeeAddressforCompanionx
                .then(function (data) {
                    if (data) {
                        var permanentAddress1 = data.data.address1;
                        var permanentAddress2 = data.data.address2;
                        var permanentPostcode = data.data.postcode;
                        var permanentCity = data.data.city;
                        var permanentState = data.data.state;
                        var permanentCountry = data.data.country;
                        console.log(data);

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



                        }
                    }
                })
                .fail(function (xhr, status, error) {
                    console.log("Error fetching permanent address: " + error);
                });
        } else {
            $("#address-1c").val($("").val()).prop("readonly", false);
            $("#address-2c").val($("").val()).prop("readonly", false);
            $("#postcodec").val($("").val()).prop("readonly", false);
            $("#cityc").val($("").val()).prop("readonly", false);
            $("#statec").val($("").val()).prop("disabled", false).css({ "pointer-events": "auto", background: "none" });
            $("#countryc").val($("")
            .val("MY"))
            .prop("disabled", false)
            .prop("readonly", false).css({
                "pointer-events": "auto",
                "touch-action": "auto",
                background: "none",
            })
        }
    });

    $("#same-address").change(function () {
        if (this.checked) {
            $("#address-1c").val($("#address-1").val()).prop("readonly", true);
            $("#address-2c").val($("#address-2").val()).prop("readonly", true);
            $("#postcodec").val($("#postcode_id").val()).prop("readonly", true);
            $("#cityc").val($("#city_id").val()).prop("readonly", true);

            $("#statec").val($("#state_id").val()).css({ "pointer-events": "none", background: "#e9ecef" });

            $("#countryc").val($("#country_id").val()).prop("readonly", true).css({
                "pointer-events": "none",
                "touch-action": "none",
                background: "#e9ecef",
            });
            var id = document.getElementById("user_id").value;

            // Fetch permanent address from userAddress table if available

            // console.log(id);
            // return false;
            var getEmployeeAddressforCompanionx =
                getEmployeeAddressforCompanion(id);
            console.log(id);

            getEmployeeAddressforCompanionx
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
                            $("#address-1c").val(permanentAddress1);
                            $("#address-2c").val(permanentAddress2);
                            $("#postcodec").val(permanentPostcode);
                            $("#cityc").val(permanentCity);
                            $("#statec").val(permanentState);
                            $("#countryc").val(permanentCountry);

                            var select2Elements = "#postcodec, #cityc, #statec, #countryc";
                            $(select2Elements).select2({
                                placeholder: "PLEASE CHOOSE",
                                allowClear: true,
                            });

                            $(select2Elements).val([permanentPostcode, permanentCity, permanentState, permanentCountry]).trigger("change");

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
            $("#address-1c").val($("").val()).prop("readonly", false);
            $("#address-2c").val($("").val()).prop("readonly", false);
            $("#postcodec").val($("").val()).prop("readonly", false);
            $("#cityc").val($("").val()).prop("readonly", false);
            $("#statec").val($("").val()).prop("disabled", false).css({ "pointer-events": "auto", background: "none" });
            $("#countryc").val($("")
            .val("MY"))
            .prop("disabled", false)
            .prop("readonly", false).css({
                "pointer-events": "auto",
                "touch-action": "auto",
                background: "none",
            })
        }
    });


    $("#same-address3").change(function () {
        if (this.checked) {
            $("#address1P1").val($("#address-1").val()).prop("readonly", true);
            $("#address2P1").val($("#address-2").val()).prop("readonly", true);
            $("#postcodeP1").val($("#postcode_id").val()).prop("readonly", true);
            $("#cityP1").val($("#city_id").val()).css({ "pointer-events": "none", background: "#e9ecef" });

            $("#stateP1").val($("#state_id").val()).css({ "pointer-events": "none", background: "#e9ecef" });

            $("#countryP1").val($("#country_id").val()).prop("readonly", true).css({
                "pointer-events": "none",
                "touch-action": "none",
                background: "#e9ecef",
            });

            // Fetch permanent address from userAddress table if available
            var id = document.getElementById("user_id").value;
            // console.log(id);
            // return false;
            var getEmployeeAddressforCompanionx =
                getEmployeeAddressforCompanion(id);
            //console.log(id);

            getEmployeeAddressforCompanionx
                .then(function (data) {
                    if (data) {
                        var permanentAddress1 = data.data.address1;
                        var permanentAddress2 = data.data.address2;
                        var permanentPostcode = data.data.postcode;
                        var permanentCity = data.data.city;
                        var permanentState = data.data.state;
                        var permanentCountry = data.data.country;
                        console.log(data);

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
                            $("#countryP1").val(permanentCountry);



                        }
                    }
                })
                .fail(function (xhr, status, error) {
                    console.log("Error fetching permanent address: " + error);
                });
        } else {
            $("#address1P1").val($("").val()).prop("readonly", false);
            $("#address2P1").val($("").val()).prop("readonly", false);
            $("#postcodeP1").val($("").val()).prop("readonly", false);
            $("#cityP1").val($("").val()).prop("readonly", false);
            $("#stateP1").val($("").val()).prop("disabled", false);
            $("#countryP1").val($("1").val()).prop("disabled", false);
        }
    });
    function getEmployeeAddressforCompanion(id) {
        return $.ajax({
            url: "/getEmployeeAddressforCompanion/" + id,
        });
    }

    if ($(".partCheck").is(":checked")) {
        $("#idnumber").prop("disabled", true);
        $("#dob").prop("readonly", false);
        $("#dob").css("pointer-events", "auto");
        $("#idnumber").val("");
        $("#gender").prop("readonly", false);
        $("#gender").css({
            "pointer-events": "auto",
            background: "none"});
    } else {
        $("#idnumber").prop("disabled", false);
        $("#dob").prop("readonly", true);
        $("#dob").css("pointer-events", "auto");
        $("#dob").css("pointer-events", "none");
        $("#gender").prop("readonly", true);
        $("#gender").css({
            "pointer-events": "none",
            background: "#e9ecef"});
    }

    $(".partCheck").click(function () {
        if ($(this).prop("checked")) {
            $("#idnumber").prop("disabled", true);
            $("#dob").val("").prop("readonly", false);
            $("#dob").css("pointer-events", "auto");
            $("#idnumber").val("");
            $("#gender").val("").prop("readonly", false);
            $("#gender").css({
                "pointer-events": "auto",
                background: "none"});
        } else {
            $("#idnumber").prop("disabled", false);
            $("#dob").val("").prop("readonly", true);
            $("#dob").css("pointer-events", "none");
            $("#gender").val("").prop("readonly", true);
            $("#gender").css({
                "pointer-events": "none" ,
                background: "#e9ecef"});
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
    sanitizeInputField("#firstName1");
    sanitizeInputField("#lastName1");
    sanitizeInputField("#firstNameP");
    sanitizeInputField("#lastNameP");
    sanitizeInputField("#firstNames1");
    sanitizeInputField("#lastNameP1");

    // Status toggle button for non-citizen and oku
    $('input[name="nonNetizen"]').click(function () {
        if ($(this).is(":checked")) {
            $("#idnumber").val("").prop("disabled", true);
        } else {
            $("#idnumber").prop("disabled", false);
        }
    });

    // $('input[name="okuStatus"]').click(function () {
    //     if ($(this).is(":checked")) {
    //         $("#okucard").prop("disabled", false);

    //         $("#okuattach").prop("disabled", false);
    //     } else {
    //         $("#okucard").val("").prop("disabled", true);

    //         $("#okuattach").val("").prop("disabled", true);
    //     }
    // });

    $('input[name="nonNetizen1"]').click(function () {
        if ($(this).is(":checked")) {
            $("#idnumber2").val("").prop("disabled", true);
            $("#age2").val("").prop("disabled", true);
        } else {
            $("#idnumber2").prop("disabled", false);
            $("#age2").prop("disabled", false);
        }
    });

    $('input[name="okuStatus1"]').click(function () {
        if ($(this).is(":checked")) {
            $("#okucard1").prop("disabled", false);

            $("#okuattach1").prop("disabled", false);
        } else {
            $("#okucard1").val("").prop("disabled", true);

            $("#okuattach1").val("").prop("disabled", true);
        }
    });

    $('input[name="nonNetizen1s"]').click(function () {
        if ($(this).is(":checked")) {
            $("#idnumber2s").val("").prop("disabled", true);
        } else {
            $("#idnumber2s").prop("disabled", false);
        }
    });

    if ($(".okuCheck1s").is(":checked")) {
        $("#okucard1s").prop("disabled", false);
        $("#okuattach1s").prop("disabled", false);
        $("#okuattach1s").prop("readonly", true);

    } else {
        $("#okucard1s").val("").prop("disabled", true);
        $("#okuattach1s").val("").prop("disabled", true);
        $("#okuattach1s").prop("readonly", false);

    }

    //add Child
    $('input[name="nonNetizen2"]').click(function () {
        if ($(this).is(":checked")) {
            $("#idNoaddChild").val("").prop("disabled", true);

            $("#issuingCountryChild").prop("disabled", false);
            $("#expiryDateChild").prop("disabled", true);
        } else {
            $("#idNoaddChild").prop("disabled", false);

            $("#issuingCountryChild").prop("disabled", true);

            $("#expiryDateChild").prop("disabled", true);
        }
    });


    //edit Child
    $('input[name="nonCitizen"]').click(function () {
        if ($(this).is(":checked")) {
            $("#idNo1").val("").prop("disabled", true);

            $("#issuingCountry1").prop("disabled", false);
            $("#issuingCountry1").prop("disabled", true);
        } else {
            $("#idNo1").prop("disabled", false);

            $("#issuingCountry1").prop("disabled", true);

            $("#issuingCountry1").prop("disabled", true);
        }
    });

    $('input[name="okuStatus2"]').click(function () {
        if ($(this).is(":checked")) {
            $("#okucard3").prop("disabled", false);

            $("#okuattach3").prop("disabled", false);
        } else {
            $("#okucard3").val("").prop("disabled", true);

            $("#okuattach3").val("").prop("disabled", true);
        }
    });

    //update Child
    $('input[name="nonCitizen"]').click(function () {
        if ($(this).is(":checked")) {
            $("#idNo1").val("").prop("disabled", true);
        } else {
            $("#idNo1").prop("disabled", false);
        }
    });

    // add companion
    $('input[name="okuStatusc"]').click(function () {
        if ($(this).is(":checked")) {
            $("#okucard1").prop("disabled", false);

            $("#okuattach1").prop("disabled", false);
        } else {
            $("#okucard1").val("").prop("disabled", true);

            $("#okuattach1").val("").prop("disabled", true);
        }
    });

    $('input[name="nonNetizen3"]').click(function () {
        if ($(this).is(":checked")) {
            $("#idno6").val("").prop("disabled", true);
            // $("#expirydate6").prop("disabled", true);
            $("#issuingCountry6").prop("disabled", true);

        } else {
            $("#idno6").prop("disabled", false);
            // $("#expirydate6").prop("disabled", true);
            $("#issuingCountry6").prop("disabled", true);
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

    $("#saveProfile").click(function (e) {
        $("#formProfile").validate({
            // Specify validation rules
            rules: {
                username: "required",
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
                oldIDNo: {
                    //required: false,
                    //digits: true,
                    rangelength: [7, 7],
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
                    rangelength: [10, 12],
                },
                phoneNo2: {
                    digits: true,
                    rangelength: [10, 11],
                },
                homeNo: {
                    digits: true,
                    rangelength: [9, 9],
                },
                extensionNo: {
                    digits: true,
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
                username: "Please Insert Username",
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
                oldIDNo: {
                    rangelength: "Please Insert Valid Old Identification Number",
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
                    digits: "Please Insert Phone Number",
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
            submitHandler: function (form) {
                var data = new FormData(document.getElementById("formProfile"));
                $.ajax({
                    type: "POST",
                    url: "/updateEmployeeProfile",
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
                                // window.location.href = "/dashboardTenant";
                            }
                        });
                    });
                });
            },
        });
    });

    /////////////////////////////////////////////
    $("#saveEducation").click(function (e) {
        $("#addEmployeeEducation").validate({
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
                var data = new FormData(
                    document.getElementById("addEmployeeEducation")
                );
                $.ajax({
                    type: "POST",
                    url: "/addEmployeeEducation",
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
                var data = new FormData(
                    document.getElementById("educationModalEdit"));
                    $.ajax({
                        type: "POST",
                        url: "/updateEmployeeEducation",
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
                console.log(education);
                $("#educationId1").val(education.id);

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
                        url: "/deleteEmployeeEducation/" + id,
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
                url: "/getEmployeeEducationById/" + id,
            });
        }
    }

    $("#saveOthers").click(function (e) {
        $("#addOthers").validate({
            // Specify validation rules
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
                var data = new FormData(document.getElementById("addOthers"));
                $.ajax({
                    type: "POST",
                    url: "/addEmployeeOthers",
                    data: data,
                    dataType: "json",

                    processData: false,
                    contentType: false,
                }).then(function (data) {
                    // console.log(data);
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
            },
        });
    });

    $("#editOthers").click(function (e) {
        var data = new FormData(document.getElementById("othersModalEdit"));
        console.log(data);
        $.ajax({
            type: "POST",
            url: "/updateEmployeeOthers",
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
    });

    othersId = $("#othersId").val();

    othersIds = othersId.split(",");

    for (let i = 1; i < othersIds.length; i++) {
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
                        url: "/deleteEmployeeOthers/" + id,
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
                url: "/getEmployeeOthers/" + id,
            });
        }
    }
    $("#addAddressDetails").click(function (e) {
        $("#formAddressDetails").validate({
            // Specify validation rules
            rules: {
                address1: "required",
                city: "required",
                state: "required",
                country: "required",
                postcode: "required",
                addressType: "required",
            },

            messages: {
                address1: "Please Insert Address 1",
                city: "Please Choose City",
                state: "Please Choose State",
                country: "Please Choose Country",
                postcode: "Please Choose Postcode",
                addressType: "Please Choose Address Type",
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
                    var data = new FormData(
                        document.getElementById("formAddressDetails")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/addEmployeeAddressDetails",
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
                            }
                        });
                    });
                });
            },
        });
    });

    $("#saveAddressDetailsBtn").click(function (e) {
        $("#formEditAddressDetails").validate({
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
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("formEditAddressDetails")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/updateEmployeeAddressDetails",
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
                            }
                        });
                    });
                });
            },
        });
    });

    // $("#saveAddressDetailsBtn").click(function (e) {
    //     var data = new FormData(
    //         document.getElementById("formEditAddressDetails")
    //     );

    //     $.ajax({
    //         type: "POST",
    //         url: "/updateEmployeeAddressDetails",
    //         data: data,
    //         dataType: "json",

    //         processData: false,
    //         contentType: false,
    //     }).then(function (data) {
    //         console.log(data);
    //         Swal.fire({
    //             title: data.title,
    //             icon: "success",
    //             text: data.msg,
    //             type: data.type,
    //             confirmButtonColor: "#3085d6",
    //             confirmButtonText: "OK",
    //             allowOutsideClick: false,
    //             allowEscapeKey: false,
    //         }).then(function () {
    //             if (data.type == "error") {
    //             } else {
    //                 location.reload();
    //             }
    //         });
    //     });
    // });
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
                $("#postcodeEdit").val(address.postcode);
                $("#cityEdit").val(address.city);
                $("#stateEdit").val(address.state);
                $("#countryEdit").val(address.country);
                $("#addressTypeEdit").val(address.addressType);
                $("#countryEdit").val(address.country).select2({
                    placeholder: 'PLEASE CHOOSE',
                    allowClear: true,
                    dropdownParent: $('#modaleditaddress'),
                });
                $("#postcodeEdit").val(address.postcode).select2({
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
                url: "/getEmployeeAddressDetails/" + id,
            });
        }
    }


////////////////////////////////////////////////////

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

    $('input[name="address_type[]"]').on("change", function () {

        var permanentChecked = false;
        var correspondentChecked = false;
        var addressId = $(this).data("address-id");
        var addressType = $(this).is(":checked")
            ? $(this).data("address-type")
            : "0";

        var checkboxes = $('input[name="address_type[]"][data-address-id='+addressId+']');

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
        } else if (permanentChecked == false && correspondentChecked == false){
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
                contactNo: "required",
                relationship: "required",
                address1: "required",
                country: "required",
                state: "required",
                city: "required",
                postcode: "required",

            },

            messages: {
                firstName: "Please Insert First Name",
                lastName: "Please Insert Last Name",
                relationship: "Please Choose Relationship",
                contactNo: {
                    required: "Please Insert Phone Number",
                    digits: "Please Insert Valid Phone Number",
                },
                address1: "Please Insert Address 1",
                country: "Please Choose Country",
                state: "Please Choose State",
                city: "Please Choose City",
                postcode: "Please Choose Postcode",
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
            },
        });

        $("#formEmergency2").validate({
            // Specify validation rules
            rules: {
                firstName_2: "required",
                lastName_2: "required",
                relationship_2: "required",
                contactNo_2: {
                    required: true,
                    digits: true,
                    rangelength: [10, 11],
                },
                relationship_2: "required",
                address1_2: "required",
                country_2: "required",
                state_2: "required",
                city_2: "required",
                postcode_2: "required",
            },

            messages: {
                firstName_2: "Please Insert First Name",
                lastName_2: "Please Insert Last Name",
                relationship_2: "Please Choose Relationship",
                contactNo_2: {
                    required: "Please Insert Phone Number",
                    digits: "Please Insert Valid Phone Number",
                },
                address1_2: "Please Insert Address 1",
                country_2: "Please Choose Country",
                state_2: "Please Choose State",
                city_2: "Please Choose City",
                postcode_2: "Please Choose Postcode",
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
            },
        });
    });

    $("#addCompanion").click(function (e) {
        $("#addCompanionForm").validate({
            // Specify validation rules
            rules: {
                firstName: "required",
                lastName: "required",
                oldIdNo: {
                    rangelength: [7, 7],
                },
                idNo: {
                    required: true,
                    digits: true,
                    rangelength: [12, 12],
                },
                passport: {
                    required: false,
                    digits: true,
                    rangelength: [9, 9],
                },
                contactNo: {
                    digits: true,
                },
                age: {
                    required: false,
                    digits: true,
                },
                address1: "required",
                city: "required",
                state: "required",
                country: "required",
                postcode: "required",
                okuCardNum: {
                    required: true,
                    digits: true,
                    rangelength: [10, 11],
                },
                okuattach: {
                    required: true,
                },
                homeNo: {
                    digits: true,
                    rangelength: [9, 9],
                },
                designation: {
                    required: true,
                },
                payslip: {
                    digits: true,
                },
                officeNo: {
                    digits: true,
                    rangelength: [7, 9],
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
                oldIdNo: {
                    rangelength:
                        "Please Insert Valid Old Identification Number",
                },
                idNo: {
                    required: "Please Insert New Identification Number",
                    digits: "Please Insert Correct Identification Number Without ' - ' or Space",
                    rangelength: "Please Insert Valid Identification Number",
                },
                passport: {
                    digits: "Please Insert Correct Passport Number",
                    rangelength: "Please Insert Valid Passport Number",
                },
                contactNo: {
                    digits: "Please Insert Correct Contact Number Without ' - ' or Space",
                },
                age: {
                    required: "Please Insert Age",
                    digits: "Please Insert Correct Age",
                },
                address1: "Please Insert Address 1",
                city: "Please Choose City",
                state: "Please Choose State",
                country: "Please Choose Country",
                postcode: "Please Choose Postcode",
                okuCardNum: {
                    required: "Please Insert OKU Card Number",
                    digits: "Please Insert Valid OKU Card Number",
                    rangelength: "Please Insert Valid OKU Card Number",
                },
                okuattach: {
                    required: "Please Upload OKU Attachment",
                },
                homeNo: {
                    digits: "Please Insert Correct Home Number Without ' - ' or Space",
                    rangelength: "Please Insert Valid Home Number",
                },
                designation: {
                    required: "Please Insert Designation",
                },
                payslip: {
                    digits: "Please Insert Valid Monthly Salary",
                },
                officeNo: {
                    digits: "Please Insert Valid Office Number",
                    rangelength: "Please Insert Valid Office Number",
                },
                expiryDate: {
                    required: "Please Insert Expiry Date",
                },
                issuingCountry: {
                    required: "Please Choose Issuing Country",
                },
            },
            submitHandler: function (form) {
                var data = new FormData(
                    document.getElementById("addCompanionForm")
                );

                $.ajax({
                    type: "POST",
                    url: "/addEmployeeCompanion",
                    data: data,
                    dataType: "json",

                    processData: false,
                    contentType: false,
                }).then(function (data) {
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
                    oldIdNo: {
                        //required: true,
                        //digits: true,
                        rangelength: [7, 7],
                    },
                    idNo: {
                        required: true,
                        digits: true,
                        rangelength: [12, 12],
                    },
                    passport: {
                        required: false,
                        digits: true,
                        rangelength: [9, 9],
                    },
                    contactNo: {
                        digits: true,
                    },
                    age: {
                        required: false,
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
                    homeNo: {
                        digits: true,
                        rangelength: [9, 9],
                    },
                    designation: {
                        required: true,
                    },
                    salary: {
                        digits: true,
                    },
                    officeNo: {
                        digits: true,
                        rangelength: [7, 9],
                    },
                    postcode: {
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
                    oldIdNo: {
                        rangelength:
                            "Please Insert Valid Old Identification Number",
                    },
                    idNo: {
                        required: "Please Insert New Identification Number",
                        digits: "Please Insert Correct Identification Number Without ' - ' or Space",
                        rangelength:
                            "Please Insert Valid Identification Number",
                    },
                    passport: {
                        digits: "Please Insert Correct Passport Number",
                        rangelength: "Please Insert Valid Passport Number",
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
                    okuNumber: {
                        required: "Please Insert OKU Card Number",
                        rangelength: "Please Insert Valid OKU Card Number",
                    },
                    okuID: {
                        required: "Please Upload OKU Attachment",
                    },
                    homeNo: {
                        digits: "Please Insert Correct Home Number Without ' - ' or Space",
                        rangelength: "Please Insert Valid Home Number",
                    },
                    designation: {
                        required: "Please Insert Designation",
                    },
                    salary: {
                        digits: "Please Insert Valid Monthly Salary",
                    },
                    officeNo: {
                        digits: "Please Insert Valid Office Number",
                        rangelength: "Please Insert Valid Office Number",
                    },
                    postcode: {
                        required: true,
                    },
                },
                submitHandler: function (form) {
                    var data = new FormData(
                        document.getElementById("updateCompanionForm" + no)
                    );

                    $.ajax({
                        type: "POST",
                        url: "/updateEmployeeCompanion",
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
                },
            });
        });
    }

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

    $("#childModalAdd").click(function (e) {
        $("#add-children").modal("show");
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
                maritalStatus: "required",
                DOBChild: "required",
                okuCardNum: {
                    required: true,
                    digits: true,
                    rangelength: [10, 11],
                },
                okuFile: {
                    required: true,
                },
                oldIDNo: {
                    rangelength: [7, 7],
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
                    rangelength: "Please Provide Valid Identification Number",
                },
                maritalStatus: "Please Choose Marital Status",
                DOBChild: "Please Enter Date Of Birth",
                okuCardNum: {
                    required: "Please Insert OKU Card Number",
                    digits: "Please Insert Valid OKU Card Number",
                    rangelength: "Please Insert Valid OKU Card Number",
                },
                okuFile: {
                    required: "Please Upload OKU Attachment",
                },
                oldIDNo: {
                    rangelength: "Please Insert Valid Old Identification Number",
                },
                expiryDate: {
                    required: "Please Insert Expiry Date",
                },
                issuingCountry: {
                    required: "Please Choose Issuing Country",
                },
            },
            submitHandler: function (form) {
                var data = new FormData(
                    document.getElementById("addChildrenForm")
                );
                $.ajax({
                    type: "POST",
                    url: "/addEmployeeChildren",
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
                    //digits: true,
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
                    //digits: "Please Insert Correct Identification Number Without ' - ' or Space",
                    rangelength: "Please Insert Valid Old Identification Number",
                },

                okuNo: {
                    required: "Please Insert OKU Card Number",
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
                var data = new FormData(
                    document.getElementById("editChildrenForm")
                );
                $.ajax({
                    type: "POST",
                    url: "/updateEmployeeChildren",
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
                $("#oldIDNo1").val(child.oldIDNo);
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
                if (child.nonCitizen == "on") {
                    $("#nonCitizen1").prop("checked", true);
                }
                $("#passports1").val(child.passport);
                $("#supportDoc1").val(child.supportDoc);
                if (child.okuFile) {
                    $("#okuAttachmentView").html(
                        '<a href="/storage/' + child.okuFile + '" target="_blank">here</a>'
                    );
                }
                $("#postcode1").val(child.postcode);
                $("#city1").val(child.city);
                $("#state1").val(child.state);
                $("#country1").val(child.country);
                $("#postcode1").val(child.postcode).select2({
                    placeholder: 'PLEASE CHOOSE',
                    allowClear: true,
                    dropdownParent: $('#edit-formchildren'),
                });
                $("#country1").val(child.country).select2({
                    placeholder: 'PLEASE CHOOSE',
                    allowClear: true,
                    dropdownParent: $('#edit-formchildren'),
                });
                if (child.supportDoc) {
                    $("#supportDocAttachmentView").html(
                        '<a href="/storage/' + child.supportDoc + '" target="_blank">here</a>'
                    );
                }
                if (child.okuStatus == "on") {
                    $("#nonCitizen1").prop("checked", true);
                    $("#okucard4").prop("readonly", false);
                    $("#okucard4").prop("disabled", false);
                    $("#okucard4").val(child.okuNo);

                    $("#okuattach4").prop("readonly", true);

                    $("#okuattach4").css("pointer-events", "auto");
                } else {
                    $("#nonCitizen1").prop("checked", false);

                    $("#okucard4").prop("disabled", true);
                    $("#okucard4").prop("readonly", true);
                    $("#okucard4").val();

                    $("#okuattach4").prop("readonly", true);

                    $("#okuattach4").css("pointer-events", "none");
                }
            });
            $("#edit-children").modal("show");
        });

        $("#childModalView" + type).click(function (e) {
            id = $(this).data("id");
            var childrenData = getChildren(id);

            $("input").prop("disabled", true);
            $("select").prop("disabled", true);

            childrenData.then(function (data) {
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
    $("#employeeEducation").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"],
        ],
        initComplete: function (settings, json) {
            $("#employeeEducation").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });
    $(document).ready(function() {
        $(".edu").hide();
        $(".dropdown-toggle").on("click", function() {
            var dropdownMenu = $(this).closest(".btn-group").find(".edu");
            $(".edu").not(dropdownMenu).hide();
            dropdownMenu.toggle();
        });
        $(document).on("click", function(e) {
            if (!$(".btn-group").is(e.target) && $(".btn-group").has(e.target).length === 0) {
                $(".edu").hide();
            }
        });
    });

    $("#employeeOthers").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"],
        ],
        initComplete: function (settings, json) {
            $("#employeeOthers").wrap(
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

    $("#employeeAddress").DataTable({
            responsive: false,
            lengthMenu: [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"],
            ],
            initComplete: function (settings, json) {
                $("#employeeAddress").wrap(
                    "<div style='overflow:auto; width:100%;position:relative;'></div>"
                );
            },
        });
    $(".empadd").hide();
    $(document).on("click", ".dropdown-toggle", function(e) {
        e.stopPropagation(); // mencegah event dari bubbling ke atas
        var dropdownMenu = $(this).closest(".btn-group").find(".empadd");
        $(".empadd").not(dropdownMenu).hide();
        dropdownMenu.toggle();
    });
    $(document).on("click", function(e) {
        if (!$(".btn-group").is(e.target) && $(".btn-group").has(e.target).length === 0) {
            $(".empadd").hide();
        }
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
                .val($("#postcode_id").val())
                .prop("readonly", true);
            $("#citysibling").val($("#city_id").val()).prop("readonly", true);
            $("#statesibling").val($("#state_id").val()).css({
                "pointer-events": "none",
                "touch-action": "none",
                background: "#e9ecef",
            });
            $("#countrysibling").val($("#country_id").val()).css({
                "pointer-events": "none",
                "touch-action": "none",
                background: "#e9ecef",
            });
        } else {
            $("#address1sibling").val($("").val()).prop("readonly", false);
            $("#address2sibling").val($("").val()).prop("readonly", false);
            $("#postcodesibling").val($("").val()).prop("readonly", false);
            $("#citysibling").val($("").val()).prop("readonly", false);
            $("#statesibling").val($("").val()).css({
                "pointer-events": "auto",
                "touch-action": "auto",
                background: "#ffffff",
            });
            $("#countrysibling").val($("my").val()).css({
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
                city: "Please Choose City",
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
                url: "/updateEmployeeSibling",
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

    $("#firstNameP,#lastNameP").change(function () {
        var a = $("#firstNameP").val();
        var b = $("#lastNameP").val();
        $("#fullNameP").val(a + " " + b);
    });

    $("#firstNames1,#lastNameP1").change(function () {
        var a = $("#firstNames1").val();
        var b = $("#lastNameP1").val();
        $("#fullNameP1").val(a + " " + b);
    });

    $("#parentModalAdd").click(function (e) {
        // $("input").prop("disabled", false);
        // $("select").prop("disabled", false);

        $("#expirydate6").prop("disabled", true);
        $("#expirydate6").prop("readonly", true);

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
                gender: {
                    required: false,
                },
                contactNo: {
                    required: false,
                    digits: true,
                    rangelength: [9, 12],

                },
                relationship: "required",
                address1: "required",
                country: "required",
                state: "required",
                city: "required",
                postcode: "required",
                age: "required",
                idNo: {
                    required: true,
                    digits: true,
                    rangelength: [12, 12],
                },
                oldIDNo: {
                    //digits: true,
                    rangelength: [7, 7],
                },
                okuCardNum: {
                    required: true,
                    digits: true,
                    rangelength: [10, 11],
                },
                okuFile: {
                    required: true,
                },
                expiryDate: "required",
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
                DOB: "Please Insert Date Of Birth",
                gender: "Please Choose Gender",
                contactNo: {
                    required: "Please Insert Phone Number",
                    digits: "Please Insert Valid Phone Number Without ' - ' And Space",
                    rangelength: "Please Insert Valid Phone Number Without ' - ' And Space",

                },
                relationship: "Please Choose Relationship",
                address1: "Please Insert Address 1",
                country: "Please Choose Country",
                state: "Please Choose State",
                city: "Please Choose City",
                age: "Please Choose Age",
                postcode: "Please Choose Postcode",
                idNo: {
                    required: "Please Insert New Identification Number",
                    digits: "Please Insert Correct Identification Number Without ' - ' or Space",
                    rangelength: "Please Insert Valid Identification Number",
                },
                oldIDNo: {
                    //digits: "Please Insert Correct Identification Number Without ' - ' or Space",
                    rangelength: "Please Insert Valid Old Identification Number",
                },
                okuCardNum: {
                    required: "Please Insert OKU Card Number",
                    rangelength: "Please Insert Valid OKU Card Number",
                    digits: "Please Insert Valid OKU Card Number",

                },
                okuFile: {
                    required: "Please Upload OKU Attachment",
                },

                expiryDate: "Please Insert Expiry Date",
                issuingCountry: {
                    required: "Please Choose Issuing Country",
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
                var data = new FormData(
                    document.getElementById("addParentForm")
                );

                $.ajax({
                    type: "POST",
                    url: "/addEmployeeParent",
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
                gender: {
                    required: false,
                },
                contactNo: {
                    required: false,
                    digits: true,
                    rangelength: [9, 12],

                },
                relationship: "required",
                address1: "required",
                country: "required",
                postcode: "required",
                city: "required",
                state: "required",
                idNo: {
                    required: true,
                    digits: true,
                    rangelength: [12, 12],
                },
                oldIDNo: {
                    //digits: true,
                    rangelength: [7, 7],
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
                expiryDate: "required",
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
                DOB: "Please Insert Date Of Birth",
                age: "Please Insert Age",
                gender: "Please Choose Gender",
                contactNo: {
                    required: "Please Insert Phone Number",
                    digits: "Please Insert Valid Phone Number Without ' - ' And Space",
                    rangelength: "Please Insert Valid Phone Number Without ' - ' And Space",

                },
                relationship: "Please Choose Relationship",
                address1: "Please Insert Address 1",
                country: "Please Choose Country",
                state: "Please Choose State",
                city: "Please Insert City",
                postcode: "Please Choose Postcode",

                idNo: {
                    required: "Please Insert New Identification Number",
                    digits: "Please Insert Correct Identification Number Without ' - ' or Space",
                    rangelength: "Please Insert Valid Identification Number",
                },
                oldIDNo: {
                    //digits: "Please Insert Correct Identification Number Without ' - ' or Space",
                    rangelength: "Please Insert Valid Old Identification Number",
                },
                okuCardNum: {
                    required: "Please Insert OKU Card Number",
                    rangelength: "Please Insert Valid OKU Card Number",
                    digits: "Please Insert Valid OKU Card Number",
                },
                okuFile: {
                    required: "Please Upload OKU Attachment",
                },
                expiryDate: "Please Insert Expiry Date",
                issuingCountry: {
                    required: "Please Choose Issuing Country",
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
                var data = new FormData(
                    document.getElementById("editParentForm")
                );

                $.ajax({
                    type: "POST",
                    url: "/updateEmployeeParent",
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
            },
        });
    });

    parentId = $("#parentId").val();

    parentIds = parentId.split(",");

    for (let i = 0; i < parentIds.length; i++) {
        const type = parentIds[i];
        $(document).on("click","#parentModalEdit" + type, function (e) {
            // $("input").prop("disabled", false);
            // $("select").prop("disabled", false);
            // $("#okuattach6").prop("disabled", true);

            id = $(this).data("id");
            var ParentData = getEmployeeParent(id);
            ParentData.then(function (data) {
            // console.log(data.data);
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
                $("#fullNameP1").val(parent.fullName);
                $("#firstNames1").val(parent.firstName);
                $("#lastNameP1").val(parent.lastName);
                $("#passportparentedit").val(parent.passport);
                $("#expirydate7").val(parent.expiryDate);
                $("#issuingCountry7").val(parent.issuingCountry);
                $("#oldIDNoP1").val(parent.oldIDNo);
                $("#postcodeP1").val(parent.postcode);
                $("#relationshipP1").val(parent.relationship);
                $("#idno7").val(parent.idNo);
                $("#postcodeP1").val(parent.postcode).select2({
                    placeholder: 'PLEASE CHOOSE',
                    allowClear: true,
                    dropdownParent: $('#editparentmodal'),
                });
                $("#countryP1").val(parent.country).select2({
                    placeholder: 'PLEASE CHOOSE',
                    allowClear: true,
                    dropdownParent: $('#editparentmodal'),
                });

                if (parent.okuFile) {
                    $("#okuAttachmentViewParent").html(
                        '<a href="/storage/' + parent.okuFile + '" target="_blank">here</a>'
                    );
                }
                if (parent.idFile) {
                    $("#idAttachmentViewParent").html(
                        '<a href="/storage/' + parent.idFile + '" target="_blank">here</a>'
                    );
                }
                $("#okucard6").val(parent.okuCardNum);
                $("#age7").val(parent.age);
                if (parent.non_citizen == "on") {
                    $("#non_citizen").prop("checked", true);
                    $("#idno7").prop("disabled", true);
                    $("#idno7").prop("readonly", true);

                    $("#DOBP1").prop("readonly", false);
                    $("#DOBP1").css("pointer-events", "auto");
                } else {
                    $("#non_citizen").prop("checked", false);
                    $("#idnumber7").prop("disabled", false);
                    $("#idnumber7").prop("readonly", false);

                    $("#idno7").prop("readonly", true);
                    $("#idno7").css("pointer-events", "auto");

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
            var ParentData = getEmployeeParent(id);

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

        function getEmployeeParent(id) {
            return $.ajax({
                url: "/getEmployeeParentById/" + id,
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

        vehicleData.then(function (data) {
            $("input").val("");

            vdata = data.data;
            console.log(vdata);

            $("#vehicleType").val(vdata.vehicle_type);
            $("#idV").val(vdata.id);
            $("#plateNo").val(vdata.plate_no);
        });
        $("#edit-vehicle").modal("show");
    });

    $(document).on("click", "#viewVehicleView", function () {
        var id = $(this).data("id");
        var vehicleData = getVehicle(id);
        $("input").prop("disabled", true);
        $("select").prop("disabled", true);

        vehicleData.then(function (data) {
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

    function getVehicle(id) {
        return $.ajax({
            url: "/getVehicleById/" + id,
        });
    }


    $("#saveVehicle").click(function (e) {
        $("#addVehicleForm").validate({
            // Specify validation rules
            rules: {
                //eclaimrecommender: "required",
                vehicle_type: "required",
                plate_no: "required",
            },

            messages: {
                //eclaimrecommender: "Please Choose Recommender",
                vehicle_type: "Please Choose Vehicle Type",
                plate_no: "Please Insert Plate Number",
            },

            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("addVehicleForm")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/addEmployeeVehicle",
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

    $("#updateVehicle").click(function (e) {
        $("#updateVehicleForm").validate({
            // Specify validation rules
            rules: {
                vehicle_type: "required",
                plate_no: "required",
            },

            messages: {
                vehicle_type: "Please Choose Vehicle Type",
                plate_no: "Please Insert Plate Number",
            },

            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("updateVehicleForm")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/updateEmployeeVehicle",
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
    ///////

    $("#buttonhierarchy").click(function (e) {
        var id = $("#hierarchyid").val();

        $("#updatehierarchy").validate({
            // Specify validation rules
            rules: {
                //eclaimrecommender: "required",
                eclaimapprover: "required",
            },

            messages: {
                //eclaimrecommender: "Please Choose Recommender",
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


    $("#timehierarchybutton").click(function (e) {
        var id = $("#updatetimehierarchy").val();
        //console.log(id);
        $("#updatetimehierarchy").validate({
            // Specify validation rules
            rules: {
                tsapprover: "required",
            },

            messages: {
                tsapprover: "Pleace Choose Approver",
            },

            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("updatetimehierarchy")
                    );
                    var id = $("#hierarchyid").val();
                    //console.log(id);
                    // return false;

                    $.ajax({
                        type: "POST",
                        url: "/updatetimehierarchy/" + id,
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

    $("#timehierarchybutton2").click(function (e) {
        var id = $("#updatetimehierarchy2").val();
        //console.log(id);
        $("#updatetimehierarchy2").validate({
            // Specify validation rules
            rules: {
                tsapprover2: "required",
            },

            messages: {
                tsapprover2: "Pleace Choose Approver",
            },

            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("updatetimehierarchy2")
                    );
                    var id = $("#hierarchyid").val();
                    //console.log(id);
                    // return false;

                    $.ajax({
                        type: "POST",
                        url: "/updatetimehierarchy2/" + id,
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

    $("#eleavehierarchy").click(function (e) {
        var id = $("#hierarchyid").val();
        //console.log(id);
        $("#updateeleavehierarchy").validate({
            // Specify validation rules
            rules: {
                //eleaverecommender: "required",
                eleaveapprover: "required",
            },

            messages: {
                //eleaverecommender: "Please Choose Recommender",
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

    $("#updateEmp").click(function (e) {
        // id = $(this).data('id');

        var data = new FormData(document.getElementById("addEmpForm"));

        $("#addEmpForm").validate({

            rules: {
                roleId: "required",
                company: "required",
                departmentId: "required",
                branchId: "required",
                jobGrade: "required",
                designation: "required",
                employmentType: "required",
                joinedDate: "required",
                EffectiveFrom: "required",
                event: "required",
            },

            messages: {
                roleId: "Please Choose Employee Role",
                company: "Please Choose Employee Company",
                departmentId: "Please Choose Employee Department",
                branchId: "Please Choose Employee Branch",
                jobGrade: "Please Choose Employee Job Grade",
                designation: "Please Choose Employee Designation",
                employmentType: "Please Choose Employment Type",
                joinedDate: "Please Insert Employee Joined Date",
                EffectiveFrom: "Please Insert Effective From",
                event: "Please Choose Event",
            },

            errorPlacement: function(error, element) {
                if (element.attr("name") === "roleId") {
                    error.insertAfter("#rolediv");
                } else if (element.attr("name") === "company") {
                    error.insertAfter("#companydiv");
                } else if (element.attr("name") === "departmentId") {
                    error.insertAfter("#deparmentdiv");
                } else if (element.attr("name") === "branchId") {
                    error.insertAfter("#branchdiv");
                } else if (element.attr("name") === "jobGrade") {
                    error.insertAfter("#jobgradediv");
                } else if (element.attr("name") === "designation") {
                    error.insertAfter("#designationdiv");
                } else if (element.attr("name") === "employmentType") {
                    error.insertAfter("#employmentypediv");
                } else if (element.attr("name") === "event") {
                    error.insertAfter("#eventdiv");
                } else {
                    error.insertAfter(element);
                }
            },

            submitHandler: function (form) {
                var data = new FormData(document.getElementById("addEmpForm"));
                $.ajax({
                    type: "POST",
                    url: "/updateEmployee",
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
            },
        });
    });

    $("#updateEmp2").click(function (e) {
        // id = $(this).data('id');

        var data = new FormData(document.getElementById("addEmpForm2"));

        $("#addEmpForm2").validate({
            // Specify validation rules
            rules: {
                company: "required",
                departmentId: "required",
                //unitId: "required",
                branchId: "required",
                jobGrade: "required",
                designation: "required",
                employmentType: "required",
                // // supervisor: "required",

                joinedDate: "required",

                EffectiveFrom: "required",

                Event: "required",
            },

            messages: {
                company: "Please Insert Employee Company",
                departmentId: "Please Insert Employee Department",
                //unitId: "Please Insert Employee Unit",
                branchId: "Please Insert Employee Branch",
                jobGrade: "Please Insert Employee Job Grade",
                designation: "Please Insert Employee Designation",
                employmentType: "Please Insert Employee Employment Type",
                // // supervisor: "Please Insert Your Supervisor",

                joinedDate: "Please Insert Employee Joined Date",

                EffectiveFrom: "Please Choose Effective Form",

                Event: "Please Choose Event",
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
                        console.log(data);
                        $.ajax({
                            type: "POST",
                            url: "/updateEmployee",
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
                                }
                            });
                        });
                    });
                });
            },
        });
    });

    //   add validation on expiry date and issuing country
    //add parent
    $("#parentModalAdd").click(function () {
        if ($(this).prop("checked")) {
            $("#issuingCountry6").prop("disabled", true);
            $("#issuingCountry6").prop("readonly", true);

            $("#okucard5").prop("disabled", true);
            $("#okucard5").prop("readonly", true);

            $("#okuattach5").prop("disabled", true);
            $("#okuattach5").prop("readonly", true);
        } else {
            $("#issuingCountry6").prop("disabled", true);
            $("#issuingCountry6").prop("readonly", true);

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

            $("#issuingCountryChild").prop("disabled", true);
            $("#issuingCountryChild").prop("readonly", true);

            $("#okucard3").prop("disabled", true);
            $("#okucard3").prop("readonly", true);

            $("#okuattach3").prop("disabled", true);
            $("#okuattach3").prop("readonly", true);

        } else {
            $("#expiryDateChild").prop("disabled", true);
            $("#expiryDateChild").prop("readonly", true);

            $("#issuingCountryChild").prop("disabled", true);
            $("#issuingCountryChild").prop("readonly", true);


            $("#okucard3").prop("disabled", true);
            $("#okucard3").prop("readonly", true);

            $("#okuattach3").prop("disabled", true);
            $("#okuattach3").prop("readonly", true);
        }
    });
    ///////////////////////////////////////

    //   oku checkbox myprofile
    $(".okuCheck").click(function () {
        if ($(this).prop("checked")) {
            $("#okucard").prop("readonly", false);
            $("#okucard").prop("disabled", false);

            $("#okuattach").prop("disabled", false);
            $("#okuattach").prop("readonly", false);

            $("#okuattach").css("pointer-events", "auto");
            // $("#okuattach").css("pointer-events", "none");
        } else {
            $("#okucard").prop("readonly", true);
            $("#okucard").val("").prop("disabled", true);
            $("#okuattach").prop("disabled", true);

            $("#okuattach").prop("readonly", true);
            $("#okuattach").val("");
        }
    });

    if ($(".okuCheck").is(":checked")) {
        $("#okucard").prop("disabled", false);
        $("#okuattach").prop("disabled", false);
        $("#okuattach").css("pointer-events", "auto");
    } else {
        $("#okucard").val("").prop("disabled", true);
        $("#okuattach").prop("disabled", true);
        $("#okuattach").css("pointer-events", "none");
    }
    //oku check companion
    $(".okuCheck1").click(function () {
        if ($(this).prop("checked")) {
            $("#okucard1").prop("readonly", false);

            $("#okuattach1").prop("readonly", false);
            $("#okuattach1").css("pointer-events", "auto");

            //  $("#okuattach").css("readonly", true);
            // $("#okuattach").css("pointer-events", "none");
        } else {
            $("#okucard1").prop("readonly", true);
            $("#okucard1").val("");


            // $("#okuattach").css("readonly", false);
            // $("#okuattach").css("pointer-events", "auto");

            $("#okuattach1").prop("readonly", true);
            $("#okuattach1").val("");
        }
    });



    //oku check save companion
    $(".okuCheck1s").click(function () {
        if ($(this).prop("checked")) {
            $("#okucard1s").prop("readonly", false);
            $("#okucard1s").prop("disabled", false);

            $("#okuattach1s").prop("readonly", false);
            $("#okuattach1s").prop("disabled", false);
            $("#okuattach1s").css("pointer-events", "auto");
        } else {
            $("#okucard1s").prop("readonly", true);
            $("#okucard1s").val("");
            $("#okucard1s").val("").prop("disabled", true);

            $("#okuattach1s").val("").prop("disabled", true);
            $("#okuattach1s").prop("readonly", true);
            $("#okuattach1s").val("");
        }
    });

    //oku check add children
    $(".okuCheck3").click(function () {
        if ($(this).prop("checked")) {
            $("#okucard3").prop("readonly", false);

            $("#okuattach3").css("pointer-events", "auto");
            $("#okuattach3").prop("readonly", false);
        } else {
            $("#okucard3").prop("readonly", true);
            $("#okucard3").val("");

            $("#okuattach3").prop("readonly", true);
            $("#okuattach3").val("");
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

            $("#okuattach5").css("pointer-events", "auto");
            $("#okuattach5").prop("readonly", false);
        } else {
            $("#okucard5").prop("readonly", true);

            $("#okuattach5").prop("readonly", true);
            $("#okuattach5").val("");
            $("#okucard5").val("").prop("disabled", true);
        }
    });

    //oku check edit family
    $(".okuCheck6").click(function () {
        if ($(this).prop("checked")) {
            $("#okucard6").prop("readonly", false);
            $("#okucard6").prop("disabled", false);

            $("#okuattach6").prop("disabled", false);
            $("#okuattach6").css("pointer-events", "auto");
        } else {
            $("#okucard6").prop("readonly", true);
            $("#okucard6").prop("disabled", true);
            $("#okucard6").val("");

            $("#okuattach6").prop("disabled", true);
            $("#okuattach6").css("pointer-events", "none");
        }
    });

    //add child
    $(".partCheck6").click(function () {
        if ($(this).prop("checked")) {
            $("#idno6").prop("readonly", true);
            $("#idno6").val("");
            $("#idno6").prop("disabled", true);

            $("#DOBaddparent").prop("readonly", false);
            $("#DOBaddparent").css("pointer-events", "auto");

            $("#age6").prop("readonly", false);

            $("#gender6").css({
                "pointer-events": "auto",
                "touch-action": "auto",
                background: "#ffffff",
            });

        } else {
            $("#idno6").prop("readonly", false);
            $("#idno6").prop("disabled", false);

            $("#DOBaddparent").prop("readonly", true);
            $("#DOBaddparent").css("pointer-events", "none");

            $("#gender6").css({
                "pointer-events": "none",
                "touch-action": "none",
                background: "#e9ecef",
            });

            $("#age6").prop("readonly", true);
        }
    });


    $("#passport6").change(function () {
        if ($("#passport6").val() !== "") {
            $("#expirydate6").prop("disabled", false);
            $("#expirydate6").css("pointer-events", "auto");
            $("#expirydate6").prop("readonly", false);

            $("#issuingCountry6").prop("disabled", false);
            $("#issuingCountry6").css("pointer-events", "auto");
        } else {
            $("#expirydate6").prop("disabled", true);
             $("#expirydate6").css("pointer-events", "none");
             $("#expirydate6").prop("readonly", true);
             $("#expirydate6").val("");

             $("#issuingCountry6").prop("disabled", true);
             $("#issuingCountry6").css("pointer-events", "none");
             $("#issuingCountry6").val("");
        }
    });



    $("#idno6").change(function () {
        if ($(this).val().length == 12) {
            var idn = $(this).val();
            var year = idn.substring(0, 2);
            var month = idn.substring(2, 4);
            var day = idn.substring(4, 6);

            var cutoff = new Date().getFullYear() - 2000; //2022-2000=22cutoff
            //98>22->19+98
            $("#DOBaddparent").val(
                (year > cutoff ? "19" : "20") + year + "-" + month + "-" + day
            );
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

     //UPDATE FAMILY DETAILS

    $(".partCheck7").click(function () {
        if ($(this).prop("checked")) {
            $("#idno7").prop("disabled", true);
            $("#idno7").prop("readonly", true);
            $("#idno7").val("");

            $("#DOBP1").val("").prop("readonly", false);
            $("#DOBP1").css("pointer-events", "auto");

            $("#age7").val("").prop("readonly", false);
            $("#age7").css("pointer-events", "auto");
        } else {
            $("#idno7").prop("disabled", false);
            $("#idno7").prop("readonly", false);

            $("#DOBP1").val("").prop("readonly", true);
            $("#DOBP1").css("pointer-events", "none");

            $("#age7").val("").prop("readonly", true);
            $("#age7").css("pointer-events", "none");
        }
    });


    $("#expiryDate1").datepicker({
        todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true,
    });



    $("#idno7").change(function () {
        if ($(this).val().length == 12) {
            var idn = $(this).val();
            var year = idn.substring(0, 2);
            var month = idn.substring(2, 4);
            var day = idn.substring(4, 6);

            var cutoff = new Date().getFullYear() - 2000; //2022-2000=22cutoff
            //98>22->19+98
            $("#DOBP1").val(
                (year > cutoff ? "19" : "20") + year + "-" + month + "-" + day
            );
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

$(window).on('load', function() {
    // Get the height of the Employment Information card
    var employmentInfoHeight = $("#editHRISJs").height();

    // Set the same height for the Job History card
    $("#jobHistoryJs").css("max-height", employmentInfoHeight + "px");
});
function dataURLtoFile(dataurl, filename) {
    var arr = dataurl.split(","),
        mime = arr[0].match(/:(.*?);/)[1],
        bstr = atob(arr[1]),
        n = bstr.length,
        u8arr = new Uint8Array(n);

    while (n--) {
        u8arr[n] = bstr.charCodeAt(n);
    }

    return new File([u8arr], filename, { type: mime });
}
//console.log(file);

$(document).on("click", "#uploadpicture", function () {
    var user_id = $("#user_id").val();
    var fileExtension = ".jpg";
    var filename = user_id + fileExtension;
    var fileUpload = dataURLtoFile(
        $("#result_image img").attr("src"),
        filename
    );

    $("#profilepicform").validate({
        rules: {
            profile_picture: {
                required: true,
            },
        },
        messages: {
            profile_picture: {
            },
        },

        submitHandler: function (form) {
            requirejs(["sweetAlert2"], function (swal) {
                var data = new FormData(
                    document.getElementById("profilepicform")
                );
                data.append("uploadFile", fileUpload);
                // console.log($("#result_image img").attr("src"));
                var id = $("#user_id").val();
                // console.log(id);
                $.ajax({
                    type: "POST",
                    url: "/updateProfile_Picture/" + id,
                    data: data,
                    dataType: "json",
                    async: true,
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


