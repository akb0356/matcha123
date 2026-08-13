{{-- Figma 153:2957 (S1_Gomim) — 보호자 고민 --}}
@php
    $cards = [
        [
            'icon' => 'concern-e',
            'title' => '혼자 씻기가 점점 위험해요',
            'body' => '미끄러운 욕실에서 넘어지진 않으실지 매번 마음을 졸이게 됩니다.',
            'radius' => 'rounded-[32px] rounded-bl-lg',
            'shadow' => 'drop-shadow-[0_12px_12px_rgba(234,221,207,0.25)]',
        ],
        [
            'icon' => 'concern-f',
            'title' => '가족이 목욕을 돕기 벅차요',
            'body' => '무거운 몸을 부축해 씻기는 일은 생각보다 힘들고 다칠 위험도 큽니다.',
            'radius' => 'rounded-[32px] rounded-br-lg',
            'shadow' => 'drop-shadow-[0_16px_12px_rgba(234,221,207,0.25)]',
        ],
        [
            'icon' => 'concern-e',
            'title' => '제대로 못 씻어 걱정돼요',
            'body' => '목욕이 뜸해지면 피부 트러블이나 위생 문제가 생기기 쉬워요.',
            'radius' => 'rounded-[32px] rounded-tl-lg',
            'shadow' => 'drop-shadow-[0_12px_12px_rgba(234,221,207,0.25)]',
        ],
    ];
@endphp

<section class="w-full bg-accent-light-blue/5">
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
