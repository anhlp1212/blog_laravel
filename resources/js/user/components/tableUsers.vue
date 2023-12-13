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
                <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    {{ user.id }}
                </td>
                <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    {{ user.name }}
                </td>
                <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    {{ user.email }}
                </td>
                <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    {{ user.role.name }}
                </td>
                <td class="text-center align-middle">
                    <a class="btn btn-success btn-sm" :href="`${urlCurrent}/${user.id}`">Show</a>
                    <a class="btn btn-info btn-sm" :href="`${urlCurrent}/edit/${user.id}`">Edit</a>
                    <a class="btn btn-primary btn-sm delete_btn" v-bind:id="user.id"
                        data-toggle="tooltip" @click.prevent="removeUser">Delete</a>
                </td>
            </tr>
            <confirm-popup
                :user-id="this.userId"
                title-confirm = "Do you want to delete this user?"
            ></confirm-popup>
        </tbody>
    </table>
</template>

<script>
export default {
    name: 'TableUsers',
    data() {
        return {
            theads: ['ID', 'Name', 'Email', 'Roles'],
            users: [],
            userId: Number,
        }
    },
    props: ['url-current', 'data-users'],
    mounted() {
        this.users = JSON.parse(this.dataUsers);
    },
    methods: {
        removeUser: function (event) {
            if (event) {
                this.userId = event.target.id;
                $("#mi-modal").modal('show');
            } else {
                console.error('User cannot delete');
            }
        },
    }
}
</script>
