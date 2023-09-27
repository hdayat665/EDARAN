$(document).ready(function () {

    var checkLeaveEntitlement = checkLeaveEntitlement();

    function checkLeaveEntitlement() {
        return $.ajax({
            url: "/checkLeaveEntitlement",
        });
    }

    checkLeaveEntitlement.then(function (data) {
        requirejs(["sweetAlert2"], function (swal) {
            if (data) {
                $("#hideButton").hide();
                $("#hideButton1").hide();
                swal({
                    title: data.title,
                    text: data.msg,
                    type: data.type,
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                }).then(function () {
                    if (data.type === "error") {
                        // Lakukan sesuatu jika jenis data adalah 'error'
                    } else {
                        location.reload();
                    }
                });
            } else {
                // Lakukan sesuatu jika data tidak tersedia
                $("#hideButton").show();
                $("#hideButton1").show();
            }
        });
    });

    $(document).ready(function() {

        var originalGetComputedStyle = window.getComputedStyle;

        window.getComputedStyle = function(el, pseudo) {
            try {
                return originalGetComputedStyle(el, pseudo);
            } catch (err) {
                console.warn('getComputedStyle override: prevented error.', err);
                return {
                    getPropertyValue: function() { return ""; } // metode palsu
                };
            }
        };
        $(".test").hide();
        $(document).on("click", ".dropdown-toggle", function(e) {
            e.stopPropagation(); // mencegah event dari bubbling ke atas

            var dropdownMenu = $(this).closest(".btn-group").find(".test");

            $(".test").not(dropdownMenu).hide();
            dropdownMenu.toggle();
        });

        $(document).on("click", function(e) {
            if (!$(".btn-group").is(e.target) && $(".btn-group").has(e.target).length === 0) {
                $(".test").hide();
            }
        });
    });

    const fileInput = document.getElementById("fileupload");
    fileInput.addEventListener("change", validateFile);
    function validateFile() {
        const fileSize = fileInput.files[0].size / 1024 / 1024; // ukuran file dalam MB
        if (fileSize > 5) {
            alert("File size exceeds the maximum limit of 5 M");
            fileInput.value = ""; // reset input file
        }
    }

    var hash = location.hash.replace(/^#/, ""); // ^ means starting, meaning only match the first hash
    if (hash) {
        $('.nav-tabs a[href="#' + hash + '"]').tab("show");
    }

    $(".nav-tabs a").on("shown.bs.tab", function (e) {
        window.location.hash = e.target.hash;
    });

    $("#table-leave").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        initComplete: function (settings, json) {
            $("#table-leave").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });

    $("#tableleavedua").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        initComplete: function (settings, json) {
            $("#tableleavedua").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });

    var getNoPayLeave = getNoPayLeave();

    function getNoPayLeave() {
        return $.ajax({
            url: "/totalNoPaidLeave",
        });
    }

    getNoPayLeave.then(function (data) {
        $("#totalNoPaidLeave").text("Total Days for No Paid Leave: " + (data.totalNoPay || 0) + " Days");

    });

    var getEarnedLeave = getEarnedLeave();

    function getEarnedLeave() {
        return $.ajax({
            url: "/getEarnedLeave",
        });
    }

    getEarnedLeave.then(function (data) {
        $("#EarnedLeave").text("Earned Leave to Date: " + data + " Days");

    });

    var getLapseLeave = getLapseLeave();

    function getLapseLeave() {
        return $.ajax({
            url: "/getLapseLeave",
        });
    }

    getLapseLeave.then(function (data) {
        console.log(data);
        $("#LapseLeave").text("Lapsed: " + (data[0] ? data[0] + " Days" : "0 Days"));
        $("#yearLeave").text("Leave Carried Foward " + data[1] + "");
        $("#LapseLeaveDate").text("Lapsed Date: " + (data[2] ? data[2] : "Data not available"));
    });

    var mypie1 = mypie1();

    function mypie1() {
        return $.ajax({
            url: "/getpieleave",
        });
    }

    mypie1.then(function (datapie) {
        Chart.defaults.color = "rgba(" + app.color.componentColorRgb + ", .65)";
        Chart.defaults.font.family = app.font.family;
        Chart.defaults.font.weight = 500;
        Chart.defaults.scale.grid.color =
            "rgba(" + app.color.componentColorRgb + ", .15)";
        Chart.defaults.scale.ticks.backdropColor =
            "rgba(" + app.color.componentColorRgb + ", 0)";

        var ctx5 = document.getElementById("myChart").getContext("2d");

        var total_token = datapie[0].current_entitlement - datapie[0].current_entitlement_balance;
        var total_balance = datapie[0].current_entitlement_balance - datapie[1].total_pending;
        var pending = datapie[1].total_pending === null ? 0 : datapie[1].total_pending;

        window.myPie = new Chart(ctx5, {
            type: "pie",
            data: {
                labels: ["Total Balance: " + total_balance, "Pending / Pending Approved: " + pending, "Total Token: " + total_token],
                datasets: [
                    {
                        data: [total_balance, pending, total_token],
                        backgroundColor: [
                            "rgba(52, 143, 226)",
                            "rgb(255, 128, 128)",
                            "rgba(73, 182, 214)",
                        ],
                        borderColor: [
                            app.color.red,
                            app.color.orange,
                            app.color.gray500,
                            app.color.gray300,
                            app.color.gray900,
                        ],
                        borderWidth: 1,
                    },
                ],
            },
            options: {
                responsive: true,
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                var label = context.label || "";
                                return label;
                            },
                        },
                    },
                },
            },
        });

    });

    var mypie2 = mypie2();

    function mypie2() {
        return $.ajax({
            url: "/getpieleave2",
        });
    }

    mypie2.then(function (datapie2) {

        Chart.defaults.color = "rgba(" + app.color.componentColorRgb + ", .65)";
        Chart.defaults.font.family = app.font.family;
        Chart.defaults.font.weight = 500;
        Chart.defaults.scale.grid.color =
            "rgba(" + app.color.componentColorRgb + ", .15)";
        Chart.defaults.scale.ticks.backdropColor =
            "rgba(" + app.color.componentColorRgb + ", 0)";

        var ctx5 = document.getElementById("myChart2").getContext("2d");

        var total_token = datapie2[0].carry_forward - datapie2[0].carry_forward_balance;
        var total_balance = datapie2[0].carry_forward_balance - datapie2[1].total_pending;
        var pending = datapie2[1].total_pending === null ? 0 : datapie2[1].total_pending;

        // Determine whether to display the pie chart with 0 values
        var displayChart = datapie2[0].carry_forward == 0 && datapie2[0].carry_forward_balance == 0;

        var dataValues = [];
        var backgroundColors = [];
        var labels = [];

        if (displayChart) {
             // Display the pie chart with blue color when no carry forward
             dataValues.push(0, 0, 1);  // Set total_balance and pending to 0
             backgroundColors.push("rgba(200, 200, 200)", "rgba(200, 200, 200)", "rgba(200, 200, 200)"); // Blue color and light gray
             labels.push("Total Balance: 0", "Pending / Pending Approved: 0", "Total Token: 0");

        } else {
            dataValues.push(total_balance, pending, total_token);
            backgroundColors.push("rgba(52, 143, 226)", "rgb(255, 128, 128)", "rgba(73, 182, 214)");
            labels.push("Total Balance: " + total_balance, "Pending / Pending Approved: " + pending, "Total Token: " + total_token);
        }

        window.myPie = new Chart(ctx5, {
            type: "pie",
            data: {
                labels: labels,
                datasets: [
                    {
                        data: dataValues,
                        backgroundColor: backgroundColors,
                        borderColor: [
                            app.color.red,
                            app.color.orange,
                            app.color.gray500,
                            app.color.gray300,
                            app.color.gray900,
                        ],
                        borderWidth: 1,
                    },
                ],
            },
            options: {
                responsive: true,
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                var label = context.label || "";
                                return label;
                            },
                        },
                    },
                },
            },
        });
    });

    $("#datepicker-applied")
        .datepicker({
            todayHighlight: true,
            autoclose: true,
            format: "yyyy-mm-dd",
        })
        .datepicker("setDate", new Date());

    $("#datepicker-applied").on("show", function (e) {
            e.preventDefault();
            e.stopPropagation();
            return false;
        }).on("click", function (e) {
            $(this).datepicker("hide");
        });


    var dt = new Date();
    document.getElementById("datepicker-filter").innerHTML = dt;

    $("#datepicker-leave").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy-mm-dd",
    });

    $("#datepicker-filter").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy-mm-dd",
    });

    $("#datepicker-filtermy").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy-mm-dd",
    });

    $("#datepicker-start").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy-mm-dd",
    });

    $("#datepicker-end").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy-mm-dd",
    });

    $(document).ready(function () {
        $("#menu5").hide();
        $("#menu6").hide();
        $("#menu7").hide();
        $("#menu8").hide();
        $("#hideavaible").hide();
        $("#menusick").hide();

    });

    $(document).on("change", "#select3", function () {
        if ($(this).val() == "1") {
            $("#menu5").show();
            $("#menu6").hide();
            $("#menu7").hide();
            $("#menu8").hide();
            $("#select4").val(1);
            $("#datepicker-start").val("");
            $("#datepicker-end").val("");
            $("#flexRadioDefault1").val("");
            $("#flexRadioDefault2").val("");
        } else if ($(this).val() == "0.5") {
            $("#menu5").show();
            $("#menu6").show();
            $("#menu7").hide();
            $("#menu8").hide();
            $("#select4").val(0.5);
            $("#datepicker-start").val("");
            $("#datepicker-end").val("");
        } else if ($(this).val() == "-") {
            $("#menu5").hide();
            $("#menu6").hide();
            $("#menu7").show();
            $("#menu8").show();
            $("#start-date").val("");
            $("#end-date").val("");
            $("#datepicker-leave").val("");
            $("#select4").val("");
            $("#flexRadioDefault1").val("");
            $("#flexRadioDefault2").val("");
        } else {
            $("#menu5").hide();
            $("#menu6").hide();
        }
    });

    $(document).on("change", "#datepicker-leave", function () {
        var startDate = $("#datepicker-leave").val();

        if (startDate) {
            checktsrdate(startDate).then(function (data) {
                if (data && data.title) {
                    requirejs(["sweetAlert2"], function (swal) {
                        swal({
                            title: data.title,
                            text: data.msg,
                            type: data.type,
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "OK",
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                        }).then(function () {
                            if (data.type === "error") {
                                // Handle error
                            } else {
                                location.reload();
                            }
                        });
                    });
                }
            });
        }

        function checktsrdate(date) {
            return $.ajax({
                url: "/checkTSRLeave/" + date,
            });
        }
    });


    $(document).on("change", "#datepicker-start, #datepicker-end", function () {

        var startDate = $("#datepicker-start").val();
        var endDate = $("#datepicker-end").val();
        var date = startDate + "," + endDate;

        if (startDate && endDate) {
            checktsrdateSecond(date).then(function (data) {
                if (data && data.title) {
                    requirejs(["sweetAlert2"], function (swal) {
                        swal({
                            title: data.title,
                            text: data.msg,
                            type: data.type,
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "OK",
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                        }).then(function () {
                            if (data.type === "error") {
                                // Handle error
                            } else {
                                location.reload();
                            }
                        });
                    });
                }
            });
        }

        function checktsrdateSecond(date) {
            return $.ajax({
                url: "/checkTSRLeaveSecond/" + date,
            });
        }

    });

    $(document).on("change", "#datepicker-start, #datepicker-end", function () {

        var startDate = $("#datepicker-start").val();
        var endDate = $("#datepicker-end").val();
        var totalDays = "";
        var date = startDate + "," + endDate;

        if (startDate.trim() === "") {
            $("#datepicker-end").val("");
        }

        if (startDate && endDate) {

            var holidayPromise = holidayPromisex(date);

            function holidayPromisex(date) {
                return $.ajax({
                    url: "/myholiday/" + date,
                });
            }

            holidayPromise.done(function (dataA) {

                requirejs(["sweetAlert2"], function (swal) {
                    if (dataA.type === "error") {
                        swal({
                            title: dataA.title,
                            text: dataA.msg,
                            type: dataA.type,
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "OK",
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                        }).then(function () {
                            if (dataA.type === "error") {
                                // Lakukan sesuatu jika jenis data adalah 'error'
                                $("#datepicker-end").val("");
                                $("#select4").val("");
                            } else {

                            }
                        });
                    } else {

                        var total_holiday = dataA[0];
                        var getweekend = dataA[1];
                        var date1 = new Date(startDate);
                        var date2 = new Date(endDate);
                        var timeDiff = date2.getTime() - date1.getTime();
                        var dayDiff = Math.ceil(timeDiff / (1000 * 3600 * 24));

                        var weekends = 0;
                        for (var i = 0; i <= dayDiff; i++) {
                            var currentDate = new Date(date1.getTime() + (i * 24 * 60 * 60 * 1000));
                            var isWeekend = false;
                            for (var j = 0; j < getweekend.length; j++) {
                                if (parseInt(getweekend[j].day_of_week) === currentDate.getDay() && getweekend[j].total_time === null) {
                                    isWeekend = true;
                                    break;
                                }
                            }
                            if (isWeekend) {
                                weekends++;
                            }
                        }
                        console.log(total_holiday);
                        totalDays = dayDiff + 1 - weekends - total_holiday;

                        if (totalDays <= 0) {
                            $("#datepicker-end").val("");
                            $("#select4").val("");
                        } else {
                            $("#select4").val(totalDays);
                        }
                    }
                });


            });
        }
    });

    $(document).ready(function () {
        function updateFilterVisibility() {
            if (
                $("#datepicker-filter").val() ||
                $("#typelist").val() ||
                $("#status_searching").val()
            ) {
                $("#filterleave").show();
            } else {
                $("#filterleave").hide();
            }
        }

        updateFilterVisibility();

        $("#filter").click(function () {
            $("#filterleave").toggle();
        });

        $("#reset").on("click", function (e) {
            e.preventDefault();
            $("#datepicker-filter").val($("#atepicker-filter").data("default-value"));
            $("#typelist").val($("#typelist").data("default-value"));
            $("#status_searching").val($("#status_searching").data("default-value"));
            $("#filterleave").show();
        });
    });

    $(document).ready(function () {
        function updateFilterVisibility() {
            if (
                $("#datepicker-filtermy").val() ||
                $("#typelistmy").val() ||
                $("#status_searchingmy").val()
            ) {
                $("#filterleavemy").show();
            } else {
                $("#filterleavemy").hide();
            }
        }

        updateFilterVisibility(); // Memanggil fungsi pada masa pemuatan laman

        $("#filtermy").click(function () {
            $("#filterleavemy").toggle();
        });

        $("#reset").on("click", function (e) {
            e.preventDefault(); // Menghentikan aksi asal (misalnya, penghantaran borang)

            $("#datepicker-filtermy").val($("#datepicker-filtermy").data("default-value"));
            $("#typelistmy").val($("#typelistmy").data("default-value"));
            $("#status_searchingmy").val($("#status_searchingmy").data("default-value"));

            $("#filterleavemy").show(); // Memastikan #filterleave tetap terbuka selepas "reset" ditekan
        });
    });




    $("#saveButton").click(function (e) {
        $("#addForm").validate({
            // Specify validation rules
            rules: {
                applied_date: "required",
                typeofleave: "required",
                noofday: "required",
                leave_date: "required",
                start_date: "required",
                end_date: "required",
                reason: "required",
                flexRadioDefault: "required",
                fileuploadsick: "required",
            },

            messages: {
                applied_date: "Please Insert Applied Date Title",
                typeofleave: "Please Select Type of Leave",
                noofday: "Please Select No of Day(s) Applied",
                reason: "Please Insert Reason",
                leave_date: "Please Insert leave date",
                start_date: "Please Insert Start Date",
                end_date: "Please Insert End Date",
                flexRadioDefault: "Please select morning or evening",
                fileuploadsick: "Please insert document or medical certificate (MC)",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(document.getElementById("addForm"));

                    $.ajax({
                        type: "POST",
                        url: "/createtmyleave",
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
        var myleaveData = myleave(id);

        myleaveData.then(function (data) {
            $("#datepicker-applied1").val(data[0].applied_date);
            $("#typeofleave1").val(data[0].lt_type_id);
            $("#totalapply1").val(data[0].total_day_applied);
            $("#datepicker-leave1").val(data[0].leave_date);
            $("#datepicker-start1").val(data[0].start_date);
            $("#datepicker-end1").val(data[0].end_date);
            $("#reason1").val(data[0].reason);
            $("#reasonreject1").val(data[0].reason);
            if (data[0].day_applied == 1) {
                $("#dayApplied1").val("ONE DAY");
            } else if (data[0].day_applied == 0.5) {
                $("#dayApplied1").val("Half Day");
            } else {
                $("#dayApplied1").val(data[0].day_applied + " Day");
            }

            if (data[0].day_applied === "1") {
                $("#menu01").show();
                $("#menu02").hide();
                $("#menu03").hide();
            } else if (data[0].day_applied === "0.5") {
                $("#menu01").show();
                $("#menu02").show();
                $("#menu03").hide();
            } else {
                $("#menu01").hide();
                $("#menu02").hide();
                $("#menu03").show();
            }

            if (data[0].username1) {
                $("#recommended_by").text(data[0].username1);
                $("#hiderec2").hide();
                $("#hiderec1").show();
            } else {
                $("#recommended_by").text("");
                $("#hiderec1").hide();
                $("#hiderec2").show();
            }

            if (data[0].username2) {
                $("#approved_by").text(data[0].username2);
                $("#approved_by1").text(data[0].username2);
            } else {
                $("#approved_by").text("");
            }

            if (data[0].leave_session === "1") {
                $("#flexRadioDefaulta").prop("checked", true);
            } else if (data[0].leave_session === "2") {
                $("#flexRadioDefaultb").prop("checked", true);
            } else {
                $("#flexRadioDefaulta").prop("checked", false);
                $("#flexRadioDefaultb").prop("checked", false);
            }

            if (data[0].up_rec_status === "1") {
                $("#status_1").text("PENDING");
                $("#hidenull1").show();
                $("#hidenull2").show();
                $(".hidenull3").show();
            } else if (data[0].up_rec_status === "2") {
                $("#status_1").text("PENDING");
                $("#hidenull1").show();
                $("#hidenull2").show();
                $(".hidenull3").show();
            } else if (data[0].up_rec_status === "3") {
                $("#status_1").text("REJECTED");
                $("#hidenull1").hide();
                $("#hidenull2").hide();
                $(".hidenull3").hide();
            } else if (data[0].up_rec_status === "4") {
                $("#status_1").text("APPROVED");
                $("#hidenull1").show();
                $("#hidenull2").show();
                $(".hidenull3").show();
            }

            if (data[0].up_app_status === "1") {
                $("#status_2").text("PENDING");
                $("#status_21").text("PENDING");
            } else if (data[0].up_app_status === "2") {
                $("#status_2").text("PENDING");
                $("#status_21").text("PENDING");
            } else if (data[0].up_app_status === "3") {
                $("#status_2").text("REJECTED");
                $("#status_21").text("REJECTED");
            } else if (data[0].up_app_status === "4") {
                $("#status_2").text("APPROVED");
                $("#status_21").text("APPROVED");
            }

            if (data[0].up_rec_reason) {
                $("#reasonRecommender").text(data[0].up_rec_reason);
                $("#reasonRecommender1").text(data[0].up_rec_reason);
                $("#hideRec").show();
            } else {
                $("#reasonRecommender").text("");
                $("#reasonRecommender1").text("");
                $("#hideRec").hide();
                $("#hideApprPending").hide();
            }

            if (data[0].up_app_reason) {
                $("#reasonApprover").text(data[0].up_app_reason);
                $("#reasonApprover1").text(data[0].up_app_reason);
                $("#hideAppr").show();
                $("#hideApprPending").show();
                $("#viewmenu021").show();
            } else {
                $("#reasonApprover").text("");
                $("#reasonApprover1").text("");
                $("#hideAppr").hide();
                $("#hideApprPending").hide();
                $("#viewmenu021").hide();
            }

            if (data[0].file_document) {

                var filename = data[0].file_document.split("/").pop();
                $("#fileDownloadPolicya").html(
                    '<a href="/storage/' +
                    data[0].file_document +
                    '" target="_blank">View: ' +
                    filename +
                    '</a>'
                );

            } else {
                $("#fileDownloadPolicya").html("No File Upload");
            }
        });
    });

    function myleave(id) {
        return $.ajax({
            url: "/getcreatemyleave/" + id,
        });
    }
    $(document).on("click", "#editButton2", function () {
        var id = $(this).data("id");
        var myleaveData = myleave(id);

        myleaveData.then(function (data) {
            $("#datafullname2").val(data[0].username);
            $("#datepicker-applied2").val(data[0].applied_date);
            $("#typeofleave2").val(data[0].lt_type_id);
            // $("#dayApplied2").val(data[0].day_applied);
            $("#totalapply2").val(data[0].total_day_applied);
            $("#datepicker-leave2").val(data[0].leave_date);
            $("#datepicker-start2").val(data[0].start_date);
            $("#datepicker-end2").val(data[0].end_date);
            $("#reason2").val(data[0].reason);
            $("#reasonreject2").val(data[0].reason);
            if (data[0].day_applied == 1) {
                $("#dayApplied2").val("ONE DAY");
            } else if (data[0].day_applied == 0.5) {
                $("#dayApplied2").val("HALF DAY");
            } else {
                $("#dayApplied2").val(data[0].day_applied + " DAY");
            }

            if (data[0].day_applied === "1") {
                $("#menu10").show();
                $("#menu20").hide();
                $("#menu30").hide();
            } else if (data[0].day_applied === "0.5") {
                $("#menu10").show();
                $("#menu20").show();
                $("#menu30").hide();
            } else {
                $("#menu10").hide();
                $("#menu20").hide();
                $("#menu30").show();
            }

            if (data[0].username1) {
                $("#recommended_byh").text(data[0].username1);
                $("#hiderec2h").hide();
                $("#hiderec1h").show();
            } else {
                $("#recommended_byh").text("");
                $("#hiderec1h").hide();
                $("#hiderec2h").show();
            }

            if (data[0].username2) {
                $("#approved_byh").text(data[0].username2);
                $("#approved_by1h").text(data[0].username2);
            } else {
                $("#approved_byh").text("");
            }

            if (data[0].leave_session === "1") {
                $("#flexRadioDefaulta2").prop("checked", true);
            } else if (data[0].leave_session === "2") {
                $("#flexRadioDefaultb2").prop("checked", true);
            } else {
                $("#flexRadioDefaulta2").prop("checked", false);
                $("#flexRadioDefaultb2").prop("checked", false);
            }

            if (data[0].up_rec_status === "1") {
                $("#status_1h").text("PENDING");
                $("#hidenull1h").show();
                $("#hidenull2h").show();
                $(".hidenull3h").show();
            } else if (data[0].up_rec_status === "2") {
                $("#status_1h").text("PENDING");
                $("#hidenull1h").show();
                $("#hidenull2h").show();
                $(".hidenull3h").show();
            } else if (data[0].up_rec_status === "3") {
                $("#status_1h").text("REJECTED");
                $("#hidenull1h").hide();
                $("#hidenull2h").hide();
                $(".hidenull3h").hide();
            } else if (data[0].up_rec_status === "4") {
                $("#status_1h").text("APPROVED");
                $("#hidenull1h").show();
                $("#hidenull2h").show();
                $(".hidenull3h").show();
            }

            if (data[0].up_app_status === "1") {
                $("#status_2h").text("PENDING");
                $("#status_21h").text("PENDING");
            } else if (data[0].up_app_status === "2") {
                $("#status_2h").text("PENDING");
                $("#status_2h").text("PENDING");
            } else if (data[0].up_app_status === "3") {
                $("#status_2h").text("REJECTED");
                $("#status_21h").text("REJECTED");
            } else if (data[0].up_app_status === "4") {
                $("#status_2h").text("APPROVED");
                $("#status_21h").text("APPROVED");
            }
            if (data[0].up_rec_reason) {
                $("#reasonRecommenderh").text(data[0].up_rec_reason);
                $("#reasonRecommender1h").text(data[0].up_rec_reason);
                $("#hideRech").show();
            } else {
                $("#reasonRecommenderh").text("");
                $("#reasonRecommender1h").text("");
                $("#hideRech").hide();
                $("#hideApprPendingh").hide();
            }

            if (data[0].up_app_reason) {
                $("#reasonApproverh").text(data[0].up_app_reason);
                $("#reasonApprover1h").text(data[0].up_app_reason);
                $("#hideApprh").show();
                $("#hideApprPendingh").show();
                $("#viewmenu021h").show();
            } else {
                $("#reasonApproverh").text("");
                $("#reasonApprover1h").text("");
                $("#hideApprh").hide();
                $("#hideApprPendingh").hide();
                $("#viewmenu021h").hide();
            }

            if (data[0].file_document) {

                var filename = data[0].file_document.split("/").pop();
                $("#fileDownloadPolicya2").html(
                    '<a href="/storage/' +
                    data[0].file_document +
                    '" target="_blank">View: ' +
                    filename +
                    '</a>'
                );
            } else {
                $("#fileDownloadPolicya2").html("No File Upload");
            }
        });
    });

    function myleave(id) {
        return $.ajax({
            url: "/getusermyleave/" + id,
        });
    }

    $(document).on("click", "#deleteButton", function () {
        id = $(this).data("id");
        requirejs(["sweetAlert2"], function (swal) {
            swal({
                title: "Are you sure!",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
            }).then(function () {
                $.ajax({
                    type: "POST",
                    url: "/deletemyleave/" + id,
                    data: { _method: "DELETE" },
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

    $(document).on("click", "#editButton2", function () {
        var id = $(this).data("id");
        var myleavethree = myleavesv(id);

        myleavethree.then(function (data) {
            $("#datafullname").val(data[0].fullName);
            $("#applieddate").val(data[0].applied_date);
            $("#type1").val(data[0].type);
            $("#startdate").val(data[0].start_date);
            $("#enddate").val(data[0].end_date);
            $("#totaldayapplied").val(data[0].total_day_applied);
            $("#reason1").val(data[0].reason);

            if (data[0].day_applied == 1) {
                $("#dayApplied").val("ONE DAY");
            } else if (data[0].day_applied == 0.5) {
                $("#dayApplied").val("HALF DAY");
            } else {
                $("#dayApplied").val(data[0].day_applied + " DAY");
            }

            if (data.leave_session == "1") {
                $("#flexRadioDefault1").prop("checked", true);
            } else if (data.leave_session == "2") {
                $("#flexRadioDefault2").prop("checked", true);
            } else {
                $("#flexRadioDefault1").prop("checked", false);
                $("#flexRadioDefault2").prop("checked", false);
            }

            if (data.status === 1) {
                $("#status_display").text($("#status_1").text());
            } else if (data.status === 2) {
                $("#status_display").text($("#status_2").text());
            } else {
                $("#status_display").text("Invalid status");
            }
        });
    });

    function myleavesv(id) {
        return $.ajax({
            url: "/getusermyleave/" + id,
        });
    }

    $(document).on("change", "#typeofleavehidden", function () {
        var checktype = $("#typeofleavehidden").val();
        var checktype1 = $("#type_sick").val();
        if(checktype == 2  &&  checktype1 == 2){
            $("#hideavaible").show();
            $("#menusick").show();
            $("#menu9").hide();
        }else{
            $("#hideavaible").hide();
            $("#menu9").show();
            $("#menusick").hide();
            $("#radio1").val("");
            $("#radio2").val("");
        }
    });

    Surrender_Cancellation
});
