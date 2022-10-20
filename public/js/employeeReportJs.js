$("#daterange").daterangepicker({
    opens: "right",
    format: "MM/DD/YYYY",
    separator: " to ",
    startDate: moment().subtract("days", 29),
    endDate: moment(),

}, function(start, end) {
    $("#default-daterange input").val(start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY"));
});
$(document).ready(function() {
    $("#rowproject").hide();
    $("#rowdepartment").hide();
    $("#rowemployee").hide();


});
$(document).on('change', "#reportby", function() {
    if ($(this).val() == "Project") {
        $("#rowproject").show();
        $("#rowdepartment").hide();
        $("#rowemployee").hide();
    } else if ($(this).val() == "Department") {
        $("#rowproject").hide();
        $("#rowdepartment").show();
        $("#rowemployee").hide();
    } else if ($(this).val() == "Employee") {
        $("#rowproject").hide();
        $("#rowdepartment").hide();
        $("#rowemployee").show();
    } else {
        $("#rowproject").hide();
        $("#rowdepartment").hide();
        $("#rowemployee").hide();
    }
});
