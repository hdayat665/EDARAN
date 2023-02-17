$(document).ready(function() { 

    $("#datepicker-joindate").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: 'yyyy/mm/dd',
    });

    $("#projectTable").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        scrollX:true,
    });

    $('#acc_manager2').picker({
        search:true,
    });

    

    $("#data-table-default2").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        scrollX:true,
    });

    $(document).on("click", "#addButton", function() {
        $('#addModal').modal('show');

    });


    $("input[type=text]").keyup(function() {
        $(this).val($(this).val().toUpperCase());
    });

    $("textarea[type=text]").keyup(function() {
        $(this).val($(this).val().toUpperCase());
    });

    $(document).on("click", "#editButton", function() {
        var id = $(this).data('id');
        var vehicleData = getData(id);

        vehicleData.done(function(data) {
            console.log(data);
            $('#customer_name').val(data.customer_name);
            $('#address').val(data.address);
            $('#phoneNo').val(data.phoneNo);
            $('#idC').val(data.id);
            $('#email').val(data.email);
        })
        $('#editModal').modal('show');

    });

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

    function getData(id) {
        return $.ajax({
            url: "/getCustomerById/" + id
        });
    }

    function getProject(id) {
        return $.ajax({
            url: "/getProjectById/" + id
        });
    }


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
                customer_name: "Enter Name",
                address: "Enter Address",
                phoneNo: "Enter Phone Numer",
                email: "Enter A valid Email Address"
            },
            submitHandler: function(form) {
                requirejs(['sweetAlert2'], function(swal) {

                    var data = new FormData(document.getElementById("editForm"));
                    //console.log(data);
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


    $(document).on("click", "#approveButton", function() {
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
                    type: "POST",
                    url: "/approveProjectMember/" + id,
                    dataType: "json",
                    async: false,
                    processData: false,
                    contentType: false,
                }).done(function(data) {
                    swal({
                        title: data.title,
                        text: "Successfully Approve Project Request",
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

    $(document).on("click", "#rejectViewButton", function() {
        var id = $(this).data('id');
        var projectData = getProject(id);

        projectData.done(function(data) {
            console.log(data);
            $('#idReject').val(data.id);
            $('#employeeIdR').val(data.employeeId);
            $('#employeeNameR').val(data.employeeName);
            $('#workingEmailR').val(data.workingEmail);
            $('#departmentR').val(data.departmentName);
            $('#customerNameR').val(data.customer_name);
            $('#projectCodeR').val(data.project_code);
            $('#projectNameR').val(data.project_name);
        })
        $('#rejectProjectApproval').modal('show');

    });

    $(document).on("click", "#rejectButton", function() {
        id = $('#idReject').val();
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
                var data = new FormData(document.getElementById("rejectForm"));

                $.ajax({
                    type: "POST",
                    url: "/rejectProjectMember/" + id,
                    dataType: "json",
                    data: data,
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