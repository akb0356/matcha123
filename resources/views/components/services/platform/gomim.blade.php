{{-- Figma 180:3492 (S1_Gomim) — 센터 운영의 고민 --}}
@php
    /*
     * 카드마다 모서리 하나만 8px 로 깎여 있다(나머지 32px). 순서대로 좌하 · 우하 · 좌상.
     * 그림자도 가운데 카드만 y=16 으로 더 깊다.
     */
    $cards = [
        ['icon' => 'platform-gomim-a', 'title' => '신규 어르신 수급이 늘 불안해요',
         'desc' => '연계 채널이 없으면 소개와 지역 영업에만 기대게 되고, 수급은 늘 불안한 변수로 남습니다.',
         'radius' => 'rounded-[32px] rounded-bl-lg', 'shadow' => '0 12px 12px rgba(0,152,178,0.25)'],
        ['icon' => 'platform-gomim-b', 'title' => '간호사마다 케어 수준이 달라요',
         'desc' => '담당자가 바뀌면 어르신 상태 파악부터 다시 시작하고, 보호자 신뢰도 함께 흔들립니다.',
         'radius' => 'rounded-[32px] rounded-br-lg', 'shadow' => '0 16px 12px rgba(0,152,178,0.25)'],
        ['icon' => 'platform-gomim-a', 'title' => '간호사 채용이 가장 오래 걸려요',
         'desc' => '일반 구인 사이트로는 방문 지역·경력·자격이 잘 맞지 않습니다.',
         'radius' => 'rounded-[32px] rounded-tl-lg', 'shadow' => '0 12px 12px rgba(0,152,178,0.25)'],
    ];
@endphp

<section class="w-full" style="background-color: rgba(0, 152, 178, 0.1)">
    <div class="mx-auto flex max-w-content flex-col items-start gap-16 px-6 py-[120px]">
        <h2 class="w-full text-eb40 text-label-neutral">
            센터 운영,<br>이 세 곳에서 새고 있지 않으신가요?
        </h2>

        <div class="grid w-full grid-cols-1 items-stretch gap-6 md:grid-cols-3">
            @foreach ($cards as $card)
                <div class="flex flex-col items-start gap-3 bg-surface p-8 {{ $card['radius'] }}"
                     style="filter: drop-shadow({{ $card['shadow'] }})">
                    <img src="{{ asset("images/icons/{$card['icon']}.svg") }}" alt="" class="h-9 w-9 shrink-0">
                    <p class="w-full text-b20 text-label-neutral">{{ $card['title'] }}</p>
                    <p class="w-full text-r16 text-label-alt">{{ $card['desc'] }}</p>
                </div>
            @endforeach
        </div>

        {{-- 전환 문구 (207:686) --}}
        <div class="flex w-full flex-col items-start gap-[7px] rounded-md border border-[#d8e3e6] px-5 py-[18px]"
             style="background-color: rgba(0, 152, 178, 0.2)">
            <p class="w-full text-b20 text-primary">도구를 늘리는 게 아니라, 하나로 합칩니다.</p>
            <p class="w-full text-r16 text-label-neutral">
                연계 업체 · 상담 엑셀 · 간호기록지 · 구인 사이트를 오가던 업무가 청담원에서는 하나로 끝납니다.
            </p>
        </div>
    </div>
</section>
