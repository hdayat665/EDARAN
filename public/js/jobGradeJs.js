$(document).ready(function() {

    $("#datepicker-joindate").datepicker({
        todayHighlight: true,
        autoclose: true,
    });

    $("#tableRoles").DataTable({
        responsive: true,
    });

    $(document).on("click", "#addButton", function() {
        $('#addModal').modal('show');

    });

    $(document).on("click", "#editButton", function() {
        var id = $(this).data('id');
        var vehicleData = getJobGrade(id);

        vehicleData.done(function(data) {
            console.log(data);
            $('#jobGradeCode').val(data.jobGradeCode);
            $('#jobGradeName').val(data.jobGradeName);
            $('#idJ').val(data.id);
        })
        $('#editModal').modal('show');

    });

    $('#deleteButton').click(function(e) {
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
                    url: "/deleteJobGrade/" + id,
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

    function getJobGrade(id) {
        return $.ajax({
            url: "/getJobGradeById/" + id
        });
    }


    $('#saveButton').click(function(e) {
        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("addForm"));
            // var data = $('#tree').jstree("get_selected");

            $.ajax({
                type: "POST",
                url: "/createJobGrade",
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
            var id = $('#idJ').val();

            $.ajax({
                type: "POST",
                url: "/updateJobGrade/" + id,
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