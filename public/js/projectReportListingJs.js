$(document).ready(function() {

    $('#projectReportListing').DataTable({
        "searching": true,
        "lengthChange": true,
        // "scrollX": true,
        "paging": true,
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        "dom": '<"row"<"col-sm-4"l><"col-sm-4 text-center"B><"col-sm-4"f>>t<"row"<"col-sm-12"ip>>',
        "buttons": [
            {
                extend: 'excel',
                className: 'btn-blue',
                exportOptions: {
                    rows: function (idx, data, node) {
                        var length = $('#projectReportListing').DataTable().page.len();
                        if (length === -1 || idx < length) {
                            return true;
                        }
                        return false;
                    },
                    columns: [0, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                }
            },
            {
                extend: 'pdf',
                className: 'btn-blue',
                exportOptions: {
                    rows: function (idx, data, node) {
                        var length = $('#projectReportListing').DataTable().page.len();
                        if (length === -1 || idx < length) {
                            return true;
                        }
                        return false;
                    },
                    columns: [0, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                },
                customize: function (doc) {
                    // Change the page orientation to landscape
                    doc.pageOrientation = 'landscape';

                    // You can further customize the PDF here if needed
                }
            },
            {
                extend: 'print',
                className: 'btn-blue',
                exportOptions: {
                    rows: function (idx, data, node) {
                        var length = $('#projectReportListing').DataTable().page.len();
                        if (length === -1 || idx < length) {
                            return true;
                        }
                        return false;
                    },
                    columns: [0, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                }
            },
        ],
        initComplete: function (settings, json) {
            $("#projectReportListing").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });
    

    $("#printButton").click(function () {
        var selectedLength = $('#projectMemberTable_length select').val();
        var table = $('#projectMemberTable').DataTable();
    
        // Set the table to show all rows if "All" is selected in the lengthMenu
        if (selectedLength === '-1') {
            table.page.len(-1).draw();
        }
    
        window.print();
    
        // Restore the original page length after printing
        if (selectedLength !== '-1') {
            table.page.len(selectedLength).draw();
        }
    });

    $('#projectMemberTable').DataTable({
        // responsive: false,
        lengthMenu: [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, 'All'],
        ],
        initComplete: function (settings, json) {
            $("#projectMemberTable").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });

    // function printAndShowAllRows() {
    //     // Show all rows in the table
    //     $('#projectMemberTable').DataTable().page.len(-1).draw();
    
    //     // Print the page
    //     window.print();
    // }
    
});