import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css',
                'resources/js/app.js',
                'resources/scss/createUser.scss',
                'resources/scss/index.scss',
                'resources/scss/cart.scss',
                'resources/scss/cooperation.scss',
                'resources/scss/contacts.scss',
            ],
            refresh: true,
        }),
    ],
});
