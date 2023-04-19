$(document).ready(function () {
    $("#tableactive").dataTable({
        "searching": true,
        "lengthChange": true,
        "paging": true,
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        "dom": '<"row"<"col-sm-4"l><"col-sm-4 text-center"B><"col-sm-4"f>>t<"row"<"col-sm-12"ip>>',
        "buttons": [
            { extend: 'excel', className: 'btn-blue', exportOptions: {
                columns: [2,3,4,5,6,7]
            }},
            { extend: 'pdf', className: 'btn-blue',  exportOptions: {
                columns: [2,3,4,5,6,7]
            }},
            { extend: 'print', className: 'btn-blue',  exportOptions: {
                columns: [2,3,4,5,6,7]
            }},
        ],
        initComplete: function (settings, json) {  
            $("#activetable").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
        },
        columnDefs: [
                  { orderable: false, targets: [0] }
               ]
    });

    $("#tableprocess").dataTable({
        "searching": true,
        "lengthChange": true,
        "paging": true,
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        "dom": '<"row"<"col-sm-4"l><"col-sm-4 text-center"B><"col-sm-4"f>>t<"row"<"col-sm-12"ip>>',
        "buttons": [
            { extend: 'excel', className: 'btn-blue', exportOptions: {
                columns: [2,3,4,5,6,7]
            }},
            { extend: 'pdf', className: 'btn-blue',  exportOptions: {
                columns: [2,3,4,5,6,7]
            }},
            { extend: 'print', className: 'btn-blue',  exportOptions: {
                columns: [2,3,4,5,6,7]
            }},
        ],
        initComplete: function (settings, json) {  
            $("#activetable").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
        },
        columnDefs: [
                  { orderable: false, targets: [0] }
               ]
    });

    $("#tablepaid").dataTable({
        "searching": true,
        "lengthChange": true,
        "paging": true,
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        "dom": '<"row"<"col-sm-4"l><"col-sm-4 text-center"B><"col-sm-4"f>>t<"row"<"col-sm-12"ip>>',
        "buttons": [
            { extend: 'excel', className: 'btn-blue', exportOptions: {
                columns: [2,3,4,5,6,7]
            }},
            { extend: 'pdf', className: 'btn-blue',  exportOptions: {
                columns: [2,3,4,5,6,7]
            }},
            { extend: 'print', className: 'btn-blue',  exportOptions: {
                columns: [2,3,4,5,6,7]
            }},
        ],
        initComplete: function (settings, json) {  
            $("#activetable").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
        },
        columnDefs: [
                  { orderable: false, targets: [0] }
               ]
    });

    $("#tablerejected").dataTable({
        "searching": true,
        "lengthChange": true,
        "paging": true,
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        "dom": '<"row"<"col-sm-4"l><"col-sm-4 text-center"B><"col-sm-4"f>>t<"row"<"col-sm-12"ip>>',
        "buttons": [
            { extend: 'excel', className: 'btn-blue', exportOptions: {
                columns: [2,3,4,5,6,7]
            }},
            { extend: 'pdf', className: 'btn-blue',  exportOptions: {
                columns: [2,3,4,5,6,7]
            }},
            { extend: 'print', className: 'btn-blue',  exportOptions: {
                columns: [2,3,4,5,6,7]
            }},
        ],
        initComplete: function (settings, json) {  
            $("#activetable").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
        },
        columnDefs: [
                  { orderable: false, targets: [0] }
               ]
    });

    $("#tableclosed").dataTable({
        "searching": true,
        "lengthChange": true,
        "paging": true,
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        "dom": '<"row"<"col-sm-4"l><"col-sm-4 text-center"B><"col-sm-4"f>>t<"row"<"col-sm-12"ip>>',
        "buttons": [
            { extend: 'excel', className: 'btn-blue', exportOptions: {
                columns: [2,3,4,5,6,7]
            }},
            { extend: 'pdf', className: 'btn-blue',  exportOptions: {
                columns: [2,3,4,5,6,7]
            }},
            { extend: 'print', className: 'btn-blue',  exportOptions: {
                columns: [2,3,4,5,6,7]
            }},
        ],
        initComplete: function (settings, json) {  
            $("#activetable").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
        },
        columnDefs: [
                  { orderable: false, targets: [0] }
               ]
    });
    
    $("#filter").click(function () {
        $("#filteronoff").toggle();
    });

    $(
        "#rejectButton1, #rejectButton2, #rejectButton3, #rejectButton4, #rejectButton5"
    ).on("click", function () {
        id = $(this).data("id");

        $("#rejectId").val(id);
        $("#modalreject").modal("show");
    });

    $(
        "#approveButton, #approveButton1, #approveButton2, #approveButton3, #approveButton4, #approveButton5"
    ).on("click", function () {
        // alert("ss");
        var id = $(this).data("id");
        var stage = "f_recommender";
        var status = "recommend";

        requirejs(["sweetAlert2"], function (swal) {
            $.ajax({
                type: "POST",
                url:
                    "/updateStatusCashAdvance/" +
                    id +
                    "/" +
                    status +
                    "/" +
                    stage,
                async: false,
                processData: false,
                contentType: false,
            }).done(function (data) {
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
        // updating checked attribute of change event occurred element, this.checked returns current state
        // $(".wrapper").val($(".container").html());
        // updating the value of textarea
    });

    $("#rejectButton").on("click", function () {
        // alert("ss");
        var id = $("#rejectId").val();
        var stage = "f_recommender";
        var status = "reject";
        $("#rejectForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("rejectForm")
                    );
                    $.ajax({
                        type: "POST",
                        url:
                            "/updateStatusCashAdvance/" +
                            id +
                            "/" +
                            status +
                            "/" +
                            stage,
                        data: data,
                        async: false,
                        processData: false,
                        contentType: false,
                    }).done(function (data) {
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
        // updating checked attribute of change event occurred element, this.checked returns current state
        // $(".wrapper").val($(".container").html());
        // updating the value of textarea
    });

    // personal
    $(document).on("click", "#btn-view", function () {
        var id = $(this).data("id");

        var vehicleData = getPersonalById(id);

        vehicleData.done(function (data) {
            console.log(data);
            $("#created_At").val(data.applied_date);
            $("#claim_category").val(data.claim_category);
            $("#amount").val(data.amount);
            $("#desc").val(data.desc);
            $("#file_upload").val(data.file_upload);
        });
        $("#modal-view").modal("show");
    });

    function getTravelById(id) {
        return $.ajax({
            url: "/getTravelById/" + id,
        });
    }
});
