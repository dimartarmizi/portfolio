import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';

createInertiaApp({
    resolve: async name => {
        const pages = import.meta.glob('./Pages/**/*.vue');

        const importPage = pages[`./Pages/${name}.vue`];
        if (!importPage) throw new Error(`Page "${name}" not found`);

        const module = await importPage();
        return module.default;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el);
    },
});
