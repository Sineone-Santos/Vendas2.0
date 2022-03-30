import Vue from 'vue'
import App from './App.vue'
import router from './router'

Vue.config.productionTip = false

const axiosConfig = {
  baseURL: 'http://127.0.0.1:8000/api',
  timeout: 30000,
};

Vue.prototype.$axios = axios.create(axiosConfig)

new Vue({
  router,
  render: h => h(App)  
}).$mount('#app')
