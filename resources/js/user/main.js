// Libraries
import Vue from 'vue';
import axios from 'axios';
import VueAxios from 'vue-axios';

Vue.use(VueAxios, axios);

// Import Vue components
import tableUsers from './components/tableUsers.vue';
import confirmPopup from './components/confirmPopup.vue';
import toastPopup from './components/toastPopup.vue';
import infoUser from './components/infoUser.vue';

Vue.component('table-users', tableUsers);
Vue.component('confirm-popup', confirmPopup);
Vue.component('toast-popup', toastPopup);
Vue.component('info-user', infoUser);

new Vue({
    el: '#app',
});
