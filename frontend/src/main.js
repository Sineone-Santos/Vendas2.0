import Vue from 'vue'
import App from './App.vue'
import router from './router'

Vue.config.productionTip = false

const axiosConfig = {
  baseURL: 'http://127.0.0.1/projects/vendas_2.0/backend/',
  timeout: 30000,
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

new Vue({
  router,
  render: h => h(App)  
}).$mount('#app')