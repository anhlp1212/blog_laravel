import callAjaxDelete from "/js/delete.js";

document.addEventListener("DOMContentLoaded", function () {
    const url_delete = "/admin/users/delete_user/";
    window.callAjaxDelete(url_delete);
});
