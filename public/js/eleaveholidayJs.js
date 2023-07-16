$(document).ready(function () {
    $(document).ready(function () {
        $("#tabletype").dataTable({
            responsive: false,
            bLengthChange: false,
            bFilter: true,
            initComplete: function (settings, json) {
                $("#tabletype").wrap(
                    "<div style='overflow:auto; width:100%;position:relative;'></div>"
                );
            },
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

    // $("#saveButton").click(function (e) {
    //     $("#addForm").validate({
    //         // Specify validation rules
    //         rules: {
    //             holiday_title: "required",
    //             start_date: "required",
    //             end_date: "required",
    //         },

    //         messages: {
    //             holiday_title: "Please Insert Holiday Title",
    //             start_date: "Please Insert Start Date",
    //             end_date: "Please Insert End Date",
    //         },
    //         submitHandler: function (form) {
    //             requirejs(["sweetAlert2"], function (swal) {
    //                 var data = new FormData(document.getElementById("addForm"));
    //                 console.log(document.getElementById("addForm"));
    //                 // return false;

    //                 // var data = $('#tree').jstree("get_selected");

    //                 $.ajax({
    //                     type: "POST",
    //                     url: "/createholidaylist",
    //                     data: data,
    //                     dataType: "json",

    //                     processData: false,
    //                     contentType: false,
    //                 }).then(function (data) {
    //                     swal({
    //                         title: data.title,
    //                         text: data.msg,
    //                         type: data.type,
    //                         confirmButtonColor: "#3085d6",
    //                         confirmButtonText: "OK",
    //                         allowOutsideClick: false,
    //                         allowEscapeKey: false,
    //                     }).then(function () {
    //                         if (data.type == "error") {
    //                         } else {
    //                             location.reload();
    //                         }
    //                     });
    //                 });
    //             });
    //         },
    //     });
    // });

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
                start_date: "Please Insert Start Date",
                end_date: "Please Insert End Date",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    // Get the checked checkboxes
                    var checkedCheckboxes = document.querySelectorAll("input[name='state_checkbox']:checked");

                    // Create an array to store the selected state IDs
                    var selectedStateIds = [];

                    // Iterate over the checked checkboxes and add the state ID to the array
                    checkedCheckboxes.forEach(function (checkbox) {
                        selectedStateIds.push(checkbox.value);
                    });

                    // Add the selected state IDs to the form data
                    var data = new FormData(document.getElementById("addForm"));
                    selectedStateIds.forEach(function (stateId) {
                        data.append("selected_state_ids[]", stateId);
                    });

                    // Send the form data to the server
                    $.ajax({
                        type: "POST",
                        url: "/createholidaylist",
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

        var holidayData = geteleaveholiday(id);

        console.log(holidayData);

        holidayData.then(function (data) {
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
                start_date: "Please Insert Start Date",
                enddate: "Please Insert End Date",
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
                url: "/updateStatusleaveholiday/" + id + "/" + status,

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

    $("#tableholiday").DataTable({
        searching: true,
        lengthChange: true,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        responsive: false,
        initComplete: function (settings, json) {
            $("#tableholiday").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });

    $(document).on("change", "#datepickerstart, #datepickerend", function () {
        var startDate = $("#datepickerstart").val();
        var endDate = $("#datepickerend").val();
        var totalDays = "";

        if (startDate.trim() === "") {
            $("#datepickerend").val("");
        }

        if (startDate && endDate) {
            var date1 = new Date(startDate);
            var date2 = new Date(endDate);
            var timeDiff = date2.getTime() - date1.getTime();
            var dayDiff = Math.ceil(timeDiff / (1000 * 3600 * 24));

            totalDays = dayDiff + 1;

            if (totalDays <= 0) {
                $("#datepickerend").val("");
            } else {
            }
        }
    });

    $("#bulkUploadHoliday").click(function (e) {
        requirejs(["sweetAlert2"], function (swal) {
            var data = new FormData(document.getElementById("uploadBulkForm"));
            // return false;

            // var data = $('#tree').jstree("get_selected");

            $.ajax({
                type: "POST",
                url: "/bulkUploadHoliday",
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
    });

    $(document).ready(function() {

        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "PLEASE CHOOSE",
                allowClear: true,
            });
        });

        $(document).ready(function() {

            $('.select3').select2({
                placeholder: "PLEASE CHOOSE",
                allowClear: true,
                dropdownParent: $('#addleave'),
            });
        });

    });




    $(document).on("click", "#holidayState", function () {
        $("#modalHolidayState").modal("show");
        var id = $(this).data("id");
        var all = $(this).data("all");



        // Clear the existing data if the data array is empty or ID is null
        var mainContainer = document.querySelector(".wan");
        mainContainer.innerHTML = "";

        if (id) {


            var getstateddetail = getstatedetail(id);

            getstateddetail.then(function (data) {


                $("#idstate").val(id);


                // Assuming "data" is an array of state objects

                if (data && data.length > 0) {
                    // Create an array to store pairs of states
                    var statePairs = [];

                    // Iterate over the data array to create pairs of states
                    for (var i = 0; i < data.length; i += 2) {
                        var pair = {
                            state1: data[i],
                            state2: data[i + 1],
                        };
                        statePairs.push(pair);
                    }
                    statePairs.forEach(function (pair) {
                        // Create the row div
                        var rowDiv = document.createElement("div");
                        rowDiv.className = "row p-2";

                        // Create the first column div
                        var col1Div = document.createElement("div");
                        col1Div.className = "col md-6";

                        // Create the second column div
                        var col2Div = document.createElement("div");
                        col2Div.className = "col-md-6";

                        // Create the form-check div for the first column
                        var formCheck1 = document.createElement("div");
                        formCheck1.className = "form-check";

                        // Create the checkbox and label for the first state
                        var checkbox1 = document.createElement("input");
                        checkbox1.type = "checkbox";
                        checkbox1.value = pair.state1.id;
                        checkbox1.id = "checkbox1-" + pair.state1.id; // Update the ID to make it unique
                        checkbox1.className = "form-check-input";

                        var label1 = document.createElement("label");
                        label1.className = "form-check-label";
                        label1.htmlFor = "checkbox1-" + pair.state1.id;
                        label1.innerText = pair.state1.state_name;

                        // Append the checkbox and label to their respective form-check div
                        formCheck1.appendChild(checkbox1);
                        formCheck1.appendChild(label1);

                        // Append the form-check div to the first column div
                        col1Div.appendChild(formCheck1);

                        // Append the first column div to the row div
                        rowDiv.appendChild(col1Div);

                        // Check if the second state in the pair exists
                        if (pair.state2) {
                            // Create the form-check div for the second column
                            var formCheck2 = document.createElement("div");
                            formCheck2.className = "form-check";

                            // Create the checkbox and label for the second state
                            var checkbox2 = document.createElement("input");
                            checkbox2.type = "checkbox";
                            checkbox2.value = pair.state2.id;
                            checkbox2.id = "checkbox1-" + pair.state2.id; // Update the ID to make it unique
                            checkbox2.className = "form-check-input";

                            var label2 = document.createElement("label");
                            label2.className = "form-check-label";
                            label2.htmlFor = "checkbox1-" + pair.state2.id;
                            label2.innerText = pair.state2.state_name;

                            // Append the checkbox and label to their respective form-check div
                            formCheck2.appendChild(checkbox2);
                            formCheck2.appendChild(label2);

                            // Append the form-check div to the second column div
                            col2Div.appendChild(formCheck2);
                        }

                        // Append the second column div to the row div
                        rowDiv.appendChild(col2Div);

                        // Append the row div to the main container (div with class "wan")
                        var mainContainer = document.querySelector(".wan");
                        mainContainer.appendChild(rowDiv);
                    });

                    var selectAllCheckbox = document.createElement("input");
                    selectAllCheckbox.type = "checkbox";
                    selectAllCheckbox.value = "";
                    selectAllCheckbox.id = "checkbox-select-all1"; // Update the ID to make it unique
                    selectAllCheckbox.className = "form-check-input select-all-checkbox";

                    var selectAllLabel = document.createElement("label");
                    selectAllLabel.className = "form-check-label select-all-label";
                    selectAllLabel.htmlFor = "checkbox-select-all1";
                    selectAllLabel.innerText = "ALL STATE";

                    var rowDivAll = document.createElement("div");
                    rowDivAll.className = "row p-2";

                    // Create the div for "Select All" checkbox and label
                    var selectAllDiv = document.createElement("div");
                    selectAllDiv.className = "form-check";

                    // Append the "Select All" checkbox and label to the div
                    selectAllDiv.appendChild(rowDivAll);
                    selectAllDiv.appendChild(selectAllCheckbox);
                    selectAllDiv.appendChild(selectAllLabel);

                    // Prepend the "Select All" div to the main container
                    mainContainer.prepend(selectAllDiv);

                    // Add event listener to "Select All" checkbox
                    selectAllCheckbox.addEventListener("change", function () {
                        var checkboxes = document.querySelectorAll(".wan input[type='checkbox']");

                        checkboxes.forEach(function (checkbox) {
                            checkbox.checked = selectAllCheckbox.checked;
                        });
                    });

                    // Check the checkboxes based on the received data
                    data.forEach(function (state) {
                        var checkbox = document.getElementById("checkbox1-" + state.id);
                        if (checkbox) {
                            checkbox.checked = state.checked; // Menggunakan nilai state.checked untuk menentukan apakah checkbox harus dicentang
                        }
                        if (all == "ALL") {
                            $("#checkbox-select-all1").prop("checked", true);
                        }
                    });
                } else {
                    console.log("Data array is empty");
                }
            });
        } else {
            console.log("ID is null");
        }
    });

    function getstatedetail(id) {
        return $.ajax({
            url: "/getstateholidaydetail/" + id,
        });
    }



    $(document).on("change", "#select3", function () {
        var id = $("#select3").val();

        // Clear the existing data if the data array is empty or ID is null
        var mainContainer = document.querySelector(".border.border-light");
        mainContainer.innerHTML = "";

        if (id) {
            var getstated = getstate(id);

            getstated.then(function (data) {
                // Assuming "data" is an array of state objects

                if (data && data.length > 0) {
                    // Create an array to store pairs of states
                    var statePairs = [];

                    // Iterate over the data array to create pairs of states
                    for (var i = 0; i < data.length; i += 2) {
                        var pair = {
                            state1: data[i],
                            state2: data[i + 1],
                        };
                        statePairs.push(pair);
                    }
                    statePairs.forEach(function (pair) {
                        // Create the row div
                        var rowDiv = document.createElement("div");
                        rowDiv.className = "row p-2";

                        // Create the first column div
                        var col1Div = document.createElement("div");
                        col1Div.className = "col md-6";

                        // Create the second column div
                        var col2Div = document.createElement("div");
                        col2Div.className = "col-md-6";

                        // Create the form-check div for the first column
                        var formCheck1 = document.createElement("div");
                        formCheck1.className = "form-check";

                        // Create the checkbox and label for the first state
                        var checkbox1 = document.createElement("input");
                        checkbox1.type = "checkbox";
                        checkbox1.value = pair.state1.id;
                        checkbox1.id = "checkbox2-" + pair.state1.id; // Update the ID to make it unique
                        checkbox1.className = "form-check-input";
                        checkbox1.name = "state_checkbox"; // Add the name attribute

                        var label1 = document.createElement("label");
                        label1.className = "form-check-label";
                        label1.htmlFor = "checkbox2-" + pair.state1.id;
                        label1.innerText = pair.state1.state_name;

                        // Append the checkbox and label to their respective form-check div
                        formCheck1.appendChild(checkbox1);
                        formCheck1.appendChild(label1);

                        // Append the form-check div to the first column div
                        col1Div.appendChild(formCheck1);

                        // Append the first column div to the row div
                        rowDiv.appendChild(col1Div);

                        // Check if the second state in the pair exists
                        if (pair.state2) {
                            // Create the form-check div for the second column
                            var formCheck2 = document.createElement("div");
                            formCheck2.className = "form-check";

                            // Create the checkbox and label for the second state
                            var checkbox2 = document.createElement("input");
                            checkbox2.type = "checkbox";
                            checkbox2.value = pair.state2.id;
                            checkbox2.id = "checkbox2-" + pair.state2.id; // Update the ID to make it unique
                            checkbox2.className = "form-check-input";
                            checkbox2.name = "state_checkbox"; // Add the name attribute

                            var label2 = document.createElement("label");
                            label2.className = "form-check-label";
                            label2.htmlFor = "checkbox2-" + pair.state2.id;
                            label2.innerText = pair.state2.state_name;

                            // Append the checkbox and label to their respective form-check div
                            formCheck2.appendChild(checkbox2);
                            formCheck2.appendChild(label2);

                            // Append the form-check div to the second column div
                            col2Div.appendChild(formCheck2);
                        }

                        // Append the second column div to the row div
                        rowDiv.appendChild(col2Div);

                        // Append the row div to the main container (div with class "border border-light")
                        var mainContainer = document.querySelector(".border.border-light");
                        mainContainer.appendChild(rowDiv);
                    });

                    var selectAllCheckbox = document.createElement("input");
                    selectAllCheckbox.type = "checkbox";
                    selectAllCheckbox.value = "";
                    selectAllCheckbox.id = "checkbox-select-all2"; // Update the ID to make it unique
                    selectAllCheckbox.className = "form-check-input select-all-checkbox";
                    selectAllCheckbox.name = "state_checkbox"; // Add the name attribute

                    var selectAllLabel = document.createElement("label");
                    selectAllLabel.className = "form-check-label select-all-label";
                    selectAllLabel.htmlFor = "checkbox-select-all2";
                    selectAllLabel.innerText = "ALL STATE";

                    // Add event listener to "Select All" checkbox
                    selectAllCheckbox.addEventListener("change", function () {
                        var checkboxes = document.querySelectorAll(".border.border-light input[type='checkbox']");

                        checkboxes.forEach(function (checkbox) {
                            checkbox.checked = selectAllCheckbox.checked;
                        });
                    });

                    var rowDivAll = document.createElement("div");
                    rowDivAll.className = "row p-2";

                    // Create the div for "Select All" checkbox and label
                    var selectAllDiv = document.createElement("div");
                    selectAllDiv.className = "form-check";

                    // Append the "Select All" checkbox and label to the div
                    selectAllDiv.appendChild(rowDivAll);
                    selectAllDiv.appendChild(selectAllCheckbox);
                    selectAllDiv.appendChild(selectAllLabel);

                    // Prepend the "Select All" div to the main container
                    mainContainer.prepend(selectAllDiv);
                } else {
                    console.log("Data array is empty");
                }
            });
        } else {
            console.log("ID is null");
        }
    });

    function getstate(id) {
        return $.ajax({
            url: "/getstateholiday/" + id,
        });
    }


    $("#updateformstate").click(function (e) {
        $("#updateformstateform").validate({

            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    // Get the checked checkboxes
                    var checkedCheckboxes = document.querySelectorAll(".wan input[type='checkbox']:checked");

                    // Create an array to store the selected state IDs
                    var selectedStateIds = [];

                    // Iterate over the checked checkboxes and add the state ID to the array
                    checkedCheckboxes.forEach(function (checkbox) {
                        selectedStateIds.push(checkbox.value);
                    });

                    // Add the selected state IDs to the form data
                    var data = new FormData(document.getElementById("updateformstateform"));
                    selectedStateIds.forEach(function (stateId) {
                        data.append("selected_state_ids[]", stateId);
                    });

                    // Send the form data to the server
                    $.ajax({
                        type: "POST",
                        url: "/updateholidaystate",
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









});
