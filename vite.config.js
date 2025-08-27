import { defineConfig, loadEnv } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import vue from '@vitejs/plugin-vue';

const env = loadEnv('', '')

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],

    server: {
        proxy: {
            '/api': { // Proxy requests starting with /api
                target: 'http://laravelshadcn', // e.r., 'http://192.168.10.10:8000'
                changeOrigin: true, // Needed for virtual hosted sites
                rewrite: (path) => path.replace(/^\/api/, ''), // Optional: remove /api prefix
            },
        },
        hmr: {
            host: 'localhost',
        },
    },

    /* server: {
        host: '0.0.0.0', // Allows external access
        port: 5173,
        cors: {
            origin: /^http?:\/\/(?:laravelshadcn|192\.168\.33\.10)(?::\d+)?$/,
        },
    }, */

    /* server: { 
        host: 'laravelshadcn',
        headers: {
        	'Access-Control-Allow-Origin': '*',
        },
        cors: true, 
    }, */

    /* server: { 
        cors: { origin: env.VITE_APP_URL }, 
    }, */

    /* server: {
        origin: 'http://127.0.0.1:5173',
        hmr: {
            host: 'localhost',
        },
    } */
    /* server: {
        host: '0.0.0.0', // This is crucial for Vagrant
        port: 5173,
        cors: true, // This enables CORS headers
    } */
    
    build: {
        rollupOptions: {
            output:{
                manualChunks(id) {
                    if (id.includes('node_modules')) {
                        return id.toString().split('node_modules/')[1].split('/')[0].toString();
                    }
                }
            }
        }
    }
});