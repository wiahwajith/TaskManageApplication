require('./bootstrap');

import {createApp, h} from 'vue';

import { App, plugin, Link } from '@inertiajs/inertia-vue3';

import { InertiaProgress } from '@inertiajs/progress';

import Antd from 'ant-design-vue';
import 'ant-design-vue/dist/antd.css';

import DefaultLayout from './layouts/Default.vue'
import DashboardLayout from './layouts/Dashboard.vue'
import DashboardRTLLayout from './layouts/DashboardRTL.vue'

// import '../../public/js/app.js';
import './scss/app.scss';

const el = document.getElementById('app');

InertiaProgress.init();

    const app = createApp({

        render: () => h(App, {

            initialPage: JSON.parse(el.dataset.page),

            resolveComponent: name => require(`./Pages/${name}`).default

        })

    });

    app.config.globalProperties.$route = window.route;

    app.provide('$route', window.route);

    // Adding template layouts to the vue components.
    app.component("inertia-link", Link);
    app.component("layout-default", DefaultLayout);
    app.component("layout-dashboard", DashboardLayout);
    app.component("layout-dashboard-rtl", DashboardRTLLayout);

    app.use(Antd)
    app.use(plugin).mount(el);