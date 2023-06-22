$(document).ready(function () {
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

    $("#tablelocation").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        initComplete: function (settings, json) {
            $("#tablelocation").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });

    $(document).on("click", "#addCountryState", function () {
        $("#addModalCountryState").modal("show");
    });

    $(document).on("click", "#addLocation", function () {
        $("#addModalLocation").modal("show");
    });

    $(document).on("click", "#deleteStateModal", function () {
        $("#deleteModalState").modal("show");
    });

    $(document).on("click", "#deleteLocation", function () {
        id = $(this).data("id");
        requirejs(["sweetAlert2"], function (swal) {
            swal({
                title: "Are you sure to delete location?",
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
                    url: "/deleteLocation/" + id,
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

    function getLocation(id) {
        return $.ajax({
            url: "/getLocationById/" + id,
        });
    }

    $("#saveButtonState").click(function (e) {
        $("#addFormState").validate({
            // Specify validation rules
            rules: {
                addCountry1: "required",
                addState1: "required",
                addStateCode1: "required",
            },
            messages: {
                addCountry1: "Please Insert Country Name ",
                addState1: "Please Insert State Name",
                addStateCode1: "Please Insert State Code",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(document.getElementById("addFormState"));
                    //   data.append('latitude', latitude);
                    //   data.append('longitude', longitude);

                    $.ajax({
                        type: "POST",
                        url: "/createStateCountry",
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

    $("#saveButtonLocation").click(function (e) {
        $("#addFormLocation").validate({
            rules: {
                countryID: "required",
                stateID: "required",
                postcode: "required",
            },
            messages: {
                countryID: "Please Insert Country Name ",
                stateID: "Please Choose State Name",
                postcode: "Please Insert Postcode",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(document.getElementById("addFormLocation"));

                    $.ajax({
                        type: "POST",
                        url: "/createLocation",
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

    $('select[name="stateID"]').on('change', function() {
        var selectedState = $(this).val();
        $('#deleteState').data('id', selectedState);
    });

    $("#deleteState").click(function (e) {
        id = $(this).data("id");

        $("#deleteForm").validate({
            rules: {
                addCountry3: "required",
                addState3: "required",
            },
            messages: {
                addCountry3: "Please Choose Country Name ",
                addState3: "Please Choose State Name",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(document.getElementById("deleteForm"));

                    swal({
                        title: "Are you sure to delete state?",
                        type: "error",
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Yes!",
                        showCancelButton: true,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                    }).then(function () {
                        $.ajax({
                            type: "POST",
                            url: "/deleteStateCountry/" + id,
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
            },
        });
    });
});
