import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
<<<<<<< HEAD
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
=======
            input: ['resources/css/app.css', 'resources/js/app.js'],
>>>>>>> 05fe32083b94d33c6580a1f2a880bb5816dab8f3
            refresh: true,
        }),
    ],
});
