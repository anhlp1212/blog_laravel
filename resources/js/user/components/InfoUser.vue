<template>
    <div class="row">
        <div class="col-12 col-xl-4">
            <div class="card card-plain h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h6 class="mb-0">Profile Information</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <hr class="horizontal gray-light my-4">
                    <ul class="list-group">
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full
                                Name:</strong> &nbsp; {{ this.userName }}</li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong>
                            &nbsp; {{ this.userEmail }}</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-12 mt-4 d-grid gap-2 d-md-flex" style="justify-content: space-between;">
            <div>
                <a class="btn btn-info btn-sm" :href="urlEdit">Edit</a>
                <a class="btn btn-primary btn-sm" :id="this.userId" @click.prevent="removeUser()" >Delete</a>
            </div>
            <div class="justify-content-md-end">
                <a class="btn btn-secondary btn-sm me-md-2" :href="urlBack">Back</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['user-id', 'user-name', 'user-email', 'url-edit', 'url-back'],
    methods: {
        removeUser: function () {
            $("#mi-modal").modal('show');
        }
    }
}
</script>