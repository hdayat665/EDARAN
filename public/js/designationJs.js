$(document).ready(function() {

    $("#datepicker-joindate").datepicker({
        todayHighlight: true,
        autoclose: true,
    });

    $("#table").DataTable({
        responsive: true,
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
                title: "Are you sure!",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
            }).then(function() {
                $.ajax({
                    type: "DELETE",
                    url: "/deleteDesignation/" + id,
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

    function getDesignation(id) {
        return $.ajax({
            url: "/getDesignationById/" + id
        });
    }


    $('#saveButton').click(function(e) {
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

    $('#updateButton').click(function(e) {
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