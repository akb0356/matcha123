{{-- Figma 153:1715 (S6 / 보호자 후기) --}}
@php
    $reviews = [
        [
            'initial' => '김',
            'name' => '김○○ 보호자',
            'meta' => '강남구 · 어머니 방문간호',
            'quote' => '어머니가 통원을 너무 힘들어하셨는데, 간호사 선생님이 집으로 와주시니 마음이 놓여요. 매번 기록을 공유해 주셔서 멀리 사는 저도 안심이 됩니다.',
        ],
        [
            'initial' => '이',
            'name' => '이○○ 보호자',
            'meta' => '송파구 · 아버지 방문간호',
            'quote' => '당뇨 관리가 늘 걱정이었는데 혈당 체크부터 투약까지 꼼꼼히 봐주세요. 작은 변화도 먼저 알려주셔서 큰 병원 갈 일이 줄었습니다.',
        ],
        [
            'initial' => '박',
            'name' => '박○○ 보호자',
            'meta' => '서초구 · 어머니 방문간호',
            'quote' => '욕창 때문에 늘 마음을 졸였는데 상처가 눈에 띄게 좋아졌어요. 전문 간호사분이 직접 오시니 확실히 다르더라고요.',
        ],
        [
            'initial' => '정',
            'name' => '정○○ 보호자',
            'meta' => '마포구 · 아버지 방문간호',
            'quote' => '퇴원 후 어떻게 돌봐야 할지 막막했는데, 매니저님이 등급 신청부터 일정까지 다 챙겨주셔서 정말 든든했습니다.',
        ],
        [
            'initial' => '최',
            'name' => '최○○ 보호자',
            'meta' => '노원구 · 시어머니 방문간호',
            'quote' => '일하면서 간병까지 하느라 지쳤는데, 정기 방문 덕분에 한결 여유가 생겼어요. 가족 모두가 마음이 편안해졌습니다.',
        ],
    ];
@endphp

{{-- 카드 폭 400 + 간격 16 = 한 칸 이동 거리 416 --}}
<section class="w-full overflow-hidden bg-caution/20"
         x-data="{ index: 0, last: {{ count($reviews) - 1 }}, step: 416 }">
    <div class="mx-auto max-w-content px-6 pb-[97px] pt-[135px]">
        <div class="flex items-center justify-between">
            <h2 class="text-eb40 text-label">보호자들이 전하는 변화</h2>

            <div class="flex items-center gap-2">
                {{-- 아이콘은 디자인 시스템의 chevron-*-thick 을 쓴다. 색은 currentColor 로 상속된다. --}}
                <button type="button" x-on:click="index = Math.max(0, index - 1)"
                        x-bind:disabled="index === 0"
                        class="flex h-11 w-11 items-center justify-center rounded-full bg-surface text-label-alt transition disabled:opacity-40 hover:text-label"
                        aria-label="이전 후기">
                    <x-icon-chevron-left-thick class="h-5 w-5" />
                </button>
                <button type="button" x-on:click="index = Math.min(last, index + 1)"
                        x-bind:disabled="index === last"
                        class="flex h-11 w-11 items-center justify-center rounded-full bg-surface text-label-alt transition disabled:opacity-40 hover:text-label"
                        aria-label="다음 후기">
                    <x-icon-chevron-right-thick class="h-5 w-5" />
                </button>
            </div>
        </div>

        <div class="mt-[116px]">
            {{-- 디자인의 카드 높이 311.5px를 최소값으로 두어 카드끼리 높이를 맞춘다 --}}
            <div class="flex items-stretch gap-4 transition-transform duration-300 ease-out"
                 x-bind:style="`transform: translateX(-${index * step}px)`">
                @foreach ($reviews as $review)
                    <figure class="flex min-h-[311.5px] w-[400px] shrink-0 flex-col items-start overflow-hidden rounded-md bg-surface p-7">
                        <p class="text-[16px] font-normal leading-6 tracking-[2.4px] text-caution" aria-label="별점 5점 만점에 5점">
                            ★★★★★
                        </p>

                        <blockquote class="mt-4 w-full text-r20 text-label-neutral">
                            {{ $review['quote'] }}
                        </blockquote>

                        <figcaption class="mt-6 flex w-full items-center gap-3 border-t border-[rgba(51,48,46,0.1)] pt-5">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-caution">
                                <span class="text-[16px] font-bold leading-6 tracking-[-0.6px] text-surface">
                                    {{ $review['initial'] }}
                                </span>
                            </div>
                            <div class="flex flex-col items-start">
                                <p class="text-m16 text-label-neutral">{{ $review['name'] }}</p>
                                <p class="text-r14 text-[rgba(51,48,46,0.6)]">{{ $review['meta'] }}</p>
                            </div>
                        </figcaption>
                    </figure>
                @endforeach
            </div>
        </div>
    </div>
</section>
