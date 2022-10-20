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
