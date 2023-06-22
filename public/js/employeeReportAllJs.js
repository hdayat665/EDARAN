
$("#summarytable").DataTable({
    searching: false,
    lengthChange: true,
    responsive: false,
    lengthMenu: [
        [5,10, 15, 20, -1],
        [5,10, 15, 20, 'All'],
    ],

    dom: '<"row"<"col-sm-2"l><"col-sm-6 text-right"B>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
    buttons: [
        { extend: "excel", className: "btn-blue" },
        { extend: "pdf", className: "btn-blue" },
        { extend: "print", className: "btn-blue" },
    ],
    initComplete: function (settings, json) {
        $("#summarytable").wrap(
            "<div style='overflow:auto; width:100%;position:relative;'></div>"
        );
    },
});