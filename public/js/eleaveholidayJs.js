$(document).ready(function () {
    $(document).ready(function () {
        $("#tabletype").dataTable({
            responsive: false,
            bLengthChange: false,
            bFilter: true,
        });
    });

    $("#datepickerstart").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy-mm-dd",
    });

    $("#datepickerend").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy-mm-dd",
    });

    //
    $("#udatepickerstart").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy-mm-dd",
    });

    $("#udatepickerend").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy-mm-dd",
    });

    $("#saveButton").click(function (e) {
        $("#addForm").validate({
            // Specify validation rules
            rules: {
                holiday_title: "required",
                start_date: "required",
                end_date: "required",
            },

            messages: {
                holiday_title: "Please Insert Holiday Title",
                start_date: "Please Insert start date",
                end_date: "Please Insert end date",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(document.getElementById("addForm"));
                    console.log(document.getElementById("addForm"));
                    // return false;

                    // var data = $('#tree').jstree("get_selected");

                    $.ajax({
                        type: "POST",
                        url: "/createholidaylist",
                        data: data,
                        dataType: "json",
                        async: false,
                        processData: false,
                        contentType: false,
                    }).done(function (data) {
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

        var holidayData = geteleaveholiday(id);

        console.log(holidayData);

        holidayData.done(function (data) {
            $("#holidaytitle").val(data.holiday_title);
            $("#udatepickerstart").val(data.start_date);
            $("#udatepickerend").val(data.end_date);
            $("#idholiday").val(data.id);

            if (data.annual_date == "1") {
                $("#uradioyes").prop("checked", true);
            } else {
                $("#uradiono").prop("checked", true);
            }
        });
    });

    function geteleaveholiday(id) {
        return $.ajax({
            url: "/getcreateLeaveholiday/" + id,
        });
    }

    $("#updateButton").click(function (e) {
        $("#updateForm").validate({
            // Specify validation rules
            rules: {
                holidaytitle: "required",
                start_date: "required",
                enddate: "required",
            },

            messages: {
                holidaytitle: "Please Insert holiday title",
                start_date: "Please Insert start date",
                enddate: "Please Insert end date",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("updateForm")
                    );
                    var id = $("#idholiday").val();
                    console.log(id);
                    // return false;

                    $.ajax({
                        type: "POST",
                        url: "/updateLeaveholiday/" + id,
                        data: data,
                        dataType: "json",
                        async: false,
                        processData: false,
                        contentType: false,
                    }).done(function (data) {
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
                title: "Are you sure to delete holiday?",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
            }).then(function () {
                $.ajax({
                    type: "POST",
                    url: "/deleteLeaveholiday/" + id,
                    // dataType: "json",
                    data: { _method: "DELETE" },
                    // async: false,
                    // processData: false,
                    // contentType: false,
                }).done(function (data) {
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
                url: "/updateStatusleaveholiday/" + id + "/" + status,
                async: false,
                processData: false,
                contentType: false,
            }).done(function (data) {
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

    $("#tableholiday").DataTable({
        searching: true,
        lengthChange: true,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        responsive: false,
    });
});
