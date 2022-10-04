$(document).ready(function() {

    $("#datepicker-joindate").datepicker({
        todayHighlight: true,
        autoclose: true,
    });

    $('#activityname').DataTable({
        lengthMenu: [5],
        responsive: false,
        "searching": false,
        "bLengthChange": false
    });
    $('#activitynameedit').DataTable({
        lengthMenu: [5],
        responsive: false,
        "searching": false,
        "bLengthChange": false
    });

    $(document).on("click", "#addButton", function() {
        $('#addModal').modal('show');

    });

    $(document).on("click", "#editButton", function() {
        var id = $(this).data('id');
        var vehicleData = getData(id);

        vehicleData.done(function(data) {
            console.log(data);
            $('#department').val(data.department);
            $('#project').val(data.project_id);
            if (data.project_id) {
                document.getElementById('addtypeoflogprojectedit').style.display = 'block';
            }
            // $("#addtypeoflogedit").prop("selectedIndex", data.type_of_log);
            $("#addtypeoflogedit").val(data.type_of_log);

            $('#idT').val(data.id);
        })
        $('#editModal').modal('show');

    });

    $(document).on("click", "#deleteButton", function() {
        id = $(this).data('id');
        requirejs(['sweetAlert2'], function(swal) {
            swal({
                title: "Are you sure!",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
            }).then(function() {
                $.ajax({
                    type: "DELETE",
                    url: "/deleteTypeOfLogs/" + id,
                    dataType: "json",
                    async: false,
                    processData: false,
                    contentType: false,
                }).done(function(data) {
                    swal({
                        title: data.title,
                        text: data.msg,
                        type: data.type,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then(function() {
                        if (data.type == 'error') {

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
            url: "/getLogsById/" + id
        });
    }

    $('#saveButton').click(function(e) {
        $("#addForm").validate({
            rules: {
                department: "required",
                type_of_log: "required",
                // project_id: "required",
                activity_name: "required",
                // financial_year: "required",
                // LOA_date: "required",
                // contract_start_date: "required",
                // contract_end_date: "required",
                // acc_manager: "required",
                // bank_guarantee_amount: "required",
            },

            messages: {
                department: "",
                type_of_log: "",
                // project_id: "",
                activity_name: "",
            },
            submitHandler: function(form) {
                requirejs(['sweetAlert2'], function(swal) {

                    var data = new FormData(document.getElementById("addForm"));
                    // var data = $('#tree').jstree("get_selected");

                    $.ajax({
                        type: "POST",
                        url: "/createTypeOfLogs",
                        data: data,
                        dataType: "json",
                        async: false,
                        processData: false,
                        contentType: false,
                    }).done(function(data) {
                        swal({
                            title: data.title,
                            text: data.msg,
                            type: data.type,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                        }).then(function() {
                            if (data.type == 'error') {

                            } else {
                                location.reload();
                            }


                        });
                    });

                });
            },
        });
    });


    $('#updateButton').click(function(e) {
        $("#editForm").validate({
            rules: {
                department: "required",
                type_of_log: "required",
                activity_name: "required",
            },

            messages: {
                department: "",
                type_of_log: "",
                activity_name: "",
            },
            submitHandler: function(form) {
                requirejs(['sweetAlert2'], function(swal) {

                    var data = new FormData(document.getElementById("editForm"));
                    // console.log(data);
                    var id = $('#idT').val();

                    $.ajax({
                        type: "POST",
                        url: "/updateTypeOfLogs/" + id,
                        data: data,
                        dataType: "json",
                        async: false,
                        processData: false,
                        contentType: false,
                    }).done(function(data) {
                        swal({
                            title: data.title,
                            text: data.msg,
                            type: data.type,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                        }).then(function() {
                            if (data.type == 'error') {

                            } else {
                                location.reload();
                            }

                        });
                    });

                });
            },
        });
    });

    $(document).on('change', "#addtypeoflog", function() {
        if ($(this).val() == "Project") {
            $("#addtypeoflogproject").show();
        } else {
            $("#addtypeoflogproject").hide();


        }
    });
    $(document).on('change', "#addtypeoflogedit", function() {
        if ($(this).val() == "Project") {
            $("#addtypeoflogprojectedit").show();
        } else {
            $("#addtypeoflogprojectedit").hide();


        }
    });

});


$("#add-row").click(function() {

    var addtypelogactivityName = document.getElementById('addtypelogactivityName').value;

    if (addtypelogactivityName == "") {
        document.getElementById('addtypelogactivityName');
        return;
    } else {

        let table = document.getElementById('activityname');
        // Insert a row at the end of the table
        let newRow = table.insertRow(-1);
        var l = table.rows.length - 1;
        //Col 1 = addtypelogactivityName
        table.rows[l].insertCell(0);
        table.rows[l].cells[0].innerHTML = addtypelogactivityName;

        //Col 3 = Delete Button
        table.rows[l].insertCell(1);
        table.rows[l].cells[1].innerHTML = "<input hidden name='activity_name[]' value='" + addtypelogactivityName + "' /><button type='button' class='btnDelete btn btn-danger btn-sm' onclick='delRow(this);' id='btnDelete' size='1' height='1'>Delete</button>";

        //Clear input


    }
});

function delRow(btn) {
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
}