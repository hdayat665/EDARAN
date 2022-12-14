$("document").ready(function () {
    $("#generalclaim").DataTable({
        searching: false,
        lengthChange: false,
        lengthMenu: [5, 10],
        responsive: false,
        info: false,
    });

    $("#claimtable").dataTable({
        searching: true,
        lengthChange: false,
        lengthMenu: [5, 10],
        responsive: false,
        info: false,
        dom: '<"top">rt<"bottom"p><"clear">',
    });
    //Get a reference to the new datatable
    var table = $("#claimtable").DataTable();
    //Take the category filter drop down and append it to the datatables_filter div.
    //You can use this same idea to move the filter anywhere withing the datatable that you want.
    $("#claimtable_filter.dataTables_filter").append($("#Statusclaim"));

    //Get the column index for the Category column to be used in the method below ($.fn.dataTable.ext.search.push)
    //This tells datatables what column to filter on when a user selects a value from the dropdown.
    //It's important that the text used here (Category) is the same for used in the header of the column to filter
    var categoryIndex = 0;
    $("#claimtable th").each(function (i) {
        if ($($(this)).html() == "Status") {
            categoryIndex = i;
            return false;
        }
    });
    //Use the built in datatables API to filter the existing rows by the Category column
    $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
        var selectedItem = $("#Statusclaim").val();
        var category = data[categoryIndex];
        if (selectedItem === "" || category.includes(selectedItem)) {
            return true;
        }
        return false;
    });
    //Set the change event for the Category Filter dropdown to redraw the datatable each time
    //a user selects a new filter.
    $("#Statusclaim").change(function (e) {
        table.draw();
    });
    table.draw();

    $("#cashadvancetable").dataTable({
        searching: true,
        lengthChange: false,
        scrollX: true,
        lengthMenu: [5, 10],
        responsive: false,
        info: false,
        dom: '<"top">rt<"bottom"p><"clear">',
    });

    var table2 = $("#cashadvancetable").DataTable();
    //Take the category filter drop down and append it to the datatables_filter div.
    //You can use this same idea to move the filter anywhere withing the datatable that you want.
    $("#cashadvancetable_filter.dataTables_filter").append($("#Statuscash"));

    var categoryIndex2 = 0;
    $("#cashadvancetable th").each(function (i) {
        if ($($(this)).html() == "Status") {
            categoryIndex2 = i;
            return false;
        }
    });
    //Use the built in datatables API to filter the existing rows by the Category column
    $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
        var selectedItem2 = $("#Statuscash").val();
        var category2 = data[categoryIndex2];
        if (selectedItem2 === "" || category2.includes(selectedItem2)) {
            return true;
        }
        return false;
    });
    $("#Statuscash").change(function (e) {
        table2.draw();
    });
    table2.draw();

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
});
