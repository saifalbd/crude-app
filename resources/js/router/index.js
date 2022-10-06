
import {createRouter,createWebHashHistory} from 'vue-router';
import Home from '../pages/home/index.vue';
const UserIndex = ()=>import('../pages/user/index.vue');

const routes = [
    {
        path:'/',
        name:'home',
        component:Home
    },
    {
        path:'/user',
        name:'user.index',
        component:UserIndex
    }
];



export default createRouter({
    routes,
    history:createWebHashHistory()
})