
$(document).on("click", "#mcvTravelling", function () {

    $("#travelModal").modal("show");
});

$(document).on("click", "#mcvSubsistence", function () {

    $("#subsModal").modal("show");
});

$(document).on("click", "#mcvOthers", function () {

    $("#othersModal").modal("show");
});

$(document).on("click", "#btnTAttachment", function () {

    $("#travellingAttachment").modal("show");
});

$(document).on("click", "#btnSAttachment", function () {

    $("#subsistenceAttachment").modal("show");
});

$("#travelling").DataTable({
    paging: true,
    filter: false,
    scrollX: false,
    lengthMenu: [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"],
    ],
});

$("#subsistence").DataTable({
    paging: true,
    filter: false,
    scrollX: false,
    lengthMenu: [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"],
    ],
});

// $("#testtable").DataTable({
//     responsive: true,
//     lengthMenu: [
//         [5, 10, 25, 50, -1],
//         [5, 10, 25, 50, "All"],
//     ],
//     initComplete: function (settings, json) {
//         $("#projectTable").wrap(
//             "<div style='overflow:auto; width:100%;position:relative;'></div>"
//         );
//     },
// });
