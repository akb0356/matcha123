{{-- Figma 33:1138 + 33:1148 + 148:933 + 33:1162 — 히어로 + 지표 바 --}}
@php
    $stats = [
        ['value' => '600+', 'unit' => '건', 'label' => '누적 상담 건수'],
        ['value' => '99.6', 'unit' => '%', 'label' => '재이용·재계약률'],
        ['value' => '300+', 'unit' => '곳', 'label' => '제휴 의료기관'],
        ['value' => '600+', 'unit' => '명', 'label' => '등록 간호사·요양보호사'],
    ];
@endphp

<section class="relative h-[628px] w-full overflow-hidden">
    <img src="{{ asset('images/main/hero.png') }}"
         alt="어르신과 가족, 돌봄 인력이 함께 있는 장면"
         class="absolute inset-0 h-full w-full object-cover">

    {{-- 디자인의 좌→우 화이트 그라데이션 (83.4deg) --}}
    <div class="pointer-events-none absolute inset-0" aria-hidden="true"
         style="background-image: linear-gradient(83.4deg, rgb(255,255,255) 0.3%, rgba(255,255,255,0) 98.2%)"></div>

    <div class="relative mx-auto h-full max-w-content px-6">
        <div class="flex w-full max-w-[641px] flex-col items-start gap-9 pt-[72px]">
            <div class="flex flex-col items-start gap-2 [text-shadow:0_0_23px_#fff]">
                <h1 class="text-eb52 text-primary">
                    재가복지서비스부터<br>운영 플랫폼까지,<br>청담원이 하나로 잇습니다
                </h1>
                <p class="text-m20 text-label">가족의 진심에, 전문성을 더합니다</p>
            </div>

            {{-- 상담 신청 / 플랫폼 문의 두 갈래 진입 --}}
            <div class="flex w-full flex-col items-stretch gap-4 sm:flex-row sm:items-center">
                <a href="{{ route('services.visiting-nursing') }}"
                   class="btn-hover hover:bg-primary-strong flex flex-1 items-center gap-2.5 rounded-md bg-primary px-5 py-4">
                    <img src="{{ asset('images/icons/cta-care.svg') }}" alt="" class="h-[17.5px] w-[15.7px] shrink-0">
                    <span class="flex flex-1 flex-col items-start gap-1 text-surface">
                        <span class="text-b16">방문요양·간호 무료 상담 신청</span>
                        <span class="text-r14">클릭 한 번, 1분이면 신청 끝</span>
                    </span>
                    <img src="{{ asset('images/icons/chevron-right-white.svg') }}" alt="" class="h-6 w-6 shrink-0">
                </a>

                <a href="#platform"
                   class="btn-hover hover:bg-accent-violet-strong flex flex-1 items-center gap-2.5 rounded-md bg-accent-violet px-5 py-4">
                    <img src="{{ asset('images/icons/cta-platform.svg') }}" alt="" class="h-[15.7px] w-[17.5px] shrink-0">
                    <span class="flex flex-1 flex-col items-start gap-1 text-surface">
                        <span class="text-b16">청담원 플랫폼 도입 문의</span>
                        <span class="text-r14">센터 운영을 하나로 통합 관리</span>
                    </span>
                    <img src="{{ asset('images/icons/chevron-right-white.svg') }}" alt="" class="h-6 w-6 shrink-0">
                </a>
            </div>
        </div>
    </div>

    {{-- 하단 지표 바. 히어로 위에 겹쳐 앉는다 (반투명 primary) --}}
    <div class="absolute inset-x-0 bottom-0 bg-primary/80">
        <div class="mx-auto grid max-w-content grid-cols-2 gap-y-4 px-6 py-5 lg:grid-cols-4 lg:gap-y-0">
            @foreach ($stats as $i => $stat)
                <div @class([
                    'flex flex-col items-center justify-center gap-1 lg:h-[112px]',
                    'lg:border-r lg:border-surface' => $i < count($stats) - 1,
                ])>
                    <p class="whitespace-nowrap text-[#fff1c2]">
                        <span class="text-eb40">{{ $stat['value'] }}</span><span class="text-b24">{{ $stat['unit'] }}</span>
                    </p>
                    <p class="text-center text-m16 text-surface">{{ $stat['label'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
