<template>
    <div class="h-100 w-100">
        <top-bar/>
        <nav-bar/>
        <div class="row justify-content-center h-100 align-items-center mx-0">
            <div class="col-6 col-lg-8">
                <div class="row no-gutters shadow-lg">
                    <div class="col-6 border-left-0 rounded-left">
                        <div class="h-100 py-3">
                            <div id="form-register" class="m-4">
                                <div class="d-flex align-items-center">
                                    <h1 class="font-weight-normal mb-4">Cadastrar</h1>
                                    <div class="ml-auto text-muted">
                                        <i class="fab fa-facebook pr-2"></i>
                                        <i class="fab fa-twitter "></i>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="text-monospace">email</label>
                                    <input v-on:keyup="removeClass($event)"  v-model="email" type="text" name="email" class="form-control form-control-sm border-0 rounded-pill p-3 " placeholder="email">
                                    <span class="invalid-feedback">{{invalidFeedbackemail}}</span>
                                </div>
                                <div class="form-group">
                                    <label class="text-monospace">Nome</label>
                                    <input v-model="nome" v-on:keyup="removeClass($event)" type="text" name="nome" class="form-control form-control-sm border-0 rounded-pill p-3" placeholder="Nome">
                                    <span class="invalid-feedback">{{invalidFeedbacknome}}</span>
                                </div>
                                <div class="form-group">
                                    <label class="text-monospace">Senha</label>
                                    <input v-on:keyup="removeClass($event)" v-model="password" type="password" name="password" class="form-control form-control-sm border-0 rounded-pill p-3 " placeholder="Senha">
                                    <span class="invalid-feedback">{{invalidFeedbackPassword}}</span>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button @click="newUser()" class="btn btn-primary rounded-pill w-100 text-white text-center">Cadastrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 bg-gradient border-right-0 rounded-right ">
                        <div class="d-flex flex-column justify-content-center align-items-center h-100 text-white">
                            <h1>Bem vindo ao Cadastro</h1>
                            <p class="text-center">O melhor tradutor do mundo - DeepL Translate</p>
                            <button class="btn border border-white rounded-pill text-white" @click="$router.push({name: 'Login'})">login</button>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import TopBar from '@/components/products/TopBar.vue'
import NavBar from '@/components/products/NavBar.vue'

export default {
    components: {
        TopBar,
        NavBar
    },
    data(){
        return{
            nome: '',
            email: '',
            password: '', 
            invalidFeedbackPassword: '',
            invalidFeedbackemail: '',
            invalidFeedbacknome: ''
        }
    },
    created(){
      if(localStorage.getItem('token')){
            this.$root.$router.push({name: 'produtos'})
        }
    },
    computed: {
      
    },
    methods:{
      async  newUser(){
            let dados = {
                'nome': this.nome,
                'email': this.email,
                'password': this.password
            }
            if(this.verifyDados(dados)){
                const response = await this.$axios.post('/auth/register', dados)
                localStorage.setItem('token', JSON.stringify(response.data.token))  
                this.$store.state.auth = true
                this.$store.state.nameUser = response.data.nome;
                this.$root.$router.push({name: 'produtos'})
            }
        },
        removeClass(ev){      
            if(ev.target.classList.contains('is-invalid')){
                ev.target.classList.remove('is-invalid')
            }
        },
        verifyDados(dados){
            let result
            Object.entries(dados).forEach(item =>{
                if(item[1] == ''){              
                    document.getElementsByName(item[0])[0].classList.add('is-invalid')
                    alert('o campo '+item[0]+' deve ser preenchido')
                    result = false
                } 
                if(item[0] == 'password' && item[1].length <= 7){
                    this.invalidFeedbackPassword = 'A senha deve conter no minimo 8 caracteres'
                    document.getElementsByName(item[0])[0].classList.add('is-invalid')   
                    result = false ;
                }
            })
            return result == false ? result : true
        }
    }
}

    NavBar
    TopBar</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Sora:wght@100;200;300;500;600&display=swap');
*{
    font-family: 'sora', sans-serif;
}

html, body{
    height: 100%;
}
.bg-gradient{
    background-image: linear-gradient(135deg, #0069D9, #4785C8);
}
.form-group label{
    font-weight: 700;
    font-family: 'sora',sans-serif;
}
.form-group input{
    background-color: #F2F2F2;
}
.btn-pink{
    background-image: linear-gradient(90deg, #E76363, #E56085);
    
}
i{
    font-size: 20px;
}
h1{
    font-size: 30px;
}
p{
    font-family: 'sora', sans-serif;
    font-weight: 200;
}

</style>