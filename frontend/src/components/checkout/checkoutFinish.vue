<template>
    <div class="w-100">
        <div class="w-100" v-if="verifyUrl">
            <h1>teste</h1>
        </div>
        <template v-if="items.length">
            <div class="d-flex m-4 border-top border-bottom py-4" v-for="item in items" :key="item.id">
                <div class="d-flex">
                    <span>{{item.nome}}</span>
                </div>
                <div class="d-flex ml-auto">
                    <div class="mr-4">
                        <button class="btn px-2 p-0 border text-center ml-2" @click="addItem(item.id)">+</button>
                        <span class="border text-center ml-2">{{item.qtd}}</span>
                        <button class="btn px-2 py-0 border text-center ml-2" @click="diminuirItem(item.id)">-</button>
                    </div>
                    <b class="ml-2">{{ formatMoney(item.valor * item.qtd) }}</b>
                </div>
            </div>
            <div class="w-100 d-flex justify-content-center">
                <button class="btn btn-primary col-8" @click="verifyToken()">Confirmar</button>
            </div>
        </template>
        <div v-else>
            <p class="mb-0 m-2 text-center">Nenhum item adicionado</p>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            items: [],
            url: ''
        }
    },
    created(){
        this.items = JSON.parse(localStorage.getItem('produtos') || '[]')
        this.$root.$on('cart-update', itens => {
            this.items = itens;
        })        
    },
    computed: {
        verifyUrl(){
            this.url == window.location.pathname
            if(this.url == '/user/checkout'){
                return true
            }else{
                return false
            }
        }
    },
    methods: {
        formatMoney: (new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' })).format,
        addItem(idItem){         
           let indexItem =  this.items.findIndex(item =>{
                return item.id == idItem
            })

            this.items[indexItem].qtd++
            localStorage.setItem('produtos', JSON.stringify(this.items))           
        },
        diminuirItem(idItem){         
           let indexItem =  this.items.findIndex(item =>{
                return item.id == idItem
            })
            this.items[indexItem].qtd--
            localStorage.setItem('produtos', JSON.stringify(this.items))
            if(this.items[indexItem].qtd == 0){
                this.items.splice(indexItem, 1)
                localStorage.setItem('produtos', JSON.stringify(this.items))
                this.$root.$emit('cart-update', this.items)
            }
        },
        verifyToken(){
            this.$store.dispatch('VERIFY.USER')
            if(this.$store.state.auth == true){
                this.$router.push({name: 'Checkout'})
            }else{
                this.$router.push({name: 'Login'})
            }
        }
    }
}


</script>

<style scoped>
    button{
        font-size: 18px;
    }
</style>