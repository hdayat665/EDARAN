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
                    confirmButtonText: 'OK',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
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
        var employeeId = $(this).data('employee');
        $("#userId").val(userId);

        var ParentData = getEmployee(employeeId);

        ParentData.done(function(data) {
            parent = data;
            $('#employeeId').val(parent.employeeId);
            $('#employeeName').val(parent.employeeName);
            $('#employeeEmail').val(parent.employeeEmail);
            supervisor = getEmployee(parent.supervisor);

            supervisor.done(function(superdata) {
                console.log(superdata);
                $("#reportTo").val(superdata.employeeName);

            })
        });

    });

    function getEmployee(id) {
        return $.ajax({
            url: "/getEmployeeById/" + id
        });

    }
});