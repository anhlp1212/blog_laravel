document.addEventListener("DOMContentLoaded", function () {
    var post_id;
    $(".delete_post").on("click", function (event) {
        post_id = $(this).attr("id");
        console.log(post_id);
        $("#mi-modal").modal('show');
    });

    // Yes
    $("#modal-btn-yes").on("click", function () {
        $.ajax({
            url: "/admin/posts/delete_post/" + post_id,
            method: "DELETE",
            success: function (response) {
                $('#messageAjax').html(response.message)
                const listClass = document.getElementById("liveToast").classList;
                if (response.status == "success") {
                    listClass.remove("text-bg-error");
                    listClass.add("text-bg-success");
                    document.getElementById(`${post_id}`).parentElement.parentElement.remove();
                } else {
                    listClass.remove("text-bg-success");
                    listClass.add("text-bg-error");
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
    });

    // No
    $("#modal-btn-no").on("click", function () {
        $("#mi-modal").modal('hide');
    });

});