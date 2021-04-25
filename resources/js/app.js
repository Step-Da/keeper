require('./bootstrap'); // Bootstrap стили для JavaScript
require('./lading'); // Frontend логика работы landing page

window.Vue = require('vue');
Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
});
