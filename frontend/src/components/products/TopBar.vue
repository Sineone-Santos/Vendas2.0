<template>
    <div id="topBar" class="container d-flex align-items-center position-relative">
        <div class="d-flex mx-3 w-100">
            <a href="#" style="font-size: 25px">LOGO</a>
            <div class="d-flex ml-auto align-items-center">
                <div class="dropdown mr-3">
                    <button class="btn p-0 position-relative" data-toggle="dropdown">
                        <span class="badge position-absolute badge-danger count-items">2</span>
                        <i class="fa fa-shopping-basket"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <p>teste</p>
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
.count-items{
    font-size: 11px;
    right: -8px;
    top: -5px;
}
i{
    font-size: 22px;
}
</style>