export default {
    async 'VERIFY.USER'({ commit }){  
        let payload = {}
        let token = localStorage.getItem('token')
        
        if(!token){      
            payload = {
                'auth': false,
                'nameUser': 'user'
            }
           await commit('VERIFY_USER', payload)
        }else{
            console.log(this)
            payload = {
                'auth': true,
                'nameUser': ''
            }
            await commit('VERIFY_USER', payload)
        }      
    },
}