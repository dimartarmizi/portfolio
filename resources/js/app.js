import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';
import NProgress from 'nprogress';
import 'nprogress/nprogress.css';

createInertiaApp({
    resolve: async name => {
        const pages = import.meta.glob('./Pages/**/*.vue');

        const importPage = pages[`./Pages/${name}.vue`];
        if (!importPage) throw new Error(`Page "${name}" not found`);

        const module = await importPage();
        return module.default;
    },
    setup({ el, App, props, plugin }) {
        const vueApp = createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el);
            
        NProgress.configure({ showSpinner: false });
        ['start', 'finish', 'error'].forEach(event =>
            Inertia.on(event, () => NProgress[event === 'start' ? 'start' : 'done']())
        );

        return vueApp;
    },
});
