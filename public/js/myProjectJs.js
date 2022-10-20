$(document).ready(function() {

    $("#myProjectTable").DataTable({
        responsive: true,
        lengthMenu: [5, 10, 15],
    });

    $("#myProjectPendingTable").DataTable({
        responsive: true,
        lengthMenu: [5, 10, 15],
    });

    $("#myProjectRejectTable").DataTable({
        responsive: true,
        lengthMenu: [5, 10, 15],
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

});