$(document).ready(function() {

    $('#projectReportListing').DataTable({
        "searching": true,
        "lengthChange": true,
        "scrollX": true,
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
    });

    $('#projectMemberTable').DataTable({
        responsive: false,
        lengthMenu: [
            [5,10, 15, 20, -1],
            [5,10, 15, 20, 'All'],
        ],
    });

});