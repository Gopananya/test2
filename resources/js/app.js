require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
import store from './store';
import { router } from './router';
import MainApp from './components/MainApp.vue';
import {interceptor} from './helpers/interceptor';

interceptor(store, router);
const app = new Vue({
    el: '#app',
    router,store,
    components: {
    	MainApp
    }
});
