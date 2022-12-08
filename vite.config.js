import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/**',
                'resources/js/**',
            ],
            refresh: [
                'resources/scss/**',
                'resources/js/**',
            ],
        }),
    ],
});
