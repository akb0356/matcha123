{{-- Figma 153:2440 + 153:2945 — 히어로 --}}
<section class="relative h-[570px] w-full overflow-hidden">
    {{--
        디자인 크롭은 w 99.98% / h 170.51% / top -70.43% 로, 원본(1858x941, 비율 1.974)을
        폭에 맞춰 키우고 아래쪽을 보여주는 구도다. 비율이 같으므로 object-cover +
        object-bottom 으로 같은 결과를 얻고, 어떤 폭에서도 이미지가 눌리지 않는다.
    --}}
    <img src="{{ asset('images/services/visiting-bath/hero-visit-bath.png') }}"
         alt="이동식 욕조를 준비해 어르신의 목욕을 돕는 요양보호사 2인"
         class="absolute inset-0 h-full w-full object-cover object-bottom">

    {{-- 좌→우 화이트 스크림. 디자인에 포함된 그라데이션이다. --}}
    <div class="pointer-events-none absolute inset-0 bg-gradient-to-r from-white to-transparent" aria-hidden="true"></div>

    <div class="relative mx-auto h-full max-w-content px-6">
        <div class="flex w-full max-w-[640px] flex-col items-start gap-12 pt-[77px]">
            <div class="flex flex-col items-start gap-3">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/icons/dot-light-blue.svg') }}" alt="" class="h-3 w-3">
                    <p class="text-b20 text-accent-light-blue">방문목욕 · 2인 1조 안전 목욕 지원</p>
                </div>

                <h1 class="text-eb52 text-label">
                    씻는 일의 어려움,<br>집에서 덜어드립니다.
                </h1>

                <p class="text-m16 text-label-alt">
                    미끄러질까 걱정되는 목욕,<br>전문 인력 2인이 장비를 갖추고 찾아가 도와드립니다.
                </p>
            </div>

            <div class="flex items-start gap-4">
                <a href="#"
                   class="rounded-md bg-accent-light-blue px-8 py-5 text-[17px] font-bold leading-normal text-surface drop-shadow-[0_8px_8px_rgba(234,221,207,0.25)]">
                    무료 상담 신청
                </a>
                <a href="#cost"
                   class="rounded-md bg-surface px-8 py-5 text-[17px] font-normal leading-normal text-accent-light-blue drop-shadow-[0_0_7.5px_rgba(0,141,207,0.25)]">
                    비용 알아보기
                </a>
            </div>
        </div>
    </div>
</section>
