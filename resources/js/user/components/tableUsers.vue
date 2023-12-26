<template>
  <div>
    <table class="table align-items-center mb-0">
        <thead>
            <tr>
                <th v-for="thead in theads" class="text-uppercase text-sm font-weight-bolder text-dark opacity-7">
                    {{ thead }}</th>
                <th class="text-secondary opacity-7"></th>
            </tr>
        </thead>
        <tbody class="table-tbody-sp">
            <tr v-for="user in users" :key="user.id">
                <td class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                    {{ user.id }}
                </td>
                <td class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                    {{ user.name }}
                </td>
                <td class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                    {{ user.email }}
                </td>
                <td class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                    <div class="d-flex align-items-center gap-2">
                        <div style="min-width: 60px;" :id="`role-${user.id}`">{{ user.role.name }}</div>
                        <button type="button" class="p-1 m-0 btn btn-sm btn-dark" @click.prevent="() => changeRole($event, user)">Change</button>
                    </div>
                </td>
                <td class="text-center">
                    <a class="btn btn-success btn-sm" :href="`${urlCurrent}/${user.id}`">Show</a>
                    <a class="btn btn-info btn-sm" :href="`${urlCurrent}/edit/${user.id}`">Edit</a>
                    <a class="btn btn-primary btn-sm delete_btn" :id="user.id" data-toggle="tooltip"
                        @click.prevent="removeUser">Delete</a>
                </td>
            </tr>
            <confirm-popup
                :user-id = this.userId
                title-confirm = "Do you want to delete this user?"
            ></confirm-popup>
            <selectRole
                v-if = this.userChoice
                :info-roles = infoRoles
                :user = this.userChoice
                @role-changed="showDataChanged"
            ></selectRole>
        </tbody>
    </table>
    <!-- Phân trang -->
    <div class="flex-1 mt-3 me-5 flex justify-right font-sans">
        <paginate
            v-if="pageCount !== 1"
            :page-count="pageCount"
            :click-handler="selectPage"
            :prev-text="'Previous'"
            :next-text="'Next'"
            :container-class="'pagination'"
            :page-class="'page-item'"
            :page-link-class="'page-link'"
        ></paginate>
    </div>
    </div>
</template>

<script>
import { ref } from 'vue';
import selectRole from './selectRole.vue';
import paginate from 'vuejs-paginate';
export default {
    name: 'TableUsers',
    components: { selectRole, paginate },
    data() {
        return {
            theads: ['ID', 'Name', 'Email', 'Roles'],
            users: [],
            infoRoles: [],
            userId: Number,
            userChoice: ref(null),
            currentPage: 1,     // Trang hiện tại
            perPage: 10,      // Số lượng mục trên mỗi trang
        }
    },
    props: ['url-current', 'data-users', 'data-roles'],
    mounted() {
        this.users = JSON.parse(this.dataUsers);
        this.infoRoles = JSON.parse(this.dataRoles);
        this.userChoice = this.users[0];
    },
    computed: {
        paginatedUsers() {
            const start = (this.currentPage - 1) * this.perPage;
            const end = start + this.perPage;
            return this.users.slice(start, end);
        },
        pageCount() {
            return Math.ceil(this.users.length / this.perPage);
        },
    },
    methods: {
        removeUser: function (event) {
            if (event) {
                this.userId = event.target.id;
                $("#mi-modal").modal('show');
            } else {
                showToast(`Error deleting user: ${error.message}`, 'text-bg-danger');
            }
        },
        selectPage(page) {
            this.currentPage = page;
        },
        changeRole: function(event, user){
            this.userChoice = user;
            if (event) {
                $("#mi-modal-change-role").modal('show');
            } else {
                showToast(`Error change role: ${error.message}`, 'text-bg-danger');
            }
        },
        async showDataChanged(data){
            if (data.roleId !== this.userChoice.role_id) {
                try {
                    await this.axios.post(`/admin/users/change_role`, {
                    'id':this.userChoice.id,
                    'role_id': data.roleId
                    })
                    .then(response => {
                        const toastClass = response.data.status === 'success' ? 'text-bg-success' : 'text-bg-danger';
                        showToast(response.data.message, toastClass);
                        const changedRole = this.infoRoles.find(role => role.id === data.roleId);
                        document.getElementById(`role-${this.userChoice.id}`).innerHTML = changedRole.name;
                        this.userChoice.role_id = changedRole.id;
                    });
                } catch (error) {
                    console.error(error);
                    showToast(`Error change role: ${error.message}`, 'text-bg-danger');
                }
            }
        }
    }
}
</script>
