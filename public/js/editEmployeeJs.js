$(document).ready(function() {
    let croppie;

    $('#edit-profile-picture').on('change', function() {
        if (this.files && this.files[0]) {
            let reader = new FileReader();
            reader.onload = function(e) {
                $('#croppie img').attr('src', e.target.result);
                croppie = new Croppie($('#croppie img')[0], {
                    boundary: { width: 200, height: 200 },
                    viewport: { width: 100, height: 100, type: 'square' }
                })
            }
            $('#showImage').show();
            $('#crop').on('click', function() {
                $('#showCroppedImage').show();
                croppie
                    .result({ type: 'base64', circle: false })
                    .then(function(dataImg) {
                        var data = [{ image: dataImg }, { name: 'profilePicture.jpg' }];
                        // use ajax to send data to php
                        $('#result_image img').attr('src', dataImg);
                    });
            });
            reader.readAsDataURL(this.files[0]);
        }
    })

    $("#firstname,#lastname").change(function() {
        var a = $("#firstname").val();
        var b = $("#lastname").val();
        $("#fullname").val(a + ' ' + b);
    });
    
    $("#effective-from").datepicker({
        todayHighlight: true,
        format: 'yyyy-mm-dd',
        autoclose: true,
    });

    $("#datepicker-joindate").datepicker({
        todayHighlight: true,
        format: 'yyyy-mm-dd',
        autoclose: true,
    });

    $("#dob").datepicker({
        todayHighlight: true,
        format: 'yyyy-mm-dd',
        autoclose: true,
    });

    $("#expirydate").datepicker({
        todayHighlight: true,
        format: 'yyyy-mm-dd',
        autoclose: true,
    });

    $('#idNo').change(function() {

        if ($(this).val().length == 12) {

            var idn = $(this).val();
            var year = '19'.concat(idn.substring(0, 2));
            var month = idn.substring(2, 4)
            var day = idn.substring(4, 6);
            $('#dob').val(year + '-' + month + '-' + day);

        }

    });

    $("#same-address").change(function() {
        if (this.checked) {
            $('#address-1c').val($('#address-1').val()).prop('readonly', true);
            $('#address-2c').val($('#address-2').val()).prop('readonly', true);
            $('#postcodec').val($('#postcode').val()).prop('readonly', true);
            $('#cityc').val($('#city').val()).prop('readonly', true);
            $('#statec').val($('#state').val()).prop('disabled', true);
            $('#countryc').val($('#country').val()).prop('disabled', true);
        } else {
            $('#address-1c').val($('').val()).prop('readonly', false);
            $('#address-2c').val($('').val()).prop('readonly', false);
            $('#postcodec').val($('').val()).prop('readonly', false);
            $('#cityc').val($('').val()).prop('readonly', false);
            $('#statec').val($('').val()).prop('disabled', false);
            $('#countryc').val($('1').val()).prop('disabled', false);

        }
    });

    $(".partCheck").click(function() {
        if ($(this).prop("checked")) {

            $('#idNo').prop('readonly', true);
            $('#passport').prop('readonly', false);
            $('#expirydate').prop('readonly', false);
            $('#expirydate').css('pointer-events', 'auto');
            $('#dob').prop('readonly', false);
            $('#dob').css('pointer-events', 'auto');
            $("#idNo").val("");

        } else {

            $('#idNo').prop('readonly', false);
            $('#passport').prop('readonly', true);
            $('#expirydate').prop('readonly', true);
            $('#expirydate').css('pointer-events', 'none');
            $('#dob').prop('readonly', true);
            $('#dob').css('pointer-events', 'none');

        }
    });

    $(".partCheck2").click(function() {
        if ($(this).prop("checked")) {
            $('#reportto').show();
           
        } else {
            $('#reportto').hide();
            $('#reportto').prop('disabled', true);
            // $('#reportto').css('pointer-events', 'auto');
     }
    });
    
    $('#saveProfile').click(function(e) {
        $("#formProfile").validate({
            // Specify validation rules
            rules: {

                username: "required",
                personalEmail: {
                    required: true,
                    email: true
                },

                firstName: "required",
                lastName: "required",
                fullName: "required",
                gender: "required",
                maritialStatus: "required",
                religion: "required",
                race: "required",
                idNo: {
                    required: true,
                    digits: true,
                    rangelength: [12, 12]
                },
                phoneNo: {

                    digits: true,

                },
                homeNo: {
                    digits: true,


                },
                extensionNo: {
                    digits: true,

                },


            },

            messages: {

                username: "Please insert username",
                personalEmail: {
                    required: "Please Insert Email Address",
                    email: "Please Provide Valid Email Address",

                },
                firstName: "Please Insert Your First Name",
                lastName: "Please Insert Your Last Name",
                fullName: "Please Insert Your Full Name",
                gender: "Please Choose Your Gender",
                maritialStatus: "Please Choose Your Marital Status",
                religion: "Please Choose Your Religion",
                race: "Please Choose Your Race",
                idNo: {
                    required: "Please Insert Identification Number",
                    digits: "Please Insert Correct Identification Number Without ' - ' or Space",
                    rangelength: "Please Provide Valid Identification Number"
                },
                phoneNo: {

                    digits: "Please Insert Correct Identification Number Without ' - ' or Space",

                },
                homeNo: {
                    digits: "Please Insert Correct Identification Number Without ' - ' or Space",

                },
                extensionNo: {
                    digits: "Please Insert Correct Identification Number Without ' - ' or Space",

                },

            },
            submitHandler: function(form) {

                requirejs(['sweetAlert2'], function(swal) {


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
                        swal({
                            title: data.title,
                            text: data.msg,
                            type: data.type,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                        }).then(function() {
                            if (data.type == 'error') {

                            } else {
                                location.reload();
                                // window.location.href = "/myProfile";

                            }


                        });
                    });
                });
            }
        });
    });

    $('#saveAddress').click(function(e) {

        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("formAddress"));

            $.ajax({
                type: "POST",
                url: "/updateEmployeeAddress",
                data: data,
                dataType: "json",
                async: false,
                processData: false,
                contentType: false,
            }).done(function(data) {
                // console.log(data);
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
                        // window.location.href = "/dashboardTenant";

                    }


                });
            });

        });
    });

    $('#saveEmergency').click(function(e) {

        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("formEmergency"));

            $.ajax({
                type: "POST",
                url: "/updateEmployeeEmergency",
                data: data,
                dataType: "json",
                async: false,
                processData: false,
                contentType: false,
            }).done(function(data) {
                // console.log(data);
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
                        location.reload();

                    }


                });
            });

        });
    });

    $('#addCompanion').click(function(e) {

        requirejs(['sweetAlert2'], function(swal) {

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
                // console.log(data);
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
                        // window.location.href = "/dashboardTenant";

                    }


                });
            });

        });
    });

    companion = ['1', '2', '3', '4'];

    for (let i = 0; i < companion.length; i++) {
        const no = companion[i];
        $('#updateCompanion' + no).click(function(e) {

            requirejs(['sweetAlert2'], function(swal) {

                var data = new FormData(document.getElementById("updateCompanionForm" + no));

                $.ajax({
                    type: "POST",
                    url: "/updateEmployeeCompanion",
                    data: data,
                    dataType: "json",
                    async: false,
                    processData: false,
                    contentType: false,
                }).done(function(data) {
                    // console.log(data);
                    swal({
                        title: data.title,
                        text: data.msg,
                        type: data.type,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        allowOutsideClick: false,
                        allowEscapeKey: false
                    }).then(function() {
                        if (data.type == 'error') {

                        } else {
                            location.reload();

                        }


                    });
                });

            });
        });
    }

    $("#tableChildren").DataTable({
        responsive: true,
    });

    $('#childModalAdd').click(function(e) {
        $('#add-children').modal('show');
    });

    $('#addChildren').click(function(e) {
        requirejs(['sweetAlert2'], function(swal) {

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
                        // $('#tableChildren').DataTable()  .ajax.reload()
                    }


                });
            });

        });
    });

    $('#editChildren').click(function(e) {
        requirejs(['sweetAlert2'], function(swal) {

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
                // console.log(data);
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


    childId = $('#childId').val();

    childIds = childId.split(',');

    for (let i = 0; i < childIds.length; i++) {

        const type = childIds[i];
        $('#childModalEdit' + type).click(function(e) {

            id = $(this).data('id');
            var childrenData = getChildren(id);

            childrenData.done(function(data) {
                child = data.data;
                $('#DOB1').val(child.DOB);
                $('#age1').val(child.age);
                $('#created_at1').val(child.created_at);
                $("#educationLevel1").prop("selectedIndex", child.educationLevel);
                $("#educationType1").prop("selectedIndex", child.educationType);
                $('#expiryDate1').val(child.expiryDate);
                $('#firstName1').val(child.firstName);
                $('#fullName1').val(child.fullName);
                $("#gender1").prop("selectedIndex", child.gender);
                $('#id1').val(child.id);
                $('#idNo1').val(child.idNo);
                $('#instituition1').val(child.instituition);
                $("#issuingCountry1").val(child.issuingCountry);
                // $("#issuingCountry1").prop("selectedIndex", child.issuingCountry);
                $('#lastName1').val(child.lastName);
                $("#maritalStatus1").prop("selectedIndex", child.maritalStatus);
                if (child.nonCitizen == 'on') {
                    $('#nonCitizen1').prop('checked', true);
                }
                $('#passports1').val(child.passport);
                $('#supportDoc1').val(child.supportDoc);
            });
            $('#edit-children').modal('show');
        });

        $('#childModalView' + type).click(function(e) {
            id = $(this).data('id')
            var childrenData = getChildren(id);

            childrenData.done(function(data) {
                $('#viewChildren').hide();
                child = data.data;
                $('#DOB').val(child.DOB);
                $('#age').val(child.age);
                $('#created_at').val(child.created_at);
                $("#educationLevel").prop("selectedIndex", child.educationLevel);
                $("#educationType").prop("selectedIndex", child.educationType);
                $('#expiryDate').val(child.expiryDate);
                $('#firstName').val(child.firstName);
                $('#fullName').val(child.fullName);
                $("#gender").prop("selectedIndex", child.gender);
                $('#id').val(child.id);
                $('#idNo').val(child.idNo);
                $('#instituition').val(child.instituition);
                $("#issuingCountry").val(child.issuingCountry);
                // $("#issuingCountry").prop("selectedIndex", child.issuingCountry);
                $('#lastName').val(child.lastName);
                $("#maritalStatus").prop("selectedIndex", child.maritalStatus);
                if (child.nonCitizen === 'on') {
                    $('#nonCitizen').prop('checked', true);
                }
                $('#passports').val(child.passport);
                $('#supportDoc').val(child.supportDoc);
            });

            $('#view-children').modal('show');
        });

        $('#deleteChildren' + type).click(function(e) {
            id = $(this).data('id');
            requirejs(['sweetAlert2'], function(swal) {
                swal({
                    title: "Are you sure!",
                    type: "error",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes!",
                    showCancelButton: true,
                }).then(function() {
                    $.ajax({
                        type: "DELETE",
                        url: "/deleteChildren/" + id,
                        dataType: "json",
                        async: false,
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
                url: "/getChildren/" + id
            });

        }

    }

    $("#tableSibling").DataTable({
        responsive: true,
    });

    $('#siblingModalAdd').click(function(e) {
        $('input').prop('disabled', false);
        $('select').prop('disabled', false);
        $('#add-sibling').modal('show');
    });

    $('#addSibling').click(function(e) {
        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("addSiblingForm"));

            $.ajax({
                type: "POST",
                url: "/addEmployeeSibling",
                data: data,
                dataType: "json",
                async: false,
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

                    } else {
                        location.reload();
                        // $('#tableSibling').DataTable()  .ajax.reload()
                    }


                });
            });

        });
    });

    $('#editSibling').click(function(e) {
        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("editSiblingForm"));

            $.ajax({
                type: "POST",
                url: "/updateEmployeeSibling",
                data: data,
                dataType: "json",
                async: false,
                processData: false,
                contentType: false,
            }).done(function(data) {
                // console.log(data);
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


    siblingId = $('#siblingId').val();

    siblingIds = siblingId.split(',');

    for (let i = 0; i < siblingIds.length; i++) {

        const type = siblingIds[i];
        $('#siblingModalEdit' + type).click(function(e) {
            id = $(this).data('id');
            $('input').prop('disabled', false);
            $('select').prop('disabled', false);
            var SiblingData = getSibling(id);

            SiblingData.done(function(data) {
                sibling = data.data;
                $('#firstNameS').val(sibling.firstName);
                $('#idSA').val(sibling.id);
                $('#lastNameS').val(sibling.lastName);
                $('#DOBS').val(sibling.DOB);
                $("#genderS").val(sibling.gender);
                $('#contactNoS').val(sibling.contactNo);
                $('#relationshipS').val(sibling.relationship);
                $('#address2S').val(sibling.address2);
                $('#address1S').val(sibling.address1);
                $('#postcodeS').val(sibling.postcode);
                $("#cityS").val(sibling.city);
                // $("#cityS").prop("selectedIndex", sibling.city);
                $("#stateSA").val(sibling.state);
                $('#countrySA').val(sibling.country);
                // $("#stateSA").prop("selectedIndex", sibling.state);
                var select = document.getElementById('countrySA');

                const options = Array.from(select.options);
                options.forEach((option, i) => {
                    if (option.value === sibling.country) select.selectedIndex = i;
                });
                // $('#countrySA').prop("selected", sibling.country);
            });
            $('#edit-sibling').modal('show');
        });

        $('#siblingModalView' + type).click(function(e) {
            id = $(this).data('id')
            var SiblingData = getSibling(id);
            $('input').prop('disabled', true);
            $('select').prop('disabled', true);
            SiblingData.done(function(data) {
                console.log(data.data);
                $('#viewSibling').hide();
                sibling = data.data;
                $('#firstNameS1').val(sibling.firstName);
                $('#lastNameS1').val(sibling.lastName);
                $('#DOBS1').val(sibling.DOB);
                $("#genderS1").val(sibling.gender);
                $('#relationshipS1').val(sibling.relationship);
                $('#contactNoS1').val(sibling.contactNo);
                $('#address2S1').val(sibling.address2);
                $('#address1S1').val(sibling.address1);
                $('#postcodeS1').val(sibling.postcode);
                $("#cityS1").val(sibling.city);
                // $("#cityS1").prop("selectedIndex", sibling.city);
                $("#stateS1").val(sibling.state);
                // $("#stateS1").prop("selectedIndex", sibling.state);
                $('#countryS1').val(sibling.country);
                // $('#countryS1').prop("selectedIndex", sibling.country);
                var select = document.getElementById('countryS1');

                const options = Array.from(select.options);
                options.forEach((option, i) => {
                    if (option.value === sibling.country) select.selectedIndex = i;
                });
            });

            $('#view-sibling').modal('show');
        });

        $('#deleteSibling' + type).click(function(e) {
            id = $(this).data('id');
            requirejs(['sweetAlert2'], function(swal) {
                swal({
                    title: "Are you sure!",
                    type: "error",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes!",
                    showCancelButton: true,
                }).then(function() {
                    $.ajax({
                        type: "DELETE",
                        url: "/deleteSibling/" + id,
                        dataType: "json",
                        async: false,
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
                url: "/getSiblingById/" + id
            });

        }

    }

    $("#tableParent").DataTable({
        responsive: true,
    });

    $('#parentModalAdd').click(function(e) {
        $('input').prop('disabled', false);
        $('select').prop('disabled', false);
        $('#add-parent').modal('show');
    });

    $('#addParent').click(function(e) {
        requirejs(['sweetAlert2'], function(swal) {

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
                        // $('#tableParent').DataTable()  .ajax.reload()
                    }


                });
            });

        });
    });

    $('#editParent').click(function(e) {
        requirejs(['sweetAlert2'], function(swal) {

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
                // console.log(data);
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


    parentId = $('#parentId').val();

    parentIds = parentId.split(',');

    for (let i = 0; i < parentIds.length; i++) {

        const type = parentIds[i];
        $('#parentModalEdit' + type).click(function(e) {
            $('input').prop('disabled', false);
            $('select').prop('disabled', false);
            id = $(this).data('id');
            var ParentData = getParent(id);

            ParentData.done(function(data) {
                console.log(data.data);
                parent = data.data;
                $('#DOBP1').val(parent.DOB);
                $('#idP').val(parent.id);
                $('#address2P1').val(parent.address2);
                $('#address1P1').val(parent.address1);
                $("#cityP1").val(parent.city);
                $("#stateP1").val(parent.state);
                $('#countryP1').val(parent.country);
                $('#contactNoP1').val(parent.contactNo);
                $('#genderP1').val(parent.gender);
                $('#firstNames1').val(parent.firstName);
                $("#postcodeP1").val(parent.postcode);
                $('#lastNameP1').val(parent.lastName);
                $("#relationshipP1").val(parent.relationship);
                if (parent.nonCitizen == 'on') {
                    $('#nonCitizenP1').prop('checked', true);
                }
            });
            $('#edit-parent').modal('show');
        });

        $('#parentModalView' + type).click(function(e) {
            id = $(this).data('id')
            var ParentData = getParent(id);

            $('input').prop('disabled', true);
            $('select').prop('disabled', true);

            ParentData.done(function(data) {
                $('#viewParent').hide();
                parent = data.data;
                $('#DOBP').val(parent.DOB);
                $('#address1P').val(parent.address1);
                $('#address2P').val(parent.address2);
                $("#cityP").val(parent.city);
                $("#stateP").val(parent.state);
                $('#contactNoP').val(parent.contactNo);
                $('#firstNameP').val(parent.firstName);
                $('#genderP').val(parent.gender);
                $('#countryP').val(parent.country);
                $("#postcodeP").val(parent.postcode);
                $('#lastNameP').val(parent.lastName);
                $("#relationshipP").val(parent.relationship);
                if (parent.nonCitizen == 'on') {
                    $('#nonCitizenP').prop('checked', true);
                }
            });

            $('#view-parent').modal('show');
        });

        $('#deleteParent' + type).click(function(e) {
            id = $(this).data('id');
            requirejs(['sweetAlert2'], function(swal) {
                swal({
                    title: "Are you sure!",
                    type: "error",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes!",
                    showCancelButton: true,
                }).then(function() {
                    $.ajax({
                        type: "DELETE",
                        url: "/deleteParent/" + id,
                        dataType: "json",
                        async: false,
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
                url: "/getParentById/" + id
            });

        }

    }


    $(document).on("click", "#addVehicleView", function() {
        $('input').prop('disabled', false);
        $('select').prop('disabled', false);
        $('#add-vehicle').modal('show');

    });

    $(document).on("click", "#editVehicleView", function() {
        var id = $(this).data('id');
        var vehicleData = getVehicle(id);
        $('input').prop('disabled', false);
        $('select').prop('disabled', false);
        // $('#vehicleType').val('');

        vehicleData.done(function(data) {
            $('input').val('');

            vdata = data.data;
            $('#vehicleType').val(vdata.vehicle_type);
            $('#idV').val(vdata.id);
            // var select = document.getElementById('vehicleType');

            // const options = Array.from(select.options);
            // options.forEach((option, i) => {
            //     if (option.value === vdata.vehicle_type) select.selectedIndex = i;
            // });
            $('#plateNo').val(vdata.plate_no);
        })
        $('#edit-vehicle').modal('show');

    });

    $(document).on("click", "#viewVehicleView", function() {
        var id = $(this).data('id');
        var vehicleData = getVehicle(id);
        $('input').prop('disabled', true);
        $('select').prop('disabled', true);

        vehicleData.done(function(data) {
            $('input').val('');
            vdata = data.data;
            $('#vehicleType1').prop('selectedIndex', vdata.vehicle_type);
            $('#plateNo1').val(vdata.plate_no);
        })
        $('#view-vehicle').modal('show');

    });

    $(document).on("click", "#deleteVehicle", function() {
        id = $(this).data('id');
        requirejs(['sweetAlert2'], function(swal) {
            swal({
                title: "Are you sure!",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then(function() {
                $.ajax({
                    type: "DELETE",
                    url: "/deleteVehicle/" + id,
                    dataType: "json",
                    async: false,
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
                        allowEscapeKey: false
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

    function getVehicle(id) {
        return $.ajax({
            url: "/getVehicleById/" + id
        });
    }


    $('#saveVehicle').click(function(e) {
        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("addVehicleForm"));

            $.ajax({
                type: "POST",
                url: "/addEmployeeVehicle",
                data: data,
                dataType: "json",
                async: false,
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

                    } else {
                        location.reload();
                    }


                });
            });

        });
    });

    $('#updateVehicle').click(function(e) {
        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("updateVehicleForm"));

            $.ajax({
                type: "POST",
                url: "/updateEmployeeVehicle",
                data: data,
                dataType: "json",
                async: false,
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

                    } else {
                        location.reload();
                    }


                });
            });

        });
    });

    $('#updateEmp').click(function(e) {
        // id = $(this).data('id');
        var data = new FormData(document.getElementById("addEmpForm"));

        requirejs(['sweetAlert2'], function(swal) {
            swal({
                title: "Are you sure!",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then(function() {
                $.ajax({
                    type: "POST",
                    url: "/updateEmployee",
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
                        allowEscapeKey: false
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

})