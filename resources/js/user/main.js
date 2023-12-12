// Libraries
import Vue from 'vue';
import axios from 'axios';
import VueAxios from 'vue-axios';

Vue.use(VueAxios, axios);

// Import Vue components
import TableUsers from './components/tableUsers.vue';
import ConfirmPopup from './components/confirmPopup.vue';
import ToastPopup from './components/toastPopup.vue';

Vue.component('table-users', TableUsers);
Vue.component('confirm-popup', ConfirmPopup);
Vue.component('toast-popup', ToastPopup);

new Vue({
    el: '#app',
});
