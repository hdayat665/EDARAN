requirejs.config({
    baseUrl: "/",
    paths: {
        'scripts': '/public/assets/js/scripts',
        'material': '/public/assets/js/material',
        'register': '/public/assets/js/register',
        'login': '/public/assets/js/login',
        'domain': '/public/assets/js/domain',
        'forgotPass': '/public/assets/js/forgotPass',
        'search-box': 'assets/frontend/js/search-box',
        'homepage': 'assets/frontend/js/homepage',
        'sweetAlert2': '/public/assets/sweetalert2/sweetalert2',
    }
});

// var datatableCss = '//cdn.datatables.net/1.10.15/css/jquery.dataTables.css';
var sweetalertCss = '/public/assets/sweetalert2/sweetalert2.css';
// var dateTimePickerCss = '/plugins/bootstrap/css/bootstrap-datetimepicker.min.css';

loadCss(sweetalertCss, sweetalertCss);
requirejs(['scripts', 'material']);

if ($('#register').length > 0) {
    requirejs(['register']);
}

if ($('#login').length > 0) {
    requirejs(['login']);
}

if ($('#domain').length > 0) {
    requirejs(['domain']);
}

if ($('#forgotPass').length > 0) {
    requirejs(['forgotPass']);
}


// Global function
function ajax(ajaxFunction, params, async = true) {
    var path = '/AjaxController/' + ajaxFunction;
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