{{-- Figma 180:3036 (Frame 209) — 일하는 사람을 먼저 돌봅니다 --}}
@php
    /*
     * 아이콘 타일 색은 카드마다 다르다. 시안의 raw 값(10% 틴트)을 그대로 옮겼다.
     * #d17600 과 #e52222 는 토큰에 없는 색이라 임의값으로 둔다.
     */
    $benefits = [
        ['icon' => 'culture-pay', 'tint' => 'rgba(209,118,0,0.1)', 'w' => '21.17px',
         'title' => '경력 단계별 수당',
         'desc' => '신입부터 시니어까지, 경력에 따라 시급과 수당이 단계적으로 올라갑니다.'],
        ['icon' => 'culture-edu', 'tint' => 'rgba(91,55,237,0.1)', 'w' => '24px',
         'title' => '월 24시간 유급 교육',
         'desc' => '치매 케어·응급 대처·감염 관리까지, 근무로 인정되는 교육을 매달 제공합니다.'],
        ['icon' => 'culture-shield', 'tint' => 'rgba(0,141,207,0.1)', 'w' => '24px',
         'title' => '4대보험 + 상해보험',
         'desc' => '전 직원 4대보험은 기본, 현장 상해보험까지 더해 안심하고 일할 수 있습니다.'],
        ['icon' => 'culture-hotline', 'tint' => 'rgba(229,34,34,0.1)', 'w' => '24px',
         'title' => '24시간 핫라인',
         'desc' => '현장에서 곤란한 상황이 생기면 언제든 전화 한 통으로 센터가 함께합니다.'],
        ['icon' => 'culture-heart', 'tint' => 'rgba(0,150,50,0.1)', 'w' => '24px',
         'title' => '심리상담 (EAP)',
         'desc' => '감정노동의 부담을 덜 수 있도록 전문 심리상담을 무료로 지원합니다.'],
        ['icon' => 'culture-pin', 'tint' => 'rgba(0,94,235,0.1)', 'w' => '17.31px',
         'title' => '거리 수당',
         'desc' => '집에서 가까운 어르신과 우선 매칭하고, 이동 거리에 따라 수당을 별도 지급합니다.'],
    ];
@endphp

<section class="w-full bg-primary-soft">
    <div class="mx-auto flex max-w-content flex-col items-start gap-24 px-6 py-[120px]">
        <div class="flex w-full max-w-[860px] flex-col items-start gap-3">
            <h2 class="w-full text-eb44 text-label lg:text-eb52">일하는 사람을 먼저 돌봅니다</h2>
            <p class="w-full text-m20 text-label-alt">
                좋은 돌봄은 좋은 일자리에서 시작된다고 믿습니다. 청담원이 약속하는 여섯 가지입니다.
            </p>
        </div>

        <div class="grid w-full grid-cols-1 items-stretch gap-5 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($benefits as $b)
                <div class="flex flex-col items-start rounded-md border border-surface-alt bg-surface p-7">
                    {{-- 아이콘은 24px 정사각 프레임 안에 고유 비율로 넣는다 --}}
                    <span class="flex h-[52px] w-[52px] shrink-0 items-center justify-center rounded-md"
                          style="background-color: {{ $b['tint'] }}">
                        <span class="flex h-6 w-6 items-center justify-center">
                            <img src="{{ asset("images/icons/{$b['icon']}.svg") }}" alt=""
                                 class="h-6" style="width: {{ $b['w'] }}">
                        </span>
                    </span>
                    <p class="mt-[18px] w-full text-b20 text-label">{{ $b['title'] }}</p>
                    <p class="mt-2 w-full text-m16 text-label-alt">{{ $b['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
