<template>
    <div id="NavBar" class="w-100 bg-primary d-flex align-items-center">
        <ul class="d-flex w-100 align-items-center m-0 p-0">
            <li><a href="#">Categorias</a></li>
            <li><a href="#">recomendações</a></li>
            <li><a href="#">coisas</a></li>
            <li><a href="#">mais vendidos</a></li>
        </ul>
    </div>
</template>

<script>
export default {
    name: 'NavBar',
    props: {
        name: String
    }
}
</script>

<style scoped>
#NavBar{
    height: 60px;
    background-color: pink;
}
ul{
    list-style: none;
    align-items: center;
}
a{
    text-decoration: none;
    font-style: normal;
    color: white;
    text-align: center;
}
li{
    display: flex;
    flex-grow: 1;
    text-align: center;
}
li a{
    margin-left: auto;
    margin-right: auto;
}
</style>