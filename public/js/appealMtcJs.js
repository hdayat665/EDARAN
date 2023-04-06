$(document).ready(function() {
   
    $("#appealTable").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        initComplete: function (settings, json) {  
            $("#appealTable").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
        },
    });

    $("#historyTable").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        initComplete: function (settings, json) {  
            $("#historyTable").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");            
        },
    });

    $('.approveButton').click(function(e) {
        var id = $(this).data("id");
        //console.log(id);
        requirejs(['sweetAlert2'], function(swal) {
            $.ajax({
                type: "POST",
                url: "/approveAppealMtc/"+ id,
                async: false,
                processData: false,
                contentType: false,
            }).done(function(data) {
                swal({
                    title: data.title,
                    text: data.msg,
                    type: data.type,
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                }).then(function() {
                    if (data.type == 'error') {

                    } else {
                        location.reload();
                    }


                });
            });

        });
    });
    $('.rejectButton').click(function(e) {
        var id = $(this).data("id");
        //console.log(id);
        requirejs(['sweetAlert2'], function(swal) {
            $.ajax({
                type: "POST",
                url: "/rejectAppealMtc/"+ id,
                async: false,
                processData: false,
                contentType: false,
            }).done(function(data) {
                swal({
                    title: data.title,
                    text: data.msg,
                    type: data.type,
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
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