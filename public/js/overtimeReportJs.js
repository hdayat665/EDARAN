$('#timesheetapproval').DataTable({
    lengthMenu: [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "All"],
    ],
    responsive: false,
    searching: true,
    dom: "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>tp",
    buttons: [
        { extend: 'excel', className: 'btn-sm' },
        { extend: 'pdf', className: 'btn-sm' },
        { extend: 'print', className: 'btn-sm' }
    ],
});
// 
$().ready = (function() {
    $("#filter").click(function() {
        $("#filterform").toggle();
    });
})();
$("#starteventdate").datepicker({
    todayHighlight: true,
    autoclose: true,
});
$("#endeventdate").datepicker({
    todayHighlight: true,
    autoclose: true,
});
$("#projectlocsearch").picker({ search: true });
$("#addneweventprojectlocsearch").picker({ search: true });
$("#addneweventparticipant").picker({ search: true });
$("#addneweventselectproject").picker({ search: true });



$("#employeenamesearch").picker({ search: true });
$("#designationsearch").picker({ search: true });
$("#departmentsearch").picker({ search: true });


$("#starteventtime").timepicker({
    showMeridian: false,
});
$("#endeventtime").timepicker({
    showMeridian: false,
});

$(document).on("change", "#addneweventselectrecurring", function() {
    if ($(this).val() == "1") {
        $("#addneweventsetreccurring").show();
        $("#mon").not(this).prop("checked", true);
        $("#tue").not(this).prop("checked", true);
        $("#wed").not(this).prop("checked", true);
        $("#thu").not(this).prop("checked", true);
        $("#fri").not(this).prop("checked", true);
    } else {
        $("#addneweventsetreccurring").hide();
        $("#mon").not(this).prop("checked", false);
        $("#tue").not(this).prop("checked", false);
        $("#wed").not(this).prop("checked", false);
        $("#thu").not(this).prop("checked", false);
        $("#fri").not(this).prop("checked", false);
    }
});
$(document).on("change", "#addneweventselectrecurring", function() {
    if ($(this).val() == "1" || $(this).val() == "2" || $(this).val() == "3") {
        $("#addneweventsetreccurring").show();
    } else {
        $("#addneweventsetreccurring").hide();
    }
});
$(document).on("change", "#addneweventselectrecurring", function() {
    if ($(this).val() == "4") {
        $("#setrecurringmontly").show();
        $("#setrecurringonmontly").show();
    } else {
        $("#setrecurringmontly").hide();
        $("#setrecurringonmontly").hide();
    }
});
$(document).on("change", "#addneweventselectrecurring", function() {
    if ($(this).val() == "5") {
        $("#setrecurringyearly").show();
        $("#setrecurringontheyearly").show();
    } else {
        $("#setrecurringyearly").hide();
        $("#setrecurringontheyearly").hide();
    }
});
$().ready = (function() {
    $("#addreminder").click(function() {
        $("#addeventreminder").toggle();
    });
})();
$("#addeventrecurring").click(function() {
    if ($(this).is(":checked")) {
        $("#addneweventrecurring").show();
    } else {
        $("#addneweventrecurring").hide();
        $("#addneweventsetreccurring").hide();
        $("#setrecurringyearly").hide();
        $("#setrecurringontheyearly").hide();
        $("#setrecurringmontly").hide();
        $("#setrecurringonmontly").hide();
    }
});
$("#addeventallday").click(function() {
    if ($(this).is(":checked")) {
        $("#startendtime").hide();
        $("#starteventtime").val() == "00:00";
        $("#endeventtime").val() == "23:59";
    } else {
        $("#startendtime").show();
    }
});
$("#ondaycheck").click(function() {
    if ($(this).is(":checked")) {
        $("#ondayselect").show();
        $("#onthecheck").not(this).prop("checked", false);
        $("#recurringselectwhatday").hide();
        $("#recurringselectonthe").hide();
    } else {
        $("#ondayselect").hide();
    }
});
$("#onthecheck").click(function() {
    if ($(this).is(":checked")) {
        $("#recurringselectwhatday").show();
        $("#recurringselectonthe").show();
        $("#ondaycheck").not(this).prop("checked", false);
        $("#ondayselect").hide();
    } else {
        $("#recurringselectwhatday").hide();
        $("#recurringselectonthe").hide();
    }
});
$("#ondayyearlycheck").click(function() {
    if ($(this).is(":checked")) {
        $("#recurringmonthyearly").show();
        $("#recurringdayyearly").show();
        $("#ontheyearlycheck").not(this).prop("checked", false);
        $("#recurringselectyearly").hide();
        $("#recurringonthedayyearly").hide();
        $("#recurringonthemonthyearly").hide();
        $("#recurringontheof").hide();
        // $('#ondaycheck').not(this).prop('checked', false);
        // $("#ondayselect").hide();
    } else {
        $("#recurringmonthyearly").hide();
        $("#recurringdayyearly").hide();
    }
});
$("#ontheyearlycheck").click(function() {
    if ($(this).is(":checked")) {
        $("#recurringselectyearly").show();
        $("#recurringonthedayyearly").show();
        $("#recurringonthemonthyearly").show();
        $("#recurringontheof").show();
        $("#ondayyearlycheck").not(this).prop("checked", false);
        $("#recurringmonthyearly").hide();
        $("#recurringdayyearly").hide();
    } else {
        $("#recurringselectyearly").hide();
        $("#recurringonthedayyearly").hide();
        $("#recurringonthemonthyearly").hide();
        $("#recurringontheof").hide();
    }
});

$("#reset").on("click", function () {
    $("#employeesearch").val($("#employeesearch").data("default-value"));
    $("#yearsearch").val($("#yearsearch").data("default-value"));
    $("#monthsearch").val($("#monthsearch").data("default-value"));
    $("#designationsearch").val($("#designationsearch").data("default-value"));
    $("#departmentsearch").val($("#departmentsearch").data("default-value"));
});
