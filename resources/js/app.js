import './bootstrap';


import {createApp} from 'vue';
import router from './router';

import App from './app.vue';

import { createVuestic } from 'vuestic-ui'
import 'vuestic-ui/css'


 const app = createApp(App);
 app.use(router);

 app.use(createVuestic());
 
 app.mount("#app");




