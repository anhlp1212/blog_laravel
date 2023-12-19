<template>
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true"
        id="mi-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">{{ this.titleConfirm ? this.titleConfirm : 'Do you want to take this action?' }}</h4>
                    <button type="button" class="btn-close btn-dark" data-dismiss="modal" aria-label="Close"
                        data-bs-dismiss="modal" @click.prevent="confirmNo"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" id="modal-btn-no" @click.prevent="confirmNo()">
                        {{ this.btnNo ? this.btnYes : 'No' }}
                    </button>
                    <button type="button" class="btn btn-primary" id="modal-btn-yes" @click.prevent="confirmYes()">
                        {{ this.btnYes ? this.btnYes : 'Yes' }}
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
                console.error("Error deleting user: Not defined user");
            } else {
                this.axios.delete(`/admin/users/delete_user/${this.userId}`)
                    .then(response => {
                        const toastClass = response.data.status === 'success' ? 'text-bg-success' : 'text-bg-danger';
                        showToast(response.data.message, toastClass);
                        if (typeof this.urlUsers === "undefined" || this.urlUsers === null) {
                            document.getElementById(`${this.userId}`).parentElement.parentElement.remove();
                        } else {
                            setTimeout(() => { window.location.href = this.urlUsers; }, this.timeDelay);
                        }
                    })
                    .catch(error => {
                        console.error(error);
                        showToast(`Error deleting user.`, 'text-bg-danger');
                    });
                $("#mi-modal").modal('hide');
            }
        },
    }
}
</script>
