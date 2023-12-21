// Libraries
import Vue from 'vue';
import axios from 'axios';
import VueAxios from 'vue-axios';
import VeeValidate from 'vee-validate';

Vue.use(VueAxios, axios);
Vue.use(VeeValidate);

// Import Vue components
import tableUsers from './components/tableUsers.vue';
import confirmPopup from './components/confirmPopup.vue';
import toastPopup from './components/toastPopup.vue';
import infoUser from './components/infoUser.vue';
import formUser from './components/formUser.vue';

Vue.component('table-users', tableUsers);
Vue.component('confirm-popup', confirmPopup);
Vue.component('toast-popup', toastPopup);
Vue.component('info-user', infoUser);
Vue.component('form-user', formUser);

// Import JS
import sessionShowToast from "/js/show_toast.js";
import showToast from "/js/show_toast.js";

document.addEventListener("DOMContentLoaded", function() {
    window.sessionShowToast();
});

new Vue({
    el: '#app',
});
