import { createApp } from 'vue';
import { createRouter } from 'vue-router';
import { createWebHistory } from 'vue-router'
import Index from '../pages/Index.vue';

const routes = [
    {path: '/index', component: Index }
];

const router = createRouter({
    routes,
    history: createWebHistory(),
});

export default router;
