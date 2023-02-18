$(document).ready(function() {

    
    $("input[type=text]").keyup(function() {
        $(this).val($(this).val().toUpperCase());
    });
    $("option[type=text]").keyup(function () {  
        $(this).val($(this).val().toUpperCase());  
    });

    $("#gender").css({"pointer-events": "none", "touch-action": "none", "background": "#e9ecef"});
    
    $('#idnumber').change(function(){

        if($(this).val().length == 12){

            var idn = $(this).val();
            
            var lastIc = idn.substring(10,12);
            
            if(lastIc % 2 == 0){
                $('#gender').val(2);
            } else {
                $('#gender').val(1);
            }

        }

    });
    
    $("#datepicker-autoClose").datepicker({
        todayHighlight: true,
        autoclose: true,
    });
    
    $("#datepicker-birth").datepicker({
        todayHighlight: true,
        autoclose: true,
    });
    $("#datepicker-joindate").datepicker({
        todayHighlight: true,
        autoclose: true,
    });
    $("#datepicker-expiryDate").datepicker({
        todayHighlight: true,
        autoclose: true,
    });


    $("#firstName,#lastName").change(function() {

        var fn = $('#firstName').val();
        var ln = $('#lastName').val();
        $('#fullName').val(fn + " " + ln);
    });

    $('#idnumber').change(function() {

        if ($(this).val().length == 12) {

            var idn = $(this).val();
            var year = (idn.substring(0, 2));
            var month = idn.substring(2, 4);
            var day = idn.substring(4, 6);
            
            var cutoff = (new Date()).getFullYear() - 2000;

            $('#datepicker-birth').val((year > cutoff ? '19' : '20') + year + '-' + month + '-' + day);
        }
    });

    $('#idnumber').change(function(){

        if($(this).val().length == 12){

            var idn = $(this).val();
            
            var lastIc = idn.substring(10,12);
            
            if(lastIc % 2 == 0){
                $('#gender').val(2);
            } else {
                $('#gender').val(1);
            }

        }

    });
    
    $("#nonNetizen").change(function() {
        if (this.checked) {

            $('#passport').prop('readonly', false);
            $('#passport').prop('required', true);
            $('#datepicker-expiryDate').prop('readonly', false);
            $('#datepicker-expiryDate').prop('required', true);
            $('#datepicker-birth').prop('readonly', false);
            $("#datepicker-birth").removeAttr("style");
            $("#datepicker-expiryDate").removeAttr("style");

        } else {

            $('#passport').prop('readonly', true);
            $('#datepicker-expiryDate').prop('readonly', true);
            $('#passport').prop('required', false);
            $('#datepicker-expiryDate').prop('required', false);
            $('#datepicker-birth').prop('readonly', true);
            $("#datepicker-expiryDate").attr("style", "pointer-events: none");
            $("#datepicker-birth").attr("style", "pointer-events: none");

        }
    });
    $("#same-address").change(function() {
        if (this.checked) {
            $('#address1c').val($('#address1').val()).prop('readonly', true);
            $('#address2c').val($('#address2').val()).prop('readonly', true);
            $('#postcodec').val($('#postcode').val()).prop('readonly', true);
            $('#cityc').val($('#city').val()).prop('readonly', true);
            $('#statec').val($('#state').val()).css({"pointer-events": "none", "touch-action": "none", "background": "#e9ecef"});
            $('#countryc').val($('#country').val()).css({"pointer-events": "none", "touch-action": "none", "background": "#e9ecef"});
        } else {
            $('#address1c').prop('readonly', false);
            $('#address2c').prop('readonly', false);
            $('#postcodec').prop('readonly', false);
            $('#cityc').prop('readonly', false);
            $('#statec').css({"pointer-events": "auto", "touch-action": "auto", "background": "#ffffff"});
            $('#countryc').css({"pointer-events": "auto", "touch-action": "auto", "background": "#ffffff"});
        }
    });

    $(".partCheck").click(function() {
        if ($(this).prop("checked")) {

            $('#idnumber').prop('readonly', true);
            $('#idnumber').prop('required', false);  
           // $('#passport').prop('required', true); 
           // $('#datepicker-autoClose').prop('required', true); 
        } else {

            $('#idnumber').prop('readonly', false);
            $('#idnumber').prop('required', true);
        }
      });

      $('#passport').change(function(){
    
        if ($('#datepicker-expiryDate').prop('readonly')) {
         $('#datepicker-expiryDate').prop('readonly', false);
         $('#datepicker-expiryDate').css('pointer-events', "auto");
       } else {
         $('#datepicker-expiryDate').prop('readonly', true);
         $('#datepicker-expiryDate').css('pointer-events', "none");
       }

    });

    $(".partCheck").click(function(){
        if ($(this).prop("checked")) {
              
            $('#idnumber').prop('readonly', true);
            
            $('#datepicker-expiryDate').prop('readonly', false);
            $('#datepicker-birth').prop('readonly', false);
            $('#datepicker-birth').css('pointer-events', 'auto');
            $("#idnumber").val("");
        } else {
            
            $('#idnumber').prop('readonly', false);
            
            $('#datepicker-expiryDate').prop('readonly', false);
            $('#datepicker-birth').prop('readonly', true);
            $('#datepicker-birth').css('pointer-events', 'none');
        }
      });
    
      $.validator.addMethod("noSpecialChars", function(value, element) {
        return this.optional(element) || /^[^A-Za-z0-9!@#$%^&*()\-_+={}[\]\\|<>"'\/~`,.;: ]*$/.test(value);
      }, "Special characters, spaces, and alphabet characters are not allowed.");
      

    $('#profileForm').click(function(e) {

        $('#profileForm').validate({

            // Specify validation rules
            rules: {

                employee_id: {
                    required: true,
                    noSpecialChars: true
                  },
                username: "required",
                firstName: "required",
                lastName: "required",
                idNo: "required",
                issuingCountry: "required",
                DOB: "required",
                gender: "required",
                maritialStatus: "required",
                religion: "required",
                personalEmail: {
                    required: true,
                    email: true
                },
                phoneNo: {
                    required: true,
                    digits: true,

                },
            },

            messages: {
                employee_id: {
                    required: "Please Insert Employee ID",
                    noSpecialChars: "Special characters, spaces, and alphabet characters are not allowed."
                },
                username: "Please Insert Username",
                firstName: "Please Insert First Name",
                lastName: "Please Insert Last Name",
                idNo: "Please Insert Identification Number",
                expiryDate: "Please Insert Expiry Date",
                issuingCountry: "Please Insert Issuing Country",
                DOB: "Please Insert Date Of Birth",
                gender: "Please Insert Gender",
                maritialStatus: "Please Insert Marital Status",
                religion: "Please Insert Religion",
                personalEmail: {
                    required: "Please Insert Personal Email",
                    email: "Please Insert Valid Email"
                },
                phoneNo: {
                    required: "Please Insert Phone Number",
                    digits: "Please Insert Correct Identification Number Without ' - ' or Space",

                },
            },
            submitHandler: function(form) {

                requirejs(['sweetAlert2'], function(swal) {

                    var data = new FormData(document.getElementById("profileForm"));
                    var emplId = $("#empId").val()
                    var employeeName = $("#fullName").val()
                    var employeeEmail = $("#personalEmail").val()
                    $.ajax({
                        type: "POST",
                        url: "/addProfile",
                        data: data,
                        dataType: "json",
                        async: false,
                        processData: false,
                        contentType: false,
                    }).done(function(data) {
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
                                // window.location.href = "/dashboardTenant";
                                $('#user_id').val(data.data.user_id);
                                $('#employeeId').val(emplId);
                                $('#employeeName').val(employeeName);
                                $('#employeeEmail').val(employeeEmail);
                                $('#user_id1').val(data.data.user_id);

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
            }
        });
    });
    $("#prev_btn_addr_det").click(function() {
        $("#nav-prof").addClass("active");
        $("#nav-addr").removeClass("active");
        $("#nav-det").removeClass("active");

		$( "#default-tab-1" ).addClass( "active show" );
		$( "#default-tab-2" ).removeClass( "active show" );
		$( "#default-tab-3" ).removeClass( "active show" );
      });

    $('#submitAddress').click(function(e) {
        $("#addressForm").validate({
            // Specify validation rules
            rules: {

                address1: "required",
                city: "required",
                state: "required",
                country: "required",
                postcode: {
                    required: true,
                    digits: true,
                    rangelength: [5, 5]
                },
                address1c: "required",
                cityc: "required",
                statec: "required",
                countryc: "required",
                postcodec: {
                    required: true,
                    digits: true,
                    rangelength: [5, 5]
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
                    rangelength: "Please Insert Valid Postcode"
                },
                address1c: "Please Insert Address",
                cityc: "Please Insert City",
                statec: "Please Choose State",
                countryc: "required",
                postcodec: {
                    required: "Please Insert Postcode",
                    digits: "Please Insert Valid Postcode",
                    rangelength: "Please Insert Valid Postcode"
                },


            },
            submitHandler: function(form) {


                requirejs(['sweetAlert2'], function(swal) {

                    var data = new FormData(document.getElementById("addressForm"));

                    $.ajax({
                        type: "POST",
                        url: "/addAddress",
                        data: data,
                        dataType: "json",
                        async: false,
                        processData: false,
                        contentType: false,
                    }).done(function(data) {
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
            }
        });
    });

    $("#prev_emp_det").click(function() {
        $("#nav-prof").removeClass("active");
        $("#nav-addr").addClass("active");
        $("#nav-det").removeClass("active");

        $("#default-tab-1").removeClass("active show");
        $("#default-tab-2").addClass("active show");
        $("#default-tab-3").removeClass("active show");
    });

    $('#submitEmployment').click(function(e) {

        $("#employmentForm").validate({
            // Specify validation rules
            rules: {

                company: "required",
                departmentId: "required",
                unitId: "required",
                branchId: "required",
                jobGrade: "required",
                designation: "required",
                employmentType: "required",
                // supervisor: "required",
                workingEmail: {
                    required: true,
                    email: true
                },
                joinedDate: "required",

            },

            messages: {

                company: "Please Insert Your Company",
                departmentId: "Please Insert Your Department",
                unitId: "Please Insert Your Unit",
                branchId: "Please Insert Your Branch",
                jobGrade: "Please Insert Your Job Grade",
                designation: "Please Insert Your Designation",
                employmentType: "Please Insert Your Employment Type",
                // supervisor: "Please Insert Your Supervisor",
                workingEmail: {
                    required: "Please Insert Your Working Email",
                    email: "Please Insert Correct Email"
                },
                joinedDate: "Please Insert Your Joined Date",

            },
            submitHandler: function(form) {

                requirejs(['sweetAlert2'], function(swal) { 

                    var data = new FormData(document.getElementById("employmentForm"));

                    $.ajax({
                        type: "POST",
                        url: "/addEmployment",
                        data: data,
                        dataType: "json",
                        async: false,
                        processData: false,
                        contentType: false,
                    }).done(function(data) {
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
                                window.location.href = "/employeeInfoView";
                                // $('#user_id').val(data.data.user_id);
                                // $('#user_id1').val(data.data.user_id);

                            }


                        });
                    });
                });
            }

        });
    });


});