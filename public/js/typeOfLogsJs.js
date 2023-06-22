$(document).ready(function () {
    $("#datepicker-joindate").datepicker({
        todayHighlight: true,
        autoclose: true,
    });
    $("#typeOfLogsTable").DataTable({
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        responsive: false,
        searching: true,
        bLengthChange: true,
        initComplete: function (settings, json) {
            $("#typeOfLogsTable").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });
    $("#activityname").DataTable({
        lengthMenu: [5],
        responsive: false,
        searching: false,
        bLengthChange: false,
        initComplete: function (settings, json) {
            $("#activityname").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });
    $("#activitynameedit").DataTable({
        lengthMenu: [5],
        responsive: false,
        searching: false,
        bLengthChange: false,
        initComplete: function (settings, json) {
            $("#activitynameedit").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });

    $(document).on("click", "#addButton", function () {
        $("#addModal").modal("show");
    });

    $(document).on("click", "#editButton", function () {
        var table = $("#editactivityname tbody");
        table.find("tr").each(function (index, row) {
            $(row).remove();
        });
        var id = $(this).data("id");
        var vehicleData = getData(id);

        vehicleData.then(function (data) {
            console.log(data);
            $("#department").val(data.department);
            $("#project").val(data.project_id);
            if (data.project_id) {
                document.getElementById(
                    "addtypeoflogprojectedit"
                ).style.display = "block";
            }
            // $("#addtypeoflogedit").prop("selectedIndex", data.type_of_log);
            $("#addtypeoflogedit").val(data.type_of_log);

            $("#idT").val(data.id);
        });

        $("#testkit").find("tr").remove().end();

        var activity = getActivityNames(id);

        activity.then(function (data) {
            var table = document
                .getElementById("editactivityname")
                .getElementsByTagName("tbody")[0];

            // const cars = ["BMW", "Volvo", "Saab", "Ford", "Fiat", "Audi"];
            for (let i = 0; i < data.length; i++) {
                // console.log(data[i]['activity_name']);
                var row = table.insertRow(-1);
                var l = table.rows.length - 1;
                table.rows[l].insertCell(0);
                table.rows[l].cells[0].innerHTML = data[i]["activity_name"];

                table.rows[l].insertCell(1);
                table.rows[l].cells[1].innerHTML =
                    "<input hidden name='activity_name[]' value='" +
                    data[i]["activity_name"] +
                    "' /><button type='button' class='btnDelete btn btn-danger btn-sm' onclick='delRow(this);' id='btnDelete' size='1' height='1'>Delete</button>";
            }
        });
        $("#editModal").modal("show");
    });

    $(document).on("click", "#listActivityNames", function () {
        var id = $(this).data("id");

        $("#testkit1").find("tr").remove().end();

        var activity = getActivityNames(id);

        activity.then(function (data) {
            var table = document
                .getElementById("listActivityName")
                .getElementsByTagName("tbody")[0];

            for (let i = 0; i < data.length; i++) {
                var row = table.insertRow(-1);
                var l = table.rows.length - 1;
                table.rows[l].insertCell(0);
                table.rows[l].cells[0].innerHTML = i + 1; // Add the number column
                table.rows[l].insertCell(1);
                table.rows[l].cells[1].innerHTML = data[i]["activity_name"];
            }
        });
        $("#listingActivityNames").modal("show");
    });

    $(document).on("click", "#deleteButton", function () {
        id = $(this).data("id");
        requirejs(["sweetAlert2"], function (swal) {
            swal({
                title: "Are you sure to delete Type of Logs?",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
            }).then(function () {
                $.ajax({
                    type: "POST",
                    url: "/deleteTypeOfLogs/" + id,
                    // dataType: "json",
                    data: { _method: "DELETE" },

                    // processData: false,
                    // contentType: false,
                }).then(function (data) {
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
                            location.reload();
                        }
                    });
                });
            });
        });
    });

    function getData(id) {
        return $.ajax({
            url: "/getTypeOfLogsById/" + id,
        });
    }

    $("#saveButton").click(function (e) {
        $("#addForm").validate({
            rules: {
                department: "required",
                type_of_log: "required",
                project_id: "required",
                // activity_name: "required",
            },

            messages: {
                department: "Please Choose Department",
                type_of_log: "Please Choose Type of Logs",
                project_id: "Please Enter Project Name",
                // activity_name: "At Least 1 Activity are required",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(document.getElementById("addForm"));
                    // var data = $('#tree').jstree("get_selected");

                    $.ajax({
                        type: "POST",
                        url: "/createTypeOfLogs",
                        data: data,
                        dataType: "json",

                        processData: false,
                        contentType: false,
                    }).then(function (data) {
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
                                location.reload();
                            }
                        });
                    });
                });
            },
        });
    });

    $("#updateButton").click(function (e) {
        $("#editForm").validate({
            rules: {
                department: "required",
                type_of_log: "required",
                project_id: "required",
                activity_name: "required",
            },

            messages: {
                department: "Please Choose Department",
                type_of_log: "Please Choose Type of Logs",
                project_id: "Please Enter Project Name",
                activity_name: "At Least 1 Activity are required",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("editForm")
                    );
                    // console.log(data);
                    var id = $("#idT").val();

                    $.ajax({
                        type: "POST",
                        url: "/updateTypeOfLogs/" + id,
                        data: data,
                        dataType: "json",

                        processData: false,
                        contentType: false,
                    }).then(function (data) {
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
                                location.reload();
                            }
                        });
                    });
                });
            },
        });
    });

    $(document).on("change", "#addtypeoflog", function () {
        if ($(this).val() == "3") {
            $("#addtypeoflogproject").show();
        } else {
            $("#addtypeoflogproject").hide();
        }
    });
    $(document).on("change", "#addtypeoflogedit", function () {
        if ($(this).val() == "3") {
            $("#addtypeoflogprojectedit").show();
        } else {
            $("#addtypeoflogprojectedit").hide();
        }
    });
});

$("#add-row").click(function () {
    var addtypelogactivityName = document.getElementById(
        "addtypelogactivityName"
    ).value;

    if (addtypelogactivityName == "") {
        document.getElementById("addtypelogactivityName");
        return;
    } else {
        addtypelogactivityName = addtypelogactivityName.toUpperCase();
        let table = document.getElementById("activityname");
        // Insert a row at the end of the table
        let newRow = table.insertRow(-1);
        var l = table.rows.length - 1;
        //Col 1 = addtypelogactivityName
        table.rows[l].insertCell(0);
        table.rows[l].cells[0].innerHTML = addtypelogactivityName;

        //Col 3 = Delete Button
        table.rows[l].insertCell(1);
        table.rows[l].cells[1].innerHTML =
            "<input hidden name='activity_name[]' value='" +
            addtypelogactivityName +
            "' /><button type='button' class='btnDelete btn btn-danger btn-sm' onclick='delRow(this);' id='btnDelete' size='1' height='1'>Delete</button>";

        //Clear input
    }
});

$("#add-for-edit-row").click(function () {
    var addtypelogactivityName = document.getElementById(
        "edittypelogactivityName"
    ).value;

    if (addtypelogactivityName == "") {
        document.getElementById("edittypelogactivityName");
        return;
    } else {
        addtypelogactivityName = addtypelogactivityName.toUpperCase();
        let table = document.getElementById("editactivityname");
        // Insert a row at the end of the table
        let newRow = table.insertRow(-1);
        var l = table.rows.length - 1;
        //Col 1 = addtypelogactivityName
        table.rows[l].insertCell(0);
        table.rows[l].cells[0].innerHTML = addtypelogactivityName;

        //Col 3 = Delete Button
        table.rows[l].insertCell(1);
        table.rows[l].cells[1].innerHTML =
            "<input hidden name='activity_name[]' value='" +
            addtypelogactivityName +
            "' /><button type='button' class='btnDelete btn btn-danger btn-sm' onclick='delRow(this);' id='btnDelete' size='1' height='1'>Delete</button>";

        //Clear input
    }
});

function getActivityNames(id) {
    return $.ajax({
        url: "/getActivityNamesById/" + id,
    });
}

function delRow(btn) {
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
}
