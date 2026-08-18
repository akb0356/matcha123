{{-- Figma 175:836 (Frame 255) — 계산기에 포함되지 않는 비용 --}}
@php
    $items = [
        ['식비·간식비', '방문 중 식사·간식 등 식재료 관련 비용'],
        ['한도 초과 이용분', '등급별 월 한도를 넘겨 이용한 금액은 전액 본인 부담'],
        ['일부 재료·소모품', '서비스에 따라 발생하는 일부 비급여 재료·물품'],
    ];
@endphp

<section class="w-full bg-surface">
    <div class="mx-auto flex max-w-content flex-col items-start gap-24 px-6 py-[120px]">
        <div class="flex w-full max-w-[860px] flex-col items-start gap-4">
            <h2 class="w-full text-eb44 text-label-strong lg:text-eb52">계산기에 포함되지 않는 비용</h2>
            <p class="w-full text-m20 text-label-alt">아래 항목은 본인부담률(15%)과 별개로 전액 본인 부담이에요.</p>
        </div>

        <div class="grid w-full grid-cols-1 items-stretch gap-4 md:grid-cols-3">
            @foreach ($items as [$title, $desc])
                <div class="flex flex-col items-start gap-3 rounded-md border bg-primary-surface p-7"
                     style="border-color: rgba(54, 148, 171, 0.2)">
                    <p class="w-full text-b24 text-primary-strong">{{ $title }}</p>
                    <p class="w-full text-m20 text-label-alt">{{ $desc }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
