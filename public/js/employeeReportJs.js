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
            start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY")
        );
    }
);
$(document).ready(function () {
    $("#rowproject").hide();
    $("#rowdepartment").hide();
    $("#rowemployee").hide();
});
$(document).on("change", "#reportby", function () {
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

function validateForm() {
    const selectedOption = document.getElementById("reportby").value;
    if (selectedOption === "") {
        document.getElementById("report_by").innerHTML =
            "Please Choose Report By:";
        return false;
    }
    return true;
}

function validateForm1() {
    const selectedYear = document.getElementById("yearv").value;
    const selectedMonth = document.getElementById("monthv").value;
    const selectedDepartment = document.getElementById("departmentv").value;
    const selectedEmployee = document.getElementById("employeev").value;
    if (selectedYear === "") {
        document.getElementById("year_v").innerHTML = "Please Choose Year";
        return false;
    } else {
        document.getElementById("year_v").innerHTML = "";
    }
    if (selectedMonth === "") {
        document.getElementById("month_v").innerHTML = "Please Choose Month";
        return false;
    } else {
        document.getElementById("month_v").innerHTML = "";
    }
    if (selectedDepartment === "") {
        document.getElementById("department_v").innerHTML =
            "Please Choose Department";
        return false;
    } else {
        document.getElementById("department_v").innerHTML = "";
    }
    if (selectedEmployee === "") {
        document.getElementById("employee_v").innerHTML =
            "Please choose Employee Name";
        return false;
    } else {
        document.getElementById("employee_v").innerHTML = "";
    }
    return true;
}



$(document).on("change", "#departmentv", function () {
    id = $(this).val();
    const inputs = ["employeev"];

    for (let i = 0; i < inputs.length; i++) {
        $("#" + inputs[i] + "")
            .find("option")
            .remove()
            .end()
            .append(
                '<option label="PLEASE CHOOSE" value="" selected="selected"> </option>'
            )
            .val("");

        function getEmployeeNamebyDepartment(id) {
            return $.ajax({
                url: "/getEmployeeNamebyDepartment/" + id,
            });
        }
        $("#" + inputs[i] + "")
            .find("option")
            .end();
    }

    var user = getEmployeeNamebyDepartment(id);

    user.then(function (data) {
        data.sort(function(a, b) {
            return a.employeeName.localeCompare(b.employeeName);
        });

        for (let i = 0; i < data.length; i++) {
            const user = data[i];
            var opt = document.createElement("option");
            document.getElementById("employeev").innerHTML +=
                '<option value="' +
                user["user_id"] +
                '">' +
                user["employeeName"] +
                "</option>";
        }
    });
});

$('#reportby').select2({
    minimumResultsForSearch: Infinity,
});

$('#projectid, #departmentid, #employeeid').select2({});

$('#yearv').select2({
    minimumResultsForSearch: Infinity,
});

$('#monthv').select2({
    minimumResultsForSearch: Infinity,
});

$('#departmentv').select2({

});
$('#employeev').select2({
    placeholder: "<span style='color: black;'>PLEASE CHOOSE</span>",
    escapeMarkup: function(markup) {
    return markup
    },
});
