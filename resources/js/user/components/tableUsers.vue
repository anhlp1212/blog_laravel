<template>
    <div>
        <table class="table align-items-center mb-0" id="my-table">
            <thead>
                <tr>
                    <th v-for="thead in theads" class="text-uppercase text-sm font-weight-bolder text-dark opacity-7">
                        {{ thead }}</th>
                    <th class="text-secondary opacity-7"></th>
                </tr>
            </thead>
            <tbody class="table-tbody-sp">
                <tr v-for="user in paginatedUsers" :key="user.id">
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
                        {{ user.role.name }}
                    </td>
                    <td class="text-center">
                        <a class="btn btn-success btn-sm" :href="`${urlCurrent}/${user.id}`">Show</a>
                        <a class="btn btn-info btn-sm" :href="`${urlCurrent}/edit/${user.id}`">Edit</a>
                        <a class="btn btn-primary btn-sm delete_btn" v-bind:id="user.id" data-toggle="tooltip"
                            @click.prevent="removeUser">Delete</a>
                    </td>
                </tr>
                <confirm-popup 
                    :user-id="this.userId" 
                    title-confirm="Do you want to delete this user?"
                ></confirm-popup>
            </tbody>
        </table>

        <!-- Phân trang -->
        <div class="flex-1 mt-3 me-5 flex justify-right font-sans">
            <paginate 
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
import Paginate from 'vuejs-paginate';

export default {
    name: 'TableUsers',
    components: {
        paginate: Paginate,
    },
    data() {
        return {
            theads: ['ID', 'Name', 'Email', 'Roles'],
            users: [],  // Dữ liệu cần phân trang
            userId: Number,
            currentPage: 1,     // Trang hiện tại
            perPage: 10,      // Số lượng mục trên mỗi trang
        }
    },
    props: ['url-current', 'data-users'],
    mounted() {
        this.users = JSON.parse(this.dataUsers);
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
                console.error('User cannot delete');
            }
        },
        selectPage(page) {
            this.currentPage = page;
        },
    }
}
</script>
