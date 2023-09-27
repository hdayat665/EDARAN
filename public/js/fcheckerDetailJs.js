$(document).ready(function () {
    function editInput(event) {
        // Prevent the default behavior of the link
        event.preventDefault();
  
        var editableInput = document.getElementById("editableInput");
        var updateBtn = document.getElementById("updateBtn");
        var cancelBtn = document.getElementById("cancelBtn");
        
        var numericValue = parseFloat(editableInput.value.replace("RM ", ""));
        editableInput.type = "number";
        editableInput.value = numericValue;

        editableInput.style.display = "inline";
        editableInput.removeAttribute("readonly");
        updateBtn.style.display = "block";
        cancelBtn.style.display = "block";
      }
  
      // Add an event listener to the "Edit" link to call the editInput() function when clicked
      var editLink = document.getElementById("editLink");
      editLink.addEventListener("click", editInput);
  
      function cancelEdit(event) {
        // Prevent the default behavior of the link
        event.preventDefault();
  
        var editableInput = document.getElementById("editableInput");
        var updateBtn = document.getElementById("updateBtn");
        var cancelBtn = document.getElementById("cancelBtn");
        
        editableInput.type = "text";

        // Restore the original value with the "RM " prefix
        var originalValue = "RM " + editableInput.value;
        editableInput.value = originalValue;
        editableInput.style.display = "inline";
        editableInput.setAttribute("readonly", true);
        updateBtn.style.display = "none";
        cancelBtn.style.display = "none";
      }
  
      var cancelBtn = document.getElementById("cancelBtn");
      cancelBtn.addEventListener("click", cancelEdit);
    
    $("#activetable").dataTable({
        // "responsive": true,
        bLengthChange: false,
        // scrollX: true,
        bFilter: false,
        initComplete: function (settings, json) {
            $("#activetable").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });

    $("#buckettable").dataTable({
        // "responsive": true,
        bLengthChange: false,
        // scrollX: true,
        bFilter: false,
        initComplete: function (settings, json) {
            $("#buckettable").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });

    $("#rejectedtable").dataTable({
        // "responsive": true,
        bLengthChange: false,
        // scrollX: true,
        bFilter: false,
        initComplete: function (settings, json) {
            $("#rejectedtable").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });

    $("#filter").click(function () {
        $("#filteronoff").toggle();
    });

    $("#rejectButton1, #rejectButton2, #rejectButton3, #rejectButton4").on(
        "click",
        function () {
            id = $(this).data("id");

            $("#rejectId").val(id);
            $("#modalreject").modal("show");
        }
    );

    $(
        "#approveButton, #approveButton1, #approveButton2, #approveButton3, #approveButton4"
    ).on("click", function () {
        // alert("ss");
        var id = $(this).data("id");
        var stage = "f_status";
        var status = "recommend";

        requirejs(["sweetAlert2"], function (swal) {
            $.ajax({
                type: "POST",
                url:
                    "/updateStatusCashAdvance/" +
                    id +
                    "/" +
                    status +
                    "/" +
                    stage,

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
        // updating checked attribute of change event occurred element, this.checked returns current state
        // $(".wrapper").val($(".container").html());
        // updating the value of textarea
    });

    $("#rejectButton").on("click", function () {
        // alert("ss");
        var id = $("#rejectId").val();
        // var id = $(this).data("id");
        var stage = "f1";
        var status = "reject";
        $("#rejectForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("rejectForm")
                    );
                    $.ajax({
                        type: "POST",
                        url:
                            "/updateStatusCashAdvance/" +
                            id +
                            "/" +
                            status +
                            "/" +
                            stage,
                        data: data,

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
        // updating checked attribute of change event occurred element, this.checked returns current state
        // $(".wrapper").val($(".container").html());
        // updating the value of textarea
    });

    $("#amendButton").on("click", function () {
        // alert("ss");
        var id = $("#amendId").val();
        var stage = "f1";
        var status = "amend";
        // alert(status);
        $("#amendForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("amendForm")
                    );
                    $.ajax({
                        type: "POST",
                        url:
                            "/updateStatusCashAdvance/" +
                            id +
                            "/" +
                            status +
                            "/" +
                            stage,
                        data: data,

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
        // updating checked attribute of change event occurred element, this.checked returns current state
        // $(".wrapper").val($(".container").html());
        // updating the value of textarea
    });

    $(document).on("click", "#checked", function () {
        var id = $(this).data("id");
        var stage = $(this).data("stage");
        var status = "check";
        // alert(id);
        requirejs(["sweetAlert2"], function (swal) {
            $.ajax({
                type: "POST",
                url:
                    "/updateStatusCashAdvance/" +
                    id +
                    "/" +
                    status +
                    "/" +
                    stage,

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
    $("#updateBtn").on("click", function () {
        // alert("ss");
        var id = $(this).data("id");
        // alert(id);
       
        $("#updateForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("updateForm")
                    );
                    $.ajax({
                        type: "POST",
                        url: "/updateMaxValue/" + id ,
                        data: data,
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
        // updating checked attribute of change event occurred element, this.checked returns current state
        // $(".wrapper").val($(".container").html());
        // updating the value of textarea
    });
    // personal
    $(document).on("click", "#btn-view", function () {
        var id = $(this).data("id");

        var vehicleData = getPersonalById(id);

        vehicleData.then(function (data) {
            console.log(data);
            $("#created_At").val(data.applied_date);
            $("#claim_category").val(data.claim_category);
            $("#amount").val(data.amount);
            $("#desc").val(data.desc);
            $("#file_upload").val(data.file_upload);
        });
        $("#modal-view").modal("show");
    });

    function getTravelById(id) {
        return $.ajax({
            url: "/getTravelById/" + id,
        });
    }

    $("#printButton").click(function() {
        // Call the window.print() function to trigger the browser's print dialog
        window.print();
    });
    $("#printButton1").click(function() {
        // Call the window.print() function to trigger the browser's print dialog
        window.print();
    });
    $("#printButton2").click(function() {
        // Call the window.print() function to trigger the browser's print dialog
        window.print();
    });
    $("#printButton3").click(function() {
        // Call the window.print() function to trigger the browser's print dialog
        window.print();
    });

    $("#addPV").on("click", function () {
        $("#modalAddPv").modal("show");
    });

    $("#savePVNumber").click(function (e) {
        $("#addPVNumberF").validate({
            rules: {
               
                
            },

            messages: {
                
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("addPVNumberF")
                    );
                    // var data = $('#tree').jstree("get_selected");

                    $.ajax({
                        type: "POST",
                        url: "/createCAPVNumber",
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
