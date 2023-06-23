$(document).ready(function() {
    $('#summarytable').DataTable({
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        responsive: true,
        dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
        buttons: [
    
            { extend: 'excel', className: 'btn-sm' },
            { extend: 'pdf', className: 'btn-sm' },
            { extend: 'print', className: 'btn-sm' }
        ],
        initComplete: function (settings, json) {
            $("#summarytable").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });
    
    $('#projecttable').DataTable({
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        responsive: true,
        dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
        buttons: [
            { extend: 'excel', className: 'btn-sm' },
            { extend: 'pdf', className: 'btn-sm' },
            { extend: 'print', className: 'btn-sm' }
        ],
        initComplete: function (settings, json) {
            $("#projecttable").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });
    
 $('#departmenttable').DataTable({
    lengthMenu: [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"],
    ],
    responsive: true,
    dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
    buttons: [
        { extend: 'excel', className: 'btn-sm' },
        { extend: 'pdf', className: 'btn-sm' },
        { extend: 'print', className: 'btn-sm' }
    ],
    initComplete: function (settings, json) {
        $("#departmenttable").wrap(
            "<div style='overflow:auto; width:100%;position:relative;'></div>"
        );
    },
});

    
    
$('#tablereportemployee').DataTable({
    lengthMenu: [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"],
    ],
    responsive: false,
    searching: true,
    dom: "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>tp",
    buttons: [
        { extend: 'excel', className: 'btn-sm' },
        { extend: 'pdf', className: 'btn-sm' },
        { extend: 'print', className: 'btn-sm' }
    ],
    initComplete: function (settings, json) {
        $("#tablereportemployee").wrap(
            "<div style='overflow:auto; width:100%;position:relative;'></div>"
        );
    },
});



$('#tablebydepartment').DataTable({
    lengthMenu: [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"],
    ],
    responsive: false,
    searching: true,
    dom: "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>tp",
    buttons: [
        { extend: 'excel', className: 'btn-sm' },
        { extend: 'pdf', className: 'btn-sm' },
        { extend: 'print', className: 'btn-sm' }
    ],
    initComplete: function (settings, json) {
        $("#tablebydepartment").wrap(
            "<div style='overflow:auto; width:100%;position:relative;'></div>"
        );
    },
});

$('#projectid').picker({ search: true });


});
