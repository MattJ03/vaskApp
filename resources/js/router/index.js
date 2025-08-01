import { createApp } from 'vue';
import { createRouter } from 'vue-router';
import { createWebHistory } from 'vue-router'
import Index from '../pages/Index.vue';
import Create from "../pages/Create.vue";

const routes = [
    {path: '/index', component: Index },
    {path: '/create', component: Create},
];

const router = createRouter({
    routes,
    history: createWebHistory(),
});

export default router;
