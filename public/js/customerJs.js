$(document).ready(function () {
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
        // scrollX:true,
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
            console.log(data);
            $("#customer_name").val(data.customer_name);
            $("#address").val(data.address);
            $("#address2").val(data.address2);
            $("#postcode").val(data.postcode);
            $("#city").val(data.city);
            $("#phoneNo").val(data.phoneNo);
            $("#idC").val(data.id);
            $("#email").val(data.email);
        });
        $("#editModal").modal("show");
    });

    $(document).on("click", "#viewButton", function () {
        var id = $(this).data("id");
        var vehicleData = getData(id);
        $("input").prop("disabled", true);
        $("select").prop("disabled", true);

        vehicleData.then(function (data) {
            $("input").val("");
            vdata = data.data;
            $("#vehicleType1").prop("selectedIndex", vdata.vehicle_type);
            $("#plateNo1").val(vdata.plate_no);
        });
        $("#viewModal").modal("show");
    });

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
                postcode: {
                    required: true,
                    digits: true,
                    rangelength: [5, 5],
                },
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
                postcode: {
                    required: "Please Insert Postcode",
                    digits: "Please Insert Valid Postcode",
                    rangelength: "Please Insert Valid Postcode",
                },
                city: "Please Insert City",
                state: "Please Insert State",
                country: "Please Insert Country",
                email: {
                    required: "Please Insert Email Customer",
                    email: "Please Insert Valid Email Address",
                },
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
                postcode: {
                    required: true,
                    digits: true,
                    rangelength: [5, 5],
                },
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
                postcode: {
                    required: "Please Insert Postcode",
                    digits: "Please Insert Valid Postcode",
                    rangelength: "Please Insert Valid Postcode",
                },
                city: "Please Insert City",
                state: "Please Insert State",
                country: "Please insert Country",
                email: {
                    required: "Please Insert Email Customer",
                    email: "Please Insert Valid Email Address",
                },
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
