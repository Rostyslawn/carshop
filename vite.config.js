import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css',
                'resources/js/app.js',
                // 'resources/scss/createUser.css',
                // 'resources/scss/index.css',
                // 'resources/scss/cart.css',
                // 'resources/scss/cooperation.css',
                // 'resources/scss/contacts.css',
            ],
            refresh: true,
        }),
    ],
});
