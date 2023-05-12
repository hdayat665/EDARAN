$(document).ready(function () {
    $(document).ready(function () {
        $("#tabletype").dataTable({
            responsive: false,
            bLengthChange: false,
            bFilter: true,
        });
    });

    // Membuat variabel untuk input pertama
    const input3 = document.getElementById("duration");

    // Membuat fungsi untuk memvalidasi input pertama
    function validateInput3(event) {
        const regex = /[^0-9]/gi; // Regular expression untuk mencocokkan karakter selain angka
        input3.value = input3.value.replace(regex, ""); // Menghapus karakter selain angka
    }

    // Menambahkan event listener ke input pertama
    input3.addEventListener("input", validateInput3);



    // Membuat variabel untuk input pertama
    const input1 = document.getElementById("allowrequest");

    // Membuat fungsi untuk memvalidasi input pertama
    function validateInput1(event) {
        const regex = /[^0-9]/gi; // Regular expression untuk mencocokkan karakter selain angka
        input1.value = input1.value.replace(regex, ""); // Menghapus karakter selain angka
    }

    // Menambahkan event listener ke input pertama
    input1.addEventListener("input", validateInput1);

    // Membuat variabel untuk input kedua
    const input2 = document.getElementById("uallowrequest");

    // Membuat fungsi untuk memvalidasi input kedua
    function validateInput2(event) {
        const regex = /[^0-9]/gi; // Regular expression untuk mencocokkan karakter selain angka
        input2.value = input2.value.replace(regex, ""); // Menghapus karakter selain angka
    }

    // Menambahkan event listener ke input kedua
    input2.addEventListener("input", validateInput2);

    // enable/disable allow request
    document.getElementById("checkallowrequest").onchange = function () {
        document.getElementById("allowrequest").disabled = !this.checked;
    };
    // enable/disable allow request
    document.getElementById("ucheckallowrequest").onchange = function () {
        document.getElementById("uallowrequest").disabled = !this.checked;
    };

    $("#saveButton").click(function (e) {
        $("#addForm").validate({
            // Specify validation rules
            rules: {
                leave_types_code: "required",
                leave_types: "required",
                duration: "required",
            },

            messages: {
                leave_type_codes: "Please Select Leave Type Code",
                leave_types: "Please Insert Leave Type",
                duration: "Please Insert Duration",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(document.getElementById("addForm"));
                    $.ajax({
                        type: "POST",
                        url: "/createtypes",
                        data: data,
                        dataType: "json",

                        processData: false,
                        contentType: false,
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
                });
            },
        });
    });

    $(document).on("click", "#editButton", function () {
        var id = $(this).data("id");

        var typesData = geteleavetypes(id);

        typesData.then(function (data) {
            $("#leavetypescode").val(data.leave_types_code);
            $("#leavetypes").val(data.leave_types);
            $("#idtypes").val(data.id);
            $("#uallowrequest").val(data.day);
            $("#uallowrequest").prop("disabled", false);
        });
    });

    function geteleavetypes(id) {
        return $.ajax({
            url: "/getcreateLeavetypes/" + id,
        });
    }

    $("#updateButton").click(function (e) {
        $("#updateForm").validate({
            // Specify validation rules
            rules: {
                leavetypescode: "required",
                leavetypes: "required",
            },

            messages: {
                leavetypescode: "Please Insert Leave Types Code",
                leavetypes: "Please Insert Leave Types",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("updateForm")
                    );
                    var id = $("#idtypes").val();
                    console.log(id);
                    // return false;

                    $.ajax({
                        type: "POST",
                        url: "/updateLeaveleavetypes/" + id,
                        data: data,
                        dataType: "json",

                        processData: false,
                        contentType: false,
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
                });
            },
        });
    });

    $(document).on("click", "#deleteButton", function () {
        id = $(this).data("id");
        requirejs(["sweetAlert2"], function (swal) {
            swal({
                title: "Are you sure to delete Leave Types?",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
            }).then(function () {
                $.ajax({
                    type: "POST",
                    url: "/deleteLeavetypes/" + id,
                    // dataType: "json",
                    data: { _method: "DELETE" },

                    // processData: false,
                    // contentType: false,
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
            });
        });
    });

    $(".statusCheck").on("change", function () {
        var id = $(this).data("id");
        var status;

        if ($(this).is(":checked")) {
            status = 1;
        } else {
            status = 2;
        }

        console.log(status);
        requirejs(["sweetAlert2"], function (swal) {
            $.ajax({
                type: "get",
                url: "/updateStatusleavetypes/" + id + "/" + status,

                processData: false,
                contentType: false,
            }).then(function (data) {
                swal({
                    title: data.title,
                    text: data.msg,
                    type: data.type,
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK",
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

    $("#tabletypes").DataTable({
        searching: true,
        lengthChange: true,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        responsive: false,
    });
});
