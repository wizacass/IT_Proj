window.Vue = require('vue');
window.axios = require('axios');

Vue.component('mainmenu', require('./components/menu.vue').default);
Vue.component("orderinputs", require("./components/orderform.vue").default);

const menuApp = new Vue({
    el: '#mainMenu',
});

const ordersApp = new Vue({
    el: '#orderForm',
});
