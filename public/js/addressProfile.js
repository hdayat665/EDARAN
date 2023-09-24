$(document).ready(function () {

    function handlePostcodebyCountryProfile(countrySelector, postcodeSelector, stateSelector, citySelector ) {
        $(countrySelector).on("change", function () {
            var getCountry = $(this).val();
            var getPostcode = getPostcodeByCountry(getCountry);

            getPostcode.then(function (data) {
                $(postcodeSelector + ', ' + stateSelector + ', ' + citySelector).empty();
                $(postcodeSelector + ', ' + stateSelector + ', ' + citySelector).append('<option value="">PLEASE CHOOSE</option>');

                data.sort(function(a, b) {
                    return a.postcode.localeCompare(b.postcode);
                });

                $.each(data, function (index, postcode) {
                    $(postcodeSelector).append('<option value="' + postcode.postcode + '">' + postcode.postcode + '</option>');
                });
            });

            $(postcodeSelector + ', ' + stateSelector + ', ' + citySelector).empty();
            $(postcodeSelector + ', ' + stateSelector + ', ' + citySelector).append('<option value="">PLEASE CHOOSE</option>');
        });
    }

    var countryProfiles = [
        { country: "#country_id", postcode: "#postcode_id", state: "#state_id", city: "#city_id" },
        { country: "#countryparent", postcode: "#postcodeparent", state: "#stateparent", city: "#cityparent" },
        { country: "#countrycom", postcode: "#postcodecom", state: "#statecom", city: "#citycom" },
        { country: "#countryc", postcode: "#postcodec", state: "#statec", city: "#cityc" },
        { country: "#countryCEdit", postcode: "#postcodeCEdit", state: "#stateCEdit", city: "#cityCEdit" },
        { country: "#countryEC", postcode: "#postcodeEC", state: "#stateEC", city: "#cityEC" },
        { country: "#countryEC2", postcode: "#postcodeEC2", state: "#stateEC2", city: "#cityEC2" },
        { country: "#country_idedit", postcode: "#postcode_idedit", state: "#state_idedit", city: "#city_idedit" },
        { country: "#countryP1", postcode: "#postcodeP1", state: "#stateP1", city: "#cityP1" },
        { country: "#country1", postcode: "#postcode1", state: "#state1", city: "#city1" }
    ];

    for (var i = 0; i < countryProfiles.length; i++) {
        var stateSelector = countryProfiles[i].state;
        var citySelector = countryProfiles[i].city;

        $(stateSelector + ", " + citySelector).css({
            "pointer-events": "none",
            "touch-action": "none",
            background: "#e9ecef"
        });
    }


    countryProfiles.forEach(function(profile) {
        handlePostcodebyCountryProfile(profile.country, profile.postcode, profile.state, profile.city);
    });

    function getPostcodeByCountry(id) {
            return $.ajax({
                url: "/getPostcodeByCountryProfile/" + id,
            });
        }

    function handleStateAndCityByPostcodeProfile(postcodeSelector, stateSelector, citySelector) {
        $(postcodeSelector).on("change", function () {
            var getPostcode = $(this).val();
            var getStateAndCity = getStateAndCityByPostcode(getPostcode);

            getStateAndCity.then(function (data) {
                $(stateSelector + ',' + citySelector).empty();

                $.each(data, function (index, state) {
                    $(stateSelector).append('<option value="' + state.id + '">' + state.state_name + '</option>');
                });

                $.each(data, function(index, city) {
                    $(citySelector).append('<option value="' + city.name + '">' + city.name + '</option>');
                });
            });
            $(stateSelector + ',' + citySelector).empty();
            $(stateSelector + ',' + citySelector).append('<option value="">PLEASE CHOOSE</option>');
        });
    }

    var stateProfiles = [
        { postcode: "#postcode_id", state: "#state_id", city: "#city_id" },
        { postcode: "#postcodeparent", state: "#stateparent", city: "#cityparent" },
        { postcode: "#postcodecom", state: "#statecom", city: "#citycom" },
        { postcode: "#postcodec", state: "#statec", city: "#cityc" },
        { postcode: "#postcodeEmc", state: "#stateEmc", city: "#cityEmc" },
        { postcode: "#postcodeUC", state: "#stateUC", city: "#cityUC" },
        { postcode: "#postcodeCEdit", state: "#stateCEdit", city: "#cityCEdit" },
        { postcode: "#postcodeEC", state: "#stateEC", city: "#cityEC" },
        { postcode: "#postcodeEC2", state: "#stateEC2", city: "#cityEC2" },
        { postcode: "#postcode_idedit", state: "#state_idedit", city: "#city_idedit" },
        { postcode: "#postcodeP1", state: "#stateP1", city: "#cityP1" },
        { postcode: "#postcode1", state: "#state1", city: "#city1" }
    ];

    stateProfiles.forEach(function(profile) {
        handleStateAndCityByPostcodeProfile(profile.postcode, profile.state, profile.city);
    });

    function getStateAndCityByPostcode(id) {
        return $.ajax({
            url: "/getStateAndCityByPostcodeProfile/" + id,
        });
    }

    /////for companion/////

    function handleStatebyCountryProfile(countrySelector, stateSelector, citySelector, postcodeSelector) {
        $(countrySelector).on("change", function () {
            var getCountry = $(this).val();
            var getState = getStatebyCountryProfile(getCountry);

            getState.then(function (data) {
                $(stateSelector + ', ' + citySelector + ', ' + postcodeSelector).empty();
                $(stateSelector + ', ' + citySelector + ', ' + postcodeSelector).append('<option value="">PLEASE CHOOSE</option>');

                data.sort(function(a, b) {
                    return a.state_name.localeCompare(b.state_name);
                });

                $.each(data, function(index, state) {
                    $(stateSelector).append('<option value="' + state.id + '">' + state.state_name + '</option>');
                });
            });
        });
    }

    var countryProfilesOLD = [
        { country: "#countryc", postcode: "#postcodec", state: "#statec", city: "#cityc" },
        { country: "#countryEmc", state: "#stateEmc", city: "#cityEmc", postcode: "#postcodeEmc" },
        { country: "#countryUC", state: "#stateUC", city: "#cityUC", postcode: "#postcodeUC" },
        { country: "#countryCEdit", postcode: "#postcodeCEdit", state: "#stateCEdit", city: "#cityCEdit" },
    ];

    countryProfilesOLD.forEach(function(profile) {
        handleStatebyCountryProfile(profile.country, profile.state, profile.city, profile.postcode);
    });

    function getStatebyCountryProfile(id) {
        return $.ajax({
            url: "/getStatebyCountryProfile/" + id,
        });
    }

   function handleCitybyStateProfile(stateSelector, citySelector, postcodeSelector) {
        $(stateSelector).on("change", function () {
            var getState = $(this).val();
            var getCity = getCitybyStateProfile(getState);

            getCity.then(function (data) {
                $(citySelector + ',' + postcodeSelector).empty();
                $(citySelector + ',' + postcodeSelector).append('<option value="">PLEASE CHOOSE</option>');

                data.sort(function(a, b) {
                    return a.name.localeCompare(b.name);
                });

                $.each(data, function(index, city) {
                    $(citySelector).append('<option value="' + city.name + '">' + city.name + '</option>');
                });
            });
        });
    }

    var stateProfiles = [
        { state: "#state_id", city: "#city_id", postcode: "#postcode_id" },
        { state: "#stateparent", city: "#cityparent", postcode: "#postcodeparent" },
        { state: "#statecom", city: "#citycom", postcode: "#postcodecom" },
        { state: "#statec", city: "#cityc", postcode: "#postcodec" },
        { state: "#stateEmc", city: "#cityEmc", postcode: "#postcodeEmc" },
        { state: "#stateUC", city: "#cityUC", postcode: "#postcodeUC" },
        { state: "#stateCEdit", city: "#cityCEdit", postcode: "#postcodeCEdit" },
        { state: "#stateEC", city: "#cityEC", postcode: "#postcodeEC" },
        { state: "#stateEC2", city: "#cityEC2", postcode: "#postcodeEC2" },
        { state: "#state_idedit", city: "#city_idedit", postcode: "#postcode_idedit" },
        { state: "#stateP1", city: "#cityP1", postcode: "#postcodeP1" },
        { state: "#state1", city: "#city1", postcode: "#postcode1" },

    ];

    stateProfiles.forEach(function(profile) {
        handleCitybyStateProfile(profile.state, profile.city, profile.postcode);
    });

    function getCitybyStateProfile(id) {
        return $.ajax({
            url: "/getCitybyStateProfile/" + id,
        });
    }

    function handlePostcodeByCityProfile(citySelector, postcodeSelector) {
        $(citySelector).on("change", function () {
            var getCity = $(this).val();
            var getPostcode = getPostcodeByCityProfile(getCity);

            getPostcode.then(function (data) {
                $(postcodeSelector).empty();
                $(postcodeSelector).append('<option value="">PLEASE CHOOSE</option>');

                data.sort(function(a, b) {
                    return a.postcode.localeCompare(b.postcode);
                });

                $.each(data, function(index, postcode) {
                    $(postcodeSelector).append('<option value="' + postcode.postcode + '">' + postcode.postcode + '</option>');
                });
            });
        });
    }

    function getPostcodeByCityProfile(id) {
        return $.ajax({
            url: "/getPostcodeByCityProfile/" + id,
        });
    }


    var cityProfiles = [
        { city: "#city_id", postcode: "#postcode_id" },
        { city: "#cityparent", postcode: "#postcodeparent" },
        { city: "#citycom", postcode: "#postcodecom" },
        { city: "#cityc", postcode: "#postcodec" },
        { city: "#cityEmc", postcode: "#postcodeEmc" },
        { city: "#cityUC", postcode: "#postcodeUC" },
        { city: "#cityCEdit", postcode: "#postcodeCEdit" },
        { city: "#cityEC", postcode: "#postcodeEC" },
        { city: "#cityEC2", postcode: "#postcodeEC2" },
        { city: "#city_idedit", postcode: "#postcode_idedit" },
        { city: "#cityP1", postcode: "#postcodeP1" },
        { city: "#city1", postcode: "#postcode1" },
    ];

    cityProfiles.forEach(function(profile) {
        handlePostcodeByCityProfile(profile.city, profile.postcode);
    });

    //////////////////END///////////////

    var addAddress = "#country_id, #postcode_id";
    $(addAddress).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
        dropdownParent: $('#modaladdaddress'),
    });

    var addAddressParent = "#countryparent, #postcodeparent";
    $(addAddressParent).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
        dropdownParent: $('#modaladdaddress'),
    });

    var emergencyprofile = "#countryEC, #countryEC2, #postcodeEC, #postcodeEC2";
    $(emergencyprofile).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
    });

    var companionprofile = "#countryc, #statec, #cityc, #postcodec";
    $(companionprofile).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
    });

    var editcompanionprofile = "#countryUC, #stateUC, #cityUC, #postcodeUC";
    $(editcompanionprofile).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
    });

    var companionEmploymentDetails = "#countryEmc, #stateEmc, #cityEmc, #postcodeEmc";
    $(companionEmploymentDetails).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
    })
    .next(".select2-container--default")
    .find(".select2-selection--single").css({
        "pointer-events": "none",
        "background-color": "#e9ecef"
    });

    var companionEmploymentEditDetails = "#countryCEdit, #stateCEdit, #cityCEdit, #postcodeCEdit";
    $(companionEmploymentEditDetails).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
    })
    .next(".select2-container--default")
    .find(".select2-selection--single").css({
        "pointer-events": "none",
        "background-color": "#e9ecef"
    });

    var editAddress = "#country_idedit, #postcode_idedit";
    $(editAddress).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
        dropdownParent: $('#modaleditaddress'),
    });



    var cityid = "#countrycom, #postcodecom";
    $(cityid).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
        dropdownParent: $('#modaladd-children'),
    });

    var editchildren = "#country1, #postcode1";
    $(editchildren).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
        dropdownParent: $('#edit-formchildren'),
    });

    var addparent = "#countryparent, #postcodeparent";
    $(addparent).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
        dropdownParent: $('#addparentmodal'),
    });

    var editparent = "#countryP1, #postcodeP1";
    $(editparent).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
        dropdownParent: $('#editparentmodal'),
    });
});
