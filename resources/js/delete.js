window.callAjaxDelete = function (url_delete) {
    let item_id;
    $(".delete_btn").on("click", function (event) {
        item_id = $(this).attr("id");
        $("#mi-modal").modal('show');
    });

    $("#modal-btn-yes").on("click", function () {
        if (typeof item_id === undefined || item_id === null) {
            console.error("Error deleting post: Not defined post");
        } else {
            $.ajax({
                url: url_delete + item_id,
                method: "DELETE",
                success: function (response) {
                    $('#messageAjax').html(response.message)
                    const listClass = document.getElementById("liveToast").classList;
                    if (response.status == "success") {
                        listClass.remove("text-bg-danger");
                        listClass.add("text-bg-success");
                        document.getElementById(`${item_id}`).parentElement.parentElement.remove();
                    } else {
                        listClass.remove("text-bg-success");
                        listClass.add("text-bg-danger");
                    }
                    $("#liveToast").toast({
                        animation: false,
                        autohide: true,
                        delay: 3000
                    }).toast('show');
                },
                error: function (error) {
                    console.error("Error deleting post:", error);
                }
            });
            $("#mi-modal").modal('hide');
        }
    });
}

$().ready(function () {
    // No
    $("#modal-btn-no").on("click", function () {
        $("#mi-modal").modal('hide');
    });
})

module.exports = callAjaxDelete
