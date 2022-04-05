import Vue from 'vue'
import Vuex from './vuex'
import App from './App.vue'
import router from './router'
import actionsUser from './store/actions.user'
import commitUser from './store/mutations.user'

Vue.use(Vuex)

Vue.config.productionTip = false

const axiosConfig = {
  baseURL: 'http://127.0.0.1/projects/vendas_2.0/backend/',
  timeout: 30000
};

const $axios = axios.create(axiosConfig)

$axios.interceptors.request.use(config => {
  const token = localStorage.getItem('token');
  if(token){
    config.headers['Authorization'] = 'Bearer '+token;
  }
  return config;
})

Vue.prototype.$axios = $axios;

const store = new Vuex.Store({
    state: {
        auth: false,
        nameUser: 'user'
    },
    mutations: {
      ...commitUser
    },
    actions: {
      ...actionsUser
    },
    getters: {

    }
})

new Vue({
  store: store,
  router,
  render: h => h(App)  
}).$mount('#app')





