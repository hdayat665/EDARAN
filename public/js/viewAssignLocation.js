$(document).ready(function() {

    $("#data-table-viewassigned").DataTable({
        responsive: true,
        lengthMenu: [5, 10,25,50,All],
    });
    $(document).on("click", "#deleteButton", function() {
        id = $(this).data('id');
        member_id = $(this).data('member-id');
        requirejs(['sweetAlert2'], function(swal) {
            swal({
                title: "Are you sure to delete Assign Location?",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then(function() {
                $.ajax({
                    type: "POST",
                    url: "/deleteAssignLocation/" + id + "/" + member_id,
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