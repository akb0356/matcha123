{{-- Figma 59:27 (Frame 100) + main3 관리자 탭 상태 — 보호자/관리자 화면 --}}
@php
    /*
     * 탭을 누르면 대시보드 스크린샷과 플로팅 라벨 4개가 함께 교체된다.
     * 라벨 위치는 디자인의 ml/mt 값을 1056px 기준 비율(%)로 옮겼다.
     * 스크린샷은 실제 서비스 화면 캡처다.
     */
    $tabs = [
        [
            'key' => 'guardian',
            'label' => '보호자 화면',
            'image' => 'images/main/dashboard-guardian.png',
            'alt' => '보호자용 대시보드 — 이번 달 케어플랜과 돌봄 일지 확인 화면',
            'pins' => [
                ['text' => '이번 달 케어플랜', 'color' => 'primary', 'left' => '90%', 'top' => '17%'],
                ['text' => '일정·예약 한눈에', 'color' => 'violet', 'left' => '0%', 'top' => '41%'],
                ['text' => '청구내역 투명하게', 'color' => 'brown', 'left' => '27%', 'top' => '65%'],
                ['text' => '돌봄 일지로 매일 확인', 'color' => 'orange', 'left' => '84%', 'top' => '84%'],
            ],
        ],
        [
            'key' => 'admin',
            'label' => '관리자 화면',
            'image' => 'images/main/dashboard-admin.png',
            'alt' => '관리자용 대시보드 — 수급자 현황과 청구 매출 관리 화면',
            'pins' => [
                ['text' => '수급자 증감 실시간 확인', 'color' => 'violet', 'left' => '88%', 'top' => '17%'],
                ['text' => '서비스별 구성 한눈에', 'color' => 'primary', 'left' => '0%', 'top' => '33%'],
                ['text' => '직원 현황도 함께 관리', 'color' => 'orange', 'left' => '20%', 'top' => '59%'],
                ['text' => '청구·매출 현황 투명하게', 'color' => 'brown', 'left' => '80%', 'top' => '78%'],
            ],
        ],
    ];

    // 디자인의 라벨 테두리·글자색
    $pinColors = [
        'primary' => 'border-primary text-primary',
        'violet' => 'border-accent-violet text-accent-violet',
        'orange' => 'border-[#d17600] text-[#d17600]',
        'brown' => 'border-[#84662f] text-[#84662f]',
    ];
@endphp

<section class="w-full bg-surface" x-data="{ tab: 'guardian' }">
    <div class="flex flex-col items-center gap-8 py-[120px]">
        <h2 class="w-full px-6 text-center text-eb52 text-label">보호자의 안심과 센터의 운영까지</h2>

        <div class="flex w-full flex-col items-center gap-8">
            <div class="flex items-center gap-2" role="tablist" aria-label="화면 종류">
                @foreach ($tabs as $t)
                    <button type="button" role="tab"
                            x-on:click="tab = '{{ $t['key'] }}'"
                            x-bind:aria-selected="tab === '{{ $t['key'] }}'"
                            x-bind:class="tab === '{{ $t['key'] }}'
                                ? 'bg-primary text-surface'
                                : 'bg-surface text-primary hover:bg-primary/5'"
                            class="btn-lift flex items-center justify-center rounded-full border border-primary px-6 py-3 text-m20">
                        {{ $t['label'] }}
                    </button>
                @endforeach
            </div>

            {{-- 라벨이 좌우로 삐져나오므로 넉넉한 폭을 두고 가운데 정렬한다 --}}
            <div class="w-full overflow-x-auto px-6">
                <div class="relative mx-auto w-[1056px] max-w-full">
                    @foreach ($tabs as $t)
                        <div x-show="tab === '{{ $t['key'] }}'" x-cloak
                             x-transition.opacity.duration.300ms
                             class="relative">
                            <img src="{{ asset($t['image']) }}" alt="{{ $t['alt'] }}"
                                 class="w-full rounded-[20px] border border-fill-alt shadow-card-lo">

                            @foreach ($t['pins'] as $pin)
                                <span class="absolute hidden -translate-x-1/2 items-center justify-center whitespace-nowrap rounded-full border bg-surface px-6 py-3 text-r16 shadow-[0_4px_10px_rgba(0,0,0,0.1)] lg:flex {{ $pinColors[$pin['color']] }}"
                                      style="left: {{ $pin['left'] }}; top: {{ $pin['top'] }}">
                                    {{ $pin['text'] }}
                                </span>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
