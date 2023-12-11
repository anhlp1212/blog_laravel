<template>
    <table class="table align-items-center mb-0">
        <thead>
            <tr>
                <th v-for="thead in theads" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    {{ thead }}</th>
                <th class="text-secondary opacity-7"></th>
            </tr>
        </thead>
        <tbody class="table-tbody-sp">
            <tr v-for="user in users">
                <th v-for="item in user" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    {{ item }}
                </th>
                <th class="text-center align-middle">
                    <a v-if="checkUrlShow" class="btn btn-success btn-sm" :href="url_show + user.id">Show</a>
                    <a v-if="checkUrlEdit" class="btn btn-info btn-sm" :href="url_edit + user.id">Edit</a>
                    <a v-if="checkUrlDelete" class="btn btn-primary btn-sm delete_btn" v-bind:id="user.id"
                        data-toggle="tooltip" @click.prevent="removeUser">Delete</a>
                </th>
            </tr>
            <ConfirmPopup :user-id="this.user_id"></ConfirmPopup>
        </tbody>
    </table>
</template>

<script>
import ConfirmPopup from './ConfirmPopup.vue';

export default {
    name: 'TableUsers',
    components: { ConfirmPopup },
    data() {
        return {
            theads: ['ID', 'Name', 'Email', 'Roles'],
            users: [],
            url_show: "/admin/users/",
            url_edit: "/admin/users/edit/",
            user_id: Number,
        }
    },
    props: ['check-url-show', 'check-url-edit', 'check-url-delete', 'data-users'],
    mounted() {
        this.users = JSON.parse(this.dataUsers);
    },
    methods: {
        removeUser: function (event) {
            if (event) {
                this.user_id = event.target.id;
                $("#mi-modal").modal('show');
            } else {
                console.error('User cannot delete');
            }
        },
    }
}
</script>
