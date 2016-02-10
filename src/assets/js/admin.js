var Vue = require('vue');

Vue.use(require('vue-resource'));
Vue.use(require('vue-router'));

Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');

import editableText from './components/editableText.vue';

new Vue({
    el: '#app',
    data: {
        appLoaded: true
    },
    components: {
        editableText
    }
});