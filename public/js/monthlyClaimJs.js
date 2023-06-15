$("document").ready(function () {
    $(document).on("click", "#travelBtn", function () {
        $("#travelModal").modal("show");
    });
    $(document).on("click", "#subsBtn", function () {
        $("#subsModal").modal("show");
    });
    $("#type_transport").change(function () {
        var selectedOption = $("#type_transport").val();
        if (selectedOption == "Personal Car") {
            $("#first_km").val($("#first_km").data("firstkmcar"));
            $("#first_price").val($("#first_price").data("firstpricecar"));
            $("#second_km").val($("#second_km").data("secondkmcar"));
            $("#second_price").val($("#second_price").data("secondpricecar"));
            $("#third_km").val($("#third_km").data("thirdkmcar"));
            $("#third_price").val($("#third_price").data("thirdpricecar"));
        } else if (selectedOption == "Personal Motocycle") {
            $("#first_km").val($("#first_km").data("firstkmmotor"));
            $("#first_price").val($("#first_price").data("firstpricemotor"));
            $("#second_km").val($("#second_km").data("secondkmmotor"));
            $("#second_price").val($("#second_price").data("secondpricemotor"));
            $("#third_km").val($("#third_km").data("thirdkmmotor"));
            $("#third_price").val($("#third_price").data("thirdpricemotor"));
        } else {
            $("#first_km").val("");
            $("#first_price").val("");
            $("#second_km").val("");
            $("#second_price").val("");
            $("#third_km").val("");
            $("#third_price").val("");
        }
    });

    $("#claimtable1").DataTable({
        searching: false,
        lengthChange: true,
        lengthMenu: [5, 10],
        responsive: false,
        info: false,
        scrollX: true,
    });

    $("#claimtable").DataTable({
        searching: false,
        lengthChange: true,
        lengthMenu: [5, 10],
        responsive: false,
        info: false,
        scrollX: true,
    });
 
    $("#traveltable").DataTable({
        searching: false,
        lengthChange: true,
        lengthMenu: [5, 10],
        responsive: false,
        info: false,
        scrollX: true,
    });

    $("#datepicker-autoClose").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "dd/mm/yyyy",
    });

    $(document).on("change", "#ca", function () {
        if ($(this).val() == "1") {
            $(".WC").show();
            $(".WOC").hide();
        } else if ($(this).val() == "2") {
            $(".WC").hide();
            $(".WOC").show();
        } else {
            $(".WC").hide();
            $(".WOC").hide();
        }
    });

    $(document).ready(function() {
        $("#calculateButton").click(function() {
            $("#confirmBtnDiv").show();
        });

        $("#confirmBtn").click(function() {
            var total = parseInt(resultInput.value);

            // call the calculate function with the input value
            var result = calculate(total);
        
            // round up the result and remove decimal places
            var roundedResult = Math.ceil(result);
        
            // display the rounded result in the millage input field
            $("#millage").val(roundedResult);
            
            $("#confirmBtnDiv").hide();
        });
    });
    
    //
    $(document).on("change", "#ls", function () {
        if ($(this).val() == "My Project") {
            $("#project").show();
        } else if ($(this).val() == "Office") {
            var officeValue = $("#office").val() || "-";
            $("#autocomplete").val(officeValue);
        } else if ($(this).val() == "Home") {
            var permanentValue = $("#permanentAddress").val() || "-";
            $("#autocomplete").val(permanentValue);
        } else {
            $("#project").hide();
        }
    });

    
    $(document).on("change", "#dest", function () {
        if ($(this).val() == "My Project") {
            $("#projectdest").show();
            $("#logname").hide();
        } else if ($(this).val() == "Others") {
            $("#projectdest").hide();
            $("#logname").hide();
        } else if ($(this).val() == "Office") {
            var officeValue = $("#office").val() || "-";
            $("#autocomplete2").val(officeValue);
        } else if ($(this).val() == "Home") {
            var permanentValue = $("#permanentAddress").val() || "-";
            $("#autocomplete2").val(permanentValue);
        } else {
            $("#projectdest").hide();
            $("#logname").hide();
        }
    });

    $("#datepickerpc")
        .datepicker({
            todayHighlight: true,
            autoclose: true,
            format: "yyyy-mm-dd",
        })
        .datepicker("setDate", "now");

    var selectedMonth = $("#monthInput").val();

    // Convert the selected month to the first and last day of that monthsadasd
    var firstDay = new Date(selectedMonth + " 1, 2023");
    var lastDay = new Date(firstDay.getFullYear(), firstDay.getMonth() + 1, 0);
      
        // Initialize the datepicker with the selected month range
        $("#datepickertc")
          .datepicker({
            todayHighlight: true,
            autoclose: true,
            format: "yyyy-mm-dd",
            startDate: firstDay,
            endDate: lastDay
          })
          .datepicker("setDate", firstDay);

    // $(function () {
    //     var selectedMonth = $("#monthInputSub").val();

    //     // Convert the selected month to the first and last day of that monthsadasd
    //     var firstDay = new Date(selectedMonth + " 1, 2023");
    //     var lastDay = new Date(firstDay.getFullYear(), firstDay.getMonth() + 1, 0);
        
    //         // Initialize the datepicker with the selected month range
    //         $("#date1, #date2")
    //         .datepicker({
    //             todayHighlight: true,
    //             autoclose: true,
    //             format: "yyyy-mm-dd",
    //             startDate: firstDay,
    //             endDate: lastDay
    //         })
    //         .datepicker("setDate", firstDay);
        
    //     $("#time1,#time2").mdtimepicker({});

    //     $("#timestart,#timeend").mdtimepicker({});
    //     $("#daystart,#dayend")
    //         .datepicker({
    //             format: "yyyy-mm-dd",
    //         })
    //         .datepicker("setDate", "now");
    // });

    // $(document).ready(function () {
    //     $("#time1,#time2").mdtimepicker({});
    //     //calculate date range in subsistence allowance
    //     $("#result1, #date1, #time1, #date2, #time2").focus(function () {
    //         // Retrieve selected values from start and end date select elements
    //         var startDate = document.getElementById('date1').value;
    //         var endDate = document.getElementById('date2').value;

    //         // Retrieve input values from start and end time pickers
    //         var startTime = document.getElementById('time1').value;
    //         var endTime = document.getElementById('time2').value;

    //         // Calculate travel duration
    //         var startDateTime = new Date(startDate + ' ' + startTime);
    //         var endDateTime = new Date(endDate + ' ' + endTime);
    //         var durationInMs = endDateTime - startDateTime;
    //         var days = Math.floor(durationInMs / (1000 * 60 * 60 * 24));
    //         var hours = Math.floor((durationInMs % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    //         var minutes = Math.floor((durationInMs % (1000 * 60 * 60)) / (1000 * 60));

    //         // Display travel duration in the specified element
    //         $("#result1").val(days + " nights : " + hours + " hours : " + minutes + " minutes");


    //         $("#DBF").val(days);
    //         $("#DLH").val(days);
    //         $("#DDN").val(days);
    //         $("#hn").val(days);
    //         $("#ln").val(days);
    
    //         var a = parseFloat($("#BF").val()); //float
    //         var b = parseInt($("#DBF").val());
    //         var c = parseFloat($("#LH").val()); //float
    //         var d = parseInt($("#DLH").val());
    //         var e = parseFloat($("#DN").val()); //float
    //         var f = parseInt($("#DDN").val());
    //         $("#TS").val(a * b + c * d + e * f);
    //     });
    // });
    
    $(document).ready(function () {
        $("#timestart,#timeend").mdtimepicker({});
        $("#daystart,#dayend")
            .datepicker({
                format: "yyyy-mm-dd",
            })
            .datepicker("setDate", "now");
        $("#time1,#time2").mdtimepicker({});
    
        // Calculate and display travel duration
        $("#result1, #date1, #time1, #date2, #time2").focus(function () {
            var startDate = document.getElementById('date1').value;
            var endDate = document.getElementById('date2').value;
            var startTime = document.getElementById('time1').value;
            var endTime = document.getElementById('time2').value;
    
            var startDateTime = new Date(startDate + ' ' + startTime);
            var endDateTime = new Date(endDate + ' ' + endTime);
            var durationInMs = endDateTime - startDateTime;
            var days = Math.floor(durationInMs / (1000 * 60 * 60 * 24));
            var hours = Math.floor((durationInMs % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((durationInMs % (1000 * 60 * 60)) / (1000 * 60));
            
            $("#result1").val(days + " nights : " + hours + " hours : " + minutes + " minutes");

            $("#DBF").val(days);
            $("#DLH").val(days);
            $("#DDN").val(days);
            $("#hn").val(days);
            $("#ln").val(days);
    
            var a = parseFloat($("#BF").val()); //float
            var b = parseInt($("#DBF").val());
            var c = parseFloat($("#LH").val()); //float
            var d = parseInt($("#DLH").val());
            var e = parseFloat($("#DN").val()); //float
            var f = parseInt($("#DDN").val());
            $("#TS").val(a * b + c * d + e * f);
        });
    });
    //  calculate time duration un travelling
    $("#totalduration,#daystart,#timestart,#dayend,#timeend").focus(
        function () {
            var startdt = new Date(
                $("#daystart").val() + " " + $("#timestart").val()
            );

            var enddt = new Date(
                $("#dayend").val() + " " + $("#timeend").val()
            );

            var diff = enddt - startdt;

            var days = Math.floor(diff / (1000 * 60 * 60 * 24));
            diff -= days * (1000 * 60 * 60 * 24);

            var hours = Math.floor(diff / (1000 * 60 * 60));
            diff -= hours * (1000 * 60 * 60);

            var mins = Math.floor(diff / (1000 * 60));
            diff -= mins * (1000 * 60);

            $("#totalduration").val(hours + " hours : " + mins + " minutes ");
        }
    );

    function calculate(total) {
        var result = 0;
        var firstKm = document.getElementById("first_km").value;
        var firstPrice = document.getElementById("first_price").value;
        var secondKm = document.getElementById("second_km").value;
        var secondPrice = document.getElementById("second_price").value;
        var thirdPrice = document.getElementById("third_price").value;

        if (total > firstKm) {
            result += firstKm * firstPrice;
            total -= firstKm;

            if (total > secondKm) {
                result += secondKm * secondPrice;
                total -= secondKm;

                result += total * thirdPrice;
            } else {
                result += total * secondPrice;
            }
        } else {
            result = total * firstPrice;
        }

        return result;
    }

    var resultInput = document.getElementById("result");
    $("#result,#toll,#parking,#petrol,#autocomplete2,#calculateButton").focus(function () {
    var total = parseInt(resultInput.value);

    // call the calculate function with the input value
    var result = calculate(total);

    // round up the result and remove decimal places
    var roundedResult = Math.ceil(result);

    // display the rounded result in the millage input field
    $("#millage").val(roundedResult);
    });


    $("#hotelc").change(function () {
        var s = $("#hotelc input:checked")
            .map(function () {
                return this.value;
            })
            .get()
            .join(",");
        if (s.length > 0) {
            var ss = "100"; // this is the value to check against

            if ($("#htv").val() == ss) {
                $("#hotelcv").prop("readonly", true);
            } else {
                $("#hotelcv").prop("readonly", true);
            }

            $("#hotelcv").val(s);
            $("#hotelcv1").val(s);
            $("#hn").prop("readonly", false);
        } else {
            $("#hotelcv").val("");
            $("#hotelcv").prop("readonly", true);
            $("#hotelcv1").val("0");
            $("#hn").prop("readonly", true);
        }
    });

    $("#lodgingc").change(function () {
        var s = $("#lodgingc input:checked")
            .map(function () {
                return this.value;
            })
            .get()
            .join(",");
        if (s.length > 0) {
            var ss = "100"; // this is the value to check against

            if ($("#ldgv").val() == ss) {
                $("#lodgingcv").prop("readonly", true);
            } else {
                $("#lodgingcv").prop("readonly", true);
            }

            $("#lodgingcv").val(s);
            $("#lodgingcv1").val(s);
            $("#ln").prop("readonly", false);
        } else {
            $("#lodgingcv").val("");
            $("#lodgingcv").prop("readonly", true);
            $("#lodgingcv1").val("0");
            $("#ln").prop("readonly", true);
        }
    });

    // calculate total subsistence & accomadation
    $("#BF,#DBF,#LH,#DLH,#DN,#DDN,#TS").focus(function () {
        var a = parseFloat($("#BF").val()); //float
        var b = parseInt($("#DBF").val());
        var c = parseFloat($("#LH").val()); //float
        var d = parseInt($("#DLH").val());
        var e = parseFloat($("#DN").val()); //float
        var f = parseInt($("#DDN").val());
        
        $("#totalbf").val((a * b).toFixed(2));
        $("#totallh").val((c * d).toFixed(2));
        $("#totaldn").val((e * f).toFixed(2));
        $("#TS").val((a * b + c * d + e * f).toFixed(2));
        
    });

    $("#htv,#hotelcv1,#hn,#lodgingcv1,#ln,#ldgv").focus(function () {
        var a = parseFloat($("#hotelcv1").val()); //float
        var b = parseInt($("#hn").val());

        var c = parseFloat($("#lodgingcv1").val()); //float
        var d = parseInt($("#ln").val());
        var e = parseFloat(a * b + c * d).toFixed(2);
        $("#TAV").val(e);
    });

    $(
        "#hotelcv,#hotelcv1,#hn,#lodgingcv,#hotelcv1,#ln,#htv,#ldgv,#TS,#TAV,#DBF,#DLH,#DDN"
    ).focus(function () {
        var a = parseFloat($("#TS").val());
        var b = parseFloat($("#TAV").val());
        var c = parseFloat(a + b).toFixed(2);
        $("#total2").val(c);
    });

    $("#htv").click(function () {
        if (this.checked) {
            $("#hn").prop("disabled", false); // If checked enable item
        } else {
            $("#hn").prop("disabled", true); // If checked disable item
            $("#hn").val(0);
        }
    });

    $("#ldgv").click(function () {
        if (this.checked) {
            $("#ln").prop("disabled", false); // If checked enable item
        } else {
            $("#ln").prop("disabled", true); // If checked disable item
            $("#ln").val(0);
        }
    });

    $(document).on("change", "#claimcategory", function () { 
        $("#labelCategory").hide();
        id = $(this).val();
        const inputs = ["contentLabel"];

        for (let i = 0; i < inputs.length; i++) {
            $("#" + inputs[i] + "")
                .find("option")
                .remove() 
                .end()
                .append(
                    '<option label="PLEASE CHOOSE" selected="selected"> </option>'
                )
                .val("");

            function getClaimCategoryContent(id) {
                return $.ajax({
                    url: "/getClaimCategoryContent/" + id,
                });
            }
            $("#" + inputs[i] + "")
                .find("option")
                .end();
        }

        var user = getClaimCategoryContent(id);

        user.then(function (data) {
            $("#label").text(data[0].label);
    
            // Check if data is available
            if (data.length > 0) {
                // Show the labelcategory div if data is available
                $("#labelCategory").show();
                for (let i = 0; i < data.length; i++) {
                    const user = data[i];
                    var opt = document.createElement("option");
                    document.getElementById("contentLabel").innerHTML +=
                        '<option value="' +
                        user["id"] +
                        '">' +
                        user["content"] +
                        "</option>";
                }
            }
        });
    });

    $("#personalSaveButton").click(function (e) {
        $("#personalForm").validate({
            // Specify validation rules
            rules: {
                claim_category: "required",
                claim_category_detail: {
                    required: function () {
                        // Check if labelcategory div is visible
                        return $("#labelCategory").is(":visible");
                    }
                },
                amount: "required",
                // "file_upload[]": "required",
            },

            messages: {
                claim_category: "Please Select Claim Category",
                claim_category_detail: "Please Select Claim Category",
                amount: "Please Fill Out Amount",
                // "file_upload[]": "Please Upload Attachment",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("personalForm")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/submitPersonalClaim",
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
                                window.location.href =
                                    "/monthClaimEditView/edit/month/" + data.id;
                                // location.reload();
                            }
                        });
                    });
                });
            },
        });
    });
    $(document).ready(function () {
        $("#amount").on("input", function () {
            var value = $(this).val();
            var decimalCount = (value.split(".")[1] || []).length;
            if (decimalCount > 2) {
                $(this).val(parseFloat(value).toFixed(2));
            }
        });

        $("#amount").blur(function () {
            var value = $(this).val();
            var decimalCount = (value.split(".")[1] || []).length;
            if (decimalCount == 0) {
                $(this).val(value + ".00");
            }
        });
    });

    $("#travelSaveButton").click(function (e) {
        $("#travelForm").validate({
            // Specify validation rules
            rules: {
                general_id: "required",
                start_time: "required",
                end_time: "required",
                desc: "required",
                
                type_transport: "required",
                location_start: "required",
                project_id: "required",
                address_start: "required",
                location_end: "required",
                location_address: "required",
                // "file_upload[]": "required",
            },

            messages: {
                general_id: "Please Select Travel Date",
                start_time: "Please Select Start Time",
                end_time: "Please Select End Time",
                desc: "Please Insert Description",
                type_transport: "Please Select Type of Transport",
                location_start: "Please Select Start Location",
                project_id: "Please Select Project",
                address_start: "Please Select Start Address",
                location_end: "Please Select Destination",
                location_address: "Please Select Destination Address",
                // "file_upload[]": "Please Upload Attachment",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("travelForm")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/submitTravelClaim",
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
                                window.location.href =
                                    "/monthClaimEditView/edit/month/" + data.id;
                                // location.reload();
                            }
                        });
                    });
                });
            },
        });
    });

    $("#caButton").click(function (e) {
        $("#subsForm").validate({
            // Specify validation rules
            rules: {
                // "file_upload[]": "required",
            },

            messages: {
                // "file_upload[]": "Please Upload Attachment",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("subsForm")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/submitCaClaim",
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
                                window.location.href =
                                    "/monthClaimEditView/edit/month/" + data.id;
                                // location.reload();
                            }
                        });
                    });
                });
            },
        });
    });

    $("#subsSaveButton").click(function (e) {
        $("#subsForm").validate({
            // Specify validation rules
            rules: {
                // "file_upload[]": "required",
                start_date: "required",
                end_date: "required",
                start_time: "required",
                end_time: "required",
                project_id: "required",
                desc: "required",
            },

            messages: {
                // "file_upload[]": "Please Upload Attachment",
                start_date: "Please Select Start Date",
                end_date: "Please Select End Date",
                start_time: "Please Select Start Time",
                end_time: "Please Select End Time",
                project_id: "Please Select Project",
                desc: "Please Insert Description",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("subsForm")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/submitSubsClaim",
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
                                window.location.href =
                                    "/monthClaimEditView/edit/month/" + data.id;
                                // location.reload();
                            }
                        });
                    });
                });
            },
        });
    });

    $("#editSubmitButton").click(function (e) {
        requirejs(["sweetAlert2"], function (swal) {
            id = $("#generalId").val();
            // var data = new FormData(document.getElementById("subsForm"));

            $.ajax({
                type: "POST",
                url: "/submitMonthlyClaim/" + id,
                // data: data,
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
                        window.location.href = "/myClaimView";
                        // location.reload();
                    }
                });
            });
        });
    });
});

$(document).on("click", "#deleteButtonPersonal", function () {
    id = $(this).data("id");
    //console.log(id);
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
                url: "/deletePersonalDetail/" + id,
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
$(document).on("click", "#deleteButtonTravel", function () {
    id = $(this).data("id");
    //console.log(id);
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
                url: "/deleteTravelDetail/" + id,
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
