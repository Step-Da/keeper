window.Vue = require('vue'); // Подключение JavaScript-фреймворка Vue.js
window.$ = window.jQuery = require('jquery'); // Подключение библиотеки Jquery

$(document).ready(() => {
    require('./bootstrap'); // Подключение стилей Bootstrap
    require('./lading'); // Подключение логики работы landing page
    require('./navbar'); // Подключение логики работы navbar на accout layout
    require('./todo'); // Подключение логики работы todo list на todo page
    require('./kanban'); // Подключение логики работы Kanban page на account layout
    require('./supporting/counter'); // Подключение логики работы виджита counter
    require('./supporting/addition'); // Подключение вспомогательной логики на account layout
    require('./supporting/search'); // Подключение логики работы живого поиска для web-ресурса
    require('./supporting/worker'); // Подключение логики работы для выполнения проектной задачи worker page на account layout
    require('./chart'); // Подключение логики работы для построения графиков для worker page на account layout
});

// Vue.component('v-appp', require('./components/Acc.vue').default);

const app = new Vue({
    el: '#app',
});

