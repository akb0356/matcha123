{{-- Figma 41:1435 (Frame 77) + main2/main3 호버 상태 — 문제 제기 --}}
@php
    /*
     * 기본: 사진 + 우측 하단 플러스 아이콘
     * 호버: 플러스가 사라지고 사진에 블러 + 하단 화이트 그라데이션이 깔리며 문구가 올라온다.
     * 문구는 디자인 main2(왼쪽)·main3(오른쪽) 호버 상태에서 가져왔다.
     */
    $cards = [
        [
            'image' => 'images/main/problem-1.png',
            'alt' => '휴대폰으로 부모님 소식을 확인하는 보호자',
            'copy' => '방문 일정이 제대로<br>지켜지고 있는지 알 수 없었던 적',
        ],
        [
            'image' => 'images/main/problem-2.png',
            'alt' => '어르신의 손을 잡고 이야기 나누는 보호자',
            'copy' => '담당 요양보호사가 바뀌어도<br>어떤 케어를 받는지 몰랐던 적',
        ],
    ];
@endphp

<section class="w-full bg-surface">
    <div class="mx-auto flex max-w-content flex-col items-center gap-10 px-6 py-[120px]">
        <h2 class="text-center text-eb52 text-label">
            오늘 우리 부모님이 <span class="text-primary">어떤 돌봄을 받으셨는지</span><br>알 수 없었던 경험이 있으신가요?
        </h2>

        <div class="grid w-full grid-cols-1 gap-10 lg:grid-cols-2">
            @foreach ($cards as $card)
                <div class="group/photo relative h-[518px] overflow-hidden rounded-3xl">
                    {{-- 호버 시 사진만 흐려진다 (문구는 선명하게 유지) --}}
                    <img src="{{ asset($card['image']) }}" alt="{{ $card['alt'] }}"
                         class="absolute inset-0 h-full w-full object-cover transition-[filter,transform] duration-500 ease-out group-hover/photo:scale-105 group-hover/photo:blur-[6px]">

                    {{-- 하단 화이트 그라데이션 --}}
                    <span class="pointer-events-none absolute inset-0 opacity-0 transition-opacity duration-500 group-hover/photo:opacity-100"
                          aria-hidden="true"
                          style="background-image: linear-gradient(to top, rgba(255,255,255,0.95) 0%, rgba(255,255,255,0.75) 35%, rgba(255,255,255,0) 70%)"></span>

                    {{-- 기본 상태의 플러스 아이콘 --}}
                    <span class="absolute bottom-5 right-5 transition-opacity duration-300 group-hover/photo:opacity-0" aria-hidden="true">
                        <img src="{{ asset('images/icons/plus-circle.svg') }}" alt="" class="h-[46px] w-[46px]">
                    </span>

                    {{-- 호버 시 올라오는 문구 --}}
                    <p class="absolute bottom-8 left-8 right-8 translate-y-2 text-b20 text-label opacity-0 transition-all duration-500 ease-out group-hover/photo:translate-y-0 group-hover/photo:opacity-100">
                        {!! $card['copy'] !!}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>
