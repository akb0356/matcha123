{{-- Figma 180:3116 + 180:3480 — 히어로 --}}
<section class="hero-section relative w-full overflow-hidden">
    <img src="{{ asset('images/services/platform/hero-platform.jpg') }}"
         alt="센터 사무실에서 청담원 플랫폼으로 업무를 처리하는 담당자"
         {{-- 시안(180:3116)은 이미지에 불투명도 80% 가 걸려 있다 --}}
         class="absolute inset-0 h-full w-full object-cover opacity-80">

    {{-- 서비스 페이지 히어로와 같은 화이트 스크림 규칙 --}}
    <div class="pointer-events-none absolute inset-0" aria-hidden="true"
         style="background-image: linear-gradient(to right,
             rgba(255, 255, 255, 0.94) 0%,
             rgba(255, 255, 255, 0.88) 32%,
             rgba(255, 255, 255, 0.58) 50%,
             rgba(255, 255, 255, 0.14) 68%,
             rgba(255, 255, 255, 0) 80%)"></div>

    <div class="relative mx-auto h-full max-w-content px-6">
        <div class="hero-copy flex w-full max-w-[700px] flex-col items-start gap-12">
            <div class="flex flex-col items-start gap-3">
                <div class="flex items-center gap-2.5">
                    <img src="{{ asset('images/icons/dot-primary.svg') }}" alt="" class="h-3 w-3">
                    <p class="text-b20 text-primary">청담원 플랫폼 · 센터 운영 통합 관리</p>
                </div>

                <h1 class="text-eb52 text-label-neutral">
                    따로 돌던 센터 업무,<br>한 곳에서 끝냅니다.
                </h1>

                <p class="text-m16 text-label-alt">
                    환자연계부터 케어플랜, 채용까지.<br>센터 운영에 필요한 일을 청담원 하나로 처리합니다.
                </p>
            </div>

            <div class="flex flex-wrap items-start gap-4">
                <a href="#platform-cta"
                   class="btn-lift rounded-md bg-primary px-8 py-5 text-b16 text-surface drop-shadow-[0_8px_8px_rgba(234,221,207,0.25)] hover:brightness-95">
                    도입 문의하기
                </a>
                <a href="#platform-pillars"
                   class="btn-lift rounded-md bg-surface px-8 py-5 text-b16 text-primary drop-shadow-[0_0_7.5px_rgba(54,148,171,0.25)] hover:bg-surface-alt">
                    기능 살펴보기
                </a>
            </div>
        </div>
    </div>
</section>
