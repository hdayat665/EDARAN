$('#summarytable').DataTable({
    responsive: true,
    dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
    buttons: [

        { extend: 'excel', className: 'btn-sm' },
        { extend: 'pdf', className: 'btn-sm' },
        { extend: 'print', className: 'btn-sm' }
    ],
});

$('#projecttable').DataTable({
    responsive: true,
    dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
    buttons: [

        { extend: 'excel', className: 'btn-sm' },
        { extend: 'pdf', className: 'btn-sm' },
        { extend: 'print', className: 'btn-sm' }
    ],
});

$('#departmenttable').DataTable({
    responsive: true,
    dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
    buttons: [

        { extend: 'excel', className: 'btn-sm' },
        { extend: 'pdf', className: 'btn-sm' },
        { extend: 'print', className: 'btn-sm' }
    ],
});

var table123 = $('#tablereportemployee').DataTable({
    responsive: true,
    dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
    buttons: [
        { extend: 'excel', className: 'btn-sm' },
        { extend: 'pdf', className: 'btn-sm' },
        { extend: 'print', className: 'btn-sm' }
    ],
    footerCallback: function (row, data, start, end, display) {
        var api = this.api();
        var sum = api.column(5, { page: 'current' }).data().reduce(function (a, b) {
            return parseInt(a.toString().replace(/,/g, '')) + parseInt(b.toString().replace(/,/g, ''));
        }, 0);
        $(api.column(5).footer()).html(sum.toLocaleString());
    }
});

// Calculate the sum of the "amount" column
var sum = table123.column(5).data().reduce(function(a, b) {
    return parseInt(a.toString().replace(/,/g, '')) + parseInt(b.toString().replace(/,/g, ''));
}, 0);

// Add a new row to the DataTable with the total at the bottom
table123.row.add([null, null, null, null, 'total', sum.toLocaleString()]);

// Redraw the table with the new row at the bottom
table123.draw(false);
