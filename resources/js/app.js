import AppLayout from "@/Layouts/AppLayout";

require('./bootstrap');

require('moment');

import Vue from 'vue';

import { InertiaApp } from '@inertiajs/inertia-vue';
import { InertiaForm } from 'laravel-jetstream';
import PortalVue from 'portal-vue';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'


Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
Vue.mixin({ methods: { route } });
Vue.use(InertiaApp);
Vue.use(InertiaForm);
Vue.use(PortalVue);

const app = document.getElementById('app');

new Vue({
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                // resolveComponent: (name) => require(`./Pages/${name}`).default,
                resolveComponent: (name) => {
                    const module = require(`./Pages/${name}`);

                    if(!module.default.layout) {
                        // there is no Layout defined, set the default layout
                        module.default.layout = AppLayout;
                    }

                    return module.default;
                }
            },
        }),
}).$mount(app);
