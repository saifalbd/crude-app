<template>
    <div class="app">
        <div class="left">
            <ul>
                <li @click="$router.push({name:'user.index'})">
                    User
                </li>
            </ul>
        </div>
        <div class="right">
            <RouterView></RouterView>
        </div>
       
    </div>
</template>

<script setup>
</script>

<style lang="scss" scoped>
.app{
    width: 100%;
    min-height: 100vh;
    display: grid;
    grid-template-columns: 200px auto;
    .left{
        min-height: 100%;
        border-right: 1px solid pink;
        ul{
            li{
                line-height: 40px;
                color: green;
                cursor: pointer;
                border-bottom: 1px solid black;

                
            }
        }
    }
}

</style>


