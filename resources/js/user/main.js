// Libraries
console.log('defer');
import Vue from 'vue';
import axios from 'axios';
import VueAxios from 'vue-axios';
Vue.use(VueAxios, axios);

// Import Vue components
import TableUsers from './components/TableUsers.vue';

Vue.component('table-users', TableUsers);

new Vue({
    el:'#app',
});