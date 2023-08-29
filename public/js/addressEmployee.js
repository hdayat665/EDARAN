$(document).ready(function () {

    $(document).on("change", "#country, #countryc", function () {
        var getCountry = $(this).val();
        console.log("helooooo");

        var getState = getStatebyCountryEmployee(getCountry);

        getState.then(function (data) {
            $("#state, #statec").empty().append('<option value="">PLEASE CHOOSE</option>');

            $("#city, #cityc").empty().append('<option value="">PLEASE CHOOSE</option>');

            $("#postcode, #postcodec").empty().append('<option value="">PLEASE CHOOSE</option>');

            $.each(data, function (index, state) {
                $("#state, #statec").append('<option value="' + state.id + '">' + state.state_name + '</option>');
            });
        });
    });


    function getStatebyCountryEmployee(id) {
        return $.ajax({
            url: "/getStatebyCountryEmployee/" + id,
        });
    }

    $(document).on("change", "#state, #statec", function () {
        var getState = $(this).val();
        var getCity = getCitybyStateEmployee(getState);

        getCity.then(function (data) {
            $("#city, #cityc").empty().append('<option value="">PLEASE CHOOSE</option>');

            $("#postcode, #postcodec").empty().append('<option value="">PLEASE CHOOSE</option>');

            $.each(data, function (index, city) {
                $("#city, #cityc").append('<option value="' + city.name + '">' + city.name + '</option>');
            });
        });
    });

    function getCitybyStateEmployee(id) {
        return $.ajax({
            url: "/getCitybyStateEmployee/" + id,
        });
    }

    $(document).on("change", "#city, #cityc", function () {
        var getCity = $(this).val();
        var getPostcode = getPostcodeByCityEmployee(getCity);

        getPostcode.then(function (data) {
            $("#postcode, #postcodec").empty().append('<option value="">PLEASE CHOOSE</option>');

            $.each(data, function (index, postcode) {
                $("#postcode, #postcodec").append('<option value="' + postcode.postcode + '">' + postcode.postcode + '</option>');
            });
        });
    });




    function getPostcodeByCityEmployee(id) {
        return $.ajax({
            url: "/getPostcodeByCityEmployee/" + id,
        });
    }


      $(document).on("change", "#country, #countryc", function () {
        var getCountry = $(this).val();
        console.log("helooooo");

        var getState = getStatebyCountryEmployee(getCountry);

        getState.then(function (data) {
            $("#state, #statec").empty().append('<option value="">PLEASE CHOOSE</option>');

            $("#city, #cityc").empty().append('<option value="">PLEASE CHOOSE</option>');

            $("#postcode, #postcodec").empty().append('<option value="">PLEASE CHOOSE</option>');

            $.each(data, function (index, state) {
                $("#state, #statec").append('<option value="' + state.id + '">' + state.state_name + '</option>');
            });
        });
    });


    function getStatebyCountryEmployee(id) {
        return $.ajax({
            url: "/getStatebyCountryEmployee/" + id,
        });
    }

    $(document).on("change", "#state, #statec", function () {
        var getState = $(this).val();
        var getCity = getCitybyStateEmployee(getState);

        getCity.then(function (data) {
            $("#city, #cityc").empty().append('<option value="">PLEASE CHOOSE</option>');

            $("#postcode, #postcodec").empty().append('<option value="">PLEASE CHOOSE</option>');

            $.each(data, function (index, city) {
                $("#city, #cityc").append('<option value="' + city.name + '">' + city.name + '</option>');
            });
        });
    });

    function getCitybyStateEmployee(id) {
        return $.ajax({
            url: "/getCitybyStateEmployee/" + id,
        });
    }

    $(document).on("change", "#city, #cityc", function () {
        var getCity = $(this).val();
        var getPostcode = getPostcodeByCityEmployee(getCity);

        getPostcode.then(function (data) {
            $("#postcode, #postcodec").empty().append('<option value="">PLEASE CHOOSE</option>');

            $.each(data, function (index, postcode) {
                $("#postcode, #postcodec").append('<option value="' + postcode.postcode + '">' + postcode.postcode + '</option>');
            });
        });
    });




    function getPostcodeByCityEmployee(id) {
        return $.ajax({
            url: "/getPostcodeByCityEmployee/" + id,
        });
    }



    $(document).ready(function () {
        var editparent = "#country, #postcode, #city, #state";

        $(editparent).select2({
            placeholder: "PLEASE CHOOSE",
            allowClear: true,
        });
    });



    // $(document).ready(function () {
    //     var editparent = "#countryc, #postcodec, #cityc, #statec";

    //     $(editparent).select2({
    //         placeholder: "PLEASE CHOOSE",
    //         allowClear: true,
    //     });
    // });

    // $(document).on("change", "#countryc", function () {
    //     var getCountry = $(this).val();

    //     var getState = getStatebyCountryEmployee(getCountry);

    //     getState.then(function (data) {
    //         $("#statec").empty().append('<option value="">PLEASE CHOOSE</option>');

    //         $("#cityc").empty().append('<option value="">PLEASE CHOOSE</option>');

    //         $("#postcodec").empty().append('<option value="">PLEASE CHOOSE</option>');

    //         $.each(data, function (index, state) {
    //             $("#statec").append('<option value="' + state.id + '">' + state.state_name + '</option>');
    //         });
    //     });
    // });


    // function getStatebyCountryEmployee(id) {
    //     return $.ajax({
    //         url: "/getStatebyCountryEmployee/" + id,
    //     });
    // }

    // $(document).on("change", "#statec", function () {
    //     var getState = $(this).val();
    //     var getCity = getCitybyStateEmployee(getState);

    //     getCity.then(function (data) {
    //         $("#cityc").empty().append('<option value="">PLEASE CHOOSE</option>');

    //         $("#postcodec").empty().append('<option value="">PLEASE CHOOSE</option>');

    //         $.each(data, function (index, city) {
    //             $("#cityc").append('<option value="' + city.name + '">' + city.name + '</option>');
    //         });
    //     });
    // });

    // function getCitybyStateEmployee(id) {
    //     return $.ajax({
    //         url: "/getCitybyStateEmployee/" + id,
    //     });
    // }

    // $(document).on("change", "#cityc", function () {
    //     var getCity = $(this).val();
    //     var getPostcode = getPostcodeByCityEmployee(getCity);

    //     getPostcode.then(function (data) {
    //         $("#postcodec").empty().append('<option value="">PLEASE CHOOSE</option>');

    //         $.each(data, function (index, postcode) {
    //             $("#postcodec").append('<option value="' + postcode.postcode + '">' + postcode.postcode + '</option>');
    //         });
    //     });
    // });

    // function getPostcodeByCityEmployee(id) {
    //     return $.ajax({
    //         url: "/getPostcodeByCityEmployee/" + id,
    //     });
    // }
});
