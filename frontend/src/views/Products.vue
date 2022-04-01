<template>
  <div>
    <top-bar nameUser="User" :nomeProduto="produtos.nome"/>
    <nav-bar />
    <div class="w-100">
      <div class="d-flex justify-content-center">
        <div class="d-flex form-group my-5 w-50">
          <input
            type="text"
            class="form-control rounded-pill"
            placeholder="Buscar"
            v-model="search"
          />
          <button class="btn btn-outline-primary ml-2">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
      <div class="w-100 bg-light">
      <div class="container">
        <div class="row">        
          <div class="col-4 mb-4" v-for="item in produtosFiltered" :key="item.ID">
            <div class="card" style="width: 18rem">
              <img src="../assets/glp.jpg" alt="glp">
              <div class="card-body">
                <h5 class="card-title">{{item.NOME}}</h5>
                <p class="card-text">
                  GLP mais barato é na santa cruz tecnologia
                </p>
                <div class="d-flex flex-column align-items-center">
                  <span>R$ {{item.VALOR}}</span>
                  <button @click="addItemBasket({'id': item.ID, 'nome': item.NOME, 'valor': item.VALOR, 'qtd': 1})" class="btn btn-primary">Add<i class="fa fa-plus"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
</template>

<script>
import TopBar from "@/components/products/TopBar.vue";
import NavBar from "@/components/products/NavBar.vue";


export default {
  components: {
    TopBar,
    NavBar,
  },
  data() {
    return {
      produtos: [],
      search: ''
    }
  },
  computed: {
    produtosFiltered(){
      if(this.search){
       return this.produtos.filter(item =>{
          return item.NOME.toLowerCase().startsWith(this.search.toLowerCase())
        })
      }
      return this.produtos
    }
  },
  created() {
    this.listProducts();
    
  },
  methods: {
    async listProducts() {
      const response = await this.$axios.get("products");
      this.produtos = response.data;
    },
    addItemBasket(obj){
      const listItens = JSON.parse((localStorage.getItem('produtos') || '[]'));
        let index = listItens.findIndex(item =>{
          return item.id  == obj.id
        })
        if(index == -1){
          listItens.push(obj);
        }else{
            let indexItem =  listItens.findIndex(item =>{
                return item.id == obj.id
            })
            listItens[indexItem].qtd++
        } 
        localStorage.setItem('produtos', JSON.stringify(listItens));
        this.$root.$emit('cart-update', listItens)
      }
    }
  }
</script>
