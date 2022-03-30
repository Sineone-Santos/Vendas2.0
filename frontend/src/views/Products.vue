<template>
    <div>
        <h1>Products</h1>
    </div>
</template>

<script>
export default {
    data() {
        return {
            produtos: []
        }
    },
    created() {
        this.listProducts();
    },
    methods: {
        async listProducts() {
            const produtos = await this.$axios.get('asdlkkasdklasdkla/asdkaskd')
            this.produtos = produtos
        }
    }
}
</script>
