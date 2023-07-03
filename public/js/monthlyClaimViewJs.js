$(document).on("click", "#travelBtnView", function () {

    $("#travelModal").modal("show");
});

$("#testtable").DataTable({
    responsive: false,
    lengthMenu: [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"],
    ],
    initComplete: function (settings, json) {
        $("#projectTable").wrap(
            "<div style='overflow:auto; width:100%;position:relative;'></div>"
        );
    },
});
