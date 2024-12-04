import { createRouter, createWebHashHistory } from 'vue-router';

const routes = [
    {
        path: '/dashboard',
        component: () =>  import('../pages/HomePage.vue'),
        meta: {
            title: '首页',
            icon: 'bi-house'
        }
    },
    {
        path: '/about',
        component: () => import('../pages/AboutPage.vue'),
        meta: {
            title: '关于我',
            icon: 'bi-people'
        }
    },
    {
        path: '/:patchMatch(.*)',
        component: () =>  import('../pages/NotFountPage.vue'),
        meta: {
            title: '404'
        }
    }
];

const addPrefix = (routes) => {
    return routes.map(route => {
        const updatedRoute = { ...route };
        if (!updatedRoute.path.startsWith('/:')) {
            updatedRoute.path = `/admin${route.path}`;
        }
        return updatedRoute;
    });
};

const router = createRouter({
    history: createWebHashHistory(),
    routes
    // routes: addPrefix(routes)
});

export default router;