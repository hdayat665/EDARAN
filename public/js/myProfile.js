$(document).ready(function() {

    $('#saveProfile').click(function(e) {

        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("formProfile"));

            $.ajax({
                type: "POST",
                url: "/updateMyProfile",
                data: data,
                dataType: "json",
                async: false,
                processData: false,
                contentType: false,
            }).done(function(data) {
                console.log(data);
                swal({
                    title: data.title,
                    text: data.msg,
                    type: data.type,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then(function() {
                    if (data.type == 'error') {

                    } else {
                        // window.location.href = "/myProfile";

                    }


                });
            });

        });
    });

    $('#saveAddress').click(function(e) {

        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("formAddress"));

            $.ajax({
                type: "POST",
                url: "/updateAddress",
                data: data,
                dataType: "json",
                async: false,
                processData: false,
                contentType: false,
            }).done(function(data) {
                // console.log(data);
                swal({
                    title: data.title,
                    text: data.msg,
                    type: data.type,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then(function() {
                    if (data.type == 'error') {

                    } else {
                        // window.location.href = "/dashboardTenant";

                    }


                });
            });

        });
    });

    $('#saveEmergency').click(function(e) {

        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("formEmergency"));

            $.ajax({
                type: "POST",
                url: "/updateEmergency",
                data: data,
                dataType: "json",
                async: false,
                processData: false,
                contentType: false,
            }).done(function(data) {
                // console.log(data);
                swal({
                    title: data.title,
                    text: data.msg,
                    type: data.type,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then(function() {
                    if (data.type == 'error') {

                    } else {
                        // window.location.href = "/dashboardTenant";

                    }


                });
            });

        });
    });

    $('#addCompanion').click(function(e) {

        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("addCompanionForm"));

            $.ajax({
                type: "POST",
                url: "/addCompanion",
                data: data,
                dataType: "json",
                async: false,
                processData: false,
                contentType: false,
            }).done(function(data) {
                // console.log(data);
                swal({
                    title: data.title,
                    text: data.msg,
                    type: data.type,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then(function() {
                    if (data.type == 'error') {

                    } else {
                        // window.location.href = "/dashboardTenant";

                    }


                });
            });

        });
    });

    companion = ['1', '2', '3', '4'];

    for (let i = 1; i < companion.length; i++) {
        const no = companion[i];
        $('#updateCompanion' + no).click(function(e) {

            requirejs(['sweetAlert2'], function(swal) {

                var data = new FormData(document.getElementById("updateCompanionForm" + no));

                $.ajax({
                    type: "POST",
                    url: "/updateCompanion",
                    data: data,
                    dataType: "json",
                    async: false,
                    processData: false,
                    contentType: false,
                }).done(function(data) {
                    // console.log(data);
                    swal({
                        title: data.title,
                        text: data.msg,
                        type: data.type,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then(function() {
                        if (data.type == 'error') {

                        } else {
                            window.location.href = "/myProfile";

                        }


                    });
                });

            });
        });
    }

    $("#tableChildren").DataTable({
        responsive: true,
    });

    $('#childModalAdd').click(function(e) {
        $('#add-children').modal('show');
    });

    $('#addChildren').click(function(e) {
        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("addChildrenForm"));

            $.ajax({
                type: "POST",
                url: "/addChildren",
                data: data,
                dataType: "json",
                async: false,
                processData: false,
                contentType: false,
            }).done(function(data) {
                swal({
                    title: data.title,
                    text: data.msg,
                    type: data.type,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then(function() {
                    if (data.type == 'error') {

                    } else {
                        location.reload();
                        // $('#tableChildren').DataTable()  .ajax.reload()
                    }


                });
            });

        });
    });

    $('#editChildren').click(function(e) {
        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("editChildrenForm"));

            $.ajax({
                type: "POST",
                url: "/updateChildren",
                data: data,
                dataType: "json",
                async: false,
                processData: false,
                contentType: false,
            }).done(function(data) {
                // console.log(data);
                swal({
                    title: data.title,
                    text: data.msg,
                    type: data.type,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then(function() {
                    if (data.type == 'error') {

                    } else {
                        location.reload();
                    }


                });
            });

        });
    });


    childId = $('#childId').val();

    childIds = childId.split(',');

    for (let i = 0; i < childIds.length; i++) {

        const type = childIds[i];
        $('#childModalEdit' + type).click(function(e) {

            id = $(this).data('id');
            var childrenData = getChildren(id);

            childrenData.done(function(data) {
                child = data.data;
                $('#DOB1').val(child.DOB);
                $('#age1').val(child.age);
                $('#created_at1').val(child.created_at);
                $("#educationLevel1").prop("selectedIndex", child.educationLevel);
                $("#educationType1").prop("selectedIndex", child.educationType);
                $('#expiryDate1').val(child.expiryDate);
                $('#firstName1').val(child.firstName);
                $('#fullName1').val(child.fullName);
                $("#gender1").prop("selectedIndex", child.gender);
                $('#id1').val(child.id);
                $('#idNo1').val(child.idNo);
                $('#instituition1').val(child.instituition);
                $("#issuingCountry1").prop("selectedIndex", child.issuingCountry);
                $('#lastName1').val(child.lastName);
                $("#maritalStatus1").prop("selectedIndex", child.maritalStatus);
                if (child.nonCitizen == 'on') {
                    $('#nonCitizen1').prop('checked', true);
                }
                $('#passports1').val(child.passport);
                $('#supportDoc1').val(child.supportDoc);
            });
            $('#edit-children').modal('show');
        });

        $('#childModalView' + type).click(function(e) {
            id = $(this).data('id')
            var childrenData = getChildren(id);

            childrenData.done(function(data) {
                $('#viewChildren').hide();
                child = data.data;
                $('#DOB').val(child.DOB);
                $('#age').val(child.age);
                $('#created_at').val(child.created_at);
                $("#educationLevel").prop("selectedIndex", child.educationLevel);
                $("#educationType").prop("selectedIndex", child.educationType);
                $('#expiryDate').val(child.expiryDate);
                $('#firstName').val(child.firstName);
                $('#fullName').val(child.fullName);
                $("#gender").prop("selectedIndex", child.gender);
                $('#id').val(child.id);
                $('#idNo').val(child.idNo);
                $('#instituition').val(child.instituition);
                $("#issuingCountry").prop("selectedIndex", child.issuingCountry);
                $('#lastName').val(child.lastName);
                $("#maritalStatus").prop("selectedIndex", child.maritalStatus);
                if (child.nonCitizen === 'on') {
                    $('#nonCitizen').prop('checked', true);
                }
                $('#passports').val(child.passport);
                $('#supportDoc').val(child.supportDoc);
            });

            $('#view-children').modal('show');
        });

        $('#deleteChildren' + type).click(function(e) {
            id = $(this).data('id');
            requirejs(['sweetAlert2'], function(swal) {
                swal({
                    title: "Are you sure!",
                    type: "error",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes!",
                    showCancelButton: true,
                }).then(function() {
                    $.ajax({
                        type: "DELETE",
                        url: "/deleteChildren/" + id,
                        dataType: "json",
                        async: false,
                        processData: false,
                        contentType: false,
                    }).done(function(data) {
                        swal({
                            title: data.title,
                            text: data.msg,
                            type: data.type,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                        }).then(function() {
                            if (data.type == 'error') {

                            } else {
                                location.reload();
                            }
                        });
                    });
                });
            });
        });


        function getChildren(id) {
            return $.ajax({
                url: "/getChildren/" + id
            });

        }

    }

    $("#tableSibling").DataTable({
        responsive: true,
    });

    $('#siblingModalAdd').click(function(e) {
        $('#add-sibling').modal('show');
    });

    $('#addSibling').click(function(e) {
        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("addSiblingForm"));

            $.ajax({
                type: "POST",
                url: "/addSibling",
                data: data,
                dataType: "json",
                async: false,
                processData: false,
                contentType: false,
            }).done(function(data) {
                swal({
                    title: data.title,
                    text: data.msg,
                    type: data.type,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then(function() {
                    if (data.type == 'error') {

                    } else {
                        location.reload();
                        // $('#tableSibling').DataTable()  .ajax.reload()
                    }


                });
            });

        });
    });

    $('#editSibling').click(function(e) {
        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("editSiblingForm"));

            $.ajax({
                type: "POST",
                url: "/updateSibling",
                data: data,
                dataType: "json",
                async: false,
                processData: false,
                contentType: false,
            }).done(function(data) {
                // console.log(data);
                swal({
                    title: data.title,
                    text: data.msg,
                    type: data.type,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then(function() {
                    if (data.type == 'error') {

                    } else {
                        location.reload();
                    }


                });
            });

        });
    });


    siblingId = $('#siblingId').val();

    siblingIds = siblingId.split(',');

    for (let i = 0; i < siblingIds.length; i++) {

        const type = siblingIds[i];
        $('#siblingModalEdit' + type).click(function(e) {
            id = $(this).data('id');
            var SiblingData = getSibling(id);

            SiblingData.done(function(data) {
                sibling = data.data;
                $('#firstNameS').val(sibling.firstName);
                $('#idSA').val(sibling.id);
                $('#lastNameS').val(sibling.lastName);
                $('#DOBS').val(sibling.DOB);
                $("#genderS").prop("selectedIndex", sibling.gender);
                $('#contactNoS').val(sibling.contactNo);
                $('#relationshipS').val(sibling.relationship);
                $('#address2S').val(sibling.address2);
                $('#address1S').val(sibling.address1);
                $('#postcodeS').val(sibling.postcode);
                $("#cityS").prop("selectedIndex", sibling.city);
                $("#stateSA").prop("selectedIndex", sibling.state);
                var select = document.getElementById('countrySA');

                const options = Array.from(select.options);
                options.forEach((option, i) => {
                    if (option.value === sibling.country) select.selectedIndex = i;
                });
                // $('#countrySA').prop("selected", sibling.country);
            });
            $('#edit-sibling').modal('show');
        });

        $('#siblingModalView' + type).click(function(e) {
            id = $(this).data('id')
            var SiblingData = getSibling(id);
            $('input').prop('disabled', true);
            $('select').prop('disabled', true);
            SiblingData.done(function(data) {
                console.log(data.data);
                $('#viewSibling').hide();
                sibling = data.data;
                $('#firstNameS1').val(sibling.firstName);
                $('#lastNameS1').val(sibling.lastName);
                $('#DOBS1').val(sibling.DOB);
                $("#genderS1").prop("selectedIndex", sibling.gender);
                $('#relationshipS1').val(sibling.relationship);
                $('#contactNoS1').val(sibling.contactNo);
                $('#address2S1').val(sibling.address2);
                $('#address1S1').val(sibling.address1);
                $('#postcodeS1').val(sibling.postcode);
                $("#cityS1").prop("selectedIndex", sibling.city);
                $("#stateS1").prop("selectedIndex", sibling.state);
                $('#countryS1').prop("selectedIndex", sibling.country);
                var select = document.getElementById('countryS1');

                const options = Array.from(select.options);
                options.forEach((option, i) => {
                    if (option.value === sibling.country) select.selectedIndex = i;
                });
            });

            $('#view-sibling').modal('show');
        });

        $('#deleteSibling' + type).click(function(e) {
            id = $(this).data('id');
            requirejs(['sweetAlert2'], function(swal) {
                swal({
                    title: "Are you sure!",
                    type: "error",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes!",
                    showCancelButton: true,
                }).then(function() {
                    $.ajax({
                        type: "DELETE",
                        url: "/deleteSibling/" + id,
                        dataType: "json",
                        async: false,
                        processData: false,
                        contentType: false,
                    }).done(function(data) {
                        swal({
                            title: data.title,
                            text: data.msg,
                            type: data.type,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                        }).then(function() {
                            if (data.type == 'error') {

                            } else {
                                location.reload();
                            }
                        });
                    });
                });
            });
        });


        function getSibling(id) {
            return $.ajax({
                url: "/getSiblingById/" + id
            });

        }

    }

    $("#tableParent").DataTable({
        responsive: true,
    });

    $('#parentModalAdd').click(function(e) {
        // alert('ss');
        $('#add-parent').modal('show');
    });

    $('#addParent').click(function(e) {
        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("addParentForm"));

            $.ajax({
                type: "POST",
                url: "/addParent",
                data: data,
                dataType: "json",
                async: false,
                processData: false,
                contentType: false,
            }).done(function(data) {
                swal({
                    title: data.title,
                    text: data.msg,
                    type: data.type,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then(function() {
                    if (data.type == 'error') {

                    } else {
                        location.reload();
                        // $('#tableParent').DataTable()  .ajax.reload()
                    }


                });
            });

        });
    });

    $('#editParent').click(function(e) {
        requirejs(['sweetAlert2'], function(swal) {

            var data = new FormData(document.getElementById("editParentForm"));

            $.ajax({
                type: "POST",
                url: "/updateParent",
                data: data,
                dataType: "json",
                async: false,
                processData: false,
                contentType: false,
            }).done(function(data) {
                // console.log(data);
                swal({
                    title: data.title,
                    text: data.msg,
                    type: data.type,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then(function() {
                    if (data.type == 'error') {

                    } else {
                        location.reload();
                    }


                });
            });

        });
    });


    parentId = $('#parentId').val();

    parentIds = parentId.split(',');

    for (let i = 0; i < parentIds.length; i++) {

        const type = parentIds[i];
        $('#parentModalEdit' + type).click(function(e) {

            id = $(this).data('id');
            var ParentData = getParent(id);

            ParentData.done(function(data) {
                console.log(data.data);
                parent = data.data;
                $('#DOBP1').val(parent.DOB);
                $('#idP').val(parent.id);
                $('#address2P1').val(parent.address2);
                $('#address1P1').val(parent.address1);
                $("#cityP1").prop("selectedIndex", parent.city);
                $("#stateP1").prop("selectedIndex", parent.state);
                $('#countryP1').prop("selectedIndex", parent.country);
                $('#contactNoP1').val(parent.contactNo);
                $('#firstNames1').val(parent.firstName);
                $("#postcodeP1").val(parent.postcode);
                $('#lastNameP1').val(parent.lastName);
                $("#relationshipP1").prop("selectedIndex", parent.relationship);
                if (parent.nonCitizen == 'on') {
                    $('#nonCitizenP1').prop('checked', true);
                }
            });
            $('#edit-parent').modal('show');
        });

        $('#parentModalView' + type).click(function(e) {
            id = $(this).data('id')
            var ParentData = getParent(id);

            $('input').prop('disabled', true);
            $('select').prop('disabled', true);

            ParentData.done(function(data) {
                $('#viewParent').hide();
                parent = data.data;
                $('#DOBP').val(parent.DOB);
                $('#address1P').val(parent.address1);
                $('#address2P').val(parent.address2);
                $("#cityP").prop("selectedIndex", parent.city);
                $("#stateP").prop("selectedIndex", parent.state);
                $('#contactNoP').val(parent.contactNo);
                $('#firstNameP').val(parent.firstName);
                $('#countryP').prop("selectedIndex", parent.country);
                $("#postcodeP").val(parent.postcode);
                $('#lastNameP').val(parent.lastName);
                $("#relationshipP").prop("selectedIndex", parent.relationship);
                if (parent.nonCitizen == 'on') {
                    $('#nonCitizenP').prop('checked', true);
                }
            });

            $('#view-parent').modal('show');
        });

        $('#deleteParent' + type).click(function(e) {
            id = $(this).data('id');
            requirejs(['sweetAlert2'], function(swal) {
                swal({
                    title: "Are you sure!",
                    type: "error",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes!",
                    showCancelButton: true,
                }).then(function() {
                    $.ajax({
                        type: "DELETE",
                        url: "/deleteParent/" + id,
                        dataType: "json",
                        async: false,
                        processData: false,
                        contentType: false,
                    }).done(function(data) {
                        swal({
                            title: data.title,
                            text: data.msg,
                            type: data.type,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                        }).then(function() {
                            if (data.type == 'error') {

                            } else {
                                location.reload();
                            }
                        });
                    });
                });
            });
        });


        function getParent(id) {
            return $.ajax({
                url: "/getParentById/" + id
            });

        }

    }


    $("#changePassButton").click(function(e) {
        var data = new FormData(document.getElementById("changePassForm"));

        requirejs(["sweetAlert2"], function(swal) {
            $.ajax({
                type: "POST",
                url: "/resetPassword",
                data: data,
                dataType: "json",
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
                }).then(function() {
                    if (data.type == "error") {} else {
                        location.reload();
                    }
                });
            });
        });
    });


})