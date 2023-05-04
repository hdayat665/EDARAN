$(document).ready(function () {
    $("#projectTable").DataTable({});
    $(document).on("change", "#toca", function () {
        $("input").val("");

        if ($(this).val() == "1") {
            $(".PO").show();
            $(".MOT").show();
            $(".PNO").hide();
            $(".OTHERSNO").hide();
            $(".OTHERSO").hide();
            $(".subacco").show();
            $("#btnPO").show();
            $("#btnPNO").hide();
            $("#btnOO").hide();
            $("#btnONO").hide();
        } else if ($(this).val() == "2") {
            $(".PO").hide();
            $(".PNO").show();
            $(".MOT").show();
            $(".OTHERSNO").hide();
            $(".OTHERSO").hide();
            $(".subacco").hide();
            $("#btnPO").show();
            $("#btnPNO").show();
            $("#btnOO").hide();
            $("#btnONO").hide();
        } else if ($(this).val() == "3") {
            $(".OTHERSO").show();
            $(".MOT").show();
            $(".PO").hide();
            $(".PNO").hide();
            $(".OTHERSNO").hide();
            $(".subacco").show();
            $("#btnPO").show();
            $("#btnPNO").hide();
            $("#btnOO").show();
            $("#btnONO").hide();
        } else if ($(this).val() == "4") {
            $(".OTHERSNO").show();
            $(".OTHERSO").hide();
            $(".MOT").hide();
            $(".PO").hide();
            $(".PNO").hide();
            $(".subacco").show();
            $("#btnPO").show();
            $("#btnPNO").hide();
            $("#btnOO").hide();
            $("#btnONO").show();
        } else {
            $(".OTHERSNO").hide();
            $(".OTHERSO").hide();
            $(".PO").hide();
            $(".MOT").hide();
            $(".PNO").hide();
            $(".subacco").show();
            $("#btnPO").show();
            $("#btnPNO").hide();
            $("#btnOO").hide();
            $("#btnONO").hide();
        }
    });

    $(document).on("change", "#SMOT", function () {
        if (
            $(this).val() == "2" ||
            $(this).val() == "3" ||
            $(this).val() == "5"
        ) {
            $(".SAC").show();
            $(".TE").show();
            $(".FF").show();
            $(".TP").show();
            $(".ENTT").show();
            $(".TE").show();
            $(".MPO").show();
            $(".SV").show();
            $("#day").val();
            $("#night").val();
            $("#fuelfare").val(0);
            $("#tollparking").val(0);
            $("#ent").val(0);
            $("#totalexp").val(0);
            $("#maxpaid").val(0);
            $("#totalsubs").val(0);
            $("#totalacco").val(0);
        } else if ($(this).val() == "4") {
            $(".SAC").show();
            $(".TE").show();
            $(".FF").show();
            $(".TP").hide();
            $(".ENTT").show();
            $(".TE").show();
            $(".MPO").show();
            $(".SV").show();
            $("#day").val();
            $("#night").val();
            $("#fuelfare").val(0);
            $("#tollparking").val(0);
            $("#ent").val(0);
            $("#totalexp").val(0);
            $("#maxpaid").val(0);
            $("#totalsubs").val(0);
            $("#totalacco").val(0);
        } else if ($(this).val() == "6") {
            $(".SAC").show();
            $(".TE").show();
            $(".FF").hide();
            $(".TP").hide();
            $(".ENTT").show();
            $(".TE").show();
            $(".MPO").show();
            $(".SV").show();
            $("#day").val();
            $("#night").val();
            $("#fuelfare").val(0);
            $("#tollparking").val(0);
            $("#ent").val(0);
            $("#totalexp").val(0);
            $("#maxpaid").val(0);
            $("#totalsubs").val(0);
            $("#totalacco").val(0);
        } else {
            $(".SAC").hide();
            $(".TE").hide();
            $(".FF").hide();
            $(".TP").hide();
            $(".ENTT").hide();
            $(".TE").hide();
            $(".MPO").hide();
            $(".SV").hide();
            $("#day").val();
            $("#night").val();
            $("#fuelfare").val(0);
            $("#tollparking").val(0);
            $("#ent").val(0);
            $("#totalexp").val(0);
            $("#maxpaid").val(0);
            $("#totalsubs").val(0);
            $("#totalacco").val(0);
        }
    });

    // cal mode transport
    $("#day,#subs").change(function () {
        var a = parseInt($("#day").val());
        var b = parseFloat($("#subs").val());
        var c = parseFloat(a * b).toFixed(2);
        $("#totalsubs").val(c);
    });

    // cal acco
    $("#night,#acco").change(function () {
        var a = parseInt($("#night").val());
        var b = parseFloat($("#acco").val());
        var c = parseFloat(a * b).toFixed(2);
        $("#totalacco").val(c);
    });

    //
    $(
        "#day,#subs,#night,#acco,#totalsubs,#totalacco,#fuelfare,#tollparking,#ent"
    ).focus(function () {
        var a = parseFloat($("#totalsubs").val());
        var b = parseFloat($("#totalacco").val());
        var c = parseFloat($("#fuelfare").val());
        var d = parseFloat($("#tollparking").val());
        var e = parseFloat($("#ent").val());
        var f = parseFloat(a + b + c + d + e).toFixed(2);
        $("#totalexp").val(f);
    });

    //cal maximum paid out
    $(
        "#day,#subs,#night,#acco,#totalsubs,#totalacco,#fuelfare,#tollparking,#ent,#totalexp"
    ).change(function () {
        var a = parseFloat($("#totalexp").val());
        var f = parseFloat((75 / 100) * a).toFixed(2);
        $("#maxpaid").val(f);
    });

    // end total transport
    $(function () {
        $("#datefilter1").daterangepicker(
            {
                autoUpdateInput: false,
                locale: {
                    cancelLabel: "Clear",
                },
                isInvalidDate: function (date) {
                    // Disable dates in the past
                    return date.isBefore(moment(), "day");
                },
            },
            function (start, end, label) {
                // Calculate the difference in milliseconds between the start and end dates
                var diffInMs = end - start;

                // Convert the difference to days
                var diffInDays = Math.ceil(diffInMs / (1000 * 60 * 60 * 24));

                // Update the value of the input with the total number of days
                $("#day").val(diffInDays);
                $("#night").val(diffInDays - 1);
            }
        );

        $("#datefilter2").daterangepicker(
            {
                autoUpdateInput: false,
                locale: {
                    cancelLabel: "Clear",
                },
                isInvalidDate: function (date) {
                    // Disable dates in the past
                    return date.isBefore(moment(), "day");
                },
            },
            function (start, end, label) {
                // Calculate the difference in milliseconds between the start and end dates
                var diffInMs = end - start;

                // Convert the difference to days
                var diffInDays = Math.ceil(diffInMs / (1000 * 60 * 60 * 24));

                // Update the value of the input with the total number of days
                $("#day").val(diffInDays);
                $("#night").val(diffInDays - 1);
            }
        );

        $("#datefilter3").daterangepicker(
            {
                autoUpdateInput: false,
                locale: {
                    cancelLabel: "Clear",
                },
                isInvalidDate: function (date) {
                    // Disable dates in the past
                    return date.isBefore(moment(), "day");
                },
            },
            function (start, end, label) {
                // Calculate the difference in milliseconds between the start and end dates
                var diffInMs = end - start;

                // Convert the difference to days
                var diffInDays = Math.ceil(diffInMs / (1000 * 60 * 60 * 24));

                // Update the value of the input with the total number of days
                $("#day").val(diffInDays);
                $("#night").val(diffInDays - 1);
            }
        );
        //   $("#datefilter1").daterangepicker({
        //     isInvalidDate: function(date) {
        //         // Disable dates in the past
        //         return date.isBefore(moment(), 'day');
        //     }
        // });

        $("#datefilter1").on("apply.daterangepicker", function (ev, picker) {
            var currentDate = moment();
            if (picker.startDate < currentDate) {
                picker.setStartDate(currentDate);
            }
            if (picker.endDate < currentDate) {
                picker.setEndDate(currentDate);
            }
            $(this).val(
                picker.startDate.format("DD/MM/YYYY") +
                    " - " +
                    picker.endDate.format("DD/MM/YYYY")
            );
        });
        
        $(document).on("change", "#areacategory", function () {
            var id = $(this).val();
            
            function getEntitlementContent(id) {
                return $.ajax({
                    url: "/getEntitlementContent/" + id,
                });
            }
        
            var user = getEntitlementContent(id);
            console.log(user);
            
            user.done(function (data) {
                var value = parseInt(data[0].value);
                $("#subs").val(value);
        
                var a = parseInt($("#day").val());
                var b = parseFloat($("#subs").val());
                var c = parseFloat(a * b).toFixed(2);
                $("#totalsubs").val(c);
            });
        });
        
        

        $(document).on("change", "#accom", function () {
            var id = $(this).val();
            //console.log(id);
        
            function getAccomodation() {
                return $.ajax({
                    url: "/getAccomodation/",
                    method: "GET",
                    dataType: "json" // Set the data type to JSON
                });
            }
        
            getAccomodation().done(function (data) {
                var A1 = data.area[0].local_hotel_value;
                var B1 = data.area[0].lodging_allowance_value;

                var price = "";

                if (id == "hotel") {
                    price = A1;
                } else if (id == "lodging") {
                    price = B1;
                } else {
                    price = "";
                }

                $("#acco").val(price);

                var a = parseInt($("#night").val());
                var b = parseFloat($("#acco").val());
                var c = parseFloat(a * b).toFixed(2);
                $("#totalacco").val(c);
                
            });


        });
        

        $("#datefilter1").on("cancel.daterangepicker", function (ev, picker) {
            $(this).val("");
        });

        // $("#datefilter2").daterangepicker({
        //     isInvalidDate: function(date) {
        //         // Disable dates in the past
        //         return date.isBefore(moment(), 'day');
        //     }
        // });

        $("#datefilter2").on("apply.daterangepicker", function (ev, picker) {
            var currentDate = moment();
            if (picker.startDate < currentDate) {
                picker.setStartDate(currentDate);
            }
            if (picker.endDate < currentDate) {
                picker.setEndDate(currentDate);
            }
            $(this).val(
                picker.startDate.format("DD/MM/YYYY") +
                    " - " +
                    picker.endDate.format("DD/MM/YYYY")
            );
        });

        // $("#datefilter3").daterangepicker({
        //     isInvalidDate: function(date) {
        //         // Disable dates in the past
        //         return date.isBefore(moment(), 'day');
        //     }
        // });

        $("#datefilter3").on("apply.daterangepicker", function (ev, picker) {
            var currentDate = moment();
            if (picker.startDate < currentDate) {
                picker.setStartDate(currentDate);
            }
            if (picker.endDate < currentDate) {
                picker.setEndDate(currentDate);
            }
            $(this).val(
                picker.startDate.format("DD/MM/YYYY") +
                    " - " +
                    picker.endDate.format("DD/MM/YYYY")
            );
        });

        $("#datefilter4").datepicker({
            todayHighlight: true,
            autoclose: true,
            format: "dd/mm/yyyy",
            orientation: "bottom",
            startDate: new Date(), // Set the start date to the current date
            beforeShowDay: function (date) {
                // Disable past dates
                var currentDate = new Date();
                return date < currentDate.setHours(0, 0, 0, 0)
                    ? "disabled"
                    : "";
            },
        });
    });

    $(document).on("change", "#project", function () {
        projectId = $(this).val();

        function getLocationByProjectId(id) {
            return $.ajax({
                url: "/getLocationByProjectId/" + id,
            });
        }

        $("#locationShow")
            .find("option")
            // .remove()
            .end();

        var location = getLocationByProjectId(projectId);

        location.then(function (data) {
            for (let i = 0; i < data.length; i++) {
                const location = data[i];
                var opt = document.createElement("option");
                document.getElementById("locationShow").innerHTML +=
                    '<option value="' +
                    location["id"] +
                    '">' +
                    location["location_name"] +
                    "</option>";
            }
        });
    });

    $(document).on("change", "#project2", function () {
        projectId = $(this).val();

        function getLocationByProjectId(id) {
            return $.ajax({
                url: "/getLocationByProjectId/" + id,
            });
        }

        $("#locationShow2")
            .find("option")
            // .remove()
            .end();

        var location = getLocationByProjectId(projectId);

        location.then(function (data) {
            for (let i = 0; i < data.length; i++) {
                const location = data[i];
                var opt = document.createElement("option");
                document.getElementById("locationShow2").innerHTML +=
                    '<option value="' +
                    location["id"] +
                    '">' +
                    location["location_name"] +
                    "</option>";
            }
        });
    });

    $("#btnPO").click(function (e) {
        $("#saveForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("saveForm")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/createCashAdvance",
                        data: data,
                        dataType: "json",
                        async: true,
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
                                // location.reload();
                                window.location.href = "/myClaimView";
                            }
                        });
                    });
                });
            },
        });
    });
 
    $("#submitButton").click(function (e) {
        $("#saveForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("saveForm")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/submitCashAdvance",
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
                                // location.reload();
                                window.location.href = "/myClaimView";
                            }
                        });
                    });
                });
            },
        });
    });
});
