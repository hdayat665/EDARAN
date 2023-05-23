$(document).ready(function () {
    $("#myProjectTable").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
    }); 

    $("#myProjectPendingTable").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
    });

    $("#data-table-default1").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
    });

    $("#myProjectRejectTable").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
    });

    function getLocations(id) {
        return $.ajax({
            url: "/getLocationsProjectMemberById/" + id,
        });
    }

    $(document).on("click", "#getLocation", function () {
        $("#locationTable").find("tr").remove().end();
        var location = $(this).data("id");

        const locations = location.split(",");
        locations.splice(0, 1);
        let a = 1;
        for (let i = 0; i < locations.length; i++) {
            const element = locations[i];
            locationData = getLocations(element);
            locationData.then(function (data) {
                $("#locationTable").append(
                    "<tr><td>" +
                        a++ +
                        "</td><td>" +
                        data["location_name"] +
                        "</td></tr>"
                );
                // console.log(data['location_name']);
            });
        }
        // locationData = getLocations(id);
        // locationData.then(function(data) {
        //     // console.log(data);
        //     for (let i = 0; i < data.length; i++) {
        //         const element = data[i];
        //         console.log(element);

        //     }
        // })
    });

    $(document).on("click", "#cancelProject", function () {
        id = $(this).data("id");
        requirejs(["sweetAlert2"], function (swal) {
            swal({
                title: "Are you sure!",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
            }).then(function () {
                $.ajax({
                    type: "POST",
                    url: "/cancelProjectMember/" + id,
                    dataType: "json",

                    processData: false,
                    contentType: false,
                }).then(function (data) {
                    swal({
                        title: data.title,
                        text: data.msg,
                        type: data.type,
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "OK",
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                    }).then(function () {
                        if (data.type == "error") {
                        } else {
                            location.reload();
                        }
                    });
                });
            });
        });
    });
});
