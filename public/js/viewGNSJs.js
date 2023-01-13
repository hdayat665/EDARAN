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
            console.log(data.claim_category_content);
            // $("#year").val(data.year);
            // $("#month").val(data.month);
            $("#applied_date").val(data.applied_date);
            $("#claim_category").val(data.claim_category);
            $("#label").text(data.claim_category_content.label);
            $("#contents").val(data.claim_category_content.content);
            $("#amount").val(data.amount);
            $("#desc").val(data.desc);
            $("#file_upload").html(
                "<a href='/storage/" +
                    data.file_upload +
                    "'>" +
                    data.file_upload +
                    "</a>"
            );
        });
        $("#viewModal").modal("show");
    });

    $(document).on("click", "#btn-view-subsistence", function () {
        $("#modal-view-subsistence").modal("show");
    });
    $(document).on("click", "#btn-view", function () {
        $("#modal-view").modal("show");
    });
});
