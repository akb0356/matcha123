import './bootstrap';

/*
 * Alpine.js는 Livewire 3에 번들로 포함되어 있으므로 별도로 설치·등록하지 않는다.
 * 따로 import 하면 Alpine이 이중 등록되어 오작동한다.
 *
 * Alpine 플러그인을 추가해야 할 때는 아래처럼 livewire:init 훅에서 등록한다.
 *
 *   import focus from '@alpinejs/focus';
 *
 *   document.addEventListener('livewire:init', () => {
 *       Alpine.plugin(focus);
 *   });
 */
