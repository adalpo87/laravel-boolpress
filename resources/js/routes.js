import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Blog from './pages/Blog.vue';
import Contact from './pages/Contact.vue';
import Error404 from './pages/Error404.vue';

const router = new VueRouter({
    mode: 'history', //->così tiene in memoria le pagine senza dover ricaricare tutto ogni volta, rende più veloce il sito
    //qui sotto stabiliamo le nostre rotte, tramite un array di oggetti
    linkActiveClass: 'active',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/about',
            name: 'about',
            component: About
        },
        {
            path: '/blog',
            name: 'blog',
            component: Blog
        },
        {
            path: '/contacts',
            name: 'contacts',
            component: Contact
        },
        {
            path: '/*',
            name: 'error404',
            component: Error404 //non necessario
        }
    ]
});

export default router;