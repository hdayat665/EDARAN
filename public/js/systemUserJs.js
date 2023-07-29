$(document).ready(function () {
    // Check all checkboxes when "ALL ACCESS" is checked
    $("#allAccessCheckbox").on("change", function () {
        if ($(this).prop("checked")) {
            // Find all checkboxes inside the "panel-body" and check them, excluding the ones with class "excludeFromAllAccess"
            $(".panel-body input[type='checkbox']:not(.excludeFromAllAccess)").prop("checked", true);
        } else {
            // Uncheck all checkboxes inside the "panel-body"
            $(".panel-body input[type='checkbox']").prop("checked", false);
        }
    });
    
    $("#systemUserTable").DataTable({
        responsive: true,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        dom: "<'row'<'col-sm-4'l><'col-sm-3 text-center'<'status-filter'>><'col-sm-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-6'i><'col-sm-6'p>>",
        initComplete: function (settings, json) {
            $("#systemUserTable").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );

            // Add the dropdown filter
            var select = $('<div class="form-group row"><label for="status-filter" class="col-form-label col-sm-3">Status:</label><div class="col-sm-9"><select class="form-control"><option value="">All</option><option value="Active">Active</option><option value="Inactive">Inactive</option></select></div></div>')
                .appendTo($('.status-filter'))
                .on('change', function () {
                    table.column(2).search($(this).val()).draw();
                });

            // Apply DataTables search on dropdown change
            var table = $('#systemUserTable').DataTable();
            select.on('change', function () {
                table.column(2).search($(this).val()).draw();
            });
        },
    });
});

// $(document).ready(function () {
//     $("#systemUserTable").DataTable({
//         responsive: true,
//         lengthMenu: [
//             [5, 10, 25, 50, -1],
//             [5, 10, 25, 50, "All"],
//         ],
//         dom: "<'row'<'col-sm-4'l><'col-sm-3 text-center'<'status-filter-label'>><'col-sm-5'f>>" +
//             "<'row'<'col-sm-12'tr>>" +
//             "<'row'<'col-sm-6'i><'col-sm-6'p>>",
//         initComplete: function (settings, json) {
//             $("#systemUserTable").wrap(
//                 "<div style='overflow:auto; width:100%;position:relative;'></div>"
//             );

//             // Add the label and dropdown filter
//             $('<label for="status-filter" class="col-form-label">Status:</label>')
//                 .appendTo($('.status-filter-label'));

//             var select = $('<select id="status-filter" class="form-control"><option value="">All</option><option value="Active">Active</option><option value="Inactive">Inactive</option></select>')
//                 .appendTo($('.status-filter'))
//                 .on('change', function () {
//                     table.column(2).search($(this).val()).draw();
//                 });

//             // Apply DataTables search on dropdown change
//             var table = $('#systemUserTable').DataTable();
//             select.on('change', function () {
//                 table.column(2).search($(this).val()).draw();
//             });
//         },
//     });
// });
