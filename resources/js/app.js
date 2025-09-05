import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import Pagination from "./components/Pagination.vue";
import HeaderComponent from "./components/HeaderComponent.vue";
createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        const page = pages[`./Pages/${name}.vue`];
        if (!page) {
            console.error(`Page not found: ./Pages/${name}.vue`);
            return (
                pages[`./Pages/404.vue`]?.default ||
                (() => import("./Pages/404.vue"))
            );
        }
        if (!page.default) {
            console.error(`Page ${name} does not have a default export`);
            return (
                pages[`./Pages/404.vue`]?.default ||
                (() => import("./Pages/404.vue"))
            );
        }
        return page.default;
    },
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) });
        app.use(plugin);
        app.component("pagination", Pagination);
        app.component("header-component", HeaderComponent);
        app.mount(el);
    },
});
