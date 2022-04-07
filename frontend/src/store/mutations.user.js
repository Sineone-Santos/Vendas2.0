export default {
    'VERIFY_USER'(state, payload){
        state.auth = payload.auth           
        state.nameUser = payload.nameUser
    },
}