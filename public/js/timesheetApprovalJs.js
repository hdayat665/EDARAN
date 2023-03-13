$(document).ready(function() {

    //   var x = document.getElementById('awaitingapproval');
    //   var y = document.getElementById('approved');
    //   var z = document.getElementById('rejected');
    //   if (x.style.display == "block") {
    //       $(".canceltimesheet").hide();

    //   } else if (y.style.display == "block") {
    //       $(".approvereject").hide();

    //   } else if (z.style.display == "block") {
    //       $(".approvereject").hide();

    //   }

    $('#timesheetapproval').DataTable({
        "searching": false,
        "lengthChange": true,
        lengthMenu: [ [5, 10, 25, 50, -1], [5, 10, 25,50, "All"] ],
        responsive: false,

        dom: '<"row"<"col-sm-10"B><"col-sm-1"l>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
        buttons: [
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

    $("#filter").click(function() {
        $('#filterform').toggle();
    });

    $(document).on("click", "#statusButton", function() {
        var id = $(this).data('id');
        var status = $(this).data('status');
        requirejs(['sweetAlert2'], function(swal) {
            swal({
                title: "Are you sure!",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
            }).then(function() {
                $.ajax({
                    type: "GET",
                    url: "/updateStatusTimesheet/" + id + '/' + status,
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

    $('#approveAllButton').click(function(e) {
        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("approveAllForm"));

            $.ajax({
                type: "POST",
                url: "/approveAllTimesheet",
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


    $('#addamendreasonb').click(function(e) {
        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("reasonamendform"));

            $.ajax({
                type: "POST",
                url: "/updatereason",
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
    });


    $("#reset").on("click", function () {
      $("#employeesearch").val($("#employeesearch").data("default-value"));
      $("#monthsearch").val($("#monthsearch").data("default-value"));
      $("#designsearch").val($("#designsearch").data("default-value"));
      $("#departmentsearch").val($("#departmentsearch").data("default-value"));
      $("#statussearch").val($("#statussearch").data("default-value"));
  });


$(document).on("click", "#amendreasonmodal", function () {
    var id = $(this).data("id");
    var vehicleData = getRequesttimesheet(id);

    vehicleData.done(function (data) {
        console.log(data.id);
        console.log(data.employee_name);
        // console.log('')
        $("#employeename").val(data.employee_name);
        $("#idtv").val(data.id);
        
    });
    $("#reasonmodal").modal("show");
});

 

function getRequesttimesheet(id) {
    return $.ajax({
        url: "/getTimesheetamendById/" + id,
    });
}


$('[data-toggle="tooltipamend"]').tooltip(); 

});





