<template>
    <div class="w-100 h-100">
        <top-bar/>
        <nav-bar/>
        <div class="container mt-5">
            <div class="row border-bottom">
                <h2>Checkout</h2>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="card text-left my-4">
                        <h5 class="card-header">Detalhes do pedido</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title border-bottom pb-2" style="font-size: 16px">Endereço da entrega</h5>
                                    <div class="d-flex">
                                        <div class="d-flex flex-column">
                                            <p class="mt-3">Cep: 45650450</p>
                                            <p>Ilhéus - Bahia</p>
                                            <p>Av Princesa Isabel - 687</p>
                                            <p>proximo a Igreja católica</p>
                                            <button class="btn btn-sm btn-outline-secondary p-0">Editar</button>
                                        </div>
                                        <div class="d-flex flex-column ml-auto">
                                            <p>Teste Santos</p>
                                            <p>teste@gmail.com</p>
                                            <p>73998333660</p>
                                        </div>
                                    </div> 
                                </div>
                            </div>    
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title border-bottom pb-2 mt-4" style="font-size: 16px">
                                        Informações do Pagamento 
                                    </h5>
                                    <div class="d-flex flex-column mt-4" style="max-width: 200px">
                                        <select v-model="formaPagamento" class="form-control form-control-sm" name="forma-pagamento">
                                            <option value="CT">Cartão de credito</option>
                                            <option value="BO">Boleto</option>
                                            <option value="PIX">Pix</option>
                                        </select>
                                    </div>
                                    <div v-if="formaPagamento == 'CT'">
                                        <div class="mt-4 form-row">
                                            <div class="form-group col-lg-6 col-md-12">
                                                <label>Nome do titular</label>
                                                <input v-model="nome" type="text" class="form-control">
                                            </div>
                                            <div class="d-flex align-items-center col-md-12 col-lg-6">
                                                <div class="form-group w-100">
                                                    <label>Numero do cartão</label>
                                                    <input v-model="numeroCartao" type="text" class="form-control">
                                                </div>
                                                <span class="ml-3"><i class="position-absolute card-type" v-bind:class="creditCardT"></i></span>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                             <div class="form-group col-5">
                                                <label>Validade</label>
                                                <input v-model="validade" type="month" class="form-control">
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>CVV</label>
                                                    <input v-model="cvv" type="text" class="form-control" maxlength="4">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>Parcelas</label>
                                                    <select v-model="parcelas" class="form-control form-control" name="forma-pagamento">
                                                        <option value="1">1x</option>
                                                        <option value="2">2x</option>
                                                        <option value="3">3x</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div v-else-if="formaPagamento == 'PIX'">
                                        <div class="row">
                                            <div class="col-5">
                                                <figure class="figure">
                                                    <img src="../assets/qrcode.png" class="figure-img img-fluid rounded" alt="...">
                                                    <figcaption class="figure-caption">Leia o Qr Code acima para finalizar o pagamento.</figcaption>
                                                </figure>
                                            </div>
                                            <div class="col-2 align-self-center">
                                                <span>Ou</span>
                                            </div>
                                            <div class="col-5 align-self-center">
                                                <p>{{chavePix}}</p>
                                                <button @click="copyChave()" class="btn btn-sm btn-outline-info">Copiar</button>
                                                <p class="text-success mt-3">Utilize a chave acima para realizar o pagamento</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div v-else>
                                        <div class="row">
                                            <div class="col">
                                                <div class="d-flex m-4">
                                                    <button @click="gerarBoleto()" class="btn btn-info">Gerar boleto</button>
                                                    <i style="font-size: 45px" class="fa fa-barcode ml-2" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                   
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <cart-itens/>
                    <div class="d-flex justify-content-center mt-2">
                        <button @click="finishPedido()" class="btn btn-primary">Finalizar Pedido</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import CartItens from '@/components/products/CartItens.vue'
import TopBar from '@/components/products/TopBar.vue'
import NavBar from '@/components/products/NavBar.vue'
import creditCardType from 'credit-card-type'

export default {
    components: {
        CartItens,
        TopBar, 
        NavBar,
        creditCardType,
    },
    data(){
        return{
            parcelas: 0,
            formaPagamento: 'CT',
            numeroCartao: '',
            nome: '',
            validade: '',
            cvv: '',
            chavePix: 'dsnfsdnfklsnfklsdanskalf5df531sa6f46f16sdf4af46ds4f6d4sfd6sa54f6saf6d5f4dsa6fa4sf54'
        }
    },
    async created(){
        this.$store.dispatch('VERIFY.USER')
        if(this.$store.state.auth == false){
            this.$root.$router.push({name: 'Login'})
        }
        
    },
    computed: {
        creditCardT(){
            if(this.numeroCartao.length >= 4){
                let type = creditCardType(this.numeroCartao);
                return type.length == 0 ? '' : 'fa fa-cc-'+type[0].type
            }
        },
    },
    methods:{
        copyChave(){
            navigator.clipboard.writeText(this.chavePix)
        },
        gerarBoleto(){
            this.$router.push({name: 'Boleto'})
        },
        async finishPedido(){
            let dados = {
                'formaPagamento': this.formaPagamento,
                'parcelas': this.parcelas
            }
            const response = await this.$axios.post('user/venda', dados)
            console.log(response)
        }
    }
}

</script>

<style scoped>
p{
    margin-bottom: 1px;
}
.card-type{
    font-size: 40px;
    margin-left: -65px;
    margin-top: -12px;
}
</style>