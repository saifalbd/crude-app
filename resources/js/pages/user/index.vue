<template>
    <div class="row">
        <div class="flex md12">
            <create-user></create-user>
        </div>
        <div class="flex md12">
            <table class="table">
                <thead>
                 <tr>
                    <th class="left">
                    name    
                </th>
                <th class="left">
                    email
                </th>
                 </tr>
                </thead>
                <tbody>
                    <tr v-for="item in items">
                        <td class="left">{{item.name}}</td>
                        <td class="left">{{item.email}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import CreateUser from './create.vue';
const items = ref([]);

const getItems = async ()=>{

    const collection = await Promise.resolve([{name:'x',email:'email'},{name:'x',email:'email'},{name:'x',email:'email'}]);
    items.value = collection


}
getItems()

   

</script>

<style lang="scss" scoped>

</style>