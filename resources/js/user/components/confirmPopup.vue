<template>
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true"
        id="mi-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">{{ this.titleConfirm ? this.titleConfirm : 'Do you want to take this action ? ' }}</h4>
                    <button type="button" class="btn-close btn-dark" data-dismiss="modal" aria-label="Close"
                        data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" id="modal-btn-yes" @click.prevent="confirmYes()">
                        {{ this.btnYes ? this.btnYes : 'Yes' }}
                    </button>
                    <button type="button" class="btn btn-primary" id="modal-btn-no" @click.prevent="confirmNo()">
                        {{ this.btnNo ? this.btnYes : 'No' }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ConfirmPopup",
    data() {
        return {
            timeDelay: 2000,
        }
    },
    props: ['user-id', 'url-users', 'title-confirm', 'btn-yes', 'btn-no'],
    methods: {
        confirmNo: function () {
            $("#mi-modal").modal('hide');
        },
        confirmYes: function () {
            if (typeof this.userId === "undefined" || this.userId === null) {
                console.error("Error deleting post: Not defined post");
            } else {
                this.axios.delete(`/admin/users/delete_user/${this.userId}`)
                    .then(response => {
                        $('#messageAjax').html(response.data.message)
                        const toastClass = response.data.status === 'success' ? 'text-bg-success' : 'text-bg-error';
                        $("#liveToast").addClass(toastClass);
                        this.showToast();
                        if (typeof this.urlUsers === "undefined" || this.urlUsers === null) {
                            document.getElementById(`${this.userId}`).parentElement.parentElement.remove();
                        } else {
                            setTimeout(() => { window.location.href = this.urlUsers; }, this.timeDelay)
                        }
                    })
                    .catch(error => {
                        console.error(error);
                        $('#messageAjax').html(`Error deleting user: ${error.message}`);
                        this.showToast();
                    });
                $("#mi-modal").modal('hide');
            }
        },
        showToast: function () {
            $("#liveToast").toast({
                animation: false,
                autohide: true,
                delay: this.timeDelay
            }).toast('show');
        }
    }
}
</script>
