$(document).ready(function () {
    // $("#claimCategoryTable").DataTable({});

    $("#generalButton").click(function (e) {
        $("#generalForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("generalForm")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/createGeneralApprover",
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
                                // window.location.href = "/setting/eclaimCategoryView";
                            }
                        });
                    });
                });
            },
        });
    });

    $(document).on("change", "#recommenderGeneral", function () {
        roleId = $(this).val();
        $("#approverGeneralShow")
            .find("option")
            .remove()
            .end()
            .append(
                '<option label="Please Choose" selected="selected"> </option>'
            )
            .val("");

        function getUserByJobGrade(roleId) {
            return $.ajax({
                url: "/getUserByJobGrade/" + roleId,
            })
                .then(function (response) {})
                .fail(function (xhr, status, error) {});
        }

        $("#approverGeneralShow").find("option").end();

        var user = getUserByJobGrade(roleId);
        console.log(user);
        user.then(function (datas) {
            // console.log(datas);
            for (let i = 0; i < datas.length; i++) {
                const userApprover = datas[i];
                var opt = document.createElement("option");
                document.getElementById("approverGeneralShow").innerHTML +=
                    '<option value="' +
                    userApprover["id"] +
                    '">' +
                    userApprover["user_profile"]["fullName"] +
                    "</option>";
            }
        });
    });

    $(document).on("change", "#roleId", function () {
        roleId = $(this).val();
        // console.log(roleId + "roleid");
        $("#checker1,#checker2,#checker3,#checker4,#checker5,#recommender,#approver")
            .find("option")
            .remove()
            .end()
            .append(
                '<option label="Please Choose" selected="selected"> </option>'
            )
            .val("");

        function getUserByUserRole(roleId) {
            return $.ajax({
                url: "/getUserByUserRole/" + roleId,
            });
        }

        $("#checker1").find("option").end();

        var user = getUserByUserRole(roleId);

        user.then(function (data) {
            for (let i = 0; i < data.length; i++) {
                const user = data[i];
                console.log(data[i]);
                var opt = document.createElement("option");
                document.getElementById("checker1").innerHTML +=
                    '<option value="' +
                    user["up_user_id"] +
                    '">' +
                    user["user_profile"]["fullName"] +
                    "</option>";
                document.getElementById("checker2").innerHTML +=
                    '<option value="' +
                    user["up_user_id"] +
                    '">' +
                    user["user_profile"]["fullName"] +
                    "</option>";
                document.getElementById("checker3").innerHTML +=
                    '<option value="' +
                    user["up_user_id"] +
                    '">' +
                    user["user_profile"]["fullName"] +
                    "</option>";
                document.getElementById("checker4").innerHTML +=
                    '<option value="' +
                    user["up_user_id"] +
                    '">' +
                    user["user_profile"]["fullName"] +
                    "</option>";
                document.getElementById("checker5").innerHTML +=
                    '<option value="' +
                    user["up_user_id"] +
                    '">' +
                    user["user_profile"]["fullName"] +
                    "</option>";
                document.getElementById("recommender").innerHTML +=
                    '<option value="' +
                    user["up_user_id"] +
                    '">' +
                    user["user_profile"]["fullName"] +
                    "</option>";
                document.getElementById("approver").innerHTML +=
                    '<option value="' +
                    user["up_user_id"] +
                    '">' +
                    user["user_profile"]["fullName"] +
                    "</option>";
            }
        });
    });

    $(document).on("change", "#roleIdC", function () {
        roleId = $(this).val();
        const inputs = [
            "checker1C",
            "checker2C",
            "checker3C",
            "recommenderC",
            "approverC",
        ];

        for (let i = 0; i < inputs.length; i++) {
            $("#" + inputs[i] + "")
                .find("option")
                .remove()
                .end()
                .append(
                    '<option label="Please Choose" selected="selected"> </option>'
                )
                .val("");

            function getUserByUserRole(roleId) {
                return $.ajax({
                    url: "/getUserByUserRole/" + roleId,
                });
            }
            $("#" + inputs[i] + "")
                .find("option")
                .end();
        }

        var user = getUserByUserRole(roleId);

        user.then(function (data) {
            // console.log(data.user_profile.id);
            for (let i = 0; i < data.length; i++) {
                const user = data[i];
                for (let i = 0; i < inputs.length; i++) {}
                var opt = document.createElement("option");
                document.getElementById("checker1C").innerHTML +=
                    '<option value="' +
                    user["up_user_id"] +
                    '">' +
                    user["user_profile"]["fullName"] +
                    "</option>";
                document.getElementById("checker2C").innerHTML +=
                    '<option value="' +
                    user["up_user_id"] +
                    '">' +
                    user["user_profile"]["fullName"] +
                    "</option>";
                document.getElementById("checker3C").innerHTML +=
                    '<option value="' +
                    user["up_user_id"] +
                    '">' +
                    user["user_profile"]["fullName"] +
                    "</option>";
                document.getElementById("recommenderC").innerHTML +=
                    '<option value="' +
                    user["up_user_id"] +
                    '">' +
                    user["user_profile"]["fullName"] +
                    "</option>";
                document.getElementById("approverC").innerHTML +=
                    '<option value="' +
                    user["up_user_id"] +
                    '">' +
                    user["user_profile"]["fullName"] +
                    "</option>";
            }
        });
    });

    $(document).on("change", "#roleIdF", function () {
        roleId = $(this).val();
        const inputs = [
            "checker1F",
            "checker2F",
            "checker3F",
            "recommenderF",
            "approverF",
        ];

        for (let i = 0; i < inputs.length; i++) {
            $("#" + inputs[i] + "")
                .find("option")
                .remove()
                .end()
                .append(
                    '<option label="Please Choose" selected="selected"> </option>'
                )
                .val("");

            function getUserByUserRole(roleId) {
                return $.ajax({
                    url: "/getUserByUserRole/" + roleId,
                });
            }
            $("#" + inputs[i] + "")
                .find("option")
                .end();
        }

        var user = getUserByUserRole(roleId);

        user.then(function (data) {
            // console.log(data.user_profile.id);
            for (let i = 0; i < data.length; i++) {
                const user = data[i];
                for (let i = 0; i < inputs.length; i++) {}
                var opt = document.createElement("option");
                document.getElementById("checker1F").innerHTML +=
                    '<option value="' +
                    user["up_user_id"] +
                    '">' +
                    user["user_profile"]["fullName"] +
                    "</option>";
                document.getElementById("checker2F").innerHTML +=
                    '<option value="' +
                    user["up_user_id"] +
                    '">' +
                    user["user_profile"]["fullName"] +
                    "</option>";
                document.getElementById("checker3F").innerHTML +=
                    '<option value="' +
                    user["up_user_id"] +
                    '">' +
                    user["user_profile"]["fullName"] +
                    "</option>";
                document.getElementById("recommenderF").innerHTML +=
                    '<option value="' +
                    user["up_user_id"] +
                    '">' +
                    user["user_profile"]["fullName"] +
                    "</option>";
                document.getElementById("approverF").innerHTML +=
                    '<option value="' +
                    user["up_user_id"] +
                    '">' +
                    user["user_profile"]["fullName"] +
                    "</option>";
            }
        });
    });

    $("#claimAdminButton").click(function (e) {
        $("#claimAdminForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("claimAdminForm")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/createDomainList",
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

    $("#claimFinanceButton").click(function (e) {
        $("#claimFinanceForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("claimFinanceForm")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/createDomainList",
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

    $("#cashAdminButton").click(function (e) {
        $("#cashAdminForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("cashAdminForm")
                    );

                    $.ajax({
                        type: "POST",
                        url: "/createDomainList",
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

    $("#updateButton").click(function (e) {
        var id = $("#idClaim").val();
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
                        url: "/updateClaimCategory/" + id,
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
                                window.location.href =
                                    "/setting/eclaimCategoryView";
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
                title: "Are you sure to delete Role?",
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes!",
                showCancelButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
            }).then(function () {
                $.ajax({
                    type: "POST",
                    url: "/deleteClaimCategory/" + id,
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

    
    function getroleAdmin(id) {
        return $.ajax({
            url: "/getroleAdmin/" + id,
        });
    }

    // Event when 'addapproval' is clicked
    $(document).on("click", "#addapproval", function () {
        var id = $(this).data("id");
        console.log(id + "id");
        var vehicleData = getroleAdmin(id);

        vehicleData.then(function (data) {
            // console.log(data);
            $("#roleId").val(data.role);
            $("#id").val(data.id);
            function addOption(elementId, value, name) {
                var selectElement = document.getElementById(elementId);
                if (value && name) {
                    selectElement.innerHTML += '<option value="' + value + '">' + name + '</option>';
                } else {
                    selectElement.innerHTML += '<option value="">Please Choose</option>';
                }
            }
            
            addOption("checker1", data.checker1, data.checker1Name);
            addOption("checker2", data.checker2, data.checker2Name);
            addOption("checker3", data.checker3, data.checker3Name);
            addOption("checker4", data.checker4, data.checker4Name);
            addOption("checker5", data.checker5, data.checker5Name);
            addOption("recommender", data.recommender, data.recommenderName);
            addOption("approver", data.approver, data.approverName);
        });

        $("#addapprovalmodal").modal("show");
    });

    // To store the selected values
    var dropdownValues = {};

    // Capture the current value on mousedown for any dropdown
    $(document).on("mousedown", ".checker-dropdown", function () {
        var dropdownId = $(this).attr("id");
        dropdownValues[dropdownId] = $(this).val();
    });

    // Common function for handling dropdown focus
    function handleDropdownFocus(dropdownId) {
        // Fetch the current value before clearing the dropdown
        var currentValue = $("#" + dropdownId).val();
    
        // Clear existing options in dropdown
        $("#" + dropdownId).empty();
    
        // Re-add the 'Please Choose' option as the first option
        $("#" + dropdownId).append('<option label="Please Choose"> </option>');
    
        // Fetch and populate options based on currently selected 'roleId' or 'roleIdF'
        var roleId;
        if (["checker1F", "checker2F","checker3F", "checker4F", "checker5F", "recommenderF","approverF"].includes(dropdownId)) { //shortcut for below
            // if (dropdownId === "checker2F" || dropdownId === "checker1F") {
            roleId = $("#roleIdF").val();
        } else if (["checker1C", "checker2C","checker3C", "checker4C", "checker5C","recommenderC","approverC"].includes(dropdownId)) {
            roleId = $("#roleIdC").val();
        }
        else {
            roleId = $("#roleId").val();
        }
    
        function getUserByUserRole(roleId) {
            return $.ajax({
                url: "/getUserByUserRole/" + roleId,
            });
        }
    
        var users = getUserByUserRole(roleId);
    
        users.then(function (data) {
            var dropdownElement = document.getElementById(dropdownId);
            for (let i = 0; i < data.length; i++) {
                const userItem = data[i];
                var opt = document.createElement("option");
                opt.value = userItem["up_user_id"];
                opt.textContent = userItem["user_profile"]["fullName"];
                dropdownElement.appendChild(opt);
            }
    
            // Reselect the previously selected option
            if (currentValue) {
                $("#" + dropdownId).val(currentValue);
            } else {
                $("#" + dropdownId).val(dropdownValues[dropdownId]);
            }
        });
    }
    

    // Simplify focus events for dropdowns
    $(document).on("focus", ".dropdown-focus-handler", function () {
        var dropdownId = $(this).attr("id");
        handleDropdownFocus(dropdownId);
    });

    // Event when 'checker1' dropdown gets focus
    $(document).on("focus", "#checker1, #checker2, #checker3, #checker4, #checker5, #recommender, #approver", function () {
        handleDropdownFocus($(this).attr("id"));
    });
    


    //finance
    function getroleFinance(id) {
        return $.ajax({
            url: "/getroleFinance/" + id,
        });
    }

     // Event when 'addapproval' is clicked
     $(document).on("click", "#financemodal", function () {
        var id = $(this).data("id");
        console.log(id + "id");
        var vehicleData = getroleFinance(id);

        vehicleData.then(function (data) {
            // console.log(data);
            $("#roleIdF").val(data.role);
            $("#idF").val(data.id);
            function addOption(elementId, value, name) {
                var selectElement = document.getElementById(elementId);
                if (value && name) {
                    selectElement.innerHTML += '<option value="' + value + '">' + name + '</option>';
                } else {
                    selectElement.innerHTML += '<option value="">Please Choose</option>';
                }
            }
            
            addOption("checker1F", data.checker1, data.checker1Name);
            addOption("checker2F", data.checker2, data.checker2Name);
            addOption("checker3F", data.checker3, data.checker3Name);
            addOption("recommenderF", data.recommender, data.recommenderName);
            addOption("approverF", data.approver, data.approverName);
            addOption("checker4F", data.checker4, data.checker4Name);
            addOption("checker5F", data.checker5, data.checker5Name);
        });

        $("#financeopenmodal").modal("show");
    });

    $(document).on("focus", "#checker1F, #checker2F, #checker3F, #checker4F, #checker5F, #recommenderF, #approverF", function () {
        handleDropdownFocus($(this).attr("id"));
    });

    // addcashadvance

    function getroleCA(id) {
        return $.ajax({
            url: "/getroleCA/" + id,
        });
    }

    $(document).on("click", "#cashadvancemodal", function () {
        var id = $(this).data("id");
        console.log(id + "id");
        var vehicleData = getroleCA(id);

        vehicleData.then(function (data) {
            // console.log(data);
            $("#roleIdC").val(data.role);
            $("#idCA").val(data.id);
            function addOption(elementId, value, name) {
                var selectElement = document.getElementById(elementId);
                if (value && name) {
                    selectElement.innerHTML += '<option value="' + value + '">' + name + '</option>';
                } else {
                    selectElement.innerHTML += '<option value="">Please Choose</option>';
                }
            }
            
            addOption("checker1C", data.checker1, data.checker1Name);
            addOption("checker2C", data.checker2, data.checker2Name);
            addOption("checker3C", data.checker3, data.checker3Name);
            addOption("recommenderC", data.recommender, data.recommenderName);
            addOption("approverC", data.approver, data.approverName);
            addOption("checker4C", data.checker4, data.checker4Name);
            addOption("checker5C", data.checker5, data.checker5Name);
        });

        $("#casheopenmodal").modal("show");
    });

    $(document).on("focus", "#checker1C, #checker2C, #checker3C, #checker4C, #checker5C, #recommenderC, #approverC", function () {
        handleDropdownFocus($(this).attr("id"));
    });
    
});
