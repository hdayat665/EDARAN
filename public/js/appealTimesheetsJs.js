$(document).ready(function () {
    $("#appealtable").DataTable({
        "searching": true,
        "lengthChange": true,
        "paging": true,
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        "dom": '<"row"<"col-sm-4"l><"col-sm-4 text-center"B><"col-sm-4"f>>t<"row"<"col-sm-12"ip>>',
        "buttons": [
            { extend: 'excel', className: 'btn-blue', exportOptions: {
                columns: [2,3,4,5,6,7]
            }},
            { extend: 'pdf', className: 'btn-blue',  exportOptions: {
                columns: [2,3,4,5,6,7]
            }},
            { extend: 'print', className: 'btn-blue',  exportOptions: {
                columns: [2,3,4,5,6,7]
            }},
        ],
      
        columnDefs: [
                  { orderable: false, targets: [0] }
               ]
    });

    $("#appealtablehistory").DataTable({
        "searching": true,
        "lengthChange": true,
        "paging": true,     
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        "dom": '<"row"<"col-sm-4"l><"col-sm-4 text-center"B><"col-sm-4"f>>t<"row"<"col-sm-12"ip>>',
        "buttons": [
            { extend: 'excel', className: 'btn-blue', exportOptions: {
                columns: [2,3,4,5,6,7]
            }},
            { extend: 'pdf', className: 'btn-blue',  exportOptions: {
                columns: [2,3,4,5,6,7]
            }},
            { extend: 'print', className: 'btn-blue',  exportOptions: {
                columns: [2,3,4,5,6,7]
            }},
        ],
      
        columnDefs: [
                  { orderable: false, targets: [0] }
               ]
    });

    

    $(document).on("click", "#statusButton", function() {
        var id = $(this).data('id');
        var status = $(this).data('status');

        if (status === 'Approved') {
            status1 = 'approve';
        }
        else {
            status1 = 'reject';
        }
        
        requirejs(['sweetAlert2'], function(swal) {
            swal({
                title: "Are you sure to " + status1 + '?',
                // title: "Are you sure to",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
            }).then(function() {
                $.ajax({
                    type: "GET",
                    url: "/updateStatusappeal/" + id + '/' + status,
                    dataType: "json",
                    
                    processData: false,
                    contentType: false,
                }).then(function(data) {
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


    $(document).on("click", "#viewappealb", function () {

        var id = $(this).data("id");
        var vehicleData = getSOP(id);
        // console.log(vehicleData);
    
        vehicleData.then(function (data) {
            
           
            $("#log_idv").val(data.logid);
            
            if (data.status === "Locked") {
                $("#Statusv").val("Pending");
            } else {
                $("#Statusv").val(data.status);
            }
            $("#yearappealv").val(data.year);
            $("#monthappealv").val(data.month);
            $("#dayappealv").val(data.day);
            $("#reasonappealv").val(data.reason);
           
            if (data.file) {
                var fileName = data.file.split('/').pop(); // Extract the file name from the file path
                $("#filedownloadappeal").html('<a href="/storage/' + data.file + '">Download ' + fileName + '</a>');
              }
        });
        $("#appealmodalview").modal("show");
    });


    $("#approveAllButton").click(function (e) {
        requirejs(["sweetAlert2"], function (swal) {
            var data = new FormData(document.getElementById("approveAllForm"));

            swal({
                title: "Are you sure to approve all?",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
            }).then(function() {
            $.ajax({
                type: "POST",
                url: "/approveAllTimesheetAppeal",
                data: data,
                dataType: "json",

                processData: false,
                contentType: false,
            }).then(function (data) {
                swal({
                    title: data.title,
                    text: data.msg,
                    type: data.type,
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK",
                }).then(function () {
                    if (data.type == "error") {
                    } else {
                        location.reload();
                    }
                });
                });
            });
        });
    });


    function getSOP(id) {
        return $.ajax({
            url: "/getAppealById/" + id,
        });
    }
});