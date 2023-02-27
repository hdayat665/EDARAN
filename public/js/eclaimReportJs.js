
$(document).ready(function() {
    $("#hideProject").hide();
    $("#hideDepart").hide();
    $("#hideEmpName").hide();
    $("#hideRefNum").hide();

    $("#datepicker-autoClose").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: 'yyyy-mm-dd'
    });
    

    //   $("#default-daterange").daterangepicker({
    //     opens: "right",
    //     format: "MM/DD/YYYY",
    //     separator: " to ",
    //     startDate: moment().subtract("days", 29),
    //     endDate: moment(),
    //     minDate: "01/01/2021",
    //     maxDate: "12/31/2021",
    //   }, function (start, end) {
    //     $("#default-daterange input").val(start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY"));
    //   });

      

      $('#ex-search').picker({ search: true });

      $('#tableproject').DataTable({
            scrollX:true,
            
            
        });
      

        $('#data-table-default').DataTable({
            responsive: true,
            dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
            buttons: [
              { extend: 'copy', className: 'btn-sm' },
              { extend: 'csv', className: 'btn-sm' },
              { extend: 'excel', className: 'btn-sm' },
              { extend: 'pdf', className: 'btn-sm' },
              { extend: 'print', className: 'btn-sm' }
            ],
          });



  });
  $("#selectby").change(function () {
    if ($(this).val() == "1") {
        $("#hideProject").show();
    } else {
        $("#hideProject").hide();
    }
});


$("#selectby").change(function () {
    if ($(this).val() == "2") {
        $("#hideDepart").show();
    } else {
        $("#hideDepart").hide();
    }
});

$("#selectby").change(function () {
    if ($(this).val() == "3") {
        $("#hideEmpName").show();
        $("#hideDepart").show();
    } else {
        $("#hideEmpName").hide();
        
    }
});

$("#selectby").change(function () {
    if ($(this).val() == "4") {
        $("#hideRefNum").show();
    } else {
        $("#hideRefNum").hide();
    }
});