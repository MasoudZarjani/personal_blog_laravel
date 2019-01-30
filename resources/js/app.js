require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router';
import Vuetify from 'vuetify';
import router from './routes';
import VueI18n from 'vue-i18n';
import {
    languages
} from './i18n/index.js';
import {
    defaultLocale
} from './i18n/index.js';

window.Vue = Vue;

Vue.use(VueRouter);
Vue.use(Vuetify);
Vue.use(VueI18n);

const messages = Object.assign(languages)

var i18n = new VueI18n({
    locale: defaultLocale,
    fallbackLocale: 'en',
    messages
});

const app = new Vue({
    el: '#app',
    router,
    i18n
});
