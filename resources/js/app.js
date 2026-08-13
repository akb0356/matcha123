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

/**
 * 숫자가 0에서 목표값까지 올라가는 카운트업. 화면에 들어올 때 한 번만 재생한다.
 *
 * 마크업 예:
 *   <span data-countup="62.6" data-countup-decimals="1">62.6</span>
 *
 * data-countup       목표값 (필수)
 * data-countup-decimals  소수점 자리수 (기본 0)
 *
 * JS가 없거나 실패하면 태그 안의 최종 값이 그대로 보인다.
 */
function setupCountUp() {
    const targets = Array.from(document.querySelectorAll('[data-countup]'));

    if (targets.length === 0) {
        return;
    }

    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (reduceMotion || typeof IntersectionObserver === 'undefined') {
        return; // 최종 값이 이미 렌더돼 있으므로 그대로 둔다
    }

    const format = (value, decimals) =>
        value.toLocaleString('ko-KR', {
            minimumFractionDigits: decimals,
            maximumFractionDigits: decimals,
        });

    const run = (el) => {
        const to = parseFloat(el.dataset.countup);
        const decimals = parseInt(el.dataset.countupDecimals ?? '0', 10);

        if (Number.isNaN(to)) {
            return;
        }

        const duration = 1400;
        const start = performance.now();

        const tick = (now) => {
            const progress = Math.min((now - start) / duration, 1);
            // easeOutExpo — 빠르게 오르다 목표값에서 부드럽게 멈춘다
            const eased = progress === 1 ? 1 : 1 - Math.pow(2, -10 * progress);

            el.textContent = format(to * eased, decimals);

            if (progress < 1) {
                requestAnimationFrame(tick);
            }
        };

        el.textContent = format(0, decimals);
        requestAnimationFrame(tick);
    };

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (! entry.isIntersecting) {
                    return;
                }

                run(entry.target);
                observer.unobserve(entry.target);
            });
        },
        { threshold: 0.6 }
    );

    targets.forEach((el) => observer.observe(el));
}

setupSectionReveal();
setupCountUp();
