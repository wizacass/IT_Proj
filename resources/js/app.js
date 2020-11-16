window.Vue = require('vue');
window.axios = require('axios');

Vue.component('mainmenu', require('./components/menu.vue').default);

const menuApp = new Vue({
    el: '#mainMenu',
});
