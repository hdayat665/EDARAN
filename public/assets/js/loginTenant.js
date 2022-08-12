$(document).ready(function() {
    $('#submit').click(function() {
        if ($("#submitForm").valid()) {} else {
            return;
        }

        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("submitForm"));

            $.ajax({
                type: "POST",
                url: "/api/ajaxLoginTenant",
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
                        window.location.href = '/home'

                    }


                });
            });
        })
    })
})
