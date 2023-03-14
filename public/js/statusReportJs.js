  $('#timesheetapproval').DataTable({
      "searching": false,
      "lengthChange": true,
      lengthMenu: [5, 10],
      responsive: false,

      dom: '<"row"<"col-sm-11"B><"col-sm-1"l>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
      buttons: [
          { extend: 'excel', className: 'btn-blue' },
          { extend: 'pdf', className: 'btn-blue' },
          { extend: 'print', className: 'btn-blue' }
      ],
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


  $("#reset").on("click", function () {
    $("#employeesearch").val($("#employeesearch").data("default-value"));
    $("#yearsearch").val($("#yearsearch").data("default-value"));
    $("#monthsearch").val($("#monthsearch").data("default-value"));
    $("#designationsearch").val($("#designationsearch").data("default-value"));
    $("#departmentsearch").val($("#departmentsearch").data("default-value"));
    $("#statussearch").val($("#statussearch").data("default-value"));
    
});

$('#employeesearch').picker({ search: true });
$('#designationsearch').picker({ search: true });
$('#departmentsearch').picker({ search: true });



