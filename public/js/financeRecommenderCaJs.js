$(document).ready(function () {
    $("#tableactive").dataTable({
        // "responsive": true,
        bLengthChange: false,
        bFilter: false,
        initComplete: function (settings, json) {  
            $("#tableactive").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
        },
    });

    $("#tableprocess").dataTable({
        // "responsive": true,
        bLengthChange: false,
        bFilter: false,
        initComplete: function (settings, json) {  
            $("#tableprocess").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
        },
    });

    $("#tablepaid").dataTable({
        // "responsive": true,
        bLengthChange: false,
        bFilter: false,
        initComplete: function (settings, json) {  
            $("#tablepaid").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
        },
    });

    $("#tablerejected").dataTable({
        // "responsive": true,
        bLengthChange: false,
        bFilter: false,
        initComplete: function (settings, json) {  
            $("#tablerejected").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
          },
        });

    $("#tableclosed").dataTable({
        // "responsive": true,
        bLengthChange: false,
        bFilter: false,
        initComplete: function (settings, json) {  
            $("#tableclosed").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
          },
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
