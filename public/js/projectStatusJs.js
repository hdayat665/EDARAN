$(document).ready(function () {
    $("#menu2").hide();
    $("#menu3").hide();
    $("#menu4").hide();
    $("#menu5").hide();
    $("#menu6").hide();
    $("#menu7").hide();
    $("#menu9").hide();

    $(document).on("change", "#select1", function () {
        if ($(this).val() == "CustName") {
            $("#menu2").show();
            $("#select2").prop("required", true);
        } else {
            $("#menu2").hide();
            $("#select2").prop("required", false);
        }
    });

    $(document).on("change", "#select1", function () {
        if ($(this).val() == "FinYear") {
            $("#menu3").show();
            $("#select3").prop("required", true);
        } else {
            $("#menu3").hide();
            $("#select3").prop("required", false);
        }
    });
    $(document).on("change", "#select1", function () {
        if ($(this).val() == "AccManager") {
            $("#menu4").show();
            $("#select4").prop("required", true);
        } else {
            $("#menu4").hide();
            $("#select4").prop("required", false);
        }
    });
    $(document).on("change", "#select1", function () {
        if ($(this).val() == "ProjManager") {
            $("#menu5").show();
            $("#select5").prop("required", true);
        } else {
            $("#menu5").hide();
            $("#select5").prop("required", false);
        }
    });
    $(document).on("change", "#select1", function () {
        if ($(this).val() == "Status") {
            $("#menu6").show();
            $("#select6").prop("required", true);
        } else {
            $("#menu6").hide();
        }
    });
    $(document).on("change", "#select1", function () {
        if ($(this).val() == "ProjName") {
            $("#menu7").show();
            $("#select7").prop("required", true);
        } else {
            $("#menu7").hide();
        }
    });
    $(document).on("change", "#select7", function () {
        $("#select8").prop("required", true);
        var customer_id = $(this).val();
        var list_project = getProjectByCustomerId(customer_id);
        list_project.then(function (data) {
            console.log(data);
            if (data.length !== 0) {
                var html = [];
                html.push("<option value='' selected>PLEASE CHOOSE</option>");
                for (let i = 0; i < data.length; i++) {
                    const option = data[i];
                    console.log(option["id"]);
                    html.push(
                        "<option value='" +
                            option["id"] +
                            "'>" +
                            option["project_code"] +
                            " - " +
                            option["project_name"] +
                            "</option>"
                    );
                }
                document.getElementById("select8").innerHTML = html.join("");
                $("#menu8").show();
            } else {
                $("#menu8").hide();
            }
        });
    });

    function getProjectByCustomerId(id) {
        return $.ajax({
            url: "/projectNameByCustomerId/" + id,
        });
    }

    $(document).on("change", "#select1", function () {
        if ($(this).val() == "EmpName") {
            $("#menu9").show();
            $("#select9").prop("required", true);
        } else {
            $("#menu9").hide();
        }
    });
    $(document).on("change", "#select9", function () {
        var department_id = $(this).val();
        var list_employee = getEmployeeByDepartmentId(department_id);
        list_employee.then(function (data) {
            // console.log(data)
            if (data.length !== 0) {
                var html = [];
                for (let i = 0; i < data.length; i++) {
                    const option = data[i];
                    // console.log(option['id'])
                    html.push(
                        "<option value='" +
                            option["id"] +
                            "'>" +
                            option["employeeName"] +
                            "</option>"
                    );
                }

                document.getElementById("select10").innerHTML = html.join("");
                $("#menu10").show();
            } else {
                $("#menu10").hide();
            }
        });
    });

    function getEmployeeByDepartmentId(id) {
        return $.ajax({
            url: "/getEmployeeByDepartmentId/" + id,
        });
    }

    $("#statusAll").DataTable({
        // scrollY: false,
        scrollX: true,
        paging: true,
        lengthMenu: [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"],
        ],
        buttons: [{ extend: "excel", text: "Excel", className: "btn-sm" }],
        responsive: false,
        dom:
            "<'row'<'col-sm-4'B><'col-sm-4 text-center'l><'col-sm-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-4'i><'col-sm-4 text-center'><'col-sm-4'p>>",
        autoWidth: true,
    });

    $("#customerTable").DataTable({
        // scrollY: false,
        scrollX: true,
        paging: true,
        lengthMenu: [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"],
        ],
        buttons: [{ extend: "excel", text: "Excel", className: "btn-sm" }],
        responsive: false,
        dom:
            "<'row'<'col-sm-4'B><'col-sm-4 text-center'l><'col-sm-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-4'i><'col-sm-4 text-center'><'col-sm-4'p>>",
        autoWidth: true,
    });

    $("#employeeTable").DataTable({
        // scrollY: false,
        scrollX: true,
        paging: true,
        lengthMenu: [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"],
        ],
        buttons: [{ extend: "excel", text: "Excel", className: "btn-sm" }],
        responsive: false,
        dom:
            "<'row'<'col-sm-4'B><'col-sm-4 text-center'l><'col-sm-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-4'i><'col-sm-4 text-center'><'col-sm-4'p>>",
        autoWidth: true,
    });

    $("#projectMemberTable").DataTable({
        // scrollY: 50,
        scrollX: true,
        paging: true,
        lengthMenu: [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"],
        ],
        buttons: [{ extend: "excel", text: "Excel", className: "btn-sm" }],
        responsive: false,
        dom:
            "<'row'<'col-sm-4'B><'col-sm-4 text-center'l><'col-sm-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-4'i><'col-sm-4 text-center'><'col-sm-4'p>>",
        autoWidth: true,
    });

    $("#finYearTable").DataTable({
        // scrollY: 50,
        scrollX: true,
        paging: true,
        lengthMenu: [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"],
        ],

        buttons: [{ extend: "excel", text: "Excel", className: "btn-sm" }],
        responsive: false,
        dom:
            "<'row'<'col-sm-4'B><'col-sm-4 text-center'l><'col-sm-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-4'i><'col-sm-4 text-center'><'col-sm-4'p>>",
        autoWidth: true,
    });

    $("#accManagerTable").DataTable({
        // scrollY: 50,
        scrollX: true,
        paging: true,
        lengthMenu: [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"],
        ],
        buttons: [{ extend: "excel", text: "Excel", className: "btn-sm" }],
        responsive: false,
        dom:
            "<'row'<'col-sm-4'B><'col-sm-4 text-center'l><'col-sm-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-4'i><'col-sm-4 text-center'><'col-sm-4'p>>",
        autoWidth: true,
    });

    $("#projManagerTable").DataTable({
        // scrollY: 50,
        scrollX: true,
        paging: true,
        lengthMenu: [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"],
        ],
        buttons: [{ extend: "excel", text: "Excel", className: "btn-sm" }],
        responsive: false,
        dom:
            "<'row'<'col-sm-4'B><'col-sm-4 text-center'l><'col-sm-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-4'i><'col-sm-4 text-center'><'col-sm-4'p>>",
        autoWidth: true,
    });

    $("#statusTable").DataTable({
        // scrollY: 50,
        scrollX: true,
        paging: true,
        lengthMenu: [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"],
        ],
        buttons: [{ extend: "excel", text: "Excel", className: "btn-sm" }],
        responsive: false,
        dom:
            "<'row'<'col-sm-4'B><'col-sm-4 text-center'l><'col-sm-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-4'i><'col-sm-4 text-center'><'col-sm-4'p>>",
        autoWidth: true,
    });

    // $(document).on('change', "#select7", function() {
    //     customerId = $(this).val();

    //     $('#select8')
    //         .find('option')
    //         .remove()
    //         .end()
    //         .append('<option label="Please Choose" value="" selected="selected"> </option>')
    //         .val('')

    //     function projectNameByCustomerId(customerId) {
    //         return $.ajax({
    //             url: "/projectNameByCustomerId/" + customerId
    //         });
    //     }

    //     // $('#unitShow')
    //     //     .find('option')
    //     //     // .remove()
    //     //     .end();

    //     var project = projectNameByCustomerId(customerId);

    //     project.then(function(data) {
    //         for (let i = 0; i < data.length; i++) {
    //             const project = data[i];
    //             var opt = document.createElement("option");
    //             document.getElementById("select8").innerHTML +=
    //                 '<option value="' + project['id'] + '">' + project['project_name'] + "</option>";
    //         }
    //     })
    // });
});
