$(document).on("change", "#companyForEmployment", function () {
    companyId = $(this).val();
    $("#departmentShow")
        .find("option")
        .remove()
        .end()
        .append(
            '<option label="PLEASE CHOOSE" value="" selected="selected"> </option>'
        )
        .val("");

    $("#unitShow")
        .find("option")
        .remove()
        .end()
        .append(
            '<option label="PLEASE CHOOSE" value="" selected="selected"> </option>'
        )
        .val("");

    $("#branchShow")
        .find("option")
        .remove()
        .end()
        .append(
            '<option label="PLEASE CHOOSE" value="" selected="selected"> </option>'
        )
        .val("");

    function departmentByCompanyId(companyId) {
        return $.ajax({
            url: "/departmentByCompanyId/" + companyId,
        });
    }

    function branchByUnitId(companyId) {
        return $.ajax({
            url: "/branchByUnitId/" + companyId,
        });
    }

    $("#departmentShow")
        .find("option")
        // .remove()
        .end();

    var department = departmentByCompanyId(companyId);

    department.then(function (data) {
        for (let i = 0; i < data.length; i++) {
            const department = data[i];
            var opt = document.createElement("option");
            document.getElementById("departmentShow").innerHTML +=
                '<option value="' +
                department["id"] +
                '">' +
                department["departmentName"] +
                "</option>";
        }
    });

    var branch = branchByUnitId(companyId);

    branch.then(function (dataBranch) {
        for (let i = 0; i < dataBranch.length; i++) {
            const branch = dataBranch[i];
            var opt = document.createElement("option");
            document.getElementById("branchShow").innerHTML +=
                '<option value="' +
                branch["id"] +
                '">' +
                branch["branchName"] +
                "</option>";
        }
    });
});

$(document).on("change", "#departmentShow", function () {
    departmentId = $(this).val();
    $("#unitShow")
        .find("option")
        .remove()
        .end()
        .append('<option label="PLEASE CHOOSE" selected="selected"> </option>')
        .val("");

    // $('#branchShow')
    //     .find('option')
    //     .remove()
    //     .end()
    //     .append('<option label="Please Choose" value="" selected="selected"> </option>')
    //     .val('')

    function unitByDepartmentId(departmentId) {
        return $.ajax({
            url: "/unitByDepartmentId/" + departmentId,
        });
    }

    $("#unitShow")
        .find("option")
        // .remove()
        .end();

    var unit = unitByDepartmentId(departmentId);

    unit.then(function (data) {
        // alert('ss');
        for (let i = 0; i < data.length; i++) {
            const unit = data[i];
            var opt = document.createElement("option");
            document.getElementById("unitShow").innerHTML +=
                '<option value="' +
                unit["id"] +
                '">' +
                unit["unitName"] +
                "</option>";
        }
    });
});


