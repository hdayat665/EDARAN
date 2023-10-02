$(document).ready(function () {

    $(".statusCheck").on("change", function () {
        var checkbox = $(this);
        var id = checkbox.data("id");
        var name = checkbox.data("name");
        var status;
        var originalState = !checkbox.is(":checked"); // Remember the original state

        if (checkbox.is(":checked")) {
            status = 1;
        } else {
            status = 2;
        }

        var confirmationText = (status === 1) ?
            `Are you sure you want to Activate User ${name} ? They will be able to apply claim!` :
            `Are you sure you want to Deactivate User ${name} ? They will not be able to apply claim!`;

        requirejs(["sweetAlert2"], function (swal) {
            // Confirmation dialog
            swal({
                text: confirmationText,
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                reverseButtons: true
            }).then(function () {
                $.ajax({
                    type: "get",
                    url: "/setting/updatecashAdvance/" + id + "/" + status,
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
            }).catch(function (err) {
                // This is just for handling unexpected errors. Normally, user's cancel action won't throw error.
                console.error("An error occurred:", err);
                checkbox.prop('checked', originalState);
            });
        });
    });





    $("#cashAdvanceTable").DataTable({
        searching: true,
        lengthChange: true,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        responsive: false,
        initComplete: function (settings, json) {
            $("#cashAdvanceTable").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });

});
