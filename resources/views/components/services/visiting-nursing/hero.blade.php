{{-- Figma 153:1425 + 153:1925 — 히어로 --}}
<section class="relative h-[570px] w-full overflow-hidden">
    <img src="{{ asset('images/services/visiting-nursing/hero-home-care-scene.png') }}"
         alt="거실에서 어르신과 함께 이야기 나누는 방문간호사와 가족"
         class="absolute inset-0 h-full w-full object-cover">

    {{--
        화이트 스크림. 카피가 얹히는 왼쪽 구간(1920 기준 약 440~1093px = 23~57%)까지
        불투명도를 유지하고, 오른쪽 인물이 가려지지 않도록 78% 지점에서 완전히 걷힌다.
    --}}
    <div class="pointer-events-none absolute inset-0" aria-hidden="true"
         style="background-image: linear-gradient(to right,
             rgba(255, 255, 255, 0.92) 0%,
             rgba(255, 255, 255, 0.88) 30%,
             rgba(255, 255, 255, 0.60) 48%,
             rgba(255, 255, 255, 0.15) 65%,
             rgba(255, 255, 255, 0) 78%)"></div>

    <div class="relative mx-auto h-full max-w-content px-6">
        <div class="flex w-full max-w-[653px] flex-col items-start gap-12 pt-[119px]">
            <div class="flex flex-col items-start gap-3">
                <div class="flex items-center gap-2.5">
                    <img src="{{ asset('images/icons/dot-orange.svg') }}" alt="" class="h-3 w-3">
                    <p class="text-b20 text-caution">방문간호 · 전문의료 처치 · 건강 관리</p>
                </div>

                <h1 class="text-eb52 text-label-neutral">
                    가족의 진심에<br>전문간호를 더합니다.
                </h1>

                <p class="text-m16 text-label-alt">
                    작은 변화를 먼저 알아차리는 일.<br>청담원은 그 마음에 전문간호를 더해드립니다.
                </p>
            </div>

            <div class="flex items-start gap-4">
                <a href="#"
                   class="rounded-md bg-caution px-8 py-5 text-b16 text-surface drop-shadow-[0_8px_8px_rgba(234,221,207,0.25)]">
                    무료 상담 신청
                </a>
                <a href="#cost"
                   class="rounded-md bg-surface px-8 py-5 text-b16 text-caution drop-shadow-[0_0_7.5px_rgba(255,144,0,0.25)]">
                    비용 알아보기
                </a>
            </div>
        </div>
    </div>
</section>
