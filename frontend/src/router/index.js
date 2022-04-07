import Vue from 'vue'
import VueRouter from 'vue-router'
import Products from '../views/Products.vue';
import Login from '../views/Login.vue';
import Register from '../views/Register.vue';
import Perfil from '../views/Perfil.vue';

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'produtos',
    component: Products
  },
  {
    path: '/about',
    name: 'about',
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  },
  {
    path: '/auth/login',
    name: 'Login',
    component: Login
  },
  {
    path: '/auth/register',
    name: 'Register',
    component: Register
  },
  {
    path: '/user/perfil',
    name: 'Perfil',
    component: Perfil
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
