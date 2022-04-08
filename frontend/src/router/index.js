import Vue from 'vue'
import VueRouter from 'vue-router'
import Products from '../views/Products.vue';
import Login from '../views/Login.vue';
import Register from '../views/Register.vue';
import Perfil from '../views/Perfil.vue';
import Checkout from '../views/Checkout.vue';
import Boleto from '../views/Boleto.vue';

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'produtos',
    component: Products
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
  },
  {
    path: '/user/checkout',
    name: 'Checkout',
    component: Checkout
  },
  {
    path: '/user/Boleto',
    name: 'Boleto',
    component: Boleto
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
