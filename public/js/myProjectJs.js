$(document).ready(function() {

    $("#myProjectTable").DataTable({
        responsive: false,
        lengthMenu: [
            [5,10, 15, 20, -1],
            [5,10, 15, 20, 'All'],
        ],
    });

    $("#myProjectPendingTable").DataTable({
        responsive: false,
        lengthMenu: [
            [5,10, 15, 20, -1],
            [5,10, 15, 20, 'All'],
        ],
    });

    $("#myProjectRejectTable").DataTable({
        responsive: false,
        lengthMenu: [
            [5,10, 15, 20, -1],
            [5,10, 15, 20, 'All'],
        ],
    });

    $(document).on("click", "#cancelProject", function() {
        id = $(this).data('id');
        requirejs(['sweetAlert2'], function(swal) {
            swal({
                title: "Are you sure!",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then(function() {
                $.ajax({
                    type: "POST",
                    url: "/cancelProjectMember/" + id,
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
                        confirmButtonText: 'OK',
                        allowOutsideClick: false,
                        allowEscapeKey: false
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

});