$(document).ready(function () {

    // Get the bucket tab element
    // Get the necessary elements
    const bucketTab = document.getElementById('bucketTab');
    const skipButton = document.getElementById('skipButton');

    // Event listener for Bucket tab
    bucketTab.addEventListener('click', function() {
    // Show the skipButton
    skipButton.style.display = 'block';
    });

    // Event listeners for other tabs
    const activeTab = document.getElementById('activeTab');
    const amendTab = document.getElementById('ammendTab');
    const rejectedTab = document.getElementById('rejectedTab');

    // Function to hide the skipButton
    function hideSkipButton() {
    skipButton.style.display = 'none';
    }

    // Event listeners for Active, Amend, and Rejected tabs
    activeTab.addEventListener('click', hideSkipButton);
    amendTab.addEventListener('click', hideSkipButton);
    rejectedTab.addEventListener('click', hideSkipButton);


    // Get the necessary elements
    const approveAllButton = document.getElementById('approveAllButton');

    // Event listener for Active tab
    activeTab.addEventListener('click', function() {
    // Show the approveAllButton
    approveAllButton.style.display = 'block';
    skipButton.style.display = 'block';
    });

    // Function to hide the approveAllButton
    function hideApproveAllButton() {
    approveAllButton.style.display = 'none';
    }

    // Event listeners for Amend and Rejected tabs
    bucketTab.addEventListener('click', hideApproveAllButton);
    amendTab.addEventListener('click', hideApproveAllButton);
    rejectedTab.addEventListener('click', hideApproveAllButton);

    // $("#filteractive").hide();
    // $("#activeTable").DataTable({
    //     bPaginate: false,
    //     // scrollX:true,
    //     initComplete: function (settings, json) {
    //         this.api()
    //             .columns([2, 3, 4, 5, 6, 7, 8, 9])
    //             .every(function () {
    //                 var column = this;
    //                 var select = $(
    //                     '<select><option value=""></option></select>'
    //                 )
    //                     .appendTo($(column.footer()).empty())
    //                     .on("change", function () {
    //                         var val = $.fn.dataTable.util.escapeRegex(
    //                             $(this).val()
    //                         );
    //                         column
    //                             .search(val ? "^" + val + "$" : "", true, false)
    //                             .draw();
    //                     });

    //                 column
    //                     .data()
    //                     .unique()
    //                     .sort()
    //                     .each(function (d, j) {
    //                         select.append(
    //                             '<option value="' + d + '">' + d + "</option>"
    //                         );
    //                     });
    //             });
    //         $("#activeTable").wrap(
    //             "<div style='overflow:auto; width:100%;position:relative;'></div>"
    //         );
    //     },

    //     dom: '<"dataTables_wrapper dt-bootstrap"<"row"<"col-xl-7 d-block d-sm-flex d-xl-block justify-content-center"<"d-block d-lg-inline-flex me-0 me-md-3"l><"d-block d-lg-inline-flex"B>><"col-xl-5 d-flex d-xl-block justify-content-center"fr>>t<"row"<"col-md-5"i><"col-md-7"p>>>',
    //     buttons: [
    //         {
    //             extend: "pdf",
    //             className: "btn-sm",
    //             orientation: "landscape",
    //             exportOptions: {
    //                 columns: [2, 3, 4, 5, 6, 7, 8, 9],
    //             },
    //         },
    //         {
    //             text: '<i class="fa fa-filter" aria-hidden="true"></i>',
    //             action: function (e, dt, node, config) {
    //                 $("#filteractive").toggle();
    //             },
    //         },
    //     ],
    // });

    $("#activeTable").dataTable({
        searching: true,
        lengthChange: true,
        paging: true,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        dom: '<"row"<"col-sm-4"l><"col-sm-4 text-center"B><"col-sm-4"f>>t<"row"<"col-sm-12"ip>>',
        buttons: [
            {
                extend: "excel",
                className: "btn-blue",
                exportOptions: {
                    columns: [2, 3, 4, 5, 6, 7],
                },
            },
            {
                extend: "pdf",
                className: "btn-blue",
                exportOptions: {
                    columns: [2, 3, 4, 5, 6, 7],
                },
            },
            {
                extend: "print",
                className: "btn-blue",
                exportOptions: {
                    columns: [2, 3, 4, 5, 6, 7],
                },
            },
        ],
        initComplete: function (settings, json) {
            $("#activetable").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
        columnDefs: [{ orderable: false, targets: [0] }],
    });

    // $("#filterrecommend").hide();
    // $("#recommendedtable").DataTable({
    //     bPaginate: false,
    //     // scrollX:true,
    //     initComplete: function (settings, json) {
    //         this.api()
    //             .columns([2, 3, 4, 5, 6, 7, 8, 9])
    //             .every(function () {
    //                 var column = this;
    //                 var select = $(
    //                     '<select><option value=""></option></select>'
    //                 )
    //                     .appendTo($(column.footer()).empty())
    //                     .on("change", function () {
    //                         var val = $.fn.dataTable.util.escapeRegex(
    //                             $(this).val()
    //                         );
    //                         column
    //                             .search(val ? "^" + val + "$" : "", true, false)
    //                             .draw();
    //                     });

    //                 column
    //                     .data()
    //                     .unique()
    //                     .sort()
    //                     .each(function (d, j) {
    //                         select.append(
    //                             '<option value="' + d + '">' + d + "</option>"
    //                         );
    //                     });
    //             });
    //         $("#recommendedtable").wrap(
    //             "<div style='overflow:auto; width:100%;position:relative;'></div>"
    //         );
    //     },

    //     dom: '<"dataTables_wrapper dt-bootstrap"<"row"<"col-xl-7 d-block d-sm-flex d-xl-block justify-content-center"<"d-block d-lg-inline-flex me-0 me-md-3"l><"d-block d-lg-inline-flex"B>><"col-xl-5 d-flex d-xl-block justify-content-center"fr>>t<"row"<"col-md-5"i><"col-md-7"p>>>',
    //     buttons: [
    //         {
    //             extend: "pdf",
    //             className: "btn-sm",
    //             orientation: "landscape",
    //         },
    //         {
    //             text: '<i class="fa fa-filter" aria-hidden="true"></i>',
    //             action: function (e, dt, node, config) {
    //                 $("#filterrecommend").toggle();
    //             },
    //         },
    //     ],
    // });

    $("#buckettable").dataTable({
        searching: true,
        lengthChange: true,
        paging: true,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        dom: '<"row"<"col-sm-4"l><"col-sm-4 text-center"B><"col-sm-4"f>>t<"row"<"col-sm-12"ip>>',
        buttons: [
            {
                extend: "excel",
                className: "btn-blue",
                exportOptions: {
                    columns: [2, 3, 4, 5, 6, 7],
                },
            },
            {
                extend: "pdf",
                className: "btn-blue",
                exportOptions: {
                    columns: [2, 3, 4, 5, 6, 7],
                },
            },
            {
                extend: "print",
                className: "btn-blue",
                exportOptions: {
                    columns: [2, 3, 4, 5, 6, 7],
                },
            },
        ],
        initComplete: function (settings, json) {
            $("#activetable").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
        columnDefs: [{ orderable: false, targets: [0] }],
    });

    //$("#filteramends").hide();
    $("#amendtable").dataTable({
        searching: true,
        lengthChange: true,
        paging: true,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        dom: '<"row"<"col-sm-4"l><"col-sm-4 text-center"B><"col-sm-4"f>>t<"row"<"col-sm-12"ip>>',
        buttons: [
            {
                extend: "excel",
                className: "btn-blue",
                exportOptions: {
                    columns: [2, 3, 4, 5, 6, 7],
                },
            },
            {
                extend: "pdf",
                className: "btn-blue",
                exportOptions: {
                    columns: [2, 3, 4, 5, 6, 7],
                },
            },
            {
                extend: "print",
                className: "btn-blue",
                exportOptions: {
                    columns: [2, 3, 4, 5, 6, 7],
                },
            },
        ],
        initComplete: function (settings, json) {
            $("#activetable").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
        columnDefs: [{ orderable: false, targets: [0] }],
    });

    $("#rejecttable").dataTable({
        searching: true,
        lengthChange: true,
        paging: true,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        dom: '<"row"<"col-sm-4"l><"col-sm-4 text-center"B><"col-sm-4"f>>t<"row"<"col-sm-12"ip>>',
        buttons: [
            {
                extend: "excel",
                className: "btn-blue",
                exportOptions: {
                    columns: [2, 3, 4, 5, 6, 7],
                },
            },
            {
                extend: "pdf",
                className: "btn-blue",
                exportOptions: {
                    columns: [2, 3, 4, 5, 6, 7],
                },
            },
            {
                extend: "print",
                className: "btn-blue",
                exportOptions: {
                    columns: [2, 3, 4, 5, 6, 7],
                },
            },
        ],
        initComplete: function (settings, json) {
            $("#activetable").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
        columnDefs: [{ orderable: false, targets: [0] }],
    });

    

    $(
        "#rejectModalButton, #rejectModalButton1, #rejectModalButton2, #rejectModalButton3"
    ).on("click", function () {
        id = $(this).data("id");

        $("#rejectId").val(id);
        $("#modalreject").modal("show");
    });

    $(
        "#amendModalButton, #amendModalButton1, #amendModalButton2, #amendModalButton3"
    ).on("click", function () {
        id = $(this).data("id");

        $("#amendId").val(id);
        $("#modalamend").modal("show");
    });

    $("#filter").click(function () {
        $("#filteronoff").toggle();
    });

    $("tfoot").each(function () {
        $(this).insertAfter($(this).siblings("thead"));
    });

    $("#approveButton, #approveButton1, #approveButton2").on(
        "click",
        function () {
            // alert("ss");
            var id = $(this).data("id");
            var stage = "hod";
            var status = "bucket";

            requirejs(["sweetAlert2"], function (swal) {
                $.ajax({
                    type: "POST",
                    url:
                        "/updateStatusClaim/" + id + "/" + status + "/" + stage,

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
        }
    );

    $("#rejectButton").click(function (e) {
        var id = $("#rejectId").val();
        var status = "reject";
        var stage = "supervisor";

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
                            "/updateStatusClaim/" +
                            id +
                            "/" +
                            status +
                            "/" +
                            stage,
                        data: data,
                        dataType: "json",

                        processData: false,
                        contentType: false,
                    }).then(function (data) {
                        console.log(data);
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
    $("#skipButton").click(function (e) {
        requirejs(["sweetAlert2"], function (swal) {
            var data = new FormData(document.getElementById("approveAllForm"));

            $.ajax({
                type: "POST",
                url: "/skipAllClaim",
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
    $("#approveAllButton").click(function (e) {
        requirejs(["sweetAlert2"], function (swal) {
            var data = new FormData(document.getElementById("approveAllForm"));

            $.ajax({
                type: "POST",
                url: "/approveAllClaim",
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

    $("#amendButton").click(function (e) {
        var id = $("#amendId").val();
        var stage = "supervisor";
        var status = "amend";

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
                            "/updateStatusClaim/" +
                            id +
                            "/" +
                            status +
                            "/" +
                            stage,
                        data: data,
                        dataType: "json",

                        processData: false,
                        contentType: false,
                    }).then(function (data) {
                        console.log(data);
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
