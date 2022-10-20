$(document).ready(function() {

    $("input[type=text]").keyup(function() {
        $(this).val($(this).val().toUpperCase());
    });
    $("option[type=text]").keyup(function () {  
        $(this).val($(this).val().toUpperCase());  
    });

    $("#datepicker-joindate").datepicker({
        todayHighlight: true,
        autoclose: true,
    });


    $("#tablebranch").DataTable({
        responsive: false,
        lengthMenu: [5, 10],
    });

    $(document).on("click", "#addButton", function() {
        $('#addModal').modal('show');

    });

    $(document).on("click", "#editButton", function() {
        var id = $(this).data('id');
        var vehicleData = getBranch(id);

        vehicleData.done(function(data) {
            console.log(data);
            $('#unitId').val(data.unitId);
            $('#branchName').val(data.branchName);
            $('#branchCode').val(data.branchCode);
            $('#branchType').val(data.branchType);
            // $('#branchType').prop('selectedIndex', data.branchType);
            $('#postcodeD').val(data.postcode);
            $('#address').val(data.address);
            $('#address2').val(data.address2);
            $('#city').val(data.city);
            $('#state').val(data.state);
            $('#country').val(data.country);
            $('#idB').val(data.id);
        })
        $('#editModal').modal('show');

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
                    type: "POST",
                    url: "/deleteBranch/" + id,
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

    function getBranch(id) {
        return $.ajax({
            url: "/getBranchById/" + id
        });
    }


    $('#saveButton').click(function(e) {

        $("#addForm").validate({
            // Specify validation rules
            rules: {

                branchCode: "required",
                branchName: "required",
                branchType: "required",
                unitId: "required",
                address: "required",
                postcode: {
                    required: true,
                    digits: true,
                    rangelength: [5, 5]
                },
                city: "required",
                state: "required",

            },

            messages: {

                branchCode: "Please Insert Branch Code ",
                branchName: "Please Insert Branch Name",
                branchType: "Please Insert Branch Type",
                unitId: "Please Choose Unit Name",
                address: "Please Insert Address",
                postcode: {
                    required: "Enter Postcode",
                    digits: "Please Enter Valid Postcode",
                    rangelength: "Please Enter Valid Postcode"
                },
                city: "Please Insert City",
                state: "Please Choose State"

            },
            submitHandler: function(form) {

                requirejs(['sweetAlert2'], function(swal) {

                    var data = new FormData(document.getElementById("addForm"));
                    // var data = $('#tree').jstree("get_selected");

                    $.ajax({
                        type: "POST",
                        url: "/createBranch",
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
            }
        });
    });

    $('#updateButton').click(function(e) {

        $("#editForm").validate({
            // Specify validation rules
            rules: {

                branchCode: "required",
                branchName: "required",
                branchType: "required",
                unitId: "required",
                address: "required",
                postcode: {
                    required: true,
                    digits: true,
                    rangelength: [5, 5]
                },
                city: "required",
                state: "required",

            },

            messages: {

                branchCode: "Please Insert Branch Code ",
                branchName: "Please Insert Branch Name",
                branchType: "Please Insert Branch Type",
                unitId: "Please Choose Unit Name",
                address: "Please Insert Address",
                postcode: {
                    required: "Enter Postcode",
                    digits: "Please Enter Valid Postcode",
                    rangelength: "Please Enter Valid Postcode"
                },
                city: "Please Insert City",
                state: "Please Choose State"

            },
            submitHandler: function(form) {

                requirejs(['sweetAlert2'], function(swal) {

                    var data = new FormData(document.getElementById("editForm"));
                    var id = $('#idB').val();

                    $.ajax({
                        type: "POST",
                        url: "/updateBranch/" + id,
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
            }
        });
    });

});