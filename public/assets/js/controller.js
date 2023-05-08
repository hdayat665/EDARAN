var assets = "";
requirejs.config({
    baseUrl: "/",
    paths: {
        tenantLogin: assets + "/js/tenantLogin",
        vendor: assets + "/assets/js/vendor.min",
        app: assets + "/assets/js/app.min",
        registerTenant: assets + "/js/registerTenant",
        employeeInfo: assets + "/js/employeeInfo",
        registerEmployee: assets + "/js/registerEmployee",
        organization: assets + "/js/organization",
        myProfile: assets + "/js/myProfile",
        employmentJs: assets + "/js/employmentJs",
        vehicleJs: assets + "/js/vehicleJs",
        roleJs: assets + "/js/roleJs",
        companyJs: assets + "/js/companyJs",
        departmentJs: assets + "/js/departmentJs",
        unitJs: assets + "/js/unitJs",
        branchJs: assets + "/js/branchJs",
        jobGradeJs: assets + "/js/jobGradeJs",
        designationJs: assets + "/js/designationJs",
        SOPJs: assets + "/js/SOPJs",
        newsJs: assets + "/js/newsJs",
        employmentTypeJs: assets + "/js/employmentTypeJs",
        editEmployeeJs: assets + "/js/editEmployeeJs",
        resetPassJs: assets + "/js/resetPassJs",
        customerJs: assets + "/js/customerJs",
        projectJs: assets + "/js/projectJs",
        editProjectJs: assets + "/js/editProjectJs",
        requestProjectJs: assets + "/js/requestProjectJs",
        viewAssignLocation: assets + "/js/viewAssignLocation",
        myProjectJs: assets + "/js/myProjectJs",
        projectReportListingJs: assets + "/js/projectReportListingJs",
        eclaimReportJs: assets + "/js/eclaimReportJs",
        //cashadvancelisting.blade.php
        cashadvancelistingReportJs: assets + "/js/cashadvancelistingReportJs",

        projectStatusJs: assets + "/js/projectStatusJs",
        typeOfLogsJs: assets + "/js/typeOfLogsJs",
        myTimesheetJs: assets + "/js/myTimesheetJs",
        timesheetApprovalJs: assets + "/js/timesheetApprovalJs",
        viewTimesheetJs: assets + "/js/viewTimesheetJs",
        eventRealtimeJs: assets + "/js/eventRealtimeJs",
        statusReportJs: assets + "/js/statusReportJs",
        employeeReportJs: assets + "/js/employeeReportJs",
        overtimeReportJs: assets + "/js/overtimeReportJs",
        employeeReportByJs: assets + "/js/employeeReportByJs",
        employeeReportAllJs: assets + "/js/employeeReportAllJs",
        editHRISJs: assets + "/js/editHRISJs",
        eclaimGenearalJs: assets + "/js/eclaimGenearalJs",
        claimCategoryJs: assets + "/js/claimCategoryJs",
        entitleJs: assets + "/js/entitleJs",
        cashAdvanceJs: assets + "/js/cashAdvanceJs",
        approvalConfigJs: assets + "/js/approvalConfigJs",
        appealMtcJs: assets + "/js/appealMtcJs",
        approveRoleJs: assets + "/js/approveRoleJs",
        cashAdvanceClaimJs: assets + "/js/cashAdvanceClaimJs",
        generalClaimJs: assets + "/js/generalClaimJs",
        myClaimJs: assets + "/js/myClaimJs",
        editGNCJs: assets + "/js/editGNCJs",
        viewGNSJs: assets + "/js/viewGNSJs",
        editCashAdvanceJs: assets + "/js/editCashAdvanceJs",
        monthlyClaimJs: assets + "/js/monthlyClaimJs",
        eclaimDateJs: assets + "/js/eclaimDateJs",
        supervisorDepartmentJs: assets + "/js/supervisorDepartmentJs",
        supervisorDetailClaimJs: assets + "/js/supervisorDetailClaimJs",
        hodClaimJs: assets + "/js/hodClaimJs",
        hodClaimDetailJs: assets + "/js/hodClaimDetailJs",
        mtcClaimDetailJs: assets + "/js/mtcClaimDetailJs",
        fcheckerJs: assets + "/js/fcheckerJs",
        fcheckerGncJs: assets + "/js/fcheckerGncJs",
        financeCheckerMtcJs: assets + "/js/financeCheckerMtcJs",
        financeRecJs: assets + "/js/financeRecJs",
        financeRecMtcJs: assets + "/js/financeRecMtcJs",
        frecGncJs: assets + "/js/frecGncJs",
        fapprovalJs: assets + "/js/fapprovalJs",
        fapprovalDetailJs: assets + "/js/fapprovalDetailJs",
        adminCheckerJs: assets + "/js/adminCheckerJs",
        adminCheckerMtcJs: assets + "/js/adminCheckerMtcJs",
        adminApprovalJs: assets + "/js/adminApprovalJs",
        adminApprovalMtcJs: assets + "/js/adminApprovalMtcJs",
        adminRecJs: assets + "/js/adminRecJs",
        adminRecDetailJs: assets + "/js/adminRecDetailJs",
        cashAdvanceApproverJs: assets + "/js/cashAdvanceApproverJs",
        projectOutsideJs: assets + "/js/projectOutsideJs",
        proejctNonOutsiteJs: assets + "/js/proejctNonOutsiteJs",
        financeCheckerCaJs: assets + "/js/financeCheckerCaJs",
        financeApprocerCaJs: assets + "/js/financeApprocerCaJs",
        financeRecommenderCaJs: assets + "/js/financeRecommenderCaJs",
        fcheckerDetailJs: assets + "/js/fcheckerDetailJs",
        frecDetailCaJs: assets + "/js/frecDetailCaJs",
        fapprovalCaJs: assets + "/js/fapprovalCaJs",
        reportcorJs: assets + "/js/reportcorJs",
        appealTimesheetsJs: assets + "/js/appealTimesheetsJs",

        /// timesheet period
        sheetPeriodJs: assets + "/js/sheetPeriodJs",
        timesheetSummaryJs: assets + "/js/timesheetSummaryJs",
        // 'main': 'assets/backend/js/main',
        sweetAlert2: assets + "/assets/sweetalert2/sweetalert2",

        // eleave
        eleaveentitlementJs: assets + "/js/eleaveentitlementJs",
        eleaveholidayJs: assets + "/js/eleaveholidayJs",
        eleavetypesJs: assets + "/js/eleavetypesJs",

        // myleave
        myleaveJs: assets + "/js/myleaveJs",
        leaveApprJs: assets + "/js/leaveApprJs",
        leaveHodJs: assets + "/js/leaveHodJs",

        // myleave Report
        eleavereportjs: assets + "/js/eleavereportjs",
    },
});

// var datatableCss = '//cdn.datatables.net/1.10.15/css/jquery.dataTables.css';
var sweetalertCss = assets + "/assets/sweetalert2/sweetalert2.css";
// var dateTimePickerCss = '/plugins/bootstrap/css/bootstrap-datetimepicker.min.css';

loadCss(sweetalertCss, sweetalertCss);
requirejs();
if ($("#loginVendorApp").length > 0) {
    requirejs(["app"], ["vendor"]);
}

requirejs();
if ($("#organization").length > 0) {
    requirejs(["organization"]);
}

if ($("#registerTenant").length > 0) {
    requirejs(["registerTenant"]);
}

if ($("#tenantLogin").length > 0) {
    requirejs(["tenantLogin"]);
}

if ($("#tenantLogin").length > 0) {
    requirejs(["tenantLogin"]);
}

if ($("#employeeInfo").length > 0) {
    requirejs(["employeeInfo"]);
}

if ($("#registerEmployee").length > 0) {
    requirejs(["registerEmployee"]);
}

if ($("#myProfile").length > 0) {
    requirejs(["myProfile"]);
}

if ($("#employmentJs").length > 0) {
    requirejs(["employmentJs"]);
}

if ($("#vehicleJs").length > 0) {
    requirejs(["vehicleJs"]);
}

if ($("#roleJs").length > 0) {
    requirejs(["roleJs"]);
}

if ($("#companyJs").length > 0) {
    requirejs(["companyJs"]);
}

if ($("#departmentJs").length > 0) {
    requirejs(["departmentJs"]);
}

if ($("#unitJs").length > 0) {
    requirejs(["unitJs"]);
}

if ($("#branchJs").length > 0) {
    requirejs(["branchJs"]);
}

if ($("#jobGradeJs").length > 0) {
    requirejs(["jobGradeJs"]);
}

if ($("#designationJs").length > 0) {
    requirejs(["designationJs"]);
}

if ($("#SOPJs").length > 0) {
    requirejs(["SOPJs"]);
}

if ($("#newsJs").length > 0) {
    requirejs(["newsJs"]);
}

if ($("#employmentTypeJs").length > 0) {
    requirejs(["employmentTypeJs"]);
}

if ($("#editEmployeeJs").length > 0) {
    requirejs(["editEmployeeJs"]);
}

if ($("#resetPassJs").length > 0) {
    requirejs(["resetPassJs"]);
}

if ($("#customerJs").length > 0) {
    requirejs(["customerJs"]);
}

if ($("#projectJs").length > 0) {
    requirejs(["projectJs"]);
}

if ($("#editProjectJs").length > 0) {
    requirejs(["editProjectJs"]);
}

if ($("#requestProjectJs").length > 0) {
    requirejs(["requestProjectJs"]);
}

if ($("#viewAssignLocation").length > 0) {
    requirejs(["viewAssignLocation"]);
}

if ($("#myProjectJs").length > 0) {
    requirejs(["myProjectJs"]);
}

if ($("#projectReportListingJs").length > 0) {
    requirejs(["projectReportListingJs"]);
}
if ($("#eclaimReportJs").length > 0) {
    requirejs(["eclaimReportJs"]);
}
if ($("#cashadvancelistingReportJs").length > 0) {
    requirejs(["cashadvancelistingReportJs"]);
}
if ($("#projectStatusJs").length > 0) {
    requirejs(["projectStatusJs"]);
}

if ($("#typeOfLogsJs").length > 0) {
    requirejs(["typeOfLogsJs"]);
}

if ($("#myTimesheetJs").length > 0) {
    requirejs(["myTimesheetJs"]);
}

if ($("#timesheetApprovalJs").length > 0) {
    requirejs(["timesheetApprovalJs"]);
}
if ($("#timesheetSummaryJs").length > 0) {
    requirejs(["timesheetSummaryJs"]);
}
if ($("#viewTimesheetJs").length > 0) {
    requirejs(["viewTimesheetJs"]);
}

if ($("#eventRealtimeJs").length > 0) {
    requirejs(["eventRealtimeJs"]);
}

if ($("#statusReportJs").length > 0) {
    requirejs(["statusReportJs"]);
}

if ($("#employeeReportJs").length > 0) {
    requirejs(["employeeReportJs"]);
}

if ($("#overtimeReportJs").length > 0) {
    requirejs(["overtimeReportJs"]);
}

if ($("#employeeReportByJs").length > 0) {
    requirejs(["employeeReportByJs"]);
}

if ($("#employeeReportAllJs").length > 0) {
    requirejs(["employeeReportAllJs"]);
}

if ($("#editHRISJs").length > 0) {
    requirejs(["editHRISJs"]);
}

if ($("#eclaimGenearalJs").length > 0) {
    requirejs(["eclaimGenearalJs"]);
}

if ($("#claimCategoryJs").length > 0) {
    requirejs(["claimCategoryJs"]);
}

if ($("#entitleJs").length > 0) {
    requirejs(["entitleJs"]);
}

if ($("#cashAdvanceJs").length > 0) {
    requirejs(["cashAdvanceJs"]);
}

if ($("#approvalConfigJs").length > 0) {
    requirejs(["approvalConfigJs"]);
}

if ($("#approveRoleJs").length > 0) {
    requirejs(["approveRoleJs"]);
}

if ($("#cashAdvanceClaimJs").length > 0) {
    requirejs(["cashAdvanceClaimJs"]);
}

if ($("#generalClaimJs").length > 0) {
    requirejs(["generalClaimJs"]);
}

if ($("#myClaimJs").length > 0) {
    requirejs(["myClaimJs"]);
}

if ($("#editGNCJs").length > 0) {
    requirejs(["editGNCJs"]);
}

if ($("#viewGNSJs").length > 0) {
    requirejs(["viewGNSJs"]);
}

if ($("#editCashAdvanceJs").length > 0) {
    requirejs(["editCashAdvanceJs"]);
}

if ($("#monthlyClaimJs").length > 0) {
    requirejs(["monthlyClaimJs"]);
}

if ($("#eleaveentitlementJs").length > 0) {
    requirejs(["eleaveentitlementJs"]);
}

if ($("#eleaveholidayJs").length > 0) {
    requirejs(["eleaveholidayJs"]);
}

if ($("#eleavetypesJs").length > 0) {
    requirejs(["eleavetypesJs"]);
}

if ($("#myleaveJs").length > 0) {
    requirejs(["myleaveJs"]);
}
if ($("#leaveApprJs").length > 0) {
    requirejs(["leaveApprJs"]);
}
if ($("#appealMtcJs").length > 0) {
    requirejs(["appealMtcJs"]);
}
if ($("#leaveHodJs").length > 0) {
    requirejs(["leaveHodJs"]);
}

if ($("#eclaimDateJs").length > 0) {
    requirejs(["eclaimDateJs"]);
}

if ($("#supervisorDepartmentJs").length > 0) {
    requirejs(["supervisorDepartmentJs"]);
}
if ($("#sheetPeriodJs").length > 0) {
    requirejs(["sheetPeriodJs"]);
}

if ($("#supervisorDetailClaimJs").length > 0) {
    requirejs(["supervisorDetailClaimJs"]);
}

if ($("#hodClaimJs").length > 0) {
    requirejs(["hodClaimJs"]);
}

if ($("#hodClaimDetailJs").length > 0) {
    requirejs(["hodClaimDetailJs"]);
}
if ($("#mtcClaimDetailJs").length > 0) {
    requirejs(["mtcClaimDetailJs"]);
}
if ($("#fcheckerGncJs").length > 0) {
    requirejs(["fcheckerGncJs"]);
}

if ($("#fcheckerJs").length > 0) {
    requirejs(["fcheckerJs"]);
}

if ($("#financeCheckerMtcJs").length > 0) {
    requirejs(["financeCheckerMtcJs"]);
}

if ($("#financeRecJs").length > 0) {
    requirejs(["financeRecJs"]);
}

if ($("#financeRecMtcJs").length > 0) {
    requirejs(["financeRecMtcJs"]);
}

if ($("#frecGncJs").length > 0) {
    requirejs(["frecGncJs"]);
}

if ($("#fapprovalJs").length > 0) {
    requirejs(["fapprovalJs"]);
}

if ($("#fapprovalDetailJs").length > 0) {
    requirejs(["fapprovalDetailJs"]);
}

if ($("#adminCheckerJs").length > 0) {
    requirejs(["adminCheckerJs"]);
}

if ($("#adminCheckerMtcJs").length > 0) {
    requirejs(["adminCheckerMtcJs"]);
}

if ($("#adminApprovalJs").length > 0) {
    requirejs(["adminApprovalJs"]);
}

if ($("#adminApprovalMtcJs").length > 0) {
    requirejs(["adminApprovalMtcJs"]);
}

if ($("#adminRecJs").length > 0) {
    requirejs(["adminRecJs"]);
}

if ($("#adminRecDetailJs").length > 0) {
    requirejs(["adminRecDetailJs"]);
}

if ($("#cashAdvanceApproverJs").length > 0) {
    requirejs(["cashAdvanceApproverJs"]);
}

if ($("#projectOutsideJs").length > 0) {
    requirejs(["projectOutsideJs"]);
}

if ($("#proejctNonOutsiteJs").length > 0) {
    requirejs(["proejctNonOutsiteJs"]);
}

if ($("#financeCheckerCaJs").length > 0) {
    requirejs(["financeCheckerCaJs"]);
}

if ($("#financeApprocerCaJs").length > 0) {
    requirejs(["financeApprocerCaJs"]);
}

if ($("#financeRecommenderCaJs").length > 0) {
    requirejs(["financeRecommenderCaJs"]);
}

if ($("#fcheckerDetailJs").length > 0) {
    requirejs(["fcheckerDetailJs"]);
}

if ($("#frecDetailCaJs").length > 0) {
    requirejs(["frecDetailCaJs"]);
}

if ($("#fapprovalCaJs").length > 0) {
    requirejs(["fapprovalCaJs"]);
}

if ($("#reportcorJs").length > 0) {
    requirejs(["reportcorJs"]);
}

if ($("#eleavereportjs").length > 0) {
    requirejs(["eleavereportjs"]);
}

if ($("#appealTimesheetsJs").length > 0) {
    requirejs(["appealTimesheetsJs"]);
}

$(document).ajaxStart(function () {
    $("#overlay").show();
    $("#loading-message").show();
});

$(document).ajaxStop(function () {
    $("#overlay").hide();
    $("#loading-message").hide();
});

// Global function
function ajax(ajaxFunction, params, async = true) {
    var path = "/ajaxController/" + ajaxFunction;
    return $.ajax({
        type: "POST",
        data: {
            func: ajaxFunction,
            param: params,
        },
        url: path,
        success: function (data) {},
        async: async,
    });
}

function loadCss(id, path) {
    if (!document.getElementById(id)) {
        var head = document.getElementsByTagName("head")[0];
        var link = document.createElement("link");
        link.id = id;
        link.rel = "stylesheet";
        link.type = "text/css";
        link.href = path;
        link.media = "all";
        head.appendChild(link);
    }
}
