$("document").ready(function () {
    
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

    //
    $(document).on("change", "#ls", function () {
        if ($(this).val() == "My Project") {
            $("#project").show();
        } else if ($(this).val() == "Office") {
            var officeValue = $("#office").val() || "-";
            $("#autocomplete").val(officeValue);
        } else {
            $("#project").hide();
        }
    });
    
    
    

    //
    $(document).on("change", "#dest", function () {
        if ($(this).val() == "My Project") {
            $("#projectdest").show();
            $("#logname").hide();
        } else if ($(this).val() == "Others") {
            $("#projectdest").hide();
            $("#logname").show();
        } else if ($(this).val() == "Office") {
            var officeValue = $("#office").val() || "-";
            $("#autocomplete2").val(officeValue);
        }else {
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

    $("#datepickertc")
        .datepicker({
            todayHighlight: true,
            autoclose: true,
            format: "yyyy-mm-dd",
        })
        .datepicker("setDate", "now");

    $(function () {
        $("#date1, #date2").datepicker({
            format: "yyyy-mm-dd",
        });
        $("#time1,#time2").mdtimepicker({});

        $("#timestart,#timeend").mdtimepicker({});
        $("#daystart,#dayend")
            .datepicker({
                format: "yyyy-mm-dd",
            })
            .datepicker("setDate", "now");
    });

    $(document).ready(function () {
        //calculate date range in subsistence allowance
        $("#result1,#date1,#time1,#date2,#time2").focus(function () {
            var startdt = new Date($("#date1").val() + " " + $("#time1").val());

            var enddt = new Date($("#date2").val() + " " + $("#time2").val());

            var diff = enddt - startdt;

            var days = Math.floor(diff / (1000 * 60 * 60 * 24));
            diff -= days * (1000 * 60 * 60 * 24);

            var hours = Math.floor(diff / (1000 * 60 * 60));
            diff -= hours * (1000 * 60 * 60);

            var mins = Math.floor(diff / (1000 * 60));
            diff -= mins * (1000 * 60);

            $("#result1").val(
                days + " days : " + hours + " hours : " + mins + " minutes "
            );
        });
    });

    
    function calculate(total) {
        var result = 0;

        if (total > 300) {
          result += 300 * 0.7;
          total -= 300;

          if (total > 500) {
            result += 500 * 0.5;
            total -= 500;

            result += total * 0.3;
          } else {
            result += total * 0.5;
          }
        } else {
          result = total * 0.7;
        }

        return result;
      }

      var resultInput = document.getElementById("result");
      $("#result,#toll,#parking,#petrol").focus(function () {

     
        var total = parseInt(resultInput.value);

        // call the calculate function with the input value
        var result = calculate(total);

        // display the result in a <div> element
        $("#millage").val(
            result
        );
        
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

    $("#hotelc").change(function () {
        var s = $("#hotelc input:checked")
            .map(function () {
                return this.value;
            })
            .get()
            .join(",");
        if (s.length > 0) {
            $("#hotelcv").val(s);
            $('#hotelcv').prop('readonly', false);
            $("#hotelcv1").val(s);
        } else {
            $("#hotelcv").val("");
            $('#hotelcv').prop('readonly', true);
            $("#hotelcv1").val("0");
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
            $("#lodgingcv").val(s);
            $('#lodgingcv').prop('readonly', false);
            $("#lodgingcv1").val(s);
        } else {
            $("#lodgingcv").val("");
            $('#lodgingcv').prop('readonly', true);
            $("#lodgingcv1").val("0");
        }
    });
    

    // calculate total subsistence & accomadation
    $("#BF,#DBF,#LH,#DLH,#DN,#DDN,#TS").change(function () {
        var a = parseFloat($("#BF").val()); //float
        var b = parseInt($("#DBF").val());
        var c = parseFloat($("#LH").val()); //float
        var d = parseInt($("#DLH").val());
        var e = parseFloat($("#DN").val()); //float
        var f = parseInt($("#DDN").val());
        $("#TS").val(a * b + c * d + e * f); //float
    });

    $("#htv,#hotelcv1,#hn,#lodgingcv1,#ln,#ldgv").change(function () {
        var a = parseFloat($("#hotelcv1").val()); //float
        var b = parseInt($("#hn").val());

        var c = parseFloat($("#lodgingcv1").val()); //float
        var d = parseInt($("#ln").val());
        var e = parseFloat(a * b + c * d).toFixed(2);
        $("#TAV").val(e);
    });

    $(
        "#hotelcv,#hotelcv1,#hn,#lodgingcv,#hotelcv1,#ln,#htv,#ldgv,#TS,#TAV,#DBF,#DLH,#DDN"
    ).change(function () {
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
        $("#labelCategory").show();
        id = $(this).val();
        const inputs = ["contentLabel"];

        for (let i = 0; i < inputs.length; i++) {
            $("#" + inputs[i] + "")
                .find("option")
                .remove()
                .end()
                .append(
                    '<option label="Please Choose" selected="selected"> </option>'
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

        user.done(function (data) {
            // console.log(data);
            $("#label").text(data[0].label);
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
        });
    });

    $("#personalSaveButton").click(function (e) {
        $("#personalForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
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

    $("#travelSaveButton").click(function (e) {
        $("#travelForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
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
            rules: {},

            messages: {},
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
            rules: {},

            messages: {},
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
                        window.location.href = "/myClaimView";
                        // location.reload();
                    }
                });
            });
        });
    });
});
