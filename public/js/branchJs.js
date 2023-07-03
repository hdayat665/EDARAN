$(document).ready(function () {
    $("#address,#address2,#postcode,#city,#state,#country").focus(function () {
        getLatLng();
    });

    $("input[type=text]").keyup(function () {
        $(this).val($(this).val().toUpperCase());
    });
    $("option[type=text]").keyup(function () {
        $(this).val($(this).val().toUpperCase());
    });

    $("#datepicker-joindate").datepicker({
        todayHighlight: true,
        autoclose: true,
    });

    $("#tablebranch").DataTable({
        responsive: false,
        scrollX: true,
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

    $(document).on("click", "#addButton", function () {
        $("#addModal").modal("show");
    });

    $(document).on("click", "#editButton", function () {
        var id = $(this).data("id");
        var vehicleData = getBranch(id);

        vehicleData.then(function (data) {
            console.log(data);

            $("#companyIdE").val(data.companyId);
            $("#branchNameE").val(data.branchName);
            $("#branchCodeE").val(data.branchCode);
            //$('#branchTypeE').val(data.branchType);
            $("#branchTypeE").val(data.branchType);
            $("#postcodeE").val(data.postcode);
            $("#addressE").val(data.address);
            $("#address2E").val(data.address2);
            $("#cityE").val(data.city);
            $("#stateE").val(data.state);
            $("#countryE").val(data.country);
            $("#idB").val(data.id);
        });
        $("#editModal").modal("show");
    });

    $(document).on("click", "#deleteButton", function () {
        id = $(this).data("id");
        requirejs(["sweetAlert2"], function (swal) {
            swal({
                title: "Are you sure to delete Branch?",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowOutsideClick: false,
                allowEscapeKey: false,
            }).then(function () {
                $.ajax({
                    type: "POST",
                    url: "/deleteBranch/" + id,
                    // dataType: "json",
                    data: { _method: "DELETE" },

                    // processData: false,
                    // contentType: false,
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

    function getBranch(id) {
        return $.ajax({
            url: "/getBranchById/" + id,
        });
    }

    function getLatLng() {
        var address1 = $("#address").val();
        var address2 = $("#address2").val();
        var postcode = $("#postcode").val();
        var city = $("#city").val();
        var state = $("#state").val();
        var country = $("#country").val();
        var address =
            address1 +
            ", " +
            address2 +
            " " +
            postcode +
            " " +
            city +
            ", " +
            state +
            ", " +
            country;

        var geocodingAPI =
            "https://maps.googleapis.com/maps/api/geocode/json?address=" +
            encodeURIComponent(address) +
            "&key=AIzaSyDhySfXJwwoMVqbaiioEs38eOi8UkN7_ow";

        $.getJSON(geocodingAPI, function (json) {
            if (json.status === "OK") {
                var latitude = json.results[0].geometry.location.lat;
                var longitude = json.results[0].geometry.location.lng;
                $("#latitude").val(latitude);
                $("#longitude").val(longitude);
                $("#fulladdress").val(address);
            } else {
                // alert(
                //     "Geocode was not successful for the following reason: " +
                //         json.status
                // );
            }
        });
    }

    $("#saveButton").click(function (e) {
        $("#addForm").validate({
            // Specify validation rules
            rules: {
                companyId: "required",
                branchName: "required",
                branchType: "required",
                unitId: "required",
                address: "required",
                postcode: "required",
                city: "required",
                state: "required",
            },
            messages: {
                companyId: "Please Choose Company Name ",
                branchName: "Please Insert Branch Name",
                branchType: "Please Choose Branch Type",
                unitId: "Please Choose Unit Name",
                address: "Please Insert Address 1",
                postcode: "Please Choose Postcode",
                city: "Please Insert City",
                state: "Please Choose State",
            },
            submitHandler: function (form) {
                var latitude = $("#latitude").val();
                var longitude = $("#longitude").val();
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(document.getElementById("addForm"));
                    //   data.append('latitude', latitude);
                    //   data.append('longitude', longitude);

                    $.ajax({
                        type: "POST",
                        url: "/createBranch",
                        data: data,
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
            },
        });
    });

    $("#updateButton").click(function (e) {
        $("#editForm").validate({
            // Specify validation rules
            rules: {
                companyId: "required",
                branchName: "required",
                branchType: "required",
                unitId: "required",
                address: "required",
                postcode: "required",
                city: "required",
                state: "required",
            },

            messages: {
                companyId: "Please Choose Company Name ",
                branchName: "Please Insert Branch Name",
                branchType: "Please Choose Branch Type",
                unitId: "Please Choose Unit Name",
                address: "Please Insert Address 1",
                postcode: "Please Choose Postcode",
                city: "Please Insert City",
                state: "Please Choose State",

            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("editForm")
                    );
                    var id = $("#idB").val();
                    $.ajax({
                        type: "POST",
                        url: "/updateBranch/" + id,
                        data: data,
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
            },
        });
    });

    console.log($('#editForm').val())
});













// $(document).on("change", "#state", function () {
//     state = $(this).val();
//     $("#postcode")
//         .find("option")
//         .remove()
//         .end()
//         .append(
//             '<option label="PLEASE CHOOSE" value="" selected="selected"> </option>'
//         )
//         .val("");

    // console.log(state)
    // function locationByStateID(state) {
    //     return $.ajax({
    //         type: 'GET',
    //         url: "/locationByStateID/" + state,
    //     });
    // }




//     var branch = locationByStateID(state);




//     branch.then(function (dataBranch) {
//         for (let i = 0; i < dataBranch.length; i++) {
//             const branch = dataBranch[i];
//             var opt = document.createElement("option");
//             document.getElementById("postcode").innerHTML +=
//                 '<option value="' +
//                 branch["id"] +
//                 '">' +
//                 branch["postcode"] +
//                 "</option>";
//         }
//     });
// });
