{{-- Figma 153:3206 (Frame 187) — 이용 절차 --}}
@php
    $steps = [
        [
            'title' => '상담 신청',
            'body' => '전화나 온라인으로 무료 상담을 신청하면 전담 매니저가 대상 여부를 확인해 드려요.',
        ],
        [
            'title' => '대상·한도 확인',
            'body' => '장기요양 등급과 치매 여부, 남은 연간 이용 한도를 함께 확인합니다.',
        ],
        [
            'title' => '일정 협의',
            'body' => '가족이 쉬어야 할 날에 맞춰 종일방문요양(12시간) 일정과 담당 요양보호사를 배정해요.',
        ],
        [
            'title' => '종일 방문 돌봄',
            'body' => '요양보호사가 가정을 방문해 하루 종일 어르신을 안전하게 돌봅니다.',
        ],
    ];
@endphp

<section class="w-full bg-surface">
    <div class="mx-auto flex max-w-content flex-col items-start gap-[95px] px-6 py-[120px]">
        <div class="flex flex-col items-start gap-3">
            <h2 class="text-eb40 text-label">이용 절차</h2>
            <p class="text-m20 text-label-alt">신청부터 종일 돌봄까지, 전담 매니저가 처음부터 함께합니다.</p>
        </div>

        {{-- 디자인은 2×2 배치다 --}}
        <ol class="grid w-full grid-cols-1 gap-5 lg:grid-cols-2">
            @foreach ($steps as $i => $step)
                <li class="flex flex-col items-start gap-4 overflow-hidden rounded-md border border-line-neutral bg-surface p-6">
                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-accent-green">
                        <span class="text-[16px] font-bold leading-6 tracking-[-0.6px] text-surface">{{ $i + 1 }}</span>
                    </div>
                    <div class="flex w-full flex-col items-start gap-2">
                        <p class="w-full text-b24 text-label">{{ $step['title'] }}</p>
                        <p class="w-full text-m16 text-label-alt">{{ $step['body'] }}</p>
                    </div>
                </li>
            @endforeach
        </ol>
    </div>
</section>
