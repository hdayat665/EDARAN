$(document).ready(function () {

    function handlePostcodebyCountryEmployee(countrySelector, postcodeSelector, stateSelector, citySelector ) {
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
        { country: "#countryAddChild", postcode: "#postcodeAddChild", state: "#stateAddChild", city: "#cityAddChild" },
        { country: "#countryEdit", postcode: "#postcodeEdit", state: "#stateEdit", city: "#cityEdit" },
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
        handlePostcodebyCountryEmployee(profile.country, profile.postcode, profile.state, profile.city);
    });

    function getPostcodeByCountry(id) {
            return $.ajax({
                url: "/getPostcodeByCountryEmployee/" + id,
            });
        }

    function handleStateAndCityByPostcodeEmployee(postcodeSelector, stateSelector, citySelector) {
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
        { postcode: "#postcodeAddChild", state: "#stateAddChild", city: "#cityAddChild" },
        { country: "#countryEdit", postcode: "#postcodeEdit", state: "#stateEdit", city: "#cityEdit" },
        { postcode: "#postcodeP1", state: "#stateP1", city: "#cityP1" },
        { postcode: "#postcode1", state: "#state1", city: "#city1" }
    ];

    stateProfiles.forEach(function(profile) {
        handleStateAndCityByPostcodeEmployee(profile.postcode, profile.state, profile.city);
    });

    function getStateAndCityByPostcode(id) {
        return $.ajax({
            url: "/getStateAndCityByPostcodeEmployee/" + id,
        });
    }

    ////coompanion////
    function handleStatebyCountryProfile(countrySelector, stateSelector, citySelector, postcodeSelector) {
        $(countrySelector).on("change", function () {
            var getCountry = $(this).val();
            var getState = getStatebyCountryEmployee(getCountry);

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
    stateUC
    var countryProfiles = [
       { country: "#countryc", state: "#statec", city: "#cityc", postcode: "#postcodec" },
       { country: "#countryEmc", state: "#stateEmc", city: "#cityEmc", postcode: "#postcodeEmc" },
       { country: "#countryUC", state: "#stateUC", city: "#cityUC", postcode: "#postcodeUC" },
       { country: "#countryCEdit", state: "#stateCEdit", city: "#cityCEdit", postcode: "#postcodeCEdit" },
    ];

    countryProfiles.forEach(function(profile) {
        handleStatebyCountryProfile(profile.country, profile.state, profile.city, profile.postcode);
    });

    function getStatebyCountryEmployee(id) {
        return $.ajax({
            url: "/getStatebyCountryEmployee/" + id,
        });
    }

    function handleCitybyStateProfile(stateSelector, citySelector, postcodeSelector) {
        $(stateSelector).on("change", function () {
            var getState = $(this).val();
            var getCity = getCitybyStateEmployee(getState);

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
        { state: "#statec", city: "#cityc", postcode: "#postcodec" },
        { state: "#stateEmc", city: "#cityEmc", postcode: "#postcodeEmc" },
        { state: "#stateUC", city: "#cityUC", postcode: "#postcodeUC" },
        { state: "#stateCEdit", city: "#cityCEdit", postcode: "#postcodeCEdit" },
    ];

    stateProfiles.forEach(function(profile) {
        handleCitybyStateProfile(profile.state, profile.city, profile.postcode);
    });

    function getCitybyStateEmployee(id) {
        return $.ajax({
            url: "/getCitybyStateEmployee/" + id,
        });
    }

    function handlePostcodeByCityProfile(citySelector, postcodeSelector) {
        $(citySelector).on("change", function () {
            var getCity = $(this).val();
            var getPostcode = getPostcodeByCityEmployee(getCity);

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

    function getPostcodeByCityEmployee(id) {
        return $.ajax({
            url: "/getPostcodeByCityEmployee/" + id,
        });
    }

    var cityProfiles = [
        { city: "#cityc", postcode: "#postcodec" },
        { city: "#cityEmc", postcode: "#postcodeEmc" },
        { city: "#cityUC", postcode: "#postcodeUC" },
        { city: "#cityCEdit", postcode: "#postcodeCEdit" },
    ];

    cityProfiles.forEach(function(profile) {
        handlePostcodeByCityProfile(profile.city, profile.postcode);
    });
    //////end/////



        var editparent = "#country, #postcode, #city, #state";

        $(editparent).select2({
            placeholder: "PLEASE CHOOSE",
            allowClear: true,
        });

        var newaddress = "#country_id, #postcode_id";
        $(newaddress).select2({
            placeholder: "PLEASE CHOOSE",
            allowClear: true,
            dropdownParent: $('#modaladdaddress'),
        });

        var editAddress = "#countryEdit, #postcodeEdit";
        $(editAddress).select2({
            placeholder: "PLEASE CHOOSE",
            allowClear: true,
            dropdownParent: $('#modaleditaddress'),
        });


        var emergencyprofile = "#countryEC, #countryEC2, #postcodeEC, #postcodeEC2";
        $(emergencyprofile).select2({
            placeholder: "PLEASE CHOOSE",
            allowClear: true,
        });


        var cityid = "#countryAddChild,#postcodeAddChild";
        $(cityid).select2({
            placeholder: "PLEASE CHOOSE",
            allowClear: true,
            dropdownParent: $('#modaladd-children'),
        });

        var editchildren = "#country1,#postcode1";
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


        // var editparent2 = "#countryc, #postcodec, #cityc, #statec";

        // $(editparent2).select2({
        //     placeholder: "PLEASE CHOOSE",
        //     allowClear: true,
        // });
});
