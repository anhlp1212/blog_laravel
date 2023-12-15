<template>
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true"
        id="mi-modal-change-role" ref="changeRoleModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Change Role</h4>
                    <button type="button" class="btn-close btn-dark" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <select v-show="infoRoles.length" v-model="roleId" class="form-select form-select-lg" name="roles"
                        style="width:100%;">
                        <option v-for="role in infoRoles" :value="role.id">{{ role.name }}</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" @click.prevent="confirmYes">{{ 'Save' }}</button>
                    <button type="button" class="btn btn-primary" @click.prevent="confirmNo">{{ 'No' }}</button>
                </div>
            </div>
        </div>
    </div>
</template>
  
<script>
export default {
    data() {
        return {
            roleId: null
        };
    },
    props: ['infoRoles', 'user'],
    mounted() {
        this.roleId = this.user.role_id;
        $(this.$refs.changeRoleModal).on('shown.bs.modal', this.handleModalShown);
    },
    beforeDestroy() {
        $(this.$refs.changeRoleModal).off('shown.bs.modal', this.handleModalShown);
    },
    computed: {
        rolesAvailable() {
            return this.infoRoles.length > 0;
        }
    },
    methods: {
        confirmNo() {
            $("#mi-modal-change-role").modal('hide');
        },
        confirmYes() {
            this.$emit('role-changed', this.roleId);
            $("#mi-modal-change-role").modal('hide');
        },
        handleModalShown() {
            this.roleId = this.user.role_id;
        }
    }
}
</script>