$("document").ready(function () {

    $(document).ready(function () {
        $("#datepickercor").daterangepicker({
          opens: "right",
          format: "YYYY/MM/DD",
          separator: " to ",
          startDate: moment().subtract(29, "days"),
          endDate: moment(),
          locale: {
            format: "YYYY/MM/DD",
          },
        });
      });
    // , function(start, end) {
    //     $("#default-daterange input").val(start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY"));
    // });

      $(document).on('change', "#staffn", function() {
        if ($(this).val() == "2")  {
            $("#staffname").show();
        }
		else {
            $("#staffname").hide();

        }
    });


    $('#tableviewcor').DataTable({
        "searching": true,
        "lengthChange": true,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        responsive: false,
        // scrollX: true,

        dom: "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>tp",
        buttons: [
            { extend: 'excel', className: 'btn-blue',},
            { extend: 'pdf', className: 'btn-blue',},
            { extend: 'print', className: 'btn-blue', },
        ],
        initComplete: function (settings, json) {
            $("#tableviewcor").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });

});
