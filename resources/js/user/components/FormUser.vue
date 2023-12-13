<template>
    <form class="form-add-user" id="form-add-user" method="post">
        <div class="alert alert-warning" v-if="errorsMeg.errorMessage.length"> {{ errorsMeg.errorMessage }} </div>
        <div class="my-form-control">
            <label class="input-label">User Name</label>
            <div class="Style__StyleInput">
                <input v-model="name" class="input_fullName" type="text" name="name" maxlength="128"
                    v-on:input="inputName()" v-validate="'required|max:128'" placeholder="Add User Name" value="" required>
                <ErrorInput
                    :errors-meg="errorsMeg.name"
                    :error-first="errors.first('name')"
                ></ErrorInput>
            </div>
        </div>

        <div class="my-form-control">
            <label class="input-label">Email</label>
            <div class="Style__StyleInput">
                <input v-model="email" class="input_fullName" type="email" name="email" placeholder="Add Email" value=""
                    v-validate="'required|email:rfc,dns'" v-on:input="inputEmail()" required>
                <ErrorInput
                    :errors-meg="errorsMeg.email"
                    :error-first="errors.first('email')"
                ></ErrorInput>
            </div>
        </div>

        <div class="my-form-control">
            <label class="input-label">Choose a Role</label>
            <select v-if="inforRoles.length" v-model="roles" class="form-select form-select-lg" id="roles" name="roles"
                style="width:30%;">
                <option v-for="role in inforRoles" v-bind:value="role.id">
                    {{ role.name }}
                </option>
            </select>
        </div>

        <div class="my-form-control">
            <label class="input-label">Password</label>
            <div class="Style__StyleInput">
                <input v-validate="'required|min:8'" v-model="password" name="password" type="password"
                    placeholder="Enter Password" ref="password" v-on:input="inputPassword()" required>
                <ErrorInput
                    :errors-meg="errorsMeg.password"
                    :error-first="errors.first('password')"
                ></ErrorInput>
            </div>
        </div>

        <div class="my-form-control">
            <label class="input-label">Confirm Password</label>
            <div class="Style__StyleInput">
                <input v-validate="'required|confirmed:password'" v-model="passwordConfirmation"
                    name="password_confirmation" type="password" placeholder="Enter Password to Confirm"
                    data-vv-as="password" required>
                <ErrorInput
                    :errors-meg="errorsMeg.password"
                    :error-first="errors.first('password_confirmation')"
                ></ErrorInput>
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
import ErrorInput from './ErrorInput.vue';

export default {
    data() {
        return {
            inforRoles: [],
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
        }
    },
    components: { ErrorInput },
    props: ['list-role'],
    mounted() {
        this.inforRoles = JSON.parse(this.listRole);
    },
    methods: {
        async submitForm() {
            console.log('Submit Form');

            try {
                if (this.errors.items.length == 0) {
                    await this.axios.post(`/admin/users/add`, {
                        'name': this.name,
                        'email': this.email,
                        'password': this.password,
                        'password_confirmation': this.passwordConfirmation,
                        'roles': this.roles
                    })
                    .then(() => {
                        sessionStorage.setItem("showmsg", "1");
                        window.location.href= "/admin/users/";
                    })
                }
            } catch (error) {
                switch (error.response.status) {
                    case 422: {
                        const errorRes = error.response.data;
                        if (typeof errorRes.errors.name != 'undefined') {
                            this.errorsMeg.name = errorRes.errors.name[0];
                        }
                        if (typeof errorRes.errors.email != 'undefined') {
                            this.errorsMeg.email = errorRes.errors.email[0];
                        }
                        if (typeof errorRes.errors.password != 'undefined') {
                            this.errorsMeg.password = errorRes.errors.password[0];
                        }
                        break;
                    }
                    case 500: {
                        this.errorsMeg.errorMessage = response.data.message;
                    }
                }
            }
        },
        inputName() {
            this.errorsMeg.name = '';
        },
        inputEmail() {
            this.errorsMeg.email = '';
        },
        inputPassword() {
            this.errorsMeg.password = '';
        },
    }
}
</script>