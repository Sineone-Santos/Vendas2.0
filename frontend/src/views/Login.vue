<template>
  <div class="w-100 h-100">
      <top-bar/>
      <nav-bar/>
   <div class="row justify-content-center h-100 align-items-center mx-0">
      <div class="col-6 col-lg-8">
          <div class="row no-gutters shadow-lg">
              <div class="col-6 border-left-0 rounded-left">
                  <div class="h-100 py-3">
                      <div class="m-4">
                          <div class="d-flex align-items-center">
                              <h1 class="font-weight-normal mb-4">Login</h1>
                              <div class="ml-auto text-muted">
                                  <i class="fab fa-facebook pr-2"></i>
                                  <i class="fab fa-twitter "></i>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="text-monospace">Email</label>
                              <input v-model="email" type="email" name="email" class="form-control form-control-sm border-0 rounded-pill p-3" placeholder="Usuario">
                          </div>
                          <div class="form-group">
                              <label class="text-monospace">Senha</label>
                              <input v-model="password" type="password" name="password" class="form-control form-control-sm border-0 rounded-pill p-3" placeholder="Senha">                             
                          </div>
                          <p class="text=danger"></p>
                          <div class="d-flex justify-content-center">
                              <button @click="Login()" class="btn btn-primary rounded-pill w-100 text-white text-center">Entrar</button>
                          </div>
                          <div class="d-flex align-items-center mt-3" style="font-size: 12px;">
                              <input type="checkbox" class="mx-2">
                              <label class="text-monospace m-0">lembre-se de mim</label>
                              <a class="ml-auto" href="#">Esqueceu a senha?</a>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-6 bg-gradient border-right-0 rounded-right ">
                  <div class="d-flex flex-column justify-content-center align-items-center h-100 text-white">
                      <h1>Bem vindo ao login</h1>
                      <p class="text-center">O melhor tradutor do mundo - DeepL Translate</p>
                        <button class="btn border border-white rounded-pill text-white" @click="$router.push({name: 'Register'})">Registrar</button>
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
            email:'',
            password: '',
        }
    },
    created(){
        this.$store.dispatch('VERIFY.USER')
        if(this.$store.state.auth == true){
            this.$root.$router.push({name: 'produtos'})
        }
    },
    methods: {
        async Login(){
            
        const dados = {
            email: this.email,
            password: this.password
        }
        if(dados.email == "" || dados.password == ""){
            alert('email ou senha não informado')
        }
        const response = await this.$axios.post("/auth/login", dados)
        if(response.data.hasOwnProperty('error')){
            console.log(response.data.error);
        }else{
            console.log(response.data);
            localStorage.setItem('token', JSON.stringify(response.data.token))  
            this.$store.state.auth = true
            this.$store.state.nameUser = response.data.nome;
            this.$root.$router.push({name: 'produtos'})
        }
    }
}
}
</script>

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