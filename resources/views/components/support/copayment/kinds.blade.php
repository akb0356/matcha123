{{-- Figma 156:4682 (Frame 232) — 급여 종류별 부담률 --}}
@php
    /* 확인 필요: 재가 15% / 시설 20% 는 공단 고시 대조 전이다. 시안 문구 그대로다. */
    $kinds = [
        ['재가급여', '15%', '방문요양·방문간호·방문목욕, 주야간보호 등 집에서 받는 서비스', true],
        ['시설급여', '20%', '노인요양시설 등에 입소해 생활하며 받는 서비스', false],
    ];
@endphp

<section class="w-full bg-fill-normal">
    <div class="mx-auto flex max-w-content flex-col items-start gap-24 px-6 py-[120px]">
        <div class="flex w-full max-w-[860px] flex-col items-start gap-3">
            <h2 class="text-eb40 text-label">어떤 서비스냐에 따라 달라져요</h2>
            <p class="w-full text-m20 text-label-alt">
                집에서 받는 재가급여는 15%, 시설에 입소하는 시설급여는 20%가 기본 본인부담률이에요.
            </p>
        </div>

        <div class="flex w-full flex-col items-start gap-5">
            <div class="grid w-full grid-cols-1 items-stretch gap-4 md:grid-cols-2">
                @foreach ($kinds as [$name, $rate, $desc, $highlight])
                    <div class="flex flex-col items-start gap-3 rounded-md border p-7
                                {{ $highlight ? 'border-primary-inverse bg-primary-soft' : 'border-line-neutral bg-surface' }}">
                        <div class="flex w-full items-baseline justify-between gap-3">
                            <span class="text-b24 text-label-strong">{{ $name }}</span>
                            <span class="text-eb30 {{ $highlight ? 'text-primary-strong' : 'text-label' }}">{{ $rate }}</span>
                        </div>
                        <p class="w-full text-r20 text-label-alt">{{ $desc }}</p>
                    </div>
                @endforeach
            </div>

            <p class="w-full text-m16 text-label-alt">
                ※ 청담원의 방문요양·방문간호·방문목욕은 모두 재가급여(15%)에 해당해요.
            </p>
        </div>
    </div>
</section>
