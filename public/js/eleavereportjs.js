$(document).ready(function () {
    $("#daterange").daterangepicker(
        {
            opens: "right",
            format: "MM/DD/YYYY",
            separator: " to ",
            startDate: moment().subtract("days", 29),
            endDate: moment(),
        },
        function (start, end) {
            $("#default-daterange input").val(
                start.format("MMMM D, YYYY") +
                    " - " +
                    end.format("MMMM D, YYYY")
            );
        }
    );

    $(document).on("change", "#reportby", function () {
        if ($(this).val() == "1") {
            $("#menu1").show();
            $("#menu2").hide();
            $("#employer").val("");
        } else if ($(this).val() == "2") {
            $("#menu2").show();
            $("#menu1").hide();
            $("#department").val("");
        } else {
            $("#menu1").hide();
            $("#menu2").hide();
        }
    });

    $('#typeofleave, #department, #employer').select2({});

    $('#reportby, #status').select2({
        minimumResultsForSearch: Infinity,
    });
});
