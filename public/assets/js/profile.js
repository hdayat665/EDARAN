$(document).ready(function() {
    $('#vec').click(function() {
        alert('ss');
        $("#datatables").DataTable({
            ajax: "api/ajaxGetVehicle",
            columnDefs: [{
                "defaultContent": "-",
                "targets": "_all",
                "targets": 2,
                "className": "text-right",
                render: function(data, type, row, meta) {
                    return '<a href="#" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i></a> <a href="#" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">close</i></a>';
                }

            }],
            "columns": [
                { "data": "id" },
                { "data": "vehicle_type" },
                { "data": "plate_no" },
            ]
        });
    })

    // var table = $('#datatables').DataTable();

    // // Edit record

    // table.on('click', '.edit', function() {
    //     $tr = $(this).closest('tr');

    //     if ($($tr).hasClass('child')) {
    //         $tr = $tr.prev('.parent');
    //     }

    //     var data = table.row($tr).data();
    //     alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
    // });

    // // Delete a record

    // table.on('click', '.remove', function(e) {
    //     $tr = $(this).closest('tr');

    //     if ($($tr).hasClass('child')) {
    //         $tr = $tr.prev('.parent');
    //     }

    //     table.row($tr).remove().draw();
    //     e.preventDefault();
    // });

    // //Like record

    // table.on('click', '.like', function() {
    //     alert('You clicked on Like button');
    // });
});
