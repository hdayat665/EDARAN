$(document).ready(function() {
    $("#data-table-default").DataTable({
        responsive: true,
    });

    $("#datepicker-terminatedate").datepicker({
        todayHighlight: true,
        autoclose: true,
    });


    $('#submit').click(function(e) {

        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("submitForm"));

            $.ajax({
                type: "POST",
                url: "/terminateEmployment",
                data: data,
                dataType: "json",
                async: false,
                processData: false,
                contentType: false,
            }).done(function(data) {
                // console.log(data);
                swal({
                    title: data.title,
                    text: data.msg,
                    type: data.type,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then(function() {
                    if (data.type == 'error') {

                    } else {
                        window.location.href = "/employeeInfoView";

                    }


                });
            });

        });
    });

    $(document).on("click", "#terminate", function() {
        $('#exampleModal').modal('show');
        var userId = $(this).data('id');
        $("#userId").val(userId);

    });
});