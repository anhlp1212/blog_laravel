<template>
    <form class="form-add-user" id="form-add-user" method="post">
        <div class="alert alert-warning" v-if="errorsMeg.errorMessage.length"> {{ errorsMeg.errorMessage }} </div>
        <div class="my-form-control">
            <label class="input-label">User Name</label>
            <div class="Style__StyleInput">
                <input v-model="name" class="input_fullName" type="text" name="name" maxlength="128"
                    v-on:input="inputEvent(`name`)" v-validate="'required|max:128'" placeholder="Add User Name" value="" required>
                <error-input
                    :errors-meg="errorsMeg.name"
                    :error-first="errors.first('name')"
                ></error-input>
            </div>
        </div>

        <div class="my-form-control">
            <label class="input-label">Email</label>
            <div class="Style__StyleInput">
                <input v-model="email" class="input_fullName" type="email" name="email" placeholder="Add Email" value=""
                    v-validate="'required|email:rfc,dns'" v-on:input="inputEvent(`email`)" required>
                <error-input
                    :errors-meg="errorsMeg.email"
                    :error-first="errors.first('email')"
                ></error-input>
            </div>
        </div>

        <div class="my-form-control">
            <label class="input-label">Choose a Role</label>
            <select v-if="infoRoles.length" v-model="roles" class="form-select form-select-lg" id="roles" name="roles"
                style="width:30%;">
                <option v-for="role in infoRoles" v-bind:value="role.id">
                    {{ role.name }}
                </option>
            </select>
        </div>

        <div class="my-form-control">
            <label class="input-label">Password</label>
            <div class="Style__StyleInput">
                <input v-validate="'required|min:8'" v-model="password" name="password" type="password"
                    placeholder="Enter Password" ref="password" v-on:input="inputEvent(`password`)" required>
                <error-input
                    :errors-meg="errorsMeg.password"
                    :error-first="errors.first('password')"
                ></error-input>
            </div>
        </div>

        <div class="my-form-control">
            <label class="input-label">Confirm Password</label>
            <div class="Style__StyleInput">
                <input v-validate="'required|confirmed:password'" v-model="passwordConfirmation"
                    name="password_confirmation" type="password" placeholder="Enter Password to Confirm"
                    data-vv-as="password" required>
                <error-input
                    :errors-meg="errorsMeg.password"
                    :error-first="errors.first('password_confirmation')"
                ></error-input>
            </div>
        </div>

        <br />
        <div class="my-form-control">
            <label class="input-label">&nbsp;</label>
            <button type="submit" class="btn btn-primary" @click.prevent="submitForm">Save</button>
        </div>
    </form>
</template>

<script>
import errorInput from './errorInput.vue';

export default {
    data() {
        return {
            infoRoles: [],
            name: '',
            email: '',
            roles: 1,
            password: '',
            passwordConfirmation: '',
            errorsMeg: {
                name: '',
                email: '',
                password: '',
                errorMessage: '',
            },
            user: [],
        }
    },
    components: { errorInput },
    props: ['list-role', 'url-action', 'data-user'],
    mounted() {
        this.infoRoles = JSON.parse(this.listRole);
        if (typeof this.dataUser != "undefined" && this.dataUser != null) {
            this.user = JSON.parse(this.dataUser);
            this.name = this.user.name;
            this.email = this.user.email;
            this.roles = this.user.role_id;
        }
    },
    methods: {
        async submitForm() {
            try {
                if (this.errors.items.length == 0) {
                    if (typeof this.urlAction === "undefined" || this.urlAction === null) {
                        this.errorsMeg.errorMessage = "The request could not be completed. Please try again later.";
                    } else {
                        await this.axios.post(this.urlAction, {
                            'name': this.name,
                            'email': this.email,
                            'password': this.password,
                            'password_confirmation': this.passwordConfirmation,
                            'roles': this.roles,
                            'id': this.user.id
                        })
                        .then(() => {
                            window.location.href= "/admin/users/";
                        });
                    }
                }
            } catch (error) {
                switch (error.response.status) {
                    case 422: {
                        const errorRes = error.response.data;
                        this.errorsMeg.name = errorRes.errors.name ? errorRes.errors.name[0] : '';
                        this.errorsMeg.email = errorRes.errors.email ? errorRes.errors.email[0] : '';
                        this.errorsMeg.password = errorRes.errors.password ? errorRes.errors.password[0] : '';
                        break;
                    }
                    default:
                        this.errorsMeg.errorMessage = "The request could not be completed. Please try again later.";
                }
            }
        },
        inputEvent(item){
            switch (item) {
                case "name":
                    this.errorsMeg.name = '';
                    break;
                case "email":
                    this.errorsMeg.email = '';
                    break;
                case "password":
                    this.errorsMeg.password = '';
            }
        }
    }
}
</script>
