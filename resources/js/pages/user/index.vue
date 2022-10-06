<template>
    <div class="row">
        <div class="flex md12 mt-2">
            <div style="text-align:right">
                <va-button @click="showRole = true">Create Role</va-button>
            </div>
            <create-role :show="showRole" @change="showRole = $event" @done="done"></create-role>
        </div>
        <div class="flex md12">
            <create-user :roles="roles"></create-user>
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
import axios from 'axios';
import { ref } from 'vue';
import CreateUser from './create.vue';
import CreateRole from './createRole.vue';
const items = ref([]);
const roles = ref([])
const showRole = ref(true)

const fetch = async ()=>{

const collection = await Promise.resolve([{name:'x',email:'email'},{name:'x',email:'email'},{name:'x',email:'email'}]);
items.value = collection


}

axios.get(route('api.userRole.index')).then(({data})=>{
    roles.value = data.map(item=>{
        const value = item.id;
        const text = item.title;
        return {value,text}
    })
})

fetch()


const done = (userRole)=>{
    showRole.value = false;
    const {title,id} = userRole;
    roles.value.push({text:title,value:id});
    

}

   

</script>

<style lang="scss" scoped>

</style>