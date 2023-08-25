$(document).ready(function () {
    $("#projectLoc").DataTable({
        responsive: false,
        // scrollX: true,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        initComplete: function (settings, json) {
            $("#projectLoc").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });

    $(document).on("click", "#newProjectLocBtn", function () {
        $("#newProjectLocModal").modal("show");
    });

    $(document).on("click", "#updateProjectLocBtn", function () {
        var id = $(this).data("id");
        var locationData = getProjectLocations(id);

        locationData.then(function (data) {
            // console.log(data);
            $("#location_name").val(data.location_name);
            $("#address").val(data.address);
            $("#address1").val(data.address2);
            $("#postcode").val(data.postcode);
            $("#idPL").val(data.id);
            $("#city").val(data.city);
            $("#state").val(data.state);
            $("#location_google_2").val(data.location_google);
            $("#latitude_2").val(data.latitude);
            $("#longitude_2").val(data.longitude);
        });
        $("#updateProjectLocModal").modal("show");
    });
});