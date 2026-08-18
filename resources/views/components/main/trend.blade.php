{{-- Figma 57:17 (Frame 93) — 재가 돌봄 추세 지표 (스크롤 진입 시 카운트업) --}}
@php
    /*
     * value 는 카운트업 목표값, decimals 는 소수점 자리수다.
     * JS가 없으면 태그에 렌더된 최종 값이 그대로 보인다 (resources/js/app.js).
     */
    $stats = [
        ['prefix' => '', 'value' => 62.6, 'decimals' => 1, 'unit' => '%', 'label' => '재가급여 비중'],
        ['prefix' => '약 ', 'value' => 2, 'decimals' => 0, 'unit' => '%', 'label' => '방문간호 이용률'],
        ['prefix' => '', 'value' => 116.5, 'decimals' => 1, 'unit' => '만건', 'label' => '장기요양 인정자'],
    ];
@endphp

<section class="w-full bg-primary">
    <div class="mx-auto flex max-w-content flex-col items-center gap-8 px-6 py-[120px]">
        <h2 class="w-full text-center text-eb52 text-surface">
            돌봄이 <span class="text-[#fff1c2]">'살던 곳'</span>으로 옮겨가고 있습니다
        </h2>

        <div class="flex w-full flex-col items-center justify-center text-surface sm:flex-row">
            @foreach ($stats as $i => $stat)
                <div @class([
                    'flex w-full flex-1 flex-col items-center justify-center py-5',
                    'sm:border-r sm:border-surface' => $i < count($stats) - 1,
                ])>
                    <p class="whitespace-nowrap">
                        <span class="text-eb40">{{ $stat['prefix'] }}<span
                            data-countup="{{ $stat['value'] }}"
                            data-countup-decimals="{{ $stat['decimals'] }}"
                        >{{ number_format($stat['value'], $stat['decimals']) }}</span></span><span class="text-b24">{{ $stat['unit'] }}</span>
                    </p>
                    <p class="w-full text-center text-r16">{{ $stat['label'] }}</p>
                </div>
            @endforeach
        </div>

        <a href="#" class="btn-hover hover:bg-white/10 flex items-center justify-center rounded-md border border-surface px-8 py-4">
            <span class="whitespace-nowrap text-m20 text-surface">장기요양등급 신청 방법이 궁금하신가요? →</span>
        </a>
    </div>
</section>
