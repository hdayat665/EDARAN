$(document).ready(function() {
    requirejs(["sweetAlert2"], function(swal) {
        $('[data-toggle="tooltip"]').tooltip();

        if ($(".alertMessage").length > 0) {
            var title = $(".alertMessage").attr("data-title");
            var type = $(".alertMessage").attr("data-type");
            var content = $(".alertMessage").attr("data-content");
            swal({
                title: title,
                text: content,
                type: type,
                showConfirmButton: true,
                confirmButtonClass: "btn-default",
                allowOutsideClick: true,
            });
        }
    })
})