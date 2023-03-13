$("document").ready(function () {
    $("#generalclaim").DataTable({
        searching: false,
        aaSorting: [],
        lengthChange: false,
        lengthMenu: [5, 10],
        responsive: false,
        info: false,
    });

    function initializeDataTable(tableSelector, statusSelector) {
        const table = $(tableSelector).DataTable({
            searching: true,
            lengthChange: false,
            scrollX: true,
            scrollY: 200,
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
