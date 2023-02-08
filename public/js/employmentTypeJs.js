$(document).ready(function() {

    $("input[type=text]").keyup(function() {
        $(this).val($(this).val().toUpperCase());
    });


    $("#datepicker-joindate").datepicker({
        todayHighlight: true,
        autoclose: true,
    });

    $("#tableemploymenttype").DataTable({
        responsive: false,
        lengthMenu: [5, 10],
    });

    $(document).on("click", "#addButton", function() {
        $('#addModal').modal('show');

    });

    $(document).on("click", "#editButton", function() {
        var id = $(this).data('id');
        var vehicleData = getEmploymentType(id);

        vehicleData.done(function(data) {
            console.log(data);
            $('#codes').val(data.code);
            $('#type').val(data.type);
            $('#idE').val(data.id);
        })
        $('#editModal').modal('show');

    });

    $(document).on("click", "#deleteButton", function() {
        id = $(this).data('id');
        requirejs(['sweetAlert2'], function(swal) {
            swal({
                title: "Are you sure to delete Employment Type?",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then(function() {
                $.ajax({
                    type: "POST",
                    url: "/deleteEmploymentType/" + id,
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

    function getEmploymentType(id) {
        return $.ajax({
            url: "/getEmploymentTypeById/" + id
        });
    }


    $('#saveButton').click(function(e) {

        $("#addForm").validate({
            // Specify validation rules
            rules: {


               
                type:"required",
                
            },

            messages: {
               
                type: "Please Insert Employment Name",

            },
            submitHandler: function(form) {

                requirejs(['sweetAlert2'], function(swal) {

                    var data = new FormData(document.getElementById("addForm"));
                    // var data = $('#tree').jstree("get_selected");

                    $.ajax({
                        type: "POST",
                        url: "/createEmploymentType",
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

    $('#updateButton').click(function(e) {

        $("#editForm").validate({
            // Specify validation rules
            rules: {


               
                type:"required",
                
            },

            messages: {
               
                type: "Please Insert Employment Name",

            },
            submitHandler: function(form) {

                requirejs(['sweetAlert2'], function(swal) {

                    var data = new FormData(document.getElementById("editForm"));
                    var id = $('#idE').val();

                    $.ajax({
                        type: "POST",
                        url: "/updateEmploymentType/" + id,
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
});