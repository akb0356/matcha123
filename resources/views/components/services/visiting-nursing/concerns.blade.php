{{-- Figma 153:1937 (S1_Gomim) — 보호자 고민 --}}
@php
    // radius: 카드마다 한 쪽 모서리만 8px로 눌러 비대칭을 만든다 (Figma Asymmetric-cards)
    $cards = [
        [
            'icon' => 'concern-a',
            'title' => '통원이 점점 어려워져요',
            'body' => '거동이 불편한 어르신을 모시고 병원을<br>오가는 일이 갈수록 버겁습니다.',
            'radius' => 'rounded-[32px] rounded-bl-lg',
        ],
        [
            'icon' => 'concern-b',
            'title' => '작은 변화를 놓칠까 불안해요',
            'body' => '욕창·혈당·투약처럼 전문 관찰이 필요한데 가족만으론 한계가 있어요.',
            'radius' => 'rounded-[32px] rounded-br-lg',
        ],
        [
            'icon' => 'concern-a',
            'title' => '일과 돌봄을 병행하기 벅차요',
            'body' => '직장과 간병 사이에서 가족 모두가<br>조금씩 지쳐갑니다.',
            'radius' => 'rounded-[32px] rounded-tl-lg',
        ],
    ];
@endphp

<section class="w-full bg-caution/5">
    <div class="mx-auto flex max-w-content flex-col items-start gap-16 px-6 py-[120px]">
        <h2 class="text-eb40 text-label-neutral">
            집에서 돌보는 일,<br>혼자 감당하기엔 막막하지 않으셨나요?
        </h2>

        <div class="grid w-full grid-cols-1 gap-6 md:grid-cols-3">
            @foreach ($cards as $card)
                <div class="flex flex-col items-start gap-3 bg-surface p-8 shadow-elevation-xs {{ $card['radius'] }}">
                    <img src="{{ asset("images/icons/{$card['icon']}.svg") }}" alt="" class="h-9 w-9">
                    <p class="text-b20 text-label-neutral">{{ $card['title'] }}</p>
                    <p class="text-m16 text-[#8c837e]">{!! $card['body'] !!}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
