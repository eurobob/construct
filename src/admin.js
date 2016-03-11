// Vue setup
var Vue = require('vue');
Vue.use(require('vue-resource'));
Vue.use(require('vue-router'));
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');

// Import custom components
// import custom from './components/custom.vue';

// Set custom data, components & events
let appData = {}

let appComponents = {}

let appEvents = {}

// Import Livit\Build data, components & events
import { lbData, lbEvents, lbComponents } from '../../../vendor/livit/build/src/assets/js/admin.js'

// Merge objects
const data = Object.assign(objectToMergeTo, appData, lbData)
const components = Object.assign(objectToMergeTo, appComponents, lbComponents)
const events = Object.assign(objectToMergeTo, appEvents, lbEvents)

// Initialise Vue
new Vue({
    el: '#app',
    data,
    components,
    events
});