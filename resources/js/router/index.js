import {createRouter,createWebHashHistory} from 'vue-router';

import UserIndex from '../pages/user/index.vue';
import Home from '../pages/home.vue'


const routes = [
    {
        name:'home',
        path:'/',
        component:Home
    },
    {
        path:'/users',
        name:'user.index',
        component:UserIndex
    }
];


export default createRouter({
    routes,
    history:createWebHashHistory()
})