<template>
    <div id="topBar" class="container d-flex align-items-center position-relative">
        <div class="d-flex mx-3 w-100">
            <a href="#" style="font-size: 25px">LOGO</a>
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
                    <button class="btn p-0 position-relative" data-toggle="dropdown" @click="login()">
                        <i class="fas fa-user"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <p>teste</p>
                    </div>
                </div>                
                <span>{{nameUser}}</span>
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
            nameUser: ''
        }
    },
    name: 'TopBar',
   async created(){
        this.countItems = JSON.parse(localStorage.getItem('produtos') || '[]').length
        this.$root.$on('cart-update', itens => {
            this.countItems = itens.length
        }) 
        if(localStorage.getItem('token')){  
            const response = await this.$axios.get("/user");
            this.nameUser = response.data.nome
        }else{
            this.nameUser = 'User'
        }  
    },
    
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
</style>