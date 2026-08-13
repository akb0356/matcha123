{{-- Figma 153:2990 + 153:3237 — 히어로 --}}
<section class="hero-section relative w-full overflow-hidden">
    {{--
        원본(3055x941, 비율 3.247)이 컨테이너 비율과 거의 같아 디자인 크롭
        (w 99.98% / h 103.92% / top -2.06%)은 object-cover 의 기본 중앙 정렬과 결과가 같다.
        폭이 바뀌어도 비율이 유지된다.
    --}}
    <img src="{{ asset('images/services/dementia-respite/hero-respite.png') }}"
         alt="집에서 치매 어르신을 돌보는 요양보호사와 잠시 휴식을 얻은 가족"
         class="absolute inset-0 h-full w-full object-cover">

    {{-- 좌→우 화이트 스크림. 디자인에 포함된 그라데이션이다. --}}
    <div class="pointer-events-none absolute inset-0 bg-gradient-to-r from-white to-transparent" aria-hidden="true"></div>

    <div class="relative mx-auto h-full max-w-content px-6">
        <div class="flex w-full max-w-[640px] flex-col items-start gap-12 hero-copy">
            <div class="flex flex-col items-start gap-3">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/icons/dot-green.svg') }}" alt="" class="h-3 w-3">
                    <p class="text-b20 text-accent-green">치매가족휴가제 · 종일 돌봄 · 가족 휴식</p>
                </div>

                <h1 class="text-eb52 text-label">
                    당신의 쉼을 응원합니다,<br>따뜻한 12시간의 돌봄
                </h1>

                <p class="text-m16 text-label-alt">
                    집에서 치매 어르신을 모시는 가족을 위한 장기요양보험 제도입니다.
                </p>
            </div>

            <div class="flex items-start gap-4">
                <a href="#"
                   class="btn-lift hover:brightness-95 rounded-md bg-accent-green px-8 py-5 text-b16 text-surface drop-shadow-[0_8px_8px_rgba(234,221,207,0.25)]">
                    무료 상담 신청
                </a>
                <a href="#cost"
                   class="btn-lift hover:bg-surface-alt rounded-md bg-surface px-8 py-5 text-b16 text-accent-green drop-shadow-[0_0_7.5px_rgba(0,191,64,0.25)]">
                    비용 알아보기
                </a>
            </div>
        </div>
    </div>
</section>
