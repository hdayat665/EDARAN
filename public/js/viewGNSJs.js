$(document).ready(function () {
    $("#claimtable").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        initComplete: function (settings, json) {
            $("#claimtable").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
    });
    $("#traveltable").DataTable({
        responsive: false,
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
        ],
        initComplete: function (settings, json) {
            $("#traveltable").wrap(
                "<div style='overflow:auto; width:100%;position:relative;'></div>"
            );
        },
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
    
        contentData.then(function (data) {
            
    
            // Check if claim_category_content.label is not null
            if (data.claim_category_content && data.claim_category_content.label !== null) {
                $("#label").text(data.claim_category_content.label);
                $("#label").show();
            } else {
                $("#label").hide();
            }
    
            // Check if claim_category_content.content is not null
            if (data.claim_category_content && data.claim_category_content.content !== null) {
                $("#contents").val(data.claim_category_content.content);
                $("#contents").show();
            } else {
                $("#contents").hide();
            }
    
            $("#applied_date").val(
                moment(data.applied_date).format("YYYY-MM-DD")
            );
            $("#claim_category").val(data.claim_category_name);
            $("#amount").val(data.amount);
            $("#desc").val(data.desc);
            var fileNames = data.file_upload.split(",");
            var html = "";
            for (var i = 0; i < fileNames.length; i++) {
                html +=
                    "<a href='/storage/" +
                    fileNames[i] +
                    "' target='_blank'>" +
                    fileNames[i] +
                    "</a><br>";
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
