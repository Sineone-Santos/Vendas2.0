export default {
     'VERIFY_USER'(state , payload){
        let tokenOn = localStorage.getItem('token')
        if(tokenOn === null || tokenOn === '' || tokenOn === undefined){      
           state.auth = false
           state.nameUser = 'user'
        }else{
            state.auth = true;
            if(state.nameUser === '' || state.nameUser === 'user'){
                console.log('buscando usuario');
                state.nameUser = 'TESTE'
                //const response = await this.$axios.get('/user')
                //console.log(response);        
                //this.nameUser = response.data.user 
                //this.commit();  
            }
        }                                     
    },
}