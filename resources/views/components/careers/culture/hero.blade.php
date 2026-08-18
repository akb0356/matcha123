{{-- Figma 180:3033 + 180:3032 — 히어로 --}}
<section class="hero-section relative w-full overflow-hidden">
    {{-- 시안(180:3033)은 h-full w-99.99% 로 잘림이 없다. 프레임 비율 그대로 넣는다. --}}
    <img src="{{ asset('images/careers/hero-culture.jpg') }}"
         alt="청담원 센터에서 함께 이야기 나누는 동료들"
         class="absolute inset-0 h-full w-full object-cover">

    <div class="pointer-events-none absolute inset-0" aria-hidden="true"
         style="background-image: linear-gradient(to right,
             rgba(255, 255, 255, 0.94) 0%,
             rgba(255, 255, 255, 0.88) 32%,
             rgba(255, 255, 255, 0.58) 50%,
             rgba(255, 255, 255, 0.14) 68%,
             rgba(255, 255, 255, 0) 80%)"></div>

    <div class="relative mx-auto h-full max-w-content px-6">
        <div class="hero-copy flex w-full max-w-[560px] flex-col items-start gap-12">
            <div class="flex flex-col items-start gap-3">
                <h1 class="text-eb52 text-label">청담원에서 일한다는 것</h1>
                <p class="text-m20 text-label-alt">
                    좋은 돌봄은 좋은 일자리에서 시작됩니다.<br>복지부터 성장까지, 오래 함께할 이유를 소개합니다.
                </p>
            </div>

            <a href="{{ route('careers') }}"
               class="btn-hover flex h-[68px] items-center justify-center gap-2 rounded-md bg-primary px-7 text-b16 text-surface hover:bg-primary-strong">
                채용 공고 보기
                <img src="{{ asset('images/icons/arrow-right-white.svg') }}" alt="" class="h-[16.81px] w-5">
            </a>
        </div>
    </div>
</section>
