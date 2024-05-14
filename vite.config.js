import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: [
                'resources/inc/css/app.css',
                'resources/inc/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
