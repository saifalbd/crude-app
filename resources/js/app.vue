<template>
    <div class="page">
        <UserForm></UserForm>

    </div>
</template>

<script>
    import UserCreate from './components/userCreate.vue';
    export default {
        components:{UserForm:UserCreate}
        
    }
</script>


<style lang="scss" scoped>
    .page{
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    
}
</style>
