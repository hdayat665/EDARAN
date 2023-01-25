$("document").ready(function () {
    $("#claimtable1").DataTable({
        searching: false,
        lengthChange: true,
        lengthMenu: [5, 10],
        responsive: false,
        info: false,
        scrollX: true,
    });

    $("#claimtable").DataTable({
        searching: false,
        lengthChange: true,
        lengthMenu: [5, 10],
        responsive: false,
        info: false,
        scrollX: true,
    });

    $("#traveltable").DataTable({
        searching: false,
        lengthChange: true,
        lengthMenu: [5, 10],
        responsive: false,
        info: false,
        scrollX: true,
    });

    $("#datepicker-autoClose").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "dd/mm/yyyy",
    });

    $(document).on("change", "#ca", function () {
        if ($(this).val() == "1") {
            $(".WC").show();
            $(".WOC").hide();
        } else if ($(this).val() == "2") {
            $(".WC").hide();
            $(".WOC").show();
        } else {
            $(".WC").hide();
            $(".WOC").hide();
        }
    });

    //
    $(document).on("change", "#ls", function () {
        if ($(this).val() == "3") {
            $("#project").show();
        } else {
            $("#project").hide();
        }
    });

    //
    $(document).on("change", "#dest", function () {
        if ($(this).val() == "3") {
            $("#projectdest").show();
            $("#logname").hide();
        } else if ($(this).val() == "4") {
            $("#projectdest").hide();
            $("#logname").show();
        } else {
            $("#projectdest").hide();
            $("#logname").hide();
        }
    });

    $("#datepickerpc")
        .datepicker({
            todayHighlight: true,
            autoclose: true,
            format: "dd-mm-yyyy",
        })
        .datepicker("setDate", "now");

    $("#datepickertc")
        .datepicker({
            todayHighlight: true,
            autoclose: true,
            format: "dd-mm-yyyy",
        })
        .datepicker("setDate", "now");

    $(function () {
        $("#date1, #date2").datepicker({
            format: "mm/dd/yyyy",
        });
        $("#time1,#time2").mdtimepicker({});

        $("#timestart,#timeend").mdtimepicker({});
        $("#daystart,#dayend")
            .datepicker({
                format: "mm/dd/yyyy",
            })
            .datepicker("setDate", "now");
    });

    $(document).ready(function () {
        //calculate date range in subsistence allowance
        $("#result1,#date1,#time1,#date2,#time2").focus(function () {
            var startdt = new Date($("#date1").val() + " " + $("#time1").val());

            var enddt = new Date($("#date2").val() + " " + $("#time2").val());

            var diff = enddt - startdt;

            var days = Math.floor(diff / (1000 * 60 * 60 * 24));
            diff -= days * (1000 * 60 * 60 * 24);

            var hours = Math.floor(diff / (1000 * 60 * 60));
            diff -= hours * (1000 * 60 * 60);

            var mins = Math.floor(diff / (1000 * 60));
            diff -= mins * (1000 * 60);

            $("#result1").val(
                days + " days : " + hours + " hours : " + mins + " minutes "
            );
        });
    });

    //  calculate time duration un travelling

    //
    $("#totalduration,#daystart,#timestart,#dayend,#timeend").focus(
        function () {
            var startdt = new Date(
                $("#daystart").val() + " " + $("#timestart").val()
            );

            var enddt = new Date(
                $("#dayend").val() + " " + $("#timeend").val()
            );

            var diff = enddt - startdt;

            var days = Math.floor(diff / (1000 * 60 * 60 * 24));
            diff -= days * (1000 * 60 * 60 * 24);

            var hours = Math.floor(diff / (1000 * 60 * 60));
            diff -= hours * (1000 * 60 * 60);

            var mins = Math.floor(diff / (1000 * 60));
            diff -= mins * (1000 * 60);

            $("#totalduration").val(hours + " hours : " + mins + " minutes ");
        }
    );

    $("#hotelc").change(function () {
        var s = $("#hotelc input:checked")
            .map(function () {
                return this.value;
            })
            .get()
            .join(",");
        $("#hotelcv").val(s.length > 0 ? s : "");
        $("#hotelcv1").val(s.length > 0 ? s : "0");
    });

    $("#lodgingc").change(function () {
        var s = $("#lodgingc input:checked")
            .map(function () {
                return this.value;
            })
            .get()
            .join(",");
        $("#lodgingcv").val(s.length > 0 ? s : "");
        $("#lodgingcv1").val(s.length > 0 ? s : "0");
    });

    // calculate total subsistence & accomadation
    $("#BF,#DBF,#LH,#DLH,#DN,#DDN,#TS").change(function () {
        var a = parseFloat($("#BF").val()); //float
        var b = parseInt($("#DBF").val());
        var c = parseFloat($("#LH").val()); //float
        var d = parseInt($("#DLH").val());
        var e = parseFloat($("#DN").val()); //float
        var f = parseInt($("#DDN").val());
        $("#TS").val(a * b + c * d + e * f); //float
    });

    $("#htv,#hotelcv1,#hn,#lodgingcv1,#ln,#ldgv").change(function () {
        var a = parseFloat($("#hotelcv1").val()); //float
        var b = parseInt($("#hn").val());

        var c = parseFloat($("#lodgingcv1").val()); //float
        var d = parseInt($("#ln").val());
        var e = parseFloat(a * b + c * d).toFixed(2);
        $("#TAV").val(e);
    });

    $(
        "#hotelcv,#hotelcv1,#hn,#lodgingcv,#hotelcv1,#ln,#htv,#ldgv,#TS,#TAV,#DBF,#DLH,#DDN"
    ).change(function () {
        var a = parseFloat($("#TS").val());
        var b = parseFloat($("#TAV").val());
        var c = parseFloat(a + b).toFixed(2);
        $("#total2").val(c);
    });

    $("#htv").click(function () {
        if (this.checked) {
            $("#hn").prop("disabled", false); // If checked enable item
        } else {
            $("#hn").prop("disabled", true); // If checked disable item
            $("#hn").val(0);
        }
    });

    $("#ldgv").click(function () {
        if (this.checked) {
            $("#ln").prop("disabled", false); // If checked enable item
        } else {
            $("#ln").prop("disabled", true); // If checked disable item
            $("#ln").val(0);
        }
    });
});
