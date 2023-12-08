<template>
    <form class="form-add-user" id="form-add-user" method="post">
        <!-- @csrf -->

        <div class="my-form-control">
            <label class="input-label">User Name</label>
            <div class="Style__StyleInput">
                <input class="input_fullName" type="text" name="name" v-validate="'required|max:128'" maxlength="128"
                    placeholder="Add User Name" value="" required>
                <div class="box-error-message">
                    <small class="small">
                        <div class="error">
                            {{ errors.first('name') }}
                        </div>
                    </small>
                </div>
            </div>
        </div>

        <div class="my-form-control">
            <label class="input-label">Email</label>
            <div class="Style__StyleInput">
                <input class="input_fullName" type="email" name="email" v-validate="'required|email:rfc,dns'"
                    placeholder="Add Email" value="" required>
                <div class="box-error-message">
                    <small class="small">
                        <div class="error">
                            {{ errors.first('email') }}
                        </div>
                    </small>
                </div>
            </div>
        </div>

        <div class="my-form-control">
            <label class="input-label">Choose a Role</label>
            <select v-if="inforRoles.length" class="form-select form-select-lg" id="roles" name="roles" style="width:30%;">
                <option v-for="role in inforRoles" v-bind:value="role.id">
                    {{ role.name }}
                </option>
            </select>
        </div>

        <div class="my-form-control">
            <label class="input-label">Password</label>
            <div class="Style__StyleInput">
                <input v-validate="'required|min:8'" name="password" type="password" placeholder="Enter Password"
                    ref="password" required>
                <div class="box-error-message">
                    <small class="small">
                        <div class="error">
                            {{ errors.first('password') }}
                        </div>
                    </small>
                </div>
            </div>
        </div>

        <div class="my-form-control">
            <label class="input-label">Confirm Password</label>
            <div class="Style__StyleInput">
                <input v-validate="'required|confirmed:password'" name="password_confirmation" type="password"
                    placeholder="Enter Password to Confirm" data-vv-as="password" required>
                <div class="box-error-message">
                    <small class="small">
                        <div class="error">
                            {{ errors.first('password_confirmation') }}
                        </div>
                    </small>
                </div>
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
export default {
    data() {
        return {
            inforRoles: [],
        }
    },
    props: ['csrf-token', 'list-role'],
    mounted() {
        this.inforRoles = JSON.parse(this.listRole);
    },
    methods: {
        submitForm() {
            if (this.errors.items.length == 0 && this.checkValidInput()) {
                console.log('Submit succees');
            }
        },
        checkValidInput() {
            if (!this.fields.name.valid || !this.fields.email.valid || !this.fields.password.valid || !this.fields.password_confirmation.valid){
                return false;
            } else {
                return true;
            }
        }
    }
}
</script>