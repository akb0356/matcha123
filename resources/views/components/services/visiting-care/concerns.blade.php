{{-- Figma 153:2422 (S1_Gomim) — 보호자 고민 --}}
@php
    $cards = [
        [
            'icon' => 'concern-c',
            'title' => '혼자 계신 시간이 늘 걱정돼요',
            'body' => '식사와 약은 제때 챙기시는지, 혹시 넘어지진 않으실지 하루 종일 마음이 놓이지 않아요.',
            'radius' => 'rounded-[32px] rounded-bl-lg',
            'shadow' => 'drop-shadow-[0_12px_12px_rgba(234,221,207,0.25)]',
        ],
        [
            'icon' => 'concern-d',
            'title' => '집안일까지 돌보기 벅차요',
            'body' => '거동을 돕고 식사를 차리고 집안을 정리하다 보면 하루가 어떻게 가는지 모르겠습니다.',
            'radius' => 'rounded-[32px] rounded-br-lg',
            'shadow' => 'drop-shadow-[0_16px_12px_rgba(234,221,207,0.25)]',
        ],
        [
            'icon' => 'concern-c',
            'title' => '일과 돌봄을 병행하기 힘들어요',
            'body' => '직장과 간병 사이에서 가족 모두가 조금씩 지쳐갑니다.',
            'radius' => 'rounded-[32px] rounded-tl-lg',
            'shadow' => 'drop-shadow-[0_12px_12px_rgba(234,221,207,0.25)]',
        ],
    ];
@endphp

<section class="w-full bg-accent-violet/5">
    <div class="mx-auto flex max-w-content flex-col items-start gap-16 px-6 py-[120px]">
        <h2 class="text-eb40 text-label-neutral">
            집에서 돌보는 일,<br>혼자 감당하기엔 막막하지 않으셨나요?
        </h2>

        <div class="grid w-full grid-cols-1 items-stretch gap-6 md:grid-cols-3">
            @foreach ($cards as $card)
                <div class="flex flex-col items-start gap-3 bg-surface p-8 {{ $card['radius'] }} {{ $card['shadow'] }}">
                    <img src="{{ asset("images/icons/{$card['icon']}.svg") }}" alt="" class="h-9 w-9">
                    <p class="text-b20 text-label-neutral">{{ $card['title'] }}</p>
                    <p class="text-m16 text-[#8c837e]">{{ $card['body'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
