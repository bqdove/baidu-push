import Baidu from './components/Baidu.vue';

export default {
    router(router) {
        router.bases.push({
            path: 'search',
            component: Baidu,
            beforeEnter: router.auth,
        });
    },
    sidebar(sidebar) {
        sidebar.push({
            text: '百度搜索',
            icon: 'fa fa-comment',
            uri: '/search',
        });
    },
};
