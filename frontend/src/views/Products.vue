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
            const response = await this.$axios.get('products')
            console.log(produtos);
        }
    }
}
</script>
