$(document).ready(function() {

    $("#datepicker-joineddate").datepicker({
        todayHighlight: true,
        autoclose: true,
    });

    $("textarea[type=text]").keyup(function() {
        $(this).val($(this).val().toUpperCase());
    });

    $("#datepicker-exitdate").datepicker({
        todayHighlight: true,
        autoclose: true,
    });  

    $("#data-table-projectrequest").DataTable({
        responsive: false,
        lengthMenu: [
            [5,10, 15, 20, -1],
            [5,10, 15, 20, 'All'],
        ],
    });

    $("#data-table-default2").DataTable({
        responsive: false,
        lengthMenu: [
            [5,10, 15, 20, -1],
            [5,10, 15, 20, 'All'],
        ],
    });

    $('#updateRequestProject').click(function(e) {
        $("#requestProjectForm").validate({
            rules: {
                reason: "required",
            },

            messages: {
                reason: "",
            },
            submitHandler: function(form) {
                requirejs(['sweetAlert2'], function(swal) {

                    var data = new FormData(document.getElementById("requestProjectForm"));
                    var id = $('#idRP').val()
                    $.ajax({
                        type: "POST",
                        url: "/addRequestProject/" + id,
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

    $(document).on("click", "#requestProjectButton", function() {
        var id = $(this).data('id');
        var vehicleData = getRequestProject(id);

        vehicleData.done(function(data) {
            console.log(data);
            $('#customer_name').val(data.customer_name);
            $('#project_code').val(data.project_code);
            $('#project_name').val(data.project_name);
            $('#project_manager').val(data.employeeName);
            $('#idRP').val(data.id);
        })
        $('#requestProjectModal').modal('show');

    });

    $(document).on("click", "#editRequestProjectButton", function() {
        var id = $(this).data('id');
        var vehicleData = getRequestProject(id);

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
        $('#editRequestProjectModal').modal('show');

    });

    $(document).on("click", "#deleteRequestProjectButton", function() {
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
                    url: "/deleteRequestProject/" + id,
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

    function getRequestProject(id) {
        return $.ajax({
            url: "/getRequestProjectById/" + id
        });
    }


});