{{-- Figma 153:2975 (S1_Gomim) — 보호자 고민 --}}
@php
    $cards = [
        [
            'icon' => 'concern-g',
            'title' => '잠깐도 자리를 비우기 어려워요',
            'body' => '배회·안전사고가 걱정돼 잠깐 외출이나 병원 진료, 경조사조차 마음 편히 다녀오기 힘듭니다.',
            'radius' => 'rounded-[32px] rounded-bl-lg',
            'shadow' => 'drop-shadow-[0_12px_12px_rgba(234,221,207,0.25)]',
        ],
        [
            'icon' => 'concern-h',
            'title' => '보호자도 지쳐갑니다',
            'body' => '24시간 긴장 속 돌봄이 이어지면 가족의 건강과 일상도 조금씩 무너집니다.',
            'radius' => 'rounded-[32px] rounded-br-lg',
            'shadow' => 'drop-shadow-[0_16px_12px_rgba(234,221,207,0.25)]',
        ],
        [
            'icon' => 'concern-g',
            'title' => '맡길 곳을 찾기 어려워요',
            'body' => '하루만이라도 안심하고 맡길 곳이 마땅치 않아 휴식을 미루게 됩니다.',
            'radius' => 'rounded-[32px] rounded-tl-lg',
            'shadow' => 'drop-shadow-[0_12px_12px_rgba(234,221,207,0.25)]',
        ],
    ];
@endphp

<section class="w-full bg-accent-green-soft/5">
    <div class="mx-auto flex max-w-content flex-col items-start gap-16 px-6 py-[120px]">
        <h2 class="text-eb40 text-label-neutral">
            치매 돌봄, 하루도<br>마음 놓고 쉬기 어려우셨죠?
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
