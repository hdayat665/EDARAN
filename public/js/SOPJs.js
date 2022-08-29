$(document).ready(function() {

    $("#datepicker-joindate").datepicker({
        todayHighlight: true,
        autoclose: true,
    });

    $("#table").DataTable({
        responsive: true,
    });

    $(document).on("click", "#addButton1", function() {
        $('#addModal1').modal('show');

    });

    $(document).on("click", "#editButton1", function() {
        alert('ss');
        var id = $(this).data('id');
        var vehicleData = getPolicy(id);

        vehicleData.done(function(data) {
            console.log(data);
            $('#policy').val(data.policy);
            $('#desc').val(data.desc);
            $('#code').val(data.code);
            $('#idP').val(data.id);
        })
        $('#editModal1').modal('show');

    });

    $('#deleteButton1').click(function(e) {
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
                    type: "DELETE",
                    url: "/deletePolicy/" + id,
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

    function getPolicy(id) {
        return $.ajax({
            url: "/getPolicyById/" + id
        });
    }


    $('#saveButton1').click(function(e) {
        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("addForm1"));
            // var data = $('#tree').jstree("get_selected");

            $.ajax({
                type: "POST",
                url: "/createPolicy",
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
                        location.reload();
                    }


                });
            });

        });
    });

    $('#updateButton1').click(function(e) {
        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("editForm1"));
            var id = $('#idP').val();

            $.ajax({
                type: "POST",
                url: "/updatePolicy/" + id,
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
                        location.reload();
                    }


                });
            });

        });
    });

    //////////////////////////////////SOP//////////////////////////////////////

    $(document).on("click", "#addButton2", function() {
        $('#addModal2').modal('show');

    });

    $(document).on("click", "#editButton2", function() {
        var id = $(this).data('id');
        var vehicleData = getSOP(id);

        vehicleData.done(function(data) {
            console.log(data);
            $('#SOPName').val(data.SOPName);
            $('#desc').val(data.desc);
            $('#SOPName').val(data.SOPName);
            $('#idS').val(data.id);
        })
        $('#editModal2').modal('show');

    });

    $('#deleteButton2').click(function(e) {
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
                    type: "DELETE",
                    url: "/deleteSOP/" + id,
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

    function getSOP(id) {
        return $.ajax({
            url: "/getSOPById/" + id
        });
    }


    $('#saveButton2').click(function(e) {
        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("addForm2"));
            // var data = $('#tree').jstree("get_selected");

            $.ajax({
                type: "POST",
                url: "/createSOP",
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
                        location.reload();
                    }


                });
            });

        });
    });

    $('#updateButton2').click(function(e) {
        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("editForm2"));
            var id = $('#idS').val();

            $.ajax({
                type: "POST",
                url: "/updateSOP/" + id,
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
                        location.reload();
                    }


                });
            });

        });
    });



});