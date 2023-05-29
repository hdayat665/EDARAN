$(document).ready(function () {

    var hash = location.hash.replace(/^#/, ""); // ^ means starting, meaning only match the first hash
    if (hash) {
        $('.nav-tabs a[href="#' + hash + '"]').tab("show");
    }
    $(".nav-tabs a").on("shown.bs.tab", function (e) {
        window.location.hash = e.target.hash;
    });



    const inputs = document.querySelectorAll("[id^='permenant']");

    // Membuat fungsi untuk memvalidasi input
    function validateInput(event) {
        const regex = /[^0-9]/gi; // Regular expression untuk mencocokkan karakter selain angka
        this.value = this.value.replace(regex, ""); // Menghapus karakter selain angka
    }

    // Menambahkan event listener ke semua elemen input
    inputs.forEach(function(input) {
        input.addEventListener("input", validateInput);
    });

    const inputsick = document.querySelectorAll("[id^='sickpermenant']");

    // Membuat fungsi untuk memvalidasi inputs
    function validateInput(event) {
        const regex = /[^0-9]/gi; // Regular expression untuk mencocokkan karakter selain angka
        this.value = this.value.replace(regex, ""); // Menghapus karakter selain angka
    }

    // Menambahkan event listener ke semua elemen input
    inputsick.forEach(function(input) {
        input.addEventListener("input", validateInput);
    });

    const inputcarry = document.querySelectorAll("[id^='carryforward']");

    // Membuat fungsi untuk memvalidasi inputs
    function validateInput(event) {
        const regex = /[^0-9]/gi; // Regular expression untuk mencocokkan karakter selain angka
        this.value = this.value.replace(regex, ""); // Menghapus karakter selain angka
    }

    // Menambahkan event listener ke semua elemen input
    inputcarry.forEach(function(input) {
        input.addEventListener("input", validateInput);
    });

    inputcarry.forEach(function(input) {

        var id = input.id; // Mengambil ID dari elemen input
        var index = id.split("_")[1]; // Mengambil angka indeks dari ID

        // Membuat ID untuk elemen datepicker dengan mengganti "carryforward" menjadi "datecarryforward"
        var datepickerId = "datecarryforward_" + index;

        // Menginisialisasi datepicker untuk elemen dengan ID dinamis "datecarryforward"
        $("#" + datepickerId).datepicker({
          todayHighlight: true,
          autoclose: true,
          format: "yyyy-mm-dd"
        });
    });


    $("#tableannual").DataTable({
        searching: true,
        lengthChange: true,
        lengthMenu: [
            [5,10, 25, 50, -1],
            [5,10, 25, 50, "All"],
        ],
        responsive: false,
    });

    $("#tablesick").DataTable({
        searching: true,
        lengthChange: true,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        responsive: false,
    });

    $("#tablecarryforward").DataTable({
        searching: true,
        lengthChange: true,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        responsive: false,
    });

    $("#saveAnualLeave").click(function (e) {
        $("#updateAnualLeave").validate({
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("updateAnualLeave")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/updateAnualLeave/",
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
                                location.hash = "default-tab-1";
                                location.reload();
                            }
                        });
                    });
                });
            },
        });
    });

    $("#saveSickLeave").click(function (e) {
        $("#updateSickLeave").validate({
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("updateSickLeave")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/updateSickLeave/",
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
                                location.hash = "default-tab-2";
                                location.reload();
                            }
                        });
                    });
                });
            },
        });
    });

    $("#saveCarryForword").click(function (e) {
        $("#updateCarryForward").validate({
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("updateCarryForward")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/updateCarryForward/",
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
                                location.hash = "default-tab-3";
                                location.reload();
                            }
                        });
                    });
                });
            },
        });
    });

});
