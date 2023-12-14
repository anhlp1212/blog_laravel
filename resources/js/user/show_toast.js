window.sessionShowToast = function () {
    if (typeof sessionStorage.getItem("showmsg") !== 'undefined' && sessionStorage.getItem("showmsg") !== null) {
        let showMsg = JSON.parse(sessionStorage.getItem("showmsg"))
        if (showMsg.status == '1') {
            this.showToast(showMsg.content, showMsg.classToast);
            sessionStorage.removeItem("showmsg");
        }
    }
};

window.showToast = function (content, toastClass) {
    $('#messageAjax').html(content)
    $("#liveToast").addClass(toastClass);
    $("#liveToast").toast({
        animation: false,
        autohide: true,
        delay: 2000
    }).toast('show');
    // Remove class after hide toast
    $("#liveToast").on("hidden.bs.toast", function () {
        $(this).removeClass(toastClass);
    });
};

module.exports = showToast;
module.exports = sessionShowToast;
