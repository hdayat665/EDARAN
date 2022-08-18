requirejs.config({
    baseUrl: "/",
    paths: {
        'tenantLogin': 'public/js/tenantLogin',
        'vendor': 'public/assets/js/vendor.min',
        'app': 'public/assets/js/app.min',
        'registerTenant': 'public/js/registerTenant',
        // 'main': 'assets/backend/js/main',
        'sweetAlert2': 'public/assets/sweetalert2/sweetalert2',
    }
});

// var datatableCss = '//cdn.datatables.net/1.10.15/css/jquery.dataTables.css';
var sweetalertCss = '/public/assets/sweetalert2/sweetalert2.css';
// var dateTimePickerCss = '/plugins/bootstrap/css/bootstrap-datetimepicker.min.css';

loadCss(sweetalertCss, sweetalertCss);
requirejs(['app'], ['vendor']);
if ($('#registerTenant').length > 0) {
    requirejs(['registerTenant']);
}

if ($('#tenantLogin').length > 0) {
    requirejs(['tenantLogin']);
}

// Global function
function ajax(ajaxFunction, params, async = true) {
    var path = '/ajaxController/' + ajaxFunction;
    return $.ajax({
        type: "POST",
        data: {
            func: ajaxFunction,
            param: params
        },
        url: path,
        success: function(data) {},
        async: async
    });
}

function loadCss(id, path) {
    if (!document.getElementById(id)) {
        var head = document.getElementsByTagName('head')[0];
        var link = document.createElement('link');
        link.id = id;
        link.rel = 'stylesheet';
        link.type = 'text/css';
        link.href = path;
        link.media = 'all';
        head.appendChild(link);
    }
}