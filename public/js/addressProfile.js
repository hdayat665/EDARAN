$(document).ready(function () {
//////////////////DROPDOWN ADDRESS///////////////
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

    var countryProfiles = [
        { country: "#country_id", state: "#state_id", city: "#city_id", postcode: "#postcode_id" },
        { country: "#countryparent", state: "#stateparent", city: "#cityparent", postcode: "#postcodeparent" },
        { country: "#countrycom", state: "#statecom", city: "#citycom", postcode: "#postcodecom" },
        { country: "#countryc", state: "#statec", city: "#cityc", postcode: "#postcodec" },
        { country: "#countryEC", state: "#stateEC", city: "#cityEC", postcode: "#postcodeEC" },
        { country: "#countryEC2", state: "#stateEC2", city: "#cityEC2", postcode: "#postcodeEC2" },
        { country: "#country_idedit", state: "#state_idedit", city: "#city_idedit", postcode: "#postcode_idedit" },
        { country: "#countryP1", state: "#stateP1", city: "#cityP1", postcode: "#postcodeP1" },
        { country: "#country1", state: "#state1", city: "#city1", postcode: "#postcode1" },
        { country: "#countryUC", state: "#stateUC", city: "#cityUC", postcode: "#postcodeUC" },
    ];

    countryProfiles.forEach(function(profile) {
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
        { state: "#stateEC", city: "#cityEC", postcode: "#postcodeEC" },
        { state: "#stateEC2", city: "#cityEC2", postcode: "#postcodeEC2" },
        { state: "#state_idedit", city: "#city_idedit", postcode: "#postcode_idedit" },
        { state: "#stateP1", city: "#cityP1", postcode: "#postcodeP1" },
        { state: "#state1", city: "#city1", postcode: "#postcode1" },
        { state: "#stateUC", city: "#cityUC", postcode: "#postcodeUC" },
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
        { city: "#cityEC", postcode: "#postcodeEC" },
        { city: "#cityEC2", postcode: "#postcodeEC2" },
        { city: "#city_idedit", postcode: "#postcode_idedit" },
        { city: "#cityP1", postcode: "#postcodeP1" },
        { city: "#city1", postcode: "#postcode1" },
        { city: "#cityUC", postcode: "#postcodeUC" }
    ];

    cityProfiles.forEach(function(profile) {
        handlePostcodeByCityProfile(profile.city, profile.postcode);
    });

    //////////////////END///////////////

    /////select for add//////
    var countryid = "#country_id, #countryparent, #countrycom";
    $(countryid).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
        dropdownParent: $('#modaladdaddress'),
    });

    var stateid = "#state_id, #stateparent, #statecom";
    $(stateid).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
        dropdownParent: $('#modaladdaddress'),
    });

    var cityid = "#city_id, #cityparent ,#citycom";
    $(cityid).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
        dropdownParent: $('#modaladdaddress'),
    });

    var cityid = "#postcode_id, #postcodeparent, #postcodecom";
    $(cityid).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
        dropdownParent: $('#modaladdaddress'),
    });

    var emergencyprofile = "#countryEC, #countryEC2, #stateEC, #stateEC2, #cityEC, #cityEC2, #postcodeEC, #postcodeEC2";
    $(emergencyprofile).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
    });

    var companionprofile = "#countryc, #statec, #cityc, #postcodec";
    $(companionprofile).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
    });
///end///

///select for edit///
    var countryid = "#country_idedit, #countryP1";
    $(countryid).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
        dropdownParent: $('#modaleditaddress'),
    });

    var stateid = "#state_idedit, #stateP1, #state1";
    $(stateid).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
        dropdownParent: $('#modaleditaddress'),
    });

    var cityid = "#city_idedit, #cityP1, #city1";
    $(cityid).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
        dropdownParent: $('#modaleditaddress'),
    });

    var cityid = "#postcode_idedit, #postcodeP1, #postcode1";
    $(cityid).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
        dropdownParent: $('#modaleditaddress'),
    });

    var cityid = "#countryUC, #stateUC, #cityUC, #postcodeUC";
    $(cityid).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
    });

    var cityid = "#countrycom, #statecom, #citycom, #postcodecom";
    $(cityid).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
        dropdownParent: $('#modaladd-children'),
    });

    var editchildren = "#country1, #state1, #city1, #postcode1";
    $(editchildren).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
        dropdownParent: $('#edit-formchildren'),
    });

    var addparent = "#countryparent, #postcodeparent, #cityparent, #stateparent";
    $(addparent).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
        dropdownParent: $('#addparentmodal'),
    });

    var editparent = "#countryP1, #postcodeP1, #cityP1, #stateP1";
    $(editparent).select2({
        placeholder: "PLEASE CHOOSE",
        allowClear: true,
        dropdownParent: $('#editparentmodal'),
    });
//end///
});
































