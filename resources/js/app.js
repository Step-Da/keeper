window.Vue = require('vue');
window.$ = window.jQuery = require('jquery'); 

$(document).ready(() => {
    require('./bootstrap'); 
    require('./lading');
    require('./navbar');
});

// Vue.component('v-appp', require('./components/Acc.vue').default);

const app = new Vue({
    el: '#app',
});
