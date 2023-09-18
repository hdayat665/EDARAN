$(document).ready(function () {

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

    var countryProfiles = [
        { country: "#country", state: "#state", city: "#city", postcode: "#postcode" },
        { country: "#countryc", state: "#statec", city: "#cityc", postcode: "#postcodec" },
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
        { state: "#state", city: "#city", postcode: "#postcode" },
        { state: "#statec", city: "#cityc", postcode: "#postcodec" },
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
        { city: "#city", postcode: "#postcode" },
        { city: "#cityc", postcode: "#postcodec" },
    ];

    cityProfiles.forEach(function(profile) {
        handlePostcodeByCityProfile(profile.city, profile.postcode);
    });

        var editparent = "#country, #postcode, #city, #state";

        $(editparent).select2({
            placeholder: "PLEASE CHOOSE",
            allowClear: true,
        });

        // var editparent2 = "#countryc, #postcodec, #cityc, #statec";

        // $(editparent2).select2({
        //     placeholder: "PLEASE CHOOSE",
        //     allowClear: true,
        // });
});
