import VueRouter from 'vue-router';
import Index from './components/Index';
import Contact from './components/Contact';

let routes = [{
        path: '/',
        component: Index
    },
    {
        path: '/contact',
        component: Contact
    }
];

export default new VueRouter({
    //mode: 'history',
    routes
});
