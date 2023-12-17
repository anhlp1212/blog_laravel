<template>
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true"
        id="mi-modal-change-role" ref="changeRoleModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Change Role</h4>
                    <button type="button" class="btn-close btn-dark" data-bs-dismiss="modal" aria-label="Close" @click.prevent="confirmNo"></button>
                </div>
                <div class="modal-body">
                    <select v-show="infoRoles.length" v-model="roleId" class="select form-select-lg" name="roles"
                        style="width:100%;">
                        <option v-for="role in infoRoles" :value="role.id">{{ role.name }}</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" @click.prevent="confirmNo">{{ 'No' }}</button>
                    <button type="button" class="btn btn-primary" @click.prevent="confirmYes">{{ 'Save' }}</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            roleId: Number
        };
    },
    props: ['infoRoles', 'user'],
    mounted() {
        $(this.$refs.changeRoleModal).on('shown.bs.modal', this.handleModalShown);
    },
    beforeDestroy() {
        $(this.$refs.changeRoleModal).off('shown.bs.modal', this.handleModalShown);
    },
    methods: {
        confirmNo() {
            $("#mi-modal-change-role").modal('hide');
        },
        confirmYes() {
            this.$emit('role-changed', {roleId: this.roleId, userId: this.user.id} );
            $("#mi-modal-change-role").modal('hide');
        },
        handleModalShown() {
            this.roleId = this.user.role_id;
        }
    }
}
</script>
