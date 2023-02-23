$(document).ready(function() {

    $('#data-table-default')
        .dataTable({
            "responsive": true,
            "bLengthChange": false,
            "bFilter": true,
        });

        function Previous() {
            window.history.back()
        }

    $("#datepicker-joindate").datepicker({
        todayHighlight: true,
        autoclose: true,
    });

    $(document).on("click", "#addVehicleView", function() {
        $('input').prop('disabled', false);
        $('select').prop('disabled', false);
        $('#add-vehicle').modal('show');

    });

    $(document).on("click", "#editVehicleView", function() {
        var id = $(this).data('id');
        var vehicleData = getVehicle(id);
        $('input').prop('disabled', false);
        $('select').prop('disabled', false);
        // $('#vehicleType').val('');

        vehicleData.done(function(data) {
            $('input').val('');

            vdata = data.data;
            $('#vehicleType').val(vdata.vehicle_type);
            $('#idV').val(vdata.id);
            // var select = document.getElementById('vehicleType');

            // const options = Array.from(select.options);
            // options.forEach((option, i) => {
            //     if (option.value === vdata.vehicle_type) select.selectedIndex = i;
            // });
            $('#plateNo').val(vdata.plate_no);
        })
        $('#edit-vehicle').modal('show');

    });

    $(document).on("click", "#viewVehicleView", function() {
        var id = $(this).data('id');
        var vehicleData = getVehicle(id);
        $('input').prop('disabled', true);
        $('select').prop('disabled', true);

        vehicleData.done(function(data) {
            $('input').val('');
            vdata = data.data;
            $('#vehicleType1').prop('selectedIndex', vdata.vehicle_type);
            $('#plateNo1').val(vdata.plate_no);
        })
        $('#view-vehicle').modal('show');

    });

    $('#deleteVehicle').click(function(e) {
        id = $(this).data('id');
        requirejs(['sweetAlert2'], function(swal) {
            swal({
                title: "Are you sure to delete Vehicle?",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then(function() {
                $.ajax({
                    type: "POST",
                    url: "/deleteVehicle/" + id,
                    // dataType: "json",
                    data: { _method: "DELETE" },
                    // async: false,
                    // processData: false,
                    // contentType: false,
                    
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

    function getVehicle(id) {
        return $.ajax({
            url: "/getVehicleById/" + id
        });
    }


    $('#addVehicleView').click(function(e) {
        $("#addVehicleForm").validate({
            // Specify validation rules
            rules: {
                // vehicle_type: "required",
                plate_no: "required",
                vehicle_type: "required"
            },

            messages: {
                // vehicle_type: "required",
                plate_no: "Please insert plate No",
                vehicle_type: "Please insert vehicle type"
            },
            submitHandler: function(form) {
        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("addVehicleForm"));

            $.ajax({
                type: "POST",
                url: "/addVehicle",
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
                    confirmButtonText: 'OK',
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
            }
        });
    });

    $('#updateVehicle').click(function(e) {
        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("updateVehicleForm"));

            $.ajax({
                type: "POST",
                url: "/updateVehicle",
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
                    confirmButtonText: 'OK',
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