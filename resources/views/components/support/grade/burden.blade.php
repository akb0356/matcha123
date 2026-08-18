{{-- Figma 156:4380 (Frame 215) — 실제 부담은 일부예요 --}}
@php
    /*
     * 확인 필요: 본인부담률(재가 15% / 시설 20% / 경감 6~9% / 기초수급 0%)은
     * 공단 고시 대조 전이다. 시안 문구 그대로 옮겼다.
     *
     * 첫 카드만 강조(primary-soft 배경 + inverse-primary 테두리 + primary-strong 숫자)다.
     */
    $burdens = [
        ['재가급여', '15%', '방문요양·방문간호·방문목욕, 주야간보호 등', true],
        ['시설급여', '20%', '노인요양시설 등 시설 입소', false],
        ['경감 대상', '6~9%', '소득·재산 기준 감경 대상자', false],
        ['기초수급', '0%', '국민기초생활 수급권자', false],
    ];
@endphp

<section class="w-full bg-surface">
    <div class="mx-auto flex max-w-content flex-col items-start gap-24 px-6 py-[120px]">
        <div class="flex w-full max-w-[860px] flex-col items-start gap-3">
            <h2 class="text-eb40 text-label">실제 부담은 일부예요</h2>
            <p class="text-m20 text-label-alt">
                비용의 대부분을 공단이 부담하고, 어르신은 일부만 내시면 돼요. 소득 수준에 따라 더 줄어들 수 있습니다.
            </p>
        </div>

        <div class="flex w-full flex-col items-start gap-5">
            <div class="grid w-full grid-cols-1 gap-5 md:grid-cols-2">
                @foreach ($burdens as [$name, $rate, $desc, $highlight])
                    <div class="flex flex-col items-start gap-3 rounded-md border p-7
                                {{ $highlight ? 'border-primary-inverse bg-primary-soft' : 'border-line-neutral bg-surface' }}">
                        <div class="flex w-full items-center justify-between gap-3">
                            <span class="text-b24 text-label">{{ $name }}</span>
                            <span class="text-eb30 {{ $highlight ? 'text-primary-strong' : 'text-label' }}">{{ $rate }}</span>
                        </div>
                        <p class="w-full text-r20 text-label-alt">{{ $desc }}</p>
                    </div>
                @endforeach
            </div>

            <p class="w-full text-m16 text-label-alt">
                ※ 본인부담률은 급여 종류·대상자 구분에 따라 달라집니다. 정확한 금액은 상담 시 안내해 드려요.
            </p>
        </div>
    </div>
</section>
