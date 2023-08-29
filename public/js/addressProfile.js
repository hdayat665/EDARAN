$(document).ready(function () {
//////////////////DROPDOWN ADDRESS///////////////
$(document).on("change", "#country_id, #countryparent, #countrycom, #countryc, #countryEC, #countryEC2", function () {
    var getCountry = $(this).val();

    var getState = getStatebyCountryProfile(getCountry);

    getState.then(function (data) {
        $("#state_id, #stateparent, #statecom, #statec, #stateEC, #stateEC2" ).empty();
;
        $("#state_id, #stateparent, #statecom, #statec, #stateEC, #stateEC2").append('<option value="">PLEASE CHOOSE</option>');

        $("#city_id, #cityparent ,#citycom ,#cityc ,#cityEC, #cityEC2").empty();
        $("#city_id, #cityparent ,#citycom ,#cityc ,#cityEC, #cityEC2").append('<option value="">PLEASE CHOOSE</option>');

        $("#postcode_id, #postcodeparent, #postcodecom, #postcodec ,#postcodeEC, #postcodeEC2").empty();
        $("#postcode_id, #postcodeparent, #postcodecom, #postcodec ,#postcodeEC, #postcodeEC2").append('<option value="">PLEASE CHOOSE</option>');

        data.sort(function(a, b) {
            return a.state_name.localeCompare(b.state_name);
        });

        $.each(data, function(index, state) {
            $("#state_id, #stateparent, #statecom, #statec ,#stateEC, #stateEC2").append('<option value="' + state.id + '">' + state.state_name + '</option>');
        });

    });
});


    function getStatebyCountryProfile(id) {
        return $.ajax({
            url: "/getStatebyCountryProfile/" + id,
        });
    }

    $(document).on("change", "#state_id, #stateparent, #statecom, #statec ,#stateEC, #stateEC2", function () {
        // var getCity = $("#state_id").val();
        var getState = $(this).val();
        var getCity = getCitybyStateProfile(getState);

        getCity.then(function (data) {
            $("#city_id, #cityparent ,#citycom ,#cityc ,#cityEC, #cityEC2").empty();
            $("#city_id, #cityparent ,#citycom ,#cityc ,#cityEC, #cityEC2").append('<option value="">PLEASE CHOOSE</option>');

            $("#postcode_id, #postcodeparent, #postcodecom, #postcodec ,postcodeEC, #postcodeEC2").empty();
            $("#postcode_id, #postcodeparent, #postcodecom, #postcodec ,postcodeEC, #postcodeEC2").append('<option value="">PLEASE CHOOSE</option>');

            data.sort(function(a, b) {
                return a.name.localeCompare(b.name);
            });

            $.each(data, function(index, city) {
                $("#city_id, #cityparent ,#citycom ,#cityc ,#cityEC, #cityEC2").append('<option value="' + city.name + '">' + city.name + '</option>');
            });

        });
    });

    function getCitybyStateProfile(id) {
        return $.ajax({
            url: "/getCitybyStateProfile/" + id,
        });
    }

    $(document).on("change", "#city_id, #cityparent ,#citycom ,#cityc ,#cityEC, #cityEC2", function () {
        var getCity = $(this).val();
        var getPostcode = getPostcodeByCityProfile(getCity);

        // var getPostcode = $("#city_id").val();

        // var getPostcode = getPostcodeByCityProfile(getPostcode);

        getPostcode.then(function (data) {
            $("#postcode_id, #postcodeparent, #postcodecom, #postcodec ,#postcodeEC, #postcodeEC2").empty();
            $("#postcode_id, #postcodeparent, #postcodecom, #postcodec ,#postcodeEC, #postcodeEC2").append('<option value="">PLEASE CHOOSE</option>');

            data.sort(function(a, b) {
                return a.postcode.localeCompare(b.postcode);
            });

            $.each(data, function(index, postcode) {
                $("#postcode_id, #postcodeparent, #postcodecom, #postcodec ,#postcodeEC, #postcodeEC2").append('<option value="' + postcode.postcode + '">' + postcode.postcode + '</option>');
            });

        });
    });
    function getPostcodeByCityProfile(id) {
        return $.ajax({
            url: "/getPostcodeByCityProfile/" + id,
        });
    }

//////////////////END///////////////


//////////////////DROPDOWN EDIT ADDRESS///////////////

    $(document).on("change", "#country_idedit, #countryP1, #country1, #countryUC", function () {
        // var getCountry = $("#country_idedit, #countryP1").val();
        var getCountry = $(this).val();

        var getState = getStatebyCountryProfile(getCountry);
        getState.then(function (data) {
            $("#state_idedit, #stateP1, #state1, #stateUC").empty();
            $("#state_idedit, #stateP1, #state1, #stateUC").append('<option value="">PLEASE CHOOSE</option>');
            $("#city_idedit, #cityP1, #city1, #cityUC").empty();
            $("#city_idedit, #cityP1, #city1, #cityUC").append('<option value="">PLEASE CHOOSE</option>');
            $("#postcode_idedit, #postcodeP1, #postcode1, #postcodeUC").empty();
            $("#postcode_idedit, #postcodeP1, #postcode1, #postcodeUC").append('<option value="">PLEASE CHOOSE</option>');
            $.each(data, function (index, state) {
                $("#state_idedit, #stateP1, #state1, #stateUC").append('<option value="' + state.id + '">' + state.state_name + '</option>');
            });
        });
    });
    function getStatebyCountryProfile(id) {
        return $.ajax({
            url: "/getStatebyCountryProfile/" + id,
        });
    }

    $(document).on("change", "#state_idedit, #stateP1, #state1, #stateUC", function () {
        // var getState = $("#state_idedit").val();
        var getState = $(this).val();

        var getCity = getCitybyStateProfile(getState);
        getCity.then(function (data) {
            $("#city_idedit, #cityP1, #city1, #cityUC").empty();
            $("#city_idedit, #cityP1, #city1, #cityUC").append('<option value="">PLEASE CHOOSE</option>');
            $("#postcode_idedit, #postcodeP1, #postcode1, #postcodeUC").empty();
            $("#postcode_idedit, #postcodeP1, #postcode1, #postcodeUC").append('<option value="">PLEASE CHOOSE</option>');
            $.each(data, function (index, city) {
                $("#city_idedit, #cityP1, #city1, #cityUC").append('<option value="' + city.name + '">' + city.name + '</option>');
            });
        });
    });
    function getCitybyStateProfile(id) {
        return $.ajax({
            url: "/getCitybyStateProfile/" + id,
        });
    }

    $(document).on("change", "#city_idedit, #cityP1, #city1, #cityUC", function () {
        // var getPostcode = $("#city_idedit, #cityP1").val();
        var getCity = $(this).val();

        var getPostcode = getPostcodeByCityProfile(getCity);
        getPostcode.then(function (data) {
            $("#postcode_idedit, #postcodeP1, #postcode1, #postcodeUC").empty();
            $("#postcode_idedit, #postcodeP1, #postcode1, #postcodeUC").append('<option value="">PLEASE CHOOSE</option>');
            $.each(data, function (index, postcode) {
                $("#postcode_idedit, #postcodeP1, #postcode1, #postcodeUC").append('<option value="' + postcode.postcode + '">' + postcode.postcode + '</option>');
            });
        });
    });
    function getPostcodeByCityProfile(id) {
        return $.ajax({
            url: "/getPostcodeByCityProfile/" + id,
        });
    }

//////////////////END///////////////


//////////////////GET ADDRESS DATA///////////////

    addressId = $("#addressId").val();

    addressIds = addressId.split(",");

    for (let i = 0; i < addressIds.length; i++) {
        const type = addressIds[i];

        $("#updateAddressDetails" + type).click(function (e) {
            id = $(this).data("id");
            var addressData = getAddressDetails(id);

            addressData.then(function (data) {
                address = data.data;
                $("#id1").val(address.id);
                $("#address1Edit").val(address.address1);
                $("#address2Edit").val(address.address2);
                $("#postcode_idedit").val(address.postcode);
                $("#city_idedit").val(address.city);
                $("#state_idedit").val(address.state);
                $("#country_idedit").val(address.country);

                $("#postcode_idedit").val(address.postcode).select2({
                    placeholder: 'PLEASE CHOOSE',
                    allowClear: true,
                    dropdownParent: $('#modaleditaddress'),
                });
                $("#city_idedit").val(address.city).select2({
                    placeholder: 'PLEASE CHOOSE',
                    allowClear: true,
                    dropdownParent: $('#modaleditaddress'),
                });
                $("#state_idedit").val(address.state).select2({
                    placeholder: 'PLEASE CHOOSE',
                    allowClear: true,
                    dropdownParent: $('#modaleditaddress'),
                });
                $("#country_idedit").val(address.country).select2({
                    placeholder: 'PLEASE CHOOSE',
                    allowClear: true,
                    dropdownParent: $('#modaleditaddress'),
                });
            });
            $("#modaleditaddress").modal("show");
        });

        $("#deleteAddressDetails" + type).click(function (e) {
            id = $(this).data("id");

            requirejs(["sweetAlert2"], function (swal) {
                swal({
                    title: "Are you sure to delete Address?",
                    type: "error",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes!",
                    showCancelButton: true,
                }).then(function () {
                    $.ajax({
                        type: "POST",
                        url: "/deleteAddressDetails/" + id,
                        data: { _method: "DELETE" },
                    }).then(function (data) {
                        console.log(data);
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

        function getAddressDetails(id) {
            return $.ajax({
                url: "/getAddressDetails/" + id,
            });
        }
    }
//////////////////END///////////////
//////////////////ADD ADDRESS DATA///////////////

$("#addAddressDetails").click(function (e) {
    $("#formAddressDetails").validate({
        // Specify validation rules
        rules: {
            address1: "required",
            country: "required",
            state: "required",
            city: "required",
            postcode: "required",
        },
        messages: {
            address1: "Please Insert Address 1",
            country: "Please Choose Country",
            state: "Please Choose State",
            city: "Please Choose City",
            postcode: "Please Choose Postcode",
        },
        submitHandler: function (form) {
            requirejs(["sweetAlert2"], function (swal) {
                var data = new FormData(document.getElementById("formAddressDetails"));

                $.ajax({
                    type: "POST",
                    url: "/createAddress",
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
//////////////////END///////////////

//////////////////SAVE EDIT ADDRESS DATA///////////////

    $("#saveAddressDetailsBtn").click(function (e) {
        $("#formEditAddressDetails").validate({
            rules: {
                address1: "required",
                country: "required",
                state: "required",
                city: "required",
                postcode: "required",
            },

            messages: {
                address1: "Please Insert Address 1",
                country: "Please Choose Country",
                state: "Please Choose State",
                city: "Please Choose City",
                postcode: "Please Choose Postcode",
            },

            submitHandler: function (form) {
                Swal.fire({
                    allowOutsideClick: false,
                    showCancelButton: true,
                    cancelButtonColor: "#d33",
                    confirmButtonColor: "#3085d6",
                    title: "Declaration.",
                    icon: "info",
                    html:
                        '<h5> <input type="checkbox" class="form-check-input" name="t11" id="t1"  />  I hereby certify the above information as provided by me is true and correct. I also undertake to keep the Company informed of any changes covering such information of my personal details as and when it occurs. If any information given above is subsequently found to be incorrect or incomplete or untrue, the Company may terminate my employment without notice or compensation.</h5><br>' +
                        '<h5> <input type="checkbox" class="form-check-input" name="t22" id="t2"  />  I hereby state that I may be liable to summary dismissal if any of the particulars has been misrepresented or omitted. I acknowledge that the Company has the right to recover any salaries and monetary benefits paid out to me during the course of my employment in the event of any misrepresentation or omission on my personal data.</h5><br>' +
                        '<h5> <input type="checkbox" class="form-check-input" name="t33" id="t3"  />  I hereby give consent for Company to process and keep my personal data for employment purposes.</h5>',
                    confirmButtonText: "Yes",

                    preConfirm: () => {
                        if (
                            !$("#t1").prop("checked") ||
                            !$("#t2").prop("checked") ||
                            !$("#t3").prop("checked")
                        ) {
                            Swal.showValidationMessage(
                                '<i class="fa fa-info-circle"></i> Please check all term to proceed'
                            );
                        } else if (
                            $("#t1").prop("checked") ||
                            $("#t2").prop("checked") ||
                            $("#t3").prop("checked")
                        ) {
                            var data = new FormData(
                                document.getElementById("formEditAddressDetails")
                            );

                            $.ajax({
                                type: "POST",
                                url: "/updateAddressDetails",
                                data: data,
                                dataType: "json",

                                processData: false,
                                contentType: false,
                            }).then(function (data) {
                                console.log(data);
                                Swal.fire({
                                    title: data.title,
                                    icon: "success",
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
                                        // window.location.href = "/myProfile";
                                    }
                                });
                            });
                        } else {
                            Swal.showValidationMessage(
                                '<i class="fa fa-info-circle"></i> error'
                            );
                        }
                    },
                }).then((result) => {});
            },
        });
    });

////////END/////

////same address///



$("#same-address2").change(function () {
    if (this.checked) {

        $("#address1parent").val($("#address-1").val()).prop("readonly", true);
        $("#address2parent").val($("#address-2").val()).prop("readonly", true);
        // $("#postcodeparent").val($("#postcode").val()).prop("readonly", true);
        // $("#cityparent").val($("#city").val()).prop("readonly", true);
        $("#postcodeparent").val($("#postcode").val()).css({ "pointer-events": "none", background: "#e9ecef" });
        $("#cityparent").val($("#city").val()).css({ "pointer-events": "none", background: "#e9ecef" });

        $("#stateparent").val($("#state").val()).css({ "pointer-events": "none", background: "#e9ecef" });
        $("#countryparent").val($("#country").val()).css({ "pointer-events": "none", background: "#e9ecef" });

        var id = "{{ $user->id }}";
        getAddressforCompanion(id)
            .then(function (data) {
                if (data) {
                           console.log(data);

                    var permanentAddress1 = data.data.address1;
                    var permanentAddress2 = data.data.address2;
                    var permanentPostcode = data.data.postcode;
                    var permanentCity = data.data.city;
                    var permanentState = data.data.state_name;
                    var permanentCountry = data.data.country_name;
                    console.log(data);

                    if (
                        permanentAddress1 ||
                        permanentAddress2 ||
                        permanentPostcode ||
                        permanentCity ||
                        permanentState ||
                        permanentCountry
                    ) {

                        $("#address1parent").val(permanentAddress1);
                        $("#address2parent").val(permanentAddress2);
                        $("#postcodeparent").val(permanentPostcode);
                        $("#cityparent").val(permanentCity);
                        $("#stateparent").val(permanentState);
                        $("#stateparenthidden").val(permanentState);
                        $("#countryparent").val(permanentCountry);
                        $("#countryparenthidden").val(permanentCountry);

                        $("#postcodeparent").append('<option value="' + permanentPostcode + '" selected>' + permanentPostcode + '</option>');
                        $("#cityparent").append('<option value="' + permanentCity + '" selected>' + permanentCity + '</option>');
                        $("#stateparent").append('<option value="' + permanentState + '" selected>' + permanentState + '</option>');
                        $("#countryparent").append('<option value="' + permanentCountry + '" selected>' + permanentCountry + '</option>');
                    }
                }
            })
            .fail(function (xhr, status, error) {
                console.log("Error fetching permanent address: " + error);
            });
    } else {
        $("#address1parent").val($("").val()).prop("readonly", false);
        $("#address2parent").val($("").val()).prop("readonly", false);
        // $("#postcodeparent").val($("").val()).prop("readonly", false);
        // $("#cityparent").val($("").val()).prop("readonly", false);
        $("#postcodeparent").css({ "pointer-events": "auto", background: "none" }).val("");
        $("#cityparent").css({ "pointer-events": "auto", background: "none" }).val("");

        $("#stateparent").css({ "pointer-events": "auto", background: "none" }).val("");
        // $("#stateparent").css({ "pointer-events": "auto", background: "" });

        $("#countryparent").css({ "pointer-events": "auto", background: "none" }).val("");
        // $("#countryparent").css({ "pointer-events": "auto", background: "" });
    }
});
///end////


/////select for add//////
$(document).ready(function () {
    var countryid = "#country_id, #countryparent, #countrycom";

    $(countryid).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
        dropdownParent: $('#modaladdaddress'), // Adjust this to match your modal's ID or class
    });
});

$(document).ready(function () {
    var stateid = "#state_id, #stateparent, #statecom";

    $(stateid).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
        dropdownParent: $('#modaladdaddress'), // Adjust this to match your modal's ID or class
    });
});

$(document).ready(function () {
    var cityid = "#city_id, #cityparent ,#citycom";

    $(cityid).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
        dropdownParent: $('#modaladdaddress'), // Adjust this to match your modal's ID or class
    });
});

$(document).ready(function () {
    var cityid = "#postcode_id, #postcodeparent, #postcodecom";

    $(cityid).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
        dropdownParent: $('#modaladdaddress'), // Adjust this to match your modal's ID or class
    });
});

$(document).ready(function () {
    var emergencyprofile = "#countryEC, #countryEC2, #stateEC, #stateEC2, #cityEC, #cityEC2, #postcodeEC, #postcodeEC2";

    $(emergencyprofile).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
    });
});


$(document).ready(function () {
    var companionprofile = "#countryc, #statec, #cityc, #postcodec";

    $(companionprofile).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
    });
});

///end///

///select for edit///
$(document).ready(function () {
    var countryid = "#country_idedit, #countryP1";

    $(countryid).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
        dropdownParent: $('#modaleditaddress'), // Adjust this to match your modal's ID or class
    });
});

$(document).ready(function () {
    var stateid = "#state_idedit, #stateP1, #state1";

    $(stateid).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
        dropdownParent: $('#modaleditaddress'), // Adjust this to match your modal's ID or class
    });
});

$(document).ready(function () {
    var cityid = "#city_idedit, #cityP1, #city1";

    $(cityid).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
        dropdownParent: $('#modaleditaddress'), // Adjust this to match your modal's ID or class
    });
});

$(document).ready(function () {
    var cityid = "#postcode_idedit, #postcodeP1, #postcode1";

    $(cityid).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
        dropdownParent: $('#modaleditaddress'), // Adjust this to match your modal's ID or class
    });
});

$(document).ready(function () {
    var cityid = "#countryUC, #stateUC, #cityUC, #postcodeUC";

    $(cityid).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
    });
});

$(document).ready(function () {
    var cityid = "#countrycom, #statecom, #citycom, #postcodecom";

    $(cityid).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
        dropdownParent: $('#modaladd-children'),
    });
});

$(document).ready(function () {
    var editchildren = "#country1, #state1, #city1, #postcode1";

    $(editchildren).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
        dropdownParent: $('#edit-formchildren'),
    });
});


$(document).ready(function () {
    var addparent = "#countryparent, #postcodeparent, #cityparent, #stateparent";

    $(addparent).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
        dropdownParent: $('#addparentmodal'),
    });
});



$(document).ready(function () {
    var editparent = "#countryP1, #postcodeP1, #cityP1, #stateP1";

    $(editparent).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
        dropdownParent: $('#editparentmodal'),
    });
});
















//end///
});












    // $(document).on("click", "#editButton", function () {
    //     var id = $(this).data("id");
    //     var addressData = getData(id);
    //     addressData.then(function (data) {
    //         // console.log(data);
    //         $("#address").val(data.address);
    //         $("#address2").val(data.address2);
    //         $("#PostcodeEd").val(data.postcode).select2({
    //             placeholder: 'PLEASE CHOOSE',
    //             allowClear: true,
    //             dropdownParent: $('#editModal'),
    //         });
    //         $("#CityEd").val(data.city).select2({
    //             placeholder: 'PLEASE CHOOSE',
    //             allowClear: true,
    //             dropdownParent: $('#editModal'),
    //         });
    //         $("#StateEd").val(data.state).select2({
    //             placeholder: 'PLEASE CHOOSE',
    //             allowClear: true,
    //             dropdownParent: $('#editModal'),
    //         });
    //         $("#CountryEd").val(data.country).select2({
    //                 placeholder: 'PLEASE CHOOSE',
    //                 allowClear: true,
    //                 dropdownParent: $('#editModal'),
    //             });
    //         $("#phoneNo").val(data.phoneNo);
    //         $("#idC").val(data.id);
    //         $("#email").val(data.email);
    //     });
    //     $("#editModal").modal("show");
    // });

    // function getData(id) {
    //     return $.ajax({
    //         url: "/getCustomerById/" + id,
    //     });
    // }


    // $("#saveAddressDetailsBtn").click(function (e) {
    //     Swal.fire({
    //         allowOutsideClick: false,
    //         showCancelButton: true,
    //         cancelButtonColor: "#d33",
    //         confirmButtonColor: "#3085d6",
    //         title: "Declaration.",
    //         icon: "info",
    //         html:
    //             '<h5> <input type="checkbox" class="form-check-input" name="t11" id="t1"  />  I hereby certify the above information as provided by me is true and correct. I also undertake to keep the Company informed of any changes covering such information of my personal details as and when it occurs. If any information given above is subsequently found to be incorrect or incomplete or untrue, the Company may terminate my employment without notice or compensation.</h5><br>' +
    //             '<h5> <input type="checkbox" class="form-check-input" name="t22" id="t2"  />  I hereby state that I may be liable to summary dismissal if any of the particulars has been misrepresented or omitted. I acknowledge that the Company has the right to recover any salaries and monetary benefits paid out to me during the course of my employment in the event of any misrepresentation or omission on my personal data.</h5><br>' +
    //             '<h5> <input type="checkbox" class="form-check-input" name="t33" id="t3"  />  I hereby give consent for Company to process and keep my personal data for employment purposes.</h5>',
    //         confirmButtonText: "Yes",

    //         preConfirm: () => {
    //             if (
    //                 !$("#t1").prop("checked") ||
    //                 !$("#t2").prop("checked") ||
    //                 !$("#t3").prop("checked")
    //             ) {
    //                 Swal.showValidationMessage(
    //                     '<i class="fa fa-info-circle"></i> Please check all term to proceed'
    //                 );
    //             } else if (
    //                 $("#t1").prop("checked") ||
    //                 $("#t2").prop("checked") ||
    //                 $("#t3").prop("checked")
    //             ) {
    //                 var data = new FormData(
    //                     document.getElementById("formEditAddressDetails")
    //                 );

    //                 $.ajax({
    //                     type: "POST",
    //                     url: "/updateAddressDetails",
    //                     data: data,
    //                     dataType: "json",

    //                     processData: false,
    //                     contentType: false,
    //                 }).then(function (data) {
    //                     console.log(data);
    //                     Swal.fire({
    //                         title: data.title,
    //                         icon: "success",
    //                         text: data.msg,
    //                         type: data.type,
    //                         confirmButtonColor: "#3085d6",
    //                         confirmButtonText: "OK",
    //                         allowOutsideClick: false,
    //                         allowEscapeKey: false,
    //                     }).then(function () {
    //                         if (data.type == "error") {
    //                         } else {
    //                             location.reload();
    //                         }
    //                     });
    //                 });
    //             } else {
    //                 Swal.showValidationMessage(
    //                     '<i class="fa fa-info-circle"></i> error'
    //                 );
    //             }
    //         },
    //     }).then((result) => {});
    // });


    // $("#saveAddressDetailsBtn").click(function (e) {
    //     $("#formEditAddressDetails").validate({
    //         // Specify validation rules
    //         rules: {
    //             address1: "required",
    //             country: "required",
    //             state: "required",
    //             city: "required",
    //             postcode: "required",
    //         },

    //         messages: {
    //             address1: "Please Insert Addresseeee 1",
    //             country: "Please Choose Country",
    //             state: "Please Choose State",
    //             city: "Please Choose City",
    //             postcode: "Please Choose Postcode",

    //         submitHandler: function (form) {
    //             Swal.fire({
    //                 allowOutsideClick: false,
    //                 showCancelButton: true,
    //                 cancelButtonColor: "#d33",
    //                 confirmButtonColor: "#3085d6",
    //                 title: "Declaration.",
    //                 icon: "info",
    //                 html:
    //                     '<h5> <input type="checkbox" class="form-check-input" name="t11" id="t1"  />  I hereby certify the above information as provided by me is true and correct. I also undertake to keep the Company informed of any changes covering such information of my personal details as and when it occurs. If any information given above is subsequently found to be incorrect or incomplete or untrue, the Company may terminate my employment without notice or compensation.</h5><br>' +
    //                     '<h5> <input type="checkbox" class="form-check-input" name="t22" id="t2"  />  I hereby state that I may be liable to summary dismissal if any of the particulars has been misrepresented or omitted. I acknowledge that the Company has the right to recover any salaries and monetary benefits paid out to me during the course of my employment in the event of any misrepresentation or omission on my personal data.</h5><br>' +
    //                     '<h5> <input type="checkbox" class="form-check-input" name="t33" id="t3"  />  I hereby give consent for Company to process and keep my personal data for employment purposes.</h5>',
    //                 confirmButtonText: "Yes",

    //                 preConfirm: () => {
    //                     if (
    //                         !$("#t1").prop("checked") ||
    //                         !$("#t2").prop("checked") ||
    //                         !$("#t3").prop("checked")
    //                     ) {
    //                         Swal.showValidationMessage(
    //                             '<i class="fa fa-info-circle"></i> Please check all term to proceed'
    //                         );
    //                     } else if (
    //                         $("#t1").prop("checked") ||
    //                         $("#t2").prop("checked") ||
    //                         $("#t3").prop("checked")
    //                     ) {
    //                         var data = new FormData(
    //                             document.getElementById("formEditAddressDetails")
    //                         );

    //                         $.ajax({
    //                             type: "POST",
    //                             url: "/updateAddressDetails",
    //                             data: data,
    //                             dataType: "json",

    //                             processData: false,
    //                             contentType: false,
    //                         }).then(function (data) {
    //                             console.log(data);
    //                             Swal.fire({
    //                                 title: data.title,
    //                                 icon: "success",
    //                                 text: data.msg,
    //                                 type: data.type,
    //                                 confirmButtonColor: "#3085d6",
    //                                 confirmButtonText: "OK",
    //                                 allowOutsideClick: false,
    //                                 allowEscapeKey: false,
    //                             }).then(function () {
    //                                 if (data.type == "error") {
    //                                 } else {
    //                                     location.reload();
    //                                 }
    //                             });
    //                         });
    //                     } else {
    //                         Swal.showValidationMessage(
    //                             '<i class="fa fa-info-circle"></i> error'
    //                         );
    //                     }
    //                 },
    //             }).then((result) => {});
    //             },
    //         },
    //     });
    // });













































