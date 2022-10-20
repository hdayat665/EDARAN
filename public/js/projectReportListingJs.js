$(document).ready(function() {

    $('#projectReportListing').DataTable({
        responsive: true,
        lengthMenu: [5, 10, 15],
        dom: '<"dataTables_wrapper dt-bootstrap"<"row"<"col-xl-7 d-block d-sm-flex d-xl-block justify-content-center"<"d-block d-lg-inline-flex me-0 me-md-3"l><"d-block d-lg-inline-flex"B>><"col-xl-5 d-flex d-xl-block justify-content-center"fr>>t<"row"<"col-md-5"i><"col-md-7"p>>>',
        buttons: [
            { extend: 'excel', className: 'btn-sm' },
            { extend: 'pdf', className: 'btn-sm', orientation: 'landscape' },
            { extend: 'print', className: 'btn-sm' }
        ],

    });

    $('#projectMemberTable').DataTable({
        responsive: true,
        lengthMenu: [5, 10, 15],
    });

});