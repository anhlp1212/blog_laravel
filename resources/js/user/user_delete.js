document.addEventListener("DOMContentLoaded", function () {
    var user_id;
    $(".delete_user").on("click", function (event) {
        user_id = $(this).attr("id");
        $("#mi-modal").modal('show');
    });

    // Yes
    $("#modal-btn-yes").on("click", function () {
        $.ajax({
            url: "/admin/users/delete_user/" + user_id,
            method: "DELETE",
            success: function (response) {
                $('#messageAjax').html(response.message)
                const listClass = document.getElementById("liveToast").classList;
                if (response.status == "success") {
                    listClass.remove("text-bg-error");
                    listClass.add("text-bg-success");
                    document.getElementById(`${user_id}`).parentElement.parentElement.remove();
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