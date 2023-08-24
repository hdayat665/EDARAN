$(document).ready(function () {
    $("#projectLoc").DataTable({
        responsive: false,
        // scrollX: true,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        initComplete: function (settings, json) {
            $("#tablebranch").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });
});