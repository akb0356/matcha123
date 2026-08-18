{{-- Figma 156:4671 + 156:4670 — 히어로 --}}
<section class="hero-section relative w-full overflow-hidden">
    {{--
        시안 에셋(156:4671)은 프레임과 같은 1920x570 비율로 이미 잘려 있다.
        원본(12800x8533, 비율 1.5)을 쓰면 object-cover 가 폭을 절반 넘게 잘라
        2배 이상 확대돼 보이므로, 반드시 시안에서 내보낸 크롭을 쓴다.
    --}}
    <img src="{{ asset('images/support/copayment/hero-copayment.jpg') }}"
         alt="카드와 노트북으로 본인부담금을 확인하는 어르신"
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
                <h1 class="text-eb52 text-label">부담은 생각보다 크지 않아요.</h1>
                <p class="text-m16 text-label-alt">실제 본인부담금이 얼마인지 쉽게 정리했어요.</p>
            </div>

            <div class="flex flex-wrap items-center gap-3">
                <a href="#copay-calc"
                   class="btn-lift flex h-[68px] items-center justify-center rounded-md bg-primary px-7 text-b16 text-surface hover:brightness-95">
                    내 부담금 상담
                </a>
                <a href="#copay-limit"
                   class="btn-lift flex h-[68px] items-center justify-center rounded-md border border-line-divider bg-surface px-7 text-b16 text-label hover:bg-surface-alt">
                    등급별 한도 보기
                </a>
            </div>
        </div>
    </div>
</section>
