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
                    <a v-if="checkUrlShow" class="btn btn-success btn-sm" :href="url_show">Show</a>
                    <!-- @if (Route::has('user.edit_user_page')) -->
                    <a class="btn btn-info btn-sm" href="#">Edit</a>
                    <!-- @endif -->
                    <!-- @if (Route::has('user.delete_user')) -->
                    <a class="btn btn-primary btn-sm delete_btn" v-bind:id="user.id" data-toggle="tooltip"
                        href="#">Delete</a>
                    <!-- @endif -->
                </th>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    data() {
        return {
            theads: ['ID', 'Name', 'Email', 'Roles'],
            users: [],
            errors: [],
            url_show: "/admin/users/"
        }
    },
    props: ['check-url-show'],
    created() {
        this.axios.get('/api/admin/users')
            .then(response => {
                this.users = response.data;
            })
            .catch(e => {
                this.errors.push(e);
            })
    }
}
</script>