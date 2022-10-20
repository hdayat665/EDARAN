$(document).ready(function() {
    $("#menu2").hide();
    $("#menu3").hide();
    $("#menu4").hide();
    $("#menu5").hide();
    $("#menu6").hide();
    $("#menu7").hide();
    $("#menu9").hide();

    $(document).on('change', "#select1", function() {
        if ($(this).val() == "CustName") {
            $("#menu2").show();
        } else {
            $("#menu2").hide();
        }
    });

    $(document).on('change', "#select1", function() {
        if ($(this).val() == "FinYear") {
            $("#menu3").show();
        } else {
            $("#menu3").hide();
        }
    });
    $(document).on('change', "#select1", function() {
        if ($(this).val() == "AccManager") {
            $("#menu4").show();
        } else {
            $("#menu4").hide();
        }
    });
    $(document).on('change', "#select1", function() {
        if ($(this).val() == "ProjManager") {
            $("#menu5").show();
        } else {
            $("#menu5").hide();
        }
    });
    $(document).on('change', "#select1", function() {
        if ($(this).val() == "Status") {
            $("#menu6").show();
        } else {
            $("#menu6").hide();
        }
    });
    $(document).on('change', "#select1", function() {
        if ($(this).val() == "ProjName") {
            $("#menu7").show();
        } else {
            $("#menu7").hide();
        }
    });
    $(document).on('change', "#select7", function() {
        var customer_id = $(this).val()
        var list_project = getProjectByCustomerId(customer_id)
        list_project.done(function(data) {
            console.log(data)
            if (data.length !== 0) {
                var html = [];
                for (let i = 0; i < data.length; i++) {
                    const option = data[i];
                    console.log(option['id'])
                    html.push("<option value='" + option['id'] + "'>" + option['project_name'] + "</option>")
                }
                document.getElementById("select8").innerHTML = html.join("");
                $("#menu8").show();
            } else {
                $("#menu8").hide();
            }
        })

    });

    function getProjectByCustomerId(id) {
        return $.ajax({
            url: "/getProjectByCustomerId/" + id
        });
    }

    $(document).on('change', "#select1", function() {
        if ($(this).val() == "EmpName") {
            $("#menu9").show();
        } else {
            $("#menu9").hide();
        }
    });
    $(document).on('change', "#select9", function() {
        var department_id = $(this).val()
        var list_employee = getEmployeeByDepartmentId(department_id)
        list_employee.done(function(data) {
            // console.log(data)
            if (data.length !== 0) {
                var html = [];
                for (let i = 0; i < data.length; i++) {
                    const option = data[i];
                    // console.log(option['id'])
                    html.push("<option value='" + option['id'] + "'>" + option['employeeName'] + "</option>")
                }

                document.getElementById("select10").innerHTML = html.join("");
                $("#menu10").show();
            } else {
                $("#menu10").hide();
            }
        })
    });

    function getEmployeeByDepartmentId(id) {
        return $.ajax({
            url: "/getEmployeeByDepartmentId/" + id
        });
    }

    $('#statusAll').DataTable({
        scrollY: 170,
        scrollX: true,
        paging: false,
        dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
        buttons: [
            { extend: 'excel', text: 'Excel', className: 'btn-sm' },

        ],

    });

    $('#customerTable').DataTable({
        scrollY: 170,
        scrollX: true,
        paging: false,
        dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
        buttons: [
            { extend: 'excel', text: 'Excel', className: 'btn-sm' },

        ],

    });

    $('#employeeTable').DataTable({
        scrollY: 170,
        scrollX: true,
        paging: false,
        dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
        buttons: [
            { extend: 'excel', text: 'Excel', className: 'btn-sm' },

        ],

    });

    $('#projectMemberTable').DataTable({
        scrollY: 170,
        scrollX: true,
        paging: false,
        dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
        buttons: [
            { extend: 'excel', text: 'Excel', className: 'btn-sm' },

        ],

    });

    $('#finYearTable').DataTable({
        scrollY: 170,
        scrollX: true,
        paging: false,
        dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
        buttons: [
            { extend: 'excel', text: 'Excel', className: 'btn-sm' },

        ],

    });

    $('#accManagerTable').DataTable({
        scrollY: 170,
        scrollX: true,
        paging: false,
        dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
        buttons: [
            { extend: 'excel', text: 'Excel', className: 'btn-sm' },

        ],

    });

    $('#projManagerTable').DataTable({
        scrollY: 170,
        scrollX: true,
        paging: false,
        dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
        buttons: [
            { extend: 'excel', text: 'Excel', className: 'btn-sm' },

        ],

    });

    $('#statusTable').DataTable({
        scrollY: 170,
        scrollX: true,
        paging: false,
        dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
        buttons: [
            { extend: 'excel', text: 'Excel', className: 'btn-sm' },

        ],

    });




});