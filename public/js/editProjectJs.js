
$(document).ready(function() {

    // google map

    
    $(".partCheck").click(function(){
        if ($(this).prop("checked")) {
            $('#exitdatediv').show();
           
           
            
        } else {
            
            $('#exitdatediv').hide();
            
        }
      });

    $("input[type=text]").keyup(function() {
        $(this).val($(this).val().toUpperCase());
    });

    $('#location-search').picker({
        search:true,
        
    });

    $('#location-search-edit').picker({
        search:true,
        
    });
    
    $('#projectmember').picker({
        search:true,
    });
    // $('#employee_id').picker({
    //     search:true,
    // });
    $('#acc_manager2').picker({
        search:true,
    });
    $('#project_manager2').picker({
        search:true,
    });
    $('#projectlocation').picker({
        search:true,
    }); 
 
    $("#joined_date").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: 'yyyy/mm/dd',
    });
    $("#datepicker-joineddate").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: 'yyyy/mm/dd',
    });
    $("#datepicker-exitdate").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: 'yyyy/mm/dd',
    });


    $(document).ready(function() {
        var general = $("#projectLocationTable").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        order: [],
        drawCallback: function(settings) {
            // Apply scrollX after the table is fully rendered
            $("#projectLocationTable").DataTable().columns.adjust().draw();
        },
        columnDefs: [
            {
            targets: "_all",
            orderable: false,
            },
        ],
        });
    
        $("#nav_pro_loc").on("click", function() {
        setTimeout(function() {
            general.columns.adjust().draw();
        }, 200);
        });
    });

   
    $(document).ready(function() {
        var general = $("#data-table-prevproject").DataTable({
          responsive: false,
          lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
          ],
          order: [], // Disable sorting
          drawCallback: function(settings) {
            // Apply scrollX after the table is fully rendered
            requestAnimationFrame(function() {
              $("#data-table-prevproject").DataTable().columns.adjust().draw();
            });
          },
          columnDefs: [
            {
              targets: "_all",
              orderable: false,
            },
          ],
        });
      
        $("#nav_pre_pro").on("click", function() {
          requestAnimationFrame(function() {
            general.columns.adjust().draw();
          });
        });
      });
      

    $(document).ready(function() {
        var general = $("#projectMemberTable").DataTable({
          responsive: false,
          lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
          ],
          drawCallback: function(settings) {
            // Apply scrollX after the table is fully rendered
            $("#projectMemberTable").DataTable().columns.adjust().draw();
          },
          order: [],
          columnDefs: [
            {
              targets: "_all",
              orderable: false,
            },
          ],
        });
      
        $("#current_mem").on("click", function() {
          setTimeout(function() {
            general.columns.adjust().draw();
          }, 200);
        });
      });
    
    $(document).ready(function() {
        var general = $("#projectMemberPrevTable").DataTable({
          responsive: false,
          lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
          ],
          drawCallback: function(settings) {
            // Apply scrollX after the table is fully rendered
            $("#projectMemberPrevTable").DataTable().columns.adjust().draw();
          },
          order: [],
          columnDefs: [
            {
              targets: "_all",
              orderable: false,
            },
          ],
        });
      
        $("#previous_mem").on("click", function() {
          setTimeout(function() {
            general.columns.adjust().draw();
          }, 200);
        });
    });
     

    $("#data-table-default2").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        scrollX:true,
    });

    var hash = location.hash.replace(/^#/, '');  // ^ means starting, meaning only match the first hash
    if (hash) {
        $('.nav-tabs a[href="#' + hash + '"]').tab('show');
    } 
    $('.nav-tabs a').on('shown.bs.tab', function (e) {
        window.location.hash = e.target.hash;
    })
    /////////////////////// START PROJECT /////////////////////
    $('#updateProjectInfoButton').click(function(e) {
        $("#editProjectInfoForm").validate({
            rules: {
                customer_id: "required",
                project_code: "required",
                project_name: "required",
                contract_value: "required",
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
                contract_value: "Please Insert Contract Value",
                financial_year: "Please Choose Financial Year",
                LOA_date: "Please Choose LOA Date",
                contract_start_date: "Please Choose Contract Start Date",
                contract_end_date: "Please Choose Contract End Date",
                acc_manager: "Please Insert Account Manager",
                status: "Please Insert Status",
            },
            submitHandler: function(form) {
                requirejs(['sweetAlert2'], function(swal) {

                    var data = new FormData(document.getElementById("editProjectInfoForm"));
                    // var data = $('#tree').jstree("get_selected");
                    var id = $('#idP').val();

                    $.ajax({
                        type: "POST",
                        url: "/updateProject/" + id,
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
            }
                });      
            });
            
            
    /////////////////////// END PROJECT /////////////////////

    /////////////////////// START PROJECT LOCATION /////////////////////
    $('#saveProjectLocation').click(function(e) {
        $("#addProjectLocationForm").validate({
            rules: {
                location_name: "required",
                address: "required",
                postcode: {
                    required: true,
                    digits: true,
                    rangelength: [5,5],
                },
                city: "required",
                state: "required",
                location_google: "required",
            },

            messages: {
                location_name: "Please Insert Location Name",
                address: "Please Insert Address 1",
                postcode: {
                    required: "Please Insert Postcode",
                    digits: "Please Insert Valid Postcode",
                    rangelength: "Please Insert Valid Postcode",
                },
                city: "Please Insert City",
                state: "Please Choose State",
                location_google: "Please Choose Location",
            },
            submitHandler: function(form) {
                requirejs(['sweetAlert2'], function(swal) {

                    var data = new FormData(document.getElementById("addProjectLocationForm"));
                    // var data = $('#tree').jstree("get_selected");
                    // var id = $('#idPC').val();

                    $.ajax({
                        type: "POST",
                        url: "/createProjectLocation",
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
            },
        });
    });

    const nextBtn = document.querySelectorAll(".btnNext");
    const prevBtn = document.querySelectorAll(".btnPrevious");

    nextBtn.forEach(function(item, index){
        item.addEventListener('click', function(){
        let id = index + 1;
        let tabElement = document.querySelectorAll("#myTab li a")[id];
        var lastTab = new bootstrap.Tab(tabElement);
        lastTab.show();   
        });
    });

    prevBtn.forEach(function(item, index){
        item.addEventListener('click', function(){
        let id = index;
        let tabElement = document.querySelectorAll("#myTab li a")[id];
        var lastTab = new bootstrap.Tab(tabElement);
        lastTab.show();
        });
    });
    
    $(document).on("click", "#addProjectLocationButton", function() {
        $('#addProjectLocationModal').modal('show');

    });

    $(document).on("click", "#editProjectLocationButton", function() {
        var id = $(this).data('id');
        var locationData = getProjectLocations(id);

        locationData.done(function(data) {
            console.log(data);
            $('#location_name').val(data.location_name);
            $('#address').val(data.address);
            $('#address1').val(data.address2);
            $('#postcode').val(data.postcode);
            $('#idPL').val(data.id);
            $('#city').val(data.city);
            $('#state').val(data.state);
            $('#location_google_2').val(data.location_google);
            $('#latitude_2').val(data.latitude);
            $('#longitude_2').val(data.longitude);
        })
        $('#editProjectLocationModal').modal('show');

    });

    $('#updateProjectLocation').click(function(e) {
        $("#editProjectLocationForm").validate({
            rules: {
                location_name: "required",
                address: "required",
                postcode: {
                    required: true,
                    digits: true,
                    rangelength: [5,5],
                },
                city: "required",
                state: "required",
                location_google: "required",
            },

            messages: {
                location_name: "Please Insert Location Name",
                address: "Please Insert Address 1",
                postcode: {
                    required: "Please Insert Postcode",
                    digits: "Please Insert Valid Postcode",
                    rangelength: "Please Insert Valid Postcode",
                },
                city: "Please Insert City",
                state: "Please Choose State",
                location_google: "Please Choose Location",
            },
            submitHandler: function(form) {
                requirejs(['sweetAlert2'], function(swal) {

                    var data = new FormData(document.getElementById("editProjectLocationForm"));
                    // var data = $('#tree').jstree("get_selected");
                    var id = $('#idPL').val();

                    $.ajax({
                        type: "POST",
                        url: "/updateProjectLocation/" + id,
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
            },
        });
    });

    $(document).on("click", "#deleteProjectLocationButton", function() {
        id = $(this).data('id');
        requirejs(['sweetAlert2'], function(swal) {
            swal({
                title: "Are you sure to delete Project Location?",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then(function() {
                $.ajax({ 
                    type: "POST",
                    url: "/deleteProjectLocation/" + id,
                    // dataType: "json",
                    data: { _method: "DELETE" },
                    // async: false,
                    // processData: false,
                    // contentType: false,
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

    function getProjectLocations(id) {
        return $.ajax({
            url: "/getProjectLocationById/" + id
        });
    }
    /////////////////////// END PROJECT LOCATION /////////////////////

    /////////////////////// START PROJECT MEMBER /////////////////////
    $('#saveProjectMember').click(function(e) {
        $("#addProjectMemberForm").validate({
            rules: {
                joined_date: "required",
                employee_id: "required",
                designation: "required",
                department:"required",
                branch: "required",
                unit:"required",
                location_name: "required",
            },

            messages: {
                joined_date: "Please Choose Joined Date",
                employee_id: "Please Choose Project Member Name",
                department:"Please Choose department",
                branch: "Please Choose Branch",
                designation: "Please Choose designation",
                unit:"Please Choose Unit",
                location_name:"Please Select Location",
            },
            submitHandler: function(form) {
                requirejs(['sweetAlert2'], function(swal) {

                    var data = new FormData(document.getElementById("addProjectMemberForm"));
                    // var data = $('#tree').jstree("get_selected");
                    // var id = $('#idPC').val();

                    $.ajax({
                        type: "POST",
                        url: "/createProjectMember",
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
            },
        });
    });

    $(document).on("change", "#employee_id", function() {
        var employee_id = $(this).val()
        var employee = getEmployeeById(employee_id)

        employee.done(function(data) {
            console.log(data);
            // $("#unit").prop("selectedIndex", data.unit);
            // $("#designation").prop("selectedIndex", data.designation);
            // $("#department").prop("selectedIndex", data.department);
            // $("#branchs").prop("selectedIndex", data.branch);
            $("#unit").val(data.unit);
            $("#designation").val(data.designation);
            $("#department").val(data.department);
            $("#branchs").val(data.branch);
        })
    })

    function getEmployeeById(id) {
        return $.ajax({
            url: "/getEmployeeById/" + id
        });
    }

    $(document).on("click", "#addProjectMemberButton", function() {
        $('#addProjectMemberModal').modal('show'); 

    });

    $(document).on("click", "#editProjectMemberButton", function() {
        var id = $(this).data('id');
        var vehicleData = getProjectMember(id);

        vehicleData.done(function(data) {
            console.log(data);
            $("#joined_date").val(data.joined_date);
            $("#employee_idE").val(data.employee_id);
            $("#unitE").val(data.unit);
            $("#designationE").val(data.designation);
            $("#departmentE").val(data.department);
            $("#branchE").val(data.branch);
            $("#exit_project").prop('checked', data.exit_project);
            $("#exit_project_date").val(data.exit_project_date);
            $("#idPM").val(data.id);
        })
        $('#editProjectMemberModal').modal('show');

    });

    function getProjectMember(id) {
        return $.ajax({
            url: "/getProjectMemberById/" + id
        });
    }

    $('#updateProjectMember').click(function(e) {
        $("#editProjectMemberForm").validate({
            rules: {
                joined_date: "required",
                employee_id: "required",
                //project_id: "required",
                branch: "required",
                unit:"required",
                location_name: "required",
            },

            messages: {
                joined_date: "Please Choose Date",
                employee_id: "Please Choose Name",
                //project_id: "Please Choos Name",
                branch: "Please Choose Branch",
                unit:"Please Choose Unit",
                location_name:"Please Select Location",
            },
            submitHandler: function(form) {
                requirejs(['sweetAlert2'], function(swal) {

                    var data = new FormData(document.getElementById("editProjectMemberForm"));
                    // var data = $('#tree').jstree("get_selected");
                    var id = $('#idPM').val();

                    $.ajax({
                        type: "POST",
                        url: "/updateProjectMember/" + id,
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
            },
        });
    });

    // function getProjectMember(id) {
    //     return $.ajax({
    //         url: "/getProjectMemberById/" + id
    //     });
    // }

    $(document).on("click", "#assignProjectMemberButton", function() {
        $('#assignProjectMemberModal').modal('show');
    });

    $('#assignProjectMember').click(function(e) {

        $("#assignProjectMemberForm").validate({
            rules: {
                location_name: "required",
            },

            messages: {
                location_name: "Please Select Location",
            },

            submitHandler: function(form) {
                requirejs(['sweetAlert2'], function(swal) {

                    var data = new FormData(document.getElementById("assignProjectMemberForm"));
                    // var data = $('#tree').jstree("get_selected");
                    // var id = $('#idPM').val();

                    $.ajax({
                        type: "POST",
                        url: "/assignProjectMember",
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
            },
        });
    });

    $(document).on("click", "#viewAssignMemberPrevLoc", function() {
        var id = $(this).data('id');
        var vehicleData = getProjectMember(id);

        vehicleData.done(function(data) {
            console.log(data);
            $("#memberName").val(data.mem);
            $("#employee_idE").prop("selectedIndex", data.employee_id);
            $("#unitE").val(data.unit);
            $("#designationE").val(data.designation);
            $("#departmentE").val(data.department);
            $("#branchE").val(data.branch);
            $("#exit_project").prop('checked', data.exit_project);
            $("#exit_project_date").val(data.exit_project_date);
            $("#idPM").val(data.id);
        })
        $('#viewAssignMemberPrevLocModal').modal('show');

    });

    $(document).on("click", "#editPreviousProjectMemberButton", function() {
        var id = $(this).data('id');
        var vehicleData = getProjectMember(id);

        vehicleData.done(function(data) {
            console.log(data);
            $("#joined_date").val(data.joined_date);
            $("#employee_idE").prop("selectedIndex", data.employee_id);
            $("#unitE").val(data.unit);
            $("#designationE").val(data.designation);
            $("#departmentE").val(data.department);
            $("#branchE").val(data.branch);
            $("#exit_project").prop('checked', data.exit_project);
            $("#exit_project_date").val(data.exit_project_date);
            $("#idPM").val(data.id);
        })
        $('#editProjectMemberModal').modal('show');

    });

    /////////////////////// END PROJECT MEMBER /////////////////////

    $(document).on("click", "#viewButton", function() {
        var id = $(this).data('id');
        var vehicleData = getData(id);
        $('input').prop('disabled', true);
        $('select').prop('disabled', true);

        vehicleData.done(function(data) {
            $('input').val('');
            vdata = data.data;
            $('#vehicleType1').prop('selectedIndex', vdata.vehicle_type);
            $('#plateNo1').val(vdata.plate_no);
        })
        $('#viewModal').modal('show');

    });

    $(document).on("click", "#deleteButton", function() {
        id = $(this).data('id');
        requirejs(['sweetAlert2'], function(swal) {
            swal({
                title: "Are you sure to delete Customer?",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then(function() {
                $.ajax({
                    type: "DELETE",
                    url: "/deleteCustomer/" + id,
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

    $('#saveButton').click(function(e) {
        $("#addForm").validate({
            rules: {
                customer_id: "required",
                project_code: "required",
                project_name: "required",
                contract_value: "required",
                financial_year: "required",
                LOA_date: "required",
                contract_start_date: "required",
                contract_end_date: "required",
                acc_manager: "required",
                bank_guarantee_amount: "required",
            },

            messages: {
                customer_id: "Please Select Name",
                project_code: "Please Inser Code",
                project_name: "Please Insert Project Name",
                contract_value: "Please Insert Value",
                financial_year: "Please Select Year",
                LOA_date: "Please Select Specific Date",
                contract_start_date: "Please Select Specific Date",
                contract_end_date: "Please Select Specific Date",
                acc_manager: "Please Insert Account Manager",
                bank_guarantee_amount: "Pleaser Enter Amount",
            },
            submitHandler: function(form) {
                requirejs(['sweetAlert2'], function(swal) {

                    var data = new FormData(document.getElementById("addForm"));
                    // var data = $('#tree').jstree("get_selected");

                    $.ajax({
                        type: "POST",
                        url: "/createProject",
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
            },
        });
    }); 

    $.validator.addMethod("noSpecialChars", function(value, element) {
        return this.optional(element) || /^[^A-Za-z!@#$%^&*()\-_+={}[\]\\|<>"'\/~`,.;: ]*$/.test(value);
      }, "Special Characters, Spaces, and Alphabet Characters Are Not Allowed.");      
      
    $.validator.addMethod("email", function(value, element) {
        // Email validation regex pattern
        return this.optional(element) || /^[^\s@]+@[^\s@]+\.(?:com|net|org|edu|gov|mil|biz|info|name|museum|coop|aero|[a-z]{2})$/.test(value);
      }, "Please Insert Valid Email Address");


    $('#updateButton').click(function(e) {
        $("#editForm").validate({
            rules: {
                customer_name: "required",
                address: "required",
                phoneNo: {
                    required: true,
                    digits: true,
                    rangelength: [10, 11]
                },
                email: {
                    required: true,
                    email: true // Use the email validation method
                  },
            },

            messages: {
                customer_name: "Please Insert Name",
                address: "Please Insert Address 1",
                phoneNo: {
                    required: "Please Insert Phone Number",
                    digits: "Please Insert Correct Phone Number Without ' - ' or Space",
                    rangelength: "Please Insert Valid Phone Number",
                },
                email: {
                    required: "Please Insert Email Address",
                    email: "Please Insert Valid Email Address"
                  },
            },
            submitHandler: function(form) {
                requirejs(['sweetAlert2'], function(swal) {

                    var data = new FormData(document.getElementById("editForm"));
                    // console.log(data);
                    var id = $('#idC').val();

                    $.ajax({
                        type: "POST",
                        url: "/updateCustomer/" + id,
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
            },
        });
    });


    $(".statusCheck").on("change", function() {
        var checkedValue = $('.statusCheck:checked').val();
        var id = $(this).data('id');

        if (checkedValue) {
            var status = 1

        } else {
            var status = 2
        }
        requirejs(['sweetAlert2'], function(swal) {

            $.ajax({
                type: "POST",
                url: "/updateStatus/" + id + "/" + status,
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
        // updating checked attribute of change event occurred element, this.checked returns current state
        // $(".wrapper").val($(".container").html());
        // updating the value of textarea
    });


    $("#datepicker-loa").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: 'yyyy/mm/dd',
        
    });
    $("#datepicker-start").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: 'yyyy/mm/dd',
    });
    $("#datepicker-end").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: 'yyyy/mm/dd',
    });
    $("#datepicker-warstart").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: 'yyyy/mm/dd',
    });
    $("#datepicker-warend").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: 'yyyy/mm/dd',
    });
    $("#datepicker-bankexpiry").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: 'yyyy/mm/dd',
    });


});