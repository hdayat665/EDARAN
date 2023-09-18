$(document).ready(function () {
    // Check all checkboxes when "ALL ACCESS" is checked
    $("#allAccessCheckbox").on("change", function () {
        if ($(this).prop("checked")) {
            // Find all checkboxes inside the "panel-body" and check them, excluding the ones with class "excludeFromAllAccess"
            $(
                ".panel-body input[type='checkbox']:not(.excludeFromAllAccess)"
            ).prop("checked", true);
        } else {
            // Uncheck all checkboxes inside the "panel-body"
            $(".panel-body input[type='checkbox']").prop("checked", false);
        }
    });

    ////////////////////////////////////////////////////////////////////
    $(".level1-checkbox").on("change", function () {
        var isChecked = $(this).prop("checked");
        var $parentPanel = $(this).closest(".panel-body");
        $parentPanel.find(".level-checkbox").prop("checked", isChecked);
    });
    $(".level2-checkbox").on("change", function () {
        var level2Id = $(this).data("level2");
        var $parentPanel = $(this).closest(".panel-body");
        
        $parentPanel.find(".level3-checkbox[data-level2='" + level2Id + "']").prop("checked", $(this).prop("checked"));
        
        $parentPanel.find(".level4-checkbox[data-level2='" + level2Id + "']").prop("checked", $(this).prop("checked"));

        var anyLevel2Checked = $parentPanel.find(".level2-checkbox:checked").length > 0;

        $parentPanel.find(".level1-checkbox").prop("checked", anyLevel2Checked);
    });
    $(".level3-checkbox").on("change", function () {
        var level2Id = $(this).data("level2");
        var level3Id = $(this).data("level3");
        var $parentPanel = $(this).closest(".panel-body");
        
        $parentPanel.find(".level4-checkbox[data-level3='" + level3Id + "']").prop("checked", $(this).prop("checked"));
    
        var anyLevel3Checked = $parentPanel.find(".level3-checkbox:checked").length > 0;
    
        $parentPanel.find(".level2-checkbox[data-level2='" + level2Id + "']").prop("checked", anyLevel3Checked);
    
        var anyLevel2Checked = $parentPanel.find(".level2-checkbox:checked").length > 0;
    
        $parentPanel.find(".level1-checkbox").prop("checked", anyLevel2Checked);
    });
    $(".level4-checkbox").on("change", function () {
        var level2Id = $(this).data("level2");
        var level3Id = $(this).data("level3");
        var level4Id = $(this).data("level4");
        var $parentPanel = $(this).closest(".panel-body");
    
        var anyLevel4Checked = $parentPanel.find(".level4-checkbox:checked").length > 0;
    
        $parentPanel.find(".level3-checkbox[data-level3='" + level3Id + "']").prop("checked", anyLevel4Checked);
    
        var anyLevel3Checked = $parentPanel.find(".level3-checkbox:checked").length > 0;
    
        $parentPanel.find(".level2-checkbox[data-level2='" + level2Id + "']").prop("checked", anyLevel3Checked);
    
        var anyLevel2Checked = $parentPanel.find(".level2-checkbox:checked").length > 0;
    
        $parentPanel.find(".level1-checkbox").prop("checked", anyLevel2Checked);
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

    $("#updateButton").click(function (e) {
        var id = $(this).data("id");
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
                        url: "/updateSystemRole/" + id,
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

    $(document).on("click", "#deleteBtn", function () {
        id = $(this).data("id");
        requirejs(["sweetAlert2"], function (swal) {
            swal({
                title: "Are you sure to delete?",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
            }).then(function () {
                $.ajax({
                    type: "POST",
                    url: "/deleteRole/" + id,
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
});
