window.Vue = require('vue');
window.axios = require('axios');

Vue.component('mainmenu', require('./components/menu.vue').default);

const menuApp = new Vue({
    el: '#mainMenu',
});

const dynamicInputs = new Vue({
    el: '#orderForm',
    data: {
        count: 0,
    },
    methods: {
        add: function() {
            this.count++
        },
        remove: function() {
            if(this.count > 0) {
                this.count--
            }
        }
    }
});
