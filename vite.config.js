import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { viteStaticCopy } from 'vite-plugin-static-copy'

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // Resources paths
                'resources/css/app.css', 
                'resources/sass/app.scss', 
                'resources/js/app.js',

                // Resources assets js file paths
                'resources/assets/js/accordiation',
                'resources/assets/js/advancedform',
                'resources/assets/js/alerts',
                'resources/assets/js/blog-edit',
                'resources/assets/js/carousel',
                'resources/assets/js/cart',
                'resources/assets/js/chart',
                'resources/assets/js/chat',
                'resources/assets/js/checkout',
                'resources/assets/js/colorpicker',
                'resources/assets/js/echarts',
                'resources/assets/js/flatpickr',
                'resources/assets/js/flot',
                'resources/assets/js/form-editor2',
                'resources/assets/js/form-elements',
                'resources/assets/js/form-validation',
                'resources/assets/js/formelementadvnced',
                'resources/assets/js/fullcalendar',
                'resources/assets/js/index1',
                'resources/assets/js/index2',
                'resources/assets/js/index3',
                'resources/assets/js/index4',
                'resources/assets/js/index5',
                'resources/assets/js/jquery.sparkline',
                'resources/assets/js/jvectormap',
                'resources/assets/js/map-leafleft',
                'resources/assets/js/mapelmaps',
                'resources/assets/js/modal',
                'resources/assets/js/morris',
                'resources/assets/js/nvd3',
                'resources/assets/js/rangeslider',
                'resources/assets/js/select2',
                'resources/assets/js/summernote',
                'resources/assets/js/sweet-alert',
                'resources/assets/js/table-data',
                'resources/assets/js/themeColors',
                'resources/assets/switcher/js/switcher',

            ],
            refresh: true,
        }),
        viteStaticCopy({
            targets: [
              {
                src: (['resources/assets/images/', 'resources/assets/plugins/', 'resources/assets/iconfonts/', 'resources/assets/js/sticky.js',]),
                dest: 'assets/'
              }
            ]
        }),
        {
            name: 'blade',
            handleHotUpdate({ file, server }) {
                if (file.endsWith('.blade.php')) {
                    server.ws.send({
                        type: 'full-reload',
                        path: '*',
                    });
                }
            },
        }
    ],
    build: {
        chunkSizeWarningLimit: 1600,
    },
});
