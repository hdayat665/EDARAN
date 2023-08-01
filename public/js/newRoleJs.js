$(document).ready(function () {

    // Check all checkboxes when "ALL ACCESS" is checked
    $("#allAccessCheckbox").on("change", function () {
        if ($(this).prop("checked")) {
            // Find all checkboxes inside the "panel-body" and check them, excluding the ones with class "excludeFromAllAccess"
            $(".panel-body input[type='checkbox']:not(.excludeFromAllAccess)").prop("checked", true);
        } else {
            // Uncheck all checkboxes inside the "panel-body"
            $(".panel-body input[type='checkbox']").prop("checked", false);
        }
    });

    $("#systemRoleTable").DataTable({
        responsive: true,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        initComplete: function (settings, json) {
            $("#systemRoleTable").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });
      
});
