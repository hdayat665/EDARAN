$(document).ready(function () {

    const input3 = document.getElementById("CurrentEntitlementBalance");

    // Membuat fungsi untuk memvalidasi input pertama
    function validateInput3(event) {
        const regex = /[^0-9]/gi; // Regular expression untuk mencocokkan karakter selain angka
        input3.value = input3.value.replace(regex, ""); // Menghapus karakter selain angka
    }

    // Menambahkan event listener ke input pertama
    input3.addEventListener("input", validateInput3);

    const input1 = document.getElementById("SickLeaveEntitlementBalance");

    // Membuat fungsi untuk memvalidasi input pertama
    function validateInput1(event) {
        const regex = /[^0-9]/gi; // Regular expression untuk mencocokkan karakter selain angka
        input1.value = input1.value.replace(regex, ""); // Menghapus karakter selain angka
    }

    // Menambahkan event listener ke input pertama
    input1.addEventListener("input", validateInput1);

    const input2 = document.getElementById("CurrentForwardBalance");

    // Membuat fungsi untuk memvalidasi input pertama
    function validateInput2(event) {
        const regex = /[^0-9]/gi; // Regular expression untuk mencocokkan karakter selain angka
        input2.value = input2.value.replace(regex, ""); // Menghapus karakter selain angka
    }

    // Menambahkan event listener ke input pertama
    input2.addEventListener("input", validateInput2);



    var hash = location.hash.replace(/^#/, ""); // ^ means starting, meaning only match the first hash
    if (hash) {
        $('.nav-tabs a[href="#' + hash + '"]').tab("show");
    }
    $(".nav-tabs a").on("shown.bs.tab", function (e) {
        window.location.hash = e.target.hash;
    });


    $(document).ready(function () {
        $("#tableeleave").dataTable({
            responsive: false,
            bLengthChange: false,
            bFilter: true,
            // scrollX: true,
            initComplete: function (settings, json) {
                $("#tableeleave").wrap(
                    "<div style='overflow:auto; width:100%;position:relative;'></div>"
                );
            },
        });
    });

    $("#datepickerlapse").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy-mm-dd",
    });
    $("#LapsedDate").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy-mm-dd",
    });
    $("#Lapsed").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy-mm-dd",
    });

    $(document).on("click", "#addButton", function () {
        $("#addModal").modal("show");
    });

    $("#saveButton").click(function (e) {
        $("#addForm").validate({
            // Specify validation rules
            rules: {
                generatedate: "required",
            },

            messages: {
                generatedate: "Please Insert Generate date",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(document.getElementById("addForm"));
                    console.log(document.getElementById("addForm"));
                    // return false;

                    // var data = $('#tree').jstree("get_selected");

                    $.ajax({
                        type: "POST",
                        url: "/createLeaveEntitlement",
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

        var vehicleData = geteleaveEntitlement(id);

        vehicleData.then(function (data) {
            $("#nameEmployer").val(data.fullname);
            $("#department").val(data.departmentName);
            $("#CurrentEntitlement").val(data.current_entitlement);
            $("#CurrentEntitlementBalance").val(
                data.current_entitlement_balance
            );
            $("#SickLeaveEntitlement").val(data.sick_leave_entitlement);
            $("#SickLeaveEntitlementBalance").val(
                data.sick_leave_entitlement_balance
            );
            $("#CarryForward").val(data.carry_forward);
            $("#CurrentForwardBalance").val(data.carry_forward_balance);
            $("#LapsedDate").val(data.lapsed_date);
            $("#Lapsed").val(data.lapse);
            $("#idleave").val(data.id);
        });
    });

    function geteleaveEntitlement(id) {
        return $.ajax({
            url: "/getcreateLeaveEntitlement/" + id,
        });
    }

    $("#updateButton").click(function (e) {
        $("#updateForm").validate({
            // Specify validation rules
            rules: {
                // companyCode: "required",
                // companyName: "required",
            },

            messages: {
                // companyCode: "Please Insert Company Code",
                // companyName: "Please Insert Company Name",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("updateForm")
                    );
                    var id = $("#idleave").val();
                    console.log(id);
                    // return false;

                    $.ajax({
                        type: "POST",
                        url: "/updateleaveEntitlement/" + id,
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

    $("#tableentitlement").DataTable({
        searching: true,
        lengthChange: true,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        responsive: false,
        initComplete: function (settings, json) {
            $("#tableentitlement").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });

    $("#tableentitlementcurrent").DataTable({
        searching: true,
        lengthChange: true,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        responsive: false,
        initComplete: function (settings, json) {
            $("#tableentitlementcurrent").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });

    $("#tableannual").DataTable({
        searching: true,
        lengthChange: true,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        responsive: false,
        initComplete: function (settings, json) {
            $("#tableannual").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });
    $("#tablesick").DataTable({
        searching: true,
        lengthChange: true,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        responsive: false,
        initComplete: function (settings, json) {
            $("#tablesick").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });
    $("#tablecarrforward").DataTable({
        searching: true,
        lengthChange: true,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        responsive: false,
        initComplete: function (settings, json) {
            $("#tablecarrforward").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });

    $("#approveAllButton").click(function (e) {
        requirejs(["sweetAlert2"], function (swal) {
            var data = new FormData(document.getElementById("approveAllForm"));

            $.ajax({
                type: "POST",
                url: "/leaveEntitlementSelect",
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
                }).then(function () {
                    if (data.type == "error") {
                    } else {
                        location.reload();
                    }
                });
            });
        });
    });

    $(document).ready(function() {
        // When the checkall checkbox is clicked
        $('#checkall').click(function() {
            // Check or uncheck all the individual checkboxes based on the state of checkall
            $('input[name^="employer["][type="checkbox"]').prop('checked', this.checked);
        });
    });

});
