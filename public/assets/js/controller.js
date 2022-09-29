var assets = '';
requirejs.config({
    baseUrl: "/",
    paths: {
        'tenantLogin': assets + '/js/tenantLogin',
        'vendor': assets + '/assets/js/vendor.min',
        'app': assets + '/assets/js/app.min',
        'registerTenant': assets + '/js/registerTenant',
        'employeeInfo': assets + '/js/employeeInfo',
        'registerEmployee': assets + '/js/registerEmployee',
        'organization': assets + '/js/organization',
        'myProfile': assets + '/js/myProfile',
        'employmentJs': assets + '/js/employmentJs',
        'vehicleJs': assets + '/js/vehicleJs',
        'roleJs': assets + '/js/roleJs',
        'companyJs': assets + '/js/companyJs',
        'departmentJs': assets + '/js/departmentJs',
        'unitJs': assets + '/js/unitJs',
        'branchJs': assets + '/js/branchJs',
        'jobGradeJs': assets + '/js/jobGradeJs',
        'designationJs': assets + '/js/designationJs',
        'SOPJs': assets + '/js/SOPJs',
        'newsJs': assets + '/js/newsJs',
        'employmentTypeJs': assets + '/js/employmentTypeJs',
        'editEmployeeJs': assets + '/js/editEmployeeJs',
        'resetPassJs': assets + '/js/resetPassJs',
        'customerJs': assets + '/js/customerJs',
        'projectJs': assets + '/js/projectJs',
        'editProjectJs': assets + '/js/editProjectJs',
        'requestProjectJs': assets + '/js/requestProjectJs',
        'viewAssignLocation': assets + '/js/viewAssignLocation',
        'myProjectJs': assets + '/js/myProjectJs',
        'projectReportListingJs': assets + '/js/projectReportListingJs',
        'projectStatusJs': assets + '/js/projectStatusJs',
        'typeOfLogsJs': assets + '/js/typeOfLogsJs',
        'myTimesheetJs': assets + '/js/myTimesheetJs',


        // 'main': 'assets/backend/js/main',
        'sweetAlert2': assets + '/assets/sweetalert2/sweetalert2',
    }
});

// var datatableCss = '//cdn.datatables.net/1.10.15/css/jquery.dataTables.css';
var sweetalertCss = assets + '/assets/sweetalert2/sweetalert2.css';
// var dateTimePickerCss = '/plugins/bootstrap/css/bootstrap-datetimepicker.min.css';

loadCss(sweetalertCss, sweetalertCss);
requirejs();
if ($('#loginVendorApp').length > 0) {
    requirejs(['app'], ['vendor']);
}

requirejs();
if ($('#organization').length > 0) {
    requirejs(['organization']);
}

if ($('#registerTenant').length > 0) {
    requirejs(['registerTenant']);
}

if ($('#tenantLogin').length > 0) {
    requirejs(['tenantLogin']);
}

if ($('#tenantLogin').length > 0) {
    requirejs(['tenantLogin']);
}

if ($('#employeeInfo').length > 0) {
    requirejs(['employeeInfo']);
}

if ($('#registerEmployee').length > 0) {
    requirejs(['registerEmployee']);
}

if ($('#myProfile').length > 0) {
    requirejs(['myProfile']);
}

if ($('#employmentJs').length > 0) {
    requirejs(['employmentJs']);
}

if ($('#vehicleJs').length > 0) {
    requirejs(['vehicleJs']);
}

if ($('#roleJs').length > 0) {
    requirejs(['roleJs']);
}

if ($('#companyJs').length > 0) {
    requirejs(['companyJs']);
}

if ($('#departmentJs').length > 0) {
    requirejs(['departmentJs']);
}

if ($('#unitJs').length > 0) {
    requirejs(['unitJs']);
}

if ($('#branchJs').length > 0) {
    requirejs(['branchJs']);
}

if ($('#jobGradeJs').length > 0) {
    requirejs(['jobGradeJs']);
}

if ($('#designationJs').length > 0) {
    requirejs(['designationJs']);
}

if ($('#SOPJs').length > 0) {
    requirejs(['SOPJs']);
}

if ($('#newsJs').length > 0) {
    requirejs(['newsJs']);
}

if ($('#employmentTypeJs').length > 0) {
    requirejs(['employmentTypeJs']);
}

if ($('#editEmployeeJs').length > 0) {
    requirejs(['editEmployeeJs']);
}

if ($('#resetPassJs').length > 0) {
    requirejs(['resetPassJs']);
}

if ($('#customerJs').length > 0) {
    requirejs(['customerJs']);
}

if ($('#projectJs').length > 0) {
    requirejs(['projectJs']);
}

if ($('#editProjectJs').length > 0) {
    requirejs(['editProjectJs']);
}

if ($('#requestProjectJs').length > 0) {
    requirejs(['requestProjectJs']);
}

if ($('#viewAssignLocation').length > 0) {
    requirejs(['viewAssignLocation']);
}

if ($('#myProjectJs').length > 0) {
    requirejs(['myProjectJs']);
}

if ($('#projectReportListingJs').length > 0) {
    requirejs(['projectReportListingJs']);
}

if ($('#projectStatusJs').length > 0) {
    requirejs(['projectStatusJs']);
}

if ($('#typeOfLogsJs').length > 0) {
    requirejs(['typeOfLogsJs']);
}

if ($('#myTimesheetJs').length > 0) {
    requirejs(['myTimesheetJs']);
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
