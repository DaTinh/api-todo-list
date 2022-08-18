import VueRouter from 'vue-router'
import Vue from 'vue'
Vue.use(VueRouter)

import Home from '../components/Home/HomePage.vue'
import Product from '../components/Home/ProductPage.vue'
import About from '../components/Home/AboutPage.vue'
import Error from '../components/Home/ErrorPage.vue'

const routes = [
    {path: '/', component: Home},
    {path: '/product', component: Product},
    {path: '/about', component: About},
    {path: '/:pathMatch(.*)*', component: Error},
]

const router = new VueRouter({
    mode: 'history',
    routes
})

export default router

