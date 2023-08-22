$(document).ready(function () {

    $("#effective-from").datepicker({
        todayHighlight: true,
        format: "yyyy/mm/dd",
        autoclose: true,
    });

    $(document).on("click", "#ViewTerminateModal", function () {
        var id = $(this).data("id");
        var EmployeeData = getEmployeeByJobHistory(id);


        EmployeeData.then(function (data) {
            // $("input").val("");

            statusData = data.data;
            console.log(statusData);
            $("#employeeId").val(statusData.employeeId);
            $("#employeeName").val(statusData.employeeName);
            $("#employeeEmail").val(statusData.employeeEmail);
            $("#report_to").val(statusData.fullName);
            $("#effectiveFrom").val(statusData.effectiveFrom);
            $("#remarks").val(statusData.remarks);
            $("#employmentDetail").val(statusData.employmentDetail);
            if (statusData.file) {
                $("#attachment").html(

                    '<a href="/storage/' + statusData.file + '" target="_blank">here</a>'
                );
            }



            $("#idc").val(statusData.id);

        });
        $("#viewTerminateInfo").modal("show");
    });

    function getEmployeeByJobHistory(id) {
            return $.ajax({
                url: "/getEmployeeByJobHistoryById/" + id,
        });
    }
});



