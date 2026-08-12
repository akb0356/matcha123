{{-- Figma 153:1977 + 153:2410 — 히어로 --}}
<section class="relative h-[570px] w-full overflow-hidden">
    {{-- 이미지 크롭 비율은 디자인 값(h 134.27% / w 120.25% / left -11.7% / top -34.21%)을 그대로 쓴다 --}}
    <div class="absolute inset-0 overflow-hidden" aria-hidden="true">
        <img src="{{ asset('images/services/visiting-care/hero-daily-care.png') }}"
             alt="" class="absolute left-[-11.7%] top-[-34.21%] h-[134.27%] w-[120.25%] max-w-none">
    </div>

    {{-- 좌→우 화이트 스크림. 디자인에 포함된 그라데이션이다. --}}
    <div class="pointer-events-none absolute inset-0 bg-gradient-to-r from-white to-transparent" aria-hidden="true"></div>

    <div class="relative mx-auto h-full max-w-content px-6">
        <div class="flex w-full max-w-[653px] flex-col items-start gap-12 pt-[119px]">
            <div class="flex flex-col items-start gap-3">
                <div class="flex items-center gap-2.5">
                    <img src="{{ asset('images/icons/dot-violet.svg') }}" alt="" class="h-3 w-3">
                    <p class="text-b20 text-accent-violet">방문요양 · 식사·이동·일상생활 지원</p>
                </div>

                <h1 class="text-eb52 text-label-neutral">
                    익숙한 집에서,<br>일상의 곁을 지킵니다.
                </h1>

                <p class="text-m16 text-label-alt">
                    매일의 작은 일들을 함께하는 일.<br>어르신의 하루 곁을 따뜻하게 채워드립니다.
                </p>
            </div>

            <div class="flex items-start gap-4">
                <a href="#"
                   class="rounded-md bg-accent-violet px-8 py-5 text-[17px] font-bold leading-normal text-surface drop-shadow-[0_8px_8px_rgba(234,221,207,0.25)]">
                    무료 상담 신청
                </a>
                <a href="#cost"
                   class="rounded-md bg-surface px-8 py-5 text-[17px] font-normal leading-normal text-accent-violet drop-shadow-[0_0_7.5px_rgba(91,55,237,0.25)]">
                    비용 알아보기
                </a>
            </div>
        </div>
    </div>
</section>
