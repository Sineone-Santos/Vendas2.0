<template>
    <div class="w-100 h-100">
        <top-bar/>
        <nav-bar/>
        <div class="container bg-ligth">
            <div class="row mt-5">
                <div class="col-3">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-5 col-sm-12">
                                <img src="../assets/perfil.jpg" style="height: 6.3rem" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <div class="d-flex flex-column align-items-center mt-2">
                                   <span>Nome do usuario</span>
                                   <button class="btn btn-sm btn-outline-secondary  mt-2">Editar dados</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <nav class="nav nav-pills flex-column flex-sm-row border">
                        <a class="flex-sm-fill text-sm-center nav-link active" aria-current="page" href="#">Tudo</a>
                        <a class="flex-sm-fill text-sm-center nav-link" href="#">Em preparação</a>
                        <a class="flex-sm-fill text-sm-center nav-link" href="#">Pagamento pendente</a>
                        <a class="flex-sm-fill text-sm-center nav-link disabled">A Caminho</a>
                    </nav>
                    <pedidos/>
                    <pedidos/>
                    <pedidos/>
                    <pedidos/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import NavBar from '@/components/products/NavBar.vue'
import TopBar from '@/components/products/TopBar.vue'
import Pedidos from '@/components/products/pedidos.vue'

export default {
    components: {
        TopBar,
        NavBar,
        Pedidos
    },
    data(){
        return {

        }
    }
}
</script>
