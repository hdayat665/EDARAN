$('#timesheetapproval').DataTable({
    "searching": true,
    "lengthChange": true,
    "paging": true,
    "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
    "dom": '<"row"<"col-sm-4"l><"col-sm-4 text-center"B><"col-sm-4"f>>t<"row"<"col-sm-12"ip>>',
    "buttons": [
        { extend: 'excel', className: 'btn-blue', exportOptions: {
            columns: [2,3,4,5,6,7,8]
        }},
        { extend: 'pdf', className: 'btn-blue',  exportOptions: {
            columns: [2,3,4,5,6,7,8]
        }},
        { extend: 'print', className: 'btn-blue',  exportOptions: {
            columns: [2,3,4,5,6,7,8]
        }},
    ],
    initComplete: function (settings, json) {
        $("#timesheetapproval").wrap(
            "<div style='overflow:auto; width:100%;position:relative;'></div>"
        );
    },
});
  $(document).ready(function() {
      var x = document.getElementById('awaitingapproval');
      var y = document.getElementById('approved');
      var z = document.getElementById('rejected');
      if (x.style.display == "block") {
          $(".canceltimesheet").hide();

      } else if (y.style.display == "block") {
          $(".approvereject").hide();

      } else if (z.style.display == "block") {
          $(".approvereject").hide();

      }


  });
  $().ready = function() {


      $("#filter").click(function() {
          $('#filterform').toggle();
      });

  }();

  if ($('#employeesearch').val() || $('#yearsearch').val() || $('#monthsearch').val() || $('#designationsearch').val() || $('#departmentsearch').val() || $('#statussearch').val()) {
    $('#filterform').show();
}
$("#reset").on("click", function () {
    $("#employeesearch").val("").trigger("change");
    $("#yearsearch").val("").trigger("change");
    $("#monthsearch").val("").trigger("change");
    $("#designationsearch").val("").trigger("change");
    $("#departmentsearch").val("").trigger("change");
    $("#statussearch").val("").trigger("change");
});





$('#designationsearch').select2({ placeholder:"Please Choose" });
$('#departmentsearch').select2({ placeholder:"Please Choose" });
$("#employeesearch").select2({ placeholder:"Please Choose" });
$("#yearsearch").select2({ placeholder:"Please Choose" });
$("#monthsearch").select2({ placeholder:"Please Choose" });
$("#statussearch").select2({ placeholder:"Please Choose" });




