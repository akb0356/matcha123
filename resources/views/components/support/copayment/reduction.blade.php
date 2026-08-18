{{-- Figma 156:4687 (Frame 236) — 소득별 경감 --}}
@php
    /*
     * 확인 필요: 경감 구간(40%/60%)과 부담률(9%/6%/0%), 보험료 순위 요건은
     * 공단 고시 대조 전이다. 시안 문구 그대로다.
     *
     * 기초수급자 카드만 반전(primary-soft 배경 + primary 글자)이다.
     */
    $tiers = [
        ['일반 대상자', '15%', '경감 없이 기본 부담률 적용', false],
        ['40% 경감', '9%', '보험료 순위 25~50% 구간 등', false],
        ['60% 경감', '6%', '보험료 순위 25% 이하 등', false],
        ['기초수급자', '0%', '국민기초생활 수급권자 전액 면제', true],
    ];
@endphp

<section class="w-full bg-primary">
    <div class="mx-auto flex max-w-content flex-col items-start gap-24 px-6 py-[120px]">
        <div class="flex w-full max-w-[720px] flex-col items-start gap-4">
            <h2 class="text-eb40 text-surface">소득이 적으면 더 줄어들어요</h2>
            <p class="w-full text-m20 text-surface">소득·재산에 따라 40~60% 경감, 기초수급자는 전액 면제돼요.</p>
        </div>

        <div class="flex w-full flex-col items-start gap-5">
            <div class="grid w-full grid-cols-1 items-stretch gap-4 md:grid-cols-2">
                @foreach ($tiers as [$name, $rate, $desc, $inverted])
                    <div class="flex flex-col items-start gap-2 rounded-md border p-7
                                {{ $inverted
                                    ? 'border-primary/40 bg-primary-soft'
                                    : 'border-white/10 bg-white/5' }}">
                        <p class="{{ $inverted ? 'text-m16 text-primary' : 'text-m16 text-primary-soft' }}">{{ $name }}</p>
                        <p class="{{ $inverted ? 'text-eb30 text-primary' : 'text-eb30 text-label-inverse' }}">{{ $rate }}</p>
                        <p class="w-full {{ $inverted ? 'text-r20 text-primary' : 'text-r20 text-label-inverse' }}">{{ $desc }}</p>
                    </div>
                @endforeach
            </div>

            <p class="w-full text-m16 text-primary-soft">
                ※ 재가급여 기준 본인부담률 예시 · 경감 구간·요건은 공단 기준에 따라 달라질 수 있어요.
            </p>
        </div>
    </div>
</section>
