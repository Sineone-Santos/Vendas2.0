<template>
    <div id="topBar" class="container d-flex align-items-center position-relative">
        <div class="d-flex mx-3 w-100">
            <button class="btn p-0" style="font-size: 20px" @click="$router.push({name: 'produtos'})">LOGO</button>
            <div class="d-flex ml-auto align-items-center">
                <div class="dropdown mr-3">
                    <button class="btn p-0 position-relative" data-toggle="dropdown">
                        <span class="badge position-absolute badge-danger count-items">{{countItems}}</span>
                        <i class="fa fa-shopping-basket"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right container-cart" @click="$event.stopPropagation()">
                        <cart-itens/>
                    </div>
                </div>
                <div class="dropdown mr-3">
                    <button class="btn p-0 position-relative" data-toggle="dropdown">
                        <i class="fas fa-user"></i>
                        <span class="ml-1">{{verifyUser}}</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="d-flex flex-column" v-if="auth == true">
                            <button class="btn btn-outline-primary border-bottom border-0">
                                meus pedidos
                            </button>
                            <button class="btn btn-outline-primary border-bottom border-0">
                                minha conta
                            </button>
                            <button class="btn btn-outline-primary border-bottom border-0">
                                configurações
                            </button>
                            <div class="d-flex">
                                <button class="btn btn-outline-danger ml-auto p-1 mt-2 mr-2" @click="logOut()">
                                    <i class="fa fa-power-off" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                        <div v-else class="d-flex justify-content-center">
                            <button class="btn btn-sm btn-primary px-4" @click="$router.push({name: 'Login'})">
                                login
                            </button>
                        </div>
                    </div>
                </div>                                
            </div>
        </div>
    </div>
</template>

<script>
import CartItens from './CartItens.vue'
export default {
  components: { 
      CartItens 
    },
    data(){
        return{
            countItems: 0,
            auth: false,
            nameUser: ''
        }
    },
    created(){
              
    },
    name: 'TopBar',
    mounted(){
        this.countItems = JSON.parse(localStorage.getItem('produtos') || '[]').length
        this.$root.$on('cart-update', itens => {
            this.countItems = itens.length
        }) 
       this.$store.dispatch('VERIFY.USER')
    },
    computed: {
        verifyUser(){
            this.auth = this.$store.state.auth
            this.nameUser = this.$store.state.nameUser
            return this.nameUser;
        } 
    },
    methods: {
        logOut(){   
            localStorage.removeItem('token')
            this.$store.dispatch('VERIFY.USER')
        },
    },
    watch: {
        'verifyUser'(newValue, oldValue){
            console.log(newValue, oldValue)
        }
    }
   
}
</script>

<style scoped>
#topBar{
    height: 60px;
}
a{
    text-decoration: none;
    font-style: normal;
}
.count-items{
    font-size: 11px;
    right: -8px;
    top: -5px;
}
i{
    font-size: 22px;
}
.container-cart{
    width: 350px;
}
button:focus{
    outline: 0 !important;
}
</style>