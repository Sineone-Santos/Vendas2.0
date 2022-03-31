<template>
    <div id="footer" class="d-flex align-items-center position-relative">
        <div class="d-flex mx-3 w-100">
            <a href="#" style="font-size: 25px">LOGO</a>
            <div class="d-flex ml-auto align-items-center">
                <i class="fas fa-user mr-3"></i>
                <span>{{name}}</span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'TopBar',
    props: {
        name: String
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
</style>