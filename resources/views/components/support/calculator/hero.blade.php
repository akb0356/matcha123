{{-- Figma 163:5886 + 163:5884 — 히어로 --}}
<section class="hero-section relative w-full overflow-hidden">
    {{-- 시안 에셋(163:5886)은 프레임과 같은 3.368 비율로 이미 잘려 있다. 원본을 쓰면 확대된다. --}}
    <img src="{{ asset('images/support/calculator/hero-calculator.jpg') }}"
         alt="계산기와 저금통이 놓인 책상"
         class="absolute inset-0 h-full w-full object-cover">

    <div class="pointer-events-none absolute inset-0" aria-hidden="true"
         style="background-image: linear-gradient(to right,
             rgba(255, 255, 255, 0.94) 0%,
             rgba(255, 255, 255, 0.88) 32%,
             rgba(255, 255, 255, 0.58) 50%,
             rgba(255, 255, 255, 0.14) 68%,
             rgba(255, 255, 255, 0) 80%)"></div>

    <div class="relative mx-auto h-full max-w-content px-6">
        <div class="hero-copy flex w-full max-w-[653px] flex-col items-start gap-12">
            <div class="flex flex-col items-start gap-[11px]">
                <h1 class="text-eb52 text-label">내 본인부담금,<br>직접 계산해보세요.</h1>
                <p class="text-m20 text-label-alt">
                    등급과 이용 정도만 고르면 바로 계산돼요.<br>복잡한 계산 없이 1분이면 충분합니다.
                </p>
            </div>

            <div class="flex flex-wrap items-center gap-3">
                <a href="#calculator"
                   class="btn-lift flex h-[68px] items-center justify-center rounded-md bg-primary px-7 text-b16 text-surface hover:brightness-95">
                    계산 시작
                </a>
                <a href="{{ route('support.copayment') }}"
                   class="btn-lift flex h-[68px] items-center justify-center rounded-md border border-line-divider bg-surface px-7 text-b16 text-label hover:bg-surface-alt">
                    본인부담금 안내
                </a>
            </div>
        </div>
    </div>
</section>
