$(document).ready(function() {

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

    $("input[type=text]").keyup(function () {  
        $(this).val($(this).val().toUpperCase());  
    });

    $("#firstName,#lastName").change(function() {
    
        var fn = $('#firstName').val();
        var ln = $('#lastName').val();
        $('#fullName').val(fn+" "+ln);
    });

    $('#idnumber').change(function(){

        if($(this).val().length == 12){

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
            var IdLast = idn.substring(10,12);
         
            if(ldLast % 2 == 0){
                $('#gender').val('2');
            } else {
                $('#gender').val('1');
            }

        }

    });
    $("#nonNetizen").change(function() {
        if(this.checked) {
            
            $('#passport').prop('readonly', false);
            $('#passport').prop('required', true);
            $('#datepicker-expiryDate').prop('readonly', false);
            $('#datepicker-expiryDate').prop('required', true);
            $('#datepicker-birth').prop('readonly', false);
            $("#datepicker-birth").removeAttr("style");
            $("#datepicker-expiryDate").removeAttr("style");
    
        }
        else {
    
            $('#passport').prop('readonly', true);
            $('#datepicker-expiryDate').prop('readonly', true);
            $('#passport').prop('required', false);
            $('#datepicker-expiryDate').prop('required', false);
            $('#datepicker-birth').prop('readonly', true);
            $("#datepicker-expiryDate").attr("style","pointer-events: none");
            $("#datepicker-birth").attr("style","pointer-events: none");
    
        }        
      });
      $("#same-address").change(function() {
        if(this.checked) {
            $('#address1c').val($('#address1').val()).prop('readonly', true);
            $('#address2c').val($('#address2').val()).prop('readonly', true);
            $('#postcodec').val($('#postcode').val()).prop('readonly', true);
            $('#cityc').val($('#city').val()).prop('readonly', true);
            $('#statec').val($('#state').val()).prop('disabled', true);
            $('#countryc').val($('#country').val()).prop('disabled', true);
        }
        else {
            $('#address1c').prop('readonly', false);
            $('#address2c').prop('readonly', false);
            $('#postcodec').prop('readonly', false);
            $('#cityc').prop('readonly', false);
            $('#statec').prop('disabled', false);
            $('#countryc').prop('disabled', false);    
        }        
      });
      
    $(".partCheck").click(function(){
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
    
    $('#profileForm').click(function(e) {
        
        $('#profileForm').validate({
                 
                // Specify validation rules
                rules: {
                    
                    employee_id:"required",
                    username:"required",
                    firstName:"required",
                    lastName:"required",
                    idNo:"required",
                    issuingCountry:"required",
                    DOB:"required",
                    gender:"required",
                    maritialStatus:"required",
                    religion:"required",
                    personalEmail:{
                        required: true,
                        email: true
                    },
                    phoneNo: {
                        required: true,
                        digits: true,
                        
                    },
                },
    
                messages: {
                    employee_id:"Please insert employee ID",
                    username:"Please insert username",
                    firstName:"Please insert first name",
                    lastName:"Please insert last namee",
                    idNo:"Please insert identification number",
                    expiryDate:"Please insert expiry date",
                    issuingCountry:"Please insert issuing country",
                    DOB:"Please insert date of birth",
                    gender:"Please insert gender",
                    maritialStatus:"Please insert marital status",
                    religion:"Please insert religion",
                    personalEmail:{
                        required: "Please insert personal email",
                        email: "Please insert valid email"
                    },
                    phoneNo: {
                        required: "Please insert Phone Number",
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

                        $( "#nav-prof" ).removeClass( "active" );
                        $( "#nav-addr" ).addClass( "active" );
                        $( "#nav-det" ).removeClass( "active" );

                        $( "#default-tab-1" ).removeClass( "active show" );
                        $( "#default-tab-2" ).addClass( "active show" );
                        $( "#default-tab-3" ).removeClass( "active show" );

                    }


                });
            });
        });
    }
        });      
    });
    $( "#prev_btn_addr_det" ).click(function() {
		$( "#nav-prof" ).addClass( "active" );
		$( "#nav-addr" ).removeClass( "active" );
		$( "#nav-det" ).removeClass( "active" );

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
                address1: "Please Insert Your Address",
                city: "Please Insert Your City",
                state: "Please Choose Your State",
                country: "required",
                postcode: {
                    required: "Please Insert Your Postcode",
                    digits: "Please Enter Valid Postcode",
                    rangelength: "Please Enter Valid Postcode"
                },
                address1c: "Please Insert Your Address",
                cityc: "Please Insert Your City",
                statec: "Please Choose Your State",
                countryc: "required",
                postcodec: {
                    required: "Please Insert Your Postcode",
                    digits: "Please Enter Valid Postcode",
                    rangelength: "Please Enter Valid Postcode"
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
                        $( "#nav-prof" ).removeClass( "active" );
                        $( "#nav-addr" ).removeClass( "active" );
                        $( "#nav-det" ).addClass( "active" );

                        $( "#default-tab-1" ).removeClass( "active show" );
                        $( "#default-tab-2" ).removeClass( "active show" );
                        $( "#default-tab-3" ).addClass( "active show" );
                    }


                });
            });
        

        });
    }
});
    });
    
    $( "#prev_emp_det" ).click(function() {
		$( "#nav-prof" ).removeClass( "active" );
		$( "#nav-addr" ).addClass( "active" );
		$( "#nav-det" ).removeClass( "active" );

		$( "#default-tab-1" ).removeClass( "active show" );
		$( "#default-tab-2" ).addClass( "active show" );
		$( "#default-tab-3" ).removeClass( "active show" );
      });

    $('#submitEmployment').click(function(e) {
        
        $("#employmentForm").validate({
            // Specify validation rules
            rules: {
                
                company: "required",
                department: "required",
                unit: "required",
                branch: "required",
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
                department: "Please Insert Your Department",
                unit: "Please Insert Your Unit",
                branch: "Please Insert Your Branch",
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

