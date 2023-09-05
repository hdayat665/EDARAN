$(document).ready(function () {
    $(document).on("change", "#CountryId", function () {
        var getCountry = $("#CountryId").val();
        var getState = getStatebyCountry(getCountry);
        getState.then(function (data) {
            $("#StateId").empty();
            $("#StateId").append('<option value="">PLEASE CHOOSE</option>');
            $("#CityId").empty();
            $("#CityId").append('<option value="">PLEASE CHOOSE</option>');
            $("#PostcodeId").empty();
            $("#PostcodeId").append('<option value="">PLEASE CHOOSE</option>');
            $.each(data, function (index, state) {
                $("#StateId").append('<option value="' + state.id + '">' + state.state_name + '</option>');
            });
        });
            $("#StateId").empty();
            $("#StateId").append('<option value="">PLEASE CHOOSE</option>');
            $("#CityId").empty();
            $("#CityId").append('<option value="">PLEASE CHOOSE</option>');
            $("#PostcodeId").empty();
            $("#PostcodeId").append('<option value="">PLEASE CHOOSE</option>');
    });
    function getStatebyCountry(id) {
        return $.ajax({
            url: "/getStatebyCountry/" + id,
        });
    }

    $(document).on("change", "#StateId", function () {
        var getCity = $("#StateId").val();
        var getCity = getCitybyState(getCity);
        getCity.then(function (data) {
            $("#CityId").empty();
            $("#CityId").append('<option value="">PLEASE CHOOSE</option>');
            $("#PostcodeId").empty();
            $("#PostcodeId").append('<option value="">PLEASE CHOOSE</option>');
            $.each(data, function (index, city) {
                $("#CityId").append('<option value="' + city.name + '">' + city.name + '</option>');
            });
        });
            $("#CityId").empty();
            $("#CityId").append('<option value="">PLEASE CHOOSE</option>');
            $("#PostcodeId").empty();
            $("#PostcodeId").append('<option value="">PLEASE CHOOSE</option>');
    });
    function getCitybyState(id) {
        return $.ajax({
            url: "/getCitybyState/" + id,
        });
    }
    
    $(document).on("change", "#CityId", function () {
        var getPostcode = $("#CityId").val();
        var getPostcode = getPostcodeByCity(getPostcode);
        getPostcode.then(function (data) {
            $("#PostcodeId").empty();
            $("#PostcodeId").append('<option value="">PLEASE CHOOSE</option>');
            $.each(data, function (index, postcode) {
                $("#PostcodeId").append('<option value="' + postcode.postcode + '">' + postcode.postcode + '</option>');
            });
        });
            $("#PostcodeId").empty();
            $("#PostcodeId").append('<option value="">PLEASE CHOOSE</option>');
    });
    function getPostcodeByCity(id) {
        return $.ajax({
            url: "/getPostcodeByCity/" + id,
        });
    }

    $(document).on("change", "#CountryEd", function () {
        var getCountry = $("#CountryEd").val();
        var getState = getStatebyCountry(getCountry);
        getState.then(function (data) {
            $("#StateEd").empty();
            $("#StateEd").append('<option value="">PLEASE CHOOSE</option>');
            $("#CityEd").empty();
            $("#CityEd").append('<option value="">PLEASE CHOOSE</option>');
            $("#PostcodeEd").empty();
            $("#PostcodeEd").append('<option value="">PLEASE CHOOSE</option>');
            $.each(data, function (index, state) {
                $("#StateEd").append('<option value="' + state.id + '">' + state.state_name + '</option>');
            });
        });
            $("#StateEd").empty();
            $("#StateEd").append('<option value="">PLEASE CHOOSE</option>');
            $("#CityEd").empty();
            $("#CityEd").append('<option value="">PLEASE CHOOSE</option>');
            $("#PostcodeEd").empty();
            $("#PostcodeEd").append('<option value="">PLEASE CHOOSE</option>');
    });
    function getStatebyCountry(id) {
        return $.ajax({
            url: "/getStatebyCountry/" + id,
        });
    }

    $(document).on("change", "#StateEd", function () {
        var getCity = $("#StateEd").val();
        var getCity = getCitybyState(getCity);
        getCity.then(function (data) {
            $("#CityEd").empty();
            $("#CityEd").append('<option value="">PLEASE CHOOSE</option>');
            $("#PostcodeEd").empty();
            $("#PostcodeEd").append('<option value="">PLEASE CHOOSE</option>');
            $.each(data, function (index, city) {
                $("#CityEd").append('<option value="' + city.name + '">' + city.name + '</option>');
            });
        });
            $("#CityEd").empty();
            $("#CityEd").append('<option value="">PLEASE CHOOSE</option>');
            $("#PostcodeEd").empty();
            $("#PostcodeEd").append('<option value="">PLEASE CHOOSE</option>');
    });
    function getCitybyState(id) {
        return $.ajax({
            url: "/getCitybyState/" + id,
        });
    }
    
    $(document).on("change", "#CityEd", function () {
        var getPostcode = $("#CityEd").val();
        var getPostcode = getPostcodeByCity(getPostcode);
        getPostcode.then(function (data) {
            $("#PostcodeEd").empty();
            $("#PostcodeEd").append('<option value="">PLEASE CHOOSE</option>');
            $.each(data, function (index, postcode) {
                $("#PostcodeEd").append('<option value="' + postcode.postcode + '">' + postcode.postcode + '</option>');
            });
        });
            $("#PostcodeEd").empty();
            $("#PostcodeEd").append('<option value="">PLEASE CHOOSE</option>');
    });
    function getPostcodeByCity(id) {
        return $.ajax({
            url: "/getPostcodeByCity/" + id,
        });
    }


    $(document).ready(function() {
        $('.sel1').select2({
            placeholder: "PLEASE CHOOSE",
            allowClear: true,
            dropdownParent: $('#addModal'),
        });
        $('.sel2').select2({
            placeholder: 'PLEASE CHOOSE',
            allowClear: true ,
            dropdownParent: $('#addModal'),
        });
        $('.sel3').select2({
            placeholder: 'PLEASE CHOOSE',
            allowClear: true,
            dropdownParent: $('#addModal'), 
        });
        $('.sel4').select2({
            placeholder: 'PLEASE CHOOSE',
            allowClear: true,
            dropdownParent: $('#addModal'), 
        });
        // $('.sel5').select2({
        //     placeholder: 'PLEASE CHOOSE',
        //     allowClear: true,
        //     dropdownParent: $('#editModal'), 
        // });
        // // $('.sel6').select2({
        // //     placeholder: 'PLEASE CHOOSE',
        // //     allowClear: true,
        // //     dropdownParent: $('#editModal'), 
        // // });
        // $('.sel7').select2({
        //     placeholder: 'PLEASE CHOOSE',
        //     allowClear: true,
        //     dropdownParent: $('#editModal'), 
        // });
        // $('.sel8').select2({
        //     placeholder: 'PLEASE CHOOSE',
        //     allowClear: true,
        //     dropdownParent: $('#editModal'), 
        // });
    });

    $("#datepicker-joindate").datepicker({
        todayHighlight: true,
        autoclose: true,
    });

    $("#customerTable").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        initComplete: function (settings, json) {
            $("#customerTable").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });

    $(document).ready(function () {
        table.on("draw.dt", function () {
            $(".statusCheck")
                .off("change")
                .on("change", function () {
                    var id = $(this).data("id");
                    var status;

                    if ($(this).is(":checked")) {
                        status = 1;
                    } else {
                        status = 2;
                    }

                    requirejs(["sweetAlert2"], function (swal) {
                        $.ajax({
                            type: "POST",
                            url: "/updateStatusCustomer/" + id + "/" + status,

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

        $("#customerTable").on(
            "responsive-display",
            function (e, datatable, row, showHide, update) {
                if (showHide) {
                    $(row.child()[0])
                        .find("input.statusCheck")
                        .prop(
                            "checked",
                            $(row.node())
                                .find("input.statusCheck")
                                .prop("checked")
                        );
                    $(row.child()[0])
                        .find("input.statusCheck")
                        .off("change")
                        .on("change", function () {
                            $(".statusCheck").trigger("change");
                        });
                }
            }
        );
    });

    $(document).on("click", "#addButton", function () {
        $("#addModal").modal("show");
    });

    $(document).on("click", "#editButton", function () {
        var id = $(this).data("id");
        var vehicleData = getData(id);
        vehicleData.then(function (data) {
            // console.log(data);
            $("#customer_name").val(data.customer_name);
            $("#address").val(data.address);
            $("#address2").val(data.address2);
            $("#PostcodeEd").val(data.postcode).select2({
                placeholder: 'PLEASE CHOOSE',
                allowClear: true,
                dropdownParent: $('#editModal'), 
            });
            $("#CityEd").val(data.city).select2({
                placeholder: 'PLEASE CHOOSE',
                allowClear: true,
                dropdownParent: $('#editModal'), 
            });
            $("#StateEd").val(data.state).select2({
                placeholder: 'PLEASE CHOOSE',
                allowClear: true,
                dropdownParent: $('#editModal'), 
            });
            $("#CountryEd").val(data.country).select2({
                    placeholder: 'PLEASE CHOOSE',
                    allowClear: true,
                    dropdownParent: $('#editModal'), 
                });
            $("#phoneNo").val(data.phoneNo);
            $("#idC").val(data.id);
            $("#email").val(data.email);
        });
        $("#editModal").modal("show");
    });

    function getData(id) {
        return $.ajax({
            url: "/getCustomerById/" + id,
        });
    }

    $("input[type=text]").keyup(function () {
        $(this).val($(this).val().toUpperCase());
    });

    $(document).on("click", "#deleteButton", function () {
        id = $(this).data("id");
        requirejs(["sweetAlert2"], function (swal) {
            swal({
                title: "Are you sure to delete Customer?",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
            }).then(function () {
                $.ajax({
                    type: "POST",
                    url: "/deleteCustomer/" + id,
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

    function getData(id) {
        return $.ajax({
            url: "/getCustomerById/" + id,
        });
    }

    $.validator.addMethod(
        "noSpecialChars",
        function (value, element) {
            return (
                this.optional(element) ||
                /^[^A-Za-z!@#$%^&*()\-_+={}[\]\\|<>"'\/~`,.;: ]*$/.test(value)
            );
        },
        "Special Characters, Spaces, and Alphabet Characters Are Not Allowed."
    );

    $.validator.addMethod(
        "email",
        function (value, element) {
            // Email validation regex pattern
            return (
                this.optional(element) ||
                /^[^\s@]+@[^\s@]+\.(?:com|net|org|edu|gov|mil|biz|info|name|museum|coop|aero|[a-z]{2})$/.test(
                    value
                )
            );
        },
        "Please Insert Valid Email Address"
    );

    $("#saveButton").click(function (e) {
        $("#addForm").validate({
            rules: {
                customer_name: "required",
                address: "required",
                postcode:  "required",
                city: "required",
                state: "required",
                country: "required",
                phoneNo: {
                    required: true,
                    digits: true,
                    rangelength: [10, 11],
                },

                email: {
                    required: true,
                    email: true,
                },
            },

            messages: {
                customer_name: "Please Insert Customer Name",
                address: "Please Insert Address 1",
                phoneNo: {
                    required: "Please Insert Phone Number",
                    digits: "Please Insert Correct Phone Number Without ' - ' or Space",
                    rangelength: "Please Insert Valid Phone Number",
                },
                postcode: "Please Insert Postcode",
                city: "Please Insert City",
                state: "Please Insert State",
                country: "Please Insert Country",
                email: {
                    required: "Please Insert Email Customer",
                    email: "Please Insert Valid Email Address",
                },
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") === "country") {
                    error.insertAfter("#countrydiv");
            } else if (element.attr("name") === "state") {
                error.insertAfter("#statediv");
            } else if (element.attr("name") === "city") {
                error.insertAfter("#citydiv");
            } else if (element.attr("name") === "postcode") {
                error.insertAfter("#postdiv");
            }  else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(document.getElementById("addForm"));
                    // var data = $('#tree').jstree("get_selected");

                    $.ajax({
                        type: "POST",
                        url: "/createCustomer",
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
                customer_name: "required",
                address: "required",
                postcode: "required",
                city: "required",
                state: "required",
                country: "required",
                phoneNo: {
                    required: true,
                    digits: true,
                    rangelength: [10, 11],
                },

                email: {
                    required: true,
                    email: true,
                },
            },

            messages: {
                customer_name: "Please Insert Customer Name",
                address: "Please Insert Address 1",
                phoneNo: {
                    required: "Please Insert Phone Number",
                    digits: "Please Insert Correct Phone Number Without ' - ' or Space",
                    rangelength: "Please Insert Valid Phone Number",
                },
                postcode: "Please Insert Postcode",
                city: "Please Insert City",
                state: "Please Insert State",
                country: "Please insert Country",
                email: {
                    required: "Please Insert Email Customer",
                    email: "Please Insert Valid Email Address",
                },
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") === "country") {
                    error.insertAfter("#countryEdiv");
            } else if (element.attr("name") === "state") {
                error.insertAfter("#stateEdiv");
            } else if (element.attr("name") === "city") {
                error.insertAfter("#cityEdiv");
            } else if (element.attr("name") === "postcode") {
                error.insertAfter("#postEdiv");
            }  else {
                    error.insertAfter(element);
                }
            },

            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("editForm")
                    );
                    // console.log(data);
                    var id = $("#idC").val();

                    $.ajax({
                        type: "POST",
                        url: "/updateCustomer/" + id,
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
     function getData(id) {
        return $.ajax({
            url: "/getCustomerById/" + id,
        });
    }

    $(".statusCheck").on("change", function () {
        var id = $(this).data("id");
        var status;

        if ($(this).is(":checked")) {
            status = 1;
        } else {
            status = 2;
        }
        requirejs(["sweetAlert2"], function (swal) {
            $.ajax({
                type: "POST",
                url: "/updateStatusCustomer/" + id + "/" + status,

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
        // updating checked attribute of change event occurred element, this.checked returns current state
        // $(".wrapper").val($(".container").html());
        // updating the value of textarea
    });
});
