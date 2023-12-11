// Libraries
import Vue from 'vue';
import axios from 'axios';
import VueAxios from 'vue-axios';

Vue.use(VueAxios, axios);

// Import Vue components
import TableUsers from './components/TableUsers.vue';
import ConfirmPopup from './components/ConfirmPopup.vue';
import ToastPopup from './components/ToastPopup.vue';

Vue.component('table-users', TableUsers);
Vue.component('confirm-popup', ConfirmPopup);
Vue.component('toast-popup', ToastPopup);

new Vue({
    el: '#app',
});
