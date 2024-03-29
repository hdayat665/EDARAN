$(document).ready(function () {
    $("#projectTable").DataTable({});
    $(document).on("change", "#toca", function () {
        // $("input").val("");

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
            $("#areacategory").val('');
            $("#accom").val('');
            
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
            $("#areacategory").val('');
            $("#accom").val('');
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
            $("#areacategory").val('');
            $("#accom").val('');
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
            $("#areacategory").val('');
            $("#accom").val('');
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

        var a1 = parseFloat($("#totalexp").val());
        var a2 = parseFloat($("#max_value").val());
        
        var f1 = parseFloat((a2 / 100) * a1).toFixed(2);
        $("#maxpaid").val(f1);
    });

    //cal maximum paid out
    $(
        "#day,#subs,#night,#acco,#totalsubs,#totalacco,#fuelfare,#tollparking,#ent,#totalexp"
    ).change(function () {
        var a = parseFloat($("#totalsubs").val());
        var b = parseFloat($("#totalacco").val());
        var c = parseFloat($("#fuelfare").val());
        var d = parseFloat($("#tollparking").val());
        var e = parseFloat($("#ent").val());
        var f = parseFloat(a + b + c + d + e).toFixed(2);
        $("#totalexp").val(f);

        var a1 = parseFloat($("#totalexp").val());
        var a2 = parseFloat($("#max_value").val());
        
        var f1 = parseFloat((a2 / 100) * a1).toFixed(2);
        $("#maxpaid").val(f1);
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
                    //return date.isBefore(moment(), "day");
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
                    //return date.isBefore(moment(), "day");
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
                    //return date.isBefore(moment(), "day");
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

                var a = parseFloat($("#totalsubs").val());
                var b = parseFloat($("#totalacco").val());
                var c = parseFloat($("#fuelfare").val());
                var d = parseFloat($("#tollparking").val());
                var e = parseFloat($("#ent").val());
                var f = parseFloat(a + b + c + d + e).toFixed(2);
                $("#totalexp").val(f);

                var a1 = parseFloat($("#totalexp").val());
                var a2 = parseFloat($("#max_value").val());
        
                var f1 = parseFloat((a2 / 100) * a1).toFixed(2);
                
                $("#maxpaid").val(f1);

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

                var a = parseFloat($("#totalsubs").val());
                var b = parseFloat($("#totalacco").val());
                var c = parseFloat($("#fuelfare").val());
                var d = parseFloat($("#tollparking").val());
                var e = parseFloat($("#ent").val());
                var f = parseFloat(a + b + c + d + e).toFixed(2);
                $("#totalexp").val(f);

                var a1 = parseFloat($("#totalexp").val());
                var a2 = parseFloat($("#max_value").val());
        
                var f1 = parseFloat((a2 / 100) * a1).toFixed(2);
                $("#maxpaid").val(f1);
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
    $(document).on("change", "#locationShow", function () {

        if ($(this).val() === 'other') {
            $("#otherlocation").show();
        } else {
            $("#otherlocation").hide();
        }

    });

    $(document).on("change", "#locationShow2", function () {

        if ($(this).val() === 'other') {
            $("#otherlocation2").show();
        } else {
            $("#otherlocation2").hide();
        }

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
            rules: {
                type: "required",

                travel_date3: "required",
                project_id1: "required",
                project_location_id: "required",
                purpose4: "required",

                travel_date2: "required",
                project_id2: "required",
                project_location_id2: "required",
                purpose2: "required",

                travel_date: "required",
                destination: "required",
                purpose3: "required",

                date_require_cash: "required",
                purpose: "required",
                amount: "required",
                file_upload: "required",

                transport_type: "required",
            },
            messages: {
                type: "Please Choose Type of Cash Advance",

                travel_date3:   "Please Choose Travel Date",
                project_id1: "Please Choose Project",
                project_location_id: "Please Choose Destination",
                purpose4: "Please Insert Purpose",

                travel_date2:   "Please Choose Travel Date",
                project_id2: "Please Choose Project",
                project_location_id2: "Please Choose Destination",
                purpose2: "Please Insert Purpose",

                travel_date:   "Please Choose Travel Date",
                destination: "Please Choose Destination",
                purpose3: "Please Insert Purpose",

                date_require_cash:   "Please Choose Date of Required Cash",
                purpose: "Please Insert Purpose",
                amount: "Please Insert Amount",
                file_upload: "Please Upload Supporting Document",

                transport_type: "Please Choose Mode of Transport",
            },
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
