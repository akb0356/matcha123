import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: [
                'resources/views/**',
                'app/Livewire/**',
            ],
        }),
    ],
    server: {
        // Sail(도커) 컨테이너 안에서 실행될 때 호스트 브라우저가 접근할 수 있도록 함.
        host: '0.0.0.0',
        hmr: {
            host: 'localhost',
        },
        // WSL2의 /mnt 바인드 마운트에서는 inotify가 동작하지 않아 폴링이 필요하다.
        watch: {
            usePolling: true,
        },
    },
});
