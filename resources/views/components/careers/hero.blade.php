{{-- Figma 180:2207 + 180:2496 + 180:2219 — 히어로 --}}
<section class="hero-section relative w-full overflow-hidden">
    {{--
        시안(180:2207)은 원본을 110.24% 로 키우고 좌 -5.11% · 상 -8.24% 로 밀어 넣는다.
        그 지점을 미리 잘라 1920x570 으로 저장했으므로 여기서는 그대로 채운다.
    --}}
    <img src="{{ asset('images/careers/hero-careers.jpg') }}"
         alt="청담원에서 함께 일하는 간호사와 요양보호사들"
         class="absolute inset-0 h-full w-full object-cover">

    <div class="pointer-events-none absolute inset-0" aria-hidden="true"
         style="background-image: linear-gradient(to right,
             rgba(255, 255, 255, 0.94) 0%,
             rgba(255, 255, 255, 0.88) 32%,
             rgba(255, 255, 255, 0.58) 50%,
             rgba(255, 255, 255, 0.14) 68%,
             rgba(255, 255, 255, 0) 80%)"></div>

    <div class="relative mx-auto flex h-full max-w-content flex-col px-6">
        <div class="hero-copy flex w-full max-w-[653px] flex-col items-start gap-12">
            <div class="flex flex-col items-start gap-[11px]">
                <h1 class="text-eb52 text-label">함께 성장할<br>동료를 찾습니다</h1>
                <p class="text-m20 text-label-alt">
                    경력 단계별 수당부터 월 24시간 유급 교육,<br>심리 상담까지. 청담원이 함께합니다.
                </p>
            </div>

            <div class="flex flex-wrap items-center gap-3">
                <a href="#positions"
                   class="btn-lift flex h-[68px] items-center justify-center gap-2 rounded-md bg-primary px-7 text-b16 text-surface hover:brightness-95">
                    1분 간편 지원하기
                    <img src="{{ asset('images/icons/arrow-right-white.svg') }}" alt="" class="h-[16.81px] w-5">
                </a>
                <a href="#positions"
                   class="btn-lift flex h-[68px] items-center justify-center rounded-md bg-surface px-7 text-b16 text-primary hover:bg-surface-alt">
                    공고 보기
                </a>
            </div>
        </div>

        {{--
            시안(180:2219)은 이 링크를 히어로 좌하단에 흰색 70% 로 두었는데,
            같은 자리에 흰 스크림이 깔려 있어 시안 렌더에서도 글자가 보이지 않는다.
            확인 필요: 읽히도록 primary 로 바꿨다. 연결할 페이지는 아직 없다.
        --}}
        <a href="#" class="mb-6 mt-auto inline-flex w-fit items-center gap-1.5 text-m16 text-primary hover:underline">
            청담원에서 일한다는 것
            <img src="{{ asset('images/icons/arrow-right-primary.svg') }}" alt="" class="h-[13.45px] w-4">
        </a>
    </div>
</section>
