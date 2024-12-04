import App from './components/app.vue';
import { createApp } from 'vue';
import router from './router';

import '../css/app.css';
import 'bootstrap-icons/font/bootstrap-icons.css';
import i18n from '../js/i18n';
import axios from '../js/axios';

const app = createApp(App)
app.config.globalProperties.$axios = axios;

app.use(router).use(i18n).mount('#app')