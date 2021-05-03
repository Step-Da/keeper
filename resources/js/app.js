window.Vue = require('vue'); // Подключение JavaScript-фреймворка Vue.js
window.$ = window.jQuery = require('jquery'); // Подключение библиотеки Jquery

$(document).ready(() => {
    require('./bootstrap'); // Подключение стилей Bootstrap
    require('./lading'); // Подключение логики работы landing page
    require('./navbar'); // Подключение логики работы navbar на accout layout
    require('./todo'); // Подключение логики работы todo list на todo page
    require('./supporting/counter'); // Подключение логики работы виджита counter
});

// Vue.component('v-appp', require('./components/Acc.vue').default);

const app = new Vue({
    el: '#app',
});
