


$(document).on('change', "#companyForEmployment", function() {
    companyId = $(this).val();
    $('#departmentShow')
    .find('option')
    .remove()
    .end()
    .append('<option label="Please Choose" value="" selected="selected"> </option>')
    .val('')

    $('#unitShow')
    .find('option')
    .remove()
    .end()
    .append('<option label="Please Choose" value="" selected="selected"> </option>')
    .val('')

    $('#branchShow')
    .find('option')
    .remove()
    .end()
    .append('<option label="Please Choose" value="" selected="selected"> </option>')
    .val('')

    function departmentByCompanyId(companyId) {
        return $.ajax({
            url: "/departmentByCompanyId/" + companyId
        });
    }

    $('#departmentShow')
        .find('option')
        // .remove()
        .end();

    var department = departmentByCompanyId(companyId);

    department.done(function(data) {
        // alert('ss');
       
        
        for (let i = 0; i < data.length; i++) {
            const department = data[i];
            var opt = document.createElement("option");
            document.getElementById("departmentShow").innerHTML +=
                '<option value="' + department['id'] + '">' + department['departmentName'] + "</option>";
        }
    })
});

$(document).on('change', "#departmentShow", function() {
    departmentId = $(this).val();
    $('#unitShow')
    .find('option')
    .remove()
    .end()
    .append('<option label="Please Choose" selected="selected"> </option>')
    .val('')

    $('#branchShow')
    .find('option')
    .remove()
    .end()
    .append('<option label="Please Choose" value="" selected="selected"> </option>')
    .val('')
    
    function unitByDepartmentId(departmentId) {
        return $.ajax({
            url: "/unitByDepartmentId/" + departmentId
        });
    }

    // $('#unitHide').hide();
    // $('#unitShow').show();

    $('#unitShow')
        .find('option')
        // .remove()
        .end();

    var unit = unitByDepartmentId(departmentId);

    unit.done(function(data) {
        // alert('ss');
        for (let i = 0; i < data.length; i++) {
            const unit = data[i];
            var opt = document.createElement("option");
            document.getElementById("unitShow").innerHTML +=
                '<option value="' + unit['id'] + '">' + unit['unitName'] + "</option>";
        }
    })
});

$(document).on('change', "#unitShow", function() {
    unitId = $(this).val();
    $('#branchShow')
    .find('option')
    .remove()
    .end()
    .append('<option label="Please Choose" selected="selected"> </option>')
    .val('')

    function branchByUnitId(unitId) {
        return $.ajax({
            url: "/branchByUnitId/" + unitId
        });
    }

    // $('#branchHide').hide();
    // $('#branchShow').show();

    $('#branchShow')
        .find('option')
        // .remove()
        .end();

    var branch = branchByUnitId(unitId);

    branch.done(function(data) {
        // alert('ss');
        for (let i = 0; i < data.length; i++) {
            const branch = data[i];
            var opt = document.createElement("option");
            document.getElementById("branchShow").innerHTML +=
                '<option value="' + branch['id'] + '">' + branch['branchName'] + "</option>";
        }
    })
});