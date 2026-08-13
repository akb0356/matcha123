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

/**
 * 스크롤로 섹션이 화면에 들어올 때 아래에서 떠오르게 한다.
 *
 * 대상은 <main> 바로 아래 <section> 이며, 첫 번째(히어로)는 첫 화면이라 제외한다.
 * 마크업을 건드리지 않아도 되므로 앞으로 추가되는 페이지에도 그대로 적용된다.
 *
 * 초기 숨김 스타일은 .reveal-ready 로 걸려 있고(resources/css/app.css) 이 함수가
 * 그 클래스를 붙인다. JS가 실패하면 숨김이 적용되지 않아 내용이 그대로 보인다.
 */
function setupSectionReveal() {
    const sections = Array.from(document.querySelectorAll('main > section')).slice(1);

    if (sections.length === 0) {
        return;
    }

    document.documentElement.classList.add('reveal-ready');

    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // 관찰자를 못 쓰거나 움직임 최소화 설정이면 전부 바로 노출한다.
    if (reduceMotion || typeof IntersectionObserver === 'undefined') {
        sections.forEach((section) => section.classList.add('is-revealed'));

        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (! entry.isIntersecting) {
                    return;
                }

                entry.target.classList.add('is-revealed');
                observer.unobserve(entry.target); // 한 번만 재생한다
            });
        },
        {
            // 섹션이 화면 아래쪽에 살짝 걸친 뒤 시작되도록 아래 여백을 준다.
            rootMargin: '0px 0px -12% 0px',
            threshold: 0.05,
        }
    );

    sections.forEach((section) => observer.observe(section));
}

setupSectionReveal();
