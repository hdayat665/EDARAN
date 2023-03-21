$(document).ready(function() {

    $('#projectReportListing').DataTable({
        responsive: false,
        // scrollX: true,
        lengthMenu: [
            [5,10, 15, 20, -1],
            [5,10, 15, 20, 'All'],
        ],
        dom: '<"dataTables_wrapper dt-bootstrap"<"row"<"col-xl-7 d-block d-sm-flex d-xl-block justify-content-center"<"d-block d-lg-inline-flex me-0 me-md-3"l><"d-block d-lg-inline-flex"B>><"col-xl-5 d-flex d-xl-block justify-content-center"fr>>t<"row"<"col-md-5"i><"col-md-7"p>>>',
        buttons: [
            { extend: 'excel', className: 'btn-sm' ,exportOptions: {columns:[1,2,3,4,5,6,7,8,9,10]}},
            { extend: 'pdf', className: 'btn-sm', orientation: 'landscape' ,exportOptions: {columns:[1,2,3,4,5,6,7,8,9,10]}},
            { extend: 'print', className: 'btn-sm' ,exportOptions: {columns:[1,2,3,4,5,6,7,8,9,10]}}
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