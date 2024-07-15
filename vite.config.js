import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/layout1.css", "resources/js/layout1.js",
                "resources/css/layout2.css", "resources/js/layout2.js"
            ],
            refresh: true,
        }),
    ],
});
