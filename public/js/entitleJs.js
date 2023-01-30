$(document).ready(function () {
    $(document).on("click", "#viewClaimButton", function () {
        $("#claimBenefit").modal("show");
    });

    $(document).on("click", "#viewSubsButton", function () {
        $("#subsModal").modal("show");
    });

    $(document).on("click", "#editEntitleSubsistanceButton", function () {
        $("#editEntitleSubsistanceModal").modal("show");
    });

    $(document).on("click", "#editEntitleClaimButton", function () {
        $("#editEntitleClaimModal").modal("show");
    });

    $(document).on("click", "#viewSubsAddButton", function () {
        var id = $(this).data("id");
        var vehicleData = getEclaimGeneralById(id);

        vehicleData.done(function (data) {
            $("#area_name").val(data.area_name);
            $("#idAddSubs").val(data.id);
            $("#valuesubsistence").val(data.value);
        });
        $("#editSubsModal").modal("show");
    });

    $(document).on("click", "#viewClaimAddButton", function () {
        var id = $(this).data("id");
        var vehicleData = getClaimCategoryById(id);

        vehicleData.done(function (data) {
            console.log(data);
            $("#claim_catagory").val(data.claim_catagory);
            $("#idAddClaim").val(data.id);
            $("#valueclaim").val(data.claim_value);
        });
        $("#editClaimModal").modal("show");
    });

    function getEclaimGeneralById(id) {
        return $.ajax({
            url: "/getEclaimGeneralById/" + id,
        });
    }

    function getClaimCategoryById(id) {
        return $.ajax({
            url: "/claimCatById/" + id,
        });
    }

    $(document).on("click", "#editModalButton", function () {
        var id = $(this).data("id");
        var vehicleData = getEclaimGeneralById(id);

        vehicleData.done(function (data) {
            console.log(data);
            $("#area_name").val(data.area_name);
            $("#idE").val(data.id);
        });
        $("#updateModal").modal("show");
    });

    $("#tableEntitle").DataTable({});

    $("#saveButton").click(function (e) {
        $("#addForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(document.getElementById("addForm"));

                    $.ajax({
                        type: "POST",
                        url: "/createEntitleGroup",
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
            },
        });
    });

    $("#editButton").click(function (e) {
        $("#editForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("editForm")
                    );
                    var id = $("#idEG").val();
                    // alert(id);
                    $.ajax({
                        type: "POST",
                        url: "/updateEntitleGroup/" + id,
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
            },
        });
    });

    $(document).on("click", "#deleteButton", function () {
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
                    url: "/deleteEntitleGroup/" + id,
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

    $("#plusbtn").click(function () {
        $("#mileagecharge1").show();
        $("#mileagekm1").show();
        $("#minusbtn").show();
        $("#minusbtn1").show();
        $("#plusbtn1").show();
        $("#km2").show();
        $("#minusbtn").prop("disabled", true);
    });

    $("#plusbtn1").click(function () {
        $("#mileagecharge2").show();
        $("#mileagekm2").show();
        $("#minusbtn2").show();
        $("#km3").show();
        $("#minusbtn1").prop("disabled", true);
    });

    $("#minusbtn1").click(function () {
        $("#mileagecharge1").hide();
        $("#mileagekm1").hide();
        $("#plusbtn1").hide();
        $("#minusbtn1").hide();
        $("#minusbtn").hide();
        $("#km2").hide();
        $("#minusbtn").prop("disabled", false);
    });

    $("#minusbtn").click(function () {
        $("#mileagecharge1").hide();
        $("#mileagekm1").hide();
    });

    $("#minusbtn2").click(function () {
        $("#mileagecharge2").hide();
        $("#mileagekm2").hide();
        $("#minusbtn2").hide();
        $("#km3").hide();
        $("#minusbtn1").prop("disabled", false);
    });

    //motor
    $("#plusmbtn").click(function () {
        $("#mileagemcharge1").show();
        $("#mileagemkm1").show();
        $("#minusmbtn").show();
        $("#minusmbtn1").show();
        $("#plusmbtn1").show();
        $("#mkm2").show();
        $("#minusmbtn").prop("disabled", true);
    });

    $("#plusmbtn1").click(function () {
        $("#mileagemcharge2").show();
        $("#mileagemkm2").show();
        $("#minusmbtn2").show();
        $("#mkm3").show();
        $("#minusmbtn1").prop("disabled", true);
    });

    $("#minusmbtn1").click(function () {
        $("#mileagemcharge1").hide();
        $("#mileagemkm1").hide();
        $("#plusmbtn1").hide();
        $("#minusmbtn1").hide();
        $("#minusmbtn").hide();
        $("#mkm2").hide();
        $("#minusmbtn").prop("disabled", false);
    });

    $("#minusmbtn").click(function () {
        $("#mileagemcharge1").hide();
        $("#mileagemkm1").hide();
    });

    $("#minusmbtn2").click(function () {
        $("#mileagemcharge2").hide();
        $("#mileagemkm2").hide();
        $("#minusmbtn2").hide();
        $("#mkm3").hide();
        $("#minusmbtn1").prop("disabled", false);
    });

    $('[data-toggle="tooltip1"]').tooltip();
    $('[data-toggle="tooltip2"]').tooltip();

    $(".unlimited").click(function () {
        var text = "";
        $(".unlimited:checked").each(function () {
            text += $(this).val() + ",";
        });
        text = text.substring(0, text.length - 1);
        $("#valuesubsistence").val(text);
        var count = $("[type='checkbox']:checked".length);
        $("#count").val($("[type='checkbox']:checked").length);
    });

    $(".unlimited1").click(function () {
        var text = "";
        $(".unlimited1:checked").each(function () {
            text += $(this).val() + ",";
        });
        text = text.substring(0, text.length - 1);
        $("#valueclaim").val(text);
        var count = $("[type='checkbox']:checked".length);
        $("#count").val($("[type='checkbox']:checked").length);
    });

    $(document).on("change", "#ulocalhotela", function () {
        if ($(this).val() == "2") {
            $("#ulocalhoteli").show();
        } else {
            $("#ulocalhoteli").hide();
            $("#ulocalhotelval").val("");
        }
    });

    $(document).on("change", "#ulodginghotela", function () {
        if ($(this).val() == "2") {
            $("#ulodginghoteli").show();
        } else {
            $("#ulodginghoteli").hide();
            $("#lodging_allowance_val").val("");
        }
    });

    $(document).on("change", "#lodginghotela", function () {
        if ($(this).val() == "2") {
            $("#lodginghoteli").show();
        } else {
            $("#ulodginghoteli").hide();
        }
    });

    $(document).on("change", "#localhotela", function () {
        if ($(this).val() == "2") {
            $("#localhoteli").show();
        } else {
            $("#localhoteli").hide();
        }
    });

    //
    $(document).on("change", "#lodgingallowance", function () {
        if ($(this).val() == "2") {
            $("#lodginghoteli").show();
        } else {
            $("#lodginghoteli").hide();
        }
    });

    $(".statusCheck").on("change", function () {
        var checkedValue = $(".statusCheck:checked").val();
        var id = $(this).data("id");

        if (checkedValue) {
            var status = 1;
        } else {
            var status = 2;
        }
        console.log(status);
        requirejs(["sweetAlert2"], function (swal) {
            $.ajax({
                type: "get",
                url: "/updateStatusEntitleGroup/" + id + "/" + status,
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

    $("#addUpdateSubs").click(function (e) {
        $("#addUpdateForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("addUpdateForm")
                    );
                    var id = $("#idAddSubs").val();

                    $.ajax({
                        type: "POST",
                        url: "/updateSubsistance/" + id,
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
            },
        });
    });
    $("#addUpdateClaimCatButton").click(function (e) {
        $("#addUpdateClaimCatForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("addUpdateClaimCatForm")
                    );
                    var id = $("#idAddClaim").val();

                    $.ajax({
                        type: "POST",
                        url: "/updateClaimCategory/" + id,
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
            },
        });
    });
});
