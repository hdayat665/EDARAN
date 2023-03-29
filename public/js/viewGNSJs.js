$(document).ready(function () {
    $("#claimtable").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"],
        ],
    });
    $("#traveltable").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"],
        ],
    });
    $(document).on("click", "#btn-view-claim", function () {
        $("#modal-view-claim").modal("show");
    });

    function getClaimContent(id) {
        return $.ajax({
            url: "/getClaimContentById/" + id,
        });
    }
    
    $(document).on("click", "#buttonView", function () {
        var id = $(this).data("id");
        var contentData = getClaimContent(id); 

        contentData.done(function (data) {
            //console.log(contentData);
            
            // $("#year").val(data.year);
            // $("#month").val(data.month);
            
            $("#applied_date").val(moment(data.applied_date).format('YYYY-MM-DD'));
            $("#claim_category").val(data.claim_category_name);
            $("#label").text(data.claim_category_content.label);
            $("#contents").val(data.claim_category_content.content);
            $("#amount").val(data.amount);
            $("#desc").val(data.desc); 
            var fileNames = data.file_upload.split(',');
            var html = '';
            for(var i=0; i<fileNames.length; i++){
                html += "<a href='/storage/" + fileNames[i] + "' target='_blank'>" + fileNames[i] + "</a><br>";
            }
            $("#file_upload").html(html);
        });
        // Get the claim category ID from the input field

        $("#viewModal").modal("show");

    });

    $(document).on("click", "#btn-view-subsistence", function () {
        $("#modal-view-subsistence").modal("show");
    });
    $(document).on("click", "#btn-view", function () {
        $("#modal-view").modal("show");
    });
});
