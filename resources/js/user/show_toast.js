const { Toast } = require("bootstrap");

window.showToast = function (content, toastClass) {
    $('#messageAjax').html(content)
    $("#liveToast").addClass(toastClass);
    const myToast = new Toast($('#liveToast'));
    myToast.show();
    // Remove class after hide toast
    $("#liveToast").on("hidden.bs.toast", function () {
        $(this).removeClass(toastClass);
    });
};

module.exports = showToast;
