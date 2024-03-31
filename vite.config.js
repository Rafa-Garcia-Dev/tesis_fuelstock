import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/views/compras/js/conversorMedidas.js',
                'resources/views/compras/js/comprasFunctions.js',
                'resources/views/compras/js/conversorMedidasUpdate.js',
                'resources/views/compras/js/medidasFunctions.js',
                'resources/views/reportes/js/ws.js',
                'resources/views/reportes/js/reportes.js',
            ],
            refresh: true,
        }),
    ],
});
