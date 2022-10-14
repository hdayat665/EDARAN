$(document).ready(function() {

    $("#datepicker-joindate").datepicker({
        todayHighlight: true,
        autoclose: true,
    });

    $("#tablenews").DataTable({
        responsive: false,
        lengthMenu: [5, 10],
    });

    $(document).on("click", "#addButton", function() {
        $('#addModal').modal('show');

    });

    $("input[type=text]").keyup(function () {  
        $(this).val($(this).val().toUpperCase());  
    });

    $("textarea[type=text]").keyup(function () {  
        $(this).val($(this).val().toUpperCase());  
    });

    $(document).on("click", "#editButton", function() {
        var id = $(this).data('id');
        var vehicleData = getNews(id);

        vehicleData.done(function(data) {
            console.log(data);
            $('#title').val(data.title);
            $('#sourceURL').val(data.sourceURL);
            $('#contents').val(data.content);
            $('#idN').val(data.id);
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
                    url: "/deleteNews/" + id,
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

    function getNews(id) {
        return $.ajax({
            url: "/getNewsById/" + id
        });
    }

    $('#saveButton').click(function(e) {

        $("#addForm").validate({
            // Specify validation rules
            rules: {
                
                title: "required",
                sourceURL:"required",
                content: "required",
                file: "required",
                
            },

            messages: {
               
                title: "Please Insert Title",
                sourceURL: "Please Insert URL",
                content: "Please Insert Content",
                file: "Upload Supporting Document",
               
            },
            submitHandler: function(form) {

        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("addForm"));
            // var data = $('#tree').jstree("get_selected");

            $.ajax({
                type: "POST",
                url: "/createNews",
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

    $('#updateButton').click(function(e) {

        $("#editForm").validate({
            // Specify validation rules
            rules: {
                

                title: "required",
                sourceURL:"required",
                content: "required",
                file: "required",
                
            },

            messages: {
               
                title: "Please Insert Title",
                sourceURL: "Please Insert URL",
                content: "Please Insert Content",
                file: "Upload Supporting Document",
               
            },
            submitHandler: function(form) {

        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("editForm"));
            var id = $('#idN').val();

            $.ajax({
                type: "POST",
                url: "/updateNews/" + id,
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