$(document).ready(function() {
    





    $("#tableemployeeinfo").DataTable({
        responsive: false,
        dom:
            "<'row'<'col-sm-4'B><'col-sm-4 text-center'l><'col-sm-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-4 col-auto'i><'col-sm-4 text-center'><'col-sm-4'p>>", // add col-auto class to the search column
        buttons: [
            { 
                extend: 'pdf', 
                className: 'btn-sm', 
                orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {columns:[2,3,4,5,6,7,8,9]}
            },
            { 
                extend: 'csv', 
                className: 'btn-sm' ,
                exportOptions: {columns:[2,3,4,5,6,7,8,9]}
            },
        ],
        autoWidth: true,
        lengthMenu: [ [5, 10, 25, -1], [5, 10, 25, "All"] ],
        scrollX: true // enable horizontal scrolling if necessary
    });
    
    

    $("#datepicker-terminatedate").datepicker({
        todayHighlight: true,
        autoclose: true,
    });
     
    $(document).on("click", "#cancelButton", function() {
        id = $(this).data('id');
        requirejs(['sweetAlert2'], function(swal) {
            swal({
                title: "Are you sure to Cancel Termination ?",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then(function() {
                $.ajax({
                    type: "POST",
                    url: "/cancelTerminateEmployment/" + id,
                    dataType: "json",
                    data: { _method: "POST" },
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