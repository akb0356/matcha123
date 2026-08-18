{{-- Figma 153:4260 (Frame 204) — 꼭 알아야 할 핵심 4가지 --}}
@php
    $facts = [
        ['icon' => 'grade-fact-target', 'label' => '대상',
         'head' => '만 65세 이상', 'sub' => '또는 65세 미만 노인성 질병'],
        ['icon' => 'grade-fact-agency', 'label' => '판정 기관',
         'head' => '국민건강보험공단', 'sub' => '신청·등급 판정을 주관'],
        ['icon' => 'grade-fact-level', 'label' => '등급',
         'head' => '1~5등급 + 인지지원', 'sub' => '인정점수에 따라 결정'],
        ['icon' => 'grade-fact-cost', 'label' => '본인부담',
         'head' => '재가 15% / 시설 20%', 'sub' => '감경·수급 시 더 경감'],
    ];
@endphp

<section class="w-full bg-surface-alt">
    <div class="mx-auto flex max-w-content flex-col items-start gap-24 px-6 py-[120px]">
        <div class="flex w-full flex-col items-start gap-3">
            <h2 class="text-eb40 text-label">꼭 알아야 할 핵심 4가지</h2>
            <p class="text-m20 text-label-alt">
                누가 받을 수 있고, 어디서 판정하며, 어떤 등급과 부담이 있는지, 큰 그림부터 살펴보세요.
            </p>
        </div>

        <div class="grid w-full grid-cols-1 gap-4 md:grid-cols-2">
            @foreach ($facts as $fact)
                <div class="flex flex-col items-start gap-4 rounded-md border border-line-soft bg-surface p-7">
                    <div class="flex items-center gap-3">
                        <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded bg-primary/10">
                            <img src="{{ asset("images/icons/{$fact['icon']}.svg") }}" alt="" class="h-6 w-6">
                        </span>
                        <span class="text-b20 text-primary">{{ $fact['label'] }}</span>
                    </div>

                    <div class="flex w-full flex-col items-start gap-2">
                        <p class="w-full text-b24 text-label">{{ $fact['head'] }}</p>
                        <p class="w-full text-r20 text-label-alt">{{ $fact['sub'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
