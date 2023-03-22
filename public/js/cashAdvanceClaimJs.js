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
            $("#day").val(0);
            $("#night").val(0);
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
            $("#day").val(0);
            $("#night").val(0);
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
            $("#day").val(0);
            $("#night").val(0);
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
            $("#day").val(0);
            $("#night").val(0);
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
        $("#datefilter1").daterangepicker({
            autoUpdateInput: true,
            locale: {
                cancelLabel: "Clear",
            },
        });

        $("#datefilter2").daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: "Clear",
            },
        });

        $("#datefilter3").daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: "Clear",
            },
        });
        $("#datefilter1").on("apply.daterangepicker", function (ev, picker) {
            $(this).val(
                picker.startDate.format("DD/MM/YYYY") +
                    " - " +
                    picker.endDate.format("DD/MM/YYYY")
            );
        });

        $("#datefilter1").on("cancel.daterangepicker", function (ev, picker) {
            $(this).val("");
        });

        $("#datefilter2").on("apply.daterangepicker", function (ev, picker) {
            $(this).val(
                picker.startDate.format("DD/MM/YYYY") +
                    " - " +
                    picker.endDate.format("DD/MM/YYYY")
            );
        });

        $("#datefilter2").on("cancel.daterangepicker", function (ev, picker) {
            $(this).val("");
        });

        $("#datefilter3").on("apply.daterangepicker", function (ev, picker) {
            $(this).val(
                picker.startDate.format("DD/MM/YYYY") +
                    " - " +
                    picker.endDate.format("DD/MM/YYYY")
            );
        });

        $("#datefilter3").on("cancel.daterangepicker", function (ev, picker) {
            $(this).val("");
        });

        $("#datefilter4").datepicker({
            todayHighlight: true,
            autoclose: true,
            format: "dd/mm/yyyy",
            orientation: "bottom",
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

        location.done(function (data) {
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

        location.done(function (data) {
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
                    }).done(function (data) {
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
                        async: false,
                        processData: false,
                        contentType: false,
                    }).done(function (data) {
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
