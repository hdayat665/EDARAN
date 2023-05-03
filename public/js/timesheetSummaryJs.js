$(document).ready(function () {
    $("#timesheetapproval").dataTable({
        responsive: true,
        bLengthChange: true,
        bFilter: true,
    });

    $(document).on("click", "#cancelTimesheet", function () {
        id = $(this).data("id");
        requirejs(["sweetAlert2"], function (swal) {
            swal({
                title: "Are you sure to Cancel Timesheet?",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
            }).then(function () {
                $.ajax({
                    type: "POST",
                    url: "/deleteTimesheet/" + id,
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

    function getTotalDaysInCurrentMonth() {
        const now = new Date();
        const year = now.getFullYear();
        const month = now.getMonth() + 1; // add 1 because getMonth() returns zero-based index
        const lastDay = new Date(year, month, 0).getDate();
        let totalDays = lastDay;
        let totalWeekdays = 0;
        let totalWeekendDays = 0;

        for (let i = 1; i <= lastDay; i++) {
            const date = new Date(year, month - 1, i);
            const dayOfWeek = date.getDay();

            if (dayOfWeek === 0 || dayOfWeek === 6) {
                totalWeekendDays++;
            } else {
                totalWeekdays++;
            }
        }

        return { totalDays, totalWeekdays, totalWeekendDays };
    }

    const { totalDays, totalWeekdays, totalWeekendDays } =
        getTotalDaysInCurrentMonth();

    const totalDayMonthLabel = document.getElementById("totalDayMonth");
    totalDayMonthLabel.textContent = totalDays + " Days";

    const weekdaysLabel = document.getElementById("weekdays");
    weekdaysLabel.textContent = totalWeekdays + " Day";

    const weekendLabel = document.getElementById("weekend");
    weekendLabel.textContent = totalWeekendDays + " Day";

    console.log(`Total days: ${totalDays}`);
    console.log(`Total weekdays: ${totalWeekdays}`);
    console.log(`Total weekend days: ${totalWeekendDays}`);
});
