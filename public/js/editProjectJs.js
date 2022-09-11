$(document).ready(function() {

    $("#datepicker-joineddate").datepicker({
        todayHighlight: true,
        autoclose: true,
    });

    $("#datepicker-exitdate").datepicker({
        todayHighlight: true,
        autoclose: true,
    });

    $("#projectTable").DataTable({
        responsive: true,
    });

    $("#data-table-default2").DataTable({
        responsive: true,
        lengthMenu: [5, 10, 15],
    });

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
                project_manager: "required",
                bank_guarantee_amount: "required",
            },

            messages: {
                customer_id: "",
                project_code: "",
                project_name: "",
                contract_value: "",
                financial_year: "",
                LOA_date: "",
                contract_start_date: "",
                contract_end_date: "",
                project_manager: "",
                acc_manager: "",
                bank_guarantee_amount: "",
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
                            confirmButtonText: 'OK'
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
    /////////////////////// END PROJECT /////////////////////

    /////////////////////// START PROJECT LOCATION /////////////////////
    $('#saveProjectLocation').click(function(e) {
        $("#addProjectLocationForm").validate({
            rules: {
                location_name: "required",
                address: "required",
                postcode: "required",
                city: "required",
                state: "required",
                country: "required",
                location_google: "required",
            },

            messages: {
                location_name: "",
                address: "",
                postcode: "",
                city: "",
                state: "",
                country: "",
                location_google: "",
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
                            confirmButtonText: 'OK'
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

    $(document).on("click", "#addProjectLocationButton", function() {
        $('#addProjectLocationModal').modal('show');

    });

    $(document).on("click", "#editProjectLocationButton", function() {
        var id = $(this).data('id');
        var vehicleData = getProjectLocation(id);

        vehicleData.done(function(data) {
            console.log(data);
            $('#location_name').val(data.location_name);
            $('#address').val(data.address);
            $('#address1').val(data.address2);
            $('#postcode').val(data.postcode);
            $('#idPL').val(data.id);
            $('#city').val(data.city);
            $('#state').val(data.state);
            $('#location_google').val(data.location_google);
        })
        $('#editProjectLocationModal').modal('show');

    });

    $('#updateProjectLocation').click(function(e) {
        $("#editProjectLocationForm").validate({
            rules: {
                location_name: "required",
                address: "required",
                postcode: "required",
                city: "required",
                state: "required",
                country: "required",
                location_google: "required",
            },

            messages: {
                location_name: "",
                address: "",
                postcode: "",
                city: "",
                state: "",
                country: "",
                location_google: "",
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
                            confirmButtonText: 'OK'
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
                title: "Are you sure!",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
            }).then(function() {
                $.ajax({
                    type: "DELETE",
                    url: "/deleteProjectLocation/" + id,
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
                        confirmButtonText: 'OK'
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

    function getProjectLocation(id) {
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
                branch: "required",
                unit: "required",
                department: "required",
                location_google: "required",
            },

            messages: {
                joined_date: "",
                employee_id: "",
                postcode: "",
                designation: "",
                unit: "",
                department: "",
                location_google: "",
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
                            confirmButtonText: 'OK'
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
            $("#unit").prop("selectedIndex", data.unit);
            $("#designation").prop("selectedIndex", data.unit);
            $("#department").prop("selectedIndex", data.department);
            $("#branch").prop("selectedIndex", data.branch);
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
                designation: "required",
                branch: "required",
                unit: "required",
                department: "required",
                location_google: "required",
            },

            messages: {
                joined_date: "",
                employee_id: "",
                designation: "",
                branch: "",
                unit: "",
                department: "",
                location_google: "",
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
                            confirmButtonText: 'OK'
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

    function getProjectLocation(id) {
        return $.ajax({
            url: "/getProjectMemberById/" + id
        });
    }

    $(document).on("click", "#assignProjectMemberButton", function() {
        $('#assignProjectMemberModal').modal('show');
    });

    $('#assignProjectMember').click(function(e) {
        $("#assignProjectMemberForm").validate({
            rules: {},

            messages: {},
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
                            confirmButtonText: 'OK'
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
        var vehicleData = getProjectLocation(id);

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
                title: "Are you sure!",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
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
                        confirmButtonText: 'OK'
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
                customer_id: "",
                project_code: "",
                project_name: "",
                contract_value: "",
                financial_year: "",
                LOA_date: "",
                contract_start_date: "",
                contract_end_date: "",
                acc_manager: "",
                bank_guarantee_amount: "",
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
                            confirmButtonText: 'OK'
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

    $('#updateButton').click(function(e) {
        $("#editForm").validate({
            rules: {
                customer_name: "required",
                address: "required",
                phoneNo: "required",
                email: "required"
            },

            messages: {
                customer_name: "",
                address: "",
                phoneNo: "",
                email: ""
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
                            confirmButtonText: 'OK'
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
                    confirmButtonText: 'OK'
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
        autoclose: true
    });
    $("#datepicker-start").datepicker({
        todayHighlight: true,
        autoclose: true
    });
    $("#datepicker-end").datepicker({
        todayHighlight: true,
        autoclose: true
    });
    $("#datepicker-warstart").datepicker({
        todayHighlight: true,
        autoclose: true
    });
    $("#datepicker-warend").datepicker({
        todayHighlight: true,
        autoclose: true
    });
    $("#datepicker-bankexpiry").datepicker({
        todayHighlight: true,
        autoclose: true
    });


});