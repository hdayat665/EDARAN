$(document).ready(function () {
    var addbranch = "#country_id, #postcode_id";

    $(addbranch).select2({
        placeholder: "PLEASE CHOOSE",
        dropdownParent: $('#addModal'),
    });

    $("#state_id, #city_id").css({
        "pointer-events": "none",
        "touch-action": "none",
        background: "#e9ecef",
    });

    $("#stateE, #cityE").css({
        "pointer-events": "none",
        "touch-action": "none",
        background: "#e9ecef",
    });

    $(document).on("change", "#country_id", function () {
        var getCountry = $("#country_id").val();
        var getPostcode = getPostcodeByCountry(getCountry);
        getPostcode.then(function (data) {
            data.sort(function (a, b) {
                return a.postcode.localeCompare(b.postcode);
            });

            $("#state_id").empty();
            $("#state_id").append('<option value="">PLEASE CHOOSE</option>');
            $("#city_id").empty();
            $("#city_id").append('<option value="">PLEASE CHOOSE</option>');
            $("#postcode_id").empty();
            $("#postcode_id").append('<option value="">PLEASE CHOOSE</option>');
            $.each(data, function (index, postcode) {
                $("#postcode_id").append('<option value="' + postcode.postcode + '">' + postcode.postcode + '</option>');
            });
        });
    });


    function getPostcodeByCountry(id) {
        return $.ajax({
            url: "/getPostcodeByCountryBranch/" + id,
        });
    }


    $(document).on("change", "#postcode_id", function () {
        var getPostcode = $("#postcode_id").val();
        var getStateAndCity = getStateAndCityByCountry(getPostcode);
        getStateAndCity.then(function (data) {
            $("#state_id").empty();
            $("#city_id").empty();
            $.each(data, function (index, state) {
                $("#state_id").append('<option value="' + state.id + '">' + state.state_name + '</option>');
            });
            $.each(data, function (index, city) {
                $("#city_id").append('<option value="' + city.name + '">' + city.name + '</option>');
            });
        });
    });
    function getStateAndCityByCountry(id) {
        return $.ajax({
            url: "/getStateAndCityByCountryBranch/" + id,
        });
    }

    $(document).on("change", "#countryE", function () {
        var getCountry = $("#countryE").val();
        var getPostcode = getPostcodeByCountry(getCountry);
        getPostcode.then(function (data) {
            data.sort(function (a, b) {
                return a.postcode.localeCompare(b.postcode);
            });

            $("#stateE").empty();
            $("#stateE").append('<option value="">PLEASE CHOOSE</option>');
            $("#cityE").empty();
            $("#cityE").append('<option value="">PLEASE CHOOSE</option>');
            $("#postcodeE").empty();
            $("#postcodeE").append('<option value="">PLEASE CHOOSE</option>');
            $.each(data, function (index, postcode) {
                $("#postcodeE").append('<option value="' + postcode.postcode + '">' + postcode.postcode + '</option>');
            });
        });
    });

    function getPostcodeByCountry(id) {
        return $.ajax({
            url: "/getPostcodeByCountryBranch/" + id,
        });
    }

    $(document).on("change", "#postcodeE", function () {
        var getPostcode = $("#postcodeE").val();
        var getStateAndCity = getStateAndCityByCountry(getPostcode);
        getStateAndCity.then(function (data) {
            $("#stateE").empty();
            $("#cityE").empty();
            $.each(data, function (index, state) {
                $("#stateE").append('<option value="' + state.id + '">' + state.state_name + '</option>');
            });
            $.each(data, function (index, city) {
                $("#cityE").append('<option value="' + city.name + '">' + city.name + '</option>');
            });
        });
    });

    function getStateAndCityByCountry(id) {
        return $.ajax({
            url: "/getStateAndCityByCountryBranch/" + id,
        });
    }

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
        var edit_id = $(this).data("id");
        var vehicleData = getBranch(edit_id);
        vehicleData.then(function (data) {

            $("#companyIdE").val(data.companyId);
            $("#branchNameE").val(data.branchName);
            $("#branchCodeE").val(data.branchCode);
            $("#branchTypeE").val(data.branchType);
            $("#addressE").val(data.address);
            $("#address2E").val(data.address2);
            $("#cityE").val(data.name);
            $("#stateE").val(data.state_id);
            $("#idB").val(edit_id);
            $("#countryE").val(data.country_id).select2({
                placeholder: "<span style='color: black;'>PLEASE CHOOSE</span>",
                escapeMarkup: function(markup) {
                return markup
                },
                allowClear: true,
                dropdownParent: $('#editModal'),
            });
            $("#postcodeE").val(data.postcode).select2({
                placeholder: "<span style='color: black;'>PLEASE CHOOSE</span>",
                escapeMarkup: function(markup) {
                return markup
                },
                allowClear: true,
                dropdownParent: $('#editModal'),
            });
        });
        $("#editModal").modal("show");
    });

    function getBranch(id) {
            return $.ajax({
                url: "/getBranchById/" + id,
            });
        }

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
                    data: { _method: "DELETE" },
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
            rules: {
                companyId: "required",
                branchName: "required",
                branchType: "required",
                address: "required",
                ref_country: "required",
                ref_state: "required",
                location_cityid: "required",
                ref_postcode: "required",
            },
            messages: {
                companyId: "Please Choose Company Name ",
                branchName: "Please Insert Branch Name",
                branchType: "Please Choose Branch Type",
                address: "Please Insert Address 1",
                ref_country: "Please Choose Country",
                ref_state: "Please Choose State",
                location_cityid: "Please Choose City",
                ref_postcode: "Please Choose Postcode",
            },

            errorPlacement: function(error, element) {
                if (element.attr("name") === "ref_country") {
                    error.insertAfter("#country-err");
                } else if (element.attr("name") === "ref_postcode") {
                    error.insertAfter("#postcode-err");
                } else {
                    error.insertAfter(element);
                }
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
            rules: {
                companyId: "required",
                branchName: "required",
                branchType: "required",
                address: "required",
                ref_postcode: "required",
                location_cityid: "required",
                ref_state: "required",
                ref_country: "required",
            },

            messages: {
                companyId: "Please Choose Company Name ",
                branchName: "Please Insert Branch Name",
                branchType: "Please Choose Branch Type",
                address: "Please Insert Address 1",
                ref_postcode: "Please Choose Postcode",
                location_cityid: "Please Choose City",
                ref_state: "Please Choose State",
                ref_country: "Please Choose Country",
            },

            errorPlacement: function(error, element) {
                if (element.attr("name") === "ref_country") {
                    error.insertAfter("#countryE-err");
                } else if (element.attr("name") === "ref_postcode") {
                    error.insertAfter("#postcodeE-err");
                } else {
                    error.insertAfter(element);
                }
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
});













