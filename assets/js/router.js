import Pluginlist from './components/Pluginlist.js';

const routes = [
    {path: '/', component: Pluginlist}
];

const Router = VueRouter.createRouter({
    // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
    history: VueRouter.createWebHashHistory(),
    routes, // short for `routes: routes`
})

export default Router