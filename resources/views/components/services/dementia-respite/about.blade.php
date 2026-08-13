{{-- Figma 153:3149 (Frame 183) — 치매가족휴가제란? --}}
@php
    $features = [
        [
            'icon' => 'feature-hours',
            'title' => '1회 12시간 연속 돌봄',
            'body' => '요양보호사가 12시간 동안 수급자를 안전하게 보호하고 관찰합니다.',
        ],
        [
            'icon' => 'feature-days',
            'title' => '연간 12일 이용가능',
            'body' => '연 12일 이내에서 월 한도액과 관계없이 이용할 수 있습니다. (12시간·24회)',
        ],
        [
            'icon' => 'feature-target',
            'title' => '1·2등급·치매수급자',
            'body' => '집에서 어르신을 모시는 가족이라면 월 한도액 걱정 없이 신청하세요.',
        ],
    ];
@endphp

<section class="w-full bg-surface">
    <div class="mx-auto flex max-w-content flex-col items-start gap-24 px-6 py-[120px]">
        <div class="flex flex-col items-start gap-3">
            <h2 class="text-eb40 text-label">치매가족휴가제란?</h2>
            <p class="text-m20 text-label-alt">
                치매 수급자에게 <span class="text-label">1회 12시간 연속 돌봄</span>을 제공해, 돌보던 가족이 하루 온전히 쉬거나
                개인 일을 볼 수 있도록 지원하는 급여입니다. <span class="text-label">월 한도액과 관계없이</span> 연간 12일까지 이용할 수 있어요.
            </p>
        </div>

        <div class="grid w-full grid-cols-1 gap-5 md:grid-cols-3">
            @foreach ($features as $feature)
                <div class="flex flex-col items-start gap-4 overflow-hidden rounded-md border border-line-neutral bg-surface p-7">
                    {{-- 아이콘 타일은 강조색(green)이 아니라 primary-strong 틴트를 쓴다 (디자인 그대로) --}}
                    <div class="flex h-12 w-12 items-center justify-center rounded bg-primary-strong/10">
                        <img src="{{ asset("images/icons/{$feature['icon']}.svg") }}" alt="" class="h-6 w-6">
                    </div>
                    <p class="w-full text-b24 text-label">{{ $feature['title'] }}</p>
                    <p class="w-full text-r16 text-label-alt">{{ $feature['body'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
