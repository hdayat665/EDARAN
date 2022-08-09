requirejs.config({
    baseUrl: "/",
    paths: {
        'login': 'assets/backend/js/login',
        'default': 'assets/backend/js/default',
        'main': 'assets/backend/js/main',
        'sweetAlert2': 'assets/backend/js/plugins/sweetalert2/sweetalert2',
    }
});

// var datatableCss = '//cdn.datatables.net/1.10.15/css/jquery.dataTables.css';
var sweetalertCss = '/assets/backend/js/plugins/sweetalert2/sweetalert2.css';
// var dateTimePickerCss = '/plugins/bootstrap/css/bootstrap-datetimepicker.min.css';

loadCss(sweetalertCss, sweetalertCss);
requirejs(['default']);
if ($('#loginLayout').length > 0) {
    requirejs(['login']);
}

if ($('#mainLayout').length > 0) {
    requirejs(['main']);
}

// Global function
function ajax(ajaxFunction, params, async = true) {
    var path = '/backend/ajax_controller/' + ajaxFunction;
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