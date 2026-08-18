{{-- Figma 208:1094 (Frame 187) — 도입 4단계 --}}
@php
    // 시안 208:1124 의 「초기 정착을a 지원합니다」는 오타로 보여 바로잡았다.
    $steps = [
        ['도입 문의', '센터 규모 · 운영 현황을 남겨주시면 담당자가 연락드립니다'],
        ['운영 진단 · 상담', '지금 쓰는 방식과 병목을 함께 확인하고 적용 범위를 정합니다'],
        ['셋업 · 교육', '계정 개설, 기존 자료 이관, 담당자 교육을 진행합니다'],
        ['운영 시작', '연계 · 상담 · 케어플랜 · 채용을 순차로 켜고 초기 정착을 지원합니다'],
    ];
@endphp

<section class="w-full bg-surface-alt">
    <div class="mx-auto flex max-w-content flex-col items-start gap-24 px-6 py-[120px]">
        <h2 class="max-w-[600px] text-eb40 text-label">도입은 4단계, 평균 2주면 시작합니다</h2>

        <div class="grid w-full grid-cols-1 gap-5 md:grid-cols-2">
            @foreach ($steps as $i => [$title, $desc])
                <div class="flex flex-col items-start gap-4 rounded-md border border-line-neutral bg-surface p-6">
                    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-primary text-b16 text-surface">
                        {{ $i + 1 }}
                    </span>
                    <div class="flex w-full flex-col items-start gap-2">
                        <p class="w-full text-b24 text-label">{{ $title }}</p>
                        <p class="w-full text-m16 text-label-alt">{{ $desc }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
