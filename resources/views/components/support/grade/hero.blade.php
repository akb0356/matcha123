{{-- Figma 153:4338 + 156:4368 — 히어로 --}}
<section class="hero-section relative w-full overflow-hidden">
    <img src="{{ asset('images/support/grade/hero-grade-guide.jpg') }}"
         alt="장기요양등급 신청을 상담받는 어르신과 전담 매니저"
         class="absolute inset-0 h-full w-full object-cover">

    {{--
        시안(153:4338)의 스크림은 89.57deg 로 흰색 → 투명이다.
        카피가 얹히는 왼쪽을 확실히 덮고 오른쪽 인물은 살리도록 정지점을 나눴다.
        서비스 페이지 히어로와 같은 규칙이다.
    --}}
    <div class="pointer-events-none absolute inset-0" aria-hidden="true"
         style="background-image: linear-gradient(to right,
             rgba(255, 255, 255, 0.94) 0%,
             rgba(255, 255, 255, 0.88) 32%,
             rgba(255, 255, 255, 0.58) 50%,
             rgba(255, 255, 255, 0.14) 68%,
             rgba(255, 255, 255, 0) 80%)"></div>

    <div class="relative mx-auto h-full max-w-content px-6">
        <div class="hero-copy flex w-full max-w-[653px] flex-col items-start gap-12">
            <div class="flex flex-col items-start gap-3">
                <h1 class="text-eb52 text-label">
                    장기요양등급,<br>쉽게 알려드릴게요.
                </h1>

                <p class="text-m16 text-label-alt">
                    신청부터 등급 판정까지, 청담원 전담 매니저가 처음부터 함께합니다.
                </p>
            </div>

            <div class="flex flex-wrap items-center gap-3">
                <a href="#help"
                   class="btn-lift flex h-[68px] items-center justify-center rounded-md bg-primary px-7 text-b16 text-surface hover:brightness-95">
                    무료 상담 신청
                </a>
                <a href="#steps"
                   class="btn-lift flex h-[68px] items-center justify-center rounded-md border border-line-divider bg-surface px-7 text-b16 text-label hover:bg-surface-alt">
                    신청 절차 보기
                </a>
            </div>
        </div>
    </div>
</section>
