import Vue from 'vue'
import Vuex from '../vuex'
import actionsUser from './actions.user'
import commitUser from './mutations.user'

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        auth: Boolean,
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
export default  store
