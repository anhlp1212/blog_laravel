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
