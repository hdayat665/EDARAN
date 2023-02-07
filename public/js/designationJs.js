$(document).ready(function() {

    $("input[type=text]").keyup(function () {  
        $(this).val($(this).val().toUpperCase());  
    });
    
    $("textarea[type=text]").keyup(function () {  
        $(this).val($(this).val().toUpperCase());  
    });

    $("#datepicker-joindate").datepicker({
        todayHighlight: true,
        autoclose: true,
    });

    $("#tabledesignation").DataTable({
        responsive: false,
        lengthMenu: [5, 10]
    });

    $(document).on("click", "#addButton", function() {
        $('#addModal').modal('show');

    });

    $(document).on("click", "#editButton", function() {
        var id = $(this).data('id');
        var vehicleData = getDesignation(id);

        vehicleData.done(function(data) {
            console.log(data);
            $('#designationCode').val(data.designationCode);
            $('#designationName').val(data.designationName);
            $('#jobDesc').val(data.jobDesc);
            $('#idD').val(data.id);
        })
        $('#editModal').modal('show');

    });

    $(document).on("click", "#deleteButton", function() {
        id = $(this).data('id');
        requirejs(['sweetAlert2'], function(swal) {
            swal({
                title: "Are you sure to delete Designation?",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then(function() {
                $.ajax({
                    type: "POST",
                    url: "/deleteDesignation/" + id,
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

    function getDesignation(id) {
        return $.ajax({
            url: "/getDesignationById/" + id
        });
    }


    $('#saveButton').click(function(e) {

        $("#addForm").validate({
            // Specify validation rules
            rules: {
                

                designationCode: "required",
                designationName:"required",
                jobDesc: "required",
                
            },

            messages: {
               
                designationCode: "Please Insert Designation Code",
                designationName: "Please Insert Designation Name",
                jobDesc: "Please Insert Job Description"

               
            },
            submitHandler: function(form) {

        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("addForm"));
            // var data = $('#tree').jstree("get_selected");

            $.ajax({
                type: "POST",
                url: "/createDesignation",
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
                

                designationCode: "required",
                designationName:"required",
                jobDesc: "required",
                
            },

            messages: {
               
                designationCode: "Please Insert Designation Code",
                designationName: "Please Insert Designation Name",
                jobDesc: "Please Insert Job Description"

               
            },
            submitHandler: function(form) {

        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("editForm"));
            var id = $('#idD').val();

            $.ajax({
                type: "POST",
                url: "/updateDesignation/" + id,
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