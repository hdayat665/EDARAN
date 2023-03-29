$("document").ready(function () {
    $("#generalclaim").DataTable({
        searching: false,
        aaSorting: [],
        lengthChange: false,
        lengthMenu: [5, 10],
        responsive: false,
        info: false,
    });

    $(document).on('click', '[data-bs-target="#exampleModal"]', function (event) {
        var button = $(this); // Button that triggered the modal
        var year = button.data('year'); // Extract year value from data-* attributes
        var month = button.data('month'); // Extract month value from data-* attributes
        var general = button.data('general');
        //console.log(year);
        // Update year and month input fields in the modal
        $('#appeal-year').val(year);
        $('#appeal-month').val(month);
        $('#general-id').val(general);
    });
    
    $('.cancelButton').click(function(e) {
        var id = $(this).data("id");
        //console.log(id);
        requirejs(['sweetAlert2'], function(swal) {
            $.ajax({
                type: "POST",
                url: "/cancelGNC/"+ id,
                async: false,
                processData: false,
                contentType: false,
            }).done(function(data) {
                swal({
                    title: data.title,
                    text: data.msg,
                    type: data.type,
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                }).then(function() {
                    if (data.type == 'error') {

                    } else {
                        location.reload();
                    }


                });
            });

        });
    });
    $('.buttonCancel').click(function(e) {
        var id = $(this).data("id");
        //console.log(id);
        requirejs(['sweetAlert2'], function(swal) {
            $.ajax({
                type: "POST",
                url: "/cancelMTC/"+ id,
                async: false,
                processData: false,
                contentType: false,
            }).done(function(data) {
                swal({
                    title: data.title,
                    text: data.msg,
                    type: data.type,
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                }).then(function() {
                    if (data.type == 'error') {

                    } else {
                        location.reload();
                    }


                });
            });

        });
    });
    
    $("#saveAppeal").click(function (e) {
        requirejs(["sweetAlert2"], function (swal) {
            var data = new FormData(document.getElementById("addAppealForm"));
            
            $.ajax({
                type: "POST",
                url: "/appealMtc",
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
    });

    function initializeDataTable(tableSelector, statusSelector) {
        const table = $(tableSelector).DataTable({
            searching: true,
            lengthChange: false,
            scrollX: true,
            // scrollY: 200,
            lengthMenu: [5, 10],
            responsive: false,
            info: false,
            dom: '<"top">rt<"bottom"p><"clear">',
        });
    
        $(tableSelector + '_filter.dataTables_filter').append($(statusSelector));
    
        let categoryIndex = 0;
        $(tableSelector + ' th').each((i, th) => {
            if ($(th).html() === 'Status') {
                categoryIndex = i;
                return false;
            }
        });
    
        $.fn.dataTable.ext.search.push((settings, data, dataIndex) => {
            const selectedItem = $(statusSelector).val();
            const category = data[categoryIndex];
            if (!selectedItem) {
                return true;
            } else if (category === selectedItem) {
                return true;
            }
            return false;
        });
    
        $(statusSelector).change(() => table.draw());
        table.draw();
    }
    
    initializeDataTable('#claimtable', '#Statusclaim');
    initializeDataTable('#cashadvancetable', '#Statuscash');    

    //   $( "#cashnav" ).on( "click", function () {
    // 	setTimeout(function () {
    //     general.columns.adjust().draw();
    // 	}, 200);
    //   });

    //   $( "#claimnav" ).on( "click", function () {
    // 	setTimeout(function () {
    //     general.columns.adjust().draw();
    // 	}, 200);
    //   });

    $('a[data-toggle="tab"]').on("shown.bs.tab", function (e) {
        $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
    });

    $(document).on("click", "#cancelCashButton", function () {
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
                    url: "/cancelCashClaim/" + id,
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
});
