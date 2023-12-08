// Libraries
import Vue from 'vue';
import axios from 'axios';
import VueAxios from 'vue-axios';
import VeeValidate from 'vee-validate';

Vue.use(VueAxios, axios);
Vue.use(VeeValidate);

// Import Vue components
import TableUsers from './components/TableUsers.vue';
import InfoUser from './components/InfoUser.vue';
import ConfirmPopup from './components/ConfirmPopup.vue';
import ToastPopup from './components/ToastPopup.vue';
import FormUser from './components/FormUser.vue';

Vue.component('table-users', TableUsers);
Vue.component('info-user', InfoUser);
Vue.component('confirm-popup', ConfirmPopup);
Vue.component('toast-popup', ToastPopup);
Vue.component('form-user', FormUser);

new Vue({
    el: '#app',
});